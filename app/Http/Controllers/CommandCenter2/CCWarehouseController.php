<?php

namespace App\Http\Controllers\CommandCenter2;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class CCWarehouseController extends Controller
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
       
    }
    public function branch_all(Request $request)
    {
        // $sql="
        // SELECT 
        //     jde_code,
        //     supplier,
        //     COUNT(DISTINCT(invoice_no)) AS 'invoice_count'
        // FROM
        //     v_invoice
        // WHERE 
        //     STATUS = 3 
        //     AND is_validate_user = 0 
        // GROUP BY 
        //     jde_code
        // ";

        // $sql.="
        // ORDER BY
        //     supplier ASC 
        // ";
        // $map['invoice']=collect(DB::connection('mysql_vp')->select(DB::raw($sql)));
        $map['page']='warehouse';
        return view('CommandCenter2.all_fac_warehouse',$map);
    }
    public function perfactory(Request $request)
    {
        $map['page']='warehouse';
        return view('CommandCenter2.warehouse.perfactory',$map);
    }
    public function perfactory_detail(Request $request)
    {
        $map['page']='warehouse';
        return view('CommandCenter2.warehouse.perfactory_detail',$map);
    }
   
}
