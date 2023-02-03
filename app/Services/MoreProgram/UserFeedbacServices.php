<?php

namespace App\Services\MoreProgram;

use Auth;
use App\Models\MoreProgram\UserFeedback\UserFeedback;
use App\Models\MoreProgram\UserFeedbackQuestionAnswer;


class UserFeedbacServices{
    public function feedback_module($feedback)
    {
        $data=[];
        foreach ($feedback as $key => $value) {
                $nilai_rating = collect($value->answer)->where('is_skip',0)
                ->groupBy('nik')
                ->map(function ($item) {
                        return array_merge(...$item->toArray());
                })->values()->toArray();
            foreach($nilai_rating as $key2 => $value2){
                $data[]=[
                    'id'=>$value->id,
                    'users_feedback_id'=>$value2['users_feedback_id'],
                    'sistem'=>$value->sistem,
                    'isaktif'=>$value->isaktif,
                    'url'=>$value->url,
                    'rating'=>$value2['rating'],
                    'nik'=>$value2['nik'],
                    'nama'=>$value2['nama'],
                ];
            }
        }  
        return $data;
    }
    public function module($feedback_module)
    {
        $data=collect($feedback_module)->groupBy('id');
        $record=[];
        foreach ($data as $key => $value) {
                $module = collect($value)
                ->groupBy('id')
                ->map(function ($item) {
                        return array_merge(...$item->toArray());
                })->values()->toArray();
            foreach($module as $key2 => $value2){
                $sum_rating=collect($feedback_module)->where('id',$value2['id'])->sum('rating');
                $record[]=[
                    'id'=>$value2['id'],
                    'isaktif'=>$value2['isaktif'],
                    'sistem'=>$value2['sistem'],
                    'url'=>$value2['url'],
                    'responden'=>count($value),
                    'rating'=>round($sum_rating/count($value),1),

                ];
            }
        }
        return $record;
    }
    public function answer($userfeedback)
    {
       $record=[];
        foreach ($userfeedback as $key => $value) {
            $eleminasi_rating = collect($value)
            ->groupBy('nik')
            ->map(function ($item) {
                    return array_merge(...$item->toArray());
            })->values()->toArray();
            foreach ($eleminasi_rating as $key2 => $value2) {
            $module=UserFeedback::where('id',$value2['users_feedback_id'])->first();
            $question=$value->where('nik',$value2['nik']);

                $record[]=[
                    'id'=>$value2['id'],
                    'users_feedback_id'=>$value2['users_feedback_id'],
                    'users_feedback_question_id'=>$value2['users_feedback_question_id'],
                    'sistem'=>$module->sistem,
                    'nik'=>$value2['nik'],
                    'nama'=>$value2['nama'],
                    'question'=> $question,
                    'rating'=>$value2['rating'],
                    'saran'=>$value2['saran'],
                    'created_at'=>$value2['created_at']
                ];
            }
        }
        $short=collect($record)->sortByDesc('created_at');
    return $short;
    }
    public function summary($Improvement)
    {
        $data=$Improvement->groupBy('answer');
        $record=[];
        foreach ($data as $key => $value) {
            
            if($key=='Sangat Membantu'){
                $id=1;
            }
            elseif ($key=='Membantu') {
                $id=2;
            }
            elseif ($key=='Netral') {
                $id=3;
            }
            elseif ($key=='Tidak Membantu') {
                $id=4;
            }
            elseif ($key=='Sangat Tidak Membantu') {
                $id=5;
            }
            $record[]=[
                'id'=>$id,
                'jawaban'=>$key,
                'jumlah'=>round(count($value)/count($Improvement)*100,2),
            ];
        }
        $collect=collect($record)->sortBy('id');
        return $collect;
    }
}