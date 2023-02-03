<?php

namespace App\Services\CommandCenter\AllFactory;

use App\Branch;
use App\LineDetail;
use App\MasterLine;
use App\Http\Controllers\HomeController;

class overall{

    public function SemuaBranch($dataBranch, $dataRework, $dataRejectCutting, $dataRejectGarment, $dataFactoryAudit, $dataFinalInspection, $dataSampleInspection, $dataKlaimBuyer)
    {
        $dataFinal = [];
        if ($dataRework == 0 or $dataRework == null) {
            $dataFinal = 0;
        }else{
            foreach ($dataRework as $key => $value) {
                $jumlah =  $value['p_total_reject'] + $dataRejectCutting + $dataRejectGarment + $dataFactoryAudit +  $dataFinalInspection+ $dataSampleInspection + $dataKlaimBuyer;
                if ($jumlah == 0) {
                    $dataSemua = 0;
                }else{
                    // $dataSemua = round($jumlah/7,2);
                    $dataSemua = round($jumlah,2);
                }
                $warna = $value['warna'];
                foreach ($dataBranch as $key2 => $value2) {
                    if ($value2['nama_branch'] == $value['nama']) {
                        $dataFinal[] = [
                            'id' => $value2['id'],
                            'nama' => $value['nama'],
                            'datasemua' => $dataSemua,
                            'warna' => $warna,
                            'issues' => $value['issues'],
                        ];
                    }
                }
            }
        }
        // dd($dataFinal);
        return $dataFinal;
    }

    public function perbranch($dataValue)
    {
        $jumlah = collect($dataValue)->sum('nilai');
        $pembagi = collect($dataValue)->count('nama');
        
        if ($jumlah == 0 or $jumlah == null ) {
            $dataFinal = 0;
        }else{
            // $dataFinal = round($jumlah/$pembagi,2);
            $dataFinal = round($jumlah,2);
        }

        return $dataFinal;
    }

    public function overall($dataSemua)
    {
        // dd($dataSemua);

        $jumlahbranch = collect($dataSemua)->where('datasemua', '!=' , 0)->count('id');
        // dd($jumlahbranch);
        $jumlahdata = collect($dataSemua)->sum('datasemua');
        // dd($jumlahdata);
        if ($jumlahbranch == 0 || $jumlahbranch == null || $jumlahbranch == 0 || $jumlahbranch == null) {
            $overall = 0;
        }else{
            // $overall = round($jumlahdata/$jumlahbranch,2);
            $overall = round($jumlahdata/$jumlahbranch,2);
        }
        // dd($overall);
        return $overall;
    }

    public function level2($dataCC)
    {
        $jumlah = collect($dataCC)->sum('nilai');
        $pembagi = collect($dataCC)->count('nama');
        if ($jumlah == 0 or $jumlah == null) {
            $overall = 0;
        }else{
            $overall = round($jumlah/$pembagi,2);
        }

        return $overall;
    }

    public function home($dataCC)
    {
        $jumlah = collect($dataCC)->sum('nilai');
        $pembagi = collect($dataCC)->count('nama');
        if ($jumlah == 0 or $jumlah == null) {
            $overall = 0;
        }else{
            $overall = round($jumlah/$pembagi,2);
        }

        return $overall;
    }
}