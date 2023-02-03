<?php

namespace App\Models\GGI_IS;

use Illuminate\Database\Eloquent\Model;

class JobDescription extends Model
{
    protected $table = 'job_description';
    protected $primaryKey = 'id';

    protected $fillable = [
        'departemen',  
        'bagian',  
        'nama_dokumen',
        'dokumen',
        'kategori',
        'remark',
        '_token', 
        'viewers',
        'verif1',
        'verif2',
        'verif3',
        'created_by', 
        'created_name', 
        'branch',
        'branchdetail',
        'created_at', 
        'updated_at'  
    ];

    public function cek_viewers()
    {
        return $this->hasMany('App\Models\GGI_IS\JobsViewers', 'job_id');
    }
}
