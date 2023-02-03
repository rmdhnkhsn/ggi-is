<?php

namespace App\Models\IT_DT\Work_Plan;

use Illuminate\Database\Eloquent\Model;

class WorkPlan extends Model
{
    protected $connection = 'mysql_work_plan';
    protected $table = 'work_plan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama_projek',
        'tgl_mulai',
        'estimasi_tgl_selsai',
        'aktual_tgl_selesai',
        'tgl_pending',
        'tgl_mulai_pending',
        'estimasi_durasi',
        'benefit',
        'dept',
        'kategori',
        'remark',
        'nama_programmer',
        'nik_programmer',
        'status_work',
        'kode_branch',
        'branchdetail',
        '_token'
       
    ];
}