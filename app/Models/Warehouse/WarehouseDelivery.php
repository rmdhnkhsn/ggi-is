<?php

namespace App\Models\Warehouse;

use App\ItemLedger;
use App\AddressBook;
use Illuminate\Database\Eloquent\Model;

class WarehouseDelivery extends Model
{
    protected $connection = 'mysql_mkt_qr';
    protected $table = "warehouse_delivery";
    protected $primaryKey = 'id';

    // STATUS :
    // 1. PICK
    // 2. ONPROCESS
    // 3. ANOMALI
    // 4. FINISH

    protected $fillable = [
       'id',
       'barcode',
       'jenis_bc',
       'bpb',
       'from_branch',
       'from_branchdetail',
       'to_desc',
       'to_branch',
       'to_branchdetail',
       'tanggal_trans',
       'status',
       'remark',
       'status_barang',
       'reverse',
       'surat_jalan',
       'jumlah_sj',
       'keterangan',
       'in_gudang',
       'out_gudang',
       'in_ekspedisi',
       'out_ekspedisi',
       'in_dokumen',
       'finish',
       'nik_originator',
       'created_at',
       'updated_at',
    ];

    public function items(){
        return $this->hasMany(WarehouseDeliveryItem::class,'warehouse_delivery_id');
    }

    public function list_subkon(){
        $subkon='';
        foreach($this->items as $item){
            if (str_contains($subkon,$item->no_kontrak)==false) {
                if ($subkon!=='') {
                    $subkon.=',';
                }
                $subkon.=$item->no_kontrak;
            }
        }
        return $subkon;
    }
    public function list_bpb(){
        $bpb='';
        foreach($this->items as $item){
            if($item->pengeluarandok!==null) {
                if (str_contains($bpb,$item->pengeluarandok->F564111H_DOC1)==false) {
                    if ($bpb!=='') {
                        $bpb.=',';
                    }
                    $bpb.=$item->pengeluarandok->F564111H_DOC1;
                }
            }
        }
        return $bpb;
    }
    public function total_pack(){
        return $this->items->groupBy('no_box')->count();
    }
    public function total_item_picked(){
        $total=0;
        foreach($this->items->groupBy('no_box') as $item){
            $total+=1;
        }
        return $total;
    }
    public function total_item_receipted(){
        $total=0;
        foreach($this->items->whereNotNull('qty_receipted')->groupBy('no_box') as $item){
            $total+=1;
        }
        return $total;
    }
    public function total_item_anomali(){
        $total=0;
        foreach($this->items->whereNotNull('remark')->groupBy('no_box') as $item){
            $total+=1;
        }
        return $total;
    }
    public function list_glcat(){
        $glcat='';
        foreach($this->items as $item){
            $ledger=ItemLedger::select('F4111_GLPT')->where('F4111_UKID',$item->id_ukid)->first();
            if ($ledger) {
                if (str_contains($glcat,$ledger->F4111_GLPT)==false) {
                    if ($glcat!=='') {
                        $glcat.=',';
                    }
                    $glcat.=$ledger->F4111_GLPT;
                }
            }
        }
        return $glcat;
    }

    public function addressbook($kd){
        $ab=AddressBook::select('F0101_ALPH')->where('F0101_AN8',$kd)->first();
        if ($ab) {
            $kd=$ab->F0101_ALPH;
        }
        return $kd;
    }
}
