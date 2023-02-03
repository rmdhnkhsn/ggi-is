<?php

namespace App\Services\Audit;

use App\Branch;
use Carbon\Carbon;
use App\Services\Audit\audit;
Use App\Models\Audit\uji;
Use App\Models\Audit\tmpna;
Use App\Models\Audit\ledger;
Use App\Models\Audit\pemasukan;
Use App\Models\Audit\uji_pemasukan;
use App\Models\CommandCenter\CC_audit;


class ccaudit{


    public function menu_uji()
    {
        $dataValue = [
            // rework 
                '0' => ['nama' => "Ledger VS IT Inv",
                        'inisial' => "Anomali",
                        'issues'=> "0",
                        'critical' => '10',
                        'aktif' =>'1'
                        ],
                // '1' => ['nama' => "Test",
                //         'inisial' => "Anomali",
                //         'issues'=> "0",
                //         'critical' => '10',
                //         'aktif' =>'0'
                //         ],
        ];

        return $dataValue;
    }
    public function get_pemasukan($Branch, $tgl_awal, $tgl_akhir)
    {
        $data_pemasukan= uji_pemasukan::where('F564111C_DGL','>=',$tgl_awal)
        ->where('F564111C_DGL','<=',$tgl_akhir)
        ->where('F564111C_MCU',$Branch->kode_jde)
        ->whereIn('F4111_GLPT',['INAC', 'INFA', 'INPA', 'ININ', 'INUM'])
        ->whereIn('F564111C_DCT',['OV','IC','II','I$','RL','S0','I4','IA'])
        ->get();
        return $data_pemasukan;
    }
    public function get_pemasukan_peruser($user,$Branch, $tgl_awal, $tgl_akhir)
    {
        $data_pemasukan= uji_pemasukan::where('F564111C_DGL','>=',$tgl_awal)
        ->where('F564111C_DGL','<=',$tgl_akhir)
        ->where('F564111C_MCU',$Branch->kode_jde)
        ->where('F4111_USER',$user)
        ->whereIn('F4111_GLPT',['INAC', 'INFA', 'INPA', 'ININ', 'INUM'])
        ->whereIn('F564111C_DCT',['OV','IC','II','I$','RL','S0','I4','IA'])
        ->get();
        return $data_pemasukan;
    }

    public function user_pemasukan($pemasukanF)
    {
    $user_pemasukan=[];
    $pemasukan= collect($pemasukanF)->groupBy('F4111_USER');

        foreach ($pemasukan as $key => $value) {
        $user_pemasukan[]=[
               'user'=>$key,
               'count_anomali'=>$value->count(),
           ];
    }
    return $user_pemasukan;
    }

    public function get_pengeluaran($Branch, $tgl_awal, $tgl_akhir)
     {
        $branch=$Branch->kode_jde;
         if(($branch=='1201') OR ($branch=='        1201')){
             $branch='1201';
         }
         elseif (($branch=='1204') OR ($branch=='        1204')) {
             $branch='1204';
         }
         elseif (($branch=='1205') OR ($branch=='        1205')) {
             $branch='1205';
         }
         elseif (($branch=='1206') OR ($branch=='        1206')) {
             $branch='1206';
         }
         $data_pengeluaran= uji::where('F564111H_DGL','>=',$tgl_awal)
         ->where('F564111H_DGL','<=',$tgl_akhir)
         ->where('F564111H_MCU',$branch)
         ->where('F4111_ITM','!=',null)
         ->where('F4111_MCU','!=',null)
         ->whereIn('F4111_GLPT',['INAC', 'INFA', 'INPA', 'ININ', 'INUM'])
        ->whereIn('F564111H_DCT',['OV','IC','II','I$','RL','S0','I4','IA'])
         ->get();
         return $data_pengeluaran;
     }

     public function get_pengeluaran_peruser($user,$Branch, $tgl_awal, $tgl_akhir)
     {
        $branch=$Branch->kode_jde;
         if(($branch=='1201') OR ($branch=='        1201')){
             $branch='1201';
         }
         elseif (($branch=='1204') OR ($branch=='        1204')) {
             $branch='1204';
         }
         elseif (($branch=='1205') OR ($branch=='        1205')) {
             $branch='1205';
         }
         elseif (($branch=='1206') OR ($branch=='        1206')) {
             $branch='1206';
         }
         $data_pengeluaran= uji::where('F564111H_DGL','>=',$tgl_awal)
         ->where('F564111H_DGL','<=',$tgl_akhir)
         ->where('F564111H_MCU',$branch)
         ->where('F4111_USER',$user)
         ->where('F4111_ITM','!=',null)
         ->where('F4111_MCU','!=',null)
         ->whereIn('F4111_GLPT',['INAC', 'INFA', 'INPA', 'ININ', 'INUM'])
        ->whereIn('F564111H_DCT',['OV','IC','II','I$','RL','S0','I4','IA'])
         ->get();
         return $data_pengeluaran;
     }

