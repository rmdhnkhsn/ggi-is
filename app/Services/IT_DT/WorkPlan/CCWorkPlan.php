<?php

namespace App\Services\IT_DT\WorkPlan;

use Auth;
use App\User;
use App\Branch;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;
Use App\Models\IT_DT\Work_Plan\WorkPlan;

class CCWorkPlan{

    public function get_project_all($tahun,$dataBranch)
    {
        $get_project_all=WorkPlan::where('kode_branch',$dataBranch->kode_branch)
        ->where('branchdetail', $dataBranch->branchdetail)->whereYear('created_at',$tahun)->get();
        return $get_project_all;
    }

    public function get_project_done($tahun,$dataBranch)
    {
        $get_project_done=WorkPlan::where('kode_branch',$dataBranch->kode_branch)
        ->where('branchdetail', $dataBranch->branchdetail)->where('status_work','Done')->whereYear('aktual_tgl_selesai',$tahun)->get();
        return $get_project_done;
    }
    public function get_project_pending($tahun,$dataBranch)
    {
        $get_project_pending=WorkPlan::where('kode_branch',$dataBranch->kode_branch)
        ->where('branchdetail', $dataBranch->branchdetail)->where('status_work','Pending')->whereYear('tgl_mulai',$tahun)->get();
        return $get_project_pending;
    }
    public function get_project_progres($tahun,$dataBranch)
    {
        $get_project_progres=WorkPlan::where('kode_branch',$dataBranch->kode_branch)
        ->where('branchdetail', $dataBranch->branchdetail)->where('status_work','On Going')->whereYear('tgl_mulai',$tahun)->get();
        return $get_project_progres;
    }
    public function get_project_plan($dataBranch)
    {
        $get_project_plan=WorkPlan::where('kode_branch',$dataBranch->kode_branch)
        ->where('branchdetail', $dataBranch->branchdetail)->where('status_work','Up Comming Task')->get();
        return $get_project_plan;
    }
    public function total_digital($get_project_done, $dept)
    {
        $total_digital=[];
        foreach ($dept as $key => $value) {
        $count_dept=$get_project_done->where('dept',$value)->count();
        $total_digital[]=[
            'nama_dept'=>$value,
            'count_dept'=>$count_dept,
            ];
       }
       return $total_digital;
    }

    public function total_kategori($get_project_done, $kategori)
    {
        $total_kategori=[];
        foreach ($kategori as $key => $value) {
        $count_ktg=$get_project_done->where('kategori',$value)->count();
        $total_kategori[]=[
            'kategori'=>$value,
            'count_kgt'=>$count_ktg,
            ];
       }
       return $total_kategori;
    }

    public function total_task($get_project_done, $get_project_pending , $get_project_progres, $get_project_plan, $get_project_all)
    {
        $total_task=[];
        
        $project_done=$get_project_done->count();
        $project_pending=$get_project_pending->count();
        $project_progres=$get_project_progres->count();
        $project_plan=$get_project_plan->count();
        $project_all=$get_project_all->count();
        if($project_all!='0'){
            $persen_done=round($project_done/$project_all*100,2);
            $persen_pending=round($project_pending/$project_all*100,2);
            $persen_progres=round($project_progres/$project_all*100,2);
        }
        else{
            $persen_done='0';
            $persen_pending='0';
            $persen_progres='0';
        }
        
        // dd($project_all);
        
        $total_task=[
            'project_done'=>$project_done,
            'project_pending'=>$project_pending,
            'project_progres'=>$project_progres,
            'project_plan'=>$project_plan,
            'persen_done'=> $persen_done,
            'persen_pending'=> $persen_pending,
            'persen_progres'=> $persen_progres,
            ];
       
       return $total_task;
    }

