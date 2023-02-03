<?php

namespace App\Models\Production;

use Illuminate\Database\Eloquent\Model;

class TargetSmv extends Model
{
    public $incrementing = false;
    protected $connection = 'mysql_robotik_mjk';
    protected $table = 'smv_actual';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'style',
        'fasilitas',
        'buyer',
        'remark',
        'smv_total',
        'target',
    ];
}