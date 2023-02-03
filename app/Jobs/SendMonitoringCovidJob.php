<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\MailMonitoringCovid;
use Mail;

class SendMonitoringCovidJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new MailMonitoringCovid($this->details);
        Mail::to($this->details['email_to'])
            ->cc(['hrd_cln@gistexgroup.com','hrd_mjl@gistexgroup.com','amhasna@gistexgroup.com','kdpujasari@gistexgroup.com'])
            ->bcc(['nhiidayah97@gmail.com', 'arsubiana@gmail.com','suartini1509@gmail.com','rinikusminarr@gmail.com','ifatah89@gmail.com','andriekode@gmail.com','ferilegian@gmail.com','hrd.gistexgarmenindonesia@gmail.com','inajohana1506@gmail.com','yoggiwinardy@gmail.com','adsdkfs29@gmail.com','melamaulaniagustin@gmail.com','ini.carini07@gmail.com','andovisil@gmail.com','meilinafuji@gmail.com','sintyawantisiska@gmail.com'])    
            ->send($email);
    }
}
