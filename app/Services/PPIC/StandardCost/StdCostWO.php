<?php

namespace App\Services\PPIC\StandardCost;

use DB;
use Auth;
use DataTables;
use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;

use App\JdeApi;
// use App\BomWO; 
use App\BomWOPartlist; 
use App\ItemNumber;
use App\ItemLedger;
use App\WorkOrderJDE; 
use App\SalesOrder; 
use App\SalesOrderBreakdown; 
use App\OpenPurchaseOrder; 
use App\Models\Marketing\TrimCard\PartList;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;

class StdCostWO{

    public function get_bom_wo($wo,$withissue=false)
    {
        $data_bom_all=[];
        $datawo=WorkOrderJDE::whereIn('F4801_DOCO',$wo)->get();
        foreach ($datawo as $k => $wo) {
            $cek_bom_partlist_local=BomWOPartlist::where('wo',$wo->F4801_DOCO)->first();
            if ($cek_bom_partlist_local==null) {
                $list_item_exists=[];
                $data_issue=[];
                if ($withissue) {
                    $data_issue=collect($this->get_issue_wo($wo->F4801_DOCO));
                }

                $data_bom=$this->get_bom_jde($wo->F4801_ITM);

                // $data_bom=BomWO::where('wo_no',$wo->F4801_DOCO)->get();
                // if (count($data_bom)==0) {
                //     $ins=$this->save_tolocal_bom($wo->F4801_DOCO, $data_bom);
                // }

                $data_bom=collect($data_bom)->map(function ($item) use ($wo,$data_issue,$withissue,&$list_item_exists){
                    $itemmaster=ItemNumber::where('F4101_ITM',$item->F3002_ITM)->first();

                    $po=OpenPurchaseOrder::where('F4311_OORN',$wo->F4801_RORN)
                                                ->where('F4311_OCTO','OR')->where('F4311_MCU',$wo->F4801_MMCU)
                                                ->where('F4311_ITM',$item->F3002_ITM)->first();
                    if ($po==null) {
                        $po=OpenPurchaseOrder::where('F4311_OCTO','OR')->where('F4311_MCU',$wo->F4801_MMCU)
                        ->where('F4311_ITM',$item->F3002_ITM)->orderBy('F4311_TRDJ')->first();
                    }
                    $item_price=$po->F4311_PRRC??null;
                
                    $breakdown_str=explode("|",$item->F3002_DSC1);
                    $qty_breakdown=$wo->breakdown;
                    $uom_plan=$item->F3002_UM;

                    if ($po) {
                        if ($uom_plan!==$po->F4311_UOM) {
                            $conv=collect($this->get_item_conv($item->F3002_ITM,$wo->F4801_MMCU,$po->F4311_UOM,$uom_plan));                                              
                            if (count($conv)>0) {
                                $kv=$conv->first()->F41002_CONV;
                                $item_price=round($item_price/$kv,8);
                            } else {
                                $conv=collect($this->get_item_conv($item->F3002_ITM,$wo->F4801_MMCU,$uom_plan,$po->F4311_UOM));
                                if (count($conv)>0) {
                                    $kv=$conv->first()->F41002_CONV;
                                    $item_price=round($item_price*$kv,8);
                                }
                            }
                        }
                    }

                    if($breakdown_str[0]!=='#') {
                        $qty_breakdown=$qty_breakdown->where('F560020_SEG3',$breakdown_str[0]);
                    }
                    if($breakdown_str[1]!=='#') {
                        $qty_breakdown=$qty_breakdown->where('F560020_SEG4',$breakdown_str[1]);
                    }
                    if($breakdown_str[2]!=='#') {
                        $qty_breakdown=$qty_breakdown->where('F560020_SIZE55',$breakdown_str[2]);
                    }
                    $qty_breakdown=$qty_breakdown->sum('F560020_QTY');

                    $issue_wo=[];
                    if ($withissue) {
                        if (in_array($item->F3002_ITM,$list_item_exists)==false) {
                            $issue_wo=$data_issue->where('F4111_DOCO',$wo->F4801_DOCO)
                                                ->where('F4111_ITM',$item->F3002_ITM)
                                                ->groupBy('F4111_TRUM')
                                                ->map(function ($dt_issue) use($uom_plan){
                                                    // dd($dt_issue);
                                                    //perlu di konversi, karna pas issue bisa beda2 satuan
                                                    $qty=abs($dt_issue->sum('qty'));
                                                    $amt=abs($dt_issue->sum('amount'));
                                                    if ($uom_plan!==$dt_issue->first()->F4111_TRUM) {
                                                        $conv=collect($this->get_item_conv(
                                                            $dt_issue->first()->F4111_ITM,
                                                            $dt_issue->first()->F4111_MCU,
                                                            $dt_issue->first()->F4111_TRUM,
                                                            $uom_plan));                                              
                                                        if (count($conv)>0) {
                                                            // dd($conv->first()->F41002_CONV);
                                                            $konversi=$conv->first()->F41002_CONV;
                                                            $qty=$konversi*$qty;
                                                        } else {
                                                            $conv=collect($this->get_item_conv(
                                                                $dt_issue->first()->F4111_ITM,
                                                                $dt_issue->first()->F4111_MCU,
                                                                $uom_plan,
                                                                $dt_issue->first()->F4111_TRUM
                                                                ));  
                                                            if (count($conv)>0) {
                                                                // dd($conv->first()->F41002_CONV);
                                                                $konversi=$conv->first()->F41002_CONV;
                                                                $qty=$konversi/$qty;
                                                            }
                                                        }
                                                    }
                                                    return [
                                                        'wo'=>$dt_issue->first()->F4111_DOCO,
                                                        'item'=>$dt_issue->first()->F4111_ITM,
                                                        'uom'=>$dt_issue->first()->F4111_TRUM,
                                                        'qty'=>$qty,
                                                        'amount'=>$amt
                                                    ];
                                                });
                            array_push($list_item_exists,$item->F3002_ITM);
                        }
                    }

                    $qty_act=0;
                    $issue_uom='';
                    $cost_act=0;
                    if (count($issue_wo)>0) {
                        $qty_act=$issue_wo->first()['qty'];
                        $issue_uom=$issue_wo->first()['uom'];
                        $issue_uom=$issue_wo->first()['uom'];
                        $cost_act=$issue_wo->first()['amount'];
                    }
                    return [
                        'opsq'=>$item->F3002_OPSQ,
                        'status'=>'BOM',
                        'or'=>$wo->F4801_RORN,
                        'orty'=>$wo->F4801_RCTO,
                        'mcu'=>$wo->F4801_MMCU,
                        'wo'=>$wo->F4801_DOCO,
                        'parent_short'=>$item->F3002_KIT,
                        'parent_item'=>$item->F3002_KITL,
                        'branch'=>$wo->F4801_MCU,
                        'item'=>$item->F3002_ITM,
                        'item_dsc1'=>$itemmaster->F4101_DSC1??null,
                        'item_dsc2'=>$itemmaster->F4101_DSC2??null,
                        'breakdown_dsc'=>$breakdown_str[0].'|'.$breakdown_str[1].'|'.$breakdown_str[2],
                        'csp'=>$item->F3002_QNTY,
                        'csp_um'=>$item->F3002_UM,
                        'qty_breakdown'=>$qty_breakdown,
                        'unit_price'=>$item_price,

                        'qty_plan'=>$item->F3002_QNTY*$qty_breakdown,
                        'qty_act'=>$qty_act,

                        'um_plan'=>$item->F3002_UM,
                        'um_act'=>$issue_uom,
                        
                        'cost_plan'=>($item->F3002_QNTY*$qty_breakdown)*$item_price,
                        'cost_act'=>$cost_act
                    ];
                });

                $data_bom_all=array_merge($data_bom_all,$data_bom->toArray());

                $unplanned_issue=$data_issue->where('F4111_DOCO',$wo->F4801_DOCO)->whereNotIn('F4111_ITM',$list_item_exists);
                $unplanned_issue=collect($unplanned_issue)->groupBy('F4111_ITM')->map(function ($item) use($wo){
                    $itemmaster=ItemNumber::where('F4101_ITM',$item->first()->F4111_ITM)->first();
                    $partlist=PartList::where('F3111_DOCO',$wo->F4801_DOCO)->where('F3111_CPIT',$item->first()->F4111_ITM)->first();
                    return [
                        'opsq'=>$partlist->F3111_OPSQ??null,
                        'status'=>'UNPLANNED',
                        'or'=>$wo->F4801_RORN,
                        'orty'=>$wo->F4801_RCTO,
                        'mcu'=>$wo->F4801_MMCU,
                        'wo'=>$wo->F4801_DOCO,
                        'parent_short'=>'',
                        'parent_item'=>'',
                        'branch'=>$item->first()->F4111_MCU,
                        'item'=>$item->first()->F4111_ITM,
                        'item_dsc1'=>$itemmaster->F4101_DSC1??null,
                        'item_dsc2'=>$itemmaster->F4101_DSC2??null,
                        'breakdown_dsc'=>'',
                        'csp'=>0,
                        'csp_um'=>'',
                        'qty_breakdown'=>0,
                        'unit_price'=>0,

                        'qty_plan'=>0,
                        'qty_act'=>abs($item->sum('F4111_TRQT'))??null,

                        'um_plan'=>'',
                        'um_act'=>$item->first()->F4111_TRUM,
                        
                        'cost_plan'=>0,
                        'cost_act'=>abs($item->sum('F4111_PAID'))??null,
                    ];
                });
                $data_bom_all=array_merge($data_bom_all,$unplanned_issue->toArray());

                $this->save_tolocal_bomwo($data_bom_all);

            } else {
                $bom_temp=BomWOPartlist::where('wo',$wo->F4801_DOCO)->get()->toArray();
                $data_bom_all=array_merge($data_bom_all,$bom_temp);
            }
            
        }

        return $data_bom_all;
    }
    public function get_issue_bom($wo,$item)
    {
        $issue=ItemLedger::selectRaw("coalesce(sum(F4111_TRQT),0) as total_qty, coalesce(sum(F4111_PAID),0) as total_cost, F4111_TRUM as uom")
                          ->where('F4111_DOCO',$wo)->where('F4111_DCT','IM')->where('F4111_ITM',$item)->first();
        return $issue;
    }

