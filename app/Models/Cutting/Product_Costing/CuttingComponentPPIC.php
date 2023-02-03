<?php

namespace App\Models\Cutting\Product_Costing;

use Illuminate\Database\Eloquent\Model;

class CuttingComponentPPIC extends Model
{
    protected $connection = 'mysql_product_costing';
    protected $table = 'ppic_component';
    protected $primaryKey = 'id';

    protected $fillable = [
        'no_wo',
        'item_number',
        'item_desc',
        'desc',
        'seq',
        'srtx',
        'remark',
        '_token',
        'created_at',
        'updated_at'
    ];
}
