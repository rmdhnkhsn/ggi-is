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

class Report{

    
   public function item_apar_lokasi($dataBranch)
   {
      $item_apar_lokasi=ItemLokasi::where('kode_branch',$dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)->where('id_item','3')->get();

      return $item_apar_lokasi;
   }
   public function item_alarm_lokasi($dataBranch)
   {
      $item_alarm_lokasi=ItemLokasi::where('kode_branch',$dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)->where('id_item','1')->get();

      return $item_alarm_lokasi;
   }

   public function item_smokedet_lokasi($dataBranch)
   {
      $item_smokedet_lokasi=ItemLokasi::where('kode_branch',$dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)->where('id_item','2')->get();

      return $item_smokedet_lokasi;
   }

   public function item_emerexit_lokasi($dataBranch)
   {
      $item_emerexit_lokasi=ItemLokasi::where('kode_branch',$dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)->where('id_item','4')->get();

      return $item_emerexit_lokasi;
   }

   public function item_emerlamp_lokasi($dataBranch)
   {
      $item_emerlamp_lokasi=ItemLokasi::where('kode_branch',$dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)->where('id_item','5')->get();

      return $item_emerlamp_lokasi;
   }

    public function apar($bln_tanggal,$dataBranch)
   {
       $apar=Apar::where('kode_branch',$dataBranch->kode_branch)
       ->where('branchdetail', $dataBranch->branchdetail)->where('tgl_periksa','>=',$bln_tanggal['awal'])
       ->where('tgl_periksa','<=',$bln_tanggal['akhir'])->get();
       return $apar;
   }

   public function alarm($bln_tanggal,$dataBranch)
   {
       $alarm=AlarmBtn::where('kode_branch',$dataBranch->kode_branch)
       ->where('branchdetail', $dataBranch->branchdetail)->where('tgl_periksa','>=',$bln_tanggal['awal'])
       ->where('tgl_periksa','<=',$bln_tanggal['akhir'])->get();
       return $alarm;
   }

   public function SmokeDet($bln_tanggal,$dataBranch)
   {
       $SmokeDet=SmokeDet::where('kode_branch',$dataBranch->kode_branch)
       ->where('branchdetail', $dataBranch->branchdetail)->where('tgl_periksa','>=',$bln_tanggal['awal'])
       ->where('tgl_periksa','<=',$bln_tanggal['akhir'])->get();
       return $SmokeDet;
   }


   public function EmerExit($bln_tanggal,$dataBranch)
   {
       $EmerExit=EmerExit::where('kode_branch',$dataBranch->kode_branch)
       ->where('branchdetail', $dataBranch->branchdetail)->where('tgl_periksa','>=',$bln_tanggal['awal'])
       ->where('tgl_periksa','<=',$bln_tanggal['akhir'])->get();
       return $EmerExit;
   }

   public function EmerLamp($bln_tanggal,$dataBranch)
   {
       $EmerLamp=EmerLamp::where('kode_branch',$dataBranch->kode_branch)
       ->where('branchdetail', $dataBranch->branchdetail)->where('tgl_periksa','>=',$bln_tanggal['awal'])
       ->where('tgl_periksa','<=',$bln_tanggal['akhir'])->get();
       return $EmerLamp;
   }

   public function apar_thn($tahun,$dataBranch)
   {
       $apar=Apar::where('kode_branch',$dataBranch->kode_branch)
       ->where('branchdetail', $dataBranch->branchdetail)->whereYear('tgl_periksa',$tahun)->get();
            $test = collect($apar)->groupBy(function($item){
            return \Carbon\Carbon::parse($item->tgl_periksa)->format('m');
             });
            //  dd($test);
       return $test;
   }

