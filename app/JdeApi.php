<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JdeApi extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "t_v4801c";
    protected $primaryKey = 'F4801_DOCO';

    protected $fillable = [
        'F4801_DOCO', // NO WO
        'F4801_AITM',  // second item 
        'F4801_DL01',  // item description
        'F4801_UORG',  // order quantity
        'F4801_SOQS',  // quantity shipped
        'F4801_DL01',  // no_so
        'F4801_AN8',  // buyer
        'F4801_VR01',  // no po
        'F4801_ITM',  // item number
        'F4801_SRST',  // Status

    ];

    public function wobreakdown()
    {
        return $this->hasMany('App\WOBreakDown', 'F560020_DOCO');
    }

    public function wo_detail()
    {
        return $this->hasOne('App\Models\Cutting\Product_Costing\CuttingPPIC', 'no_wo');
    }

    public function ppic_component()
    {
        return $this->hasMany('App\Models\Cutting\Product_Costing\CuttingComponentPPIC', 'no_wo');
    }

}
