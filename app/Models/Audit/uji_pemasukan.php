<?php

namespace App\Models\Audit;

use Illuminate\Database\Eloquent\Model;

class uji_pemasukan extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = 'v56411agc';
    protected $primaryKey = 'F564111C_UKID';

    protected $fillable = [
        'F564111C_UKID', //UNIK KEY
        'F564111C_ITM', //item number
        'F564111C_MCU', //business unit (branch)
        'F564111C_DCT', //Dc.ty
        'F564111C_TRDJ', //Tr date
        'F564111C_DGL', //GL date
        'F564111C_LOTN', //Lot Num
        'F564111C_TRQT', //quantity
        'F564111C_TRUM', //UM
        'F564111C_DSCRP', //no daftar
        'F564111C_DSC1', //Jenis Dok
        'F4111_GLPT', //GL class
        'F4111_DCT',
        'F4111_LOTN',
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
        'Uji_Tanggal_Trans_GL',
    ];
    }