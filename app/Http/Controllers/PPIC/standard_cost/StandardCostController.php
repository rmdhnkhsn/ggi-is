<?php

namespace App\Http\Controllers\PPIC\standard_cost;

use DB;
use Auth;
use DataTables;
use App\JdeApi;
use App\ItemLedger;
use App\WorkOrderJDE; 
use App\SalesOrder; 
use App\Models\PPIC\WorkOrder;
use App\Models\PPIC\ProductionLine;
use App\Models\PPIC\Monitoring;
use App\Models\Marketing\TrimCard\PartList;
use App\Services\PPIC\StandardCost\StdCostWO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StandardCostController extends Controller
{
    public function index(request $request)
    {
        $dt_fr=$request->date_from;
        if ($dt_fr==null||$dt_fr=='') {
            $dt_fr=date('Y-m-01');
        }
        $dt_to=$request->date_to;
        if ($dt_to==null||$dt_to=='') {
            // $dt_to=date('Y-m-t'); //berat untuk lgsg 1 bulan, defaultnya ke 1 hari saja
            $dt_to=date('Y-m-01');
        }
        $data_export_ledger=ItemLedger::query();
        $data_export_ledger->whereIn('F4111_DCT',['SP','RI']);
        $data_export_ledger->where('F4111_DCTO','SP');
        $data_export_ledger->where('F4111_TRDJ','>=',$dt_fr);
        $data_export_ledger->where('F4111_TRDJ','<=',$dt_to);
        if ($request->wo_no) {
            $data_export_ledger->where('F4111_LOTN',$request->wo_no);
        }
        $data_export_ledger=$data_export_ledger->orderBy('F4111_TRDJ','DESC')->groupBy('F4111_LOTN')->get()->pluck('F4111_LOTN');

        $all_wo=new StdCostWO();
        $all_wo=$all_wo->get_bom_wo($data_export_ledger->toArray(),true);


        // $data_export_ledger=['176372'];
        // $all_wo=$all_wo->get_bom_wo($data_export_ledger,true);

        $all_wo=collect($all_wo)->groupBy('wo')->map(function ($item){
            $sales=new StdCostWO();
            $sales=$sales->get_sales_wo($item->first()['or'],$item->first()['orty'],$item->first()['mcu'],$item->first()['wo']);
            return [
                'F4111_LOTN'=>$item->first()['wo'],
                'F4111_DOCO'=>$item->first()['or'],
                'F4111_DCTO'=>$item->first()['orty'],
                'F4111_MCU'=>$item->first()['mcu'],
                'F4111_ITM'=>$item->first()['parent_short'],
                'F4111_LITM'=>$item->first()['parent_item'],
                'cost_plan'=>round($item->sum('cost_plan'),2),
                'cost_actual'=>round($item->sum('cost_act'),2),
                'sales_plan'=>round($sales['qty_plan']*$sales['cost_plan'],2) ?? null,
                'sales_actual'=>round($sales['sales_actual'],2) ?? null
            ];
        });

        $map['data_export']=$all_wo;
        $map['dt_fr']=$dt_fr;
        $map['dt_to']=$dt_to; 

        $map['page']='Standard Cost';
        return view('ppic.standard_cost.index', $map);
    }

    public function show($wo)
    {
        $wo=WorkOrderJDE::find($wo);
        if ($wo==null) {
            return back()->with(['error' => 'Work Order Not Found']);
        }
        $sales=SalesOrder::where('F4211_DOCO',$wo->F4801_RORN)
                         ->where('F4211_DCTO',$wo->F4801_RCTO)
                         ->where('F4211_MCU',$wo->F4801_MCU)
                         ->where('F4211_LOTN',$wo->F4801_DOCO)->get();

        $bom=new StdCostWO();
        $bom=collect($bom->get_bom_wo([$wo->F4801_DOCO],true));

        // $issue=ItemLedger::where('F4111_DOCO',$wo->F4801_DOCO)->where('F4111_DCT','IM')->orderBy('F4111_LNID')->get();
        // $issue=$issue->groupBy('F4111_LNID')->map(function ($item){
        //     $order_partlist=Partlist::where('F3111_DOCO',$item->first()->F4111_DOC)->where('F3111_CPNB',$item->first()->F4111_LNID)->first();
        //     return [
        //         'wo'=>$item->first()->F4111_DOC,
        //         'line_num'=>$item->first()->F4111_LNID,
        //         'short_item'=>$item->first()->F4111_ITM,
        //         'deskripsi1'=>$item->first()->item_master->F4101_DSC1??null,
        //         'deskripsi2'=>$item->first()->item_master->F4101_DSC2??null,
        //         'order_qty'=>$order_partlist->F3111_UORG,
        //         'order_uom'=>$order_partlist->F3111_UM,
        //         'issued_qty'=>$item->sum('F4111_TRQT'),
        //         'issued_uom'=>$item->first()->F4111_TRUM,
        //         'unit_price'=>$item->avg('F4111_UNCS'),
        //         'extended_amount'=>$item->sum('F4111_PAID')
        //     ];
        // });

        // dd($bom);

        $smv=0;
        $smv_wo=WorkOrder::where('wo_no',$wo->F4801_DOCO)->first();
        if ($smv_wo) {
            $prodline=ProductionLine::find($smv_wo->production_line_id);
            if ($prodline) {
                $smv=$smv_wo->qty_target_day/$prodline->branch->workhour;
            }
        }

        $act_target=0;
        $act_target_monitor=Monitoring::where('wo',$wo->F4801_DOCO)->get();
        $total_jam=0;
        foreach ($act_target_monitor as $v) {
            if ($v->jam_1!==0&&$v->jam_1!==null) {
                $total_jam+=1;
            }
            if ($v->jam_2!==0&&$v->jam_2!==null) {
                $total_jam+=1;
            }
            if ($v->jam_3!==0&&$v->jam_3!==null) {
                $total_jam+=1;
            }
            if ($v->jam_4!==0&&$v->jam_4!==null) {
                $total_jam+=1;
            }
            if ($v->jam_5!==0&&$v->jam_5!==null) {
                $total_jam+=1;
            }
            if ($v->jam_6!==0&&$v->jam_6!==null) {
                $total_jam+=1;
            }
            if ($v->jam_7!==0&&$v->jam_7!==null) {
                $total_jam+=1;
            }
            if ($v->jam_8!==0&&$v->jam_8!==null) {
                $total_jam+=1;
            }
            if ($v->over_time_9!==0&&$v->over_time_9!==null) {
                $total_jam+=1;
            }
            if ($v->over_time_10!==0&&$v->over_time_10!==null) {
                $total_jam+=1;
            }
            if ($v->over_time_11!==0&&$v->over_time_11!==null) {
                $total_jam+=1;
            }
            if ($v->over_time_12!==0&&$v->over_time_12!==null) {
                $total_jam+=1;
            }
            if ($v->over_time_13!==0&&$v->over_time_13!==null) {
                $total_jam+=1;
            }
            if ($v->over_time_14!==0&&$v->over_time_14!==null) {
                $total_jam+=1;
            }
        }
        if ($total_jam!==0) {
            $act_target=$act_target_monitor->sum('total_outpot')/$total_jam;
        }

        $map['smv_plan']=$smv;
        $map['actual_target']=$act_target;
        $map['persen_target']=($act_target/$smv)*100;

        $map['wo']=$wo;
        $map['sales']=$sales;
        $map['issue']=$bom;
        $map['page']='Standard Cost Detail';
        return view('ppic.standard_cost.show', $map);
    }
}
