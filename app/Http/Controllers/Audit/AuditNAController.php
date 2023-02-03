<?php

namespace App\Http\Controllers\Audit;
use DB;
use Auth;
use App\Branch;
Use App\Models\Audit\ujina;
Use App\Models\Audit\tmpna;
Use App\Models\Audit\UserGudang;
use App\Services\Audit\audit;
use App\Services\Audit\gudang;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;


class AuditNAController extends Controller
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

    //sudah tarik langsung di tmpna
    public function form_na1()
    {  
        $dataBranch = Branch::where('kode_jde','!=', null)->get();
        $gl_class = (new  audit)->gl_class();
        $dc_ty = (new  audit)->dc_ty();
        $page = 'Audit';
        return view('audit/Uji_TF/UjiNa/form-na1', compact('dataBranch','gl_class','dc_ty','page'));
    }

    public function get_data_na1(Request $request)
    {       $dataBranch = Branch::findorfail($request->branch);
            $branch= $dataBranch->kode_jde;
            $tgl_awal=$request->tgl_awal;
            $tgl_akhir=$request->tgl_akhir;
            $gl_class=$request->gl_class;
            $dc_ty=$request->dc_ty;
        if(($gl_class==null) OR ($dc_ty== null)){
                return back()->with("start", 'GL Class And DC.TY Must Be Check !');}
        else{
            $data_ujina= (new audit)->tmpna($branch, $tgl_awal, $tgl_akhir, $gl_class, $dc_ty);
            $records= (new audit)->anomali_na($data_ujina);

        $page = 'Audit';
        return view('audit/Uji_TF/UjiNa/hasilNa1', compact('records','page','branch','branch', 'tgl_awal', 'tgl_akhir', 'gl_class', 'dc_ty'));
        }
    }


    public function form_na_all()
    {  
        $dataBranch = Branch::where('kode_jde','!=', null)->get();
        // $gl_class = (new  audit)->gl_class();
        // $dc_ty = (new  audit)->dc_ty();
        $page = 'Audit';
        return view('audit/Uji_TF/UjiNa/form-na-all', compact('dataBranch','page'));
    }

    public function get_data_na_all(Request $request)
    {       $dataBranch = Branch::findorfail($request->branch);
            $branch= $dataBranch->kode_jde;
            $tgl_awal=$request->tgl_awal;
            $tgl_akhir=$request->tgl_akhir;
            // $gl_class=$request->gl_class;
            // $dc_ty=$request->dc_ty;
            $data_ujina= (new audit)->Na_All($branch, $tgl_awal, $tgl_akhir);
            $records= (new audit)->anomali_na($data_ujina);

        $page = 'Audit';
        return view('audit/Uji_TF/UjiNa/hasilNa1', compact('records','page','branch','branch', 'tgl_awal', 'tgl_akhir'));
    }

    public function form_na_gudang()
    {  
        $dataBranch = Branch::where('kode_jde','!=', null)->get();
        $user = UserGudang::all();
        $page = 'gudang';
        return view('audit/Uji_TF/gudang/form-na', compact('dataBranch','page','user'));
    }

    public function get_data_na_gudang(Request $request)
    {       $dataBranch = Branch::findorfail($request->branch);
            $branch= $dataBranch->kode_jde;
            $tgl_awal=$request->tgl_awal;
            $tgl_akhir=$request->tgl_akhir;
            $user=$request->user;
           
            $data_ujina= (new gudang)->Na_gudang($branch, $tgl_awal, $tgl_akhir, $user);
            $records= (new audit)->anomali_na($data_ujina);
            // dd($records);

        $page = 'gudang';
        return view('audit/Uji_TF/UjiNa/hasilNa1', compact('records','page','branch','user', 'tgl_awal', 'tgl_akhir'));
    }


    //konfirmasi oleh gudang (pembalaan)
    public function create(Request $request, $F4111_UKID)
	{
    
        $data = tmpna::findOrFail($F4111_UKID);
        $nik= Auth::user("nik")->nik;
        if(UserGudang::where('nik',$nik)->count()){
            $user_gudang=UserGudang::where('nik',$nik)->first('username_jde');
            $user=$user_gudang->username_jde;
        }
        else{
            $user=null;
        }
        $page = 'Audit';
        return view('audit/Uji_TF/UjiNa/add_konfir', compact('data','page','user'));
	}
    public function konfir(Request $request)
    {
        $F4111_UKID = $request->F4111_UKID;
            $validatedData = [
                'status_na' =>$request->status_na,
                'konfirmasi1' => $request->konfirmasi1,
            ];
            // dd($validatedData);
            tmpna::whereF4111_ukid($F4111_UKID)->update($validatedData);
        $records=tmpna::where('status_na','2')->get();
        $title = 'Anomali #N/A dikonfirmasi Gudang';
        $page = 'konfirTF';

        return view('audit/Uji_TF/UjiNa/konfirmasi', compact('records','page','title'));
    }


    // konfirmasi oleh audit
    public function konfir_audit($F4111_UKID)
    {
        $data = tmpna::findOrFail($F4111_UKID);
        // dd($data);
        $page = 'konfirTF';
        return view('audit/Uji_TF/UjiNa/edit', compact('data','page'));
    }
    public function update_diterima(Request $request)
    {
         $F4111_UKID = $request->F4111_UKID;
                // dd($id);
                $validatedData = [
                    'status_na'=> $request->status_na,
                    'konfirmasi2'=> $request->konfirmasi2,
                    'konfirmasi3'=> $request->konfirmasi3,
                ];
        
        tmpna::whereF4111_ukid($F4111_UKID)->update($validatedData);
        return redirect()->route('auditna.diterima')->with('success', 'successfully updated');
    }
    public function update_pertimbangkan(Request $request)
    {
         $F4111_UKID = $request->F4111_UKID;
                // dd($id);
                $validatedData = [
                    'status_na'=> $request->status_na,
                    'konfirmasi2'=> $request->konfirmasi2,
                    'konfirmasi3'=> $request->konfirmasi3,
                ];
        
        tmpna::whereF4111_ukid($F4111_UKID)->update($validatedData);
        return redirect()->route('auditna.dipertimbangkan')->with('success', 'successfully updated');
    }
    public function update_jde(Request $request)
    {
         $F4111_UKID = $request->F4111_UKID;
                // dd($id);
                $validatedData = [
                    'status_na'=> $request->status_na,
                    'konfirmasi2'=> $request->konfirmasi2,
                    'konfirmasi3'=> $request->konfirmasi3,
                ];
        
        tmpna::whereF4111_ukid($F4111_UKID)->update($validatedData);
        return redirect()->route('auditna.jde')->with('success', 'successfully updated');
    }

    //See temuan
    public function konfir_gudang(Request $request)
    {
        $records=tmpna::where('status_na','2')->get();
        $title = 'Anomali #N/A dikonfirmasi Gudang';
        $page = 'konfirTF';
        return view('audit/Uji_TF/UjiNa/konfirmasi', compact('records','page','title'));

    }
    public function AccAudit(Request $request)
    {
        $records=tmpna::where('status_na','4')->get();
        $title = 'Konfirmasi Anomali #N/A Diterima';
        $page = 'konfirTF';
        return view('audit/Uji_TF/UjiNa/konfirmasi_terima', compact('records','page','title'));

    }
    public function pertimbanganAudit(Request $request)
    {
        $records=tmpna::where('status_na','3')->get();
        $title = 'Konfirmasi Anomali #N/A Dipertimbangkan';
        $page = 'konfirTF';
        return view('audit/Uji_TF/UjiNa/konfirmasi_pertimbangkan', compact('records','page','title'));

    }
    public function jde(Request $request)
    {
        $records=tmpna::where('status_na','5')->get();
        $title = 'Anomali #N/A diperbaiki JDE';
        $tgl_awal= '2022-01-01';
        $tgl_akhir = '2022-01-12';
        $c=tmpna::count();
        $y=tmpna::max('F4111_DGL');
        $a=ujina::whereBetween('F4111_DGL', [$tgl_awal, $tgl_akhir])->where('F4111_GLPT','!=','INGA')
        ->where('F4111_GLPT','!=','INSP')->where('F4111_GLPT','!=','INFO')->where('F4111_GLPT','!=','SISA')
        ->where('F4111_GLPT','!=','INSA')
        ->where('F4111_DCT','!=','IM')->where('F4111_DCT','!=','IN')->where('F4111_DCT','!=','IR')
        ->where('F4111_DCT','!=','IT')->count();
        $coba=ujina::where('F4111_UKID','12889700')->get();
        // dd($y);
        $page = 'konfirTF';
        return view('audit/Uji_TF/UjiNa/konfirmasi_jde', compact('records','page','title'));

    }


    
}