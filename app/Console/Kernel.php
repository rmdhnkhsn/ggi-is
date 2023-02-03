<?php

namespace App\Console;

use App\Role;
use App\Branch;
use App\Services\tanggal;
use App\Models\Admin\Bagian;
Use App\Models\Audit\tmpna;
use App\Services\Audit\audit;
use App\Services\Audit\ccaudit;
use App\Models\CommandCenter\CCQC;
use Illuminate\Support\Facades\Log;
use App\Services\MatDok\Subkon\subkon;
use Illuminate\Console\Scheduling\Schedule;
use App\Services\CommandCenter\AllFactory\qc;
use App\Services\CommandCenter\AllFactory\IT_DT;
use App\Services\CommandCenter\Grafik\graph_all;
use App\Services\CommandCenter\Scheduler\AllFactory\it;
use App\Services\CommandCenter\Scheduler\AllFactory\cc_qc;
use App\Services\CommandCenter\Scheduler\AllFactory\production;
use App\Services\CommandCenter\Scheduler\AllFactory\ggi_indah;
use App\Services\CommandCenter\Scheduler\AllFactory\audit_allfac;
use App\Services\Notification\SyncNotif;
use App\Services\Marketing\QrCodeSample\qrcodeSample;
use App\Services\sampleRoom\NotificationSampleDueSoon;
use App\Services\PPIC\Schedule\Update_Schedule;
use App\Services\PPIC\Schedule\Email_Reporting;
use App\Services\Purchasing\Email_Purchasing;
use App\Services\PPIC\Schedule\ProductionLineOpServ;
use App\Http\Controllers\MoreProgram\WeeklyQuestController;
use App\Models\ScheduledEmailRecipient;
use App\Jobs\SendProgressOutputEmailJob;
use App\Jobs\ReworkWeeklyReportJob;
use App\Jobs\SendMonitoringCovidJob;
use App\Services\MoreProgram\MonitoringCovid;
use App\Models\MoreProgram\WeeklyQuestion;
use App\Services\Production\Sewing\Email_Sewing;
use App\Http\Controllers\Line\QCReportController;

