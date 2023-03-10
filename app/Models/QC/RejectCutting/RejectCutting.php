<?php 

namespace App\Models\QC\RejectCutting;

use Illuminate\Database\Eloquent\Model;

class RejectCutting extends Model
{
    protected $connection = 'mysql_qc';
    protected $table = 'reject_cutting';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        't_v4801c_doco',
        'buyer',
        'style',
        'meja',
        'no_urut',
        'no_ikat',
        'color',
        'tanggal',
        'total_ratio',
        'total_reject',
        'qty_gelar',
        'qty_check',
        'qty_table',
        'status',
        'remark',       
        'percentage',
        'qty_reject',
        'f_misprint',
        'f_cacat_tenun',
        'f_bolong',
        'f_kotor',
        'f_lain_lain',
        'c_pinggir_kain',
        'c_tidak_pas_pola',
        'c_bolong',
        'c_kotor',
        'c_lain_lain',
        'ratio_S',
        'ratio_M',
        'ratio_L',
        'ratio_LL',
        'ratio_XL',
        'ratio_F',
        'ratio_XS',
        'ratio_XXL',
        'ratio_O',
        'ratio_lain',
        'reject_S',
        'reject_M',
        'reject_L',
        'reject_LL',
        'reject_XL',
        'reject_F',
        'reject_XS',
        'reject_XXL',
        'reject_O',
        'reject_lain',
        'ratio_80',
        'ratio_90',
        'ratio_100',
        'ratio_110',
        'ratio_120',
        'ratio_130',
        'ratio_140',
        'ratio_150',
        'ratio_160',
        'ratio_lain',
        'reject_130',
        'reject_140',
        'reject_150',
        'reject_160',
        'reject_110',
        'reject_120',
        'reject_100',
        'reject_90',
        'reject_80',
        'reject_lain',
        'branch',
        'branchdetail',
        'created_at',
        'updated_at'
    ];
}