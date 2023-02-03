<?php

namespace App\Jobs;

use App\Mail\GagalRecruitmentMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NotifGagalRecruitmentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

     /** @var \App\UlangProbation */
     protected $person;
     protected $input;
    /**
     * Job notif ulang test probation
     *
     * @param $person
     * @param $karyawan
     */
    public function __construct($person, $input)
    {
        // dd($input);
        $this->person = $person;
        $this->input = $input;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Notif by email
        $GagalRecruitmentMail = new GagalRecruitmentMail($this->person, $this->input);
        Mail::to($this->person->email)->send($GagalRecruitmentMail);
    }
}
