<?php

namespace App\Models\Cutting\Product_Costing;

use Illuminate\Database\Eloquent\Model;

class ProsesBundlingRemark extends Model
{
    protected $connection = 'mysql_product_costing';
    protected $table = 'proses_bundling_remark';
    protected $primaryKey = 'id';

    protected $fillable = [
        'form_id',
        'proses_id',
        'remark',
        'start_time',
        'process_time',
        'finish_time',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function proses_bundling()
    {
        return $this->belongsTo('App\Models\Cutting\Product_Costing\ProsesBundling', 'id');
    }
}
