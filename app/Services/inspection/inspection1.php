<?php

namespace App\Services\inspection;
use App\Branch;
use App\finalInspection;
use App\finalInspectionView;

class inspection1{
    public function Qty ($inspection)
    {
        if(($inspection->F4801_UORG>='2') AND ($inspection->F4801_UORG<='8')){
            $unit='2';
            $unit2='2';
            $actualReject='0/1';
            $method='TIGHTENED';
            $method2='NORMAL';
            $actualReject2='0/1';
            $actualReject3='0/1';
            $level='II';
            $level1='I';
            $aql='2.5';
            $aql2='4.0';
        }
        elseif(($inspection->F4801_UORG>='9') AND ($inspection->F4801_UORG<='15')){
            $unit='3';
            $unit2='2';
            $actualReject='0/1';
            $method='TIGHTENED';
            $method2='NORMAL';
            $actualReject2='0/1';
            $actualReject3='0/1';
            $level='II';
            $level1='I';
            $aql='2.5';
            $aql2='4.0';
        }
        elseif(($inspection->F4801_UORG>='16') AND ($inspection->F4801_UORG<='25')){
            $unit='5';
            $unit2='3';
            $actualReject='0/1';
            $method='TIGHTENED';
            $method2='NORMAL';
            $actualReject2='0/1';
            $actualReject3='0/1';
            $level='II';
            $level1='I';
            $aql='2.5';
            $aql2='4.0';
        }
        elseif(($inspection->F4801_UORG>='26') AND ($inspection->F4801_UORG<='50')){
            $unit='8';
            $unit2='5';
            $actualReject='0/1';
            $method='TIGHTENED';
            $method2='NORMAL';
            $actualReject2='0/1';
            $actualReject3='1/2';
            $level='II';
            $level1='I';
            $aql='2.5';
            $aql2='4.0';
        }
        elseif(($inspection->F4801_UORG>='51') AND ($inspection->F4801_UORG<='90')){
            $unit='13';
            $unit2='5';
            $actualReject='1/2';
            $method='TIGHTENED';
            $method2='NORMAL';
            $actualReject2='1/2';
            $actualReject3='1/2';
            $level='II';
            $level1='I';
            $aql='2.5';
            $aql2='4.0';
        }
        elseif(($inspection->F4801_UORG>='91') AND ($inspection->F4801_UORG<='150')){
            $unit='20';
            $unit2='8';
            $actualReject='1/2';
            $method='TIGHTENED';
            $method2='NORMAL';
            $actualReject2='1/2';
            $actualReject3='2/3';
            $level='II';
            $level1='I';
            $aql='2.5';
            $aql2='4.0';
        }
        elseif(($inspection->F4801_UORG>='151') AND ($inspection->F4801_UORG<='280')){
            $unit='32';
            $unit2='13';
            $actualReject='1/2';
            $method='TIGHTENED';
            $method2='NORMAL';
            $actualReject2='2/3';
            $actualReject3='3/4';
            $level='II';
            $level1='I';
            $aql='2.5';
            $aql2='4.0';
        }
        elseif(($inspection->F4801_UORG>='281') AND ($inspection->F4801_UORG<='500')){
            $unit='50';
            $unit2='20';
            $actualReject='2/3';
            $method='TIGHTENED';
            $method2='NORMAL';
            $actualReject2='3/4';
            $actualReject3='5/6';
            $level='II';
            $level1='I';
            $aql='2.5';
            $aql2='4.0';
        }
        elseif(($inspection->F4801_UORG>='501') AND ($inspection->F4801_UORG<='1200')){
            $unit='80';
            $unit2='32';
            $actualReject='3/4';
            $method='TIGHTENED';
            $method2='NORMAL';
            $actualReject2='5/6';
            $actualReject3='7/8';
            $level='II';
            $level1='I';
            $aql='2.5';
            $aql2='4.0';
        }
        elseif(($inspection->F4801_UORG>='1201') AND ($inspection->F4801_UORG<='3200')){
            $unit='125';
            $unit2='50';
            $actualReject='5/6';
            $method='TIGHTENED';
            $method2='NORMAL';
            $actualReject2='7/8';
            $actualReject3='10/11';
            $level='II';
            $level1='I';
            $aql='2.5';
            $aql2='4.0';
        }
        elseif(($inspection->F4801_UORG>='3201') AND ($inspection->F4801_UORG<='10000')){
            $unit='200';
            $unit2='80';
            $actualReject='8/9';
            $method='TIGHTENED';
            $method2='NORMAL';
            $actualReject2='10/11';
            $actualReject3='14/15';
            $level='II';
            $level1='I';
            $aql='2.5';
            $aql2='4.0';
        }
        elseif(($inspection->F4801_UORG>='10001') AND ($inspection->F4801_UORG<='35000')){
            $unit='315';
            $unit2='125';
            $actualReject='12/13';
            $method='TIGHTENED';
            $method2='NORMAL';
            $actualReject2='14/15';
            $actualReject3='21/22';
            $level='II';
            $level1='I';
            $aql='2.5';
            $aql2='4.0';
        }
        elseif(($inspection->F4801_UORG>='35001') AND ($inspection->F4801_UORG<='150000')){
            $unit='500';
            $actualReject='18/15';
            $method='TIGHTENED';
            $method2='NORMAL';
            $actualReject2='21/22';
            $actualReject3='21/22';
            $level='II';
            $level1='I';
            $aql='2.5';
            $aql2='4.0';
        }
        elseif(($inspection->F4801_UORG>='150001') AND ($inspection->F4801_UORG<='500000')){
            $unit='800';
            $actualReject='18/19';
            $method='TIGHTENED';
            $level='II';
            $aql='2.5';
            $aql2='4.0';
        }
        else{
            $unit=' not a sample size ';
            $unit2=' not a sample size ';
            $actualReject='0';
            $method=' ';
            $level=' ';
            $level1=' ';
            $aql=' ';
            $method2=' ';
            $actualReject2='0';
            $actualReject3='0';
        }
        $status = [
            'sample' => $unit,
            'sample2' => $unit2,
            'actual' => $actualReject,
            'actual2' => $actualReject2,
            'actual3' => $actualReject3,
            'method' => $method,
            'method2' =>$method2,
            'level' => $level,
            'level1' => $level1,
            'aql' => $aql,
        ];

        // dd($status);
        return $status;
    }


public function hasil_final()
{
    $data=finalInspection::all();
    $final=[];
    foreach ($data as $key =>$value)
        if(($value->hasil_validate== 'PASS') AND ($value->hasil_defect== 'PASS') AND ($value->measurement== 'PASS'))
        {
            $remark='PASS';
           
        } 
         elseif(($value->hasil_validate== 'PASS') AND ($value->hasil_defect== NULL) AND ($value->measurement== 'PASS'))
        {
            $remark='PASS';  

        } elseif(($value->hasil_validate== 'PASS') AND ($value->hasil_defect== NULL) AND ($value->measurement== 'FAIL'))
        {
            $remark='FAIL';  
            
        }
         elseif(($value->hasil_validate== 'FAIL') AND ($value->hasil_defect== NULL) AND ($value->measurement== 'PASS'))
        {
            $remark='FAIL';  
            
        }
        elseif(($value->hasil_validate== 'FAIL') AND ($value->hasil_defect== 'FAIL') AND ($value->measurement== 'FAIL'))
        {
            $remark='FAIL';  
        } elseif(($value->hasil_validate== 'FAIL') AND ($value->hasil_defect== 'PASS') AND ($value->measurement== 'PASS'))
        {
            $remark='FAIL';  
        } elseif(($value->hasil_validate== 'PASS') AND ($value->hasil_defect== 'FAIL') AND ($value->measurement== 'PASS'))
        {
            $remark='FAIL';  
        } elseif(($value->hasil_validate== 'PASS') AND ($value->hasil_defect== 'PASS') AND ($value->measurement== 'FAIL'))
        {
            $remark='FAIL';  
        } elseif(($value->hasil_validate== 'FAIL') AND ($value->hasil_defect== 'FAIL') AND ($value->measurement== 'PASS'))
        {
            $remark='FAIL';  
        } elseif(($value->hasil_validate== 'PASS') AND ($value->hasil_defect== 'FAIL') AND ($value->measurement== 'FAIL'))
        {
            $remark='FAIL';  
        } elseif(($value->hasil_validate== 'FAIL') AND ($value->hasil_defect== 'PASS') AND ($value->measurement== 'FAIL'))
        {
            $remark='FAIL';  
        }
        else
        {
            $remark='';  
        }
        $final=[
            	't_v4801c_doco' => $value->t_v4801c_doco,
            	'hasil_validate' => $value->hasil_validate,
            	'hasil_defect' => $value->hasil_defect,
            	'measurement' => $value->measurement,
                'remark'        =>$remark,
        ];
        // dd($final);
    return $final;
}


public function reportInspection ($dataBranch, $tahun, $listBulan)
{
    //    dd($listBulan);
    $finalInspections =  finalInspectionView::where('branch', $dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)->whereyear('start_inspector',$tahun)->orderBy('start_inspector', 'desc')
            ->get();
    // dd($finalInspections);
            // $test = collect($finalInspections)->groupBy('start_inspector');
            $test = collect($finalInspections)->groupBy(function($item){
                return \Carbon\Carbon::parse($item->start_inspector)->format('m');
                });
                // dd($test);
    return $test;
                
}
public function reportAnuall ($tahun)
{
    //    dd($listBulan);
    $finalInspections =  finalInspectionView::whereyear('start_inspector',$tahun)
            ->get();
    // dd($finalInspections);
            // $test = collect($finalInspections)->groupBy('start_inspector');
            $test = collect($finalInspections)->groupBy(function($item){
                return \Carbon\Carbon::parse($item->start_inspector)->format('m');
                });
        // dd($test);
    return $test;
                
}
public function dailyReport ($tanggal)
{
    //    dd($listBulan);
    $finalInspections =  finalInspectionView::where('start_inspector',$tanggal)
            ->get();
    // dd($finalInspections);
            $test = collect($finalInspections)->groupBy('start_inspector');
            
    return $test;
                
}
public function data_master($test)
{
    $coba = [];
        foreach ($test as $key => $value) {
            foreach ($value as $key2 => $value2) {
                // dd($value2);

                if ($value2['measurement'] == 'FAIL' || $value2['hasil_validate'] ==  'FAIL' || $value2['hasil_defect'] ==  'FAIL') {
                    $fail = 1;
                    $pass = 0;
                }else{
                    $fail = 0;
                    $pass = 1;
                }
                // Perhitungan 
                $total = $pass + $fail;
                
                $coba[] = [
                    'tanggal' => $key,
                    'buyer' => $value2['F0101_ALPH'],
                    'pass' => $pass,
                    'fail' => $fail,
                    'total' => $total,
                    'remark' => $value2['remark'],
                    'branchdetail'=>$value2['branchdetail']
                ];
            }
        }

        $testing = collect ($coba)->groupBy('buyer')->sortBy('buyer');
        // dd($testing);
        $hasil = [];
        foreach ($testing as $key => $value) {
            $fail = collect($value)->count('fail');
            $total = collect($value)->count('total');
            foreach ($value as $key2 => $value2) {
                // dd($value2);
                $pass = collect($value)->where('tanggal', $value2['tanggal'])->sum('pass');
                $fail = collect($value)->where('tanggal', $value2['tanggal'])->sum('fail');
                $total = collect($value)->where('tanggal', $value2['tanggal'])->sum('total');
                $hasil[] = [
                    'tanggal' => $value2['tanggal'],
                    'buyer' => $key,
                    'pass' => $pass,
                    'fail' => $fail,
                    'total' => $total,
                    'remark' => $value2['remark'],
                    'branchdetail'=>$value2['branchdetail']
                ];
            }
        }
    return $coba;
    }

public function getdatadaily ($tanggal)
{
    //    dd($listBulan);
    $finalInspections =  finalInspectionView::where('start_inspector',$tanggal)
            ->get();
    // dd($finalInspections);
            $test = collect($finalInspections)->groupBy('branchdetail');
            // dd($test);
            
    return $test;
                
}
public function dailyBydate($test)
{
    $coba = [];
        foreach ($test as $key => $value) {
            foreach ($value as $key2 => $value2) {
                // dd($value);

                if ($value2['measurement'] == 'FAIL' || $value2['hasil_validate'] ==  'FAIL' || $value2['hasil_defect'] ==  'FAIL') {
                    $fail = 1;
                    $pass = 0;
                }else{
                    $fail = 0;
                    $pass = 1;
                }
                // Perhitungan 
                $total = $pass + $fail;
                    // dd($value2);
            
                $coba[] = [
                    'tanggal' => $value2['start_inspector'],
                    'buyer' => $value2['F0101_ALPH'],
                    'pass' => $pass,
                    'fail' => $fail,
                    'total' => $total,
                    'remark' => $value2['remark'],
                    'branchdetail'=>$value2['branchdetail']
                ];
            }
        }
        // dd($coba);

    return $coba;
    }
    public function bybuyer($coba)
    {
        $testing = collect ($coba)->groupBy('buyer')->sortBy('buyer');
            // dd($testing);
            $hasil = [];
            foreach ($testing as $key => $value) {
                $fail = collect($value)->count('fail');
                $total = collect($value)->count('total');
                foreach ($value as $key2 => $value2) {
                    // dd($value2);
                    $pass = collect($value)->where('tanggal', $value2['tanggal'])->sum('pass');
                    $fail = collect($value)->where('tanggal', $value2['tanggal'])->sum('fail');
                    $total = collect($value)->where('tanggal', $value2['tanggal'])->sum('total');
                    $hasil[] = [
                        'tanggal' => $value2['tanggal'],
                        'buyer' => $key,
                        'pass' => $pass,
                        'fail' => $fail,
                        'total' => $total,
                        'remark' => $value2['remark'],
                        'branchdetail'=>$value2['branchdetail']
                    ];
                }
            }

            $percobaan = collect($hasil)->groupby('buyer');
            // dd($percobaan);
            $report = [];
            foreach ($percobaan as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('tanggal')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $report[] = [
                        'buyer' => $key,
                        'kode_bulan' => $value2['tanggal'],
                        'pass' => $value2['pass'],
                        'fail' => $value2['fail'],
                        'total' => $value2['total'],
                        'remark' => $value2['remark'],
                        'nama_branch'=>$value2['branchdetail']
                    ];
                }  
            }
            $reportInspection = collect($report)->sortBy('tanggal');
        return $reportInspection;
    }