   public function report_apar_thn($check_apar, $lokasi_apar)
   {
       foreach ($check_apar as $key => $value) {
           foreach ($value as $dp) {
               $data_apar_check[]=[
                'bulan'=>$key,
                'kode_lokasi'=>$dp['kode_lokasi'],
                'tgl_periksa'=>$dp['tgl_periksa'],
                'nama_lokasi'=>$dp['nama_lokasi'],
                'tekanan'=>$dp['tekanan'],
                'pin'=>$dp['pin'],
                'kondisi_selang'=>$dp['kondisi_selang'],
                'berat_tabung'=>$dp['berat_tabung'],
                'masa_berlaku'=>$dp['masa_berlaku'],
                'kondisi_tuas'=>$dp['kondisi_tuas'],
                'garis_merah'=>$dp['garis_merah'],
                'kondisi_sign'=>$dp['kondisi_sign'],
                'petugas'=>$dp['petugas'],
               ];
           }
       }
       foreach ($data_apar_check as $key => $value) {
           foreach ($lokasi_apar as $key1 => $value1) {
                if($value['kode_lokasi']==$value1['kode_lokasi'])
                {
                    $tgl_periksa=$value['tgl_periksa'];
                    $nama_lokasi=$value['nama_lokasi'];
                    $tekanan=$value['tekanan'];
                    $pin=$value['pin'];
                    $kondisi_selang=$value['kondisi_selang'];
                    $berat_tabung=$value['berat_tabung'];
                    $masa_berlaku=$value['masa_berlaku'];
                    $kondisi_tuas=$value['kondisi_tuas'];
                    $garis_merah=$value['garis_merah'];
                    $kondisi_sign=$value['kondisi_sign'];
                    $petugas=$value['petugas'];
                }
                else{
                    $tgl_periksa='';
                    $tekanan='';
                    $pin='';
                    $kondisi_selang='';
                    $berat_tabung='';
                    $masa_berlaku='';
                    $kondisi_tuas='';
                    $garis_merah='';
                    $kondisi_sign='';
                    $petugas='';
                }
                $data[]=[
                    'bulan'=>$value['bulan'],
                    'kode_lokasi'=>$value1['kode_lokasi'],
                    'tgl_periksa'=>$tgl_periksa,
                    'nama_lokasi'=>$value1['nama_lokasi'],
                    'tekanan'=>$tekanan,
                    'pin'=>$pin,
                    'kondisi_selang'=>$kondisi_selang,
                    'berat_tabung'=>$berat_tabung,
                    'masa_berlaku'=>$masa_berlaku,
                    'kondisi_tuas'=>$kondisi_tuas,
                    'garis_merah'=>$garis_merah,
                    'kondisi_sign'=>$kondisi_sign,
                    'petugas'=>$petugas,

                ];
            
           }
       }
       $data_collect= collect($data)->groupBy(['bulan','kode_lokasi'])->toArray();
        $k_l="";
        $bln="";
       foreach ($data_collect as $key => $value) {
            foreach ($value as $key1 => $value1) {
                foreach ($value1 as $dp) {
                    if(($dp['kode_lokasi'] != $k_l) OR ($dp['bulan'] != $bln) OR ($dp['tgl_periksa'] != null)){
                        $lokasiByBln[]=[
                            'bulan'=>$key,
                            'kode_lokasi'=>$dp['kode_lokasi'],
                            'tgl_periksa'=>$dp['tgl_periksa'],
                            'nama_lokasi'=>$dp['nama_lokasi'],
                            'tekanan'=>$dp['tekanan'],
                            'pin'=>$dp['pin'],
                            'kondisi_selang'=>$dp['kondisi_selang'],
                            'berat_tabung'=>$dp['berat_tabung'],
                            'masa_berlaku'=>$dp['masa_berlaku'],
                            'kondisi_tuas'=>$dp['kondisi_tuas'],
                            'garis_merah'=>$dp['garis_merah'],
                            'kondisi_sign'=>$dp['kondisi_sign'],
                            'petugas'=>$dp['petugas'],
                        ];
                        $k_l=$dp['kode_lokasi'];
                        $bln=$dp['bulan'];
                    }
                }
            }
        }
        $data = collect($lokasiByBln);
        foreach ($data as $key => $value) {
            $a=$data->where('bulan',$value['bulan'])->where('kode_lokasi',$value['kode_lokasi'])->count();
          if(($a=='1') OR (($a>'1') And ($value['tgl_periksa'] != null))){
            if($value['bulan']=='01'){
                $nama_bulan='JANUARI';
            }
            elseif($value['bulan']=='02'){
                $nama_bulan='FEBRUARI';
            } elseif($value['bulan']=='03'){
                $nama_bulan='MARET';
            
            } elseif($value['bulan']=='04'){
                $nama_bulan='APRIL';
            }
             elseif($value['bulan']=='05'){
                $nama_bulan='MEI';
            }
             elseif($value['bulan']=='06'){
                $nama_bulan='JUNI';
            }
             elseif($value['bulan']=='07'){
                $nama_bulan='JULI';
            }
             elseif($value['bulan']=='08'){
                $nama_bulan='AGUSTUS';
            }
           elseif($value['bulan']=='09'){
                $nama_bulan='SEPTEMBER';
            }
           elseif($value['bulan']=='10'){
                $nama_bulan='OKTOBER';
            }
           elseif($value['bulan']=='11'){
                $nama_bulan='NOVEMBER';
            }
           elseif($value['bulan']=='12'){
                $nama_bulan='DESEMBER';
            }
              $selesai[]=[
                'bulan'=>$value['bulan'],
                'nama_bulan'=>$nama_bulan,
                'kode_lokasi'=>$value['kode_lokasi'],
                'tgl_periksa'=>$value['tgl_periksa'],
                'nama_lokasi'=>$value['nama_lokasi'],
                'tekanan'=>$value['tekanan'],
                'pin'=>$value['pin'],
                'kondisi_selang'=>$value['kondisi_selang'],
                'berat_tabung'=>$value['berat_tabung'],
                'masa_berlaku'=>$value['masa_berlaku'],
                'kondisi_tuas'=>$value['kondisi_tuas'],
                'garis_merah'=>$value['garis_merah'],
                'kondisi_sign'=>$value['kondisi_sign'],
                'petugas'=>$value['petugas'],
            ];
          }
        }
        $alhamdulillah2=collect($selesai)->sortBy('bulan')->groupBy('nama_bulan')->toArray();
       
       return $alhamdulillah2;
   }

   public function alarm_thn($tahun,$dataBranch)
   {
       $apar=AlarmBtn::where('kode_branch',$dataBranch->kode_branch)
       ->where('branchdetail', $dataBranch->branchdetail)->whereYear('tgl_periksa',$tahun)->get();
            $test = collect($apar)->groupBy(function($item){
            return \Carbon\Carbon::parse($item->tgl_periksa)->format('m');
             });
            //  dd($test);
       return $test;
   }

