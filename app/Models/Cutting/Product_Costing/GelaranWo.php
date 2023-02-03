<?php

namespace App\Models\Cutting\Product_Costing;

use Illuminate\Database\Eloquent\Model;

class GelaranWo extends Model
{
    protected $connection = 'mysql_product_costing';
    protected $table = 'gelaran_wo';
    protected $primaryKey = 'id';

    protected $fillable = [
        'form_id',
        'no_wo',
        'buyer',
        'style',
        'number_style',
        'color',
        'part',
        'size1',
        'size2',
        'size3',
        'size4',
        'size5',
        'size6',
        'size7',
        'size8',
        'size9',
        'size10',
        'size11',
        'size12',
        'size13',
        'size14',
        'size15',
        'qty1',
        'qty2',
        'qty3',
        'qty4',
        'qty5',
        'qty6',
        'qty7',
        'qty8',
        'qty9',
        'qty10',
        'qty11',
        'qty12',
        'qty13',
        'qty14',
        'qty15',
        'total_qty',
        'pemakaian_kain',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function form()
    {
        return $this->belongsTo('App\Models\Cutting\Product_Costing\FormGelar', 'id');
    }
}
