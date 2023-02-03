<?php

namespace App\Services\Marketing\TrimCard;


class item_breakdown{
    public function datautama($banding, $data)
    {
        $hasil = [];
        foreach ($data as $key => $value) {
            foreach ($banding as $key2 => $value2) {
                if ($value->F4101_ITM == $value2) {
                    $hasil[] = [
                        'itemnumber' => $value->F4101_ITM,
                        'desc1' => $value->F4101_DSC1,
                        'desc2' => $value->F4101_DSC2,
                        'srtx' => $value->F4101_SRTX
                    ];
                }
            }
        }
        
        return $hasil;
    }
}