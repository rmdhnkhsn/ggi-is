<?php

namespace App\Services\Production\ProductCosting;

use App\Models\Cutting\Product_Costing\KodeKerjaKaryawan;

class rumus_hitungan{
    public function total_qty($qty_breakdown)
    {
        $total_qty =$qty_breakdown->qty1 + $qty_breakdown->qty2 + $qty_breakdown->qty3 + $qty_breakdown->qty4 + $qty_breakdown->qty5 + 
        $qty_breakdown->qty6 + $qty_breakdown->qty7 + $qty_breakdown->qty8 + $qty_breakdown->qty9 + $qty_breakdown->qty10 + 
        $qty_breakdown->qty11 + $qty_breakdown->qty12 + $qty_breakdown->qty13 + $qty_breakdown->qty14 + $qty_breakdown->qty15;
        
        return $total_qty;
    }

    public function qty_user($total_qty, $banyak_user)
    {
        if ($total_qty != 0 && $banyak_user != 0) {
            $qty_user = $total_qty / $banyak_user;
        }else{
            $qty_user = 0 ;
        }

        return $qty_user;
    }

    public function total_waktu($remark, $value, $banyak_user, $value4)
    {
        $data = [];
        if ($remark != null && $remark->form_id == $value->id) {
            // Perhitungan Durasi
            $durasi = explode("|",$remark->process_time);
            $jam = $durasi[0]*60;
            $menit = $durasi[1];
            $detik = $durasi[2]/60;
            // dd($durasi);

            // Kondisi apabila ada istirahat atau tidak selama proses 
            // 1. Ambil data karyawan 
            $karyawan = KodeKerjaKaryawan::where('nik', $value4->nik)->first();


            // banyaknya user yang mengerjakan 
            if ($karyawan != null && $remark->remark != null && $remark->remark == 'Istirahat') {
                $total_waktu = ($jam+$menit+$detik) - $karyawan->istirahat;
                $waktu_user = $total_waktu;
            }else { 
                $total_waktu =  $jam+$menit+$detik;
                $waktu_user = $total_waktu;
                
            }
            // dd($total_waktu);
            $data = [
                'total_waktu' => $total_waktu,
                'keterangan' => $remark->remark,
                'waktu_user' => $waktu_user
            ];
        }else {
            $data = [
                'total_waktu' =>0,
                'keterangan' => "",
                'waktu_user' => 0
            ];
        }
        return $data;
    }

    public function total_waktu_2($remark, $value, $banyak_user, $value4)
    {
        $data = [];
        if ($remark != null && $remark->form_id == $value->id) {
            $keterangan = $remark->remark;

            $start = $remark->start_time;
            $finish = $remark->finish_time;
            // Perhitungan Durasi
            $durasi = explode("|",$remark->process_time);
            $jam = $durasi[0]*60;
            $menit = $durasi[1];
            $detik = $durasi[2]/60;
            // dd($remark->process_time);

            $process_time = $jam.':'.$menit.':'.$durasi[2];

            // Kondisi apabila ada istirahat atau tidak selama proses 
            // 1. Ambil data karyawan 
            $karyawan = KodeKerjaKaryawan::where('nik', $value4->nik)->first();

            
            if ($karyawan != null && $remark->remark != null && $remark->remark == 'Istirahat') {
                $total_waktu = ($jam+$menit+$detik) - $karyawan->istirahat;
                $waktu_user = $total_waktu;
            }else { 
                $total_waktu =  $jam+$menit+$detik;
                $waktu_user = $total_waktu;
                
            }

            $data = [
                'keterangan' => $keterangan,
                'start' => $start,
                'finish' => $finish,
                'process_time' => $process_time,
                'waktu_user' => $waktu_user,
                'total_waktu' => $total_waktu
            ];
        }else {
            $data = [
                'keterangan' => "",
                'start' => null,
                'finish' => null,
                'process_time' => null,
                'waktu_user' => 0,
                'total_waktu' => 0,
            ];
        }

        return $data;
    }

