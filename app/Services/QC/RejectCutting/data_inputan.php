<?php

namespace App\Services\QC\RejectCutting;
use App\Models\QC\RejectCutting\RejectCutting;
class data_inputan{
    public function data_master()
    {
        
         $dataMenuReject2 = RejectCutting::all();

             $result = [];
        foreach ($dataMenuReject2 as $key => $value) {
               
            $result[] = [
                'tanggal' => $value->tanggal,
                't_v4801c_doco' => $value->t_v4801c_doco,
                'buyer' => $value->buyer,
                'style' => $value->style,
                'color' => $value->color,
                'f_misprint' => $value->f_misprint,
                'f_cacat_tenun' => $value->f_cacat_tenun,
                'f_bolong' => $value->f_bolong,
                'f_kotor' => $value->f_kotor,
                'f_lain_lain' => $value->f_lain_lain,
                'c_pinggir_kain' => $value->c_pinggir_kain,
                'c_tidak_pas_pola' => $value->c_tidak_pas_pola,
                'c_bolong' => $value->c_bolong,
                'c_kotor' => $value->c_kotor,
                'c_lain_lain' => $value->c_lain_lain,
                // 'total_reject' => $value->total_reject,
            ]; 
        }

        $test = collect($result)->groupBy('tanggal');
            // dd($test);

        return $test;
    }

    public function bulanan_total($test)
    {
        $total = [
            'f_misprint' => collect($test)->sum('f_misprint'),
            'f_bolong' => collect($test)->sum('f_bolong'),
            'f_cacat_tenun' => collect($test)->sum('f_cacat_tenun'),
            'f_kotor' => collect($test)->sum('f_kotor'),
            'f_lain_lain' => collect($test)->sum('f_lain_lain'),
            'c_pinggir_kain' => collect($test)->sum('c_pinggir_kain'),
            'c_tidak_pas_pola' => collect($test)->sum('c_tidak_pas_pola'),
            'c_bolong' => collect($test)->sum('c_bolong'),
            'c_kotor' => collect($test)->sum('s_bolong'),
            'c_lain_lain' => collect($test)->sum('s_ukuran'),
            'total_reject' => collect($test)->sum('total_reject'),
        ];

        return $total;
    }
}