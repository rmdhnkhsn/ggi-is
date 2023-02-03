<?php

namespace App\Models\IT_DT\tiket;

use Illuminate\Database\Eloquent\Model;

class Chat_Log extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'chat_log';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_chat_data',
        'bagian',
        'user_inbond',    
        'pesan_inbond',    
        'tanggal_inbond',    
        'time_inbond',    
        'support_outbond',    
        'balasan_outbond',
        'tanggal_outbond',
        'time_outbond',
        'created_at',    
        'updated_at',    
    ];

}