<?php

namespace App\Services\QC\RejectCutting;
use App\Branch;
use App\Models\QC\RejectCutting\RejectCutting;
use App\Models\QC\RejectCutting\RejectCuttingViewsDetail;
use App\GetData\Rework\Report\Bulanan\kodebulan;
use App\GetData\Rework\Report\Bulanan\bulanan;


class data_olahan{
    
    public function data_awal($dataBranch, $tanggal_awal,$tanggal_akhir)
    {
        $Reportbulanan = RejectCutting::where('branchdetail', $dataBranch->branchdetail)
                    ->where('tanggal','>=', $tanggal_awal)->where('tanggal','<=', $tanggal_akhir)
                    ->get();
        $test = collect($Reportbulanan)->groupBy('t_v4801c_doco');
        // dd($Reportbulanan);

        return $test;
    }
   
     public function data_awal_bulan($dataBranch, $tanggal_awal,$tanggal_akhir)
    {
        $Reportbulanan = RejectCutting::where('branchdetail', $dataBranch->branchdetail)
                    ->where('tanggal','>=', $tanggal_awal)->where('tanggal','<=', $tanggal_akhir)->orderBy("tanggal", "asc")
                    ->get();
        $perbulan = collect($Reportbulanan)->groupBy(function($item){
                return \Carbon\Carbon::parse($item->tanggal)->format('d');
                });


        return $perbulan;
    }
    
