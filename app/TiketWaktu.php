<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiketWaktu extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'it_waktu';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'waktu_start',
        'waktu_finish',
        'periode',
        
        
    ];

}