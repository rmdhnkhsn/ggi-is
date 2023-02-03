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

class AuditBuyer{

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
   public function item_lokasi()
   {
      $item_lokasi=ItemLokasi::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->get();

      return $item_lokasi;
   }
   public function apar($bln_tanggal)
   {
       $apar=Apar::where('kode_branch',auth()->user()->branch)
       ->where('branchdetail', auth()->user()->branchdetail)->where('tgl_periksa','>=',$bln_tanggal['awal'])
       ->where('tgl_periksa','<=',$bln_tanggal['akhir'])->get();
       return $apar;
   }

   public function alarm($bln_tanggal)
   {
       $alarm=AlarmBtn::where('kode_branch',auth()->user()->branch)
       ->where('branchdetail', auth()->user()->branchdetail)->where('tgl_periksa','>=',$bln_tanggal['awal'])
       ->where('tgl_periksa','<=',$bln_tanggal['akhir'])->get();
       return $alarm;
   }

   public function SmokeDet($bln_tanggal)
   {
       $SmokeDet=SmokeDet::where('kode_branch',auth()->user()->branch)
       ->where('branchdetail', auth()->user()->branchdetail)->where('tgl_periksa','>=',$bln_tanggal['awal'])
       ->where('tgl_periksa','<=',$bln_tanggal['akhir'])->get();
       return $SmokeDet;
   }

   public function EmerExit($bln_tanggal)
   {
       $EmerExit=EmerExit::where('kode_branch',auth()->user()->branch)
       ->where('branchdetail', auth()->user()->branchdetail)->where('tgl_periksa','>=',$bln_tanggal['awal'])
       ->where('tgl_periksa','<=',$bln_tanggal['akhir'])->get();
       return $EmerExit;
   }

   public function EmerLamp($bln_tanggal)
   {
       $EmerLamp=EmerLamp::where('kode_branch',auth()->user()->branch)
       ->where('branchdetail', auth()->user()->branchdetail)->where('tgl_periksa','>=',$bln_tanggal['awal'])
       ->where('tgl_periksa','<=',$bln_tanggal['akhir'])->get();
       return $EmerLamp;
   }

   public function notif($records,$bln_tanggal)
   {
    $apar=Apar::where('kode_branch',auth()->user()->branch)
        ->where('branchdetail', auth()->user()->branchdetail)->where('tgl_periksa','>=',$bln_tanggal['awal'])
        ->where('tgl_periksa','<=',$bln_tanggal['akhir'])->count();
    
    $alarm=AlarmBtn::where('kode_branch',auth()->user()->branch)
        ->where('branchdetail', auth()->user()->branchdetail)->where('tgl_periksa','>=',$bln_tanggal['awal'])
        ->where('tgl_periksa','<=',$bln_tanggal['akhir'])->count();
    $SmokeDet=SmokeDet::where('kode_branch',auth()->user()->branch)
        ->where('branchdetail', auth()->user()->branchdetail)->where('tgl_periksa','>=',$bln_tanggal['awal'])
        ->where('tgl_periksa','<=',$bln_tanggal['akhir'])->count();
    $EmerExit=EmerExit::where('kode_branch',auth()->user()->branch)
        ->where('branchdetail', auth()->user()->branchdetail)->where('tgl_periksa','>=',$bln_tanggal['awal'])
        ->where('tgl_periksa','<=',$bln_tanggal['akhir'])->count();
    $EmerLamp=EmerLamp::where('kode_branch',auth()->user()->branch)
        ->where('branchdetail', auth()->user()->branchdetail)->where('tgl_periksa','>=',$bln_tanggal['awal'])
        ->where('tgl_periksa','<=',$bln_tanggal['akhir'])->count();
       $notif=[];
       foreach ($records as $key => $value) {
           foreach ($value as $dp) {
            $master_item=ItemLokasi::where('kode_branch',auth()->user()->branch)
                ->where('branchdetail', auth()->user()->branchdetail)->where('id_item',$dp['id_item'])->count();
            if($dp['id_item']=='1'){
                $jml_tugas_cek=$master_item-$alarm;
            }
            elseif($dp['id_item']=='2'){
                $jml_tugas_cek=$master_item-$SmokeDet;
            }
            elseif($dp['id_item']=='3'){
                $jml_tugas_cek=$master_item-$apar;
            }
            elseif($dp['id_item']=='4'){
                $jml_tugas_cek=$master_item-$EmerExit;
            }
            elseif($dp['id_item']=='5'){
                $jml_tugas_cek=$master_item-$EmerLamp;
            }
                
              $notif[]=[
                  'id'=>$dp['id'],
                  'kode_lokasi'=>$dp['kode_lokasi'],
                  'nama_lokasi'=>$dp['nama_lokasi'],
                  'id_item'=>$dp['id_item'],
                  'item'=>$dp['item'],
                  'kode_branch'=>$dp['kode_branch'],
                  'branchdetail'=>$dp['branchdetail'],
                  'jml_lokasi'=> $master_item,
                  'sisa_cek'=> $jml_tugas_cek,

              ]; 
           }
       }
       return $notif;
   }
   
