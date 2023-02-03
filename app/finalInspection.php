<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class finalInspection extends Model
{  
    protected $connection = 'mysql_jdeapi';
    protected $table = "final_inspection";
    public $timestamps = true;


    protected $fillable = [
        'id', 
        't_v4801c_doco',
        'name_inspector', 
        'start_inspector',  
        'waktu_inspector',  
        'finish_inspector',  
        'pattern', 
        'size_set',  
        'pp', 
        'print', 
        'shell',  
        'lot',  
        'lining',  
        'interlining',
        'thread',
        'size_label',
        'content_label',
        'supplier_label',
        'co_label',
        'zip',
        'shade_lot',
        'col',
        'whisker',
        'tinting',
        'hand_sand',
        'grinding',
        'hang',
        'waist_tag',
        'joker',
        'poly_bag',
        'ticket',
        'belt_tag',
        'spare_yarn',
        'hanger',
        'shipping',
        'fabric',
        'foto',
        'packed_carton',
        'packed_into_carton',
        'silica_gel',
        'sampling_carton',
        'packing_list',
        'hang_tag',
        'shipping_mark',
        'polybag_packed',
        'main_label',
        'front_side',
        'back_side',
        'image1',
        'product_view',
        'shading_view',
        'compare_sample',
        'measurement1',
        'measurement2',
        'measurement3',
        'measurement4',
        'measurement5',
        'branch',
        'tanggal',
        'branchdetail',
        'hasil_validate',
        'hasil_defect',
        'fabric_validate',
        'cutting',
        'finishing',
        'packing',
        'nama_branch'
    ];

  
    public function final_inspection_defects()
    {
        return $this->hasMany(
            FinalInspectionDefect::class,
            'final_inspection_id',
            'id'
        );
    }
}
