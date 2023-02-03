<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleAccess extends Model{

    protected $connection = 'mysql_ggi_is';
    protected $table="role";
    protected $guard=['id'];

    public function permissions(){
        return $this->hasMany(RoleAccessPermission::class);
    }
}