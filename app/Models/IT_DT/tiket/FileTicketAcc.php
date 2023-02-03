<?php

namespace App\Models\IT_DT\tiket;

use Illuminate\Database\Eloquent\Model;

class FileTicketAcc extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'file_tiket_acc';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_no_tiket',
        'file',
        'type',
        'created_by',
    ];

    public function TiketAcc()
    {
        return $this->belongsTo('App\Models\IT_DT\tiket\TicketAcc','id');
    }

}