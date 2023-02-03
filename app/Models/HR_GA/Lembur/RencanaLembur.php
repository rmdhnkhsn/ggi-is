<?php

namespace App\Models\HR_GA\Lembur;

use Illuminate\Database\Eloquent\Model;

class RencanaLembur extends Model
{
    protected $connection = 'mysql_audit_buyer';
    protected $table = 'rencana_lembur';
    protected $primaryKey = 'id';

    protected $fillable = [
      'id',
      'tanggal',
      'departemen',
      'bagian',
      'nik',
      'nama',
      'branchdetail',
      'kode_branch',
      'status_lembur',
      'approve_1',
      'nik_1',
      'approve_2',
      'nik_2',
      'waktu_pembuatan',
      'waktu_app1',
      'waktu_app2',
    ];

    public function karyawan()
    {
        return $this->hasMany('App\Models\HR_GA\Lembur\Karyawan','id_lembur');
    }

    public function kualitatif()
    {
        return $this->hasMany('App\Models\HR_GA\Lembur\Kualitatif','id_lembur');
    }

    public function kuantitatif()
    {
        return $this->hasMany('App\Models\HR_GA\Lembur\Kuantitatif','id_lembur');
    }

    }