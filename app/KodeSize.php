<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KodeSize extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "t_v0005a";

    protected $fillable = [
        'F0005_KY', // Kode
        'F0005_DL01', // Descripsi
    ];
}
