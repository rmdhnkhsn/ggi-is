<?php

namespace App\Models\Mat_Doc\Subkon;

use Illuminate\Database\Eloquent\Model;

class Aju261 extends Model
{
    protected $connection = 'mysql_mat_doc';
    protected $table = 'aju_261';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_no_kontrak',
        'no_daftar',
        'bpb',
        'tgl_transaksi',

        
    ];

    public function PjKk()
    {
        return $this->belongsTo('App\Models\Mat_Doc\Subkon\pj_kk','no_kontrak');
    }

    // public function Material_PjKk()
    // {
    //     return $this->belongsTo(
    //         pj_kk::class,
    //         'no_kontrak'
    //     );
    // }
}
