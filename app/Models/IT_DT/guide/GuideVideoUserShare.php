<?php

namespace App;

namespace App\Models\IT_DT\guide;
use Illuminate\Database\Eloquent\Model;



class GuideVideoUserShare extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'it_user_share';
    protected $primaryKey = 'id';


    protected $fillable = [
        'id_videos',
        'nama_user_share',
        'point_user_share',
        'nik_user_share',
        'nama_branch',
        'link_url',
        'created_at',
        'updated_at',
    ];
}
