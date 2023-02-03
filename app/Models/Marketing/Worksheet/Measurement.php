<?php

namespace App\Models\Marketing\Worksheet;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    protected $connection = 'mysql_mkt';
    protected $table = 'worksheet_measurement';
    protected $primaryKey = 'id';

    protected $fillable = [
        'master_id',
        'tipe',
        'pom',
        'description',
        'tol_positif',
        'tol_negatif',
        'size1',
        'size2',
        'size3',
        'size4',
        'size5',
        'size6',
        'size7',
        'size8',
        'size9',
        'size10',
        'size11',
        'size12',
        'size13',
        'size14',
        'size15',
        'consumption',
        'description',
        'created_at',
        'updated_at'
    ];

    public function rekap_order()
    {
        return $this->belongsTo('App\Models\Marketing\RekapOrder\RekapOrder', 'id');
    }
}