    public function get_issue_wo($wo)
    {
        $issue=ItemLedger::selectRaw("
            F4111_DOCO,
            F4111_ITM,
            F4111_MCU,
            F4111_DCT,
            F4111_TRUM,
            coalesce(sum(F4111_TRQT),0) as qty, 
            coalesce(sum(F4111_PAID),0) as amount")
            ->where('F4111_DOCO',$wo)->where('F4111_DCT','IM')->whereRaw("F4111_ITM not in ('228453','229677','227145','229075','268932')")->groupBy('F4111_ITM')->groupBy('F4111_TRUM')->get();
        return $issue;
    }

    // public function get_issue_without_bom($wo,$item)
    // {
    //     $issue=ItemLedger::where('F4111_DOCO',$wo)->where('F4111_DCT','IM')->whereNotIn('F4111_ITM',$item)->get();
    //     return $issue;
    // }

    public function get_sales_wo($so,$ty,$mcu,$wo)
    {
        $issue=SalesOrder::selectRaw("coalesce(sum(F4211_UORG),0) as qty_plan, coalesce(sum(F4211_SOQS*F4211_UPRC),0) as sales_actual,F4211_LNID")
                          ->where('F4211_DOCO',$so)->where('F4211_DCTO',$ty)->where('F4211_MCU',$mcu)->where('F4211_LOTN',$wo)->first();
        if ($issue) {
            $ln=floor($issue->F4211_LNID);
            $cost_plan=SalesOrder::select(['F4211_UPRC'])
            ->where('F4211_DOCO',$so)->where('F4211_DCTO',$ty)->where('F4211_MCU',$mcu)->where('F4211_LNID',$ln)->first();

            if ($cost_plan) {
                $issue=$issue->toArray();
                //qty plan diganti ke total breakdown per line induk
                $issue["qty_plan"]=SalesOrderBreakdown::select(DB::raw('SUM(F550018_55QNTY01+F550018_55QNTY02+F550018_55QNTY03+F550018_55QNTY04+F550018_55QNTY05+F550018_55QNTY06+F550018_55QNTY07+F550018_55QNTY08+F550018_55QNTY09+F550018_55QNTY10+F550018_55QNTY11+F550018_55QNTY12+F550018_55QNTY13+F550018_55QNTY14+F550018_55QNTY15+F550018_55QNTY16+F550018_55QNTY17+F550018_55QNTY18+F550018_55QNTY19+F550018_55QNTY20) AS total_breakdown'))->where('F550018_DOCO',$so)->where('F550018_DCTO',$ty)->where('F550018_MCU',$mcu)->where('F550018_LNID',$ln)->first()->total_breakdown;
                $issue["cost_plan"]=$cost_plan->F4211_UPRC;
            }
        }

        return $issue;
    }

    public function get_bom_jde($item_number) {
        $client = new Client();
        $request = $client->get('http://10.8.0.108/jdeapi/public/api/bom/search=?KIT='.$item_number.'&select=F3002_ITM|F3002_DSC1|F3002_KIT|F3002_KITL|F3002_QNTY|F3002_UM|F3002_URCD|F3002_FTRC|F3002_OPSQ|F3002_CPNB');
        $response = json_decode($request->getBody());
        $hasil=[];
        
        foreach ($response as $k => $v) {
            if (!in_array($v->F3002_ITM,['228453','229677','227145','229075','268932'])) {
                array_push($hasil,$v);
            }
        }
        return $hasil;
    }

    public function save_tolocal_bom($wo,$bom) {
        foreach ($bom as $k => $v) {
            $ins=BomWO::updateOrCreate(['wo_no'=>$wo,'F3002_CPNB'=>$v->F3002_CPNB],
            ['F3002_KIT'=>$v->F3002_KIT, 'F3002_KITL'=>$v->F3002_KITL, 'F3002_ITM'=>$v->F3002_ITM, 
             'F3002_DSC1'=>$v->F3002_DSC1, 'F3002_QNTY'=>$v->F3002_QNTY,'F3002_UM'=>$v->F3002_UM,
             'F3002_URCD'=>$v->F3002_URCD, 'F3002_OPSQ'=>$v->F3002_OPSQ, 'F3002_FTRC'=>$v->F3002_FTRC]);
        }
    }

    public function save_tolocal_bomwo($bom) {

        foreach ($bom as $k => $v) {
            BomWOPartlist::Create($v);
        }

        // foreach ($bom as $k => $v) {
        //     $ins=BomWOPartlist::Create(['opsq'=>$v['opsq'],'status'=>$v['status']],
        //      ['or'=>$v['or'], 'orty'=>$v['orty'], 'mcu'=>$v['mcu'], 'wo'=>$v['wo'], 'parent_short'=>$v['parent_short'],
        //       'parent_item'=>$v['parent_item'], 'branch'=>$v['branch'], 'item'=>$v['item'], 'item_dsc1'=>$v['item_dsc1'],
        //       'item_dsc2'=>$v['item_dsc2'], 'breakdown_dsc'=>$v['breakdown_dsc'], 'csp'=>$v['csp'], 'csp_um'=>$v['csp_um'], 
        //       'qty_breakdown'=>$v['qty_breakdown'], 'unit_price'=>$v['unit_price'], 'qty_plan'=>$v['qty_plan'],
        //       'qty_act'=>$v['qty_act'], 'um_plan'=>$v['um_plan'], 'um_act'=>$v['um_act'], 'cost_plan'=>$v['cost_plan'], 'cost_act'=>$v['cost_act']]);
        // }
    }

    public function get_item_conv($itm,$mcu,$from_uom,$to_uom) {
        $mcu=str_replace(' ', '', $mcu);
        $client = new Client();
        $request = $client->get('http://10.8.0.108/jdeapi/public/api/conversion/search=?ITM='.$itm.'&MCU='.$mcu.'&UM='.$from_uom.'&RUM='.$to_uom);
        $response = json_decode($request->getBody());
        return $response;
    }
}