    public function progress_team($get_project_all,$tahun)
    {
        $project_all= collect($get_project_all)->groupBy('nik_programmer');
        // dd($get_project_all);
        $progress_team=[];
        foreach ($project_all as $key => $value) {
            foreach ($value as $key1 => $value1) {
                $nama=explode(" " , $value1->nama_programmer);
                $coba = array_slice( $nama,0,1);
                foreach ($coba as $key2 => $value2) {
                   $nama_depan=$value2;
                }
                $task=$value->count();
                $done=$get_project_all->where('nik_programmer',$value1->nik_programmer)->where('status_work','Done')->count();
                $persen=round( $done / $task *100,2);
                $progress_team[]=[
                    'nama_depan'=> ucwords(strtolower($nama_depan)),
                    'nik'=>$value1->nik_programmer,
                    'programmer'=>$value1->nama_programmer,
                    'count_task'=>$task,
                    'done_task'=>$done,
                    'persen'=>$persen,
                ];
            }
        }
        $test = collect($progress_team)
                        ->groupBy('nik')
                        // ->sortByDesc('tgl_vote')
                        ->map(function ($item) {
                            return array_merge(...$item);
                        })->values();
        // dd($test);
    return $test;
    }
    public function Summary($get_project_all, $get_project_pending,$get_project_done)
    {
        $project_all=$get_project_all->count();
        // dd($project_all);
        $project_pending=$get_project_pending->count();
        $project_done=$get_project_done->count();
        if($project_all!=0){
            $persen=round($project_done/$project_all*100,2);
        }
        else{
            $persen=0;
        }
        $Summary=[
            'project_all'=>$project_all,
            'project_pending'=>$project_pending,
            'project_done'=>$project_done,
            'persen'=>$persen,
        ];
        return $Summary;
    }

    public function OnTime($get_project_done)
    {
        $Ontime=[];
        // $OntimeRate=[];
        foreach ($get_project_done as $key => $value) {
            if($value->tgl_mulai==$value->aktual_tgl_selesai){
                $jumlah_durasi ='1';
                $jumlah_durasi_pending='';
            }
            else{
                $durasi = [];
                $durasi_pending = [];
                $mulai = strtotime($value->tgl_mulai);
                $selesai = strtotime($value->aktual_tgl_selesai);
                for ($i=$mulai; $i <= $selesai; $i += (60 * 60 * 24)) {
                    if (date('w', $i) !== '0' && date('w', $i) !== '6') {
                        $durasi[] = $i;
                    } 
                }
                if($value->tgl_pending== null){
                    $jumlah_durasi = count($durasi)-1;
                }
                else{
                    $mulai = strtotime($value->tgl_pending);
                    $selesai = strtotime($value->tgl_mulai_pending);
                    for ($i=$mulai; $i <= $selesai; $i += (60 * 60 * 24)) {
                        if (date('w', $i) !== '0' && date('w', $i) !== '6') {
                            $durasi_pending[] = $i;
                        } 
                    }
                    $jml_durasi = count($durasi)-1;
                    $jumlah_durasi_pending = count($durasi_pending)-1;
                    $jumlah_durasi = $jml_durasi-$jumlah_durasi_pending;
                }
            }
            if($jumlah_durasi<=$value->estimasi_durasi){
                $Ontime[]=[
                    'id'=>$value->id,
                    'nik_programmer'=>$value->nik_programmer,
                    'nama_programmer'=>$value->nama_programmer,
                ];

            }

        }
        $count_project=$get_project_done->count();
        $count_OnTime=count($Ontime);
        if($count_project!=0){
        $OntimeRate=round($count_OnTime/$count_project*100,2);
        }
        else{
            $OntimeRate='0';
        }
        return $OntimeRate;
    }
    public function project_progres($get_project_progres)
    {
       $project_progres=[];
       foreach ($get_project_progres as $key => $value) {
            $nama=explode(" " , $value->nama_programmer);
            $coba = array_slice( $nama,0,1);
            foreach ($coba as $key2 => $value2) {
            $nama_depan=$value2;
            }
           $project_progres[]=[
               'nama_projek'=>$value->nama_projek,
               'dept'=>$value->dept,
               'nama_programmer'=>ucwords(strtolower($nama_depan)),
           ];
       }
       return $project_progres;
    }
    public function all_project($get_project_all)
    {
        $all_project=[];

        foreach ($get_project_all as $key => $value) {
            $nama=explode(" " , $value->nama_programmer);
            $coba = array_slice( $nama,0,1);
            foreach ($coba as $key2 => $value2) {
            $nama_depan=$value2;
            }
            if($value->tgl_mulai==$value->aktual_tgl_selesai){
                $jumlah_durasi ='1';
                $jumlah_durasi_pending='';
            }
            else{
                $durasi = [];
                $durasi_pending = [];
                $mulai = strtotime($value->tgl_mulai);
                $selesai = strtotime($value->aktual_tgl_selesai);
                for ($i=$mulai; $i <= $selesai; $i += (60 * 60 * 24)) {
                    if (date('w', $i) !== '0' && date('w', $i) !== '6') {
                        $durasi[] = $i;
                    } 
                }
                if($value->tgl_pending== null){
                    $jumlah_durasi = count($durasi)-1;
                    $jumlah_durasi_pending='';
                }
                else{
                    $mulai = strtotime($value->tgl_pending);
                    if($value->status_work=="Pending"){
                        $date= date('Y-m-d');
                        $selesai = strtotime($date);
                    }
                    else{
                        $selesai = strtotime($value->tgl_mulai_pending);
                    }
                    for ($i=$mulai; $i <= $selesai; $i += (60 * 60 * 24)) {
                        if (date('w', $i) !== '0' && date('w', $i) !== '6') {
                            $durasi_pending[] = $i;
                        } 
                    }
                    $jml_durasi = count($durasi)-1;
                    $jumlah_durasi_pending = count($durasi_pending)-1;
                    $jumlah_durasi = $jml_durasi-$jumlah_durasi_pending;
                }
            }
            $all_project[]=[
                'id'=>$value->id,
                'nama_projek'=>$value->nama_projek,
                'nama_programmer'=>$value->nama_programmer,
                'estimasi_durasi'=>$value->estimasi_durasi,
                'aktual_durasi'=>$jumlah_durasi,
                'durasi_pending'=>$jumlah_durasi_pending,
                'tgl_mulai'=>$value->tgl_mulai,
                'tgl_pending'=>$value->tgl_pending,
                'tgl_mulai_pending'=>$value->tgl_mulai_pending,
                'estimasi_tgl_selsai'=>$value->estimasi_tgl_selsai,
                'aktual_tgl_selesai'=>$value->aktual_tgl_selesai,
                'status_work'=>$value->status_work,
                'dept'=>$value->dept,
                'kategori'=>$value->kategori,
                'benefit'=>$value->benefit,
                'remark'=>$value->remark,
                'nama_depan'=>ucwords(strtolower($nama_depan))
            ];
        }
        $all_task=collect($all_project)->sortByDesc('tgl_mulai');
        // dd($test);
        return  $all_task;
    }

