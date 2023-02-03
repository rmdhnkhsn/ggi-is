<?php
namespace App\Helpers;

use Illuminate\Support\Carbon;

class DateHelper{
    
    public static function format($date){
        return date("d-m-Y",strtotime($date));
    }
    public static function formatDatetime($date){
        return date("d-m-Y H:i:s",strtotime($date));
    }
    public static function getDayname($date){
	    Carbon::now("Asia/Jakarta");
	    Carbon::setLocale('id');
        return Carbon::parse(strtotime($date))->translatedFormat("l, d F Y H:i");
    }

    /**
    * return different in days
    */
    public static function getDifferent($from,$to){
        $from=strtotime($from);
        $to=strtotime($to);

        $diff=$from-$to;
        return round($diff/(60*60*24));
    }

    public static function getMonthName($month){
        Carbon::now("Asia/Jakarta");
	    Carbon::setLocale('id');
        $date=date('F', mktime(0, 0, 0, $month, 10));

        return Carbon::parse(strtotime($date))->translatedFormat("F");
    }

    public static function plainToDate($str){
        $yy=substr($str,0,4);
        $mm=substr($str,4,2);
        $dd=substr($str,6,2);
        return "$yy-$mm-$dd";
    }

    public static function format_jde($date){
        $d=date("Y-m-d",substr($date,0,10));
        return date("Y-m-d",strtotime($d));
    }
}