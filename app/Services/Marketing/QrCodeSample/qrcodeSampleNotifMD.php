<?php

namespace App\Services\Marketing\QrCodeSample;

use DB;
use App\Branch;
use App\qrcodemodel;
use App\Models\Notification;

class qrcodeSampleNotifMD{
    public function userPIC()
    {
        $userPIC = [
            '0' => 'GC110081',
            '1' => '332100185',
            '3' => '330047',
            '4' => '332100232',
            '5' => '390056',
            '6' => '920080',
            '7' => '340016',          
            
        ];

        // dd($userPIC);
        return $userPIC;
    }
    public function data_notif()
    {
         $data = qrcodemodel::orderBy('id','desc')->get();
         
        // dd($data->style);
        $dataPO = [];
        foreach ($data as $key => $value) {
        
            $dataPO[] = [
                'id' => $value->id,
                'buyer' => $value->buyer,
                'style' => $value->style,
                'nama' => auth()->user()->nama,
            ];
        }
        // dd($dataPO);

        return $dataPO;
    }
    public function qrSample($userPIC, $dataPO){

        foreach ($dataPO as $key1 => $value1) {
            $couun=Notification::where('id_int',$value1['id'])->where('connection_name','mysql_mkt_qr')->where('table_name','data_input')->count();
            // dd($value1);
            
               
            if((qrcodemodel::whereNotEmpty('field')) AND ($couun==0)){
                foreach ($userPIC as $key2 => $value2) {
                // dd($value2);
                    DB::table('notification')->insert([
                        'connection_name'=>"mysql_mkt_qr",
                        'table_name'=>"data_input",
                        'alert_level'=>"WARNING",
                        'id_int'=> $value1['id'],
                        'nik'=>$value2,
                        'url'=>"qrcode.index",
                        'title'=>$value1['buyer'] ,
                        'desc'=> ' New Production Sample ' .substr($value1['style'], 0, 30) .' from ' .substr($value1['nama'], 0, 30),
                        'is_read'=>"0",
                    ]);
                }
            }
        }
        return ;
    }
}