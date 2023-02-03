<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use Redirect;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function update($id, $approve_act)
    {
        $notif=Notification::find($id);
        $notif->is_read=1;
        $notif->update();

        if ($notif->url=='workplan.comcen') {
            return redirect()->route('workplan.comcen',['id'=>1]);
        }
        if ($notif->is_approval==1) {
            if ($approve_act==1) {
                $notif->is_approval_click=1;
                $notif->update();
                return Redirect::to($notif->url_approve);
            } elseif ($approve_act==0) {
                $notif->is_approval_click=1;
                $notif->update();
                return Redirect::to($notif->url_reject);
            } else {
                return redirect()->back();
            }
        } else {
            if (str_contains($notif->url, 'http')) {
                return Redirect::to($notif->url);
            } else {
                if ($notif->url) {
                    return redirect()->route($notif->url);
                } else {
                    return redirect()->back();
                }
            }
        }
    }

    public function all()
    {
        $map['data']=Notification::where('nik',Auth::user()->nik)->get();
        $map['page']='notification';
        return view('layouts.common.gccnotif_detail', $map);
    }
}