   public function report_alarm_thn($check_alarm, $lokasi_alarm)
   {
       foreach ($check_alarm as $key => $value) {
           foreach ($value as $dp) {
               $data_alarm_check[]=[
                'bulan'=>$key,
                'kode_lokasi'=>$dp['kode_lokasi'],
                'tgl_periksa'=>$dp['tgl_periksa'],
                'nama_lokasi'=>$dp['nama_lokasi'],
                'kondisi'=>$dp['kondisi'],
                'kebersihan'=>$dp['kebersihan'],
                'ceklis'=>$dp['ceklis'],
                'petugas'=>$dp['petugas'],
               ];
           }
       }
    //    dd($data_alarm_check);
       foreach ($data_alarm_check as $key => $value) {
           foreach ($lokasi_alarm as $key1 => $value1) {
                if($value['kode_lokasi']==$value1['kode_lokasi'])
                {
                    $tgl_periksa=$value['tgl_periksa'];
                    $kondisi=$value['kondisi'];
                    $kebersihan=$value['kebersihan'];
                    $ceklis=$value['ceklis'];
                    $petugas=$value['petugas'];
                }
                else{
                    $tgl_periksa='';
                    $kondisi='';
                    $kebersihan='';
                    $ceklis='';
                    $petugas='';
                }
                $data[]=[
                    'bulan'=>$value['bulan'],
                    'kode_lokasi'=>$value1['kode_lokasi'],
                    'nama_lokasi'=>$value1['nama_lokasi'],
                    'tgl_periksa'=>$tgl_periksa,
                    'kondisi'=>$kondisi,
                    'kebersihan'=>$kebersihan,
                    'ceklis'=>$ceklis,
                    'petugas'=>$petugas,

                ];
            
           }
       }
    //    dd($data);
       $data_collect= collect($data)->groupBy(['bulan','kode_lokasi'])->toArray();
        $k_l="";
        $bln="";
       foreach ($data_collect as $key => $value) {
            foreach ($value as $key1 => $value1) {
                foreach ($value1 as $dp) {
                    if(($dp['kode_lokasi'] != $k_l) OR ($dp['bulan'] != $bln) OR ($dp['tgl_periksa'] != null)){
                        $lokasiByBln[]=[
                            'bulan'=>$key,
                            'kode_lokasi'=>$dp['kode_lokasi'],
                            'tgl_periksa'=>$dp['tgl_periksa'],
                            'nama_lokasi'=>$dp['nama_lokasi'],
                            'kondisi'=>$dp['kondisi'],
                            'kebersihan'=>$dp['kebersihan'],
                            'ceklis'=>$dp['ceklis'],
                            'petugas'=>$dp['petugas'],
                        ];
                        $k_l=$dp['kode_lokasi'];
                        $bln=$dp['bulan'];
                    }
                }
            }
        }
        $data = collect($lokasiByBln);
        foreach ($data as $key => $value) {
            $a=$data->where('bulan',$value['bulan'])->where('kode_lokasi',$value['kode_lokasi'])->count();
          if(($a=='1') OR (($a>'1') And ($value['tgl_periksa'] != null))){
            if($value['bulan']=='01'){
                $nama_bulan='JANUARI';
            }
            elseif($value['bulan']=='02'){
                $nama_bulan='FEBRUARI';
            } elseif($value['bulan']=='03'){
                $nama_bulan='MARET';
            
            } elseif($value['bulan']=='04'){
                $nama_bulan='APRIL';
            }
             elseif($value['bulan']=='05'){
                $nama_bulan='MEI';
            }
             elseif($value['bulan']=='06'){
                $nama_bulan='JUNI';
            }
             elseif($value['bulan']=='07'){
                $nama_bulan='JULI';
            }
             elseif($value['bulan']=='08'){
                $nama_bulan='AGUSTUS';
            }
           elseif($value['bulan']=='09'){
                $nama_bulan='SEPTEMBER';
            }
           elseif($value['bulan']=='10'){
                $nama_bulan='OKTOBER';
            }
           elseif($value['bulan']=='11'){
                $nama_bulan='NOVEMBER';
            }
           elseif($value['bulan']=='12'){
                $nama_bulan='DESEMBER';
            }
              $selesai[]=[
                'bulan'=>$value['bulan'],
                'nama_bulan'=>$nama_bulan,
                'kode_lokasi'=>$value['kode_lokasi'],
                'tgl_periksa'=>$value['tgl_periksa'],
                'nama_lokasi'=>$value['nama_lokasi'],
                'kondisi'=>$value['kondisi'],
                'kebersihan'=>$value['kebersihan'],
                'ceklis'=>$value['ceklis'],
                'petugas'=>$value['petugas'],
            ];
          }
        }
        $alhamdulillah2=collect($selesai)->sortBy('bulan')->groupBy('nama_bulan')->toArray();
       
       return $alhamdulillah2;
   }


   public function smokedet_thn($tahun,$dataBranch)
   {
       $apar=SmokeDet::where('kode_branch',$dataBranch->kode_branch)
       ->where('branchdetail', $dataBranch->branchdetail)->whereYear('tgl_periksa',$tahun)->get();
            $test = collect($apar)->groupBy(function($item){
            return \Carbon\Carbon::parse($item->tgl_periksa)->format('m');
             });
            //  dd($test);
       return $test;
   }

