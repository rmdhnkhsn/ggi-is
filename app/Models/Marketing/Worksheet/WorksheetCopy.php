<?php

namespace App\Models\Marketing\Worksheet;

use Illuminate\Database\Eloquent\Model;

class WorksheetCopy extends Model
{
    protected $connection = 'mysql_mkt';
    protected $table = 'worksheet_copy';
    protected $primaryKey = 'id';

    protected $fillable = [
        'master_id',
        'rekap_order_tujuan',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function rekap_order()
    {
        return $this->belongsTo('App\Models\Marketing\RekapOrder\RekapOrder', 'id');
    }
}
