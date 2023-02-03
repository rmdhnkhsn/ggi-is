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

class plan{

    public function dept()
    {
        $dept = [
            'IT & DT' => 'IT & DT',
            'Marketing' => 'Marketing',
            'QC' => 'QC',
            'Mat & Dok' => 'Mat & Dok',
            'HRD' => 'HRD',
            'Akunting' => 'Akunting',
            'Internal Audit' => 'Internal Audit',
            'Produksi' => 'Produksi',
            'Sample' => 'Sample',
            'Warehouse' => 'Warehouse',
        ];

        // dd($status);
        return $dept;
    }

    public function kategori()
    {
        $kategori = [
            'Ticketing' => 'Ticketing',
            'Notification' => 'Notification',
            'Dashboard' => 'Dashboard',
            'Command Center' => 'Command Center',
            'RPA' =>'RPA',
            'Macro'=>'Macro',
        ];

        // dd($status);
        return $kategori;
    }
    public function list_projek($user_login)
    {
        $list_projek=WorkPlan::where('nik_programmer',$user_login)
                ->wherein('status_work',['Up Comming Task','On Going',])
                ->orderBy('estimasi_tgl_selsai', 'DESC')->orderBy('id', 'DESC')->get();
        return $list_projek;
    }
    public function upcomming_project($user_login)
    {
        $upcomming_project=WorkPlan::where('nik_programmer',$user_login)
                ->where('status_work','Up Comming Task')
                ->orderBy('estimasi_tgl_selsai', 'DESC')->get();
        return $upcomming_project;
    }

    public function get_pending_project($user_login)
    {
        $get_pending_project=WorkPlan::where('nik_programmer',$user_login)->where('status_work','Pending')->orderBy('estimasi_tgl_selsai', 'ASC')->get();

        return $get_pending_project;
    }
    public function proses_projek($user_login)
    {
        $get_done_project=WorkPlan::where('nik_programmer',$user_login)->where('status_work','On Going')->orderBy('tgl_mulai', 'ASC')->first();

        return $get_done_project;
    }

    public function count_task($user_login)
    {
        $count_task=[];
        $progress=WorkPlan::where('nik_programmer',$user_login)->where('status_work','On Going')->count();
        $list=WorkPlan::where('nik_programmer',$user_login)->wherein('status_work',['Up Comming Task','On Going',])->count();
        $count_task=[
            'progress'=>$progress,
            'task'=>$list,
        ];
        return $count_task;
    }

    public function get_done_project($user_login)
    {
        $get_done_project=WorkPlan::where('nik_programmer',$user_login)->where('status_work','Done')->orderBy('aktual_tgl_selesai', 'DESC')->get();;

        return $get_done_project;
    }
    public function pending_project($get_pending_project)
    {
        $pending_project=[];
        foreach ($get_pending_project as $key => $value) {
            $durasi_pending=[];
            $date= date('Y-m-d');
            $mulai = strtotime($value->tgl_pending);
            $today= strtotime($date);
            for ($i=$mulai; $i <= $today; $i += (60 * 60 * 24)) {
                if (date('w', $i) !== '0' && date('w', $i) !== '6') {
                    $durasi_pending[] = $i;
                } 
            }
            $jumlah_durasi_pending = count($durasi_pending)-1;

            $pending_project[]=[  
                'id'=>$value->id,
                'nama_projek'=>$value->nama_projek,
                'benefit'=>$value->benefit,
                'dept'=>$value->dept,
                'kategori'=>$value->kategori,
                'remark'=>$value->remark,
                'status_work'=>$value->status_work,
                'tgl_mulai'=>$value->tgl_mulai,
                'estimasi_tgl_selsai'=>$value->estimasi_tgl_selsai,
                'estimasi_durasi'=>$value->estimasi_durasi,
                'durasi_pending'=>$jumlah_durasi_pending,
                'tgl_pending'=>$value->tgl_pending,
                'tgl'=>$date,
            ];
            
        }
        // dd($pending_project);
        return $pending_project;
    }

    public function project_done($get_done_project)
    {
        $project_done=[];
        foreach ($get_done_project as $key => $value) {
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
            
            $project_done[]=[
                'id'=>$value->id,
                'nama_projek'=>$value->nama_projek,
                'benefit'=>$value->benefit,
                'dept'=>$value->dept,
                'kategori'=>$value->kategori,
                'remark'=>$value->remark,
                'status_work'=>$value->status_work,
                'tgl_mulai'=>$value->tgl_mulai,
                'estimasi_tgl_selsai'=>$value->estimasi_tgl_selsai,
                'aktual_tgl_selesai'=>$value->aktual_tgl_selesai,
                'estimasi_durasi'=>$value->estimasi_durasi,
                'durasi'=>$jumlah_durasi,
                'durasi_pending'=>$jumlah_durasi_pending,
                'tgl_pending'=>$value->tgl_pending,
                'tgl_mulai_pending'=>$value->tgl_mulai_pending,

            ];
            
        }

        return $project_done;
    }
}