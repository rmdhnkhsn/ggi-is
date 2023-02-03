<?php

namespace App\Models\Finising;

use Illuminate\Database\Eloquent\Model;

class finishing_packing_partlist extends Model
{
    protected $connection = 'mysql_mkt_qr';
    protected $table = "finishing_packing_partlist";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_packing',
       'nama_size',
       'jumlah_size',
       'carton',
       'packing_list',
       'qty',
       'tanggal',
       'article',
       'color_code',
       'NW',
       'GW',
       'created_at',
       'updated_at',

    ];
}