    public function total_waktu_3($value2, $value3, $banyak_user)
    {
        $remark = $value2->proses_bundling_remark;
        // dd($remark);

        $data = [];
        if ($remark != null) {
            $keterangan = $remark->remark;

            $start = $remark->start_time;
            $finish = $remark->finish_time;
            // Perhitungan Durasi
            $durasi = explode("|",$remark->process_time);
            $jam = $durasi[0]*60;
            $menit = $durasi[1];
            $detik = $durasi[2]/60;
            $udetik = $durasi[2];
            
            $process_time = $jam.':'.$menit.':'.$udetik;
            // dd($process_time);

            // Kondisi apabila ada istirahat atau tidak selama proses 
            // 1. Ambil data karyawan 
            $karyawan = KodeKerjaKaryawan::where('nik', $value3->nik)->first();
            // dd($karyawan);
            
            if ($karyawan != null && $remark->remark != null && $remark->remark == 'Istirahat') {
                $total_waktu = ($jam+$menit+$detik) - $karyawan->istirahat;
                $waktu_user = $total_waktu;
            }else { 
                $total_waktu =  $jam+$menit+$detik;
                $waktu_user = $total_waktu;
                
            }

            $data = [
                'keterangan' => $keterangan,
                'start' => $start,
                'finish' => $finish,
                'process_time' => $process_time,
                'waktu_user' => $waktu_user,
                'total_waktu' => $total_waktu
            ];
        }else {
            $data = [
                'keterangan' => "",
                'start' => null,
                'finish' => null,
                'process_time' => null,
                'waktu_user' => 0,
                'total_waktu' => 0,
            ];
        }

        // dd($data);
        return $data;
    }

    public function gaji_per_hari($gaji, $hk)
    {
        if ($gaji != 0 && $hk != 0) {
            $gaji_user_hari = $gaji / $hk;
        }else {
            $gaji_user_hari = 0;
        }

        return $gaji_user_hari;
    }

    public function waktu_pcs($total_waktu, $qty_user)
    {
        // dd($total_waktu);
        if ($total_waktu != 0 && $qty_user != 0) {
            $waktu_pcs = $qty_user / $total_waktu;
        }else {
            $waktu_pcs = 0;
        }

        return $waktu_pcs;
    }

    // Data Kedua 
    public function result($kedua)
    {
        $result = [];
        foreach ($kedua as $key => $value) {
            $qty_per_form = collect($value)->sum('qty_user');
            $groupByWo = collect($value)->groupby('no_wo');
            foreach ($groupByWo as $key2 => $value2) {
                $qty_per_wo = collect($value2)->sum('qty_user');
                foreach ($value2 as $key3 => $value3) {
                    $banyak_color = collect($value2)->count('color');
                    // banyak nya color per wo 
                    $color_per_wo = (new rumus_hitungan)->color_per_wo($banyak_color, $value3);
                    // dd($color_per_wo);
                   
                    // panjang durasi per wo
                    $durasi_per_wo = (new rumus_hitungan)->durasi_per_wo($qty_per_wo, $qty_per_form, $color_per_wo, $value3);
                    // dd($durasi_per_wo);

                    $result[] = [
                        'form_id' => $value3['form_id'],
                        'tanggal' => $value3['tanggal'],
                        'no_wo' => $value3['no_wo'],
                        'color'=> $value3['color'],
                        'total_qty' =>$value3['total_qty'],
                        'qty_user' => $value3['qty_user'],
                        'nik' => $value3['nik'], 
                        'nama' => $value3['nama'], 
                        'salary' => $value3['salary'], 
                        'waktu_pcs' => $value3['waktu_pcs'], 
                        'total_waktu' => $value3['total_waktu'], 
                        'keterangan' => $value3['keterangan'], 
                        'salary' => $value3['salary'], 
                        'gaji_user_hari' => $value3['gaji_user_hari'], 
                        'gaji_user_jam' => $value3['gaji_user_jam'], 
                        'banyak_user' => $value3['banyak_user'], 
                        'keterangan' => $value3['keterangan'], 
                        'start_time' => $value3['start_time'], 
                        'process_time' => $value3['process_time'], 
                        'finish_time' => $value3['finish_time'], 
                        'qty_per_form' => $qty_per_form,
                        'qty_per_wo' => $qty_per_wo,
                        'durasi_per_wo' => $durasi_per_wo,
                        'durasi_tiap_orang' => $durasi_per_wo,
                        'banyak_color'=> $color_per_wo
                    ];
                }
            }
        }

        return $result;
    }

