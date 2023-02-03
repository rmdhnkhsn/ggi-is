<?php

namespace App\Services\Rework\Report;

use App\Branch;
use App\LineDetail;
use App\MasterLine;

class allfacility{
        public function tahunan($dataBulan, $dataBranch)
        {
              $datax = [];
              foreach ($dataBranch as $key => $value) {
                      $masterLine = MasterLine::where('branch', $value->kode_branch)->where('branch_detail', $value->branchdetail)->get();
                      foreach ($masterLine as $key2 => $value2) {
                              $datax[] = [
                                      'branch' => $value->nama_branch,
                                      'id_line' => $value2->id,
                                      'line' => $value2->string1
                              ];
                      }
              }
              
              $datay = [];
              foreach ($datax as $key => $value) {
                      foreach ($dataBulan as $key2 => $value2) {
                              $terpenuhi = LineDetail::where('id_line', $value['id_line'])->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('target_terpenuhi');
                              $total_check = LineDetail::where('id_line', $value['id_line'])->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('total_check');
                              $total_reject = LineDetail::where('id_line', $value['id_line'])->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('total_reject');
                              $datay[] = [
                                'bulan' => $value2['namabulan'],
                                'branch' => $value['branch'],
                                'id_line' => $value['id_line'],
                                'line' => $value['line'],
                                'terpenuhi' => $terpenuhi,
                                'total_check' =>  $total_check,
                                'total_reject' =>  $total_reject,
                              ];
                      }
              }

              $result = collect($datay)->groupby('branch');
              $dataResult = [];
              foreach ($result as $key => $value) {
                        // Januari 
                        $janTerpenuhi = collect($value)->where('bulan', 'January')->sum('terpenuhi');
                        $janReject  = collect($value)->where('bulan', 'January')->sum('total_reject');
                        if ($janTerpenuhi != 0 || $janTerpenuhi != null  ) {
                                $janP_Reject = round($janReject/$janTerpenuhi*100,2);
                        }else{
                                $janP_Reject = 0;
                        }
                        // Februari 
                        $febTerpenuhi = collect($value)->where('bulan', 'February')->sum('terpenuhi');
                        $febReject  = collect($value)->where('bulan', 'February')->sum('total_reject');
                        if ($febTerpenuhi != 0 || $febTerpenuhi != null  ) {
                                $febP_Reject = round($febReject/$febTerpenuhi*100,2);
                        }else{
                                $febP_Reject = 0;
                        }
                        // Maret 
                        $marTerpenuhi = collect($value)->where('bulan', 'March')->sum('terpenuhi');
                        $marReject  = collect($value)->where('bulan', 'March')->sum('total_reject');
                        if ($marTerpenuhi != 0 || $marTerpenuhi != null  ) {
                                $marP_Reject = round($marReject/$marTerpenuhi*100,2);
                        }else{
                                $marP_Reject = 0;
                        }
                        // April 
                        $aprTerpenuhi = collect($value)->where('bulan', 'April')->sum('terpenuhi');
                        $aprReject  = collect($value)->where('bulan', 'April')->sum('total_reject');
                        if ($aprTerpenuhi != 0 || $aprTerpenuhi != null  ) {
                                $aprP_Reject = round($aprReject/$aprTerpenuhi*100,2);
                        }else{
                                $aprP_Reject = 0;
                        }
                        // May
                        $mayTerpenuhi = collect($value)->where('bulan', 'May')->sum('terpenuhi');
                        $mayReject  = collect($value)->where('bulan', 'May')->sum('total_reject');
                        if ($mayTerpenuhi != 0 || $mayTerpenuhi != null  ) {
                                $mayP_Reject = round($mayReject/$mayTerpenuhi*100,2);
                        }else{
                                $mayP_Reject = 0;
                        }
                        // June
                        $junTerpenuhi = collect($value)->where('bulan', 'June')->sum('terpenuhi');
                        $junReject  = collect($value)->where('bulan', 'June')->sum('total_reject');
                        if ($junTerpenuhi != 0 || $junTerpenuhi != null  ) {
                                $junP_Reject = round($junReject/$junTerpenuhi*100,2);
                        }else{
                                $junP_Reject = 0;
                        }
                        // July
                        $julTerpenuhi = collect($value)->where('bulan', 'July')->sum('terpenuhi');
                        $julReject  = collect($value)->where('bulan', 'July')->sum('total_reject');
                        if ($julTerpenuhi != 0 || $julTerpenuhi != null  ) {
                                $julP_Reject = round($julReject/$julTerpenuhi*100,2);
                        }else{
                                $julP_Reject = 0;
                        }
                        // Agustus
                        $agsTerpenuhi = collect($value)->where('bulan', 'August')->sum('terpenuhi');
                        $agsReject  = collect($value)->where('bulan', 'August')->sum('total_reject');
                        if ($agsTerpenuhi != 0 || $agsTerpenuhi != null  ) {
                                $agsP_Reject = round($agsReject/$agsTerpenuhi*100,2);
                        }else{
                                $agsP_Reject = 0;
                        }
                        // September
                        $sepTerpenuhi = collect($value)->where('bulan', 'September')->sum('terpenuhi');
                        $sepReject  = collect($value)->where('bulan', 'September')->sum('total_reject');
                        if ($sepTerpenuhi != 0 || $sepTerpenuhi != null  ) {
                                $sepP_Reject = round($sepReject/$sepTerpenuhi*100,2);
                        }else{
                                $sepP_Reject = 0;
                        }
                        // Oktober 
                        $oktTerpenuhi = collect($value)->where('bulan', 'October')->sum('terpenuhi');
                        $oktReject = collect($value)->where('bulan', 'October')->sum('total_reject');
                        if ($oktTerpenuhi != 0 || $oktTerpenuhi != null  ) {
                                $oktP_Reject = round($oktReject/$oktTerpenuhi*100,2);
                        }else{
                                $oktP_Reject = 0;
                        }
                        // November
                        $novTerpenuhi = collect($value)->where('bulan', 'November')->sum('terpenuhi');
                        $novReject  = collect($value)->where('bulan', 'November')->sum('total_reject');
                        if ($novTerpenuhi != 0 || $novTerpenuhi != null  ) {
                                $novP_Reject = round($novReject/$novTerpenuhi*100,2);
                        }else{
                                $novP_Reject = 0;
                        }
                        // Desember
                        $desTerpenuhi = collect($value)->where('bulan', 'Desember')->sum('terpenuhi');
                        $desReject  = collect($value)->where('bulan', 'Desember')->sum('total_reject');
                        if ($desTerpenuhi != 0 || $desTerpenuhi != null  ) {
                                $desP_Reject = round($desReject/$desTerpenuhi*100,2);
                        }else{
                                $desP_Reject = 0;
                        }

                      $dataResult[] = [
                              'branch' => $key,
                              'janTerpenuhi' => $janTerpenuhi,
                              'janReject' => $janReject,
                              'janP_Reject' => $janP_Reject,
                              'febTerpenuhi' => $febTerpenuhi,
                              'febReject' => $febReject,
                              'febP_Reject' => $febP_Reject,
                              'marTerpenuhi' => $marTerpenuhi,
                              'marReject' => $marReject,
                              'marP_Reject' => $marP_Reject,
                              'aprTerpenuhi' => $aprTerpenuhi,
                              'aprReject' => $aprReject,
                              'aprP_Reject' => $aprP_Reject,
                              'mayTerpenuhi' => $mayTerpenuhi,
                              'mayReject' => $mayReject,
                              'mayP_Reject' => $mayP_Reject,
                              'junTerpenuhi' => $junTerpenuhi,
                              'junReject' => $junReject,
                              'junP_Reject' => $junP_Reject,
                              'julTerpenuhi' => $julTerpenuhi,
                              'julReject' => $julReject,
                              'julP_Reject' => $julP_Reject,
                              'agsTerpenuhi' => $agsTerpenuhi,
                              'agsReject' => $agsReject,
                              'agsP_Reject' => $agsP_Reject,
                              'sepTerpenuhi' => $sepTerpenuhi,
                              'sepReject' => $sepReject,
                              'sepP_Reject' => $sepP_Reject,
                              'oktTerpenuhi' => $oktTerpenuhi,
                              'octReject' => $oktReject,
                              'octP_Reject' => $oktP_Reject,
                              'novTerpenuhi' => $novTerpenuhi,
                              'novReject' => $novReject,
                              'novP_Reject' => $novP_Reject,
                              'desTerpenuhi' => $desTerpenuhi,
                              'desReject' => $desReject,
                              'desP_Reject' => $desP_Reject
                      ];
              }
        //       dd($dataResult);
              return $dataResult;
        }

