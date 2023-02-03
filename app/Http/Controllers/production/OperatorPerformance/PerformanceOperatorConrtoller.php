<?php

namespace App\Http\Controllers\production\OperatorPerformance;


use Auth;
use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Production\Monitoring\Cm_Earning;
use App\Models\Production\OperatorPerformance;
use App\Services\HR_GA\Lembur\Overtime;


class PerformanceOperatorConrtoller extends Controller
{
    public function index()
    {   
        $today=date('Y-m-d');
        // $bulan=(new  Overtime)->awal_akhir($nama_bulan);
        // $a=OperatorPerformance::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->get();
        $get_data=OperatorPerformance::where('tanggal',$today)->get();
        $sum_target=(new Cm_Earning)->sum_target($get_data);
        $data=(new Cm_Earning)->eleminasi_nama($sum_target);
        $avg=(new CM_Earning)->Avg_performance($data);
        $record=(new Cm_Earning)->group_nama($avg);
        $tanggal=(new Cm_Earning)->group_tanggal($data);
        $page ='dashboard';
        return view('production.operatorperformance.PerformanceOp.index', compact('page','tanggal','record','data'));

    }
    public function main(Request $request)
    {  
    // dd($request->all());
        $date=explode(" " , $request->daterange);
        $tgl_satu = array_slice( $date,0,1);
        $tgl_dua = array_slice( $date,2,2);
        $first_date=date('Y-m-d', strtotime($tgl_satu['0']));
        $last_date=date('Y-m-d', strtotime($tgl_dua['0']));

        $get_data=OperatorPerformance::query();
        $get_data->where('tanggal','>=',$first_date)->where('tanggal','<=',$last_date);
        if($request->style!==null && $request->style!=='') {
            $get_data->whereRaw("style like '%".$request->style."%' ");
        }
        if($request->buyer!==null && $request->buyer!=='') {
            $get_data->whereRaw("buyer like '%".$request->buyer."%' ");
        }
       
        $get_data=$get_data->get();
        $sum_target=(new Cm_Earning)->sum_target($get_data);
        $data=(new Cm_Earning)->eleminasi_nama($sum_target);
        $avg=(new CM_Earning)->Avg_performance($data);
        $record=(new Cm_Earning)->group_nama($avg);
        $tanggal=(new Cm_Earning)->group_tanggal($data);
        $page ='dashboard';
        return view('production.operatorperformance.PerformanceOp.index', compact('page','tanggal','record','data'));
    }
}