<?php

namespace App\Services\CommandCenter\Scheduler\AllFactory;


class ggi_indah{
    public function schedule()
    {
        $dataIndah = [
            'id' => 4,
            'nama_bagian' => "GGI INDAH",
            'nilai' => 0,
            'warna' => 0,
            'issues'=> '0',
            'good' => '5',
            'poor' => '0',
            'critical' => '10'
        ];

        return $dataIndah;
    }
}