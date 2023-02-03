<?php

namespace App\Models\QC\RejectGarment;

use Illuminate\Database\Eloquent\Model;

class RejectDetail extends Model
{
    protected $connection = 'mysql_qc';
    protected $table = 'reject_detail';
    protected $primaryKey = 'id';

    protected $fillable = [
        'reject_id',
        'breakdown',
        'defect_id',
        'qty',
        'remark',
        'box_id',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function reject_garment()
    {
        return $this->belongsTo('App\Models\QC\RejectGarment\RejectGarment','id');
    }
}
