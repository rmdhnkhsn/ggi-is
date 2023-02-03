<?php

namespace App\Http\Controllers\QC\Inspection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inspection;
use App\ListBuyer;
use App\Branch;
use App\defectMenu;
use App\defectSubMenu;
use App\finalHeader;
use App\finalSubHeader;
use App\finalInspection;
use App\FinalInspectionDefect; 
use App\finalInspectionView;
use PDF;
use Carbon\Carbon;
use App\Services\bulan;
use App\Services\inspection\inspection1;
use App\GetData\QC\inspection\bulananInspection;
use App\Services\Rework\Report\tahunan;
use App\GetData\Rework\Report\Harian\harian;
use App\GetData\Rework\Report\Bulanan\bulanan;
use App\GetData\Rework\Report\Bulanan\kodebulan;

class InspectionReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function bulanan(Request $request, Inspection $inspection)
    {
        $page = 'report';
        $sub_page = 'monthly';
         $dataBranch = Branch::all();

        return view('qc.final-inspection.report.bulanan', compact('dataBranch','page','sub_page'));
    }
    public function tahunan(Request $request, Inspection $inspection)
    {
        $page = 'report';
        $sub_page = 'yearly';
        $dataBranch = Branch::all();

        return view('qc.final-inspection.report.tahunan', compact('dataBranch','page','sub_page'));
    }
    public function tahunanAll(Request $request, Inspection $inspection)
    {
        $page = 'report';
        $sub_page = 'monthly';
        $dataBranch = Branch::all();

        return view('qc.final-inspection.report.tahunanAll', compact('dataBranch','page','sub_page'));
    }
    public function dailyUpdate(Request $request, Inspection $inspection)
    {
        $page = 'report';
        $sub_page = 'monthly';
        $dataBranch = Branch::all();

        return view('qc.final-inspection.report.dailyUpdate', compact('dataBranch','page','sub_page'));
    }

    public function monthly(Request $request)
    {
        $page = 'report';
        $dataBranch = Branch::findorfail($request->branch);
        $bulan = $request->bulan;
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);


        $finalInspections = finalInspectionView::where('branchdetail', $dataBranch->branchdetail)
                            ->where('start_inspector','>=', $tanggal_awal)->where('start_inspector','<=', $tanggal_akhir)
                            ->get();
                        // dd($finalInspections);
        $test = collect($finalInspections)->groupBy('start_inspector');
            // dd($test);

        if(
                finalInspectionView::where('start_inspector','>=', $tanggal_awal)->where('start_inspector','<=', $tanggal_akhir)->where('branchdetail',$dataBranch->branchdetail)->count()
        ) {
            $coba = [];
            foreach ($test as $key => $value) {
                foreach ($value as $key2 => $value2) {

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
                        'remark' => $value2['remark']
                    ];
                }
            }

            $testing = collect ($coba)->groupBy('buyer')->sortBy('buyer');
            // dd($testing);
            $hasil = [];
            foreach ($testing as $key => $value) {
                // dd($value);
                // dd($pass);
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
                        'remark' => $value2['remark']
                    ];
                }
            }
            // dd($hasil);
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
                        'tanggal' => $value2['tanggal'],
                        'pass' => $value2['pass'],
                        'fail' => $value2['fail'],
                        'total' => $value2['total'],
                        'remark' => $value2['remark']
                    ];
                }  
            }
            $reportInspection = collect($report)->sortBy('tanggal');
            $passResult = collect($reportInspection)->sum('pass');
            $failResult = collect($reportInspection)->sum('fail');
            $total = collect($reportInspection)->sum('total');
            if ($total == 0) {
                $perFail = 0;
            }else{
                $perFail = round($failResult/$total*100,2);
            }
                $reportBulanan= $reportInspection->sortBy('tanggal')->groupby('tanggal');
           
            return view('qc.final-inspection.report.monthly', compact('finalInspections','dataBulan','dataBranch', 'page','reportBulanan','passResult', 'total','bulan','failResult', 'perFail'));
            }else{
                return back()->with("NValid", 'Data Kosong !');
                }
    }
    public function monthly_pdf_abc(Request $request)
    {
        $page = 'report';
        $dataBranch = Branch::findorfail($request->branch);
        $bulan = $request->bulan;
        // dd($bulan);
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);


        $finalInspections = finalInspectionView::where('branchdetail', $dataBranch->branchdetail)
                            ->where('start_inspector','>=', $tanggal_awal)->where('start_inspector','<=', $tanggal_akhir)
                            ->get();
                        // dd($finalInspections);
        $test = collect($finalInspections)->groupBy('start_inspector');
            // dd($test);
            $coba = [];
            foreach ($test as $key => $value) {
                foreach ($value as $key2 => $value2) {

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
                        'remark' => $value2['remark']
                    ];
                }
            }

            $testing = collect ($coba)->groupBy('buyer')->sortBy('buyer');
            // dd($testing);
            $hasil = [];
            foreach ($testing as $key => $value) {
                // dd($value);
                // dd($pass);
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
                        'remark' => $value2['remark']
                    ];
                }
            }
            // dd($hasil);
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
                        'tanggal' => $value2['tanggal'],
                        'pass' => $value2['pass'],
                        'fail' => $value2['fail'],
                        'total' => $value2['total'],
                        'remark' => $value2['remark']
                    ];
                }  
            }
            $reportInspection = collect($report)->sortBy('tanggal');
            $passResult = collect($reportInspection)->sum('pass');
            $failResult = collect($reportInspection)->sum('fail');
            $total = collect($reportInspection)->sum('total');
            if ($total == 0) {
                $perFail = 0;
            }else{
                $perFail = round($failResult/$total*100,2);
            }
                $reportBulanan= $reportInspection->sortBy('tanggal')->groupby('tanggal');
            // dd($total);
            // dd($failResult);
            // dd($teuing2);
            $pdf = PDF::loadview('qc.final-inspection.report.monthly_pdf', compact('finalInspections','dataBulan','dataBranch', 'page','reportBulanan','passResult', 'total','failResult', 'perFail','bulan'))->setPaper('legal', 'landscape');
            return $pdf->stream("MONTHLY_REPORT_QC_FINAL_INSPECTION_".$dataBulan.".pdf");
           
    }

    public function yearly(Request $request)
    {
        $page = 'report';

        $dataBranch = Branch::findorfail($request->branch);
        $tahun = $request->tahun;
        
        if(
            $finalInspections =  finalInspectionView::whereyear('start_inspector',$tahun)->where('branchdetail', $dataBranch->branchdetail)->count()
        ) {
        // $listBulan = (new bulan)->list($tahun);
        $listBulan = (new bulan)->list($tahun);
        // dd($listBulan);
        // Inisialisasi untuk menentukan tanggal awal dan tanggal akhir tiap bulan 
        $dataBulan = (new bulan)->awalakhir($listBulan);
        // dd($dataBulan);
        $test= (new inspection1)->reportInspection($dataBranch, $tahun, $listBulan);
        //data uatama 
        $coba= (new inspection1)->data_master($test);
        //grup by
        $reportTahunan= (new inspection1)->bybuyer($coba);
        // dd($reportTahunan);
        $report= (new inspection1)->tahun_report($reportTahunan);
        // dd($report);
         $reportTotal = collect($report);
         $finalReport= $reportTotal->sortBy('kode_bulan')->groupBy('bulan');
                        
        //  dd($finalReport);
        $passResult = collect($reportTahunan)->sum('pass');
        $failResult = collect($reportTahunan)->sum('fail');
        $total = collect($reportTahunan)->sum('total');
        if ($total == 0) {
            $perFail = 0;
        }else{
            $perFail = round($failResult/$total*100,2);
        }

           return view('qc.final-inspection.report.yearly', compact('dataBranch','tahun','reportTahunan','passResult','failResult','total','perFail', 'page','finalReport'));
            }else{
                return back()->with("NValid", 'Data Kosong !');
                }
       
        }
    public function yearly_pdf_abc(Request $request)
    {
        $page = 'report';

        $dataBranch = Branch::findorfail($request->branch);
        $tahun = $request->tahun;
      
        $listBulan = (new bulan)->list($tahun);
        // dd($listBulan);
        // Inisialisasi untuk menentukan tanggal awal dan tanggal akhir tiap bulan 
        $dataBulan = (new bulan)->awalakhir($listBulan);
        // dd($dataBulan);
        $test= (new inspection1)->reportInspection($dataBranch, $tahun, $listBulan);
        $coba= (new inspection1)->data_master($test);
        $reportTahunan= (new inspection1)->bybuyer($coba);
        $report= (new inspection1)->tahun_report($reportTahunan);
        //  dd($report);
         $reportTotal = collect($report);
         $finalReport= $reportTotal->sortBy('kode_bulan')->groupBy('bulan');
                        
        //  dd($finalReport);
        $passResult = collect($reportTahunan)->sum('pass');
        $failResult = collect($reportTahunan)->sum('fail');
        $total = collect($reportTahunan)->sum('total');
        if ($total == 0) {
            $perFail = 0;
        }else{
            $perFail = round($failResult/$total*100,2);
        }
        // return view('qc.final-inspection.report.yearly', compact('dataBranch','tahun','reportTahunan','passResult','failResult','total','perFail', 'page','finalReport'));

           $pdf = PDF::loadview('qc.final-inspection.report.yearly_pdf',compact('dataBranch','tahun','reportTahunan','passResult','failResult','total','perFail','finalReport'))->setPaper('legal', 'landscape');
            return $pdf->download("YEARLYLY_REPORT_QC_FINAL_INSPECTION_".$tahun.".pdf");
        }

    public function yearlyAllFacility(Request $request)
    {
        $page = 'report';

        $tahun = $request->tahun;
        // dd($tahun);
        $test= (new inspection1)->reportAnuall($tahun);
        $coba= (new inspection1)->data_master($test);
        //  dd($coba);
       if(
            $finalInspections =  finalInspectionView::whereyear('start_inspector',$tahun)->count()
        ) {
            
            $reportInspection= (new inspection1)->yearlyAllFacility($coba);
            $namaBranch= (new inspection1)->nama_branch($reportInspection);
            
            // dd($report);
            $passResult = collect($namaBranch)->sum('pass');
            $failResult = collect($namaBranch)->sum('fail');
            $total = collect($namaBranch)->sum('total');
            if ($total == 0) {
                $perFail = 0;
            }else{
                $perFail = round($failResult/$total*100,2);
            }
            $report= (new inspection1)->tahun_report($namaBranch);
            $x = collect($report);
            $z= $x->sortBy('kode_bulan')->groupby('bulan');
            
    
           return view('qc.final-inspection.report.yearlyAllFacility', compact('tahun','z','passResult','failResult','total','perFail', 'page','z'));
       }else{
            return back()->with("NValid", 'Data Kosong !');
            }
    }
    public function yearlyAll_pdf_abc(Request $request)
    {
        $page = 'report';

       $tahun = $request->tahun;
        // dd($tahun);
        $test= (new inspection1)->reportAnuall($tahun);
        $coba= (new inspection1)->data_master($test);
        //  dd($coba);
        $reportInspection= (new inspection1)->yearlyAllFacility($coba);
        $namaBranch= (new inspection1)->nama_branch($reportInspection);
        
        // dd($report);
        $passResult = collect($namaBranch)->sum('pass');
        $failResult = collect($namaBranch)->sum('fail');
        $total = collect($namaBranch)->sum('total');
        if ($total == 0) {
            $perFail = 0;
        }else{
            $perFail = round($failResult/$total*100,2);
        }
        $report= (new inspection1)->tahun_report($namaBranch);
        $x = collect($report);
        $z= $x->sortBy('kode_bulan')->groupby('bulan');
    
            $pdf = PDF::loadview('qc.final-inspection.report.yearlyAllFacility_pdf', compact('tahun','passResult','failResult','total','perFail', 'page','z'))->setPaper('legal', 'landscape');
            return $pdf->stream("YEARLYLY_REPORT_QC_FINAL_INSPECTION_ALL_".$tahun.".pdf");
    }
    public function updateAll(Request $request)
    {
        $page = 'report';
        $tanggal = $request->tanggal;
        // dd($test);
         $finalInspections =  finalInspectionView::where('start_inspector',$tanggal)->get();
        $test = collect($finalInspections)->groupBy('branchdetail');
        if(
            $finalInspections =  finalInspectionView::where('start_inspector',$tanggal)->count()
            ) {
               
            $reportInspection= (new inspection1)->updateAll($test);
            $namaBranch= (new inspection1)->nama_branch($reportInspection);

            $passResult = collect($namaBranch)->sum('pass');
            $failResult = collect($namaBranch)->sum('fail');
            $total = collect($namaBranch)->sum('total');
            if ($total == 0) {
                $perFail = 0;
            }else{
                $perFail = round($failResult/$total*100,2);
            }
            // dd($namaBranch);
            $x = collect($namaBranch);
            $z= $x->sortBy('kode_bulan')->groupby('kode_bulan');
            
           return view('qc.final-inspection.report.updateAll', compact('tanggal','z','passResult','failResult','total','perFail', 'page')); 
        }else{
            return back()->with("NValid", 'Data Kosong !');
            }
    }
   
}
