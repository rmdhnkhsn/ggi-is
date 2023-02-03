<?php

namespace App\Models\Cutting\Product_Costing;

use Illuminate\Database\Eloquent\Model;

class LabelKain extends Model
{
    protected $connection = 'mysql_product_costing';
    protected $table = 'label_kain';
    protected $primaryKey = 'id';

    protected $fillable = [
        'form_id',
        'no_wo',
        'style',
        'number_style',
        'buyer',
        'color',
        'roll_no',
        'country',
        'factory',
        'fabric',
        'qty_utuh',
        'pemakaian_kain',
        'satuan',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function form()
    {
        return $this->belongsTo('App\Models\Cutting\Product_Costing\FormGelar', 'id');
    }
}