public function bybranch($coba)
    {
        $testing = collect ($coba)->groupBy('branch')->sortBy('branch');
            // dd($testing);
            $hasil = [];
            foreach ($testing as $key => $value) {
                $fail = collect($value)->count('fail');
                $total = collect($value)->count('total');
                foreach ($value as $key2 => $value2) {
                    // dd($value2);
                    $pass = collect($value)->where('tanggal', $value2['tanggal'])->sum('pass');
                    $fail = collect($value)->where('tanggal', $value2['tanggal'])->sum('fail');
                    $total = collect($value)->where('tanggal', $value2['tanggal'])->sum('total');
            
                    $hasil[] = [
                       
                        'tanggal' => $value2['tanggal'],
                        'buyer' => $value2['buyer'],
                        'pass' => $pass,
                        'fail' => $fail,
                        'total' => $total,
                        'remark' => $value2['remark'],
                        'branchdetail'=>$value2['branchdetail']
                    ];
                }
            }
            $percobaan = collect($hasil)->groupby('branch');
            // dd($percobaan);
            $report = [];
            foreach ($percobaan as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('tanggal')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $report[] = [
                        'buyer' => $value2['buyer'],
                        'tanggal' => $value2['tanggal'],
                        'pass' => $value2['pass'],
                        'fail' => $value2['fail'],
                        'total' => $value2['total'],
                        'remark' => $value2['remark'],
                        'branchdetail'=>$value2['branchdetail']
                    ];
                }  
            }
            $reportInspection = collect($report)->sortBy('branchdetail');
        return $reportInspection;
    }

