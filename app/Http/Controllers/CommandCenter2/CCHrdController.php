<?php

namespace App\Http\Controllers\CommandCenter2;

use Auth;
use App\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\CommandCenter\CC_audit;

class CCHrdController extends Controller
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
        $dataBranch=Branch::all();
        $page = 'commandCenter2';
        return view('CommandCenter2.HRGA.index', compact('page','dataBranch'));
    }
    public function branch($id)
    {
        $data = new Collection();
        $graph_staff = new Collection();
        $graph_produksi = new Collection();
        $current_month=(int)date('m');
        for($i = 1; $i<=$current_month; $i++) {
            $fetch=$this->_branch($i,$id);
            $data=$data->merge($fetch);

            foreach ($fetch->take(3) as $key=>$value) {
                $nilai=[$value->total_lembur];
                if ($value->month==2)
                    $nilai=[null,$value->total_lembur];
                if ($value->month==3)
                    $nilai=[null,null,$value->total_lembur];
                if ($value->month==4)
                    $nilai=[null,null,null,$value->total_lembur];
                if ($value->month==5)
                    $nilai=[null,null,null,null,$value->total_lembur];
                if ($value->month==6)
                    $nilai=[null,null,null,null,null,$value->total_lembur];
                if ($value->month==7)
                    $nilai=[null,null,null,null,null,null,$value->total_lembur];
                if ($value->month==8)
                    $nilai=[null,null,null,null,null,null,null,$value->total_lembur];
                if ($value->month==9)
                    $nilai=[null,null,null,null,null,null,null,null,$value->total_lembur];
                if ($value->month==10)
                    $nilai=[null,null,null,null,null,null,null,null,null,$value->total_lembur];
                if ($value->month==11)
                    $nilai=[null,null,null,null,null,null,null,null,null,null,$value->total_lembur];
                if ($value->month==12)
                    $nilai=[null,null,null,null,null,null,null,null,null,null,null,$value->total_lembur];

                $color='rgb(245, 78, 78)';
                if ($key==1)
                    $color='rgb(245, 197, 54)';
                if ($key==2)
                    $color='rgb(21, 123, 212)';
                $graph_temp=new Collection([
                    'label' => $value->nama,
                    'data' => $nilai,
                    'backgroundColor' => $color,
                    'borderColor' => $color,
                    'borderWidth' => 1
                ]);
                $graph_staff=$graph_staff->push($graph_temp);
            }
        }
        $map['data']=$data;
        $map['range_month']=array_values($this->_branch_range_month($data));
        $map['graph_staff']=$graph_staff;
        $map['page']='employee_overtime';
        return view('CommandCenter2.HR_GA.overtime',$map);
    }

    public function rand() {
                // $collection = collect([
        //     [
        //         'label' => 'Darma',
        //         'data' => [25],
        //         'backgroundColor' => 'rgb(0,166,149)',
        //         'borderColor' => 'rgb(0,166,149)',
        //         'borderWidth' => 1
        //     ],
        //     [
        //         'label' => 'Yudha',
        //         'data' => [20],
        //         'backgroundColor' => 'rgb(229,166,149)',
        //         'borderColor' => 'rgb(229,166,149)',
        //         'borderWidth' => 1
        //     ],
        //     [
        //         'label' => 'Beta',
        //         'data' => [null,10],
        //         'backgroundColor' => 'rgb(179,166,149)',
        //         'borderColor' => 'rgb(179,166,149)',
        //         'borderWidth' => 1
        //     ],
        // ]);
        // dd($collection);
        // $map['test']=$collection;
        $min=0;
        $max=255;
        return rand($min,$max);
    }

    public function _branch($month,$branch_id) {
        $data = new Collection();
        if ($branch_id==0||$branch_id==1) {
            $fetch=collect(DB::connection('tna_staff')->select(DB::raw($this->get_query($month, 'STAFF'))));
            $data=$data->merge($fetch);

            // $fetch=collect(DB::connection('tna_produksi')->select(DB::raw($this->get_query($month, 'PRODUKSI'))));
            // $data=$data->merge($fetch);
        }
        // if ($branch_id==0||$branch_id==2||$branch_id==3) {
        //     $fetch=collect(DB::connection('tna_maja_staff')->select(DB::raw($this->get_query($month, 'STAFF'))));
        //     $data=$data->merge($fetch);

        //     $fetch=collect(DB::connection('tna_maja_produksi')->select(DB::raw($this->get_query($month, 'PRODUKSI'))));
        //     $data=$data->merge($fetch);
        // }
        return $data;
    }

    public function _branch_range_month($range_month) {
        $range_month = $range_month->groupBy('month',true)->map(function ($item, $key) {
            $month_str="January";
            switch ($key) {
                case 2:
                    $month_str="February";
                    break;
                case 3:
                    $month_str="March";
                    break;
                case 4:
                    $month_str="April";
                    break;
                case 5:
                    $month_str="May";
                    break;
                case 6:
                    $month_str="June";
                    break;
                case 7:
                    $month_str="July";
                    break;
                case 8:
                    $month_str="August";
                    break;
                case 9:
                    $month_str="September";
                    break;
                case 10:
                    $month_str="October";
                    break;
                case 11:
                    $month_str="November";
                    break;
                case 12:
                    $month_str="December";
                    break;
              }
            return $month_str;
        });
        return $range_month->toArray();
    }

    public function get_query($month, $dept) {
        $sql="
        SELECT 
            TOP 20 t1.pin,
            ".date('Y')." as 'year',
            ".$month." as 'month',
            '".$dept."' as 'dept',
            t2.nama,
            t2.departemen,
            ROUND(SUM(jamefektif - 8), 2) AS total_lembur 
        FROM
            [ABSENSI] AS t1 
            LEFT JOIN [KARYAWAN] AS t2 
            ON t1.PIN = t2.PIN 
        WHERE 
            YEAR(tanggal) = ".date('Y')." 
            AND MONTH(tanggal) = ".$month." 
            AND jamefektif >= 8 
            AND Jabatan != 'SECURITY' ";
        $sql.="
        GROUP BY t1.pin,
            t2.nama,
            t2.departemen 
        ORDER BY 
            total_lembur DESC ;
        ";
        return $sql;
    }
   
}
