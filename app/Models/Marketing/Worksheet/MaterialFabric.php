<?php

namespace App\Models\Marketing\Worksheet;

use Illuminate\Database\Eloquent\Model;

class MaterialFabric extends Model
{
    protected $connection = 'mysql_mkt';
    protected $table = 'worksheet_fabric';
    protected $primaryKey = 'id';

    protected $fillable = [
        'master_id',
        'colorway',
        'cutting_way',
        'material1',
        'material2',
        'port',
        'color',
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
