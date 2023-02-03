<?php

namespace App\Services\Production\ProductCosting;

use App\Models\Cutting\Product_Costing\MasterKodeKerja;

class kode_kerja_karyawan{
    public function data_index($data)
    {
        // dd($data);
        $result = [];
        foreach ($data as $key => $value) {
            if ($value->data_gapok == null) {
                $id = null;
                $gedung = null;
                $group = null;
                $kategory = null;
                $gaji_pokok = null;
                $prem_krj = null;
                $tun_tetap = null;
                $thp = null;
                $gp_tun = null;
                $bpjamsostek = null;
                $bpjs_ks = null;
                $uang_makan = null;
                $kode_kerja = null;
                $jam_kerja = null;
                $istirahat = null;
            }else{
                $id = $value->data_gapok->id;
                $gedung = $value->data_gapok->gedung;
                $group = $value->data_gapok->group;
                $kategory = $value->data_gapok->kategory;
                $gaji_pokok = $value->data_gapok->gaji_pokok;
                $prem_krj = $value->data_gapok->prem_krj;
                $tun_tetap = $value->data_gapok->tun_tetap;
                $thp = $value->data_gapok->thp;
                $gp_tun = $value->data_gapok->gp_tun;
                $bpjamsostek = $value->data_gapok->bpjamsostek;
                $bpjs_ks = $value->data_gapok->bpjs_ks;
                $uang_makan = $value->data_gapok->uang_makan;
                $kode_kerja = $value->data_gapok->kode_kerja;
                $jam_kerja = $value->data_gapok->jam_kerja;
                $istirahat = $value->data_gapok->istirahat;
            }
            $result[] = [
                'id' => $id,
                'nik' => $value->nik,
                'nama' => $value->nama,
                'jabatan' => $value->jabatan,
                'bagian' => $value->departemensubsub,
                'departemen' => $value->departemen,
                'statuskontrak' => $value->statuskontrak,
                'gedung' => $gedung,
                'group' => $group,
                'kategory' => $kategory,
                'gaji_pokok' => $gaji_pokok,
                'prem_krj' => $prem_krj,
                'tun_tetap' => $tun_tetap,
                'thp' => $thp,
                'gp_tun' => $gp_tun,
                'bpjamsostek' => $bpjamsostek,
                'bpjs_ks' => $bpjs_ks,
                'uang_makan' => $uang_makan,
                'kode_kerja' => $kode_kerja,
                'jam_kerja' => $jam_kerja,
                'istirahat' => $istirahat,
            ];
        }
        $data = collect($result)->where('id', '!=', null);
        // dd($data);

        return $data;
    }

    public function data_export($data_kode_karyawan)
    {
        $data = [];
        foreach ($data_kode_karyawan as $key => $value) {
            $data[] = [
                'nik' => $value['nik'],
                'nama' => $value['nama'],
                'gedung' => $value['gedung'],
                'jabatan' => $value['jabatan'],
                'bagian' => $value['bagian'],
                'group' => $value['group'],
                'kategory' => $value['kategory'],
                'departemen' => $value['departemen'],
                'statuskontrak' => $value['statuskontrak'],
                'gaji_pokok' => $value['gaji_pokok'],
                'prem_krj' => $value['prem_krj'],
                'tun_tetap' => $value['tun_tetap'],
                'thp' => $value['thp'],
                'gp_tun' => $value['gp_tun'],
                'bpjamsostek' => $value['bpjamsostek'],
                'bpjs_ks' => $value['bpjs_ks'],
                'uang_makan' => $value['uang_makan'],
                'kode_kerja' => $value['kode_kerja'],
                'jam_kerja' => $value['jam_kerja'],
                'istirahat' => $value['istirahat'],
            ];
        }
        // dd($data);
        return $data;
    }
}