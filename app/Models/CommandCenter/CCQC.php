<?php

namespace App\Models\CommandCenter;

use Illuminate\Database\Eloquent\Model;

class CCQC extends Model
{
    protected $table = 'cc_qc';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 
        'nama_branch',  
        'datasemua',
        'warna',
        'issues', 
        '_token'
    ];
}
