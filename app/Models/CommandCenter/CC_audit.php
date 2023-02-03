<?php

namespace App\Models\CommandCenter;

use Illuminate\Database\Eloquent\Model;

class CC_audit extends Model
{
    protected $table = 'cc_audit';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 
        'nama_branch',
        'branchdetail',  
        'critical',
        'anomali',
        'issues',
        'warna', 
        
    ];
}
