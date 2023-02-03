<?php

namespace App\Models\Audit;

use Illuminate\Database\Eloquent\Model;

class ujina extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = 'v_ladger_iv_join';
    protected $primaryKey = 'F4111_UKID';

    protected $fillable = [
        'F4111_UKID', //UNIK KEY
        'F564111C_UKID', //UNIK KEY
        'F4111_ITM', //item number
        'F4111_MCU', //business unit (branch)
        'F4111_DCT', //Dc.ty
        'F4111_TRDJ', //Tr date
        'F4111_DGL', //GL date
        'F4111_LOTN', //Lot Num
        'F4111_TRQT', //quantity
        'F4111_TRUM', //UM
        'F4111_GLPT', //GL class
        'F4111_TREX',
        'F4111_USER',
        'F4111_DOCO',
        'F4111_UNCS',
        'F4111_PAID',
    ];
    }