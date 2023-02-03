<?php

namespace App\Services\HR_GA\JobVacancy;

use App\Jobs\NotifPsikotestJob;
use Illuminate\Support\Facades\Log;
use App\Models\HR_GA\JobVacancy\ERSApplicant;

class NotifPsikotest {
    /**
     * Notifikasi Psikotest
     *
     * @param string $input
     */
    public static function runJob($input){
        // dd($input);
        // get person receive notif
        $person = ERSApplicant::findorfail($input['id']);
        // dd($person);
        // set param url
        // $params = "?nik_karyawan={$karyawan->nik}";
        // $params.= "&nikapprover={$person}";
        // $urlApprove .= $params;
        // $urlDisapprove .= $params;
        // $percobaan = $params;

        // dd($urlApprove);
        dispatch(new NotifPsikotestJob($person,$input));
    }
}