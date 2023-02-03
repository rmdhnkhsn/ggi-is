<?php

namespace App\Exports;

use App\Modul;
use App\Models\GGI_IS\V_GCC_USER;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Cutting\Product_Costing\KodeKerjaKaryawan;
use App\Services\Production\ProductCosting\kode_kerja_karyawan;

class KodeKerjaKaryawanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $karyawan = V_GCC_USER::with('data_gapok')
                    ->where('branch', auth()->user()->branch)
                    ->get();
        $data_kode_karyawan = (new kode_kerja_karyawan)->data_index($karyawan);
        $data =  (new kode_kerja_karyawan)->data_export($data_kode_karyawan);
        // dd($data);
        $coba = collect($data);
        return $coba;
    }
    public function headings(): array
    {
        return [
            'nik',
            'nama',
            'gedung',
            'jabatan',
            'bagian',
            'group',
            'kategory',
            'departemen',
            'statuskontrak',
            'gaji_pokok',
            'prem_krj',
            'tun_tetap',
            'thp',
            'gp_tun',
            'gaji_per_hari',
            'bpjamsostek',
            'bpjs_ks',
            'uang_makan',
        ];
    }
}
