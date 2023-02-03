<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class SalesOrderBreakdown extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "t_v550018a";
    protected $primaryKey = 'F550018_KCOO';

    // protected $fillable = [
    //     'F4211_DOCO', //
    //     'F4211_DCTO', // 
    //     'F4211_KCOO', // 
    // ];

    protected $guards = [
    ];
    
}