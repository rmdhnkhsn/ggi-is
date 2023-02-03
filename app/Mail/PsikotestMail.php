<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PsikotestMail extends Mailable
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
        // dd($this->person);
        $nama = $this->person->nama;
        $status = $this->input['status'];
        // dd($nama);
        if ($this->person->double_test == 'True' && $this->person->status == 'Psychological Test') {
            return $this->subject('Invitation  Psychological and Technical Test for ' . $nama)->view('email.job_vacancy.psikotest')->with([
                'person' => $this->person,
                'input' => $this->input,
            ]);
        }else {
            return $this->subject('Invitation '.$status.' for ' . $nama)->view('email.job_vacancy.psikotest')->with([
                'person' => $this->person,
                'input' => $this->input,
            ]);
        }
       
    }
}
