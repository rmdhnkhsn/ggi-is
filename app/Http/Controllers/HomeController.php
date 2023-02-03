<?php

namespace App\Http\Controllers;

use App\Branch;
use App\MasterLine;
use App\LineDetail;
use App\User;
use App\IndahKaryawan;
use App\Services\tanggal;
use Illuminate\Http\Request;
use App\Services\CommandCenter\AllFactory\qc;
use App\Services\CommandCenter\AllFactory\warna;
use App\Services\CommandCenter\AllFactory\issues;
use App\Services\CommandCenter\AllFactory\overall;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index1()
    {
        // dd(auth()->user()->nama);
        return view('home');
    }

    public function index()
    {
       
        // $satgas = IndahKaryawan::where('status','1')->get();
        // $user = User::all();
        // $dataSatgas = [];
        
        // foreach ($satgas as $key => $value) {
        //     foreach ($user as $key1 => $value1) {
        //         if($value->nik == $value1->nik){
        //         $dataSatgas[] = [
        //             'nik' => $value->nik,
        //             'nama' => $value1->nama,
        //         ];
        //     }}
        // }
        $page = 'dashboard';

        return view('home', compact('page'));
    }

    public function login2()
    {
        return view('login2');
    }

    public function email()
    {
        return view('email.email_layout');
    }
}
