<?php

namespace App\Models\QC\SMQC;

use Illuminate\Database\Eloquent\Model;

class FIR extends Model
{
    protected $connection = 'mysql_smqc';
    protected $table = 'firs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'report_id',
        'fd',
        'rat_all',
        'an',
        'ad',
        'mill',
        'ins_d',
        'style',
        'cd',
        'tb',
        'mu',
        'made_by',
        'qf_tr',
        'qf_ty_tr',
        'qf_no_ir',
        'qf_ty_no_ir',
        'qf_aow',
        'qf_point',
        'qf_ap',
        'qf_rat',
        'fl_req',
        'fl_ac',
        'fl_diff',
        'fl_per',
        'fl_rat',
        'fw_req',
        'fw_ac',
        'fw_diff',
        'fw_per',
        'fw_rat',
        'sb_rat',
        'sbt_rat',
        'cc_rat',
        'nol',
        'nol_in',
        'handfeel',
        'h_rat',
        'g_standar',
        'g1',
        'g2',
        'g3',
        'g4',
        'g5',
        'g6',
        'g7',
        'g8',
        'g9',
        'g10',
        'g11',
        'g12',
        'g13',
        'g14',
        'g_rat',
        'remark'
    ];

    public function report()
    {
        return $this->belongsTo('App\Models\QC\SMQC\Fabric','id');
    }
   
}
