<?php

namespace App\Models\Purchasing;

use Illuminate\Database\Eloquent\Model;

class PlanPuchase extends Model
{
    protected $connection = 'mysql_prc';
    protected $table = 'plan_purchase';
    protected $primaryKey = 'id';

    protected $fillable = [
        'buyer',
        'buyer_name',
        'item',
        'before',
        'after',
        'valid_date',
        'amount_before',
        'amount_after',
        'old_price',
        'new_price',
        'kurs',
        'currency',
        'no_po',
        'qty',
        'uom',
        'amount_saving',
        'saving',
        'remark',
        '_token',
        'created_at',
        'updated_at'
    ];
}
