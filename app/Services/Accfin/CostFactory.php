<?php

namespace App\Services\Accfin;

use DB;
use Auth;
use App\Branch;
use App\SalesOrder;
use App\WorkOrderJDE;
use App\Models\PPIC\WorkOrder;
use App\Models\PPIC\ProductionLine;
use App\Models\Sewing\MonitoringExcel;
use App\Models\Sewing\TargetLostReason;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class CostFactory{
    public function get_data($dt_dari,$dt_samp,$filter_factory,$filter_wo,$filter_or,$filter_buyer)
    {
        $data=MonitoringExcel::selectRaw("tanggal,branchdetail,line,wo,buyer,SUM(total_outpot) AS output")
                ->where('tanggal','>=',$dt_dari)->where('tanggal','<=',$dt_samp)
                ->groupBy('tanggal')->groupBy('branchdetail')->groupBy('line')->groupBy('wo')
                ->orderBy('tanggal')->orderBy('branchdetail')->orderBy('line')->orderBy('wo')->get();
        $data=$data->map(function ($item){
            $branch=$item->branchdetail;
            $line=$item->line;
            if (in_array($branch,['CBA', 'CHW', 'CLN', 'CNJ2', 'CVA', 'MJ1', 'MJ2'])) {
                // $line=preg_replace("/[^0-9]/", "", $line);
                if (strlen($line>=2)) {
                    $prefix=substr($line,0,1);
                    if ($prefix=="L") {
                        $line=substr($line,1);
                        $line=preg_replace("/[^0-9]/", "", $line);
                        $line=$prefix.$line;
                    } else {
                        $line=preg_replace("/[^0-9]/", "", $line);
                    }
                } else {
                    $line=preg_replace("/[^0-9]/", "", $line);
                }
            }

            $prodline=ProductionLine::where('sub',$branch)->where('line',$line)->first();
            $or_no='';
            $cm=0;
            $cm_amount=0;
            $cost_line=0;

            $buyer='';
            if ($prodline) {
                $wo=WorkOrder::where('wo_no',$item->wo)->where('production_line_id',$prodline->id)->first();
                if ($wo) {
                    if ($wo->rekap_detail) {
                        $cm=$wo->rekap_detail->cm;
                        if ($wo->rekap_detail->quantity_pack!==null&&$wo->rekap_detail->quantity_pack>0&&$wo->rekap_detail->kemasan!=='PC') {
                            // disabled, nilai cm nya sudah diinput by pc
                            // $cm/=$wo->rekap_detail->quantity_pack;
                        }

                        //GET BUYER
                        if ($wo->rekap_detail->no_or) {
                            $wojde=WorkOrderJDE::find($item->wo);
                            if ($wojde) {
                                $sales=SalesOrder::where('F4211_DOCO',$wojde->F4801_RORN)->where('F4211_DCTO',$wojde->F4801_RCTO)->where('F4211_MCU',$wojde->F4801_MCU)->first();
                                if ($sales) {
                                    if ($sales->buyer) {
                                        $buyer=$sales->buyer->F0101_ALPH;
                                    }
                                }
                            }
                        }
                    }
                    $cm_amount=$item->output*$cm;
                    $cost_line=$this->get_factory_cost_month($item->tanggal,$prodline->branch_id);
                }
            }

            if (($item->branchdetail=='CNJ2'&&$item->line=='2')||($item->branchdetail=='CNJ2'&&$item->line=='L2')) {
                //khusus cnj2 line 2, (1/2 kapasitas).
                $cost_line/=2;
                //end check 
            }

            // if (($item->branchdetail=='MJ2'&&$item->line=='1')||($item->branchdetail=='MJ2'&&$item->line=='L1')) {
            //     //khusus maja2 line 1, (1/2 kapasitas).
            //     $cost_line/=2;
            //     //end check 
            // }

            if ($item->branchdetail=='CNJ2'||$item->branchdetail=='CBA'||$item->branchdetail=='CVA') {
                //check untuk jamker 6 hari, sabtu hanya 5 jam.
                if(date('w', strtotime($item->tanggal)) == 6) {
                $cost_line=$cost_line*(5/7);
                }
                //end check 
            }
            $reason=TargetLostReason::where('factory',$item->branchdetail)->where('line',$item->line)->where('tanggal',$item->tanggal)->first();
            if ($reason) {
                $reason=$reason->reason;
            }

            return [
            'tanggal'=>$item->tanggal,
            'branchdetail'=>$item->branchdetail, 
            'line'=>$item->line, 
            'or'=>$wo->rekap_detail->no_or??null, 
            'wo'=>$item->wo, 
            'buyer'=>$buyer, 
            'output'=>$item->output,
            'cm'=>$cm,
            'cm_amount'=>$cm_amount,
            'cost_line'=>$cost_line,
            'reason'=>$reason
            ];
        });

        if ($filter_factory) {
        $data=$data->where('branchdetail',$filter_factory);
        // log::info('filter factory : '.$filter_factory);
        }
        if ($filter_wo) {
        $data=$data->where('wo',$filter_wo);
        // log::info('filter wo : '.$filter_wo);

        }
        if ($filter_or) {
        $data=$data->where('or',$filter_or);
        // log::info('filter or : '.$filter_or);

        }
        if ($filter_buyer) {
        $data=$data->where('buyer',$filter_buyer);
        // log::info('filter buyer : '.$filter_buyer);

        }

        return $data;
    }

    public function get_factory_cost_month($tgl,$brnch_id)
    {
        $month_int = date("m",strtotime($tgl));
        $year_int = date("Y",strtotime($tgl));
        $kolom="jan";
        switch ($month_int) {
            case 2:
                $kolom="feb";
                break;
            case 3:
                $kolom="mar";
                break;
            case 4:
                $kolom="apr";
                break;
            case 5:
                $kolom="may";
                break;
            case 6:
                $kolom="jun";
                break;
            case 7:
                $kolom="jul";
                break;
            case 8:
                $kolom="aug";
                break;
            case 9:
                $kolom="sep";
                break;
            case 10:
                $kolom="oct";
                break;
            case 11:
                $kolom="nov";
                break;
            case 12:
                $kolom="dec";
                break;
            default:
                $kolom="jan";
        }

        $sql="
        SELECT
            cost_factory.".$kolom." as rate
        FROM 
            cost_factory
        WHERE
            branch_id = ".$brnch_id." and
            year = ".$year_int."
        LIMIT 1
        ";
        $cs_temp=collect(DB::connection('mysql_prod_sch')->select(DB::raw($sql)));
        if (count($cs_temp)>0) {
            return $cs_temp[0]->rate;
        }
        return 0;
    }
}