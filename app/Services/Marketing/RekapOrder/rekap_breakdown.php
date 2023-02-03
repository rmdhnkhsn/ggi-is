<?php

namespace App\Services\Marketing\RekapOrder;


class rekap_breakdown{
    public function store($report, $request)
    {
        // dd($request->all());
        foreach ($report as $key => $value) {
            if ($request['size1'] != null) {
                $size1 = $request['size1'][$key];
            }else{
                $size1 = null;
            }
            if ($request['size2'] != null) {
                $size2 = $request['size2'][$key];
            }else{
                $size2 = null;
            }
            if ($request['size3'] != null) {
                $size3 = $request['size3'][$key];
            }else{
                $size3 = null;
            }
            if ($request['size4'] != null) {
                $size4 = $request['size4'][$key];
            }else{
                $size4 = null;
            }
            if ($request['size5'] != null) {
                $size5 = $request['size5'][$key];
            }else{
                $size5 = null;
            }
            if ($request['size6'] != null) {
                $size6 = $request['size6'][$key];
            }else{
                $size6 = null;
            }
            if ($request['size7'] != null) {
                $size7 = $request['size7'][$key];
            }else{
                $size7 = null;
            }
            if ($request['size8'] != null) {
                $size8 = $request['size8'][$key];
            }else{
                $size8 = null;
            }
            if ($request['size9'] != null) {
                $size9 = $request['size9'][$key];
            }else{
                $size9 = null;
            }
            if ($request['size10'] != null) {
                $size10 = $request['size10'][$key];
            }else{
                $size10 = null;
            }
            if ($request['size11'] != null) {
                $size11 = $request['size11'][$key];
            }else{
                $size11 = null;
            }
            if ($request['size12'] != null) {
                $size12 = $request['size12'][$key];
            }else{
                $size12 = null;
            }
            if ($request['size13'] != null) {
                $size13 = $request['size13'][$key];
            }else{
                $size13 = null;
            }
            if ($request['size14'] != null) {
                $size14 = $request['size14'][$key];
            }else{
                $size14 = null;
            }
            if ($request['size15'] != null) {
                $size15 = $request['size15'][$key];
            }else{
                $size15 = null;
            }
            if ($request['size16'] != null) {
                $size16 = $request['size16'][$key];
            }else{
                $size16 = null;
            }
            if ($request['size17'] != null) {
                $size17 = $request['size17'][$key];
            }else{
                $size17 = null;
            }
            if ($request['size18'] != null) {
                $size18 = $request['size18'][$key];
            }else{
                $size18 = null;
            }
            $input[] = [
                'master_order_id' => $value,
                'rekap_detail_id' => $request['rekap_detail_id'][$key],
                'color_code' => $request['color_code'][$key],
                'color_name' => $request['color_name'][$key],
                'country_code' => $request['country_code'][$key],
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
                'size16' => $size16,
                'size17' => $size17,
                'size18' => $size18,
                'total_size' => $size1 + $size2 + $size3 + $size4 + $size5 + $size6 +
                                $size7 + $size8 + $size9 + $size10 + $size11 + $size12 +
                                $size13 + $size14 + $size15 + $size16 + $size17 + $size18
            ];
        }
        // dd($input);
        return $input;
    }

    public function add($request)
    {
        $input = [
            'rekap_detail_id' => $request->rekap_detail_id,
            'master_order_id' => $request->master_order_id,
            'color_code' => $request->color_code,
            'color_name' => $request->color_name,
            'country_code' => $request->country_code,
            'size1' => $request->size1,
            'size2' => $request->size2,
            'size3' => $request->size3,
            'size4' => $request->size4,
            'size5' => $request->size5,
            'size6' => $request->size6,
            'size7' => $request->size7,
            'size8' => $request->size8,
            'size9' => $request->size9,
            'size10' => $request->size10,
            'size11' => $request->size11,
            'size12' => $request->size12,
            'size13' => $request->size13,
            'size14' => $request->size14,
            'size15' => $request->size15,
            'size16' => $request->size16,
            'size17' => $request->size17,
            'size18' => $request->size18,
            'total_size' => $request->size1 + $request->size2 + $request->size3 + $request->size4 + $request->size5 + $request->size6 +
                            $request->size7 + $request->size8 + $request->size9 + $request->size10 + $request->size11 + $request->size12 +
                            $request->size13 + $request->size14 + $request->size15 + $request->size16 + $request->size17 + $request->size18
        ];
        
        return $input;
    }

