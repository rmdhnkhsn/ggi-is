<?php

namespace App\Services\Production\ProductCosting;

use Carbon\Carbon;
use App\Models\Cutting\Product_Costing\FormGelar;
use App\Models\Cutting\Product_Costing\CuttingRemark;
use App\Models\Cutting\Product_Costing\CuttingAtribut;
use App\Models\Cutting\Product_Costing\KodeKerjaKaryawan;
use App\Models\Cutting\Product_Costing\CuttingComponentPPIC;

class report_pressing{
    public function pressing_index($data_form)
    {
        $data = [];
        foreach ($data_form as $key => $value) {
            // group by wo 
            $wo = collect($value->proses_gelar)->groupby('no_wo');
            foreach ($wo as $key2 => $value2) {
                // group by color
                $color = collect($value2)
                        ->groupBy('color')
                        ->map(function ($item) {
                                return array_merge(...$item->toArray());
                        })->values()->toArray();
                foreach ($color as $key3 => $value3) {
                    foreach ($value->proses_pressing_user as $key4 => $value4) {
                        $gelaran_wo = collect($value->gelaran_wo)->where('form_id', $value3['form_id'])->where('no_wo', $value3['no_wo'])->where('color',$value3['color'])->first();
                        $assortmarker = collect($value->assortmarker)->where('form_id', $value3['form_id']);
                        $qty_gelar = collect($value->proses_gelar)->where('no_wo', $value3['no_wo'])->where('color', $value3['color'])->sum('qty_gelar');
                        $jumlah_assortmarker = collect($value->assortmarker)->count('id');

                        // cek data antara gelaran wo dan assortmarker
                        $qty_breakdown = collect($value->gelar_qty_breakdown)->where('form_id', $value3['form_id'])->where('no_wo', $value3['no_wo'])->where('color',$value3['color'])->first();
                        // dd($qty_breakdown);

                        // QTY total 
                        $total_qty = (new rumus_hitungan)->total_qty($qty_breakdown);
                        // dd($total_qty);


                        // banyaknya user yang mengerjakan 
                        $banyak_user = collect($value->proses_pressing_user)->count('id');
                        
                        // Qty per User 
                        $qty_user = (new rumus_hitungan)->qty_user($total_qty, $banyak_user);
                        // dd($qty_user);

                        // Untuk mencari durasi 
                        $remark = CuttingRemark::where('form_id', $value->id)
                                                    ->where('proses', 'Proses Pressing')
                                                    ->first();
                        $waktu = (new rumus_hitungan)->total_waktu_2($remark, $value, $banyak_user, $value4);
                        // dd($waktu);
                        $start = $waktu['start'];
                        $finish = $waktu['finish'];
                        $process_time = $waktu['process_time'];
                        $keterangan = $waktu['keterangan'];
                        $total_waktu = $waktu['total_waktu'];
                        $waktu_user = $waktu['waktu_user'];
                        // dd($waktu_user);

                        // Gaji User 
                        $karyawan = KodeKerjaKaryawan::where('nik', $value4->nik)->first();
                        $gaji = $karyawan->thp;

                        //Hari kerja 
                        $hk = $karyawan->hari_kerja;
                        // dd($hk);

                        //Gaji User perhari
                        $gaji_user_hari = $karyawan->gaji_per_hari;
                        $gaji_user_jam = $karyawan->gaji_per_jam;
                        // dd($gaji_user_jam);
                        
                        // Durasi waktu per PCs 
                        $waktu_pcs = (new rumus_hitungan)->waktu_pcs($total_waktu, $qty_user);
                        // dd($waktu_pcs);

                        // qty per wo 
                        $data[] = [
                            'form_id' => $value->id,
                            'tanggal' => (new Carbon($gelaran_wo->created_at))->format('d-m-Y'),
                            'no_wo' =>$value3['no_wo'],
                            'color'=> $value3['color'],
                            'total_qty' => $total_qty,
                            'qty_user' => $qty_user,
                            'nik' => $value4->nik,
                            'nama' => $value4->nama,
                            'salary' => $gaji,
                            'waktu_pcs' => $waktu_pcs,
                            'start' =>  date('H:i:s', strtotime($start)),
                            'finish' =>  date('H:i:s', strtotime($finish)),
                            'process_time' => $process_time,
                            'waktu_user' => $waktu_user,
                            'total_waktu' => $total_waktu,
                            'keterangan' => $keterangan,
                            'salary' => $gaji,
                            'gaji_user_hari' => $gaji_user_hari,
                            'banyak_user' => $banyak_user,
                        ];
                    }
                }
            }
        }
        
        // dd($data);

        // data kedua  
        $kedua = collect($data)->groupby('form_id');
        $result = (new rumus_hitungan)->result2($kedua);
        // dd($result);

        // dd($result);
        $ketiga = collect($result)->groupby('tanggal');
        $hasil = (new rumus_hitungan)->hasil2($ketiga);
        // dd($hasil);

        return $hasil;
    }
}