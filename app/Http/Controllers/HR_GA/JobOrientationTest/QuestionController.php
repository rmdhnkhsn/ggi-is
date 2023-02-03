<?php

namespace App\Http\Controllers\HR_GA\JobOrientationTest;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MoreProgram\job_orientation;
use App\Models\HR_GA\JobOrientationTest\Modul;


class QuestionController extends Controller
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

    public function index($id)
    {
        $page = 'dashboard';
        $data = Modul::with('soal')->findorfail($id);
        // dd($data);
        return view('hr_ga.question.index', compact('page', 'data'));
    }

    public function draft()
    {
        $page = 'dashboard';
        $tanggal = date('Y-m-d');
        $data_departemen= (new job_orientation)->semuaDepartemen();
        $modul = Modul::where('branch', auth()->user()->branch)
                    ->where('branchdetail', auth()->user()->branchdetail)
                    ->get();
        $enam_terakhir = Modul::where('branch', auth()->user()->branch)
                    ->where('branchdetail', auth()->user()->branchdetail)
                    ->latest()->take(6)->get();
        // dd($enam_terakhir);

        return view('hr_ga.question.draft', compact('page', 'data_departemen', 'tanggal', 'modul','enam_terakhir'));
    }
    
}
