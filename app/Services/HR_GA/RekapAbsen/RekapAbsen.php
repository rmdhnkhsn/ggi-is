<?php

namespace App\Services\HR_GA\RekapAbsen;


Use DB;
use Carbon\Carbon;
Use App\Models\HR_GA\Lembur\Karyawan_lembur;




class RekapAbsen{
    public function Priode()
    {
        $tgl=date('d');
        $bln_sekarang=date('M-Y');
        $date = strtotime($bln_sekarang);
        $bulan_sebelum= strtotime("-1 month", $date);
        $bulan_sesudah= strtotime("+1 month", $date);
        $bulan_sebelum=date('M-Y', $bulan_sebelum);
        $bulan_sesudah=date('M-Y', $bulan_sesudah);
        if($tgl>=21){
            $priode='21 '.$bln_sekarang.' s/d 20 '.$bulan_sesudah;
            $tanggal_awal=date('Y-m-d', strtotime('21-'.$bln_sekarang));
            $tanggal_akhir=date('Y-m-d', strtotime('20-'.$bulan_sesudah));

        }
        elseif($tgl<21){
            $priode='21 '.$bulan_sebelum.' s/d 20 '.$bln_sekarang;
            $tanggal_awal=date('Y-m-d', strtotime('21-'.$bulan_sebelum));
            $tanggal_akhir=date('Y-m-d', strtotime('20-'.$bln_sekarang));
        }
        $tanggal=[
            'priode'=>$priode,
            'tanggal_awal'=>$tanggal_awal,
            'tanggal_akhir'=>$tanggal_akhir,
        ];
        return $tanggal;
    }
    public function overtime($user,$priode)
    {
        $data=Karyawan_lembur::where('nik',$user->nik)->where('tanggal','>=',$priode['tanggal_awal'])->where('tanggal','<=',$priode['tanggal_akhir'])->where('status_lembur','Done')->get();
    $collect=$data->groupBy('tanggal');
    $record=[];
    foreach ($collect as $key => $value) {
        foreach ($value as $key2 => $value2) {
            $jumlah_jam=$data->where('tanggal',$key)->sum('realisasi_total');
            $record[]=[
                'tanggal'=>$key,
                'jumlah_jam'=>$jumlah_jam,
            ];
        }
    }
        $overtime = collect($record)
        ->groupBy('tanggal')
        ->sortByDesc('tanggal')
        ->map(function ($item) {
        return array_merge(...$item);
        })->values();
    return $overtime;
        //  $x=Karyawan_lembur::all()->groupBy('tanggal');
     
    //  foreach ($x as $key => $value) {
    //     foreach ($value as $key2 => $value2) {
    //         $a=Karyawan_lembur::where('tanggal',$key)->where('nik',$value2->nik)->count();
    //       if($a>1){
    //         $y[]=[
    //             'nik'=>$value2->nik
    //         ];
    //       }
    //     }
    //  }
    //  dd($y);
    }
    public function absen($response)
    {
        $absen=[];
        foreach ($response as $key => $value) {
            if(($value->kondisi=='LIBUR')&&($value->_Masuk!=null)){
                $kondisi='LEMBUR';
            }
            else{
                $kondisi=$value->kondisi;
            }
            $absen[]=[
                'PIN'=>$value->PIN,
                'Tanggal'=>$value->Tanggal,
                'JadwalMasuk'=>$value->JadwalMasuk,
                'Masuk'=>$value->Masuk,
                'JadwalPulang'=>$value->JadwalPulang,
                'Pulang'=>$value->Pulang,
                'ALASAN'=>$value->ALASAN,
                'kondisi'=>$kondisi,
                '_Masuk'=>$value->_Masuk,
                '_Pulang'=>$value->_Pulang,
                '_Tanggal'=>$value->_Tanggal,
            ];
        }
        // dd($absen);
        return $absen;
    }
}