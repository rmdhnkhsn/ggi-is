<?php

namespace App\Models\GGI_IS;

use Illuminate\Database\Eloquent\Model;

class JobsViewers extends Model
{
    protected $table = 'job_viewers';
    protected $primaryKey = 'id';

    protected $fillable = [
        'job_id',
        'nik',
        'nama',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function job()
    {
        return $this->belongsTo('App\Models\GGI_IS\JobDescription', 'id');
    }
}