   public function report_smokedet_thn($check_smokedet, $lokasi_smokedet)
   {
       foreach ($check_smokedet as $key => $value) {
           foreach ($value as $dp) {
               $data_smokedet_check[]=[
                'bulan'=>$key,
                'kode_lokasi'=>$dp['kode_lokasi'],
                'tgl_periksa'=>$dp['tgl_periksa'],
                'nama_lokasi'=>$dp['nama_lokasi'],
                'ada_smoke'=>$dp['ada_smoke'],
                'fungsi'=>$dp['fungsi'],
                'baterai'=>$dp['baterai'],
                'petugas'=>$dp['petugas'],
               ];
           }
       }
    //    dd($data_smokedet_check);
       foreach ($data_smokedet_check as $key => $value) {
           foreach ($lokasi_smokedet as $key1 => $value1) {
                if($value['kode_lokasi']==$value1['kode_lokasi'])
                {
                    $tgl_periksa=$value['tgl_periksa'];
                    $ada_smoke=$value['ada_smoke'];
                    $fungsi=$value['fungsi'];
                    $baterai=$value['baterai'];
                    $petugas=$value['petugas'];
                }
                else{
                    $tgl_periksa='';
                    $ada_smoke='';
                    $fungsi='';
                    $baterai='';
                    $petugas='';
                }
                $data[]=[
                    'bulan'=>$value['bulan'],
                    'kode_lokasi'=>$value1['kode_lokasi'],
                    'nama_lokasi'=>$value1['nama_lokasi'],
                    'tgl_periksa'=>$tgl_periksa,
                    'ada_smoke'=>$ada_smoke,
                    'fungsi'=>$fungsi,
                    'baterai'=>$baterai,
                    'petugas'=>$petugas,

                ];
            
           }
       }
    //    dd($data);
       $data_collect= collect($data)->groupBy(['bulan','kode_lokasi'])->toArray();
        $k_l="";
        $bln="";
       foreach ($data_collect as $key => $value) {
            foreach ($value as $key1 => $value1) {
                foreach ($value1 as $dp) {
                    if(($dp['kode_lokasi'] != $k_l) OR ($dp['bulan'] != $bln) OR ($dp['tgl_periksa'] != null)){
                        $lokasiByBln[]=[
                            'bulan'=>$key,
                            'kode_lokasi'=>$dp['kode_lokasi'],
                            'tgl_periksa'=>$dp['tgl_periksa'],
                            'nama_lokasi'=>$dp['nama_lokasi'],
                            'ada_smoke'=>$dp['ada_smoke'],
                            'fungsi'=>$dp['fungsi'],
                            'baterai'=>$dp['baterai'],
                            'petugas'=>$dp['petugas'],
                        ];
                        $k_l=$dp['kode_lokasi'];
                        $bln=$dp['bulan'];
                    }
                }
            }
        }
        // dd($lokasiByBln);
        $data = collect($lokasiByBln);
        foreach ($data as $key => $value) {
            $a=$data->where('bulan',$value['bulan'])->where('kode_lokasi',$value['kode_lokasi'])->count();
          if(($a=='1') OR (($a>'1') And ($value['tgl_periksa'] != null))){
            if($value['bulan']=='01'){
                $nama_bulan='JANUARI';
            }
            elseif($value['bulan']=='02'){
                $nama_bulan='FEBRUARI';
            } elseif($value['bulan']=='03'){
                $nama_bulan='MARET';
            
            } elseif($value['bulan']=='04'){
                $nama_bulan='APRIL';
            }
             elseif($value['bulan']=='05'){
                $nama_bulan='MEI';
            }
             elseif($value['bulan']=='06'){
                $nama_bulan='JUNI';
            }
             elseif($value['bulan']=='07'){
                $nama_bulan='JULI';
            }
             elseif($value['bulan']=='08'){
                $nama_bulan='AGUSTUS';
            }
           elseif($value['bulan']=='09'){
                $nama_bulan='SEPTEMBER';
            }
           elseif($value['bulan']=='10'){
                $nama_bulan='OKTOBER';
            }
           elseif($value['bulan']=='11'){
                $nama_bulan='NOVEMBER';
            }
           elseif($value['bulan']=='12'){
                $nama_bulan='DESEMBER';
            }
              $selesai[]=[
                'bulan'=>$value['bulan'],
                'nama_bulan'=>$nama_bulan,
                'kode_lokasi'=>$value['kode_lokasi'],
                'tgl_periksa'=>$value['tgl_periksa'],
                'nama_lokasi'=>$value['nama_lokasi'],
                'ada_smoke'=>$value['ada_smoke'],
                'fungsi'=>$value['fungsi'],
                'baterai'=>$value['baterai'],
                'petugas'=>$value['petugas'],
            ];
          }
        }
        $alhamdulillah2=collect($selesai)->sortBy('bulan')->groupBy('nama_bulan')->toArray();
       
       return $alhamdulillah2;
   }

   public function emerexit_thn($tahun,$dataBranch)
   {
       $apar=EmerExit::where('kode_branch',$dataBranch->kode_branch)
       ->where('branchdetail', $dataBranch->branchdetail)->whereYear('tgl_periksa',$tahun)->get();
            $test = collect($apar)->groupBy(function($item){
            return \Carbon\Carbon::parse($item->tgl_periksa)->format('m');
             });
            //  dd($test);
       return $test;
   }

