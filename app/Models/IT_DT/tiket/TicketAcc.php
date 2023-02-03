<?php

namespace App\Models\IT_DT\tiket;

use Illuminate\Database\Eloquent\Model;

class TicketAcc extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'ticketing_acct';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'no_tiket',
        'nik',
        'nama',
        'bagian',
        'kategori',
        'amount_rencana',    
        'akun_kredit',    
        'deskripsi',    
        'tgl_create',    
        'nik_manager',    
        'manager',    
        'status_tiket',    
        'approve',    
        'tgl_approve',    
        'pencairan',    
        'kode_pencairan',    
        'desc_pencairan',    
        'tgl_proses',    
        'file_1',    
        'amount_realisasi',    
        'file_2', 
        'desc_done',    
        'branchdetail',    
        'kode_branch',  
        'kode_jde',
        'nik_support',    
        'nama_support',
        'tgl_done', 
        'bank',   
        'rekening',   

    ];
    public function file_acc()
    {
        return $this->hasMany('App\Models\IT_DT\tiket\FileTicketAcc','id_no_tiket');
    }

}