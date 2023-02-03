<?php

namespace App\Http\Controllers\PPIC\schedule;

use DB;
use Auth;
use DataTables;
use DateTime;
use DatePeriod;
use DateInterval;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Helpers\DateHelper;
use App\Services\Purchasing\Email_Purchasing;

use App\Branch;
use App\Models\Marketing\RekapOrder\RekapOrder;
use App\Models\Marketing\RekapOrder\RekapDetail;
use App\Models\PPIC\ProductionLine;
use App\Models\PPIC\WorkOrder;
use App\Models\PPIC\WorkOrderTarget;
use App\Models\PPIC\Monitoring;
use App\Models\Cutting\Product_Costing\CuttingPPIC;
use App\Models\Cutting\Product_Costing\CuttingComponentPPIC;
use App\Models\Marketing\TrimCard\PartList;
use App\ItemNumber;

use App\WorkOrderJDE;

use App\Models\PPIC\MasterBranchWorkDay;
use App\Models\PPIC\OvertimeDay;
use App\Models\PPIC\PlannerBranch;
use App\Models\Production\MasterSmv;
use App\Models\PPIC\CapabilityLine;
use App\Holiday; 
use App\UserDefinedCode;
use App\AddressBook;

use App\Services\PPIC\Schedule\Prod_Schedule;
use App\Services\PPIC\Schedule\Update_Schedule;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\Controller;
use App\Services\PPIC\Schedule\Email_Reporting;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PurchasingPOExport;


