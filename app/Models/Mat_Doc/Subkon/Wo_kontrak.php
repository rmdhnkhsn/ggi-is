<?php

namespace App\Models\Mat_Doc\Subkon;

use Illuminate\Database\Eloquent\Model;

class Wo_kontrak extends Model
{
    protected $connection = 'mysql_mat_doc';
    protected $table = 'v_kontrak_wo';
    // protected $primaryKey = 'id';

    protected $fillable = [
        'no_kontrak',
        'F560021_DOC',
        'jatuh_tempo',
        'tgl_kontrak',
        'supplier_branch',
        'supplier',
        'nama_planner',



        
    ];

}
