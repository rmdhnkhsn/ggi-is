<?php

namespace App\Services\QC\FactoryAudit;
use App\Branch;
use App\Models\QC\FactoryAudit\factoryAudit;
use Carbon\Carbon;



class data_olahan{
    public function reportMonthly($filter)
    {
        $data = factoryAudit::where($filter)->get();
        $test = collect($data)->groupBy('po_number');
        // dd($test);
        $coba = [];
        $reportAnual = [];
        foreach ($test as $key => $value) {   
            foreach ($value as $key2 => $value2) {
                $total_reject_pcs = collect($value)->sum('total_reject_pcs');
                $total_reject = collect($value)->sum('total_reject');

                $reportAnual[] = [
                        'total_reject_pcs' => $value2['total_reject_pcs'],
                        'total_reject' => $value2['total_reject'],
                        'po_number' =>$value2['po_number'],
                        'buyer' =>$value2['buyer'],
                        'style' =>$value2['style'],
                        'order_qty' =>$value2['order_qty'],
                        'status' =>$value2['status'],
                        'revisian' =>$value2['revisian'],

                ];
            }
        }
        // dd($reportAnual);
        if (count($reportAnual) > 0) {
            $tester = collect($reportAnual)->groupBy('tahun');   
        }else{
            $tester = [];
        }
        // dd($tester);
         foreach ($tester as $key => $value) {   
            foreach ($value as $key => $value2) {   
            
            $total_reject_pcs = collect($value)->sum('total_reject_pcs');
            $total_reject = collect($value)->sum('total_reject');

              $reportAnual[] = [
                    'total_reject_pcs' => $value2['total_reject_pcs'],
                    'total_reject' => $value2['total_reject'],
                        'po_number' =>$value2['po_number'],
                    'buyer' =>$value2['buyer'],
                    'style' =>$value2['style'],
                    'order_qty' =>$value2['order_qty'],
                    'status' =>$value2['status'],
                    'revisian' =>$value2['revisian'],
              ];
        }
        }
        $percobaan = collect($reportAnual)->groupby('po_number');
        // dd($percobaan);
              $report = [];
            foreach ($percobaan as $key => $value) {
                $TotalResult = collect($value)
                    ->groupBy('tanggal')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $report[] = [
                        'total_reject_pcs' =>$value2['total_reject_pcs'],
                        'total_reject' => $value2['total_reject'],
                        'po_number' =>$value2['po_number'],
                        'buyer' =>$value2['buyer'],
                        'style' =>$value2['style'],
                        'order_qty' =>$value2['order_qty'],
                        'status' =>$value2['status'],
                        'revisian' =>$value2['revisian'],
                    ];
                }
            }
        return $report;
    }

    public function totalMonth($report)
    {
     $percobaan = collect($report)->groupby('tahun');
        $coba=[]; 
        $reportAnual = [];
        foreach ($percobaan as $key => $value) {
            $total_reject_pcs = collect($value)->sum('total_reject_pcs');
            $total_reject = collect($value)->sum('total_reject');
            // dd($total_reject_pcs);
                $reportAnual[] = [
                    'total_reject_pcs' => $total_reject_pcs,
                    'total_reject' => $total_reject,
              ];
        }
        // dd($reportAnual);

     return $reportAnual;
    }

    public function bulan($bulan)
    {
        $month = Carbon::createFromFormat('m-Y', $bulan)->firstOfMonth()->format('m');
        // dd($month);
        if ($month == '01') {
            $kodeBulan = 'JANUARY';
        }elseif ($month == '02') {
            $kodeBulan = 'FEBRUARY';
        }elseif ($month == '03') {
            $kodeBulan = 'MARCH';
        }elseif ($month == '04') {
            $kodeBulan = 'APRIL';
        }elseif ($month == '05') {
            $kodeBulan = 'MAY';
        }elseif ($month == '06') {
            $kodeBulan = 'JUNE';
        }elseif ($month == '07') {
            $kodeBulan = 'JULY';
        }elseif ($month == '08') {
            $kodeBulan = 'AUGUST';
        }elseif ($month == '09') {
            $kodeBulan = 'SEPTEMBER';
        }elseif ($month == '10') {
            $kodeBulan = 'OCTOBER';
        }elseif ($month == '11') {
            $kodeBulan = 'NOVEMBER';
        }elseif ($month == '12') {
            $kodeBulan = 'DECEMBER';
        }

        // dd($kodeBulan);
        return $kodeBulan;
    }

    public function tahun($bulan){
        $tahun = Carbon::createFromFormat('m-Y', $bulan)->firstOfMonth()->format('Y');
        return $tahun;
    }

}





