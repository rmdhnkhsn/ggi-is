<?php

namespace App\Services\HR_GA\Lembur;

Use DB;
use Carbon\Carbon;
Use App\Models\HR_GA\Lembur\Kualitatif;
Use App\Models\HR_GA\Lembur\Kuantitatif;
Use App\Models\HR_GA\Lembur\Karyawan;
Use App\Models\HR_GA\Lembur\RencanaLembur;
use App\Holiday;



class Overtime{
    public function data_lembur($lembur)
    {
        $data=[];
        foreach ($lembur as $key => $value) {
            // dd($value->id);
            $kuantitatif=Kuantitatif::where('id_lembur',$value->id)->count();
            $kualitatif=Kualitatif::where('id_lembur',$value->id)->count();
            $nama=[];
            $a=[];
            $b=[];
            $c=[];
            $d=[];
            $karyawan=Karyawan::where('id_lembur',$value->id)->get();
            foreach ($karyawan as $key1 => $value1) {
                $nama[]=$value1->nama;
            }
            $list_nama=implode(", ",$nama);
            if($kuantitatif>0){
                $z=Kuantitatif::where('id_lembur',$value->id)->get();
                foreach ($z as $key2 => $value2) {
                    // dd($value2->buyer);
                    $a[]=$value2->buyer;
                    $b[]=$value2->item;
                    $c[]=$value2->wo;


                }
                // $a=Kuantitatif::where('id_lembur',$value->id)->first();
                // dd($a);
                $buyer=implode(", ",$a);
                $item=implode(", ",$b);
                $wo=implode(", ",$c);
            }
            else if($kualitatif>0){
                $y=Kualitatif::where('id_lembur',$value->id)->get();
                foreach ($y as $key3 => $value3) {
                    $d[]=$value3->buyer;
                }
                // dd($d);
                $b=Kualitatif::where('id_lembur',$value->id)->first();
                $buyer=implode(", ",$d);;
                $wo="";
                $item=$b->alasan1.', '.$b->alasan2.', '.$b->alasan3.', '.$b->alasan4.', '.$b->alasan5;
            }
            else{
                $buyer="";
                $wo="";
                $item="";
            }
            $data[]=[
                'id'=>$value->id,
                'tanggal'=>$value->tanggal,
                'buyer'=>$buyer,
                'wo'=>$wo,
                'item'=>$item,
                'list_name'=>$list_nama,
                'status_lembur'=>$value->status_lembur,
            ];
        }
        return $data;
    }

    public function no_lembur(Type $var = null)
    {
        $tgl=date('ymd');
        $lembur = RencanaLembur::where('id','LIKE',$tgl."%")->max('id');
        $table_no=substr($lembur,6,3);
        $tgl = date('ymd');  
        $no= $tgl.$table_no;
        $auto=substr($no,6);
        $auto=intval($auto)+1;
        $auto_number=substr($no,0,6).str_repeat(0,(3-strlen($auto))).$auto;

        return  $auto_number;
    }

    public function store_lembur($auto_number, $user_login, $request, $app, $appPro, $appbranch)
    {
        // if($app->dept=="PRODUCTION"){
        //     $rencana_lembur=[
        //         'id'=>$auto_number,
        //         'tanggal'=>$request->tanggal,
        //         'departemen'=>$app->dept,
        //         'bagian'=>$request->bagian,
        //         'nik'=>$user_login->nik,
        //         'nama'=>$user_login->nama,
        //         'branchdetail'=>$user_login->branchdetail,
        //         'kode_branch'=>$user_login->branch,
        //         'status_lembur'=>"Waiting",
        //         'approve_1'=>$appPro->nama,
        //         'nik_1'=>$appPro->nik,
        //         'approve_2'=>$app->gm,
        //         'nik_2'=>$app->nik_gm,
        //         'waktu_pembuatan'=>date('Y-m-d H:i:s'),
        
        //     ];
        //     RencanaLembur::create($rencana_lembur);
        // }
        if(($user_login->branchdetail=='CVC')||($user_login->branchdetail=='GK')||($user_login->branchdetail=='CNJ2')||($user_login->branchdetail=='CVA')||($user_login->branchdetail=='CBA')){
            $rencana_lembur=[
                'id'=>$auto_number,
                'tanggal'=>$request->tanggal,
                'departemen'=>$app->dept,
                'bagian'=>$request->bagian,
                'nik'=>$user_login->nik,
                'nama'=>$user_login->nama,
                'branchdetail'=>$user_login->branchdetail,
                'kode_branch'=>$user_login->branch,
                'status_lembur'=>"Waiting",
                'approve_1'=>$appbranch->nama,
                'nik_1'=>$appbranch->nik,
                'approve_2'=>$app->gm,
                'nik_2'=>$app->nik_gm,
                'waktu_pembuatan'=>date('Y-m-d H:i:s'),
        
            ];
            RencanaLembur::create($rencana_lembur);
        }
        // else if($app->dept=="PRODUCTION"){
        //     $rencana_lembur=[
        //         'id'=>$auto_number,
        //         'tanggal'=>$request->tanggal,
        //         'departemen'=>$app->dept,
        //         'bagian'=>$request->bagian,
        //         'nik'=>$user_login->nik,
        //         'nama'=>$user_login->nama,
        //         'branchdetail'=>$user_login->branchdetail,
        //         'kode_branch'=>$user_login->branch,
        //         'status_lembur'=>"Approve 1",
        //         'approve_1'=>'',
        //         'nik_1'=>'',
        //         'approve_2'=>$app->gm,
        //         'nik_2'=>$app->nik_gm,
        //         'waktu_pembuatan'=>date('Y-m-d H:i:s'),
        
        //     ];
        //     RencanaLembur::create($rencana_lembur);
        // }
        else{
            $rencana_lembur=[
                'id'=>$auto_number,
                'tanggal'=>$request->tanggal,
                'departemen'=>$app->dept,
                'bagian'=>$request->bagian,
                'nik'=>$user_login->nik,
                'nama'=>$user_login->nama,
                'branchdetail'=>$user_login->branchdetail,
                'kode_branch'=>$user_login->branch,
                'status_lembur'=>"Waiting",
                'approve_1'=>$app->manger,
                'nik_1'=>$app->nik_manager,
                'approve_2'=>$app->gm,
                'nik_2'=>$app->nik_gm,
                'waktu_pembuatan'=>date('Y-m-d H:i:s'),

        
            ];
            RencanaLembur::create($rencana_lembur);
        }
        
    }

    public function store_kategori($auto_number,$request)
    {
        if ($request->buyer!=null){
            // dd('a');
            $wo=$request->wo;
            foreach ($wo as $key => $value) {
                if($value != null){
                    $count_wo[]=[
                        'nik'=>$value,
                    ];
                }
            }
            $data_wo=$request->wo;
            $target=$request->target;

            for ($i=0; $i < count($count_wo); $i++) { 
                if($request->buyer[$i]!=null){
                    $kuantitatif=[
                        'id_lembur'=>$auto_number,
                        'buyer'=>$request->buyer[$i],
                        'item'=>$request->item[$i],
                        'wo'=>$data_wo[$i],
                        'target'=>$target[$i],
                    ];
                    Kuantitatif::create($kuantitatif);
                }
            }

        }
        elseif ($request->buyer2!=null){
            $count_buyer=count($request->buyer2);
            for ($i=0; $i <$count_buyer ; $i++) { 
                $kualitatif=[
                    'id_lembur'=>$auto_number,
                    'buyer'=>$request->buyer2[$i],
                    'target'=>$request->target2[$i],
                    'alasan1'=>$request->alasan1[$i],
                    'alasan2'=>$request->alasan2[$i],
                    'alasan3'=>$request->alasan3[$i],
                    'alasan4'=>$request->alasan4[$i],
                    'alasan5'=>$request->alasan5[$i],
                ];
                Kualitatif::create($kualitatif);
            }
        }
    }

