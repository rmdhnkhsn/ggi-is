<?php

namespace App\Models\Audit;

use Illuminate\Database\Eloquent\Model;

class UserGudang extends Model
{
    protected $connection = 'mysql_audit';
    protected $table = 'user_gudang';
    protected $primaryKey = 'id';

    protected $fillable = [
       'id',
       'nik',
       'nama',
       'username_jde'
    ];
    }