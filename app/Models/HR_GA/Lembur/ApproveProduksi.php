<?php

namespace App\Models\HR_GA\Lembur;

use Illuminate\Database\Eloquent\Model;

class ApproveProduksi extends Model
{
    protected $connection = 'mysql_audit_buyer';
    protected $table = 'approve_produksi';
    protected $primaryKey = 'id';

    protected $fillable = [
      'id',
      'nik',
      'nama',
      'branchdetail',
      'kode_branch',
      '_token',
    ];
    }