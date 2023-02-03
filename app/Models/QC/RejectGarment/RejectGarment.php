<?php

namespace App\Models\QC\RejectGarment;

use Illuminate\Database\Eloquent\Model;

class RejectGarment extends Model
{
    protected $connection = 'mysql_qc';
    protected $table = 'reject_garment';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_line',
        'target_id',
        'no_wo',
        'tanggal',
        'qty',
        'created_by',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function reject_detail()
    {
        return $this->hasMany('App\Models\QC\RejectGarment\RejectDetail', 'reject_id');
    }
}