public function nama_branch($bybranch)
{
    $nama_branch=[];
        foreach ($bybranch as $key => $value) {

               if($value['branchdetail']=='CLN'){
                   $nama_branch='GISTEX CILEUNYI';
               }
               elseif($value['branchdetail']=='GM1'){
                   $nama_branch='GISTEX MAJALENGKA 1';
               }
       
               elseif($value['branchdetail']=='GM2'){
                   $nama_branch='GISTEX MAJALENGKA 2';
               }
               elseif($value['branchdetail']=='GK'){
                   $nama_branch='GISTEX KALIBENDA';
               }
               elseif($value['branchdetail']=='CVC'){
                   $nama_branch='CV CHAWAN';
               }
               elseif($value['branchdetail']=='CNJ2'){
                   $nama_branch='CNJ2';
               }
               elseif($value['branchdetail']=='CVA'){
                   $nama_branch='CV ANUGRAH';
               }
               elseif($value['branchdetail']=='CBA'){
                   $nama_branch='CAHAYA BUSANA ABADI';
               }
               $namaBranch[]=[
                   'kode_bulan'=>$value['tanggal'],
                   'nama_branch'=>$nama_branch,
                   'buyer'=>$value['buyer'],
                   'pass'=>$value['pass'],
                   'fail'=>$value['fail'],
                   'total'=>$value['total'],
                   'remark'=>$value['remark'],
                   'branchdetail'=>$value['branchdetail'],
               ];
            }
            // dd($namaBranch);
    return $namaBranch;

}
public function tahun_report($reportTahunan)
{
    $tahun_report=[];
        foreach ($reportTahunan as $key => $value) {
// dd($value);
               if($value['kode_bulan']=='01'){
                   $bulan='JANUARI';
               }
               elseif($value['kode_bulan']=='02'){
                   $bulan='FEBRUARI';
               } elseif($value['kode_bulan']=='03'){
                   $bulan='MARET';
               
               } elseif($value['kode_bulan']=='04'){
                   $bulan='APRIL';
               }
                elseif($value['kode_bulan']=='05'){
                   $bulan='MEI';
               }
                elseif($value['kode_bulan']=='06'){
                   $bulan='JUNI';
               }
                elseif($value['kode_bulan']=='07'){
                   $bulan='JULI';
               }
                elseif($value['kode_bulan']=='08'){
                   $bulan='AGUSTUS';
               }
              elseif($value['kode_bulan']=='09'){
                   $bulan='SEPTEMBER';
               }
              elseif($value['kode_bulan']=='10'){
                   $bulan='OKTOBER';
               }
              elseif($value['kode_bulan']=='11'){
                   $bulan='NOVEMBER';
               }
              elseif($value['kode_bulan']=='12'){
                   $bulan='DESEMBER';
               }
              
               $tahun_report[]=[
                   'kode_bulan'=>$value['kode_bulan'],
                   'bulan'=>$bulan,
                   'buyer'=>$value['buyer'],
                   'pass'=>$value['pass'],
                   'fail'=>$value['fail'],
                   'total'=>$value['total'],
                   'remark'=>$value['remark'],
                   'branchdetail'=>$value['nama_branch']
               ];
            }
            // dd($tahun_report);
    return $tahun_report;

}

