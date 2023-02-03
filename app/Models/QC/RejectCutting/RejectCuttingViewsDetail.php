<?php 

namespace App\Models\QC\RejectCutting;

use Illuminate\Database\Eloquent\Model;

class RejectCuttingViewsDetail extends Model
{
    protected $connection = 'mysql_qc';
    protected $table = 'reject_cutting_views_detail_final_2';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_reject',
        't_v4801c_doco',
        'buyer',
        'tanggal',
        'style',
        'total_ratio',
        'total_reject',
        'color',
        'branch',
        'branchdetail',
        'ratio',  
        'size',  
        'reject',  
        'reason',
        'percentage',
        'qty_gelar',
        'created_at',
        'F4801_DOCO'  
    ];
}