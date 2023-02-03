<?php

namespace App\Services\Production\ProductCosting;

use Carbon\Carbon;
use App\Models\Cutting\Product_Costing\FormGelar;
use App\Models\Cutting\Product_Costing\CuttingRemark;
use App\Models\Cutting\Product_Costing\CuttingAtribut;
use App\Models\Cutting\Product_Costing\KodeKerjaKaryawan;
use App\Models\Cutting\Product_Costing\CuttingComponentPPIC;

class report_analytics{
    public function analytics_index($data_gelar, $data_cutting, $data_numbering, $data_pressing, $data_bundling)
    {
        $gelar = collect($data_gelar)->groupby('no_wo');
        // dd($gelar);
        $result = [];

        foreach ($gelar as $key => $value) { 
            // dd($key);
            $result_gelar = collect($value)
                        ->groupBy('form_id')
                        ->map(function ($item) {
                                return array_merge(...$item->toArray());
                        })->values()->toArray();
            foreach ($result_gelar as $key2 => $value2) {
                // dd($value2);
                $total_cost_wo = collect($value)->where('no_wo', $key)->where('form_id', $value2['form_id'])->sum('total_cost_wo');
                $result[] = [
                    'no_wo' => $key,
                    'form_id' => $value2['form_id'],
                    'tanggal_gelar' => $value2['tanggal'],
                    'start_time_gelar' => $value2['start_time'],
                    'total_waktu_gelar' => $value2['total_waktu'],2,
                    'finish_time_gelar' => $value2['finish_time'],
                    'total_qty_gelar' => $value2['total_qty'],
                    'cost_pc_gelar' => $value2['cost_pc'],
                    'total_cost_wo_gelar' => $total_cost_wo
                ];
            }
        }
        // dd($result);
        $result2 = [];
        foreach ($result as $key => $value) {
            // Cutting 
            $cutting_info = collect($data_cutting)->where('form_id', $value['form_id'])->where('no_wo', $value['no_wo'])->first();
            $total_cost_cutting = collect($data_cutting)->where('form_id', $value['form_id'])->where('no_wo', $value['no_wo'])->sum('total_cost_wo');
            // dd($data_cutting);
            if ($cutting_info == null) {
                $cutting_tanggal = "";
                $start_time_cutting = null;
                $total_waktu_cutting = null;
                $finish_time_cutting = null;
                $total_qty_cutting = null;
                $cost_pc_cutting = null;
            }else {
                $cutting_tanggal = $cutting_info['tanggal'];
                $start_time_cutting = $cutting_info['start'];
                $total_waktu_cutting = round($cutting_info['total_waktu'],2);
                $finish_time_cutting = $cutting_info['finish'];
                $total_qty_cutting = $cutting_info['total_qty'];
                $cost_pc_cutting = $cutting_info['cost_pc'];
                $total_cost_wo_cutting = $total_cost_cutting;
            }

            // Numbering 
            $numbering_info = collect($data_numbering)->where('form_id', $value['form_id'])->where('no_wo', $value['no_wo'])->first();
            $total_cost_numbering = collect($data_numbering)->where('form_id', $value['form_id'])->where('no_wo', $value['no_wo'])->sum('total_cost_wo');
            // dd($numbering_info);
            if ($numbering_info == null) {
                $numbering_tanggal = "";
                $start_time_numbering = null;
                $total_waktu_numbering = null;
                $finish_time_numbering = null;
                $total_qty_numbering = null;
                $cost_pc_numbering = null;
            }else {
                $numbering_tanggal = $numbering_info['tanggal'];
                $start_time_numbering = $numbering_info['start'];
                $total_waktu_numbering = round($numbering_info['total_waktu'],2);
                $finish_time_numbering = $numbering_info['finish'];
                $total_qty_numbering = $numbering_info['total_qty'];
                $cost_pc_numbering = $numbering_info['cost_pc'];
                $total_cost_wo_numbering = $total_cost_numbering;
            }

            // Pressing 
            $pressing_info = collect($data_pressing)->where('form_id', $value['form_id'])->where('no_wo', $value['no_wo'])->first();
            $total_cost_pressing = collect($data_pressing)->where('form_id', $value['form_id'])->where('no_wo', $value['no_wo'])->sum('total_cost_wo');
            // dd($total_cost_pressing);
            if ($pressing_info == null) {
                $pressing_tanggal = "";
                $start_time_pressing = null;
                $total_waktu_pressing = null;
                $finish_time_pressing = null;
                $total_qty_pressing = null;
                $cost_pc_pressing = null;
            }else {
                $pressing_tanggal = $pressing_info['tanggal'];
                $start_time_pressing = $pressing_info['start'];
                $total_waktu_pressing = round($pressing_info['total_waktu'],2);
                $finish_time_pressing = $pressing_info['finish'];
                $total_qty_pressing = $pressing_info['total_qty'];
                $cost_pc_pressing = $pressing_info['cost_pc'];
                $total_cost_wo_pressing = $total_cost_pressing;
            }

            // Pressing 
            $bundling_info = collect($data_bundling)->where('form_id', $value['form_id'])->where('no_wo', $value['no_wo'])->first();
            $total_cost_bundling = collect($data_bundling)->where('form_id', $value['form_id'])->where('no_wo', $value['no_wo'])->sum('total_cost_wo');
            // dd($bundling_info);
            if ($bundling_info == null) {
                $bundling_tanggal = "";
                $start_time_bundling = null;
                $total_waktu_bundling = null;
                $finish_time_bundling = null;
                $total_qty_bundling = null;
                $cost_pc_bundling = null;
            }else {
                $bundling_tanggal = $bundling_info['tanggal'];
                $start_time_bundling = $bundling_info['start'];
                $total_waktu_bundling = round($bundling_info['total_waktu'],2);
                $finish_time_bundling = $bundling_info['finish'];
                $total_qty_bundling = $bundling_info['total_qty'];
                $cost_pc_bundling = $bundling_info['cost_pc'];
                $total_cost_wo_bundling = $total_cost_bundling;
            }

            $result2[] = [
                'no_wo' => $value['no_wo'],
                'form_id' => $value['form_id'],
                'tanggal_gelar' => $value['tanggal_gelar'],
                'start_time_gelar' => $value['start_time_gelar'],
                'total_waktu_gelar' => round($value['total_waktu_gelar'],2),
                'finish_time_gelar' => $value['finish_time_gelar'],
                'total_qty_gelar' => $value['total_qty_gelar'],
                'cost_pc_gelar' => $value['cost_pc_gelar'],
                'total_cost_wo_gelar' => $value['total_cost_wo_gelar'],
                '--Proses Cutting--' => '--Proses Cutting--',
                'tanggal_cutting' => $cutting_tanggal,
                'start_time_cutting' => $start_time_cutting,
                'total_waktu_cutting' => $total_waktu_cutting,
                'finish_time_cutting' => $finish_time_cutting,
                'total_qty_cutting' => $total_qty_cutting,
                'cost_pc_cutting' => $cost_pc_cutting,
                'total_cost_wo_cutting' => $total_cost_cutting,
                '--Proses Numbering--' => '--Proses Numbering--',
                'tanggal_numbering' => $numbering_tanggal,
                'start_time_numbering' => $start_time_numbering,
                'total_waktu_numbering' => $total_waktu_numbering,
                'finish_time_numbering' => $finish_time_numbering,
                'total_qty_numbering' => $total_qty_numbering,
                'cost_pc_numbering' => $cost_pc_numbering,
                'total_cost_wo_numbering' => $total_cost_numbering,
                '--Proses Pressing--' => '--Proses Pressing--',
                'tanggal_pressing' => $pressing_tanggal,
                'start_time_pressing' => $start_time_pressing,
                'total_waktu_pressing' => $total_waktu_pressing,
                'finish_time_pressing' => $finish_time_pressing,
                'total_qty_pressing' => $total_qty_pressing,
                'cost_pc_pressing' => $cost_pc_pressing,
                'total_cost_wo_pressing' => $total_cost_pressing,
                '--Proses Bundling--' => '--Proses Bundling--',
                'tanggal_bundling' => $bundling_tanggal,
                'start_time_bundling' => $start_time_bundling,
                'total_waktu_bundling' => $total_waktu_bundling,
                'finish_time_bundling' => $finish_time_bundling,
                'total_qty_bundling' => $total_qty_bundling,
                'cost_pc_bundling' => $cost_pc_bundling,
                'total_cost_wo_bundling' => $total_cost_bundling,
            ];
        }
        
        $hasil3 = collect($result2)->groupBy('no_wo')->toArray();
        // dd($hasil3);
        $result3 = [];
        foreach ($hasil3 as $key => $value) {
            $form_id = collect($result2)->where('no_wo', $key)->implode('form_id', ' ~ ');
            // Gelar
            $tanggal_gelar = collect($result2)->where('no_wo', $key)->implode('tanggal_gelar', ' ~ ');
            $start_time_gelar = collect($result2)->where('no_wo', $key)->implode('start_time_gelar', ' ~ ');
            $total_waktu_gelar = collect($result2)->where('no_wo', $key)->implode('total_waktu_gelar', ' ~ ');
            $finish_time_gelar = collect($result2)->where('no_wo', $key)->implode('finish_time_gelar', ' ~ ');
            $total_qty_gelar = collect($result2)->where('no_wo', $key)->implode('total_qty_gelar', ' ~ ');
            $cost_pc_gelar = collect($result2)->where('no_wo', $key)->implode('cost_pc_gelar', ' ~ ');
            $total_cost_wo_gelar = collect($result2)->where('no_wo', $key)->implode('total_cost_wo_gelar', ' ~ ');
            $total_bayar_gelar = collect($result2)->where('no_wo', $key)->sum('total_cost_wo_gelar', ' ~ ');
            // Cutting
            $tanggal_cutting = collect($result2)->where('no_wo', $key)->implode('tanggal_cutting', ' ~ ');
            $start_time_cutting = collect($result2)->where('no_wo', $key)->implode('start_time_cutting', ' ~ ');
            $total_waktu_cutting = collect($result2)->where('no_wo', $key)->implode('total_waktu_cutting', ' ~ ');
            $finish_time_cutting = collect($result2)->where('no_wo', $key)->implode('finish_time_cutting', ' ~ ');
            $total_qty_cutting = collect($result2)->where('no_wo', $key)->implode('total_qty_cutting', ' ~ ');
            $cost_pc_cutting = collect($result2)->where('no_wo', $key)->implode('cost_pc_cutting', ' ~ ');
            $total_cost_wo_cutting = collect($result2)->where('no_wo', $key)->implode('total_cost_wo_cutting', ' ~ ');
            $total_bayar_cutting = collect($result2)->where('no_wo', $key)->sum('total_cost_wo_cutting', ' ~ ');
            // Numbering
            $tanggal_numbering = collect($result2)->where('no_wo', $key)->implode('tanggal_numbering', ' ~ ');
            $start_time_numbering = collect($result2)->where('no_wo', $key)->implode('start_time_numbering', ' ~ ');
            $total_waktu_numbering = collect($result2)->where('no_wo', $key)->implode('total_waktu_numbering', ' ~ ');
            $finish_time_numbering = collect($result2)->where('no_wo', $key)->implode('finish_time_numbering', ' ~ ');
            $total_qty_numbering = collect($result2)->where('no_wo', $key)->implode('total_qty_numbering', ' ~ ');
            $cost_pc_numbering = collect($result2)->where('no_wo', $key)->implode('cost_pc_numbering', ' ~ ');
            $total_cost_wo_numbering = collect($result2)->where('no_wo', $key)->implode('total_cost_wo_numbering', ' ~ ');
            $total_bayar_numbering = collect($result2)->where('no_wo', $key)->sum('total_cost_wo_numbering', ' ~ ');
            // Pressing 
            $tanggal_pressing = collect($result2)->where('no_wo', $key)->implode('tanggal_pressing', ' ~ ');
            $start_time_pressing = collect($result2)->where('no_wo', $key)->implode('start_time_pressing', ' ~ ');
            $total_waktu_pressing = collect($result2)->where('no_wo', $key)->implode('total_waktu_pressing', ' ~ ');
            $finish_time_pressing = collect($result2)->where('no_wo', $key)->implode('finish_time_pressing', ' ~ ');
            $total_qty_pressing = collect($result2)->where('no_wo', $key)->implode('total_qty_pressing', ' ~ ');
            $cost_pc_pressing = collect($result2)->where('no_wo', $key)->implode('cost_pc_pressing', ' ~ ');
            $total_cost_wo_pressing = collect($result2)->where('no_wo', $key)->implode('total_cost_wo_pressing', ' ~ ');
            $total_bayar_pressing = collect($result2)->where('no_wo', $key)->sum('total_cost_wo_pressing', ' ~ ');
            // Bundling
            $tanggal_bundling = collect($result2)->where('no_wo', $key)->implode('tanggal_bundling', ' ~ ');
            $start_time_bundling = collect($result2)->where('no_wo', $key)->implode('start_time_bundling', ' ~ ');
            $total_waktu_bundling = collect($result2)->where('no_wo', $key)->implode('total_waktu_bundling', ' ~ ');
            $finish_time_bundling = collect($result2)->where('no_wo', $key)->implode('finish_time_bundling', ' ~ ');
            $total_qty_bundling = collect($result2)->where('no_wo', $key)->implode('total_qty_bundling', ' ~ ');
            $cost_pc_bundling = collect($result2)->where('no_wo', $key)->implode('cost_pc_bundling', ' ~ ');
            $total_cost_wo_bundling = collect($result2)->where('no_wo', $key)->implode('total_cost_wo_bundling', ' ~ ');
            $total_bayar_bundling = collect($result2)->where('no_wo', $key)->sum('total_cost_wo_bundling', ' ~ ');

            $result3[] = [
                'no_wo' => $key,
                'form_id' => $form_id,
                // Gelar 
                'tanggal_gelar' => $tanggal_gelar,
                'start_time_gelar' => $start_time_gelar,
                'total_waktu_gelar' => $total_waktu_gelar,
                'finish_time_gelar' => $finish_time_gelar,
                'total_qty_gelar' => $total_qty_gelar,
                'cost_pc_gelar' => $cost_pc_gelar,
                'total_cost_wo_gelar' => $total_cost_wo_gelar,
                'total_bayar_gelar'=> $total_bayar_gelar,
                // Cutting 
                'tanggal_cutting' => $tanggal_cutting,
                'start_time_cutting' => $start_time_cutting,
                'total_waktu_cutting' => $total_waktu_cutting,
                'finish_time_cutting' => $finish_time_cutting,
                'total_qty_cutting' => $total_qty_cutting,
                'cost_pc_cutting' => $cost_pc_cutting,
                'total_cost_wo_cutting' => $total_cost_wo_cutting,
                'total_bayar_cutting'=> $total_bayar_cutting,
                // Numbering 
                'tanggal_numbering' => $tanggal_numbering,
                'start_time_numbering' => $start_time_numbering,
                'total_waktu_numbering' => $total_waktu_numbering,
                'finish_time_numbering' => $finish_time_numbering,
                'total_qty_numbering' => $total_qty_numbering,
                'cost_pc_numbering' => $cost_pc_numbering,
                'total_cost_wo_numbering' => $total_cost_wo_numbering,
                'total_bayar_numbering'=> $total_bayar_numbering,
                // Pressing 
                'tanggal_pressing' => $tanggal_pressing,
                'start_time_pressing' => $start_time_pressing,
                'total_waktu_pressing' => $total_waktu_pressing,
                'finish_time_pressing' => $finish_time_pressing,
                'total_qty_pressing' => $total_qty_pressing,
                'cost_pc_pressing' => $cost_pc_pressing,
                'total_cost_wo_pressing' => $total_cost_wo_pressing,
                'total_bayar_pressing'=> $total_bayar_pressing,
                // Bundling 
                'tanggal_bundling' => $tanggal_bundling,
                'start_time_bundling' => $start_time_bundling,
                'total_waktu_bundling' => $total_waktu_bundling,
                'finish_time_bundling' => $finish_time_bundling,
                'total_qty_bundling' => $total_qty_bundling,
                'cost_pc_bundling' => $cost_pc_bundling,
                'total_cost_wo_bundling' => $total_cost_wo_bundling,
                'total_bayar_bundling'=> $total_bayar_bundling
            ];
        }
        // dd($result3);
        return $result3;
    }
}