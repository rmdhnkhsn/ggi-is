<?php

namespace App\Services\MatDok\Subkon;

use DB;
use Auth;
use DataTables;
use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\MaterialImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Mat_Doc\Subkon\material;
use App\Models\Mat_Doc\Subkon\pj_kk;
use App\Models\Mat_Doc\Subkon\BarangJadi;
use App\Models\Mat_Doc\Subkon\Bc262;
use App\Models\Mat_Doc\Subkon\Bc261;



class subkon{

    public function import_material($data_material,$no_kontrak)
    {
        // dd($data_material);
        foreach ($data_material as $key => $value) {
            foreach ($value as $key2 => $row) {
                if($key2>0 && $row[2]!=null){
                    $material=[
                        'id_no_kontrak'=>$no_kontrak,
                        'hs_code'=>$row[1],
                        'item_number'=>$row[2],
                        'deskripsi'=>$row[3],
                        'kebutuhan'=>(int)$row[4],
                        'satuan'=>$row[5],
                        'consumption'=>$row[6],
                        'nw'=>$row[7],
                        'gw'=>$row[8],
                        'doc_type'=>$row[9],
                        'bc_number'=>$row[10],
                        'doc_date'=>$row[11],
                        'pos'=>$row[12] ?? 0,
                        'us_price'=>$row[13] ?? 0,
                        'idr_price'=>$row[14] ?? 0,
                        'us'=>$row[15] ?? 0,
                        'idr'=>$row[16] ?? 0,
                        'persen'=>$row[17] ?? 0,
                        'bm'=>(float)$row[18] ?? 0,
                        'bpt'=>(float)$row[19] ?? 0,
                        'btm'=>(float)$row[20] ?? 0,
                        'ppn'=>(float)$row[21] ?? 0,
                        'pph'=>(float)$row[22] ?? 0,
                        'total'=>(float)$row[23] ?? 0,
                    ];
                    material::create($material);
                }
            }
        }
    }
    public function import_barangJadi($data_barangJadi,$no_kontrak)
    {
        foreach ($data_barangJadi as $key1 => $value1) {
            foreach ($value1 as $key2 => $row2) {
                if($key2>0 && $row2[0]!=null){
                    // $excel_date =$row2[5];
                    // $unix_date = ($excel_date - 25569) * 86400;
                    // $excel_date = 25569 + ($unix_date / 86400);
                    // $unix_date = ($excel_date - 25569) * 86400;
                    $material=[
                        'id_no_kontrak'=>$no_kontrak,
                        'kode_barang'=>$row2[0],
                        'nama_barang'=>$row2[1],
                        'satuan'=>$row2[2],
                        'qty'=>$row2[3] ?? 0,
                        'placing'=>$row2[4] ?? 0,
                        // 'request_release'=>date('Y-m-d', $unix_date),
                    ];
                    BarangJadi::create($material);
                }
            }
        }
    }
    public function data_partial($partial)
    {
        $record=[];
        foreach ($partial as $key => $value) {
            foreach ($value->partial as $t) {
                $record[]=[
                    'id'=>$t->id,
                    'no_kontrak'=>$t->id_no_kontrak,
                    'item_number'=>$t->item_number,
                    'no_aju'=>$t->no_aju,
                    'dok_aju'=>$t->dok_aju,
                    'no_daftar'=>$t->no_daftar,
                    'tanggal'=>$t->tanggal,
                    'qty'=>$t->qty,
                    'bm'=>$t->bm,
                    'ppn'=>$t->ppn,
                    'pph'=>$t->pph,
                    'total_jaminan'=>$t->total_jaminan,
                    'id_material'=>$t->id_material,

                ];
            }
        }
        return $record;
    }
    public function data_material($material,$data_partial)
    {
        $record=[];
        foreach ($material as $key => $value) {
            foreach ($value->Material as $t) {
                $collect=collect($data_partial);
                // dd($collect);
                $jumlah_keluar=$collect->where('id_material',$t->id)->sum('qty');
                $record[]=[
                    'id'=>$t->id,
                    'no_kontrak'=>$t->id_no_kontrak,
                    'item_number'=>$t->item_number,
                    'hs_code'=>$t->hs_code,
                    'deskripsi'=>$t->deskripsi,
                    'kebutuhan'=>$t->kebutuhan,
                    'satuan'=>$t->satuan,
                    'consumption'=>$t->consumption,
                    'nw'=>$t->nw,
                    'gw'=>$t->gw,
                    'doc_type'=>$t->doc_type,
                    'bc_number'=>$t->bc_number,
                    'doc_date'=>$t->doc_date,
                    'us_price'=>$t->us_price,
                    'idr_price'=>$t->idr_price,
                    'us'=>$t->us,
                    'idr'=>$t->idr,
                    'bm'=>$t->bm,
                    'bpt'=>$t->bpt,
                    'btm'=>$t->btm,
                    'ppn'=>$t->ppn,
                    'pph'=>$t->pph,
                    'total'=>$t->total,
                    'gl_class'=>$t->gl_class,
                    'hanca'=>$t->hanca,
                    'jumlah_keluar'=>$jumlah_keluar,
                    'tersisa'=>$t->kebutuhan-$jumlah_keluar,

                ];
            }
        }
        return $record;
    }
    public function pemasukan_pengeluaran($material_all,$pemasukan)
    {
        $record=[];
        $data=$pemasukan->flatMap->pemasukan;
        foreach ($material_all as $key => $value) {
            // dd($pemasukan);
            $collect=collect($data);
            $count=$collect->where('kode_barang',$value['item_number'])->count();
            if($count>0){
                $jumlah_pemasukan=$collect->where('kode_barang',$value['item_number'])->sum('qty');
            }
            else{
                $jumlah_pemasukan='0';
            }
            // dd($pemasukan);
                $record[]=[
                    'id'=>$value['id'],
                    'no_kontrak'=>$value['no_kontrak'],
                    'item_number'=>$value['item_number'],
                    'hs_code'=>$value['hs_code'],
                    'deskripsi'=>$value['deskripsi'],
                    'kebutuhan'=>$value['kebutuhan'],
                    'satuan'=>$value['satuan'],
                    'consumption'=>$value['consumption'],
                    'nw'=>$value['nw'],
                    'gw'=>$value['gw'],
                    'doc_type'=>$value['doc_type'],
                    'bc_number'=>$value['bc_number'],
                    'doc_date'=>$value['doc_date'],
                    'us_price'=>$value['us_price'],
                    'idr_price'=>$value['idr_price'],
                    'us'=>$value['us'],
                    'idr'=>$value['idr'],
                    'bm'=>$value['bm'],
                    'bpt'=>$value['bpt'],
                    'btm'=>$value['btm'],
                    'ppn'=>$value['ppn'],
                    'pph'=>$value['pph'],
                    'total'=>$value['total'],
                    'gl_class'=>$value['gl_class'],
                    'hanca'=>$value['hanca'],
                    'jumlah_keluar'=>$value['jumlah_keluar'],
                    'jumlah_pemasukan'=>$jumlah_pemasukan,
                    'tersisa'=>$value['tersisa']+$jumlah_pemasukan,
                    

                ];
        }
        // dd($record);
        return $record;
    }
    public function partial_group($data_partial)
    {
        $group=collect($data_partial)->groupBy('no_aju');
        $a=[];
        foreach($group as $key => $value) {
            foreach($value as $key2 => $value2) {
                $a[]=[
                    'no_aju'=>$key,
                    'tanggal'=>$value2['tanggal'],
                    'no_daftar'=>$value2['no_daftar'],
                    'dok_aju'=>$value2['dok_aju'],
                    'bm'=>$value2['bm'],
                    'ppn'=>$value2['ppn'],
                    'pph'=>$value2['pph'],
                    'total_jaminan'=>$value2['total_jaminan'],

                ];
            }
        }
        $coba = collect($a)
                        ->groupBy('no_aju')
                        ->sortBy('tanggal')
                        ->map(function ($item) {
                            return array_merge(...$item);
                        })->values();
        $data_partial=collect($coba)->SortBy('tanggal');

        return $data_partial;

    }
    public function partial_aju($data_partial,$data_material)
    {
        $partial_aju=[];
        foreach ($data_partial as $key => $value) {
            foreach ($data_material as $key1 => $value1) {
                // dd($value);
                if($value['id_material']==$value1['id']){
                    $partial_aju[]=[
                        'item_number'=>$value['item_number'],
                        'no_aju'=>$value['no_aju'],
                        'dok_aju'=>$value['dok_aju'],
                        'tanggal'=>$value['tanggal'],
                        'no_daftar'=>$value['no_daftar'],
                        'qty'=>$value['qty'],
                        'bm'=>$value['bm'],
                        'ppn'=>$value['ppn'],
                        'pph'=>$value['pph'],
                        'total_jaminan'=>$value['total_jaminan'],
                        'deskripsi'=>$value1['deskripsi'],
                        'kebutuhan'=>$value1['kebutuhan'],
                        'satuan'=>$value1['satuan'],
                        'us_price'=>$value1['us_price'],
                        'idr_price'=>$value1['idr_price'],
                        'idr'=>$value1['idr'],
                        'harga_satuan'=>$value1['idr']/$value1['kebutuhan'],
                        'hs_code'=>$value1['hs_code'],
                        'doc_type'=>$value1['doc_type'],
                        'bc_number'=>$value1['bc_number'],
                        'doc_date'=>$value1['doc_date'],

                    ];
                }
                
            }
           
        }
        return $partial_aju;
    }
    public function update_partial261($data_material,$partial_aju)
    {
        $record=[];
        foreach ($data_material as $key => $value) {
            foreach ($partial_aju as $key1 => $value1) {
                if($value['id']==$value1->id_material){
                    $record[]=[
                        'id'=>$value1->id,
                        'id_material'=>$value1->id_material,
                        'item_number'=>$value1->item_number,
                        'qty'=>$value1->qty,
                        'deskripsi'=>$value['deskripsi'],
                        'satuan'=>$value['satuan'],
                        'tersisa'=>$value['tersisa'],
                    ];
                }
            }
        }
        return $record;
    }
    public function bc262($barang_jadi,$data_pemasukan)
    {
       
        // dd($data_pemasukan);
        $data=[];
        foreach ($barang_jadi as $key => $value) {
            $collect=collect($data_pemasukan);
            $count=$collect->where('id_barangjadi',$value->id)->count();
            if($count>0){
                $pemasukan=$collect->where('id_barangjadi',$value->id)->sum('qty');
            }
            else{
                $pemasukan='0';
            }
            $data[]=[
                'id'=>$value->id,
                'no_kontrak'=>$value->id_no_kontrak,
                'item_number'=>$value->kode_barang,
                'deskripsi'=>$value->nama_barang,
                'satua'=>$value->satuan,
                'qty'=>$value->qty,
                'placing'=>$value->placing,
                'jumlah_pemasukan'=>$pemasukan,
                'sisa'=>$value->qty-$pemasukan,
                'retur'=>$value->retur,
            ];
        }
        // dd($data);
        return $data;

    }
    public function pemasukan_group($data_pemasukan)
    {
        $group=collect($data_pemasukan)->groupBy('no_aju');
        $a=[];
        foreach($group as $key => $value) {
            foreach($value as $key2 => $value2) {
                $a[]=[
                    'no_aju'=>$key,
                    'tanggal'=>$value2['tanggal'],
                    'no_daftar'=>$value2['no_daftar'],
                    'dok_aju'=>$value2['dok_aju'],
                    'bm'=>$value2['bm'],
                    'ppn'=>$value2['ppn'],
                    'pph'=>$value2['pph'],
                    'total_jaminan'=>$value2['total_jaminan'],

                ];
            }
        }
        $coba = collect($a)
                        ->groupBy('no_aju')
                        ->sortBy('tanggal')
                        ->map(function ($item) {
                            return array_merge(...$item);
                        })->values();
        $data_pemasukan=collect($coba)->SortBy('tanggal');

        return $data_pemasukan;

    }
    public function patrial_pemasukan($barang_jadi,$data_pemasukan)
    {
       foreach ($barang_jadi as $key => $value) {
           $jumlah_masuk=$data_pemasukan->where('id_barangjadi',$value->id)->sum('qty');
           $data[]=[
                'id'=>$value->id,
                'id_no_kontrak'=>$value->id_no_kontrak,
                'kode_barang'=>$value->kode_barang,
                'nama_barang'=>$value->nama_barang,
                'satuan'=>$value->satuan,
                'qty'=>$value->qty,
                'jumlah_pengeluaran'=>$jumlah_masuk,
                'tersisa'=>$value->qty-$jumlah_masuk,
                'placing'=>$value->placing,
                'request_release'=>$value->request_release,
                'return'=>$value->retur,

            ];
       }
       return $data;
    }
    public function store_bc262($request)
    {
       $count=count($request->kode_barang);

        for ($i=0; $i < $count ; $i++) { 
            if($request->qty[$i]!=null){
                $data=[
                'id_no_kontrak'=>$request->no_kontrak,
                'id_barangjadi'=>$request->id_barangjadi[$i],
                'kode_barang'=>$request->kode_barang[$i],
                'no_aju'=>$request->no_aju,
                'no_daftar'=>$request->no_daftar,
                'dok_aju'=>$request->dok_aju,
                'tanggal'=>$request->tanggal,
                'bm'=>$request->bm,
                'ppn'=>$request->ppn,
                'pph'=>$request->pph,
                'total_jaminan'=>$request->total_jaminan,
                'qty'=>$request->qty[$i],
                ];
                Bc262::create($data);
            }
        }
    }
    public function pemasukan_aju($data_pemasukan,$barang_jadi)
    {
        $pemasukan_aju=[];
        foreach ($data_pemasukan as $key => $value) {
            foreach ($barang_jadi as $key1 => $value1) {
                // dd($value1);
                if($value['id_barangjadi']==$value1['id']){
                    $pemasukan_aju[]=[
                        'kode_barang'=>$value['kode_barang'],
                        'no_aju'=>$value['no_aju'],
                        'dok_aju'=>$value['dok_aju'],
                        'tanggal'=>$value['tanggal'],
                        'no_daftar'=>$value['no_daftar'],
                        'qty'=>$value['qty'],
                        'bm'=>$value['bm'],
                        'ppn'=>$value['ppn'],
                        'pph'=>$value['pph'],
                        'total_jaminan'=>$value['total_jaminan'],
                        'nama_barang'=>$value1['nama_barang'],
                        'kebutuhan'=>$value1['qty'],
                        'satuan'=>$value1['satuan'],
                        'satuan'=>$value1['satuan'],
                        'return'=>$value1['retur'],
                    ];
                }
                
            }
           
        }
        return $pemasukan_aju;
    }

