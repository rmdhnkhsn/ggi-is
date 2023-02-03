<?php

namespace App\Models\PPIC\IssueMR;

use Illuminate\Database\Eloquent\Model;

class RequestIssueMR extends Model
{
    protected $connection = 'mysql_ppic';
    protected $table = 'issue_mr';
    protected $primaryKey = 'id';

    protected $fillable = [
        'type',
        'no_wo',
        'no_or',
        'no_contract',
        'placing',
        'line',
        'branch',
        'allowance',
        'category',
        'item_infa_inin',
        'qty_infa_inin',
        'uom_infa_inin',
        'request_date',
        'delivery_date',
        'status',
        'item_number',
        'item_description',
        'qty_issued',
        'uom_issued',
        'location',
        'lot_number',
        'download',
        'status_pengerjaan',
        'ready_to_issue',
        'remark',
        '_token',
        'export_by_nik',
        'export_by_name',
        'export_at',
        'created_by',
        'created_name',
        'created_branch',
        'created_branchdetail',
        'cerated_at',
        'updated_at',
        //ily
    ];
}
