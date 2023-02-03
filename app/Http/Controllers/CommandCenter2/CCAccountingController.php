<?php

namespace App\Http\Controllers\CommandCenter2;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class CCAccountingController extends Controller
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
        $sql="
        SELECT 
            jde_code,
            supplier,
            COUNT(DISTINCT(invoice_no)) AS 'invoice_count'
        FROM
            v_invoice
        WHERE 
            STATUS = 3 
            AND is_validate_user = 0 
        GROUP BY 
            jde_code
        ";

        $sql.="
        ORDER BY
            supplier ASC 
        ";
        $map['invoice']=collect(DB::connection('mysql_vp')->select(DB::raw($sql)));
        $map['page']='commandCenter2';
        return view('CommandCenter2.all_fac_accounting',$map);
    }
    
    public function ticket()
    {
        $map['page']='commandCenter2';
        return view('CommandCenter2.Accounting.TicketAcc',$map);
    }
   
}
