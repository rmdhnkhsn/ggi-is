<?php

namespace App\Services\Production\ProductCosting;


class proses_gelar{
    public function store($form_id, $request)
    {
        // dd($request->all());
        foreach ($form_id as $key => $value) {
            $input[] = [
                'form_id' => $value,
                'no_wo' => $request['no_wo'][$key],
                'no_roll' => $request['no_roll'][$key],
                'color' => $request['color'][$key],
                'qty_roll' => $request['qty_roll'][$key],
                'qty_gelar' => $request['qty_gelar'][$key],
                'qty_potong' => $request['qty_potong'][$key],
                'terpakai' => $request['terpakai'][$key],
                'tidak_terpakai' => $request['tidak_terpakai'][$key],
                'keterangan' => $request['keterangan'][$key],
                'nomor_meja' => $request->nomor_meja,
                'country' => $request->country,
                'qty_lembar' => $request->qty_lembar,
                'qty_actual_lembar' => $request->qty_actual_lembar,
                'panjang_marker_actual' => $request->panjang_marker_actual,
                'lebar_marker_actual' => $request->lebar_marker_actual,
            ];
        }
        // dd($input);
        return $input;
    }

    public function qty($form)
    {
        // dd($form);
        $wo = collect($form->proses_gelar)->groupby('no_wo');
        $coba = [];
        foreach ($wo as $key => $value) {
            $color = collect($value)
                            ->groupBy('color')
                            ->map(function ($item) {
                                    return array_merge(...$item->toArray());
                            })->values()->toArray();
            foreach ($color as $key2 => $value2) {
                
                $qty_gelar = collect($form->proses_gelar)->where('no_wo', $value2['no_wo'])->where('color', $value2['color'])->sum('qty_gelar');
                $gelaran_wo = collect($form->gelaran_wo)->where('no_wo', $value2['no_wo'])->where('color', $value2['color'])->first();
                if ($gelaran_wo != null) {
                   $size1 = $gelaran_wo->size1;
                   $size2 = $gelaran_wo->size2;
                   $size3 = $gelaran_wo->size3;
                   $size4 = $gelaran_wo->size4;
                   $size5 = $gelaran_wo->size5;
                   $size6 = $gelaran_wo->size6;
                   $size7 = $gelaran_wo->size7;
                   $size8 = $gelaran_wo->size8;
                   $size9 = $gelaran_wo->size9;
                   $size10 = $gelaran_wo->size10;
                   $size11 = $gelaran_wo->size11;
                   $size12 = $gelaran_wo->size12;
                   $size13 = $gelaran_wo->size13;
                   $size14 = $gelaran_wo->size14;
                   $size15 = $gelaran_wo->size15;
                }else{
                    $size1 = '';
                    $size2 = ''; 
                    $size3 = ''; 
                    $size4 = ''; 
                    $size5 = ''; 
                    $size6 = ''; 
                    $size7 = ''; 
                    $size8 = ''; 
                    $size9 = ''; 
                    $size10 = ''; 
                    $size11 = ''; 
                    $size12 = ''; 
                    $size13 = ''; 
                    $size14 = ''; 
                    $size15 = ''; 
                }
                $coba[] = [
                    'form_id' => $value2['form_id'],
                    'nomor_meja' => $value2['nomor_meja'],
                    'country' => $value2['country'],
                    'no_wo' => $value2['no_wo'],
                    'color' => $value2['color'],
                    'qty_gelar' => $qty_gelar,
                    'size1' => $size1,
                    'size2' => $size2,
                    'size3' => $size3,
                    'size4' => $size4,
                    'size5' => $size5,
                    'size6' => $size6,
                    'size7' => $size7,
                    'size8' => $size8,
                    'size9' => $size9,
                    'size10' => $size10,
                    'size11' => $size11,
                    'size12' => $size12,
                    'size13' => $size13,
                    'size14' => $size14,
                    'size15' => $size15,
                ];
            }       
        }
        // dd($coba);
        $data = collect($coba)->groupBy('no_wo');
        return $data;
    }

