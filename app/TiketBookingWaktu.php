<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiketMasalah extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'ticketing_masalah';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'waktu_str',
        'waktu_start',
        'waktu_finish',
        
    ];

}