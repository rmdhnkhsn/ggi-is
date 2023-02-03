<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $connection = 'mysql';
    protected $table = 'branch';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'kode_branch',  
        'branchdetail',  
        'nama_branch',
        'nilai',
        'issues',
        'kode_jde', 
        'kode_sewing', 
        'created_at', 
        'updated_at'  
    ];
}
