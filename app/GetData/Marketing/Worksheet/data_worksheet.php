<?php

namespace App\GetData\Marketing\Worksheet;

use App\ListBuyer;
use App\Models\Marketing\RekapOrder\RekapOrder;
use App\Models\Marketing\Worksheet\GeneralPO;
use App\GetData\Rework\Report\Bulanan\kodebulan;

// use App\Models\Marketing\RekapOrder\RekapDetail;

class data_worksheet{
    public function data_index($data)
    {
        // dd($data);
        $items =  $data->filter(function ($item)
        {
            // dd($item->measurement);
            $material_fabric = collect($item->material_fabric)->count('id');
            $material_sewing = collect($item->material_sewing)->count('id');
            $measurement = collect($item->measurement)->count('id');
            $packing = collect($item->packing)->count('id');
            // dd($material_fabric);
            return $item->general_identity == null || $material_fabric == 0 || $material_sewing == 0 ||
                   $measurement == 0 || $packing == 0;
        });

        $index = [];
        foreach ($items as $key => $value) {
                // dd($value->rekap_detail);
                $rekap_detail = collect($value->rekap_detail)->count('id');
                $rekap_breakdown = collect($value->rekap_breakdown)->count('id');
                $rekap_size = collect($value->rekap_size)->count('id');
                $buyer = ListBuyer::findorfail($value->buyer);
                $total_style = collect($value->rekap_detail)->count('style');
                $style = collect($value->rekap_detail)->implode('style', ', ');
                $article = collect($value->rekap_detail)->implode('article', ', ');
                $qty = collect($value->rekap_breakdown)->where('master_order_id', $value->id)->sum('total_size');
                // dd($qty);
                $cek_udah_ada = GeneralPO::where('rekap_order_id', $value->id)->count('id');
                if ($cek_udah_ada == 0 && $rekap_detail != 0 && $rekap_breakdown != 0 && $rekap_size != 0) {
                    $index[] = [
                        'id' => $value->id,
                        'no_po' => $value->no_po,
                        'style' => $style,
                        'article' => $article,
                        'buyer' => $buyer->F0101_ALPH,
                        'total_style' => $total_style,
                        'qty' => $qty,
                        'shipment_to' => $value->shipment_to
                    ];
                }
        }
        return $index;
    }

    public function data_worksheet($data)
    {
        $items =  $data->filter(function ($item)
        {

            $material_fabric = collect($item->material_fabric)->count('id');
            $material_sewing = collect($item->material_sewing)->count('id');
            $packing = collect($item->packing)->count('id');

            return $item->general_identity != null && $material_fabric != 0 && $material_sewing != 0 && $packing != 0;
            // return $item->general_identity != null && $item->material_fabric != null && $item->material_sewing != null &&
            //        $item->measurement != null && $item->packing != null;
        });
        // dd($items);
        $index = [];
        foreach ($items as $key => $value) {
                $buyer = ListBuyer::findorfail($value->buyer);
                $total_style = collect($value->rekap_detail)->count('style');
                $style = collect($value->rekap_detail)->implode('style', ', ');
                $article = collect($value->rekap_detail)->implode('art$article', ', ');
                $qty = collect($value->rekap_breakdown)->where('master_order_id', $value->id)->sum('total_size');
                // dd($qty);
    
                $index[] = [
                    'id' => $value->id,
                    'no_po' => $value->general_identity->no_po,
                    'style' => substr($value->general_identity->style_name,0,30)."...",
                    'article' => substr($value->general_identity->article,0,30).'...',
                    'buyer' => $value->general_identity->buyer,
                    'total_style' => $total_style,
                    'qty' => $qty,
                    'note1' => $value->note1,
                    'shipment_to' => $value->shipment_to
                ];
        }
        // dd($index);
        return $index;
    }

