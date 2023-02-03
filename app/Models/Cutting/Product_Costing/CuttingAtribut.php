<?php

namespace App\Models\Cutting\Product_Costing;

use Illuminate\Database\Eloquent\Model;

class CuttingAtribut extends Model
{
    protected $connection = 'mysql_product_costing';
    protected $table = 'atribut';
    protected $primaryKey = 'id';

    protected $fillable = [
        'string1',
        'num1',
        'created_at',
        'updated_at'
    ];
}
