<?php

namespace App\Services\MoreProgram;

use DB;
use Auth;
use App\Models\Notification;
use App\Models\IT_DT\guide\GuideVideo;
use App\Models\IT_DT\guide\GuideVideoLog;

class leaderboard{

     public function userAll()
    {
        $user = Auth::user("nama")->nama;
        $data = GuideVideo :: where('created_by','=',$user)->get();

        return $data;
    }

     public function dataCountNama($data)
    {
        $dataAll = GuideVideoLog :: all();
        $dataVideo=[];
        foreach ($data as $key => $value) {
            
            $dataVideo[]=[
                'id' => $value->id,
                'action_value' => $value->action_value,
                'nik' => $value->nik,
                'created_by' => $value->created_by,
            ];
        }
        $collecByCreatedby = collect($dataVideo)->groupBy('nik');
        
        return $collecByCreatedby;
    }

}