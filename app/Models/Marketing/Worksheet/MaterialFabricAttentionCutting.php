<?php

namespace App\Models\Marketing\Worksheet;

use Illuminate\Database\Eloquent\Model;

class MaterialFabricAttentionCutting extends Model
{
    protected $connection = 'mysql_mkt';
    protected $table = 'worksheet_fabric_attention';
    protected $primaryKey = 'id';

    protected $fillable = [
        'master_id',
        'attention_sewing',
        'sewing_guide',
        'fabric_image',
        'fabric_image2',
        'fabric_image3',
        'fabric_image4',
        'fabric_image5',
        'fabric_image6',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function rekap_order()
    {
        return $this->belongsTo('App\Models\Marketing\RekapOrder\RekapOrder', 'id');
    }
}
