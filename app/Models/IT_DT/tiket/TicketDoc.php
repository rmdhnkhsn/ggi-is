<?php

namespace App\Models\IT_DT\tiket;

use Illuminate\Database\Eloquent\Model;

class TicketDoc extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'ticketing_doc';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'no_aju',
        'no_bc23',
        'tanggal',
        'vessel',    
        'etd',    
        'eta_jkt',    
        'eta_gtx',    
        'jum_kemasan',    
        'jenis_kemasan',    
        'shipper',    
        'order_ticket',    
        'no_bl',    
        'berat',    
        'jum_devisa', 
        'mata_uang',   
        'nama',    
        'nik',    
        'ext',    
        'branch',    
        'branchdetail', 
        'status',    
        'tgl_pengajuan',    
        'forwader',  
        'keterangan',
        'nik_support',    
        'nama_support',
        'tanggal_process',
        'packing_list',
        'invoice',    
        'bl_doc',    
        'doc_1',    
        'doc_2',    
        'doc_3', 
        'packing_list_terima',
        'invoice_terima',    
        'bl_doc_terima',    
        'doc_1_terima',    
        'doc_2_terima',    
        'doc_3_terima',    
    ];

}