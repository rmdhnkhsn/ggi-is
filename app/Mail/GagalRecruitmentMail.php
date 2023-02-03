<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GagalRecruitmentMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $person;
    protected $input;

    /**
     * Mail Ulang Probation
     *
     * @param $person
     * @param $input
     */
    public function __construct($person, $input)
    {
        $this->person = $person;
        $this->input=$input;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->input['posisi']);
        $nama = $this->person->nama;
        $posisi = $this->input['posisi'];
        // dd($status);
        // dd($nama);
        return $this->subject('Response for your application for the '.$posisi.' position')->view('email.job_vacancy.gagal_recruitment')->with([
            'person' => $this->person,
            'input' => $this->input,
        ]);
    }
}
