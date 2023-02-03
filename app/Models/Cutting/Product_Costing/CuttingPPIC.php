<?php

namespace App\Models\Cutting\Product_Costing;

use Illuminate\Database\Eloquent\Model;

class CuttingPPIC extends Model
{
    protected $connection = 'mysql_product_costing';
    protected $table = 'ppic';
    protected $primaryKey = 'id';

    protected $fillable = [
        'no_wo',
        'item_number',
        'style',
        'number_style',
        'buyer',
        'total_qty',
        'factory',
        'production_date',
        'estimation_complete',
        'assortmarker',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function wo()
    {
        return $this->belongsTo('App\JdeApi', 'F4801_DOCO');
    }
}
