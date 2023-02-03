<?php

namespace App;

namespace App\Models\IT_DT\guide;
use Illuminate\Database\Eloquent\Model;

class GuideUser extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'it_users';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'telp',
        'created_at',
        'updated_at',
    ];
}
