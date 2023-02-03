<?php

namespace App\Services\CommandCenter\Scheduler\AllFactory;

use App\Models\CommandCenter\CCQC;
use App\Services\CommandCenter\AllFactory\warna;
use App\Services\CommandCenter\AllFactory\issues;
use App\Services\CommandCenter\AllFactory\overall;

class cc_qc{
    public function schedule()
    {
        $dataQC1 = CCQC::all();
        $dataQC = [
            'id' => 2,
            'nama_bagian' => "QUALITY CONTROL",
            'nilai' =>  (new overall)->overall($dataQC1),
            'warna' => (new warna)->semuabranch($dataQC1),
            'issues'=> (new issues)->semuaQC($dataQC1),
            'good' => '5',
            'poor' => '0',
            'critical' => '10'
        ];

        return $dataQC;
    }
}