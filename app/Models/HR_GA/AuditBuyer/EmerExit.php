<?php

namespace App\Models\HR_GA\AuditBuyer;

use Illuminate\Database\Eloquent\Model;

class EmerExit extends Model
{
    protected $connection = 'mysql_audit_buyer';
    protected $table = 'emergency_exit';
    protected $primaryKey = 'id';

    protected $fillable = [
       'id',
       'item',
       'kode_lokasi',
       'nama_lokasi',
       'tgl_periksa',
       'kode_branch',
       'branchdetail',
       'ada_exit',
       'kondisi_lampu',
       'kebersihan',
       'petugas',
       'id_report',
       'perbaikan',
      'finish',
        //  'id_item',
      //  'item',
    ];
    }