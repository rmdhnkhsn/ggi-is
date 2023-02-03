<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractWO extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "t_v560021";
    // protected $primaryKey = 'F4101_ITM';

    // protected $fillable = [
    //     'F4101_DSC1', // Desc 1
    //     'F4101_DSC2',  // Desc 2
    //     'F4101_GLPT',  // Kategori (INAC, INFA, INPA)
    //     'F4101_SRTX', //search text
    // ];
}
