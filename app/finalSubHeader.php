<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class finalSubHeader extends Model
{
    protected $connection = 'mysql_qc';
    protected $table = 'final_subheader';

    protected $fillable = [
        'id', //primaryKey / PK
        'nama_submenu',
        'id_menu',
        'conform',
    ];  

     public function finalHeader()
    {
        return $this->belongsTo(
            finalHeader::class, 
            'id_menu' //nama field foreign key nya
        );
    }
}
