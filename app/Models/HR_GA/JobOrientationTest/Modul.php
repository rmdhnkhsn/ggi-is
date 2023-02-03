<?php

namespace App\Models\HR_GA\JobOrientationTest;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $connection = 'mysql_hrga';
    protected $table = 'orientation_modul';
    protected $primaryKey = 'id';

    
    protected $fillable = [
        'tgl_input',
        'judul',
        'departemen',
        'departemensubsub',
        'branch',
        'branchdetail',
        'set_public',
        'created_by',
        'created_name',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function soal()
    {
        return $this->hasMany('App\Models\HR_GA\JobOrientationTest\Soal', 'modul_id');
    }
}
