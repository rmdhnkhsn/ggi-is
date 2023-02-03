<?php

namespace App\Models\HR_GA\JobOrientationTest;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $connection = 'mysql_hrga';
    protected $table = 'orientation_soal';
    protected $primaryKey = 'id';

    
    protected $fillable = [
        'modul_id',
        'question',
        'option1',
        'option2',
        'option3',
        'option4',
        'answer',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function modul()
    {
        return $this->belongsTo('App\Models\HR_GA\JobOrientationTest\Modul', 'id');
    }
}
