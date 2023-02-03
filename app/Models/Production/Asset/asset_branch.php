<?php

namespace App\Models\Production\Asset;

use Illuminate\Database\Eloquent\Model;

class asset_branch extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $connection = 'mysql_asset';
    protected $table = 'asset_branch';
    protected $primaryKey = 'id';
    

    protected $fillable = [
        'id',
        'company',
        'branch_code',
        'name',
        'address',
        'status',
    ];
}