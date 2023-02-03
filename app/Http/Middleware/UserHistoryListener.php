<?php

namespace App\Http\Middleware;

use DateTime;
use App\Models\UserHistory;
use Closure;
use Illuminate\Support\Facades\Auth;

class UserHistoryListener
{
    public function handle($request, Closure $next)
    {
        $response=$next($request);

        // $history=new UserHistory();
        // $history->nik=Auth::user()->nik;
        // $history->url=$request->url();
        // $history->action=$request->route()->methods()[0];
        // $history->save();

        $today = date('Y-m-d');
        $time = date('Y-m-d H:i');
        $time = strtotime($time);
        $time = DateTime::createFromFormat('H:i', date('H:i', $time));

        $time1=DateTime::createFromFormat('H:i', '00:00');
        $time2=DateTime::createFromFormat('H:i', '03:00');
        $time3=DateTime::createFromFormat('H:i', '06:00');
        $time4=DateTime::createFromFormat('H:i', '09:00');
        $time5=DateTime::createFromFormat('H:i', '12:00');
        $time6=DateTime::createFromFormat('H:i', '15:00');
        $time7=DateTime::createFromFormat('H:i', '18:00');
        $time8=DateTime::createFromFormat('H:i', '21:00');

        $history=UserHistory::where('nik',Auth::user()->nik)->where('url',$request->url())->where('tanggal',$today)->first();
        if ($history==null) {
            $history=new UserHistory();
            $history->nik=Auth::user()->nik;
            $history->nama=Auth::user()->nama;
            $history->departemen=Auth::user()->departemen;
            $history->departemensubsub=Auth::user()->departemensubsub;
            $history->action=$request->route()->methods()[0];
            $history->url=$request->url();
            $history->tanggal=$today;
            $history->save();
        }
        
        if ($time>$time1&&$time<=$time2) {
            $history->jam1+=1;
        } else if ($time>$time2&&$time<=$time3) {
            $history->jam2+=1;
        } else if ($time>$time3&&$time<=$time4) {
            $history->jam3+=1;
        } else if ($time>$time4&&$time<=$time5) {
            $history->jam4+=1;
        } else if ($time>$time5&&$time<=$time6) {
            $history->jam5+=1;
        } else if ($time>$time6&&$time<=$time7) {
            $history->jam6+=1;
        } else if ($time>$time7&&$time<=$time8) {
            $history->jam7+=1;
        } else if ($time>$time8) {
            $history->jam8+=1;
        }
        $history->total=$history->jam1+$history->jam2+$history->jam3+$history->jam4+$history->jam5+$history->jam6+$history->jam7+$history->jam8;
        $history->update();

        return $response;
    }
}
