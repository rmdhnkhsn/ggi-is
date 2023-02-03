<?php

namespace App\Models\QC\SMQC;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $connection = 'mysql_smqc';
    protected $table = 'lab';
    protected $primaryKey = 'id';

    protected $fillable = [
        'firs_id',
        'shading_t',
        'shading_l',
        'shading_w',
        'shading_rat',
        'shrin_t',
        'shrin_l1',
        'shrin_l2',
        'shrin_lper',
        'shrin_w1',
        'shrin_w2',
        'shrin_wper',
        'shrin_rat',  
        'torque_t',
        'torque_b',
        'torque_s',
        'torque_man',
        'torque_rat',  
        'twisting_t',
        'twisting_man',
        'twisting_rat',  
        'color_t',
        'color_ace',
        'color_poly',
        'color_cot',
        'color_acry',
        'color_ny',
        'color_woll',
        'color_rat',  
        'fast_t',
        'fast_man',
        'fast_rat',
        'note'
    ];

    public function report()
    {
        return $this->belongsTo('App\Models\QC\SMQC\Fabric','id');
    }
}