    public function data_pemasukan($barang_jadi,$data_pemasukan)
    {
        $record=[];
        // dd($barang_jadi);
        foreach ($barang_jadi as $key => $value) {
                $collect=collect($data_pemasukan);
                // dd($collect);
                $jumlah_keluar=$collect->where('id_barangjadi',$value->id)->sum('qty');
                $record[]=[
                    'id'=>$value->id,
                    'no_kontrak'=>$value->id_no_kontrak,
                    'kode_barang'=>$value->kode_barang,
                    'nama_barang'=>$value->nama_barang,
                    'satuan'=>$value->satuan,
                    'qty'=>$value->qty,
                    'placing'=>$value->placing,
                    'request_release'=>$value->request_release,
                    'retur'=>$value->retur,
                    'jumlah_keluar'=>$jumlah_keluar,
                    'tersisa'=>$value->qty-$jumlah_keluar,

                ];
            }
        return $record;
    }

     public function update_partial262($data_barangjadi,$pemasukan_aju)
    {
        $record=[];
        foreach ($data_barangjadi as $key => $value) {
            foreach ($pemasukan_aju as $key1 => $value1) {
                if($value['id']==$value1->id_barangjadi){
                    $record[]=[
                        'id'=>$value1->id,
                        'id_barangjadi'=>$value1->id_barangjadi,
                        'kode_barang'=>$value1->kode_barang,
                        'qty'=>$value1->qty,
                        'nama_barang'=>$value['nama_barang'],
                        'satuan'=>$value['satuan'],
                        'tersisa'=>$value['tersisa'],
                    ];
                }
            }
        }
        return $record;
    }

