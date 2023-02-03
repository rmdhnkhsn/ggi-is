<?php

namespace App\Models\Finising;

use Illuminate\Database\Eloquent\Model;

class finishing_packing_all_size extends Model
{
    protected $connection = 'mysql_mkt_qr';
    protected $table = "finishing_packing_all_size";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_packing_size',
       'id_packing_report',
       'nama_size',
       'jumlah_size',
       'qty_carton',
       'color_code',
       'id_ekspedisi',
       'wo',
       'style',
       'buyer',
       'po',
       'no_kontrak',
       'or_number',
       'NW',
       'GW',
       'satuan',
       'warehouse',
       'action',
       'qty',
       'packing_to_expedisi',

    ];

    public function finising_packing_report_size()
    {
        return $this->belongsTo(finising_packing_report_size::class);
    }


     public function finishing_packingList()
    {
        return $this->belongsTo('App\Models\Finising\finising_packingList', 'kode_ekspedisi');
    }
}
