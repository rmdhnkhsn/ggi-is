<?php

namespace App\Services\PPIC\Schedule;

use DB;
use Auth;
use DataTables;
use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\SalesOrder;

use App\Models\ScheduledEmailRecipient;
use App\Exports\ProgressOutputSewingExport;
use App\Jobs\SendProgressOutputEmailJob;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;

class Email_Reporting{

    public function progress_output() 
    {

        $today=date('d_m_Y');
        $files=[];

        //================================ report 1
        $filename='Monthly_'.$today.'.xlsx';
        $report_info=[
            'filename' => $filename,
            'view' => 'ppic.schedule.report.progress_output.excel_monthly',
            'data' => $this->get_output_monthly()
        ];
        array_push($files,storage_path('progress_sewing/'.$filename));
        $path=Excel::store(new ProgressOutputSewingExport($report_info), $report_info['filename'], 'progress_sewing');
        //================================ end report 1

        //================================ report 2
        $filename='Facility_'.$today.'.xlsx';
        $report_info=[
            'filename' => $filename,
            'view' => 'ppic.schedule.report.progress_output.excel_bybranch',
            'data' => $this->get_output_perfacility()
        ];
        array_push($files,storage_path('progress_sewing/'.$filename));
        $path=Excel::store(new ProgressOutputSewingExport($report_info), $report_info['filename'], 'progress_sewing');
        //================================ end report 2

        //================================ report 3
        $filename='Recap_'.$today.'.xlsx';
        $report_info=[
            'filename' => $filename,
            'view' => 'ppic.schedule.report.progress_output.excel_recap',
            'data' => $this->get_recap()
        ];
        array_push($files,storage_path('progress_sewing/'.$filename));
        $path=Excel::store(new ProgressOutputSewingExport($report_info), $report_info['filename'], 'progress_sewing');
        //================================ end report 3

        $recipeint=ScheduledEmailRecipient::where('deskripsi','progress output')->get();
        foreach ($recipeint as $d) {
            if ($d->karyawan->email!==''&&$d->karyawan->nama!=='') {
                $details = [
                    'email_to' => $d->karyawan->email,
                    'name_to' => strtoupper($d->karyawan->nama),
                    'title' => 'Report Progress Output',
                    'body' => view('ppic.schedule.report.progress_output.email')->render(),
                    'files' => $files
                ];
        
                dispatch(new SendProgressOutputEmailJob($details));
            }
        }
    }

