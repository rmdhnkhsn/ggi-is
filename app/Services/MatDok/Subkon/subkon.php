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
use App\Models\Mat_Doc\Subkon\dokumen261;
use App\Models\Mat_Doc\Subkon\Aju261;
use App\Services\IT_DT\RPA\GetIssueWO;




class subkon{

    public function import_material($data_material,$no_kontrak)
    {
       //data upload excel
        foreach ($data_material as $key => $value) {
            foreach ($value as $key2 => $row) {
                if($key2>0 && $row[2]!=null){
                    $material[]=[
                        'id_no_kontrak'=>$no_kontrak,
                        'hs_code'=>$row[1],
                        'item_number'=>$row[2],
                        'deskripsi'=>$row[3],
                        'kebutuhan'=>(float)$row[4],
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
                }
            }
        }
        $collect=collect($material)->groupBy('item_number');
        //summary sasuai item number & validasi apalila satuan berbeda
        $summary = [];
        $satuan_beda=[];
        foreach ($collect as $key => $value) {
            $satuan = array_column($value->toArray(), 'satuan');
            $cek_satuan_sama=count(array_unique($satuan));
            
            if($cek_satuan_sama==1){
                $summary[]=[
                    'id_no_kontrak'=>$no_kontrak,
                    'hs_code'=>$value->first()['hs_code'],
                    'item_number'=>$key,
                    'deskripsi'=>$value->first()['deskripsi'],
                    'kebutuhan'=>$value->sum('kebutuhan'),
                    'satuan'=>$value->first()['satuan'],
                    'consumption'=>$value->first()['consumption'],
                    'nw'=>$value->first()['nw'],
                    'gw'=>$value->first()['gw'],
                    'doc_type'=>$value->first()['doc_type'],
                    'bc_number'=>$value->first()['bc_number'],
                    'doc_date'=>$value->first()['doc_date'],
                    'pos'=>$value->first()['pos'],
                    'us_price'=>$value->first()['us_price'],
                    'idr_price'=>$value->first()['idr_price'],
                    'us'=>$value->sum('us'),
                    'idr'=>$value->sum('idr'),
                    'persen'=>$value->first()['persen'],
                    'bm'=>$value->sum('bm'),
                    'bpt'=>$value->first()['bpt'],
                    'btm'=>$value->first()['btm'],
                    'ppn'=>$value->sum('ppn'),
                    'pph'=>$value->sum('pph'),
                    'total'=>$value->sum('total'),
                ];
            }
            elseif($cek_satuan_sama>1){
                $satuan_beda[]=[$key];
            }
        }
        // bisa return data yg berhasil atau list item yg satuan beda
        if($satuan_beda==[]){
            $record= $summary;
        }
        else{
            $record= $satuan_beda;
        }
       return $record;
    }
    public function import_barangJadi($data_barangJadi,$no_kontrak)
    {
        $garment=[];
        foreach ($data_barangJadi as $key1 => $value1) {
            foreach ($value1 as $key2 => $row2) {
                if($key2>0 && $row2[0]!=null){
                    // $excel_date =$row2[5];
                    // $unix_date = ($excel_date - 25569) * 86400;
                    // $excel_date = 25569 + ($unix_date / 86400);
                    // $unix_date = ($excel_date - 25569) * 86400;
                    $garment[]=[
                        'id_no_kontrak'=>$no_kontrak,
                        'kode_barang'=>$row2[0],
                        'nama_barang'=>$row2[1],
                        'satuan'=>$row2[2],
                        'qty'=>$row2[3] ?? 0,
                        'placing'=>$row2[4] ?? 0,
                    ];
                    // BarangJadi::create($garment);
                }
            }
        }
        $collect=collect($garment)->groupBy('kode_barang');
        //summary sasuai item number & validasi apalila satuan berbeda
        $summary = [];
        $satuan_beda=[];
        foreach ($collect as $key => $value) {
            $satuan = array_column($value->toArray(), 'satuan');
            $cek_satuan_sama=count(array_unique($satuan));
            if($cek_satuan_sama==1){
                $summary[]=[
                    'id_no_kontrak'=>$no_kontrak,
                    'kode_barang'=>$key,
                    'nama_barang'=>$value->first()['nama_barang'],
                    'satuan'=>$value->first()['satuan'],
                    'qty'=>$value->sum('qty'),
                    'placing'=>$value->first()['placing'],
                ];
            }
            elseif($cek_satuan_sama>1){
                $satuan_beda[]=[$key];
            }
        }
        // bisa return data yg berhasil atau list item yg satuan beda
        if($satuan_beda==[]){
            $record= $summary;
        }
        else{
            $record= $satuan_beda;
        }
       return $record;

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
        $group=collect($data_partial)->groupBy('no_daftar');
        $a=[];
        foreach($group as $key => $value) {
            foreach($value as $key2 => $value2) {
                $a[]=[
                    'no_daftar'=>$key,
                    'tanggal'=>$value2['tanggal'],
                    'no_aju'=>$value2['no_aju'],
                    'dok_aju'=>$value2['dok_aju'],
                    'bm'=>$value2['bm'],
                    'ppn'=>$value2['ppn'],
                    'pph'=>$value2['pph'],
                    'total_jaminan'=>$value2['total_jaminan'],

                ];
            }
        }
        $coba = collect($a)
                        ->groupBy('no_daftar')
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
    public function update_partial261($data_material,$partial_aju,$data_JDE)
    {
        $record=[];
        foreach ($data_material as $key => $value) {
            foreach ($partial_aju as $key1 => $value1) {
                if($value['id']==$value1->id_material){
                    $data=collect($data_JDE);
                    $gl_class_jde=$data->where('item_number',$value['item_number'])->first()['gl_class_jde'];
                    $record[]=[
                        'id'=>$value1->id,
                        'id_material'=>$value1->id_material,
                        'item_number'=>$value1->item_number,
                        'qty'=>$value1->qty,
                        'deskripsi'=>$value['deskripsi'],
                        'satuan'=>$value['satuan'],
                        'tersisa'=>$value['tersisa'],
                        'gl_class'=>$value['gl_class'],
                        'hanca'=>$value['hanca'],
                        'gl_class_jde'=>$gl_class_jde,
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
        $group=collect($data_pemasukan)->groupBy('id_no_aju');
        $a=[];
        foreach($group as $key => $value) {
            foreach($value as $key2 => $value2) {
                $a[]=[
                    'id_no_aju'=>$key,
                    'no_aju'=>$value2['no_aju'],
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
                        ->groupBy('id_no_aju')
                        ->sortBy('tanggal')
                        ->map(function ($item) {
                            return array_merge(...$item);
                        })->values();
        $data_pemasukan=collect($coba)->SortBy('tanggal');

        return $data_pemasukan;

    }
    public function patrial_pemasukan($barang_jadi,$data_pemasukan)
    {
        $data=[];
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
                'gl_pt'=>$value->item_master()->first()->F4101_GLPT??'',

            ];
        }
        return $data;
    }
    public function store_bc262($request, $id_no_aju)
    {
       $count=count($request->kode_barang);

        for ($i=0; $i < $count ; $i++) { 
            if($request->qty[$i]!=null){
                $data=[
                'id_no_kontrak'=>$request->no_kontrak,
                'id_barangjadi'=>$request->id_barangjadi[$i],
                'kode_barang'=>$request->kode_barang[$i],
                'id_no_aju'=>$id_no_aju,
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
                        'id_no_aju'=>$value['id_no_aju'],
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
                        'no_wo'=>$value1->no_wo,
                        'nama_barang'=>$value['nama_barang'],
                        'satuan'=>$value['satuan'],
                        'tersisa'=>$value['tersisa'],
                        'glpt'=>$value1->item_master()->first()->F4101_GLPT??'',
                    ];
                }
            }
        }
        return $record;
    }

    public function UploadTPB_Pengeluaran($data_pengeluaran,$data_material)
    {
        $pengeluaran=[];
        $jaminan=[];
        $x=$data_pengeluaran->groupBY(['no_daftar','no_aju']);
        foreach ($x as $key => $value) {
            $nilai=0;
            foreach ($value as $k => $v) {
               $nilai=$nilai+$v->sum('total_jaminan')/count($v);
            }
            $jaminan[]=[
                'no_dok'=>$key,
                'jaminan'=>$nilai,
            ];
        }
        foreach ($data_pengeluaran as $key => $value) {
            foreach ($data_material as $key1 => $value1) {
               if($value->id_material==$value1->id){
                    $nilai_jaminan=collect($jaminan)->where('no_dok',$value->no_daftar)->first();
                $pengeluaran[]=[
                    'jenis_dok'=>'1',
                    'no_dok'=>$value->no_daftar,
                    'tgl_dok'=>$value->tanggal,
                    'uraian_barang'=>$value1->deskripsi,
                    'jumlah_barang'=>$value->qty,
                    'satuan'=>$value1->satuan,
                    'sku'=>$value->item_number,
                    'total_jaminan'=>$nilai_jaminan['jaminan'],
                ];
               }
               
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
                    'total_jaminan'=>'',
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
                    'total_jaminan'=>'',
                ];
                $no1='';
            }
            $jaminan=collect($pengeluaran)->where('no_dok',$bc_261['no_dok'])->sum('total_jaminan');
            $count_daftar=collect($pengeluaran)->where('no_dok',$bc_261['no_dok'])->count();
           $data[]=[
            'no'=>$no,
            'no_dok'=>$bc_261['no_dok'],
            'tgl_dok'=>$bc_261['tgl_dok'],
            'uraian_barang'=>$bc_261['uraian_barang'],
            'jumlah_barang'=>$bc_261['jumlah_barang'],
            'satuan'=>$bc_261['satuan'],
            'sku'=>$bc_261['sku'],
            'nilai_jaminan261'=>$bc_261['total_jaminan'],
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
            // cek pengeluaran partial telah di update oleh team doc
            $a=$value->partial->where('no_aju','!=',null)->count();
            $b=$value->partial->Where('dok_aju','!=',null)->count();
            $cek_pengeluaran_update=$a+$b;
             // cek pemasukan partial telah di receive oleh team doc
             $cek_pemasukan_receive=$value->pemasukan->where('id_no_aju','!=',null)->count();

            // dd($value->partial->where('no_aju','!=',null)->Where('dok_aju','!=',null));
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
                'kategori_subkon'=>$value->kategori_subkon,
                'no_kontrak'=>$value->no_kontrak,
                'sub_no_kontrak'=>$value->sub_no_kontrak,
                'branch'=>$value->branch,
                'no_skep'=>$value->no_skep,
                'no_bpj'=>$value->no_bpj,
                'supplier'=>$value->supplier,
                'supplier_code'=>$value->supplier_code,
                'no_bound'=>$value->no_bound,
                'tarik_cb'=>$value->tarik_cb,
                'bc_262'=>$value->bc_262,
                'jenis_pekerjaan'=>$value->jenis_pekerjaan,
                'nilai_jaminan'=>$value->nilai_jaminan,
                'npwp'=>$value->npwp,
                'npwp_supplier'=>$value->npwp_supplier,
                'no_tpb'=>$value->no_tpb,
                'tgl_persetujuan'=>$value->tgl_persetujuan,
                'tgl_bpj'=>$value->tgl_bpj,
                'tgl_kontrak'=>$value->tgl_kontrak,
                'tgl_cb'=>$value->tgl_cb,
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
                'id_branch'=>$value->id_branch,
                'branchdetail'=>$value->supplier_branch,
                'balance'=> $balance,
                'balance261'=>$balance261,
                'qty_kontrak'=>$qty_kontrak,
                'qty_pemasukan'=>$qty_pemasukan,
                'npwp_supplier_jde'=>$value->Supplier()->first()->F0101_TAX??'',
                'cek_pemasukan_receive'=>$cek_pemasukan_receive,
                'cek_pengeluaran_update'=>$cek_pengeluaran_update,


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
                'title'=>  'Kontrak Kerja Baru : ' . $request->no_kontrak,
                'desc'=>'Lihat Detailnya disini',
                'is_read'=>"0"
            ]);
        }
    }

    public function sinkronJde($data_material,$data_JDE)
    {
        $record=[];
        foreach ($data_JDE as $key => $value) {
            foreach ($data_material as $key1 => $value1) {
                if($value['item_number']==$value1->item_number){
                    if($value['satuan']!=$value1->satuan){
                        $conv=(new  GetIssueWO)->get_item_conversion($value['item_number'],$value['branch'],$value['satuan'],$value1->satuan);
                        if ($conv==0) {
                            $conv=(new  GetIssueWO)->get_item_conversion($value['item_number'],$value['branch'],$value1->satuan,$value['satuan']);
                            $qty= $value['qty']/$conv;
                        }
                        else if($conv!==0){
                            $qty= $value['qty']*$conv;
                        }
                        else{
                            $qty= $value['qty'];
                        }
                    }
                    else{
                        $qty= $value['qty'];
                    }

                    $sinkron_old=Bc261::where('id_no_kontrak',$value1->id_no_kontrak)->where('no_daftar',$value['no_daftar'])->first();
                    $record[]=[
                        'id_no_kontrak'=>$value1->id_no_kontrak,
                        'id_material'=>$value1->id,
                        'item_number'=>$value1->item_number,
                        'no_aju'=>$sinkron_old->no_aju??null,
                        'dok_aju'=>$sinkron_old->dok_aju??null,
                        'no_daftar'=>$sinkron_old->no_daftar??$value['no_daftar'],
                        'tanggal'=>$value['tanggal'],
                        'bm'=>$sinkron_old->bm??0,
                        'ppn'=>$sinkron_old->ppn??0,
                        'pph'=>$sinkron_old->pph??0,
                        'total_jaminan'=>$sinkron_old->no_total_jaminandaftar??0,
                        'qty'=>$qty,
                        'bpb'=>$value['bpb'],
                    ];
                    // Bc261::create($record);
                }
            }
        }
        return $record;
        
    }
    public function SinkronJDE_dok($sinkron,$no_kontrak)
    {
        $dokumen=[];
        $groupByDaftar=collect($sinkron)->groupby('no_daftar');
        foreach ($groupByDaftar as $k => $v) {
            $dok261= dokumen261::where('id_no_kontrak',$no_kontrak)->where('no_daftar',$k)->first();
            $dokumen[]=[
                'id_no_kontrak'=>$no_kontrak,
                'no_daftar'=> $k,
                'gbr1'=> $dok261->gbr1??null,
                'gbr2'=> $dok261->gbr2??null,
                'gbr3'=> $dok261->gbr3??null,
                'gbr4'=> $dok261->gbr4??null,
                'gbr5'=> $dok261->gbr5??null,
                'gbr6'=> $dok261->gbr6??null,
                'gbr7'=> $dok261->gbr7??null,
                'gbr8'=> $dok261->gbr8??null,
                'gbr9'=> $dok261->gbr9??null,
                'gbr10'=> $dok261->gbr10??null,
                'file1'=> $dok261->file1??null,
                'file2'=> $dok261->file2??null,
                'file3'=> $dok261->file3??null,
                'file4'=> $dok261->file4??null,
                'file5'=> $dok261->file5??null,
                'file6'=> $dok261->file6??null,
            ];
            // dokumen261::create($dokumen);
        }
        return  $dokumen;
    }
    public function insertSinkron($sinkron,$sinkron_dok,$no_kontrak)
    {

        // insert partial
        foreach ($sinkron as $key => $value) {
            $record=[
                'id_no_kontrak'=>$value['id_no_kontrak'],
                'id_material'=>$value['id_material'],
                'item_number'=>$value['item_number'],
                'no_aju'=>$value['no_aju'],
                'dok_aju'=>$value['dok_aju'],
                'no_daftar'=>$value['no_daftar'],
                'tanggal'=>$value['tanggal'],
                'bm'=>$value['bm'],
                'ppn'=>$value['ppn'],
                'pph'=>$value['pph'],
                'total_jaminan'=>$value['total_jaminan'],
                'qty'=>$value['qty'],
                'bpb'=>$value['bpb'],
            ];
            Bc261::create($record);
        }
        // insert dok
        foreach ($sinkron_dok as $key1 => $value1) {
            $dokumen=[
                'id_no_kontrak'=>$value1['id_no_kontrak'],
                'no_daftar'=> $value1['no_daftar'],
                'gbr1'=> $value1['gbr1'],
                'gbr2'=> $value1['gbr2'],
                'gbr3'=> $value1['gbr3'],
                'gbr4'=> $value1['gbr4'],
                'gbr5'=> $value1['gbr5'],
                'gbr6'=> $value1['gbr6'],
                'gbr7'=> $value1['gbr7'],
                'gbr8'=> $value1['gbr8'],
                'gbr9'=> $value1['gbr9'],
                'gbr10'=> $value1['gbr10'],
                'file1'=> $value1['file1'],
                'file2'=> $value1['file2'],
                'file3'=> $value1['file3'],
                'file4'=> $value1['file4'],
                'file5'=> $value1['file5'],
                'file6'=> $value1['file6'],
            ];
            dokumen261::create($dokumen);
        }
        // insert bpb 
        $groupByDaftar=collect($sinkron)->groupby('no_daftar');
        foreach ($groupByDaftar as $k1 => $v1) {
            $x=$v1->first();
            $array=explode(" ",$x['bpb']); 
            foreach ($array as $k2 => $v2) {
                $bpb=[
                    'id_no_kontrak'=>$no_kontrak,
                    'no_daftar'=> $k1,
                    'bpb'=>$v2,
                    'tgl_transaksi'=>$x['tanggal']
                ];
                Aju261::create($bpb);
            }
        }
    }

    public function store_summary_material($import_material)
    {
         foreach ($import_material as $k => $v) {
                $material_kontrak=[
                    'id_no_kontrak'=>$v['id_no_kontrak'],
                    'hs_code'=>$v['hs_code'],
                    'item_number'=>$v['item_number'],
                    'deskripsi'=>$v['deskripsi'],
                    'kebutuhan'=>$v['kebutuhan'],
                    'satuan'=>$v['satuan'],
                    'consumption'=>$v['consumption'],
                    'nw'=>$v['nw'],
                    'gw'=>$v['gw'],
                    'doc_type'=>$v['doc_type'],
                    'bc_number'=>$v['bc_number'],
                    'doc_date'=>$v['doc_date'],
                    'pos'=>$v['pos'],
                    'us_price'=>$v['us_price'],
                    'idr_price'=>$v['idr_price'],
                    'us'=>$v['us'],
                    'idr'=>$v['idr'],
                    'persen'=>$v['persen'],
                    'bm'=>$v['bm'],
                    'bpt'=>$v['bpt'],
                    'btm'=>$v['btm'],
                    'ppn'=>$v['ppn'],
                    'pph'=>$v['pph'],
                    'total'=>$v['total'],
                ];
                material::create($material_kontrak);
            }
    }
    public function store_summary_barangJadi($import_barangJadi)
    {
         foreach ($import_barangJadi as $k => $v) {
            $garment=[
                'id_no_kontrak'=>$v['id_no_kontrak'],
                'kode_barang'=>$v['kode_barang'],
                'nama_barang'=>$v['nama_barang'],
                'satuan'=>$v['satuan'],
                'qty'=>$v['qty'] ,
                'placing'=>$v['placing'] ,
            ];
            BarangJadi::create($garment);
        }
    }
    public function update_item_261($item_material,$import_material)
    {
        // update
        $data_update=[];
        foreach ($item_material as $key => $value) {
            foreach ($import_material as $key1 => $value1) {
               if($value->item_number==$value1['item_number']){
                $data_update=[
                    'id_no_kontrak'=>$value->id_no_kontrak,
                    'hs_code'=>$value1['hs_code'],
                    'item_number'=>$value->item_number,
                    'deskripsi'=>$value1['deskripsi'],
                    'kebutuhan'=>$value1['kebutuhan'],
                    'satuan'=>$value1['satuan'],
                    'consumption'=>$value1['consumption'],
                    'nw'=>$value1['nw'],
                    'gw'=>$value1['gw'],
                    'doc_type'=>$value1['doc_type'],
                    'bc_number'=>$value1['bc_number'],
                    'doc_date'=>$value1['doc_date'],
                    'pos'=>$value1['pos'],
                    'us_price'=>$value1['us_price'],
                    'idr_price'=>$value1['idr_price'],
                    'us'=>$value1['us'],
                    'idr'=>$value1['idr'],
                    'persen'=>$value1['persen'],
                    'bm'=>$value1['bm'],
                    'bpt'=>$value1['bpt'],
                    'btm'=>$value1['btm'],
                    'ppn'=>$value1['ppn'],
                    'pph'=>$value1['pph'],
                    'total'=>$value1['total'],
                    'gl_class'=>$value->gl_class,
                ];
                material::whereid($value->id)->update($data_update);
               }
            }
        }
        //insert
        foreach ($import_material as $key2 => $value2) {
            $count=$item_material->where('item_number',$value2['item_number'])->count();
            if($count==0){
                $data_insert=[
                    'id_no_kontrak'=>$value2['id_no_kontrak'],
                    'hs_code'=>$value2['hs_code'],
                    'item_number'=>$value2['item_number'],
                    'deskripsi'=>$value2['deskripsi'],
                    'kebutuhan'=>$value2['kebutuhan'],
                    'satuan'=>$value2['satuan'],
                    'consumption'=>$value2['consumption'],
                    'nw'=>$value2['nw'],
                    'gw'=>$value2['gw'],
                    'doc_type'=>$value2['doc_type'],
                    'bc_number'=>$value2['bc_number'],
                    'doc_date'=>$value2['doc_date'],
                    'pos'=>$value2['pos'],
                    'us_price'=>$value2['us_price'],
                    'idr_price'=>$value2['idr_price'],
                    'us'=>$value2['us'],
                    'idr'=>$value2['idr'],
                    'persen'=>$value2['persen'],
                    'bm'=>$value2['bm'],
                    'bpt'=>$value2['bpt'],
                    'btm'=>$value2['btm'],
                    'ppn'=>$value2['ppn'],
                    'pph'=>$value2['pph'],
                    'total'=>$value2['total'],
                ];
                material::create($data_insert);
            }
        }
        //delete
        foreach ($item_material as $key3 => $value3) {
            $count1=collect($import_material)->where('item_number',$value3->item_number)->count();
            if($count1==0){
                $item_material = material::where('id',$value3->id)->delete();
                $bc261=Bc261::where('id_material',$value3->id)->delete();
            }
        }
    }
    public function update_item_262($barang_jadi,$import_barangJadi)
    {
       //update
       $data_update=[];
       foreach ($barang_jadi as $key => $value) {
           foreach ($import_barangJadi as $key1 => $value1) {
              if($value->kode_barang==$value1['kode_barang']){
               $data_update=[
                    'id_no_kontrak'=>$value->id_no_kontrak,
                    'kode_barang'=>$value->kode_barang,
                    'nama_barang'=>$value1['nama_barang'],
                    'satuan'=>$value1['satuan'],
                    'qty'=>$value1['qty'] ,
                    'placing'=>$value1['placing'] ,
               ];
               BarangJadi::whereid($value->id)->update($data_update);
              }
           }
       }
       //insert
        foreach ($import_barangJadi as $key2 => $value2) {
            $count=$barang_jadi->where('kode_barang',$value2['kode_barang'])->count();
            if($count==0){
                $data_insert=[
                    'id_no_kontrak'=>$value2['id_no_kontrak'],
                    'kode_barang'=>$value2['kode_barang'],
                    'nama_barang'=>$value2['nama_barang'],
                    'satuan'=>$value2['satuan'],
                    'qty'=>$value2['qty'] ,
                    'placing'=>$value2['placing'] ,
                ];
                BarangJadi::create($data_insert);
            }
        }
       // delete
        foreach ($barang_jadi as $key3 => $value3) {
            $count1=collect($import_barangJadi)->where('kode_barang',$value3->kode_barang)->count();
            if($count1==0){
                $garment = BarangJadi::where('id',$value3->id)->delete();
                $bc261=Bc262::where('id_barangjadi',$value3->id)->delete();
            }
        }
    }
    // 
}
