<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkOrderJDE extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "t_v4801c";
    protected $primaryKey = 'F4801_DOCO';
    public $incrementing = false;
    
    // protected $fillable = [
    //     'F4801_DOCO', // NO WO (primary key)
    //     'F4801_AITM',  // second item 
    //     'F4801_RORN',
    //     'F4801_VR01', // No po
    //     'F4801_AN8', // Primary Key dari list buyer (t_v0101e)
    //     'F4801T_LINE', 
    //     'F4801_STRT', //tanggal
    //     'F4801_DL01',  // item description
    //     'F4801_UORG',  // order quantity
    //     'F4801_SOQS',  // quantity shipped
    //     'F4801_DL01',  // no_so
    // ];

    public function sales(){
        return $this->belongsTo(SalesOrder::class,"F4801_RORN","F4211_DOCO")
                ->where('F4211_DCTO',$this->F4801_RCTO)
                ->where('F4211_MCU',$this->F4801_MCU)
                ->where('F4211_LOTN',$this->F4801_DOCO);
    }

    public function breakdown(){
        return $this->hasMany('App\WOBreakDown', 'F560020_DOCO','F4801_DOCO');
    }

}
