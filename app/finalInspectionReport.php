<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class finalInspectionReport extends Model
{  
    protected $connection = 'mysql_jdeapi';
    protected $table = "qc_final_inspection_report";
    public $timestamps = true;

     protected $fillable = [
        't_v4801c_doco',
        'mesurement',
        'remark',
        'branch',
        'branchdetail',
        'tanggal',
        'F0101_DC',
        'foto'
    ];




}