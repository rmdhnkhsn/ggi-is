<?php

namespace App\Models\Production\Finishing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackingList extends Model
{
    use HasFactory;

    protected $connection = 'mysql_mkt_qr';
    protected $table = "finishing_packing";
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'rekap_detail_id',
        'wo',
        'wo_eksppedisi',
        'buyer',
        'style',
        'po',
        'no_kontrak',
        'po',
        'tanggal',
        'qty_order',
        'qty',
        'qty_percent',
        'qty_satuan',
        'qty_balance',
        'or_number',
        'warehouse',
        'agent',
        'qty2',
        'qty_percent2',
        'qty_satuan2',
        'qty_balance2',
        'or_number2',
        'warehouse2',
        'agent2',
        'off_ctn',
        'branch',
        'branchdetail',
        'action',
        'packing_to_expedisi',
        'date_to_expedisi',
        'id_ekspedisi',
        'keterangan',
        'judul',
        'status',
        'kode_ekspedisi',
        'no_surat_jalan',
        'no_surat_jalan2',
        'no_kontainer',
        'no_kontainer',
        'no_seal',
        'no_seal2',
        'jenis_doct',
        'no_doct',
        'invoice',
        'color_code',
        'tanggal_surat',
        'shipment_date',
        'tanggal2',
        'placement',
        'tujuan',
        'created_by',
        'status_invoice',
        'created_at',
        'updated_at',
    ];

    public function size()
    {
        return $this->hasMany('App\Models\Production\Finishing\PackingSize', 'id_packing');
    }

    public function semua_ukuran()
    {
        return $this->hasMany('App\Models\Production\Finishing\AllSize', 'id_packing_size');
    }
}
