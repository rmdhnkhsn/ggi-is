<?php

namespace App\Services\HR_GA\AuditBuyer;

use Auth;
use App\User;
use App\Branch;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
Use App\Models\HR_GA\AuditBuyer\Apar;
Use App\Models\HR_GA\AuditBuyer\SmokeDet;
Use App\Models\HR_GA\AuditBuyer\EmerExit;
Use App\Models\HR_GA\AuditBuyer\EmerLamp;
Use App\Models\HR_GA\AuditBuyer\AlarmBtn;
Use App\Models\HR_GA\AuditBuyer\ItemLokasi;
use Illuminate\Database\Eloquent\Builder;

class CCAuditBuyer{

    public function menu_project()
    {
        $dataValue = [
            // rework 
                '0' => ['nama' => "Audit Buyer",
                        'inisial' => "Anomali",
                        'issues'=> "0",
                        'critical' => '10',
                        'aktif' =>'1'
                        ],
                '1' => ['nama' => "Employee Overtime",
                        'inisial' => "Anomali",
                        'issues'=> "0",
                        'critical' => '10',
                        'aktif' =>'1'
                        ],
        ];

        return $dataValue;
    }
    public function awal_akhir($bulan)
    {   $bln_tanggal=[];
        $tanggal_awal= Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y-m-d');
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan)->endOfMonth()->format('Y-m-d');
        $bln_tanggal=[
            'awal'  =>$tanggal_awal,
            'akhir' =>$tanggal_akhir,
        ];
        return $bln_tanggal;
    }

    public function MapsApar($record_apar)
    {   
        $MapsApar=[];
        foreach ($record_apar as $key => $value) {
            foreach ($value as $dp) {
                //ststus_cek 1= sudah dicek
                //ststus_cek 0= belum dicek
            if($dp['id_report']==null){
                $status_cek='1';
            }
            else{
                $status_cek='0';
            }
            $MapsApar[]=[
                'item'=>$dp['item'],
                'kode_lokasi'=>$dp['kode_lokasi'],
                'nama_lokasi'=>$dp['nama_lokasi'],
                'status_cek'=>$status_cek,
            ]; 
            }
        }
        return $MapsApar;
    }

    public function MapsAlarm($record_alarm)
    {   
        $MapsAlarm=[];
        foreach ($record_alarm as $key => $value) {
            foreach ($value as $dp) {
                //ststus_cek 1= sudah dicek
                //ststus_cek 0= belum dicek
            if($dp['id_report']==null){
                $status_cek='1';
            }
            else{
                $status_cek='0';
            }
            $MapsAlarm[]=[
                'item'=>$dp['item'],
                'kode_lokasi'=>$dp['kode_lokasi'],
                'nama_lokasi'=>$dp['nama_lokasi'],
                'status_cek'=>$status_cek,
            ]; 
            }
        }
        return $MapsAlarm;
    }

    public function MapsSemokeDet($record_smokedet)
    {   
        $MapsSemokeDet=[];
        foreach ($record_smokedet as $key => $value) {
            foreach ($value as $dp) {
                //ststus_cek 1= sudah dicek
                //ststus_cek 0= belum dicek
            if($dp['id_report']==null){
                $status_cek='1';
            }
            else{
                $status_cek='0';
            }
            $MapsSemokeDet[]=[
                'item'=>$dp['item'],
                'kode_lokasi'=>$dp['kode_lokasi'],
                'nama_lokasi'=>$dp['nama_lokasi'],
                'status_cek'=>$status_cek,
            ]; 
            }
        }
        return $MapsSemokeDet;
    }

    public function MapsEmerExit($record_emerexit)
    {   
        $MapsEmerExit=[];
        foreach ($record_emerexit as $key => $value) {
            foreach ($value as $dp) {
                //ststus_cek 1= sudah dicek
                //ststus_cek 0= belum dicek
            if($dp['id_report']==null){
                $status_cek='1';
            }
            else{
                $status_cek='0';
            }
            $MapsEmerExit[]=[
                'item'=>$dp['item'],
                'kode_lokasi'=>$dp['kode_lokasi'],
                'nama_lokasi'=>$dp['nama_lokasi'],
                'status_cek'=>$status_cek,
            ]; 
            }
        }
        return $MapsEmerExit;
    }

    public function MapsEmerLamp($record_emerlamp)
    {   
        $MapsEmerLamp=[];
        foreach ($record_emerlamp as $key => $value) {
            foreach ($value as $dp) {
                //ststus_cek 1= sudah dicek
                //ststus_cek 0= belum dicek
            if($dp['id_report']==null){
                $status_cek='1';
            }
            else{
                $status_cek='0';
            }
            $MapsEmerLamp[]=[
                'item'=>$dp['item'],
                'kode_lokasi'=>$dp['kode_lokasi'],
                'nama_lokasi'=>$dp['nama_lokasi'],
                'status_cek'=>$status_cek,
            ]; 
            }
        }
        return $MapsEmerLamp;
    }

    public function alarm_perbaikan($dataBranch)
    {
        $get_alarm=AlarmBtn::where('kode_branch',$dataBranch->kode_branch)
        ->where('branchdetail', $dataBranch->branchdetail)->get();
        $alarm_perbaikan=$get_alarm->filter(function ($alarm){
            return $alarm->kondisi != 'Bagus'|| $alarm->kebersihan != 'Bersih' || $alarm->ceklis!='Ada';
        });
        return $alarm_perbaikan;
    }

    public function SmokeDet_perbaikan($dataBranch)
   {
        $get_SmokeDet=SmokeDet::where('kode_branch',$dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)->get();
        $SmokeDet_perbaikan=$get_SmokeDet->filter(function($SmokeDet){
            return $SmokeDet->ada_smoke != 'Ada'|| $SmokeDet->fungsi != 'Berfungsi' || $SmokeDet->baterai != 'Bagus';
        });
       return $SmokeDet_perbaikan;
   }
   public function apar_perbaikan($dataBranch)
   {
       $get_apar=Apar::where('kode_branch',$dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)->get();
        $apar_perbaikan =  $get_apar->filter(function ($apar)
        {
            return $apar->tekanan == 'Rendah' || $apar->pin != 'Ada' || $apar->kondisi_selang != 'Bagus' ||
                   $apar->kondisi_tuas != 'Ada' || $apar->garis_merah != 'Ada';
        });  
       return $apar_perbaikan;
   }

   public function EmerExit_perbaikan($dataBranch)
   {
       $get_EmerExit=EmerExit::where('kode_branch',$dataBranch->kode_branch)
       ->where('branchdetail', $dataBranch->branchdetail)->get();
       $EmerExit_perbaikan=$get_EmerExit->filter(function ($EmerExit)
        {
            return 
            $EmerExit->ada_exit != 'Ada' || $EmerExit->kondisi_lampu != 'Menyala' || $EmerExit->kebersihan != 'Bersih';
            });  
       return $EmerExit_perbaikan;
   }

   public function EmerLamp_perbaikan($dataBranch)
   {
       $get_EmerLamp=EmerLamp::where('kode_branch',$dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)->get();
        $EmerLamp_perbaikan=$get_EmerLamp->filter(function ($EmerLamp)
        {
            return 
            $EmerLamp->kondisi != 'Menyala' || $EmerLamp->kebersihan != 'Bersih' || $EmerLamp->form != 'Ada';
            });     
       return $EmerLamp_perbaikan;
   }

   public function count_damage($alarm_perbaikan,$SmokeDet_perbaikan,$apar_perbaikan,$EmerExit_perbaikan,$EmerLamp_perbaikan)
   {
      $alarm=$alarm_perbaikan->where('perbaikan',null)->count();
      $SmokeDet=$SmokeDet_perbaikan->where('perbaikan',null)->count();
      $apar=$apar_perbaikan->where('perbaikan',null)->count();
      $EmerExit=$EmerExit_perbaikan->where('perbaikan',null)->count();
      $EmerLamp=$EmerLamp_perbaikan->where('perbaikan',null)->count();
    //   dd($apar);
      $count_damage=$alarm+$SmokeDet+$apar+$EmerExit+$EmerLamp;
      return $count_damage;
   }

}