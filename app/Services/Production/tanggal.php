<?php

namespace App\Services\Production;

use Carbon\Carbon;

class tanggal{
    public function tanggal()
    {
        $tanggal = date('Y-m-d');

        return $tanggal;
    }
    public function LastFirstDate()
    {
        $tgl_akhir = date('Y-m-d');
        // $tgl_akhir = '2022-08-02';

        $date = strtotime($tgl_akhir);
        $date = strtotime("-7 day", $date);
        $tgl_awal=date('Y-m-d', $date);
        $record=[
            'first'=>$tgl_awal,
            'last'=>$tgl_akhir,
        ];
        return $record;
    }
}