<?php

namespace App\Services\QC\RejectGarment;

use App\JdeApi;
use App\ListBuyer;
use App\MasterLine;

class reject_garment{
    public function no_wo($line)
    {
        // dd($line);
        $no_wo = [];
        foreach ($line->ltarget as $key => $value) {
            // dd($value);
            $no_wo[] = [
                'target_id'=> $value->id,
                'id_line' => $line->id,
                'nama_line' => $line->string2,
                'no_wo' => $value->no_wo
            ];
        }
        return $no_wo;
    }

    public function jde($no_wo, $jde)
    {
        // dd($no_wo);
        $buyer = ListBuyer::all();
        // dd($buyer);
        $dataJDE = [];
        foreach ($no_wo as $key => $value) {
            foreach ($jde as $key2 => $value2) {
                if ($value['no_wo'] == $value2->F4801_DOCO) {
                    $buyer = ListBuyer::findorfail($value2->F4801_AN8);
                    $dataJDE[] = [
                        'target_id' => $value['target_id'],
                        'id_line' => $value['id_line'],
                        'nama_line' => $value['nama_line'],
                        'no_wo' => $value['no_wo'],
                        'buyer' => $buyer->F0101_ALPH,
                        'item_desc' => $value2->F4801_DL01,
                        'qty_order' => $value2->F4801_UORG 
                    ];
                }
            }
        }
        // dd($dataJDE);
        return $dataJDE;
    }

    public function dataAwal($line)
    {
        // dd($line);
        $jde = JdeApi::findorfail($line->no_wo);
        $dataLine = MasterLine::findorfail($line->id_line);
        // dd($dataLine);
        $buyer = ListBuyer::findorfail($jde->F4801_AN8);
        $dataAwal = [
            'no_wo' => $jde->F4801_DOCO,
            'qty_order' => $jde->F4801_UORG,
            'id_line' => $dataLine->id,
            'line' => $dataLine->string1,
            'item_desc' => $jde->F4801_DL01,
            'buyer' => $buyer->F0101_ALPH
        ];

        // dd($dataAwal);
        return $dataAwal;
    }
}