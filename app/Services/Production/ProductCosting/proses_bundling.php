<?php

namespace App\Services\Production\ProductCosting;

use App\Models\Cutting\Product_Costing\CuttingRemark;
use App\Models\Cutting\Product_Costing\ProsesBundlingUser;

class proses_bundling{
    public function index($bundling)
    {
        $data = [];

        // Untuk memdapatkan numbering user 
        $numbering_user = collect($bundling->proses_numbering_user)->count('id');
        if ($numbering_user != 0) {
            $nama_user_numbering = collect($bundling->proses_numbering_user)->implode('nama',', ');
        }else{
            $nama_user_numbering = null;
        }

        // Untuk mendapatkan pressing user 
        $pressing_user = collect($bundling->proses_pressing_user)->count('id');
        if ($pressing_user != 0) {
            $nama_user_pressing = collect($bundling->proses_pressing_user)->implode('nama',', ');
        }else{
            $nama_user_pressing = null;
        }
        // dd($nama_user_numbering);

        foreach ($bundling->gelar_qty_breakdown as $key => $value) {
            $data[] = [
                [
                    'id' => $value->id,
                    'form_id' => $value->form_id,
                    'nomor_meja' => $value->nomor_meja,
                    'country' => $value->country,
                    'no_wo' => $value->no_wo,
                    'color' => $value->color,
                    'qty_gelar' => $value->qty_gelar,
                    'size' => $value->size1,
                    'qty' => $value->qty1,
                    'numbering_user' => $nama_user_numbering,
                    'pressing_user' => $nama_user_pressing
                ],
                [
                    'id' => $value->id,
                    'form_id' => $value->form_id,
                    'nomor_meja' => $value->nomor_meja,
                    'country' => $value->country,
                    'no_wo' => $value->no_wo,
                    'color' => $value->color,
                    'qty_gelar' => $value->qty_gelar,
                    'size' => $value->size2,
                    'qty' => $value->qty2,
                    'numbering_user' => $nama_user_numbering,
                    'pressing_user' => $nama_user_pressing
                ], 
                [
                    'id' => $value->id,
                    'form_id' => $value->form_id,
                    'nomor_meja' => $value->nomor_meja,
                    'country' => $value->country,
                    'no_wo' => $value->no_wo,
                    'color' => $value->color,
                    'qty_gelar' => $value->qty_gelar,
                    'size' => $value->size3,
                    'qty' => $value->qty3,
                    'numbering_user' => $nama_user_numbering,
                    'pressing_user' => $nama_user_pressing
                ],
                [
                    'id' => $value->id,
                    'form_id' => $value->form_id,
                    'nomor_meja' => $value->nomor_meja,
                    'country' => $value->country,
                    'no_wo' => $value->no_wo,
                    'color' => $value->color,
                    'qty_gelar' => $value->qty_gelar,
                    'size' => $value->size4,
                    'qty' => $value->qty4,
                    'numbering_user' => $nama_user_numbering,
                    'pressing_user' => $nama_user_pressing
                ],
                [
                    'id' => $value->id,
                    'form_id' => $value->form_id,
                    'nomor_meja' => $value->nomor_meja,
                    'country' => $value->country,
                    'no_wo' => $value->no_wo,
                    'color' => $value->color,
                    'qty_gelar' => $value->qty_gelar,
                    'size' => $value->size5,
                    'qty' => $value->qty5,
                    'numbering_user' => $nama_user_numbering,
                    'pressing_user' => $nama_user_pressing
                ],
                [
                    'id' => $value->id,
                    'form_id' => $value->form_id,
                    'nomor_meja' => $value->nomor_meja,
                    'country' => $value->country,
                    'no_wo' => $value->no_wo,
                    'color' => $value->color,
                    'qty_gelar' => $value->qty_gelar,
                    'size' => $value->size6,
                    'qty' => $value->qty6,
                    'numbering_user' => $nama_user_numbering,
                    'pressing_user' => $nama_user_pressing
                ],
                [
                    'id' => $value->id,
                    'form_id' => $value->form_id,
                    'nomor_meja' => $value->nomor_meja,
                    'country' => $value->country,
                    'no_wo' => $value->no_wo,
                    'color' => $value->color,
                    'qty_gelar' => $value->qty_gelar,
                    'size' => $value->size7,
                    'qty' => $value->qty7,
                    'numbering_user' => $nama_user_numbering,
                    'pressing_user' => $nama_user_pressing
                ],
                [
                    'id' => $value->id,
                    'form_id' => $value->form_id,
                    'nomor_meja' => $value->nomor_meja,
                    'country' => $value->country,
                    'no_wo' => $value->no_wo,
                    'color' => $value->color,
                    'qty_gelar' => $value->qty_gelar,
                    'size' => $value->size8,
                    'qty' => $value->qty8,
                    'numbering_user' => $nama_user_numbering,
                    'pressing_user' => $nama_user_pressing
                ],
                [
                    'id' => $value->id,
                    'form_id' => $value->form_id,
                    'nomor_meja' => $value->nomor_meja,
                    'country' => $value->country,
                    'no_wo' => $value->no_wo,
                    'color' => $value->color,
                    'qty_gelar' => $value->qty_gelar,
                    'size' => $value->size9,
                    'qty' => $value->qty9,
                    'numbering_user' => $nama_user_numbering,
                    'pressing_user' => $nama_user_pressing
                ],
                [
                    'id' => $value->id,
                    'form_id' => $value->form_id,
                    'nomor_meja' => $value->nomor_meja,
                    'country' => $value->country,
                    'no_wo' => $value->no_wo,
                    'color' => $value->color,
                    'qty_gelar' => $value->qty_gelar,
                    'size' => $value->size10,
                    'qty' => $value->qty10,
                    'numbering_user' => $nama_user_numbering,
                    'pressing_user' => $nama_user_pressing
                ],
                [
                    'id' => $value->id,
                    'form_id' => $value->form_id,
                    'nomor_meja' => $value->nomor_meja,
                    'country' => $value->country,
                    'no_wo' => $value->no_wo,
                    'color' => $value->color,
                    'qty_gelar' => $value->qty_gelar,
                    'size' => $value->size11,
                    'qty' => $value->qty11,
                    'numbering_user' => $nama_user_numbering,
                    'pressing_user' => $nama_user_pressing
                ],
                [
                    'id' => $value->id,
                    'form_id' => $value->form_id,
                    'nomor_meja' => $value->nomor_meja,
                    'country' => $value->country,
                    'no_wo' => $value->no_wo,
                    'color' => $value->color,
                    'qty_gelar' => $value->qty_gelar,
                    'size' => $value->size12,
                    'qty' => $value->qty12,
                    'numbering_user' => $nama_user_numbering,
                    'pressing_user' => $nama_user_pressing
                ],
                [
                    'id' => $value->id,
                    'form_id' => $value->form_id,
                    'nomor_meja' => $value->nomor_meja,
                    'country' => $value->country,
                    'no_wo' => $value->no_wo,
                    'color' => $value->color,
                    'qty_gelar' => $value->qty_gelar,
                    'size' => $value->size13,
                    'qty' => $value->qty13,
                    'numbering_user' => $nama_user_numbering,
                    'pressing_user' => $nama_user_pressing
                ],
                [
                    'id' => $value->id,
                    'form_id' => $value->form_id,
                    'nomor_meja' => $value->nomor_meja,
                    'country' => $value->country,
                    'no_wo' => $value->no_wo,
                    'color' => $value->color,
                    'qty_gelar' => $value->qty_gelar,
                    'size' => $value->size14,
                    'qty' => $value->qty14,
                    'numbering_user' => $nama_user_numbering,
                    'pressing_user' => $nama_user_pressing
                ],
                [
                    'id' => $value->id,
                    'form_id' => $value->form_id,
                    'nomor_meja' => $value->nomor_meja,
                    'country' => $value->country,
                    'no_wo' => $value->no_wo,
                    'color' => $value->color,
                    'qty_gelar' => $value->qty_gelar,
                    'size' => $value->size15,
                    'qty' => $value->qty15,
                    'numbering_user' => $nama_user_numbering,
                    'pressing_user' => $nama_user_pressing
                ],
            ];
        }
        
        $jadi = [];
        foreach ($data as $key => $value) {
            $isian = collect($value)->where('size','!=',null)->where('qty','!=',null);
            foreach ($isian as $key2 => $value2) {
                $jadi[]=[
                    'id' => $value2['id'],
                    'form_id' => $value2['form_id'],
                    'nomor_meja' => $value2['nomor_meja'],
                    'country' => $value2['country'],
                    'no_wo' => $value2['no_wo'],
                    'color' => $value2['color'],
                    'qty_gelar' => $value2['qty_gelar'],
                    'size' => $value2['size'],
                    'qty' => $value2['qty'],
                    'sisa' => $value2['qty'],
                    'numbering_user' => $value2['numbering_user'],
                    'pressing_user' => $value2['pressing_user']
                ];
            }
        }
        return $jadi;
    }
}