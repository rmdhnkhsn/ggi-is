<?php

namespace App\Models\HR_GA\JobVacancy;

use Illuminate\Database\Eloquent\Model;

class ERSInterview extends Model
{
    protected $connection = 'mysql_hrga';
    protected $table = 'ers_interview';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ers_id',
        'applicant_id',
        'user_kategory',
        'penampilan',
        'remark_penampilan',
        'pengetahuan',
        'remark_pengetahuan',
        'motivasi',
        'remark_motivasi',
        'ambisi',
        'remark_ambisi',
        'inisiatif',
        'remark_inisiatif',
        'komunikasi',
        'remark_komunikasi',
        'berfikir',
        'remark_berfikir',
        'teamwork',
        'remark_teamwork',
        'interviewer_name1',
        'conclusion1',
        'recomendation1',
        'interviewer_name2',
        'conclusion2',
        'recomendation2',
        'decision',
        'interview_score',
        'position',
        'come_to_work_date',
        'employee_status',
        'facility_benefits',
        'other_facility',
        'salary',
        'hrd_approve',
        'user_approve',
        'manager_approve',
        '_token',
        'created_at',
        'updated_at '
    ];

    public function setfacility_benefits($value)
    {
        $this->attributes['facility_benefits'] = json_encode($value);
    }

    public function getfacility_benefits($value)
    {
        return $this->attributes['facility_benefits'] = json_decode($value);
    }

    public function applicant()
    {
        return $this->belongsTo('App\Models\HRIS\ERSApplicant', 'id');
    }
}
