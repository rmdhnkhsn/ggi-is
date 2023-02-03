<?php

namespace App\Models\Audit;

use Illuminate\Database\Eloquent\Model;

class tmpna extends Model
{
    protected $connection = 'mysql_audit';
    protected $table = 'tmp_na';
    protected $primaryKey = 'F4111_UKID';

    protected $fillable = [
        'F4111_UKID', //UNIK KEY
        'F4111_ITM', //item number
        'F4111_MCU', //business unit (branch)
        'F4111_DCT', //Dc.ty
        'F4111_TRDJ', //Tr date
        'F4111_DGL', //GL date
        'F4111_LOTN', //Lot Num
        'F4111_TRQT', //quantity
        'F4111_TRUM', //UM
        'F4111_GLPT', //GL class
        'F4111_USER',
        'F4111_DOCO',
        'F4111_UNCS',
        'F4111_PAID',
        'status_na',
        'konfirmasi1',
        'konfirmasi2',
        'konfirmasi3',
    ];
    }