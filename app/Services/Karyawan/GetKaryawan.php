<?php

namespace App\Services\Karyawan;

use App\Karyawan;
use Illuminate\Support\Facades\DB;

class GetKaryawan {
    public static function queryGetAll($searchPending="1"){
        return DB::table('karyawan')
        ->select([
            '*'
        ])
        ->when($searchPending=="1", function($q){
            $q->where('isaktif',1);
        })
        ->when($searchPending=="0", function($q){
            $q->where('isaktif',0);
        });
    }
}

    