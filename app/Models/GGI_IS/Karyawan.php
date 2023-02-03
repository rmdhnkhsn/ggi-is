<?php

namespace App\Models\GGI_IS;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $connection = 'mysql_hris';
    protected $table = 'karyawan';
    protected $primaryKey = 'nik';
    public $incrementing = false;
    protected $fillable = [
        'nik',
        'nama',
        'departemen',
        'departemensub',
        'departemensubsub',
        'jabatan',
        'branch',
        'branchdetail',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
    ];
}