<?php

namespace App\Models\HR_GA\Lembur;

use Illuminate\Database\Eloquent\Model;

class AdminOvertime extends Model
{
    protected $connection = 'mysql_audit_buyer';
    protected $table = 'admin_overtime';
    protected $primaryKey = 'id';

    protected $fillable = [
      'nik',
      'nama',
      'branchdetail',
      'kode_branch',
    ];
    }