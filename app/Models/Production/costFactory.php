<?php

namespace App\Models\Production;

use Illuminate\Database\Eloquent\Model;

class costFactory extends Model
{
    
    protected $connection = 'mysql_prod_sch';
    protected $table = 'cost_factory';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'branch_id',  
        'branch_name',  
        'year',
        'jan',
        'feb', 
        'mar',
        'apr', 
        'may',
        'jun',
        'jul',
        'aug',
        'sep',
        'oct',
        'nov',
        'dec',
        'created_by',
    ];
}