    public function result2($kedua)
    {
        // dd($kedua);
        $result = [];
        foreach ($kedua as $key => $value) {
            $qty_per_form = collect($value)->sum('qty_user');
            $groupByWo = collect($value)->groupby('no_wo');
            foreach ($groupByWo as $key2 => $value2) {
                $qty_per_wo = collect($value2)->sum('qty_user');
                foreach ($value2 as $key3 => $value3) {
                    // dd($value3);
                    $banyak_color = collect($value2)->count('color');
                    // banyak nya color per wo 
                    $color_per_wo = (new rumus_hitungan)->color_per_wo($banyak_color, $value3);
                    // dd($color_per_wo);
                   
                    // panjang durasi per wo
                    $durasi_per_wo = (new rumus_hitungan)->durasi_per_wo($qty_per_wo, $qty_per_form, $color_per_wo, $value3);
                    // dd($durasi_per_wo);
                    
                    $result[] = [
                        'form_id' => $value3['form_id'],
                        'tanggal' => $value3['tanggal'],
                        'no_wo' => $value3['no_wo'],
                        'color'=> $value3['color'],
                        'total_qty' =>$value3['total_qty'],
                        'qty_user' => $value3['qty_user'],
                        'nik' => $value3['nik'], 
                        'nama' => $value3['nama'], 
                        'salary' => $value3['salary'], 
                        'waktu_pcs' => $value3['waktu_pcs'], 
                        'total_waktu' => $value3['total_waktu'], 
                        'start' => $value3['start'], 
                        'finish' => $value3['finish'], 
                        'process_time' => $value3['process_time'], 
                        'keterangan' => $value3['keterangan'], 
                        'salary' => $value3['salary'], 
                        'gaji_user_hari' => $value3['gaji_user_hari'], 
                        'banyak_user' => $value3['banyak_user'], 
                        'keterangan' => $value3['keterangan'], 
                        'qty_per_form' => $qty_per_form,
                        'qty_per_wo' => $qty_per_wo,
                        'durasi_per_wo' => $durasi_per_wo,
                        'durasi_tiap_orang' => $durasi_per_wo,
                        'banyak_color'=> $color_per_wo
                    ];
                }
            }
        }
        // dd($result);
        return $result;
    }
    public function color_per_wo($banyak_color, $value3)
    {
        if ($banyak_color != 0 && $value3['banyak_user'] != 0) {
            $color_per_wo = $banyak_color / $value3['banyak_user'];
         }else {
             $color_per_wo = 0;
         }

         return $color_per_wo;
    }

    public function durasi_per_wo($qty_per_wo, $qty_per_form, $color_per_wo, $value3)
    {
        if ($qty_per_wo != 0 && $qty_per_form != 0 && $color_per_wo != 0) {
            $data_durasi = ($qty_per_wo/$qty_per_form)*$value3['total_waktu'];
            $durasi_per_wo = ($value3['total_qty']/$qty_per_wo)*$data_durasi;
        }else{
            $durasi_per_wo = 0;
        }

        return $durasi_per_wo;
    }

