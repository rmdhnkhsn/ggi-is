<?php

namespace App\Services\Production\MasterSmv;

use App\Models\Production\MasterSmv;
use Illuminate\Support\Facades\DB;

class checkPermission {
    public static function upload($nik){
        return DB::connection('mysql_smv')->select("select count(nik) as count from smv_permission where `upload` = 1 and nik = ?",[$nik])[0]->count;
    }

    public static function download($nik){
        return DB::connection('mysql_smv')->select("select count(nik) as count from smv_permission where `download` = 1 and nik = ?",[$nik])[0]->count;
    }

    public static function delete($nik){
        return DB::connection('mysql_smv')->select("select count(nik) as count from smv_permission where `delete` = 1 and nik = ?",[$nik])[0]->count;
    }

}