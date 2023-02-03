<?php

namespace App\Services\sampleRoom;

use DB;
use Carbon\Carbon;
use App\Models\Marketing\SampleRequest\sampleData;
use App\Models\Marketing\SampleRequest\sampleUser;

class SampleRoom{

    public function get_project_all($tahun)
    {
        $get_project_all=sampleData::whereIn('departement_trecking', ['SEWING', 'CUTTING', 'PATTERN','FINISH'])->get();
        // dd($get_project_all);

        return $get_project_all;
    }

    public function get_project_done($tahun)
    {
        $get_project_done=sampleData::where('departement_trecking','PATTERN')->whereYear('Accepting_date',$tahun)->get();
        // dd($get_project_done);
        return $get_project_done;
    }

    public function bulan()
    {
        $bulan=date('Y-m');
        $tanggal_awal= Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y-m-d');
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan)->endOfMonth()->format('Y-m-d');
        $bln_tanggal=[
            'awal'  =>$tanggal_awal,
            'akhir' =>$tanggal_akhir,
        ];
        // dd($bln_tanggal);

        return $bln_tanggal;
    }

    public function dataGrafik($bln_tanggal)
    {
        $dataGrafik = sampleData ::where('PIC_pattern','!=',NULL)->get();

        
        // dd($dataGrafik);
         return $dataGrafik;
    }

    public function weekly($bln_tanggal)
    {   
        $f = 'd-m-Y';

        //if you want to record time as well, then replace today() with now()
        //and remove startOfDay()
                $today = Carbon::today();
                $date = $today->copy()->firstOfMonth()->startOfDay();
                $eom = $today->copy()->endOfMonth()->startOfDay();
            
                $dates = [];

                for($i = 1; $date->lte($eom); $i++){
                    
                    //record start date 
                    $startDate = $date->copy();
                    
                    //loop to end of the week while not crossing the last date of month
                    while($date->dayOfWeek != Carbon::SUNDAY && $date->lte($eom)){
                            $date->addDay(); 
                        }
                    
                    $dates['w'.$i] = $startDate->format($f) . ' - ' . $date->format($f);
                    $date->addDay();
                    
                }
        return $dates;
    }

    public function current_week($dates, $bln_tanggal)
    {
        
        $current_week=sampleData::where('departement_trecking','FINISH')
        ->where('finish_date','>=',$bln_tanggal['awal'])->where('finish_date','<=',$bln_tanggal['akhir'])->orderBy('finish_date', 'asc')->get();
        
          $collection=collect($current_week)->groupBy(function($val) {
              
            return Carbon::parse($val->finish_date)->format('w');
        });
// dd($collection);

         return $collection;
    }

    


}