    public function UploadTPB_Pengeluaran($data_pengeluaran,$data_material)
    {
        $pengeluaran=[];
        foreach ($data_pengeluaran as $key => $value) {
            foreach ($data_material as $key1 => $value1) {
               if($value->id_material==$value1->id)
                $pengeluaran[]=[
                    'jenis_dok'=>'1',
                    'no_dok'=>$value->no_daftar,
                    'tgl_dok'=>$value->tanggal,
                    'uraian_barang'=>$value1->deskripsi,
                    'jumlah_barang'=>$value->qty,
                    'satuan'=>$value1->satuan,
                    'sku'=>$value->item_number,
                ];
            }
            
        }
       return $pengeluaran;
    }
    public function UploadTPB_Pemasukan($data_pemasukan,$barang_jadi)
    {
        $pemasukan=[];
        foreach ($data_pemasukan as $key => $value) {
            foreach ($barang_jadi as $key1 => $value1) {
               if($value->id_barangjadi==$value1->id)
                $pemasukan[]=[
                    'jenis_dok'=>'2',
                    'no_dok'=>$value->no_daftar,
                    'tgl_dok'=>$value->tanggal,
                    'uraian_barang'=>$value1->nama_barang,
                    'jumlah_barang'=>$value->qty,
                    'satuan'=>$value1->satuan,
                    'sku'=>$value->kode_barang,
                ];
            }
            
        }
       return $pemasukan;
    }
    public function monitoringExcel($pengeluaran,$pemasukan)
    {
        $data=[];
        $a=count($pengeluaran);
        $b=count($pemasukan);
        if($a>$b){
            $count=$a;
        }
        elseif ($a<$b) {
            $count=$b;
        }
        elseif ($a==$b) {
            $count=$a;

        }
        for ($i=0; $i < $count; $i++) { 
            if($i<$a){
                $bc_261=$pengeluaran[$i];
                $no=$i+1;
            }
            else{
                $bc_261=[
                    'no_dok'=>'',
                    'tgl_dok'=>'',
                    'uraian_barang'=>'',
                    'jumlah_barang'=>'',
                    'satuan'=>'',
                    'sku'=>'',
                ];
                $no='';
            }
            if($i<$b){
                $bc_262=$pemasukan[$i];
                $no1=$i+1;
            }
            else{
                $bc_262=[
                    'no_dok'=>'',
                    'tgl_dok'=>'',
                    'uraian_barang'=>'',
                    'jumlah_barang'=>'',
                    'satuan'=>'',
                    'sku'=>'',
                ];
                $no1='';
            }
           $data[]=[
            'no'=>$no,
            'no_dok'=>$bc_261['no_dok'],
            'tgl_dok'=>$bc_261['tgl_dok'],
            'uraian_barang'=>$bc_261['uraian_barang'],
            'jumlah_barang'=>$bc_261['jumlah_barang'],
            'satuan'=>$bc_261['satuan'],
            'sku'=>$bc_261['sku'],
            'no1'=>$no1,
            'no_dok1'=>$bc_262['no_dok'],
            'tgl_dok1'=>$bc_262['tgl_dok'],
            'uraian_barang1'=>$bc_262['uraian_barang'],
            'jumlah_barang1'=>$bc_262['jumlah_barang'],
            'satuan1'=>$bc_262['satuan'],
            'sku1'=>$bc_262['sku'],
            ];
        }
        return $data;
    }
    public function MasterSubkon($data)
    {
        $subkon=[];
        foreach ($data as $key => $value) {
            if((Bc261::where('id_no_kontrak',$value->no_kontrak)->count())||(Bc262::where('id_no_kontrak',$value->no_kontrak)->count())){
            $count=1;
            }
            else{
                $count=0;
            }
            // $qty_kontrak_kerja=$value->Barang_Jadi->where('retur',null);
            // $id_garment=[];
            // foreach ($qty_kontrak_kerja as $key2 => $value2) {
            //     $id_garment[]=$value2->id;
            // }
            // $qty_kontrak=$qty_kontrak_kerja->sum('qty');

            $qty_kontrak_kerja=$value->Barang_Jadi->where('retur',null)->toArray();
            $id_garment=array_column($qty_kontrak_kerja, 'id');
            $qty_kontrak=collect($qty_kontrak_kerja)->sum('qty');
            
            $qty_pemasukan=$value->pemasukan->wherein('id_barangjadi',$id_garment)->sum('qty');
            $balance=$qty_kontrak- $qty_pemasukan;

            $qty_kontrak_261=$value->Material->sum('kebutuhan');
            $qty_pengeluaran=$value->partial->sum('qty');
            $balance261=$qty_kontrak_261-$qty_pengeluaran;
            $subkon[]=[
                'no_kontrak'=>$value->no_kontrak,
                'sub_no_kontrak'=>$value->sub_no_kontrak,
                'branch'=>$value->branch,
                'no_skep'=>$value->no_skep,
                'no_bpj'=>$value->no_bpj,
                'supplier'=>$value->supplier,
                'no_bound'=>$value->no_bound,
                'tarik_cb'=>$value->tarik_cb,
                'bc_262'=>$value->bc_262,
                'jenis_pekerjaan'=>$value->jenis_pekerjaan,
                'nilai_jaminan'=>$value->nilai_jaminan,
                'npwp'=>$value->npwp,
                'no_tpb'=>$value->no_tpb,
                'tgl_persetujuan'=>$value->tgl_persetujuan,
                'tgl_bpj'=>$value->tgl_bpj,
                'tgl_kontrak'=>$value->tgl_kontrak,
                'jatuh_tempo'=>$value->jatuh_tempo,
                'premi'=>$value->premi,
                'jde'=>$value->jde,
                'amount'=>$value->amount,
                'pengusaha_tpb'=>$value->pengusaha_tpb,
                'ket'=>$value->ket,
                'file_jaminan'=>$value->file_jaminan,
                'file_barang'=>$value->file_barang,
                'status'=>$count,
                'status_kontrak'=>$value->status_kontrak,
                'nama'=>$value->nama,
                'nik'=>$value->nik,
                'kurs'=>$value->kurs,
                'izintpb'=>$value->izintpb,
                'created_at'=>$value->created_at,
                'balance'=> $balance,
                'balance261'=>$balance261,
                'qty_kontrak'=>$qty_kontrak,
                'qty_pemasukan'=>$qty_pemasukan,

            ];
        }
        return $subkon;
    }
    public function Daftar_notif()
    {
       $data_karyawan=[
        '0'=>'210043', //ROSMIEN
        '1'=>'220047', //NUNUNG
        '2'=>'100070', //HADI
        '3'=>'320445', //MELA
        '4'=>'290189', //SITI
        '5'=>'380257', //SUCI
       ];
       return $data_karyawan;
    }
    public function notif_JatuhTempo($data_karyawan)
    {
        $tgl_akhir = date('Y-m-d');
        $date = strtotime($tgl_akhir);
        $date = strtotime("+7 day", $date);
        $tanggal=date('Y-m-d', $date);
        $data=pj_kk::where('jatuh_tempo',$tanggal)->get();
        foreach ($data as $key => $value) {
            DB::table('notification')->insert([
                'connection_name'=>"mysql_mat_doc",
                'table_name'=>"pj_kk",
                'alert_level'=>"DANGER",
                'id_int'=> $value->no_kontrak ,
                'nik'=>$value->nik,
                'url'=>"subkon.index",
                'title'=> 'Kontrak '. $value->no_kontrak,
                'desc'=>'Segera jatuh tempo pada '. $value->jatuh_tempo,
                'is_read'=>"0"
            ]);
            foreach ($data_karyawan as $key1 => $value1) {
                DB::table('notification')->insert([
                    'connection_name'=>"mysql_mat_doc",
                    'table_name'=>"pj_kk",
                    'alert_level'=>"DANGER",
                    'id_int'=> $value->no_kontrak ,
                    'nik'=>$value1,
                    'url'=>"subkon.index",
                    'title'=> 'Kontrak '. $value->no_kontrak,
                    'desc'=>'Segera jatuh tempo pada '. $value->jatuh_tempo,
                    'is_read'=>"0"
                ]);
            }
        }
        return $data;
    }

