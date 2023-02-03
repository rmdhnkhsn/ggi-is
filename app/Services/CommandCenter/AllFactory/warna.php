<?php

namespace App\Services\CommandCenter\AllFactory;

use App\Branch;
use App\LineDetail;
use App\MasterLine;
use App\Http\Controllers\HomeController;
use App\Services\CommandCenter\AllFactory\qc;
use App\Services\CommandCenter\AllFactory\rework;
use App\Services\CommandCenter\AllFactory\overall;

class warna{

    public function PerBranch($dataValue)
    {
        $overall = [];
        foreach ($dataValue as $key => $value) {
            if ($value['nilai'] >= $value['critical']) {
               $overall[] = [
                   'nama' => $value['nama'],
                   'kondisi' => 1
               ];
            }else{
                $overall[] = [
                    'nama' => $value['nama'],
                    'kondisi' => 0
                ];
            }
        }

        $kondisi = collect($overall)->sum('kondisi');

        if ($kondisi == 0) {
            $warna = 0;
        }else{
            $warna = 1;
        }
        
        return $warna;
    }
    
    public function level2($dataCC)
    {
        $kondisi = collect($dataCC)->sum('warna');
        if ($kondisi == 0) {
                $warna = 0;
        }else{
                $warna = 1;
        }
        // dd($warna);
        return $warna;
    }

    public function semuabranch($dataSemua)
    {
        $warna = collect($dataSemua)->sum('warna');
        if ($warna == 0 or $warna == null) {
                $kondisi = 0;
        }else{
                $kondisi = 1;
        }

        return $kondisi;
    }

    public function allfactory($dataCC)
    {
            $warna = collect($dataCC)->sum('warna');
            if ($warna == 0 or $warna == null) {
                    $kondisi = 0;
            }else{
                    $kondisi = 1;
            }

            return $kondisi;
    }
}