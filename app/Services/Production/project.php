<?php

namespace App\Services\Production;
use App\Stower;
class project{
    public function list_project()
    {
        $list_project = [
            '1' => ['nama' => "SIGNAL TOWER",
                    'nilai' => 0,
                    'warna' => 0,
                    'issues'=> '0',
                    'good' => '5',
                    'critical' => '10'
                    ],
        ];

        return $list_project;
    }

    public function data_branch(Request $request,$Stower)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $bulan = $request->bulan;
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);

	    $stowers =Stower::where('facility', $dataBranch->branchdetail)
                ->where('tanggal','>=', $tanggal_awal)->where('tanggal','<=', $tanggal_akhir)
                ->get();
        // dd($stowers);
        return $stowers;
    }
}