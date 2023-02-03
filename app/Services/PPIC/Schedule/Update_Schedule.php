<?php

namespace App\Services\PPIC\Schedule;

use DB;
use Auth;
use DataTables;
use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;

use App\Models\PPIC\ProductionLine;
use App\Models\PPIC\WorkOrder;
use App\Models\PPIC\WorkOrderTarget;
use App\Models\PPIC\Monitoring;
use App\JdeApi;

use App\Services\PPIC\Schedule\Prod_Schedule;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;

class Update_Schedule{

    public function update_progress_produksi() 
    {
        $master_line=ProductionLine::whereRaw("line like 'L%'")->get();
        // $master_line=ProductionLine::whereRaw("line like 'L%'")->where('id',126)->get();
        foreach ($master_line as $d1) {
            $wo=WorkOrder::where('production_line_id',$d1->id)->orderBy('start_date','asc')->first();
            if ($wo) {
                $adj=new Prod_Schedule();
                $wot=$adj->calc_finish_wo($wo->id,$wo->wo_no,$wo->qty_order,$wo->qty_adjsupply,$wo->sewing_good,$wo->qty_target_day,$wo->lc1,$wo->lc2,$wo->lc3,$wo->start_date,$wo->production_line_id);
                $wotarget=WorkOrderTarget::where('workorder_id',$wo->id)->delete();
                $wotarget=WorkOrderTarget::insert($wot);
                $wo->start_date=reset($wot)['target_date'];
                $wo->finish_date=end($wot)['target_date'];
                // $wo->hour_balance=end($wot)['balance_hour'];

                $qty_order=$wo->qty_order;
                foreach ($wot as $d) {
                    $qty_order-=$d['total_hour'];
                    if ($qty_order<=0) {
                        $wo->finish_date=$d['target_date'];
                        $wo->hour_balance=$d['balance_hour'];
                    }
                }
 
                $start=new DateTime(reset($wot)['target_date']);
                $fin=new DateTime(end($wot)['target_date']);
                // $fin=new DateTime($wo->finish_date);

                $interval=$start->diff($fin);

                $wo->day_estimate=$interval->days+1;
                $wo->sewing_good=$wo->progress_produksi_sewing($wo->wo_no,$wo->prod_line->line);
                $wo->update();

                $wot=$adj->adjust_schedule($wo);
            }

        }
     
    }

    public function update_line_sewing_wo_solid() 
    {
        try{
            DB::beginTransaction();
            $sql="
                SELECT wo_no, COUNT(wo_no) AS wo_count 
                FROM `workorder` 
                GROUP BY wo_no HAVING wo_count=1 ORDER BY wo_no
            ";
            $list_wo=collect(DB::connection('mysql_prod_sch')->select(DB::raw($sql)));
            foreach ($list_wo as $k => $v) {
                $findwo=WorkOrder::where('wo_no',$v->wo_no)->first();
                if ($findwo) {
                    $mon=Monitoring::where('wo',$findwo->wo_no)->get();
                    foreach ($mon as $d) {
                        $d->line=$findwo->prod_line->line;
                        $d->update();
                    }
                }
            }
            DB::commit();

        }catch(\Exception $e){
            DB::rollback();
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }

    public function update_wo_jde() 
    {
        try{
            DB::beginTransaction();
            $sql="
                SELECT wo_no, COUNT(wo_no) AS wo_count,qty_order,sewing_good,start_date
                FROM `workorder` 
                GROUP BY wo_no HAVING wo_count=1 ORDER BY wo_no
            ";
            $list_wo=collect(DB::connection('mysql_prod_sch')->select(DB::raw($sql)));
            foreach ($list_wo as $k => $v) {

                if ($v->qty_order>$v->sewing_good) {
                    $wo=WorkOrder::where('wo_no',$v->wo_no)->first();
                    $data_upload=Monitoring::selectRaw('sum(total_outpot) as total,tanggal,line,buyer,style,wo,kode_branch,branchdetail')->where('wo',$v->wo_no)->groupBy('wo')->first();
                    $data_jde=JdeApi::where('F4801_DOCO',$v->wo_no)->first();
                    $total_upload=0;
                    $total_jde=0;

                    if($data_upload!==null) {
                        $total_upload=$data_upload->total;
                    } 
                    if($data_jde!==null) {
                        $total_jde=$data_jde->F4801_SOQS;
                    } 

                    $sisa=$total_jde-$total_upload;
                    if ($sisa>0&&$total_upload&&$total_jde) {
                        $mon=new Monitoring();
                        $mon->tanggal=$wo->start_date;
                        $mon->line=$wo->prod_line->line;
                        $mon->wo=$wo->wo_no;
                        $mon->jam_1=$sisa;
                        $mon->total_outpot=$sisa;
                        $mon->kode_branch=$wo->prod_line->branch->kode_branch;
                        $mon->branchdetail=$wo->prod_line->sub;
                        $mon->save();
                    }
                }
            }
            DB::commit();

        }catch(\Exception $e){
            DB::rollback();
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }

    public function update_wo_output_jde() 
    {
        try{
            DB::beginTransaction();
            $sql="
                SELECT wo_no, COUNT(wo_no) AS wo_count,coalesce(sum(qty_order),0) qty_order,coalesce(sum(sewing_good),0) sewing_good
                FROM `workorder` 
                GROUP BY wo_no ORDER BY wo_no
            ";
            $list_wo=collect(DB::connection('mysql_prod_sch')->select(DB::raw($sql)));
            foreach ($list_wo as $k => $v) {
                if ($v->qty_order>$v->sewing_good) {
                    $wo_jde=JdeApi::where('F4801_DOCO',$v->wo_no)->first();
                    $wo_gcc=WorkOrder::where('wo_no',$v->wo_no)->get();
                    $sisa_allocated=0;
                    $order_jde=0;
                    $order_gcc=$v->qty_order;

                    if ($wo_jde) {
                        $order_jde=$wo_jde->F4801_UORG;
                        $sisa_allocated=$wo_jde->F4801_SOQS-$v->sewing_good;
                    }

                    if ($sisa_allocated>0) {
                        if ($order_gcc==$order_jde) {
                            foreach ($wo_gcc as $k1 => $v1) {
                                $wo_sisa=$v1->qty_order-$v1->sewing_good;
                                if ($wo_sisa>0&&$sisa_allocated>0) {
                                    $qty_ambil=$wo_sisa;
                                    if ($sisa_allocated<$wo_sisa) {
                                        $qty_ambil=$sisa_allocated;
                                    }

                                    $mon=new Monitoring();
                                    $mon->tanggal=$v1->start_date;
                                    $mon->line=$v1->prod_line->line;
                                    $mon->wo=$v1->wo_no;
                                    $mon->jam_1=$qty_ambil;
                                    $mon->total_outpot=$qty_ambil;
                                    $mon->kode_branch=$v1->prod_line->branch->kode_branch;
                                    $mon->branchdetail=$v1->prod_line->sub;
                                    $mon->save();

                                    $sisa_allocated-=$qty_ambil;
                                }
                            }
                        }
                    }
                }
            }
            DB::commit();

        }catch(\Exception $e){
            DB::rollback();
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }

}