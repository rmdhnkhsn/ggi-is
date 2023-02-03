<?php

namespace App\Models\IT_DT\tiket;

use Illuminate\Database\Eloquent\Model;

class meeting_room extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'meeting_room';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'room',
        'kapasitas',
        'branchdetail',
        'deskripsi',
        'kode_branch',    

    ];

}