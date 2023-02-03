<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemNumber extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "t_v4101b";
    protected $primaryKey = 'F4101_ITM';

    protected $fillable = [
        'F4101_DSC1', // Desc 1
        'F4101_DSC2',  // Desc 2
        'F4101_GLPT',  // Kategori (INAC, INFA, INPA)
        'F4101_SRTX', //search text
        'F4101_UOM1',
        'F4101_UOM2',
        'F4101_UOM3',
        'F4101_UOM4',
        'F4101_UOM6',
        'F4101_UOM8',
        'F4101_UOM9'
    ];
}
