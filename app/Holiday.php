<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table="national_holiday";
    protected $fillable=[
        'date', 'description'
    ];
    protected $hidden=[];
}
