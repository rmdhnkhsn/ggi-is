<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndahDivisi extends Model
{
    protected $connection = 'mysql_indah';
    protected $table = 'indah_divisi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'no',
        'nik_kabag',
        'nama_kabag',    
        'email_kabag',
        'nik_manager',
        'nama_manager',
        'email_manager',
        'bagian',
        'foto', 
        'deskripsi',   
        'status_indah',
        'tgl_tegur',
        'tgl_janji',
        'foto_sesudah',
        'pesan_kabag',
        'nik_satgas',
        'nama_satgas',
        'tgl_approval',
        'branch',
        'branchdetail'
    ];

}
