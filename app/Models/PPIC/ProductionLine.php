<?php

namespace App\Models\PPIC;

use Illuminate\Database\Eloquent\Model;

class ProductionLine extends Model
{
    protected $connection = 'mysql_prod_sch';
    protected $table = 'production_line';
    protected $primaryKey = 'id';
    protected $fillable = [
        'branch_id',
        'sub',
        'line',
        'total_operator',
        'line_cost',
        'is_active',
        'created_by',
        'created_at',
        'updated_at'
    ];

    public function line_refactor($sub)
    {
        if (in_array($sub,['CBA', 'CHW', 'CLN', 'CNJ2', 'CVA', 'MJ1', 'MJ2'])) {
            return true;
        } 
        return false;
    }

    public function branch()
    {
        return $this->belongsTo('App\Models\PPIC\MasterBranchWorkDay', 'branch_id', 'id');
    }

    // public function rekap_detail()
    // {
    //     return $this->belongsTo('App\Models\Marketing\RekapOrder\RekapDetail', 'rekap_detail_id', 'id');
    // }
}