    public function store_karyawan($auto_number,$request)
    {
            $nik=$request->nik;
            foreach ($nik as $key => $value) {
                if($value != null){
                    $count_nik[]=[
                        'nik'=>$value,
                    ];
                }
            }
            $count_karyawan=count($count_nik);
            $nama=$request->nama;
            $grup=$request->group;
            $gaji=$request->gaji;
            $target_pekerjaan=$request->target_pekerjaan;
            $rencana_jam_awal=$request->rencana_jam_awal;
            $rencana_jam_akhir=$request->rencana_jam_akhir;
            $rencana_total=$request->rencana_total;
            
                for ($i=0; $i < count($count_nik); $i++) { 
                    $karyawan[]=[
                        'id_lembur'=>$auto_number,
                        'nik'=>$nik[$i],
                        'nama'=>$nama[$i],
                        'grup'=>$grup[$i],
                        'gaji'=>$gaji[$i],
                        'target_pekerjaan'=>$target_pekerjaan[$i],
                        'rencana_jam_awal'=>$rencana_jam_awal[$i],
                        'rencana_jam_akhir'=>$rencana_jam_akhir[$i],
                        'rencana_total'=>$rencana_total[$i],
                    ];
                }
                foreach ($karyawan as $key1 => $value1) {
                    $perjam=$value1['gaji']/173;
                    $l1=$perjam*1.5;
                    $l2=$perjam*2;
                    $no_duplicate=Karyawan::where('id_lembur',$value1['id_lembur'])->where('nik',$value1['nik'])->where('rencana_jam_awal',$value1['rencana_jam_awal'])->count();
                    if(($value1['nama']!=null)&&($no_duplicate==0)){
                        $karyawan_lembur=[
                            'id_lembur'=>$value1['id_lembur'],
                            'nik'=>$value1['nik'],
                            'nama'=>$value1['nama'],
                            'grup'=>$value1['grup'],
                            'gaji'=>$value1['gaji'],
                            'target_pekerjaan'=>$value1['target_pekerjaan'],
                            'rencana_jam_awal'=>$value1['rencana_jam_awal'],
                            'rencana_jam_akhir'=>$value1['rencana_jam_akhir'],
                            'rencana_total'=>$value1['rencana_total'],
                            'perjam'=>$perjam,
                            'l1'=>$l1,
                            'l2'=>$l2,
                        ];
                        Karyawan::create($karyawan_lembur);
                    }
                
                }
    }

    public function update_realisasi ($request)
    {

        if($request->id_kuantitatif != null){
            $wo=$request->id_kuantitatif;
            foreach ($wo as $key => $value) {
                    $count_kuantitatif[]=[
                        'id'=>$value,
                    ];
            }
            $id_kuantitatif=$request->id_kuantitatif;
            $realisasi=$request->realisasi;
                
                $a = 0;
                    for ($i=0; $i < count($count_kuantitatif); $i++) { 
                        $kuantitatif[]=[
                            'id'=>$id_kuantitatif[$i],
                            'realisasi'=>$realisasi[$i],
                        ];
                        $a += $wo[$i];
                    }
            foreach ($kuantitatif as $key => $value) {
                $data1=[
                    'id'=>$value['id'],
                    'realisasi'=>$value['realisasi'],
                ];
                Kuantitatif::whereid($value['id'])->update($data1);

            }

        }
        else{
            $id_kualiti=$request->id_kualitatif;
            for ($i=0; $i < count($id_kualiti) ; $i++) { 
                $kualitatif=[
                    'id'=>$request->id_kualitatif[$i],
                    'realisasi'=>$request->realisasi1[$i],
                ];
                Kualitatif::whereid($id_kualiti[$i])->update($kualitatif);
    
            }
            
        }
        
        $nik=$request->nik;
        foreach ($nik as $key => $value) {
                $count_nik[]=[
                    'nik'=>$value,
                ];
        }
        $id_karyawan=$request->id_karyawan;
        $realisasi_jam_awal=$request->realisasi_jam_awal;
        $realisasi_jam_akhir=$request->realisasi_jam_akhir;
        $rencana_total=$request->rencana_total;
        $realisasi_total=$request->realisasi_total;
        $rencana_jam_awal=$request->rencana_jam_awal;
        $rencana_jam_akhir=$request->rencana_jam_akhir;
        
            
                for ($i=0; $i < count($count_nik); $i++) { 
                    $karyawan[]=[
                        'id'=>$id_karyawan[$i],
                        'realisasi_jam_awal'=>$realisasi_jam_awal[$i],
                        'realisasi_jam_akhir'=>$realisasi_jam_akhir[$i],
                        'rencana_total'=>$rencana_total[$i],
                        'realisasi_total'=>$realisasi_total[$i],
                        'rencana_jam_awal'=>$rencana_jam_awal[$i],
                        'rencana_jam_akhir'=>$rencana_jam_akhir[$i],
                    ];
                }
            foreach ($karyawan as $key1 => $value1) {
                    $data2=[
                        'id'=>$value1['id'],
                        'realisasi_jam_awal'=>$value1['realisasi_jam_awal'],
                        'realisasi_jam_akhir'=>$value1['realisasi_jam_akhir'],
                        'rencana_total'=>$value1['rencana_total'],
                        'realisasi_total'=>$value1['realisasi_total'],
                        'rencana_jam_awal'=>$value1['rencana_jam_awal'],
                        'rencana_jam_akhir'=>$value1['rencana_jam_akhir'],

                    ];
                Karyawan::whereid($value1['id'])->update($data2);
            }
    }

    // public function amount($lembur)
    // {
    //     // dd($lembur);
    //     $data=[];
    //     $data_karyawan = [];
    //     $karyawan = [];
    //     foreach ($lembur as $key => $value) {
    //         $count = collect($value->kualitatif)->count('id');
    //         if($count>0){
    //             $Kualitatif = collect($value->kualitatif)->first();
    //             $target=$Kualitatif->target;
    //         }
    //         else{
    //             $Kuantitatif=collect($value->kuantitatif)->sum('target');
    //             $target=$Kuantitatif;
    //         }
    //         $x = collect($value->karyawan)->groupBy('nik');
    //         foreach ($x as $key2 => $value2) {
    //             $TotalResult = collect($value2)
    //                             ->groupBy('branch')
    //                             ->map(function ($item) {
    //                                 return array_merge(...$item->toArray());
    //                             })->values()->toArray();
    //             $rencana_total=collect($value2)->sum('rencana_total');
    //             $realisasi_total=collect($value2)->sum('realisasi_total');
    //             foreach ($TotalResult as $key3 => $value3) {
    //                 $karyawan[] = [
    //                     'id'=>$value3['id'],
    //                     'id_lembur'=>$value3['id_lembur'],
    //                     'nik'=>$value3['nik'],
    //                     'nama'=>$value3['nama'],
    //                     'grup'=>$value3['grup'],
    //                     'gaji'=>$value3['gaji'],
    //                     'perjam'=>$value3['perjam'],
    //                     'l1'=>$value3['l1'],
    //                     'l2'=>$value3['l2'],
    //                     'target_pekerjaan'=>$value3['target_pekerjaan'],
    //                     'rencana_jam_awal'=>$value3['rencana_jam_awal'],
    //                     'rencana_jam_akhir'=>$value3['rencana_jam_akhir'],
    //                     'rencana_total'=>$rencana_total,
    //                     'realisasi_jam_awal'=>$value3['realisasi_jam_awal'],
    //                     'realisasi_jam_akhir'=>$value3['realisasi_jam_akhir'],
    //                     'realisasi_total'=>$realisasi_total,
    //                 ];
    //             }
    //         }
    //         $tanggal = $value->tanggal;
    //         $day = date('l', strtotime($tanggal));
    //         $holday= Holiday::where('date',$value->tanggal)->count();
    //         foreach ($karyawan as $key4 => $value4) {
    //             if(($day=="Saturday")||($day=="Sunday")||($holday>='1'))
    //             {
    //                 if(($value4['rencana_total']>='0.5')&&($value4['realisasi_total']>='0.5')){
    //                     $jam_rencana=$value4['rencana_total'];
    //                     $jam_realiasai=$value4['realisasi_total'];
    //                     $amount_rencana=$value4['l2']*$jam_rencana;
    //                     $amount_realisasi=$value4['l2']*$jam_realiasai;
    //                 }
    //                 // rencana >= 0.5 && realisai > 0.5 
    //                 else if(($value4['rencana_total']>='0.5')&&($value4['realisasi_total']<'0.5') ){
    //                     $jam_rencana=$value4['rencana_total'];
    //                     $jam_realiasai=$value4['realisasi_total'];
    //                     $amount_rencana=$value4['l2']*$jam_rencana;
    //                     $amount_realisasi=0;
    //                 }
    //                 else{
    //                     $amount_rencana=0;
    //                     $amount_realisasi=0;
    //                 }
    //             }else{
    //                 if(($value4['rencana_total']>=1)&&($value4['realisasi_total']>=1)){
    //                     $jam_rencana=$value4['rencana_total']-1;
    //                     $jam_realiasai=$value4['realisasi_total']-1;
    //                     $l1=$value4['l1'];
    //                     $l2_rencana=$value4['l2']*$jam_rencana;
    //                     $amount_rencana=$l1+$l2_rencana;
    //                     $l2_realiasai=$value4['l2']*$jam_realiasai;
    //                     $amount_realisasi=$l1+$l2_realiasai;
    //                 }
    //                     // rencana >= 1 && realisai <1 | >0.5 
    //                 else if(($value4['rencana_total']>=1)&&($value4['realisasi_total']>='0.5')&& ($value4['realisasi_total']<1) ){
    //                     $jam_rencana=$value4['rencana_total']-1;
    //                     $jam_realiasai=$value4['realisasi_total'];
    //                     $l1=$value4['l1'];
    //                     $l2_rencana=$value4['l2']*$jam_rencana;
    //                     $amount_rencana=$l1+$l2_rencana;
    //                     $amount_realisasi= $l1*$jam_realiasai;
    //                 }
    //                     // rencana >= 1 && realisai < 0.5 
    //                 else if(($value4['rencana_total']>=1)&&($value4['realisasi_total']<'0.5')){
    //                     $jam_rencana=$value4['rencana_total']-1;
    //                     $l1=$value4['l1'];
    //                     $l2_rencana=$value4['l2']*$jam_rencana;
    //                     $amount_rencana=$l1+$l2_rencana;
    //                     $amount_realisasi=0;
    //                 }
    //                     // rencana < 1 && realisai >=1  
    //                 else if(($value4['rencana_total']<1)&&($value4['realisasi_total']>=1)){
    //                     $jam_rencana=$value4['rencana_total'];
    //                     $jam_realiasai=$value4['realisasi_total']-1;
    //                     $l2_realiasai=$value4['l2']*$jam_realiasai;
    //                     $l1=$value4['l1'];
    //                     $amount_rencana=$l1*$jam_rencana;
    //                     $amount_realisasi=$l1+$l2_realiasai;
    //                 }
    //                     // rencana < 1 && realisai <1 | >0.5  
    //                 else if(($value4['rencana_total']<1)&&($value4['realisasi_total']>='0.5')&&($value4['realisasi_total']<1)){
    //                     $jam_rencana=$value4['rencana_total'];
    //                     $jam_realiasai=$value4['realisasi_total'];
    //                     $l1=$value4['l1'];
    //                     $amount_rencana=$l1*$jam_rencana;
    //                     $amount_realisasi=$l1*$jam_realiasai;
    //                 }
    //                 else if(($value4['rencana_total']<1)&&($value4['realisasi_total']<'0.5')){
    //                     $jam_rencana=$value4['rencana_total'];
    //                     $l1=$value4['l1'];
    //                     $amount_rencana=$l1*$jam_rencana;
    //                     $amount_realisasi=0;
                    
