<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class SalesOrder extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "t_v4211c";
    protected $primaryKey = 'F4211_DOCO';

    protected $fillable = [
        'F4211_DOCO', //
        'F4211_DCTO', // 
        'F4211_KCOO', // 
    ];

    public function buyer()
    {
        // return $this->belongsTo('App\ListBuyer','F0101_AN8');
        return $this->belongsTo(ListBuyer::class,"F4211_AN8","F0101_AN8");
    }

    public function plancost($doco,$dcto,$kcoo,$ln)
    {
        //ambil selalu dari line utama contoh 1.023 => 1.000 atau 2.010 => 2.000
        $ln=floor($ln);
        $cost=$this->where('F4211_DOCO',$doco)->where('F4211_DCTO',$dcto)->where('F4211_KCOO',$kcoo)->where('F4211_LNID',$ln)->first();
        return $cost->F4211_UPRC;
    }
    public function planqty($doco,$dcto,$kcoo,$ln)
    {
        //ambil selalu dari line utama contoh 1.023 => 1.000 atau 2.010 => 2.000
        // dd('DOCO '.$doco.' DCTO '.$dcto. ' KCOO '.$kcoo. ' LNID '.$ln);

        $ln=floor($ln);


        // $qty=$this->where('F4211_DOCO',$doco)->where('F4211_DCTO',$dcto)->where('F4211_KCOO',$kcoo)
        // ->whereRaw("F4211_LNID LIKE '".$ln.".%'")->sum('F4211_UORG');

        $qty=0;
        $dt=SalesOrderBreakdown::where('F550018_KCOO',$kcoo)->where('F550018_DCTO',$dcto)->where('F550018_DOCO',$doco)
                           ->where('F550018_LNID',$ln)->get();
        foreach ($dt as $k => $v) {
            $qty+=$v->F550018_55QNTY01??0;
            $qty+=$v->F550018_55QNTY02??0;
            $qty+=$v->F550018_55QNTY03??0;
            $qty+=$v->F550018_55QNTY04??0;
            $qty+=$v->F550018_55QNTY05??0;
            $qty+=$v->F550018_55QNTY06??0;
            $qty+=$v->F550018_55QNTY07??0;
            $qty+=$v->F550018_55QNTY08??0;
            $qty+=$v->F550018_55QNTY09??0;
            $qty+=$v->F550018_55QNTY10??0;
            $qty+=$v->F550018_55QNTY11??0;
            $qty+=$v->F550018_55QNTY12??0;
            $qty+=$v->F550018_55QNTY13??0;
            $qty+=$v->F550018_55QNTY14??0;
            $qty+=$v->F550018_55QNTY15??0;
            $qty+=$v->F550018_55QNTY16??0;
            $qty+=$v->F550018_55QNTY17??0;
            $qty+=$v->F550018_55QNTY18??0;
            $qty+=$v->F550018_55QNTY19??0;
            $qty+=$v->F550018_55QNTY20??0;
        }
        
        return $qty;
    }
}