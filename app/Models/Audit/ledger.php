<?php

namespace App\Models\Audit;

use Illuminate\Database\Eloquent\Model;

class ledger extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = 't_v4111b';
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
        
    ];
    }