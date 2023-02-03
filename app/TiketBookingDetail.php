<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiketBookingDetail extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'ticketing_booking_detail';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'booking_id',
        'ticket_for',
        'ticket_booked_for',
        'kategori',
        'nik',
        'nama',
        'ext',
        'ip',
        'bagian',
        'tanggal_input',
        'deskripsi',
        'ruang_meeting',
        'tanggal_booking',
        'waktu_id',
        'waktu_start',
        'waktu_finish',
        'is_cancel',
        'is_done',
        'branch',
        'branchdetail',
        'remark_cancel',
        'status_booking',
        
    ];

}