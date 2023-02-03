<?php

namespace App\Http\Controllers\CommandCenter2;

use Auth;
use App\ListBuyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class CCMarketingController extends Controller
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
    public function index()
    {
        $page='commandCenter2';
       return view('CommandCenter2.marketing.index', compact('page'));
    }
    public function fob()
    {
        $page='commandCenter2';
       return view('CommandCenter2.marketing.marketing-fob', compact('page'));
    }
    public function branch_all(Request $request)
    {
        $buyer = ListBuyer::Select('F0101_AN8','F0101_ALPH')->Where('F0101_AT1', 'CG')->get();
        
        $sql="
        SELECT 
            buyer as 'buyer_code',
            '' as 'buyer',
            no_po,
            standar,
            branch,
            branchdetail,
            created_by,
            contract,
            article,
            style,
            colorway,
            product_name,
            product_photo,
            no_or,
            parent_item,
            t1.ex_fact,
            fob,
            cmt,
            cmtp,
            total_size,
            (SELECT COALESCE(SUM(total_size),0) FROM rekap_breakdown WHERE rekap_breakdown.rekap_detail_id = t1.id)*nilai AS nilai,
            total_amount 
        FROM
            rekap_detail t1 
            LEFT JOIN master_order t2 ON t1.master_order_id = t2.id
        WHERE
            t1.id > 0
        ORDER BY
            t1.id DESC
        ";
        $result=collect(DB::connection('mysql_mkt')->select(DB::raw($sql)));

        $map['data'] = collect($result)->map(function ($arr) use ($buyer) {
            $bid=$buyer->where('F0101_AN8',$arr->buyer_code)->first();
            $arr->buyer = $bid->F0101_ALPH;
            return $arr;
        });

        $sql="
        SELECT 
            januari,
            februari,
            maret,
            april,
            mei,
            juni,
            juli,
            agustus,
            september,
            oktober,
            november,
            desember 
        FROM
            v_rekap_order_monthly
        ";
        $result=collect(DB::connection('mysql_mkt')->select(DB::raw($sql)));
        
        $map['labelChartYear']=["Jan","Feb","Mar", "Apr","May","Jun","Jul","Aug", "Sep", "Oct", "Nov", "Dec"];
        $map['dataChartYear']=[$result[0]->januari, $result[0]->februari, $result[0]->maret, $result[0]->april, $result[0]->mei, $result[0]->juni, $result[0]->juli, $result[0]->agustus, $result[0]->september, $result[0]->oktober, $result[0]->november, $result[0]->desember];

        $this_month=$map['data']->where('ex_fact','>=',date('Y-m-01'))->where('ex_fact','<=',date('Y-m-t'))->groupBy('buyer')->map(function ($row) {
            return $row->sum('nilai');
        });

        $arrayLabel=[];
        $arrayData=[];
        foreach ($this_month->sortDesc()->take(5) as $key => $value) {
            array_push($arrayLabel,substr($key,0,15).'...');
            array_push($arrayData,$value);
        }

        $map['labelChartFive']= $arrayLabel; //["ANTIAPOLIS","MIYAMORI CO.,LTD","COLE INTERNATIO...", "NISHIMATSUYA"]; //
        $map['dataChartFive']=$arrayData; //[10000, 20000, 30000, 15000, 32000];

        $map['page']='marketing';
        return view('CommandCenter2.marketing.all_fac_marketing',$map);
    }
}
