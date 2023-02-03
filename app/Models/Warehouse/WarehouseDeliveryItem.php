<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Model;

class WarehouseDeliveryItem extends Model
{
    protected $connection = 'mysql_mkt_qr';
    protected $table = "warehouse_delivery_item";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id',
       'warehouse_delivery_id',
       'id_barcode',
       'id_check',
       'id_ukid',
       'no_kontrak',
       'item',
       'item2',
       'no_box',
       'buyer',
       'tanggal',
       'remark',
       'wo',//F4801_DOCO
       'doc_number',//F4111_DOC
       'doc_type',//F4111_DOC
       'doc_co',//F4111_KCO
       'transaction_date',//F4111_TRDJ
       'branch',//F4111_MCU
       'qty',//F4111_TRQT
       'qty_receipted',//F4111_TRQT
       'trans_uom',//F4111_TRUM
       'unit_cost',//F4111_UNCS
       'extended',//F4111_PAID
       'lot_serial',//F4111_LOTN
       'location',//F4111_LOCN
       'order_co',//F4111_KCOO
       'class_code',//F4111_GLPT
       'gl_date',//F4111_DGL
       'status',
       'status_delivery',
       'delivery_data',
       'kode_branch',
       'branchdetail',
       'kode_branch_rec',
       'branchdetail_rec',
       'created_at',
       'updated_at',
    ];

    public function delivery(){
        return $this->belongsTo(WarehouseDelivery::class,"warehouse_delivery_id");
    }

    public function itemledger(){
        return $this->belongsTo(\App\ItemLedger::class,"id_ukid","F4111_UKID");
    }
    public function pengeluarandok(){
        return $this->belongsTo(\App\Models\Mat_Doc\Subkon\pengeluaran::class,"id_ukid","F564111H_UKID"); 
    }


}
