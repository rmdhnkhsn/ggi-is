<?php

namespace App\Models\Production\Asset;

use Illuminate\Database\Eloquent\Model;

class asset_machine_type extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $connection = 'mysql_asset';
    protected $table = 'asset_machine_type';
    protected $primaryKey = 'id';
    

    protected $fillable = [
        'id',
        'company',
        'tipe',
        'status',
    ];
}