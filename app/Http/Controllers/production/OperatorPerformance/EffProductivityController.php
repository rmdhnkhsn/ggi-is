<?php

namespace App\Http\Controllers\production\OperatorPerformance;


use Auth;
use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Production\TargetSmv;
use App\Models\Production\Monitoring\OpHadir;
use App\Models\Marketing\RekapOrder\RekapDetail;
use App\Services\Production\Monitoring\Cm_Earning;
use App\Models\Production\OperatorPerformance;
use App\Services\HR_GA\Lembur\Overtime;

class EffProductivityController extends Controller
{
    public function index()
    {    
        $nama_bulan=date('Y-m');
        $bulan=(new  Overtime)->awal_akhir($nama_bulan);
        $get_data=OperatorPerformance::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->get();
        $op_hadir=OpHadir::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->get();
        $replace=(new Cm_Earning)->replace($get_data);
        $data=(new Cm_Earning)->eleminasi_line($replace);
        $tanggal=(new Cm_Earning)->group_tanggal($data);

        $avg_produktifitas=(new CM_Earning)->average_produktifitas($data,$op_hadir);
        $record_produktif=(new Cm_Earning)->group_line($avg_produktifitas);
        
        $list_style=[];
        foreach ($record_produktif as $key => $value) {
            $list_style[]=$value['style'];
        }
        $z = TargetSmv::wherein('style',$list_style)->get()->toarray();
        $smv=(new Cm_Earning)->nilai_smv($z);
        $avg_efektif=(new CM_Earning)->average_efektif($data,$smv);
        $record_efektif=(new Cm_Earning)->group_line($avg_efektif);

        $avg_efisien=(new CM_Earning)->average_efisien($data,$op_hadir,$smv);
        $record_efisien=(new Cm_Earning)->group_line($avg_efisien);
        $page ='dashboard';
        return view('production.operatorperformance.Eff_productivity.index', compact('page','record_produktif','data','replace','tanggal','op_hadir','record_efektif','record_efisien','smv'));

    }

    public function main(Request $request)
    {    
        $date=$request['date'];
        $replace=str_replace('-','/',$date);
        $request=explode(" " , $replace);
        $tgl_satu = array_slice( $request,0,1);
        $tgl_dua = array_slice( $request,2,2);
        $first_date=date('Y-m-d', strtotime($tgl_satu['0']));
        $last_date=date('Y-m-d', strtotime($tgl_dua['0']));
        $get_data=OperatorPerformance::where('tanggal','>=',$first_date)->where('tanggal','<=',$last_date)->get();
        $op_hadir=OpHadir::where('tanggal','>=',$first_date)->where('tanggal','<=',$last_date)->get();
        $replace=(new Cm_Earning)->replace($get_data);
        $data=(new Cm_Earning)->eleminasi_line($replace);
        $tanggal=(new Cm_Earning)->group_tanggal($data);

        $avg_produktifitas=(new CM_Earning)->average_produktifitas($data,$op_hadir);
        $record_produktif=(new Cm_Earning)->group_line($avg_produktifitas);
        $list_style=[];
        foreach ($record_produktif as $key => $value) {
            $list_style[]=$value['style'];
        }
        $z = TargetSmv::wherein('style',$list_style)->get()->toarray();
        $smv=(new Cm_Earning)->nilai_smv($z);
        $avg_efektif=(new CM_Earning)->average_efektif($data,$smv);
        $record_efektif=(new Cm_Earning)->group_line($avg_efektif);
        
        $avg_efisien=(new CM_Earning)->average_efisien($data,$op_hadir,$smv);
        $record_efisien=(new Cm_Earning)->group_line($avg_efisien);
        $page ='dashboard';
        return view('production.operatorperformance.Eff_productivity.index', compact('page','record_produktif','data','replace','tanggal','op_hadir','record_efektif','record_efisien','smv'));

    }
}