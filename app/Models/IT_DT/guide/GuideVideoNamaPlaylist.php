<?php

namespace App;

namespace App\Models\IT_DT\guide;
use Illuminate\Database\Eloquent\Model;


class GuideVideoNamaPlaylist extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'it_nama_playlist';

    protected $fillable = [
        'id',
        'nama_playlist',
    ];

}  