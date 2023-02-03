<?php

namespace App\Models\Purchasing;

use Illuminate\Database\Eloquent\Model;

class PurchaseRealization extends Model
{
    protected $connection = 'mysql_prc';
    protected $table = 'purchase_realization';
    protected $primaryKey = 'id';

    protected $fillable = [
        'plan_id',
        'amount_before',
        'amount_after',
        'old_price',
        'new_price',
        'kurs',
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

    public function plan()
    {
        return $this->belongsTo('App\Models\Purchasing\PlanPurchase', 'id');
    }
}
