<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model{

    protected $connection = 'mysql_ggi_is';
    protected $table="notification";
    protected $guard=['id'];
}