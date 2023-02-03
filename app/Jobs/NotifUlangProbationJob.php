<?php

namespace App\Jobs;

use App\Mail\UlangProbationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NotifUlangProbationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

     /** @var \App\UlangProbation */
     protected $person;
     protected $karyawan;
     protected $percobaan;
     protected $linkApprove;
     protected $linkDisapprove;

    /**
     * Job notif ulang test probation
     *
     * @param $person
     * @param $karyawan
     * @param $link
     */
    public function __construct($person, $karyawan, $percobaan, $linkApprove, $linkDisapprove)
    {
        // dd($person);
        $this->person = $person;
        $this->karyawan = $karyawan;
        $this->percobaan = $percobaan ;
        $this->linkApprove = $linkApprove;
        $this->linkDisapprove = $linkDisapprove;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Notif by email
        $UlangProbationMail = new UlangProbationMail($this->person, $this->karyawan, $this->percobaan, $this->linkApprove, $this->linkDisapprove);
        Mail::to($this->person->email)->send($UlangProbationMail);
    }
}
