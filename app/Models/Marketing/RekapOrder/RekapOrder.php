<?php

namespace App\Models\Marketing\RekapOrder;

use Illuminate\Database\Eloquent\Model;

class RekapOrder extends Model
{
    protected $connection = 'mysql_mkt';
    protected $table = 'master_order';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'no_po',
        'buyer',
        'shipment_to',
        'date',
        'ex_fact',
        'standar',
        'inhand_or_projection',
        'is_detail_exist',
        'is_size_exist',
        'file_measurement',
        'file1',
        'file2',
        'file3',
        'file4',
        'file5',
        'note1',
        '_token',
        'created_by',
        'branch',
        'branchdetail',
        'worksheet_date'
    ];

    public function rekap_size()
    {
        return $this->hasOne('App\Models\Marketing\RekapOrder\RekapSize', 'master_order_id');
    }

    public function rekap_detail()
    {
        return $this->hasMany('App\Models\Marketing\RekapOrder\RekapDetail', 'master_order_id');
    }

    public function rekap_breakdown()
    {
        return $this->hasMany('App\Models\Marketing\RekapOrder\RekapBreakdown', 'master_order_id');
    }

    public function general_identity()
    {
        return $this->hasOne('App\Models\Marketing\Worksheet\WorksheetGeneral', 'master_id');
    }

    public function material_sewing()
    {
        return $this->hasMany('App\Models\Marketing\Worksheet\MaterialSewing', 'master_id');
    }

    public function material_fabric()
    {
        return $this->hasMany('App\Models\Marketing\Worksheet\MaterialFabric', 'master_id');
    }

    public function material_sewing_inac()
    {
        return $this->hasMany('App\Models\Marketing\Worksheet\MaterialSewingInac', 'master_id');
    }

    public function material_sewing_packaging()
    {
        return $this->hasMany('App\Models\Marketing\Worksheet\MaterialSewingPackaging', 'master_id');
    }

    public function material_sewing_detail()
    {
        return $this->hasOne('App\Models\Marketing\Worksheet\MaterialSewingDetail', 'master_id');
    }
    
    public function attention_cutting()
    {
        return $this->hasOne('App\Models\Marketing\Worksheet\MaterialFabricAttentionCutting', 'master_id');
    }

    public function measurement()
    {
        return $this->hasMany('App\Models\Marketing\Worksheet\Measurement', 'master_id');
    }

    public function packing()
    {
        return $this->hasMany('App\Models\Marketing\Worksheet\Packing', 'master_id');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Marketing\Worksheet\Comment', 'master_id');
    }

    public function general_po()
    {
        return $this->hasMany('App\Models\Marketing\Worksheet\GeneralPO', 'master_id');
    }

    public function worksheet_copy()
    {
        return $this->hasOne('App\Models\Marketing\Worksheet\WorksheetCopy', 'master_id');
    }

    public function buyerjde()
    {
        return $this->hasOne('App\ListBuyer', 'F0101_AN8', 'buyer');
    }
}
