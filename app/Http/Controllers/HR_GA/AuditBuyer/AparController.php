<?php

namespace App\Http\Controllers\HR_GA\AuditBuyer;

Use App\Models\HR_GA\AuditBuyer\AlarmBtn;
use DB;
use Auth;
use DataTables;
use App\Branch;
use Carbon\Carbon;
use Illuminate\Http\Request;
Use App\Models\HR_GA\AuditBuyer\ItemMaster;
Use App\Models\HR_GA\AuditBuyer\ItemLokasi;
Use App\Models\HR_GA\AuditBuyer\Apar;
use App\Services\HR_GA\AuditBuyer\CheckValidation;
use App\Services\HR_GA\AuditBuyer\AuditBuyer;
use App\Http\Controllers\Controller;

class AparController extends Controller
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
        return view('hr_ga/AuditBuyer/apar/ScanApar', compact('page'));
    }

    public function controll(Request $request)
    {
        $todayDate = date("Y-m-d");
        $nik_petugas = Auth::user("nik")->nik;
        $kode_lokasi= $request->kode_lokasi;
        $bulan = date("Y-m");
            $msg="";
            if(CheckValidation::jml_controll_apar($kode_lokasi, $bulan)) 
                $msg="Sudah melakukan pengecekan dibulan yang sama ";
            else if(CheckValidation::check_item_apar($kode_lokasi)) 
                $msg="Item tidak ditemukan";
            if ($msg)
                return redirect()->route('hr_ga.apar.scant')->with(['error' => $msg]);
                
        $data = ItemLokasi::where('id_item','3')->where('kode_lokasi',$kode_lokasi)->first();
    //   dd($data);
        $page = 'Controll';
        return view('hr_ga/AuditBuyer/Apar/addcontroll', compact('data','todayDate','page'));
        }
    public function store(Request $request){
        $input = $request->all();
        $bulan = date("Y-m");
        $tanggal_awal= Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y-m-d');
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan)->endOfMonth()->format('Y-m-d');
        $data=Apar::where('kode_lokasi',$request->kode_lokasi)->where('tgl_periksa','>=', $tanggal_awal)->where('tgl_periksa','<=', $tanggal_akhir)->count();               
        
        if($data<='0'){
            $sign=$request->kondisi_sign;
            $kondisi_sign = implode(", ", $sign);
            $input=[
                'item'          =>$request->item,
                'kode_lokasi'   =>$request->kode_lokasi,
                'nama_lokasi'   =>$request->nama_lokasi,
                'tgl_periksa'   =>$request->tgl_periksa,
                'kode_branch'   =>$request->kode_branch,
                'branchdetail'  =>$request->branchdetail,
                'tekanan'       =>$request->tekanan,
                'pin'           =>$request->pin,
                'kondisi_selang'=>$request->kondisi_selang,
                'berat_tabung'  =>$request->berat_tabung,
                'masa_berlaku'  =>$request->masa_berlaku,
                'kondisi_tuas'  =>$request->kondisi_tuas,
                'garis_merah'   =>$request->garis_merah,
                'kondisi_sign'  =>$kondisi_sign,
                'petugas'       =>$request->petugas,
            ];   
            // dd($input);               
            Apar::create($input);
            $Admin_hrd = (new  AuditBuyer)->Admin_hrd();
            if(($request->tekanan=='Rendah')||($request->pin=='Tidak')||($request->kondisi_selang=='Rusak')
                ||($request->kondisi_tuas=='Tidak')||($request->garis_merah=='Tidak')){
                foreach ($Admin_hrd as $key => $value) {
                    DB::table('notification')->insert([
                        'connection_name'=>"mysql_audit_buyer",
                        'table_name'=>"apar",
                        'alert_level'=>"DANGER",
                        'id_int'=> $request->id_apar,
                        'nik'=>$value,
                        'url'=>"hrga.index_auditbuyer",
                        'title'=>"APAR",
                        'desc'=>'Ada masalah di lokasi'.'-'.substr($request->nama_lokasi, 0, 30) . '...',
                        'is_read'=>"0"
                    ]);
                }
            }
            
            return redirect()->route('hr_ga.apar.scant')->with('success', 'successfully saved');
        }
        else{
            return redirect()->route('hr_ga.apar.scant')->with('success', 'successfully saved');
        }

    }

    public function update_perbaikan(Request $request)
        {
            $id = $request->id;
            $validatedData = [
                'perbaikan' => $request->perbaikan,
                
            ];
            // dd( $validatedData);
            Apar::whereId($id)->update($validatedData);
            return redirect()->route('hrga.index_auditbuyer')->with('success', ' successfully updated');
    }

    public function update_finish(Request $request)
        {
            $id = $request->id;
            $sign=$request->kondisi_sign;
            $kondisi_sign = implode(", ", $sign);
            $validatedData = [
                'tekanan'       =>$request->tekanan,
                'pin'           =>$request->pin,
                'kondisi_selang'=>$request->kondisi_selang,
                'berat_tabung'  =>$request->berat_tabung,
                'masa_berlaku'  =>$request->masa_berlaku,
                'kondisi_tuas'  =>$request->kondisi_tuas,
                'garis_merah'   =>$request->garis_merah,
                'kondisi_sign'  =>$kondisi_sign,
                'finish'        => $request->finish,
                
            ];
            // dd( $validatedData);
            Apar::whereId($id)->update($validatedData);
        return redirect()->route('hrga.index_auditbuyer')->with('success', ' successfully updated');
    }


}