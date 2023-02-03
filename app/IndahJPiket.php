<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndahJPiket extends Model
{
    protected $connection = 'mysql_indah';
    protected $table = 'indah_jpiket';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'day',
        'hari',    
        'petugas1',
        'nama1',
        'petugas2',
        'nama2',
        'petugas3',
        'nama3',
        'petugas4',
        'nama4',
        'petugas5',
        'nama5',
        'petugas6',
        'nama6',
        'petugas7',
        'nama7',
        'petugas8',   
        'nama8',
        'petugas9',
        'nama9',
        'petugas10',
        'nama10',
    ];

}
