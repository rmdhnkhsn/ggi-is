<?php

namespace App\Models\Finising;

use Illuminate\Database\Eloquent\Model;

class finising_JDE extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "finishing";
    protected $primaryKey = 'F4801_DOCO';

    public function setKeyType($type)
    {
        return parent::setKeyType('string');
    }

    public function setKeyName($key)
    {
        return parent::setKeyName('F4801_DOCO');
    }

    protected $fillable = [
        'F4801_DOCO',//no wo
        'F4801_AN8', //kode buyer
        'F4801_DL01', //item desc
        'F4801_VR01', 
        'F4801_DRQJ', 
        'F4801_STRX', 
        'F0101_AN8', //kode buyer
        'F0101_ALPH', // nama buyer
        'F560020_DOCO', //kode wo
        'F560020_SEG3', // kode country
        'F560020_SEG4', //kode color
        'F560020_QTY', //kode jumlah qty per size
        'F560020_DSC1', //kode jumlah qty per size
        'F560020_SIZE55' // kode size
    ];
}
