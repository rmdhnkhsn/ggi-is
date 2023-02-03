<?php

namespace App\Models\Mat_Doc\Subkon;

use Illuminate\Database\Eloquent\Model;

class BarangJadi extends Model
{
    protected $connection = 'mysql_mat_doc';
    protected $table = 'barang_jadi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_no_kontrak',
        'kode_barang',
        'nama_barang',
        'satuan',
        'qty',
        'placing',
        'request_release',
        'retur'
    ];
    public function PjKk()
    {
        return $this->belongsTo('App\Models\Mat_Doc\Subkon\pj_kk','no_kontrak');
    }
    public function item_master(){
        return $this->belongsTo('App\ItemNumber', 'kode_barang','F4101_ITM');
    }
}
