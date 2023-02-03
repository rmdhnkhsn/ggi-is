<?php

namespace App\Models\HR_GA\JobOrientationTest;

use Illuminate\Database\Eloquent\Model;

class JawabanTest extends Model
{
    protected $connection = 'mysql_hrga';
    protected $table = 'jawaban_test';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nik',
        'test_id',
        'soal_id',
        'urutan_soal',
        'jawaban_user',
        'jawaban_benar',
        'score',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function test()
    {
        return $this->belongsTo('App\Models\HR_GA\JobOrientationTest\JobsTest', 'id');
    }
}
