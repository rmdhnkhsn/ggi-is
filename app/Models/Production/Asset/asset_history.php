<?php

namespace App\Models\Production\Asset;

use Illuminate\Database\Eloquent\Model;

class asset_supplier extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $connection = 'mysql_asset';
    protected $table = 'asset_history';
    protected $primaryKey = 'id';
    

    protected $fillable = [
        'id',
        'company',
        'date',
        'transaksi',
    ];
} 
