<?php

namespace App\Services\Marketing\QrCodeSample;

use DB;
use App\Branch;
use App\qrcodemodel;
use App\Models\Notification;

class qrcodeSample{
    public function user_ppm()
    {
        $user_ppm = [
            '0' => 'GC110081',
            '1' => '332100185',
            '3' => '240026',
            '4' => '332100232',
            '5' => '390056',
            '6' => '920080',
            '7' => '340016',
            '8' => '250009',
            '9' => '320657',
            '10' => '220718',
            '11' => '330047',
            '12' => '332100194',            
            '13' => '350005',            
            '14' => '380248',            
            '15' => '380133',            
            '16' => '350023',              
            
        ];

        // dd($user_ppm);
        return $user_ppm;
    }
    public function data_notif()
    {
         $data = qrcodemodel::orderBy('ppm_date','desc')->get();
         
        // dd($data->style);
        $dataPO = [];
        foreach ($data as $key => $value) {
        if($value['ppm_date']!=null){
                $end=date('Y-m-d');
                $start =$value['ppm_date'];
                $hasil = date_diff(date_create($start),date_create($end));
                $hari = $hasil->d;
                // dd($hari);
            }
            else{
                $hari='10';
            }
            
            if(($value['ppm']==null) AND ($hari<='7')){

                $fdate=$value->ppm_date;
                $tanggal = $value->ppm_date;
                $end_audit=date('Y-m-d');
                        $start =$value->ppm_date;
                        $end = $end_audit;
                        $hasil = date_diff(date_create($start),date_create($end));
                        $jam = $hasil->d;
                        if($tanggal<$end_audit){
                            $datawaktu= '-'.$jam.' '.'late';
                        }
                        elseif($tanggal ==  $end_audit){
                            $datawaktu= 'last day';
                        }
                        else{
                            $datawaktu= $jam.' '.'day left';
                        }
                $rowData = collect([
                        $value['smv'],
                        $value['ppm'],
                        $value['work'],
                        $value['trimcard'],
                        $value['techspech'],
                    ]);
                $percentData = ($rowData->filter(function($item){ return $item !== null; })->count() / $rowData->count()) * 100;
                    $dataPO[] = [
                        'id' => $value->id,
                        'buyer' => $value->buyer,
                        'style' => $value->style,
                        'ppm_date' => $value->ppm_date,
                        'ppm' => $value->ppm,
                        'datawaktu' => $datawaktu,
                        'percentData' => $percentData,
                    ];
            }
        }
        // dd($dataPO);

        return $dataPO;
    }
    public function qrSample($user_ppm, $dataPO){

        $today=date('Y-m-d');
        $date = strtotime($today);
        $week = strtotime("+7 day", $date);
        $tgl=date('Y-m-d', $week);
        // dd($tgl);
        
        foreach ($dataPO as $key1 => $value1) {
            $couun=Notification::where('id_int',$value1['id'])->where('connection_name','mysql_mkt_qr')->where('table_name','data_input')->count();
            // dd($value1);
            if($value1['ppm_date']!=null){
                $end=date('Y-m-d');
                $start =$value1['ppm_date'];
                $hasil = date_diff(date_create($start),date_create($end));
                $hari = $hasil->d;
                // dd($hari);
            }
            else{
                 $hari='10';
            }
               
            if(($value1['ppm']==null) AND ($couun==0)AND ($hari<='7')){
                foreach ($user_ppm as $key2 => $value2) {
                // dd($value2);
                    DB::table('notification')->insert([
                        'connection_name'=>"mysql_mkt_qr",
                        'table_name'=>"data_input",
                        'alert_level'=>"DANGER",
                        'id_int'=> $value1['id'],
                        'nik'=>$value2,
                        'url'=>"qrcode.index",
                        'title'=>$value1['style'] . ' PPM Due Date ',
                        'desc'=>substr($value1['datawaktu'], 0, 30),
                        'is_read'=>"0",
                    ]);
                }
            }
        }
        return ;
    }
}