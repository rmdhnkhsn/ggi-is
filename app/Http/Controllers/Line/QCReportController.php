<?php

namespace App\Http\Controllers\Line;

use PDF;
use App\Branch;
use App\User;
use DataTables;
use Carbon\Carbon;
use App\LineDetail;
use App\MasterLine;
use App\LineToTarget;
use App\Services\bulan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Exports\WeeklyReportQCRework;
use App\Exports\ReworkWRMail;
use App\Exports\MonthlyReportQCRework;
use App\Services\Rework\Report\tahunan;
use App\GetData\Rework\Report\Harian\harian;
use App\GetData\Rework\Report\Bulanan\bulanan;
use App\GetData\Rework\Report\Bulanan\kodebulan;

class QCReportController extends Controller
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
    
    public function rharian(Request $request)
    {
        $dataBranch = Branch::all();

        $page = 'report';
        return view('qc/rework/report/harian', compact('dataBranch','page'));
    }

    public function harianGet(Request $request)
    {   
        $tanggal = $request->tanggal;
        $dataBranch = Branch::findorfail($request->branch);
        $tanggal_depan = (new Carbon($request->tanggal))->format('d-m-Y');

        if(
            LineDetail::where('tgl_pengerjaan', $tanggal)->count()
        ){
            // data pokok 
            $data =  MasterLine::with('ltarget')
                            ->where('branch', $dataBranch->kode_branch)
                            ->where('branch_detail', $dataBranch->branchdetail)
                            ->get();
            $detail = LineDetail::where('tgl_pengerjaan', $tanggal)->get();
            // dd($detail);
            // data pertama  
            $result = (new harian)->datapertama($dataBranch, $tanggal, $data, $detail);
            // dd($result);
            // data total
            $TotalResult = (new harian)->datatotal($result);
            // dd($TotalResult);

            // total all line 
            $totalSemuaLine = (new harian)->AllLine($TotalResult);
            // dd($totalSemuaLine);
            $page = 'report';
            return view('qc/rework/report/detailHarian', compact('result', 'TotalResult', 'tanggal_depan','tanggal' , 'dataBranch', 'totalSemuaLine','page'));
        }else{
            return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }
    }

    public function harianPDF(Request $request)
    {
        $tanggal = $request->tanggal;
        $dataBranch = Branch::findorfail($request->branch);
        $tanggal_depan = (new Carbon($request->tanggal))->format('d-m-Y');

         // data pokok 
        $data =  MasterLine::with('ltarget')
        ->where('branch', $dataBranch->kode_branch)
        ->where('branch_detail', $dataBranch->branchdetail)
        ->get();
        $detail = LineDetail::where('tgl_pengerjaan', $tanggal)->get();

        // data pertama  
        $result = (new harian)->datapertama($dataBranch, $tanggal, $data, $detail);
        // dd($result);
        // data total
        $TotalResult = (new harian)->datatotal($result);
        // dd($TotalResult);

        // total all line 
        $totalSemuaLine = (new harian)->AllLine($TotalResult);

        $pdf = PDF::loadview('qc/rework/report/harian_pdf', compact('tanggal_depan', 'result', 'TotalResult', 'tanggal' , 'dataBranch', 'totalSemuaLine'))->setPaper('legal', 'landscape');
        return $pdf->stream("Daily_Report_QC_Rework_".$tanggal.".pdf");
    }
    
    public function rmingguan()
    {
        $dataBranch = Branch::all();

        $page = 'weekly';
        return view('qc/rework/report/mingguan', compact('dataBranch','page'));
    }
    
    public function mingguan_get(Request $request)
    {
        // dd($request->all());
        $dataBranch = Branch::findorfail($request->branch);
        $FirstDate = $request->FirstDate;
        $LastDate = $request->LastDate;
        // dd($FirstDate);

        if(
            LineDetail::where('tgl_pengerjaan', '>=' , $FirstDate)->where('tgl_pengerjaan', '<=' , $LastDate)->count()
        ) {
            // untuk mendapat data pertama 
            $data =  MasterLine::with('ltarget')
                    ->where('branch', $dataBranch->kode_branch)
                    ->where('branch_detail', $dataBranch->branchdetail)
                    ->get();
            $detail = LineDetail::where('tgl_pengerjaan', '>=' , $FirstDate)->where('tgl_pengerjaan', '<=' , $LastDate)->get();
            // dd($detail);
            // data result 
            $dataResult = (new bulanan)->dataresult($data, $detail, $FirstDate, $LastDate);
            // dd($dataResult);
            $datafoto = collect($dataResult)->where('file', '!=', null)->toArray();
            $top3 = array_reverse(array_slice($datafoto, 0, 3));
            
            // data datafoto 
            $TotalResult = (new bulanan)->datapertama($dataResult);
            // dd($TotalResult);

            // data total 
            $totalLine = (new bulanan)->datatotal($TotalResult);
            // dd($TotalAllLine);

            // biar remark nya kebawa semua 
            $dataRemark = (new bulanan)->dataremark($dataResult);
            // dd($dataRemark);

            $page = 'report';
            return view('qc/rework/report/rmingguan', compact('top3', 'dataRemark','totalLine','TotalResult', 'dataResult', 'dataBranch', 'FirstDate', 'LastDate', 'page'));
        }else{
            return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }
    }

    public function mingguanPDF(Request $request)
    {
        // data pokok
        $dataBranch = Branch::findorfail($request->branch);
        $FirstDate = $request->FirstDate;
        $LastDate = $request->LastDate;
        // dd($dataBranch);
        // untuk mendapat data pertama 
        $data =  MasterLine::with('ltarget')
                ->where('branch', $dataBranch->kode_branch)
                ->where('branch_detail', $dataBranch->branchdetail)
                ->get();
        $detail = LineDetail::where('tgl_pengerjaan', '>=' , $FirstDate)->where('tgl_pengerjaan', '<=' , $LastDate)->get();
        // data result 
        $dataResult = (new bulanan)->dataresult($data, $detail, $FirstDate, $LastDate);
        $datafoto = collect($dataResult)->where('file', '!=', null)->toArray();
        $top3 = array_reverse(array_slice($datafoto, 0, 3));
        // dd($dataResult);

        // data pertama 
        $TotalResult = (new bulanan)->datapertama($dataResult);
        // dd($TotalResult);

        // data total 
        $totalLine = (new bulanan)->datatotal($TotalResult);
        // dd($TotalAllLine);

        // biar remark nya kebawa semua 
        $dataRemark = (new bulanan)->dataremark($dataResult);
        // dd($dataRemark);

        $pdf = PDF::loadview('qc/rework/report/mingguan_pdf', compact('top3','dataRemark','totalLine','TotalResult', 'dataResult', 'dataBranch', 'FirstDate', 'LastDate'))->setPaper('legal', 'landscape');
        return $pdf->download("WEEEKLY_REPORT_QC_REWORK_".$dataBranch->nama_branch.".pdf");
    }

    public function mingguanexcel(Request $request)
    {
        // data pokok
        $dataBranch = Branch::findorfail($request->branch);
        $FirstDate = $request->FirstDate;
        $LastDate = $request->LastDate;

        // untuk mendapat data pertama 
        $data =  MasterLine::with('ltarget')
                            ->where('branch', $dataBranch->kode_branch)
                            ->where('branch_detail', $dataBranch->branchdetail)
                            ->get();
        $detail = LineDetail::where('tgl_pengerjaan', '>=' , $FirstDate)->where('tgl_pengerjaan', '<=' , $LastDate)->get();
        // data result 
        $dataResult = (new bulanan)->dataresult($data, $detail, $FirstDate, $LastDate);
        $datafoto = collect($dataResult)->where('file', '!=', null)->toArray();
        $top3 = array_reverse(array_slice($datafoto, 0, 3));
        // dd($dataResult);

        // data pertama 
        $TotalResult = (new bulanan)->datapertama($dataResult);
        // dd($TotalResult);

        // data total 
        $totalLine = (new bulanan)->datatotal($TotalResult);
        // dd($TotalAllLine);

        // biar remark nya kebawa semua 
        $dataRemark = (new bulanan)->dataremark($dataResult);
        // dd($dataRemark);

        return Excel::download(new WeeklyReportQCRework($top3,$dataRemark,$totalLine,$TotalResult,$dataResult,$dataBranch,$FirstDate,$LastDate), 'WEEKLY_REPORT_QCREWORK_'.$dataBranch->nama_branch.'.xlsx');        
    }

    public function rbulanan()
    {
        $dataBranch = Branch::all();

        $page = 'report';
        return view('qc/rework/report/bulanan', compact('dataBranch','page'));
    }
    public function get(Request $request)
	{   
        // dd($request->all());
        // untuk filter branch
        // data pokok
        $dataBranch = Branch::findorfail($request->branch);
        $bulan = $request->bulan;
        $kodeBulan = (new kodebulan)->bulan($bulan);
        $FirstDate = (new kodebulan)->tanggal_awal($bulan);
        $LastDate = (new kodebulan)->tanggal_akhir($bulan);
        

        if(
            LineDetail::where('tgl_pengerjaan', '>=' , $FirstDate)->where('tgl_pengerjaan', '<=' , $LastDate)->count()
        ) {
        // untuk mendapat data pertama 
        $data =  MasterLine::with('ltarget')
                ->where('branch', $dataBranch->kode_branch)
                ->where('branch_detail', $dataBranch->branchdetail)
                ->get();
        $detail = LineDetail::where('tgl_pengerjaan', '>=' , $FirstDate)->where('tgl_pengerjaan', '<=' , $LastDate)->get();
        // dd($detail);
        // data result 
        $dataResult = (new bulanan)->dataresult($data, $detail, $FirstDate, $LastDate);
        // dd($dataResult);
        $datafoto = collect($dataResult)->where('file', '!=', null)->toArray();
        $top3 = array_reverse(array_slice($datafoto, 0, 3));
        
        // data datafoto 
        $TotalResult = (new bulanan)->datapertama($dataResult);
        // dd($TotalResult);

        // data total 
        $totalLine = (new bulanan)->datatotal($TotalResult);
        // dd($TotalAllLine);

        // biar remark nya kebawa semua 
        $dataRemark = (new bulanan)->dataremark($dataResult);
        // dd($dataRemark);

        $page = 'report';
		return view('qc/rework/report/rbulanan', compact('top3', 'kodeBulan', 'dataRemark','totalLine','TotalResult', 'dataResult', 'dataBranch', 'FirstDate', 'LastDate', 'bulan','page'));
        }else{
            return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }
    }
    
    public function bulananPDF(Request $request)
    {
        // data pokok
        $dataBranch = Branch::findorfail($request->branch);
        $bulan = $request->bulan;
        $kodeBulan = (new kodebulan)->bulan($bulan);
        $FirstDate = (new kodebulan)->tanggal_awal($bulan);
        $LastDate = (new kodebulan)->tanggal_akhir($bulan);

        // untuk mendapat data pertama 
        $data =  MasterLine::with('ltarget')
                ->where('branch', $dataBranch->kode_branch)
                ->where('branch_detail', $dataBranch->branchdetail)
                ->get();
        $detail = LineDetail::where('tgl_pengerjaan', '>=' , $FirstDate)->where('tgl_pengerjaan', '<=' , $LastDate)->get();
        // data result 
        $dataResult = (new bulanan)->dataresult($data, $detail, $FirstDate, $LastDate);
        $datafoto = collect($dataResult)->where('file', '!=', null)->toArray();
        $top3 = array_reverse(array_slice($datafoto, 0, 3));
        // dd($dataResult);

        // data pertama 
        $TotalResult = (new bulanan)->datapertama($dataResult);
        // dd($dataBranch);

        // data total 
        $totalLine = (new bulanan)->datatotal($TotalResult);
        // dd($TotalAllLine);

        // biar remark nya kebawa semua 
        $dataRemark = (new bulanan)->dataremark($dataResult);
        // dd($dataRemark);

        $pdf = PDF::loadview('qc/rework/report/bulanan_pdf', compact('top3','kodeBulan','dataRemark','totalLine','TotalResult', 'dataResult', 'dataBranch', 'FirstDate', 'LastDate', 'bulan'))->setPaper('legal', 'landscape');
        return $pdf->download("MONTHLY_REPORT_QC_REWORK_".$kodeBulan.".pdf");
        
    }

    public function bulananexcel(Request $request)
    {
         // data pokok
         $dataBranch = Branch::findorfail($request->branch);
         $bulan = $request->bulan;
         $kodeBulan = (new kodebulan)->bulan($bulan);
         $FirstDate = (new kodebulan)->tanggal_awal($bulan);
         $LastDate = (new kodebulan)->tanggal_akhir($bulan);

        // untuk mendapat data pertama 
        $data =  MasterLine::with('ltarget')
                ->where('branch', $dataBranch->kode_branch)
                ->where('branch_detail', $dataBranch->branchdetail)
                ->get();
        $detail = LineDetail::where('tgl_pengerjaan', '>=' , $FirstDate)->where('tgl_pengerjaan', '<=' , $LastDate)->get();
        // data result 
        $dataResult = (new bulanan)->dataresult($data, $detail, $FirstDate, $LastDate);
        $datafoto = collect($dataResult)->where('file', '!=', null)->toArray();
        $top3 = array_reverse(array_slice($datafoto, 0, 3));
        // dd($dataResult);

        // data pertama 
        $TotalResult = (new bulanan)->datapertama($dataResult);
        // dd($TotalResult);

        // data total 
        $totalLine = (new bulanan)->datatotal($TotalResult);
        // dd($TotalAllLine);

        // biar remark nya kebawa semua 
        $dataRemark = (new bulanan)->dataremark($dataResult);
        // dd($dataRemark);

        return Excel::download(new MonthlyReportQCRework($top3,$kodeBulan,$dataRemark,$totalLine,$TotalResult,$dataResult,$dataBranch,$FirstDate,$LastDate,$bulan), 'MONTHLY_REPORT_QCREWORK_'.$dataBranch->nama_branch.'_'.$kodeBulan.'.xlsx');        
    }

    public function rtahunan()
    {
        $dataBranch = Branch::all();

        $page = 'report';
        return view('qc/rework/report/tahunan', compact('dataBranch','page'));
    }
    
    public function tahunget(Request $request)
    {
        // dd($request->all());
        $dataBranch = Branch::findorfail($request->branch);
        $tahun = $request->tahun;
        
        $listBulan = (new bulan)->list($tahun);
        // dd($listBulan);

        // Inisialisasi untuk menentukan tanggal awal dan tanggal akhir tiap bulan 
        $dataBulan = (new bulan)->awalakhir($listBulan);
        // dd($dataBulan);
        // untuk rincian data tiap bulan 
        $reportTahunan = (new tahunan)->tahunan($dataBranch, $dataBulan);
        // dd($reportTahunan);
        // untuk data total 
        $totalData = (new tahunan)->totaltahunan($reportTahunan);
        // untuk foto 
        $foto = (new tahunan)->foto($dataBranch, $dataBulan);


        // dd($totalData);
        $page = 'report';
        return view('qc/rework/report/rtahunan', compact('reportTahunan','dataBranch','tahun', 'totalData', 'foto','page'));
    }

    public function tahunanPDF(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $tahun = $request->tahun;
        
        $listBulan = (new bulan)->list($tahun);

        // Inisialisasi untuk menentukan tanggal awal dan tanggal akhir tiap bulan 
        $dataBulan = (new bulan)->awalakhir($listBulan);
        // untuk rincian data tiap bulan 
        $reportTahunan = (new tahunan)->tahunan($dataBranch, $dataBulan);
        // untuk data total 
        $totalData = (new tahunan)->totaltahunan($reportTahunan);
        // untuk foto 
        $foto = (new tahunan)->foto($dataBranch, $dataBulan);
        // dd($foto);
        // dd($totalData);
        
        $pdf = PDF::loadview('qc/rework/report/tahunan_pdf', compact('reportTahunan','dataBranch','tahun', 'totalData', 'foto'))->setPaper('legal', 'landscape');
        return $pdf->download("Annual_Report_QC_Rework_".$tahun.".pdf");
    }

    public function weekly_report($branch)
    {
        $dataBranch = Branch::where('nama_branch',$branch)->first();
        $FirstDate = date("Y-m-d", strtotime("first day of this month"));
        $LastDate = date('Y-m-d');

        // untuk mendapat data pertama 
        $data =  MasterLine::with('ltarget')
                            ->where('branch', $dataBranch->kode_branch)
                            ->where('branch_detail', $dataBranch->branchdetail)
                            ->get();
        $detail = LineDetail::where('tgl_pengerjaan', '>=' , $FirstDate)->where('tgl_pengerjaan', '<=' , $LastDate)->get();
        // data result 
        $dataResult = (new bulanan)->dataresult($data, $detail, $FirstDate, $LastDate);
        $TotalResult = (new bulanan)->datapertama($dataResult);
        // data total 
        $totalLine = (new bulanan)->datatotal($TotalResult);
        // dd($totalLine);
        return Excel::store(new ReworkWRMail($FirstDate,$LastDate,$TotalResult,$totalLine), 'WEEKLY_REPORT_QCREWORK_'.$dataBranch->nama_branch.'_'.$FirstDate.'-'.$LastDate.'.xlsx', 'rework_weekly_report');
    }
}