   public function report_emerexit_thn($check_emerexit, $lokasi_emerexit)
   {
       foreach ($check_emerexit as $key => $value) {
           foreach ($value as $dp) {
               $data_emerexit_check[]=[
                'bulan'=>$key,
                'kode_lokasi'=>$dp['kode_lokasi'],
                'tgl_periksa'=>$dp['tgl_periksa'],
                'nama_lokasi'=>$dp['nama_lokasi'],
                'ada_exit'=>$dp['ada_exit'],
                'kondisi_lampu'=>$dp['kondisi_lampu'],
                'kebersihan'=>$dp['kebersihan'],
                'petugas'=>$dp['petugas'],
               ];
           }
       }
    //    dd($data_emerexit_check);
       foreach ($data_emerexit_check as $key => $value) {
           foreach ($lokasi_emerexit as $key1 => $value1) {
                if($value['kode_lokasi']==$value1['kode_lokasi'])
                {
                    $tgl_periksa=$value['tgl_periksa'];
                    $ada_exit=$value['ada_exit'];
                    $kondisi_lampu=$value['kondisi_lampu'];
                    $kebersihan=$value['kebersihan'];
                    $petugas=$value['petugas'];
                }
                else{
                    $tgl_periksa='';
                    $ada_exit='';
                    $kondisi_lampu='';
                    $kebersihan='';
                    $petugas='';
                }
                $data[]=[
                    'bulan'=>$value['bulan'],
                    'kode_lokasi'=>$value1['kode_lokasi'],
                    'nama_lokasi'=>$value1['nama_lokasi'],
                    'tgl_periksa'=>$tgl_periksa,
                    'ada_exit'=>$ada_exit,
                    'kondisi_lampu'=>$kondisi_lampu,
                    'kebersihan'=>$kebersihan,
                    'petugas'=>$petugas,
                ];
           }
       }
    //    dd($data);
       $data_collect= collect($data)->groupBy(['bulan','kode_lokasi'])->toArray();
        $k_l="";
        $bln="";
       foreach ($data_collect as $key => $value) {
            foreach ($value as $key1 => $value1) {
                foreach ($value1 as $dp) {
                    if(($dp['kode_lokasi'] != $k_l) OR ($dp['bulan'] != $bln) OR ($dp['tgl_periksa'] != null)){
                        $lokasiByBln[]=[
                            'bulan'=>$key,
                            'kode_lokasi'=>$dp['kode_lokasi'],
                            'tgl_periksa'=>$dp['tgl_periksa'],
                            'nama_lokasi'=>$dp['nama_lokasi'],
                            'ada_exit'=>$dp['ada_exit'],
                            'kondisi_lampu'=>$dp['kondisi_lampu'],
                            'kebersihan'=>$dp['kebersihan'],
                            'petugas'=>$dp['petugas'],
                        ];
                        $k_l=$dp['kode_lokasi'];
                        $bln=$dp['bulan'];
                    }
                }
            }
        }
        // dd($lokasiByBln);
        $data = collect($lokasiByBln);
        foreach ($data as $key => $value) {
            $a=$data->where('bulan',$value['bulan'])->where('kode_lokasi',$value['kode_lokasi'])->count();
          if(($a=='1') OR (($a>'1') And ($value['tgl_periksa'] != null))){
            if($value['bulan']=='01'){
                $nama_bulan='JANUARI';
            }
            elseif($value['bulan']=='02'){
                $nama_bulan='FEBRUARI';
            } elseif($value['bulan']=='03'){
                $nama_bulan='MARET';
            
            } elseif($value['bulan']=='04'){
                $nama_bulan='APRIL';
            }
             elseif($value['bulan']=='05'){
                $nama_bulan='MEI';
            }
             elseif($value['bulan']=='06'){
                $nama_bulan='JUNI';
            }
             elseif($value['bulan']=='07'){
                $nama_bulan='JULI';
            }
             elseif($value['bulan']=='08'){
                $nama_bulan='AGUSTUS';
            }
           elseif($value['bulan']=='09'){
                $nama_bulan='SEPTEMBER';
            }
           elseif($value['bulan']=='10'){
                $nama_bulan='OKTOBER';
            }
           elseif($value['bulan']=='11'){
                $nama_bulan='NOVEMBER';
            }
           elseif($value['bulan']=='12'){
                $nama_bulan='DESEMBER';
            }
              $selesai[]=[
                'bulan'=>$value['bulan'],
                'nama_bulan'=>$nama_bulan,
                'kode_lokasi'=>$value['kode_lokasi'],
                'tgl_periksa'=>$value['tgl_periksa'],
                'nama_lokasi'=>$value['nama_lokasi'],
                'ada_exit'=>$value['ada_exit'],
                'kondisi_lampu'=>$value['kondisi_lampu'],
                'kebersihan'=>$value['kebersihan'],
                'petugas'=>$value['petugas'],
            ];
          }
        }
        $alhamdulillah2=collect($selesai)->sortBy('bulan')->groupBy('nama_bulan')->toArray();
    //    dd($alhamdulillah2);
       return $alhamdulillah2;
   }

   public function emerlamp_thn($tahun,$dataBranch)
   {
       $apar=EmerLamp::where('kode_branch',$dataBranch->kode_branch)
       ->where('branchdetail', $dataBranch->branchdetail)->whereYear('tgl_periksa',$tahun)->get();
            $test = collect($apar)->groupBy(function($item){
            return \Carbon\Carbon::parse($item->tgl_periksa)->format('m');
             });
            //  dd($test);
       return $test;
   }

   public function report_emerlamp_thn($check_emerlamp, $lokasi_emerlamp)
   {
       foreach ($check_emerlamp as $key => $value) {
           foreach ($value as $dp) {
               $data_emerlamp_check[]=[
                'bulan'=>$key,
                'kode_lokasi'=>$dp['kode_lokasi'],
                'tgl_periksa'=>$dp['tgl_periksa'],
                'nama_lokasi'=>$dp['nama_lokasi'],
                'kondisi'=>$dp['kondisi'],
                'form'=>$dp['form'],
                'kebersihan'=>$dp['kebersihan'],
                'petugas'=>$dp['petugas'],
               ];
           }
       }
    //    dd($data_emerlamp_check);
       foreach ($data_emerlamp_check as $key => $value) {
           foreach ($lokasi_emerlamp as $key1 => $value1) {
                if($value['kode_lokasi']==$value1['kode_lokasi'])
                {
                    $tgl_periksa=$value['tgl_periksa'];
                    $form=$value['form'];
                    $kondisi=$value['kondisi'];
                    $kebersihan=$value['kebersihan'];
                    $petugas=$value['petugas'];
                }
                else{
                    $tgl_periksa='';
                    $form='';
                    $kondisi='';
                    $kebersihan='';
                    $petugas='';
                }
                $data[]=[
                    'bulan'=>$value['bulan'],
                    'kode_lokasi'=>$value1['kode_lokasi'],
                    'nama_lokasi'=>$value1['nama_lokasi'],
                    'tgl_periksa'=>$tgl_periksa,
                    'form'=>$form,
                    'kondisi'=>$kondisi,
                    'kebersihan'=>$kebersihan,
                    'petugas'=>$petugas,
                ];
           }
       }
    //    dd($data);
       $data_collect= collect($data)->groupBy(['bulan','kode_lokasi'])->toArray();
        $k_l="";
        $bln="";
       foreach ($data_collect as $key => $value) {
            foreach ($value as $key1 => $value1) {
                foreach ($value1 as $dp) {
                    if(($dp['kode_lokasi'] != $k_l) OR ($dp['bulan'] != $bln) OR ($dp['tgl_periksa'] != null)){
                        $lokasiByBln[]=[
                            'bulan'=>$key,
                            'kode_lokasi'=>$dp['kode_lokasi'],
                            'tgl_periksa'=>$dp['tgl_periksa'],
                            'nama_lokasi'=>$dp['nama_lokasi'],
                            'kondisi'=>$dp['kondisi'],
                            'form'=>$dp['form'],
                            'kebersihan'=>$dp['kebersihan'],
                            'petugas'=>$dp['petugas'],
                        ];
                        $k_l=$dp['kode_lokasi'];
                        $bln=$dp['bulan'];
                    }
                }
            }
        }
        // dd($lokasiByBln);
        $data = collect($lokasiByBln);
        foreach ($data as $key => $value) {
            $a=$data->where('bulan',$value['bulan'])->where('kode_lokasi',$value['kode_lokasi'])->count();
          if(($a=='1') OR (($a>'1') And ($value['tgl_periksa'] != null))){
            if($value['bulan']=='01'){
                $nama_bulan='JANUARI';
            }
            elseif($value['bulan']=='02'){
                $nama_bulan='FEBRUARI';
            } elseif($value['bulan']=='03'){
                $nama_bulan='MARET';
            
            } elseif($value['bulan']=='04'){
                $nama_bulan='APRIL';
            }
             elseif($value['bulan']=='05'){
                $nama_bulan='MEI';
            }
             elseif($value['bulan']=='06'){
                $nama_bulan='JUNI';
            }
             elseif($value['bulan']=='07'){
                $nama_bulan='JULI';
            }
             elseif($value['bulan']=='08'){
                $nama_bulan='AGUSTUS';
            }
           elseif($value['bulan']=='09'){
                $nama_bulan='SEPTEMBER';
            }
           elseif($value['bulan']=='10'){
                $nama_bulan='OKTOBER';
            }
           elseif($value['bulan']=='11'){
                $nama_bulan='NOVEMBER';
            }
           elseif($value['bulan']=='12'){
                $nama_bulan='DESEMBER';
            }
              $selesai[]=[
                'bulan'=>$value['bulan'],
                'nama_bulan'=>$nama_bulan,
                'kode_lokasi'=>$value['kode_lokasi'],
                'tgl_periksa'=>$value['tgl_periksa'],
                'nama_lokasi'=>$value['nama_lokasi'],
                'kondisi'=>$value['kondisi'],
                'form'=>$value['form'],
                'kebersihan'=>$value['kebersihan'],
                'petugas'=>$value['petugas'],
            ];
          }
        }
        $alhamdulillah2=collect($selesai)->sortBy('bulan')->groupBy('nama_bulan')->toArray();
    //    dd($alhamdulillah2);
       return $alhamdulillah2;
   }


