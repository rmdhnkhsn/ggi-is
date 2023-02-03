<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoContract extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "t_v560021";
//ily
    protected $fillable = [
        'F560021_DSC2', // No Contract
        'F560021_DOC', // NO WO 
    ];
}
