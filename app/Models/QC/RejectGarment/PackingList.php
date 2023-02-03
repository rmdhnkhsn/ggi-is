<?php

namespace App\Models\QC\RejectGarment;

use Illuminate\Database\Eloquent\Model;

class PackingList extends Model
{
    protected $connection = 'mysql_qc';
    protected $table = 'reject_packing';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tanggal',
        'grade',
        'branch',
        'branchdetail',
        '_token',
        'created_by',
        'created_at',
        'updated_at'
    ];

    public function packing_detail()
    {
        return $this->hasMany('App\Models\QC\RejectGarment\PackingDetail', 'packing_id');
    }
}
