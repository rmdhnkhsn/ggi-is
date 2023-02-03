<?php

namespace App\Models\Production;

use Illuminate\Database\Eloquent\Model;

class OperatorPerformanceWaktu extends Model
{
    public $incrementing = false;
    protected $connection = 'mysql_robotik_mjk';
    protected $table = 'tabel_waktu';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'fasilitas',
        'line'
    ];

}
