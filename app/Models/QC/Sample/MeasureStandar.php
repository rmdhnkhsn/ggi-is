<?php

namespace App\Models\QC\Sample;

use Illuminate\Database\Eloquent\Model;

class MeasureStandar extends Model
{
    protected $connection = 'mysql_sample';
    protected $table = 'measure_standar';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'report_id',
        'desc_1',
        'desc_2',
        'desc_3',
        'desc_4',
        'desc_5',
        'desc_6',
        'desc_7',
        'desc_8',
        'desc_9',
        'desc_10',
        'desc_11',
        'desc_12',
        'desc_13',
        'desc_14',
        'desc_15',
        'desc_16',
        'desc_17',
        'desc_18',
        'desc_19',
        'desc_20',
        'desc_21',
        'desc_22',
        'desc_23',
        'desc_24',
        'desc_25',
        'desc_26',
        'desc_27',
        'desc_28',
        'desc_29',
        'desc_30',
        '_token'
    ];

    public function sample_report()
    {
        return $this->belongsTo('App\Models\QC\Sample\SampleReport','id');
    }
}
