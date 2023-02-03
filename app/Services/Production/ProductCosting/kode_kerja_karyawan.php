<?php

namespace App\Services\Production\ProductCosting;

use App\Models\Cutting\Product_Costing\MasterKodeKerja;
use App\Models\Cutting\Product_Costing\KodeKerjaKaryawan;

class kode_kerja_karyawan{
    public function data_index($data)
    {
        // dd($data);
        $result = [];
        foreach ($data as $key => $value) {
            $keterangan =  collect($value->data_gapok)->last();
            if ($keterangan == null) {
                $id = null;
                $periode = null;
                $tahun = null;
                $hari_kerja = null;
                $gedung = null;
                $group = null;
                $kategory = null;
                $gaji_pokok = null;
                $prem_krj = null;
                $tun_tetap = null;
                $thp = null;
                $gp_tun = null;
                $gaji_per_hari = null;
                $gaji_per_jam = null;
                $gaji_per_jam_lembur = null;
                $bpjamsostek = null;
                $bpjs_ks = null;
                $uang_makan = null;
                $kode_kerja = null;
                $jam_kerja = null;
                $istirahat = null;
            }else{
                $master_kode_kerja = MasterKodeKerja::where('kode_kerja',$keterangan->kode_kerja)->first();
                $id = $keterangan->id;
                $periode = $keterangan->periode;
                $tahun = $keterangan->tahun;
                $hari_kerja = $keterangan->hari_kerja;
                $gedung = $keterangan->gedung;
                $group = $keterangan->group;
                $kategory = $keterangan->kategory;
                $gaji_pokok = $keterangan->gaji_pokok;
                $prem_krj = $keterangan->prem_krj;
                $tun_tetap = $keterangan->tun_tetap;
                $thp = $keterangan->thp;
                $gp_tun = $keterangan->gp_tun;
                $gaji_per_hari = $keterangan->gaji_per_hari;
                $gaji_per_jam = $keterangan->gaji_per_jam;
                $gaji_per_jam_lembur = $keterangan->gaji_per_jam_lembur;
                $bpjamsostek = $keterangan->bpjamsostek;
                $bpjs_ks = $keterangan->bpjs_ks;
                $uang_makan = $keterangan->uang_makan;
                $kode_kerja = $keterangan->kode_kerja;
                $jam_kerja = $master_kode_kerja->jam_kerja;
                $istirahat = $master_kode_kerja->istirahat;
            }
            $result[] = [
                'id' => $id,
                'periode' => $periode,
                'tahun' => $tahun,
                'hari_kerja' => $hari_kerja,
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
                'gaji_per_hari' => $gaji_per_hari,
                'gaji_per_jam' => $gaji_per_jam,
                'gaji_per_jam_lembur' => $gaji_per_jam_lembur,
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

    public function data_search($karyawan, $request)
    {
        // dd($data);
        $result = [];
        foreach ($karyawan as $key => $value) {
            $keterangan =  collect($value->data_gapok)
                            ->where('periode', $request->periode)
                            ->where('tahun', $request->tahun)
                            ->last();
            if ($keterangan == null) {
                $id = null;
                $periode = null;
                $hari_kerja = null;
                $tahun = null;
                $gedung = null;
                $group = null;
                $kategory = null;
                $gaji_pokok = null;
                $prem_krj = null;
                $tun_tetap = null;
                $thp = null;
                $gp_tun = null;
                $gaji_per_hari = null;
                $gaji_per_jam = null;
                $gaji_per_jam_lembur = null;
                $bpjamsostek = null;
                $bpjs_ks = null;
                $uang_makan = null;
                $kode_kerja = null;
                $jam_kerja = null;
                $istirahat = null;
            }else{
                $master_kode_kerja = MasterKodeKerja::where('kode_kerja',$keterangan->kode_kerja)->first();
                $id = $keterangan->id;
                $periode = $keterangan->periode;
                $hari_kerja = $keterangan->hari_kerja;
                $tahun = $keterangan->tahun;
                $gedung = $keterangan->gedung;
                $group = $keterangan->group;
                $kategory = $keterangan->kategory;
                $gaji_pokok = $keterangan->gaji_pokok;
                $prem_krj = $keterangan->prem_krj;
                $tun_tetap = $keterangan->tun_tetap;
                $thp = $keterangan->thp;
                $gp_tun = $keterangan->gp_tun;
                $gaji_per_hari = $keterangan->gaji_per_hari;
                $gaji_per_jam = $keterangan->gaji_per_jam;
                $gaji_per_jam_lembur = $keterangan->gaji_per_jam_lembur;
                $bpjamsostek = $keterangan->bpjamsostek;
                $bpjs_ks = $keterangan->bpjs_ks;
                $uang_makan = $keterangan->uang_makan;
                $kode_kerja = $keterangan->kode_kerja;
                $jam_kerja = $master_kode_kerja->jam_kerja;
                $istirahat = $master_kode_kerja->istirahat;
            }
            $result[] = [
                'id' => $id,
                'periode' => $periode,
                'hari_kerja' => $hari_kerja,
                'tahun' => $tahun,
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
                'gaji_per_hari' => $gaji_per_hari,
                'gaji_per_jam' => $gaji_per_jam,
                'gaji_per_jam_lembur' => $gaji_per_jam_lembur,
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
                'gaji_per_hari' => $value['gaji_per_hari'],
                'bpjamsostek' => $value['bpjamsostek'],
                'bpjs_ks' => $value['bpjs_ks'],
                'uang_makan' => $value['uang_makan'],
            ];
        }
        // dd($data);
        return $data;
    }

    public function data_overtime($karyawan)
    {
        $coba = collect($karyawan->data_gapok)->last();
        if ($coba == null) {
            $id = null;
            $periode_awal = null;
            $periode_akhir = null;
            $tahun = null;
            $gedung = null;
            $group = null;
            $kategory = null;
            $gaji_pokok = null;
            $prem_krj = null;
            $tun_tetap = null;
            $thp = null;
            $gp_tun = null;
            $gaji_per_hari = null;
            $bpjamsostek = null;
            $bpjs_ks = null;
            $uang_makan = null;
            $kode_kerja = null;
            $jam_kerja = null;
            $istirahat = null;
        }else{
            $id = $coba->id;
            $periode_awal = $coba->periode_awal;
            $periode_akhir = $coba->periode_akhir;
            $tahun = $coba->tahun;
            $gedung = $coba->gedung;
            $group = $coba->group;
            $kategory = $coba->kategory;
            $gaji_pokok = $coba->gaji_pokok;
            $prem_krj = $coba->prem_krj;
            $tun_tetap = $coba->tun_tetap;
            $thp = $coba->thp;
            $gp_tun = $coba->gp_tun;
            $gaji_per_hari = $coba->gaji_per_hari;
            $bpjamsostek = $coba->bpjamsostek;
            $bpjs_ks = $coba->bpjs_ks;
            $uang_makan = $coba->uang_makan;
            $kode_kerja = $coba->kode_kerja;
            $jam_kerja = $coba->jam_kerja;
            $istirahat = $coba->istirahat;
        }
        $result[] = [
            'id' => $id,
            'periode_awal' => $periode_awal,
            'periode_akhir' => $periode_akhir,
            'tahun' => $tahun,
            'nik' => $karyawan->nik,
            'nama' => $karyawan->nama,
            'jabatan' => $karyawan->jabatan,
            'bagian' => $karyawan->departemensubsub,
            'departemen' => $karyawan->departemen,
            'statuskontrak' => $karyawan->statuskontrak,
            'gedung' => $gedung,
            'group' => $group,
            'kategory' => $kategory,
            'gaji_pokok' => $gaji_pokok,
            'prem_krj' => $prem_krj,
            'tun_tetap' => $tun_tetap,
            'thp' => $thp,
            'gp_tun' => $gp_tun,
            'gaji_per_hari' => $gaji_per_hari,
            'bpjamsostek' => $bpjamsostek,
            'bpjs_ks' => $bpjs_ks,
            'uang_makan' => $uang_makan,
            'kode_kerja' => $kode_kerja,
            'jam_kerja' => $jam_kerja,
            'istirahat' => $istirahat,
        ];
        return $result;
    }
}