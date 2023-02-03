<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model{
    protected $connection = 'mysql_ggi_is';
    protected $table="sys_module";
    protected $guard=['id'];
}