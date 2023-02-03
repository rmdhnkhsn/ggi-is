<?php

namespace App\Models\Finising;

use Illuminate\Database\Eloquent\Model;

class finishing_packing_partlist_detail extends Model
{
    protected $connection = 'mysql_mkt_qr';
    protected $table = "finishing_packing_partlist_detail";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_packing',
       'carton',
       'packing_list',
       'qty',
       'tanggal',
       'created_at',
       'updated_at',

    ];
}
