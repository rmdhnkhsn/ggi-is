<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiketKategori extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'ticketing_kategori';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'kategori',
        'deskripsi',
        'bagian',
    ];

}