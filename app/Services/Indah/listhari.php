<?php

namespace App\Services\Indah;


class listhari{
    public function hari()
    {
        $hari = [
            '0' => 'Monday',
            '1' => 'Tuesday',
            '2' => 'Wednesday',
            '3' => 'Thursday',
            '4' => 'Friday',
            '5' => 'all_day',
        ];

        // dd($hari);
        return $hari;
    }
}