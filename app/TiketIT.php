<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiketIT extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'ticketing_it';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nik',
        'bagian',
        'nama',    
        'branch',
        'branchdetail'
        
    ];

}