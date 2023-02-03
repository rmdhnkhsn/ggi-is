<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleAccessPermission extends Model{
    protected $connection = 'mysql_ggi_is';
    protected $table="role_permission";
    protected $guard=['id'];

    public function module(){
        return $this->belongsTo(Module::class);
    }
}