<?php

namespace App\Models\Production\Asset;

use Illuminate\Database\Eloquent\Model;

class asset_transaction_in extends Model
{

    protected $connection = 'mysql_asset';
    protected $table = 'asset_transaction_in';
    protected $primaryKey = 'id';
    

    protected $fillable = [
        'id',
        'id_machine',
        'date',
        'status',
        'transaction_category',
        'recipient',
        'supplier',
        'code',
        'category',
        'serialno',
        'location',
        'fromLokasi',
        'price',
        'tipe',
        'merk',
        'varian',
        'qty',
        'machine',
        'branch',
        'status_transaksi',
        'time',
        'maintenance',
        'kondisi',
        'start',
        'finish',
        'setting',
        'spv',
        'created_by',
    ];
}