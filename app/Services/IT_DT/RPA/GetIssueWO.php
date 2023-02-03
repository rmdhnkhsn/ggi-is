<?php

namespace App\Services\IT_DT\RPA;

use Auth;
use App\User;
use App\WOBreakDown;
use App\WorkOrderJDE;
use App\ItemNumber;
use App\UserDefinedCode; 
use App\ItemLedger;
use App\ItemLedgerOR;


use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;
Use App\Models\IT_DT\Work_Plan\WorkPlan;

class GetIssueWO{

    //wo = string
    //arr_item = [[item=>'',qty=>'',allowance=>'',uom=>'']]
    //arr_gcat = ['INFA','ININ','DST']
    //Filter by item, gl cat or both

    public function get_wo_issue_todo($wo,$arr_item,$arr_gcat)
    {
        $wo=WorkOrderJDE::find($wo);
        if ($wo==null) {
            return [];
        }
        $wobreakdown=WOBreakDown::where('F560020_DOCO',$wo->F4801_DOCO)->get();
        $pl=$this->generate_partlist($wo->F4801_ITM,$arr_item,$arr_gcat,$wobreakdown);
        $st=$this->get_stok_item($wo->F4801_RORN, $wo->F4801_MCU, $pl->unique('item_number')->pluck('item_number'));
        $is=$this->get_item_qty_issued($wo->F4801_DOCO,$wo->F4801_MCU,$pl->unique('item_number')->pluck('item_number'));
        $po=$st['data_receipt_po'];
        $st=$st['data_stok_item'];
        $po_collect=collect($po);

        $data_issue=[];
        $data_kurang=[];
        $pl=$pl->toArray();
        foreach ($pl as $k => $v) {
            $is_stock_exists=false;
            $multi_lot='No';

            foreach ($is as $ki => $vi) {
                if ($v['item_number']==$vi['ITEMNUMBER']&&$pl[$k]['qty_need_primary']>$pl[$k]['qty_selected']) {
                    $pl[$k]['qty_selected']+=$vi['QTY']*-1;
                    // $is[$ki]['QTY_ALLOCATED']+=$vi['QTY'];
                    //todo : kalau di partlist ada 2 item sama, mesti dibagi kuota issue nya, hati2 juga sama issue reverse, dan pastikan satuan nya = primary
                }
            }
            
            foreach ($st as $k1 => $v1) {
                if ($v['item_number']==$v1['F4111_ITM']&&$v1['qty_available']>0) {
                    if ($pl[$k]['qty_selected']>=$pl[$k]['qty_need_primary']) {
                        $is_stock_exists=true;
                        break;
                    }
                    if ($v['qty_need_primary']>=$v1['qty_available']) {
                        $multi_lot='';
                        $this->insert_data_issue($data_issue,$wo->F4801_DOCO,$v,$v1,$v1['qty_available'],$v['uom_primary'],$po,$multi_lot);
                        $st[$k1]['qty_available']-=$v1['qty_available'];
                        $pl[$k]['qty_selected']+=$v1['qty_available'];
                        $is_stock_exists=true;
                        break;
                    } else if ($v['qty_need_primary']<$v1['qty_available']) {
                        $this->insert_data_issue($data_issue,$wo->F4801_DOCO,$v,$v1,$v['qty_need_primary'],$v['uom_primary'],$po,$multi_lot);
                        $st[$k1]['qty_available']-=$v['qty_need_primary'];
                        $pl[$k]['qty_selected']+=$v['qty_need_primary'];
                        $is_stock_exists=true;
                        break;
                    }
                }
            }
            if ($is_stock_exists==false) {
                $this->insert_data_issue($data_issue,$wo->F4801_DOCO,$v,null,$v['qty_need_primary'],$v['uom_primary'],$po,$multi_lot);
            }
            if ($pl[$k]['qty_need_primary']>$pl[$k]['qty_selected']) {
                $po_number=$po_collect->where('F4111_ITM',$v['item_number'])->first()['F4311_DOCO']??'';
                $dt=[
                    'wo'=>$wo->F4801_DOCO,
                    'or'=>$wo->F4801_RORN,
                    'item_number'=>$v['item_number'],
                    'item_name'=>'',
                    'item_desc'=>'',
                    'style'=>$wo->F4801_DL01,
                    'po_number'=>$po_number,
                    'need_qty_allow'=>$v['qty_need_primary'],
                    'need_uom'=>$v['uom_primary'],
                    'latest_qty_issued'=>'',
                    'latest_uom_issued'=>'',
                    'qty_kurang'=>$pl[$k]['qty_need_primary']-$pl[$k]['qty_selected'],
                    'uom'=>$v['qty_need_primary']
                ];
                array_push($data_kurang,$dt);
            }
        }

        $map['data_issue']=$data_issue;
        $map['data_kurang']=$data_kurang;
        return $map;
    }
    public function insert_data_issue(&$data_issue,$wo,$pl,$st,$qty,$uom,$data_po,$multi_lot) 
    {
        $data_po=collect($data_po);
        $received_qty=$data_po->where('F4111_ITM',$pl['item_number'])->sum('F4111_TRQT')??0;
        $received_uom=$data_po->where('F4111_ITM',$pl['item_number'])->groupBy('F4111_TRUM')??'';
        $received_uom=array_keys($received_uom->toArray());
        $received_uom=implode(",", $received_uom);

        if ($received_qty==0) {
            $received_qty='Tidak dibukain PO';
            $received_uom='Tidak dibukain PO';
        }

        $cek_satuan=0;
        if ($qty>0) {
            $cek_satuan=1;
        }
        $dt=[
            'wo'=>$wo,
            'item_number'=>$pl['item_number'],
            'qty_received'=>$received_qty,
            'uom_po'=>$received_uom,
            'qty_need'=>$pl['qty_need_primary'],
            'uom_need'=>$pl['uom_primary'],
            'cek_satuan'=>$cek_satuan,
            'qty_issued'=>$qty,
            'uom_issued'=>$uom,
            'file_name'=>'',
            'location'=>$st['F4111_LOCN']??'',
            'lot_number'=>$st['F4111_LOTN']??'',
            'multilot'=>$multi_lot,
            'status_issue_rpa'=>'',
        ];
        array_push($data_issue,$dt);
    }


