<?php

namespace App\Http\Controllers\Audit;
Use App\Models\Audit\ujina;
use DB;
use Auth;
use App\JdeApi;
use App\Branch;
Use App\Models\Audit\uji;
Use App\Models\Audit\tmptf;
Use App\Models\Audit\ledger;
use App\Services\Audit\audit;
use App\Services\Audit\gudang;
Use App\Models\Audit\UserGudang;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Controllers\Controller;


class AuditController extends Controller
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
        // $x= uji::limit(1)->get();
        // dd($x);
        $page = 'Audit';
        return view('audit/Uji_TF/UjiTF/form', compact('dataBranch','gl_class','dc_ty','page'));
    }


    public function get_data(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $branch= $dataBranch->kode_jde;
       
        $tgl_awal=$request->tgl_awal;
        $tgl_akhir=$request->tgl_akhir;
        $gl_class=$request->gl_class;
        $dc_ty=$request->dc_ty;

        $data_uji = (new audit)->uji_pengeluaran($branch, $tgl_awal, $tgl_akhir, $gl_class, $dc_ty);
        $data = (new audit)->records_pengeluaran($data_uji);

        $tmp_tf= tmptf::all();
        $coba= collect($data)->groupBy('F564111H_UKID')->toArray();
        $tes= collect($tmp_tf)->groupBy('F564111C_UKID')->toArray();
        $records=array_diff_key($coba,$tes);
        // dd($records);
        $page = 'Audit';
        return view('audit/Uji_TF/UjiTF/audit', compact('records','page','page','branch','branch', 'tgl_awal', 'tgl_akhir', 'gl_class', 'dc_ty'));
    }

    public function formf()
    {  
        $dataBranch = Branch::where('kode_jde','!=', null)->get();
        $gl_class = (new  audit)->gl_class();
        $dc_ty = (new  audit)->dc_ty();
        // $x= uji::limit(1)->get();
        // dd($x);
        $page = 'Audit';
        return view('audit/Uji_TF/UjiTF/form_false', compact('dataBranch','gl_class','dc_ty','page'));
    }
    public function get_dataf(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $branch= $dataBranch->kode_jde;
       
        $tgl_awal=$request->tgl_awal;
        $tgl_akhir=$request->tgl_akhir;
        $gl_class=$request->gl_class;
        $dc_ty=$request->dc_ty;
        if(($gl_class==null) OR ($dc_ty== null)){
            return back()->with("start", 'GL Class And DC.TY Must Be Check !');}
        else{
        $data_uji = (new audit)->false_pengeluaran($branch, $tgl_awal, $tgl_akhir, $gl_class, $dc_ty);
        $data = (new audit)->records_pengeluaranf($data_uji);

        $tmp_tf= tmptf::all();
        $coba= collect($data)->groupBy('F564111H_UKID')->toArray();
        $tes= collect($tmp_tf)->groupBy('F564111C_UKID')->toArray();
        $records=array_diff_key($coba,$tes);
        // dd($records);
        $page = 'Audit';
        return view('audit/Uji_TF/UjiTF/audit', compact('records','page','page','branch','branch', 'tgl_awal', 'tgl_akhir', 'gl_class', 'dc_ty'));
        }
    }


    public function form_gudang()
    {  
        $dataBranch = Branch::where('kode_jde','!=', null)->get();
        $user = UserGudang::all();
        $page = 'gudang';
        return view('audit/Uji_TF/gudang/form_pengeluaran', compact('dataBranch','user','page'));
    }
    public function get_data_gudang(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $branch= $dataBranch->kode_jde;
        $tgl_awal=$request->tgl_awal;
        $tgl_akhir=$request->tgl_akhir;
        $user=$request->user;
        $data_uji = (new gudang)->gudang_pengeluaran($branch, $tgl_awal, $tgl_akhir, $user);
        $data = (new audit)->records_pengeluaranf($data_uji);
        $tmp_tf= tmptf::all();
        $coba= collect($data)->groupBy('F564111H_UKID')->toArray();
        $tes= collect($tmp_tf)->groupBy('F564111C_UKID')->toArray();
        $records=array_diff_key($coba,$tes);
        // dd($records);
        $page = 'gudang';
        return view('audit/Uji_TF/UjiTF/audit', compact('records','page','page','branch','branch', 'tgl_awal', 'tgl_akhir'));
    }

    public function create_konfir(Request $request, $F564111H_UKID)
	{
        //  dd($branch.' '. $tgl_awal.' '.$tgl_akhir. ' '.$gl_class.' '. $dc_ty );
        $data = uji::findOrFail($F564111H_UKID);
        $nik= Auth::user("nik")->nik;
        if(UserGudang::where('nik',$nik)->count()){
            $user_gudang=UserGudang::where('nik',$nik)->first('username_jde');
            $user=$user_gudang->username_jde;
        }
        else{
            $user=null;
        }
        $uji_branch= $data->F564111H_MCU - $data->F4111_MCU;
        $Uji_QTY= ($data->F564111H_TRQT + $data->F4111_TRQT);
        if($Uji_QTY == '0.0'){
            $Uji_QTY='TRUE';
        }
        else{
            $Uji_QTY='FALSE';
        }
        if($uji_branch=='0'){
            $uji_branch='TRUE';
        }
        else{
            $uji_branch='FALSE';
        }
        $page = 'DAuditp';
        return view('audit/Uji_TF/UjiTF/add', compact('Uji_QTY','uji_branch','data','page','user'));
	}
    public function store(Request $request)
    {
        
        $data=[
            'F564111C_UKID' =>$request->F564111H_UKID,
            'F564111C_ITM'  =>$request->F564111H_ITM,
            'F564111C_MCU'  =>$request->F564111H_MCU,
            'F564111C_DCT'  =>$request->F564111H_DCT,
            'F564111C_TRDJ' =>$request->F564111H_TRDJ,
            'F564111C_DGL'  =>$request->F564111H_DGL,
            'F564111C_LOTN' =>$request->F564111H_LOTN,
            'F564111C_TRQT' =>$request->F564111H_TRQT,
            'F564111C_TRUM' =>$request->F564111H_TRUM,
            'F564111C_DSCRP'=>$request->F564111H_DSCP2,
            'F564111C_DSC1' =>$request->F564111H_DSC1,
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
        $title = 'Konfirmasi Gudang T/F';
        $page = 'DAudit';
        return view('audit/Uji_TF/UjiTF_pemasukan/seekonfirmasi', compact('records','page','title'));

    }
}







    // public function create_konfir1(Request $request, $F564111H_UKID)
	// {
    //     $branch= $request->branch;
    //     $tgl_awal=$request->tgl_awal;
    //     $tgl_akhir=$request->tgl_akhir;
    //     $gl_class=$request->gl_class;
    //     $dc_ty=$request->dc_ty;
    //     //  dd($branch.' '. $tgl_awal.' '.$tgl_akhir. ' '.$gl_class.' '. $dc_ty );
    //     $data = uji::findOrFail($F564111H_UKID);
    //     $uji_branch= $data->F564111H_MCU - $data->F4111_MCU;
    //     $Uji_QTY= ($data->F564111H_TRQT + $data->F4111_TRQT);
    //     if($Uji_QTY == '0.0'){
    //         $Uji_QTY='TRUE';
    //     }
    //     else{
    //         $Uji_QTY='FALSE';
    //     }
    //     if($uji_branch=='0'){
    //         $uji_branch='TRUE';
    //     }
    //     else{
    //         $uji_branch='FALSE';
    //     }
    //     $page = 'DAuditp';
    //     return view('audit/UjiTF/add', compact('Uji_QTY','uji_branch','data','page','branch','branch', 'tgl_awal', 'tgl_akhir', 'gl_class', 'dc_ty'));
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
    //         'F564111C_UKID' =>$request->F564111H_UKID,
    //         'F564111C_ITM'  =>$request->F564111H_ITM,
    //         'F564111C_MCU'  =>$request->F564111H_MCU,
    //         'F564111C_DCT'  =>$request->F564111H_DCT,
    //         'F564111C_TRDJ' =>$request->F564111H_TRDJ,
    //         'F564111C_DGL'  =>$request->F564111H_DGL,
    //         'F564111C_LOTN' =>$request->F564111H_LOTN,
    //         'F564111C_TRQT' =>$request->F564111H_TRQT,
    //         'F564111C_TRUM' =>$request->F564111H_TRUM,
    //         'F564111C_DSCRP'=>$request->F564111H_DSCP2,
    //         'F564111C_DSC1' =>$request->F564111H_DSC1,
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

    //     $data_uji = (new audit)->data_uji($branch, $tgl_awal, $tgl_akhir, $gl_class, $dc_ty);
    //     $data  = (new audit)->records($data_uji);
    //      //dd($data);
    //      $tmp_tf= tmptf::all();
      
    //     $coba= collect($data)->groupBy('F564111H_UKID')->toArray();
    //     $tes= collect($tmp_tf)->groupBy('F564111C_UKID')->toArray();
    //     $records=array_diff_key($coba,$tes);
    //     //  dd($records);
    //     $page = 'DAuditp';
    //     return view('audit/UjiTF/audit', compact('records','page','page','branch','branch', 'tgl_awal', 'tgl_akhir', 'gl_class', 'dc_ty'));
    // }
    // //update atau konfirmasi oleh audit
    //  public function konfir_audit($F564111C_UKID)
    //  {
    //      $data = tmptf::findOrFail($F564111C_UKID);
    //      // dd($data);
    //      $page = 'DAudit';
    //      return view('audit/UjiTF/edit', compact('data','page'));
    //  }
    //  public function update_diterima(Request $request)
    //  {
    //       $F564111C_UKID = $request->F564111C_UKID;
    //              // dd($id);
    //              $validatedData = [
    //                  'status_tf'=> $request->status_tf,
    //                  'konfirmasi_audit'=> $request->konfirmasi_audit,
    //                  'dipertimbangkan'=> $request->dipertimbangkan,
    //              ];
         
    //      tmptf::whereF564111c_ukid($F564111C_UKID)->update($validatedData);
    //      return redirect()->route('audittf.diterima')->with('success', 'successfully updated');
    //  }
    //  public function update_pertimbangkan(Request $request)
    //  {
    //       $F564111C_UKID = $request->F564111C_UKID;
    //              // dd($id);
    //              $validatedData = [
    //                  'status_tf'=> $request->status_tf,
    //                  'konfirmasi_audit'=> $request->konfirmasi_audit,
    //                  'dipertimbangkan'=> $request->dipertimbangkan,
    //              ];
         
    //      tmptf::whereF564111c_ukid($F564111C_UKID)->update($validatedData);
    //      return redirect()->route('audittf.dipertimbangkan')->with('success', 'successfully updated');
    //  }
    //  public function update_jde(Request $request)
    //  {
    //       $F564111C_UKID = $request->F564111C_UKID;
    //              // dd($id);
    //              $validatedData = [
    //                  'status_tf'=> $request->status_tf,
    //                  'konfirmasi_audit'=> $request->konfirmasi_audit,
    //                  'dipertimbangkan'=> $request->dipertimbangkan,
    //              ];
         
    //      tmptf::whereF564111c_ukid($F564111C_UKID)->update($validatedData);
    //      return redirect()->route('audittf.jde')->with('success', 'successfully updated');
    //  }

    // //see anomali konfir
    // public function konfir_gudang(Request $request)
    // {
    //     $data_uji=tmptf::where('status_tf','2')->get();
    //     $records  = (new audit)->records($data_uji);
    //     $title = 'Konfirmasi Gudang T/F';
    //     $page = 'DAudit';
    //     return view('audit/UjiTF/seekonfirmasi', compact('records','page','title'));

    // }
    // public function AccAudit(Request $request)
    // {
    //     $data_uji=tmptf::where('status_tf','4')->get();
    //     $records  = (new audit)->records($data_uji);
    //     $title = 'Konfirmasi Diterima T/F';
    //     $page = 'DAudit';
    //     return view('audit/UjiTF/seekonfirmasi', compact('records','page','title'));

    // }
    // public function pertimbanganAudit(Request $request)
    // {
    //     $data_uji=tmptf::where('status_tf','3')->get();
    //     $records  = (new audit)->records($data_uji);
    //     $title = 'Konfirmasi Dipertimbangkan T/F';
    //     $page = 'DAudit';
    //     return view('audit/UjiTF/seekonfirmasi', compact('records','page','title'));

    // }
    // public function jde(Request $request)
    // {
    //     $data_uji=tmptf::where('status_tf','5')->get();
    //     $records  = (new audit)->records($data_uji);
    //     $title = 'Diperbaiki JDE T/F';
    //     $page = 'DAudit';
    //     return view('audit/UjiTF/seekonfirmasi', compact('records','page','title'));

    // }
   




















    // public function form_na()
    // {  
    //     $dataBranch = Branch::all();
    //     $gl_class = (new  audit)->gl_class();
    //     $dc_ty = (new  audit)->dc_ty();
    //     //dd($gl_class);
    //     $page = 'DAudit';
    //     return view('audit/UjiTF/form-na', compact('dataBranch','gl_class','dc_ty','page'));
    // }

    // public function get_data_na(Request $request)
    // {
    //     $dataBranch = Branch::findorfail($request->branch);
    //     $branch= $dataBranch->kode_jde;
       
    //     $tgl_awal=$request->tgl_awal;
    //     $tgl_akhir=$request->tgl_akhir;
    //     $tgl_awal1=$request->tgl_awal1;
    //     //dd( $tgl_awal.' ' .$tgl_awal1);
    //     $tgl_akhir1=$request->tgl_akhir1;
    //     // dd( $tgl_awal.' ' .$tgl_awal1. ' '.$tgl_akhir. ' '.$tgl_akhir1);
    //     $gl_class=$request->gl_class;
    //     $dc_ty=$request->dc_ty;
        
    //     //dd( $branch. $tgl_awal.  $tgl_akhir. $gl_class. $dc_ty);
    //     $data_ladger= (new audit)->data_ladger($branch, $tgl_awal, $tgl_akhir, $gl_class, $dc_ty);
    //     //dd($data_ladger);
    //     $pemasukan= (new audit)->pemasukan($branch, $tgl_awal1, $tgl_akhir1, $dc_ty);
    //     //dd($pemasukan);
    //     $coba= collect($data_ladger)->groupBy('F564111C_UKID')->toArray();
    //     $tes= collect($pemasukan)->groupBy('F564111C_UKID')->toArray();
    //     $records=array_diff_key($coba,$tes);
    // dd($records);





        // foreach ($records as $key => $value) {
        //     foreach ($value as $db) {
        //         $count= ($records)->where('F4111_ITM',$db['F4111_ITM'])->where('F4111_MCU',$db['F4111_MCU'])
        //             ->where('F4111_LOTN',$db['F4111_LOTN'])->where('F4111_TRQT',$db['F4111_TRQT'])
        //             ->where('F4111_GLPT',$db['F4111_GLPT'])->where('F4111_DCT',$db['F4111_DCT'])->count();
        //        dd($count);
        //     if($count==1){
        //             $update[]=[
        //                 'F4111_UKID'=>$db['F4111_UKID'],
        //                 'F4111_ITM'=>$db['F4111_ITM'],
        //                 'F4111_MCU'=>$db['F4111_MCU'],
        //                 'F4111_DCT'=>$db['F4111_DCT'],
        //                 'F4111_TRDJ'=>$db['F4111_TRDJ'],
        //                 'F4111_DGL'=>$db['F4111_DGL'],
        //                 'F4111_LOTN'=>$db['F4111_LOTN'],
        //                 'F4111_TRQT'=>$db['F4111_TRQT'],
        //                 'F4111_TRUM'=>$db['F4111_TRUM'],
        //                 'F4111_GLPT'=>$db['F4111_GLPT'],
        //                 'F4111_USER'=>$db['F4111_USER'],
                        
        //             ];
        //         }
                
        //         else{
        //             $bisa=ujina::create([
        //                 'F4111_UKID'=>$db['F4111_UKID'],
        //                 'F4111_ITM'=>$db['F4111_ITM'],
        //                 'F4111_MCU'=>$db['F4111_MCU'],
        //                 'F4111_DCT'=>$db['F4111_DCT'],
        //                 'F4111_TRDJ'=>$db['F4111_TRDJ'],
        //                 'F4111_DGL'=>$db['F4111_DGL'],
        //                 'F4111_LOTN'=>$db['F4111_LOTN'],
        //                 'F4111_TRQT'=>$db['F4111_TRQT'],
        //                 'F4111_TRUM'=>$db['F4111_TRUM'],
        //                 'F4111_GLPT'=>$db['F4111_GLPT'],
        //                 'F4111_USER'=>$db['F4111_USER'],
                        
        //             ]);
            //     }

            //  }
            //  dd( $update);
            
        // $page = 'dashboard';
        // return view('audit/index', compact('page'));
        // dd($records);
        // $page = 'DAudit';
        // return view('audit/UjiNa/audit-na', compact('records','page','branch','branch', 'tgl_awal', 'tgl_akhir', 'gl_class', 'dc_ty'));
        // return view('audit/UjiNa/audit-na', compact('records','page'));
    // }

    // public function hasil_na(Request $request)
    // {
    //     $records=ujina::all();
    //     //dd($records);
    //     $page = 'DAudit';
    //     return view('audit/UjiNa/hasilNa', compact('records','page'));

    // }





