<?php

namespace App\Models\Marketing\TrimCard;

use Illuminate\Database\Eloquent\Model;

class PartList extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "t_v3111a";
    protected $primaryKey = 'F3111_UKID';

    protected $fillable = [
        'F3111_DOCO', // no wo
        'F3111_CPIT' // item number
    ];

    public function material_master()
    {
        return $this->belongsTo('App\ItemNumber','F3111_CPIT','F4101_ITM');
    }
}
