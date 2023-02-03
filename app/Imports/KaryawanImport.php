<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KaryawanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data = [
            'nik' => $row['nik'],
            'nama' => $row['nama'],
            'jk' => $row['jk'],
            'departemen' => $row['departemen'],
            'departemensub' => $row['departemensub'],
            'departemensubsub' => $row['departemensubsub'],
            'jabatan' => $row['jabatan'],
            'group' => $row['group'],
            'branch' => $row['branch'],
            'branchdetail' => $row['branchdetail'],
            'statuskontrak' => $row['statuskontrak'],
            'agama' => $row['agama'],
            'statuskawin' => $row['statuskawin'],
            'email' => $row['email'],
            'nohp' => $row['nohp'],
            'foto' => $row['foto'],
            'sisacuti' => $row['sisacuti'],
            'lastcuti' => $row['lastcuti'],
            'lastlogin' => $row['lastlogin'],
            'isresign' => $row['isresign'],
            'isaktif' => $row['isaktif'],
            'approval_code' => $row['approval_code'],
            'role' => $row['role'],
            'tanggal_masuk' => $row['tanggal_masuk'],
            'tanggal_mulai_kontrak1' => $row['tanggal_mulai_kontrak1'],
            'tanggal_habis_kontrak1' => $row['tanggal_habis_kontrak1'],
            'tanggal_mulai_kontrak2' => $row['tanggal_mulai_kontrak2'],
            'tanggal_habis_kontrak2' => $row['tanggal_habis_kontrak2'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tna_group' => $row['tna_group'],
            'tgl_trigger_cuti' => $row['tgl_trigger_cuti'], //tgl masuk / tgl pengangkatan
            'branch_group' => $row['branch_group'], // gm1. gm2 => $row[''], maja --> maja | cln --> cln | gs -> gs
            'pendidikan' => $row['pendidikan'],
            'komp_gaji' => $row['komp_gaji'],
            'bank' => $row['bank'],
            'rekening' => $row['rekening'],
            'tanggungan' => $row['tanggungan'],
            'alamat' => $row['alamat'],
            'nik_ktp' => $row['nik_ktp'],
            'no_kpj' => $row['no_kpj'],
            'no_kis' => $row['no_kis'],
            'no_npwp' => $row['no_npwp'],
            'nohp' => $row['nohp'],
            'gmail' => $row['gmail'],
            'nama_ibu_kandung' => $row['nama_ibu_kandung'],
            'no_tlp_keluarga_tdk_serumah' => $row['no_tlp_keluarga_tdk_serumah'],
            'nama_suami_istri' => $row['nama_suami_istri'],
            'nama_anak1' => $row['nama_anak1'],
            'nama_anak2' => $row['nama_anak2'],
            'nama_anak3' => $row['nama_anak3'],
            'file' => $row['file']
        ];
        if(
            User::where('nik', $data['nik'])->count()
        ) {
            $input = User::create($data);
        }else {
            $input = User::update($data);
        }
        
        return $input;
    }
}
