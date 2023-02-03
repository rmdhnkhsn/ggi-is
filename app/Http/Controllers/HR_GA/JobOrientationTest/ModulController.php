<?php

namespace App\Http\Controllers\HR_GA\JobOrientationTest;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MoreProgram\job_orientation;
use App\Models\HR_GA\JobOrientationTest\Modul;

class ModulController extends Controller
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
    
    public function store(Request $request)
    {
        // dd($request->all());
        $cek_modul = Modul::where('judul', $request->judul)->where('departemen', $request->departemen)->count('id');
        // dd($cek_modul);
        if ($cek_modul == 0) {
            $input = $request->all();
            Modul::create($input);

            return back()->with('success', 'successfully saved');
        }else {
            return back()->with('data_terdaftar', 'Modul dengan judul dan departemen tersebut telah dibuat!');
        }
    }
    public function departemen(Request $request)
    {
        // dd($request->ID);
        $data_bagian = (new job_orientation)->bagian();
        $data = collect($data_bagian)->where('departemen',$request->ID);
        // dd($data);

        return response()->json($data);
    }

}
