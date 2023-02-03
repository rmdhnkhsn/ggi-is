<?php

namespace App\Services\Purchasing;

use DB;
use Auth;
use DataTables;
use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;

use App\Models\ScheduledEmailRecipient;
use App\Exports\PurchasingPOExport;
use App\Jobs\SendProgressOutputEmailJob;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;

class Email_Purchasing{

    public function notif_po_open_2week()
    {

        $today=date('d_m_Y');
        $files=[];

        //================================ report 1
        $filename='PO_Open_2Weeks_'.$today.'.xlsx';
        $report_info=[
            'filename' => $filename,
            'view' => 'purchasing.email.po_open_2weeks.excel_po_2weeks',
            'data' => $this->query_po('trim','')
        ];

        array_push($files,storage_path('purchasing_email/'.$filename));
        $path=Excel::store(new PurchasingPOExport($report_info), $report_info['filename'], 'purchasing_email');
        //================================ end report 1

        $recipeint=ScheduledEmailRecipient::where('deskripsi','PO Open 2 Weeks Trim')->get();
        foreach ($recipeint as $d) {
            if ($d->karyawan->email!==''&&$d->karyawan->nama!=='') {
                $details = [
                    'email_to' => $d->karyawan->email,
                    'name_to' => strtoupper($d->karyawan->nama),
                    'title' => 'Report PO Open 2 Weeks',
                    'body' => view('purchasing.email.po_open_2weeks.email')->render(),
                    'files' => $files
                ];
        
                dispatch(new SendProgressOutputEmailJob($details));
            }
        }
    }

    public function query_po($usertipe,$originator)
    {
        $sql="
        SELECT 
            f4311_doco,
            f4311_dcto,
            f4311_kcoo,
            f4311_oorn,
            f4311_octo,
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
            date_exfact_sales,
            date_today,
            due_receipt_days 
        FROM
            `v_open_po`
        WHERE 
            date_transaction BETWEEN DATE_SUB((DATE_SUB(CURDATE(), INTERVAL 2 MONTH)), INTERVAL (DAY(CURDATE())-1) DAY) AND DATE_ADD(CURDATE(), INTERVAL 14 DAY) 
            AND f4311_uopn > 0 
            AND f4311_dcto != 'OC'
        ";
        if (strtolower($usertipe)=='fabric') {
            $sql.="AND tipe='FABRIC' ";
        } else if (strtolower($usertipe)=='trim') {
            $sql.="AND tipe='TRIM' ";
        }
        if (strtolower($originator)!=='') {
            $sql.="AND f4311_torg='".$originator."' ";
        }
        $sql.="
        ORDER BY
            date_transaction DESC  
        ";
        $data=collect(DB::connection('mysql_jdeapi')->select(DB::raw($sql)));
        return $data;
    }
}