    public function done_groupBy_bln($get_project_done)
    {
        $done_groupBy_bln=[];
        foreach ($get_project_done as $key => $value) {
                $array1=explode("-",$value->aktual_tgl_selesai);
                $bulan=$array1[1];
            $done_groupBy_bln[]=[
                'id'=>$value->id,
                'nama_projek'=>$value->nama_projek,
                'tgl_mulai'=>$value->tgl_mulai,
                'estimasi_tgl_selsai'=>$value->estimasi_tgl_selsai,
                'aktual_tgl_selesai'=>$value->aktual_tgl_selesai,
                'bulan'=>$bulan,
                'tgl_pending'=>$value->tgl_pending,
                'tgl_mulai_pending'=>$value->tgl_mulai_pending,
                'estimasi_durasi'=>$value->estimasi_durasi,
                'benefit'=>$value->benefit,
                'dept'=>$value->dept,
                'remark'=>$value->remark,
                'nama_programmer'=>$value->nama_programmer,
                'nik_programmer'=>$value->nik_programmer,
                'status_work'=>$value->status_work,
                'kode_branch'=>$value->kode_branch,
                'branchdetail'=>$value->branchdetail,
                
            ];
        }
        return $done_groupBy_bln;
    }

    public function resume_perbulan($dept,$done_groupBy_bln)
    {
        $total_digital=[];
        foreach ($dept as $key => $value) {
            $data=collect($done_groupBy_bln);
        $januari=$data->where('dept',$value)->where('bulan','=','01')->count();
        $februari=$data->where('dept',$value)->where('bulan','=','02')->count();
        $maret=$data->where('dept',$value)->where('bulan','=','03')->count();
        $april=$data->where('dept',$value)->where('bulan','=','04')->count();
        $mei=$data->where('dept',$value)->where('bulan','=','05')->count();
        $juni=$data->where('dept',$value)->where('bulan','=','06')->count();
        $juli=$data->where('dept',$value)->where('bulan','=','07')->count();
        $agustus=$data->where('dept',$value)->where('bulan','=','08')->count();
        $september=$data->where('dept',$value)->where('bulan','=','09')->count();
        $oktober=$data->where('dept',$value)->where('bulan','=','10')->count();
        $november=$data->where('dept',$value)->where('bulan','=','11')->count();
        $desember=$data->where('dept',$value)->where('bulan','=','12')->count();
        $total=$januari+$februari+$maret+$april+$mei+$juni+$juli+$agustus+$september+$oktober+$november+$desember;

        $digital[]=[
            'nama_dept'=>$value,
            'jan'=>$januari,
            'feb'=>$februari,
            'mar'=>$maret,
            'apr'=>$april,
            'mei'=>$mei,
            'jun'=>$juni,
            'jul'=>$juli,
            'ags'=>$agustus,
            'sep'=>$september,
            'okt'=>$oktober,
            'nov'=>$november,
            'des'=>$desember,
            'total'=>$total,
            ];
       }
       $total_digital=collect($digital)->sortByDesc('total');
       return $total_digital;
    }

