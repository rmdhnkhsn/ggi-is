<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model{
    protected $connection = 'mysql_ggi_is';
    protected $table="users_history";
    protected $guard=['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}