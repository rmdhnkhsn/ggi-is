<?php

namespace App\Http\Controllers\IT_DT\ITDT_Ticketing;


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
use App\Services\tiket\Report_tiket;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\IT_DT\tiket\TicketDoc;
use App\Models\IT_DT\tiket\TicketAcc;
use App\Services\tiket\TiketAll;
use App\Exports\TicketDocExport;
use App\Exports\TicketAccJdeExport;
use App\Exports\TicketAccJdeExportTrf;

use App\TiketBookingDetail;
use App\TiketBookingWaktu;
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
        $master_support=TiketIT::all();
        $page = 'itsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_IT/KinerjaIT', compact('dataBranch','page','master_support'));
    }

    public function user(Request $request)
    {
        $dataBranch = Branch::all();
        $master_support=TiketIT::all();
        $page = 'itsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_IT/user', compact('dataBranch','page','master_support'));
    }

    public function Problem(Request $request)
    {
        $dataBranch = Branch::all();
        $master_support=TiketIT::all();
        $page = 'itsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_IT/problem', compact('dataBranch','page','master_support'));
    }
    public function Peminjaman(Request $request)
    {
        $dataBranch = Branch::all();
        $master_support=TiketIT::all();
        $page = 'itsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_IT/Peminjaman', compact('dataBranch','page','master_support'));
    }
    public function Problemget(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $master_support=TiketIT::all(); 
        $bulan = $request->bulan;
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);
        if(Tiket::wherein('kategori_tiket',['IT Support','IT RPA'])->where('tgl_selesai', '>=' , $tanggal_awal)->where('tgl_selesai', '<=' , $tanggal_akhir)
            ->where('branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->branchdetail)->count()){
        
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tahun = (new  kodebulan)->tahun($bulan);
        //dd($tahun);
        

        $tiket =(new Report_tiket)->data_tiket_done ($tanggal_awal, $tanggal_akhir, $dataBranch);
                
        $page = 'itsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_IT/Rproblem', compact('tiket','dataBranch','dataBulan', 'tahun','page','master_support'));
        }
        else{
            return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }
    }
    public function usertiketget(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $master_support=TiketIT::all();
        $bulan = $request->bulan;
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);

        if(Tiket::wherein('kategori_tiket',['IT Support','IT RPA'])->where('tgl_pengajuan', '>=' , $tanggal_awal)->where('tgl_pengajuan', '<=' , $tanggal_akhir)
            ->where('branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->branchdetail)->count()){
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tahun = (new  kodebulan)->tahun($bulan);
        $tiket =(new Report_tiket)->tiket_user ($tanggal_awal, $tanggal_akhir, $dataBranch);
        $tiket_user= (new Report_tiket)->data_tiket_user ($tiket);
        $total=$tiket->sum('total');
        //dd($total);
        $page = 'itsupport';
            return view('it_dt/Ticketing/Report_tiket/Report_IT/RTiketUser', compact('tiket_user','dataBranch','dataBulan', 'tahun','total','page','master_support'));
        }
        else{
            return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }
    
    }

    public function kinerjaitget(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $master_support=TiketIT::all();
        $bulan = $request->bulan;
        
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);
        if(Tiket::wherein('kategori_tiket',['IT Support','IT RPA'])->where('tgl_pengerjaan', '>=' , $tanggal_awal)->where('tgl_pengerjaan', '<=' , $tanggal_akhir)
        ->where('branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->branchdetail)->count()){
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tahun = (new  kodebulan)->tahun($bulan);
        $tiket =(new Report_tiket)->tiket_it ($tanggal_awal, $tanggal_akhir, $dataBranch);
        //jum per IT perhari
        $tiket_kinerja =(new Report_tiket)->jum_tiket_it ($tiket);
        // jum tiket perhari
        $tiket_jum =(new Report_tiket)->jum_tiket ($tiket, $dataBranch);
        //total per IT perbulan
        $tiket_total_it =(new Report_tiket)->tiket_total_it ($tiket, $tanggal_awal, $tanggal_akhir);
        //total tiket perbulan
        $total_tiket =(new Report_tiket)->TotalTiket ($tiket_total_it);
        
        $page = 'itsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_IT/RkinerjaIT', compact('total_tiket','tiket_total_it','tiket_jum','dataBranch','dataBulan', 'tahun','tiket_kinerja','page','master_support'));
        }
        else{
            return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }
              
    }
    public function Peminjamanget(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $master_support=TiketIT::all();
        $bulan = $request->bulan;
        
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);
        if(Tiket::wherein('kategori_tiket',['IT Support','IT RPA'])->where('tgl_pengerjaan', '>=' , $tanggal_awal)->where('tgl_pengerjaan', '<=' , $tanggal_akhir)
        ->where('branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->branchdetail)->count()){
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tahun = (new  kodebulan)->tahun($bulan);
        $tiket =(new Report_tiket)->peminjaman_it ($tanggal_awal, $tanggal_akhir, $dataBranch);
        $peminjaman_it=$tiket->groupBy('tgl_pengerjaan');
        // dd($peminjaman_it);
        $page = 'itsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_IT/RPeminjaman', compact('dataBranch','dataBulan', 'tahun','page','master_support','peminjaman_it'));
        }
        else{
            return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }
    }


    public function tiketdone(Request $request)
    {
        $done = Tiket::wherein('kategori_tiket',['IT Support','IT RPA'])->where('status','=','Done')->where('branch',auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)->count();
        $data = Tiket::wherein('kategori_tiket',['IT Support','IT RPA'])->where('status','Done')->where('branch',auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)->get();
        $dataTiketd = [];
        $dataTiketd= (new TiketAll)->TiketDoneIT($data);
        if ($request->ajax()) {
            return Datatables::of($dataTiketd)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('tiketit.edit', $row['id']) .'" class="btn btn-primary btn-sm" title="=Detail Ticket"><i class="fas fa-info-circle"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $master_support=TiketIT::all();
        $page = 'itsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_IT/seeDone', compact('dataTiketd','done','page','master_support'));
    }

    public function tiketdoneall(Request $request)
    {
        $master_support=TiketIT::all();
        $date=date('Y-m');
        $FirstDate = Carbon::createFromFormat('Y-m', $date)->firstOfMonth()->format('Y-m-d'); 
        $LastDate = Carbon::createFromFormat('Y-m', $date)->endOfMonth()->format('Y-m-d'); 
        $data = Tiket::wherein('kategori_tiket',['IT Support','IT RPA'])->where('status','Done')->where('tgl_selesai', '>=' , $FirstDate)
                        ->where('tgl_selesai', '<=' , $LastDate)->get();
        $dataTiketd= (new TiketAll)->TiketDoneIT($data);
        $page = 'itsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_IT/seeAllDone', compact('dataTiketd','page','FirstDate','LastDate','master_support'));
    }

    public function doneall_tgl(Request $request)
    {
        $master_support=TiketIT::all();
        $FirstDate = $request->tgl_awal; 
        $LastDate = $request->tgl_akhir;
        $data = Tiket::wherein('kategori_tiket',['IT Support','IT RPA'])->where('status','Done')->where('tgl_selesai', '>=' , $FirstDate)
                    ->where('tgl_selesai', '<=' , $LastDate)->get();
        $dataTiketd= (new TiketAll)->TiketDoneIT($data);

        $page = 'itsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_IT/seeAllDone', compact('dataTiketd','page','FirstDate','LastDate','master_support'));
    }
    
    public function Kinerja_dt(Request $request)
    {
        $dataBranch = Branch::all();
        $master_support=TiketIT::all();
        $page = 'dtsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_DT/KinerjaIT', compact('dataBranch','page','master_support'));
    }

    public function user_dt(Request $request)
    {
        $dataBranch = Branch::all();
        $master_support=TiketIT::all();
        $page = 'dtsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_DT/user', compact('dataBranch','page','master_support'));
    }

    public function Problem_dt(Request $request)
    {
        $dataBranch = Branch::all();
        $master_support=TiketIT::all();
        $page = 'dtsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_DT/problem', compact('dataBranch','page','master_support'));
    }
    public function Problemget_dt(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $master_support=TiketIT::all(); 
        $bulan = $request->bulan;
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);
        if(Tiket::where('kategori_tiket','IT DT')->where('tgl_selesai', '>=' , $tanggal_awal)->where('tgl_selesai', '<=' , $tanggal_akhir)
            ->where('branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->branchdetail)->count()){
        
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tahun = (new  kodebulan)->tahun($bulan);
        //dd($tahun);
        

        $tiket =(new Report_tiket)->tiket_done_dt ($tanggal_awal, $tanggal_akhir, $dataBranch);
                
        $page = 'dtsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_DT/Rproblem', compact('tiket','dataBranch','dataBulan', 'tahun','page','master_support'));
        }
        else{
            return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }
    }
    public function usertiketget_dt(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $master_support=TiketIT::all();
        $bulan = $request->bulan;
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);

        if(Tiket::where('kategori_tiket','IT DT')->where('tgl_pengajuan', '>=' , $tanggal_awal)->where('tgl_pengajuan', '<=' , $tanggal_akhir)
            ->where('branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->branchdetail)->count()){
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tahun = (new  kodebulan)->tahun($bulan);
        $tiket =(new Report_tiket)->tiket_user_dt ($tanggal_awal, $tanggal_akhir, $dataBranch);
        $tiket_user= (new Report_tiket)->data_tiket_user ($tiket);
        $total=$tiket->sum('total');
        //dd($total);
        $page = 'dtsupport';
            return view('it_dt/Ticketing/Report_tiket/Report_DT/RTiketUser', compact('tiket_user','dataBranch','dataBulan', 'tahun','total','page','master_support'));
        }
        else{
            return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }
    
    }

    public function kinerjaget_dt(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $master_support=TiketIT::all();
        $bulan = $request->bulan;
        
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);
        if(Tiket::where('kategori_tiket','IT DT')->where('tgl_pengerjaan', '>=' , $tanggal_awal)->where('tgl_pengerjaan', '<=' , $tanggal_akhir)
        ->where('branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->branchdetail)->count()){
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tahun = (new  kodebulan)->tahun($bulan);
        $tiket =(new Report_tiket)->tiket_dt ($tanggal_awal, $tanggal_akhir, $dataBranch);
        //jum per IT perhari
        $tiket_kinerja =(new Report_tiket)->jum_tiket_dt ($tiket);
        // jum tiket perhari
        $tiket_jum =(new Report_tiket)->sum_tiket_dt ($tiket, $dataBranch);
        //total per IT perbulan
        $tiket_total_it =(new Report_tiket)->tiket_total_dt ($tiket, $tanggal_awal, $tanggal_akhir);
        //total tiket perbulan
        $total_tiket =(new Report_tiket)->TotalTiket ($tiket_total_it);
        
        $page = 'dtsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_DT/RkinerjaIT', compact('total_tiket','tiket_total_it','tiket_jum','dataBranch','dataBulan', 'tahun','tiket_kinerja','page','master_support'));
        }
        else{
            return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }
              
    }

    public function tiketdoneall_dt(Request $request)
    {
        $master_support=TiketIT::all();
        $date=date('Y-m');
        $FirstDate = Carbon::createFromFormat('Y-m', $date)->firstOfMonth()->format('Y-m-d'); 
        $LastDate = Carbon::createFromFormat('Y-m', $date)->endOfMonth()->format('Y-m-d'); 
        $data = Tiket::where('kategori_tiket','IT DT')->where('status','Done')->where('tgl_selesai', '>=' , $FirstDate)
                        ->where('tgl_selesai', '<=' , $LastDate)->get();
        $dataTiketd= (new TiketAll)->TiketDoneIT($data);
        $page = 'dtsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_DT/seeAllDone', compact('dataTiketd','page','FirstDate','LastDate','master_support'));
    }

    public function doneall_tgl_dt(Request $request)
    {
        $master_support=TiketIT::all();
        $FirstDate = $request->tgl_awal; 
        $LastDate = $request->tgl_akhir;
        $data = Tiket::where('kategori_tiket','IT DT')->where('status','Done')->where('tgl_selesai', '>=' , $FirstDate)
                    ->where('tgl_selesai', '<=' , $LastDate)->get();
        $dataTiketd= (new TiketAll)->TiketDoneIT($data);

        $page = 'dtsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_DT/seeAllDone', compact('dataTiketd','page','FirstDate','LastDate','master_support'));
    }

    public function Kinerja_hrd(Request $request)
    {
        $dataBranch = Branch::all();
        $master_support=TiketIT::all();
        $page = 'hrdsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_HRGA/KinerjaIT', compact('dataBranch','page','master_support'));
    }

    public function user_hrd(Request $request)
    {
        $dataBranch = Branch::all();
        $master_support=TiketIT::all();
        $page = 'hrdsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_HRGA/user', compact('dataBranch','page','master_support'));
    }

    public function Problem_hrd(Request $request)
    {
        $dataBranch = Branch::all();
        $master_support=TiketIT::all();
        $page = 'hrdsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_HRGA/problem', compact('dataBranch','page','master_support'));
    }
    public function Problemget_hrd(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $master_support=TiketIT::all(); 
        $bulan = $request->bulan;
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);
        if(Tiket::where('kategori_tiket','HR & GA')->where('tgl_selesai', '>=' , $tanggal_awal)->where('tgl_selesai', '<=' , $tanggal_akhir)
            ->where('branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->branchdetail)->count()){
        
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tahun = (new  kodebulan)->tahun($bulan);
        //dd($tahun);
        

        $tiket =(new Report_tiket)->tiket_done_hrd ($tanggal_awal, $tanggal_akhir, $dataBranch);
                
        $page = 'hrdsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_HRGA/Rproblem', compact('tiket','dataBranch','dataBulan', 'tahun','page','master_support'));
        }
        else{
            return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }
    }
    public function usertiketget_hrd(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $master_support=TiketIT::all();
        $bulan = $request->bulan;
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);

        if(Tiket::where('kategori_tiket','HR & GA')->where('tgl_pengajuan', '>=' , $tanggal_awal)->where('tgl_pengajuan', '<=' , $tanggal_akhir)
            ->where('branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->branchdetail)->count()){
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tahun = (new  kodebulan)->tahun($bulan);
        $tiket =(new Report_tiket)->tiket_user_hrd ($tanggal_awal, $tanggal_akhir, $dataBranch);
        $tiket_user= (new Report_tiket)->data_tiket_user ($tiket);
        $total=$tiket->sum('total');
        //dd($total);
        $page = 'hrdsupport';
            return view('it_dt/Ticketing/Report_tiket/Report_HRGA/RTiketUser', compact('tiket_user','dataBranch','dataBulan', 'tahun','total','page','master_support'));
        }
        else{
            return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }
    
    }

    public function kinerjaget_hrd(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $master_support=TiketIT::all();
        $bulan = $request->bulan;
        
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);
        if(Tiket::where('kategori_tiket','HR & GA')->where('tgl_pengerjaan', '>=' , $tanggal_awal)->where('tgl_pengerjaan', '<=' , $tanggal_akhir)
        ->where('branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->branchdetail)->count()){
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tahun = (new  kodebulan)->tahun($bulan);
        $tiket =(new Report_tiket)->tiket_hrd ($tanggal_awal, $tanggal_akhir, $dataBranch);
        $tiket_kinerja =(new Report_tiket)->jum_tiket_hrd ($tiket);
        $tiket_jum =(new Report_tiket)->sum_tiket_hrd ($tiket, $dataBranch);
        $tiket_total_it =(new Report_tiket)->tiket_total_hrd ($tiket, $tanggal_awal, $tanggal_akhir);
        $total_tiket =(new Report_tiket)->TotalTiket ($tiket_total_it);
        
        $page = 'hrdsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_HRGA/RkinerjaIT', compact('total_tiket','tiket_total_it','tiket_jum','dataBranch','dataBulan', 'tahun','tiket_kinerja','page','master_support'));
        }
        else{
            return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }
              
    }

    public function tiketdoneall_hrd(Request $request)
    {
        $master_support=TiketIT::all();
        $date=date('Y-m');
        $FirstDate = Carbon::createFromFormat('Y-m', $date)->firstOfMonth()->format('Y-m-d'); 
        $LastDate = Carbon::createFromFormat('Y-m', $date)->endOfMonth()->format('Y-m-d'); 
        $data = Tiket::where('kategori_tiket','HR & GA')->where('status','Done')->where('tgl_selesai', '>=' , $FirstDate)
                        ->where('tgl_selesai', '<=' , $LastDate)->get();
        $dataTiketd= (new TiketAll)->TiketDoneIT($data);
        $page = 'hrdsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_HRGA/seeAllDone', compact('dataTiketd','page','FirstDate','LastDate','master_support'));
    }

    public function doneall_tgl_hrd(Request $request)
    {
        $master_support=TiketIT::all();
        $FirstDate = $request->tgl_awal; 
        $LastDate = $request->tgl_akhir;
        $data = Tiket::where('kategori_tiket','HR & GA')->where('status','Done')->where('tgl_selesai', '>=' , $FirstDate)
                    ->where('tgl_selesai', '<=' , $LastDate)->get();
        $dataTiketd= (new TiketAll)->TiketDoneIT($data);

        $page = 'hrdsupport';
        return view('it_dt/Ticketing/Report_tiket/Report_HRGA/seeAllDone', compact('dataTiketd','page','FirstDate','LastDate','master_support'));
    }

    public function BookingReport(Request $request)
    {
        $master_support=TiketIT::all();
        $FirstDate = date('Y-m-d');
        $LastDate = date('Y-m-d');
        $data = TiketBookingDetail::where('is_cancel',null)->where('tanggal_booking', $FirstDate)->get();
        $dataTiketd= (new TiketAll)->doneBookingIDAdmin2($data);
        $page = 'report_Bo';
        return view('it_dt/Ticketing/Report_tiket/Report_HRGA/report_booking', compact('dataTiketd','page','FirstDate','LastDate','master_support'));
    }

        public function BookingReportTanggal(Request $request)
    {
        $master_support=TiketIT::all();
        $FirstDate = $request->tanggal_booking; 
        $LastDate = $request->tgl_akhir;
        
        $data = TiketBookingDetail::where('is_cancel',null)->where('tanggal_booking','>=',$FirstDate)
                                ->where('tanggal_booking', '<=' , $LastDate)
                                ->orderBy('booking_id','asc')
                                ->get ();

        $dataTiketd= (new TiketAll)->doneBookingIDAdmin2($data);

        $page = 'report_Bo';
        return view('it_dt/Ticketing/Report_tiket/Report_HRGA/report_booking', compact('dataTiketd','page','FirstDate','LastDate','master_support'));
    }

    //tiket Documen
    public function ExportExcel_doc(Request $request)
    {
        $tgl_awal=$request->tgl_awal;
        $tgl_akhir=$request->tgl_akhir;
        $data = TicketDoc::where('tanggal','>=',$tgl_awal)->where('tanggal','<=',$tgl_akhir)->where('status','Done')->get();
      
        return Excel::download(new TicketDocExport($data),'IMPORT '.$tgl_awal.'_s-d_'.$tgl_akhir.'.xlsx');
    }
    public function ExportExcel_docall(Request $request)
    {
        $tgl_awal=$request->tgl_awal;
        $tgl_akhir=$request->tgl_akhir;
        $data = TicketDoc::where('tgl_pengajuan','>=',$tgl_awal)->where('tgl_pengajuan','<=',$tgl_akhir)->get();
      
        return Excel::download(new TicketDocExport($data),'IMPORT '.$tgl_awal.'_s-d_'.$tgl_akhir.'.xlsx');
    }

    //tiket Accounting
    public function Excel_acc_jde(Request $request)
    {
        $tgl_awal=$request->tgl_awal;
        $tgl_akhir=$request->tgl_akhir;
        $data = TicketAcc::where('tgl_done','>=',$tgl_awal)->where('tgl_done','<=',$tgl_akhir)->where('status_tiket','Done')->get();
        return Excel::download(new TicketAccJdeExport($data),'Accounting'.$tgl_awal.'_s-d_'.$tgl_akhir.'.xlsx');
    }

    public function Excel_acc_tfr(Request $request)
    {
        $tgl_awal=$request->tgl_awal;
        $tgl_akhir=$request->tgl_akhir;
        $data = TicketAcc::where('tgl_done','>=',$tgl_awal)->where('tgl_done','<=',$tgl_akhir)->where('status_tiket','Done')->where('kategori','Transfer')->get();
        return Excel::download(new TicketAccJdeExportTrf($data),'Accounting_Trf'.$tgl_awal.'_s-d_'.$tgl_akhir.'.xlsx');
    }
}