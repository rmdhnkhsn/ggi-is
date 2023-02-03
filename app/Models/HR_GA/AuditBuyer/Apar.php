<?php

namespace App\Models\HR_GA\AuditBuyer;

use Illuminate\Database\Eloquent\Model;

class Apar extends Model
{
    protected $connection = 'mysql_audit_buyer';
    protected $table = 'apar';
    protected $primaryKey = 'id';

    protected $fillable = [
      'id',
      'item',
      'kode_lokasi',
      'nama_lokasi',
      'tgl_periksa',
      'kode_branch',
      'branchdetail',
      'tekanan',
      'pin',
      'kondisi_selang',
      'berat_tabung',
      'masa_berlaku',
      'kondisi_tuas',
      'garis_merah',
      'kondisi_sign',
      'petugas',
      'id_report',
      'perbaikan',
      'finish',
        //  'id_item',
      //  'item',
    ];
    }