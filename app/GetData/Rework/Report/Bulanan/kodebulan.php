<?php

namespace App\GetData\Rework\Report\Bulanan;

use Carbon\Carbon;

class kodebulan{
    public function bulan($bulan)
    {
        $month = Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('m');
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

        return $kodeBulan;
    }

    public function bulan_indo($bulan)
    {
        $month = Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('m');
        if ($month == '01') {
            $kodeBulan = 'JANUARI';
        }elseif ($month == '02') {
            $kodeBulan = 'FEBRUARI';
        }elseif ($month == '03') {
            $kodeBulan = 'MARET';
        }elseif ($month == '04') {
            $kodeBulan = 'APRIL';
        }elseif ($month == '05') {
            $kodeBulan = 'MEI';
        }elseif ($month == '06') {
            $kodeBulan = 'JUNI';
        }elseif ($month == '07') {
            $kodeBulan = 'JULI';
        }elseif ($month == '08') {
            $kodeBulan = 'AGUSTUS';
        }elseif ($month == '09') {
            $kodeBulan = 'SEPTEMBER';
        }elseif ($month == '10') {
            $kodeBulan = 'OKTOBER';
        }elseif ($month == '11') {
            $kodeBulan = 'NOVEMBER';
        }elseif ($month == '12') {
            $kodeBulan = 'DESEMBER';
        }

        return $kodeBulan;
    }

    public function bulan_indo_kecil($bulan)
    {
        $month = Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('m');
        if ($month == '01') {
            $kodeBulan = 'Januari';
        }elseif ($month == '02') {
            $kodeBulan = 'Februari';
        }elseif ($month == '03') {
            $kodeBulan = 'Maret';
        }elseif ($month == '04') {
            $kodeBulan = 'April';
        }elseif ($month == '05') {
            $kodeBulan = 'Mei';
        }elseif ($month == '06') {
            $kodeBulan = 'Juni';
        }elseif ($month == '07') {
            $kodeBulan = 'Juli';
        }elseif ($month == '08') {
            $kodeBulan = 'Agustus';
        }elseif ($month == '09') {
            $kodeBulan = 'September';
        }elseif ($month == '10') {
            $kodeBulan = 'Oktober';
        }elseif ($month == '11') {
            $kodeBulan = 'November';
        }elseif ($month == '12') {
            $kodeBulan = 'Desember';
        }
    }

    public function month_comcen($bulan)
    {
        // dd($bulan);
        $month = Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('m');
        if ($month == '01') {
            $kodeBulan = 'January';
        }elseif ($month == '02') {
            $kodeBulan = 'February';
        }elseif ($month == '03') {
            $kodeBulan = 'March';
        }elseif ($month == '04') {
            $kodeBulan = 'April';
        }elseif ($month == '05') {
            $kodeBulan = 'May';
        }elseif ($month == '06') {
            $kodeBulan = 'June';
        }elseif ($month == '07') {
            $kodeBulan = 'July';
        }elseif ($month == '08') {
            $kodeBulan = 'August';
        }elseif ($month == '09') {
            $kodeBulan = 'September';
        }elseif ($month == '10') {
            $kodeBulan = 'October';
        }elseif ($month == '11') {
            $kodeBulan = 'November';
        }elseif ($month == '12') {
            $kodeBulan = 'December';
        }
        // dd($kodeBulan);
        return $kodeBulan;
    }

    public function tahun($bulan){
        $tahun = Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y');
        return $tahun;
    }

    public function tanggal_awal($bulan)
    {
        $tanggal_awal = Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y-m-d'); 

        return $tanggal_awal;
    }

    public function tanggal_akhir($bulan)
    {
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan)->endOfMonth()->format('Y-m-d'); 

        return $tanggal_akhir;
    }
}