<?php

namespace App\Services\warehouse;

use DB;
use Carbon\Carbon;
use App\Models\Warehouse\dataResultJDE;
use App\Models\Notification;


class warehouseNotifDone{

    public function UserNotif()
    {
        $userAll = [
            '0' => 'GC110081',
            // '1' => '332100185',         
            '2' => '332100246',         
            
        ];

        // dd($userAll);
        return $userAll;
    }

      public function data_notif()
    {
        $data = dataResultJDE::orderBy('id','desc')->get();
        $dataNotif = [];
        foreach ($data as $key => $value) {
            if($value->status_delivery == "DONE"){
                $dataNotif[] = [
                    'id' => $value->id,
                    'id_barcode' => $value->id_barcode,
                    'wo' => $value->wo,
                    'buyer' => $value->buyer,
                    'status_delivery' => $value->status_delivery,
                    'status' => $value->status,
                ];
            }
        }
         $collecting= collect( $dataNotif)->groupBy('id_barcode');
         $reportDone = [];
            foreach ($collecting as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('id_barcode')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $reportDone[] = [
                        'id_barcode' => $key,
                        'id' => $value2['id'],
                        'wo' => $value2['wo'],
                        'buyer' => $value2['buyer'],
                        'status_delivery' => $value2['status_delivery'],
                    ];
                }  
            }

        return $reportDone;
    }

    public function notifSample($userAll, $reportDone){
// dd($dataPO);
        foreach ($reportDone as $key1 => $value1) {
            // dd($value1['id']);
            if($value1['id'] !=null) {
                foreach ($userAll as $key2 => $value2) {
                    DB::table('notification')->insert([
                        'connection_name'=>"mysql_mkt_qr",
                        'table_name'=>"warehouse_data",
                        'alert_level'=>"SUCCESS",
                        'id_int'=> $value1['id'],
                        'nik'=>$value2,
                        'url'=>"warehouse-delivery",
                        'title'=>'Done QR code Warehouse '.$value1['id_barcode'] ,
                        'desc'=> substr($value1['buyer'], 0, 30),
                        'is_read'=>"0",
                    ]);
                }
            }
        }
        return ;
    }

}