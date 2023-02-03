<?php

namespace App\Http\Controllers\Audit;
use DB;
use Auth;
use App\Branch;
Use App\Models\Audit\uji_pemasukan;
Use App\Models\Audit\tmptf;
Use App\Models\Audit\pemasukan;
use App\Services\Audit\audit;
use App\Services\Audit\gudang;
Use App\Models\Audit\UserGudang;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Controllers\Controller;


class AuditPemasukanController extends Controller
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
    public function index()
    {
        $page = 'dashboard';
        return view('audit/Uji_TF/index', compact('page'));

    }

    public function form()
    {  
        $dataBranch = Branch::where('kode_jde','!=', null)->get();
        $gl_class = (new  audit)->gl_class();
        $dc_ty = (new  audit)->dc_ty();
        //dd($gl_class);
        $page = 'Audit';
        return view('audit/Uji_TF/UjiTF_pemasukan/form', compact('dataBranch','gl_class','dc_ty','page'));
    }

    public function get_data(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $branch= $dataBranch->kode_jde;
       
        $tgl_awal=$request->tgl_awal;
        $tgl_akhir=$request->tgl_akhir;
        $gl_class=$request->gl_class;
        $dc_ty=$request->dc_ty;

        // dd($gl_class);

        $data_uji = (new audit)->uji_pemasukan($branch, $tgl_awal, $tgl_akhir, $gl_class, $dc_ty);
        // dd($data_uji);
        $data = (new audit)->records_pemasukan($data_uji);
        // dd($data);
        $tmp_tf= tmptf::all();
        $coba= collect($data)->groupBy('F564111C_UKID')->toArray();
        $tes= collect($tmp_tf)->groupBy('F564111C_UKID')->toArray();
        $records=array_diff_key($coba,$tes);
        // dd($records);
        $page = 'Audit';
        return view('audit/Uji_TF/UjiTF_pemasukan/audit', compact('records','page','page','branch','branch', 'tgl_awal', 'tgl_akhir', 'gl_class', 'dc_ty'));
    }

    public function formf()
    {  
        $dataBranch = Branch::where('kode_jde','!=', null)->get();
        $gl_class = (new  audit)->gl_class();
        $dc_ty = (new  audit)->dc_ty();
        //dd($gl_class);
        $page = 'Audit';
        return view('audit/Uji_TF/UjiTF_pemasukan/formfalse', compact('dataBranch','page','gl_class','dc_ty'));
    }

    public function get_dataf(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $branch= $dataBranch->kode_jde;
        $gl_class=$request->gl_class;
        $dc_ty=$request->dc_ty;
        $tgl_awal=$request->tgl_awal;
        $tgl_akhir=$request->tgl_akhir;
        // $a=['INAC', 'INFA', 'INPA', 'ININ', 'INUM'];
        // dd($dc_ty);
        // dd($a);
      if(($gl_class==null) OR ($dc_ty== null)){
        return back()->with("start", 'GL Class And DC.TY Must Be Check !');}
       else{
        $data_uji = (new audit)->uji_pemasukanf($branch, $tgl_awal, $tgl_akhir,$gl_class,$dc_ty);
        $data = (new audit)->records_pemasukanf($data_uji);
        $tmp_tf= tmptf::all();
        $coba= collect($data)->groupBy('F564111C_UKID')->toArray();
        $tes= collect($tmp_tf)->groupBy('F564111C_UKID')->toArray();
        $records=array_diff_key($coba,$tes);
        $page = 'Auidit';
        return view('audit/Uji_TF/UjiTF_pemasukan/audit', compact('records','page','page','branch','branch', 'tgl_awal', 'tgl_akhir', 'gl_class', 'dc_ty'));
       }
    }


    public function form_gudang()
    {  
        $dataBranch = Branch::where('kode_jde','!=', null)->get();
        $user = UserGudang::all();
        $page = 'gudang';
        return view('audit/Uji_TF/gudang/form_pemasukan', compact('dataBranch','page','user'));
    }

    public function get_data_gudang(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $branch= $dataBranch->kode_jde;
        $user=$request->user;
        $tgl_awal=$request->tgl_awal;
        $tgl_akhir=$request->tgl_akhir;
      
        $data_uji = (new gudang)->gudang_pemasukan($branch, $tgl_awal, $tgl_akhir,$user);
        $data = (new audit)->records_pemasukanf($data_uji);
        $tmp_tf= tmptf::all();
        $coba= collect($data)->groupBy('F564111C_UKID')->toArray();
        $tes= collect($tmp_tf)->groupBy('F564111C_UKID')->toArray();
        $records=array_diff_key($coba,$tes);
        $page = 'gudang';
        return view('audit/Uji_TF/UjiTF_pemasukan/audit', compact('records','page','page','branch','branch', 'tgl_awal', 'tgl_akhir'));
    }

    //create konfirmasi anomali oleh gudang
    public function create_konfir(Request $request, $F564111C_UKID)
	{
        $data = uji_pemasukan::findOrFail($F564111C_UKID);
        $nik= Auth::user("nik")->nik;
        if(UserGudang::where('nik',$nik)->count()){
            $user_gudang=UserGudang::where('nik',$nik)->first('username_jde');
            $user=$user_gudang->username_jde;
        }
        else{
            $user=null;
        }
        // dd($user);
        // dd($user_gudang);
        $page = 'DAuditp';
        return view('audit/Uji_TF/UjiTF_pemasukan/add', compact('data','page','user'));
	}
    public function store(Request $request)
    {
        $data=[
            'F564111C_UKID' =>$request->F564111C_UKID,
            'F564111C_ITM'  =>$request->F564111C_ITM,
            'F564111C_MCU'  =>$request->F564111C_MCU,
            'F564111C_DCT'  =>$request->F564111C_DCT,
            'F564111C_TRDJ' =>$request->F564111C_TRDJ,
            'F564111C_DGL'  =>$request->F564111C_DGL,
            'F564111C_LOTN' =>$request->F564111C_LOTN,
            'F564111C_TRQT' =>$request->F564111C_TRQT,
            'F564111C_TRUM' =>$request->F564111C_TRUM,
            'F564111C_DSCRP'=>$request->F564111C_DSCRP,
            'F564111C_DSC1' =>$request->F564111C_DSC1,
            'F4111_DCT'     =>$request->F4111_DCT,
            'F4111_LOTN'    =>$request->F4111_LOTN,   
            'F4111_GLPT'    =>$request->F4111_GLPT,
            'F4111_ITM'     =>$request->F4111_ITM,
            'F4111_TRQT'    =>$request->F4111_TRQT,
            'F4111_TRUM'    =>$request->F4111_TRUM,
            'F4111_MCU'     =>$request->F4111_MCU,
            'F4111_TRDJ'    =>$request->F4111_TRDJ,
            'F4111_DGL'     =>$request->F4111_DGL,
            'F4111_USER'    =>$request->F4111_USER,
            'Uji_ITM'       =>$request->Uji_ITM,
            'Uji_QTY'       =>$request->Uji_QTY,
            'Uji_UOM'       =>$request->Uji_UOM,
            'Uji_BRANCH'    =>$request->Uji_BRANCH,
            'Uji_Tanggal_Trans_GL' =>$request->Uji_Tanggal_Trans_GL,
            'status_tf'     =>$request->status_tf,
            'konfirmasi_gudang'=>$request->konfirmasi_gudang,
            'F4111_DOCO'    =>$request->F4111_DOCO,
            'F4111_UNCS'    =>$request->F4111_UNCS,
            'F4111_PAID'    =>$request->F4111_PAID,
        ];
        //  dd($data);
        tmptf::create($data);

        $data_uji=tmptf::where('status_tf','2')->get();
        $records  = (new audit)->data_konfir($data_uji);
        $title = 'Konfirmasi Gudang #T/F';
        $page = 'DAuditp';
        return view('audit/Uji_TF/UjiTF_pemasukan/seekonfirmasi', compact('records','page','title'));
    }


    //update atau konfirmasi oleh audit
     public function konfir_audit($F564111C_UKID)
     {
         $data = tmptf::findOrFail($F564111C_UKID);
         // dd($data);
         $page = 'konfirTF';
         return view('audit/Uji_TF/UjiTF_pemasukan/edit', compact('data','page'));
     }
     public function update_diterima(Request $request)
     {
          $F564111C_UKID = $request->F564111C_UKID;
                 // dd($id);
                 $validatedData = [
                     'status_tf'=> $request->status_tf,
                     'konfirmasi_audit'=> $request->konfirmasi_audit,
                     'dipertimbangkan'=> $request->dipertimbangkan,
                 ];
         
         tmptf::whereF564111c_ukid($F564111C_UKID)->update($validatedData);
         return redirect()->route('audittfp.diterima')->with('success', 'successfully updated');
     }
     public function update_pertimbangkan(Request $request)
     {
          $F564111C_UKID = $request->F564111C_UKID;
                 // dd($id);
                 $validatedData = [
                     'status_tf'=> $request->status_tf,
                     'konfirmasi_audit'=> $request->konfirmasi_audit,
                     'dipertimbangkan'=> $request->dipertimbangkan,
                 ];
         
         tmptf::whereF564111c_ukid($F564111C_UKID)->update($validatedData);
         return redirect()->route('audittfp.dipertimbangkan')->with('success', 'successfully updated');
     }
     public function update_jde(Request $request)
     {
          $F564111C_UKID = $request->F564111C_UKID;
                 // dd($id);
                 $validatedData = [
                     'status_tf'=> $request->status_tf,
                     'konfirmasi_audit'=> $request->konfirmasi_audit,
                     'dipertimbangkan'=> $request->dipertimbangkan,
                 ];
         
         tmptf::whereF564111c_ukid($F564111C_UKID)->update($validatedData);
         return redirect()->route('audittfp.jde')->with('success', 'successfully updated');
     }


    //see anomali konfir
    public function konfir_gudang(Request $request)
    {
        $data_uji=tmptf::where('status_tf','2')->get();
        $records  = (new audit)->data_konfir($data_uji);
        $title = 'Anomali FALSE dikonfirmasi Gudang';
        $page = 'konfirTF';
        return view('audit/Uji_TF/UjiTF_pemasukan/seekonfirmasi', compact('records','page','title'));

    }
    public function AccAudit(Request $request)
    {
        $data_uji=tmptf::where('status_tf','4')->get();
        $records  = (new audit)->data_konfir($data_uji);
        $title = 'Konfirmasi Anomali FALSE Diterima';
        $page = 'konfirTF';
        return view('audit/Uji_TF/UjiTF_pemasukan/seekonfirmasi_terima', compact('records','page','title'));

    }
    public function pertimbanganAudit(Request $request)
    {
        $data_uji=tmptf::where('status_tf','3')->get();
        $records  = (new audit)->data_konfir($data_uji);
        $title = 'Konfirmasi Anomali FALSE Dipertimbangkan';
        $page = 'konfirTF';
        return view('audit/Uji_TF/UjiTF_pemasukan/seekonfirmasi_pertimbangkan', compact('records','page','title'));

    }
    public function jde(Request $request)
    {
        $data_uji=tmptf::where('status_tf','5')->get();
        $records  = (new audit)->data_konfir($data_uji);
        $title = 'Anomali FALSE Diperbaiki JDE';
        $page = 'konfirTF';
        return view('audit/Uji_TF/UjiTF_pemasukan/seekonfirmasi_jde', compact('records','page','title'));

    } 
}




