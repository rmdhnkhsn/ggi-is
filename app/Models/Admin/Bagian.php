<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    protected $table = 'allfactory';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'kode_bagian',  
        'nama_bagian',  
        'nilai',
        'warna',
        'issues', 
        'poor',
        'good', 
        'critical',
        '_token'
    ];
}
