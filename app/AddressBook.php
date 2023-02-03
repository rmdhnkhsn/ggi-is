<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddressBook extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "t_v0101jd";
    protected $primaryKey = 'F0101_AN8';

    protected $fillable = [
        'F0101_AN8', //kode buyer
        'F0101_ALPH', // nama buyer 1
        'F0116_ADD1', // Alamat Umum
        'F0116_ADD2', // Alamat Detail (block/no/jln)
        'F0116_ADD3', // Tambahan 1
        'F0116_ADD4', // Tambahan 2
        'F0116_ADDZ', // Kode Pos
        'F0116_COUN', // Negara
    ];

    public function buyer()
    {
        return $this->belongsTo('App\ListBuyer','F0101_AN8');
    }
}