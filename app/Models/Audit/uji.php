<?php

namespace App\Models\Audit;

use Illuminate\Database\Eloquent\Model;
//uji TF pengeluaran
class uji extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = 'v56411h3';
    protected $primaryKey = 'F564111H_UKID';

    protected $fillable = [
        'F564111H_UKID', //UNIK KEY
        'F564111H_ITM', //item number
        'F564111H_MCU', //business unit (branch)
        'F564111H_DCT', //Dc.ty
        'F564111H_TRDJ', //Tr date
        'F564111H_DGL', //GL date
        'F564111H_LOTN', //Lot Num
        'F564111H_TRQT', //quantity
        'F564111H_TRUM', //UM
        'F564111H_DSCRP', //no daftar
        'F564111H_DSC1', //Jenis Dok
        'F4111_GLPT', //GL class
        'F4111_ITM',
        'F4111_TRQT',
        'F4111_TRUM',
        'F4111_MCU',
        'F4111_TRDJ',
        'F4111_DGL',
        'F4111_USER',
        'F4111_DOCO',
        'F4111_UNCS',
        'F4111_PAID',
        'Uji_ITM',
        'Uji_QTY',
        'Uji_UOM',
        'Uji_BRANCH',
        'Uji_TGL_Trans_GL',
    ];
    }