<?php

namespace App\Models\QC\SMQC;

use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    protected $connection = 'mysql_smqc';
    protected $table = 'report';
    protected $primaryKey = 'id';

    protected $fillable = [
        'qm',
        'buyer_id',
        'supplier',
        'color',
        'style',
        'date',
        'inspector',
        'far_id',
        'fir_id',
        'shade_id',
        'prc_app',
        'mrc_app',
        'qm_app',
        'notif_id',
        'standar_id',
        '_token',
        'branch',
        'branchdetail'
    ];

    public function far()
    {
        return $this->hasMany('App\Models\QC\SMQC\FAR', 'report_id');
    }
    public function fir()
    {
        return $this->hasOne('App\Models\QC\SMQC\FIR', 'report_id');
    }
    public function shadel()
    {
        return $this->hasOne('App\Models\QC\SMQC\Shade', 'report_id');
    }
    public function buyer()
    {
        return $this->hasOne('App\Models\QC\SMQC\SMQCListBuyer', 'id');
    }
    public function newfile()
    {
        return $this->hasMany('App\Models\QC\SMQC\NewFile', 'report_id');
    }
    public function lab()
    {
        return $this->hasOne('App\Models\QC\SMQC\Lab', 'firs_id');
    }
    public function shrinkage()
    {
        return $this->hasOne('App\Models\QC\SMQC\Shrinkage', 'firs_id');
    }
}
