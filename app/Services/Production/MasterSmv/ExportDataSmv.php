<?php

namespace App\Services\Production\MasterSmv;

use App\Models\Production\MasterSmv;
use App\MyTrait\ExportCSVTrait;
use Illuminate\Support\Facades\DB;

class ExportDataSmv{
    use ExportCSVTrait{
        export as traitExport;
    }

    public static function exportCsvEndUser(){
        $records = [];
        DB::connection('mysql_smv')->table('smv')
        ->select([
            'tanggal',
            'buyer',
            'style',
            'item',
            'nama_proses',
            'cycle_time',
            'smv_minute',
            'output_pj',
            'mesin',
        ])
        ->orderBy('smv_id', 'asc')
        ->chunk(200, function($data)use(&$records){
           foreach ($data as $key => $value) {
               array_push($records, $value);
           }
        });

        if(!count($records)) throw new \Exception("Data master smv kosong");

        return self::traitExport(self::callbackSeluruhData($records),'data_master_gsmv_' . date('Y_m_d'));
    }

}