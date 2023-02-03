<?php

namespace App\Models\Production\Asset;

use Illuminate\Database\Eloquent\Model;

class asset_maintanance extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $connection = 'mysql_asset';
    protected $table = 'asset_maintanance';
    protected $primaryKey = 'id';
    

    protected $fillable = [
        'id',
        'maintenance',
    ];
}