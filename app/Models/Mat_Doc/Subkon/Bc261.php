<?php

namespace App\Models\Mat_Doc\Subkon;

use Illuminate\Database\Eloquent\Model;

class Bc261 extends Model
{
    protected $connection = 'mysql_mat_doc';
    protected $table = 'bc_261';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_no_kontrak',
        'id_material',
        'item_number',
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
        'bpb'

        
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
