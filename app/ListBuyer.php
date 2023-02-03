<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListBuyer extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "t_v0101e";
    protected $primaryKey = 'F0101_AN8';

    protected $fillable = [
        'F0101_AN8', //kode buyer
        'F0101_ALPH', // nama buyer 1
        'F0101_DC',  // nama buyer 2
        'F0101_AT1', // CG
    ];
    
    public function Inspection()
    {
        return $this->belongsTo(
            Inspection::class, 
            'F0101_AN8',
            'F0101_ALPH' //nama field foreign key nya
        );
    }

    public function addressbook()
    {
        return $this->hasOne('App\AddressBook', 'F0101_AN8');
    }
}
