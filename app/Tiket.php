<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'ticketing_tiket';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'no_tiket',
        'nik',
        'nama',
        'bagian',    
        'ext',
        'ip',
        'judul',
        'deskripsi',
        'priority',
        'foto',
        'tgl_pengajuan',
        'jam_pengajuan',
        'status',
        'branch',
        'branchdetail',
        'petugas',
        'nama_petugas',
        'rusak',
        'sub_rusak',
        'pesan_pending',
        'tgl_pengerjaan',
        'jam_pengerjaan',
        'tgl_pending',
        'jam_pending',
        'tgl_selesai',
        'jam_selesai',
        'pesan_selesai',
        'kategori_tiket',
        'foto_selesai',
        
    ];

}