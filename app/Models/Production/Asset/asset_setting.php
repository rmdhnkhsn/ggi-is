<?php

namespace App\Models\Production\Asset;

use Illuminate\Database\Eloquent\Model;

class asset_setting extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $connection = 'mysql_asset';
    protected $table = 'asset_setting';
    protected $primaryKey = 'id';
    

    protected $fillable = [
        'id',
        'setting',
    ];
}