<?php

namespace App\Http\Controllers\HR_GA\AuditBuyer;

use DB;
use Auth;
use DataTables;
use App\Branch;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Models\HR_GA\AuditBuyer\SmokeDet;
Use App\Models\HR_GA\AuditBuyer\ItemMaster;
Use App\Models\HR_GA\AuditBuyer\ItemLokasi;
use App\Services\HR_GA\AuditBuyer\AuditBuyer;
use App\Services\HR_GA\AuditBuyer\CheckValidation;


class SmokeDetController extends Controller
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
        return view('hr_ga/AuditBuyer/SmokeDet/ScanSmokeDet', compact('page'));
    }

    public function controll(Request $request)
    {
        $todayDate = date("Y-m-d");
        $nik_petugas = Auth::user("nik")->nik;
        $kode_lokasi= $request->kode_lokasi;
        $bulan = date("Y-m");
        // dd($bulan);
            $msg="";
            if(CheckValidation::jml_controll_smokedet($kode_lokasi, $bulan)) 
                $msg="Sudah melakukan pengecekan dibulan yang sama ";
            else if(CheckValidation::check_item_smokedet($kode_lokasi)) 
                $msg="Item tidak ditemukan";
            if ($msg)
                return redirect()->route('hr_ga.smokedet.scant')->with(['error' => $msg]);
                
        $data = ItemLokasi::where('id_item','2')->where('kode_lokasi',$kode_lokasi)->first();
    //   dd($data);
        $page = 'Controll';
        return view('hr_ga/AuditBuyer/SmokeDet/addcontroll', compact('data','todayDate','page'));
        }
    public function store(Request $request){
        $input = $request->all();  
        $bulan = date("Y-m");
        $tanggal_awal= Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y-m-d');
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan)->endOfMonth()->format('Y-m-d');
        $data=SmokeDet::where('kode_lokasi',$request->kode_lokasi)->where('tgl_periksa','>=', $tanggal_awal)->where('tgl_periksa','<=', $tanggal_akhir)->count();               
        if($data<='0'){
            SmokeDet::create($input);
            $Admin_hrd = (new  AuditBuyer)->Admin_hrd();
            if(($request->ada_smoke=='Tidak')||($request->fungsi=='Tidak')||($request->baterai=='Rusak')){
                foreach ($Admin_hrd as $key => $value) {
                    DB::table('notification')->insert([
                        'connection_name'=>"mysql_audit_buyer",
                        'table_name'=>"smoke_det",
                        'alert_level'=>"DANGER",
                        'id_int'=> $request->id_smokedet,
                        'nik'=>$value,
                        'url'=>"hrga.index_auditbuyer",
                        'title'=>"Smoke Detector",
                        'desc'=>'Ada masalah di lokasi'.'-'.substr($request->nama_lokasi, 0, 30) . '...',
                        'is_read'=>"0"
                    ]);
                }
            }
            return redirect()->route('hr_ga.smokedet.scant')->with('success', 'successfully saved');
        }
        else{
            return redirect()->route('hr_ga.smokedet.scant')->with('success', 'successfully saved');
        }
       
    
    }

    public function update_perbaikan(Request $request)
        {
            $id = $request->id;
            $validatedData = [
                'perbaikan' => $request->perbaikan,
                
            ];
            SmokeDet::whereId($id)->update($validatedData);
            return redirect()->route('hrga.index_auditbuyer')->with('success', ' successfully updated');
    }

    public function update_finish(Request $request)
        {
            $id = $request->id;
            $validatedData = [
                'ada_smoke' => $request->ada_smoke,
                'fungsi' => $request->fungsi,
                'baterai' => $request->baterai,
                'finish' => $request->finish,
                
            ];
            // dd( $validatedData);
            SmokeDet::whereId($id)->update($validatedData);
        return redirect()->route('hrga.index_auditbuyer')->with('success', ' successfully updated');
    }
}