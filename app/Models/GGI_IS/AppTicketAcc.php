<?php

namespace App\Models\GGI_IS;

use Illuminate\Database\Eloquent\Model;

class AppTicketAcc extends Model
{
    protected $connection = 'mysql_hris';
    protected $table = 'approvalroutedetail';
    protected $primaryKey = 'approvalroutedetail_id';
  
    protected $fillable = [
        'approvalroutedetail_id',
        'modul',
        'nik',
        'sequence',
        'approvalroute_id',
        'just_info',
        'no_slot_nik',
        
    ];

    public function karyawan(){
        return $this->belongsTo("App\User","nik","nik");
    }
}