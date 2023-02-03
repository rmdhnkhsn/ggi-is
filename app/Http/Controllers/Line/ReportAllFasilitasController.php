<?php

namespace App\Http\Controllers\Line;

use PDF;
use App\Branch;
use Carbon\Carbon;
use App\MasterLine;
use App\LineDetail;
use App\Services\bulan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Rework\Report\allfacility;


class ReportAllFasilitasController extends Controller
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

    public function tahunan()
    {
        $page = 'report';
        return view('qc/rework/report/TahunanAll', compact('page'));
    }

    public function harian()
    {
        $page = 'report';
        return view('qc/rework/report/HarianAll', compact('page'));
    }

    public function getTahunan(Request $request)
    {
        $tahun = $request->tahun;
        // dd($tahun);
        // list bulan 
        $listBulan = (new bulan)->list($tahun);
        // Inisialisasi untuk menentukan tanggal awal dan tanggal akhir tiap bulan 
        $dataBulan = (new bulan)->awalakhir($listBulan);
        // Data Branch 
        $dataBranch = Branch::all();
        // dd($dataBulan);
        $dataReport = (new allfacility)->tahunan($dataBulan, $dataBranch); 
        // dd($dataReport);
        $dataTotal = (new allfacility)->total($dataReport); 
        // dd($dataTotal);

        $page = 'report';
        return view('qc/rework/report/rAllTahunan', compact('tahun', 'dataReport','dataTotal','page'));
        
    }

    public function AllTahunanPDF(Request $request)
    {
        $tahun = $request->tahun;
        // dd($tahun);
        // list bulan 
        $listBulan = (new bulan)->list($tahun);
        // Inisialisasi untuk menentukan tanggal awal dan tanggal akhir tiap bulan 
        $dataBulan = (new bulan)->awalakhir($listBulan);
        // Data Branch 
        $dataBranch = Branch::all();
        // dd($dataBulan);
        $dataReport = (new allfacility)->tahunan($dataBulan, $dataBranch); 
        // dd($dataReport);
        $dataTotal = (new allfacility)->total($dataReport); 
        // dd($dataTotal);

        $pdf = PDF::loadview('qc/rework/report/Alltahunan_pdf',  compact('tahun', 'dataReport','dataTotal'))->setPaper('legal', 'landscape');
        return $pdf->download("Annual_report_QC_Rework_AllFacility_".$tahun.".pdf");
    }

    public function getHarian(Request $request)
    {
        // dd($request->all());
        $tanggal = $request->tanggal;
        $tanggal_depan = (new Carbon($request->tanggal))->format('d-m-Y');

        if(
            LineDetail::where('tgl_pengerjaan', $tanggal)->count()
        ) {

        // untuk menentukan jumlah line per branch
        $dataBranch = Branch::all();
        $dataLine =  MasterLine::with('ltarget')->get();
        $detail = LineDetail::where('tgl_pengerjaan', $tanggal)->get();
        // dd($detail);

        $dataX = [];
        foreach ($dataBranch as $key => $value) {
            $dataX[] =[
                'branch' => $value->kode_branch,
                'branchdetail' => $value->branchdetail,
                'nama' => $value->nama_branch,
            ];
        }

        $dataY = [];
        foreach ($dataLine as $key => $value) {
            foreach ($detail as $key3 => $value3) {
                // dd($value3);
                $terpenuhi = collect($detail)->where('id_line', $value->id)->sum('target_terpenuhi');
                $total_check = collect($detail)->where('id_line', $value->id)->sum('total_check');
                $total_reject = collect($detail)->where('id_line', $value->id)->sum('total_reject');
                if($terpenuhi == 0){
                    $p_reject = 0;
                }else{
                    $p_reject = round($total_reject/$terpenuhi*100,2);
                }
                $dataY[] = [
                    'branch' => $value->branch,
                    'branchdetail' => $value->branch_detail,
                    'id_line' => $value->id,
                    'line' => $value->string1,
                    'total_reject' => $total_reject,
                    'total_check' => $total_check,
                    'p_total_reject' => $p_reject,
                    'file' => $value3->file
                ];
            }
        }
        // dd($dataY);
        $TotalResult = collect($dataY)
                        ->groupBy('line')
                        ->map(function ($item) {
                            return array_merge(...$item->toArray());
                        })->values()->toArray();
                        
        $dataZ = [];
        foreach ($dataX as $key => $value) {
            foreach ($TotalResult as $key2 => $value2) {
                if ($value['branch'] == $value2['branch'] && $value['branchdetail'] == $value2['branchdetail']) {
                    $dataZ[] = [
                        'nama' => $value['nama'],
                        'line' => $value2['line'],
                        'total_check' => $value2['total_check'],
                        'total_reject' => $value2['total_reject'],
                        'p_total_reject' => $value2['p_total_reject']
                    ];
                }
            }
        }

        $dataFinal = collect($dataZ)->groupBy('nama');

        $foto = collect($dataY)
                        ->where('file', '!=', null)
                        ->groupBy('line')
                        ->map(function ($item) {
                            return array_merge(...$item->toArray());
                        })->values()->toArray();
        // end 
        // untuk data total 

        $totalAllTerpenuhi = collect($dataZ)->sum('total_check');
        $totalAllReject = collect($dataZ)->sum('total_reject');
        if ($totalAllTerpenuhi == 0 || $totalAllTerpenuhi == null) {
            $totalAll_P_Reject = 0;
        }else{
             $totalAll_P_Reject = round($totalAllReject/$totalAllTerpenuhi*100,2);
        }

        $page = 'report';
        return view('qc/rework/report/detailAllHarian', compact('tanggal', 'totalAllTerpenuhi','totalAllReject','totalAll_P_Reject', 'tanggal_depan', 'dataFinal', 'foto','page'));
        }else{
            return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }
    }
    public function AllHarianPDF(Request $request)
    {
        $tanggal = $request->tanggal;
        $tanggal_depan = (new Carbon($request->tanggal))->format('d-m-Y');

        // untuk menentukan jumlah line per branch
        $dataBranch = Branch::all();
        $dataLine =  MasterLine::with('ltarget')->get();
        $detail = LineDetail::where('tgl_pengerjaan', $tanggal)->get();

        $dataX = [];
        foreach ($dataBranch as $key => $value) {
            $dataX[] =[
                'branch' => $value->kode_branch,
                'branchdetail' => $value->branchdetail,
                'nama' => $value->nama_branch,
            ];
        }

        $dataY = [];
        foreach ($dataLine as $key => $value) {
            foreach ($detail as $key3 => $value3) {
                // dd($value3);
                $terpenuhi = collect($detail)->where('id_line', $value->id)->sum('target_terpenuhi');
                $total_check = collect($detail)->where('id_line', $value->id)->sum('total_check');
                $total_reject = collect($detail)->where('id_line', $value->id)->sum('total_reject');
                if($terpenuhi == 0){
                    $p_reject = 0;
                }else{
                    $p_reject = round($total_reject/$terpenuhi*100,2);
                }
                $dataY[] = [
                    'branch' => $value->branch,
                    'branchdetail' => $value->branch_detail,
                    'id_line' => $value->id,
                    'line' => $value->string1,
                    'total_reject' => $total_reject,
                    'total_check' => $total_check,
                    'p_total_reject' => $p_reject,
                    'file' => $value3->file
                ];
            }
        }
        
        $TotalResult = collect($dataY)
                        ->groupBy('line')
                        ->map(function ($item) {
                            return array_merge(...$item->toArray());
                        })->values()->toArray();
                        
        $dataZ = [];
        foreach ($dataX as $key => $value) {
            foreach ($TotalResult as $key2 => $value2) {
                if ($value['branch'] == $value2['branch'] && $value['branchdetail'] == $value2['branchdetail']) {
                    $dataZ[] = [
                        'nama' => $value['nama'],
                        'line' => $value2['line'],
                        'total_check' => $value2['total_check'],
                        'total_reject' => $value2['total_reject'],
                        'p_total_reject' => $value2['p_total_reject']
                    ];
                }
            }
        }

        $dataFinal = collect($dataZ)->groupBy('nama');

        $foto = collect($dataY)
                        ->where('file', '!=', null)
                        ->groupBy('line')
                        ->map(function ($item) {
                            return array_merge(...$item->toArray());
                        })->values()->toArray();
        // end 
        // untuk data total 

        $totalAllTerpenuhi = collect($dataZ)->sum('total_check');
        $totalAllReject = collect($dataZ)->sum('total_reject');
        if ($totalAllTerpenuhi == 0 || $totalAllTerpenuhi == null) {
            $totalAll_P_Reject = 0;
        }else{
             $totalAll_P_Reject = round($totalAllReject/$totalAllTerpenuhi*100,2);
        }

        $pdf = PDF::loadview('qc/rework/report/Allharian_pdf',  compact('tanggal', 'totalAllTerpenuhi','totalAllReject','totalAll_P_Reject', 'tanggal_depan', 'dataFinal', 'foto'))->setPaper('legal', 'portrait');
        return $pdf->download("Daily_Report_QC_Rework_AllFacility_".$tanggal.".pdf");
    }

}
