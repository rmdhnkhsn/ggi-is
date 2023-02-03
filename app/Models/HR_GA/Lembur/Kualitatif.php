<?php

namespace App\Models\HR_GA\Lembur;

use Illuminate\Database\Eloquent\Model;

class Kualitatif extends Model
{
    protected $connection = 'mysql_audit_buyer';
    protected $table = 'Kualitatif';
    protected $primaryKey = 'id';

    protected $fillable = [
      'id',
      'id_lembur',
      'buyer',
      'target',
      'realisasi',
      'alasan1',
      'alasan2',
      'alasan3',
      'alasan4',
      'alasan5',

    ];
    public function rencana_lembur()
    {
        return $this->belongsTo('App\Models\HR_GA\Lembur\RencanaLembur','id');
    }
    }