    public function tpb261($patrial_aju,$kontrak)
    {
        $data=[];
        foreach ($patrial_aju as $key => $value) {
            $penjumlahan=$value['harga_satuan']*$value['qty'];
            if($kontrak->kurs!=null || $kontrak->kurs!="" || $kontrak->kurs!=0 ){
                $kurs=$kontrak->kurs;
            }
            else{
                $kurs=1;
            }
            $data[]=[
                'item_number'=>$value['item_number'],
                'no_aju'=>$value['no_aju'],
                'dok_aju'=>$value['dok_aju'],
                'tanggal'=>$value['tanggal'],
                'no_daftar'=>$value['no_daftar'],
                'qty'=>$value['qty'],
                'bm'=>$value['bm'],
                'ppn'=>$value['ppn'],
                'pph'=>$value['pph'],
                'total_jaminan'=>$value['total_jaminan'],
                'deskripsi'=>$value['deskripsi'],
                'kebutuhan'=>$value['kebutuhan'],
                'satuan'=>$value['satuan'],
                'us_price'=>$value['us_price'],
                'idr_price'=>$value['idr_price'],
                'harga_satuan'=>$value['harga_satuan'],
                'penjumlahan'=>$penjumlahan,
                'cif'=>($penjumlahan/$kurs),
                'hs_code'=>$value['hs_code'],
                'doc_type'=>$value['doc_type'],
                'bc_number'=>$value['bc_number'],
                'doc_date'=>$value['doc_date'],
            ];
        }
        $collect=collect($data)->groupBy('deskripsi');

        $record=[];
            foreach ($collect as $key2 => $value2) {
                $eleminasi = collect($value2)
                    ->groupBy('deskripsi')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                })->values()->toArray();
                foreach($eleminasi as $key3 => $value3){
                    $jumlah_qty=collect($data)->where('deskripsi',$key2)->sum('qty');
                    $jumlah_cif=collect($data)->where('deskripsi',$key2)->sum('cif');
                    $total_penjumlahan=collect($data)->where('deskripsi',$key2)->sum('penjumlahan');
                    if (str_contains($value3['doc_date'], '/') || $value3['doc_date']=="" || $value3['doc_date']==null) { 
                        $doc_date=$value3['doc_date'];
                    }
                    else{
                        $excel_date =$value3['doc_date'];
                        $unix_date = ($excel_date - 25569) * 86400;
                        $excel_date = 25569 + ($unix_date / 86400);
                        $unix_date = ($excel_date - 25569) * 86400;
                        $doc_date=date('Y-m-d', $unix_date);
                    }
                    $record[]=[
                        'item_number'=>$value3['item_number'],
                        'no_aju'=>$value3['no_aju'],
                        'dok_aju'=>$value3['dok_aju'],
                        'tanggal'=>$value3['tanggal'],
                        'no_daftar'=>$value3['no_daftar'],
                        'qty'=>$value3['qty'],
                        'bm'=>$value3['bm'],
                        'ppn'=>$value3['ppn'],
                        'pph'=>$value3['pph'],
                        'total_jaminan'=>$value3['total_jaminan'],
                        'deskripsi'=>$value3['deskripsi'],
                        'kebutuhan'=>$value3['kebutuhan'],
                        'satuan'=>$value3['satuan'],
                        'us_price'=>$value3['us_price'],
                        'idr_price'=>$value3['idr_price'],
                        'harga_satuan'=>$value3['harga_satuan'],
                        'penjumlahan'=>$value3['penjumlahan'],
                        'cif'=>$value3['cif'],
                        'hs_code'=>$value3['hs_code'],
                        'jumlah_qty'=>$jumlah_qty,
                        'jumlah_cif'=>round($jumlah_cif,2),
                        'total_penjumlahan'=>round($total_penjumlahan,2),
                        'doc_type'=>$value3['doc_type'],
                        'bc_number'=>$value3['bc_number'],
                        'doc_date'=>$doc_date,
                    ];
                }
            }
       return $record;
    }
    public function data_return($pemasukan_aju,$request)
    {
        $return=collect($pemasukan_aju)->where('return','return');
        $material=material::where('id_no_kontrak',$request->no_kontrak)->get();
        $record=[];
        foreach ($return as $key => $value) {
           foreach ($material as $key2 => $value2) {
                if($value['kode_barang']==$value2->item_number){
                    if($value2->bm=="" ||$value2->bm==""){
                        $bm = 0;
                    }else{
                        $bm=$value2->bm; }
                    if($value2->pph=="" ||$value2->pph==""){
                        $pph = 0;
                    }else{
                        $pph=$value2->pph; }
                    if($value2->ppn=="" ||$value2->ppn==""){
                        $ppn = 0;
                    }else{
                        $ppn=$value2->ppn; }
                    $record[]=[
                        'kode_barang'=>$value['kode_barang'],
                        'no_aju'=>$value['no_aju'],
                        'dok_aju'=>$value['dok_aju'],
                        'tanggal'=>$value['tanggal'],
                        'no_daftar'=>$value['no_daftar'],
                        'qty'=>$value['qty'],
                        'bm'=>$value['bm'],
                        'ppn'=>$value['ppn'],
                        'pph'=>$value['pph'],
                        'total_jaminan'=>$value['total_jaminan'],
                        'nama_barang'=>$value['nama_barang'],
                        'kebutuhan'=>$value['qty'],
                        'satuan'=>$value['satuan'],
                        'return'=>$value['return'],
                        'hs_code'=>$value2->hs_code,
                        'harga_satuan'=>$value2->idr,
                        'harga_bm'=>$bm,
                        'harga_ppn'=>$ppn,
                        'harga_pph'=>$pph,


                    ];
                }
            }
        }
        // dd($record);
        
        $data=[];
        foreach ($record as $key3 => $value3) {
            $jumlah_harga_satuan=collect($record)->sum('harga_satuan');
            $jumlah_bm=collect($record)->sum('harga_bm');
            $jumlah_ppn=collect($record)->sum('harga_ppn');
            $jumlah_pph=collect($record)->sum('harga_pph');
            $data[]=[
                'kode_barang'=>$value3['kode_barang'],
                'no_aju'=>$value3['no_aju'],
                'dok_aju'=>$value3['dok_aju'],
                'tanggal'=>$value3['tanggal'],
                'no_daftar'=>$value3['no_daftar'],
                'qty'=>$value3['qty'],
                'bm'=>$value3['bm'],
                'ppn'=>$value3['ppn'],
                'pph'=>$value3['pph'],
                'total_jaminan'=>$value3['total_jaminan'],
                'nama_barang'=>$value3['nama_barang'],
                'kebutuhan'=>$value3['qty'],
                'satuan'=>$value3['satuan'],
                'return'=>$value3['return'],
                'hs_code'=>$value3['hs_code'],
                'harga_satuan'=>$jumlah_harga_satuan,
                'harga_bm'=>$jumlah_bm,
                'harga_ppn'=>$jumlah_ppn,
                'harga_pph'=>$jumlah_pph,
            ];
        }
        return $data;

    }
    public function tpb262($data_return,$request)
    {
        // $list_item=collect($pemasukan_aju)->where('return','return')->groupBy('kode_barang')->keys();
        // $return=collect($pemasukan_aju)->where('return','return')->groupBy('kode_barang')->map(function ($value,$key) use($request,$list_item){
        //     $material=material::selectRaw("hs_code,sum(bm) as bm,sum(idr) as harga,sum(ppn) as ppn,sum(pph) as pph")
        //                         ->where('id_no_kontrak',$request->no_kontrak)
        //                         ->whereIn('item_number',$list_item)->first();
        //     // $material=material::where('id_no_kontrak',$request->no_kontrak)->groupBy('id_no_kontrak')->get();
        //     // dd($material);

        //     // dd($value);

        //     return [
        //         'kode_barang'=>$value->first()['kode_barang'],
        //         'no_aju'=>$value->first()['no_aju'],
        //         'dok_aju'=>$value->first()['dok_aju'],
        //         'tanggal'=>$value->first()['tanggal'],
        //         'no_daftar'=>$value->first()['no_daftar'],
        //         'qty'=>$value->first()['qty'],
        //         'bm'=>$value->first()['bm'],
        //         'ppn'=>$value->first()['ppn'],
        //         'pph'=>$value->first()['pph'],
        //         'total_jaminan'=>$value->first()['total_jaminan'],
        //         'nama_barang'=>$value->first()['nama_barang'],
        //         'kebutuhan'=>$value->first()['qty'],
        //         'satuan'=>$value->first()['satuan'],
        //         'return'=>$value->first()['return'],

        //         'harga_satuan'=>$material->harga,
        //         'harga_bm'=>$material->bm,
        //         'hs_code'=>$material->hs_code,
        //         'harga_ppn'=>$material->ppn,
        //         'harga_pph'=>$material->pph,

        //     ];
        // });

        // dd($return);
        $record=[];
        foreach ($data_return as $key => $value) {
            $cif=($value['harga_satuan']/$request->total_garmen)/($value['harga_bm']/$request->total_garmen);
                $record[]=[
                    'kode_barang'=>$value['kode_barang'],
                    'no_aju'=>$value['no_aju'],
                    'dok_aju'=>$value['dok_aju'],
                    'tanggal'=>$value['tanggal'],
                    'no_daftar'=>$value['no_daftar'],
                    'qty'=>$value['qty'],
                    'bm'=>$value['bm'],
                    'ppn'=>$value['ppn'],
                    'pph'=>$value['pph'],
                    'total_jaminan'=>$value['total_jaminan'],
                    'nama_barang'=>$value['nama_barang'],
                    'kebutuhan'=>$value['qty'],
                    'satuan'=>$value['satuan'],
                    'return'=>$value['return'],
                    'netto'=>$value['qty']*$request->note,
                    'harga_satuan'=>round($value['harga_satuan']/$request->total_garmen,2),
                    'harga_bm'=>round($value['harga_bm']/$request->total_garmen,2),
                    'hs_code'=>$value['hs_code'],
                    'harga_ppn'=>round($value['harga_ppn']/$request->total_garmen,2),
                    'harga_pph'=>round($value['harga_pph']/$request->total_garmen,2),
                    'cif'=>round($cif,2),
                    'penjumlahan'=>round($cif*$value['qty'],2)

                ];
          
        }
        $collect=collect($record)->groupBy('nama_barang');

        $data=[];
            foreach ($collect as $key2 => $value2) {
                $item=[];
                foreach ($value2 as $key4 => $value4) {
                    $item[]=$value4['kode_barang'];
                }
                $list_item=implode("/ ",$item);
                $eleminasi = collect($value2)
                    ->groupBy('nama_barang')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                })->values()->toArray();
                foreach($eleminasi as $key3 => $value3){
                    $jumlah_qty=collect($record)->where('nama_barang',$key2)->sum('qty');
                    $jumlah_netto=collect($record)->where('nama_barang',$key2)->sum('netto');
                    $jumlah_cif=collect($record)->where('nama_barang',$key2)->sum('cif');
                    $jumlah_harga_satuan=collect($record)->where('nama_barang',$key2)->sum('harga_satuan');
                    $jumlah_penjumlahan=collect($record)->where('nama_barang',$key2)->sum('penjumlahan');
                    $jumlah_harga_bm=collect($record)->where('nama_barang',$key2)->sum('harga_bm');
                    $jumlah_harga_ppn=collect($record)->where('nama_barang',$key2)->sum('harga_ppn');
                    $jumlah_harga_pph=collect($record)->where('nama_barang',$key2)->sum('harga_pph');
                    $total_penjumlahan=collect($record)->where('nama_barang',$key2)->sum('penjumlahan');
                    
                    $data[]=[
                        'kode_barang'=>$list_item,
                        'no_aju'=>$value3['no_aju'],
                        'dok_aju'=>$value3['dok_aju'],
                        'tanggal'=>$value3['tanggal'],
                        'no_daftar'=>$value3['no_daftar'],
                        'qty'=>$jumlah_qty,
                        'bm'=>$value3['bm'],
                        'ppn'=>$value3['ppn'],
                        'pph'=>$value3['pph'],
                        'total_jaminan'=>$value3['total_jaminan'],
                        'nama_barang'=>$value3['nama_barang'],
                        'kebutuhan'=>$value3['qty'],
                        'satuan'=>$value3['satuan'],
                        'return'=>$value3['return'],
                        'netto'=>$jumlah_netto,
                        'harga_satuan'=>$jumlah_harga_satuan,
                        'harga_bm'=>$jumlah_harga_bm,
                        'hs_code'=>$value['hs_code'],
                        'harga_ppn'=>$jumlah_harga_ppn,
                        'harga_pph'=>$jumlah_harga_pph,
                        'cif'=>$jumlah_cif,
                        'penjumlahan'=>$jumlah_penjumlahan,
                    ];
                }
            }

        // foreach ($return as $key => $value) {
        //    foreach ($material as $key2 => $value2) {
        //     if($value['kode_barang']==$value2->item_number){
        //         $record[]=[
        //             'kode_barang'=>$value['kode_barang'],
        //             'no_aju'=>$value['no_aju'],
        //             'dok_aju'=>$value['dok_aju'],
        //             'tanggal'=>$value['tanggal'],
        //             'no_daftar'=>$value['no_daftar'],
        //             'qty'=>$value['qty'],
        //             'bm'=>$value['bm'],
        //             'ppn'=>$value['ppn'],
        //             'pph'=>$value['pph'],
        //             'total_jaminan'=>$value['total_jaminan'],
        //             'nama_barang'=>$value['nama_barang'],
        //             'kebutuhan'=>$value['qty'],
        //             'satuan'=>$value['satuan'],
        //             'return'=>$value['return'],
        //             'harga_satuan'=>$value2['idr'],
        //             'hs_code'=>$value2['hs_code'],
        //             'material_bm'=>$value2->bm,


        //         ];
        //     }

        //    }
        // }
        // dd($record);
        // dd($pemasukan_aju);

        return $data;

    }

    public function PerhitunganJaminan($kontrak)
    {
        foreach($kontrak->material as $key => $value){
            if (str_contains($value->doc_date, '/') || $value->doc_date=="" || $value->doc_date==null) {
                $doc_date=$value->doc_date;
            }
            else{
                $excel_date =$value->doc_date;
                $unix_date = ($excel_date - 25569) * 86400;
                $excel_date = 25569 + ($unix_date / 86400);
                $unix_date = ($excel_date - 25569) * 86400;
                $doc_date=date('Y-m-d', $unix_date);
            } 
            $record[]=[
                'hs_code'=>$value->hs_code,
                'item_number'=>$value->item_number,
                'deskripsi'=>$value->deskripsi,
                'kebutuhan'=>$value->kebutuhan,
                'satuan'=>$value->satuan,
                'consumption'=>$value->consumption,
                'nw'=>$value->nw,
                'gw'=>$value->gw,
                'doc_type'=>$value->doc_type,
                'bc_number'=>$value->bc_number,
                'doc_date'=>$doc_date,
                'pos'=>$value->pos,
                'us_price'=>$value->us_price,
                'idr_price'=>$value->idr_price,
                'us'=>$value->us,
                'idr'=>$value->idr,
                'persen'=>$value->persen,
                'bm'=>$value->bm,
                'bpt'=>$value->bpt,
                'btm'=>$value->btm,
                'ppn'=>$value->ppn,
                'pph'=>$value->pph,
                'total'=>$value->total,
            ];
        }
        return $record;
    }

    public function pembulatan_uang($uang)
    {
        $ratusan = substr($uang, -3);
        $pembulatan=1000-$ratusan;
        $akhir = $uang + $pembulatan;

        return $akhir;
    }

    public function notif_team_dokumen($data_karyawan, $request, $no_kontrak)
    {
        foreach ($data_karyawan as $key => $value) {
            DB::table('notification')->insert([
                'connection_name'=>"mysql_mat_doc",
                'table_name'=>"pj_kk",
                'alert_level'=>"INFO",
                'id_int'=> $no_kontrak ,
                'nik'=>$value,
                'url'=>"subkon.index",
                'title'=>  $request->no_kontrak,
                'desc'=>'Kontrak Baru',
                'is_read'=>"0"
            ]);
        }
    }

   
}