// public function create_konfir1(Request $request, $F564111C_UKID)
// {
//     $branch= $request->branch;
//     $tgl_awal=$request->tgl_awal;
//     $tgl_akhir=$request->tgl_akhir;
//     $gl_class=$request->gl_class;
//     $dc_ty=$request->dc_ty;
//     //  dd($branch.' '. $tgl_awal.' '.$tgl_akhir. ' '.$gl_class.' '. $dc_ty );
//     $data = uji_pemasukan::findOrFail($F564111C_UKID);
//     // dd($data);
//     $page = 'DAuditp';
//     return view('audit/UjiTF_pemasukan/add', compact('data','page','branch','branch', 'tgl_awal', 'tgl_akhir', 'gl_class', 'dc_ty'));
// }
// public function store1(Request $request)
// {
//     $branch= $request->branch;
//     $tgl_awal=$request->tgl_awal;
//     $tgl_akhir=$request->tgl_akhir;
//     $gl_class=$request->gl_class;
//     $dc_ty=$request->dc_ty;
//     // dd($branch.' '. $tgl_awal.' '.$tgl_akhir. ' '.$gl_class.' '. $dc_ty );
//     $data=[
//         'F564111C_UKID' =>$request->F564111C_UKID,
//         'F564111C_ITM'  =>$request->F564111C_ITM,
//         'F564111C_MCU'  =>$request->F564111C_MCU,
//         'F564111C_DCT'  =>$request->F564111C_DCT,
//         'F564111C_TRDJ' =>$request->F564111C_TRDJ,
//         'F564111C_DGL'  =>$request->F564111C_DGL,
//         'F564111C_LOTN' =>$request->F564111C_LOTN,
//         'F564111C_TRQT' =>$request->F564111C_TRQT,
//         'F564111C_TRUM' =>$request->F564111C_TRUM,
//         'F564111C_DSCRP'=>$request->F564111C_DSCRP,
//         'F564111C_DSC1' =>$request->F564111C_DSC1,
//         'F4111_GLPT'    =>$request->F4111_GLPT,
//         'F4111_ITM'     =>$request->F4111_ITM,
//         'F4111_TRQT'    =>$request->F4111_TRQT,
//         'F4111_TRUM'    =>$request->F4111_TRUM,
//         'F4111_MCU'     =>$request->F4111_MCU,
//         'F4111_TRDJ'    =>$request->F4111_TRDJ,
//         'F4111_DGL'     =>$request->F4111_DGL,
//         'F4111_USER'    =>$request->F4111_USER,
//         'Uji_ITM'       =>$request->Uji_ITM,
//         'Uji_QTY'       =>$request->Uji_QTY,
//         'Uji_UOM'       =>$request->Uji_UOM,
//         'Uji_BRANCH'    =>$request->Uji_BRANCH,
//         'Uji_TGL_TRANS' =>$request->Uji_TGL_TRANS,
//         'Uji_TGL_DAFTAR'=>$request->Uji_TGL_DAFTAR,
//         'status_tf'     =>$request->status_tf,
//         'konfirmasi_gudang'=>$request->konfirmasi_gudang,
//     ];
//     // dd($data);
//     tmptf::create($data);

//     $data_uji = (new audit)->uji_pemasukan($branch, $tgl_awal, $tgl_akhir, $gl_class, $dc_ty);
//     $data  = (new audit)->records2($data_uji);
//      //dd($data);
//      $tmp_tf= tmptf::all();
  
//     $coba= collect($data)->groupBy('F564111C_UKID')->toArray();
//     $tes= collect($tmp_tf)->groupBy('F564111C_UKID')->toArray();
//     $records=array_diff_key($coba,$tes);
//     // dd($records);
//     $page = 'DAuditp';
//     return view('audit/UjiTF_pemasukan/audit', compact('records','page','page','branch','branch', 'tgl_awal', 'tgl_akhir', 'gl_class', 'dc_ty'));
// }





 