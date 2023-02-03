<?php

namespace App\Models\HR_GA\JobVacancy;

use Illuminate\Database\Eloquent\Model;

class ERSTestSkills extends Model
{
    protected $connection = 'mysql_hrga';
    protected $table = 'ers_skillstest_score';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'ers_id',
        'applicant_id',
        'departemen',
        'bagian',
        'jabatan',
        'skilltest_name',
        'score_test',
        'english_score',
        'test1',
        'score1',
        'test2',
        'score2',
        'test3',
        'score3',
        'conclusion',
        'skill_score',
        'interview_date',
        'interview_location',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function applicant()
    {
        return $this->belongsTo('App\Models\HRIS\ERSApplicant', 'id');
    }
}
