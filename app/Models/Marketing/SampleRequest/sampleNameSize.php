<?php

namespace App\Models\Marketing\SampleRequest;

use Illuminate\Database\Eloquent\Model;

class sampleNameSize extends Model
{
    protected $connection = 'mysql_mkt_qr';
    protected $table = "sample_name_size";
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 
        'id_sample_data',  
        'name_size',
        'qty_size',
        'created_at',
        'updated_at',
    ];
}
