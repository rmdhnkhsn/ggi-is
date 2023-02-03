<?php

namespace App\Models\Marketing\TrimCard;

use Illuminate\Database\Eloquent\Model;

class TrimCardPDF extends Model
{
    protected $connection = 'mysql_mkt';
    protected $table = 'trimcard_pdf';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tc_id',
        'nik',
        'nama',
        'branch',
        'branchdetail',
        'file',
        'note',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function trimcard()
    {
        return $this->belongsTo('App\Models\Marketing\TrimCard','id');
    }
}