class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $filter_branch=[];
        $filter_wo='';
        $filter_view='wo';
        $view_schedule='oneline';
        $request->view_schedule==null?:$view_schedule=$request->view_schedule;

        $view_line='2021';
        date('Y')=='2023'?$view_line='2023':"";
        $request->view_line==null?:$view_line=$request->view_line;
        
        if (($request->branch_id!==null)) {
            $filter_branch=$request->branch_id;
        } else {
            $filter_branch=PlannerBranch::where('nik',Auth::user()->nik)->get()->pluck('branch_id')->toArray();
        }
        if ($request->wo_no) {
            $filter_wo=$request->wo_no;
        }
        if ($request->view_mode) {
            $filter_view=$request->view_mode;
        }

        // $unplanned_output=$this->unplanned_output_();
        $unplanned_output=[];

        $master_or_all=[];
        $master_or=RekapDetail::where('wo_qty_balance','>',0)->orderBy('ex_fact','asc')->get()->map(function ($item) use($request,&$master_or_all){
            $data=[
                'id'=>$item->id,
                'buyer'=>$item->rekap_order->buyer,
                'buyer_desc'=>$item->rekap_order->buyerjde->F0101_ALPH??null,
                'wo_qty_balance'=>$item->wo_qty_balance,
                'nilai'=>$item->nilai,
                'cm'=>$item->cm,
                'ex_fact'=>$item->ex_fact,
                'item_master'=>$item->item_master->F4101_LITM??null,
                'article'=>$item->article,
                'no_or'=>$item->no_or,
                'wo_qty_balance'=>$item->wo_qty_balance,
                'ex_fact'=>$item->ex_fact
            ];
            $master_or_all[]=$data;

            if ($request->or_buyer&&$request->or_buyer!=='') {
                if ($request->or_buyer==$item->rekap_order->buyer) {
                    return $data;
                }
            } else {
                return $data;
            }
        });
        $master_or=$master_or->filter();
        $master_or_buyer=collect($master_or_all)->sortByDesc('buyer_desc')->groupBy('buyer')->map(function ($item){
            return [
                'buyer'=>$item->first()['buyer'],
                'buyer_desc'=>$item->first()['buyer_desc'],
                'count'=>$item->count()
            ];
        });

        $master_line=ProductionLine::query();
        if ($filter_branch!==null&&count($filter_branch)>0&&in_array(0,$filter_branch)==false) {
            $master_line->whereIn('branch_id',$filter_branch);
        }
        $master_line=$master_line->where('is_active','>=',1)->OrderBy('branch_id')->OrderBy('sub')->OrderBy('id');
        $master_line_input=clone $master_line;
        $master_line_input=$master_line_input->get();

        if ($view_line=='2022') {
            $master_line->where('line','not like','L%');
        } else if ($view_line=='2023') {
            $master_line->where('line','like','L%');
        }
        $master_line=$master_line->get();
        
        $master_branch=Branch::where('branchdetail','<>','CJL')->get();
        $master_prod_sch = new Collection();

        $line_seq=1;

        foreach ($master_line as $k => $v) {
            $wo=WorkOrder::query();
            if ($filter_wo) {
                $wo->where('wo_no',$filter_wo);
            }
            $wo->where('production_line_id',$v->id)->orderBy('start_date');
            $wo=$wo->get();

            $wo_temp = new Collection();
            foreach ($wo as $k1 => $v1) {
                if (count($wo_temp)==0) {
                    $wo_temp=$wo_temp->push(new Collection());
                }
                $color="ganttGreen";
                if($v1->sewing_good==0) {
                    $color="ganttGray";
                }
                if($v1->finish_date==$v1->shipment_date) {
                    $color="ganttOrange";
                }
                if($v1->finish_date>$v1->shipment_date) {
                    $color="ganttRed";
                }
                if($v1->sewing_good>=$v1->qty_order-$v1->qty_adjsupply&&$v1->finish_date<=$v1->shipment_date) {
                    $color="ganttBlue";
                }
                if($v1->sewing_good>=$v1->qty_order-$v1->qty_adjsupply&&$v1->finish_date>$v1->shipment_date) {
                    $color="ganttBlueDark";
                }

                $label='BLANK';
                if ($filter_view=='wo'||$filter_view=='') {
                    $label=$v1->wo_no;
                }
                if ($filter_view=='buyer') {
                    if ($v1->rekap_detail&&$v1->rekap_detail->rekap_order&&$v1->rekap_detail->rekap_order->buyerjde) {
                        $label=$v1->rekap_detail->rekap_order->buyerjde->F0101_ALPH;
                        if (strlen($label)>10) {
                            $label=substr($label,0,10);
                        }
                    }
                }
                if ($filter_view=='style') {
                    if ($v1->rekap_detail) {
                        $label=$v1->rekap_detail->article;
                    }
                }
                if ($filter_view=='ornumber') {
                    if ($v1->rekap_detail) {
                        $label=$v1->rekap_detail->no_or;
                        if ($label==null||$label=='') {
                            $label='(Blank)';
                        }
                    }
                }

                $d=new Collection([
                    'from' => $v1->start_date,
                    'to' => $v1->finish_date,
                    'label' => $label,
                    'customClass' => $color,
                    'dataObj' => ['id'=>$v1->id, 'line'=>$v1->production_line_id,'wo'=>$v1->wo_no]
                ]);
                // versi v1
                // $wo_temp=$wo_temp->push($d);

                // versi v2
                $total_line_sub=count($wo_temp);
                $is_break=0;
                for ($x = 0; $x < $total_line_sub; $x++) {
                    if ($view_schedule=='oneline') {
                        $wo_temp[$x]=$wo_temp[$x]->push($d);
                        $is_break=1;
                    } else {
                        if (count($wo_temp[$x])==0) {
                            $wo_temp[$x]=$wo_temp[$x]->push($d);
                            $is_break=1;
                            break;
                        } else {
                            if ($wo_temp[$x][$wo_temp[$x]->keys()->last()]['to']<$v1->start_date&&$v1->start_date!==$v1->finish_date) {
                                $wo_temp[$x]=$wo_temp[$x]->push($d);
                                $is_break=1;
                                break;
                            } elseif ($wo_temp[$x][$wo_temp[$x]->keys()->last()]['to']<$v1->start_date&&$v1->start_date==$v1->finish_date) {
                                $wo_temp[$x]=$wo_temp[$x]->push($d);
                                $is_break=1;
                                break;
                            } else {
                                // $wo_temp=$wo_temp->push(new Collection);
                                // $wo_temp[$wo_temp->keys()->last()]=$wo_temp[$wo_temp->keys()->last()]->push($d);
                                // if ($v1->wo_no=='175982') {
                                //     log::info('3 : x : '.$x);
                                // }
                                // break;
                            }
                        }

                    }
                }
                if ($is_break==0) {
                    $wo_temp=$wo_temp->push(new Collection);
                    $wo_temp[$wo_temp->keys()->last()]=$wo_temp[$wo_temp->keys()->last()]->push($d);
                }
            }

            $total_line_sub=count($wo_temp);
            for ($x = 0; $x < $total_line_sub; $x++) {
                $title=$line_seq.'-'.$v->sub;
                // $deskripsi='L '.$v->line;
                $deskripsi=$v->line;

                if ($x>0) {
                    $title='';
                    $deskripsi='';
                }
                $master_temp=new Collection([
                    'id' => $v->id,
                    'name' => $title,
                    'desc' => $deskripsi,
                    'values' => $wo_temp[$x]
                ]);
                $master_prod_sch=$master_prod_sch->push($master_temp);
            }
            //line blm ada wo
            if (count($wo)==0) {
                $title=$line_seq.'-'.$v->sub;
                $deskripsi=$v->line;
                // $deskripsi='L '.$v->line;
                $master_temp=new Collection([
                    'id' => $v->id,
                    'name' => $title,
                    'desc' => $deskripsi,
                    'values' => $wo_temp
                ]);
                $master_prod_sch=$master_prod_sch->push($master_temp);
            }
            $line_seq+=1;
        }

        $map['filter_branch']=$filter_branch;
        $map['filter_wo']=$filter_wo;
        $map['filter_view']=$filter_view;
        $map['filter_view_schedule']=$view_schedule;
        $map['filter_view_line']=$view_line;
        $map['or_buyer']=$request->or_buyer;
        $map['unplanned_output']=$unplanned_output;
        $map['master_or']=$master_or;
        $map['master_or_buyer']=$master_or_buyer;
        $map['master_line']=$master_line;
        $map['master_line_input']=$master_line_input;
        $map['master_branch']=$master_branch;
        $map['prod_sch']=$master_prod_sch;
        $map['master_holiday']=Holiday::select('date')->get()->pluck('date');
        $map['page'] = 'production schedule';
        return view('ppic.schedule.index', $map);
    }

    public function create()
    {
        // $map['page'] = 'production schedule';
        // return view('ppic.schedule.create_wo', $map);
    }

    public function store(Request $request)
    {
        try{
            DB::beginTransaction();

            $request=Arr::except($request->all(), '_token');
            $request=Arr::except($request, 'id');
            if($this->validateDate($request['start_date'])==null||$this->validateDate($request['finish_date'])==null) {
                return redirect()->back()->with(['error' => 'Start and finish date cannot blank']);
            }

            $show = WorkOrder::create($request);

            $rekapdetail=RekapDetail::find($request['rekap_detail_id']);
            $rekapdetail->wo_qty_allocated=$rekapdetail->wo_qty_allocated+$request['qty_order'];
            $rekapdetail->update();

            //adjust jadwal
            $request=array_merge($request, ['id'=>$show->id]);

            $adj=new Prod_Schedule();
            $wot=$adj->calc_finish_wo($show->id,$show->wo_no,$show->qty_order,$show->qty_adjsupply,$show->sewing_good,$show->qty_target_day,$show->lc1,$show->lc2,$show->lc3,$show->start_date,$show->production_line_id);
            $wotarget=WorkOrderTarget::insert($wot);
            $show->start_date=reset($wot)['target_date'];
            $show->finish_date=end($wot)['target_date'];
            $show->hour_balance=end($wot)['balance_hour'];

            $start=new DateTime(reset($wot)['target_date']);
            $fin=new DateTime(end($wot)['target_date']);
            $interval=$start->diff($fin);

            $show->day_estimate=$interval->days+1;
            $show->update();

            // 4 NOV 2022, DISABLE KARENA LEMOT 
            // $wot=$adj->adjust_schedule($request);
            // end adjust jadwal

            //create product costing WO
            if (!in_array($show->wo_no,['',0])) {
                $cek=CuttingPPIC::where('no_wo',$show->wo_no)->first();
                if ($cek==null) {
                    $wojde=WorkOrderJDE::where('F4801_DOCO',$show->wo_no)->first();
                    if ($wojde) {
                        $new=new CuttingPPIC();
                        $new->no_wo=$wojde->F4801_DOCO;
                        $new->item_number=$wojde->F4801_ITM;
                        $new->style=$wojde->F4801_DL01;
                        $new->total_qty=$wojde->F4801_UORG;
                        $new->factory=$wojde->F4801_MCU;
                        $new->production_date=$show->cutting_date;
                        $new->save();

                        $url=config('app.url_jdeapi').'/bom/search=?KIT='.$wojde->F4801_ITM.'&select=F3002_ITM|F3002_DSC1|F3002_KIT|F3002_KITL|F3002_QNTY|F3002_UM|F3002_URCD|F3002_FTRC|F3002_OPSQ';
                        $client = new Client();
                        $request = $client->get($url);
                        $response = json_decode($request->getBody());

                        foreach ($response as $d) {
                            if ($d->F3002_OPSQ==10) {
                                $cek_glpt=ItemNumber::where('F4101_ITM',$d->F3002_ITM)->first();
                                if ($cek_glpt) {
                                    if (in_array($cek_glpt->F4101_GLPT,['INFA','ININ'])) {
                                        $new=new CuttingComponentPPIC();
                                        $new->no_wo=$wojde->F4801_DOCO;
                                        $new->item_number=$cek_glpt->F4101_ITM;
                                        $new->item_desc=$d->F3002_OPSQ.' - '.$cek_glpt->F4101_DSC2.' '.$cek_glpt->F4101_SRTX;
                                        $new->desc=$cek_glpt->F4101_DSC2;
                                        $new->seq=$d->F3002_OPSQ;
                                        $new->srtx=$cek_glpt->F4101_SRTX;
    
                                        $color=explode("|",$d->F3002_DSC1);
                                        $new->remark=$color[1];
                                        $new->save();
                                    }
                                }
                            }
                        }
                    }
                }
            }

            DB::commit();
            return redirect()->back();

        }catch(\Exception $e){
            DB::rollback();
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }

    public function edit($id)
    {
        $data=new Collection();
        $wo = WorkOrder::find($id);
        $data=$data->merge($wo);

        $temp = new Collection([
            'originator'=>$wo->originator->nama,
            'is_editable'=>$this->is_editable($wo->prod_line->branch_id)
        ]);
        $data=$data->merge($temp);

        $detail_edit=RekapDetail::find($wo->rekap_detail_id);

        if ($detail_edit) {
            $temp = new Collection([
                'or_qty'=>$detail_edit->total_breakdown,
                'wo_qty_balance'=>$detail_edit->wo_qty_balance
            ]);
            $data=$data->merge($temp);

            $detail_edit=RekapDetail::find($detail_edit->id);
            if ($detail_edit) {
                $artikel='';
                $ex_fact='';

                if ($detail_edit->article!==null) {
                    $artikel=$detail_edit->article;
                };
                if ($detail_edit->ex_fact!==null) {
                    $ex_fact=$detail_edit->ex_fact;
                };

                $temp = new Collection([
                    'article'=>$artikel,
                    'no_or'=>$detail_edit->no_or,
                    'ex_fact'=>$ex_fact,
                    'fob'=>$detail_edit->nilai,
                    'cm'=>$detail_edit->cm

                ]);
                $data=$data->merge($temp);
            }
        }
        return response()->json($data);
    }

    public function update(Request $request)
    {
        try{
            DB::beginTransaction();

            $request=Arr::except($request->all(), '_token');
            if($this->validateDate($request['start_date'])==null||$this->validateDate($request['finish_date'])==null) {
                return redirect()->back()->with(['error' => 'Start and finish date cannot blank']);
            }
            $wo=WorkOrder::find($request['id']);
            if($wo==null) {
                return redirect()->back()->with(['error' => 'Work order not found']);
            }

            //restore or qty balance 
            $detail=RekapDetail::find($wo->rekap_detail_id);
            $detail->wo_qty_allocated=$detail->wo_qty_allocated-$wo->qty_order;
            $detail->update();
            //end restore or qty balance 

            $wo->update($request);

            $adj=new Prod_Schedule();
            $wot=$adj->calc_finish_wo($wo->id,$wo->wo_no,$wo->qty_order,$wo->qty_adjsupply,$wo->sewing_good,$wo->qty_target_day,$wo->lc1,$wo->lc2,$wo->lc3,$wo->start_date,$wo->production_line_id);
            $wotarget=WorkOrderTarget::where('workorder_id',$wo->id)->delete();
            $wotarget=WorkOrderTarget::insert($wot);
            $wo->start_date=reset($wot)['target_date'];
            $wo->finish_date=end($wot)['target_date'];
            $wo->hour_balance=end($wot)['balance_hour'];

            $start=new DateTime(reset($wot)['target_date']);
            $fin=new DateTime(end($wot)['target_date']);
            $interval=$start->diff($fin);

            $wo->day_estimate=$interval->days+1;
            $wo->update();

            //4 NOV 2022, DISABLE KARENA LEMOT 
            $wot=$adj->adjust_schedule($request);
            //end adjust jadwal

            $detail=RekapDetail::find($request['rekap_detail_id']);
            $detail->wo_qty_allocated=$detail->wo_qty_allocated+$request['qty_order'];
            $detail->update();

            //create product costing WO
            if (!in_array($wo->wo_no,['',0])) {
                $cek=CuttingPPIC::where('no_wo',$wo->wo_no)->first();
                if ($cek==null) {
                    $wojde=WorkOrderJDE::where('F4801_DOCO',$wo->wo_no)->first();
                    if ($wojde) {
                        $new=new CuttingPPIC();
                        $new->no_wo=$wojde->F4801_DOCO;
                        $new->item_number=$wojde->F4801_ITM;
                        $new->style=$wojde->F4801_DL01;
                        $new->total_qty=$wojde->F4801_UORG;
                        $new->factory=$wojde->F4801_MCU;
                        $new->production_date=$wo->cutting_date;
                        $new->save();

                        $url=config('app.url_jdeapi').'/bom/search=?KIT='.$wojde->F4801_ITM.'&select=F3002_ITM|F3002_DSC1|F3002_KIT|F3002_KITL|F3002_QNTY|F3002_UM|F3002_URCD|F3002_FTRC|F3002_OPSQ';
                        $client = new Client();
                        $request = $client->get($url);
                        $response = json_decode($request->getBody());

                        foreach ($response as $d) {
                            if ($d->F3002_OPSQ==10) {
                                $cek_glpt=ItemNumber::where('F4101_ITM',$d->F3002_ITM)->first();
                                if ($cek_glpt) {
                                    if (in_array($cek_glpt->F4101_GLPT,['INFA','ININ'])) {
                                        $new=new CuttingComponentPPIC();
                                        $new->no_wo=$wojde->F4801_DOCO;
                                        $new->item_number=$cek_glpt->F4101_ITM;
                                        $new->item_desc=$d->F3002_OPSQ.' - '.$cek_glpt->F4101_DSC2.' '.$cek_glpt->F4101_SRTX;
                                        $new->desc=$cek_glpt->F4101_DSC2;
                                        $new->seq=$d->F3002_OPSQ;
                                        $new->srtx=$cek_glpt->F4101_SRTX;
    
                                        $color=explode("|",$d->F3002_DSC1);
                                        $new->remark=$color[1];
                                        $new->save();
                                    }
                                }
                            }

                        }
                    }
                }
            }

            DB::commit();

            return redirect()->back();

        }catch(\Exception $e){
            DB::rollback();
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }
    public function is_editable($branchwo)
    {
        $cek_planner_branch=PlannerBranch::where('nik',Auth::user()->nik)->get();
        foreach ($cek_planner_branch as $v) {
            if ($v->branch_id==$branchwo) {
                return 1;
                break;
            }
        }
        return 0;
    }
    public function wo_by_line($line_id)
    {
        $wo=WorkOrder::select('id','wo_no','finish_date')->where('production_line_id',$line_id)->orderBy('id')->get();
        return response()->json($wo);
    }

    public function unplanned_output_() {
        $unplanned_output=Monitoring::query();
        $unplanned_output->select(['wo', 'line', 'branchdetail', 'tanggal', 'total_outpot','nik','nama']);
        $unplanned_output=$unplanned_output->where('unplanned',1)->groupBy(['tanggal','wo','branchdetail'])->get()->map(function ($item){
            $planner=WorkOrder::where('wo_no',$item->wo)->first();
            $planner_nik='';
            $note='';
            // dd($item->branchwo->id);
            if ($planner==null) {
                $note='WO Not Found';
                $planner=PlannerBranch::where('branch_id',$item->branchwo->id)->first();
            } else {
                $note='Line Not Found';
            }
            if ($planner!==null) {
                $planner_nik=$planner->originator->nik;
                $planner=$planner_nik.'-'.$planner->originator->nama;
            }
            $qty=$item->where('wo',$item->wo)->where('tanggal',$item->tanggal)->where('line',$item->line)->where('unplanned',1)->sum('total_outpot');
            return [
                'date_output'=>$item->tanggal,
                'originator_nik'=>$planner_nik,
                'originator'=>$planner,
                'wo'=>$item->wo,
                'line'=>$item->line,
                'qty'=>$qty,
                'uploader'=>$item->nik.'-'.$item->nama,
                'note'=>$note,
                'branchdetail'=>$item->branchdetail
            ];
        });
        // dd($unplanned_output);
        if (Auth::user()->jabatan=='KABAG') {

        } else if (Auth::user()->role=='PPIC_PLANNER') {
            $unplanned_output=$unplanned_output->where('originator_nik',Auth::user()->nik);
        }
        return $unplanned_output;
    }

    public function unplanned_output(Request $request)
    {
        $map['data'] = $this->unplanned_output_();
        $map['page'] = 'Unplanned Output';
        return view('ppic.schedule.unplanned_output', $map);
    }

    function validateDate($date, $format = 'Y-m-d')
    {
        // var_dump(validateDate('2013-13-01'));  // false
        // var_dump(validateDate('20132-13-01')); // false
        // var_dump(validateDate('2013-11-32'));  // false
        // var_dump(validateDate('2012-2-25'));   // false
        // var_dump(validateDate('2013-12-01'));  // true
        // var_dump(validateDate('1970-12-01'));  // true
        // var_dump(validateDate('2012-02-29'));  // true
        // var_dump(validateDate('2012', 'Y'));   // true
        // var_dump(validateDate('12012', 'Y'));  // false
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
    public function get_totalsmv(Request $request)
    {
        $itemnumber=$request->itemnumber;
        $prodline=$request->prodline;

        $item=substr($itemnumber,0, 5);
        $buyer=substr($itemnumber,5, 3);
        $style=substr($itemnumber,8, 10);

        $total_smv=MasterSmv::where('style',$style)->sum('smv_minute');
        $total_op=ProductionLine::find($prodline);
        $eff=CapabilityLine::where('production_line_id',$prodline)->where('item',$item)->where('buyer',$buyer)->first();

        if ($total_op) {
            $total_op=$total_op->total_operator;
            if ($total_smv>0) {
                $total_smv=(60*$total_op)/$total_smv;
                if ($eff) {
                    $total_smv=($eff->persentase/100)*$total_smv;
                }
            } else {
                $total_smv=0;
            }
        }
        $map['datasmv']=['totalsmv'=>round($total_smv,0), 'totalop'=>round($total_op,0)];
        return response()->json($map);
    }
    public function get_line_effisiensi(Request $request)
    {
        $itemnumber=$request->itemnumber;

        $item=substr($itemnumber,0, 5);
        $buyer=substr($itemnumber,5, 3);
        $prod=ProductionLine::get();
        $prod=$prod->map(function($line, $key) use ($item,$buyer) {
            $eff=CapabilityLine::where('production_line_id',$line->id)->where('item',$item)->where('buyer',$buyer)->first();
            $line_str=$line->sub." / L ".$line->line." / Op ".$line->total_operator;
            if ($eff) {
                $line_str.=" (Eff: ".$eff->persentase."%)";
            }
            return [
                'id' => $line->id,
                'line' => $line_str
            ];
        });
        return response()->json($prod);
    }
    public function wocount_by_line($wo_id,$line_id,$tanggal)
    {
        $wo=WorkOrder::query();
        $wo->select('id')->where('production_line_id',$line_id);
        if ($wo_id!=="0") {
            $wo->where('start_date','<=',$tanggal);
            $wo->where('id','<>',$wo_id);
        }
        $wo=$wo->get()->count();
        return response()->json($wo);
    }
    public function wo_running(Request $request)
    {
        $map['branch']=ProductionLine::groupBy('sub')->get();
        $map['prodline']=ProductionLine::get();

        $dt_dari=null;
        $dt_smpi=null;
        if ($request->check_all_data==null) {
            $dt_dari=date('Y-m-01');
            $dt_smpi=date('Y-m-t');
        }
        if ($request->target_date_from!==null) {
            $dt_dari=$request->target_date_from;
        }
        if ($request->target_date_to!==null) {
            $dt_smpi=$request->target_date_to;
        }

        $wo=WorkOrder::query();
        if ($dt_dari!==null) {
            $wo->where('start_date','>=',$dt_dari);
        }
        if ($dt_smpi!==null) {
            $wo->where('start_date','<=',$dt_smpi);
        }

        if ($request->wo_no) {
            $wo->where('wo_no',$request->wo_no);
        }
        if ($request->production_line_id) {
            $wo->where('production_line_id',$request->production_line_id);
        }
        // if ($request->target_date_from) {
        // }
        // if ($request->target_date_to) {
        // }
        if ($request->branch_id) {
            $wo->whereHas('prod_line', function($q) use($request){
                if ($request->branch_id) {
                    $q->where('branch_id', $request->branch_id);
                }
            });
        }
        $wo=$wo->orderBy('production_line_id')->orderBy('start_date')->get();

        $map['dt_dari']=$dt_dari;
        $map['dt_smpi']=$dt_smpi;
        $map['wo']=$wo;
        $map['page'] = 'production schedule';
        return view('ppic.schedule.shipmentdue', $map);
    }
    public function wo_targetday(Request $request)
    {
        $map['branch']=ProductionLine::groupBy('sub')->get();
        $map['prodline']=ProductionLine::get();

        $wo = WorkOrderTarget::query();
        if ($request->wo_no) {
            $wo->where('wo_no',$request->wo_no);
        }
        if ($request->production_line_id) {
            $wo->where('production_line_id',$request->production_line_id);
        }
        if ($request->target_date_from) {
            $wo->where('target_date','>=',$request->target_date_from);
        }
        if ($request->target_date_to) {
            $wo->where('target_date','<=',$request->target_date_to);
        }
        if ($request->branch_id) {
            $wo->whereHas('prod_line', function($q) use($request){
                if ($request->branch_id) {
                    $q->where('branch_id', $request->branch_id);
                }
            });
        }
        if ($request->wo_no==null&&$request->production_line_id==null&&$request->target_date_from==null&&$request->target_date_to==null&&$request->branch_id==null) {
            $wo->take(50);
        }
        $data=$wo->orderBy('id')->get();


        $map['wo']=$data;
        $map['page'] = 'production schedule';
        return view('ppic.schedule.wotarget', $map);
    }
    public function wo_progress_sewing(Request $request)
    {
        // $map['branch']=ProductionLine::groupBy('sub')->get();
        // $map['prodline']=ProductionLine::get();

        $wo = Monitoring::query();
        if ($request->wo_no) {
            $wo->where('wo',$request->wo_no);
        }
        if ($request->production_line_id) {
            $wo->where('line',$request->production_line_id);
        }
        if ($request->target_date_from) {
            $wo->where('tanggal','>=',$request->target_date_from);
        }
        if ($request->target_date_to) {
            $wo->where('tanggal','<=',$request->target_date_to);
        }
        if ($request->branch_id) {
            $wo->where('kode_branch',$request->branch_id);
        }
        if ($request->wo_no==null&&$request->production_line_id==null&&$request->target_date_from==null&&$request->target_date_to==null&&$request->branch_id==null) {
            $wo->take(50);
        }
        $data=$wo->orderBy('wo')->orderBy('line')->orderBy('tanggal')->get();


        $map['wo']=$data;
        $map['page'] = 'production schedule - progress sewing';
        return view('ppic.schedule.woprogress_sewing', $map);
    }
    public function wo_anomali_sewing(Request $request)
    {
        $map['master_branch']=Branch::get();

        $filter_branch=[];
        if (($request->branch_id!==null)) {
            $filter_branch=$request->branch_id;
        } else {
            $filter_branch=PlannerBranch::where('nik',Auth::user()->nik)->get()->pluck('branch_id')->toArray();
        }

        $wo = Monitoring::query();
        if ($request->wo_no) {
            $wo->where('wo',$request->wo_no);
        }
        if ($request->production_line_id) {
            $wo->where('line',$request->production_line_id);
        }
        if ($request->target_date_from) {
            $wo->where('tanggal','>=',$request->target_date_from);
        }
        if ($request->target_date_to) {
            $wo->where('tanggal','<=',$request->target_date_to);
        }
        // if ($request->branch_id) {
        //     $wo->where('kode_branch',$request->branch_id);
        // }
        
        // if ($request->wo_no==null&&$request->production_line_id==null&&$request->target_date_from==null&&$request->target_date_to==null&&$request->branch_id==null) {
            // $wo->take(10);
        // }
        $data=$wo->orderBy('wo')->orderBy('line')->orderBy('tanggal')->get();

        $anomali = new Collection();
        foreach ($data as $d) {
            $isanomali=false;
            $keterangan='';
            $line_ori=$d->line;

            if (in_array($d->kode_branch,['CBA', 'CHW', 'CLN', 'CNJ2', 'CVA', 'MJ1', 'MJ2', 'MAJA'])) {
                if ($d->branchdetail=='GM1') {
                    $d->branchdetail='MJ1';
                }
                if ($d->branchdetail=='GM2') {
                    $d->branchdetail='MJ2';
                }
                if ($d->branchdetail=='GK') {
                    $d->branchdetail='KLB';
                }
                if ($d->branchdetail=='CVC') {
                    $d->branchdetail='CHW';
                }
                if ($d->branchdetail=='CVC') {
                    $d->branchdetail='CHW';
                }
                $d->line=preg_replace("/[^0-9]/", "", $d->line);
            }
            $prodline=ProductionLine::where('sub',$d->branchdetail)->where('line',$d->line)->first();
            if ($prodline==null) {
                $isanomali=true;
                $keterangan.="Line Produksi N/A";
                $d->line=$line_ori;
            } else {
                $check_exists=WorkOrderTarget::where('wo_no',$d->wo)->where('target_date',$d->tanggal)->where('production_line_id',$prodline->id)->first();
                if ($check_exists==null) {
                    $isanomali=true;
                    $keterangan.="WO/Tanggal tidak match";
                }
            }

            if ($isanomali) {
                $d->remark=$keterangan;
                $anomali=$anomali->push($d);
            }
        }

        $map['wo']=$anomali;
        $map['filter_branch']=$filter_branch;
        $map['page'] = 'production schedule - anomali sewing';
        return view('ppic.schedule.woanomali_sewing', $map);
    }
    public function get_schedule($woid,$wo_no,$order,$adjsupp,$complete,$tday,$lc1,$lc2,$lc3,$dt_start,$line_id)
    {
        $adj=new Prod_Schedule();
        $data=$adj->calc_finish_wo($woid,$wo_no,$order,$adjsupp,$complete,$tday,$lc1,$lc2,$lc3,$dt_start,$line_id);
        $count=0;
        $tgl_temp=null;
        foreach ($data as $value) {
            if ($tgl_temp!==$value['target_date']) {
                $tgl_temp=$value['target_date'];
                $count+=1;
            }
        }
        // $data=['day_estimate'=>count($data),'tgl_mulai'=>reset($data)['target_date'],'tgl_selesai'=>end($data)['target_date']];
        $data=['day_estimate'=>$count,'tgl_mulai'=>reset($data)['target_date'],'tgl_selesai'=>end($data)['target_date']];
        return response()->json($data);
    }

    public function last_line_available_date($line_id,$woid,$timing) {
        $adj=new Prod_Schedule();
        $data=$adj->last_line_available_date($line_id,$woid,$timing);
        return response()->json($data);
    }

    public function change_line_available_date($line_id,$tanggal) {
        $adj=new Prod_Schedule();
        $data=$adj->change_line_available_date($line_id,$tanggal);
        return response()->json($data);
    }

    public function simulate()
    {
        DB::beginTransaction();
        try {
            $request=
            [
                'id'=>'1',
                'production_line_id'=>'1',
                'start_date'=>'2022-04-13',
                'finish_date'=>'2022-04-14'
            ];

            $wo=WorkOrder::find($request['id']);
            $wo->update($request);

            $adj=new Prod_Schedule();
            $adj->adjust_schedule($request);



            // DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }
    public function delete($id)
    {
        try{
            DB::beginTransaction();

            $wo=WorkOrder::find($id);

            //restore or qty balance 
            $detail=RekapDetail::find($wo->rekap_detail_id);
            if ($detail) {
                $wo_qty_allocated=0;
                if ($detail->wo_qty_allocated) {
                    $wo_qty_allocated=$detail->wo_qty_allocated;
                } 
                $detail->wo_qty_allocated=$wo_qty_allocated-$wo->qty_order;
                $detail->update();
            }
            //end restore or qty balance 

            $wo->delete();

            $wot=WorkOrderTarget::where('workorder_id',$id)->delete();

            DB::commit();

            return redirect()->back();

        }catch(\Exception $e){
            DB::rollback();
            dd($e);
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }

    public function update_sewing()
    {
        try{
            DB::beginTransaction();

            $adj=new Update_Schedule();
            $adj->update_progress_produksi();

            DB::commit();

            return "Update Selesai";

        }catch(\Exception $e){
            DB::rollback();
            return Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}";
        }
    }
    public function reset_sewing()
    {
        try{
            // DB::beginTransaction();

            // $adj=WorkOrder::where('id','>',0)->update(['sewing_good' => 0]);
            // $adj=Monitoring::where('id','>',0)->delete();

            // DB::commit();

            // return "Reset Selesai";

        }catch(\Exception $e){
            DB::rollback();
            return Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}";
        }
    }

    public function get_hk_avail($prodline_id, $tgl) {
        $hk=0;

        $begin=new DateTime($tgl);
        $end=new DateTime($begin->format('Y-m-t'));
        $end->modify('+1 day');

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);

        // $cek_libur=new Prod_Schedule();
        $ps=new Prod_Schedule();
        foreach ($period as $dt) {
            // if ($cek_libur->isLibur($prodline_id,$dt->format('Y-m-d'),false)==0) {
            //     $hk+=1;
            // }

            $ho=Holiday::where('date',$dt->format('Y-m-d'))->get()->count();
            $wk=$ps->isWeekend($dt->format('Y-m-d'), 5);
            if ($ho==0&&$wk==false) {
                $hk+=1;
            }

        }
        return $hk;
    }

    public function testsaja() {

        // $purch=new Email_Purchasing;
        // $purch=$purch->query_po('trim','');
        // $map['data']=$purch;

        // $filename='PO_Open_2Weeks_2022_08_24.xlsx';
        // $report_info=[
        //     'filename' => $filename,
        //     'view' => 'purchasing.email.po_open_2weeks.excel_po_2weeks',
        //     'data' => $purch
        // ];

        // return Excel::download(new PurchasingPOExport($report_info), 'patients.xlsx');
        // return view('purchasing.email.po_open_2weeks.excel_po_2weeks', $map);

        // $list_wo=CuttingPPIC::get();
        // foreach ($list_wo as $aa) {
        //     $cek_comp=CuttingComponentPPIC::where('no_wo',$aa->no_wo)->first();
        //     if ($cek_comp==null) {
        //             $wojde=WorkOrderJDE::where('F4801_DOCO',$aa->no_wo)->first();
        //             if ($wojde) {
    
        //                 $url=config('app.url_jdeapi').'/bom/search=?KIT='.$wojde->F4801_ITM.'&select=F3002_ITM|F3002_DSC1|F3002_KIT|F3002_KITL|F3002_QNTY|F3002_UM|F3002_URCD|F3002_FTRC|F3002_OPSQ';
        //                 $client = new Client();
        //                 $request = $client->get($url);
        //                 $response = json_decode($request->getBody());
    
        //                 foreach ($response as $d) {

        //                     if ($d->F3002_OPSQ==10) {
        //                         $cek_glpt=ItemNumber::where('F4101_ITM',$d->F3002_ITM)->first();
        //                         if ($cek_glpt) {
        //                             if (in_array($cek_glpt->F4101_GLPT,['INFA','ININ'])) {
        //                                 $new=new CuttingComponentPPIC();
        //                                 $new->no_wo=$wojde->F4801_DOCO;
        //                                 $new->item_number=$cek_glpt->F4101_ITM;
        //                                 $new->item_desc=$d->F3002_OPSQ.' - '.$cek_glpt->F4101_DSC2.' '.$cek_glpt->F4101_SRTX;
        //                                 $new->desc=$cek_glpt->F4101_DSC2;
        //                                 $new->seq=$d->F3002_OPSQ;
        //                                 $new->srtx=$cek_glpt->F4101_SRTX;
    
        //                                 $color=explode("|",$d->F3002_DSC1);
        //                                 $new->remark=$color[1];
        //                                 $new->save();
        //                             }
        //                         }
        //                     }
        //                 }
        //         }


        //     }

        // }

        return 'done';

    }

    public function filter(callable $callback = null)
    {
        if ($callback) {
            return new static(Arr::where($this->items, $callback));
        }

        return new static(array_filter($this->items));
    }


// ############################################## REPORTING ##############################################

    public function report_actual_scheduling_()
    {
        $branch=MasterBranchWorkDay::get();
        $map['page']='Report Actual Scheduling';
        $map['data']=$branch;
        return view('ppic.schedule.report.actual_scheduling.index', $map);
    }
    public function report_actual_scheduling(Request $request)
    {
        $master_line=ProductionLine::query();
        if ($request['branch_id']&&$request['branch_id']!=='0') {
            $master_line->where('branch_id',$request['branch_id']);
        }
        $master_line=$master_line->where('is_active','>=',1)->OrderBy('branch_id')->OrderBy('sub')->OrderBy('id')->get();
        
        $data = new Collection();
        foreach ($master_line as $d) {
            $temp=new Collection([
                'factory' => $d->sub,
                'line' => 'L '.$d->line,
                'jan' => $this->get_qty_monthly(1,$d->id),
                'feb' => $this->get_qty_monthly(2,$d->id),
                'mar' => $this->get_qty_monthly(3,$d->id),
                'apr' => $this->get_qty_monthly(4,$d->id),
                'mei' => $this->get_qty_monthly(5,$d->id),
                'jun' => $this->get_qty_monthly(6,$d->id),
                'jul' => $this->get_qty_monthly(7,$d->id),
                'aug' => $this->get_qty_monthly(8,$d->id),
                'sep' => $this->get_qty_monthly(9,$d->id),
                'okt' => $this->get_qty_monthly(10,$d->id),
                'nov' => $this->get_qty_monthly(11,$d->id),
                'des' => $this->get_qty_monthly(12,$d->id)
            ]);
            $data=$data->push($temp);
        }
        $map['page']='Report Actual Scheduling';
        $map['data']=$data;
        return view('ppic.schedule.report.actual_scheduling.show', $map);
    }

    public function report_loading_capacity_()
    {
        $branch=MasterBranchWorkDay::get();
        $map['page']='Report Loading Capacity';
        $map['data']=$branch;
        return view('ppic.schedule.report.loading_capacity.index', $map);
    }
    public function report_loading_capacity(Request $request)
    {
        $master_line=ProductionLine::query();
        if ($request['branch_id']&&$request['branch_id']!=='0') {
            $master_line->where('branch_id',$request['branch_id']);
        }
        // $master_line=$master_line->where('id',6);
        $master_line=$master_line->where('is_active','>=',1)->OrderBy('branch_id')->OrderBy('sub')->OrderBy('id')->get();
        
        //get end sewing per line produksi
        $line_end_sewing = new Collection();
        $min_date=date('Y-m-d');
        foreach ($master_line as $d) {
            $jam_ker=MasterBranchWorkDay::where('id',$d->branch_id)->first()->workhour;
            $wo=WorkOrder::where('production_line_id',$d->id)->orderBy('finish_date','desc')->first();            
            $finish_date='';
            if ($wo) {
                $finish_date=$wo->finish_date;
            }
            $cp=CapabilityLine::where('production_line_id',$d->id)->orderBy('persentase','desc')->take(5)->get();
            if (count($cp)==0) {
                $temp=new Collection([
                    'prodline_id' => $d->id,
                    'line' => 'L '.$d->line,
                    'factory' => $d->sub,
                    'endsewing' => $finish_date,
                    'total_op'=> $d->total_operator,
                    'jam_kerja'=>$jam_ker,
                    'buyer'=>'',
                    'item'=>'',
                    'persentase'=>0,
                    'smv'=>0
                ]);
                $line_end_sewing=$line_end_sewing->push($temp);
            } else {
                foreach ($cp as $v) {
                    $temp=new Collection([
                        'prodline_id' => $d->id,
                        'line' => 'L '.$d->line,
                        'factory' => $d->sub,
                        'endsewing' => $finish_date,
                        'total_op'=> $d->total_operator,
                        'jam_kerja'=>$jam_ker,
                        'buyer'=>$v->buyer,
                        'item'=>$v->item,
                        'persentase'=>$v->persentase,
                        'smv'=>MasterSmv::where('item',$v->item)->sum('smv_minute') //todo : ambil smv by style juga, karena item bisa byk style
                    ]);
                    $line_end_sewing=$line_end_sewing->push($temp);
                }
            }

            if ($finish_date!==''&&$min_date>$finish_date) {
                $min_date=$finish_date;
            }
        }
        //end get end sewing per line produksi

        //get top 5 line capability
        $future_month=8;
        $data = new Collection();
        foreach ($line_end_sewing as $v) {

            $month_num=(int)date("m",strtotime($min_date));
            $year=(int)date("Y",strtotime($min_date));
            $periode_endsewing=(int)date("Ym",strtotime($v['endsewing']));
            $periode=0;

            $month_forecast=[];
            $month_forecast=array_merge($month_forecast,$v->toArray());
            for($i = 1; $i<=$future_month; $i++) {
                if ($month_num>12) {
                    $month_num=1;
                    $year+=1;
                }
                $periode=(int)$year.$month_num;
                if ($month_num<10) {
                    $periode=(int)$year.'0'.$month_num;
                }
                $month_dsc=DateHelper::getMonthName($month_num);

                $harikerja_tersedia=0;
                $kapasitas_tersedia=0;

                if ($periode>=$periode_endsewing) {
                    if ($periode==$periode_endsewing) {
                        $harikerja_tersedia=$this->get_hk_avail($v['prodline_id'],$v['endsewing']);
                    } else {
                        $harikerja_tersedia=$this->get_hk_avail($v['prodline_id'],$year.'-'.$month_num.'-01');
                    }
                }
                $month_forecast=array_merge($month_forecast,['bln_'.$i=>$month_dsc,'prd_'.$i=>$periode,'kap_'.$i=>$kapasitas_tersedia,'hkj_'.$i=>$harikerja_tersedia]);
                $month_num+=1;
            }
            $data=$data->push($month_forecast);
        }

        //List month
        $bulan=[];
        if ($data) {
            for($i = 1; $i<=$future_month; $i++) {
                $bulan=array_merge($bulan,['bulan'.$i=>$data->first()['bln_'.$i]]);
            }
        }

        $map['page']='Report Loading Capacity';
        $map['data']=$data;
        $map['bulan']=$bulan;
        $map['min_date']=$min_date;
        return view('ppic.schedule.report.loading_capacity.show', $map);
    }

    public function report_kapasitas_from_sales_()
    {
        $branch=MasterBranchWorkDay::get();
        $map['page']='Report Actual Scheduling';
        $map['data']=$branch;

        $map['datefrom'] = date('Y-m-'.'01');
        $map['dateto'] = WorkOrderTarget::select('target_date')->orderBy('target_date','desc')->first();

        return view('ppic.schedule.report.kapasitas_from_sales.index', $map);
    }
    public function report_kapasitas_from_sales(Request $request)
    {

        $master_line=ProductionLine::query();
        if ($request['branch_id']&&$request['branch_id']!=='0') {
            $master_line->where('branch_id',$request['branch_id']);
        }
        $master_line=$master_line->where('is_active','>=',1)->OrderBy('branch_id')->OrderBy('sub')->OrderBy('id')->get();
        
        $data = new Collection();
        foreach ($master_line as $d) {

            $sql="
            SELECT 
                production_line_id,
                workorder_id,
                wo_no,
                COALESCE(SUM(total_hour),0) AS 'total_qty',
                CONCAT(YEAR(target_date),'-',MONTH(target_date)) AS 'tahunbulan',
                YEAR(target_date) AS 'tahun',
                MONTH(target_date) AS 'bulan' 
            FROM
                workorder_target
            WHERE
                production_line_id = ".$d->id." AND
                target_date >= '".$request['target_date_from']."'
            ";
            if ($request['target_date_to']!==null&&$request['target_date_to']!=='') {
                $sql.=" AND target_date <= '".$request['target_date_to']."' ";
            }
            $sql.="
            GROUP BY 
                workorder_id,
                production_line_id,
                tahunbulan 
            HAVING total_qty > 0 
            ORDER BY target_date ;
            ";
            $data_wo=collect(DB::connection('mysql_prod_sch')->select(DB::raw($sql)));

            foreach ($data_wo as $d1) {
                $wo=WorkOrder::find($d1->workorder_id);
                if ($wo) {
                    $factory='';
                    $buyer='';
                    $style='';
                    // $insewing=WorkOrderTarget::select('target_date')->where('workorder_id',$d1->workorder_id)->where('production_line_id',$d1->production_line_id)->whereRaw("YEAR(target_date)='".$d1->tahun."'")->whereRaw("MONTH(target_date)='".$d1->bulan."'")->orderBy('target_date','asc')->first();
                    // $outsewing=WorkOrderTarget::select('target_date')->where('workorder_id',$d1->workorder_id)->where('production_line_id',$d1->production_line_id)->whereRaw("YEAR(target_date)='".$d1->tahun."'")->whereRaw("MONTH(target_date)='".$d1->bulan."'")->orderBy('target_date','desc')->first();;
                    
                    $insewing=WorkOrderTarget::select('target_date')->where('workorder_id',$d1->workorder_id)->where('production_line_id',$d1->production_line_id)->whereYear('target_date',$d1->tahun)->whereMonth('target_date',$d1->bulan)->orderBy('target_date','asc')->first()->target_date;
                    $outsewing=WorkOrderTarget::select('target_date')->where('workorder_id',$d1->workorder_id)->where('production_line_id',$d1->production_line_id)->whereYear('target_date',$d1->tahun)->whereMonth('target_date',$d1->bulan)->orderBy('target_date','desc')->first()->target_date;
                    $bulanproduksi=$d1->bulan.'.'.date("F", mktime(0, 0, 0, $d1->bulan, 10));
                    $deliveryori=$wo->shipment_date;
                    $bulandelivery=date('n', strtotime($wo->shipment_date)).'.'.date("F", strtotime($wo->shipment_date));

                    $cm=0;
                    $fob=0;
                    $amount_cm=0;
                    $amount_fob=0;
                    $kategori=0;

                    if ($d->branch) {
                        $factory=$d->branch->branch_kode;
                    }
                    if ($wo->rekap_detail&&$wo->rekap_detail->rekap_order&&$wo->rekap_detail->rekap_order->buyerjde) {
                        $buyer=$wo->rekap_detail->rekap_order->buyerjde->F0101_ALPH;
                    }
                    if ($wo->rekap_detail) {
                        $style=$wo->rekap_detail->style_name;
                    }
                    if ($wo->rekap_detail) {
                        $cm=floatval(trim(preg_replace('/\s\s+/', '', $wo->rekap_detail->cm))); 
                    }
                    if ($wo->rekap_detail) {
                        $fob=floatval(trim(preg_replace('/\s\s+/', '', $wo->rekap_detail->nilai)));
                        if ($wo->rekap_detail->quantity_pack>=1&&$wo->rekap_detail->quantity_pack<=10) {
                            $fob=round(floatval(trim(preg_replace('/\s\s+/', '', $wo->rekap_detail->nilai/$wo->rekap_detail->quantity_pack))),2);
                        }
                    }
                    $amount_cm=$cm*$d1->total_qty;
                    $amount_fob=$fob*$d1->total_qty;

                    if ($wo->rekap_detail&&$wo->rekap_detail->rekap_order) {
                        $kategori=$wo->rekap_detail->rekap_order->standar;
                    }

                    $temp=new Collection([
                        'factory' => $factory,
                        'buyer' => $buyer,
                        'style' => $style,
                        'line' => 'L '.$d->line,
                        'qty' => $d1->total_qty,
                        'insewing' => $insewing,
                        'endsewing' => $outsewing,
                        'bulanproduksi' => $bulanproduksi,
                        'deliveryori' => $deliveryori,
                        'bulandelivery' => $bulandelivery,
                        'cm' => $cm,
                        'fob' => $fob,
                        'amount_cm' => $amount_cm,
                        'amount_fob' => $amount_fob,
                        'kategori' => $kategori
                    ]);
                    $data=$data->push($temp);
                }
            }
        }
        $map['page']='Report Kapasitas from Sales';
        $map['data']=$data;
        return view('ppic.schedule.report.kapasitas_from_sales.show', $map);
    }

    public function report_facility_monthly_()
    {
        $branch=MasterBranchWorkDay::get();
        $map['page']='Report Facility Monthly';
        $map['data']=$branch;
        return view('ppic.schedule.report.monthly_facility.index', $map);
    }
    public function report_facility_monthly(Request $request)
    {
        $master_line=ProductionLine::query();
        if ($request['branch_id']&&$request['branch_id']!=='0') {
            $master_line->where('branch_id',$request['branch_id']);
        }
        $master_line=$master_line->where('is_active','>=',1)->OrderBy('branch_id')->OrderBy('sub')->OrderBy('id')->get();
        
        $data = new Collection();
        foreach ($master_line as $d) {
            $temp=new Collection([
                'factory' => $d->sub,
                'line' => 'L '.$d->line,
                'jan' => $this->get_qty_monthly(1,$d->id),
                'feb' => $this->get_qty_monthly(2,$d->id),
                'mar' => $this->get_qty_monthly(3,$d->id),
                'apr' => $this->get_qty_monthly(4,$d->id),
                'mei' => $this->get_qty_monthly(5,$d->id),
                'jun' => $this->get_qty_monthly(6,$d->id),
                'jul' => $this->get_qty_monthly(7,$d->id),
                'aug' => $this->get_qty_monthly(8,$d->id),
                'sep' => $this->get_qty_monthly(9,$d->id),
                'okt' => $this->get_qty_monthly(10,$d->id),
                'nov' => $this->get_qty_monthly(11,$d->id),
                'des' => $this->get_qty_monthly(12,$d->id)
            ]);
            $data=$data->push($temp);
        }
        $map['page']='Report Facility Monthly';
        $map['data']=$data;
        return view('ppic.schedule.report.monthly_facility.show', $map);
    }

    public function report_facility_buyer_()
    {
        $branch=MasterBranchWorkDay::get();
        $map['page']='Report Facility Buyer';
        $map['data']=$branch;
        return view('ppic.schedule.report.facility_buyer.index', $map);
    }
    public function report_facility_buyer(Request $request)
    {
        $master_line=ProductionLine::query();
        if ($request['branch_id']&&$request['branch_id']!=='0') {
            $master_line->where('branch_id',$request['branch_id']);
        }
        // $master_line->where('id',2);
        $master_line=$master_line->where('is_active','>=',1)->OrderBy('branch_id')->OrderBy('sub')->OrderBy('id')->get();
        
        $data = new Collection();
        foreach ($master_line as $d) {
            $temp=new Collection([
                'factory' => $d->sub,
                'line' => 'L '.$d->line,
                'buyer' => $this->get_buyer_concat($d->id),
                'jan' => $this->get_qty_monthly(1,$d->id),
                'feb' => $this->get_qty_monthly(2,$d->id),
                'mar' => $this->get_qty_monthly(3,$d->id),
                'apr' => $this->get_qty_monthly(4,$d->id),
                'mei' => $this->get_qty_monthly(5,$d->id),
                'jun' => $this->get_qty_monthly(6,$d->id),
                'jul' => $this->get_qty_monthly(7,$d->id),
                'aug' => $this->get_qty_monthly(8,$d->id),
                'sep' => $this->get_qty_monthly(9,$d->id),
                'okt' => $this->get_qty_monthly(10,$d->id),
                'nov' => $this->get_qty_monthly(11,$d->id),
                'des' => $this->get_qty_monthly(12,$d->id)
            ]);
            $data=$data->push($temp);
        }
        $map['page']='Report Facility Buyer';
        $map['data']=$data;
        return view('ppic.schedule.report.facility_buyer.show', $map);
    }

    public function get_buyer_concat($line_id)
    {
        $list_buyer='';
        $wot=WorkOrderTarget::where('production_line_id',$line_id)->whereRaw('YEAR(target_date) = YEAR(CURDATE())')->groupBy('workorder_id')->get();

        foreach ($wot as $d) {
            if ($d->wo) {
                if ($d->wo->rekap_detail) {
                    if ($d->wo->rekap_detail->rekap_order) {
                        if ($d->wo->rekap_detail->rekap_order->buyerjde) {
                            $buyer=substr($d->wo->rekap_detail->rekap_order->buyerjde->F0101_ALPH,0,10);
                            if ($buyer!==''&&str_contains($list_buyer, $buyer)==false) {
                                if ($list_buyer!=='') {
                                    $list_buyer.=', ';
                                }
                                $list_buyer.=$buyer;
                            }
                        }
                    }
                }
            }
        }
        return $list_buyer;
    }

    public function get_qty_monthly($period,$line_id)
    {
        $sql="
            SELECT 
                COALESCE(SUM(total_hour),0) AS total
            FROM 
                workorder_target 
            WHERE 
                MONTH(target_date) = ".$period." AND 
                YEAR(target_date) = YEAR(CURDATE()) AND 
                production_line_id = ".$line_id.";
        ";
        $total=collect(DB::connection('mysql_prod_sch')->select(DB::raw($sql)));
        return $total->first()->total;
    }

    public function report_pending_or_()
    {
        $branch=MasterBranchWorkDay::get();
        $map['page']='Report Pending OR';
        $map['data']=$branch;
        return view('ppic.schedule.report.pending_or.index', $map);
    }
    public function report_pending_or(Request $request)
    {
        $master_or=RekapDetail::query();
        if ($request->exfact_from) {
            $master_or->where('ex_fact','>=',$request->exfact_from);
        }
        if ($request->exfact_to) {
            $master_or->where('ex_fact','<=',$request->exfact_to);
        }
        $master_or=$master_or->where('wo_qty_balance','>',0)->orderBy('ex_fact','asc')->get();
        $map['page']='Report Pending OR';
        $map['data']=$master_or;
        return view('ppic.schedule.report.pending_or.show', $map);
    }

    public function report_summary_order_()
    {
        $branch=Branch::get();
        $map['branch']=$branch;
        $map['page']='Report Summary Order';
        return view('ppic.schedule.report.summary_order.index', $map);
    }
    public function report_summary_order_notuse_(Request $request)
    {
        $master_or=RekapDetail::query();
        if ($request->exfact_from) {
            $master_or->where('ex_fact','>=',$request->exfact_from);
        }
        if ($request->exfact_to) {
            $master_or->where('ex_fact','<=',$request->exfact_to);
        }
        $master_or->orderBy('ex_fact','asc');
        $master_or=$master_or->orderBy('no_or','asc')->get();

        $data=new Collection();
        foreach ($master_or as $d) {
            $wo=WorkOrder::where('rekap_detail_id',$d->id)->get();

            $buyer='';
            if ($d->rekap_order!==null&&$d->rekap_order->buyerjde!==null) {
                $buyer=$d->rekap_order->buyerjde->F0101_ALPH;
            }

            $cm=floatval(trim(preg_replace('/\s\s+/', '', $d->cm))); 
            $fob=floatval(trim(preg_replace('/\s\s+/', '', $d->nilai)));
            if ($d->quantity_pack>=1&&$d->quantity_pack<=10) {
                $fob=round(floatval(trim(preg_replace('/\s\s+/', '', $d->nilai/$d->quantity_pack))),2);
            }

            if (count($wo)==0) {
                $amount_cm=$cm*$d->total_breakdown;
                $amount_fob=$fob*$d->total_breakdown;
                $standar='';
                if ($d->rekap_order!==null) {
                    $standar=$d->rekap_order->standar;
                }

                $temp=new Collection([
                    'factory' => '',
                    'buyer' => $buyer,
                    'item' => $d->product_name,
                    'style' => $d->style_name,
                    'qty' => $d->total_breakdown,
                    'kategori' => $standar,
                    'cm' => $cm,
                    'fob' => $fob,
                    'amount_cm' => $amount_cm,
                    'amount_fob' => $amount_fob,
                    'or' => $d->no_or,
                    'wo' => '',
                    'tahun' => date('Y',strtotime($d->ex_fact)),
                    'bulan' => date('m',strtotime($d->ex_fact)),
                    'vessel_date' => $d->ex_fact,
                    'deliv_date' => $d->ex_fact,
                    'week_tod' => $this->weekOfMonth($d->ex_fact),
                    'adding_process' => ''
                ]);
                $data=$data->push($temp);
            }
            foreach ($wo as $d1) {
                $adding_process='NO ADD PROSES';
                if ($d1->adding_process=='1') {
                    $adding_process='ADDING';
                }
                $amount_cm=$cm*$d1->qty_order;
                $amount_fob=$fob*$d1->qty_order;
                $standar='';
                if ($d->rekap_order!==null) {
                    $standar=$d->rekap_order->standar;
                }
                $temp=new Collection([
                    'factory' => $d1->prod_line->sub,
                    'buyer' => $buyer,
                    'item' => $d->product_name,
                    'style' => $d->style_name,
                    'qty' => $d1->qty_order,
                    'kategori' => $standar,
                    'cm' => $cm,
                    'fob' => $fob,
                    'amount_cm' => $amount_cm,
                    'amount_fob' => $amount_fob,
                    'or' => $d->no_or,
                    'wo' => $d1->wo_no,
                    'tahun' => date('Y',strtotime($d->ex_fact)),
                    'bulan' => date('m',strtotime($d->ex_fact)),
                    'vessel_date' => $d->ex_fact,
                    'deliv_date' => $d->ex_fact,
                    'week_tod' => $this->weekOfMonth($d->ex_fact),
                    'adding_process' => $adding_process
                ]);
                $data=$data->push($temp);
            }
        }

        $map['data']=$data;
        $map['page']='Report Summary Order';
        return view('ppic.schedule.report.summary_order.show', $map);
    }

    public function report_summary_order(Request $request)
    {
        $master_or=WorkOrder::query();
        if ($request->exfact_from) {
            $master_or->where('shipment_date','>=',$request->exfact_from);
        }
        if ($request->exfact_to) {
            $master_or->where('shipment_date','<=',$request->exfact_to);
        }
        if ($request->branch_id&&$request->branch_id!=='') {
            $line_id=ProductionLine::where('branch_id',$request->branch_id)->pluck('id');
            $master_or->whereIn('production_line_id',$line_id);
        }
        $master_or->orderBy('shipment_date','asc');
        $master_or=$master_or->orderBy('rekap_detail_id','asc')->get();

        $data=new Collection();
        foreach ($master_or as $d) {
            $buyer='';
            $cm=0;
            $fob=0;
            $product_name='';
            $style_name='';
            $no_or='';
            $standar='';
            if ($d->rekap_detail!==null) {
                if ($d->rekap_detail->rekap_order!==null&&$d->rekap_detail->rekap_order->buyerjde!==null) {
                    $buyer=$d->rekap_detail->rekap_order->buyerjde->F0101_ALPH;
                    $standar=$d->rekap_detail->rekap_order->standar;
                }
                $cm=floatval(trim(preg_replace('/\s\s+/', '', $d->rekap_detail->cm))); 
                $fob=floatval(trim(preg_replace('/\s\s+/', '', $d->rekap_detail->nilai)));

                if ($d->rekap_detail->quantity_pack>=1&&$d->rekap_detail->quantity_pack<=10) {
                    $fob=round(floatval(trim(preg_replace('/\s\s+/', '', $d->rekap_detail->nilai/$d->rekap_detail->quantity_pack))),2);
                }

                $product_name=$d->rekap_detail->product_name;
                $style_name=$d->rekap_detail->style_name;
                $no_or=$d->rekap_detail->no_or;

            }

            $adding_process='NO ADD PROSES';
            if ($d->adding_process=='1') {
                $adding_process='ADDING';
            }
            $amount_cm=$cm*$d->qty_order;
            $amount_fob=$fob*$d->qty_order;
         
            $tarikan_date=DateTime::createFromFormat('Y-m-d', $d->shipment_date);
            $tarikan_date->modify('-1 months');
            $tarikan_date=$tarikan_date->format('Y-m-t');
            if ($d->tarikan=='tarikan'&&$tarikan_date<$request->exfact_from) {
                //do nothing
            } else {
                $temp=new Collection([
                    'factory' => $d->prod_line->sub,
                    'buyer' => $buyer,
                    'item' => $product_name,
                    'style' => $style_name,
                    'qty' => $d->qty_order,
                    'kategori' => $standar,
                    'cm' => $cm,
                    'fob' => $fob,
                    'amount_cm' => $amount_cm,
                    'amount_fob' => $amount_fob,
                    'or' => $no_or,
                    'wo' => $d->wo_no,
                    'tahun' => date('Y',strtotime($d->shipment_date)),
                    'bulan' => date('m',strtotime($d->shipment_date)),
                    'vessel_date' => $d->shipment_date,
                    'deliv_date' => $d->shipment_date,
                    'week_tod' => $this->weekOfMonth($d->shipment_date),
                    'adding_process' => $adding_process,
                    'tarikan' => $d->tarikan
                ]);
                $data=$data->push($temp);
            }
        }

        $cari_tarikan_next=$this->report_summary_order_tarikan_next($request->branch_id,$request->exfact_to);
        if (count($cari_tarikan_next)>0) {
            foreach ($cari_tarikan_next as $d) {
                $data=$data->push($d);
            }
        }

        $map['data']=$data;
        $map['page']='Report Summary Order';
        return view('ppic.schedule.report.summary_order.show', $map);
    }

    public function report_summary_order_tarikan_next($branch_id,$last_date)
    {
        $last_date=DateTime::createFromFormat('Y-m-d', $last_date);
        $last_date=$last_date->format('Y-m-01');

        $tarikan_from=DateTime::createFromFormat('Y-m-d', $last_date);
        $tarikan_from->modify('+1 months');
        $tarikan_from=$tarikan_from->format('Y-m-01');

        $tarikan_to=DateTime::createFromFormat('Y-m-d', $last_date);
        $tarikan_to->modify('+1 months');
        $tarikan_to=$tarikan_to->format('Y-m-t');

        $master_or=WorkOrder::query();
        $master_or->where('shipment_date','>=',$tarikan_from)->where('shipment_date','<=',$tarikan_to);
        $master_or->where('tarikan','tarikan');
        if ($branch_id&&$branch_id!=='') {
            $line_id=ProductionLine::where('branch_id',$branch_id)->pluck('id');
            $master_or->whereIn('production_line_id',$line_id);
        }
        $master_or->orderBy('shipment_date','asc');
        $master_or=$master_or->orderBy('rekap_detail_id','asc')->get();

        $data=new Collection();
        foreach ($master_or as $d) {
            $buyer='';
            $cm=0;
            $fob=0;
            $product_name='';
            $style_name='';
            $no_or='';
            $standar='';
            if ($d->rekap_detail!==null) {
                if ($d->rekap_detail->rekap_order!==null&&$d->rekap_detail->rekap_order->buyerjde!==null) {
                    $buyer=$d->rekap_detail->rekap_order->buyerjde->F0101_ALPH;
                    $standar=$d->rekap_detail->rekap_order->standar;
                }
                $cm=floatval(trim(preg_replace('/\s\s+/', '', $d->rekap_detail->cm))); 
                $fob=floatval(trim(preg_replace('/\s\s+/', '', $d->rekap_detail->nilai)));

                if ($d->rekap_detail->quantity_pack>=1&&$d->rekap_detail->quantity_pack<=10) {
                    $fob=round(floatval(trim(preg_replace('/\s\s+/', '', $d->rekap_detail->nilai/$d->rekap_detail->quantity_pack))),2);
                }

                $product_name=$d->rekap_detail->product_name;
                $style_name=$d->rekap_detail->style_name;
                $no_or=$d->rekap_detail->no_or;

            }

            $adding_process='NO ADD PROSES';
            if ($d->adding_process=='1') {
                $adding_process='ADDING';
            }
            $amount_cm=$cm*$d->qty_order;
            $amount_fob=$fob*$d->qty_order;
         
            $temp=new Collection([
                'factory' => $d->prod_line->sub,
                'buyer' => $buyer,
                'item' => $product_name,
                'style' => $style_name,
                'qty' => $d->qty_order,
                'kategori' => $standar,
                'cm' => $cm,
                'fob' => $fob,
                'amount_cm' => $amount_cm,
                'amount_fob' => $amount_fob,
                'or' => $no_or,
                'wo' => $d->wo_no,
                'tahun' => date('Y',strtotime($d->shipment_date)),
                'bulan' => date('m',strtotime($d->shipment_date)),
                'vessel_date' => $d->shipment_date,
                'deliv_date' => $d->shipment_date,
                'week_tod' => $this->weekOfMonth($d->shipment_date),
                'adding_process' => $adding_process,
                'tarikan' => $d->tarikan
            ]);
            $data=$data->push($temp);
        }
        return $data;
    }

    function weekOfMonth($date) {
        $firstOfMonth = date("Y-m-01", strtotime($date));
        return intval(date("W", strtotime($date))) - intval(date("W", strtotime($firstOfMonth)));
    }

    public function report_smv_()
    {
        $branch=MasterBranchWorkDay::get();
        $map['page']='Report SMV';
        $map['data']=$branch;
        return view('ppic.schedule.report.smv.index', $map);
    }
    public function report_smv(Request $request)
    {
        $master_smv=MasterSmv::query();
        if ($request->buyer) {
            $master_smv->WhereRaw("(buyer LIKE '%".$request->buyer."%')");
        }
        if ($request->style) {
            $master_smv->WhereRaw("(style LIKE '%".$request->style."%')");
        }
        if ($request->item) {
            $master_smv->WhereRaw("(item LIKE '%".$request->item."%')");
        }

        $master_smv=$master_smv->orderBy('buyer')->orderBy('style')->orderBy('item')->get();
        $master_smv=$master_smv->groupBy('style')->map(function($row) {
            $firstRow=$row->first();
            $groupMesin=$row->groupBy('mesin');
            $groupMesinStr='';
            $totalsmv=0;
            foreach ($groupMesin as $key=>$dt) {
                if ($groupMesinStr!=='') {
                    $groupMesinStr.=', ';
                }
                $groupMesinStr.=$key;
                $totalsmv+=$dt->sum('smv_minute');
            }
            return [
                'buyer' => $firstRow['buyer'],
                'style' => $firstRow['style'],
                'item' => $firstRow['item'],
                'totalsmv' => $totalsmv,
                'mesin' => $groupMesinStr,
            ];
        });

        $map['page']='Report SMV';
        $map['data']=$master_smv;
        return view('ppic.schedule.report.smv.show', $map);
    }

    public function report_capabilityline_()
    {
        $sql="
        SELECT 
            SUBSTR(F4801_LITM,1,5) AS item
        FROM
            t_v4801c
        GROUP BY 
            SUBSTR(F4801_LITM,1,5)
        ";
        $map['master_item']=collect(DB::connection('mysql_jdeapi')->select(DB::raw($sql)));

        $sql="
        SELECT 
            SUBSTR(F4801_LITM,6,3) AS buyer
        FROM
            t_v4801c
        GROUP BY 
            SUBSTR(F4801_LITM,6,3)
        ";
        $map['master_buyer']=collect(DB::connection('mysql_jdeapi')->select(DB::raw($sql)));

        $map['page']='Report Capability Line';
        return view('ppic.schedule.report.capabilityline.index', $map);
    }
    public function report_capabilityline(Request $request)
    {
        $sql="
        SELECT 
            SUBSTR(F4801_LITM,1,5) AS item
        FROM
            t_v4801c
        GROUP BY 
            SUBSTR(F4801_LITM,1,5)
        ";
        $map['master_item']=collect(DB::connection('mysql_jdeapi')->select(DB::raw($sql)));

        $sql="
        SELECT 
            SUBSTR(F4801_LITM,6,3) AS buyer
        FROM
            t_v4801c
        GROUP BY 
            SUBSTR(F4801_LITM,6,3)
        ";
        $map['master_buyer']=collect(DB::connection('mysql_jdeapi')->select(DB::raw($sql)));

        $data=CapabilityLine::query();
        if ($request->spv) {
            $data->WhereRaw("(spv LIKE '%".$request->spv."%')");
        }
        if ($request->production_line_id) {
            $data->Where('production_line_id',$request->production_line_id);
        }
        if ($request->line_sub) {
            $data->Where('line_sub',$request->line_sub);
        }
        if ($request->item) {
            $data->Where('item',$request->item);
        }
        $data=$data->orderBy('production_line_id')->orderBy('item')->get();

        $map['page']='Report Capability Line';
        $map['data']=$data;
        return view('ppic.schedule.report.capabilityline.show', $map);
    }

    public function report_plancutting_()
    {
        $map['datefrom']=date('Y-m-d');
        $map['page']='Report Plan Cutting';
        return view('ppic.schedule.report.plancutting.index', $map);
    }
    public function report_plancutting(Request $request)
    {
        $data=WorkOrder::query();
        if ($request->target_date_from) {
            $data->Where('cutting_date','>=',$request->target_date_from);
        }
        if ($request->target_date_to) {
            $data->Where('cutting_date','<=',$request->target_date_to);
        }
        $data=$data->orderBy('cutting_date')->orderBy('wo_no')->get();

        $map['page']='Report Plan Cutting';
        $map['data']=$data;
        return view('ppic.schedule.report.plancutting.show', $map);
    }

    public function report_ekspor_plan_()
    {
        $map['datefrom']=date('Y-m-d');
        $map['page']='Report Plan Cutting';
        return view('ppic.schedule.report.ekspor_plan.index', $map);
    }
    public function report_ekspor_plan(Request $request)
    {
        $dt_from=$request->target_date_from;
        $dt_to=$request->target_date_to;
        $wo=WorkOrder::where('shipment_date','>=',$dt_from)->where('shipment_date','<=',$dt_to)->orderBy('shipment_date')->get();
        $map['period']=$request;
        $map['weeksmonth']=$this->DateweekOfMonth($request->target_date_from);
        $map['data']=$wo;
        $map['page']='Report Plan Cutting';
        return view('ppic.schedule.report.ekspor_plan.show', $map);
    }

    public function report_ekspor_plan_bak(Request $request)
    {
        // ekspor plan sama persis dgn jde plan ekspor
        // edisi dibuang sayang, barangkali kedepan diperlukan

        $url=config('app.url_jdeapi').'/ekspor_plan'; 
        $response = Http::post($url, [
            'date_from' => $request->target_date_from,
            'date_to' => $request->target_date_to,
            'limit' => '6000',
        ]);

        $group_buyer=collect($response->json())->groupBy('F4211_AN8',true)->map(function ($value, $key) {
            return $key;
        });

        $group_peb=collect($response->json())->groupBy('F4211_DOCO',true)->map(function ($value, $key) {
            return $key;
        });

        $url=config('app.url_jdeapi').'/ekspor_plan_disc_bycust'; 
        $disc_buyer = collect((Http::post($url, [
            'buyer' => $group_buyer,
            'limit' => '3000'
        ]))->json());
        
        $url=config('app.url_jdeapi').'/ekspor_plan_disc_bypeb'; 
        $disc_doco = collect((Http::post($url, [
            'doco' => $group_peb,
            'limit' => '3000'
        ]))->json());

        $response=collect($response->json())->map(function ($response) use($disc_buyer,$disc_doco) {
            $old_arr=$response;
            $buyer=substr($response['F4211_LITM'],5,3);
            $ctr=AddressBook::where('F0101_AN8',$response['F4211_AN8'])->first();
            $buyer=UserDefinedCode::where('F0005_SY','55')
                                  ->where('F0005_RT','07')
                                  ->whereRaw("F0005_KY LIKE '%".$buyer."%'")->first();

            $old_arr['tanggal_ship']=DateTime::createFromFormat('Ymd', $response['F4211_RSDJ'])->format('Y-m-d');
            $old_arr['buyer']=$buyer==null?$ctr->F0101_ALPH:$buyer->F0005_DL01;
            $old_arr['dest']=$ctr==null?'':$ctr->F0116_CTR;
            $old_arr['disc']=0;

            $search_disc_buyer=$disc_buyer->where('F03012_AN8',$response['F4211_AN8'])->where('F03012_CO',$response['F4211_CO']);
            if (count($search_disc_buyer)>0) {
                $old_arr['disc']=$search_disc_buyer[0]['F03012_TRDC'];
            }
            $search_disc_peb=$disc_doco->where('F554008_DOCO',$response['F4211_DOCO'])->where('F554008_LNID',$response['F4211_LNID']);
            if (count($search_disc_peb)>0) {
                $old_arr['disc']=$search_disc_peb[0]['F554008_CADC'];
            }

            return $old_arr;
        });

        $map['period']=$request;
        $map['weeksmonth']=$this->DateweekOfMonth($request->target_date_from);
        $map['data']=$response;
        $map['page']='Report Plan Cutting';
        return view('ppic.schedule.report.ekspor_plan.show_jde', $map);
    }

    function DateweekOfMonth($date) {

        list($y, $m, $d) = explode('-', date('Y-m-d', strtotime($date)));
        $week_arr=['w1'=>'','w2'=>'','w3'=>'','w4'=>'','w5'=>'','w6'=>''];
        $date_arr=['d1'=>'','d2'=>'','d3'=>'','d4'=>'','d5'=>'','d6'=>''];
        $week_arr=array_merge($week_arr,$date_arr);

        //get last date of month
        $ld=(int)date("t", strtotime($date));

        $begin='';
        for($i = 1; $i<$ld; $i++) {
            //fetch from start date to end
            $date_each=$y.'-'.$m.'-'.$i;

            //6=sabtu, 0=minggu, sabtu adalah week terakhir
            $day_num=date('w', strtotime($date_each));

            $begin!==''?:$begin=$i;

            if ($day_num==6) {
                if ($week_arr['w1']=='') {
                    $week_arr['w1']=$begin.'-'.$i;
                    $week_arr['d1']=$i;
                    $begin='';
                } else if ($week_arr['w1']!==''&&$week_arr['w2']=='') {
                    $week_arr['w2']=$begin.'-'.$i;
                    $week_arr['d2']=$i;
                    $begin='';
                } else if ($week_arr['w1']!==''&&$week_arr['w2']!==''&&$week_arr['w3']=='') {
                    $week_arr['w3']=$begin.'-'.$i;
                    $week_arr['d3']=$i;
                    $begin='';
                } else if ($week_arr['w1']!==''&&$week_arr['w2']!==''&&$week_arr['w3']!==''&&$week_arr['w4']=='') {
                    $week_arr['w4']=$begin.'-'.$i;
                    $week_arr['d4']=$i;
                    $begin='';
                } else if ($week_arr['w1']!==''&&$week_arr['w2']!==''&&$week_arr['w3']!==''&&$week_arr['w4']!==''&&$week_arr['w5']=='') {
                    $week_arr['w5']=$begin.'-'.$i;
                    $week_arr['d5']=$i;
                    $begin='';
                } else if ($week_arr['w1']!==''&&$week_arr['w2']!==''&&$week_arr['w3']!==''&&$week_arr['w4']!==''&&$week_arr['w5']!==''&&$week_arr['w6']=='') {
                    $week_arr['w6']=$begin.'-'.$i;
                    $week_arr['d6']=$i;
                    $begin='';
                }
            }
        }
        if ($begin!=='') {
            if ($week_arr['w1']!==''&&$week_arr['w2']!==''&&$week_arr['w3']!==''&&$week_arr['w4']=='') {
                $week_arr['w4']=$begin.'-'.$i;
                $week_arr['d4']=$i;
                $begin='';
            } else if ($week_arr['w1']!==''&&$week_arr['w2']!==''&&$week_arr['w3']!==''&&$week_arr['w4']!==''&&$week_arr['w5']=='') {
                $week_arr['w5']=$begin.'-'.$i;
                $week_arr['d5']=$i;
                $begin='';
            } else if ($week_arr['w1']!==''&&$week_arr['w2']!==''&&$week_arr['w3']!==''&&$week_arr['w4']!==''&&$week_arr['w5']!==''&&$week_arr['w6']=='') {
                $week_arr['w6']=$begin.'-'.$i;
                $week_arr['d6']=$i;
                $begin='';
            }
        }
        if ($ld<31) {
            if ($week_arr['w5']=='') {
                $i+=1;
                $week_arr['w5']=$i.'-31';
                $week_arr['d5']=$i;
                $begin='';
            } else if ($week_arr['w6']=='') {
                $i+=1;
                $week_arr['w6']=$i.'-31';
                $week_arr['d6']=$i;
                $begin='';
            }
        }
        return $week_arr;
    }

    //=====================================================  REPORTING PAK CHANDRA
    //======== 1.
    public function report_outputsewing_monthly()
    {
        $data=new Email_Reporting();
        $data=$data->get_output_monthly();
        $map['data']=$data;
        $map['page']='Report Progress Output Monthly';
        return view('ppic.schedule.report.progress_output.show_monthly', $map);
    }
    public function report_outputsewing_facility() 
    {
        $data=new Email_Reporting();
        $data=$data->get_output_perfacility();
        $map['data']=$data;
        $map['page']='Report Progress Output Facility';
        return view('ppic.schedule.report.progress_output.show_branch', $map);
    }
    public function report_outputsewing_recap()
    {
        $data=new Email_Reporting();
        $data=$data->get_recap();
        $map['data']=$data;
        $map['page']='Report Recap Progress Output';
        return view('ppic.schedule.report.progress_output.show_recap', $map);
    }
    //======== 1. end

    //======== 2.
    public function report_recap_buyer() 
    {
        $data=new Email_Reporting();
        $data=$data->get_recap_buyer();
        $map['data']=$data;
        $map['page']='Recap Output Sewing - By Buyer';
        return view('ppic.schedule.report.recap_output_sewing.show_buyer', $map);
    }
    public function report_recap_line()
    {
        $data=new Email_Reporting();
        $data=$data->get_recap_perline();
        $map['data']=$data;
        $map['page']='Recap Output Sewing - By Line';
        return view('ppic.schedule.report.recap_output_sewing.show_line', $map);
    }
    //======== 2. end

    //======== 4.
    public function report_loading_capacity_perline() 
    {
        // $data=new Email_Reporting();
        // $data=$data->get_output_perfacility();
        // $map['data']=$data;
        $map['page']='Report Loading Capacity Perline';
        return view('ppic.schedule.report.loading_capacity_perline.show_line', $map);
    }
    //======== 4. end


    //=====================================================  END REPORTING PAK CHANDRA

    //===================================================== UPDATE SHIPMENT

    public function upship_index(Request $request)
    {
      
        $master_or=WorkOrder::query();
        if ($request->branch_id) {
            $master_or->whereHas('prod_line', function($q) use($request){
                if ($request->branch_id) {
                    $q->where('branch_id', $request->branch_id);
                }
            });
        }
        if ($request->production_line_id) {
            $master_or->where('production_line_id',$request->production_line_id);
        }
        if ($request->wo_no) {
            $master_or->where('wo_no',$request->wo_no);
        }
        if ($request->start_date_from) {
            $master_or->where('start_date','>=',$request->start_date_from);
        }
        if ($request->start_date_to) {
            $master_or->where('start_date','<=',$request->start_date_to);
        }
        $master_or=$master_or->get();

        $map['data']=$master_or;
        $map['branch']=ProductionLine::groupBy('sub')->get();
        $map['prodline']=ProductionLine::get();
        $map['page'] = 'Shipment Update';
        return view('ppic.schedule.shipment_update.index', $map);
    }

    public function upship_update(Request $request)
    {
        try{
            DB::beginTransaction();

            foreach ($request->wo_id as $woid) {
                // log::info($woid);
                $wo=WorkOrder::find($woid);
                if ($wo) {
                    $wo->shipment_date=$request->date_ship_new;
                    $wo->tarikan=$request->tarikan;
                    $wo->update();
                }
            }

            DB::commit();

            return redirect()->back();

        }catch(\Exception $e){
            DB::rollback();
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }

    //===================================================== END UPDATE SHIPMENT

}
