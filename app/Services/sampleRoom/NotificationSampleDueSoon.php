<?php

namespace App\Services\sampleRoom;

use DB;
use Carbon\Carbon;
use App\Models\Marketing\SampleRequest\sampleData;
use App\Models\Marketing\SampleRequest\sampleUser;
use App\Models\Notification;


class NotificationSampleDueSoon{

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
            if(($value->departement_trecking == "PATTERN") || ($value->departement_trecking == "CUTTING") || ($value->departement_trecking == "SEWING")){

                $dataNotif[] = [
                    'id' => $value->id,
                    'buyer' => $value->buyer,
                    'style' => $value->style,
                    'tanggal' => $value->tanggal,
                    'departement_trecking' => $value->departement_trecking,
                    'Accepting_date' => $value->Accepting_date,
                    'result' => $value->result,
                    'sample_code' => $value->sample_code,
                ];
            }
        }
        // dd($dataNotif);
        return $dataNotif;
    }

    public function notifSample($userAll, $dataNotif){
        foreach ($dataNotif as $key1 => $value1) {
            // dd($value1['id']);
            $count=Notification::where('id_int',$value1['id'])->where('connection_name','mysql_mkt_qr')->where('table_name','sample_data')->count();
            // dd($count);
           if($value1['tanggal']!=null){
                $end=date('Y-m-d');
                $start =$value1['tanggal'];
                $hasil = date_diff(date_create($start),date_create($end));
                $hari = $hasil->d;
                // dd($hari);  
            }
            else{
                 $hari='10';
            }
               
            if(($value1['id']!=null) AND ($count==0) AND ($hari < '7')){
                foreach ($userAll as $key2 => $value2) {
                    DB::table('notification')->insert([
                        'connection_name'=>"mysql_mkt_qr",
                        'table_name'=>"sample_data",
                        'alert_level'=>"DANGER",
                        'id_int'=> $value1['id'],
                        'nik'=>$value2,
                        'url'=>"sample-request",
                        'title'=>'Sample Request-'.$value1['sample_code']. ' ' .  $value1['buyer'] ,
                        'desc'=> 'Due Date '.substr($value1['tanggal'], 0, 30),
                        'is_read'=>"0",
                    ]);
                }
            }
        }
        return ;
    }

}