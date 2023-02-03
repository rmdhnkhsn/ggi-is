<?php

namespace App\Services\CommandCenter\Scheduler\AllFactory;

use App\Services\Audit\ccaudit;

class audit_allfac{
    public function schedule()
    {
        $dataIT = [
            'id' => 11,
            'nama_bagian' => "INTERNAL AUDIT",
            'nilai' => (new ccaudit)->total_critical(),
            'warna' => 0,
            'issues'=> (new ccaudit)->total_anomali(),
            'good' => '5',
            'poor' => '6',
            'critical' => '10'
        ];

        return $dataIT;
    }
}