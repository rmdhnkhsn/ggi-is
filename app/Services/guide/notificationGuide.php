<?php

namespace App\Services\guide;

use DB;
use App\Models\Notification;
use App\Models\IT_DT\guide\GuideVideo;

class notificationGuide{

     public function userAll()
    {
        $data = GuideVideo :: all();
        $userAll = [
            '0' => 'GC110081',
            '1' => '332100185',
            '17' => 'GC110080',
            // '3' => '240026',
            // '4' => '332100232',
            // '5' => '390056',
            // '6' => '920080',
            // '7' => '340016',
            // '8' => '250009',
            // '9' => '320657',
            // '10' => '220718',
            // '11' => '330047',
            // '12' => '332100194',            
            // '13' => '350005',            
            // '14' => '380248',            
            // '15' => '380133',            
            // '16' => '350023',              
            
        ];

        // dd($data);
        return $userAll;
    }

     public function data_notif()
    {
         $data = GuideVideo::orderBy('id','desc')->get();
         
        $dataPO = [];
        foreach ($data as $key => $value) {
        
            $dataPO[] = [
                'id' => $value->id,
                'title' => $value->title,
                'desc' => $value->desc,
                'video_path' => $value->video_path,
                'created_by' => $value->created_by,
            ];
        }
        return $dataPO;
    }

     public function notifVideo($userAll, $dataPO){
// dd($dataPO);
        foreach ($dataPO as $key1 => $value1) {
            // dd($value1['id']);
            $count=Notification::where('id_int',$value1['id'])->where('connection_name','mysql_ticket')->where('table_name','it_videos')->count();
            //  dd($count);  
            if(($value1['video_path'] !=null) AND ($count==0)){
                foreach ($userAll as $key2 => $value2) {
                // dd($value2);
                    DB::table('notification')->insert([
                        'connection_name'=>"mysql_ticket",
                        'table_name'=>"it_videos",
                        'alert_level'=>"SUCCESS",
                        'id_int'=> $value1['id'],
                        'nik'=>$value2,
                        'url'=> url("guide/guide-playlist")."/".$value1['id'],
                        'title'=>$value1['created_by'] ,
                        'desc'=>' New Video Upload '. substr($value1['title'], 0, 30),
                        'is_read'=>"0",
                    ]);
                }
            }
        }
        return ;
    }

}