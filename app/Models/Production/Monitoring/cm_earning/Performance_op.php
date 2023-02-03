<?php

namespace App\Models\Production\Monitoring\cm_earning;

use Illuminate\Database\Eloquent\Model;

class Performance_op extends Model
{
    
    protected $connection = 'mysql_robotik_mjk';
    protected $table = 'performance_op';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nik',

    ];
}
