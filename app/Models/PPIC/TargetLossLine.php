<?php

namespace App\Models\PPIC;

use Illuminate\Database\Eloquent\Model;

class TargetLossLine extends Model
{
    protected $connection = 'mysql_prod_sch';
    protected $table = 'target_lost_reason';
    protected $primaryKey = 'id';
    // protected $fillable = [];
    protected $guard=[];

    // public function targetday()
    // {
    //     return $this->hasMany('App\Models\PPIC\WorkOrderTarget', 'workorder_id');
    // }
    // public function prod_line()
    // {
    //     return $this->belongsTo('App\Models\PPIC\ProductionLine', 'production_line_id');
    // }
    // public function originator()
    // {
    //     return $this->belongsTo('App\User', 'created_by', 'nik');
    // }
    // public function rekap_detail()
    // {
    //     return $this->belongsTo('App\Models\Marketing\RekapOrder\RekapDetail', 'rekap_detail_id');
    // }
    // public function progress_produksi()
    // {
    //     return $this->hasMany('App\Models\PPIC\Monitoring', 'wo','wo_no');
    // }

}
