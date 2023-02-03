<?php

namespace App\Models\QC\SMQC;

use Illuminate\Database\Eloquent\Model;

class Shrinkage extends Model
{
    protected $connection = 'mysql_smqc';
    protected $table = 'shrinkage';
    protected $primaryKey = 'id';

    protected $fillable = [
        'firs_id',
        'l_a1',
        'l_a2',
        'l_a3',
        'l_b1',
        'l_b2',
        'l_b3',
        'l_c1',
        'l_c2',
        'l_c3',
        'l_d1',
        'l_d2',
        'l_d3',
        'w_a1',
        'w_a2',
        'w_a3',
        'w_b1',
        'w_b2',
        'w_b3',
        'w_c1',
        'w_c2',
        'w_c3',
        'w_d1',
        'w_d2',
        'w_d3',
        'e',
        'f',
        'g',
        'h',
        'i',
        'j'
    ];

    public function report()
    {
        return $this->belongsTo('App\Models\QC\SMQC\Fabric','id');
    }
}
