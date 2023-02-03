<?php

namespace App\Models\QC\SMQC;

use Illuminate\Database\Eloquent\Model;

class FAR extends Model
{
    protected $connection = 'mysql_smqc';
    protected $table = 'fars';
    protected $primaryKey = 'id';

    protected $fillable = [
        'report_id',
        'roll_no',
        'number',
        'lot',
        'ac_beg',
        'ac_mid',
        'ac_end',
        'on_roll',
        'actual',
        'tot',
        'adj',
        'acc',
        'reject',
        'remark',
        'created_at',
        'updated_at'
    ];

    public function fdetail()
    {
        return $this->hasMany('App\Models\QC\SMQC\FDetail', 'fars_id');
    }
    
    public function report()
    {
        return $this->belongsTo('App\Models\QC\SMQC\Fabric','id');
    }

  
}
