<?php

namespace App\Models\CommandCenter;

use Illuminate\Database\Eloquent\Model;

class CCIT_grafik extends Model
{
    protected $table = 'cc_it_grafik';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 
        'kategori',
        'inisial',
        'bln_lalu',  
        'bln_sekarang',  
    ];
}
