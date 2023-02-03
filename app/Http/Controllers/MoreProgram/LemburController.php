<?php

namespace App\Http\Controllers\MoreProgram;

use Auth;
use PDF;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

use App\JdeApi;
use App\ListBuyer;
use App\Models\GGI_IS\V_GCC_USER;
Use App\Models\HR_GA\Lembur\RencanaLembur;
Use App\Models\HR_GA\Lembur\Kualitatif;
Use App\Models\HR_GA\Lembur\Kuantitatif;
Use App\Models\HR_GA\Lembur\Karyawan;
Use App\Models\HR_GA\Lembur\approve;
Use App\Models\HR_GA\Lembur\BagianOvertime;
Use App\Models\HR_GA\Lembur\ApproveBranch;
Use App\Models\HR_GA\Lembur\ApproveProduksi;
Use App\Models\HR_GA\Lembur\AdminOvertime;
Use App\Models\QC\RejectCutting\JdeRejectCutting;

use App\Models\Cutting\Product_Costing\KodeKerjaKaryawan;
use App\Services\Production\ProductCosting\kode_kerja_karyawan;
use App\Services\HR_GA\Lembur\Overtime;
use App\Services\HR_GA\Lembur\group_staff;






class LemburController extends Controller
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
    public function overtime_request()
    {

        $page = 'dashboard';
        $user = auth()->user();
        $staff=(new  group_staff)->group_staff($user);
        $nama_bulan=date('Y-m');
        // tujuh_hari
        $bulan=(new  Overtime)->awal_akhir($nama_bulan);
        // $bulan=(new  Overtime)->tujuh_hari();

        $user_login=Auth::user()->nik;
        if($user_login=='220033'){
            $list=approve::where('nik_gm',$user_login)->count();
        }
        else{
            $list=approve::where('nik_manager',$user_login)->count();
        }
        $list_prod=ApproveProduksi::where('nik',$user_login)->count();
        $list_branch=ApproveBranch::where('nik',$user_login)->count();
        $admin_overtime=AdminOvertime::where('nik',$user_login)->count();


        $user_login=Auth::user('nik')->nik;
        // $lembur=RencanaLembur::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->where('nik',$user_login)->get();
        $lembur=RencanaLembur::where('tanggal','>=',$bulan['awal'])->where('nik',$user_login)->get();

        $a = (new  Overtime)->data_lembur($lembur);
        $data=collect($a)->sortByDesc('id');
        
        return view('more_program.overtime_request.index', compact('page','data','list','list_prod','nama_bulan','list_branch','admin_overtime','staff'));
    }

    public function overtime_requestBln($key)
    {

        $page = 'dashboard';
        $user = auth()->user();
        $staff=(new  group_staff)->group_staff($user);
        $nama_bulan=$key;
        $bulan=(new  Overtime)->awal_akhir($key);

        $user_login=Auth::user()->nik;
        $list_branch=ApproveBranch::where('nik',$user_login)->count();
        if($user_login=='220033'){
            $list=approve::where('nik_gm',$user_login)->count();
        }
        else{
            $list=approve::where('nik_manager',$user_login)->count();
        }
        $list_prod=ApproveProduksi::where('nik',$user_login)->count();
        $admin_overtime=AdminOvertime::where('nik',$user_login)->count();
        $lembur=RencanaLembur::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->where('nik',$user_login)->get();

        $a = (new  Overtime)->data_lembur($lembur);
        $data=collect($a)->sortByDesc('id');
        
        return view('more_program.overtime_request.index', compact('page','data','list','list_prod','nama_bulan','list_branch','admin_overtime','staff'));
    }

    public function create_request()
    {
        $page = 'dashboard';
        $approve=approve::all();
        $a=ListBuyer::all();
        foreach ($a as $key => $value) {
            $ListBuyer[]=[
                'id'=>$value->F0101_ALPH,
                'text'=>$value->F0101_ALPH,
            ];
        }
        return view('more_program.overtime_request.create', compact('page','approve','ListBuyer'));
    }

    function getwo(Request $request)
    {
        $wo=JdeRejectCutting::where('F4801_DOCO',$request->ID)->first();
        $coba=[
            'F0101_ALPH'=>$wo->F0101_ALPH,
            'F4801_LITM'=>substr($wo->F4801_LITM,0,5),
        ];
        $collect=collect($coba);
        // dd($wo); 
        return response()->json($collect);
    }
    public function getuser(Request $request){

        $karyawan = V_GCC_USER::with('data_gapok')
                    ->where('nik', $request->ID)
                    ->get();
        
        $data_kode_karyawan = (new kode_kerja_karyawan)->data_index($karyawan);
        $user= $data_kode_karyawan->where("nik",$request->ID)->last();
        $coba=[
            'nama'=>$user['nama'],
            'group'=>$user['group'],
            'gp_tun'=>$user['gp_tun'],
        ];
        $collect=collect($coba);
        return response()->json($collect);
    }
    public function bagian(Request $request){
        $bagian=BagianOvertime::where('id_departemen',$request->ID)->pluck('departemen','bagian');
        return response()->json($bagian);
    }
    public function store(request $request)
    {
        if(($request->nama[0]!=null)&&(($request->buyer!=null)OR($request->buyer2!=null))){
           
            $auto_number = (new  Overtime)->no_lembur();
            $user_login=Auth::user();
            $id_app=$request->departemen;
            $app=approve::where('id',$id_app)->first();

            $appPro=ApproveProduksi::where('kode_branch',$user_login->branch)->where('branchdetail',$user_login->branchdetail)->first();
            $appbranch=ApproveBranch::where('kode_branch',$user_login->branch)->where('branchdetail',$user_login->branchdetail)->first();

            $store_lembur=(new  Overtime)->store_lembur($auto_number, $user_login, $request, $app, $appPro, $appbranch);
            $store_kategori=(new  Overtime)->store_kategori($auto_number,$request);
            $store_karyawan=(new  Overtime)->store_karyawan($auto_number,$request);
            if(($user_login->branchdetail=='CVC')||($user_login->branchdetail=='GK')||($user_login->branchdetail=='CNJ2')||($user_login->branchdetail=='CVA')||($user_login->branchdetail=='CBA')){
                DB::table('notification')->insert([
                    'connection_name'=>"mysql_audit_buye",
                    'table_name'=>"rencana_lembur",
                    'alert_level'=>"DANGER",
                    'id_int'=> $auto_number,
                    'nik'=>$appbranch->nik,
                    'url'=>"cc.approval",
                    'title'=>"New Overtime Request",
                    'desc'=>$user_login->nama . ' Tanggal ' . $request->tanggal,
                    'is_read'=>"0",
                    
                ]);
            }
            // else if($app->dept=='PRODUCTION'){
            //     DB::table('notification')->insert([
            //         'connection_name'=>"mysql_audit_buye",
            //         'table_name'=>"rencana_lembur",
            //         'alert_level'=>"DANGER",
            //         'id_int'=> $auto_number,
            //         'nik'=>$app->nik_gm,
            //         'url'=>"cc.approval",
            //         'title'=>"New Overtime Request",
            //         'desc'=>$user_login->nama . ' Tanggal ' . $request->tanggal,
            //         'is_read'=>"0",
                    
            //     ]);
            // }
            else{
                DB::table('notification')->insert([
                    'connection_name'=>"mysql_audit_buye",
                    'table_name'=>"rencana_lembur",
                    'alert_level'=>"DANGER",
                    'id_int'=> $auto_number,
                    'nik'=>$app->nik_manager,
                    'url'=>"cc.approval",
                    'title'=>"New Overtime Request",
                    'desc'=>$user_login->nama . ' Tanggal ' . $request->tanggal,
                    'is_read'=>"0",
                    // 
                ]);
            }
            
            return redirect()->route('overtime-request')->with('success', 'berhasil disimpan');
           
        }
        else{
            // dd("b");
            return back()->with("error", 'Data gagal tersimpan!');
        }
      
    }
    public function edit_request($id)
    {
        $data=RencanaLembur::findOrFail($id);
        $karyawan=Karyawan::where('id_lembur',$id)->get();
        $count=Kualitatif::where('id_lembur',$id)->count();
        // $buyer=Kuantitatif::where('id_lembur',$id)->first();
        $Kualitatif=Kualitatif::where('id_lembur',$id)->get();
        $Kuantitatif=Kuantitatif::where('id_lembur',$id)->get();

        $page = 'dashboard';
        return view('more_program.overtime_request.edit', compact('page','data','karyawan','count','Kualitatif','Kuantitatif'));
    }

    public function update(Request $request)
    {
        $id=$request->id;
        if($request->status_lembur=='Approve 2'){
            $data=[
                'id'=>$request->id,
                'status_lembur'=>"Done",
            ];
        RencanaLembur::whereid($id)->update($data);

        }

        $update=(new  Overtime)->update_realisasi($request);
        return back()->with("success", 'Data Berhasil Disimpan!');
        // return back();

    }
    public function pdf(Request $request)
    {
        $id = $request->id;
        $data_lembur=RencanaLembur::findOrFail($id);
        $jumlah_karyawan=Karyawan::where('id_lembur',$id)->where('realisasi_total','>=','0.5')->count();
        $count_kualitatif=Kualitatif::where('id_lembur',$id)->count();
        $data=(new  Overtime)->data_pdf($id, $data_lembur, $jumlah_karyawan, $count_kualitatif);

        $karyawan=Karyawan::where('id_lembur',$id)->where('realisasi_total','>=','0.5')->get();
        
        $pdf = PDF::loadview('more_program.overtime_request.download_pdf',compact('data','karyawan'))->setPaper('legal', 'landscape');
        return $pdf->stream("formulir.pdf");
    }

    public function addKaryawan(Request $request)
    {
        if(($request->nik!=null)){
            $auto_number=$request->id_lembur;
            $store_karyawan=(new  Overtime)->store_karyawan($auto_number,$request);
            return redirect()->route('overtime-request')->with('success', 'berhasil disimpan');
        }
        else{
            return redirect()->route('overtime-request');
        }
    }
}
