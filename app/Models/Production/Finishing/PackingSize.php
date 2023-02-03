<?php

namespace App\Models\Production\Finishing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackingSize extends Model
{
    use HasFactory;

    protected $connection = 'mysql_mkt_qr';
    protected $table = "finishing_packing_size";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id_packing',
       'ct_co',
       'qty_carton',
       'color_code',
       'style',
       'warehouse',
       'satuan',
       'nama_size',
       'jumlah_size',
       'NW',
       'GW',
       'qty_size',
       'action',
       'id_ekspedisi',
       'packing_to_expedisi',
       'date_to_expedisi',
       'time',
       'wo',
       'no_kontrak',
       'po',
       'created_at',
       'updated_at',
    ];

    public function all_size()
    {
        return $this->hasMany('App\Models\Production\Finishing\AllSize', 'id_packing_report');
    }

    public function packing_list()
    {
        return $this->belongsTo('App\Models\Production\Finishing\PackingList','id');
    }
}
