<?php

namespace App\Models\QC\SMQC;

use Illuminate\Database\Eloquent\Model;

class StandarKain extends Model
{
    protected $connection = 'mysql_smqc';
    protected $table = 'fabric_standar';
    protected $primaryKey = 'id';

    protected $fillable = [
        'width',
        'point_roll',
        'point_order',
        '_token',
        'created_at',
        'updated_at'
    ];
}
