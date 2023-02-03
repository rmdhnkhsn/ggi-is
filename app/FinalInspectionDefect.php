<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalInspectionDefect extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "final_inspection_defects";
    public $timestamps = false;

    protected $fillable = [
        'final_inspection_id',
        'menu_final_id', 
        'final_submenu_id',
        'critical',
        'major',
        'minor',
        'message',
        'foto_hole',
        'foto_major',
        'foto_minor'
    ];

    // public function t_v4801c()
    // {
    //     return $this->belongsTo(
    //         Inspection::class,
    //         't_v4801c_id',
    //         'F4801_DOCO'
    //     );
    // }

    public function menu()
    {
        return $this->belongsTo(
            defectMenu::class,
            'menu_final_id'
        );
    }

    public function subMenu()
    {
        return $this->belongsTo(
            defectSubMenu::class,
            'final_submenu_id'
        );
    }
}
