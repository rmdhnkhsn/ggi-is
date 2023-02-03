<?php

namespace App\Services\Marketing\RekapOrder;


class export_excel{
    public function dataAwal($all)
    {
        $data = [
            'id' => $all->id,
        ];
        dd($data);
    }
}