<?php

namespace App\Models\QC\SMQC;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $connection = 'mysql_smqc';
    protected $table = 'user_role';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'kode_role',
        'nama_role',
        '_token',
        'created_at',
        'updated_at'
    ];
}
