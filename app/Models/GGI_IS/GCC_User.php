<?php

namespace App\Models\GGI_IS;

use Illuminate\Database\Eloquent\Model;

class GCC_User extends Model
{
    protected $connection = 'mysql_hris';
    protected $table = 'gcc_user';
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