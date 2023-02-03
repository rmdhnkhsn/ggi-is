<?php

namespace App\Models\Marketing\RekapOrder;

use Illuminate\Database\Eloquent\Model;

class RekapDetail extends Model
{
    protected $connection = 'mysql_mkt';
    protected $table = 'rekap_detail';
    protected $primaryKey = 'id';
    protected $fillable = [
        'master_order_id',
        'contract',
        'article',
        'style',
        'style_name',
        'colorway',
        'product_name',
        'description_invoice',
        'product_photo',
        'no_or',
        'kemasan',
        'quantity_pack',
        'parent_item',
        'ex_fact',
        'nilai',
        'fob',
        'cm',
        'cmt',
        'cmtp',
        'shipment_to',
        'total_amount',
        'breakdown_id',
        'total_breakdown',
        'detail_exist',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function rekap_order()
    {
        return $this->belongsTo('App\Models\Marketing\RekapOrder\RekapOrder', 'master_order_id');
    }
    public function item_master()
    {
        return $this->belongsTo('App\ItemNumber', 'parent_item','F4101_ITM');
    }
}
