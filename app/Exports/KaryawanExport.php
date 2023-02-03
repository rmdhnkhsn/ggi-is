<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KaryawanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $records = [];
        DB::table('user')
        ->select([
            'nik',
            'nama',
            'group',
            'branch',
            'departemen',
            'departemensub',
            'branchdetail',
            'departemensubsub',
            'jabatan',
            'tanggal_masuk',
            'statuskontrak',
            // DB::raw('if((isnull(tanggal_habis_kontrak2)),tanggal_habis_kontrak1,tanggal_habis_kontrak2) as akhir_kontrak'),
            'tanggal_mulai_kontrak1',
            'tanggal_habis_kontrak1',
            'tanggal_mulai_kontrak2',
            'tanggal_habis_kontrak2',
            'sisacuti',
            'agama',
            'statuskawin',
            'tempat_lahir',
            'tanggal_lahir',
            'jk',
            'pendidikan',
            'tna_group',
            'komp_gaji',
            'tanggungan',
            'alamat',
            'nik_ktp',
            'no_kpj',
            'no_kis',
            'no_npwp',
            'nohp',
            'isresign',
            'isaktif',
            'gmail',
            'nama_ibu_kandung',
            'no_tlp_keluarga_tdk_serumah',
            'nama_suami_istri',
            'nama_anak1',
            'nama_anak2',
            'nama_anak3',
            'branch_group',
            'group_jabatan',
            'approval_code',
            'nik_atasan',
        ])
        ->orderBy('nik', 'asc')
        ->chunk(200, function($data)use(&$records){
           foreach ($data as $key => $value) {
               array_push($records, $value);
           }
        });

        if(!count($records)) throw new \Exception("Data pengajuan kosong");
        return User::all();
    }
    public function headings(): array
    {
        return [
            'nik',
            'nama',
            'jk',
            'departemen',
            'departemensub',
            'departemensubsub',
            'jabatan',
            'group',
            'branch',
            'branchdetail',
            'statuskontrak',
            'agama',
            'statuskawin',
            'email',
            'nohp',
            'foto',
            'sisacuti',
            'lastcuti',
            'lastlogin',
            'isresign',
            'isaktif',
            'approval_code',
            'role',
            'tanggal_masuk',
            'tanggal_mulai_kontrak1',
            'tanggal_habis_kontrak1',
            'tanggal_mulai_kontrak2',
            'tanggal_habis_kontrak2',
            'tanggal_lahir',
            'tempat_lahir',
            'tna_group',
            'tgl_trigger_cuti', //tgl masuk / tgl pengangkatan
            'branch_group', // gm1. gm2, maja --> maja | cln --> cln | gs -> gs
            'pendidikan',
            'komp_gaji',
            'bank',
            'rekening',
            'tanggungan',
            'alamat',
            'nik_ktp',
            'no_kpj',
            'no_kis',
            'no_npwp',
            'nohp',
            'gmail',
            'nama_ibu_kandung',
            'no_tlp_keluarga_tdk_serumah',
            'nama_suami_istri',
            'nama_anak1',
            'nama_anak2',
            'nama_anak3',
            'file'
        ];
    }
}
