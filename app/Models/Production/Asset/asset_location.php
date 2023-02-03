<?php

namespace App\Models\Production\Asset;

use Illuminate\Database\Eloquent\Model;

class asset_location extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $connection = 'mysql_asset';
    protected $table = 'asset_location';
    protected $primaryKey = 'id';
    

    protected $fillable = [
        'id',
        'branch',
        'tipe',
        'nama',
        'status',
    ];
}