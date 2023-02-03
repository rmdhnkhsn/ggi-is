<?php

namespace App\Http\Controllers\HR_GA\DailyAbsen;

use Auth;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use GuzzleHttp\Client;
use App\User;


class DailyAbsenController extends Controller
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

    public function index()
    {
        $client = new Client();
        $request = $client->get('http://10.8.0.108:7182/api/get-alfa-karyawan/all/123');
        $response = json_decode($request->getBody());

        $response=collect($response)->map(function ($item){
            $temp=collect($item)->map(function ($v){
                $v->nohp=User::where('nik',$v->nik)->first()->nohp ?? null;
                return $v;
            });
            return $temp;
        });

        $map['data']=$response;
        $map['page']='dashboard';

        return view('hr_ga.DailyAbsen.index', $map);
    }
    
}
