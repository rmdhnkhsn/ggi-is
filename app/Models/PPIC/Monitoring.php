<?php

namespace App\Models\PPIC;

use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    protected $connection = 'mysql_prod_sch';
    protected $table = 'monitoring_excel';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tanggal',
        'line',
        'wo',
        'total_outpot',
        'created_at',
        'updated_at'
    ];

    // public function targetday()
    // {
    //     return $this->hasMany('App\Models\PPIC\WorkOrderTarget', 'workorder_id');
    // }
    public function branchwo()
    {
        return $this->belongsTo('App\Branch', 'branchdetail', 'kode_sewing');
    }
}
