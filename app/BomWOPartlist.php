<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BomWOPartlist extends Model
{
    protected $connection = 'mysql';
    protected $table = 'bom_wo_partlist';
    protected $primaryKey = 'id';

    protected $fillable = [
        'wo',
        'or',
        'orty',
        'mcu',
        'status',
        'branch',
        'opsq',
        'parent_short',
        'parent_item',
        'item',
        'item_dsc1',
        'item_dsc2',
        'breakdown_dsc',
        'csp_um',
        'csp',
        'qty_breakdown',
        'unit_price',
        'qty_plan',
        'qty_act',
        'um_plan',
        'um_act',
        'cost_plan',
        'cost_act'
    ];
    // protected $guards = [];

}
