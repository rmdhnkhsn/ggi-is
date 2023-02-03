<?php

namespace App\Models\Mat_Doc\invoice;

use Illuminate\Database\Eloquent\Model;

class beneficary extends Model
{
    protected $connection = 'mysql_mkt_qr';
    protected $table = 'invoice_beneficary';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'buyer',
        'buyer_name',
        'buyer_detail',
        'address',
        'country',
        'telp',   
        'telp_bene',
    ];
   
}
