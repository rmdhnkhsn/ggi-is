<?php

namespace App\Services\MoreProgram;

use App\Jobs\NotifUlangProbationJob;
use Illuminate\Support\Facades\Log;
use App\Models\GGI_IS\V_GCC_User;

class NotifUlangProbation {
    /**
     * Notifikasi test probation dengan approver bersifat tidak multi level
     *
     * @param string $karyawan
     * @param string $urlApprove
     * @param string $urlDisapprove
     */
    public static function runJob($karyawan, $urlApprove, $urlDisapprove){
        // get person receive notif
        $person = V_GCC_User::where('nik',$karyawan->nik_atasan)->first();
        // set param url
        $params = "?nik_karyawan={$karyawan->nik}";
        $params.= "&nikapprover={$person}";
        $urlApprove .= $params;
        $urlDisapprove .= $params;
        $percobaan = $params;

        // dd($urlApprove);
        dispatch(new NotifUlangProbationJob($person,$karyawan, $urlApprove, $urlDisapprove, $percobaan));
    }
}