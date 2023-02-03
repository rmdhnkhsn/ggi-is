<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class defectSubMenu extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = 'final_submenu';
    public $timestamps = false;

    protected $fillable = [
        'id', //primaryKey / PK
        'nama_submenu',
        'id_menu',
        'critical',
        'major',
        'minor',
        'hasil',
        'comment'
    ];  

     public function defectMenu()
    {
        return $this->belongsTo(
            defectMenu::class, 
            'id_menu' //nama field foreign key nya
        );
    }

    public function final_inspection_defects()
    {
        return $this->hasMany(
            FinalInspectionDefect::class,
            'final_submenu_id',
            'id'
        );
    }
}
