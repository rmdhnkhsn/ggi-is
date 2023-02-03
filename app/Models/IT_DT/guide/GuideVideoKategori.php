<?php

namespace App;

namespace App\Models\IT_DT\guide;
use Illuminate\Database\Eloquent\Model;


class GuideVIdeoKategori extends Model{
    protected $connection = 'mysql_ticket';
    protected $table = 'it_kategori';

    protected $fillable = [
        'nama',
    ];

    public function playlists()
    {
        return $this->hasMany(GuideVideoPlaylist::class);
    }
}