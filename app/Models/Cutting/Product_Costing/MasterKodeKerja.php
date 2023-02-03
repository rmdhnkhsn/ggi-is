<?php

namespace App\Models\Cutting\Product_Costing;

use Illuminate\Database\Eloquent\Model;

class MasterKodeKerja extends Model
{
    protected $connection = 'mysql_product_costing';
    protected $table = 'master_kode_kerja';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_kerja',
        'jam_kerja',
        'istirahat',
        'branch',
        'branchdetail',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function karyawan()
    {
        return $this->hasMany('App\Models\Product_Costing\KodeKerjaKaryawan', 'kode_kerja');
    }
}