    //                 }
    //                 else{
    //                     $amount_rencana=0;
    //                     $amount_realisasi=0;
    //                 }
    //             }
    //             $data_karyawan[]=[
    //                 'id_karyawan'=>$value4['id'],
    //                 'id_lembur'=>$value4['id_lembur'],
    //                 'amount_rencana'=>$amount_rencana,
    //                 'amount_realisasi'=>$amount_realisasi,
    //             ];
    //         }

    //         $total_amount_rencana=collect($data_karyawan)->where('id_lembur',$value->id)->sum('amount_rencana');
    //         $total_amount_realisasi=collect($data_karyawan)->where('id_lembur',$value->id)->sum('amount_realisasi');
    //         $data[]=[
    //             'id'=>$value->id,
    //             'tanggal'=>$value->tanggal,
    //             'departemen'=>$value->departemen,
    //             'bagian'=>$value->bagian,
    //             'nik'=>$value->nik,
    //             'nama'=>$value->nama,
    //             'branchdetail'=>$value->branchdetail,
    //             'status_lembur'=>$value->status_lembur,
    //             'target'=>$target,
    //             'amount_rencana'=>$total_amount_rencana,
    //             'amount_realisasi'=>$total_amount_realisasi,
    //             'nik_1'=>$value->nik_1,
    //             'nik_2'=>$value->nik_2,
    //             'approve_1'=>$value->approve_1,
    //             'approve_2'=>$value->approve_2,
    //             'waktu_pembuatan'=>$value->waktu_pembuatan,
    //             'waktu_app1'=>$value->waktu_app1,
    //             'waktu_app2'=>$value->waktu_app2,
    //         ];
    //     }
    //     // dd($data);
    //     return $data;
       
