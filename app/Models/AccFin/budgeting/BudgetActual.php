<?php

namespace App\Models\AccFin\budgeting;

use Illuminate\Database\Eloquent\Model;

class BudgetActual extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "t_v0911b";
    protected $primaryKey = 'F0911_KCO';
    
    protected $fillable = [
        'F0911_KCO ',
        'F0911_MCU', //branch
        'F0911_OBJ', //account
        'F0911_DGJ', //tanggal
        'F0911_CRCD',//type
        'F0911_CRR',//kurs
        'F0911_AA', // actual budget $
    ];
    
}
