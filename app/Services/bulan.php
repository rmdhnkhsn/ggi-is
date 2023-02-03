<?php

namespace App\Services;

use Carbon\Carbon;

class bulan{
    public function list($tahun)
    {
        $listBulan = [
            // list bulan 
            'January' => date($tahun.'-01'),
            'February' => date($tahun.'-02'),
            'March' => date($tahun.'-03'),
            'April' => date($tahun.'-04'),
            'May' => date($tahun.'-05'),
            'June' => date($tahun.'-06'),
            'July' => date($tahun.'-07'),
            'August' => date($tahun.'-08'),
            'September' => date($tahun.'-09'),
            'October' => date($tahun.'-10'),
            'November' => date($tahun.'-11'),
            'December' => date($tahun.'-12'),
            // end list bulan 
        ];
        return $listBulan;
    }

    public function awalakhir($listBulan)
    {
        $datax = [];
        foreach ($listBulan as $key => $value) {
            $tglAwal = Carbon::createFromFormat('Y-m', $value)->firstOfMonth()->format('Y-m-d');
            $tglAkhir = Carbon::createFromFormat('Y-m', $value)->endOfMonth()->format('Y-m-d');
            $datax[] = [
                'namabulan' => $key,
                'tglAwal' => $tglAwal,
                'tglAkhir' => $tglAkhir
            ]; 
        }
        
        return $datax;
    }
}