<?php

namespace App\Services\CommandCenter\Scheduler\AllFactory;

use App\Services\tiket\perfactory;

class it{
    public function schedule()
    {
        $dataIT = [
            'id' => 1,
            'nama_bagian' => "IT & DT",
            'nilai' => (new perfactory)->total_critical(),
            'warna' => 0,
            'issues'=> (new perfactory)->total_issu(),
            'good' => '5',
            'poor' => '6',
            'critical' => '10'
        ];

        return $dataIT;
    }
}