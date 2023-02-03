<?php

namespace App\Http\Controllers\Analytics;

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


class AnalyticsController extends Controller
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

    public function labour_cost()
    {
        $map['page']='LabourCost';
        $map['ActiveMenu']='LabourCost';
        return view('Analytics.LabourCost', $map);
    }
}
