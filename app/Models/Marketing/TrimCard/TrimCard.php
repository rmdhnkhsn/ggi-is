<?php

namespace App\Models\Marketing\TrimCard;

use Illuminate\Database\Eloquent\Model;

class TrimCard extends Model
{
    protected $connection = 'mysql_mkt';
    protected $table = 'trimcard';
    protected $primaryKey = 'id';

    protected $fillable = [
        'agent',
        'buyer',
        'destination',
        'prod_desc',
        'style',
        'art',
        'colorway1',
        'colorway2',
        'colorway3',
        'colorway4',
        'colorway5',
        'colorway6',
        'no_wo', 
        'created_by',
        'branch',
        'branchdetail',
        '_token'
    ];

    public function file()
    {
        return $this->hasMany('App\Models\Marketing\TrimCard\TrimCardPDF', 'tc_id');
    }
}