     public function user_pengeluaran($pengeluaranF)
     {
        $user_pengeluaran=[];
     $pengeluaran= collect($pengeluaranF)->groupBy('F4111_USER');
 
         foreach ($pengeluaran as $key => $value) {
         $user_pengeluaran[]=[
                'user'=>$key,
                'count_anomali'=>$value->count(),
            ];
     }
     return $user_pengeluaran;
     }

    public function uji_na($Branch, $tgl_awal, $tgl_akhir)
    {
        $data_ujina= tmpna::where('F4111_DGL','>=',$tgl_awal)
                            ->where('F4111_DGL','<=',$tgl_akhir)
                            ->where('F4111_MCU',$Branch->kode_jde)
                            ->wherein('F4111_GLPT',['INAC', 'INFA', 'INPA', 'ININ', 'INUM'])
                            ->wherein('F4111_DCT',['OV','IC','II','I$','RL','S0','I4','IA'])
                            ->where('status_na','1')
                            ->get();
        return $data_ujina;
    }

    public function uji_na_peruser($user,$Branch, $tgl_awal, $tgl_akhir)
    {
        $data_ujina= tmpna::where('F4111_DGL','>=',$tgl_awal)
                            ->where('F4111_DGL','<=',$tgl_akhir)
                            ->where('F4111_MCU',$Branch->kode_jde)
                            ->where('F4111_USER',$user)
                            ->wherein('F4111_GLPT',['INAC', 'INFA', 'INPA', 'ININ', 'INUM'])
                            ->wherein('F4111_DCT',['OV','IC','II','I$','RL','S0','I4','IA'])
                            ->where('status_na','1')
                            ->get();
        return $data_ujina;
    }

    public function user_na($anomali_na)
    {
        $user= collect($anomali_na)->groupBy('F4111_USER');
        $user_na=[];
        foreach ($user as $key => $value) {
        $user_na[]=[
               'user'=>$key,
               'count_anomali'=>$value->count(),
           ];
    }
    return $user_na;
    }

    public function anomali_user($user)
    {
        $anomali_user=[];
        $collect= collect($user)->groupBy('user')->map->sum('count_anomali');
        foreach ($collect as $key => $value) {
            $anomali_user[]=[
                'user'=>$key,
                'count_anomali'=>$value,
            ];
            
        }
        return $anomali_user;
    }
    public function jml_anomali($pemasukanF, $pengeluaranF, $anomali_na)
    {
        $pemasukan=count($pemasukanF);
        $pengeluaran=count($pengeluaranF);
        $na=count($anomali_na);
        $total=count($pemasukanF)+count($pengeluaranF)+count($anomali_na);
        $jml_anomali=[
            'pemasukan'         =>$pemasukan,
            'pengeluaran'       =>$pengeluaran,
            'na'                =>$na,
            'total'             =>$total,
            'piechart'          =>[$pemasukan,$pengeluaran,$na,],
        ];
        return $jml_anomali;
    }

    public function get_pemasukan_allfact($tgl_awal, $tgl_akhir)
    {
        $data_pemasukan= uji_pemasukan::where('F564111C_DGL','>=',$tgl_awal)
            ->whereIn('F4111_GLPT',['INAC', 'INFA', 'INPA', 'ININ', 'INUM'])
            ->whereIn('F564111C_DCT',['OV','IC','II','I$','RL','S0','I4','IA'])
            ->get();
        return $data_pemasukan;
    }
    public function get_pengeluaran_allfact( $tgl_awal, $tgl_akhir)
     {
        $data_pengeluaran= uji::where('F564111H_DGL','>=',$tgl_awal)
            ->where('F564111H_DGL','<=',$tgl_akhir)
            ->where('F4111_ITM','!=',null)
            ->where('F4111_MCU','!=',null)
            ->whereIn('F4111_GLPT',['INAC', 'INFA', 'INPA', 'ININ', 'INUM'])
            ->whereIn('F564111H_DCT',['OV','IC','II','I$','RL','S0','I4','IA'])
            ->get();
        return $data_pengeluaran;
     }
     public function uji_na_allfact($tgl_awal, $tgl_akhir)
     {
         $data_ujina= tmpna::where('F4111_DGL','>=',$tgl_awal)
            ->where('F4111_DGL','<=',$tgl_akhir)
            ->wherein('F4111_GLPT',['INAC', 'INFA', 'INPA', 'ININ', 'INUM'])
            ->wherein('F4111_DCT',['OV','IC','II','I$','RL','S0','I4','IA'])
            ->where('status_na','1')
            ->get();
         return $data_ujina;
     }
     public function count_na_allfact($tgl_awal, $tgl_akhir)
     {
         $data_ujina= tmpna::where('F4111_DGL','>=',$tgl_awal)
            ->where('F4111_DGL','<=',$tgl_akhir)
            ->wherein('F4111_GLPT',['INAC', 'INFA', 'INPA', 'ININ', 'INUM'])
            ->wherein('F4111_DCT',['OV','IC','II','I$','RL','S0','I4','IA'])
            ->where('status_na','1')
            ->count();
         return $data_ujina;
     }

