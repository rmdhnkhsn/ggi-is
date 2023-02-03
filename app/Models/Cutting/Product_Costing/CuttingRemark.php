<?php

namespace App\Models\Cutting\Product_Costing;

use Illuminate\Database\Eloquent\Model;

class CuttingRemark extends Model
{
    protected $connection = 'mysql_product_costing';
    protected $table = 'cutting_remark';
    protected $primaryKey = 'id';

    protected $fillable = [
        'form_id',
        'proses',
        'sequence',
        'remark',
        'start_time',
        'process_time',
        'finish_time',
        'token',
        'created_at',
        'updated_at',
    ];

    public function form()
    {
        return $this->belongsTo('App\Models\Cutting\Product_Costing\FormGelar', 'id');
    }
}
