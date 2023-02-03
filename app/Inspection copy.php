<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "t_v4801c";
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
        'F4801_DOCO', // NO WO (primary key)
        'F4801_AITM',  // second item 
        'F4801_RORN',
        'F4801_VR01',
        'F4801_AN8', // Primary Key dari list buyer (t_v0101e)
        'F4801T_LINE', //nama branch
        'F4801_STRT', //tanggal
        'F4801_DL01',  // item description
        'F4801_UORG',  // order quantity
        'F4801_SOQS',  // quantity shipped
        'F4801_DL01',  // no_so
    ];

    public function ListBuyer()
    {
        // return $this->belongsTo('App\ListBuyer','id');
        return $this->hasMany(
            ListBuyer::class, //nama model
            'F0101_AN8'//nama foreign key di tabel tamunya
        );
        
    }

    public function finalInspection()
    {
        return $this->hasMany(
            finalInspection::class,
            'wo',
            'F4801_DOCO'
        );
    }

    public function final_inspection_defects()
    {
        return $this->hasMany(
            FinalInspectionDefect::class,
            't_v4801c_id',
            'F4801_DOCO'
        );
    }
}
