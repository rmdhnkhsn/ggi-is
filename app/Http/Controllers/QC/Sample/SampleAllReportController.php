<?php

namespace App\Http\Controllers\QC\Sample;

use PDF;
use App\Branch;
use Carbon\Carbon;
use App\Services\bulan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\Sample\SampleReport;
use App\GetData\QC\Sample\report_sample;
use App\Services\QC\Sample\report_bulanan;
use App\Services\QC\Sample\report_tahunan;
use App\GetData\Rework\Report\Bulanan\kodebulan;

class SampleAllReportController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function monthly()
    {
        $dataBranch = Branch::all();
        $page = 'report';
        return view('qc.sample.report.monthly.index', compact('dataBranch','page'));
    }

    public function monthly_post(Request $request)
    {
        // untuk filter branch
        // data pokok
        $dataBranch = Branch::findorfail($request->branch);
        // dd($dataBranch);
        $bulan = $request->bulan;
        $kodeBulan = (new kodebulan)->bulan($bulan);
        $FirstDate = (new kodebulan)->tanggal_awal($bulan);
        $LastDate = (new kodebulan)->tanggal_akhir($bulan);
        if(
            SampleReport::where('date', '>=' , $FirstDate)
                        ->where('date', '<=' , $LastDate)
                        ->where('branch', $dataBranch->kode_branch)
                        ->where('branchdetail', $dataBranch->branchdetail)
                        ->count()
        ) {
        
        // data pokok 
        $datautama = (new report_sample)->bulan_utama($dataBranch, $FirstDate, $LastDate);
        // dd($datautama);
        // data hitungan = pass, fail, total
        $hitungan = (new report_bulanan)->hitungan($datautama);
        // dd($hitungan);
        // untuk total
        $dataTotal = (new report_bulanan)->total($hitungan);
        // dd($dataTotal);
        $page = 'report';
        return view('qc.sample.report.monthly.data', compact('dataBranch', 'hitungan', 'dataTotal','kodeBulan', 'bulan','page'));

        }else{
            return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }
    }

    public function monthly_pdf(Request $request)
    {
        // inisialisasi awal 
        $dataBranch = Branch::findorfail($request->branch);
        $bulan = $request->bulan;
        $kodeBulan = (new kodebulan)->bulan($bulan);
        $FirstDate = (new kodebulan)->tanggal_awal($bulan);
        $LastDate = (new kodebulan)->tanggal_akhir($bulan);

        // data pokok 
        $datautama = (new report_sample)->bulan_utama($dataBranch, $FirstDate, $LastDate);
        // dd($datautama);
        // data hitungan = pass, fail, total
        $hitungan = (new report_bulanan)->hitungan($datautama);
        // dd($hitungan);
        // untuk total
        $dataTotal = (new report_bulanan)->total($hitungan);
        // dd($dataTotal);

        $pdf = PDF::loadview('qc.sample.report.monthly.pdf', compact('dataBranch', 'hitungan', 'dataTotal','kodeBulan', 'bulan'))->setPaper('legal', 'landscape');
        return $pdf->stream("MONTHLY_SAMPLE_CHECKING_".$kodeBulan.".pdf");
    }

    public function annual()
    {
        $dataBranch = Branch::all();
        $page = 'report';
        return view('qc.sample.report.annual.index', compact('dataBranch','page'));
    }

    public function annual_post(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $tahun = $request->tahun;
        $listBulan = (new bulan)->list($tahun);
        // Inisialisasi untuk menentukan tanggal awal dan tanggal akhir tiap bulan 
        $dataBulan = (new bulan)->awalakhir($listBulan);
        // dd($dataBulan);
        // untuk rincian data tiap bulan 
        $reportTahunan = (new report_tahunan)->datapokok($dataBranch, $dataBulan);
        // dd($reportTahunan);
        $dataTotal = (new report_tahunan)->datatotal($reportTahunan);
        // dd($dataTotal);

        $page = 'report';
        return view('qc.sample.report.annual.data', compact('dataBranch', 'tahun','reportTahunan','dataTotal','page'));
    }

    public function annual_pdf(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $tahun = $request->tahun;
        $listBulan = (new bulan)->list($tahun);
        // Inisialisasi untuk menentukan tanggal awal dan tanggal akhir tiap bulan 
        $dataBulan = (new bulan)->awalakhir($listBulan);
        // dd($dataBulan);
        // untuk rincian data tiap bulan 
        $reportTahunan = (new report_tahunan)->datapokok($dataBranch, $dataBulan);
        // dd($reportTahunan);
        $dataTotal = (new report_tahunan)->datatotal($reportTahunan);
        // dd($dataTotal);

        $pdf = PDF::loadview('qc.sample.report.annual.pdf', compact('dataBranch', 'tahun','reportTahunan','dataTotal'))->setPaper('legal', 'landscape');
        return $pdf->stream("ANNUAL REPORT_QC_SAMPLE_".$tahun.".pdf");
    }

}
