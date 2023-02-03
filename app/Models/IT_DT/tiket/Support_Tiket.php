<?php

namespace App\Models\IT_DT\tiket;

use Illuminate\Database\Eloquent\Model;

class Support_Tiket extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'support_tiket';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nik',
        'nama',
        'support',    
    ];

}