<?php

namespace App\Models\HR_GA\JobOrientationTest;

use Illuminate\Database\Eloquent\Model;

class JobsTest extends Model
{
    protected $connection = 'mysql_hrga';
    protected $table = 'job_test';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nik',
        'nama',
        'status',
        'final_score',
        'diketahui_atasan',
        'nik_app',
        'app_date',
        'keterangan',
        'created_at',
        'updated_at'
    ];
    
    public function karyawan()
    {
        return $this->belongsTo('App\Models\GGI_IS\GCC_User','nik');
    }

    public function jawaban()
    {
        return $this->hasMany('App\Models\HR_GA\JobOrientationTest\JawabanTest', 'test_id');
    }
}
