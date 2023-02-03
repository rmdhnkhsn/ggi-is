<?php

namespace App\Http\Controllers\MatDoc\ContractWO;

use DB;
use Auth;
use DataTables;
use Carbon\Carbon;
use App\ContractWO;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ContractWOController extends Controller
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
        $data=ContractWO::Query();
        if ($request->contract&&$request->contract!=='') {
            $data->where('F560021_DSC2',$request->contract);
        }
        if ($request->wo&&$request->wo!=='') {
            $data->where('F560021_DOC',$request->wo);
        }
        $map['data']=$data->get();
        $map['page']='dashboard';
        return view('MatDoc.ContractWO.index', $map);
    }

}
