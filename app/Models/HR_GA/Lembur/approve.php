<?php

namespace App\Models\HR_GA\Lembur;

use Illuminate\Database\Eloquent\Model;

class approve extends Model
{
    protected $connection = 'mysql_audit_buyer';
    protected $table = 'approve';
    protected $primaryKey = 'id';

    protected $fillable = [
      'id',
      'dept',
      'manger',
      'nik_manager',
      'gm',
      'nik_gm',
      '_token',
    ];
    }