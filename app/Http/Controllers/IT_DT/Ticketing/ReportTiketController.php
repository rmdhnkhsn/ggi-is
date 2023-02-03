<?php

namespace App\Http\Controllers\IT_DT\Ticketing;

use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Branch;
use App\Tiket;
use App\TiketIT;
use App\TiketUser;
use App\TiketKategori;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\tiket\Rtiket;
use App\GetData\Rework\Report\Bulanan\kodebulan;


class ReportTiketController extends Controller
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

    public function KinerjaIT(Request $request)
    {
        $dataBranch = Branch::all();
        $page = 'report';
        return view('it_dt/Ticketing/report/KinerjaIT', compact('dataBranch','page'));
    }

    public function user(Request $request)
    {
        $dataBranch = Branch::all();
        $page = 'report';
        return view('it_dt/Ticketing/report/user', compact('dataBranch','page'));
    }

    public function Problem(Request $request)
    {
        $dataBranch = Branch::all();
        $page = 'report';
        return view('it_dt/Ticketing/report/problem', compact('dataBranch','page'));
    }

    // public function Problemget1(Request $request)
    // {
    //     $dataBranch = Branch::findorfail($request->branch);
        
    //     $bulan = $request->bulan;
    //     $dataBulan = (new  kodebulan)->bulan($bulan);
    //     $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
    //     $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);

    //     $tiket =(new Rproblem)->data_tiket ($tanggal_awal, $tanggal_akhir, $dataBranch);
      
    //     $Tiket_ByProblem = $tiket->groupBy('rusak')->values();
    //    // dd( $Tiket_ByProblem);
    //    // $SubProblem = $Tiket_ByProblem->sortBy('sub_rusak')->groupBy('sub_rusak')->values();

    //     // dd($Tiket_ByProblem);
    //     foreach ($Tiket_ByProblem as $BySubProblem) {
    //         $SubProblem = $BySubProblem->sortBy('sub_rusak')->groupBy('sub_rusak')->values();
            
    //         foreach ($SubProblem as $ProblemGroupedBySubAndProblem) {

    //             $differenceResponAndRequest = [];
    //             $differenceDeliveryAndProses = [];
    //             $differenceDeliveryAndRequest = [];
    //             $qtyReqDayGroupedByDateAndName = [];
    //             $differenceDeliveryAndLosTime = [];
    //             $qtyActDayGroupedByDateAndName = [];
    //             $differenceActualAndRequest = [];
                
    //             foreach ($ProblemGroupedBySubAndProblem as $tiket) {
    //             }
    //         }
    //     }
        
    //     //dd($Problem);

    //     return view('it_dt/Ticketing/report/Rproblem', [
    //         'tiket' => $tiket,
            
    //     ]);
        
    // }

    public function Problemget(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        
        $bulan = $request->bulan;
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);
        if(Tiket::where('tgl_selesai', '>=' , $tanggal_awal)->where('tgl_selesai', '<=' , $tanggal_akhir)
            ->where('branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->branchdetail)->count()){
        
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tahun = (new  kodebulan)->tahun($bulan);
        //dd($tahun);
        

        $tiket =(new Rtiket)->data_tiket_done ($tanggal_awal, $tanggal_akhir, $dataBranch);
                
        $page = 'report';
        return view('it_dt/Ticketing/report/Rproblem', compact('tiket','dataBranch','dataBulan', 'tahun','page'));
        }
        else{
            return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }
    }


    public function usertiketget(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        
        $bulan = $request->bulan;
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);

        if(Tiket::where('tgl_pengajuan', '>=' , $tanggal_awal)->where('tgl_pengajuan', '<=' , $tanggal_akhir)
            ->where('branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->branchdetail)->count()){
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tahun = (new  kodebulan)->tahun($bulan);
        $tiket =(new Rtiket)->tiket_user ($tanggal_awal, $tanggal_akhir, $dataBranch);
        $tiket_user= (new Rtiket)->data_tiket_user ($tiket);
        $total=$tiket->sum('total');
        //dd($total);
        $page = 'report';
            return view('it_dt/Ticketing/report/RTiketUser', compact('tiket_user','dataBranch','dataBulan', 'tahun','total','page'));
        }
        else{
            return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }
    
    }

    public function kinerjaitget(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        
        $bulan = $request->bulan;
        
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);
        if(Tiket::where('tgl_pengerjaan', '>=' , $tanggal_awal)->where('tgl_pengerjaan', '<=' , $tanggal_akhir)
        ->where('branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->branchdetail)->count()){
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tahun = (new  kodebulan)->tahun($bulan);
        $tiket =(new Rtiket)->tiket_it ($tanggal_awal, $tanggal_akhir, $dataBranch);
        //jum per IT perhari
        $tiket_kinerja =(new Rtiket)->jum_tiket_it ($tiket);
        // jum tiket perhari
        $tiket_jum =(new Rtiket)->jum_tiket ($tiket, $dataBranch);
        //total per IT perbulan
        $tiket_total_it =(new Rtiket)->tiket_total_it ($tiket, $tanggal_awal, $tanggal_akhir);
        //total tiket perbulan
        $total_tiket =(new Rtiket)->TotalTiket ($tiket_total_it);
        
        $page = 'report';
        return view('it_dt/Ticketing/report/RkinerjaIT', compact('total_tiket','tiket_total_it','tiket_jum','dataBranch','dataBulan', 'tahun','tiket_kinerja','page'));
        }
        else{
            return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }
              
    }
    
}