<?php

namespace App\Services\Accfin;

use Auth;
use App\Branch;
use Illuminate\Http\Request;



class budgeting{
    public function account_debit($data)
    {
        $record=[];
        foreach ($data as $key => $value) {
            $record[]=[
                'account'=>$value->account,
                'deskripsi'=>$value->deskripsi,
                'Jan'=>null,
                'Feb'=>null,
                'Mar'=>null,
                'Apr'=>null,
                'May'=>null,
                'Jun'=>null,
                'Jul'=>null,
                'Aug'=>null,
                'Sep'=>null,
                'Oct'=>null,
                'Nov'=>null,
                'Dec'=>null,
            ];
       }
       return $record;
    }
    public function limit_budget($data)
    {
        $record=[];
        foreach ($data as $key => $value) {
            $record[]=[
                'account'=>$value->account,
                'deskripsi'=>$value->deskripsi,
                'Jan'=>$value->Jan,
                'Feb'=>$value->Feb,
                'Mar'=>$value->Mar,
                'Apr'=>$value->Apr,
                'May'=>$value->May,
                'Jun'=>$value->Jun,
                'Jul'=>$value->Jul,
                'Aug'=>$value->Aug,
                'Sep'=>$value->Sep,
                'Oct'=>$value->Oct,
                'Nov'=>$value->Nov,
                'Dec'=>$value->Dec,
            ];
       }
       return $record;
    }

}