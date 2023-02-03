<?php

namespace App\Models\QC\Sample;

use Illuminate\Database\Eloquent\Model;

class MeasureDetail extends Model
{
    protected $connection = 'mysql_sample';
    protected $table = 'measure_detail';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'report_id',
        'standar_id',
        'description',
        'a1',
        'a2',
        'a3',
        'a4',
        'a5',
        'a6',
        'a7',
        'a8',
        'a9',
        'a10',
        'a11',
        'a12',
        'a13',
        'a14',
        'a15',
        'a16',
        'a17',
        'a18',
        'a19',
        'a20',
        'a21',
        'a22',
        'a23',
        'a24',
        'a25',
        'a26',
        'a27',
        'a28',
        'a29',
        'a30',
    ];

    public function sample_report()
    {
        return $this->belongsTo('App\Models\QC\Sample\SampleReport','id');
    }
}