    public function get_output_monthly() 
    {
        $sql="
        SELECT 
            buyer,
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=1) AS 'jan',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=2) AS 'feb',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=3) AS 'mar',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=4) AS 'apr',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=5) AS 'mei',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=6) AS 'jun',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=7) AS 'jul',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=8) AS 'aug',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=9) AS 'sep',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=10) AS 'okt',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=11) AS 'nov',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=12) AS 'des'
        FROM
            monitoring_excel tp
        WHERE 
            YEAR(tanggal) = YEAR(CURDATE()) 
        GROUP BY buyer 
        ";
        $data=collect(DB::connection('mysql_prod_sch')->select(DB::raw($sql)));
        return $data;
    }

    public function get_output_perfacility() 
    {
        $sql="
        SELECT 
            buyer,
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND branchdetail='CLN') AS 'cln',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND branchdetail='CJL') AS 'cjl',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND branchdetail='MJ1') AS 'mj1',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND branchdetail='MJ2') AS 'mj2',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND branchdetail='CNJ2') AS 'cnj2',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND branchdetail='CVA') AS 'cva',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND branchdetail='CBA') AS 'cba',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND branchdetail='KLB') AS 'klb',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE t1.buyer=tp.buyer AND YEAR(tanggal)=YEAR(CURDATE()) AND branchdetail='CHW') AS 'chw'
        FROM
            monitoring_excel tp
        WHERE 
            YEAR(tanggal) = YEAR(CURDATE()) 
        GROUP BY buyer 
        ";
        $data=collect(DB::connection('mysql_prod_sch')->select(DB::raw($sql)));
        return $data;
    }

    public function get_recap() 
    {
        $sql="
        SELECT 
            branchdetail,
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=1 AND t1.branchdetail=tp.branchdetail) AS 'jan',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=2 AND t1.branchdetail=tp.branchdetail) AS 'feb',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=3 AND t1.branchdetail=tp.branchdetail) AS 'mar',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=4 AND t1.branchdetail=tp.branchdetail) AS 'apr',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=5 AND t1.branchdetail=tp.branchdetail) AS 'mei',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=6 AND t1.branchdetail=tp.branchdetail) AS 'jun',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=7 AND t1.branchdetail=tp.branchdetail) AS 'jul',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=8 AND t1.branchdetail=tp.branchdetail) AS 'aug',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=9 AND t1.branchdetail=tp.branchdetail) AS 'sep',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=10 AND t1.branchdetail=tp.branchdetail) AS 'okt',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=11 AND t1.branchdetail=tp.branchdetail) AS 'nov',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE YEAR(tanggal)=YEAR(CURDATE()) AND MONTH(tanggal)=12 AND t1.branchdetail=tp.branchdetail) AS 'des',
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t1 WHERE YEAR(tanggal)=YEAR(CURDATE())) AS 'total'
        FROM
            monitoring_excel tp
        WHERE 
            YEAR(tanggal) = YEAR(CURDATE()) 
        GROUP BY branchdetail 
        ";
        $data=collect(DB::connection('mysql_prod_sch')->select(DB::raw($sql)));
        return $data;
    }

    public function get_recap_buyer()
    {
        $sql="
        SELECT 
            branchdetail,
            buyer,
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=1) AS qty_jan,
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=2) AS qty_feb,
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=3) AS qty_mar,
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=4) AS qty_apr,
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=5) AS qty_may,
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=6) AS qty_jun,
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=7) AS qty_jul,
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=8) AS qty_aug,
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=9) AS qty_sep,
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=10) AS qty_okt,
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=11) AS qty_nov,
            (SELECT COALESCE(SUM(total_outpot),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=12) AS qty_dec,
            
            (SELECT COALESCE(SUM(jam_kerja),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=1) AS jamker_jan,
            (SELECT COALESCE(SUM(jam_kerja),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=2) AS jamker_feb,
            (SELECT COALESCE(SUM(jam_kerja),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=3) AS jamker_mar,
            (SELECT COALESCE(SUM(jam_kerja),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=4) AS jamker_apr,
            (SELECT COALESCE(SUM(jam_kerja),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=5) AS jamker_may,
            (SELECT COALESCE(SUM(jam_kerja),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=6) AS jamker_jun,
            (SELECT COALESCE(SUM(jam_kerja),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=7) AS jamker_jul,
            (SELECT COALESCE(SUM(jam_kerja),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=8) AS jamker_aug,
            (SELECT COALESCE(SUM(jam_kerja),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=9) AS jamker_sep,
            (SELECT COALESCE(SUM(jam_kerja),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=10) AS jamker_okt,
            (SELECT COALESCE(SUM(jam_kerja),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=11) AS jamker_nov,
            (SELECT COALESCE(SUM(jam_kerja),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=12) AS jamker_dec,
            
            (SELECT COALESCE(SUM(loss_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=1) AS losstime_jan,
            (SELECT COALESCE(SUM(loss_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=2) AS losstime_feb,
            (SELECT COALESCE(SUM(loss_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=3) AS losstime_mar,
            (SELECT COALESCE(SUM(loss_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=4) AS losstime_apr,
            (SELECT COALESCE(SUM(loss_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=5) AS losstime_may,
            (SELECT COALESCE(SUM(loss_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=6) AS losstime_jun,
            (SELECT COALESCE(SUM(loss_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=7) AS losstime_jul,
            (SELECT COALESCE(SUM(loss_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=8) AS losstime_aug,
            (SELECT COALESCE(SUM(loss_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=9) AS losstime_sep,
            (SELECT COALESCE(SUM(loss_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=10) AS losstime_okt,
            (SELECT COALESCE(SUM(loss_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=11) AS losstime_nov,
            (SELECT COALESCE(SUM(loss_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=12) AS losstime_dec,
            
            (SELECT COALESCE(SUM(over_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=1) AS overtime_jan,
            (SELECT COALESCE(SUM(over_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=2) AS overtime_feb,
            (SELECT COALESCE(SUM(over_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=3) AS overtime_mar,
            (SELECT COALESCE(SUM(over_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=4) AS overtime_apr,
            (SELECT COALESCE(SUM(over_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=5) AS overtime_may,
            (SELECT COALESCE(SUM(over_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=6) AS overtime_jun,
            (SELECT COALESCE(SUM(over_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=7) AS overtime_jul,
            (SELECT COALESCE(SUM(over_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=8) AS overtime_aug,
            (SELECT COALESCE(SUM(over_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=9) AS overtime_sep,
            (SELECT COALESCE(SUM(over_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=10) AS overtime_okt,
            (SELECT COALESCE(SUM(over_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=11) AS overtime_nov,
            (SELECT COALESCE(SUM(over_time),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=12) AS overtime_dec,

            (SELECT COALESCE(SUM(total_outpot*fob_jde),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=1) AS sales_jan,
            (SELECT COALESCE(SUM(total_outpot*fob_jde),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=2) AS sales_feb,
            (SELECT COALESCE(SUM(total_outpot*fob_jde),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=3) AS sales_mar,
            (SELECT COALESCE(SUM(total_outpot*fob_jde),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=4) AS sales_apr,
            (SELECT COALESCE(SUM(total_outpot*fob_jde),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=5) AS sales_may,
            (SELECT COALESCE(SUM(total_outpot*fob_jde),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=6) AS sales_jun,
            (SELECT COALESCE(SUM(total_outpot*fob_jde),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=7) AS sales_jul,
            (SELECT COALESCE(SUM(total_outpot*fob_jde),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=8) AS sales_aug,
            (SELECT COALESCE(SUM(total_outpot*fob_jde),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=9) AS sales_sep,
            (SELECT COALESCE(SUM(total_outpot*fob_jde),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=10) AS sales_okt,
            (SELECT COALESCE(SUM(total_outpot*fob_jde),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=11) AS sales_nov,
            (SELECT COALESCE(SUM(total_outpot*fob_jde),0) FROM monitoring_excel t2 WHERE t1.branchdetail=t2.branchdetail AND t1.buyer=t2.buyer AND year_input=YEAR(CURDATE()) AND period_input=12) AS sales_dec
        FROM 
            `monitoring_excel` t1
        WHERE 
            year_input=YEAR(CURDATE()) 
        GROUP BY 
            branchdetail,
            buyer
        ORDER BY 
            branchdetail,
            buyer
        LIMIT 100
        ";
        $data=collect(DB::connection('mysql_prod_sch')->select(DB::raw($sql)));

        // $data=collect(DB::connection('mysql_prod_sch')->select(DB::raw($sql)))->map(function ($arr) {
        //     $arr->fob=SalesOrder::where('F4211_LOTN',$arr->wo)->where('F4211_UPRC','>',0)->orderBy('F4211_RSDJ')->first()->F4211_UPRC;
        //     return $arr;
        // });

        return $data;
    }

    public function get_recap_perline()
    {
        $sql="
        SELECT 
            branchdetail,
            line,
            buyer,
            year_input,
            period_input,
            COALESCE(SUM(total_outpot),0) qty,
            COALESCE(SUM(jam_kerja),0) jamker,
            COALESCE(SUM(loss_time),0) losstime,
            COALESCE(SUM(over_time),0) overtime,
            COALESCE(SUM(total_outpot*fob_jde),0) sales

           
        
        FROM 
            `monitoring_excel` t1
        WHERE 
            year_input=YEAR(CURDATE()) 
        GROUP BY 
            branchdetail,
            line,
            buyer,
            period_input
        ORDER BY 
            period_input,
            branchdetail,
            line,
            buyer
        LIMIT 1000
        ";
        $data=collect(DB::connection('mysql_prod_sch')->select(DB::raw($sql)));

        return $data;
    }

    public function recap_output() 
    {

        $today=date('d_m_Y');
        $files=[];

        //================================ report 1
        $filename='PerBuyer_'.$today.'.xlsx';
        $report_info=[
            'filename' => $filename,
            'view' => 'ppic.schedule.report.recap_output_sewing.excel_buyer',
            'data' => $this->get_recap_buyer()
        ];
        array_push($files,storage_path('progress_sewing/'.$filename));
        $path=Excel::store(new ProgressOutputSewingExport($report_info), $report_info['filename'], 'progress_sewing');
        //================================ end report 1

        //================================ report 2
        $filename='PerLine_'.$today.'.xlsx';
        $report_info=[
            'filename' => $filename,
            'view' => 'ppic.schedule.report.recap_output_sewing.excel_line',
            'data' => $this->get_recap_perline()
        ];
        array_push($files,storage_path('progress_sewing/'.$filename));
        $path=Excel::store(new ProgressOutputSewingExport($report_info), $report_info['filename'], 'progress_sewing');
        //================================ end report 2

        $recipeint=ScheduledEmailRecipient::where('deskripsi','Recap Output')->get();
        foreach ($recipeint as $d) {
            if ($d->karyawan->email!==''&&$d->karyawan->nama!=='') {
                $details = [
                    'email_to' => $d->karyawan->email,
                    'name_to' => strtoupper($d->karyawan->nama),
                    'title' => 'Report Recap Output',
                    'body' => view('ppic.schedule.report.recap_output_sewing.email')->render(),
                    'files' => $files
                ];
        
                dispatch(new SendProgressOutputEmailJob($details));
            }
        }
    }

    public function loading_capacity_perline() 
    {

        $today=date('d_m_Y');
        $files=[];

        //================================ report 1
        $filename='PerBuyer_'.$today.'.xlsx';
        $report_info=[
            'filename' => $filename,
            'view' => 'ppic.schedule.report.recap_output_sewing.excel_buyer',
            'data' => $this->get_output_monthly()
        ];
        array_push($files,storage_path('progress_sewing/'.$filename));
        $path=Excel::store(new ProgressOutputSewingExport($report_info), $report_info['filename'], 'progress_sewing');
        //================================ end report 1

        //================================ report 2
        // $filename='Facility_'.$today.'.xlsx';
        // $report_info=[
        //     'filename' => $filename,
        //     'view' => 'ppic.schedule.report.progress_output.excel_bybranch',
        //     'data' => $this->get_output_perfacility()
        // ];
        // array_push($files,storage_path('progress_sewing/'.$filename));
        // $path=Excel::store(new ProgressOutputSewingExport($report_info), $report_info['filename'], 'progress_sewing');
        //================================ end report 2

        $recipeint=ScheduledEmailRecipient::where('deskripsi','Recap Output')->get();
        foreach ($recipeint as $d) {
            if ($d->karyawan->email!==''&&$d->karyawan->nama!=='') {
                $details = [
                    'email_to' => $d->karyawan->email,
                    'name_to' => strtoupper($d->karyawan->nama),
                    'title' => 'Report Recap Output',
                    'body' => view('ppic.schedule.report.recap_output_sewing.email')->render(),
                    'files' => $files
                ];
        
                dispatch(new SendProgressOutputEmailJob($details));
            }
        }
    }

}