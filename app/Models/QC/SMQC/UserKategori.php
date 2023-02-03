<?php

namespace App\Models\QC\SMQC;

use Illuminate\Database\Eloquent\Model;

class UserKategori extends Model
{
    protected $connection = 'mysql_smqc';
    protected $table = 'user_kategori';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama_kategori',
        '_token',
        'created_at',
        'updated_at'
    ];
}