    public function gelar_qty($qty, $form)
    {
        $percobaan = [];
        foreach ($qty as $key => $value) {
            foreach ($value as $key2 => $value2) {
                // dd($qty);
                $assort = collect($form->assortmarker)->count('id');
                if ($assort != 0) {
                    $data1=collect($form->assortmarker)->where('size', $value2['size1'])->first();
                    $data2=collect($form->assortmarker)->where('size', $value2['size2'])->first();
                    $data3=collect($form->assortmarker)->where('size', $value2['size3'])->first();
                    $data4=collect($form->assortmarker)->where('size', $value2['size4'])->first();
                    $data5=collect($form->assortmarker)->where('size', $value2['size5'])->first();
                    $data6=collect($form->assortmarker)->where('size', $value2['size6'])->first();
                    $data7=collect($form->assortmarker)->where('size', $value2['size7'])->first();
                    $data8=collect($form->assortmarker)->where('size', $value2['size8'])->first();
                    $data9=collect($form->assortmarker)->where('size', $value2['size9'])->first();
                    $data10=collect($form->assortmarker)->where('size', $value2['size10'])->first();
                    $data11=collect($form->assortmarker)->where('size', $value2['size11'])->first();
                    $data12=collect($form->assortmarker)->where('size', $value2['size12'])->first();
                    $data13=collect($form->assortmarker)->where('size', $value2['size13'])->first();
                    $data14=collect($form->assortmarker)->where('size', $value2['size14'])->first();
                    $data15=collect($form->assortmarker)->where('size', $value2['size15'])->first();
                    if ($data1 != null) {
                        $qty1 = $data1->qty*$value2['qty_gelar'];
                    }else {
                        $qty1=0;
                    }
                    if ($data2 != null) {
                        $qty2 = $data2->qty*$value2['qty_gelar'];
                    }else {
                        $qty2=0;
                    }
                    if ($data3 != null) {
                        $qty3 = $data3->qty*$value2['qty_gelar'];
                    }else {
                        $qty3=0;
                    }
                    if ($data4 != null) {
                        $qty4 = $data4->qty*$value2['qty_gelar'];
                    }else {
                        $qty4=0;
                    }
                    if ($data5 != null) {
                        $qty5 = $data5->qty*$value2['qty_gelar'];
                    }else {
                        $qty5=0;
                    }
                    if ($data6 != null) {
                        $qty6 = $data6->qty*$value2['qty_gelar'];
                    }else {
                        $qty6=0;
                    }
                    if ($data7 != null) {
                        $qty7 = $data7->qty*$value2['qty_gelar'];
                    }else {
                        $qty7=0;
                    }
                    if ($data8 != null) {
                        $qty8 = $data8->qty*$value2['qty_gelar'];
                    }else {
                        $qty8=0;
                    }
                    if ($data9 != null) {
                        $qty9 = $data9->qty*$value2['qty_gelar'];
                    }else {
                        $qty9=0;
                    }
                    if ($data10 != null) {
                        $qty10 = $data10->qty*$value2['qty_gelar'];
                    }else {
                        $qty10=0;
                    }
                    if ($data11 != null) {
                        $qty11 = $data11->qty*$value2['qty_gelar'];
                    }else {
                        $qty11=0;
                    }
                    if ($data12 != null) {
                        $qty12 = $data12->qty*$value2['qty_gelar'];
                    }else {
                        $qty12=0;
                    }
                    if ($data13 != null) {
                        $qty13 = $data13->qty*$value2['qty_gelar'];
                    }else {
                        $qty13=0;
                    }
                    if ($data14 != null) {
                        $qty14 = $data14->qty*$value2['qty_gelar'];
                    }else {
                        $qty14=0;
                    }
                    if ($data15 != null) {
                        $qty15 = $data15->qty*$value2['qty_gelar'];
                    }else {
                        $qty15=0;
                    }
                }else {
                    $qty1="";
                    $qty2="";
                    $qty3="";
                    $qty4="";
                    $qty5="";
                    $qty6="";
                    $qty7="";
                    $qty8="";
                    $qty9="";
                    $qty10="";
                    $qty11="";
                    $qty12="";
                    $qty13="";
                    $qty14="";
                    $qty15="";
                }
                // dd($qty1);
                $percobaan[] = [
                    'form_id' => $value2['form_id'],
                    'nomor_meja' => $value2['nomor_meja'],
                    'country' => $value2['country'],
                    'no_wo' => $value2['no_wo'],
                    'color' => $value2['color'],
                    'qty_gelar' => $value2['qty_gelar'],
                    'size1' => $value2['size1'],
                    'size2' => $value2['size2'],
                    'size3' => $value2['size3'],
                    'size4' => $value2['size4'],
                    'size5' => $value2['size5'],
                    'size6' => $value2['size6'],
                    'size7' => $value2['size7'],
                    'size8' => $value2['size8'],
                    'size9' => $value2['size9'],
                    'size10' => $value2['size10'],
                    'size11' => $value2['size11'],
                    'size12' => $value2['size12'],
                    'size13' => $value2['size13'],
                    'size14' => $value2['size14'],
                    'size15' => $value2['size15'],
                    'qty1' => $qty1,
                    'qty2' => $qty2,
                    'qty3' => $qty3,
                    'qty4' => $qty4,
                    'qty5' => $qty5,
                    'qty6' => $qty6,
                    'qty7' => $qty7,
                    'qty8' => $qty8,
                    'qty9' => $qty9,
                    'qty10' => $qty10,
                    'qty11' => $qty11,
                    'qty12' => $qty12,
                    'qty13' => $qty13,
                    'qty14' => $qty14,
                    'qty15' => $qty15,
                ];
            }
        }
        // dd($percobaan);
        return $percobaan;
    }
}