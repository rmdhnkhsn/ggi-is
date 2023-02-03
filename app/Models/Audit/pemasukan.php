<?php

namespace App\Models\Audit;

use Illuminate\Database\Eloquent\Model;

class pemasukan extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = 't_v56411ag';
    protected $primaryKey = 'F564111C_UKID';

    protected $fillable = [
        'F564111C_UKID', //UNIK KEY
        'F564111C_ITM', //item number
        'F564111C_MCU', //business unit (branch)
        'F564111C_DCT', //Dc.ty
        'F564111C_TRDJ', //Tr date
        'F564111C_LOTN', //Lot Num
        'F564111C_TRQT', //quantity
        'F564111C_UOM1', //UM
        'F564111C_DSC1', //Jenis Dok
        'F564111C_DSCRP', //no daftar
        'F564111C_DGL', //GL date


    ];
    }