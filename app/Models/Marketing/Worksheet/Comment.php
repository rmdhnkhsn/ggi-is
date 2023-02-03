<?php

namespace App\Models\Marketing\Worksheet;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $connection = 'mysql_mkt';
    protected $table = 'worksheet_comment';
    protected $primaryKey = 'id';

    protected $fillable = [
        'master_id',
        'user_nik',
        'user_name',
        'entered_on',
        'revision_for',
        'description',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function rekap_order()
    {
        return $this->belongsTo('App\Models\Marketing\RekapOrder\RekapOrder', 'id');
    }
}
