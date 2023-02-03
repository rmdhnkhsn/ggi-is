<?php

namespace App\Models\Production\Asset;

use Illuminate\Database\Eloquent\Model;

class asset_company extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $connection = 'mysql_asset';
    protected $table = 'asset_company';
    protected $primaryKey = 'ID';
    

    protected $fillable = [
        'ID',
        'Name',
        'Code',
        'Address',
        'Status',
    ];
}