<?php

namespace App\Services\Indah;

use App\Branch;
use App\User;
use App\IndahVote;
use App\IndahKaryawan;
use Carbon\Carbon;

class perfactory{
    public function report($dataBranch)
    {
        $bulan = date('Y-m');
        $dataBranch = Branch::findorfail($dataBranch->id);
        $th = Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y');
        $month = Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('m');
            if ($month == '01') {
                $kodeBulan = 'January';
            }elseif ($month == '02') {
                $kodeBulan = 'february';
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
            }elseif ($month == '02') {
                $kodeBulan = 'December';
            }

        $FirstDate = Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y-m-d'); 
        $LastDate = Carbon::createFromFormat('Y-m', $bulan)->endOfMonth()->format('Y-m-d'); 
        $vote = Indahvote::where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)
            ->where('branch',$dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)
            ->groupBy('nik', 'nama','bagian')
            ->selectRaw('count(*) as total, nik, nama, bagian')
            ->get();
      
      // dd($l);
        // mengambil data karyawan yang akan ditampilkan di views
        
        $dataKaryawanDislike = [];

        foreach ($vote as $key => $value) {

            $like = IndahVote::where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->where('nik','=',$value->nik)->count('like');
            $dislike = IndahVote::where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->where('nik','=',$value->nik)->count('dislike');
            $total= $like - $dislike;
            if(($total >='10') AND ($total <='30')){
                $bintang='<i class="fas fa-star"></i>';
            }
            else if(($total >='31') AND ($total <='50')){
                $bintang= '⭐ ⭐';
            }
            else if(($total >='51') AND ($total <='70')){
                $bintang= '⭐ ⭐ ⭐ ';
            }
            else if(($total >='71') AND ($total <='90')){
                $bintang= '⭐ ⭐ ⭐ ⭐';
            }
            else if(($total >='91')){
                $bintang= '⭐ ⭐ ⭐ ⭐ ⭐';
            }
            else {
                $bintang='';
            }
            
            $dataKaryawanDislike[] = [
                'nik' => $value->nik,
                'nama' => $value->nama,
                'bagian' => $value->bagian,
                'dislike' => $dislike,
                'like' => $like,
                'total'=>$total,
                'bintang'=> $bintang
            ];
        }
        $collection = collect($dataKaryawanDislike);
        $test2 = $collection->sortByDesc('total')->take(5);
        // dd($test2);

        return $test2;

    }
}