<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDefinedCode extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "t_v0005a";
    protected $primaryKey = 'F0005_SY';

    protected $fillable = [
        'F0005_SY', 
        'F0005_RT', 
        'F0005_KY', 
        'F0005_DL01', //nama negara
    ];
}
