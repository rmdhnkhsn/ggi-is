<?php

namespace App\Models\Sewing;

use Illuminate\Database\Eloquent\Model;

class PersiapanSewing extends Model
{
    protected $connection = 'mysql_prod_sch';
    protected $table = 'sewing_persiapan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tanggal',
        'wo',
        'line',
        'qty_output',
        'qty_target',
        'qty_balance',
        'kode_branch',
        'branchdetail',
        'unplanned',
        'createby_nik',
        'createby_nama',       
    ];
}
