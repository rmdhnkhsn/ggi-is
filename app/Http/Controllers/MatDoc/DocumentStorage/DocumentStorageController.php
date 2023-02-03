<?php

namespace App\Http\Controllers\MatDoc\DocumentStorage;

use DB;
use Auth;
use DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class DocumentStorageController extends Controller
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

    public function in(Request $request)
    {
        $map['page']='dashboard';
        return view('MatDoc.DocumentStorage.DocumentIn', $map);
    }

    public function out(Request $request)
    {
        $map['page']='dashboard';
        return view('MatDoc.DocumentStorage.DocumentOut', $map);
    }

    public function other(Request $request)
    {
        $map['page']='dashboard';
        return view('MatDoc.DocumentStorage.DocumentOther', $map);
    }

}
