<?php

namespace App\Services\Production\ProductCosting;

use Carbon\Carbon;
use App\Models\Cutting\Product_Costing\FormGelar;
use App\Services\Production\ProductCosting\report;
use App\Services\Production\ProductCosting\report_cutting;
use App\Services\Production\ProductCosting\report_bundling;
use App\Services\Production\ProductCosting\report_pressing;
use App\Services\Production\ProductCosting\report_numbering;

class count_report{
    public function all($data_form)
    {
        $data_gelar = (new report)->gelar_index($data_form);
        $data_cutting = (new report_cutting)->cutting_index($data_form);
        $data_numbering = (new report_numbering)->numbering_index($data_form);
        $data_pressing = (new report_pressing)->pressing_index($data_form);
        $data_bundling = (new report_bundling)->bundling_index($data_form);
        
        $rangkuman_gelar=collect($data_gelar)->groupBy('form_id');
        $rangkuman_cutting=collect($data_cutting)->groupBy('form_id');
        $rangkuman_numbering=collect($data_numbering)->groupBy('form_id');
        $rangkuman_pressing=collect($data_pressing)->groupBy('form_id');
        $rangkuman_bundling=collect($data_bundling)->groupBy('form_id');
        // dd($rangkuman_gelar);
        $all = [
            'gelar' => count($rangkuman_gelar),
            'cutting' => count($rangkuman_cutting),
            'numbering' => count($rangkuman_numbering),
            'pressing' => count($rangkuman_pressing),
            'bundling' => count($rangkuman_bundling),
        ];
        return $all;
    }

    public function gelar($data_pertama)
    {
            $coba = collect($data_pertama)->groupBy('form_id');
            $test = '';
            foreach ($coba as $key => $value) {
                $test = collect($value)->count('id');
            }
            // dd($test);
            return $test;
    }

    public function cutting($data_form)
    {
        $data = collect($data_form)->where('proses', 'Proses Cutting')->where('sequence', '30')->count('id');
        return $data;
    }

    public function numbering($data_form)
    {
        $data = collect($data_form)->where('proses', 'Proses Numbering')->where('sequence', '40')->count('id');
        return $data;
    }

    public function pressing($data_form)
    {
        $data = collect($data_form)->where('proses', 'Proses Pressing')->where('sequence', '50')->count('id');
        return $data;
    }

    public function bundling($data_form)
    {
        $data = collect($data_form)->where('proses', 'Proses Bundling')->where('sequence', '60')->count('id');
        return $data;
    }
}