//     public function test(Request $request)
//     {
//         $satu=satu::all();
//         $dua=dua::DISTINCT('data')->get();
//        dd($dua);
//         return view('audit/index', compact('page'));
        
//     }

//     public function test1(Request $request)
//     {
//         $satu=satu::all();
//         $dua=dua::all();
//         $coba= collect($satu)->groupBy('no_po')->toArray();
//         $tes= collect($dua)->groupBy('no_po')->toArray();
//         $records=array_diff_key($coba,$tes);
//         // dd($records);
//         foreach ($records as $key => $value) {
//             foreach ($value as $db) {
//                if(coba::where('no_po',$db['no_po'])->count()){
               
//                     // $a=coba::where('no_po',$db['no_po'])->count();
//                     $update=[
//                         'no_po'=>$db['no_po'],
//                         'data'=>$db['data'],
//                         'data_2'=>$db['data_2'],
                        
//                     ];
//                     coba::whereNo_po($db['no_po'])->update($update);
//                 }
//                 else{
//                     $bisa=coba::create([
//                         'no_po'=>$db['no_po'],
//                         'data'=>$db['data'],
//                         'data_2'=>$db['data_2'],
                        
//                     ]);
//                 }
//              }
//             }
       
//         $page = 'dashboard';
//         return view('audit/index', compact('page'));
        
//     }
// }

 //       $bisa=tiga::create([
        //         'no_po'=>$db['no_po'],
        //         'data'=>$db['data'],
        //         'data_2'=>$db['data_2'],
                
        //     ]);
        //     }
        // }
        //dd($bisa);

        // foreach ($satu as $key => $value) {
        //     $x=[
        //         'no_po'=>$value->no_po,
        //         'data'=>$value->data,
        //         'data_2'=>$value->data_2,
        //     ];
        //     tiga::whereNo_po($value->no_po)->update($x);
        // }
        
            //dd($update);
            // $bisa=tiga::create([
            //     'no_po'=>$db['no_po'],
            //     'data'=>$db['data'],
            //     'data_2'=>$db['data_2'],
                
            // ]);
        //     }
        // }
        //dd($bisa);

    //    $result=DB::connection('mysql_mkt_qr')->table('v56411ag')
    //     ->where('F564111C_DGL','>=','2020-06-01')
    //     ->where('F564111C_DGL','<=','2020-06-30')
    //     ->get();
    //   dd($result);