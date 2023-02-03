<?php

namespace App\Http\Controllers\HR_GA\AuditBuyer;

use DB;
use Auth;
use DataTables;
use App\Branch;
use Carbon\Carbon;
use Illuminate\Http\Request;
Use App\Models\HR_GA\AuditBuyer\ItemMaster;
Use App\Models\HR_GA\AuditBuyer\ItemLokasi;
Use App\Models\HR_GA\AuditBuyer\EmerExit;
use App\Services\HR_GA\AuditBuyer\CheckValidation;
use App\Http\Controllers\Controller;
use App\Services\HR_GA\AuditBuyer\AuditBuyer;

class EmerExitController extends Controller
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

    public function f_scant(Request $request)
    {
        $page = 'Controll';
        return view('hr_ga/AuditBuyer/EmerExit/ScanEmerExit', compact('page'));
    }

    public function controll(Request $request)
    {
        $todayDate = date("Y-m-d");
        $nik_petugas = Auth::user("nik")->nik;
        $kode_lokasi= $request->kode_lokasi;
        $bulan = date("Y-m");
        // dd($bulan);
            $msg="";
            if(CheckValidation::jml_controll_emerexit($kode_lokasi, $bulan)) 
                $msg="Sudah melakukan pengecekan dibulan yang sama ";
            else if(CheckValidation::check_item_emerexit($kode_lokasi)) 
                $msg="Item tidak ditemukan";
            if ($msg)
                return redirect()->route('hr_ga.emerexit.scant')->with(['error' => $msg]);
                
        $data = ItemLokasi::where('id_item','4')->where('kode_lokasi',$kode_lokasi)->first();
    //   dd($data);
        $page = 'Controll';
        return view('hr_ga/AuditBuyer/EmerExit/addcontroll', compact('data','todayDate','page'));
        }
    public function store(Request $request){
        $input = $request->all(); 
        $bulan = date("Y-m");
        $tanggal_awal= Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y-m-d');
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan)->endOfMonth()->format('Y-m-d');
        $data=EmerExit::where('kode_lokasi',$request->kode_lokasi)->where('tgl_periksa','>=', $tanggal_awal)->where('tgl_periksa','<=', $tanggal_akhir)->count();               
        
        if($data<='0'){
            EmerExit::create($input);
            $Admin_hrd = (new  AuditBuyer)->Admin_hrd();
            if(($request->ada_exit=='Tidak')||($request->kondisi_lampu=='Mati')||($request->kebersihan=='Kotor')){
                foreach ($Admin_hrd as $key => $value) {
                    DB::table('notification')->insert([
                        'connection_name'=>"mysql_audit_buyer",
                        'table_name'=>"emergency_exit",
                        'alert_level'=>"DANGER",
                        'id_int'=> $request->id_emerexit,
                        'nik'=>$value,
                        'url'=>"hrga.index_auditbuyer",
                        'title'=>"Emergency Exit",
                        'desc'=>'Ada masalah di lokasi'.'-'.substr($request->nama_lokasi, 0, 30) . '...',
                        'is_read'=>"0"
                    ]);
                }
            }
            return redirect()->route('hr_ga.emerexit.scant')->with('success', 'successfully saved');
        }
        else{
            return redirect()->route('hr_ga.emerexit.scant')->with('success', 'successfully saved');
        }
    }

    public function update_perbaikan(Request $request)
        {
            $id = $request->id;
            $validatedData = [
                'perbaikan' => $request->perbaikan,
                
            ];
            EmerExit::whereId($id)->update($validatedData);
            return redirect()->route('hrga.index_auditbuyer')->with('success', ' successfully updated');
    }

    public function update_finish(Request $request)
        {
            $id = $request->id;
            $validatedData = [
                'ada_exit' => $request->ada_exit,
                'kondisi_lampu' => $request->kondisi_lampu,
                'kebersihan' => $request->kebersihan,
                'finish' => $request->finish,
                
            ];
            // dd( $validatedData);
            EmerExit::whereId($id)->update($validatedData);
        return redirect()->route('hrga.index_auditbuyer')->with('success', ' successfully updated');
    }
}