public function yearlyAllFacility ($coba)
{
    //    dd($listBulan);
     $testing = collect ($coba)->groupBy('branchdetail')->sortBy('buyer');
       
            $hasil = [];
            foreach ($testing as $key => $value) {
            
                $fail = collect($value)->count('fail');
                $total = collect($value)->count('total');
                foreach ($value as $key2 => $value2) {
                    $pass = collect($value)->where('tanggal', $value2['tanggal'])->sum('pass');
                    $fail = collect($value)->where('tanggal', $value2['tanggal'])->sum('fail');
                    $total = collect($value)->where('tanggal', $value2['tanggal'])->sum('total');
                    $hasil[] = [
                        'tanggal' => $value2['tanggal'],
                        'buyer' => $key,
                        'pass' => $pass,
                        'fail' => $fail,
                        'total' => $total,
                        'remark' => $value2['remark'],
                        'branchdetail'=>$value2['branchdetail']
                    ];
                }
            }
            $percobaan = collect($hasil)->groupby('buyer');
            $report = [];
            foreach ($percobaan as $key => $value) {
                $TotalResult = collect($value)
                    ->groupBy('tanggal')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $report[] = [
                        'buyer' => $key,
                        'tanggal' => $value2['tanggal'],
                        'pass' => $value2['pass'],
                        'fail' => $value2['fail'],
                        'total' => $value2['total'],
                        'remark' => $value2['remark'],
                         'branchdetail'=>$value2['branchdetail']
                    ];
                }  
            }
            $reportInspection = collect($report)->sortBy('tanggal');

        return $reportInspection;
}
   
