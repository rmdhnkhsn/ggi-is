<?php

namespace App\Models\Marketing\Worksheet;

use Illuminate\Database\Eloquent\Model;

class GeneralPO extends Model
{
    protected $connection = 'mysql_mkt';
    protected $table = 'worksheet_general_po';
    protected $primaryKey = 'id';

    protected $fillable = [
        'master_id',
        'rekap_order_id',
        'po_number',
        'style',
        'ex_fact',
        'po_creation',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function rekap_order()
    {
        return $this->belongsTo('App\Models\Marketing\RekapOrder\RekapOrder', 'id');
    }
}
