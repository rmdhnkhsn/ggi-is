<?php

namespace App\Services\CommandCenter\Scheduler\AllFactory;


class production{
    public function schedule()
    {
        $dataProduction = [
            'id' => 3,
            'nama_bagian' => "PRODUCTION",
            'nilai' => 0,
            'warna' => 0,
            'issues'=> '0',
            'good' => '5',
            'poor' => '0',
            'critical' => '10'
        ];

        return $dataProduction;
    }
}