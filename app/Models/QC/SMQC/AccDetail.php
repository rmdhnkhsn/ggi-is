<?php

namespace App\Models\QC\SMQC;

use Illuminate\Database\Eloquent\Model;

class AccDetail extends Model
{
    protected $connection = 'mysql_smqc';
    protected $table = 'accdetail';
    protected $primaryKey = 'id';

    protected $fillable = [
        'acc_id',
        'q_ci', 
        'q_dc', 
        'q_od', 
        'q_remark', 
        'c_ci', 
        'c_dc', 
        'c_od', 
        'c_remark', 
        's_ci', 
        's_dc', 
        's_od', 
        's_remark', 
        'a_ci', 
        'a_dc', 
        'a_od', 
        'a_remark', 
        'f_ci', 
        'f_dc', 
        'f_od', 
        'f_remark', 
        'd_ci', 
        'd_dc', 
        'd_od', 
        'd_remark', 
        'di_ci', 
        'di_dc', 
        'di_od', 
        'di_remark', 
        'b_ci', 
        'b_dc', 
        'b_od', 
        'b_remark', 
        'm_ci', 
        'm_dc', 
        'm_od', 
        'm_remark', 
        'file'
    ];

    public function accessories()
    {
        return $this->belongsTo('App\Models\QC\SMQC\Accessories','id');
    }
}
