<?php

namespace App\Models\PPIC;

use Illuminate\Database\Eloquent\Model;

class MasterBranchWorkDay extends Model
{
    protected $connection = 'mysql_prod_sch';
    protected $table = 'm_branch_workday';
    protected $primaryKey = 'id';
    protected $fillable = [
        'branch_kode',
        'workday',
        'workhour'
    ];
    public function line()
    {
        return $this->hasMany('App\Models\PPIC\ProductionLine','branch_id');
    }
    // public function rekap_order()
    // {
    //     return $this->belongsTo('App\Models\Marketing\RekapOrder\RekapOrder', 'id');
    // }
    // public function rekap_detail()
    // {
    //     return $this->belongsTo('App\Models\Marketing\RekapOrder\RekapDetail', 'rekap_detail_id', 'id');
    // }
}