   public function Get_alarm()
   {
       $Get_alarm=AlarmBtn::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)
            ->get();
   
       return $Get_alarm;
   }

   public function alarm_check( $Get_alarm)
   {
            $alarm=[];
            foreach ($Get_alarm as $key => $value) {
               
                $alarm[]=[
                'id'=>$value->id,   
                'kode_lokasi'=>$value->kode_lokasi,
                'nama_lokasi'=>$value->nama_lokasi,
                'tgl_periksa'=>$value->tgl_periksa,
                'perbaikan'=>$value->perbaikan,
                'finish'=>$value->finish,
                    
                ];
                }
            $test = collect($alarm)
            ->groupBy('kode_lokasi')
            ->sortByDesc('id')
            ->map(function ($item) {
            return array_merge(...$item);
            })->values();
            $alarm_check= collect($test)->groupBy('kode_lokasi')->toArray();
        return $alarm_check;
   }

   public function alarm_repair( $Get_alarm)
   {        $alarm=[];
            foreach ($Get_alarm as $key => $value) {
                if($value->perbaikan != null){
                $alarm[]=[
                'id'=>$value->id,   
                'kode_lokasi'=>$value->kode_lokasi,
                'nama_lokasi'=>$value->nama_lokasi,
                'tgl_periksa'=>$value->tgl_periksa,
                'perbaikan'=>$value->perbaikan,
                'finish'=>$value->finish,
                    
                ];
                }
            }
            $count=count($alarm);
            if($count>'0'){
                $test = collect($alarm)
                ->groupBy('kode_lokasi')
                ->sortByDesc('id')
                ->map(function ($item) {
                return array_merge(...$item);
                })->values();
                $alarm_repair= collect($test)->groupBy('kode_lokasi')->toArray();
            }
            else{
                $alarm_repair=collect($Get_alarm)->groupBy('kode_lokasi')->toArray();
            }
        return $alarm_repair;
   }

   public function total_repair_alarm($all_alarm)
   {
        $record_alarm=[];
       foreach ($all_alarm as $key => $value) {
           foreach ($value as $dp ) {
           
            $count_demage=AlarmBtn::where('kode_lokasi',$dp['kode_lokasi'])
                ->where('kondisi','=','Rusak')->count();
            $count_finish=AlarmBtn::where('kode_lokasi',$dp['kode_lokasi'])
                ->where('perbaikan','!=',null)->where('finish','!=',null)->count();
            $count=$count_demage+$count_finish;
            $record_alarm[]=[
                'id'=>$dp['id'],
                'kode_lokasi'=>$dp['kode_lokasi'],
                'nama_lokasi'=>$dp['nama_lokasi'],
                'tgl_periksa'=>$dp['tgl_periksa'],
                'perbaikan'=>$dp['perbaikan'],
                'finish'=>$dp['finish'],
                'count'=>$count,
            ];

            }
        }
        return $record_alarm;
   }

   public function Get_SmokeDet()
   {
       $Get_SmokeDet=SmokeDet::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)
            ->get();
   
       return $Get_SmokeDet;
   }

   public function SmokeDet_check( $Get_SmokeDet)
   {
            $SmokeDet=[];
            foreach ($Get_SmokeDet as $key => $value) {
               
                $SmokeDet[]=[
                'id'=>$value->id,   
                'kode_lokasi'=>$value->kode_lokasi,
                'nama_lokasi'=>$value->nama_lokasi,
                'tgl_periksa'=>$value->tgl_periksa,
                'perbaikan'=>$value->perbaikan,
                'finish'=>$value->finish,
                    
                ];
                }
            $test = collect($SmokeDet)
            ->groupBy('kode_lokasi')
            ->sortByDesc('id')
            ->map(function ($item) {
            return array_merge(...$item);
            })->values();
            $SmokeDet_check= collect($test)->groupBy('kode_lokasi')->toArray();
        return $SmokeDet_check;
   }

   public function SmokeDet_repair( $Get_SmokeDet)
   {        $SmokeDet=[];
            foreach ($Get_SmokeDet as $key => $value) {
                if(($value->finish != null)OR($value->perbaikan != null)){
                $SmokeDet[]=[
                'id'=>$value->id,   
                'kode_lokasi'=>$value->kode_lokasi,
                'nama_lokasi'=>$value->nama_lokasi,
                'tgl_periksa'=>$value->tgl_periksa,
                'perbaikan'=>$value->perbaikan,
                'finish'=>$value->finish,
                    
                ];
                }
            }
            $count=count($SmokeDet);
            if($count>'0'){
                $test = collect($SmokeDet)
                ->groupBy('kode_lokasi')
                ->sortByDesc('id')
                ->map(function ($item) {
                return array_merge(...$item);
                })->values();
                $SmokeDet_repair= collect($test)->groupBy('kode_lokasi')->toArray();
            }
            else{
                $SmokeDet_repair=collect($Get_SmokeDet)->groupBy('kode_lokasi')->toArray();
            }
        return $SmokeDet_repair;
   }

   public function total_repair_SmokeDet($all_SmokeDet)
   {
        $record_SmokeDet=[];
       foreach ($all_SmokeDet as $key => $value) {
           foreach ($value as $dp ) {
           
            $SmokeDet=SmokeDet::where('ada_smoke','!=','Ada')->orwhere('fungsi','!=','Berfungsi')->orwhere('baterai','!=','Bagus')->get();
            $count_demage=$SmokeDet->where('kode_lokasi', $dp['kode_lokasi'])->count();

            $count_finish=SmokeDet::where('kode_lokasi',$dp['kode_lokasi'])
                ->where('perbaikan','!=',null)->where('finish','!=',null)->count();
            $count=$count_demage+$count_finish;
            $record_SmokeDet[]=[
                'id'=>$dp['id'],
                'kode_lokasi'=>$dp['kode_lokasi'],
                'nama_lokasi'=>$dp['nama_lokasi'],
                'tgl_periksa'=>$dp['tgl_periksa'],
                'perbaikan'=>$dp['perbaikan'],
                'finish'=>$dp['finish'],
                'count'=>$count,
            ];

            }
        }
        return $record_SmokeDet;
   }

   public function Get_Apar()
   {
       $Get_Apar=Apar::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)
            ->get();
   
       return $Get_Apar;
   }

   public function Apar_check( $Get_Apar)
   {
            $Apar=[];
            foreach ($Get_Apar as $key => $value) {
               
                $Apar[]=[
                'id'=>$value->id,   
                'kode_lokasi'=>$value->kode_lokasi,
                'nama_lokasi'=>$value->nama_lokasi,
                'tgl_periksa'=>$value->tgl_periksa,
                'perbaikan'=>$value->perbaikan,
                'finish'=>$value->finish,
                    
                ];
                }
            $test = collect($Apar)
            ->groupBy('kode_lokasi')
            ->sortByDesc('id')
            ->map(function ($item) {
            return array_merge(...$item);
            })->values();
            $Apar_check= collect($test)->groupBy('kode_lokasi')->toArray();
        return $Apar_check;
   }

   public function Apar_repair( $Get_Apar)
   {        $Apar=[];
            foreach ($Get_Apar as $key => $value) {
                if(($value->finish != null)OR($value->perbaikan != null)){
                $Apar[]=[
                'id'=>$value->id,   
                'kode_lokasi'=>$value->kode_lokasi,
                'nama_lokasi'=>$value->nama_lokasi,
                'tgl_periksa'=>$value->tgl_periksa,
                'perbaikan'=>$value->perbaikan,
                'finish'=>$value->finish,
                    
                ];
                }
            }
            $count=count($Apar);
            if($count>'0'){
                $test = collect($Apar)
                ->groupBy('kode_lokasi')
                ->sortByDesc('id')
                ->map(function ($item) {
                return array_merge(...$item);
                })->values();
                $Apar_repair= collect($test)->groupBy('kode_lokasi')->toArray();
            }
            else{
                $Apar_repair=collect($Get_Apar)->groupBy('kode_lokasi')->toArray();
            }
        return $Apar_repair;
   }

   public function total_repair_Apar($all_Apar)
   {
        $record_Apar=[];
       foreach ($all_Apar as $key => $value) {
           foreach ($value as $dp ) {
           
            $Apar=Apar::where('tekanan','Rendah')->orwhere('pin','!=','Ada')->orwhere('kondisi_selang','!=','Bagus')
                        ->orwhere('kondisi_tuas','!=','Ada')->get();
            $count_demage=$Apar->where('kode_lokasi', $dp['kode_lokasi'])->count();

            $count_finish=Apar::where('kode_lokasi',$dp['kode_lokasi'])
                ->where('perbaikan','!=',null)->where('finish','!=',null)->count();
            $count=$count_demage+$count_finish;
            $record_Apar[]=[
                'id'=>$dp['id'],
                'kode_lokasi'=>$dp['kode_lokasi'],
                'nama_lokasi'=>$dp['nama_lokasi'],
                'tgl_periksa'=>$dp['tgl_periksa'],
                'perbaikan'=>$dp['perbaikan'],
                'finish'=>$dp['finish'],
                'count'=>$count,
            ];

            }
        }
        return $record_Apar;
   }

   public function Get_EmerExit()
   {
       $Get_EmerExit=EmerExit::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)
            ->get();
   
       return $Get_EmerExit;
   }

   public function EmerExit_check( $Get_EmerExit)
   {
            $EmerExit=[];
            foreach ($Get_EmerExit as $key => $value) {
               
                $EmerExit[]=[
                'id'=>$value->id,   
                'kode_lokasi'=>$value->kode_lokasi,
                'nama_lokasi'=>$value->nama_lokasi,
                'tgl_periksa'=>$value->tgl_periksa,
                'perbaikan'=>$value->perbaikan,
                'finish'=>$value->finish,
                    
                ];
                }
            $test = collect($EmerExit)
            ->groupBy('kode_lokasi')
            ->sortByDesc('id')
            ->map(function ($item) {
            return array_merge(...$item);
            })->values();
            $EmerExit_check= collect($test)->groupBy('kode_lokasi')->toArray();
        return $EmerExit_check;
   }

   public function EmerExit_repair( $Get_EmerExit)
   {        $EmerExit=[];
            foreach ($Get_EmerExit as $key => $value) {
                if(($value->finish != null)OR($value->perbaikan != null)){
                $EmerExit[]=[
                'id'=>$value->id,   
                'kode_lokasi'=>$value->kode_lokasi,
                'nama_lokasi'=>$value->nama_lokasi,
                'tgl_periksa'=>$value->tgl_periksa,
                'perbaikan'=>$value->perbaikan,
                'finish'=>$value->finish,
                    
                ];
                }
            }
            $count=count($EmerExit);
            if($count>'0'){
                $test = collect($EmerExit)
                ->groupBy('kode_lokasi')
                ->sortByDesc('id')
                ->map(function ($item) {
                return array_merge(...$item);
                })->values();
                $EmerExit_repair= collect($test)->groupBy('kode_lokasi')->toArray();
            }
            else{
                $EmerExit_repair=collect($Get_EmerExit)->groupBy('kode_lokasi')->toArray();
            }
        return $EmerExit_repair;
   }

   public function total_repair_EmerExit($all_EmerExit)
   {
        $record_EmerExit=[];
       foreach ($all_EmerExit as $key => $value) {
           foreach ($value as $dp ) {
           
            $emerexit=EmerExit::where('ada_exit','=','Tidak')->orwhere('kondisi_lampu','=','Mati')->get();
            
            $count_demage=$emerexit->where('kode_lokasi', $dp['kode_lokasi'])->count();
            $count_finish=EmerExit::where('kode_lokasi',$dp['kode_lokasi'])
                ->where('perbaikan','!=',null)->where('finish','!=',null)->count();
            $count=$count_demage+$count_finish;
            $record_EmerExit[]=[
                'id'=>$dp['id'],
                'kode_lokasi'=>$dp['kode_lokasi'],
                'nama_lokasi'=>$dp['nama_lokasi'],
                'tgl_periksa'=>$dp['tgl_periksa'],
                'perbaikan'=>$dp['perbaikan'],
                'finish'=>$dp['finish'],
                'count'=>$count,
            ];

            }
        }
        return $record_EmerExit;
   }

   public function Get_EmerLamp()
   {
       $Get_EmerLamp=EmerLamp::where('kode_branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)
            ->get();
   
       return $Get_EmerLamp;
   }

   public function EmerLamp_check( $Get_EmerLamp)
   {
            $EmerLamp=[];
            foreach ($Get_EmerLamp as $key => $value) {
               
                $EmerLamp[]=[
                'id'=>$value->id,   
                'kode_lokasi'=>$value->kode_lokasi,
                'nama_lokasi'=>$value->nama_lokasi,
                'tgl_periksa'=>$value->tgl_periksa,
                'perbaikan'=>$value->perbaikan,
                'finish'=>$value->finish,
                    
                ];
                }
            $test = collect($EmerLamp)
            ->groupBy('kode_lokasi')
            ->sortByDesc('id')
            ->map(function ($item) {
            return array_merge(...$item);
            })->values();
            $EmerLamp_check= collect($test)->groupBy('kode_lokasi')->toArray();
        return $EmerLamp_check;
   }

   public function EmerLamp_repair( $Get_EmerLamp)
   {        $EmerLamp=[];
            foreach ($Get_EmerLamp as $key => $value) {
                if(($value->finish != null)OR($value->perbaikan != null)){
                $EmerLamp[]=[
                'id'=>$value->id,   
                'kode_lokasi'=>$value->kode_lokasi,
                'nama_lokasi'=>$value->nama_lokasi,
                'tgl_periksa'=>$value->tgl_periksa,
                'perbaikan'=>$value->perbaikan,
                'finish'=>$value->finish,
                    
                ];
                }
            }
            $count=count($EmerLamp);
            if($count>'0'){
                $test = collect($EmerLamp)
                ->groupBy('kode_lokasi')
                ->sortByDesc('id')
                ->map(function ($item) {
                return array_merge(...$item);
                })->values();
                $EmerLamp_repair= collect($test)->groupBy('kode_lokasi')->toArray();
            }
            else{
                $EmerLamp_repair=collect($Get_EmerLamp)->groupBy('kode_lokasi')->toArray();
            }
        return $EmerLamp_repair;
   }

   public function total_repair_EmerLamp($all_EmerLamp)
   {
        $record_EmerLamp=[];
       foreach ($all_EmerLamp as $key => $value) {
           foreach ($value as $dp ) {
           
            $EmerLamp=EmerLamp::where('kondisi','=','Rusak')->get();
            
            $count_demage=$EmerLamp->where('kode_lokasi', $dp['kode_lokasi'])->count();
            $count_finish=EmerLamp::where('kode_lokasi',$dp['kode_lokasi'])
                ->where('perbaikan','!=',null)->where('finish','!=',null)->count();
            $count=$count_demage+$count_finish;
            $record_EmerLamp[]=[
                'id'=>$dp['id'],
                'kode_lokasi'=>$dp['kode_lokasi'],
                'nama_lokasi'=>$dp['nama_lokasi'],
                'tgl_periksa'=>$dp['tgl_periksa'],
                'perbaikan'=>$dp['perbaikan'],
                'finish'=>$dp['finish'],
                'count'=>$count,
            ];

            }
        }
        return $record_EmerLamp;
   }
   

}