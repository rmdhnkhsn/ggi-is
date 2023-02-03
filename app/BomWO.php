<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BomWO extends Model
{
    protected $connection = 'mysql';
    protected $table = 'bom_wo';
    protected $primaryKey = 'id';

    protected $fillable = [
        'wo_no',
        'F3002_KIT',
        'F3002_KITL',
        'F3002_CPNB',
        'F3002_ITM',
        'F3002_DSC1',
        'F3002_QNTY',
        'F3002_UM',
        'F3002_URCD',
        'F3002_OPSQ',
        'F3002_FTRC'
    ];
    // protected $guards = [];

}
