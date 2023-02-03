<?php

namespace App\Models\Marketing\Worksheet;

use Illuminate\Database\Eloquent\Model;

class WorksheetGeneral extends Model
{
    protected $connection = 'mysql_mkt';
    protected $table = 'worksheet_general';
    protected $primaryKey = 'id';

    protected $fillable = [
        'master_id',
        'detail_id',
        'no_po',
        'po_date',
        'nomor_or',
        'contract',
        'buyer',
        'agent',
        'article',
        'product_name',
        'style_code',
        'style_name',
        'description',
        'file',
        'file2',
        'file3',
        'file4',
        'shipment_date',
        'exfact_date',
        'ship_to',
        'created_at',
        'updated_at',
        '_token'
    ];

    public function trimcard()
    {
        return $this->belongsTo('App\Models\Marketing\RekapOrder\RekapOrder', 'id');
    }
}
