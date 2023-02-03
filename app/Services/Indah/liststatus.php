<?php

namespace App\Services\Indah;


class liststatus{
    public function status()
    {
        $status = [
            '0' => 'Non Active',
            '1' => 'Active'
        ];

        // dd($status);
        return $status;
    }
}