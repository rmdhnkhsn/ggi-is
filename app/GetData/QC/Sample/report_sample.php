<?php

namespace App\GetData\QC\Sample;

use Carbon\Carbon;
use App\Models\QC\Sample\SampleReport;

class report_sample{
    public function bulan_utama($dataBranch, $FirstDate, $LastDate)
    {
        $data =  SampleReport::with('fabric_quality')
                ->whereBetween('date', [$FirstDate, $LastDate])
                ->where('branch', $dataBranch->kode_branch)
                ->where('branchdetail', $dataBranch->branchdetail)
                ->get();

        return $data;
    }
}