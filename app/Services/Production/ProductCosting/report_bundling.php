<?php

namespace App\Services\Production\ProductCosting;

use Carbon\Carbon;
use App\Models\Cutting\Product_Costing\FormGelar;
use App\Models\Cutting\Product_Costing\CuttingRemark;
use App\Models\Cutting\Product_Costing\CuttingAtribut;
use App\Models\Cutting\Product_Costing\KodeKerjaKaryawan;
use App\Models\Cutting\Product_Costing\CuttingComponentPPIC;

class report_bundling{
    public function bundling_index($data_form)
    {
        $data = [];
        foreach ($data_form as $key => $value) {
            $coba = collect($value->proses_bundling)->where('status', 'Finish');
            foreach ($coba as $key2 => $value2) {
                foreach ($value2->proses_bundling_user as $key3 => $value3) {
                    // QTY total 
                    $total_qty = $value2->qty;
                    // dd($total_qty);

                    // banyaknya user yang mengerjakan 
                    $banyak_user = collect($value2->proses_bundling_user)->count('id');
                    // dd($banyak_user);

                    // Qty per User 
                    $qty_user = (new rumus_hitungan)->qty_user($total_qty, $banyak_user);
                    // dd($qty_user);

                    // Untuk mencari durasi 
                    $waktu = (new rumus_hitungan)->total_waktu_3($value2, $value3, $banyak_user);
                    // dd($waktu);
                    $start = $waktu['start'];
                    $finish = $waktu['finish'];
                    $process_time = $waktu['process_time'];
                    $keterangan = $waktu['keterangan'];
                    $total_waktu = $waktu['total_waktu'];
                    $waktu_user = $waktu['waktu_user'];
                    // dd($waktu_user);

                    // Gaji User 
                    $karyawan = KodeKerjaKaryawan::where('nik', $value3->nik)->first();
                    if ($karyawan == null) {
                       $gaji = 0;
                    }else {
                        $gaji = $karyawan->thp;
                    }
                    
                    // dd($gaji);

                    //Hari kerja 
                    $hk = $karyawan->hari_kerja;
                    // dd($hk);

                    //Gaji User perhari
                    $gaji_user_hari = $karyawan->gaji_per_hari;
                    $gaji_user_jam = $karyawan->gaji_per_jam;
                    // dd($gaji_user_jam);

                    // dd($qty_user);
                    // Durasi waktu per PCs 
                    $waktu_pcs = (new rumus_hitungan)->waktu_pcs($total_waktu, $qty_user);
                    // dd($waktu_pcs);

                    $qty_per_form = collect($coba)->where('form_id', $value->id)->sum('qty');
                    $qty_per_wo = collect($coba)->where('form_id', $value->id)
                                                ->where('no_wo', $value2->no_wo)
                                                ->sum('qty');
                    // dd($qty_per_wo);
                    if ($qty_per_wo != 0 && $qty_per_form != 0 ) {
                        $durasi_per_wo = ($value2->qty/$qty_per_wo)*$total_waktu;
                    }else{
                        $durasi_per_wo = 0;
                    }

                    $banyak_color = 1;
                    // dd($durasi_per_wo);
                    $data[]=[
                        'tanggal' => (new Carbon($value2->start_time))->format('d-m-Y'),
                        'form_id' => $value2->form_id,
                        'proses_id' => $value2->id,
                        'no_wo' => $value2->no_wo,
                        'color' => $value2->color,
                        'qty_gelar' => $value2->qty_gelar,
                        'size' => $value2->size,
                        'qty' => $value2->qty,
                        'total_qty' => $total_qty,
                        'qty_user' => $qty_user,
                        'nik' => $value3->nik,
                        'nama' => $value3->nama,
                        'salary' => $gaji,
                        'waktu_pcs' => $waktu_pcs,
                        'start' =>  date('H:i:s', strtotime($start)),
                        'finish' =>  date('H:i:s', strtotime($finish)),
                        'process_time' => $process_time,
                        'waktu_user' => $waktu_user,
                        'durasi_tiap_orang' => $waktu_user,
                        'total_waktu' => $total_waktu,
                        'keterangan' => $keterangan,
                        'salary' => $gaji,
                        'gaji_user_hari' => $gaji_user_hari,
                        'banyak_user' => $banyak_user,
                        'qty_per_form' => $qty_per_form,
                        'qty_per_wo' => $qty_per_wo,
                        'durasi_per_wo' => $durasi_per_wo,
                        'banyak_color' => $banyak_color,
                    ];
                }
            }
        }
        // dd($data);

        // dd($result);
        $ketiga = collect($data)->groupby('tanggal');
        $hasil = (new rumus_hitungan)->hasil3($ketiga);
        // dd($hasil);

        return $hasil;

    }
}