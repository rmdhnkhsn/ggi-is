<?php

namespace App;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Stower extends Model
{
    protected $connection = 'mysql_tower';
    
    protected $table = 'gm1_sew';
    protected $fillable = 
    [
        'id', //id tanggal
        'tanggal',
        'namaline',     //nama dari LINE
        'reqlin',     //request dari line
        'resline',  //respons dari line
        'lostim', //waktu habis dari line
        'proses', //proses setelah beres req+ res
        'prosesend',      // final proses dan dijumlahkan waktunya
        'deli',     //pengiriman barang dari line
        'deliend',  // proses  berakhir pengiriman barang dari line
        'totwaktu', // penjumlahan dari proses request sampai dengan delive end
        'T_Lost_Time', // total semua waktu
        'PIC',     // nama permintaan kiriman
        'buyer',     // nama pngiriman
        'style',  
        'wo', //permintaan order dari perusahaan 
        'size',
        'color',
        'target_perday', // target perhari setiap line
        'Remark',     
        'branch',    
        'branchdetail',     
    ];

    public function namaLine()
    {
        $line = [
            'LINE 1',
            'LINE 2',
            'LINE 3',
            'LINE 4',
            'LINE 5',
            'LINE 6',
            'LINE 7',
        ];

        return $line;
    }

//    public function gettanggalAttribute()
//     {
//     return \Carbon\Carbon::parse($this->attributes['tanggal'])
//        ->format('d M Y ');
//     }
    
}
