<?php

namespace App\Models\Mat_Doc\Subkon;

use Illuminate\Database\Eloquent\Model;

class pengeluaran extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = 't_v56411h3';
    protected $primaryKey = 'F564111C_UKID';

    protected $fillable = [
        'F564111H_UKID', //UNIK KEY
        'F564111H_ITM', //item number
        'F564111H_DSC2', //no kontrak
        'F564111H_DOC1', //no Bpb


        // 'F564111C_MCU', //business unit (branch)
        // 'F564111C_DCT', //Dc.ty
        // 'F564111C_TRDJ', //Tr date
        // 'F564111C_LOTN', //Lot Num
        // 'F564111C_TRQT', //quantity
        // 'F564111C_UOM1', //UM
        // 'F564111C_DSC1', //Jenis Dok
        // 'F564111C_DSCRP', //no daftar
        // 'F564111C_DGL', //GL date


    ];

    public function item_master(){
        return $this->belongsTo('App\ItemNumber', 'F564111H_ITM','F4101_ITM');
    }
}