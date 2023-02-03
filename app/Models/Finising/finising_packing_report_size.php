<?php

namespace App\Models\Finising;

use Illuminate\Database\Eloquent\Model;
class finising_packing_report_size extends Model
{
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
       'time',
       'wo',
       'no_kontrak',
       'po',
       'created_at',
       'updated_at',
    ];

    public function finishing_packing_all_size()
    {
        return $this->belongsTo(finishing_packing_all_size::class);
    }

    public function detail_finishing_packing_all_size(){
        return $this->hasMany('App\Models\Finising\finishing_packing_all_size','id_packing','id_packing')
                ->selectRaw("id_packing, nama_size, SUM(jumlah_size) as jumlah_size")
                ->groupBy(["nama_size", "id_packing"]);
    }

     public function finishing_packingList()
    {
        return $this->belongsTo('App\Models\Finising\finising_packingList', 'kode_ekspedisi');
    }
}
