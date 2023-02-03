<?php

namespace App\Models\Production\Asset;

use Illuminate\Database\Eloquent\Model;

class asset_condition extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $connection = 'mysql_asset';
    protected $table = 'asset_condition';
    protected $primaryKey = 'id';
    

    protected $fillable = [
        'id',
        'condition',
    ];
}