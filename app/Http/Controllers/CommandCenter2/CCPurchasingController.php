<?php

namespace App\Http\Controllers\CommandCenter2;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class CCPurchasingController extends Controller
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
            f4311_doco,
            f4311_dcto,
            f4311_kcoo,
            f4311_torg,
            tipe,
            date_promise,
            date_today,
            due_receipt_days 
        FROM
            `v_open_po`
        WHERE 
            date_promise BETWEEN DATE_SUB((DATE_SUB(CURDATE(), INTERVAL 2 MONTH)), INTERVAL (DAY(CURDATE())-1) DAY) AND DATE_ADD(CURDATE(), INTERVAL 14 DAY) 
            AND f4311_uopn > 0 
            AND f4311_dcto != 'OC'
        ";
        if (Auth::user()->departemensubsub=='PURCHASING') {
            if (Auth::user()->nik=='250007') { //mercy
                $sql.="AND tipe='FABRIC' ";
            } elseif (Auth::user()->nik=='340001') { //sri
                $sql.="AND tipe='TRIM' ";
            } else {
                $sql.="AND nik_originator='".Auth::user()->nik."' ";
            }
        }
        $sql.="
        ORDER BY
            date_promise DESC 
        ";
        
        $map['po']=collect(DB::connection('mysql_jdeapi')->select(DB::raw($sql)));
        $map['page']='purchasing';
        return view('CommandCenter2.all_fac_purchasing',$map);
    }
    public function po_delayed_detail(Request $request)
    {
        $sql="
        SELECT 
            f4311_doco,
            f4311_dcto,
            f4311_kcoo,
            f4311_torg,
            tipe,
            f4311_lnid,
            f4311_itm,
            f4311_dsc1,
            f4311_uorg,
            f4311_uopn,
            f4311_lttr,
            f4311_nxtr,
            date_transaction,
            date_promise,
            date_today,
            due_receipt_days 
        FROM
            `v_open_po`
        WHERE 
            date_promise BETWEEN DATE_SUB((DATE_SUB(CURDATE(), INTERVAL 2 MONTH)), INTERVAL (DAY(CURDATE())-1) DAY) AND DATE_ADD(CURDATE(), INTERVAL 14 DAY) 
            AND f4311_uopn > 0 
            AND f4311_dcto != 'OC'
        ";
        if (Auth::user()->departemensubsub=='PURCHASING') {
            if (Auth::user()->nik=='250007') { //mercy
                $sql.="AND tipe='FABRIC' ";
            } elseif (Auth::user()->nik=='340001') { //sri
                $sql.="AND tipe='TRIM' ";
            } else {
                $sql.="AND nik_originator='".Auth::user()->nik."' ";
            }
        }
        if (isset($request->originator) && $request->originator!==null) {
            $sql.="AND f4311_torg='".$request->originator."' ";
        }
        $sql.="
        ORDER BY
            date_promise DESC  
        ";
        $map['data']=collect(DB::connection('mysql_jdeapi')->select(DB::raw($sql)));
        $map['page']='purchasing';
        return view('CommandCenter2.purchasing.po_delay',$map);
    }

    function get_data_po() {
        $sql="
        SELECT 
            f4311_doco,
            f4311_dcto,
            f4311_kcoo,
            f4311_torg,
            tipe,
            date_promise,
            date_today,
            due_receipt_days 
        FROM
            `v_open_po`
        WHERE 
            date_promise BETWEEN DATE_SUB((DATE_SUB(CURDATE(), INTERVAL 2 MONTH)), INTERVAL (DAY(CURDATE())-1) DAY) AND DATE_ADD(CURDATE(), INTERVAL 14 DAY) 
            AND f4311_uopn > 0 
            AND f4311_dcto != 'OC'
        ";
        if (Auth::user()->departemensubsub=='PURCHASING') {
            if (Auth::user()->nik=='250007') { //mercy
                $sql.="AND tipe='FABRIC' ";
            } elseif (Auth::user()->nik=='340001') { //sri
                $sql.="AND tipe='TRIM' ";
            } else {
                $sql.="AND nik_originator='".Auth::user()->nik."' ";
            }
        }
        $sql.="
        ORDER BY
            date_promise DESC 
        ";
        
       $data=collect(DB::connection('mysql_jdeapi')->select(DB::raw($sql)));
       return $data;
    }

}