     public function ledger($tgl_awal, $tgl_akhir)
     {
         $data_ujina= ledger::where('F4111_DGL','>=',$tgl_awal)
            ->where('F4111_DGL','<=',$tgl_akhir)
            ->wherein('F4111_GLPT',['INAC', 'INFA', 'INPA', 'ININ', 'INUM'])
            ->wherein('F4111_DCT',['OV','IC','II','I$','RL','S0','I4','IA'])
            ->get();
         return $data_ujina;
     }
    public function issu_alfact()
    {
        $tgl_akhir = date('Y-m-d');
        $awal = strtotime($tgl_akhir);
        $akhir= strtotime("-30 day", $awal);
        $tgl_awal=date('Y-m-d', $akhir);

        $pemasukan=(new ccaudit)->get_pemasukan_allfact($tgl_awal,$tgl_akhir);
        $pemasukanF=(new audit)->records_pemasukanf($pemasukan);

        $pengeluaran=(new ccaudit)->get_pengeluaran_allfact($tgl_awal,$tgl_akhir);
        $pengeluaranF=(new audit)->records_pengeluaranf($pengeluaran);

        $anomali_na=(new ccaudit)->uji_na_allfact($tgl_awal,$tgl_akhir);
        $ledger=(new ccaudit)->ledger($tgl_awal,$tgl_akhir);

        $dataBranch = Branch::where('kode_jde','!=',null)->get();
        $data = collect($pemasukanF);
        $data2 = collect($pengeluaranF);
        // $dataBranch = Branch::all();
        foreach ($dataBranch as $key => $value) {
                $branch=$value->kode_jde;
            if($branch=='        1201'){
                $branch='1201';
            }
            elseif ($branch=='        1204') {
                $branch='1204';
            }
            elseif ($branch=='        1205') {
                $branch='1205';
            }
            elseif ($branch=='        1206') {
                $branch='1206';
            }
            else{
                $branch='';
            }
            $pemasukanF=$data->where('F564111C_MCU',$value->kode_jde)->count();
            $pengeluaranF=$data2->where('F564111H_MCU',$branch)->count();
            $na=$anomali_na->where('F4111_MCU',$value->kode_jde)->count();

            $ledger1=$ledger->where('F4111_MCU',$value->kode_jde)->count();

            $total_anomali=$pemasukanF+$pengeluaranF+$na;
            if($ledger1==0){
                $critical='0';
            }
            else{
                $critical=round($total_anomali / $ledger1* 100,2);
            }

            $data_update=[
                'id'=>$value->id,
                'nama_branch'=>$value->nama_branch,
                'branchdetail'=>$value->branchdetail,
                'critical'=>$critical,
                'anomali'=>$total_anomali,
                'issues'=>'0',
                'warna'=>'0',
            ];
            CC_audit::whereId($value->id)->update($data_update);
        }
    return $data_update;
    }
    public function pie_chart($pemasukanF,$pengeluaranF,$anomali_na)
    {
        $pemasukan = count($pemasukanF);
        $pengeluaran = count($pengeluaranF);
        $total=$pemasukan+$pengeluaran+$anomali_na;

        $pieChart=[
            'pieChart'=>[$pemasukan,$pemasukan,$anomali_na],
            'total'=>$total,
        ];
        // $pieChart=[$pemasukan,$pemasukan,$na];
    return $pieChart;
    }


    public function total_anomali()
    {
        $tgl_akhir = date('Y-m-d');
        $awal = strtotime($tgl_akhir);
        $akhir= strtotime("-30 day", $awal);
        $tgl_awal=date('Y-m-d', $akhir);

        $pemasukan=(new ccaudit)->get_pemasukan_allfact($tgl_awal,$tgl_akhir);
        $pemasukanF=(new audit)->records_pemasukanf($pemasukan);

        $pengeluaran=(new ccaudit)->get_pengeluaran_allfact($tgl_awal,$tgl_akhir);
        $pengeluaranF=(new audit)->records_pengeluaranf($pengeluaran);

        // $anomali_na=(new ccaudit)->uji_na_allfact($tgl_awal,$tgl_akhir);
        $anomali_na=(new ccaudit)->count_na_allfact($tgl_awal,$tgl_akhir);
        $pemasukan = count($pemasukanF);
        $pengeluaran = count($pengeluaranF);
        $total=$pemasukan+$pengeluaran+$anomali_na;

    
        // $pieChart=[$pemasukan,$pemasukan,$na];
    return $total;
    }
    public function total_critical()
    {
        $tgl_akhir = date('Y-m-d');
        $awal = strtotime($tgl_akhir);
        $akhir= strtotime("-30 day", $awal);
        $tgl_awal=date('Y-m-d', $akhir);
        
        $total_anomali=(new ccaudit)->total_anomali();
        $total_data= ledger::where('F4111_DGL','>=',$tgl_awal)
                ->where('F4111_DGL','<=',$tgl_akhir)
                ->wherein('F4111_GLPT',['INAC', 'INFA', 'INPA', 'ININ', 'INUM'])
                ->wherein('F4111_DCT',['OV','IC','II','I$','RL','S0','I4','IA'])
                ->count();
            if($total_data==0){
                $critical='0';
            }
            else{
                $critical=round($total_anomali / $total_data* 100,2);
            }
    
    return $critical;
    }

}