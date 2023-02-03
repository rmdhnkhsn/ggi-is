<?php

namespace App\Http\Controllers\production\Sewing;

use Illuminate\Http\Request;
use Auth;
use App\Branch;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Sewing\MonitoringExcel;
use App\Models\PPIC\WorkOrder;
use App\Imports\MaterialImport;
use App\Services\Production\Sewing\QtyTarget;
use App\Services\Production\Sewing\Email_Sewing;
use App\Models\Sewing\PersiapanSewing;
use App\Models\Sewing\TargetLostReason;
use App\Services\Accfin\CostFactory;

class SewingController extends Controller
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

    public function index(Request $request)
    {
        $user_login=Auth::user();
        $page ='dashboard';
        $bulan=$request->filter??date('Y-m');
        $bln_tanggal = (new  QtyTarget)->awal_akhir($bulan);
        $data_Perbln = (new  QtyTarget)->get_monitoring($bln_tanggal);
        $total_output = (new  QtyTarget)->total_output($data_Perbln);
        $Qty_Output= (new  QtyTarget)->Qty_Output($total_output);
        $result=(new  QtyTarget)->get_unplanned($bln_tanggal);

        if($user_login->role=='SYS_ADMIN'){
            $dataBranch= Branch::where('branchdetail','!=','CLN')->get();
        }
        else if($user_login->nik=='GC310069'){
            $dataBranch= Branch::wherein('kode_branch',['CNJ2','CBA','CVA'])->get();
        }
        else if($user_login->branch=='CLN'){
            $dataBranch= Branch::where('kode_branch',$user_login->branch)->where('branchdetail','!=','CLN')->get();
        }
        else{
            $dataBranch= Branch::where('kode_branch',$user_login->branch)->where('branchdetail',$user_login->branchdetail)->get();
        }

        $loss_target_line=$this->get_target_lost();
        // $dt_dari=date_format(date_create_from_format("Y-m",$bulan),'Y-m-01');
        // $dt_samp=date_format(date_create_from_format("Y-m",$bulan),'Y-m-01');
        // $factory=$dataBranch->first()->kode_sewing;

        // $data_target_lost=new CostFactory();
        // $data_target_lost=$data_target_lost->get_data($dt_dari,$dt_samp,$factory??null,null,null,null);
        // $data_target_lost=collect($data_target_lost)->groupBy('tanggal')->groupBy('branchdetail')->groupBy('line');
        // $data_target_lost = $data_target_lost->map(function ($group) {
        //     dd($group->where('tanggal',$group->first()->first()->first()['tanggal']));
        //     $cm_amount=$group
        //                 ->where('tanggal',$group->first()->first()->first()['tanggal'])
        //                 ->where('branchdetail',$group->first()->first()->first()['branchdetail'])
        //                 ->where('line',$group->first()->first()->first()['line'])->sum('cm_amount');
        //     $factory_cost=$group
        //                 ->where('tanggal',$group->first()->first()->first()['tanggal'])
        //                 ->where('branchdetail',$group->first()->first()->first()['branchdetail'])
        //                 ->where('line',$group->first()->first()->first()['line'])->sum('cost_line');

        //     return [
        //         'tanggal' => $group->first()->first()->first()['tanggal'], // opposition_id is constant inside the same group, so just take the first or whatever.
        //         'branchdetail' => $group->first()->first()->first()['branchdetail'],
        //         'line' => $group->first()->first()->first()['line'],
        //         'cm_amount' => $cm_amount,
        //         'factory_cost' => $factory_cost,
        //         'balance' => $cm_amount-$factory_cost
        //     ];
        // });
        // dd($data_target_lost);

        return view('production/sewing/index', compact('page','Qty_Output','bulan','dataBranch','result','loss_target_line'));
    }

    // public function index()
    // {
    //     $user_login=Auth::user();
    //     $page ='dashboard';
    //     $bulan=date('Y-m');
    //     $bln_tanggal = (new  QtyTarget)->awal_akhir($bulan);
    //     $data_Perbln = (new  QtyTarget)->get_monitoring($bln_tanggal);
    //     $total_output = (new  QtyTarget)->total_output($data_Perbln);
    //     $Qty_Output= (new  QtyTarget)->Qty_Output($total_output);
    //     $result=(new  QtyTarget)->get_unplanned($bln_tanggal);

    //     if($user_login->role=='SYS_ADMIN'){
    //         $dataBranch= Branch::where('branchdetail','!=','CLN')->get();

    //     }
    //     else if($user_login->branch=='CLN'){
    //         $dataBranch= Branch::where('kode_branch',$user_login->branch)->where('branchdetail','!=','CLN')->get();
    //     }
    //     else{
    //         if($user_login->branchdetail=='GM1'){
    //             $branchdetail='MJ1';
    //         }
    //         elseif($user_login->branchdetail=='GM2'){
    //             $branchdetail='MJ2';
    //         }
    //         elseif($user_login->branchdetail=='GK'){
    //             $branchdetail='KLB';
    //         }
    //         elseif($user_login->branchdetail=='CVC'){
    //             $branchdetail='CHW';
    //         }
    //         else{
    //             $branchdetail=$user_login->branchdetail;
    //         }
    //         $dataBranch= Branch::where('kode_branch',$user_login->branch)->where('branchdetail',$user_login->branchdetail)->get();
    //     }
    //     return view('production/sewing/index', compact('page','Qty_Output','bulan','dataBranch','result'));
    // }

    // public function bulan($key)
    // {
    //     $user_login=Auth::user();
    //     $page ='dashboard';
    //     $bulan=$key;
    //     $bln_tanggal = (new  QtyTarget)->awal_akhir($bulan);
    //     $data_Perbln = (new  QtyTarget)->get_monitoring($bln_tanggal);
    //     $total_output = (new  QtyTarget)->total_output($data_Perbln);
    //     $Qty_Output= (new  QtyTarget)->Qty_Output($total_output);
    //     $result=(new  QtyTarget)->get_unplanned($bln_tanggal);

    //     if($user_login->role=='SYS_ADMIN'){
    //         // $dataBranch= Branch::all();
    //         $dataBranch= Branch::where('branchdetail','!=','CLN')->get();

    //     }
    //     else if($user_login->branch=='CLN'){
    //         $dataBranch= Branch::where('kode_branch',$user_login->branch)->where('branchdetail','!=','CLN')->get();
    //     }
    //     else{
    //         if($user_login->branchdetail=='GM1'){
    //             $branchdetail='MJ1';
    //         }
    //         elseif($user_login->branchdetail=='GM2'){
    //             $branchdetail='MJ2';
    //         }
    //         elseif($user_login->branchdetail=='GK'){
    //             $branchdetail='KLB';
    //         }
    //         elseif($user_login->branchdetail=='CVC'){
    //             $branchdetail='CHW';
    //         }
    //         else{
    //             $branchdetail=$user_login->branchdetail;
    //         }
    //         $dataBranch= Branch::where('kode_branch',$user_login->branch)->where('branchdetail',$user_login->branchdetail)->get();
    //     }
        
    //     return view('production/sewing/index', compact('page','Qty_Output','bulan','dataBranch','result'));
    // }

    public function import(request $request)
    {

        if (count($this->get_target_lost())!==0) {
            return back()->with("error", 'Harap isi dahulu alasan agar dapat mengupload sewing');
        }
        
        $dataBranch = Branch::findorfail($request->branch);
        $data=Excel::toArray([],$request->file('file'));
        $import=collect($data);
        $validasi = (new  QtyTarget)->validasi($import);
        // $validasiQty = (new  QtyTarget)->validasiQty($import);


        $chek= (new  QtyTarget)->validasiTrue($import,$dataBranch);
        if($validasi > 1){
            return back()->with("error", 'Upload Hanya Satu Tanggal Produksi!');
        }
        // elseif($import[0][0][0]>date('Y-m-d')){
        //     return back()->with("error", 'Upload tidak boleh tanggal lebih besar dari sekarang!');
        // }
        // elseif($validasiQty>0){
        //     return back()->with("error", 'Qty output harus di Isi!');
        // }
        elseif($chek!=[]){
            $msg=$chek;
            return back()->withErrors($msg);
        }
        else{
            $import_excel = (new  QtyTarget)->import_excel($import,$dataBranch);
            return back()->with("success", 'Data Berhasil Disimpan!');
        }

       
    }

    public function target_lost_update(request $request)
    {
        foreach ($request->reason as $k=>$v) {
            if ($v!=='') {
                $rs=TargetLostReason::find($request->ids[$k]);
                // $rs->factory=$request->factory;
                // $rs->line=$request->line;
                // $rs->tanggal=$request->tanggal;
                $rs->reason=$v;
                $rs->created_by=Auth::user()->nik;
                $rs->update();
            }
        }
        return back()->with("success", 'Data Berhasil Disimpan!');
    }

    public function get_target_lost(){
        $loss_target_line=TargetLostReason::Query();
        $loss_target_line->where('profit','<',0);
        $loss_target_line->whereNull('reason');
        if(Auth::user()->role!=='SYS_ADMIN'){
            $kode_sewing=Branch::where('branchdetail',Auth::user()->branchdetail)->first();
            if(Auth::user()->branchdetail=='CLN'){
                $kode_sewing=Branch::where('kode_branch',Auth::user()->branchdetail)->where('branchdetail','!=','CLN')->first();
            }

            $loss_target_line->where('factory',$kode_sewing->kode_sewing);
        } 
        $loss_target_line=$loss_target_line->get();
        return $loss_target_line;
    }

    // =========================== REPORTING ================================
    public function report_uploadsewing_(request $request)
    {
        $map['date_from']=date('Y-m-d');
        $map['page']='Upload Sewing';
        return view('production.sewing.reporting.upload_progress.index', $map);       
    }

    public function report_uploadsewing(request $request)
    {
        $data=MonitoringExcel::where('tanggal','>=',$request->target_date_from)->where('tanggal','<=',$request->target_date_to)->get();
        $map['data']=$data;
        $map['page']='Upload Sewing';
        return view('production.sewing.reporting.upload_progress.show', $map);       
    }

    public function report_lateupload_(request $request)
    {
        $map['date_from']=date('Y-m-d', strtotime('-1 day'));
        $map['page']='Late Upload';
        return view('production.sewing.reporting.late_upload.index', $map);       
    }

    public function report_lateupload(request $request)
    {
        $data=new Email_Sewing();
        $data=$data->get_late_upload($request->target_date_from,$request->target_date_to);
        $map['data']=$data->where('total_output',0);
        $map['page']='Late Upload';
        return view('production.sewing.reporting.late_upload.show', $map);       
    }

    // ========================= END REPORTING ==============================

    // =========================== PERSIAPAN SEWING ================================

    public function Persiapan_index(Request $request)
    {
        $bulan=$request->filter??date('Y-m');
        $user_login=Auth::user();
        $page ='dashboard';
        $bln_tanggal = (new  QtyTarget)->awal_akhir($bulan);
        $data_plot=(new QtyTarget)->get_persiapan_plot($bln_tanggal);
        $data_unplanned=(new QtyTarget)->get_persiapan_unplanned($bln_tanggal);
        if($user_login->role=='SYS_ADMIN'){
            $dataBranch= Branch::where('branchdetail','!=','CLN')->get();
        }
        else if($user_login->branch=='CLN'){
            $dataBranch= Branch::where('kode_branch',$user_login->branch)->where('branchdetail','!=','CLN')->get();
        }
        else{
            $dataBranch= Branch::where('kode_branch',$user_login->branch)->where('branchdetail',$user_login->branchdetail)->get();
        }
        return view('production/sewing/Persiapan_sewing', compact('page','bulan','dataBranch','data_plot','data_unplanned'));
    }

    public function persiapan_import(Request $request)
    {
        // dd($request->all());
        $dataBranch = Branch::findorfail($request->branch);
        $data=Excel::toArray([],$request->file('file'));
        $import=collect($data);
        $validasi = (new  QtyTarget)->CekTglPersiapan($import);

        if($validasi > 1){
            return back()->with("error", 'Upload Hanya Satu Tanggal Produksi!');
        }
        else{
            $import_excel = (new  QtyTarget)->import_persiapan($import,$dataBranch);

            return back()->with("success", 'Data Berhasil Disimpan!');
        }
    }

    // function format_persiapan()
    // {
    //     $data =[];
    //     return Excel::download(new SewingPersipanFormat($data),'Format Persiapan Sewing'.'.xlsx');
    // }
    public function format_persiapan()
    {
        $filepath = storage_path('/app/public/template/Format_Persiapan_Sewing.xlsx');
        return Response()->download($filepath);
    }
    // =========================== END PERSIAPAN SEWING ================================


}
