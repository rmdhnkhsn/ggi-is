<?php

namespace App\Models\QC\SMQC;

use Illuminate\Database\Eloquent\Model;

class UserManagement extends Model
{
    protected $connection = 'mysql_smqc';
    protected $table = 'user_management';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nik',
        'nama',
        'kategori',
        'role',
        'buyer',
        'email',
        'branch',
        'branchdetail',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function karyawan()
    {
        return $this->belongsTo('App\Models\GGI_IS\V_GCC_USER','nik');
    }

}
