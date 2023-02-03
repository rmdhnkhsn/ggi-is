<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiketHelp extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'ticketing_help';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'judul',
        'item',
        
    ];

}