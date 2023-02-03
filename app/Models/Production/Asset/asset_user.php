<?php

namespace App\Models\Production\Asset;

use Illuminate\Database\Eloquent\Model;

class asset_user extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $connection = 'mysql_asset';
    protected $table = 'asset_user';
    protected $primaryKey = 'id';
    

    protected $fillable = [
        'id',
        'company',
        'branch',
        'username',
        'fullname',
        'status',
        'role',
        'nik',
        'created_by',
    ];
}