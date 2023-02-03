<?php

namespace App\Models\MoreProgram;

use Illuminate\Database\Eloquent\Model;

class WeeklyQuestion extends Model
{
    protected $connection = 'mysql_hrga';
    protected $table = 'monitoring_covid';
    protected $primaryKey = 'id';

    
    protected $fillable = [
        'nik',
        'no_hp',
        'answer1',
        'answer2',
        'answer3',
        'date3',
        'answer4',
        'answer5',
        'note5',
        'answer6',
        'date6',
        'answer7',
        'answer8',
        'note8',
        'answer9',
        'answer10',
        'tgl_input',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function applicant()
    {
        return $this->belongsTo('App\Models\GGI_IS\V_GCC_USER', 'nik');
    }
}
