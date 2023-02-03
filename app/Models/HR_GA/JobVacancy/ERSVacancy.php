<?php

namespace App\Models\HR_GA\JobVacancy;

use Illuminate\Database\Eloquent\Model;

class ERSVacancy extends Model
{
    protected $connection = 'mysql_hrga';
    protected $table = 'ers_vacancy';
    protected $primaryKey = 'id';

    
    protected $fillable = [
        'ers_id',
        'uraian_singkat',
        'jobdesk',
        'maximal_usia',
        'pendidikan',
        'ipk',
        'penempatan',
        'info_lainnya',
        'minimal_salary',
        'maximal_salary',
        'other_benefit',
        '_token',
        'created_at',
        'updated_at'
    ];
    
    public function ers()
    {
        return $this->belongsTo('App\Models\HRIS\ERS', 'ers_id');
    }
}
