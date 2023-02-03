<?php

namespace App\Models\HR_GA\Lembur;

use Illuminate\Database\Eloquent\Model;

class Karyawan_lembur extends Model
{
    protected $connection = 'mysql_audit_buyer';
    protected $table = 'karyawan_lembur';
    protected $primaryKey = 'id';

    protected $fillable = [
      'id',
      'id_lembur',
      'nik',
      'nama',
      'grup',
      'gaji',
      'perjam',
      'l1',
      'l2',
      'target_pekerjaan',
      'rencana_jam_awal',
      'rencana_jam_akhir',
      'rencana_total',
      'realisasi_jam_awal',
      'realisasi_jam_akhir',
      'realisasi_total',
      'tanggal',
      'departemen',
      'bagian',
      'branchdetail',
      'kode_branch',
      'status_lembur',
    ];

}