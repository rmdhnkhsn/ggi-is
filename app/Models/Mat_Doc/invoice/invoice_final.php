<?php

namespace App\Models\Mat_Doc\invoice;

use Illuminate\Database\Eloquent\Model;

class invoice_final extends Model
{
    protected $connection = 'mysql_mkt_qr';
    protected $table = 'invoice_final';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_invoice_detail',
        'id_detail',
        'po',
        'wo',
        'item',
        'style',
        'contract',
        'descOfGood',
        'hsCode',
        'qty',
        'unit',
        'unitPrice',
        'amount',
        'totalInvoice',
        'totalPack',
        'size',
        'terbilang',
        'docket_no',
        'destination_no',
        'kimball_no',
        'color',
        'carton_qty',
        'no_of_units',
        'no_of_set',
        'cm',
        'fabrics',
        'trims',
        'lp',
        'sub',
        'total_ctn',
        'no_kontainer'
    ];
   
}
