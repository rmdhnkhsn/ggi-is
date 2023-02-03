<?php 

namespace App\Models\QC\FactoryAudit;


use Illuminate\Database\Eloquent\Model;

class factoryAudit extends Model
{
    protected $connection = 'mysql_qc';
    protected $table = 'fa_inputan';
    protected $primaryKey = 'id';

    protected $fillable = [
       'id',
       't_v4801c_doco',
       'buyer',
       'style',
       'order_qty',
       'status',
       'revisian',
       'po_number',
       'article',
       'color',
       'auditor_name',
       'tanggal',
       'aql',
       'start_time',
       'proses_time',
       'finish_time',
       'photo_1',
       'photo_2',
       'photo_3',
       'photo_4',
       'remark',
       'qty_reject',
       'article',
       'color',
       'auditor_name',
       'tanggal',
       'total_carton',
       'total_reject',
       'sample_carton',
       'sample_pcs',
       'factory',
       'destination',
       'total_reject_pcs',
       'total_reject_carton',
       'created_at',
       'updated_at',
       'signature',
       'signature_spv',
       'start_audit',
       'end_audit',
       'edit_audit',
       'process_edit',
       'process_audit',
       'qty_pack',
       'qty_carton',
       'tanggal_fa',
       'no_carton',
       'item',
       'qty_order2',
    ];
   
}