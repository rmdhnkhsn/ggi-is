<?php

namespace App\Services\sampleRoom;

use DB;
use Carbon\Carbon;
use App\Models\Marketing\SampleRequest\sampleData;
use App\Models\Marketing\SampleRequest\sampleUser;
use App\Models\Notification;


class NotificationSample{

    public function UserNotif()
    {
        $userAll = [
            // '0' => 'GC110081',
            // '1' => '332100185',         
            '2' => 'GC110085',         
            
        ];

        // dd($userAll);
        return $userAll;
    }

      public function data_notif()
    {
         $data = sampleData::orderBy('id','desc')->get();
         
        $dataNotif = [];
        foreach ($data as $key => $value) {
        
            $dataNotif[] = [
                'id' => $value->id,
                'buyer' => $value->buyer,
                'style' => $value->style,
                'departement_trecking' => $value->departement_trecking,
                'Accepting_date' => $value->Accepting_date,
                'result' => $value->result,
            ];
        }

        // dd($dataNotif);
        return $dataNotif;
    }

    public function notifSample($userAll, $dataNotif){
// dd($dataPO);
        foreach ($dataNotif as $key1 => $value1) {
            // dd($value1['id']);
            if($value1['id'] !=null) {
                foreach ($userAll as $key2 => $value2) {
                // dd($value2);
                    DB::table('notification')->insert([
                        'connection_name'=>"mysql_mkt_qr",
                        'table_name'=>"sample_data",
                        'alert_level'=>"SUCCESS",
                        'id_int'=> $value1['id'],
                        'nik'=>$value2,
                        'url'=>"sample-request",
                        'title'=>' New Sample Request '.$value1['buyer'] ,
                        'desc'=> substr($value1['style'], 0, 30),
                        'is_read'=>"0",
                    ]);
                }
            }
        }
        return ;
    }

}