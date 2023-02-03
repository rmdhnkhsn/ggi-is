<?php

namespace App\Models\Audit;

use Illuminate\Database\Eloquent\Model;

class pengeluaran extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = 't_v56411h3';
    protected $primaryKey = 'F564111H_UKID';

    protected $fillable = [
        'F564111H_UKID', //UNIK KEY
        'F564111H_ITM', //item number
        'F564111H_MCU', //business unit (branch)
        // 'F564111H_DCT', //Dc.ty
        // 'F564111H_TRDJ', //Tr date
        'F564111H_LOTN', //Lot Num
        'F564111H_TRQT', //quantity
        'F564111H_UOM1', //UM
        'F564111H_DSC1', //Jenis Dok
        'F564111H_DSCRP', //no daftar
        'F564111H_DGL', //GL date
        'F564111H_DOC',
        'F564111H_DOCO',
        'F564111H_DCTO',
        'F564111H_AN8',
        'F564111H_UNCS',
        'F564111H_PAID',
        'F564111H_DSC2',


    ];
    }