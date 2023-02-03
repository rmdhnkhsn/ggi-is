<?php

namespace App\Models\Cutting\Product_Costing;

use Illuminate\Database\Eloquent\Model;

class Assortmarker extends Model
{
    protected $connection = 'mysql_product_costing';
    protected $table = 'assortmarker';
    protected $primaryKey = 'id';

    protected $fillable = [
        'form_id',
        'size',
        'qty',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function form()
    {
        return $this->belongsTo('App\Models\Cutting\Product_Costing\FormGelar', 'id');
    }
}
