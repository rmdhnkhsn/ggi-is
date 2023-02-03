<?php

namespace App\Models\HR_GA\Lembur;

use Illuminate\Database\Eloquent\Model;

class Kuantitatif extends Model
{
    protected $connection = 'mysql_audit_buyer';
    protected $table = 'Kuantitatif';
    protected $primaryKey = 'id';

    protected $fillable = [
      'id',
      'id_lembur',
      'buyer',
      'item',
      'wo',
      'po',
      'target',
      'realisasi',
    ];
    public function rencana_lembur()
    {
        return $this->belongsTo('App\Models\HR_GA\Lembur\RencanaLembur','id');
    }
    }