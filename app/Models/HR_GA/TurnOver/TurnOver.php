<?php

namespace App\Models\HR_GA\TurnOver;

use Illuminate\Database\Eloquent\Model;

class TurnOver extends Model
{
    protected $connection = 'mysql_hris';
    protected $table = 'v_resign';
    // protected $primaryKey = 'id';

    protected $fillable = [
      'ess_id',
      'modul',
      'nikoriginator',
      'tglinput',
      'tglrequest',
      'tglaktual',
      'string1',
      'string2',
      'string3',
      'string4',
      'string5',
      'nama_karyawan',
      'bagian',
      'branch_group',
      'branchdetail',
      'concat_alamat',
      'status_pengajuan',
      'concat_approver1',
      'concat_approver2',
      'status_pengajuan',

    ];
    }