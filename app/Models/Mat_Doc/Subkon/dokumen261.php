<?php

namespace App\Models\Mat_Doc\Subkon;

use Illuminate\Database\Eloquent\Model;

class dokumen261 extends Model
{
    protected $connection = 'mysql_mat_doc';
    protected $table = 'file_partial';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_no_kontrak',
        'no_daftar',
        'gbr1',
        'gbr2',
        'gbr3',
        'gbr4',
        'gbr5',
        'gbr6',
        'gbr7',
        'gbr8',
        'gbr9',
        'gbr10',
        'file1',
        'file2',
        'file3',
        'file4',
        'file5',
        'file6',
        
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
