<?php

namespace App\Http\Controllers\production;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\tiket\Rproblem;
use App\GetData\Rework\Report\Bulanan\bulanan;
use App\GetData\Rework\Report\Bulanan\kodebulan;
use App\Services\bulan;
use App\User;
use App\Branch;
use App\Bdetail;
use App\Stower;
use DataTables;
use Auth;


class ProductionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function detail()
    // {
    //     $page = 'detail';
    //     return view('production.qrcode.detail', compact('page'));
    // }

    //tampilan halamaan Report Tower Signal
    public function produk()
    {
        $page ='produk';
        return view('production.towerLight.index', compact('page'));
    }

    public function index()
    {
        $page = 'dashboard';
        return view('production.home' , compact('page'));
    }

    //show data andon
    public function bulanan()
    {
         $dataBranch = Branch::all();
        $page= 'bulanan';
         //dd ($date);

        return view('production/towerLight/bulanan', compact('dataBranch','page'));
        
    }
        

    
    public function dataTower()
    {
        $dataBranch = Branch::all();
        $page= 'dataTower';
         //dd ($date);

        return view('production/towerLight/dataTower', compact('dataBranch','page'));
    }
    public function bulananPerform()
    {
         $dataBranch = Branch::all();
         $page= 'bulananPerform';
        //$date= date('Y-m');
         //dd ($date);

        return view('production/towerLight/bulananPerform', compact('dataBranch','page'));
    }
    public function bulananChart()
    {
         $dataBranch = Branch::all();
         $page= 'bulananChart';
        //$date= date('Y-m');
         //dd ($date);

        return view('production/towerLight/bulananChart', compact('dataBranch','page'));
    }
    public function get(Request $request)
	{

        // untuk filter branch
        $dataBranch = Branch::findorfail($request->branch);
        $bulan = $request->bulan;
        
        $dataBulan = (new  kodebulan)->bulan($bulan);
        // dd($bulan);
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);
        // dd($dataBulan);
        if(
           Stower::where('tanggal','>=', $tanggal_awal)->where('tanggal','<=', $tanggal_akhir)->where('facility',$dataBranch->branchdetail)->count()
       ) {
	    $stowers =Stower::where('facility', $dataBranch->branchdetail)
                ->where('tanggal','>=', $tanggal_awal)->where('tanggal','<=', $tanggal_akhir)
                ->get();
        // dd($stowers);

        $stowerGroupedByDate = $stowers->groupBy('tanggal')->values();

                $rataRataResponTime = [];
                $rataRataDeliEndTime = [];
                $totWaktuDeliveryTime = [];
                $jumlahTargetPerHari = [];
                $jumlahLosTime = [];
                $jumlahRemarkPerHari = [];
                $avgAllDataPerLineAndDate = [];
                $sumAllDataPerLineAndDate = [];

        foreach ($stowerGroupedByDate as $stowersByDate) {

            $stowerGroupedByNameAndDate = $stowersByDate->sortBy('namaline')->groupBy('namaline')->values();
            // dump($stowerGroupedByNameAndDate);
                $avgResAndReq = [];
                $avgDeliEndAndProses = [];
                $totWaktuDeliAndReq = [];
                $qtyReqDay = [];
                $qtyActDay = [];
                $totLosTime =[];
                $dataAllLineGroupedbyDate = [];
                $sumdataAllLineGroupedbyDate = [];

            foreach ($stowerGroupedByNameAndDate as $stowersByDateAndLine) {

                $differenceResponAndRequest = [];
                $differenceDeliveryAndProses = [];
                $differenceDeliveryAndRequest = [];
                $qtyReqDayGroupedByDateAndName = [];
                $differenceDeliveryAndLosTime = [];
                $qtyActDayGroupedByDateAndName = [];

                foreach ($stowersByDateAndLine as $stower) {

                    // //Losstime

                     // Remark
                      if(gettype((int)$stower->Remark) === "integer" &&  $stower->Remark !== null && (int)$stower->Remark > 0){
                        $qtyActDayGroupedByDateAndName[] = (int)$stower->Remark;
                    } else {
                        // dump((int)$stower->Remark);
                        $qtyActDayGroupedByDateAndName[] = (int)$stower->Remark;
                    }

                    if(gettype((int)$stower->lostim) === "integer" && (int)$stower->lostim > 0){
                        $lossTime = (int)$stower->lostim;
                    } else {
                        $lossTime = 0;
                    }
                    // dd($lossTime);
                    // Delivery End
                    if ($stower->deliend !== "" && $stower->deliend !== null) {
                        $deliendTime = explode(':', $stower->deliend);
                        $deliendJam = ((int) $deliendTime[0]) * 3600;
                        $deliendMenit = ((int) $deliendTime[1]) * 60;
                        $deliendDetik = ((int) $deliendTime[2]);
                        $deliEndTimeSeconds = $deliendJam + $deliendMenit + $deliendDetik;
                    } else {
                        $deliEndTimeSeconds = 0;
                    }

                    // proses end
                     if ($stower->prosesend !== "" && $stower->prosesend !== null) {
                        $prosesendTime = explode(':', $stower->prosesend);
                        $prosesendJam = ((int) $prosesendTime[0]) * 3600;
                        $prosesendMenit = ((int) $prosesendTime[1]) * 60;
                        $prosesendDetik = ((int) $prosesendTime[2]);
                        $prosesEndTimeSeconds = $prosesendJam + $prosesendMenit + $prosesendDetik;
                    } else {
                        $prosesEndTimeSeconds = 0;
                    }

                    // Target perday
                    if(gettype((int)$stower->target_perday) === "integer" && (int)$stower->target_perday > 0){
                        $qtyReqDayGroupedByDateAndName[] = (int)$stower->target_perday;
                    } else {
                        // dump((int)$stower->target_perday);
                        $qtyReqDayGroupedByDateAndName[] = 0;
                    }

                    // Response Time
                    if ($stower->resline !== "" && $stower->resline !== null) {
                        $resTime = explode(':', $stower->resline);
                        $resJam = ((int) $resTime[0]) * 3600;
                        $resMenit = ((int) $resTime[1]) * 60;
                        $resDetik = ((int) $resTime[2]);
                        $responTimeSeconds = $resJam + $resMenit + $resDetik;
                    } else {
                        $responTimeSeconds = 0;
                    }

                    // Resquest Time
                    if ($stower->reqlin !== "" && $stower->reqlin !== null) {
                        $reqTime = explode(':', $stower->reqlin);
                        $reqJam = ((int) $reqTime[0]) * 3600;
                        $reqMenit = ((int) $reqTime[1]) * 60;
                        $reqDetik = ((int) $reqTime[2]);
                        $requestTimeSeconds = $reqJam + $reqMenit + $reqDetik;
                    } else {
                        $requestTimeSeconds = 0;
                    }

                    //Hasil selisih dikonversi kembali ke bentuk waktu (Menit)
                    $rawDifferenceResponAndRequest = ($responTimeSeconds - $requestTimeSeconds) / 60;
                    if ($rawDifferenceResponAndRequest < 0){
                        $rawDifferenceResponAndRequest = 0;
                    }
                    $differenceResponAndRequest[] = $rawDifferenceResponAndRequest;

                    $rawDifferenceDeliveryAndRequest = ($deliEndTimeSeconds - $requestTimeSeconds) / 60;
                    if ($rawDifferenceDeliveryAndRequest < 0){
                        $rawDifferenceDeliveryAndRequest = 0;
                    }
                    $differenceDeliveryAndRequest[] = $rawDifferenceDeliveryAndRequest;

                    $rawDifferenceDeliveryAndProses = ($deliEndTimeSeconds - $prosesEndTimeSeconds)/60;
                    if ($rawDifferenceDeliveryAndProses < 0){
                        $rawDifferenceDeliveryAndProses = 0;
                    }
                    $differenceDeliveryAndProses[] = $rawDifferenceDeliveryAndProses;

                    $differenceDeliveryAndLosTime[] = ($lossTime ) /60;

                }
                // dump($differenceDeliveryAndLosTime);
                // dump($lossTime);
                // dump('-----------------------');

                $avgResAndReq[] = collect($differenceResponAndRequest)->avg();
                $avgDeliEndAndProses[] = collect($differenceDeliveryAndProses)->avg();
                $totWaktuDeliAndReq[] = collect($differenceDeliveryAndRequest)->sum();
                $qtyReqDay[] = collect($qtyReqDayGroupedByDateAndName)->sum();
                $qtyActDay[] = collect($qtyActDayGroupedByDateAndName)->sum();
                $totLosTime[] = collect($differenceDeliveryAndLosTime)->avg();

                // dump($qtyReqDay);

                // Total Request pada Line keberapa
                $dataAllLine['totalRequest'] = $stowersByDateAndLine->count();
                $dataAllLine['avgResponTime'] = collect($differenceResponAndRequest)->avg();
                $dataAllLine['totalLossTime'] = collect($differenceDeliveryAndLosTime)->avg();
                $dataAllLine['avgDeliveryTime'] = collect($differenceDeliveryAndProses)->avg();
                $dataAllLine['totalDeliveryTime'] = collect($differenceDeliveryAndRequest)->sum();
                $dataAllLine['totalRequestPerDay'] = collect($qtyReqDayGroupedByDateAndName)->sum();
                $dataAllLine['totalActualPerDay'] = collect($qtyActDayGroupedByDateAndName)->sum();

                $dataAllLineGroupedbyDate[] = $dataAllLine;
            }
            // dump($dataAllLineGroupedbyDate);

            //rata-rata untuk setiap line
                $avgAlldataPerLineAndDate['avgTotalRequest'] = collect($dataAllLineGroupedbyDate)->pluck('totalRequest')->avg();
                $avgAlldataPerLineAndDate['avgAvgResponTime'] = collect($dataAllLineGroupedbyDate)->pluck('avgResponTime')->avg();
                $avgAlldataPerLineAndDate['avgTotalLossTime'] = collect($dataAllLineGroupedbyDate)->pluck('totalLossTime')->avg();
                $avgAlldataPerLineAndDate['avgAvgDeliveryTime'] = collect($dataAllLineGroupedbyDate)->pluck('avgDeliveryTime')->avg();
                $avgAlldataPerLineAndDate['avgTotalDeliveryTime'] = collect($dataAllLineGroupedbyDate)->pluck('totalDeliveryTime')->avg();
                $avgAlldataPerLineAndDate['avgTotalRequestPerDay'] = collect($dataAllLineGroupedbyDate)->pluck('totalRequestPerDay')->avg();
                $avgAlldataPerLineAndDate['avgTotalActualPerDay'] = collect($dataAllLineGroupedbyDate)->pluck('totalActualPerDay')->avg();

                $avgAllDataPerLineAndDate[] = $avgAlldataPerLineAndDate;

                $sumAllDataPerLineAndDate['sumTotalRequest'] = collect($dataAllLineGroupedbyDate)->pluck('totalRequest')->sum();
                $sumAllDataPerLineAndDate['sumResponTime'] = collect($dataAllLineGroupedbyDate)->pluck('avgResponTime')->sum();
                $sumAllDataPerLineAndDate['sumTotalLossTime'] = collect($dataAllLineGroupedbyDate)->pluck('totalLossTime')->sum();
                $sumAllDataPerLineAndDate['sumDeliveryTime'] = collect($dataAllLineGroupedbyDate)->pluck('avgDeliveryTime')->sum();
                $sumAllDataPerLineAndDate['sumTotalDeliveryTime'] = collect($dataAllLineGroupedbyDate)->pluck('totalDeliveryTime')->sum();
                $sumAllDataPerLineAndDate['sumTotalRequestPerDay'] = collect($dataAllLineGroupedbyDate)->pluck('totalRequestPerDay')->sum();
                $sumAllDataPerLineAndDate['sumTotalActualPerDay'] = collect($dataAllLineGroupedbyDate)->pluck('totalActualPerDay')->sum();

                $sumAllDataPerLineAndDate[] = $sumAllDataPerLineAndDate;

            //menampung rata rata ke array
                $rataRataResponTime[] = $avgResAndReq;
                $jumlahTargetPerHari[] = $qtyReqDay;
                $rataRataDeliEndTime[] = $avgDeliEndAndProses;
                $totWaktuDeliveryTime[] = $totWaktuDeliAndReq;
                $jumlahLosTime [] = $totLosTime;
                $jumlahRemarkPerHari [] = $qtyActDay;
        }

        // dump($rataRataResponTime);
        $page='get';
        return view('production/towerLight/reporttower', [
                'stowers' => $stowers,
                'rataRataResponTime' => $rataRataResponTime,
                'rataRataDeliEndTime' => $rataRataDeliEndTime,
                'jumlahTargetPerHari' => $jumlahTargetPerHari,
                'totWaktuDeliveryTime' => $totWaktuDeliveryTime,
                'jumlahLosTime' => $jumlahLosTime,
                'jumlahRemarkPerHari' =>$jumlahRemarkPerHari,
                'avgAllDataPerLineAndDate' => $avgAllDataPerLineAndDate,
                'sumAllDataPerLineAndDate' => $sumAllDataPerLineAndDate,
        ], compact('page'));
    }else{
      return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }

    }

    public function performGet(Request $request)
    {
        
        $stowers = Stower::all();
        $page='performGet';
        $dataBranch = Branch::findorfail($request->branch);
        $bulan = $request->bulan;
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);
         if(
            Stower::where('tanggal','>=', $tanggal_awal)->where('tanggal','<=', $tanggal_akhir)->where('facility',$dataBranch->branchdetail)->count()
       ) {
	    $stowers =Stower::where('facility', $dataBranch->branchdetail)
                ->where('tanggal','>=', $tanggal_awal)->where('tanggal','<=', $tanggal_akhir)
                ->get();


      $stowerGroupedByDate = $stowers->groupBy('tanggal')->values();

      $rataRataResponTime = [];
      $rataRataDeliEndTime = [];
      $totWaktuDeliveryTime = [];
      $jumlahTargetPerHari = [];
      $jumlahLosTime = [];
      $jumlahRemarkPerHari = [];
      $avgAllDataPerLineAndDate = [];
      $sumAllDataPerLineAndDate = [];
      $pemenuhanRequest = [];


        foreach ($stowerGroupedByDate as $stowersByDate) {

            $stowerGroupedByNameAndDate = $stowersByDate->sortBy('namaline')->groupBy('namaline')->values();
            // dump($stowerGroupedByNameAndDate);
            $avgResAndReq = [];
            $avgDeliEndAndProses = [];
            $totWaktuDeliAndReq = [];
            $qtyReqDay = [];
            $qtyActDay = [];
            $totLosTime =[];
            $dataAllLineGroupedbyDate = [];
            $sumdataAllLineGroupedbyDate = [];
            $qtyActAndReq = [];

            foreach ($stowerGroupedByNameAndDate as $stowersByDateAndLine) {

                $differenceResponAndRequest = [];
                $differenceDeliveryAndProses = [];
                $differenceDeliveryAndRequest = [];
                $qtyReqDayGroupedByDateAndName = [];
                $differenceDeliveryAndLosTime = [];
                $qtyActDayGroupedByDateAndName = [];
                $differenceActualAndRequest = [];

                foreach ($stowersByDateAndLine as $stower) {

                     // Remark / QTY Actuall
                    if(gettype((int)$stower->Remark) === "integer" &&  $stower->Remark !== null && (int)$stower->Remark > 0){
                        $qtyActDayGroupedByDateAndName[] = (int)$stower->Remark;
                        $qtyAct = (int)$stower->Remark;
                    } else {
                        $qtyActDayGroupedByDateAndName[] = 0;
                        $qtyAct = 0;
                    }


                    if(gettype((int)$stower->lostim) === "integer" && (int)$stower->lostim > 0){
                        $lossTime = (int)$stower->lostim;
                    } else {
                        $lossTime = 0;
                    }
                    // dd($lossTime);
                    // Delivery End
                    if ($stower->deliend !== "" && $stower->deliend !== null) {
                        $deliendTime = explode(':', $stower->deliend);
                        $deliendJam = ((int) $deliendTime[0]) * 3600;
                        $deliendMenit = ((int) $deliendTime[1]) * 60;
                        $deliendDetik = ((int) $deliendTime[2]);
                        $deliEndTimeSeconds = $deliendJam + $deliendMenit + $deliendDetik;
                    } else {
                        $deliEndTimeSeconds = 0;
                    }

                    // proses end
                     if ($stower->prosesend !== "" && $stower->prosesend !== null) {
                        $prosesendTime = explode(':', $stower->prosesend);
                        $prosesendJam = ((int) $prosesendTime[0]) * 3600;
                        $prosesendMenit = ((int) $prosesendTime[1]) * 60;
                        $prosesendDetik = ((int) $prosesendTime[2]);
                        $prosesEndTimeSeconds = $prosesendJam + $prosesendMenit + $prosesendDetik;
                    } else {
                        $prosesEndTimeSeconds = 0;
                    }

                    // Target perday
                    if(gettype((int)$stower->target_perday) === "integer" && (int)$stower->target_perday > 0){
                        $qtyReqDayGroupedByDateAndName[] = (int)$stower->target_perday;
                        $qtyReq = (int)$stower->target_perday;
                    } else {
                        // dump((int)$stower->target_perday);
                        $qtyReqDayGroupedByDateAndName[] = 0;
                        $qtyReq = 0;
                    }

                    // Response Time
                    if ($stower->resline !== "" && $stower->resline !== null) {
                        $resTime = explode(':', $stower->resline);
                        $resJam = ((int) $resTime[0]) * 3600;
                        $resMenit = ((int) $resTime[1]) * 60;
                        $resDetik = ((int) $resTime[2]);
                        $responTimeSeconds = $resJam + $resMenit + $resDetik;
                    } else {
                        $responTimeSeconds = 0;
                    }

                    // Resquest Time
                    if ($stower->reqlin !== "" && $stower->reqlin !== null) {
                        $reqTime = explode(':', $stower->reqlin);
                        $reqJam = ((int) $reqTime[0]) * 3600;
                        $reqMenit = ((int) $reqTime[1]) * 60;
                        $reqDetik = ((int) $reqTime[2]);
                        $requestTimeSeconds = $reqJam + $reqMenit + $reqDetik;
                    } else {
                        $requestTimeSeconds = 0;
                    }

                    //Hasil selisih dikonversi kembali ke bentuk waktu (Menit)
                   $rawDifferenceResponAndRequest = ($responTimeSeconds - $requestTimeSeconds) / 60;
                    if ($rawDifferenceResponAndRequest < 0){
                        $rawDifferenceResponAndRequest = 0;
                    }
                    $differenceResponAndRequest[] = $rawDifferenceResponAndRequest;

                    $rawDifferenceDeliveryAndRequest = ($deliEndTimeSeconds - $requestTimeSeconds) / 60;
                    if ($rawDifferenceDeliveryAndRequest < 0){
                        $rawDifferenceDeliveryAndRequest = 0;
                    }
                    $differenceDeliveryAndRequest[] = $rawDifferenceDeliveryAndRequest;

                    $rawDifferenceDeliveryAndProses = ($deliEndTimeSeconds - $prosesEndTimeSeconds)/60;
                    if ($rawDifferenceDeliveryAndProses < 0){
                        $rawDifferenceDeliveryAndProses = 0;
                    }
                    $differenceDeliveryAndProses[] = $rawDifferenceDeliveryAndProses;
                    $differenceDeliveryAndLosTime[] = ($lossTime);
                }

                            //    dump($differenceDeliveryAndProses );
                $avgResAndReq[] = collect($differenceResponAndRequest)->avg();
                $avgDeliEndAndProses[] = collect($differenceDeliveryAndProses)->avg(); //avg()
                $totWaktuDeliAndReq[] = collect($differenceDeliveryAndRequest)->sum();
                $qtyReqDay[] = collect($qtyReqDayGroupedByDateAndName)->sum();
                $qtyActDay[] = collect($qtyActDayGroupedByDateAndName)->sum();
                $totLosTime[] = collect($differenceDeliveryAndLosTime)->avg();

                // dump($qtyActAndReq);

                // Total Request pada Line keberapa
                $dataAllLine['totalRequest'] = $stowersByDateAndLine->count();
                $dataAllLine['avgResponTime'] = collect($differenceResponAndRequest)->avg();
                $dataAllLine['totalLossTime'] = collect($differenceDeliveryAndLosTime)->avg();
                $dataAllLine['avgDeliveryTime'] = collect($differenceDeliveryAndProses)->avg();
                $dataAllLine['totalDeliveryTime'] = collect($differenceDeliveryAndRequest)->sum();
                $dataAllLine['totalRequestPerDay'] = collect($qtyReqDayGroupedByDateAndName)->sum();
                $dataAllLine['totalActualPerDay'] = collect($qtyActDayGroupedByDateAndName)->sum();
                $dataAllLine['totalActualAndReq'] = collect($qtyActDayGroupedByDateAndName)->sum();

                $dataAllLineGroupedbyDate[] = $dataAllLine;
            }

            //rata-rata untuk setiap line
            $avgAllDataPerLineAndDate[] = [
                'avgTotalRequest' => collect($dataAllLineGroupedbyDate)->pluck('totalRequest')->avg(),
                'avgAvgResponTime' => collect($dataAllLineGroupedbyDate)->pluck('avgResponTime')->avg(),
                'avgAvgDeliveryTime' => collect($dataAllLineGroupedbyDate)->pluck('avgDeliveryTime')->avg(),
                'avgTotalLossTime' =>collect($dataAllLineGroupedbyDate)->pluck('totalLossTime')->avg(),
                'avgTotalDeliveryTime' =>collect($dataAllLineGroupedbyDate)->pluck('totalDeliveryTime')->avg(),
                'avgTotalRequestPerDay' =>collect($dataAllLineGroupedbyDate)->pluck('totalRequestPerDay')->avg(),
                'avgTotalActualPerDay' => collect($dataAllLineGroupedbyDate)->pluck('totalActualPerDay')->avg(),
            ];

            $qtyActAndReq[] = (
                collect($dataAllLineGroupedbyDate)->pluck('totalActualPerDay')->avg() /
                collect($dataAllLineGroupedbyDate)->pluck('totalRequestPerDay')->avg()
            ) * 100;

            // $avgAllDataPerLineAndDate[] = $avgAlldataPerLineAndDate;

            $sumAllDataPerLineAndDate[] = [
                'sumTotalRequest' => collect($dataAllLineGroupedbyDate)->pluck('totalRequest')->sum(),
                'sumResponTime' => collect($dataAllLineGroupedbyDate)->pluck('avgResponTime')->sum(),
                'sumTotalLossTime' => collect($dataAllLineGroupedbyDate)->pluck('totalLossTime')->sum(),
                'sumDeliveryTime' => collect($dataAllLineGroupedbyDate)->pluck('avgDeliveryTime')->sum(),
                'sumTotalDeliveryTime' => collect($dataAllLineGroupedbyDate)->pluck('totalDeliveryTime')->sum(),
                'sumTotalRequestPerDay' =>collect($dataAllLineGroupedbyDate)->pluck('totalRequestPerDay')->sum(),
                'sumTotalActualPerDay' => collect($dataAllLineGroupedbyDate)->pluck('totalActualPerDay')->sum(),
                'sumTotalActualAndReq' => collect($dataAllLineGroupedbyDate)->pluck('totalActualAndReq')->sum(),
            ];

            $rataRataResponTime[] = $avgResAndReq;
            $jumlahTargetPerHari[] = $qtyReqDay;
            $rataRataDeliEndTime[] = $avgDeliEndAndProses;
            $totWaktuDeliveryTime[] = $totWaktuDeliAndReq;
            $jumlahLosTime [] = $totLosTime;
            $jumlahRemarkPerHari [] = $qtyActDay;
            $pemenuhanRequest[] = $qtyActAndReq;
        }

          $page='performGet';
        return view('production/towerLight/perform',[
            'stowers' => $stowers,
            'avgAllDataPerLineAndDate' => $avgAllDataPerLineAndDate,
            'pemenuhanRequest' => $pemenuhanRequest,
            'sumAllDataPerLineAndDate' => $sumAllDataPerLineAndDate,
        ], compact('page'));
         }else{
        return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }

    }

    public function chartGet(Request $request)
    {

        $stowers = Stower::all();
        $dataBranch = Branch::findorfail($request->branch);
        $bulan = $request->bulan;
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);

         if(
            Stower::where('tanggal','>=', $tanggal_awal)->where('tanggal','<=', $tanggal_akhir)->where('facility',$dataBranch->branchdetail)->count()
       ) {
	    $stowers =Stower::where('facility', $dataBranch->branchdetail)
                ->where('tanggal','>=', $tanggal_awal)->where('tanggal','<=', $tanggal_akhir)
                ->get();


          $stowerFilteredByDate = $stowers->filter(function ($stower) {
            return $stower->tanggal !== null && $stower->tanggal !== "";
        });
        $dateResult = [];
        $stowers = Stower::all();
        foreach($stowerFilteredByDate->groupBy('tanggal')->values() as $keyDate => $stowersByDate){
            foreach($stowersByDate->sortBy('namaline')->groupBy('namaline')->values() as $keyName => $stowersByDateAndName){
                if($keyName === 0){
                    array_push($dateResult, $stowersByDate->first()->tanggal);
                }
            }

        }

        // dd($dateResult);
        $stowerGroupedByDate = $stowerFilteredByDate->groupBy('tanggal')->values();

        $rataRataResponTime = [];
        $rataRataDeliEndTime = [];
        $totWaktuDeliveryTime = [];
        $jumlahTargetPerHari = [];
        $jumlahLosTime = [];
        $jumlahRemarkPerHari = [];
        $avgAllDataPerLineAndDate = [];
        $sumAllDataPerLineAndDate = [];
        $pemenuhanRequest = [];

        foreach ($stowerGroupedByDate as $key => $stowersByDate) {

            $stowerGroupedByNameAndDate = $stowersByDate->sortBy('namaline')->groupBy('namaline')->values(); //ini group berdasarkan namaline
            // dump($stowerGroupedByNameAndDate);
            $avgResAndReq = [];
            $avgDeliEndAndProses = [];
            $totWaktuDeliAndReq = [];
            $qtyReqDay = [];
            $qtyActDay = [];
            $totLosTime =[];
            $dataAllLineGroupedbyDate = [];
            $sumdataAllLineGroupedbyDate = [];
            $qtyActAndReq = [];

            foreach ($stowerGroupedByNameAndDate as $stowersByDateAndLine) {

                $differenceResponAndRequest = [];
                $differenceDeliveryAndProses = [];
                $differenceDeliveryAndRequest = [];
                $qtyReqDayGroupedByDateAndName = [];
                $differenceDeliveryAndLosTime = [];
                $qtyActDayGroupedByDateAndName = [];
                $differenceActualAndRequest = [];

                foreach ($stowersByDateAndLine as $stower) {

                     // Remark / QTY Actuall
                    if(gettype((int)$stower->Remark) === "integer" &&  $stower->Remark !== null && (int)$stower->Remark > 0){
                        $qtyActDayGroupedByDateAndName[] = (int)$stower->Remark;
                        $qtyAct = (int)$stower->Remark;
                    } else {
                        $qtyActDayGroupedByDateAndName[] = 0;
                        $qtyAct = 0;
                    }
                    // dump((int)$stower->Remark);

                    if(gettype((int)$stower->lostim) === "integer" && (int)$stower->lostim > 0){
                        $lossTime = (int)$stower->lostim;
                    } else {
                        $lossTime = 0;
                    }
                    // dd($lossTime);
                    // Delivery End
                    if ($stower->deliend !== "" && $stower->deliend !== null) {
                        $deliendTime = explode(':', $stower->deliend);
                        $deliendJam = ((int) $deliendTime[0]) * 3600;
                        $deliendMenit = ((int) $deliendTime[1]) * 60;
                        $deliendDetik = ((int) $deliendTime[2]);
                        $deliEndTimeSeconds = $deliendJam + $deliendMenit + $deliendDetik;
                    } else {
                        $deliEndTimeSeconds = 0;
                    }

                    // proses end
                     if ($stower->prosesend !== "" && $stower->prosesend !== null) {
                        $prosesendTime = explode(':', $stower->prosesend);
                        $prosesendJam = ((int) $prosesendTime[0]) * 3600;
                        $prosesendMenit = ((int) $prosesendTime[1]) * 60;
                        $prosesendDetik = ((int) $prosesendTime[2]);
                        $prosesEndTimeSeconds = $prosesendJam + $prosesendMenit + $prosesendDetik;
                    } else {
                        $prosesEndTimeSeconds = 0;
                    }

                    // Target perday
                    if(gettype((int)$stower->target_perday) === "integer" && (int)$stower->target_perday > 0){
                        $qtyReqDayGroupedByDateAndName[] = (int)$stower->target_perday;
                        $qtyReq = (int)$stower->target_perday;
                    } else {
                        // dump((int)$stower->target_perday);
                        $qtyReqDayGroupedByDateAndName[] = 0;
                        $qtyReq = 0;
                    }

                    // Response Time
                    if ($stower->resline !== "" && $stower->resline !== null) {
                        $resTime = explode(':', $stower->resline);
                        $resJam = ((int) $resTime[0]) * 3600;
                        $resMenit = ((int) $resTime[1]) * 60;
                        $resDetik = ((int) $resTime[2]);
                        $responTimeSeconds = $resJam + $resMenit + $resDetik;
                    } else {
                        $responTimeSeconds = 0;
                    }

                    // Resquest Time
                    if ($stower->reqlin !== "" && $stower->reqlin !== null) {
                        $reqTime = explode(':', $stower->reqlin);
                        $reqJam = ((int) $reqTime[0]) * 3600;
                        $reqMenit = ((int) $reqTime[1]) * 60;
                        $reqDetik = ((int) $reqTime[2]);
                        $requestTimeSeconds = $reqJam + $reqMenit + $reqDetik;
                    } else {
                        $requestTimeSeconds = 0;
                    }

                   $rawDifferenceResponAndRequest = ($responTimeSeconds - $requestTimeSeconds) / 60;
                    if ($rawDifferenceResponAndRequest < 0){
                        $rawDifferenceResponAndRequest = 0;
                    }
                    $differenceResponAndRequest[] = $rawDifferenceResponAndRequest;

                    $rawDifferenceDeliveryAndRequest = ($deliEndTimeSeconds - $requestTimeSeconds) / 60;
                    if ($rawDifferenceDeliveryAndRequest < 0){
                        $rawDifferenceDeliveryAndRequest = 0;
                    }
                    $differenceDeliveryAndRequest[] = $rawDifferenceDeliveryAndRequest;

                    $rawDifferenceDeliveryAndProses = ($deliEndTimeSeconds - $prosesEndTimeSeconds)/60;
                    if ($rawDifferenceDeliveryAndProses < 0){
                        $rawDifferenceDeliveryAndProses = 0;
                    }
                    $differenceDeliveryAndProses[] = $rawDifferenceDeliveryAndProses;
                    $differenceDeliveryAndLosTime[] = ($lossTime);
                }

                $avgResAndReq[] = collect($differenceResponAndRequest)->avg();
                $avgDeliEndAndProses[] = collect($differenceDeliveryAndProses)->avg();
                $totWaktuDeliAndReq[] = collect($differenceDeliveryAndRequest)->sum();
                $qtyReqDay[] = collect($qtyReqDayGroupedByDateAndName)->sum();
                $qtyActDay[] = collect($qtyActDayGroupedByDateAndName)->sum();
                $totLosTime[] = collect($differenceDeliveryAndLosTime)->avg();

                // dump($qtyActAndReq);

                // Total Request pada Line keberapa
                $dataAllLine['totalRequest'] = $stowersByDateAndLine->count();
                $dataAllLine['avgResponTime'] = collect($differenceResponAndRequest)->avg();
                $dataAllLine['totalLossTime'] = collect($differenceDeliveryAndLosTime)->avg();
                $dataAllLine['avgDeliveryTime'] = collect($differenceDeliveryAndProses)->avg();
                $dataAllLine['totalDeliveryTime'] = collect($differenceDeliveryAndRequest)->sum();
                $dataAllLine['totalRequestPerDay'] = collect($qtyReqDayGroupedByDateAndName)->sum();
                $dataAllLine['totalActualPerDay'] = collect($qtyActDayGroupedByDateAndName)->sum();
                $dataAllLine['totalActualAndReq'] = collect($qtyActDayGroupedByDateAndName)->sum();

                $dataAllLineGroupedbyDate[] = $dataAllLine;
            }
        // dd($dataAllLineGroupedbyDate);
            //rata-rata untuk setiap line
            $avgAllDataPerLineAndDate[] = [

                'avgAvgResponTime' => collect($dataAllLineGroupedbyDate)->pluck('avgResponTime')->avg(),
                'avgAvgDeliveryTime' => collect($dataAllLineGroupedbyDate)->pluck('avgDeliveryTime')->avg(),
                'avgTotalLossTime' =>collect($dataAllLineGroupedbyDate)->pluck('totalLossTime')->avg(),
                'avgTotalDeliveryTime' =>collect($dataAllLineGroupedbyDate)->pluck('totalDeliveryTime')->avg(),
                'avgtotalRequestPerDay' =>collect($dataAllLineGroupedbyDate)->pluck('totalRequestPerDay')->sum(),
                'avgtotalActualPerDay' =>collect($dataAllLineGroupedbyDate)->pluck('totalActualPerDay')->sum(),

            ];

            $qtyActAndReq[] = (
                collect($dataAllLineGroupedbyDate)->pluck('totalActualPerDay')->avg() /
                collect($dataAllLineGroupedbyDate)->pluck('totalRequestPerDay')->avg()
            ) * 100;

            // $avgAllDataPerLineAndDate[] = $avgAlldataPerLineAndDate;

            $sumAllDataPerLineAndDate[] = [
                'sumTotalRequest' => collect($dataAllLineGroupedbyDate)->pluck('totalRequest')->sum(),
                'sumTotalRequestPerDay' =>collect($dataAllLineGroupedbyDate)->pluck('totalRequestPerDay')->sum(),
                'sumTotalActualPerDay' => collect($dataAllLineGroupedbyDate)->pluck('totalActualPerDay')->sum(),
                'sumTotalActualAndReq' => collect($dataAllLineGroupedbyDate)->pluck('totalActualAndReq')->sum(),
            ];

                //menampung rata rata ke array
                $rataRataResponTime[] = $avgResAndReq;
                $jumlahTargetPerHari[] = $qtyReqDay;
                $rataRataDeliEndTime[] = $avgDeliEndAndProses;
                $totWaktuDeliveryTime[] = $totWaktuDeliAndReq;
                $jumlahLosTime [] = $totLosTime;
                $jumlahRemarkPerHari [] = $qtyActDay;


            $pemenuhanRequest[] = $qtyActAndReq;
        }
        $page='chartGet';
        return view('production/towerLight/grafik',[
            'dateResult' => $dateResult,
            'jumlahTargetPerHari'=> $jumlahTargetPerHari,
            'avgAllDataPerLineAndDate' => $avgAllDataPerLineAndDate,
            'sumAllDataPerLineAndDate' => $sumAllDataPerLineAndDate,
        ], compact('page'));
        }else{
        return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }

    }

    public function data(Request $request)
    {
         $dataBranch = Branch::all();
         $page = 'data';
         
         $data = Stower::all();
        if ($request->ajax()) {
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('production/towerLight/data' , compact('page'));
    }
    public function getData(Request $request)
    {
        $page = 'getData';
        $dataBranch = Branch::findorfail($request->branch);
        $bulan = $request->bulan;
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tanggal_awal = (new  kodebulan)->tanggal_awal($bulan);
        $tanggal_akhir = (new  kodebulan)->tanggal_akhir($bulan);
         if(
           Stower::where('tanggal','>=', $tanggal_awal)->where('tanggal','<=', $tanggal_akhir)->where('facility',$dataBranch->branchdetail)->count()
       ) {
	    $stowers =Stower::where('facility', $dataBranch->branchdetail)
                ->where('tanggal','>=', $tanggal_awal)->where('tanggal','<=', $tanggal_akhir)
                ->get();

        return view('production/towerLight/data' , compact('page'));
    }else{
       return redirect()->back()->with(['error' => 'Data Kosong !!']);
        }
    }
    // report andon
  

    //tampilan halaman grafik
    public function grafik(Request $request)
    {
        $page = 'grafik';
        
        // dd($dataBranch);
        return view('production/towerLight/grafik' , compact('page'));
        
    }

    public function grafikBatang()
    {
         $dataBranch = Branch::all();
          $page = 'grafikBatang';
        return view('production/towerLight/grafikBatang', compact('page'));
    }

    public function getAvgTotalResponseTime(Request $request)
    {
        
      
         $stowers =Stower::where('facility', 'GM2')
                ->where('tanggal','>=', '2022-03-01')->where('tanggal','<=', '2022-03-31')
                ->get();
          $stowerFilteredByDate = $stowers->filter(function ($stower) {
            return $stower->tanggal !== null && $stower->tanggal !== "";
        });
        $dateResult = [];
        foreach($stowerFilteredByDate->groupBy('tanggal')->values() as $keyDate => $stowersByDate){
            foreach($stowersByDate->sortBy('namaline')->groupBy('namaline')->values() as $keyName => $stowersByDateAndName){
                if($keyName === 0){
                    array_push($dateResult, $stowersByDate->first()->tanggal);
                }
            }

        }

        // dd($stowerFilteredByDate);
        $stowerGroupedByDate = $stowerFilteredByDate->groupBy('tanggal')->values();

        $rataRataResponTime = [];
        $rataRataDeliEndTime = [];
        $totWaktuDeliveryTime = [];
        $jumlahTargetPerHari = [];
        $jumlahLosTime = [];
        $jumlahRemarkPerHari = [];
        $avgAllDataPerLineAndDate = [];
        $sumAllDataPerLineAndDate = [];
        $pemenuhanRequest = [];

        foreach ($stowerGroupedByDate as $key => $stowersByDate) {

            $stowerGroupedByNameAndDate = $stowersByDate->sortBy('namaline')->groupBy('namaline')->values(); //ini group berdasarkan namaline
            // dump($stowerGroupedByNameAndDate);
            $avgResAndReq = [];
            $avgDeliEndAndProses = [];
            $totWaktuDeliAndReq = [];
            $qtyReqDay = [];
            $qtyActDay = [];
            $totLosTime =[];
            $dataAllLineGroupedbyDate = [];
            $sumdataAllLineGroupedbyDate = [];
            $qtyActAndReq = [];

            foreach ($stowerGroupedByNameAndDate as $stowersByDateAndLine) {

                $differenceResponAndRequest = [];
                $differenceDeliveryAndProses = [];
                $differenceDeliveryAndRequest = [];
                $qtyReqDayGroupedByDateAndName = [];
                $differenceDeliveryAndLosTime = [];
                $qtyActDayGroupedByDateAndName = [];
                $differenceActualAndRequest = [];

                foreach ($stowersByDateAndLine as $stower) {

                     // Remark / QTY Actuall
                    if(gettype((int)$stower->Remark) === "integer" &&  $stower->Remark !== null && (int)$stower->Remark > 0){
                        $qtyActDayGroupedByDateAndName[] = (int)$stower->Remark;
                        $qtyAct = (int)$stower->Remark;
                    } else {
                        $qtyActDayGroupedByDateAndName[] = 0;
                        $qtyAct = 0;
                    }
                    // dump((int)$stower->Remark);

                    if(gettype((int)$stower->lostim) === "integer" && (int)$stower->lostim > 0){
                        $lossTime = (int)$stower->lostim;
                    } else {
                        $lossTime = 0;
                    }
                    // dd($lossTime);
                    // Delivery End
                    if ($stower->deliend !== "" && $stower->deliend !== null) {
                        $deliendTime = explode(':', $stower->deliend);
                        $deliendJam = ((int) $deliendTime[0]) * 3600;
                        $deliendMenit = ((int) $deliendTime[1]) * 60;
                        $deliendDetik = ((int) $deliendTime[2]);
                        $deliEndTimeSeconds = $deliendJam + $deliendMenit + $deliendDetik;
                    } else {
                        $deliEndTimeSeconds = 0;
                    }

                    // proses end
                     if ($stower->prosesend !== "" && $stower->prosesend !== null) {
                        $prosesendTime = explode(':', $stower->prosesend);
                        $prosesendJam = ((int) $prosesendTime[0]) * 3600;
                        $prosesendMenit = ((int) $prosesendTime[1]) * 60;
                        $prosesendDetik = ((int) $prosesendTime[2]);
                        $prosesEndTimeSeconds = $prosesendJam + $prosesendMenit + $prosesendDetik;
                    } else {
                        $prosesEndTimeSeconds = 0;
                    }

                    // Target perday
                    if(gettype((int)$stower->target_perday) === "integer" && (int)$stower->target_perday > 0){
                        $qtyReqDayGroupedByDateAndName[] = (int)$stower->target_perday;
                        $qtyReq = (int)$stower->target_perday;
                    } else {
                        // dump((int)$stower->target_perday);
                        $qtyReqDayGroupedByDateAndName[] = 0;
                        $qtyReq = 0;
                    }

                    // Response Time
                    if ($stower->resline !== "" && $stower->resline !== null) {
                        $resTime = explode(':', $stower->resline);
                        $resJam = ((int) $resTime[0]) * 3600;
                        $resMenit = ((int) $resTime[1]) * 60;
                        $resDetik = ((int) $resTime[2]);
                        $responTimeSeconds = $resJam + $resMenit + $resDetik;
                    } else {
                        $responTimeSeconds = 0;
                    }

                    // Resquest Time
                    if ($stower->reqlin !== "" && $stower->reqlin !== null) {
                        $reqTime = explode(':', $stower->reqlin);
                        $reqJam = ((int) $reqTime[0]) * 3600;
                        $reqMenit = ((int) $reqTime[1]) * 60;
                        $reqDetik = ((int) $reqTime[2]);
                        $requestTimeSeconds = $reqJam + $reqMenit + $reqDetik;
                    } else {
                        $requestTimeSeconds = 0;
                    }

                   $rawDifferenceResponAndRequest = ($responTimeSeconds - $requestTimeSeconds) / 60;
                    if ($rawDifferenceResponAndRequest < 0){
                        $rawDifferenceResponAndRequest = 0;
                    }
                    $differenceResponAndRequest[] = $rawDifferenceResponAndRequest;

                    $rawDifferenceDeliveryAndRequest = ($deliEndTimeSeconds - $requestTimeSeconds) / 60;
                    if ($rawDifferenceDeliveryAndRequest < 0){
                        $rawDifferenceDeliveryAndRequest = 0;
                    }
                    $differenceDeliveryAndRequest[] = $rawDifferenceDeliveryAndRequest;

                    $rawDifferenceDeliveryAndProses = ($deliEndTimeSeconds - $prosesEndTimeSeconds)/60;
                    if ($rawDifferenceDeliveryAndProses < 0){
                        $rawDifferenceDeliveryAndProses = 0;
                    }
                    $differenceDeliveryAndProses[] = $rawDifferenceDeliveryAndProses;
                    $differenceDeliveryAndLosTime[] = ($lossTime);
                }

                $avgResAndReq[] = collect($differenceResponAndRequest)->avg();
                $avgDeliEndAndProses[] = collect($differenceDeliveryAndProses)->avg();
                $totWaktuDeliAndReq[] = collect($differenceDeliveryAndRequest)->sum();
                $qtyReqDay[] = collect($qtyReqDayGroupedByDateAndName)->sum();
                $qtyActDay[] = collect($qtyActDayGroupedByDateAndName)->sum();
                $totLosTime[] = collect($differenceDeliveryAndLosTime)->avg();

                // dump($qtyActAndReq);

                // Total Request pada Line keberapa
                $dataAllLine['totalRequest'] = $stowersByDateAndLine->count();
                $dataAllLine['avgResponTime'] = collect($differenceResponAndRequest)->avg();
                $dataAllLine['totalLossTime'] = collect($differenceDeliveryAndLosTime)->avg();
                $dataAllLine['avgDeliveryTime'] = collect($differenceDeliveryAndProses)->avg();
                $dataAllLine['totalDeliveryTime'] = collect($differenceDeliveryAndRequest)->sum();
                $dataAllLine['totalRequestPerDay'] = collect($qtyReqDayGroupedByDateAndName)->sum();
                $dataAllLine['totalActualPerDay'] = collect($qtyActDayGroupedByDateAndName)->sum();
                $dataAllLine['totalActualAndReq'] = collect($qtyActDayGroupedByDateAndName)->sum();

                $dataAllLineGroupedbyDate[] = $dataAllLine;
            }
        // dd($dataAllLineGroupedbyDate);
            //rata-rata untuk setiap line
            $avgAllDataPerLineAndDate[] = [

                'avgAvgResponTime' => collect($dataAllLineGroupedbyDate)->pluck('avgResponTime')->avg(),
                'avgAvgDeliveryTime' => collect($dataAllLineGroupedbyDate)->pluck('avgDeliveryTime')->avg(),
                'avgTotalLossTime' =>collect($dataAllLineGroupedbyDate)->pluck('totalLossTime')->avg(),
                'avgTotalDeliveryTime' =>collect($dataAllLineGroupedbyDate)->pluck('totalDeliveryTime')->avg(),
                'avgtotalRequestPerDay' =>collect($dataAllLineGroupedbyDate)->pluck('totalRequestPerDay')->sum(),
                'avgtotalActualPerDay' =>collect($dataAllLineGroupedbyDate)->pluck('totalActualPerDay')->sum(),

            ];

            $qtyActAndReq[] = (
                collect($dataAllLineGroupedbyDate)->pluck('totalActualPerDay')->avg() /
                collect($dataAllLineGroupedbyDate)->pluck('totalRequestPerDay')->avg()
            ) * 100;

            // $avgAllDataPerLineAndDate[] = $avgAlldataPerLineAndDate;

            $sumAllDataPerLineAndDate[] = [
                'sumTotalRequest' => collect($dataAllLineGroupedbyDate)->pluck('totalRequest')->sum(),
                'sumTotalRequestPerDay' =>collect($dataAllLineGroupedbyDate)->pluck('totalRequestPerDay')->sum(),
                'sumTotalActualPerDay' => collect($dataAllLineGroupedbyDate)->pluck('totalActualPerDay')->sum(),
                'sumTotalActualAndReq' => collect($dataAllLineGroupedbyDate)->pluck('totalActualAndReq')->sum(),
            ];

                //menampung rata rata ke array
                $rataRataResponTime[] = $avgResAndReq;
                $jumlahTargetPerHari[] = $qtyReqDay;
                $rataRataDeliEndTime[] = $avgDeliEndAndProses;
                $totWaktuDeliveryTime[] = $totWaktuDeliAndReq;
                $jumlahLosTime [] = $totLosTime;
                $jumlahRemarkPerHari [] = $qtyActDay;


            $pemenuhanRequest[] = $qtyActAndReq;
        }
        // return response()->json($dataAllLineGroupedbyDate);
        return response([
            'dateResult' => $dateResult,
            'jumlahTargetPerHari'=> $jumlahTargetPerHari,
            'avgAllDataPerLineAndDate' => $avgAllDataPerLineAndDate,
            'sumAllDataPerLineAndDate' => $sumAllDataPerLineAndDate,
        ], Response::HTTP_OK);
    }

}