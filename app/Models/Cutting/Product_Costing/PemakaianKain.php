<?php

namespace App\Models\Cutting\Product_Costing;

use Illuminate\Database\Eloquent\Model;

class PemakaianKain extends Model
{
    protected $connection = 'mysql_product_costing';
    protected $table = 'pemakaian_kain';
    protected $primaryKey = 'id';

    protected $fillable = [
        'form_id',
        'no_wo',
        'color',
        'qty',
        'consumption',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function form()
    {
        return $this->belongsTo('App\Models\Cutting\Product_Costing\FormGelar', 'id');
    }
}