    // Data Ketiga 
    public function hasil($ketiga)
    {
        $hasil = [];
        foreach ($ketiga as $key => $value) {
            $total_waktu_perhari = collect($value)->sum('durasi_tiap_orang');
            foreach ($value as $key => $value) {
                // Total cost wo 
                // dd($value['gaji_user_jam']);
                if ($value['gaji_user_hari'] != 0 && $value['durasi_tiap_orang'] != 0 && $total_waktu_perhari != 00) {
                    $ini_coba = $value['durasi_tiap_orang'] / 60;
                    $total_cost_wo = $ini_coba * $value['gaji_user_jam'];
                    // dd($total_cost_wo);
                }else {
                    $total_cost_wo = 0;
                }

                // cost per pc
                if ($total_cost_wo != 0) {
                    $cost_pc = $total_cost_wo / $value['qty_user'];
                }else {
                    $cost_pc = 0;
                }
                // dd($total_cost_wo);
                $hasil[] = [
                    'form_id' => $value['form_id'],
                    'tanggal' => $value['tanggal'],
                    'no_wo' => $value['no_wo'],
                    'color'=> $value['color'],
                    'total_qty' =>$value['total_qty'],
                    'qty_user' => $value['qty_user'],
                    'nik' => $value['nik'], 
                    'nama' => $value['nama'], 
                    'salary' => $value['salary'], 
                    'waktu_pcs' => $value['waktu_pcs'], 
                    'total_waktu' => $value['total_waktu'], 
                    'keterangan' => $value['keterangan'], 
                    'salary' => $value['salary'], 
                    'gaji_user_hari' => $value['gaji_user_hari'], 
                    'gaji_user_jam' => $value['gaji_user_jam'], 
                    'banyak_user' => $value['banyak_user'], 
                    'qty_per_form' => $value['qty_per_form'], 
                    'qty_per_wo' => $value['qty_per_wo'], 
                    'durasi_per_wo' => $value['durasi_per_wo'], 
                    'durasi_tiap_orang' => $value['durasi_tiap_orang'], 
                    'banyak_color'=>$value['banyak_color'],
                    'keterangan'=>$value['keterangan'],
                    'start_time'=>$value['start_time'],
                    'process_time'=>$value['process_time'],
                    'finish_time'=>$value['finish_time'],
                    'total_cost_wo'=>$total_cost_wo,
                    'cost_pc'=>$cost_pc
                ];
            }
        }
        return $hasil;
    }

    public function hasil2($ketiga)
    {
        $hasil = [];
        foreach ($ketiga as $key => $value) {
            $total_waktu_perhari = collect($value)->sum('durasi_tiap_orang');
            // dd($total_waktu_perhari);
            foreach ($value as $key => $value) {
                // dd($value);
                // Total cost wo 
                if ($value['gaji_user_hari'] != 0 && $value['durasi_tiap_orang'] != 0 && $total_waktu_perhari != 00) {
                    $ini_coba = $value['durasi_tiap_orang'] / 60;
                    $total_cost_wo = $ini_coba * ($value['gaji_user_hari']/8);
                    // dd($total_cost_wo);
                }else {
                    $total_cost_wo = 0;
                }

                // cost per pc
                if ($total_cost_wo != 0) {
                    $cost_pc = $total_cost_wo / $value['qty_user'];
                }else {
                    $cost_pc = 0;
                }
                // dd($total_cost_wo);
                $hasil[] = [
                    'form_id' => $value['form_id'],
                    'tanggal' => $value['tanggal'],
                    'no_wo' => $value['no_wo'],
                    'color'=> $value['color'],
                    'total_qty' =>$value['total_qty'],
                    'qty_user' => $value['qty_user'],
                    'nik' => $value['nik'], 
                    'nama' => $value['nama'], 
                    'salary' => $value['salary'], 
                    'waktu_pcs' => $value['waktu_pcs'], 
                    'total_waktu' => $value['total_waktu'], 
                    'start' => $value['start'], 
                    'finish' => $value['finish'], 
                    'process_time' => $value['process_time'], 
                    'keterangan' => $value['keterangan'], 
                    'salary' => $value['salary'], 
                    'gaji_user_hari' => $value['gaji_user_hari'], 
                    'banyak_user' => $value['banyak_user'], 
                    'qty_per_form' => $value['qty_per_form'], 
                    'qty_per_wo' => $value['qty_per_wo'], 
                    'durasi_per_wo' => $value['durasi_per_wo'], 
                    'durasi_tiap_orang' => $value['durasi_tiap_orang'], 
                    'banyak_color'=>$value['banyak_color'],
                    'keterangan'=>$value['keterangan'],
                    'total_cost_wo'=>$total_cost_wo,
                    'cost_pc'=>$cost_pc
                ];
            }
        }
        // dd($hasil);
        return $hasil;
    }

