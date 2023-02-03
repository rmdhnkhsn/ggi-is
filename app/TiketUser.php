<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiketUser extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'ticketing_ip';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nik',
        'nama',    
        'ext',
        'ip',
        
    ];

}