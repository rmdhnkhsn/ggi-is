<?php

namespace App\Http\Controllers\HR_GA\TurnOver;

use Auth;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use App\Models\HR_GA\TurnOver\TurnOver;

use Carbon\Carbon;


class TurnOverController extends Controller
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

    public function index(Request $request)
    {
        $page = 'dashboard';
        $data = TurnOver::orderby('tglinput','desc')->get();
        
        return view('hr_ga.turn_over.index', compact('page','data'));
    }
    
}
