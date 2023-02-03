<?php

namespace App\Models\Mat_Doc\Subkon;

use Illuminate\Database\Eloquent\Model;

class Bc262 extends Model
{
    protected $connection = 'mysql_mat_doc';
    protected $table = 'bc_262';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_no_kontrak',
        'id_barangjadi',
        'kode_barang',
        'no_aju',
        'dok_aju',
        'no_daftar',
        'tanggal',
        'bm',
        'ppn',
        'pph',
        'total_jaminan',
        'qty',
        'gl_class',
        'no_wo',
        'id_no_aju',
        'id_sj', // db server belum ada
        'no_surat_jalan', // db server belum ada
        'no_packing_list', // db server belum ada
        'tanggal_sj' // db server belum ada
        
    ];

    public function PjKk()
    {
        return $this->belongsTo('App\Models\Mat_Doc\Subkon\pj_kk','no_kontrak');
    }
    public function item_master(){
        return $this->belongsTo('App\ItemNumber', 'kode_barang','F4101_ITM');
    }
    // Kaya nya gak bisa teh soalnya harus bikin pengajuan segala macam, kan 1 month notice nya 
    // public function Material_PjKk()
    // {
    //     return $this->belongsTo(
    //         pj_kk::class,
    //         'no_kontrak'
    //     );
    // }
}
