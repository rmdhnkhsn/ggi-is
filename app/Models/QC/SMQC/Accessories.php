<?php

namespace App\Models\QC\SMQC;

use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    protected $connection = 'mysql_smqc';
    protected $table = 'accesories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'supplier', 
        'buyer', 
        'po', 
        'qc_qty' , 
        'style' , 
        'item' , 
        'qty_reject' , 
        'date' , 
        'order_quan' , 
        'standar_id' , 
        'file', 
        'action',
        'inspector',
        'detail_id', 
        'status_id',
        'md_app', 
        'md_name', 
        'prc_app', 
        'prc_name', 
        'chief_app', 
        'chief_name', 
        'notif_id', 
        'branch', 
        'branchdetail',
        '_token'
    ];

    public function detail()
    {
        return $this->hasOne('App\Models\QC\SMQC\AccDetail', 'acc_id');
    }
}
