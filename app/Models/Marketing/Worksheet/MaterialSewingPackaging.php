<?php

namespace App\Models\Marketing\Worksheet;

use Illuminate\Database\Eloquent\Model;

class MaterialSewingPackaging extends Model
{
    protected $connection = 'mysql_mkt';
    protected $table = 'worksheet_sewing_packaging';
    protected $primaryKey = 'id';

    protected $fillable = [
        'master_id',
        'item',
        'detail',
        'consumption',
        'description',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function rekap_order()
    {
        return $this->belongsTo('App\Models\Marketing\RekapOrder\RekapOrder', 'id');
    }
}
