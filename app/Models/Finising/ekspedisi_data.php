<?php

namespace App\Models\Finising;

use Illuminate\Database\Eloquent\Model;

class ekspedisi_data extends Model
{
    protected $connection = 'mysql_mkt_qr';
    protected $table = "ekspedisifinal";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_packing_size',
       'nama_size',
       'jumlah_size',
       'qty_carton',
       'color_code',
       'id_ekspedisi',
       'wo',
       'style',
       'po',
       'or_number',
       'no_kontrak',
       'NW',
       'GW',

    ];

    public function finising_packing_report_size()
    {
        return $this->belongsTo(finising_packing_report_size::class);
    }
}