    public function total_resume_perbulan($resume_perbulan){
        $jan=collect($resume_perbulan)->sum('jan');
        $feb=collect($resume_perbulan)->sum('feb');
        $mar=collect($resume_perbulan)->sum('mar');
        $apr=collect($resume_perbulan)->sum('apr');
        $mei=collect($resume_perbulan)->sum('mei');
        $jun=collect($resume_perbulan)->sum('jun');
        $jul=collect($resume_perbulan)->sum('jul');
        $ags=collect($resume_perbulan)->sum('ags');
        $sep=collect($resume_perbulan)->sum('sep');
        $okt=collect($resume_perbulan)->sum('okt');
        $nov=collect($resume_perbulan)->sum('nov');
        $des=collect($resume_perbulan)->sum('des');
        $jml=$jan+$feb+$mar+$apr+$mei+$jun+$jul+$ags+$sep+$okt+$nov+$des;
        // dd($jan);
        $total=[
            'jan'=>$jan,
            'feb'=>$feb,
            'mar'=>$mar,
            'apr'=>$apr,
            'mei'=>$mei,
            'jun'=>$jun,
            'jul'=>$jul,
            'ags'=>$ags,
            'sep'=>$sep,
            'okt'=>$okt,
            'nov'=>$nov,
            'des'=>$des,
            'total'=>$jml,
        ];
        return $total;
    }
    public function grafik_progres($groupBy_bln)
    {
        $bln=[
            '01'=>'Jan',
            '02'=>'Feb',
            '03'=>'Mar',
            '04'=>'Apr',
            '05'=>'May',
            '06'=>'Jun',
            '07'=>'Jul',
            '08'=>'Aug',
            '09'=>'Sep',
            '10'=>'Oct',
            '11'=>'Nov',
            '12'=>'Des',
        ];
        foreach ($bln as $key1 => $value1) {
                $data=collect($groupBy_bln);
               $data_grafik[]=[
                'kode_bln'=>$key1,
                'data_label'=>$value1,
                'Felix'     =>$data->where('nik_programmer','270035')->where('bulan',$key1)->count(),
                'Reza'      =>$data->where('nik_programmer','350008')->where('bulan',$key1)->count(),
                'Nurul'     =>$data->where('nik_programmer','110003')->where('bulan',$key1)->count(),
                'Darry'     =>$data->where('nik_programmer','GC110064')->where('bulan',$key1)->count(),
                'Andri'     =>$data->where('nik_programmer','GC110078')->where('bulan',$key1)->count(),
                'Ramadhon'  =>$data->where('nik_programmer','GC110080')->where('bulan',$key1)->count(),
                'Fahlu'     =>$data->where('nik_programmer','GC110081')->where('bulan',$key1)->count(),
                'Agus'      =>$data->where('nik_programmer','332100185')->where('bulan',$key1)->count(),
                'feni'      =>$data->where('nik_programmer','110067')->where('bulan',$key1)->count(),
                'aldi'      =>$data->where('nik_programmer','332100286')->where('bulan',$key1)->count(),
                'rexy'      =>$data->where('nik_programmer','92200244')->where('bulan',$key1)->count(),
              
               ];
        }
        return $data_grafik;
    }

}