use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // =================== FAHLU ==========================
        //ppm date qrcode sample
        $schedule->call(function(){
            $user_ppm = (new  qrcodeSample)->user_ppm();
            $data_notif = (new  qrcodeSample)->data_notif();
            $test = (new  qrcodeSample)->qrSample($user_ppm, $data_notif);
        })->everyMinute();

        //ppm date qrcode sample, trigger : per 7 hari
        $schedule->call(function(){
            $dataSample2 = (new  NotificationSampleDueSoon)->UserNotif();
            $dataNotif2 = (new  NotificationSampleDueSoon)->data_notif();
            $notifSample2 = (new  NotificationSampleDueSoon)->notifSample($dataSample2,$dataNotif2);
        })->everyMinute();
        // =================== END FAHLU ======================

        // =================== NURUL ==========================

        // 1. untuk Grafik 
        $schedule->call(function(){
            $grafik = (new graph_all)->datapokok();
            // dd($grafik);
            foreach ($grafik as $key => $value) {
                $validatedData = [
                    'nilai' => $value['nilai'],
                    'issues' => $value['issues']
                ];
                Branch::whereId($value['id_branch'])->update($validatedData);
            }
        })->everyMinute();

        // 2. IT & DT 
        $schedule->call(function(){
            $test = (new it)->schedule();
            Bagian::whereId($test['id'])->update($test);
        })->everyMinute();

        // 3. QC 
        $schedule->call(function(){
            $test = (new cc_qc)->schedule();
            Bagian::whereId($test['id'])->update($test);
        })->everyMinute();

        // 4. Production 
        $schedule->call(function(){
            $test = (new production)->schedule();
            Bagian::whereId($test['id'])->update($test);
        })->everyMinute();

        // 5. GGI INDAH 
        $schedule->call(function(){
            $test = (new ggi_indah)->schedule();
            Bagian::whereId($test['id'])->update($test);
        })->everyMinute();

        //QC All Factory 
        $schedule->call(function(){
            $dataBranch = Branch::all();
            $tanggal = (new tanggal)->commandCenter();
            $dataSemua = (new qc)->SemuaBranch($dataBranch, $tanggal);

            
            foreach ($dataSemua as $key => $value) {
                $validatedData = [
                    'datasemua' => $value['datasemua'],
                    'warna' => $value['warna'],
                    'issues' => $value['issues']
                ];
                CCQC::whereId($value['id'])->update($validatedData);
            }
        })->everyMinute();

        // *Tambahan schedule anak IT 
        $schedule->call(function(){
            $data_programmer = (new MonitoringCovid)->data_programmer();
            $tanggal = date('Y-m-d');
            foreach ($data_programmer as $key => $value) {
                $cek_programmer_isi = collect($value->monitoring_covid)->where('tgl_input', $tanggal)->count('id');
                if ($cek_programmer_isi == 0) {
                    $input = (new MonitoringCovid)->data_input_it($value);
                    WeeklyQuestion::create($input);
                }
            }
        })->days(7)->at('17:15');

        // 5. Monitoring covid
        $schedule->call(function(){
            $covid = (new WeeklyQuestController)->weekly_report(true);
            $ontimeRespone = (new WeeklyQuestController)->ontime_respone(true);

            $files=[];
            array_push($files,storage_path($covid));
            array_push($files,storage_path($ontimeRespone));

            //send email
            $recipeint=ScheduledEmailRecipient::where('deskripsi','monitoring covid')->get();
            $date = date('Y-m-d');
            foreach ($recipeint as $d) {
                if ($d->karyawan->email!==''&&$d->karyawan->nama!=='') {
                    $details = [
                        'email_to' => $d->karyawan->email,
                        'name_to' => strtoupper($d->karyawan->nama),
                        'title' => 'Weekly Activity Report',
                        'body' => 'The attached file is a weekly activity report on the date '.$date,

                        'files' => $files
                    ];
                    log::info($details);

                    dispatch(new SendMonitoringCovidJob($details));
                }
        }})->days(7)->at('18:45');
        //end send email

        //QC Rework 
        $schedule->call(function(){
            // Get data tiap branch 
            $rework_cileunyi = (new QCReportController)->weekly_report($branch = 'GISTEX CILEUNYI');
            $rework_maja1 = (new QCReportController)->weekly_report($branch = 'GISTEX MAJALENGKA 1');
            $rework_maja2 = (new QCReportController)->weekly_report($branch = 'GISTEX MAJALENGKA 2');
            $rework_kalibenda = (new QCReportController)->weekly_report($branch = 'GISTEX KALIBENDA');
            $rework_chawan = (new QCReportController)->weekly_report($branch = 'CV CHAWAN');
            $rework_cnj2 = (new QCReportController)->weekly_report($branch = 'CNJ2');
            $rework_cv_anugrah = (new QCReportController)->weekly_report($branch = 'CV ANUGRAH');
            $rework_cahaya_busana_abadi = (new QCReportController)->weekly_report($branch = 'CAHAYA BUSANA ABADI');
            
            $FirstDate = date('Y-m-d', strtotime("-1 week"));
            $LastDate = date('Y-m-d');

            // Filename tiap branch 
            $cileunyi = 'WEEKLY_REPORT_QCREWORK_GISTEX CILEUNYI_'.$FirstDate.'-'.$LastDate.'.xlsx';  
            $maja1 = 'WEEKLY_REPORT_QCREWORK_GISTEX MAJALENGKA 1_'.$FirstDate.'-'.$LastDate.'.xlsx';  
            $maja2 = 'WEEKLY_REPORT_QCREWORK_GISTEX MAJALENGKA 2_'.$FirstDate.'-'.$LastDate.'.xlsx';  
            $kalibenda = 'WEEKLY_REPORT_QCREWORK_GISTEX KALIBENDA_'.$FirstDate.'-'.$LastDate.'.xlsx';  
            $chawan = 'WEEKLY_REPORT_QCREWORK_CV CHAWAN_'.$FirstDate.'-'.$LastDate.'.xlsx';  
            $cnj2 = 'WEEKLY_REPORT_QCREWORK_CNJ2_'.$FirstDate.'-'.$LastDate.'.xlsx';  
            $cv_anugrah = 'WEEKLY_REPORT_QCREWORK_CV ANUGRAH_'.$FirstDate.'-'.$LastDate.'.xlsx';  
            $cahaya_busana_abadi = 'WEEKLY_REPORT_QCREWORK_CAHAYA BUSANA ABADI_'.$FirstDate.'-'.$LastDate.'.xlsx';  

            $files=[];
            array_push($files,storage_path('rework_weekly_report/'.$cileunyi));
            array_push($files,storage_path('rework_weekly_report/'.$maja1));
            array_push($files,storage_path('rework_weekly_report/'.$maja2));
            array_push($files,storage_path('rework_weekly_report/'.$kalibenda));
            array_push($files,storage_path('rework_weekly_report/'.$chawan));
            array_push($files,storage_path('rework_weekly_report/'.$cnj2));
            array_push($files,storage_path('rework_weekly_report/'.$cv_anugrah));
            array_push($files,storage_path('rework_weekly_report/'.$cahaya_busana_abadi));
            
            // send email
            $recipeint=ScheduledEmailRecipient::where('deskripsi','QC Rework')->get();
            $date = date('Y-m-d');
            foreach ($recipeint as $d) {
                if ($d->karyawan->email!==''&&$d->karyawan->nama!=='') {
                    $details = [
                        'email_to' => $d->karyawan->email,
                        'name_to' => strtoupper($d->karyawan->nama),
                        'title' => 'QC Rework Weekly Report',
                        'body' => 'The attached file is a weekly report from qc rework on the priod '.$FirstDate.' to '.$LastDate,
                        'files' => $files
                    ];
                    // dd($details);
                    log::info($details);
                    dispatch(new ReworkWeeklyReportJob($details));
                }
            }
        // })->days(5)->at('10:00');

        // })->weeklyOn(7, '19.30');
        })->everyMinute();
        

        // =================== END NURUL ======================

        // =================== ANDRI ==========================
         // Internal Audit update anomali
         $schedule->call(function(){
            $test = (new audit)->update_stat();
        })->everyThreeHours();

        $schedule->call(function(){
            $test = (new audit)->schedule();
        })->everyThreeHours();

        //CC ALL IT DT
        $schedule->call(function(){
            $test = (new IT_DT)->issues_divisi();
        })->everyMinute();

        //CC ALL IT DT Grafik
        $schedule->call(function(){
            $bulan = (new IT_DT)->bulan();
            $tiket1 = (new  IT_DT)->data_grafik_allfactory1($bulan);
            $tiket2 = (new  IT_DT)->data_grafik_allfactory2($bulan);
            $grafik = (new  IT_DT)->grafik_allfactory($tiket1, $tiket2);
        })->everyMinute();

        //CC ALL Audit 
        $schedule->call(function(){
            $test = (new ccaudit)->issu_alfact();
        })->everyMinute();
        
        //notif Subkon jatuh tempo
        $schedule->call(function(){
            $data_karyawan=(new subkon)->Daftar_notif();
            $notif=(new subkon)->notif_JatuhTempo($data_karyawan);
        })->daily();
        // =================== END ANDRI ======================

        // =================== REZA ===========================
        $schedule->call(function(){
            $test = (new Update_Schedule)->update_progress_produksi();
        })->dailyAt('09:00');

        $schedule->call(function(){
            $test = (new Update_Schedule)->update_progress_produksi();
        })->dailyAt('12:00');

        $schedule->call(function(){
            $test = (new Update_Schedule)->update_progress_produksi();
        })->dailyAt('15:00');

        $schedule->call(function(){
            $test = (new Update_Schedule)->update_progress_produksi();
        })->dailyAt('18:00');

        $schedule->call(function(){
            $test = (new Update_Schedule)->update_progress_produksi();
        })->dailyAt('21:00');

        $schedule->call(function(){
            $test = (new Email_Reporting)->progress_output(); //PC1
        })->monthlyOn(1, '08:00');

        $schedule->call(function(){
            $test = (new ProductionLineOpServ)->update_data_operator();
        })->monthlyOn(27, '08:00');

        $schedule->call(function(){
            $test = (new Email_Purchasing)->notif_po_open_2week();
        })->dailyAt('08:00');

        $schedule->call(function(){
            $test = (new Email_Reporting)->recap_output(); //PC2
        })->dailyAt('08:00');

        $schedule->call(function(){
            $test = (new Email_Sewing)->late_upload();
        })->dailyAt('08:00');

        // $schedule->call(function(){
        //     $test = (new Update_Schedule)->update_wo_output_jde();
        // // })->everyMinute();
        // })->dailyAt('11:34');

        // $schedule->call(function(){
        //     $test = (new Email_Reporting)->loading_capacity_perline();
        // // })->everyMinute();
        // })->dailyAt('08:00');

        // =================== END REZA =======================
        
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
