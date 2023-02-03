<?php

namespace App\Models\HR_GA\JobVacancy;

use Illuminate\Database\Eloquent\Model;

class ERSApplicant extends Model
{
    protected $connection = 'mysql_hrga';
    protected $table = 'ers_applicant';
    protected $primaryKey = 'id';

    
    protected $fillable = [
        'ers_id',
        'tgl_input',
        'nik',
        'nama',
        'gender',
        'ttl',
        'address',
        'major',
        'education',
        'ipk',
        'email',
        'tlp',
        'short_resume',
        'award1',
        'award2',
        'award3',
        'award4',
        'application_letter',
        'award',
        'status',
        'process',
        'end_date',
        'psyco_date',
        'psyco_location',
        'psyco_score',
        'skill_date',
        'skill_location',
        'skill_score',
        'interview',
        'interview_location',
        'interview_score',
        'double_test',
        'double_test_date',
        'double_test_location',
        'probation_start_date',
        'probation_end_date',
        'assign_date',
        'disqualification_date',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function ers()
    {
        return $this->belongsTo('App\Models\HRIS\ERS', 'ers_id');
    }

    public function psychotest_score()
    {
        return $this->hasMany('App\Models\HR_GA\JobVacancy\ERSPsychoTestScore', 'applicant_id');
    }

    public function skilltest_score()
    {
        return $this->hasMany('App\Models\HR_GA\JobVacancy\ERSTestSkills', 'applicant_id');
    }

    public function interview_result()
    {
        return $this->hasMany('App\Models\HR_GA\JobVacancy\ERSInterview', 'applicant_id');
    }
}
