<?php

namespace App\Models\Finising;

use Illuminate\Database\Eloquent\Model;

class finising_category extends Model
{
    protected $connection = 'mysql_mkt_qr';
    protected $table = "category";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id',
       'nama_kategori',
       'sub_kategori',

    ];
}
