<?php

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $origins = ['10.8.0.108', 'gcc.gistexgarmenindonesia.com'];
        $domain = parse_url(request()->root());
       config(['app.locale' => 'id']);
        \Carbon\Carbon::setLocale('id');
        $this->loadViewsFrom(__DIR__.'/views', 'laravelchart');

        View::composer(['layouts.common.GCCnotification'], function($v){
            $v->with([
            'notification' => Notification::where('nik',Auth::user()->nik)->orderBy('id','desc')->take(10)->get()
            ]);
        });
        
    }
}
