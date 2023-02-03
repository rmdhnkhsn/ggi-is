<?php

namespace App\Models\Production;

use Illuminate\Database\Eloquent\Model;

class MasterSmvHeader extends Model
{
    
    protected $connection = 'mysql_smv';
    protected $table = 'smv_header';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'date',
        'buyer',
        'style',
        'item', 
        'total_minute', 
        'manpower', 
        'qty_order', 
        'line', 
        'target', 
        'allowance',
        'desc',
        'updated_at',
        'created_at',
        'foto' 
    ];
}
