<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class defectMenu extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = 'menu_final';

    protected $fillable = [
        'id',
        'nama_menu'
    ];

    public function defectSubMenu()
    {
        // return $this->belongsTo('App\defectSubMenu','id');
        return $this->hasMany(
            defectSubMenu::class, //nama model
            'menu_final_id' //nama foreign key di tabel tamunya
        );
    }

    public function final_inspection_defects()
    {
        return $this->hasMany(
            FinalInspectionDefect::class,
            'menu_final_id'
        );
    }

}
