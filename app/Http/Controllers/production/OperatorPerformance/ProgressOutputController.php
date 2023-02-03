<?php

namespace App\Http\Controllers\production\OperatorPerformance;


use Auth;
use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Production\Monitoring\OpHadir;
use App\Services\Production\Monitoring\Cm_Earning;
use App\Models\Production\OperatorPerformance;
use App\Services\HR_GA\Lembur\Overtime;


class ProgressOutputController extends Controller
{
    public function index()
    {   
        $nama_bulan=date('Y-m');
        $bulan=(new  Overtime)->awal_akhir($nama_bulan);
        $a=OperatorPerformance::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->get();
        $get_data=(new Cm_Earning)->replace($a);
        $data=(new Cm_Earning)->eleminasi_line($get_data);
        $avg=(new CM_Earning)->average($data);
        $record=(new Cm_Earning)->group_line($avg);
        $tanggal=(new Cm_Earning)->group_tanggal($data);
        $page ='dashboard';
        return view('production.operatorperformance.ProgressOutput.index', compact('page','record','tanggal','data','get_data'));

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
        $a=OperatorPerformance::where('tanggal','>=',$first_date)->where('tanggal','<=',$last_date)->get();
        $get_data=(new Cm_Earning)->replace($a);
        $data=(new Cm_Earning)->eleminasi_line($get_data);
        $avg=(new CM_Earning)->average($data);

        $record=(new Cm_Earning)->group_line($avg);
        $tanggal=(new Cm_Earning)->group_tanggal($data);
        
        $page ='dashboard';
        return view('production.operatorperformance.ProgressOutput.index', compact('page','record','tanggal','data','get_data'));
    }

    public function op_hadir()
    {   

        $user=Auth::user()->branchdetail;
        $tanggal=date('Y-m-d');
        $tanggal2=date('Y-m-d');
        $get_line=OperatorPerformance::where('tanggal',$tanggal)->where('fasilitas',$user)->get();
        $data=(new Cm_Earning)->eleminasi_line($get_line);
        $line=(new Cm_earning)->nama_line($data);
        $op_hadir=OpHadir::where('tanggal',$tanggal2)->where('branchdetail',$user)->get();
        $page ='op';
        return view('production.operatorperformance.ProgressOutput.operator_hadir', compact('page','line','tanggal','tanggal2','op_hadir'));

    }
    public function createHadir($id)
    {
        $user=Auth::user()->branchdetail;
        $tanggal=$id;
        $tanggal2=$id;
        $get_line=OperatorPerformance::where('tanggal',$tanggal)->where('fasilitas',$user)->get();
        $data=(new Cm_Earning)->eleminasi_line($get_line);
        $line=(new Cm_earning)->nama_line($data);
        $op_hadir=OpHadir::where('tanggal',$tanggal2)->where('branchdetail',$user)->get();
        $page ='op';
        return view('production.operatorperformance.ProgressOutput.operator_hadir', compact('page','line','tanggal','tanggal2','op_hadir'));
    }
    public function OpHadirTgl($id)
    {
        $user=Auth::user()->branchdetail;
        $tanggal=date('Y-m-d');
        $tanggal2=$id;
        $get_line=OperatorPerformance::where('tanggal',$tanggal)->where('fasilitas',$user)->get();
        $data=(new Cm_Earning)->eleminasi_line($get_line);
        $line=(new Cm_earning)->nama_line($data);
        $op_hadir=OpHadir::where('tanggal',$tanggal2)->where('branchdetail',$user)->get();
        $page ='op';
        return view('production.operatorperformance.ProgressOutput.operator_hadir', compact('page','line','tanggal','tanggal2','op_hadir'));
    }
    
    public function get_style(Request $request)
    {
        $user=Auth::user()->branchdetail;
        $get_style=OperatorPerformance::where('tanggal',$request->tanggal)->where('fasilitas',$user)->where('line',$request->line)->get();
        $line=(new Cm_Earning)->eleminasi_line($get_style);
        $style=(new Cm_earning)->list_style($line);
        $data=collect($style)->pluck('id','text','line');
       
        return response()->json($data);
    }
    public function storeHadir(Request $request)
    {   
        $user=Auth::user();
        $count=count($request->line);
        for ($i=0; $i < $count ; $i++) { 
            $data=[
                'branchdetail'=>$user->branchdetail,
                'tanggal'=>$request->tanggal,
                'line'=>$request->line[$i],
                'style'=>$request->style[$i],
                'total_operator'=>$request->total_op[$i],
                'waktu_smv'=>$request->waktu_smv[$i]*60,
                'created_by'=>$user->nik,
            ];
            if( OpHadir::where('tanggal',$data['tanggal'])->where('branchdetail',$data['branchdetail'])->where('line',$data['line'])->where('style',$data['style'])->count()){

            }
            else{
                OpHadir::create($data);
            }

        }
        return back();
    }

    public function updateHadir(Request $request)
    {   
        $user=Auth::user();
        $id=$request->id;
            $data=[
                'tanggal'=>$request->tanggal,
                'line'=>$request->line,
                'style'=>$request->style,
                'total_operator'=>$request->total_operator,
                'waktu_smv'=>$request->waktu_smv*60,
                'updated_by'=>$user->nik,
            ];
        OpHadir::whereId($id)->update($data);

        return back();
    }
}