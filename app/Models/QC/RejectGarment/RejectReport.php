<?php

namespace App\Models\QC\RejectGarment;

use Illuminate\Database\Eloquent\Model;

class RejectReport extends Model
{
    protected $connection = 'mysql_qc';
    protected $table = 'reject_report';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'tanggal',
        'id_line',
        'line',
        'supervisor',
        'buyer',
        'style',
        'no_wo',
        'article',
        'item',
        'color',
        'qty',
        'size',
        'branch',
        'branchdetail',
        'created_by',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function breakdown()
    {
        return $this->hasOne('App\Models\QC\RejectGarment\RejectBreakdown', 'report_id');
    }
}
