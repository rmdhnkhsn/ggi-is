<?php

namespace App\Models\Sewing;

use Illuminate\Database\Eloquent\Model;

class TargetLostReason extends Model
{
    protected $connection = 'mysql_prod_sch';
    protected $table = 'target_lost_reason';
    protected $primaryKey = 'id';

    protected $guards = [];
}
