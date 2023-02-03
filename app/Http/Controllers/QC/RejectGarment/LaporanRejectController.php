<?php

namespace App\Http\Controllers\QC\RejectGarment;

use PDF;
use App\Branch;
use Illuminate\Http\Request;
use App\Exports\RejectGarmentExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\QC\RejectGarment\RejectReport;
use App\Services\QC\RejectGarment\data_olahan;
use App\GetData\Rework\Report\Bulanan\kodebulan;

class LaporanRejectController extends Controller
{
    public function index()
    {
        $page = "Report";
        $dataBranch = Branch::all();

        return view('qc.reject_garment.report.bulanan', compact('page', 'dataBranch'));
    }

    public function bulanan(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $bulan = $request->bulan;
        $kodeBulan = (new kodebulan)->bulan_indo($bulan);
        $FirstDate = (new kodebulan)->tanggal_awal($bulan);
        $LastDate = (new kodebulan)->tanggal_akhir($bulan);

        if(
            RejectReport::where('tanggal', '>=' , $FirstDate)->where('tanggal', '<=' , $LastDate)
            ->where('branch', $dataBranch->kode_branch) ->where('branchdetail', $dataBranch->branchdetail)->count()
        ) {
            // untuk mendapat data pertama 
            $data =  RejectReport::with('breakdown')
            ->where('tanggal', '>=' , $FirstDate)->where('tanggal', '<=' , $LastDate)
            ->where('branch', $dataBranch->kode_branch)->where('branchdetail', $dataBranch->branchdetail)
            ->get();
            // dd($data);

            $result = (new data_olahan)->bulanan($data);
            $total = (new data_olahan)->bulanan_total($result);
            // dd($total);

            $page = "Report";

            return view('qc.reject_garment.report.rbulanan', compact('total', 'page', 'dataBranch', 'result', 'kodeBulan', 'bulan'));
        }else{
            return redirect()->back()->with('report_kosong', 'Data Kosong !!');
        }
    }

    public function bulananPDF(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $bulan = $request->bulan;
        $kodeBulan = (new kodebulan)->bulan_indo($bulan);
        $FirstDate = (new kodebulan)->tanggal_awal($bulan);
        $LastDate = (new kodebulan)->tanggal_akhir($bulan);
        $bulanKecil = (new kodebulan)->bulan_indo_kecil($bulan);

        // untuk mendapat data pertama 
        $data =  RejectReport::with('breakdown')
        ->where('tanggal', '>=' , $FirstDate)->where('tanggal', '<=' , $LastDate)
        ->where('branch', $dataBranch->kode_branch)->where('branchdetail', $dataBranch->branchdetail)
        ->get();
        // dd($data);

        $result = (new data_olahan)->bulanan($data);
        $total = (new data_olahan)->bulanan_total($result);

        $pdf = PDF::loadview('qc.reject_garment.report.bulanan_pdf', compact('total','dataBranch', 'result', 'kodeBulan', 'bulan'))->setPaper('legal', 'landscape');
        return $pdf->stream($bulanKecil." Reject Garment perhari".".pdf");
    }

    public function excel(Request $request)
    {

        $dataBranch = Branch::findorfail($request->branch);
        $bulan = $request->bulan;
        $kodeBulan = (new kodebulan)->bulan_indo($bulan);
        $FirstDate = (new kodebulan)->tanggal_awal($bulan);
        $LastDate = (new kodebulan)->tanggal_akhir($bulan);
        $bulanKecil = (new kodebulan)->bulan_indo_kecil($bulan);

        // untuk mendapat data pertama 
        $data =  RejectReport::with('breakdown')
        ->where('tanggal', '>=' , $FirstDate)->where('tanggal', '<=' , $LastDate)
        ->where('branch', $dataBranch->kode_branch)->where('branchdetail', $dataBranch->branchdetail)
        ->get();
        // dd($data);

        $result = (new data_olahan)->bulanan($data);
        $total = (new data_olahan)->bulanan_total($result);

        return Excel::download(new RejectGarmentExport($total, $dataBranch, $result, $bulan, $kodeBulan), $bulanKecil.' Reject Garment perhari.xlsx');
    }
}
