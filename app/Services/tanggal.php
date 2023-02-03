<?php

namespace App\Services;

class tanggal
{
    public function commandCenter()
    {
        // $tanggal = date('Y-m-d', strtotime('-14 days'));
        $tanggal = date('Y-m-d');

        return $tanggal;
    }
}
