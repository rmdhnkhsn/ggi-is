<?php

namespace App\Models\Production\Monitoring;

use Illuminate\Database\Eloquent\Model;

class OpHadir extends Model
{
    
    protected $connection = 'mysql_prod_sch';
    protected $table = 'op_hadir';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'branchdetail',
        'tanggal',
        'line',
        'style',
        'total_operator',
        'waktu_smv',
        'created_by',
        'updated_by',
    ];
}