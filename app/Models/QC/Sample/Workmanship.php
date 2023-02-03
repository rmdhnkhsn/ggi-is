<?php

namespace App\Models\QC\Sample;

use Illuminate\Database\Eloquent\Model;

class Workmanship extends Model
{
    protected $connection = 'mysql_sample';
    protected $table = 'workmanship';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'report_id',
        'position_1',
        'position_2',
        'position_3',
        'position_4',
        'position_5',
        'position_6',
        'problem_1',
        'problem_2',
        'problem_3',
        'problem_4',
        'problem_5',
        'problem_6',
        'remark_1',
        'remark_2',
        'remark_3',
        'remark_4',
        'remark_5',
        'remark_6',
        'fitting',
        'fitting_comment',
        '_token'
    ];

    public function sample_report()
    {
        return $this->belongsTo('App\Models\QC\Sample\SampleReport','id');
    }
}
