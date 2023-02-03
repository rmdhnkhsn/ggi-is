<?php

namespace App\Http\Controllers\MoreProgram;

use DB;
use File;
use Auth;
use Image;
use Storage;
use DateTime;
use App\Models\UserHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class GCCTraficController extends Controller
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
        $date_from='';
        $date_to='';
        if ($request->daterange) {
            $daterange=explode(" ",$request->daterange);
            $date_from=DateTime::createFromFormat('m/d/Y', $daterange[0])->format('Y-m-d');
            $date_to=DateTime::createFromFormat('m/d/Y', $daterange[2])->format('Y-m-d');
        }
        $data=UserHistory::query();
        // $data->where('nik','350008');

        if ($date_from=='') {
            $data->where('tanggal',date('Y-m-d'));
        }
        if ($date_from!=='') {
            $data->where('tanggal','>=',$date_from);
        }
        if ($date_to!=='') {
            $data->where('tanggal','<=',$date_to);
        }
        if ($request->app_name&&$request->app_name!=='') {
            // $data->where('url','like',"'%".$request->app_name."%'");
            $data->WhereRaw("url LIKE '%".$request->app_name."%'");
        }
        if ($request->search) {
            $data->WhereRaw("(departemen LIKE '%".$request->search."%' OR nama LIKE '%".$request->search."%')");
        }
        $data->orderBy('tanggal','asc');
        $data=$data->get();

        $traffic=new Collection();
        foreach ($data as $d) {
            $modul='';
            if (str_contains($d->url, 'pic/schedule')) {
                $modul='Production Schedule';
            }
            if (str_contains($d->url, 'mkt/rekap-order')) {
                $modul='Rekap Order';
            }
            if (str_contains($d->url, 'prd/sewing')) {
                $modul='Upload Sewing';
            }
            if (str_contains($d->url, 'itd/ticket')) {
                $modul='Ticketing';
            }
            if (str_contains($d->url, 'mrp/weekly-question')) {
                $modul='Monitoring Covid';
            }
            if (str_contains($d->url, 'cmc/approval')) {
                $modul='Approval Overtime';
            }

            if ($modul!=='') {
                $temp=collect($d);
                $temp->put('modul', $modul);
                $traffic=$traffic->push($temp);
            }
        }

        $byemployee=$traffic->groupBy('nik')->map(function ($row) {
            $firstRow=$row->first();
            $groupModul=$row->groupBy('modul');
            $groupModulStr='';
            foreach ($groupModul as $key=>$dt) {
                if ($groupModulStr!=='') {
                    $groupModulStr.=', ';
                }
                $groupModulStr.=$key.'('.$dt->sum('total').')';
            }
            return [
                'nik' => $firstRow['nik'],
                'nama' => $firstRow['nama'],
                'departemen' => $firstRow['departemen'],
                'departemensubsub' => $firstRow['departemensubsub'],
                'Modul' => $groupModulStr,
            ];
        })->sortByDesc('departemen');

        $map['data']=$traffic;
        $map['byemployee']=$byemployee;
        $map['page']='dashboard';
        return view('more_program.GCC_Trafic.index', $map);
    }

    public function analytics()
    {
        // ============ TOP 10 SYSTEM ============
        $sql="
        SELECT 
            modul,
            coalesce(SUM(total),0) total 
        FROM 
            `v_traffic` 
        WHERE 
            MONTH(tanggal)=MONTH(NOW()) AND 
            YEAR(tanggal)=YEAR(NOW()) 
        GROUP BY 
            modul 
        ORDER BY 
            total DESC 
        LIMIT 10
        ";
        $traffic=collect(DB::connection('mysql_ggi_is')->select(DB::raw($sql)));
        $traffic_system=[];
        $traffic_system_color=[];
        $traffic_percent=[];

        foreach ($traffic as $v) {
            array_push($traffic_system, $v->modul);
            array_push($traffic_system_color, "rgba(".rand(200,255).", ".rand(100,150).", 80, 1)");//.substr(md5(microtime()),rand(0,26),5)); rand(50,190)
            array_push($traffic_percent, ($v->total/$traffic->sum('total'))*100);
        }
        // ============ END TOP 10 SYSTEM ============

        $his=UserHistory::selectRaw('tanggal, DATE_FORMAT(tanggal, "%a, %e %b") as tanggal_format,SUM(jam1) as j1,SUM(jam2) as j2,SUM(jam3) as j3,SUM(jam4) as j4,SUM(jam5) as j5,SUM(jam6) as j6,SUM(jam7) as j7,SUM(jam8) as j8')
                    ->whereRaw("tanggal BETWEEN (CURRENT_DATE - INTERVAL 8 DAY) AND CURRENT_DATE")->groupBy('tanggal')->orderBy('tanggal')->get(); 
        $data=[];
        $lbdate=[];
        foreach ($his as $v) {
            array_push($lbdate, $v->tanggal_format);
            array_push($data,[$v->j1,$v->j2,$v->j3,$v->j4,$v->j5,$v->j6,$v->j7,$v->j8]);
        }
        $map['traffic_system']=$traffic_system; 
        $map['traffic_system_color']=$traffic_system_color; 
        $map['traffic_percent']=$traffic_percent; 

        $map['data']=$data; 
        $map['lbdate']=$lbdate; 
        $map['dataLabe']=['Dawn (00-03)','Dawn (03-06)','Morning (06-09)','Morning (09-12)','Afternoon (12-15)','Afternoon (15-18)','Evening (18-21)','Evening (21-00)'];

        $map['page']='dashboard';
        return view('more_program.GCC_trafic.analytics', $map);
    }
    
}
