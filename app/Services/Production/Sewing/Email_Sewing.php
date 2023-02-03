<?php

namespace App\Services\Production\Sewing;

use DB;
use Auth;
use DataTables;
use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
// use App\SalesOrder;

use App\Models\ScheduledEmailRecipient;
use App\Exports\ProgressOutputSewingExport;
use App\Jobs\SendProgressOutputEmailJob;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;

class Email_Sewing{

    public function late_upload() 
    {
        $today=date('Y-m-d', strtotime('-1 day'));
        $data=$this->get_late_upload($today,$today);

        $factory=clone $data->where('total_output',0);
        foreach ($factory->groupBy('sub') as $k => $v) {
            $recipeint=ScheduledEmailRecipient::whereRaw("deskripsi LIKE 'Late Upload%'")
                                              ->whereRaw("deskripsi LIKE '%".$k."%'")->get();

            //================================ report 1
            $files=[];
            $data_by_fcty=clone $data;
            $data_by_fcty=$data_by_fcty->where('sub',$k);
            $filename='LateUpload_'.$today.'_'.$k.'.xlsx';
            $report_info=[
                'filename' => $filename,
                'view' => 'production.sewing.reporting.late_upload.excel_late_upload',
                'data' => $data_by_fcty
            ];
            array_push($files,storage_path('progress_sewing/'.$filename));
            $path=Excel::store(new ProgressOutputSewingExport($report_info), $report_info['filename'], 'progress_sewing');
            //================================ end report 1
            
            foreach ($recipeint as $k2 => $v2) {
                if ($v2->gcc_user->email!==''&&$v2->gcc_user->nama!=='') {
                    $details = [
                        'email_to' => $v2->gcc_user->email,
                        'name_to' => strtoupper($v2->gcc_user->nama),
                        'email_to_bcc' => 'rhidayat@gistexgroup.com',
                        'name_to_bcc' => 'Reza Hidayat',
                        'title' => 'Report Late Upload Daily',
                        'body' => 'Terlampir WO yang belum diupload data output sewing pada tanggal '.$today,
                        'files' => $files
                    ];
            
                    dispatch(new SendProgressOutputEmailJob($details));
                }
            }
        }
    }

    public function get_late_upload($from=null,$to=null)
    {
        $sql="
        SELECT 
            sub,line,
            wo_no,
            target_date,
            total_hour AS target_qty,
            (SELECT COALESCE(SUM(total_outpot),0) FROM `monitoring_excel` tz WHERE t1.wo_no=tz.wo AND t1.target_date=tz.tanggal) AS total_output
        FROM 
            workorder_target t1 LEFT JOIN production_line t2 ON t1.production_line_id=t2.id 
        WHERE 
            target_date >= '".$from."' AND
            target_date <= '".$to."' 
        GROUP BY 
            wo_no, line 
        ORDER BY 
            target_date, sub, line, wo_no
        ";
        $data=collect(DB::connection('mysql_prod_sch')->select(DB::raw($sql)));
        return $data;
    }

}