<?php

namespace App\Http\Controllers\production\OperatorPerformance;


use Auth;
use App\Branch;
use Illuminate\Http\Request;
use App\Models\PPIC\ProductionLine;
use App\Http\Controllers\Controller;
use App\Services\Production\tanggal;
use App\Models\Production\TargetSmv;
use App\Models\Production\Monitoring\OpHadir;
use App\Models\Marketing\RekapOrder\RekapDetail;
use App\Services\Production\Monitoring\Cm_Earning;
use App\Models\Production\OperatorPerformance;


class CmEarningController extends Controller
{
    public function index()
    {   
        $date=date('Y-m-d');

        $a=OperatorPerformance::where('tanggal',$date)->get();
        $data=(new Cm_Earning)->eleminasi_line($a);
        $record=(new Cm_Earning)->cm_earning($data);
        $page ='dashboard';
        return view('production.operatorperformance.Cm_Earning.index', compact('page','record'));

    }
    public function main(Request $request)
    {
        $a=OperatorPerformance::query();
        $a->where('tanggal','>=',$request->first)->where('tanggal','<=',$request->last);
        if($request->buyer!==null && $request->buyer!=='') {
            $a->whereRaw("buyer like '%".$request->buyer."%' ");
        }
        if($request->item!==null && $request->item!=='') {
            $a->whereRaw("item like '%".$request->item."%' ");
        }
        $a=$a->get();
        $data=(new Cm_Earning)->eleminasi_line($a);
        $record=(new Cm_Earning)->cm_earning($data);
        $page ='dashboard';
        return view('production.operatorperformance.Cm_Earning.index', compact('page','record'));
    }

    public function monitorin_cmc()
    {

        $bulan=(new  tanggal)->LastFirstDate();
        if(date('m',strtotime($bulan['first']))==date('m',strtotime($bulan['last']))){
        $nama_bulan=date('F Y',strtotime($bulan['first']));
        }
        else{
            $nama_bulan=date('F Y',strtotime($bulan['first'])).'-'.date('F Y',strtotime($bulan['last']));
        }
        $user=Auth::user();
        $dataBranch = Branch::where('branchdetail',$user->branchdetail)->first();

        // $a=OperatorPerformance::where('tanggal','>=',$bulan['first'])->where('tanggal','<=',$bulan['last'])->where('fasilitas',$user->branchdetail)->get();
        // $op_hadir=OpHadir::where('tanggal','>=',$bulan['first'])->where('tanggal','<=',$bulan['last'])->where('branchdetail',$user->branchdetail)->get();
        $get_data=OperatorPerformance::where('tanggal','>=',$bulan['first'])->where('tanggal','<=',$bulan['last'])->get();
        $op_hadir=OpHadir::where('tanggal','>=',$bulan['first'])->where('tanggal','<=',$bulan['last'])->get();
        $data=(new Cm_Earning)->eleminasi_line($get_data);
        $avg=(new CM_Earning)->average($data);
        $progress=(new Cm_Earning)->group_line($avg);
        $tanggal=(new Cm_Earning)->group_tanggal($data);
        //cm_earning
        $cm_earning=(new Cm_Earning)->cm_earning($data);
        //Top 4 Best
        $group_style=(new Cm_Earning)->group_style($get_data);
        $sum_target=(new Cm_Earning)->group_op($get_data);
        $daftar_op=(new Cm_Earning)->avg_targetOp($sum_target, $get_data);
        //Eff
        $list_style=[];
        foreach ($progress as $key => $value) {
            $list_style[]=$value['style'];
        }
        $z = TargetSmv::wherein('style',$list_style)->get()->toarray();
        $smv=(new Cm_Earning)->nilai_smv($z);
        //today issue
        $today=date('Y-m-d');
        $today_issue=(new Cm_Earning)->today_issue($dataBranch,$today);
        $comcent='false';
        $page = 'commandCenter2';
        return view('CommandCenter2.production.monitoring.monitoring', compact('page','progress','tanggal','data','get_data','op_hadir','cm_earning','nama_bulan','today_issue','smv','daftar_op','group_style','comcent'));
    }
    public function monitorin_cmc_filter(Request $request)
    {
        // dd($request->all());
        $nama_bulan=date('F Y',strtotime($request->tanggal));
        $user=Auth::user();
        $dataBranch = Branch::where('branchdetail',$user->branchdetail)->first();

        // $a=OperatorPerformance::where('tanggal',$request->tanggal)->where('fasilitas',$user->branchdetail)->get();
        // $op_hadir=OpHadir::where('tanggal',$request->tanggal)->where('branchdetail',$user->branchdetail)->get();
        // $get_data=OperatorPerformance::where('tanggal',$request->tanggal)->get();

        $get_data=OperatorPerformance::query();
        // $get_data->where('tanggal',$request->tanggal)->where('fasilitas',$user->branchdetail);
        $get_data->where('tanggal',$request->tanggal);
        if($request->line!==null && $request->line!=='') {
            $get_data->whereRaw("line like '%".$request->line."%' ");
        }
        if($request->style!==null && $request->style!=='') {
            $get_data->whereRaw("style like '%".$request->style."%' ");
        }
        if($request->buyer!==null && $request->buyer!=='') {
            $get_data->whereRaw("buyer like '%".$request->buyer."%' ");
        }
        if($request->item!==null && $request->item!=='') {
            $get_data->whereRaw("item like '%".$request->item."%' ");
        }
        $get_data=$get_data->get();
        $op_hadir=OpHadir::where('tanggal',$request->tanggal)->get();
        $data=(new Cm_Earning)->eleminasi_line($get_data);
        $avg=(new CM_Earning)->average($data);
        $progress=(new Cm_Earning)->group_line($avg);
        $tanggal=(new Cm_Earning)->group_tanggal($data);
        //cm_earning
        $cm_earning=(new Cm_Earning)->cm_earning($data);
        //Top 4 Best
        $group_style=(new Cm_Earning)->group_style($get_data);
        $sum_target=(new Cm_Earning)->group_op($get_data);
        $daftar_op=(new Cm_Earning)->avg_targetOp($sum_target, $get_data);
        //Eff
        $list_style=[];
        foreach ($progress as $key => $value) {
            $list_style[]=$value['style'];
        }
        $z = TargetSmv::wherein('style',$list_style)->get()->toarray();
        $smv=(new Cm_Earning)->nilai_smv($z);
        //today issue
        $today=$request->tanggal;
        $today_issue=(new Cm_Earning)->today_issue($dataBranch,$today);
        $comcent='false';
        $page = 'commandCenter2';
        return view('CommandCenter2.production.monitoring.monitoring', compact('page','progress','tanggal','data','get_data','op_hadir','cm_earning','nama_bulan','today_issue','smv','daftar_op','group_style','comcent'));
    }
}