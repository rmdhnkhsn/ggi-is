<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class finalInspectionView extends Model
{  
    protected $connection = 'mysql_jdeapi';
    protected $table = "qc_final_inspection_view";
    public $timestamps = true;

     protected $fillable = [
        'F4801_DOCO',
        'F4801_AN8', 
        'F4801_DL01', 
        'F4801_VR01', 
        'F4801_DRQJ', 
        'F4801_STRX', 
        'name_inspector', 
        'waktu_inspector', 
        'finish_inspector', 
        'start_inspection',
        'inspection_level',
        'inspection_method',
        'aql',
        'inspected_qty',
        'sample',
        'mesurement',
        'remark',
        'branch',
        'branchdetail',
        'tanggal',
        'F0101_DC',
        'hasil_validate',
        'hasil_defect',
        'foto'
    ];




}