<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UlangProbationMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $person;
    protected $karyawan;
    protected $percobaan;
    protected $linkApprove;
    protected $linkDisapprove;

    /**
     * Mail Ulang Probation
     *
     * @param $person
     * @param $karyawan
     * @param $justInfo
     * @param $link
     */
    public function __construct($person, $karyawan, $percobaan, $linkApprove, $linkDisapprove)
    {
        $this->person = $person;
        $this->karyawan=$karyawan;
        $this->percobaan=$percobaan;
        $this->linkApprove = $linkApprove;
        $this->linkDisapprove = $linkDisapprove;
        // dd($percobaan);
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $nama = $this->karyawan->nama;
        // dd($nama);
        return $this->subject('Laporan Test Probation dari ' . $nama)->view('email.test_probation.ulang_test')->with([
            'person' => $this->person,
            'karyawan' => $this->karyawan,
            'percobaan' => $this->percobaan,
            'linkApprove' => $this->linkApprove,
            'linkDisapprove' => $this->linkDisapprove,
        ]);
    }
}
