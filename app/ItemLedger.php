<?php

namespace App;

use App\Models\Warehouse\WarehouseDeliveryItem;
use Illuminate\Database\Eloquent\Model;

class ItemLedger extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "t_v4111b";
    protected $primaryKey = 'F4111_UKID';

    protected $fillable = [
    //    'F4111_UKID',//UNIKEY ID
    //    'F4111_MCU',//BISNIS UNIT/BRANCH
    //    'F4111_DOC',//DOCUMENT NUMBER
    //    'F4111_DOC',//DOCUMENT TYPE
    //    'F4111_TRDJ',//ORDER DATE /TRANSACTION DATE
    //    'F4111_LITM',
    //    'F4111_TRQT',//TRANSCATION QTY
    //    'F4111_UNCS',//UNIT COST
    //    'F4111_PAID',//EXTENDET COST
    //    'F4111_TRUM',//TRANSACTION UoM
    //    'F4111_KCO',//DOC CO
    //    'F4111_DOCO',//ORDER NUMBER (WO)
    //    'F4111_KCOO',//ORDER CO
    //    'F4111_GLPT',//CLASS CODE
    //    'F4111_DGL',//GL DATE
    //    'F4111_LOCN',//LOCATION
    //    'F4111_LOTN',//LOT/SERIAL
    ];

    public function item_master(){
        return $this->belongsTo(ItemNumber::class,"F4111_ITM","F4101_ITM");
    }
    public function addressbook(){
        return $this->belongsTo(ListBuyer::class,"F4111_AN8","F0101_AN8");
    }
    public function subkon_o4(){
        return $this->hasMany(WarehouseDeliveryItem::class,"id_ukid","F4111_UKID"); 
    }
    public function sales(){
        return $this->hasMany(SalesOrder::class,"F4211_DOCO","F4111_DOCO")
                ->where('F4211_DCTO',$this->F4111_DCTO)
                ->where('F4211_MCU',$this->F4111_MCU)
                ->where('F4211_LOTN',$this->F4111_LOTN);
    }
    // public function sales(){
    //     return $this->belongsTo(SalesOrder::class,"F4111_DOCO","F4211_DOCO")
    //             ->where('F4211_DCTO',$this->F4111_DCTO)
    //             ->where('F4211_MCU',$this->F4111_MCU)
    //             ->where('F4211_LOTN',$this->F4111_LOTN);
    // }
    public function subkon_o4_cek(){
        $exists=false;
        if ($this->subkon_o4->first()) {
            $exists=true;
        }
        return $exists;
    }
    public function mat_cost_wo($wo){
        $cost=0;
        $mat=$this->selectRaw("coalesce(sum(F4111_PAID),0) as total_cost")->where('F4111_DOCO',$wo)->where('F4111_DCT','IM')->get();
        foreach ($mat as $k => $v) {
            $cost+=$v->total_cost;
        }
        return $cost;
    }
}
