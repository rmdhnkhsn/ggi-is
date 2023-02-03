<?php

namespace App\Models\QC\Sample;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $connection = 'mysql_sample';
    protected $table = 'color';
    protected $primaryKey = 'id';

    protected $fillable = [
        'report_id',
        'color',
        'pack',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function report()
    {
        return $this->belongsTo('App\Models\QC\Sample\SampleReport','id');
    }
}
