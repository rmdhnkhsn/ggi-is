<?php

namespace App\Models\Mat_Doc\Subkon;

use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    protected $connection = 'mysql_mat_doc';
    protected $table = 'material';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_no_kontrak',
        'hs_code',
        'item_number',
        'deskripsi',
        'kebutuhan',
        'satuan',
        'consumption',
        'nw',
        'gw',
        'doc_type',
        'bc_number',
        'doc_date',
        'pos',
        'us_price',
        'idr_price',
        'us',
        'idr',
        'persen',
        'bm',
        'bpt',
        'btm',
        'ppn',
        'pph',
        'total',
        'gl_class',
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