public function updateAll($test)
{
    
                $coba = [];
                foreach ($test as $key => $value) {
                    foreach ($value as $key2 => $value2) {
                    // dd($value);

                    if ($value2['measurement'] == 'FAIL' || $value2['hasil_validate'] ==  'FAIL' || $value2['hasil_defect'] ==  'FAIL') {
                        $fail = 1;
                        $pass = 0;
                    }else{
                        $fail = 0;
                        $pass = 1;
                    }
                    // Perhitungan 
                    $total = $pass + $fail;            
                    $coba[] = [
                        'tanggal' => $value2['start_inspector'],
                        'buyer' => $value2['F0101_ALPH'],
                        'pass' => $pass,
                        'fail' => $fail,
                        'total' => $total,
                        'remark' => $value2['remark'],
                        'branchdetail'=>$value2['branchdetail']
                    ];
                }
            }
                $testing = collect ($coba)->groupBy('branchdetail')->sortBy('buyer');
        
                $hasil = [];
                foreach ($testing as $key => $value) {
                
                    $fail = collect($value)->count('fail');
                    $total = collect($value)->count('total');
                    foreach ($value as $key2 => $value2) {
                        $pass = collect($value)->where('tanggal', $value2['tanggal'])->sum('pass');
                        $fail = collect($value)->where('tanggal', $value2['tanggal'])->sum('fail');
                        $total = collect($value)->where('tanggal', $value2['tanggal'])->sum('total');
                        $hasil[] = [
                            'tanggal' => $value2['tanggal'],
                            'buyer' => $key,
                            'pass' => $pass,
                            'fail' => $fail,
                            'total' => $total,
                            'remark' => $value2['remark'],
                            'branchdetail'=>$value2['branchdetail']
                        ];
                    }
                }
                $percobaan = collect($hasil)->groupby('buyer');
                $report = [];
                foreach ($percobaan as $key => $value) {
                    $TotalResult = collect($value)
                        ->groupBy('tanggal')
                        ->map(function ($item) {
                            return array_merge(...$item->toArray());
                        })->values()->toArray();
                    foreach ($TotalResult as $key2 => $value2) {
                        $report[] = [
                            'buyer' => $key,
                            'tanggal' => $value2['tanggal'],
                            'pass' => $value2['pass'],
                            'fail' => $value2['fail'],
                            'total' => $value2['total'],
                            'remark' => $value2['remark'],
                            'branchdetail'=>$value2['branchdetail']
                        ];
                    }  
                }
                $reportInspection = collect($report)->sortBy('tanggal');
                return  $reportInspection;
}

}