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
use App\Models\PPIC\ProductionLineOperator;
use App\Models\Cutting\Product_Costing\KodeKerjaKaryawan;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;

class ProductionLineOpServ{

    public function update_data_operator() 
    {
        $master_line=ProductionLine::get();
        // $master_line=ProductionLine::where('id',26)->get();
        foreach ($master_line as $d1) {
            $last_period=KodeKerjaKaryawan::OrderBy('id','desc')->first();
            $total_op=0;
            if ($last_period) {
                $gedung=$d1->sub;
                $line=$d1->line;
                $group='';
                $kategori='';
                
                if ($gedung=='CBA') {
                    $gedung='CBA';
                    $group='';
                    $kategori='';
                } else if ($gedung=='CHW') {
                    $gedung='CHW';
                    $group='';
                    $kategori='';
                } else if ($gedung=='CJL') {
                    $gedung='GC 1';
                    $group='CLN-MZ'.$line; //=
                    $kategori='SEWING'; 
                } else if ($gedung=='CLN') {
                    $gedung='GC 1';
                    $group='CLN-L'.$line; //=
                    $kategori='SEWING'; 
                } else if ($gedung=='CNJ2') {
                    $gedung='CNJ2';
                    $group='';
                    $kategori=''; 
                } else if ($gedung=='CVA') {
                    $gedung='CVA';
                    $group='';
                } else if ($gedung=='KLB') {
                    $gedung='KLB';
                    $group='';
                } else if ($gedung=='MJ1') {
                    $gedung='GM1';
                    $group='GM1-L'.$line; //LIKE
                    $kategori='';
                } else if ($gedung=='MJ2') {
                    $gedung='GM2';
                    $group='GM2-L'.$line; //LIKE
                    $kategori='';
                }

                if ($group!=''||$kategori!='') {
                    $adm=KodeKerjaKaryawan::query();
                    $adm->where('periode',$last_period->periode)
                        ->where('gedung',$gedung);
                    if (in_array($gedung,['GM1','GM2'])) {
                        if ($group!='') {
                            $adm->WhereRaw("(kode_kerja_karyawan.group LIKE '".$group."%')");
                        }
                    } else {
                        if ($group!='') {
                            $adm->Where('group',$group);
                        }
                    }
                    if ($kategori!='') {
                        $adm->Where('kategory',$kategori);
                    }
                    $adm=$adm->get();

                    // if ($d1->id=='2') {
                    //     log::info($periode.' / '.$gedung.' / '.$group.' / '.$kategori);
                    // }

                    $del=ProductionLineOperator::where('production_line_id',$d1->id)->delete();
                    foreach ($adm as $d2) {
                        $found=0;
                        if (strlen($group)==strlen($d2->group)) {
                            $found=1;
                        } else {
                            $line_sub=substr($d2->group,strlen($group),1);
                            if (strtoupper($line_sub)=='A'||strtoupper($line_sub)=='B') {
                                $found=1;
                            }
                        }

                        if ($found==1) {
                            $ins=new ProductionLineOperator();
                            $ins->production_line_id=$d1->id;
                            $ins->periode=$d2->periode;
                            $ins->nik=$d2->nik;
                            $ins->group=$d2->group;
                            $ins->kategori=$d2->kategori;
                            $ins->ishadir=1;
                            $ins->save();
                            $total_op+=1;
                        }
                    }
                }
            }
            $d1->total_operator=($total_op);
            $d1->update();
        }
     
    }

}