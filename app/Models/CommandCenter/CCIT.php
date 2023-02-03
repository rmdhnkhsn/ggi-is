<?php

namespace App\Models\CommandCenter;

use Illuminate\Database\Eloquent\Model;

class CCIT extends Model
{
    protected $table = 'cc_it';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 
        'nama_branch',
        'branchdetail',  
        'datasemua',
        'warna',
        'issues', 
        
    ];
}
