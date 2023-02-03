<?php

namespace App\Models\Production\Asset;

use Illuminate\Database\Eloquent\Model;

class asset_machine extends Model
{
    protected $connection = 'mysql_asset';
    protected $table = 'asset_machine';
    protected $primaryKey = 'id';
    

    protected $fillable = [
        'id',
        'code',
        'id_transaksi',
        'tipe',
        'jenis',
        'merk',
        'deskripsi',
        'varian',
        'serialno',
        'coOrigin',
        'brOrigin',
        'brLokasi',
        'tipeLokasi',
        'supplier',
        'kondisi',
        'recipient',
        'status',
        'qty',
        'date',
        'price',
        'lokasi',
    ];
}