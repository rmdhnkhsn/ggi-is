<?php

namespace App\Services\Marketing\RekapOrder;


class export_pdf{
    // public function dataSemua($data)
    // {
    //     $all = [];
    //     foreach ($data->rekap_detail as $key => $value) {
    //         foreach ($data->rekap_breakdown as $key2 => $value2) {
    //             if ($value2->detail_id == $value->id) {
    //                  $all[] = [
    //                     'buyer' => $data->buyer,
    //                     'po' => $data->no_po,
    //                     'contract' => $value->contract,
    //                     'article' => $value->article,
    //                     'style' => $value->style,
    //                     'colorway' => $value->colorway,
    //                     'no_or' => $value->no_or,
    //                     'product_name' => $value->product_name,
    //                     'fabric' => $value2->fabric,
    //                     'color_code' => $value2->color_code,
    //                     'color_name' => $value2->color_name,
    //                     'country_code' => $value2->country_code,
    //                     'size1' => $value2->size1,
    //                     'size2' => $value2->size2,
    //                     'size3' => $value2->size3,
    //                     'size4' => $value2->size4,
    //                     'size5' => $value2->size5,
    //                     'size6' => $value2->size6,
    //                     'size7' => $value2->size7,
    //                     'size8' => $value2->size8,
    //                     'size9' => $value2->size9,
    //                     'size10' => $value2->size10,
    //                     'size11' => $value2->size11,
    //                     'size12' => $value2->size12,
    //                     'size13' => $value2->size13,
    //                     'size10' => $value2->size10,
    //                     'size15' => $value2->size15,
    //                     'fob' => $value->fob,
    //                     'cmt' => $value->cmt,
    //                     'cmtp' => $value->cmtp,
    //                     'total_amount' => $value->total_amount,
    //                 ];
    //             }
    //         }
    //     }
    // }
    public function dataSemua($master)
    {
        $all = [];
        foreach ($master->rekap_detail as $key => $value) {
            foreach ($master->rekap_breakdown as $key2 => $value2) {
                $all[] = [
                    'id_detail' => $value->id,
                    'contract'=> $value->contract,
                    'article'=> $value->article,
                    'style'=> $value->style,
                    'colorway'=> $value->colorway
                ];
            }   
        }
        // dd($all);
    }
}