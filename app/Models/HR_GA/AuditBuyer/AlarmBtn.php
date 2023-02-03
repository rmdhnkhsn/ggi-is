<?php

namespace App\Models\HR_GA\AuditBuyer;

use Illuminate\Database\Eloquent\Model;

class AlarmBtn extends Model
{
    protected $connection = 'mysql_audit_buyer';
    protected $table = 'alaram_btn';
    protected $primaryKey = 'id';

    protected $fillable = [
       'id',
       'item',
       'kode_lokasi',
       'nama_lokasi',
       'tgl_periksa',
       'kode_branch',
       'branchdetail',
       'kondisi',
       'kebersihan',
       'ceklis',
       'petugas',
       'id_report',
       'perbaikan',
       'finish',
        //  'id_item',
      //  'item',
    ];
    }