    // }
    public function amount($lembur)
    {
        // dd($lembur);
        $data=[];
        $data_karyawan = [];
        foreach ($lembur as $key => $value) {
                $count=Kualitatif::where('id_lembur',$value->id)->count();
                if($count>0){
                    $Kualitatif=Kualitatif::where('id_lembur',$value->id)->first();
                    $target=$Kualitatif->target;
                }
                else{
                    $Kuantitatif=Kuantitatif::where('id_lembur',$value->id)->sum('target');
                    $target=$Kuantitatif;
                }
            $x=Karyawan::where('id_lembur',$value->id)->get();
            $a=$x->groupBY('nik');
            $karyawan=[];
            foreach ($a as $key3 => $value3) {
                $TotalResult = collect($value3)
                    ->groupBy('branch')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key4 => $value4) {
                    $rencana_total=$x->where('nik',$value4['nik'])->sum('rencana_total');
                    $realisasi_total=$x->where('nik',$value4['nik'])->sum('realisasi_total');
                    $karyawan[] = [
                        'id'=>$value4['id'],
                        'id_lembur'=>$value4['id_lembur'],
                        'nik'=>$value4['nik'],
                        'nama'=>$value4['nama'],
                        'grup'=>$value4['grup'],
                        'gaji'=>$value4['gaji'],
                        'perjam'=>$value4['perjam'],
                        'l1'=>$value4['l1'],
                        'l2'=>$value4['l2'],
                        'target_pekerjaan'=>$value4['target_pekerjaan'],
                        'rencana_jam_awal'=>$value4['rencana_jam_awal'],
                        'rencana_jam_akhir'=>$value4['rencana_jam_akhir'],
                        'rencana_total'=>$rencana_total,
                        'realisasi_jam_awal'=>$value4['realisasi_jam_awal'],
                        'realisasi_jam_akhir'=>$value4['realisasi_jam_akhir'],
                        'realisasi_total'=>$realisasi_total,
                    ];
                }  
            }
            $tanggal = $value->tanggal;
            $day = date('l', strtotime($tanggal));
            $holday=Holiday::where('date',$value->tanggal)->count();
                if(($day=="Saturday")||($day=="Sunday")||($holday>='1')){
                    foreach ($karyawan as $key2 => $value2) {
                        // rencana >= 0.5 && realisai >=0.5 
                        if(($value2['rencana_total']>='0.5')&&($value2['realisasi_total']>='0.5')){
                            $jam_rencana=$value2['rencana_total'];
                            $jam_realiasai=$value2['realisasi_total'];
                            $amount_rencana=$value2['l2']*$jam_rencana;
                            $amount_realisasi=$value2['l2']*$jam_realiasai;
                        }
                        // rencana >= 0.5 && realisai > 0.5 
                        else if(($value2['rencana_total']>='0.5')&&($value2['realisasi_total']<'0.5') ){
                            $jam_rencana=$value2['rencana_total'];
                            $jam_realiasai=$value2['realisasi_total'];
                            $amount_rencana=$value2['l2']*$jam_rencana;
                            $amount_realisasi=0;
                        }
                        else{
                            $amount_rencana=0;
                            $amount_realisasi=0;
                        }
                        $data_karyawan[]=[
                            'id_karyawan'=>$value2['id'],
                            'id_lembur'=>$value2['id_lembur'],
                            'amount_rencana'=>$amount_rencana,
                            'amount_realisasi'=>$amount_realisasi,
                        ];
                        }
                }
                else{
                    foreach ($karyawan as $key2 => $value2) {
                        // rencana >= 1 && realisai >=1 
                    if(($value2['rencana_total']>=1)&&($value2['realisasi_total']>=1)){
                        $jam_rencana=$value2['rencana_total']-1;
                        $jam_realiasai=$value2['realisasi_total']-1;
                        $l1=$value2['l1'];
                        $l2_rencana=$value2['l2']*$jam_rencana;
                        $amount_rencana=$l1+$l2_rencana;
                        $l2_realiasai=$value2['l2']*$jam_realiasai;
                        $amount_realisasi=$l1+$l2_realiasai;
                    }
                        // rencana >= 1 && realisai <1 | >0.5 
                    else if(($value2['rencana_total']>=1)&&($value2['realisasi_total']>='0.5')&& ($value2['realisasi_total']<1) ){
                        $jam_rencana=$value2['rencana_total']-1;
                        $jam_realiasai=$value2['realisasi_total'];
                        $l1=$value2['l1'];
                        $l2_rencana=$value2['l2']*$jam_rencana;
                        $amount_rencana=$l1+$l2_rencana;
                        $amount_realisasi= $l1*$jam_realiasai;
                    }
                        // rencana >= 1 && realisai < 0.5 
                    else if(($value2['rencana_total']>=1)&&($value2['realisasi_total']<'0.5')){
                        $jam_rencana=$value2['rencana_total']-1;
                        $l1=$value2['l1'];
                        $l2_rencana=$value2['l2']*$jam_rencana;
                        $amount_rencana=$l1+$l2_rencana;
                        $amount_realisasi=0;
                    }
                        // rencana < 1 && realisai >=1  
                    else if(($value2['rencana_total']<1)&&($value2['realisasi_total']>=1)){
                        $jam_rencana=$value2['rencana_total'];
                        $jam_realiasai=$value2['realisasi_total']-1;
                        $l2_realiasai=$value2['l2']*$jam_realiasai;
                        $l1=$value2['l1'];
                        $amount_rencana=$l1*$jam_rencana;
                        $amount_realisasi=$l1+$l2_realiasai;
                    }
                        // rencana < 1 && realisai <1 | >0.5  
                    else if(($value2['rencana_total']<1)&&($value2['realisasi_total']>='0.5')&&($value2['realisasi_total']<1)){
                        $jam_rencana=$value2['rencana_total'];
                        $jam_realiasai=$value2['realisasi_total'];
                        $l1=$value2['l1'];
                        $amount_rencana=$l1*$jam_rencana;
                        $amount_realisasi=$l1*$jam_realiasai;
                    }
                    else if(($value2['rencana_total']<1)&&($value2['realisasi_total']<'0.5')){
                        $jam_rencana=$value2['rencana_total'];
                        $l1=$value2['l1'];
                        $amount_rencana=$l1*$jam_rencana;
                        $amount_realisasi=0;
                    
                    }
                    else{
                        $amount_rencana=0;
                        $amount_realisasi=0;
                    }
                    $data_karyawan[]=[
                        'id_karyawan'=>$value2['id'],
                        'id_lembur'=>$value2['id_lembur'],
                        'amount_rencana'=>$amount_rencana,
                        'amount_realisasi'=>$amount_realisasi,
                    ];
                    }
                    // dd($data_karyawan);
                }
            $total_amount_rencana=collect($data_karyawan)->where('id_lembur',$value->id)->sum('amount_rencana');
            $total_amount_realisasi=collect($data_karyawan)->where('id_lembur',$value->id)->sum('amount_realisasi');
            $Kuantitatif=Kuantitatif::where('id_lembur',$value->id)->get();
            $data[]=[
            'id'=>$value->id,
            'tanggal'=>$value->tanggal,
            'departemen'=>$value->departemen,
            'bagian'=>$value->bagian,
            'nik'=>$value->nik,
            'nama'=>$value->nama,
            'branchdetail'=>$value->branchdetail,
            'status_lembur'=>$value->status_lembur,
            'target'=>$target,
            'amount_rencana'=>$total_amount_rencana,
            'amount_realisasi'=>$total_amount_realisasi,
            'nik_1'=>$value->nik_1,
            'nik_2'=>$value->nik_2,
            'approve_1'=>$value->approve_1,
            'approve_2'=>$value->approve_2,
            'waktu_pembuatan'=>$value->waktu_pembuatan,
            'waktu_app1'=>$value->waktu_app1,
            'waktu_app2'=>$value->waktu_app2,

            ];
        }
        // dd($data);
        return $data;
    }

    public function notif_Gm($request)
    {
        DB::table('notification')->insert([
                'connection_name'=>"mysql_audit_buye",
                'table_name'=>"rencana_lembur",
                'alert_level'=>"DANGER",
                'id_int'=> $request->id,
                'nik'=>$request->nik_2,
                'url'=>"cc.approval",
                'title'=>"Overtime Request",
                'desc'=>'From - ' . $request->nama .' Amount : Rp.'. number_format($request->amount, 2, ",", "."),
                'is_read'=>"0"
        ]);
    }

    public function notif_admin($request)
    {
        DB::table('notification')->insert([
            'connection_name'=>"mysql_audit_buye",
            'table_name'=>"rencana_lembur",
            'alert_level'=>"INFO",
            'id_int'=> $request->id,
            'nik'=>$request->nik,
            'url'=>"overtime-request",
            'title'=>"Form Lembur",
            'desc'=> 'Tanggal '. $request->tanggal . ' Disetujui',
            'is_read'=>"0"
        ]);
    }

    public function data_pdf($id, $data_lembur, $jumlah_karyawan, $count_kualitatif)
    {
            if($count_kualitatif>0){
                $kualitatif=Kualitatif::where('id_lembur',$id)->first();
                    $buyer=$kualitatif->buyer;
                    $wo="";
                    $item=$kualitatif->alasan1.', '.$kualitatif->alasan2.', '.$kualitatif->alasan3.', '.$kualitatif->alasan4.', '.$kualitatif->alasan5;
                    $target=$kualitatif->target;
                    $realisasi=$kualitatif->realisasi;
                    $kategori="kualitatif";
                }
            else{
                $kuantitatif=Kuantitatif::where('id_lembur',$id)->get();
                foreach ($kuantitatif as $key1 => $value1) {
                    $wo[]=$value1->wo;
                    $record[]=[
                        'id_lembur'=>$value1->id_lembur,
                        'target'=>$value1->target,
                        'realisasi'=>$value1->realisasi,
                    ];
                }
                $a=Kuantitatif::where('id_lembur',$id)->first();
                $buyer=$a->buyer;
                $item=$a->item;
                $wo=implode(", ",$wo);
                $target=collect($record)->sum('target');
                $realisasi=collect($record)->sum('realisasi');
                $kategori="kuantitatif";
    
            }
            $data=[
                'id'=>$data_lembur->id,
                'tanggal'=>$data_lembur->tanggal,
                'departemen'=>$data_lembur->departemen,
                'bagian'=>$data_lembur->bagian,
                'nama'=>$data_lembur->nama,
                'branchdetail'=>$data_lembur->branchdetail,
                'waktu_pembuatan'=>$data_lembur->waktu_pembuatan,
                'waktu_app1'=>$data_lembur->waktu_app1,
                'waktu_app2'=>$data_lembur->waktu_app2,
                'jumlah_orang'=>$jumlah_karyawan,
                'target'=>$target,
                'aktual'=>$realisasi,
                'buyer'=>$buyer,
                'wo'=>$wo,
                'item'=>$item,
                'kategori'=>$kategori,
            ];
        return $data;
    }

    public function approve_gm($request)
    {
        $pengajuan_lembur=RencanaLembur::wherein('id',$request->id)->get();
        if($request->app==1){
            foreach ($pengajuan_lembur as $key => $value) {
                $id_amount=$value->id;
                $approve=[
                    'status_lembur'=>'Approve 2',
                    'waktu_app2'=>date('Y-m-d H:i:s'),
                ];
                RencanaLembur::whereid($value->id)->update($approve);
                DB::table('notification')->insert([
                    'connection_name'=>"mysql_audit_buye",
                    'table_name'=>"rencana_lembur",
                    'alert_level'=>"INFO",
                    'id_int'=> $value->id,
                    'nik'=>$value->nik,
                    'url'=>"overtime-request",
                    'title'=>"Form Lembur",
                    'desc'=> 'Tanggal '. $value->tanggal . ' Disetujui',
                    'is_read'=>"0"
                ]);
            }
        }
        elseif($request->app==0){
            foreach ($pengajuan_lembur as $key => $value) {
                $reject=[
                    'status_lembur'=>'Reject 2',
                ];
                RencanaLembur::whereid($value->id)->update($reject);
            }
        }
    }

    public function total_perbranch($data_record,$collect_record)
    {
        $test=[];
        foreach ($collect_record as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $jml_orang=collect($data_record)->where('branch',$key)->sum('jumlah_karyawan');
                $jml_orang_realisasi=collect($data_record)->where('branch',$key)->sum('jumlah_karyawan_realisasi');
                $jml_jam_realisasi=collect($data_record)->where('branch',$key)->sum('jumlah_jam_realisasi');
                $jml_jam_reancana=collect($data_record)->where('branch',$key)->sum('jumlah_jam_rencana');
                $jml_cost_rencana=collect($data_record)->where('branch',$key)->sum('cost_rencana');
                $jml_cost_realisasi=collect($data_record)->where('branch',$key)->sum('cost_realisasi');
                $jml_target_kuantitatif=collect($data_record)->where('branch',$key)->sum('target_kuantitatif');
                $jml_realisasi_kuantitatif=collect($data_record)->where('branch',$key)->sum('realisasi_kuantitatif');

                    $test[]=[
                        'branch'=>$key,
                        'jml_orang'=>$jml_orang,
                        'jml_orang_realisasi'=>$jml_orang_realisasi,
                        'jam_rencana'=>$jml_jam_reancana,
                        'jam_realisasi'=>$jml_jam_realisasi,
                        'cost_rencana'=>$jml_cost_rencana,
                        'cost_realisasi'=>$jml_cost_realisasi,
                        'target_kuantitatif'=>$jml_target_kuantitatif,
                        'realisasi_kuantitatif'=>$jml_realisasi_kuantitatif,


                    ];
            }
        }
        $data=collect($test)->groupBY('branch');
        $report=[];
        foreach ($data as $key => $value) {
            $TotalResult = collect($value)
                ->groupBy('branch')
                ->map(function ($item) {
                    return array_merge(...$item->toArray());
                })->values()->toArray();
            foreach ($TotalResult as $key3 => $value3) {
                $report[] = [
                    'branch'=>$value3['branch'],
                    'jml_orang'=>$value3['jml_orang'],
                    'jml_orang_realisasi'=>$value3['jml_orang_realisasi'],
                    'jam_rencana'=>$value3['jam_rencana'],
                    'jam_realisasi'=>$value3['jam_realisasi'],
                    'cost_rencana'=>$value3['cost_rencana'],
                    'cost_realisasi'=>$value3['cost_realisasi'],
                    'target_kuantitatif'=>$value3['target_kuantitatif'],
                    'realisasi_kuantitatif'=>$value3['realisasi_kuantitatif'],

                ];
            }  
        }
        return $report;
    }

    public function total_all($total_branch)
    {
        $jml_orang=collect($total_branch)->sum('jml_orang');
        $jml_orang_realisasi=collect($total_branch)->sum('jml_orang_realisasi');
        $jml_jam_reancana=collect($total_branch)->sum('jam_rencana');
        $jml_jam_realisasi=collect($total_branch)->sum('jam_realisasi');
        $jml_cost_rencana=collect($total_branch)->sum('cost_rencana');
        $jml_cost_realisasi=collect($total_branch)->sum('cost_realisasi');
        $jml_target_kuantitatif=collect($total_branch)->sum('target_kuantitatif');
        $jml_realisasi_kuantitatif=collect($total_branch)->sum('realisasi_kuantitatif');


        $data=[
            'jml_orang'=>$jml_orang,
            'jml_orang_realisasi'=>$jml_orang_realisasi,
            'jam_rencana'=>$jml_jam_reancana,
            'jam_realisasi'=>$jml_jam_realisasi,
            'cost_rencana'=>$jml_cost_rencana,
            'cost_realisasi'=>$jml_cost_realisasi,
            'target_kuantitatif'=>$jml_target_kuantitatif,
            'realisasi_kuantitatif'=>$jml_realisasi_kuantitatif,

        ];
     return $data;
    }
    public function data_id($lembur)
    {
        $id=[];
        foreach ($lembur as $key => $value) {
            $id[]=$value->id;
         }
         return $id;
    }
    public function Buyer_kategori($data_id)
    {
        $kualitatif=Kualitatif::wherein('id_lembur',$data_id)->get();
        $kuantitatif=Kuantitatif::wherein('id_lembur',$data_id)->get();
        $data1=[];
        foreach ($kualitatif as $key => $value) {
            $data1[]=[
                'id_lembur'=>$value->id_lembur,
                'buyer'=>$value->buyer,
                'item'=>"No Item",
                'kategori'=>"kualitatif",
                'target'=>$value->target,
                'realisasi'=>$value->realisasi,

            ];
        }
        $data2=[];
        foreach ($kuantitatif as $key => $value) {
            $data2[]=[
                'id_lembur'=>$value->id_lembur,
                'buyer'=>$value->buyer,
                'item'=>$value->item,
                'kategori'=>"kuantitatif",
                'target'=>$value->target,
                'realisasi'=>$value->realisasi,
            ];
        }
        $record=array_merge($data1,$data2);
       
        return $record;
    }

    public function amount_Buyer($amountByid,$buyerBykategori)
    {
        $record=[];
       foreach ($amountByid as $key => $value) {
          foreach ($buyerBykategori as $key1 => $value1) {
              if($value['id']==$value1['id_lembur']){
                  if($value1['kategori']=="kualitatif"){
                  
                    $count_kualitatif=Kualitatif::where('id_lembur',$value1['id_lembur'])->count();
                    $buyer_kualitatif=Kualitatif::where('id_lembur',$value1['id_lembur'])->where('buyer',$value1['buyer'])->count();
                    $cost_rencana=$value['amount_rencana']/$count_kualitatif*$buyer_kualitatif;
                    if($value['amount_realisasi']>0){
                        $cost_realisasi=$value['amount_realisasi']/$count_kualitatif*$buyer_kualitatif;
                    }
                    else{
                        $cost_realisasi=0;  
                    }
                    
                  }
                  else if($value1['kategori']=="kuantitatif"){
                    $sum_target=Kuantitatif::where('id_lembur',$value1['id_lembur'])->sum('target');
                    $sum_realisai=Kuantitatif::where('id_lembur',$value1['id_lembur'])->sum('realisasi');
                    $buyer_target=Kuantitatif::where('id_lembur',$value1['id_lembur'])->where('buyer',$value1['buyer'])->sum('target');
                    $buyer_realisasi=Kuantitatif::where('id_lembur',$value1['id_lembur'])->where('buyer',$value1['buyer'])->sum('realisasi');
                    $cost_rencana=$value['amount_rencana']/$sum_target*$buyer_target;
                    if($value['amount_realisasi']>0){
                        $cost_realisasi=$value['amount_realisasi']/$sum_realisai*$buyer_realisasi;
                    }
                    else{
                         $cost_realisasi=0; 
                    }


                  }
                  else{
                    $cost_rencana="0";
                    $cost_realisasi="0";
                  }
                  $record[]=[
                    'id'=>$value['id'],
                    'tanggal'=>$value['tanggal'],
                    'departemen'=>$value['departemen'],
                    'bagian'=>$value['bagian'],
                    'nik'=>$value['nik'],
                    'nama'=>$value['nama'],
                    'branch'=>$value['branchdetail'],
                    'cost_rencana'=>$cost_rencana,
                    'cost_realisasi'=>$cost_realisasi,
                    'buyer'=>$value1['buyer'],
                    'target'=>$value1['target'],
                    'realisasi'=>$value1['realisasi'],
                    'kategori'=>$value1['kategori'],
                  ];

              }
          }
       }
        //dd($record);
      return $record;
    }

    public function target_buyer($amount_Buyer)
    {
        $record=[];
        foreach ($amount_Buyer as $key => $value) {
            $kualitatif=collect($amount_Buyer)->where('kategori','kualitatif')->where('buyer',$value['buyer'])->where('branch',$value['branch']);
            $target_kualitatif=[];
            $realisasi_kualitatif=[];
                foreach ($kualitatif as $key2 => $value2) {
                    if (in_array($value2['target'],$target_kualitatif)==false) {
                        $target_kualitatif[]=$value2['target'];
                    }
                    if (in_array($value2['realisasi'],$realisasi_kualitatif)==false) {
                        $realisasi_kualitatif[]=$value2['realisasi'];
                    }
                    // $target_kualitatif[]=$value2['target'];
                    // $realisasi_kualitatif[]=$value2['realisasi'];
                    
                }
                $target_kuantitatif=collect($amount_Buyer)->where('kategori','kuantitatif')->where('buyer',$value['buyer'])->where('branch',$value['branch'])->sum('target');
                $realisasi_kuantitatif=collect($amount_Buyer)->where('kategori','kuantitatif')->where('buyer',$value['buyer'])->where('branch',$value['branch'])->sum('realisasi');
           

            $record[]=[
                'id'=>$value['id'],
                'tanggal'=>$value['tanggal'],
                'departemen'=>$value['departemen'],
                'bagian'=>$value['bagian'],
                'nik'=>$value['nik'],
                'nama'=>$value['nama'],
                'branch'=>$value['branch'],
                'cost_rencana'=>$value['cost_rencana'],
                'cost_realisasi'=>$value['cost_realisasi'],
                'buyer'=>$value['buyer'],
                'target_kualitatif'=> implode(", ",$target_kualitatif),
                'realisasi_kualitatif'=>implode(", ",$realisasi_kualitatif),
                'target_kuantitatif'=>$target_kuantitatif,
                'realisasi_kuantitatif'=>$realisasi_kuantitatif,
                'kategori'=>$value['kategori'],
              ];
        }

        $collect=collect($record)->groupBY('id');
       // dd($collect);

       $amount_buyer = [];
           foreach ($collect as $key2 => $value2) {
               $maafin = collect($value2)
                       ->groupBy('buyer')
                       ->map(function ($item) {
                               return array_merge(...$item->toArray());
                       })->values()->toArray();
               foreach ($maafin as $key3 => $value3) {
                   $amount_buyer[] = [
                            'id'=>$value3['id'],
                            'tanggal'=>$value3['tanggal'],
                            'departemen'=>$value3['departemen'],
                            'bagian'=>$value3['bagian'],
                            'nik'=>$value3['nik'],
                            'nama'=>$value3['nama'],
                            'branch'=>$value3['branch'],
                            'cost_rencana'=>$value3['cost_rencana'],
                            'cost_realisasi'=>$value3['cost_realisasi'],
                            'target_kualitatif'=> $value3['target_kualitatif'],
                            'realisasi_kualitatif'=>$value3['realisasi_kualitatif'],
                            'target_kuantitatif'=>$value3['target_kuantitatif'],
                            'realisasi_kuantitatif'=>$value3['realisasi_kuantitatif'],
                            'kategori'=>$value3['kategori'],
                            'buyer'=>$value3['buyer'],


                       ];
               }
           }
      return $amount_buyer;
    }
    public function AmountBuyerBranch($target_buyer)
    {
        $record=[];
        $data=collect($target_buyer);

        foreach ($target_buyer as $key => $value) {
            // dd($data);
            $cost_rencana=$data->where('branch',$value['branch'])->where('buyer',$value['buyer'])->sum('cost_rencana');
            $cost_realisasi=$data->where('branch',$value['branch'])->where('buyer',$value['buyer'])->sum('cost_realisasi');
            $record[]=[
                'id'=>$value['id'],
                'tanggal'=>$value['tanggal'],
                'departemen'=>$value['departemen'],
                'bagian'=>$value['bagian'],
                'nik'=>$value['nik'],
                'nama'=>$value['nama'],
                'branch'=>$value['branch'],
                'cost_rencana'=>$cost_rencana,
                'cost_realisasi'=>$cost_realisasi,
                'buyer'=>$value['buyer'],
                'target_kualitatif'=> $value['target_kualitatif'],
                'realisasi_kualitatif'=>$value['realisasi_kualitatif'],
                'target_kuantitatif'=>$value['target_kuantitatif'],
                'realisasi_kuantitatif'=>$value['realisasi_kuantitatif'],
            ];
        }
        $collect=collect($record)->groupBY('branch');
        $amount_buyer = [];
            foreach ($collect as $key => $value) {
                $maafin = collect($value)
                        ->groupBy('buyer')
                        ->map(function ($item) {
                                return array_merge(...$item->toArray());
                        })->values()->toArray();
                foreach ($maafin as $key2 => $value2) {
                    $amount_buyer[] = [
                            'id'=>$value2['id'],
                            'tanggal'=>$value2['tanggal'],
                            'departemen'=>$value2['departemen'],
                            'bagian'=>$value2['bagian'],
                            'nik'=>$value2['nik'],
                            'nama'=>$value2['nama'],
                            'branch'=>$value2['branch'],
                            'cost_rencana'=>$value2['cost_rencana'],
                            'cost_realisasi'=>$value2['cost_realisasi'],
                            'buyer'=>$value2['buyer'],
                            'target_kualitatif'=> $value2['target_kualitatif'],
                            'realisasi_kualitatif'=>$value2['realisasi_kualitatif'],
                            'target_kuantitatif'=>$value2['target_kuantitatif'],
                            'realisasi_kuantitatif'=>$value2['realisasi_kuantitatif'],
                        ];
                }
            }
        // dd($amount_buyer);
           return $amount_buyer;
    }
    public function amount_Item($amountByid,$ItemBykategori)
    {
        $record=[];
        foreach ($amountByid as $key => $value) {
            foreach ($ItemBykategori as $key1 => $value1) {
                if($value['id']==$value1['id_lembur']){
                    if($value1['kategori']=="kualitatif"){
                    
                    // $count_kualitatif=Kualitatif::where('id_lembur',$value1['id_lembur'])->count();
                    // $item_kualitatif=Kualitatif::where('id_lembur',$value1['id_lembur'])->where('item',$value1['item'])->count();
                    $cost_rencana=$value['amount_rencana'];
                    $cost_realisasi=$value['amount_realisasi'];
                    
                    }
                    else if($value1['kategori']=="kuantitatif"){
                    $sum_target=Kuantitatif::where('id_lembur',$value1['id_lembur'])->sum('target');
                    $sum_realisai=Kuantitatif::where('id_lembur',$value1['id_lembur'])->sum('realisasi');
                    $item_target=Kuantitatif::where('id_lembur',$value1['id_lembur'])->where('item',$value1['item'])->sum('target');
                    $item_realisasi=Kuantitatif::where('id_lembur',$value1['id_lembur'])->where('item',$value1['item'])->sum('realisasi');
                    
                    $cost_rencana=$value['amount_rencana']/$sum_target*$item_target;
                    if($value['amount_realisasi']>0){
                        $cost_realisasi=$value['amount_realisasi']/$sum_realisai*$item_realisasi;
                    }
                    else{
                         $cost_realisasi=0; 
                    }

                    }
                    else{
                    $cost_rencana="0";
                    $cost_realisasi="0";
                    }
                    $record[]=[
                    'id'=>$value['id'],
                    'tanggal'=>$value['tanggal'],
                    'departemen'=>$value['departemen'],
                    'bagian'=>$value['bagian'],
                    'nik'=>$value['nik'],
                    'nama'=>$value['nama'],
                    'branch'=>$value['branchdetail'],
                    'cost_rencana'=>$cost_rencana,
                    'cost_realisasi'=>$cost_realisasi,
                    'item'=>$value1['item'],
                    'target'=>$value1['target'],
                    'realisasi'=>$value1['realisasi'],
                    'kategori'=>$value1['kategori'],
                    ];

                }
            }
        }
        // $collect=collect($record)->groupBY('id');
        // $amount_item = [];
        // foreach ($collect as $key2 => $value2) {
        //     $maafin = collect($value2)
        //             ->groupBy('item')
        //             ->map(function ($item) {
        //                     return array_merge(...$item->toArray());
        //             })->values()->toArray();
        //     foreach ($maafin as $key3 => $value3) {
        //         $amount_item[] = [
        //                 'id'=>$value3['id'],
        //                 'tanggal'=>$value3['tanggal'],
        //                 'departemen'=>$value3['departemen'],
        //                 'bagian'=>$value3['bagian'],
        //                 'nik'=>$value3['nik'],
        //                 'nama'=>$value3['nama'],
        //                 'branch'=>$value3['branch'],
        //                 'cost_rencana'=>$value3['cost_rencana'],
        //                 'cost_realisasi'=>$value3['cost_realisasi'],
        //                 'item'=>$value3['item'],
        //                 'target'=>$value3['target'],
        //                 'realisasi'=>$value3['realisasi'],
        //                 'kategori'=>$value3['kategori'],

        //             ];
        //     }
        // }
        // dd($amount_item);
        return $record;
    }

    public function target_Item($amount_item)
    {
        $record=[];
        foreach ($amount_item as $key => $value) {
            $kualitatif=collect($amount_item)->where('kategori','kualitatif')->where('item',$value['item'])->where('branch',$value['branch']);
            $target_kualitatif=[];
            $realisasi_kualitatif=[];
                foreach ($kualitatif as $key2 => $value2) {
                    if (in_array($value2['target'],$target_kualitatif)==false) {
                        $target_kualitatif[]=$value2['target'];
                    }
                    if (in_array($value2['realisasi'],$realisasi_kualitatif)==false) {
                        $realisasi_kualitatif[]=$value2['realisasi'];
                    }
                    // $target_kualitatif[]=$value2['target'];
                    // $realisasi_kualitatif[]=$value2['realisasi'];
                    
                }
                $target_kuantitatif=collect($amount_item)->where('kategori','kuantitatif')->where('item',$value['item'])->where('branch',$value['branch'])->sum('target');
                $realisasi_kuantitatif=collect($amount_item)->where('kategori','kuantitatif')->where('item',$value['item'])->where('branch',$value['branch'])->sum('realisasi');
           

            $record[]=[
                'id'=>$value['id'],
                'tanggal'=>$value['tanggal'],
                'departemen'=>$value['departemen'],
                'bagian'=>$value['bagian'],
                'nik'=>$value['nik'],
                'nama'=>$value['nama'],
                'branch'=>$value['branch'],
                'cost_rencana'=>$value['cost_rencana'],
                'cost_realisasi'=>$value['cost_realisasi'],
                'item'=>$value['item'],
                'target_kualitatif'=> implode(", ",$target_kualitatif),
                'realisasi_kualitatif'=>implode(", ",$realisasi_kualitatif),
                'target_kuantitatif'=>$target_kuantitatif,
                'realisasi_kuantitatif'=>$realisasi_kuantitatif,
                'kategori'=>$value['kategori'],
              ];
        }

        $collect=collect($record)->groupBY('id');
       // dd($collect);

       $amount_item = [];
           foreach ($collect as $key2 => $value2) {
               $maafin = collect($value2)
                       ->groupBy('item')
                       ->map(function ($item) {
                               return array_merge(...$item->toArray());
                       })->values()->toArray();
               foreach ($maafin as $key3 => $value3) {
                   $amount_item[] = [
                            'id'=>$value3['id'],
                            'tanggal'=>$value3['tanggal'],
                            'departemen'=>$value3['departemen'],
                            'bagian'=>$value3['bagian'],
                            'nik'=>$value3['nik'],
                            'nama'=>$value3['nama'],
                            'branch'=>$value3['branch'],
                            'cost_rencana'=>$value3['cost_rencana'],
                            'cost_realisasi'=>$value3['cost_realisasi'],
                            'target_kualitatif'=> $value3['target_kualitatif'],
                            'realisasi_kualitatif'=>$value3['realisasi_kualitatif'],
                            'target_kuantitatif'=>$value3['target_kuantitatif'],
                            'realisasi_kuantitatif'=>$value3['realisasi_kuantitatif'],
                            'kategori'=>$value3['kategori'],
                            'item'=>$value3['item'],


                       ];
               }
           }
      return $amount_item;
    }
    public function AmountItemBranch($target_Item)
    {
        $record=[];
        $data=collect($target_Item);

        foreach ($target_Item as $key => $value) {
            // dd($data);
            $cost_rencana=$data->where('branch',$value['branch'])->where('item',$value['item'])->sum('cost_rencana');
            $cost_realisasi=$data->where('branch',$value['branch'])->where('item',$value['item'])->sum('cost_realisasi');
            $record[]=[
                'id'=>$value['id'],
                'tanggal'=>$value['tanggal'],
                'departemen'=>$value['departemen'],
                'bagian'=>$value['bagian'],
                'nik'=>$value['nik'],
                'nama'=>$value['nama'],
                'branch'=>$value['branch'],
                'cost_rencana'=>$cost_rencana,
                'cost_realisasi'=>$cost_realisasi,
                'item'=>$value['item'],
                'target_kualitatif'=> $value['target_kualitatif'],
                'realisasi_kualitatif'=>$value['realisasi_kualitatif'],
                'target_kuantitatif'=>$value['target_kuantitatif'],
                'realisasi_kuantitatif'=>$value['realisasi_kuantitatif'],
                'kategori'=>$value['kategori'],
            ];
        }
        $collect=collect($record)->groupBY('branch');
        // dd($collect);

        $target_Item = [];
            foreach ($collect as $key => $value) {
                $maafin = collect($value)
                        ->groupBy('item')
                        ->map(function ($item) {
                                return array_merge(...$item->toArray());
                        })->values()->toArray();
                foreach ($maafin as $key2 => $value2) {
                    $target_Item[] = [
                            'id'=>$value2['id'],
                            'tanggal'=>$value2['tanggal'],
                            'departemen'=>$value2['departemen'],
                            'bagian'=>$value2['bagian'],
                            'nik'=>$value2['nik'],
                            'nama'=>$value2['nama'],
                            'branch'=>$value2['branch'],
                            'cost_rencana'=>$value2['cost_rencana'],
                            'cost_realisasi'=>$value2['cost_realisasi'],
                            'item'=>$value2['item'],
                            'target_kualitatif'=> $value2['target_kualitatif'],
                            'realisasi_kualitatif'=>$value2['realisasi_kualitatif'],
                            'target_kuantitatif'=>$value2['target_kuantitatif'],
                            'realisasi_kuantitatif'=>$value2['realisasi_kuantitatif'],
                            'kategori'=>$value2['kategori'],
                        ];
                }
            }

           return $target_Item;
    }
    public function karyawan_bagian($amountByid)
    {
        // dd($amountByid);
        $record=[];
        foreach ($amountByid as $key => $value) {
            $jumlah_karyawan=Karyawan::where('id_lembur',$value['id'])->count();
            $jumlah_karyawan_realisasi=Karyawan::where('id_lembur',$value['id'])->where('realisasi_total','>=','0.5')->count();
            $jumlah_jam_realisasi=Karyawan::where('id_lembur',$value['id'])->where('realisasi_total','>=','0.5')->sum('realisasi_total');
            $jumlah_jam_rencana=Karyawan::where('id_lembur',$value['id'])->sum('rencana_total');
            $kualitatif=Kualitatif::where('id_lembur',$value['id'])->get();
            $target_kualitatif=[];
            $realisasi_kualitatif=[];
                foreach ($kualitatif as $key2 => $value2) {
                    if (in_array($value2->target,$target_kualitatif)==false) {
                        $target_kualitatif[]=$value2->target;
                    }
                    if (in_array($value2->realisasi,$realisasi_kualitatif)==false) {
                        $realisasi_kualitatif[]=$value2->target;
                    }
                }
            $target_kuantitatif=Kuantitatif::where('id_lembur',$value['id'])->sum('target');
            $realisasi_kuantitatif=Kuantitatif::where('id_lembur',$value['id'])->sum('realisasi');
                $record[]=[
                    'id'=>$value['id'],
                    'tanggal'=>$value['tanggal'],
                    'departemen'=>$value['departemen'],
                    'bagian'=>$value['bagian'],
                    'nik'=>$value['nik'],
                    'nama'=>$value['nama'],
                    'branch'=>$value['branchdetail'],
                    'amount_rencana'=>$value['amount_rencana'],
                    'amount_realisasi'=>$value['amount_realisasi'],
                    'jumlah_karyawan'=>$jumlah_karyawan,
                    'jumlah_karyawan_realisasi'=>$jumlah_karyawan_realisasi,
                    'jumlah_jam_rencana'=>$jumlah_jam_rencana,
                    'jumlah_jam_realisasi'=>$jumlah_jam_realisasi,
                    'target_kualitatif'=>implode(", ",$target_kualitatif),
                    'realisasi_kualitatif'=>implode(", ",$realisasi_kualitatif),
                    'target_kuantitatif'=> $target_kuantitatif,
                    'realisasi_kuantitatif'=> $realisasi_kuantitatif,

                ];
       }
       
       return $record;
    }
    public function amount_bagian($karyawan_bagian)
    {
        $record=[];
        foreach ($karyawan_bagian as $key => $value) {
            $jumlah_karyawan=collect($karyawan_bagian)->where('branch',$value['branch'])->where('departemen',$value['departemen'])->where('bagian',$value['bagian'])->sum('jumlah_karyawan');
            $jumlah_karyawan_realisasi=collect($karyawan_bagian)->where('branch',$value['branch'])->where('departemen',$value['departemen'])->where('bagian',$value['bagian'])->sum('jumlah_karyawan_realisasi');
            $jumlah_jam_realisasi=collect($karyawan_bagian)->where('branch',$value['branch'])->where('departemen',$value['departemen'])->where('bagian',$value['bagian'])->sum('jumlah_jam_realisasi');
            $jumlah_jam_rencana=collect($karyawan_bagian)->where('branch',$value['branch'])->where('departemen',$value['departemen'])->where('bagian',$value['bagian'])->sum('jumlah_jam_rencana');
            $cost_rencana=collect($karyawan_bagian)->where('branch',$value['branch'])->where('departemen',$value['departemen'])->where('bagian',$value['bagian'])->sum('amount_rencana');
            $cost_realisasi=collect($karyawan_bagian)->where('branch',$value['branch'])->where('departemen',$value['departemen'])->where('bagian',$value['bagian'])->sum('amount_realisasi');
            
            $kualitatif=collect($karyawan_bagian)->where('branch',$value['branch'])->where('departemen',$value['departemen'])->where('bagian',$value['bagian']);
            $target_kualitatif=[];
            $realisasi_kualitatif=[];
                foreach ($kualitatif as $key2 => $value2) {
                    if (in_array($value2['target_kualitatif'],$target_kualitatif)==false) {
                        $target_kualitatif[]=$value2['target_kualitatif'];
                    }
                    if (in_array($value2['realisasi_kualitatif'],$realisasi_kualitatif)==false) {
                        $realisasi_kualitatif[]=$value2['realisasi_kualitatif'];
                    }
                }

            $target_kuantitatif=collect($karyawan_bagian)->where('branch',$value['branch'])->where('departemen',$value['departemen'])->where('bagian',$value['bagian'])->sum('target_kuantitatif');
            $realisasi_kuantitatif=collect($karyawan_bagian)->where('branch',$value['branch'])->where('departemen',$value['departemen'])->where('bagian',$value['bagian'])->sum('realisasi_kuantitatif'); 
            
            $record[]=[
                    'id'=>$value['id'],
                    'tanggal'=>$value['tanggal'],
                    'departemen'=>$value['departemen'],
                    'bagian'=>$value['bagian'],
                    'nik'=>$value['nik'],
                    'nama'=>$value['nama'],
                    'branch'=>$value['branch'],
                    'jumlah_karyawan'=>$jumlah_karyawan,
                    'jumlah_karyawan_realisasi'=>$jumlah_karyawan_realisasi,
                    'jumlah_jam_rencana'=>$jumlah_jam_rencana,
                    'jumlah_jam_realisasi'=>$jumlah_jam_realisasi,
                    'cost_rencana'=>$cost_rencana,
                    'cost_realisasi'=>$cost_realisasi,
                    'target_kualitatif'=>implode(" ",$target_kualitatif),
                    'realisasi_kualitatif'=>implode(" ",$realisasi_kualitatif),
                    'target_kuantitatif'=> $target_kuantitatif,
                    'realisasi_kuantitatif'=> $realisasi_kuantitatif,
                ];
        }
        // dd($record);
      return $record;
    }
    public function eleminasi_bagian($amount_bagian)
    {
        $record=[];
        $collect=collect($amount_bagian)->groupBy('branch');
        foreach ($collect as $key => $value) {
            $dicobain = collect($value)->groupby('departemen');
            foreach ($dicobain as $key2 => $value2) {
                $maafin = collect($value2)
                    ->groupBy('bagian')
                    ->map(function ($item) {
                            return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($maafin as $key3 => $value3) {
                    $record[] = [
                        'id'=>$value3['id'],
                        'tanggal'=>$value3['tanggal'],
                        'departemen'=>$value3['departemen'],
                        'bagian'=>$value3['bagian'],
                        'nik'=>$value3['nik'],
                        'nama'=>$value3['nama'],
                        'branch'=>$value3['branch'],
                        'jumlah_karyawan'=>$value3['jumlah_karyawan'],
                        'jumlah_karyawan_realisasi'=>$value3['jumlah_karyawan_realisasi'],
                        'jumlah_jam_rencana'=>$value3['jumlah_jam_rencana'],
                        'jumlah_jam_realisasi'=>$value3['jumlah_jam_realisasi'],
                        'cost_rencana'=>$value3['cost_rencana'],
                        'cost_realisasi'=>$value3['cost_realisasi'],
                        'target_kualitatif'=>$value3['target_kualitatif'],
                        'realisasi_kualitatif'=>$value3['realisasi_kualitatif'],
                        'target_kuantitatif'=> $value3['target_kuantitatif'],
                        'realisasi_kuantitatif'=> $value3['realisasi_kuantitatif'],
                    ];
                }
            }
        }
        return$record;
    }
    public function awal_akhir($bulan)
    {   
        $bln_tanggal=[];
        $tanggal_awal= Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y-m-d');
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan)->endOfMonth()->format('Y-m-d');
        $bln_tanggal=[
            'awal'  =>$tanggal_awal,
            'akhir' =>$tanggal_akhir,
        ];
        return $bln_tanggal;
    }
    public function tiga_hari()
    {  
        $akhir=date('Y-m-d');
        $date = strtotime($akhir);
        $week = strtotime("-3 day", $date);
        $awal=date('Y-m-d', $week);
        $bln_tanggal=[
            'awal'  =>$awal,
            'akhir' =>$akhir,
        ];
        return $bln_tanggal;
    }

    public function tujuh_hari()
    {  
        $akhir=date('Y-m-d');
        $date = strtotime($akhir);
        $week = strtotime("-7 day", $date);
        $awal=date('Y-m-d', $week);
        $bln_tanggal=[
            'awal'  =>$awal,
            'akhir' =>$akhir,
        ];
        return $bln_tanggal;
    }

    public function amount_branch($a)
    {
        $amount=[
            'CLN'=>collect($a)->where('branchdetail','CLN')->sum('amount_rencana'),
            'GM1'=>collect($a)->where('branchdetail','GM1')->sum('amount_rencana'),
            'GM2'=>collect($a)->where('branchdetail','GM2')->sum('amount_rencana'),
            'GK'=>collect($a)->where('branchdetail','GK')->sum('amount_rencana'),
            'CVC'=>collect($a)->where('branchdetail','CVC')->sum('amount_rencana'),
            'CNJ2'=>collect($a)->where('branchdetail','CNJ2')->sum('amount_rencana'),
            'CVA'=>collect($a)->where('branchdetail','CVA')->sum('amount_rencana'),
            'CBA'=>collect($a)->where('branchdetail','CBA')->sum('amount_rencana'),
        ];

        return $amount;
    }

    public function approve_1($request)
    {
        $pengajuan_lembur=RencanaLembur::wherein('id',$request->id)->get();
        if($request->app==1){
            foreach ($pengajuan_lembur as $key => $value) {
                $id_amount=$value->id;
                $approve=[
                    'status_lembur'=>'Approve 1',
                    'waktu_app1'=>date('Y-m-d H:i:s'),
                ];
                RencanaLembur::whereid($value->id)->update($approve);
                DB::table('notification')->insert([
                    'connection_name'=>"mysql_audit_buye",
                    'table_name'=>"rencana_lembur",
                    'alert_level'=>"DANGER",
                    'id_int'=> $value->id,
                    'nik'=> $value->nik_2,
                    'url'=>"cc.approval",
                    'title'=>"Overtime Request",
                    'desc'=>'From - ' . $value->nama .' Amount : Rp.'. number_format($request->$id_amount, 2, ",", "."),
                    'is_read'=>"0"
                ]);
            }
        }
        elseif($request->app==0){
            foreach ($pengajuan_lembur as $key => $value) {
                $reject=[
                    'status_lembur'=>'Reject 1',
                ];
                RencanaLembur::whereid($value->id)->update($reject);
            }
        }
    }
      
}