<?php

namespace App\Models\QC\Sample;

use Illuminate\Database\Eloquent\Model;

class SampleMeasurement extends Model
{
    protected $connection = 'mysql_sample';
    protected $table = 'measurement';
    protected $primaryKey = 'id';

    protected $fillable = [
        'report_id',
        'description',
        'tol',
        'spec',
        'pp',
        'note1',
        'note2',
        'note3',
        'note4',
        'note5',
        'note6',
        'note7',
        'note8',
        'note9',
        'note10',
        'note11',
        'note12',
        'note13',
        'note14',
        'note15',
        'note16',
        'note17',
        'note18',
        'note19',
        'note20',
        'note21',
        'note22',
        'note23',
        'note24',
        'note25',
        'note26',
        'note27',
        'note28',
        'note29',
        'note30',
        'note31',
        'note32',
        'note33',
        'note34',
        'note35',
        'note36',
        'note37',
        'note38',
        'note39',
        'note40',
        'note41',
        'note42',
        'note43',
        'note44',
        'note45',
        'note46',
        'note47',
        'note48',
        'note49',
        'note50',
        '_token',
        'created_at',
        'updated_at'
    ];
    public function report()
    {
        return $this->belongsTo('App\Models\QC\Sample\SampleReport','id');
    }
}
