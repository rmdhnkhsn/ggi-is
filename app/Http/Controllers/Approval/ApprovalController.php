<?php

namespace App\Http\Controllers\Approval;

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


class ApprovalController extends Controller
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

    public function home()
    {
        $page = 'dashboard';
        return view('Approval.home', compact('page'));
    }

    public function request_approval_acc()
    {
        $page = 'dashboard';
        return view('Approval.RequestApproval.index', compact('page'));
    }
}
