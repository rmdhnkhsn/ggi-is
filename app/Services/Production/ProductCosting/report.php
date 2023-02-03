<?php

namespace App\Services\Production\ProductCosting;

use Carbon\Carbon;
use App\Models\Cutting\Product_Costing\FormGelar;
use App\Models\Cutting\Product_Costing\CuttingRemark;
use App\Models\Cutting\Product_Costing\CuttingAtribut;
use App\Models\Cutting\Product_Costing\KodeKerjaKaryawan;
use App\Models\Cutting\Product_Costing\CuttingComponentPPIC;
use App\Services\Production\ProductCosting\rumus_hitungan;

class report{
    public function gelar_index($data_form)
    {

        // dd($data_form);
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
                    foreach ($value->proses_gelar_user as $key4 => $value4) {
                        // Inisialisasi Awal 
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
                        $banyak_user = collect($value->proses_gelar_user)->count('id');
                        // dd($banyak_user);

                        // Qty per User 
                        $qty_user = (new rumus_hitungan)->qty_user($total_qty, $banyak_user);
                        // dd($qty_user);

                        // Untuk mencari durasi 
                        $remark = CuttingRemark::where('form_id', $value->id)
                                                    ->where('proses', 'Proses Gelar')
                                                    ->first();
                        $start_time = date('H:i:s', strtotime($remark->start_time));
                        $process_time = str_replace('|', ':', $remark->process_time);
                        $finish_time = date('H:i:s', strtotime($remark->finish_time));
                       
                        $waktu = (new rumus_hitungan)->total_waktu($remark, $value, $banyak_user, $value4);
                        $keterangan = $waktu['keterangan'];
                        $waktu_user = $waktu['waktu_user'];
                        $total_waktu = $waktu['total_waktu'];
                        // dd($waktu);

                        // Gaji User 
                        $karyawan = KodeKerjaKaryawan::where('nik', $value4->nik)->first();
                        $gaji = $karyawan->thp;
                        // dd($gaji);

                        //Hari kerja 
                        // $data_hk = CuttingAtribut::where('string1', 'Hari Kerja')->first();
                        $hk = $karyawan->hari_kerja;
                        // dd($hk);
                        

                        //Gaji User perhari
                        // $gaji_user_hari = (new rumus_hitungan)->gaji_per_hari($gaji, $hk);
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
                            'waktu_user' => $waktu_user,
                            'total_waktu' => $total_waktu,
                            'keterangan' => $keterangan,
                            'start_time' => $start_time,
                            'process_time' => $process_time,
                            'finish_time' => $finish_time,
                            'salary' => $gaji,
                            'gaji_user_hari' => $gaji_user_hari,
                            'gaji_user_jam' => $gaji_user_jam,
                            'banyak_user' => $banyak_user,
                        ];
                    }
                }
            }
        }

        // dd($data);
        $kedua = collect($data)->groupby('form_id');
        // data kedua 
        $result = (new rumus_hitungan)->result($kedua);
        // dd($result);

        // dd($result);
        $ketiga = collect($result)->groupby('tanggal');
        $hasil = (new rumus_hitungan)->hasil($ketiga);
        
        return $hasil;
    }
}