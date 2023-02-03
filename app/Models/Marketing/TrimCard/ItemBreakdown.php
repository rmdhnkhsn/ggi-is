<?php

namespace App\Models\Marketing\TrimCard;

use Illuminate\Database\Eloquent\Model;

class ItemBreakdown extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "t_v4101b";
    protected $primaryKey = 'F4101_ITM';

    protected $fillable = [
        'F4101_DSC1', // Desc 1
        'F4101_DSC2', // Desc 2 
        'F4101_SRTX'
    ];
}
