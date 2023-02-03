<?php

namespace App\Models\HR_GA\JobVacancy;

use Illuminate\Database\Eloquent\Model;

class ERSPsychoTestScore extends Model
{
    protected $connection = 'mysql_hrga';
    protected $table = 'ers_psychotest_score';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ers_id',
        'applicant_id',
        'epps',
        'tkd',
        'disc',
        'eas',
        'paulin',
        'tmc',
        'test1',
        'score1',
        'test2',
        'score2',
        'test3',
        'score3',
        'conclusion',
        'psyco_score',
        'next_step',
        'start_date',
        'test_skill_date',
        'skill_location',
        'interview_date',
        'interview_location',
        'file',
        '_token',
        'created_at',
        'updated_at',
    ];

    public function applicant()
    {
        return $this->belongsTo('App\Models\HRIS\ERSApplicant', 'id');
    }
}