        public function total($dataReport)
        {
               // Januari 
               $janTerpenuhi = collect($dataReport)->sum('janTerpenuhi');
               $janReject  = collect($dataReport)->sum('janReject');
               if ($janTerpenuhi != 0 || $janTerpenuhi != null  ) {
                       $janP_Reject = round($janReject/$janTerpenuhi*100,2);
               }else{
                       $janP_Reject = 0;
               }
               // Februari 
               $febTerpenuhi = collect($dataReport)->sum('febTerpenuhi');
               $febReject  = collect($dataReport)->sum('febReject');
               if ($febTerpenuhi != 0 || $febTerpenuhi != null  ) {
                       $febP_Reject = round($febReject/$febTerpenuhi*100,2);
               }else{
                       $febP_Reject = 0;
               }
               // Maret 
               $marTerpenuhi = collect($dataReport)->sum('marTerpenuhi');
               $marReject  = collect($dataReport)->sum('marReject');
               if ($marTerpenuhi != 0 || $marTerpenuhi != null  ) {
                       $marP_Reject = round($marReject/$marTerpenuhi*100,2);
               }else{
                       $marP_Reject = 0;
               }
               // April 
               $aprTerpenuhi = collect($dataReport)->sum('aprTerpenuhi');
               $aprReject  = collect($dataReport)->sum('aprReject');
               if ($aprTerpenuhi != 0 || $aprTerpenuhi != null  ) {
                       $aprP_Reject = round($aprReject/$aprTerpenuhi*100,2);
               }else{
                       $aprP_Reject = 0;
               }
               // May
               $mayTerpenuhi = collect($dataReport)->sum('mayTerpenuhi');
               $mayReject  = collect($dataReport)->sum('mayReject');
               if ($mayTerpenuhi != 0 || $mayTerpenuhi != null  ) {
                       $mayP_Reject = round($mayReject/$mayTerpenuhi*100,2);
               }else{
                       $mayP_Reject = 0;
               }
               // June
               $junTerpenuhi = collect($dataReport)->sum('junTerpenuhi');
               $junReject  = collect($dataReport)->sum('junReject');
               if ($junTerpenuhi != 0 || $junTerpenuhi != null  ) {
                       $junP_Reject = round($junReject/$junTerpenuhi*100,2);
               }else{
                       $junP_Reject = 0;
               }
               // July
               $julTerpenuhi = collect($dataReport)->sum('julTerpenuhi');
               $julReject  = collect($dataReport)->sum('julReject');
               if ($julTerpenuhi != 0 || $julTerpenuhi != null  ) {
                       $julP_Reject = round($julReject/$julTerpenuhi*100,2);
               }else{
                       $julP_Reject = 0;
               }
               // Agustus
               $agsTerpenuhi = collect($dataReport)->sum('agsTerpenuhi');
               $agsReject  = collect($dataReport)->sum('agsReject');
               if ($agsTerpenuhi != 0 || $agsTerpenuhi != null  ) {
                       $agsP_Reject = round($agsReject/$agsTerpenuhi*100,2);
               }else{
                       $agsP_Reject = 0;
               }
               // September
               $sepTerpenuhi = collect($dataReport)->sum('sepTerpenuhi');
               $sepReject  = collect($dataReport)->sum('sepReject');
               if ($sepTerpenuhi != 0 || $sepTerpenuhi != null  ) {
                       $sepP_Reject = round($sepReject/$sepTerpenuhi*100,2);
               }else{
                       $sepP_Reject = 0;
               }
               // Oktober 
               $oktTerpenuhi = collect($dataReport)->sum('oktTerpenuhi');
        //        dd($oktTerpenuhi);
               $oktReject = collect($dataReport)->sum('octReject');
        //        dd($oktReject);
               if ($oktTerpenuhi != 0 || $oktTerpenuhi != null  ) {
                       $oktP_Reject = round($oktReject/$oktTerpenuhi*100,2);
               }else{
                       $oktP_Reject = 0;
               }
               // November
               $novTerpenuhi = collect($dataReport)->sum('novTerpenuhi');
               $novReject  = collect($dataReport)->sum('novReject');
               if ($novTerpenuhi != 0 || $novTerpenuhi != null  ) {
                       $novP_Reject = round($novReject/$novTerpenuhi*100,2);
               }else{
                       $novP_Reject = 0;
               }
               // Desember
               $desTerpenuhi = collect($dataReport)->sum('desTerpenuhi');
               $desReject  = collect($dataReport)->sum('desReject');
               if ($desTerpenuhi != 0 || $desTerpenuhi != null  ) {
                       $desP_Reject = round($desReject/$desTerpenuhi*100,2);
               }else{
                       $desP_Reject = 0;
               }

               $dataResult = [
                        'janTerpenuhi' => $janTerpenuhi,
                        'janReject' => $janReject,
                        'janP_Reject' => $janP_Reject,
                        'febTerpenuhi' => $febTerpenuhi,
                        'febReject' => $febReject,
                        'febP_Reject' => $febP_Reject,
                        'marTerpenuhi' => $marTerpenuhi,
                        'marReject' => $marReject,
                        'marP_Reject' => $marP_Reject,
                        'aprTerpenuhi' => $aprTerpenuhi,
                        'aprReject' => $aprReject,
                        'aprP_Reject' => $aprP_Reject,
                        'mayTerpenuhi' => $mayTerpenuhi,
                        'mayReject' => $mayReject,
                        'mayP_Reject' => $mayP_Reject,
                        'junTerpenuhi' => $junTerpenuhi,
                        'junReject' => $junReject,
                        'junP_Reject' => $junP_Reject,
                        'julTerpenuhi' => $julTerpenuhi,
                        'julReject' => $julReject,
                        'julP_Reject' => $julP_Reject,
                        'agsTerpenuhi' => $agsTerpenuhi,
                        'agsReject' => $agsReject,
                        'agsP_Reject' => $agsP_Reject,
                        'sepTerpenuhi' => $sepTerpenuhi,
                        'sepReject' => $sepReject,
                        'sepP_Reject' => $sepP_Reject,
                        'oktTerpenuhi' => $oktTerpenuhi,
                        'octReject' => $oktReject,
                        'octP_Reject' => $oktP_Reject,
                        'novTerpenuhi' => $novTerpenuhi,
                        'novReject' => $novReject,
                        'novP_Reject' => $novP_Reject,
                        'desTerpenuhi' => $desTerpenuhi,
                        'desReject' => $desReject,
                        'desP_Reject' => $desP_Reject
                ];

                // dd($dataResult);
                return $dataResult;
                
        }
}