   public function Repair_count_PerItem()
   {
        $alarm=AlarmBtn::where('kondisi','=','Rusak')->get();
        $alarm_damage=$alarm->where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->count();
        $finish_finish=AlarmBtn::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)
            ->where('perbaikan','!=',null)->where('finish','!=',null)->count();
        $alarm_perbaikan=$alarm_damage+$finish_finish;

        $SmokeDet=SmokeDet::where('ada_smoke','!=','Ada')->orwhere('fungsi','!=','Berfungsi')->orwhere('baterai','!=','Bagus')->get();
        $SmokeDet_demage=$SmokeDet->where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->count();
        $SmokeDet_finish=SmokeDet::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)
            ->where('perbaikan','!=',null)->where('finish','!=',null)->count();
        $SmokeDet_perbaikan=$SmokeDet_demage+$SmokeDet_finish;

        $Apar=Apar::where('tekanan','Rendah')->orwhere('pin','!=','Ada')->orwhere('kondisi_selang','!=','Bagus')
            ->orwhere('kondisi_tuas','!=','Ada')->get();
        $Apar_demage=$Apar->where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->count();
        $Apar_finish=Apar::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)
            ->where('perbaikan','!=',null)->where('finish','!=',null)->count();
        $apar_perbaikan=$Apar_demage+$Apar_finish;

        $emerexit=EmerExit::where('ada_exit','=','Tidak')->orwhere('kondisi_lampu','=','Mati')->get();
        $EmerExit_demage=$emerexit->where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->count();
        $EmerExit_finish=EmerExit::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)
            ->where('perbaikan','!=',null)->where('finish','!=',null)->count();
        $EmerExit_perbaikan=$EmerExit_demage+$EmerExit_finish;

        $EmerLamp=EmerLamp::where('kondisi','=','Rusak')->get();
        $EmerLamp_demage=$EmerLamp->where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->count();
        $EmerLamp_finish=EmerLamp::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)
            ->where('perbaikan','!=',null)->where('finish','!=',null)->count();
        $EmerLamp_perbaikan=$EmerLamp_demage+$EmerLamp_finish;

       $total=$alarm_perbaikan+$SmokeDet_perbaikan+$apar_perbaikan+$EmerExit_perbaikan+$EmerLamp_perbaikan;
       $perbaikan_count=[
            'alarm' =>$alarm_perbaikan,
            'smokedet'=>$SmokeDet_perbaikan,
            'apar'=>$apar_perbaikan,
            'emerexit'=>$EmerExit_perbaikan,
            'emerlamp'=>$EmerLamp_perbaikan,
            'total'=>$total
       ];

       return $perbaikan_count;
   }

   public function Repair_count_PerStatus()
   {
        // $alarm_perbaikan=AlarmBtn::where('kode_branch',auth()->user()->branch)
        //     ->where('branchdetail', auth()->user()->branchdetail)
        //     ->where('kondisi','!=','Bagus')->orwhere('kebersihan','!=','Bersih')->orwhere('ceklis','!=','Ada')
        //     ->count();

        $get_alarm=AlarmBtn::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->get();
        $alarm_count=$get_alarm->filter(function ($alarm){
            return $alarm->kondisi != 'Bagus'|| $alarm->kebersihan != 'Bersih' || $alarm->ceklis!='Ada';
        });
        $alarm_perbaikan=$alarm_count->count();    
        $alarm_proses=AlarmBtn::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->where('perbaikan','!=',null)->where('finish','=',null)->count();
        $alarm_finish=AlarmBtn::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->where('finish','!=',null)->count();

        // $SmokeDet_perbaikan=SmokeDet::where('kode_branch',auth()->user()->branch)
        //     ->where('branchdetail', auth()->user()->branchdetail)->where('ada_smoke','!=','Ada')
        //     ->orwhere('fungsi','!=','Berfungsi')->orwhere('baterai','!=','Bagus')->count();

        $get_SmokeDet=SmokeDet::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->get();
        $SmokeDet_count=$get_SmokeDet->filter(function($SmokeDet){
                return $SmokeDet->ada_smoke != 'Ada'|| $SmokeDet->fungsi != 'Berfungsi' || $SmokeDet->baterai != 'Bagus';
            });
        $SmokeDet_perbaikan=$SmokeDet_count->count();    
        $SmokeDet_proses=SmokeDet::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->where('perbaikan','!=',null)->where('finish','=',null)->count();
        $SmokeDet_finish=SmokeDet::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->where('finish','!=',null)->count();
        
        // $apar_perbaikan=Apar::where('kode_branch',auth()->user()->branch)
        //     ->where('branchdetail', auth()->user()->branchdetail)->where('tekanan','Rendah')
        //     ->orwhere('pin','!=','Ada')->orwhere('kondisi_selang','!=','Bagus')->orwhere('kondisi_tuas','!=','Ada')
        //     ->orwhere('garis_merah','!=','Ada')->count();
        $get_apar=Apar::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->get();
        $apar_count =  $get_apar->filter(function ($apar)
            {return $apar->tekanan == 'Rendah' || $apar->pin != 'Ada' || $apar->kondisi_selang != 'Bagus' ||
                   $apar->kondisi_tuas != 'Ada' || $apar->garis_merah != 'Ada';
            });
        $apar_perbaikan=$apar_count->count();         
        $apar_proses=Apar::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->where('perbaikan','!=',null)->where('finish','=',null)->count();
        $apar_finish=Apar::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->where('finish','!=',null)->count();

        // $EmerExit_perbaikan=EmerExit::where('kode_branch',auth()->user()->branch)
        //     ->where('branchdetail', auth()->user()->branchdetail)->where('ada_exit','!=','Ada')
        //     ->orwhere('kondisi_lampu','!=','Menyala')->orwhere('kebersihan','!=','Bersih')
        //     ->count();
        $get_EmerExit=EmerExit::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->get();
            $emerExit_count=$get_EmerExit->filter(function ($EmerExit)
             {
                 return 
                 $EmerExit->ada_exit != 'Ada' || $EmerExit->kondisi_lampu != 'Menyala' || $EmerExit->kebersihan != 'Bersih';
                 });
        $EmerExit_perbaikan=$emerExit_count->count();
        $EmerExit_proses=EmerExit::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->where('perbaikan','!=',null)->where('finish','=',null)->count();
        $EmerExit_finish=EmerExit::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->where('finish','!=',null)->count();

        // $EmerLamp_perbaikan=EmerLamp::where('kode_branch',auth()->user()->branch)
        //     ->where('branchdetail', auth()->user()->branchdetail)->where('kondisi','!=','Menyala')
        //     ->orwhere('kebersihan','!=','Bersih')->orwhere('form','!=','Ada')
        //     ->count();
        $get_EmerLamp=EmerLamp::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->get();
        $EmerLamp_count=$get_EmerLamp->filter(function ($EmerLamp)
        {
            return 
            $EmerLamp->kondisi != 'Menyala' || $EmerLamp->kebersihan != 'Bersih' || $EmerLamp->form != 'Ada';
            });
        $EmerLamp_perbaikan=$EmerLamp_count->count();
        $EmerLamp_proses=EmerLamp::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->where('perbaikan','!=',null)->where('finish','=',null)->count();
        $EmerLamp_finish=EmerLamp::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->where('finish','!=',null)->count();

        $damage=(($alarm_perbaikan-$alarm_proses)+($SmokeDet_perbaikan-$SmokeDet_proses)+($apar_perbaikan-$apar_proses)+($EmerExit_perbaikan-$EmerExit_proses)+($EmerLamp_perbaikan-$EmerLamp_proses));
        $process=$alarm_proses+$SmokeDet_proses+$apar_proses+$EmerExit_proses+$EmerLamp_proses;
        $finish=$alarm_finish+$SmokeDet_finish+$apar_finish+$EmerExit_finish+$EmerLamp_finish;
        $perbaikan_count=[
            'damage'=>$damage,
            'process'=>$process,
            'finish'=>$finish,
       ];

       return $perbaikan_count;
   }

    public function alarm_perbaikan()
   {
 
    $get_alarm=AlarmBtn::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->get();
    $alarm_perbaikan=$get_alarm->filter(function ($alarm){
        return $alarm->kondisi != 'Bagus'|| $alarm->kebersihan != 'Bersih' || $alarm->ceklis!='Ada';
            });
       return $alarm_perbaikan;
   }

   public function alarm_proses()
   {
       $alarm_proses=AlarmBtn::where('kode_branch',auth()->user()->branch)
       ->where('branchdetail', auth()->user()->branchdetail)->where('perbaikan','!=',null)->where('finish','=',null)->get();
       return $alarm_proses;
   }

   public function alarm_finish()
   {
       $alarm_finish=AlarmBtn::where('kode_branch',auth()->user()->branch)
       ->where('branchdetail', auth()->user()->branchdetail)->where('finish','!=',null)->get();
       return $alarm_finish;
   }

   public function SmokeDet_perbaikan()
   {
    $get_SmokeDet=SmokeDet::where('kode_branch',auth()->user()->branch)
        ->where('branchdetail', auth()->user()->branchdetail)->get();
        $SmokeDet_perbaikan=$get_SmokeDet->filter(function($SmokeDet){
            return $SmokeDet->ada_smoke != 'Ada'|| $SmokeDet->fungsi != 'Berfungsi' || $SmokeDet->baterai != 'Bagus';
        });
       
       return $SmokeDet_perbaikan;
   }

   public function SmokeDet_proses()
   {
       $SmokeDet_proses=SmokeDet::where('kode_branch',auth()->user()->branch)
       ->where('branchdetail', auth()->user()->branchdetail)->where('perbaikan','!=',null)->where('finish','=',null)->get();
       return $SmokeDet_proses;
   }

   public function SmokeDet_finish()
   {
       $SmokeDet_finish=SmokeDet::where('kode_branch',auth()->user()->branch)
       ->where('branchdetail', auth()->user()->branchdetail)->where('finish','!=',null)->get();
       return $SmokeDet_finish;
   }

   public function apar_perbaikan()
   {
    //    $apar_perbaikan=Apar::where('kode_branch',auth()->user()->branch)
    //    ->where('branchdetail', auth()->user()->branchdetail)->where('tekanan','Rendah')
    //    ->orwhere('pin','!=','Ada')->orwhere('kondisi_selang','!=','Bagus')->orwhere('kondisi_tuas','!=','Ada')
    //    ->orwhere('garis_merah','!=','Ada')->get();

        $get_apar=Apar::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->get();
        $apar_perbaikan =  $get_apar->filter(function ($apar)
            {return $apar->tekanan == 'Rendah' || $apar->pin != 'Ada' || $apar->kondisi_selang != 'Bagus' ||
                   $apar->kondisi_tuas != 'Ada' || $apar->garis_merah != 'Ada';
            });  
       return $apar_perbaikan;
   }

   public function apar_proses()
   {
       $apar_proses=Apar::where('kode_branch',auth()->user()->branch)
       ->where('branchdetail', auth()->user()->branchdetail)->where('perbaikan','!=',null)->where('finish','=',null)->get();
       return $apar_proses;
   }

   public function apar_finish()
   {
       $apar_finish=Apar::where('kode_branch',auth()->user()->branch)
       ->where('branchdetail', auth()->user()->branchdetail)->where('finish','!=',null)->get();
       return $apar_finish;
   }


   public function EmerExit_perbaikan()
   {
    //    $EmerExit_perbaikan=EmerExit::where('kode_branch',auth()->user()->branch)
    //    ->where('branchdetail', auth()->user()->branchdetail)->where('ada_exit','!=','Ada')
    //    ->orwhere('kondisi_lampu','!=','Menyala')->orwhere('kebersihan','!=','Bersih')->get();

       $get_EmerExit=EmerExit::where('kode_branch',auth()->user()->branch)
       ->where('branchdetail', auth()->user()->branchdetail)->get();
       $EmerExit_perbaikan=$get_EmerExit->filter(function ($EmerExit)
        {
            return 
            $EmerExit->ada_exit != 'Ada' || $EmerExit->kondisi_lampu != 'Menyala' || $EmerExit->kebersihan != 'Bersih';
            });
       return $EmerExit_perbaikan;
   }

   public function EmerExit_proses()
   {
       $EmerExit_proses=EmerExit::where('kode_branch',auth()->user()->branch)
       ->where('branchdetail', auth()->user()->branchdetail)->where('perbaikan','!=',null)->where('finish','=',null)->get();
       return $EmerExit_proses;
   }

   public function EmerExit_finish()
   {
       $EmerExit_finish=EmerExit::where('kode_branch',auth()->user()->branch)
       ->where('branchdetail', auth()->user()->branchdetail)->where('finish','!=',null)->get();
       return $EmerExit_finish;
   }

   public function EmerLamp_perbaikan()
   {
    //    $EmerLamp_perbaikan=EmerLamp::where('kode_branch',auth()->user()->branch)
    //    ->where('branchdetail', auth()->user()->branchdetail)->where('kondisi','!=','Menyala')
    //    ->orwhere('kebersihan','!=','Bersih')->orwhere('form','!=','Ada')->get();

       $get_EmerLamp=EmerLamp::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->get();
        $EmerLamp_perbaikan=$get_EmerLamp->filter(function ($EmerLamp)
        {
            return 
            $EmerLamp->kondisi != 'Menyala' || $EmerLamp->kebersihan != 'Bersih' || $EmerLamp->form != 'Ada';
            });     
       return $EmerLamp_perbaikan;
   }

   public function EmerLamp_proses()
   {
       $EmerLamp_proses=EmerLamp::where('kode_branch',auth()->user()->branch)
       ->where('branchdetail', auth()->user()->branchdetail)->where('perbaikan','!=',null)->where('finish','=',null)->get();
       return $EmerLamp_proses;
   }

   public function EmerLamp_finish()
   {
       $EmerLamp_finish=EmerLamp::where('kode_branch',auth()->user()->branch)
       ->where('branchdetail', auth()->user()->branchdetail)->where('finish','!=',null)->get();
       return $EmerLamp_finish;
   }

   public function Admin_hrd()
   {
       $Admin_hrd=[
        //    '1'=>'GC110078',
        //    '2'=>'332100185'
           '1'=>'340006',
           '2'=>'330037'
       ];
    return $Admin_hrd;
   }

}