    public function update($id,$request)
    {
        $validatedData = [
            'color_code' => $request->color_code,
            'color_name' => $request->color_name,
            'country_code' => $request->country_code,
            'size1' => $request->size1,
            'size2' => $request->size2,
            'size3' => $request->size3,
            'size4' => $request->size4,
            'size5' => $request->size5,
            'size6' => $request->size6,
            'size7' => $request->size7,
            'size8' => $request->size8,
            'size9' => $request->size9,
            'size10' => $request->size10,
            'size11' => $request->size11,
            'size12' => $request->size12,
            'size13' => $request->size13,
            'size14' => $request->size14,
            'size15' => $request->size15,
            'size16' => $request->size16,
            'size17' => $request->size17,
            'size18' => $request->size18,
            'total_size' => $request->size1 + $request->size2 + $request->size3 + $request->size4 + $request->size5 + $request->size6 +
            $request->size7 + $request->size8 + $request->size9 + $request->size10 + $request->size11 + $request->size12 +
            $request->size13 + $request->size14 + $request->size15 + $request->size16 + $request->size17 + $request->size18,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        // dd($validatedData);
        
        return $validatedData;
    }

    public function jumlah($master, $detail)
    {
        $jumlah = [
            'size1' => collect($master->rekap_breakdown)->where('rekap_detail_id', $detail->id)->sum('size1'),
            'size2' => collect($master->rekap_breakdown)->where('rekap_detail_id', $detail->id)->sum('size2'),
            'size3' => collect($master->rekap_breakdown)->where('rekap_detail_id', $detail->id)->sum('size3'),
            'size4' => collect($master->rekap_breakdown)->where('rekap_detail_id', $detail->id)->sum('size4'),
            'size5' => collect($master->rekap_breakdown)->where('rekap_detail_id', $detail->id)->sum('size5'),
            'size6' => collect($master->rekap_breakdown)->where('rekap_detail_id', $detail->id)->sum('size6'),
            'size7' => collect($master->rekap_breakdown)->where('rekap_detail_id', $detail->id)->sum('size7'),
            'size8' => collect($master->rekap_breakdown)->where('rekap_detail_id', $detail->id)->sum('size8'),
            'size9' => collect($master->rekap_breakdown)->where('rekap_detail_id', $detail->id)->sum('size9'),
            'size10' => collect($master->rekap_breakdown)->where('rekap_detail_id', $detail->id)->sum('size10'),
            'size11' => collect($master->rekap_breakdown)->where('rekap_detail_id', $detail->id)->sum('size11'),
            'size12' => collect($master->rekap_breakdown)->where('rekap_detail_id', $detail->id)->sum('size12'),
            'size13' => collect($master->rekap_breakdown)->where('rekap_detail_id', $detail->id)->sum('size13'),
            'size14' => collect($master->rekap_breakdown)->where('rekap_detail_id', $detail->id)->sum('size14'),
            'size15' => collect($master->rekap_breakdown)->where('rekap_detail_id', $detail->id)->sum('size15'),
            'size16' => collect($master->rekap_breakdown)->where('rekap_detail_id', $detail->id)->sum('size16'),
            'size17' => collect($master->rekap_breakdown)->where('rekap_detail_id', $detail->id)->sum('size17'),
            'size18' => collect($master->rekap_breakdown)->where('rekap_detail_id', $detail->id)->sum('size18'),
            'total_size' => collect($master->rekap_breakdown)->where('rekap_detail_id', $detail->id)->sum('total_size'),
        ];

        return $jumlah;
    }

    public function size($master)
    {
        $size = [
            $master->rekap_size->size1,
            $master->rekap_size->size2,
            $master->rekap_size->size3,
            $master->rekap_size->size4,
            $master->rekap_size->size5,
            $master->rekap_size->size6,
            $master->rekap_size->size7,
            $master->rekap_size->size8,
            $master->rekap_size->size9,
            $master->rekap_size->size10,
            $master->rekap_size->size11,
            $master->rekap_size->size12,
            $master->rekap_size->size13,
            $master->rekap_size->size14,
            $master->rekap_size->size15,
            $master->rekap_size->size16,
            $master->rekap_size->size17,
            $master->rekap_size->size18,
        ];
        $ukuran = array_filter($size,'strlen');
        

        return $ukuran;
    }

    public function total_amount($jumlah, $detail)
    {
        // dd($detail->quantity_pack);
        if ($detail->kemasan == 'PC') {
            $qty_pack = 1;
        }else {
            if ($detail->quantity_pack == null) {
                $qty_pack = 1;
            }else {
                $qty_pack = $detail->quantity_pack;
            }
        }

        $values = number_format(($jumlah['total_size'] *  $detail->nilai)/$qty_pack,2);

        return $values;
    }

    public function total_size($master)
    {
        $jumlah = [];
        foreach ($master->rekap_detail as $key => $value) {
            $jumlah[] = [
                    'id' => $value->id,
                    'nilai' => $value->nilai,
                    'size1' => collect($master->rekap_breakdown)->where('detail_id', $value->id)->sum('size1'),
                    'size2' => collect($master->rekap_breakdown)->where('detail_id', $value->id)->sum('size2'),
                    'size3' => collect($master->rekap_breakdown)->where('detail_id', $value->id)->sum('size3'),
                    'size4' => collect($master->rekap_breakdown)->where('detail_id', $value->id)->sum('size4'),
                    'size5' => collect($master->rekap_breakdown)->where('detail_id', $value->id)->sum('size5'),
                    'size6' => collect($master->rekap_breakdown)->where('detail_id', $value->id)->sum('size6'),
                    'size7' => collect($master->rekap_breakdown)->where('detail_id', $value->id)->sum('size7'),
                    'size8' => collect($master->rekap_breakdown)->where('detail_id', $value->id)->sum('size8'),
                    'size9' => collect($master->rekap_breakdown)->where('detail_id', $value->id)->sum('size9'),
                    'size10' => collect($master->rekap_breakdown)->where('detail_id', $value->id)->sum('size10'),
                    'size11' => collect($master->rekap_breakdown)->where('detail_id', $value->id)->sum('size11'),
                    'size12' => collect($master->rekap_breakdown)->where('detail_id', $value->id)->sum('size12'),
                    'size13' => collect($master->rekap_breakdown)->where('detail_id', $value->id)->sum('size13'),
                    'size14' => collect($master->rekap_breakdown)->where('detail_id', $value->id)->sum('size14'),
                    'size15' => collect($master->rekap_breakdown)->where('detail_id', $value->id)->sum('size15'),
                    'size16' => collect($master->rekap_breakdown)->where('detail_id', $value->id)->sum('size16'),
                    'size17' => collect($master->rekap_breakdown)->where('detail_id', $value->id)->sum('size17'),
                    'size18' => collect($master->rekap_breakdown)->where('detail_id', $value->id)->sum('size18'),
                    'total_size' => collect($master->rekap_breakdown)->where('detail_id', $value->id)->sum('total_size'),
                    
                ];
        }
        
        return $jumlah;
    }

    public function download($total_size, $master)
    {
        $total_amount = [];
        foreach ($total_size as $key => $value) {
            $total_amount[] = [
                'rekap_detail_id' => $value['id'],
                'nilai' => round($value['total_size'] * $value['nilai'],2)
            ];
        }
        
        return $total_amount;
    }
}