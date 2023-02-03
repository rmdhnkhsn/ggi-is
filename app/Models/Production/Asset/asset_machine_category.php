<?php

namespace App\Models\Production\Asset;

use Illuminate\Database\Eloquent\Model;

class asset_machine_category extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $connection = 'mysql_asset';
    protected $table = 'asset_machine_category';
    protected $primaryKey = 'id';
    

    protected $fillable = [
        'id',
        'company',
        'jenis',
        'status',
    ];
}