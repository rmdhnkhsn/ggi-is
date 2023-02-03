<?php

namespace App\Models\Mat_Doc\invoice;

use Illuminate\Database\Eloquent\Model;

class consignee extends Model
{
    protected $connection = 'mysql_mkt_qr';
    protected $table = 'invoice_consignee';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'buyer',
        'buyer_detail',
        'address',
        'country',
        'telp',
       
    ];
   
}