    public function generate_partlist($kit,$arr_item,$arr_gcat,$wobreakdown) 
    {
        $client = new Client();
        $request = $client->get('http://10.8.0.108/jdeapi/public/api/bom/search=?KIT='.$kit);
        $response = json_decode($request->getBody());

        $partlist=[];
        foreach ($response as $k => $v) {
            $sudah_tarik=false;
            $breakdown_str=explode("|",$v->F3002_DSC1);
            foreach ($arr_item as $v1) {
                if (in_array($v->F3002_AITM,$v1)) {
                    if ($v1['allowance']>0) {
                        $cek=ItemNumber::find($v->F3002_AITM);
                        $qty_break=$this->get_qty_breakdown($wobreakdown,$breakdown_str);
                        $qty_need=($v->F3002_QNTY*$qty_break)*(1+($v1['allowance']/100));
                        $dt=[
                            'line'=>$v->F3002_CPNB,
                            'item_number'=>$v->F3002_AITM,
                            'breakdown'=>$v->F3002_DSC1,
                            'qty'=>$v->F3002_QNTY,
                            'uom'=>$v->F3002_UM,
                            'uom_primary'=>$cek->F4101_UOM1,
                            'qty_breakdown'=>$qty_break,
                            'qty_need'=>$qty_need,
                            'qty_need_primary'=>$this->convert_qty_to_primary($v->F3002_AITM,$wobreakdown[0]->F560020_MCU,$v->F3002_UM,$cek->F4101_UOM1,$qty_need),
                            'qty_selected'=>0
                        ];
                    }
                    array_push($partlist,$dt);
                    $sudah_tarik=true;
                }
            }
            if ($sudah_tarik==false) {
                foreach ($arr_gcat as $v1) {
                    $cek=ItemNumber::find($v->F3002_AITM);
                    if ($cek==null) {
                        $item_new=$this->resync_item($v->F3002_AITM);
                        if ($item_new==true||$item_new=='true') {
                            $cek=ItemNumber::find($v->F3002_AITM);
                        }
                    }
                    if ($cek) {
                        if (str_contains($v1['glcat'], $cek->F4101_GLPT)) {

                            $qty_break=$this->get_qty_breakdown($wobreakdown,$breakdown_str);
                            $qty_need=($v->F3002_QNTY*$qty_break)*(1+($v1['allowance']/100));
                            $dt=[
                                'line'=>$v->F3002_CPNB,
                                'item_number'=>$v->F3002_AITM,
                                'breakdown'=>$v->F3002_DSC1,
                                'qty'=>$v->F3002_QNTY,
                                'uom'=>$v->F3002_UM,
                                'uom_primary'=>$cek->F4101_UOM1,
                                'qty_breakdown'=>$qty_break,
                                'qty_need'=>$qty_need,
                                'qty_need_primary'=>$this->convert_qty_to_primary($v->F3002_AITM,$wobreakdown[0]->F560020_MCU,$v->F3002_UM,$cek->F4101_UOM1,$qty_need),
                                'qty_selected'=>0
                            ];
                            array_push($partlist,$dt);
                        }
                    }
                }
            }
        }
        return collect($partlist);
    }
    function get_qty_breakdown($breakdown,$str_break) {
        if ($str_break[0]!=="#") {
            $breakdown=$breakdown->where('F560020_SEG3',$str_break[0]);
        }
        if ($str_break[1]!=="#") {
            $breakdown=$breakdown->where('F560020_SEG4',$str_break[1]);
        }
        if ($str_break[2]!=="#") {
            // $sz=UserDefinedCode::where('F0005_SY','55')->where('F0005_RT','SZ')->where('F0005_DL01',$str_break[2])->first();
            // if($sz) {
            //     $breakdown->where('F560020_SEG4',$sz->F0005_KY);
            // }
            // $sz=(int)$str_break[2];
            $breakdown=$breakdown->where('F560020_SIZE55',$str_break[2]);
        }
        $breakdown=$breakdown->sum('F560020_QTY');
        return $breakdown;
    }
    public function get_po_or($or,$branch) 
    {

    }
    public function get_stok_item($or,$branch,$itemlist) 
    {
        $ir=$this->get_item_lotloc_by_IR($or,$branch,$itemlist);
        $itemlist=$this->get_item_lotloc_by_OR($or,$branch,$itemlist);
        $map['data_receipt_po']=$itemlist;
        foreach ($ir as $v) {
            array_push($itemlist,$v);
        }
        foreach ($itemlist as $k => $v) {
            $stok=$this->get_stok_available($v['F4111_ITM'],$v['F4111_MCU'],$v['F4111_LOTN'],$v['F4111_LOCN']);
            $itemlist[$k]['qty_available']=$stok;
        }
        $map['data_stok_item']=$itemlist;

        return $map;
    }
    public function get_item_qty_issued($wo,$branch,$itemlist) 
    {
        $data=ItemLedger::selectRaw("F4111_ITM AS ITEMNUMBER, sum(F4111_TRQT) AS QTY, F4111_TRUM AS UOM, 0 AS QTY_ALLOCATED")
            ->where('F4111_DOC',$wo)->where('F4111_DCT','IM')->groupBy('F4111_ITM')->get();
        return $data->toArray();
    }
    public function get_item_lotloc_by_OR($or,$branch,$itemlist) 
    {
        //branch gak perlu kayanya, ada format spasi didepan
        $data=ItemLedgerOR::select(
            ['F4111_UKID','F4311_DOCO','F4311_DCTO','F4311_OORN','F4311_OCTO','F4311_MCU',
            'F4111_TRQT','F4111_TRUM','F4111_DCT','F4111_ITM','F4111_MCU','F4111_LOTN','F4111_LOCN'])
            ->where('F4311_OORN',$or)->where('F4311_OCTO','OR')->whereIn('F4311_ITM',$itemlist)->get();
        return $data->toArray();
    }
    public function get_item_lotloc_by_IR($or,$branch,$itemlist) 
    {
        //branch gak perlu kayanya, ada format spasi didepan
        $data=ItemLedger::select(
            ['F4111_UKID','F4111_ITM','F4111_MCU','F4111_LOTN','F4111_LOCN'])
            ->whereIn('F4111_ITM',$itemlist)->where('F4111_DCT','IR')->whereRaw("RIGHT(F4111_LOTN,8)='".$or."'")->get();
        return $data->toArray();
    }
    public function resync_item($itm) 
    {
        $client = new Client();
        $request = $client->get('http://10.8.0.108/jdeapi/public/api/itemnumber/add=?itm='.$itm);
        $response = json_decode($request->getBody());
        return $response;
    }
    public function get_stok_available($itm,$brnch,$lotn,$locn) 
    {
        $qty_available=0;
        $url=base64_encode($itm.'||'.$brnch.'||'.$lotn.'||'.$locn);
        $client = new Client();
        $request = $client->get('http://10.8.0.108/jdeapi/public/api/stock_available/search=?q='.$url);
        $response = json_decode($request->getBody());
        if (count($response)>0) {
            $qty_available=$response[0]->F41021_PQOH;
        }
        return $qty_available;
    }
    public function convert_qty_to_primary($itm,$mcu,$from_uom,$to_uom,$qty) 
    {
        $mcu=str_replace(' ', '', $mcu);
        if ($from_uom==$to_uom) {
            return $qty;
        }
        $conv=$this->get_item_conversion($itm,$mcu,$from_uom,$to_uom);
        if ($conv==0) {
            $conv=$this->get_item_conversion($itm,$mcu,$to_uom,$from_uom);
            return $qty/$conv;
        }
        if ($conv!==0) {
            return $qty*$conv;
        }
        return 0;
    }

    public function get_item_conversion($itm,$mcu,$from_uom,$to_uom) 
    {
        $client = new Client();
        $request = $client->get('http://10.8.0.108/jdeapi/public/api/conversion/search=?ITM='.$itm.'&MCU='.$mcu.'&UM='.$from_uom.'&RUM='.$to_uom);
        $response = json_decode($request->getBody());

        if ($response) {
            return $response[0]->F41002_CONV;
        }
        return 0;
    }


}