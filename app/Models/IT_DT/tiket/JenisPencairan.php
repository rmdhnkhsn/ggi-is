<?php

namespace App\Models\IT_DT\tiket;

use Illuminate\Database\Eloquent\Model;

class JenisPencairan extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'jenis_pencairan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'kode_jenis',
        'jenis_pencairan',
    ];

}