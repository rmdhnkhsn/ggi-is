<?php

namespace App\Models\HR_GA\Lembur;

use Illuminate\Database\Eloquent\Model;

class BagianOvertime extends Model
{
    protected $connection = 'mysql_audit_buyer';
    protected $table = 'overtime_bagian';
    protected $primaryKey = 'id';

    protected $fillable = [
      'id',
      'id_departemen',
      'departemen',
      'bagian',
      '_token',
    ];
    }