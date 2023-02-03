<?php

namespace App\Models\IT_DT\tiket;

use Illuminate\Database\Eloquent\Model;

class chat_data extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'chat_data';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nik',
        'nama',
        'pesan',    
        'type',    
        'time',    
        'date',    
        'branch',    
        'branchdetail',    
        'support_name',
        'created_at',    
        'updated_at',    
    ];

}