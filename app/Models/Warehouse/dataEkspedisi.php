<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Model;

class dataEkspedisi extends Model
{
    protected $connection = 'mysql_mkt_qr';
    protected $table = "data_ekspedisi";
    protected $primaryKey = 'id';

    protected $fillable = [
            'id',
            'invoice_no',
            'invoice_desc',
            'container_no',
            'seal_no',
            'tanggal',

        ];

}