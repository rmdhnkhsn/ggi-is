<?php

namespace App\Services\QC\RejectGarment;
use App\Branch;
class data_olahan{
    public function data_awal(Request $request)
    {
        $dataBranch = Branch::all();
        $bulan = $request->bulan;
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);
        $Reportbulanan = RejectCutting::where('branchdetail', $dataBranch->branchdetail)
                    ->where('tanggal','>=', $tanggal_awal)->where('tanggal','<=', $tanggal_akhir)
                    ->get();

        $test = collect($Reportbulanan)->groupBy('tanggal');

        return $test;
    }

    public function bulanan($test)
    {
   
        $coba = [];
            foreach ($test as $key => $value) {

                 $f_misprint = collect($value)->count('f_misprint');
                 $f_cacat_tenun = collect($value)->count('f_cacat_tenun');
                 $f_bolong = collect($value)->count('f_bolong');
                 $f_kotor = collect($value)->count('f_kotor');
                 $f_lain_lain = collect($value)->count('f_lain_lain');
                 $c_pinggir_kain = collect($value)->count('c_pinggir_kain');
                 $c_tidak_pas_pola = collect($value)->count('c_tidak_pas_pola');
                 $c_bolong = collect($value)->count('c_bolong');
                 $c_kotor = collect($value)->count('c_kotor');
                 $c_lain_lain = collect($value)->count('c_lain_lain');

                 foreach ($value as $key2 => $value2) {
                    //  dd($value2 );
                    $qty_check = collect($value)->where('tanggal', $value2['tanggal'])->sum('qty_check');
                    $f_misprint = collect($value)->where('tanggal', $value2['tanggal'])->sum('f_misprint');
                    $percentage_f_misprint =   $f_misprint/$qty_check*100;
                    $f_cacat_tenun = collect($value)->where('tanggal', $value2['tanggal'])->sum('f_cacat_tenun');
                    $percentage_f_cacat_tenun =   $f_cacat_tenun/$qty_check*100;
                    $f_bolong = collect($value)->where('tanggal', $value2['tanggal'])->sum('f_bolong');
                    $percentage_f_bolong =   $f_bolong/$qty_check*100;
                    $f_kotor = collect($value)->where('tanggal', $value2['tanggal'])->sum('f_kotor');
                    $percentage_f_kotor =   $f_kotor/$qty_check*100;
                    $f_lain_lain = collect($value)->where('tanggal', $value2['tanggal'])->sum('f_lain_lain');
                    $percentage_f_lain_lain =   $f_lain_lain/$qty_check*100;
                    $c_pinggir_kain = collect($value)->where('tanggal', $value2['tanggal'])->sum('c_pinggir_kain');
                    $percentage_c_pinggir_kain =   $c_pinggir_kain/$qty_check*100;
                    $c_tidak_pas_pola = collect($value)->where('tanggal', $value2['tanggal'])->sum('c_tidak_pas_pola');
                    $percentage_c_tidak_pas_pola =   $c_tidak_pas_pola/$qty_check*100;
                    $c_bolong = collect($value)->where('tanggal', $value2['tanggal'])->sum('c_bolong');
                    $percentage_c_bolong =   $c_bolong/$qty_check*100;
                    $c_kotor = collect($value)->where('tanggal', $value2['tanggal'])->sum('c_kotor');
                    $percentage_c_kotor =   $c_kotor/$qty_check*100;
                    $c_lain_lain = collect($value)->where('tanggal', $value2['tanggal'])->sum('c_lain_lain');
                    $percentage_c_lain_lain =   $c_lain_lain/$qty_check*100;
                    
                    $totalFabric =  $f_misprint +  $f_cacat_tenun +$f_bolong +  $f_kotor +$f_lain_lain ;
                    $percentage_totalFabric =   $totalFabric/$qty_check*100;
                    $totalCutting =  $c_pinggir_kain +  $c_tidak_pas_pola +$c_bolong +  $c_kotor +$c_lain_lain ;
                    $percentage_totalCutting =   $totalCutting/$qty_check*100;
                    $grandTotal =   $totalFabric +$totalCutting;
                    $percentage_grandTotal =   $grandTotal/$qty_check*100;

                     $coba[] = [
                        'tanggal' => $key,
                        'buyer' => $value2['buyer'],
                        't_v4801c_doco' => $value2['t_v4801c_doco'],
                        'f_misprint' => $f_misprint,
                        'f_bolong' => $f_bolong,
                        'f_cacat_tenun' => $f_cacat_tenun,
                        'f_kotor' => $f_kotor,
                        'f_lain_lain' => $f_lain_lain,
                        'c_pinggir_kain' => $c_pinggir_kain,
                        'c_tidak_pas_pola' => $c_tidak_pas_pola,
                        'c_bolong' => $c_bolong,
                        'c_kotor' => $c_kotor,
                        'c_lain_lain' => $c_lain_lain,
                        'totalFabric' => $totalFabric,
                        'totalCutting' => $totalCutting,
                        'grandTotal' => $grandTotal,
                        'percentage_f_misprint' => $percentage_f_misprint,
                        'percentage_f_cacat_tenun' => $percentage_f_cacat_tenun,
                        'percentage_f_bolong' => $percentage_f_bolong,
                        'percentage_f_kotor' => $percentage_f_kotor,
                        'percentage_f_lain_lain' => $percentage_f_lain_lain,
                        'percentage_c_pinggir_kain' => $percentage_c_pinggir_kain,
                        'percentage_c_tidak_pas_pola' => $percentage_c_tidak_pas_pola,
                        'percentage_c_bolong' => $percentage_c_bolong,
                        'percentage_c_kotor' => $percentage_c_kotor,
                        'percentage_c_lain_lain' => $percentage_c_lain_lain,
                        'percentage_totalFabric' => $percentage_totalFabric,
                        'percentage_totalCutting' => $percentage_totalCutting,
                        'percentage_grandTotal' => $percentage_grandTotal,
                    ];

                    // dd($coba);
                }
            }

                 $percobaan = collect($coba)->groupby('t_v4801c_doco');
            
              $report = [];
            foreach ($percobaan as $key => $value) {
                $TotalResult = collect($value)
                    ->groupBy('tanggal')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $report[] = [
                        'tanggal' => $value2['tanggal'],
                        'buyer' => $value2['buyer'],
                        't_v4801c_doco' => $value2['t_v4801c_doco'],
                        'f_misprint' => $value2['f_misprint'],
                        'f_bolong' => $value2['f_bolong'],
                        'f_cacat_tenun' => $value2['f_cacat_tenun'],
                        'f_kotor' => $value2['f_kotor'],
                        'f_lain_lain' => $value2['f_lain_lain'],
                        'c_pinggir_kain' => $value2['c_pinggir_kain'],
                        'c_tidak_pas_pola' => $value2['c_tidak_pas_pola'],
                        'c_bolong' => $value2['c_bolong'],
                        'c_kotor' => $value2['c_kotor'],
                        'c_lain_lain' => $value2['c_lain_lain'],
                        'totalFabric' => $value2['totalFabric'],
                        'totalCutting' => $value2['totalCutting'],
                        'grandTotal' => $value2['grandTotal'],
                        'percentage_f_misprint' => $value2['percentage_f_misprint'],
                        'percentage_f_bolong' => $value2['percentage_f_bolong'],
                        'percentage_f_cacat_tenun' => $value2['percentage_f_cacat_tenun'],
                        'percentage_f_kotor' => $value2['percentage_f_kotor'],
                        'percentage_f_lain_lain' => $value2['percentage_f_lain_lain'],
                        'percentage_c_pinggir_kain' => $value2['percentage_c_pinggir_kain'],
                        'percentage_c_tidak_pas_pola' => $value2['percentage_c_tidak_pas_pola'],
                        'percentage_c_bolong' => $value2['percentage_c_bolong'],
                        'percentage_c_kotor' => $value2['percentage_c_kotor'],
                        'percentage_c_lain_lain' => $value2['percentage_c_lain_lain'],
                        'percentage_totalFabric' => $value2['percentage_totalFabric'],
                        'percentage_totalCutting' => $value2['percentage_totalCutting'],
                        'percentage_grandTotal' => $value2['percentage_grandTotal'],
                    ];
                }  
            }

            $reporRejectCutting= collect($report)->sortBy('tanggal');

        return $reporRejectCutting;
    }

    public function bulanan_total($result)
    {
        $total = [
            'f_cacat' => collect($result)->sum('f_cacat'),
            'f_bolong' => collect($result)->sum('f_bolong'),
            'f_shadding' => collect($result)->sum('f_shadding'),
            'f_kotor' => collect($result)->sum('f_kotor'),
            'f_lain' => collect($result)->sum('f_lain'),
            's_cacat' => collect($result)->sum('s_cacat'),
            's_label' => collect($result)->sum('s_label'),
            's_kotor' => collect($result)->sum('s_kotor'),
            's_bolong' => collect($result)->sum('s_bolong'),
            's_ukuran' => collect($result)->sum('s_ukuran'),
            'total' => collect($result)->sum('total'),
        ];
        // dd($total);

        return $total;
        
    }
}