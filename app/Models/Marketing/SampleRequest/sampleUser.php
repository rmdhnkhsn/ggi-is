<?php

namespace App\Models\Marketing\SampleRequest;

use Illuminate\Database\Eloquent\Model;

class sampleUser extends Model
{
    protected $connection = 'mysql_mkt_qr';
    protected $table = "sample_user";
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 
        'nik',  
        'nama',
        'jabatan',
        'created_at',
        'updated_at',
    ];
}
