<?php

namespace App\Models;

use App\User;
use App\Models\GGI_IS\Karyawan;
use Illuminate\Database\Eloquent\Model;

class ScheduledEmailRecipient extends Model{
    protected $connection = 'mysql_ggi_is';
    protected $table="scheduled_email_recipient";
    protected $guard=['id'];

    public function karyawan(){
        return $this->belongsTo(Karyawan::class,'nik','nik');
    }

    public function gcc_user(){
        return $this->belongsTo(User::class,'nik','nik');
    }
}