     public function data_tahunan_all($tahun)
    { 
        $rejectCuttingAnual =  RejectCutting::whereyear('tanggal','>=',$tahun)
                            ->orderBy("tanggal", "asc")
                            ->get();

            $testing = collect ($rejectCuttingAnual)->groupBy('branchdetail')->sortBy('branch');
            $coba = [];
                foreach ($testing as $key => $value) {
                    // dd($value);
                 $qty_check = collect($value)->sum('qty_check');
                 $f_misprint = collect($value)->sum('f_misprint');
                 $f_cacat_tenun = collect($value)->sum('f_cacat_tenun');
                 $f_bolong = collect($value)->sum('f_bolong');
                 $f_kotor = collect($value)->sum('f_kotor');
                 $f_lain_lain = collect($value)->sum('f_lain_lain');
                 $c_pinggir_kain = collect($value)->sum('c_pinggir_kain');
                 $c_tidak_pas_pola = collect($value)->sum('c_tidak_pas_pola');
                 $c_bolong = collect($value)->sum('c_bolong');
                 $c_kotor = collect($value)->sum('c_kotor');
                 $c_lain_lain = collect($value)->sum('c_lain_lain');

                $totalFabric =  $f_misprint +  $f_cacat_tenun +$f_bolong +  $f_kotor +$f_lain_lain ;
                $percentage_totalFabric =   $totalFabric/$qty_check*100;
                $totalCutting =  $c_pinggir_kain +  $c_tidak_pas_pola +$c_bolong +  $c_kotor +$c_lain_lain ;
                $percentage_totalCutting =   $totalCutting/$qty_check*100;
                $grandTotal =   $totalFabric +$totalCutting;
                $percentage_grandTotal =   $grandTotal/$qty_check*100;
                $percentage_f_misprint =   $f_misprint/$qty_check*100;
                $percentage_f_cacat_tenun =   $f_cacat_tenun/$qty_check*100;
                $percentage_f_bolong =   $f_bolong/$qty_check*100;
                $percentage_f_kotor =   $f_kotor/$qty_check*100;
                $percentage_f_lain_lain =   $f_lain_lain/$qty_check*100;
                $percentage_c_pinggir_kain =   $c_pinggir_kain/$qty_check*100;
                $percentage_c_tidak_pas_pola =   $c_tidak_pas_pola/$qty_check*100;
                $percentage_c_bolong =   $c_bolong/$qty_check*100;
                $percentage_c_kotor =   $c_kotor/$qty_check*100;
                $percentage_c_lain_lain =   $c_lain_lain/$qty_check*100;
                        
                 $reportAnual[] = [
                        'tanggal' => $key,
                        'qty_check' => $qty_check,
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
                
            }
            //   dd($reportAnual);
              
        return $reportAnual;
    }

     public function data_harian_all($tanggal)
    { 
        $rejectCuttingDailyAll =  RejectCutting::where('tanggal','=',$tanggal)
                            ->orderBy("tanggal", "asc")
                            ->get();
                            
            $testing = collect ($rejectCuttingDailyAll)->groupBy('branchdetail')->sortBy('branch');
            $coba = [];
                foreach ($testing as $key => $value) {
                    // dd($value);
                 $qty_check = collect($value)->sum('qty_check');
                 $f_misprint = collect($value)->sum('f_misprint');
                 $f_cacat_tenun = collect($value)->sum('f_cacat_tenun');
                 $f_bolong = collect($value)->sum('f_bolong');
                 $f_kotor = collect($value)->sum('f_kotor');
                 $f_lain_lain = collect($value)->sum('f_lain_lain');
                 $c_pinggir_kain = collect($value)->sum('c_pinggir_kain');
                 $c_tidak_pas_pola = collect($value)->sum('c_tidak_pas_pola');
                 $c_bolong = collect($value)->sum('c_bolong');
                 $c_kotor = collect($value)->sum('c_kotor');
                 $c_lain_lain = collect($value)->sum('c_lain_lain');

                $totalFabric =  $f_misprint +  $f_cacat_tenun +$f_bolong +  $f_kotor +$f_lain_lain ;
                $percentage_totalFabric =   $totalFabric/$qty_check*100;
                $totalCutting =  $c_pinggir_kain +  $c_tidak_pas_pola +$c_bolong +  $c_kotor +$c_lain_lain ;
                $percentage_totalCutting =   $totalCutting/$qty_check*100;
                $grandTotal =   $totalFabric +$totalCutting;
                $percentage_grandTotal =   $grandTotal/$qty_check*100;
                $percentage_f_misprint =   $f_misprint/$qty_check*100;
                $percentage_f_cacat_tenun =   $f_cacat_tenun/$qty_check*100;
                $percentage_f_bolong =   $f_bolong/$qty_check*100;
                $percentage_f_kotor =   $f_kotor/$qty_check*100;
                $percentage_f_lain_lain =   $f_lain_lain/$qty_check*100;
                $percentage_c_pinggir_kain =   $c_pinggir_kain/$qty_check*100;
                $percentage_c_tidak_pas_pola =   $c_tidak_pas_pola/$qty_check*100;
                $percentage_c_bolong =   $c_bolong/$qty_check*100;
                $percentage_c_kotor =   $c_kotor/$qty_check*100;
                $percentage_c_lain_lain =   $c_lain_lain/$qty_check*100;
                        
                 $reportDailyall[] = [
                        'branch' => $key,
                        'tanggal' => $tanggal,
                        'qty_check' => $qty_check,
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
                
            }
              
        return $reportDailyall;
    }

    public function nama_branch($reportAnual)
    {
        
        $nama_branch=[];
        foreach ($reportAnual as $key => $value) {

               if($value['tanggal']=='CLN'){
                   $nama_branch='GISTEX CILEUNYI';
               }
               elseif($value['tanggal']=='GM1'){
                   $nama_branch='GISTEX MAJALENGKA 1';
               }
               elseif($value['tanggal']=='GM2'){
                   $nama_branch='GISTEX MAJALENGKA 2';
               }
               elseif($value['tanggal']=='GK'){
                   $nama_branch='GISTEX KALIBENDA';
               }
               elseif($value['tanggal']=='CVC'){
                   $nama_branch='CV CHAWAN';
               }
               elseif($value['tanggal']=='CNJ2'){
                   $nama_branch='CNJ2';
               }
               elseif($value['tanggal']=='CVA'){
                   $nama_branch='CV ANUGRAH';
               }
               elseif($value['tanggal']=='CBA'){
                   $nama_branch='CAHAYA BUSANA ABADI';
               }
               $namaBranch[]=[
                    'nama_branch'=>$nama_branch,
                    'tanggal'=>$nama_branch,
                    'qty_check' => $value['qty_check'],
                    'f_misprint' => $value['f_misprint'],
                    'f_bolong' => $value['f_bolong'],
                    'f_cacat_tenun' => $value['f_cacat_tenun'],
                    'f_kotor' => $value['f_kotor'],
                    'f_lain_lain' => $value['f_lain_lain'],
                    'c_pinggir_kain' => $value['c_pinggir_kain'],
                    'c_tidak_pas_pola' => $value['c_tidak_pas_pola'],
                    'c_bolong' => $value['c_bolong'],
                    'c_kotor' => $value['c_kotor'],
                    'c_lain_lain' => $value['c_lain_lain'],
                    'totalFabric' => $value['totalFabric'],
                    'totalCutting' => $value['totalCutting'],
                    'grandTotal' => $value['grandTotal'],
                    'percentage_f_misprint' => $value['percentage_f_misprint'],
                    'percentage_f_bolong' => $value['percentage_f_bolong'],
                    'percentage_f_cacat_tenun' => $value['percentage_f_cacat_tenun'],
                    'percentage_f_kotor' => $value['percentage_f_kotor'],
                    'percentage_f_lain_lain' => $value['percentage_f_lain_lain'],
                    'percentage_c_pinggir_kain' => $value['percentage_c_pinggir_kain'],
                    'percentage_c_tidak_pas_pola' => $value['percentage_c_tidak_pas_pola'],
                    'percentage_c_bolong' => $value['percentage_c_bolong'],
                    'percentage_c_kotor' => $value['percentage_c_kotor'],
                    'percentage_c_lain_lain' => $value['percentage_c_lain_lain'],
                    'percentage_totalFabric' => $value['percentage_totalFabric'],
                    'percentage_totalCutting' => $value['percentage_totalCutting'],
                    'percentage_grandTotal' => $value['percentage_grandTotal'],
               ];
            }
            // dd($namaBranch);
        return $namaBranch;
    }

     public function yearlyFinalAll($namaBranch)
    {
        $percobaan = collect($namaBranch)->groupby('tahun');
          $monthlyFinal = [];
            foreach ($percobaan as $key => $value) {
            $qty_check = collect($value)->sum('qty_check');
            $total_f_misprint = collect($value)->sum('f_misprint');
            $total_f_cacat_tenun = collect($value)->sum('f_cacat_tenun');
            $total_f_bolong = collect($value)->sum('f_bolong');
            $total_f_kotor = collect($value)->sum('f_kotor');
            $total_f_lain_lain = collect($value)->sum('f_lain_lain');
            $total_c_pinggir_kain = collect($value)->sum('c_pinggir_kain');
            $total_c_tidak_pas_pola = collect($value)->sum('c_tidak_pas_pola');
            $total_c_bolong = collect($value)->sum('c_bolong');
            $total_c_kotor = collect($value)->sum('c_kotor');
            $total_c_lain_lain = collect($value)->sum('c_lain_lain');
            $total_totalFabric = $total_f_misprint + $total_f_cacat_tenun+$total_f_bolong +$total_f_kotor +$total_f_lain_lain;
            $total_totalCutting = collect($value)->sum('totalCutting');
            $total_grandTotal = collect($value)->sum('grandTotal');
            
            $percentage_total_f_misprint =   $total_f_misprint/$qty_check*100;
            $percentage_total_f_cacat_tenun =   $total_f_cacat_tenun/$qty_check*100;
            $percentage_total_f_bolong =   $total_f_bolong/$qty_check*100;
            $percentage_total_f_kotor =   $total_f_kotor/$qty_check*100;
            $percentage_total_f_lain_lain =   $total_f_lain_lain/$qty_check*100;
            $percentage_total_c_pinggir_kain =   $total_c_pinggir_kain/$qty_check*100;
            $percentage_total_c_tidak_pas_pola =   $total_c_tidak_pas_pola/$qty_check*100;
            $percentage_total_c_bolong =   $total_c_bolong/$qty_check*100;
            $percentage_total_c_kotor =   $total_c_kotor/$qty_check*100;
            $percentage_total_c_lain_lain =   $total_c_lain_lain/$qty_check*100;
            $percentage_total_totalFabric =   $total_totalFabric/$qty_check*100;
            $percentage_total_totalCutting =   $total_totalCutting/$qty_check*100;
            $percentage_total_grandTotal =   $total_grandTotal/$qty_check*100;

            $finalTotal[] = [
                        'qty_check' => $qty_check,
                        'total_f_misprint' => $total_f_misprint,
                        'total_f_bolong' => $total_f_bolong,
                        'total_f_cacat_tenun' => $total_f_cacat_tenun,
                        'total_f_kotor' => $total_f_kotor,
                        'total_f_lain_lain' => $total_f_lain_lain,
                        'total_c_pinggir_kain' => $total_c_pinggir_kain,
                        'total_c_tidak_pas_pola' => $total_c_tidak_pas_pola,
                        'total_c_bolong' => $total_c_bolong,
                        'total_c_kotor' => $total_c_kotor,
                        'total_c_lain_lain' => $total_c_lain_lain,
                        'total_totalFabric' => $total_totalFabric,
                        'total_totalCutting' => $total_totalCutting,
                        'total_grandTotal' => $total_grandTotal,
                        'percentage_total_f_misprint' => $percentage_total_f_misprint,
                        'percentage_total_f_cacat_tenun' => $percentage_total_f_cacat_tenun,
                        'percentage_total_f_bolong' => $percentage_total_f_bolong,
                        'percentage_total_f_kotor' => $percentage_total_f_kotor,
                        'percentage_total_f_lain_lain' => $percentage_total_f_lain_lain,
                        'percentage_total_c_pinggir_kain' => $percentage_total_c_pinggir_kain,
                        'percentage_total_c_tidak_pas_pola' => $percentage_total_c_tidak_pas_pola,
                        'percentage_total_c_bolong' => $percentage_total_c_bolong,
                        'percentage_total_c_kotor' => $percentage_total_c_kotor,
                        'percentage_total_c_lain_lain' => $percentage_total_c_lain_lain,
                        'percentage_total_totalFabric' => $percentage_total_totalFabric,
                        'percentage_total_totalCutting' => $percentage_total_totalCutting,
                        'percentage_total_grandTotal' => $percentage_total_grandTotal,
                    ];
            }
            
            // dd($finalTotal);
        return $finalTotal;
    }
    public function dailyAll($tanggal)
    {
        $reporHarian = RejectCutting:: where('tanggal',$tanggal)
                    ->get();
        return $reporHarian;
    }

    public function nama_branch_daily($reportDailyall)
    {
        $nama_branch=[];
        foreach ($reportDailyall as $key => $value) {

               if($value['branch']=='CLN'){
                   $nama_branch='GISTEX CILEUNYI';
               }
               elseif($value['branch']=='GM1'){
                   $nama_branch='GISTEX MAJALENGKA 1';
               }
               elseif($value['branch']=='GM2'){
                   $nama_branch='GISTEX MAJALENGKA 2';
               }
               elseif($value['branch']=='GK'){
                   $nama_branch='GISTEX KALIBENDA';
               }
               elseif($value['branch']=='CVC'){
                   $nama_branch='CV CHAWAN';
               }
               elseif($value['branch']=='CNJ2'){
                   $nama_branch='CNJ2';
               }
               elseif($value['branch']=='CVA'){
                   $nama_branch='CV ANUGRAH';
               }
               elseif($value['branch']=='CBA'){
                   $nama_branch='CAHAYA BUSANA ABADI';
               }
               $namaBranchDaily[]=[
                    'branch' => $nama_branch    ,
                    'tanggal' => $value['tanggal'],
                    'nama_branch'=>$nama_branch,
                    'qty_check' => $value['qty_check'],
                    'f_misprint' => $value['f_misprint'],
                    'f_bolong' => $value['f_bolong'],
                    'f_cacat_tenun' => $value['f_cacat_tenun'],
                    'f_kotor' => $value['f_kotor'],
                    'f_lain_lain' => $value['f_lain_lain'],
                    'c_pinggir_kain' => $value['c_pinggir_kain'],
                    'c_tidak_pas_pola' => $value['c_tidak_pas_pola'],
                    'c_bolong' => $value['c_bolong'],
                    'c_kotor' => $value['c_kotor'],
                    'c_lain_lain' => $value['c_lain_lain'],
                    'totalFabric' => $value['totalFabric'],
                    'totalCutting' => $value['totalCutting'],
                    'grandTotal' => $value['grandTotal'],
                    'percentage_f_misprint' => $value['percentage_f_misprint'],
                    'percentage_f_bolong' => $value['percentage_f_bolong'],
                    'percentage_f_cacat_tenun' => $value['percentage_f_cacat_tenun'],
                    'percentage_f_kotor' => $value['percentage_f_kotor'],
                    'percentage_f_lain_lain' => $value['percentage_f_lain_lain'],
                    'percentage_c_pinggir_kain' => $value['percentage_c_pinggir_kain'],
                    'percentage_c_tidak_pas_pola' => $value['percentage_c_tidak_pas_pola'],
                    'percentage_c_bolong' => $value['percentage_c_bolong'],
                    'percentage_c_kotor' => $value['percentage_c_kotor'],
                    'percentage_c_lain_lain' => $value['percentage_c_lain_lain'],
                    'percentage_totalFabric' => $value['percentage_totalFabric'],
                    'percentage_totalCutting' => $value['percentage_totalCutting'],
                    'percentage_grandTotal' => $value['percentage_grandTotal'],
               ];
            }
            // dd($namaBranchDaily);
        return $namaBranchDaily;
    }

    public function dailyFinalAll($namaBranchDaily)
    {
        $percobaan = collect($namaBranchDaily)->groupby('tanggal');
          $monthlyFinal = [];
            foreach ($percobaan as $key => $value) {
            $qty_check = collect($value)->sum('qty_check');
            $total_f_misprint = collect($value)->sum('f_misprint');
            $total_f_cacat_tenun = collect($value)->sum('f_cacat_tenun');
            $total_f_bolong = collect($value)->sum('f_bolong');
            $total_f_kotor = collect($value)->sum('f_kotor');
            $total_f_lain_lain = collect($value)->sum('f_lain_lain');
            $total_c_pinggir_kain = collect($value)->sum('c_pinggir_kain');
            $total_c_tidak_pas_pola = collect($value)->sum('c_tidak_pas_pola');
            $total_c_bolong = collect($value)->sum('c_bolong');
            $total_c_kotor = collect($value)->sum('c_kotor');
            $total_c_lain_lain = collect($value)->sum('c_lain_lain');
            $total_totalFabric = $total_f_misprint + $total_f_cacat_tenun+$total_f_bolong +$total_f_kotor +$total_f_lain_lain;
            $total_totalCutting = collect($value)->sum('totalCutting');
            $total_grandTotal = collect($value)->sum('grandTotal');
            
            $percentage_total_f_misprint =   $total_f_misprint/$qty_check*100;
            $percentage_total_f_cacat_tenun =   $total_f_cacat_tenun/$qty_check*100;
            $percentage_total_f_bolong =   $total_f_bolong/$qty_check*100;
            $percentage_total_f_kotor =   $total_f_kotor/$qty_check*100;
            $percentage_total_f_lain_lain =   $total_f_lain_lain/$qty_check*100;
            $percentage_total_c_pinggir_kain =   $total_c_pinggir_kain/$qty_check*100;
            $percentage_total_c_tidak_pas_pola =   $total_c_tidak_pas_pola/$qty_check*100;
            $percentage_total_c_bolong =   $total_c_bolong/$qty_check*100;
            $percentage_total_c_kotor =   $total_c_kotor/$qty_check*100;
            $percentage_total_c_lain_lain =   $total_c_lain_lain/$qty_check*100;
            $percentage_total_totalFabric =   $total_totalFabric/$qty_check*100;
            $percentage_total_totalCutting =   $total_totalCutting/$qty_check*100;
            $percentage_total_grandTotal =   $total_grandTotal/$qty_check*100;

            $finalTotal[] = [
                'qty_check' => $qty_check,
                'total_f_misprint' => $total_f_misprint,
                'total_f_bolong' => $total_f_bolong,
                'total_f_cacat_tenun' => $total_f_cacat_tenun,
                'total_f_kotor' => $total_f_kotor,
                'total_f_lain_lain' => $total_f_lain_lain,
                'total_c_pinggir_kain' => $total_c_pinggir_kain,
                'total_c_tidak_pas_pola' => $total_c_tidak_pas_pola,
                'total_c_bolong' => $total_c_bolong,
                'total_c_kotor' => $total_c_kotor,
                'total_c_lain_lain' => $total_c_lain_lain,
                'total_totalFabric' => $total_totalFabric,
                'total_totalCutting' => $total_totalCutting,
                'total_grandTotal' => $total_grandTotal,
                'percentage_total_f_misprint' => $percentage_total_f_misprint,
                'percentage_total_f_cacat_tenun' => $percentage_total_f_cacat_tenun,
                'percentage_total_f_bolong' => $percentage_total_f_bolong,
                'percentage_total_f_kotor' => $percentage_total_f_kotor,
                'percentage_total_f_lain_lain' => $percentage_total_f_lain_lain,
                'percentage_total_c_pinggir_kain' => $percentage_total_c_pinggir_kain,
                'percentage_total_c_tidak_pas_pola' => $percentage_total_c_tidak_pas_pola,
                'percentage_total_c_bolong' => $percentage_total_c_bolong,
                'percentage_total_c_kotor' => $percentage_total_c_kotor,
                'percentage_total_c_lain_lain' => $percentage_total_c_lain_lain,
                'percentage_total_totalFabric' => $percentage_total_totalFabric,
                'percentage_total_totalCutting' => $percentage_total_totalCutting,
                'percentage_total_grandTotal' => $percentage_total_grandTotal,
                ];
            }
            
            // dd($finalTotal);
        return $finalTotal;
    }
     public function data_tahunan($tahun ,$dataBranch)
    { 
        $rejectCuttingAnual =  RejectCutting::whereyear('tanggal','>=',$tahun)
                            ->where('branchdetail', $dataBranch->branchdetail)
                            ->orderBy("tanggal", "asc")
                            ->get();
        $AnualCollect = collect($rejectCuttingAnual)->groupBy(function($item){
            return \Carbon\Carbon::parse($item->tanggal)->format('m');
            });
            $coba = [];
                foreach ($AnualCollect as $key => $value) {
                 $qty_check = collect($value)->sum('qty_check');
                 $f_misprint = collect($value)->sum('f_misprint');
                 $f_cacat_tenun = collect($value)->sum('f_cacat_tenun');
                 $f_bolong = collect($value)->sum('f_bolong');
                 $f_kotor = collect($value)->sum('f_kotor');
                 $f_lain_lain = collect($value)->sum('f_lain_lain');
                 $c_pinggir_kain = collect($value)->sum('c_pinggir_kain');
                 $c_tidak_pas_pola = collect($value)->sum('c_tidak_pas_pola');
                 $c_bolong = collect($value)->sum('c_bolong');
                 $c_kotor = collect($value)->sum('c_kotor');
                 $c_lain_lain = collect($value)->sum('c_lain_lain');

                $totalFabric =  $f_misprint +  $f_cacat_tenun +$f_bolong +  $f_kotor +$f_lain_lain ;
                $percentage_totalFabric =   $totalFabric/$qty_check*100;
                $totalCutting =  $c_pinggir_kain +  $c_tidak_pas_pola +$c_bolong +  $c_kotor +$c_lain_lain ;
                $percentage_totalCutting =   $totalCutting/$qty_check*100;
                $grandTotal =   $totalFabric +$totalCutting;
                $percentage_grandTotal =   $grandTotal/$qty_check*100;
                $percentage_f_misprint =   $f_misprint/$qty_check*100;
                $percentage_f_cacat_tenun =   $f_cacat_tenun/$qty_check*100;
                $percentage_f_bolong =   $f_bolong/$qty_check*100;
                $percentage_f_kotor =   $f_kotor/$qty_check*100;
                $percentage_f_lain_lain =   $f_lain_lain/$qty_check*100;
                $percentage_c_pinggir_kain =   $c_pinggir_kain/$qty_check*100;
                $percentage_c_tidak_pas_pola =   $c_tidak_pas_pola/$qty_check*100;
                $percentage_c_bolong =   $c_bolong/$qty_check*100;
                $percentage_c_kotor =   $c_kotor/$qty_check*100;
                $percentage_c_lain_lain =   $c_lain_lain/$qty_check*100;
                        
                 $reportAnual[] = [
                        'tanggal' => $key,
                        'qty_check' => $qty_check,
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
                
            }
        
        return $reportAnual;
    }
     public function daily($tanggal,$dataBranch)
    {
        $reporHarian = RejectCutting:: where('tanggal',$tanggal)->where('branchdetail',$dataBranch->branchdetail)
                    ->get();

        $reporHarianByWo = collect($reporHarian)->groupBy('t_v4801c_doco');
   

        return $reporHarianByWo;
    }
     public function dailyBuyer($tanggal,$dataBranch)
    {
        $reporHarian = RejectCutting:: where('tanggal',$tanggal)->where('branchdetail',$dataBranch->branchdetail)
                    ->get();
        $reporHarianByWo = collect($reporHarian)->groupBy('t_v4801c_doco');
        return $reporHarianByWo;
    }
    public function harianBuyer($reporHarianByWo)
    {
        // dd($reporHarianByWoDate);
        $coba = [];
            foreach ($reporHarianByWo as $key => $value) {               
                 foreach ($value as $key2 => $value2) {
                    $qty_check = collect($value)->where('buyer', $value2['buyer'])->sum('qty_check');
                    $f_misprint = collect($value)->where('buyer', $value2['buyer'])->sum('f_misprint');
                    $percentage_f_misprint =   $f_misprint/$qty_check*100;
                    $f_cacat_tenun = collect($value)->where('buyer', $value2['buyer'])->sum('f_cacat_tenun');
                    $percentage_f_cacat_tenun =   $f_cacat_tenun/$qty_check*100;
                    $f_bolong = collect($value)->where('buyer', $value2['buyer'])->sum('f_bolong');
                    $percentage_f_bolong =   $f_bolong/$qty_check*100;
                    $f_kotor = collect($value)->where('buyer', $value2['buyer'])->sum('f_kotor');
                    $percentage_f_kotor =   $f_kotor/$qty_check*100;
                    $f_lain_lain = collect($value)->where('buyer', $value2['buyer'])->sum('f_lain_lain');
                    $percentage_f_lain_lain =   $f_lain_lain/$qty_check*100;
                    $c_pinggir_kain = collect($value)->where('buyer', $value2['buyer'])->sum('c_pinggir_kain');
                    $percentage_c_pinggir_kain =   $c_pinggir_kain/$qty_check*100;
                    $c_tidak_pas_pola = collect($value)->where('buyer', $value2['buyer'])->sum('c_tidak_pas_pola');
                    $percentage_c_tidak_pas_pola =   $c_tidak_pas_pola/$qty_check*100;
                    $c_bolong = collect($value)->where('buyer', $value2['buyer'])->sum('c_bolong');
                    $percentage_c_bolong =   $c_bolong/$qty_check*100;
                    $c_kotor = collect($value)->where('buyer', $value2['buyer'])->sum('c_kotor');
                    $percentage_c_kotor =   $c_kotor/$qty_check*100;
                    $c_lain_lain = collect($value)->where('buyer', $value2['buyer'])->sum('c_lain_lain');
                    $percentage_c_lain_lain =   $c_lain_lain/$qty_check*100;
                    $totalFabric =  $f_misprint +  $f_cacat_tenun +$f_bolong +  $f_kotor +$f_lain_lain ;
                    $percentage_totalFabric =   $totalFabric/$qty_check*100;
                    $totalCutting =  $c_pinggir_kain +  $c_tidak_pas_pola +$c_bolong +  $c_kotor +$c_lain_lain ;
                    $percentage_totalCutting =   $totalCutting/$qty_check*100;
                    $reporHarianByWo = collect($percentage_totalCutting)->groupBy('buyer');
                    $grandTotal =   $totalFabric +$totalCutting;
                    $percentage_grandTotal =   $grandTotal/$qty_check*100;

                     $coba[] = [
                        'tanggal' => $value2['tanggal'],
                        'buyer' => $value2['buyer'],
                        'remark' => $value2['remark'],
                        't_v4801c_doco' => $value2['t_v4801c_doco'],
                        'color' => $value2['color'],
                        'qty_check' => $value2['qty_check'],
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
                }
            }
            $percobaan = collect($coba)->groupby('buyer');
            // dd($percobaan);
              $report = [];
                foreach ($percobaan as $key2 => $value2) {
                     foreach ($value2 as $key3) {
                    $qty_check = collect($value2)->sum('qty_check');
                    $total_f_misprint = collect($value2)->sum('f_misprint');
                    $total_f_cacat_tenun = collect($value2)->sum('f_cacat_tenun');
                    $total_f_bolong = collect($value2)->sum('f_bolong');
                    $total_f_kotor = collect($value2)->sum('f_kotor');
                    $total_f_lain_lain = collect($value2)->sum('f_lain_lain');
                    $total_c_pinggir_kain = collect($value2)->sum('c_pinggir_kain');
                    $total_c_tidak_pas_pola = collect($value2)->sum('c_tidak_pas_pola');
                    $total_c_bolong = collect($value2)->sum('c_bolong');
                    $total_c_kotor = collect($value2)->sum('c_kotor');
                    $total_c_lain_lain = collect($value2)->sum('c_lain_lain');
                    $total_totalFabric = $total_f_misprint + $total_f_cacat_tenun+$total_f_bolong +$total_f_kotor +$total_f_lain_lain;
                    $total_totalCutting = collect($value2)->sum('totalCutting');
                    $total_grandTotal = collect($value2)->sum('grandTotal');
                    $percentage_total_f_misprint =   $total_f_misprint/$qty_check*100;
                    $percentage_total_f_cacat_tenun =   $total_f_cacat_tenun/$qty_check*100;
                    $percentage_total_f_bolong =   $total_f_bolong/$qty_check*100;
                    $percentage_total_f_kotor =   $total_f_kotor/$qty_check*100;
                    $percentage_total_f_lain_lain =   $total_f_lain_lain/$qty_check*100;
                    $percentage_total_c_pinggir_kain =   $total_c_pinggir_kain/$qty_check*100;
                    $percentage_total_c_tidak_pas_pola =   $total_c_tidak_pas_pola/$qty_check*100;
                    $percentage_total_c_bolong =   $total_c_bolong/$qty_check*100;
                    $percentage_total_c_kotor =   $total_c_kotor/$qty_check*100;
                    $percentage_total_c_lain_lain =   $total_c_lain_lain/$qty_check*100;
                    $percentage_total_totalFabric =   $total_totalFabric/$qty_check*100;
                    $percentage_total_totalCutting =   $total_totalCutting/$qty_check*100;
                    $percentage_total_grandTotal =   $total_grandTotal/$qty_check*100;
                    $report[] = [
                        'tanggal' => $key3['tanggal'],
                        'buyer' => $key3['buyer'],
                        'remark' => $key3['remark'],
                        't_v4801c_doco' => $key3['t_v4801c_doco'],
                        'color' => $key3['color'],
                        'qty_check' => $key3['qty_check'],
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
                        'qty_check' => $qty_check,
                        'total_f_misprint' => $total_f_misprint,
                        'total_f_bolong' => $total_f_bolong,
                        'total_f_cacat_tenun' => $total_f_cacat_tenun,
                        'total_f_kotor' => $total_f_kotor,
                        'total_f_lain_lain' => $total_f_lain_lain,
                        'total_c_pinggir_kain' => $total_c_pinggir_kain,
                        'total_c_tidak_pas_pola' => $total_c_tidak_pas_pola,
                        'total_c_bolong' => $total_c_bolong,
                        'total_c_kotor' => $total_c_kotor,
                        'total_c_lain_lain' => $total_c_lain_lain,
                        'total_totalFabric' => $total_totalFabric,
                        'total_totalCutting' => $total_totalCutting,
                        'total_grandTotal' => $total_grandTotal,
                        'percentage_total_f_misprint' => $percentage_total_f_misprint,
                        'percentage_total_f_cacat_tenun' => $percentage_total_f_cacat_tenun,
                        'percentage_total_f_bolong' => $percentage_total_f_bolong,
                        'percentage_total_f_kotor' => $percentage_total_f_kotor,
                        'percentage_total_f_lain_lain' => $percentage_total_f_lain_lain,
                        'percentage_total_c_pinggir_kain' => $percentage_total_c_pinggir_kain,
                        'percentage_total_c_tidak_pas_pola' => $percentage_total_c_tidak_pas_pola,
                        'percentage_total_c_bolong' => $percentage_total_c_bolong,
                        'percentage_total_c_kotor' => $percentage_total_c_kotor,
                        'percentage_total_c_lain_lain' => $percentage_total_c_lain_lain,
                        'percentage_total_totalFabric' => $percentage_total_totalFabric,
                        'percentage_total_totalCutting' => $percentage_total_totalCutting,
                        'percentage_total_grandTotal' => $percentage_total_grandTotal,
                    ];
                }  
                }  
     
            // dd($report);
        return $report;
    }
    public function harian($reporHarianByWo)
    {
        // dd($reporHarianByWoDate);
        $coba = [];
            foreach ($reporHarianByWo as $key => $value) {
                 foreach ($value as $key2 => $value2) {
                    //  dd($value );
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
                    
                    // $total_f_misprint = $f_misprint;
                    // dd($total_f_misprint);
                    $totalFabric =  $f_misprint +  $f_cacat_tenun +$f_bolong +  $f_kotor +$f_lain_lain ;
                    $percentage_totalFabric =   $totalFabric/$qty_check*100;
                    $totalCutting =  $c_pinggir_kain +  $c_tidak_pas_pola +$c_bolong +  $c_kotor +$c_lain_lain ;
                    $percentage_totalCutting =   $totalCutting/$qty_check*100;
                    $grandTotal =   $totalFabric +$totalCutting;
                    $percentage_grandTotal =   $grandTotal/$qty_check*100;

                     $coba[] = [
                        'tanggal' => $value2['tanggal'],
                        'buyer' => $value2['buyer'],
                        'remark' => $value2['remark'],
                        't_v4801c_doco' => $value2['t_v4801c_doco'],
                        'qty_check' => $value2['qty_check'],
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
                        'remark' => $value2['remark'],
                        'qty_check' => $value2['qty_check'],
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

    public function dailyFinalBuyerFinal($reporRejectCutting)
    {
        $reporRejectCutting= collect($reporRejectCutting)->groupBy('buyer');
          $dailyFinal = [];
            foreach ($reporRejectCutting as $key => $value) {
                $qty_check = collect($value)->sum('qty_check');
                $total_f_misprint = collect($value)->sum('f_misprint');
                $total_f_cacat_tenun = collect($value)->sum('f_cacat_tenun');
                $total_f_bolong = collect($value)->sum('f_bolong');
                $total_f_kotor = collect($value)->sum('f_kotor');
                $total_f_lain_lain = collect($value)->sum('f_lain_lain');
                $total_c_pinggir_kain = collect($value)->sum('c_pinggir_kain');
                $total_c_tidak_pas_pola = collect($value)->sum('c_tidak_pas_pola');
                $total_c_bolong = collect($value)->sum('c_bolong');
                $total_c_kotor = collect($value)->sum('c_kotor');
                $total_c_lain_lain = collect($value)->sum('c_lain_lain');
                $total_totalFabric = $total_f_misprint + $total_f_cacat_tenun+$total_f_bolong +$total_f_kotor +$total_f_lain_lain;
                $total_totalCutting = collect($value)->sum('totalCutting');
                $total_grandTotal = collect($value)->sum('grandTotal');
                
                $percentage_total_f_misprint =   $total_f_misprint/$qty_check*100;
                $percentage_total_f_cacat_tenun =   $total_f_cacat_tenun/$qty_check*100;
                $percentage_total_f_bolong =   $total_f_bolong/$qty_check*100;
                $percentage_total_f_kotor =   $total_f_kotor/$qty_check*100;
                $percentage_total_f_lain_lain =   $total_f_lain_lain/$qty_check*100;
                $percentage_total_c_pinggir_kain =   $total_c_pinggir_kain/$qty_check*100;
                $percentage_total_c_tidak_pas_pola =   $total_c_tidak_pas_pola/$qty_check*100;
                $percentage_total_c_bolong =   $total_c_bolong/$qty_check*100;
                $percentage_total_c_kotor =   $total_c_kotor/$qty_check*100;
                $percentage_total_c_lain_lain =   $total_c_lain_lain/$qty_check*100;
                $percentage_total_totalFabric =   $total_totalFabric/$qty_check*100;
                $percentage_total_totalCutting =   $total_totalCutting/$qty_check*100;
                $percentage_total_grandTotal =   $total_grandTotal/$qty_check*100;

                    $finalTotal[] = [
                        'qty_check' => $qty_check,
                        'total_f_misprint' => $total_f_misprint,
                        'total_f_bolong' => $total_f_bolong,
                        'total_f_cacat_tenun' => $total_f_cacat_tenun,
                        'total_f_kotor' => $total_f_kotor,
                        'total_f_lain_lain' => $total_f_lain_lain,
                        'total_c_pinggir_kain' => $total_c_pinggir_kain,
                        'total_c_tidak_pas_pola' => $total_c_tidak_pas_pola,
                        'total_c_bolong' => $total_c_bolong,
                        'total_c_kotor' => $total_c_kotor,
                        'total_c_lain_lain' => $total_c_lain_lain,
                        'total_totalFabric' => $total_totalFabric,
                        'total_totalCutting' => $total_totalCutting,
                        'total_grandTotal' => $total_grandTotal,
                        'percentage_total_f_misprint' => $percentage_total_f_misprint,
                        'percentage_total_f_cacat_tenun' => $percentage_total_f_cacat_tenun,
                        'percentage_total_f_bolong' => $percentage_total_f_bolong,
                        'percentage_total_f_kotor' => $percentage_total_f_kotor,
                        'percentage_total_f_lain_lain' => $percentage_total_f_lain_lain,
                        'percentage_total_c_pinggir_kain' => $percentage_total_c_pinggir_kain,
                        'percentage_total_c_tidak_pas_pola' => $percentage_total_c_tidak_pas_pola,
                        'percentage_total_c_bolong' => $percentage_total_c_bolong,
                        'percentage_total_c_kotor' => $percentage_total_c_kotor,
                        'percentage_total_c_lain_lain' => $percentage_total_c_lain_lain,
                        'percentage_total_totalFabric' => $percentage_total_totalFabric,
                        'percentage_total_totalCutting' => $percentage_total_totalCutting,
                        'percentage_total_grandTotal' => $percentage_total_grandTotal,
                    ];
            }
              $percobaan = collect($finalTotal)->groupby('buyer');
            //   dd($percobaan);
               $report = [];
            foreach ($percobaan as $key => $value) {
                $TotalResult = collect($value)
                    ->groupBy('buyer')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $report[] = [
                       'qty_check' => $qty_check,
                        'total_f_misprint' => $total_f_misprint,
                        'total_f_bolong' => $total_f_bolong,
                        'total_f_cacat_tenun' => $total_f_cacat_tenun,
                        'total_f_kotor' => $total_f_kotor,
                        'total_f_lain_lain' => $total_f_lain_lain,
                        'total_c_pinggir_kain' => $total_c_pinggir_kain,
                        'total_c_tidak_pas_pola' => $total_c_tidak_pas_pola,
                        'total_c_bolong' => $total_c_bolong,
                        'total_c_kotor' => $total_c_kotor,
                        'total_c_lain_lain' => $total_c_lain_lain,
                        'total_totalFabric' => $total_totalFabric,
                        'total_totalCutting' => $total_totalCutting,
                        'total_grandTotal' => $total_grandTotal,
                        'percentage_total_f_misprint' => $percentage_total_f_misprint,
                        'percentage_total_f_cacat_tenun' => $percentage_total_f_cacat_tenun,
                        'percentage_total_f_bolong' => $percentage_total_f_bolong,
                        'percentage_total_f_kotor' => $percentage_total_f_kotor,
                        'percentage_total_f_lain_lain' => $percentage_total_f_lain_lain,
                        'percentage_total_c_pinggir_kain' => $percentage_total_c_pinggir_kain,
                        'percentage_total_c_tidak_pas_pola' => $percentage_total_c_tidak_pas_pola,
                        'percentage_total_c_bolong' => $percentage_total_c_bolong,
                        'percentage_total_c_kotor' => $percentage_total_c_kotor,
                        'percentage_total_c_lain_lain' => $percentage_total_c_lain_lain,
                        'percentage_total_totalFabric' => $percentage_total_totalFabric,
                        'percentage_total_totalCutting' => $percentage_total_totalCutting,
                        'percentage_total_grandTotal' => $percentage_total_grandTotal,
                    ];
            }
        }  
              $percobaan = collect($report)->groupby('buyer');
        return $report;
    }
    public function dailyFinalBuyer($reporRejectCutting)
    {
        $reporRejectCuttingFnal= collect($reporRejectCutting)->groupBy('tanggal');
          $dailyFinal = [];
            foreach ($reporRejectCuttingFnal as $key => $value) {
            $qty_check = collect($value)->sum('qty_check');
            $total_f_misprint = collect($value)->sum('f_misprint');
            $total_f_cacat_tenun = collect($value)->sum('f_cacat_tenun');
            $total_f_bolong = collect($value)->sum('f_bolong');
            $total_f_kotor = collect($value)->sum('f_kotor');
            $total_f_lain_lain = collect($value)->sum('f_lain_lain');
            $total_c_pinggir_kain = collect($value)->sum('c_pinggir_kain');
            $total_c_tidak_pas_pola = collect($value)->sum('c_tidak_pas_pola');
            $total_c_bolong = collect($value)->sum('c_bolong');
            $total_c_kotor = collect($value)->sum('c_kotor');
            $total_c_lain_lain = collect($value)->sum('c_lain_lain');
            $total_totalFabric = $total_f_misprint + $total_f_cacat_tenun+$total_f_bolong +$total_f_kotor +$total_f_lain_lain;
            $total_totalCutting = collect($value)->sum('totalCutting');
            $total_grandTotal = collect($value)->sum('grandTotal');
            
            $percentage_total_f_misprint =   $total_f_misprint/$qty_check*100;
            $percentage_total_f_cacat_tenun =   $total_f_cacat_tenun/$qty_check*100;
            $percentage_total_f_bolong =   $total_f_bolong/$qty_check*100;
            $percentage_total_f_kotor =   $total_f_kotor/$qty_check*100;
            $percentage_total_f_lain_lain =   $total_f_lain_lain/$qty_check*100;
            $percentage_total_c_pinggir_kain =   $total_c_pinggir_kain/$qty_check*100;
            $percentage_total_c_tidak_pas_pola =   $total_c_tidak_pas_pola/$qty_check*100;
            $percentage_total_c_bolong =   $total_c_bolong/$qty_check*100;
            $percentage_total_c_kotor =   $total_c_kotor/$qty_check*100;
            $percentage_total_c_lain_lain = $total_c_lain_lain/$qty_check*100;
            $percentage_total_totalFabric = $total_totalFabric/$qty_check*100;
            $percentage_total_totalCutting =$total_totalCutting/$qty_check*100;
            $percentage_total_grandTotal = $total_grandTotal/$qty_check*100;


            $finalTotal[] = [
                        'qty_check' => $qty_check,
                        'total_f_misprint' => $total_f_misprint,
                        'total_f_bolong' => $total_f_bolong,
                        'total_f_cacat_tenun' => $total_f_cacat_tenun,
                        'total_f_kotor' => $total_f_kotor,
                        'total_f_lain_lain' => $total_f_lain_lain,
                        'total_c_pinggir_kain' => $total_c_pinggir_kain,
                        'total_c_tidak_pas_pola' => $total_c_tidak_pas_pola,
                        'total_c_bolong' => $total_c_bolong,
                        'total_c_kotor' => $total_c_kotor,
                        'total_c_lain_lain' => $total_c_lain_lain,
                        'total_totalFabric' => $total_totalFabric,
                        'total_totalCutting' => $total_totalCutting,
                        'total_grandTotal' => $total_grandTotal,
                        'percentage_total_f_misprint' => $percentage_total_f_misprint,
                        'percentage_total_f_cacat_tenun' => $percentage_total_f_cacat_tenun,
                        'percentage_total_f_bolong' => $percentage_total_f_bolong,
                        'percentage_total_f_kotor' => $percentage_total_f_kotor,
                        'percentage_total_f_lain_lain' => $percentage_total_f_lain_lain,
                        'percentage_total_c_pinggir_kain' => $percentage_total_c_pinggir_kain,
                        'percentage_total_c_tidak_pas_pola' => $percentage_total_c_tidak_pas_pola,
                        'percentage_total_c_bolong' => $percentage_total_c_bolong,
                        'percentage_total_c_kotor' => $percentage_total_c_kotor,
                        'percentage_total_c_lain_lain' => $percentage_total_c_lain_lain,
                        'percentage_total_totalFabric' => $percentage_total_totalFabric,
                        'percentage_total_totalCutting' => $percentage_total_totalCutting,
                        'percentage_total_grandTotal' => $percentage_total_grandTotal,
                    ];
            }
                    //  dd($finalTotal);   

        return $finalTotal;
    }
    public function dailyFinal($reporRejectCutting)
    {
        $reporRejectCuttingFnal= collect($reporRejectCutting)->groupBy('tanggal');
          $dailyFinal = [];
            foreach ($reporRejectCuttingFnal as $key => $value) {
            $qty_check = collect($value)->sum('qty_check');
            $total_f_misprint = collect($value)->sum('f_misprint');
            $total_f_cacat_tenun = collect($value)->sum('f_cacat_tenun');
            $total_f_bolong = collect($value)->sum('f_bolong');
            $total_f_kotor = collect($value)->sum('f_kotor');
            $total_f_lain_lain = collect($value)->sum('f_lain_lain');
            $total_c_pinggir_kain = collect($value)->sum('c_pinggir_kain');
            $total_c_tidak_pas_pola = collect($value)->sum('c_tidak_pas_pola');
            $total_c_bolong = collect($value)->sum('c_bolong');
            $total_c_kotor = collect($value)->sum('c_kotor');
            $total_c_lain_lain = collect($value)->sum('c_lain_lain');
            $total_totalFabric = $total_f_misprint + $total_f_cacat_tenun+$total_f_bolong +$total_f_kotor +$total_f_lain_lain;
            $total_totalCutting = collect($value)->sum('totalCutting');
            $total_grandTotal = collect($value)->sum('grandTotal');
            
            $percentage_total_f_misprint =   $total_f_misprint/$qty_check*100;
            $percentage_total_f_cacat_tenun =   $total_f_cacat_tenun/$qty_check*100;
            $percentage_total_f_bolong =   $total_f_bolong/$qty_check*100;
            $percentage_total_f_kotor =   $total_f_kotor/$qty_check*100;
            $percentage_total_f_lain_lain =   $total_f_lain_lain/$qty_check*100;
            $percentage_total_c_pinggir_kain =   $total_c_pinggir_kain/$qty_check*100;
            $percentage_total_c_tidak_pas_pola =   $total_c_tidak_pas_pola/$qty_check*100;
            $percentage_total_c_bolong =   $total_c_bolong/$qty_check*100;
            $percentage_total_c_kotor =   $total_c_kotor/$qty_check*100;
            $percentage_total_c_lain_lain =   $total_c_lain_lain/$qty_check*100;
            $percentage_total_totalFabric =   $total_totalFabric/$qty_check*100;
            $percentage_total_totalCutting =   $total_totalCutting/$qty_check*100;
            $percentage_total_grandTotal =   $total_grandTotal/$qty_check*100;

            // dd($percentage_total_f_misprint);



            $finalTotal[] = [
                        'qty_check' => $qty_check,
                        'total_f_misprint' => $total_f_misprint,
                        'total_f_bolong' => $total_f_bolong,
                        'total_f_cacat_tenun' => $total_f_cacat_tenun,
                        'total_f_kotor' => $total_f_kotor,
                        'total_f_lain_lain' => $total_f_lain_lain,
                        'total_c_pinggir_kain' => $total_c_pinggir_kain,
                        'total_c_tidak_pas_pola' => $total_c_tidak_pas_pola,
                        'total_c_bolong' => $total_c_bolong,
                        'total_c_kotor' => $total_c_kotor,
                        'total_c_lain_lain' => $total_c_lain_lain,
                        'total_totalFabric' => $total_totalFabric,
                        'total_totalCutting' => $total_totalCutting,
                        'total_grandTotal' => $total_grandTotal,
                        'percentage_total_f_misprint' => $percentage_total_f_misprint,
                        'percentage_total_f_cacat_tenun' => $percentage_total_f_cacat_tenun,
                        'percentage_total_f_bolong' => $percentage_total_f_bolong,
                        'percentage_total_f_kotor' => $percentage_total_f_kotor,
                        'percentage_total_f_lain_lain' => $percentage_total_f_lain_lain,
                        'percentage_total_c_pinggir_kain' => $percentage_total_c_pinggir_kain,
                        'percentage_total_c_tidak_pas_pola' => $percentage_total_c_tidak_pas_pola,
                        'percentage_total_c_bolong' => $percentage_total_c_bolong,
                        'percentage_total_c_kotor' => $percentage_total_c_kotor,
                        'percentage_total_c_lain_lain' => $percentage_total_c_lain_lain,
                        'percentage_total_totalFabric' => $percentage_total_totalFabric,
                        'percentage_total_totalCutting' => $percentage_total_totalCutting,
                        'percentage_total_grandTotal' => $percentage_total_grandTotal,
                    ];
            }
            // dd($finalTotal);
        return $finalTotal;
    }
  public function data_awal_bulan_reject($dataBranch, $tanggal_awal,$tanggal_akhir)
    {
        $reporHarianByTanggal = RejectCutting::where('branchdetail', $dataBranch->branchdetail)
                    ->where('tanggal','>=', $tanggal_awal)->where('tanggal','<=', $tanggal_akhir)->orderBy("tanggal",'asc')
                    ->get();

        return $reporHarianByTanggal;
    }
public function bulananRejectSize($reporHarianByTanggal)
    {
          $coba = [];
        foreach ($reporHarianByTanggal as $key => $value) {
            if(($value->buyer == "MARUBENI FASHION LINK LTD.") OR ($value->buyer == "MATSUOKA TRADING CO., LTD.")){
            $qty_check = $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('qty_check');
            $qty_gelar = $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('qty_gelar');
            $ratio_80 =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('ratio_80');
            $ratio_90 =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('ratio_90');
            $ratio_100 =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('ratio_100');
            $ratio_110 =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('ratio_110');
            $ratio_120 =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('ratio_120');
            $ratio_130 =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('ratio_130');
            $ratio_140 =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('ratio_140');
            $ratio_150 =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('ratio_150');
            $ratio_160=  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('ratio_160');
            $reject_80 =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('reject_80');
            $reject_90 =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('reject_90');
            $reject_100 =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('reject_100');
            $reject_110 =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('reject_110');
            $reject_120 =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('reject_120');
            $reject_130 =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('reject_130');
            $reject_140 =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('reject_140');
            $reject_150 =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('reject_150');
            $reject_160 =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('reject_160');

                $total_ratio_size = $ratio_80 +  $ratio_90 + $ratio_100 + $ratio_110 +  $ratio_120 + $ratio_130 + $ratio_140 + $ratio_150 + $ratio_160;   
                $qty_meja = $qty_gelar * $total_ratio_size;
                $total_reject_size = $reject_80 +  $reject_90 + $reject_100 + $reject_110 +  $reject_120 + $reject_130 + $reject_140 + $reject_150 +$reject_160;   
                $grandTotal =  $total_ratio_size + $total_reject_size ;
                $percentage = $total_reject_size /$qty_check*100;
            $coba[] = [
                    't_v4801c_doco' => $value['t_v4801c_doco'],
                    'buyer' => $value['buyer'],
                    'color' => $value['color'],
                    'remark' => $value['remark'],
                    'qty_check' => $qty_check,
                    'qty_gelar' => $qty_gelar,
                    'qty_meja' => $qty_meja,
                    'qty_check' => $qty_check,
                    'ratio_80' => $ratio_80,
                    'ratio_90' => $ratio_90,
                    'ratio_100' => $ratio_100,
                    'ratio_110' => $ratio_110,
                    'ratio_120' => $ratio_120,
                    'ratio_130' => $ratio_130,
                    'ratio_140' => $ratio_140,
                    'ratio_150' => $ratio_150,
                    'ratio_160' => $ratio_160,
                    'total_ratio_size' => $total_ratio_size,
                    'qty_gelar' => $qty_gelar,
                    'qty_meja' => $qty_meja,
                    'qty_check' => $qty_check,
                    'reject_80' => $reject_80,
                    'reject_90' => $reject_90,
                    'reject_100' => $reject_100,
                    'reject_110' => $reject_110,
                    'reject_120' => $reject_120,
                    'reject_130' => $reject_130,
                    'reject_140' => $reject_140,
                    'reject_150' => $reject_150,
                    'reject_160' => $reject_160,
                    'total_reject_size' => $total_reject_size,
                    'grandTotal' => $grandTotal,
                    'percentage' => $percentage,
            ];

        }
    }
        $reporHarianByTanggal = collect($coba)->groupBy(['t_v4801c_doco','color'])->toArray(); 
              $report = [];
            $wo='';
            $warna='';
            $warna='';
            foreach ($reporHarianByTanggal as $key => $value) {
                foreach ($value as $key1 => $value1) {
                    foreach ($value1 as $dp) {
                        if( ($dp['t_v4801c_doco'] != $wo) OR ($dp['color'] != $warna)){
                                $reportReject[] = [
                                        'buyer' => $dp['buyer'],
                                        't_v4801c_doco' => $dp['t_v4801c_doco'],
                                        'qty_check' => $dp['qty_check'],
                                        'color' => $dp['color'],
                                        'remark' => $dp['remark'],
                                        'qty_gelar' => $dp['qty_gelar'],
                                        'qty_meja' => $dp['qty_meja'],
                                        'ratio_80' => $dp['ratio_80'],
                                        'ratio_90' => $dp['ratio_90'],
                                        'ratio_100' => $dp['ratio_100'],
                                        'ratio_110' => $dp['ratio_110'],
                                        'ratio_120' => $dp['ratio_120'],
                                        'ratio_130' => $dp['ratio_130'],
                                        'ratio_140' => $dp['ratio_140'],
                                        'ratio_150' => $dp['ratio_150'],
                                        'ratio_160' => $dp['ratio_160'],
                                        'total_ratio_size' => $dp['total_ratio_size'],
                                        'reject_80' => $dp['reject_80'],
                                        'reject_90' => $dp['reject_90'],
                                        'reject_100' => $dp['reject_100'],
                                        'reject_140' => $dp['reject_140'],
                                        'reject_130' => $dp['reject_130'],
                                        'reject_150' => $dp['reject_150'],
                                        'reject_160' => $dp['reject_160'],
                                        'reject_110' => $dp['reject_110'],
                                        'reject_120' => $dp['reject_120'],
                                        'total_reject_size' => $dp['total_reject_size'],
                                        'grandTotal' => $dp['grandTotal'],
                                        'percentage' => $dp['percentage'],
                                ];
                                $wo=$dp['t_v4801c_doco'];
                                $warna=$dp['color'];

                            
                        }
                    }
                }
                
            }

        return $reportReject;
    }
   
    public function bulananRejectFinalSize($reportReject)
    {
        $data= collect($reportReject)->groupBy('tanggal');
        $cobaFinal = [];
        foreach ($data as $key => $value) {
            
            $total_qty_check = collect($value)->sum('qty_check');
            $total_qty_meja = collect($value)->sum('qty_meja');
            $total_qty_gelar = collect($value)->sum('qty_gelar');
            $total_ratio_80 = collect($value)->sum('ratio_80');
            $total_ratio_90 = collect($value)->sum('ratio_90');
            $total_ratio_100 = collect($value)->sum('ratio_100');
            $total_ratio_110 = collect($value)->sum('ratio_110');
            $total_ratio_120 = collect($value)->sum('ratio_120');
            $total_ratio_130 = collect($value)->sum('ratio_130');
            $total_ratio_140 = collect($value)->sum('ratio_140');
            $total_ratio_150 = collect($value)->sum('ratio_150');
            $total_ratio_160 = collect($value)->sum('ratio_160');
            $total_total_ratio_size = collect($value)->sum('total_ratio_size');    
            $total_reject_80 = collect($value)->sum('reject_80');
            $total_reject_90 = collect($value)->sum('reject_90');
            $total_reject_100 = collect($value)->sum('reject_100');
            $total_reject_110 = collect($value)->sum('reject_110');
            $total_reject_120 = collect($value)->sum('reject_120');
            $total_reject_130 = collect($value)->sum('reject_130');
            $total_reject_140 = collect($value)->sum('reject_140');
            $total_reject_150 = collect($value)->sum('reject_150');
            $total_reject_160 = collect($value)->sum('reject_160');
            $total_total_reject_size = collect($value)->sum('total_reject_size');    
           
            $total_grandTotal = collect($value)->sum('grandTotal');    
            $total_percentage = $total_total_reject_size / $total_qty_check *100; ;  
            
            $cobaFinal[]=[
                    'total_qty_gelar' => $total_qty_gelar,
                    'total_qty_meja' => $total_qty_meja,
                    'total_qty_check' => $total_qty_check,
                    'total_ratio_80' => $total_ratio_80,
                    'total_ratio_90' => $total_ratio_80,
                    'total_ratio_100' => $total_ratio_80,
                    'total_ratio_110' => $total_ratio_110,
                    'total_ratio_120' => $total_ratio_120,
                    'total_ratio_130' => $total_ratio_130,
                    'total_ratio_140' => $total_ratio_140,
                    'total_ratio_150' => $total_ratio_150,
                    'total_ratio_160' => $total_ratio_160,
                    'total_total_ratio_size' => $total_total_ratio_size,
                    'total_reject_80' => $total_reject_80,
                    'total_reject_90' => $total_reject_90,
                    'total_reject_100' => $total_reject_100,
                    'total_reject_110' => $total_reject_110,
                    'total_reject_120' => $total_reject_120,
                    'total_reject_130' => $total_reject_130,
                    'total_reject_140' => $total_reject_140,
                    'total_reject_150' => $total_reject_150,
                    'total_reject_160' => $total_reject_160,
                    'total_total_reject_size' => $total_total_reject_size,
                    'total_grandTotal' => $total_grandTotal,
                    'total_percentage' => $total_percentage,
                ];
            
        }
            

        return $cobaFinal;
    }

     public function bulananReject($reporHarianByTanggal)
    {
        // dd($reporHarianByTanggal);
          $coba = [];
        foreach ($reporHarianByTanggal as $key => $value) {
            if(($value->buyer != "MARUBENI FASHION LINK LTD.") && ($value->buyer != "MATSUOKA TRADING CO., LTD.")){
            $qty_check = $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('qty_check');
            $qty_gelar = $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('qty_gelar');
            $ratio_S =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('ratio_S');
            $ratio_L =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('ratio_L');
            $ratio_M =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('ratio_M');
            $ratio_LL =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('ratio_LL');
            $ratio_XL =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('ratio_XL');
            $ratio_F =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('ratio_F');
            $ratio_O =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('ratio_O');
            $ratio_XS =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('ratio_XS');
            $ratio_XXL =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('ratio_XXL');
            $ratio_lain =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('ratio_lain');
            $reject_S =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('reject_S');
            $reject_L =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('reject_L');
            $reject_M =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('reject_M');
            $reject_LL =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('reject_LL');
            $reject_XL =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('reject_XL');
            $reject_F =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('reject_F');
            $reject_O =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('reject_O');
            $reject_XS =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('reject_XS');
            $reject_XXL =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('reject_XXL');
            $reject_lain =  $reporHarianByTanggal->where('t_v4801c_doco',$value->t_v4801c_doco)->where('color',$value->color)->sum('reject_lain');

                
            $total_ratio = $ratio_S +  $ratio_M + $ratio_L + $ratio_LL + $ratio_XL + $ratio_F + $ratio_O + $ratio_XS   + $ratio_XXL+ $ratio_lain;   
                $qty_meja = $qty_gelar * $total_ratio;
                $total_reject = $reject_S +  $reject_M + $reject_L + $reject_LL + $reject_XL +  + $reject_F + $reject_O + $reject_XS   + $reject_XXL+$reject_lain;   
                $grandTotal =  $total_ratio + $total_reject ;
                $percentage = $total_reject /$qty_check*100;

            $coba[] = [
                    't_v4801c_doco' => $value['t_v4801c_doco'],
                    'buyer' => $value['buyer'],
                    'color' => $value['color'],
                    'remark' => $value['remark'],
                    'qty_check' => $qty_check,
                    'ratio_S' => $ratio_S,
                    'ratio_M' => $ratio_M,
                    'ratio_L' => $ratio_L,
                    'ratio_LL' => $ratio_LL,
                    'ratio_XL' => $ratio_XL,
                    'ratio_F' => $ratio_F,
                    'ratio_O' => $ratio_O,
                    'ratio_XS' => $ratio_XS,
                    'ratio_XXL' => $ratio_XXL,
                    'ratio_lain' => $ratio_lain,
                    'total_ratio' => $total_ratio,
                    'qty_gelar' => $qty_gelar,
                    'qty_meja' => $qty_meja,
                    'qty_check' => $qty_check,
                    'reject_S' => $reject_S,
                    'reject_M' => $reject_M,
                    'reject_L' => $reject_L,
                    'reject_LL' => $reject_LL,
                    'reject_lain' => $reject_lain,
                    'reject_XL' => $reject_XL,
                    'reject_F' => $reject_F,
                    'reject_O' => $reject_O,
                    'reject_XS' => $reject_XS,
                    'reject_XXL' => $reject_XXL,
                    'total_reject' => $total_reject,
                    'grandTotal' => $grandTotal,
                    'percentage' => $percentage,
            ];

        }
        }
        // dd($coba);
        $reporHarianByTanggal = collect($coba)->groupBy(['t_v4801c_doco','color'])->toArray(); 
              $report = [];
            $wo='';
            $warna='';
            foreach ($reporHarianByTanggal as $key => $value) {
                foreach ($value as $key1 => $value1) {
                    foreach ($value1 as $dp) {
                        if( ($dp['t_v4801c_doco'] != $wo) OR ($dp['color'] != $warna)){
                            $reportMonthlyReject[] = [
                            'buyer' => $dp['buyer'],
                            't_v4801c_doco' => $dp['t_v4801c_doco'],
                            'qty_check' => $dp['qty_check'],
                            'color' => $dp['color'],
                            'remark' => $dp['remark'],
                            'qty_gelar' => $dp['qty_gelar'],
                            'qty_meja' => $dp['qty_meja'],
                            'ratio_S' => $dp['ratio_S'],
                            'ratio_M' => $dp['ratio_M'],
                            'ratio_L' => $dp['ratio_L'],
                            'ratio_LL' => $dp['ratio_LL'],
                            'ratio_XL' => $dp['ratio_XL'],
                            'ratio_F' => $dp['ratio_F'],
                            'ratio_O' => $dp['ratio_O'],
                            'ratio_XS' => $dp['ratio_XS'],
                            'ratio_XXL' => $dp['ratio_XXL'],
                            'ratio_lain' => $dp['ratio_lain'],
                            'total_ratio' => $dp['total_ratio'],
                            'reject_S' => $dp['reject_S'],
                            'reject_M' => $dp['reject_M'],
                            'reject_L' => $dp['reject_L'],
                            'reject_LL' => $dp['reject_LL'],
                            'reject_lain' => $dp['reject_lain'],
                            'reject_XL' => $dp['reject_XL'],
                            'reject_F' => $dp['reject_F'],
                            'reject_O' => $dp['reject_O'],
                            'reject_XS' => $dp['reject_XS'],
                            'reject_XXL' => $dp['reject_XXL'],
                            'total_reject' => $dp['total_reject'],
                            'grandTotal' => $dp['grandTotal'],
                            'percentage' => $dp['percentage'],
                            ];
                            $wo=$dp['t_v4801c_doco'];
                            $warna=$dp['color'];

                        }
                    }
                }
            }
        //   dd($reportMonthlyReject);
        return $reportMonthlyReject;
    }

    public function bulananRejectFinal($reportMonthlyReject)
    {
            $percobaan = collect($reportMonthlyReject)->groupby('bulan');
        $cobaFinal = [];
        foreach ($percobaan as $key => $value) {
            $total_qty_check = collect($value)->sum('qty_check');
            $total_qty_meja = collect($value)->sum('qty_meja');
            $total_qty_gelar = collect($value)->sum('qty_gelar');
            $total_ratio_S = collect($value)->sum('ratio_S');
            $total_ratio_L = collect($value)->sum('ratio_L');
            $total_ratio_M = collect($value)->sum('ratio_M');
            $total_ratio_LL = collect($value)->sum('ratio_LL');
            $total_ratio_XL = collect($value)->sum('ratio_XL');
            $total_ratio_F = collect($value)->sum('ratio_F');
            $total_ratio_O = collect($value)->sum('ratio_O');
            $total_ratio_XS = collect($value)->sum('ratio_XS');
            $total_ratio_XXL = collect($value)->sum('ratio_XXL');
            $total_ratio_lain = collect($value)->sum('ratio_lain');
            $total_reject_S = collect($value)->sum('reject_S');
            $total_reject_L = collect($value)->sum('reject_L');
            $total_reject_M = collect($value)->sum('reject_M');
            $total_reject_LL = collect($value)->sum('reject_LL');
            $total_reject_lain = collect($value)->sum('reject_lain');    
            $total_reject_XL = collect($value)->sum('reject_XL');   
            $total_reject_F = collect($value)->sum('reject_F');
            $total_reject_O = collect($value)->sum('reject_O');
            $total_reject_XS = collect($value)->sum('reject_XS');
            $total_reject_XXL = collect($value)->sum('reject_XXL'); 
            $total_total_ratio = collect($value)->sum('total_ratio');    
            $total_total_reject = collect($value)->sum('total_reject');    
            $total_grandTotal = collect($value)->sum('grandTotal');    
            $total_percentage = $total_total_reject / $total_qty_check *100; ;  
            
            $cobaFinal[]=[
                    'total_qty_gelar' => $total_qty_gelar,
                    'total_qty_meja' => $total_qty_meja,
                    'total_qty_check' => $total_qty_check,
                    'total_ratio_S' => $total_ratio_S,
                    'total_ratio_M' => $total_ratio_M,
                    'total_ratio_L' => $total_ratio_L,
                    'total_ratio_LL' => $total_ratio_LL,
                    'total_ratio_XL' => $total_ratio_XL,
                    'total_ratio_F' => $total_ratio_F,
                    'total_ratio_O' => $total_ratio_O,
                    'total_ratio_XS' => $total_ratio_XS,
                    'total_ratio_XXL' => $total_ratio_XXL,
                    'total_ratio_lain' => $total_ratio_lain,
                    'total_total_ratio' => $total_total_ratio,
                    'total_total_ratio' => $total_total_ratio,
                    'total_total_ratio' => $total_total_ratio,
                    'total_reject_S' => $total_reject_S,
                    'total_reject_M' => $total_reject_M,
                    'total_reject_L' => $total_reject_L,
                    'total_reject_LL' => $total_reject_LL,
                    'total_reject_lain' => $total_reject_lain,
                    'total_reject_XL' => $total_reject_XL,
                    'total_reject_F' => $total_reject_F,
                    'total_reject_O' => $total_reject_O,
                    'total_reject_XS' => $total_reject_XS,
                    'total_reject_XXL' => $total_reject_XXL,
                    'total_total_reject' => $total_total_reject,
                    'total_grandTotal' => $total_grandTotal,
                    'total_percentage' => $total_percentage,
            ];
        }
            // dd($cobaFinal);
        return $cobaFinal;
    }

    public function bulanan($perbulan)
    {
        $coba = [];
            foreach ($perbulan as $key => $value) {
                foreach ($value as $key2) {
                 $qty_check = collect($value)->sum('qty_check');
                 $f_misprint = collect($value)->sum('f_misprint');
                 $f_cacat_tenun = collect($value)->sum('f_cacat_tenun');
                 $f_bolong = collect($value)->sum('f_bolong');
                 $f_kotor = collect($value)->sum('f_kotor');
                 $f_lain_lain = collect($value)->sum('f_lain_lain');
                 $c_pinggir_kain = collect($value)->sum('c_pinggir_kain');
                 $c_tidak_pas_pola = collect($value)->sum('c_tidak_pas_pola');
                 $c_bolong = collect($value)->sum('c_bolong');
                 $c_kotor = collect($value)->sum('c_kotor');
                 $c_lain_lain = collect($value)->sum('c_lain_lain');

                $totalFabric =  $f_misprint +  $f_cacat_tenun +$f_bolong +  $f_kotor +$f_lain_lain ;
                $percentage_totalFabric =   $totalFabric/$qty_check*100;
                $totalCutting =  $c_pinggir_kain +  $c_tidak_pas_pola +$c_bolong +  $c_kotor +$c_lain_lain ;
                $percentage_totalCutting =   $totalCutting/$qty_check*100;
                $grandTotal =   $totalFabric +$totalCutting;
                $percentage_grandTotal =   $grandTotal/$qty_check*100;
                $percentage_f_misprint =   $f_misprint/$qty_check*100;
                $percentage_f_cacat_tenun =   $f_cacat_tenun/$qty_check*100;
                $percentage_f_bolong =   $f_bolong/$qty_check*100;
                $percentage_f_kotor =   $f_kotor/$qty_check*100;
                $percentage_f_lain_lain =   $f_lain_lain/$qty_check*100;
                $percentage_c_pinggir_kain =   $c_pinggir_kain/$qty_check*100;
                $percentage_c_tidak_pas_pola =   $c_tidak_pas_pola/$qty_check*100;
                $percentage_c_bolong =   $c_bolong/$qty_check*100;
                $percentage_c_kotor =   $c_kotor/$qty_check*100;
                $percentage_c_lain_lain =   $c_lain_lain/$qty_check*100;
                        
                 $coba[] = [
                        'tanggal' => $key2->tanggal,
                        'remark' => $key2['remark'],
                        'qty_check' => $qty_check,
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
                }
            }

             $percobaan = collect($coba)->groupby('tanggal');
            
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
                        // 'buyer' => $value2['buyer'],
                        // 't_v4801c_doco' => $value2['t_v4801c_doco'],
                        // 'qty_check' => $value2['qty_check'],
                        'remark' => $value2['remark'],
                        'qty_check' => $value2['qty_check'],
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
            // dd($report);
        return $report;
    }

     public function yearlyFinal($tahun_report)
    {
             $percobaan = collect($tahun_report)->groupby('tahun');
          $monthlyFinal = [];
            foreach ($percobaan as $key => $value) {
            $qty_check = collect($value)->sum('qty_check');
            $total_f_misprint = collect($value)->sum('f_misprint');
            $total_f_cacat_tenun = collect($value)->sum('f_cacat_tenun');
            $total_f_bolong = collect($value)->sum('f_bolong');
            $total_f_kotor = collect($value)->sum('f_kotor');
            $total_f_lain_lain = collect($value)->sum('f_lain_lain');
            $total_c_pinggir_kain = collect($value)->sum('c_pinggir_kain');
            $total_c_tidak_pas_pola = collect($value)->sum('c_tidak_pas_pola');
            $total_c_bolong = collect($value)->sum('c_bolong');
            $total_c_kotor = collect($value)->sum('c_kotor');
            $total_c_lain_lain = collect($value)->sum('c_lain_lain');
            $total_totalFabric = $total_f_misprint + $total_f_cacat_tenun+$total_f_bolong +$total_f_kotor +$total_f_lain_lain;
            $total_totalCutting = collect($value)->sum('totalCutting');
            $total_grandTotal = collect($value)->sum('grandTotal');
            
            $percentage_total_f_misprint =   $total_f_misprint/$qty_check*100;
            $percentage_total_f_cacat_tenun =   $total_f_cacat_tenun/$qty_check*100;
            $percentage_total_f_bolong =   $total_f_bolong/$qty_check*100;
            $percentage_total_f_kotor =   $total_f_kotor/$qty_check*100;
            $percentage_total_f_lain_lain =   $total_f_lain_lain/$qty_check*100;
            $percentage_total_c_pinggir_kain =   $total_c_pinggir_kain/$qty_check*100;
            $percentage_total_c_tidak_pas_pola =   $total_c_tidak_pas_pola/$qty_check*100;
            $percentage_total_c_bolong =   $total_c_bolong/$qty_check*100;
            $percentage_total_c_kotor =   $total_c_kotor/$qty_check*100;
            $percentage_total_c_lain_lain =   $total_c_lain_lain/$qty_check*100;
            $percentage_total_totalFabric =   $total_totalFabric/$qty_check*100;
            $percentage_total_totalCutting =   $total_totalCutting/$qty_check*100;
            $percentage_total_grandTotal =   $total_grandTotal/$qty_check*100;

            $finalTotal[] = [
                        'qty_check' => $qty_check,
                        'total_f_misprint' => $total_f_misprint,
                        'total_f_bolong' => $total_f_bolong,
                        'total_f_cacat_tenun' => $total_f_cacat_tenun,
                        'total_f_kotor' => $total_f_kotor,
                        'total_f_lain_lain' => $total_f_lain_lain,
                        'total_c_pinggir_kain' => $total_c_pinggir_kain,
                        'total_c_tidak_pas_pola' => $total_c_tidak_pas_pola,
                        'total_c_bolong' => $total_c_bolong,
                        'total_c_kotor' => $total_c_kotor,
                        'total_c_lain_lain' => $total_c_lain_lain,
                        'total_totalFabric' => $total_totalFabric,
                        'total_totalCutting' => $total_totalCutting,
                        'total_grandTotal' => $total_grandTotal,
                        'percentage_total_f_misprint' => $percentage_total_f_misprint,
                        'percentage_total_f_cacat_tenun' => $percentage_total_f_cacat_tenun,
                        'percentage_total_f_bolong' => $percentage_total_f_bolong,
                        'percentage_total_f_kotor' => $percentage_total_f_kotor,
                        'percentage_total_f_lain_lain' => $percentage_total_f_lain_lain,
                        'percentage_total_c_pinggir_kain' => $percentage_total_c_pinggir_kain,
                        'percentage_total_c_tidak_pas_pola' => $percentage_total_c_tidak_pas_pola,
                        'percentage_total_c_bolong' => $percentage_total_c_bolong,
                        'percentage_total_c_kotor' => $percentage_total_c_kotor,
                        'percentage_total_c_lain_lain' => $percentage_total_c_lain_lain,
                        'percentage_total_totalFabric' => $percentage_total_totalFabric,
                        'percentage_total_totalCutting' => $percentage_total_totalCutting,
                        'percentage_total_grandTotal' => $percentage_total_grandTotal,
                    ];
            }
            
        return $finalTotal;
    }
     public function monthlyFinal($report)
    {
         
            $percobaan = collect($report)->groupby('bulan');
          $monthlyFinal = [];
            foreach ($percobaan as $key => $value) {
            $qty_check = collect($value)->sum('qty_check');
            $total_f_misprint = collect($value)->sum('f_misprint');
            $total_f_cacat_tenun = collect($value)->sum('f_cacat_tenun');
            $total_f_bolong = collect($value)->sum('f_bolong');
            $total_f_kotor = collect($value)->sum('f_kotor');
            $total_f_lain_lain = collect($value)->sum('f_lain_lain');
            $total_c_pinggir_kain = collect($value)->sum('c_pinggir_kain');
            $total_c_tidak_pas_pola = collect($value)->sum('c_tidak_pas_pola');
            $total_c_bolong = collect($value)->sum('c_bolong');
            $total_c_kotor = collect($value)->sum('c_kotor');
            $total_c_lain_lain = collect($value)->sum('c_lain_lain');
            $total_totalFabric = $total_f_misprint + $total_f_cacat_tenun+$total_f_bolong +$total_f_kotor +$total_f_lain_lain;
            $total_totalCutting = collect($value)->sum('totalCutting');
            $total_grandTotal = collect($value)->sum('grandTotal');
            
            $percentage_total_f_misprint =   $total_f_misprint/$qty_check*100;
            $percentage_total_f_cacat_tenun =   $total_f_cacat_tenun/$qty_check*100;
            $percentage_total_f_bolong =   $total_f_bolong/$qty_check*100;
            $percentage_total_f_kotor =   $total_f_kotor/$qty_check*100;
            $percentage_total_f_lain_lain =   $total_f_lain_lain/$qty_check*100;
            $percentage_total_c_pinggir_kain =   $total_c_pinggir_kain/$qty_check*100;
            $percentage_total_c_tidak_pas_pola =   $total_c_tidak_pas_pola/$qty_check*100;
            $percentage_total_c_bolong =   $total_c_bolong/$qty_check*100;
            $percentage_total_c_kotor =   $total_c_kotor/$qty_check*100;
            $percentage_total_c_lain_lain =   $total_c_lain_lain/$qty_check*100;
            $percentage_total_totalFabric =   $total_totalFabric/$qty_check*100;
            $percentage_total_totalCutting =   $total_totalCutting/$qty_check*100;
            $percentage_total_grandTotal =   $total_grandTotal/$qty_check*100;

            $finalTotal[] = [
                        'qty_check' => $qty_check,
                        'total_f_misprint' => $total_f_misprint,
                        'total_f_bolong' => $total_f_bolong,
                        'total_f_cacat_tenun' => $total_f_cacat_tenun,
                        'total_f_kotor' => $total_f_kotor,
                        'total_f_lain_lain' => $total_f_lain_lain,
                        'total_c_pinggir_kain' => $total_c_pinggir_kain,
                        'total_c_tidak_pas_pola' => $total_c_tidak_pas_pola,
                        'total_c_bolong' => $total_c_bolong,
                        'total_c_kotor' => $total_c_kotor,
                        'total_c_lain_lain' => $total_c_lain_lain,
                        'total_totalFabric' => $total_totalFabric,
                        'total_totalCutting' => $total_totalCutting,
                        'total_grandTotal' => $total_grandTotal,
                        'percentage_total_f_misprint' => $percentage_total_f_misprint,
                        'percentage_total_f_cacat_tenun' => $percentage_total_f_cacat_tenun,
                        'percentage_total_f_bolong' => $percentage_total_f_bolong,
                        'percentage_total_f_kotor' => $percentage_total_f_kotor,
                        'percentage_total_f_lain_lain' => $percentage_total_f_lain_lain,
                        'percentage_total_c_pinggir_kain' => $percentage_total_c_pinggir_kain,
                        'percentage_total_c_tidak_pas_pola' => $percentage_total_c_tidak_pas_pola,
                        'percentage_total_c_bolong' => $percentage_total_c_bolong,
                        'percentage_total_c_kotor' => $percentage_total_c_kotor,
                        'percentage_total_c_lain_lain' => $percentage_total_c_lain_lain,
                        'percentage_total_totalFabric' => $percentage_total_totalFabric,
                        'percentage_total_totalCutting' => $percentage_total_totalCutting,
                        'percentage_total_grandTotal' => $percentage_total_grandTotal,
                    ];
            }
            // dd($finalTotal);
        return $finalTotal;
    }

    public function tahun_report($reportAnual)
    {
        $tahun_report=[];
            foreach ($reportAnual as $key => $value) {

                if($value['tanggal']=='01'){
                    $bulan='JANUARI';
                }
                elseif($value['tanggal']=='02'){
                    $bulan='FEBRUARI';
                } elseif($value['tanggal']=='03'){
                    $bulan='MARET';
                
                } elseif($value['tanggal']=='04'){
                    $bulan='APRIL';
                }
                    elseif($value['tanggal']=='05'){
                    $bulan='MEI';
                }
                    elseif($value['tanggal']=='06'){
                    $bulan='JUNI';
                }
                    elseif($value['tanggal']=='07'){
                    $bulan='JULI';
                }
                    elseif($value['tanggal']=='08'){
                    $bulan='AGUSTUS';
                }
                elseif($value['tanggal']=='09'){
                    $bulan='SEPTEMBER';
                }
                elseif($value['tanggal']=='10'){
                    $bulan='OKTOBER';
                }
                elseif($value['tanggal']=='11'){
                    $bulan='NOVEMBER';
                }
                elseif($value['tanggal']=='12'){
                    $bulan='DESEMBER';
                }
                
                $tahun_report[]=[
                            'tanggal'=>$bulan,
                            'qty_check' => $value['qty_check'],
                            'f_misprint' => $value['f_misprint'],
                            'f_bolong' => $value['f_bolong'],
                            'f_cacat_tenun' => $value['f_cacat_tenun'],
                            'f_kotor' => $value['f_kotor'],
                            'f_lain_lain' => $value['f_lain_lain'],
                            'c_pinggir_kain' => $value['c_pinggir_kain'],
                            'c_tidak_pas_pola' => $value['c_tidak_pas_pola'],
                            'c_bolong' => $value['c_bolong'],
                            'c_kotor' => $value['c_kotor'],
                            'c_lain_lain' => $value['c_lain_lain'],
                            'totalFabric' => $value['totalFabric'],
                            'totalCutting' => $value['totalCutting'],
                            'grandTotal' => $value['grandTotal'],
                            'percentage_f_misprint' => $value['percentage_f_misprint'],
                            'percentage_f_bolong' => $value['percentage_f_bolong'],
                            'percentage_f_cacat_tenun' => $value['percentage_f_cacat_tenun'],
                            'percentage_f_kotor' => $value['percentage_f_kotor'],
                            'percentage_f_lain_lain' => $value['percentage_f_lain_lain'],
                            'percentage_c_pinggir_kain' => $value['percentage_c_pinggir_kain'],
                            'percentage_c_tidak_pas_pola' => $value['percentage_c_tidak_pas_pola'],
                            'percentage_c_bolong' => $value['percentage_c_bolong'],
                            'percentage_c_kotor' => $value['percentage_c_kotor'],
                            'percentage_c_lain_lain' => $value['percentage_c_lain_lain'],
                            'percentage_totalFabric' => $value['percentage_totalFabric'],
                            'percentage_totalCutting' => $value['percentage_totalCutting'],
                            'percentage_grandTotal' => $value['percentage_grandTotal'],
                ];
                }
        return $tahun_report;
    }
}
