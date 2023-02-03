<?php

namespace App\Http\Controllers\JobVacancy;

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


class JobVacancyController extends Controller
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

    public function employee_tracking()
    {
        $page = 'dashboard';
        return view('hr_ga.job_vacancy.job_aplicant.employee_tracking', compact('page'));
    }
    
    public function request_description()
    {
        $page = 'dashboard';
        return view('hr_ga.job_vacancy.job_aplicant.partials.request.vacancy_desc', compact('page'));
    }

    public function publish_description()
    {
        $page = 'dashboard';
        return view('hr_ga.job_vacancy.job_aplicant.partials.publish.vacancy_desc', compact('page'));
    }

    public function details()
    {
        $page = 'dashboard';
        return view('hr_ga.job_vacancy.job_aplicant.details', compact('page'));
    }

    public function dashboard()
    {
        $page = 'dashboard';
        return view('hr_ga.job_vacancy.dashboard.index', compact('page'));
    }
}
