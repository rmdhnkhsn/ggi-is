<?php

namespace App\Models\Production\Asset;

use Illuminate\Database\Eloquent\Model;

class asset_result extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $connection = 'mysql_asset';
    protected $table = 'asset_result';
    protected $primaryKey = 'id';
    

    protected $fillable = [
        'id',
        'result',
    ];
}