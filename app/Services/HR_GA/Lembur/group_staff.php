<?php

namespace App\Services\HR_GA\Lembur;

Use DB;
use Carbon\Carbon;
Use App\Models\GGI_IS\Karyawan;

class group_staff{
    public function group_staff($user)
    {
        $group=Karyawan::where('nik',$user->nik)->first();
        if($group!=null){
            $record=$group->group;
        }
        else{
            $record=null;
        }
        return $record;
    }

}