    public function hasil3($ketiga)
    {
        $hasil = [];
        foreach ($ketiga as $key => $value) {
            $total_waktu_perhari = collect($value)->sum('durasi_tiap_orang');
            foreach ($value as $key => $value) {
                // Total cost wo 
                if ($value['gaji_user_hari'] != 0 && $value['durasi_tiap_orang'] != 0 && $total_waktu_perhari != 00) {
                    // $total_cost_wo = ($value['gaji_user_hari'] * $value['durasi_tiap_orang']) / $total_waktu_perhari;
                    $ini_coba = $value['durasi_tiap_orang'] / 60;
                    // dd($value['durasi_tiap_orang']);
                    $total_cost_wo = $ini_coba * ($value['gaji_user_hari']/8);
                    // dd($total_cost_wo);
                }else {
                    $total_cost_wo = 0;
                }

                // cost per pc
                if ($total_cost_wo != 0) {
                    // $cost_pc = $total_cost_wo / $value['qty_user'];
                    $cost_pc = $total_cost_wo / $value['qty_user'];
                }else {
                    $cost_pc = 0;
                }
                // dd($total_cost_wo);
                $hasil[] = [
                    'form_id' => $value['form_id'],
                    'tanggal' => $value['tanggal'],
                    'no_wo' => $value['no_wo'],
                    'color'=> $value['color'],
                    'size'=> $value['size'],
                    'total_qty' =>$value['total_qty'],
                    'qty_user' => $value['qty_user'],
                    'nik' => $value['nik'], 
                    'nama' => $value['nama'], 
                    'salary' => $value['salary'], 
                    'waktu_pcs' => $value['waktu_pcs'], 
                    'total_waktu' => $value['total_waktu'], 
                    'start' => $value['start'], 
                    'finish' => $value['finish'], 
                    'process_time' => $value['process_time'], 
                    'keterangan' => $value['keterangan'], 
                    'salary' => $value['salary'], 
                    'gaji_user_hari' => $value['gaji_user_hari'], 
                    'banyak_user' => $value['banyak_user'], 
                    'qty_per_form' => $value['qty_per_form'], 
                    'qty_per_wo' => $value['qty_per_wo'], 
                    'durasi_per_wo' => $value['durasi_per_wo'], 
                    'durasi_tiap_orang' => $value['durasi_tiap_orang'], 
                    'banyak_color'=>$value['banyak_color'],
                    'keterangan'=>$value['keterangan'],
                    'total_cost_wo'=>$total_cost_wo,
                    'cost_pc'=>$cost_pc
                ];
            }
        }
        // dd($hasil);
        return $hasil;
    }

    public function insert_rfid($data2, $request)
    {
        $coba = [];
        for ($bil = 5; $bil <= $data2->qty; $bil++)
        { 
            $no_ikat = 1;
            if ($bil % 5 == 0){
                $no_ikat = $bil / 5;
                $urut_awal = $bil-4;
                $urut_akhir = $bil;
                $sisa= $data2->qty - $bil;
                $rfid= 'F'.$request->form_id.'-'.'WO'.$data2->no_wo.'-'.$data2->size.$no_ikat.'-'.$data2->color.'-'.$urut_awal.'/'.$urut_akhir;
                $coba[] = [
                    'form_id'=>$request->form_id,
                    'proses_id'=>$request->proses_id,
                    'no_ikat'=>$no_ikat,
                    'urut_awal'=>$urut_awal,
                    'urut_akhir'=>$urut_akhir,
                    'rf_id' => $rfid,
                    'sisa'=> $sisa
                ];
            }
        }
        return $coba;
    }

    public function insert_rfid_coba($value)
    {
        // dd($value);
        $coba = [];
        for ($bil = 5; $bil <= $value->qty; $bil++)
        { 
            $no_ikat = 1;
            if ($bil % 5 == 0){
                $no_ikat = $bil / 5;
                $urut_awal = $bil-4;
                $urut_akhir = $bil;
                $sisa= $value->qty - $bil;
                $rfid= 'F'.$value->form_id.'-'.'WO'.$value->no_wo.'-'.'MEJA'.$value->nomor_meja.'-'.$value->size.$no_ikat.'-'.$value->color.'-'.$value->country.'-'.$urut_awal.'/'.$urut_akhir.'-'.'5';
                $coba[] = [
                    'form_id'=>$value->form_id,
                    'proses_id'=>$value->id,
                    'nomor_meja'=>$value->nomor_meja,
                    'country'=>$value->country,
                    'qty'=>5,
                    'no_ikat'=>$no_ikat,
                    'urut_awal'=>$urut_awal,
                    'urut_akhir'=>$urut_akhir,
                    'rf_id' => $rfid,
                    'sisa'=> $sisa
                ];
            }
        }
        // dd($coba);
        return $coba;
    }
}