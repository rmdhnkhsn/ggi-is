<?php

namespace App\Models\Cutting\Product_Costing;

use Illuminate\Database\Eloquent\Model;

class KodeKerjaKaryawan extends Model
{
    protected $connection = 'mysql_product_costing';
    protected $table = 'kode_kerja_karyawan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'periode',
        'tahun',
        'hari_kerja',
        'nik',
        'gedung',
        'group',
        'kategory',
        'gaji_pokok',
        'prem_krj',
        'tun_tetap',
        'thp',
        'gp_tun',
        'gaji_per_hari',
        'gaji_per_jam',
        'gaji_per_jam_lembur',
        'bpjamsostek',
        'bpjs_ks',
        'uang_makan',
        'kode_kerja',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function kode_kerja()
    {
        return $this->belongsTo('App\Models\Cutting\Product_Costing\MasterKodeKerja', 'kode_kerja');
    }

    public function karyawan()
    {
        return $this->belongsTo('App\Models\GGI_IS\GCC_User','nik');
    }
}