    public function no_or($data)
    {
        // dd($data);
        $no_or = [];
        foreach ($data->rekap_detail as $key => $value) {
            // dd($value);
            $no_or[] = [
                'master_id' => $data->id,
                'id' => $value->id,
                'no_or' => $value->no_or,
                'style' => $value->style
            ];
        }
        // dd($no_or);
        // $data_or = collect($no_or)->where('no_or', '!=', null);
        $data_or = collect($no_or)->where('style', '!=', null);
        // dd($data_or);
        
        return $data_or;
    }

    public function general_input($data_input, $fileName,$fileName2,$fileName3,$fileName4)
    {
        // dd($data_input);
        $input= [
            '_token' => $data_input['_token'],
            'no_po' => $data_input['no_po'],
            'po_date' => $data_input['po_date'],
            'master_id' => $data_input['master_id'],
            'nomor_or' => $data_input['nomor_or'],
            'contract' => $data_input['contract'],
            'buyer' => $data_input['buyer'],
            'agent' => $data_input['agent'],
            'article' => $data_input['article'],
            'product_name' => $data_input['product_name'],
            'style_code' => $data_input['style_code'],
            'style_name' => $data_input['style_name'],
            'description' => $data_input['description'],
            'shipment_date' => $data_input['shipment_date'],
            'ship_to' => null,
            'exfact_date' => $data_input['exfact_date'],
            'file' => $fileName,
            'file2' => $fileName2,
            'file3' => $fileName3,
            'file4' => $fileName4
        ];
        // dd($input);
        return $input;
        // jangan marah marah nanti cepet tua
    }

    public function quantity_order($master_data)
    {
        $array_size = [
            'size1'=> $master_data->rekap_size->size1,
            'size2'=> $master_data->rekap_size->size2,
            'size3'=> $master_data->rekap_size->size3,
            'size4'=> $master_data->rekap_size->size4,
            'size5'=> $master_data->rekap_size->size5,
            'size6'=> $master_data->rekap_size->size6,
            'size7'=> $master_data->rekap_size->size7,
            'size8'=> $master_data->rekap_size->size8,
            'size9'=> $master_data->rekap_size->size9,
            'size10'=> $master_data->rekap_size->size10,
            'size11'=> $master_data->rekap_size->size11,
            'size12'=> $master_data->rekap_size->size12,
            'size13'=> $master_data->rekap_size->size13,
            'size14'=> $master_data->rekap_size->size14,
            'size15'=> $master_data->rekap_size->size15
            ];
        // dd($array_size);
        $hilang_null = array_diff($array_size, array("",null));

        $data_size = collect($hilang_null)->implode(', ');
        $qty = collect($master_data->rekap_breakdown)->sum('total_size');
        $color = collect($master_data->rekap_detail)->implode('colorway', ',');
        // dd($color);

        $result = [
            'qty' => $qty,
            'size' => $data_size,
            'color'  => $color
        ];
        return $result;
    }

    public function style($master_data)
    {
        // dd($master_data->rekap_detail);
        $style = [];
        foreach ($master_data->rekap_detail as $key => $value) {
            $total_breakdown = collect($master_data->rekap_breakdown)->where('detail_id', $value->id)->count('detail_id');
            $style[] = [
                'detail_id' => $value->id,
                'style' =>$value->style,
                'product_name'=>$value->product_name,
                'exfact' => $value->ex_fact,
                'jumlah' => $total_breakdown
            ];
        }
        return $style;
    }

    public function copy_worksheet()
    {
        $worksheet = RekapOrder::where('worksheet_date', '!=', null)->get();
        $copy_worksheet = [];

        foreach ($worksheet as $key => $value) {
            if ($value->general_identity != null) {
                $po = $value->general_identity->no_po;
                $style = $value->general_identity->style_name;
            }else {
                $po = '';
                $style = '';
            }
            $copy_worksheet[] = [
                'master_id' => $value->id,
                'no_po' => $po,
                'style_name' => $style,
            ]; 
        }
        $hasil = collect($copy_worksheet)->where('no_po', '!=', null)->where('style_name', '!=', null);
        return $hasil;
    }
}