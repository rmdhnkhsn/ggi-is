<?php

namespace App\Services\sampleRoom;

use DB;
use Auth;
use Carbon\Carbon;
use App\Models\Marketing\SampleRequest\sampleData;
use App\Models\Marketing\SampleRequest\sampleUser;
use App\Models\Notification;


class NotificationSampleDone{

    public function userNotifDone()
    {
        $user = Auth::user("nik")->nik;
        $datataNotifDone= sampleData::where('nik','=',$user)->get();
        // dd($datataNotifDone);
        $dataNotifDoneMD = [];
                foreach ($datataNotifDone as $key => $value) {
                        $dataNotifDoneMD[] = [
                            'nik' => $value->nik,
                        ];
                }
                $nik = [];
                 foreach ($dataNotifDoneMD as $key => $value) {
            $nik []=$value ['nik'];
            
        }
        // dd($dataCollect);
        return $nik;
    }

      public function dataNotifDone()
    {
        $user = Auth::user("nik")->nik;
        $datataNotifDone= sampleData::where('nik','=',$user)->get();
         
        $dataNotif = [];
        foreach ($datataNotifDone as $key => $value) {
            if(($value->result == "DONE") || ($value->result == "LATE")){

                $dataNotif[] = [
                    'id' => $value->id,
                    'buyer' => $value->buyer,
                    'style' => $value->style,
                    'departement_trecking' => $value->departement_trecking,
                    'Accepting_date' => $value->Accepting_date,
                    'result' => $value->result,
                ];
            }
        }

        // dd($dataNotif);
        return $dataNotif;
    }

    public function doneNotifSample($request){
        DB::table('notification')->insert([
            'connection_name'=>"mysql_mkt_qr",
            'table_name'=>"sample_data",
            'alert_level'=>"SUCCESS",
            'id_int'=> $request['id'],
            'nik'=>$request['nik'],
            'url'=>"sample-request",
            'title'=>' Done Sample Request '. $request['buyer'] ,
            'desc'=> substr($request['style'], 0, 30),
            'is_read'=>"0",
        ]);
    }

}