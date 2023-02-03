<?php

namespace App\Http\Controllers\QC\RejectCutting;

use DB;
use PDF;
use Auth;
use DataTables;
use App\WOBreakDown;
use App\JdeApi;
use App\ListBuyer;
use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\RejectCutting\RejectCutting;
use App\Models\QC\RejectCutting\RejectCuttingDetail;
use App\Models\QC\RejectCutting\RejectCuttingViewsDetail;
use App\Models\QC\RejectCutting\reject_name;
use App\Services\QC\RejectCutting\data_inputan;
use phpDocumentor\Reflection\Types\Null_;
use App\GetData\Rework\Report\Bulanan\kodebulan;
use App\Services\QC\RejectCutting\data_olahan;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\rijectCuttingExport;
use App\Exports\RejectCuttingExport;
use App\Exports\RejectCuttingAnnualExport;
use App\Exports\RejectCuttingRejectExport;



class ReportRejectCuttingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function bulanan(Request $request)
    {
        $page = 'report';
            // dd($dataBranch);
         $dataBranch = Branch::all();

        return view('qc.reject_cutting.report.bulanan', compact('dataBranch','page'));
    }
     public function bulananReject(Request $request)
    {
        $page = 'report';
            // dd($dataBranch);
         $dataBranch = Branch::all();

        return view('qc.reject_cutting.report.bulananReject', compact('dataBranch','page'));
    }
     public function harian(Request $request)
    {
        $page = 'report';
        $dataBranch = Branch::all();
        
        return view('qc.reject_cutting.report.harian', compact('dataBranch','page'));
    }
     public function harianBuyer(Request $request)
    {
        $page = 'report';
        $dataBranch = Branch::all();
        
        return view('qc.reject_cutting.report.harianBuyer', compact('dataBranch','page'));
    }
     public function tahunan(Request $request)
    {
        $page = 'report';
        $dataBranch = Branch::all();
      
        return view('qc.reject_cutting.report.tahunan', compact('dataBranch','page'));
    }
     public function tahunanAll(Request $request)
    {
        $page = 'report';
        $dataBranch = Branch::all();
      
        return view('qc.reject_cutting.report.tahunanAll', compact('dataBranch','page'));
    }
     public function harianAll(Request $request)
    {
        $page = 'report';
        $dataBranch = Branch::all();
      
            return view('qc.reject_cutting.report.harianAll', compact('dataBranch','page'));
    }

     public function daily(Request $request)
    {
        $page = 'report';

        $dataBranch = Branch::findorfail($request->branch);
        $tanggal = $request->tanggal;
        // dd($tanggal);
            
        if(
            RejectCutting::where('tanggal','=', $tanggal)->where('branchdetail',$dataBranch->branchdetail)->count()
        ) {
             
            $data_awal = (new  data_olahan)->daily($tanggal,$dataBranch);
            $reportHarian = (new  data_olahan)->harian( $data_awal);
            $reportHarianFinal = (new  data_olahan)->dailyFinal( $reportHarian);

            // dd($reportHarianFinal );
        return view('qc.reject_cutting.report.daily', compact('dataBranch','reportHarianFinal','tanggal','reportHarian','page'));
        }else{
            return back()->with("NValid", 'Data Kosong !');
            }
    }
     public function dailyBuyer(Request $request)
    {
        $page = 'report';

        $dataBranch = Branch::findorfail($request->branch);
        $tanggal = $request->tanggal;
            
        if(
            RejectCutting::where('tanggal','=', $tanggal)->where('branchdetail',$dataBranch->branchdetail)->count()
        ) {
             
            $data_awal = (new  data_olahan)->dailyBuyer($tanggal,$dataBranch);
            $reportHarian = (new  data_olahan)->harianBuyer( $data_awal);
            $percobaan = collect($reportHarian)->groupby('buyer');
            
            $reportHarianFinal = (new  data_olahan)->dailyFinalBuyer( $reportHarian);
            $reportHarianFinalBuyer = (new  data_olahan)->dailyFinalBuyerFinal($reportHarian);
            $percobaanBuyer = collect($reportHarianFinal)->sortBy('tanggal')->groupby('buyer');

        return view('qc.reject_cutting.report.dailyBuyer', compact('reportHarianFinalBuyer','percobaan','dataBranch','reportHarianFinal','tanggal','reportHarian','page'));
        }else{
            return back()->with("NValid", 'Data Kosong !');
            }
    }
     public function dailyPDF(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        // dd($dataBranch);
        $tanggal = $request->tanggal; 
        // $input=$request->all();
        // dd($input);            
        $data_awal = (new  data_olahan)->daily($tanggal, $dataBranch);
        $reportHarian = (new  data_olahan)->harian( $data_awal);
        $reportHarianFinal = (new  data_olahan)->dailyFinal( $reportHarian);
        // dd()
        $pdf = PDF::loadview('qc.reject_cutting.report.daily_pdf', compact('tanggal','reportHarianFinal','dataBranch','reportHarian'))->setPaper('legal', 'landscape','center');
         return $pdf->download("DAILY_REPORT_QC_REJECT_CUTTING__".\Carbon\Carbon::parse($tanggal )->locale('id')->format('d-m-Y').".pdf");
    }

    public function dailyExcel(Request $request)
    {

        $dataBranch = Branch::findorfail($request->branch);
        // dd($dataBranch);
        $tanggal = $request->tanggal; 
        $data_awal = (new  data_olahan)->daily($tanggal, $dataBranch);
        $reportHarian = (new  data_olahan)->harian( $data_awal);
        $reportHarianFinal = (new  data_olahan)->dailyFinal( $reportHarian);

        return Excel::download(new rijectCuttingExport($data_awal, $reportHarian, $reportHarianFinal, $tanggal,$dataBranch),$tanggal.'_DAILY_REPORT_QC_REJECT_CUTTING.xlsx');
    }

    public function dailyAll( request $request)
    {
        $page = 'report';
        $tanggal = $request->tanggal;
       
        if(
            RejectCutting::where('tanggal','=', $tanggal)->count()
        ) {
            $data_awal = (new  data_olahan)->data_harian_all($tanggal);
            $finalReportAll = (new  data_olahan)->nama_branch_daily($data_awal);
            $anualReportFinalAll = (new  data_olahan)->dailyFinalAll($finalReportAll);

        return view('qc.reject_cutting.report.dailyAll', compact('anualReportFinalAll','tanggal','finalReportAll','page'));
    }else{
        return back()->with("NValid", 'Data Kosong !');
        }
    }

     public function dailyAllPDF(Request $request)
    {
            
        $page = 'report';
        $tanggal = $request->tanggal;

        $data_awal = (new  data_olahan)->data_harian_all($tanggal);
        $finalReportAll = (new  data_olahan)->nama_branch_daily($data_awal);
        $anualReportFinalAll = (new  data_olahan)->dailyFinalAll($finalReportAll);
        
            // dd($ReportBulananFinal );
        $pdf = PDF::loadview('qc.reject_cutting.report.dailyAll_pdf', compact('anualReportFinalAll','tanggal','finalReportAll'))->setPaper('legal', 'landscape','center');
         return $pdf->download("DAILY_REPORT_QC_REJECT_CUTTING_ALL_FACILITY_".\Carbon\Carbon::parse($tanggal )->locale('id')->format('d-m-Y').".pdf");
    }
    
     public function monthlyReject(Request $request)
    {
        $page = 'report';

            $dataBranch = Branch::findorfail($request->branch);
            $bulan = $request->bulan;
            $dataBulan = (new  kodebulan)->bulan($bulan);
            $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
            $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);
            // dd($dataBranch);
            
        if(
            RejectCutting::where('tanggal','>=', $tanggal_awal)->where('tanggal','<=', $tanggal_akhir)->where('branchdetail',$dataBranch->branchdetail)->count()
        ) {
            $data_awal = (new  data_olahan)->data_awal_bulan_reject( $dataBranch ,$tanggal_awal,$tanggal_akhir);
            $ReportBulanan = (new  data_olahan)->bulananReject( $data_awal);
            $ReportRejectBulananFinal = (new  data_olahan)->bulananRejectFinal($ReportBulanan);
            $ReportBulananSize = (new  data_olahan)->bulananRejectSize( $data_awal); 
            $ReportRejectBulananFinalSize = (new  data_olahan)->bulananRejectFinalSize($ReportBulananSize);
            
            return view('qc.reject_cutting.report.monthlyReject', compact('ReportRejectBulananFinalSize','ReportBulananSize','dataBranch','ReportRejectBulananFinal','dataBulan','bulan','ReportBulanan','page'));
        } else{
            return back()->with("NValid", 'Data Kosong !');
        }
    }

      public function monthlyRejectPDF(Request $request)
    {
            
        $dataBranch = Branch::findorfail($request->branch);
        $bulan = $request->bulan;
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);
        $data_awal = (new  data_olahan)->data_awal_bulan_reject( $dataBranch ,$tanggal_awal,$tanggal_akhir);
        $ReportBulanan = (new  data_olahan)->bulananReject( $data_awal);
        $ReportRejectBulananFinal = (new  data_olahan)->bulananRejectFinal($ReportBulanan);
        $ReportBulananSize = (new  data_olahan)->bulananRejectSize( $data_awal); 
        $ReportRejectBulananFinalSize = (new  data_olahan)->bulananRejectFinalSize($ReportBulananSize);
        
        $customPaper = array(0,0,720,2528);
        $pdf = PDF::loadview('qc.reject_cutting.report.monthlyReject_pdf', compact('data_awal','dataBranch','ReportRejectBulananFinal','dataBulan','bulan','ReportBulanan','ReportBulananSize','ReportRejectBulananFinalSize'))->setPaper($customPaper,'landscape','center');
         return $pdf->stream("MONTHLY_REPORT_REJECT_QC_REJECT_CUTTING__".$bulan.".pdf");
    }

    public function monthlyRejectExcel(Request $request)
    {

        $dataBranch = Branch::findorfail($request->branch);
        $bulan = $request->bulan;
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);
        $data_awal = (new  data_olahan)->data_awal_bulan_reject( $dataBranch ,$tanggal_awal,$tanggal_akhir);
        $ReportBulanan = (new  data_olahan)->bulananReject( $data_awal); 
        $ReportRejectBulananFinal = (new  data_olahan)->bulananRejectFinal($ReportBulanan);
        $ReportBulananSize = (new  data_olahan)->bulananRejectSize( $data_awal); 
        $ReportRejectBulananFinalSize = (new  data_olahan)->bulananRejectFinalSize($ReportBulananSize);
        // dd($ReportRejectBulananFinal);
        return Excel::download(new RejectCuttingRejectExport($data_awal, $ReportBulanan, $ReportRejectBulananFinal, $ReportBulananSize,$ReportRejectBulananFinalSize, $dataBulan,$dataBranch),$dataBulan.'_MONTHLY_REPORT_REJECT_QC_REJECT_CUTTING.xlsx');
    }

     public function monthly(Request $request)
    {
        $page = 'report';

            $dataBranch = Branch::findorfail($request->branch);
            $bulan = $request->bulan;
            $dataBulan = (new  kodebulan)->bulan($bulan);
            $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
            $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);
            // dd($dataBranch);
            
        if(
            RejectCutting::where('tanggal','>=', $tanggal_awal)->where('tanggal','<=', $tanggal_akhir)->where('branchdetail',$dataBranch->branchdetail)->count()
        ) {
            $data_awal = (new  data_olahan)->data_awal_bulan( $dataBranch ,$tanggal_awal,$tanggal_akhir);
            $ReportBulanan = (new  data_olahan)->bulanan( $data_awal);
            $ReportBulananFinal = (new  data_olahan)->monthlyFinal( $ReportBulanan);

            
            return view('qc.reject_cutting.report.monthly', compact('dataBranch','ReportBulananFinal','dataBulan','bulan','ReportBulanan','page'));
        } else{
            return back()->with("NValid", 'Data Kosong !');
        }
    }

     public function monthlyPDF(Request $request)
    {
            
        $dataBranch = Branch::findorfail($request->branch);
        $bulan = $request->bulan;
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);
        $data_awal = (new  data_olahan)->data_awal_bulan( $dataBranch ,$tanggal_awal,$tanggal_akhir);
        $ReportBulanan = (new  data_olahan)->bulanan( $data_awal);
        $ReportBulananFinal = (new  data_olahan)->monthlyFinal( $ReportBulanan);
        
        
        $pdf = PDF::loadview('qc.reject_cutting.report.monthly_pdf', compact('dataBranch','ReportBulananFinal','dataBulan','bulan','ReportBulanan'))->setPaper('legal', 'landscape','center');
         return $pdf->download("MONTHLY_REPORT_QC_REJECT_CUTTING__".$bulan.".pdf");
    }

    public function monthlyExcel(Request $request)
    {

        $dataBranch = Branch::findorfail($request->branch);
        $bulan = $request->bulan;
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);
        $data_awal_bulan = (new  data_olahan)->data_awal_bulan( $dataBranch ,$tanggal_awal,$tanggal_akhir);
        $ReportBulanan = (new  data_olahan)->bulanan( $data_awal_bulan);
        $ReportBulananFinal = (new  data_olahan)->monthlyFinal($ReportBulanan);
        // dd($ReportBulananFinal);
        return Excel::download(new RejectCuttingExport($data_awal_bulan, $ReportBulanan, $ReportBulananFinal, $dataBulan,$dataBranch),$dataBulan.'_MONTHLY_REPORT_QC_REJECT_CUTTING.xlsx');
    }

    public function yearlyExcel(Request $request)
    {

        $dataBranch = Branch::findorfail($request->branch);
        $tahun = $request->tahun;

        $data_awal_tahun = (new  data_olahan)->data_tahunan($tahun ,$dataBranch);
        $anualReportFinal = (new  data_olahan)->tahun_report( $data_awal_tahun);
        $reporRejectCuttingFinal = (new  data_olahan)->yearlyFinal( $anualReportFinal);
        // dd($reporRejectCuttingFinal);
        return Excel::download(new RejectCuttingAnnualExport($data_awal_tahun, $anualReportFinal, $reporRejectCuttingFinal, $tahun ,$dataBranch),$tahun.'_ANNUAL_REPORT_QC_REJECT_CUTTING.xlsx');
    }


     public function yearlyPDF(Request $request)
    {
            
        $dataBranch = Branch::findorfail($request->branch);
        $tahun = $request->tahun;

        $data_awal = (new  data_olahan)->data_tahunan($tahun ,$dataBranch);
        $anualReportFinal = (new  data_olahan)->tahun_report( $data_awal);
        $reporRejectCuttingFinal = (new  data_olahan)->yearlyFinal( $anualReportFinal);
        
        $pdf = PDF::loadview('qc.reject_cutting.report.yearly_pdf', compact('reporRejectCuttingFinal','dataBranch','tahun','anualReportFinal'))->setPaper('legal', 'landscape','center');
         return $pdf->download("ANNUAL_REPORT_QC_REJECT_CUTTING__".$tahun.".pdf");
    }

    public function yearly( request $request)
    {
        $page = 'report';
        $dataBranch = Branch::findorfail($request->branch);
        $tahun = $request->tahun;
       
        if(
            $finalInspections =  RejectCutting::whereyear('tanggal','>=', $tahun)->where('branchdetail', $dataBranch->branchdetail)->count()
        ) {

            $data_awal = (new  data_olahan)->data_tahunan($tahun, $dataBranch);
            $anualReportFinal = (new  data_olahan)->tahun_report( $data_awal);
            $reporRejectCuttingFinal = (new  data_olahan)->yearlyFinal( $anualReportFinal);


        return view('qc.reject_cutting.report.yearly', compact('reporRejectCuttingFinal','dataBranch','tahun','anualReportFinal','page'));
        }else{
            return back()->with("NValid", 'Data Kosong !');
            }
    }

    public function yearlyAll( request $request)
    {
        $page = 'report';
        $tahun = $request->tahun;
       
        if(
            $finalInspections =  RejectCutting::whereyear('tanggal','=', $tahun)->count()
        ) {

            $data_awal = (new  data_olahan)->data_tahunan_all($tahun);
            $finalReportAll = (new  data_olahan)->nama_branch($data_awal);
            $anualReportFinalAll = (new  data_olahan)->yearlyFinalAll($finalReportAll);

        return view('qc.reject_cutting.report.yearlyAll', compact('anualReportFinalAll','tahun','finalReportAll','page'));
        }else{
            return back()->with("NValid", 'Data Kosong !');
            }
    }

    public function yearlyAllPDF(Request $request)
    {
            
        $page = 'report';
        $tahun = $request->tahun;

            $data_awal = (new  data_olahan)->data_tahunan_all($tahun);
            $finalReportAll = (new  data_olahan)->nama_branch($data_awal);
            $anualReportFinalAll = (new  data_olahan)->yearlyFinalAll($finalReportAll);
        
            // dd($ReportBulananFinal );
        $pdf = PDF::loadview('qc.reject_cutting.report.yearlyAll_pdf', compact('anualReportFinalAll','tahun','finalReportAll'))->setPaper('legal', 'landscape','center');
            return $pdf->download("ANNUAL_REPORT_QC_REJECT_CUTTING_ALL_FACILITY_".$tahun.".pdf");
    }
   

}
