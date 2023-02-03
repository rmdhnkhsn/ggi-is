<?php

namespace App\Services\warehouse;

use DB;
use Auth;
use App\Branch; 
use Carbon\Carbon;
use App\ItemLedger; 
use App\Models\Notification;
use App\Models\Warehouse\WarehouseDelivery;
use App\Models\Warehouse\WarehouseDeliveryItem;
use Illuminate\Support\Facades\Log;

class WarehouseDeliveryServ{

    public function insert_delivery($request)
    {
        $tanggal=date('Y-m-d');
        $temp=$request;
        $branch=Auth::User()->branch;
        $branchdetail=Auth::User()->branchdetail;
        if ($request->first()->F564111H_UKID!==null) {
            $request=new \Illuminate\Http\Request();
            $request->merge(['buyer_address'=>$temp->first()->F564111H_AN8]);
            $request->merge(['buyer'=>$temp->first()->F564111H_AN8]);
            $request->merge(['jenis_bc'=>$temp->first()->F564111H_DSC1]);
            $request->merge(['no_kontrak'=>$temp->first()->F564111H_DSC2]);

            if (str_contains($temp->first()->F564111H_MCU,'1201')) {
                $branch='CLN';
                $branchdetail='CLN';
            }
            if (str_contains($temp->first()->F564111H_MCU,'1204')) {
                $branch='MAJA';
                $branchdetail='GM2';
            }
            if (str_contains($temp->first()->F564111H_MCU,'1205')) {
                $branch='MAJA';
                $branchdetail='GM1';
            }

            $tanggal=$temp->first()->F564111H_TRDJ;
            $time='00:00:00'; //19:12:01 
            if (strlen($temp->first()->F564111H_TDAY)==5) {
                $time='0'.substr($temp->first()->F564111H_TDAY,0,1).':'.substr($temp->first()->F564111H_TDAY,1,2).':'.substr($temp->first()->F564111H_TDAY,3,2); //91201
            } else if (strlen($temp->first()->F564111H_TDAY)==6) {
                $time=substr($temp->first()->F564111H_TDAY,0,2).':'.substr($temp->first()->F564111H_TDAY,2,2).':'.substr($temp->first()->F564111H_TDAY,4,2); //191201
            }

            // log::info($temp->first()->F564111H_TDAY);

            $key=0;
            $arr_ukid=[];
            $arr_qty=[];
            $arr_box=[];
            foreach ($temp as $k => $v) {
                // $request['ukid'][$key]=$v->F564111H_UKID;
                // $request['qty'][$key]=$v->F564111H_TRQT;
                // $request['no_box'][$key]=$key+1;
                // $key+=1;
                array_push($arr_ukid,$v->F564111H_UKID);
                array_push($arr_qty,$v->F564111H_TRQT);
                array_push($arr_box,$key+1);

            }
        }
        $request->merge(['ukid'=>$arr_ukid]);
        $request->merge(['qty'=>$arr_qty]);
        $request->merge(['no_box'=>$arr_box]);

        $vendor_branch=null;
        if($request->buyer_address=='55425217'||$request->buyer_address=='55754361') {
            $vendor_branch=Branch::where('branchdetail','GM1')->first();
        } else if($request->buyer_address=='55377446') {
            $vendor_branch=Branch::where('branchdetail','GM2')->first();
        } else if($request->buyer_address=='57235572') {
            $vendor_branch=Branch::where('branchdetail','CVA')->first();
        } else if($request->buyer_address=='55466078') {
            $vendor_branch=Branch::where('branchdetail','CNJ2')->first();
        } else if($request->buyer_address=='56804163') {
            $vendor_branch=Branch::where('branchdetail','CVC')->first();
        } else if($request->buyer_address=='57110104') {
            $vendor_branch=Branch::where('branchdetail','GK')->first();
        } else if($request->buyer_address=='56886445') {
            $vendor_branch=Branch::where('branchdetail','GK')->first();
        } else {
            $vendor_branch = (object) [
                'kode_branch'=>$request->buyer_address,
                'branchdetail'=>$request->buyer_address
            ];
        }

        $is_exists=false;
        $glpt='';
        foreach ($request->qty as $i => $v) {
            $ukid=$request->id_ukid;
            if ($temp->first()->F564111H_UKID!==null) {
                $ukid=$request->ukid[$i];
            }
            $item_ledger=ItemLedger::where('F4111_UKID',$ukid)->first();
            if ($item_ledger) {
                $is_exists=true;
                $glpt=$item_ledger->F4111_GLPT;
                break;
            }
        }
        
        if ($is_exists) {
            $whdelivery=WarehouseDelivery::create([
                'jenis_bc'=>$temp->first()->F564111H_DSC1,
                'bpb'=>$temp->first()->F564111H_DOC1,
                'from_branch'=>$branch,
                'from_branchdetail'=>$branchdetail,
                'to_desc'=>$request->buyer ?? null,
                'to_branch'=>$vendor_branch->kode_branch ?? null,
                'to_branchdetail'=>$vendor_branch->branchdetail ?? null,
                'tanggal_trans'=>$tanggal,
                'status'=>1,
                'nik_originator'=>Auth::User()->nik
            ]);
            $whdelivery->barcode=date('Ymd').'-'.$whdelivery->id;
            if (in_array($glpt,['INMK'])) {
                $whdelivery->in_ekspedisi=$tanggal.' '.$time;
                $whdelivery->status_barang='Ekspedisi';
            } else if (in_array($glpt,['INRM','MACH'])) {
                $whdelivery->in_mekanik=$tanggal.' '.$time;
                $whdelivery->status_barang='Mekanik';
            } else {
                $whdelivery->in_gudang=$tanggal.' '.$time;
                $whdelivery->status_barang='Gudang';
            }
            $whdelivery->update();
        }

        foreach ($request->qty as $i => $v) {
            $ukid=$request->id_ukid;
            if ($temp->first()->F564111H_UKID!==null) {
                $ukid=$request->ukid[$i];
            }
            $item_ledger=ItemLedger::where('F4111_UKID',$ukid)->first();
            if ($item_ledger) {
                $whdelivery_dt=WarehouseDeliveryItem::create([
                    "warehouse_delivery_id" =>  $whdelivery->id,
                    "id_barcode"        =>  null,
                    "id_ukid"           =>  $item_ledger->F4111_UKID,
                    "no_kontrak"        =>  $request->no_kontrak,
                    "wo"                =>  $item_ledger->F4111_DOC,
                    "no_box"            =>  $request->no_box[$i],
                    "item"              =>  $item_ledger->item_master->F4101_DSC1 ?? null,
                    "item2"             =>  $item_ledger->item_master->F4101_DSC2?? null,
                    "doc_type"          =>  $item_ledger->F4111_DCT ?? null,
                    "doc_co"            =>  $item_ledger->F4111_MCU ?? null,
                    "transaction_date"  =>  $item_ledger->F4111_TRDJ ?? null,
                    "branch"            =>  $item_ledger->F4111_MCU ?? null,
                    "qty"               =>  $request->qty[$i] ?? null,
                    "trans_uom"         =>  $item_ledger->F4111_TRUM ?? null,
                    "unit_cost"         =>  $item_ledger->F4111_UNCS ?? null,
                    "extended"          =>  $item_ledger->F4111_PAID ?? null,
                    "lot_serial"        =>  $item_ledger->F4111_LOTN ?? null,
                    "location"          =>  $item_ledger->F4111_LOCN ?? null,
                    "order_co"          =>  $item_ledger->F4111_KCOO ?? null,  
                    "class_code"        =>  $item_ledger->F4111_GLPT ?? null,
                    "gl_date"           =>  $item_ledger->F4111_DGL ?? null,
                    "buyer"             =>  $request->buyer ?? null,
                    "tanggal"           =>  $tanggal,
                    "kode_branch"       =>  auth()->user()->branch,
                    "branchdetail"      =>  auth()->user()->branchdetail,
                    "qty"               =>  $request->qty[$i],
                    "status"            =>  "",
                    "status_delivery"   =>  "",
                    "kode_branch_rec"   =>  $vendor_branch->kode_branch ?? null,
                    "branchdetail_rec"  =>  $vendor_branch->branchdetail ?? null
                ]);
            } 
        }

        return true;
    }
}