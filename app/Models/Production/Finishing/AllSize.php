<?php

namespace App\Models\Production\Finishing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllSize extends Model
{
    use HasFactory;

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
       'date_to_expedisi'
    ];

    public function size()
    {
        return $this->belongsTo('App\Models\Production\Finishing\PackingSize','id');
    }

    public function packing_list()
    {
        return $this->belongsTo('App\Models\Production\Finishing\PackingList','id');
    }
    //  
}
