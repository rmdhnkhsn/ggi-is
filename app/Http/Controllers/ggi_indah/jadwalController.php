<?php

namespace App\Http\Controllers\ggi_indah;

use DB;
use Auth;
use App\User;
use App\IndahKaryawan;
use App\IndahPiket;
use Illuminate\Http\Request;
use App\Services\Indah\listhari;
use App\Http\Controllers\Controller;

class jadwalController extends Controller
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
        if(auth()->user()->role == 'SYS_ADMIN' or auth()->user()->role == 'IN_ADMIN'){
        $Monday = IndahPiket::where('branch', auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('Monday', '!=', null)->get();
        $Tuesday = IndahPiket::where('branch', auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('Tuesday', '!=', null)->get();
        $Wednesday = IndahPiket::where('branch', auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('Wednesday', '!=', null)->get();
        $Thursday = IndahPiket::where('branch', auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('Thursday', '!=', null)->get();
        $Friday = IndahPiket::where('branch', auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('Friday', '!=', null)->get();
        $All = IndahPiket::where('branch', auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('all_day', '!=', null)->get();
        $user = User::all();
        // dd($Monday);
        $page = 'admin';
        return view('Indah.ipiket.index', compact('user', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'All','page'));
         }
         else{
            return view('indah/index');
         }
    }

    public function ipiket()
    {
        if(auth()->user()->role == 'SYS_ADMIN' or auth()->user()->role == 'IN_ADMIN'){
        $user = IndahKaryawan::where('branch',auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)
            ->where('status','1')
            ->get();
       // $user = IndahKaryawan::all();
        $hari = (new listhari)->hari();
        // dd($hari);
        $page = 'admin';
        return view('Indah.ipiket.create', compact('user', 'hari','page'));
        }
        else{
            return view('indah/index');
         }
    }

    public function istore(Request $request)
    {
        if(auth()->user()->role == 'SYS_ADMIN' or auth()->user()->role == 'IN_ADMIN'){
        $hari = (new listhari)->hari();
        foreach ($hari as $key => $value) {
            if ($request->hari == $value) {
                $input = [
                    $value => $request->nik,
                    'branch' => $request->branch,
                    'branchdetail' => $request->branchdetail
                ];
            }
            
        }

        // dd($input);
        IndahPiket::create($input);
        return redirect()->route('piket.index');
        }
        else{
            return view('indah/index');
         }
    }

    public function delete($id)
    {
        if(auth()->user()->role == 'SYS_ADMIN' or auth()->user()->role == 'IN_ADMIN'){
        $id = IndahPiket::findOrFail($id);
        $id->delete();
        
        return back();
        }
        else{
            return view('indah/index');
         }
    }

}