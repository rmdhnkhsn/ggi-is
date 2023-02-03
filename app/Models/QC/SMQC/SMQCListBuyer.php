<?php

namespace App\Models\QC\SMQC;

use Illuminate\Database\Eloquent\Model;

class SMQCListBuyer extends Model
{
    protected $connection = 'mysql_smqc';
    protected $table = 'buyer';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'point', 
        'point2',
        '_token'
    ];
}
