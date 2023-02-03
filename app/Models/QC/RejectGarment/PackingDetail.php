<?php

namespace App\Models\QC\RejectGarment;

use Illuminate\Database\Eloquent\Model;

class PackingDetail extends Model
{
    protected $connection = 'mysql_qc';
    protected $table = 'reject_packing_detail';
    protected $primaryKey = 'id';

    protected $fillable = [
        'packing_id',
        'tanggal',
        'no_box',
        'buyer',
        'style',
        'color',
        'no_wo',
        'no_po',
        'item',
        'total',
        'keterangan',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function packinglist()
    {
        return $this->belongsTo('App\Models\QC\RejectGarment\PackingList','id');
    }
}
