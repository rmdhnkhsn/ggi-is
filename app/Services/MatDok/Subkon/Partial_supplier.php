<?php

namespace App\Services\MatDok\Subkon;

use DB;
use Auth;
use Image;
use DataTables;
use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\MaterialImport;
use App\Models\Mat_Doc\Subkon\material;
use App\Models\Mat_Doc\Subkon\pj_kk;
use App\Models\Mat_Doc\Subkon\BarangJadi;
use App\Models\Mat_Doc\Subkon\Bc262;



class Partial_supplier{



    // -------------------------------------- Input Partial supplier---------------------------

    public function id_sj()
    {
        $tgl=date('ymd');
        $lembur = Bc262::where('id_sj','LIKE',$tgl."%")->max('id_sj');
        $table_no=substr($lembur,6,3);
        $tgl = date('ymd');  
        $no= $tgl.$table_no;
        $auto=substr($no,6);
        $auto=intval($auto)+1;
        $auto_number=substr($no,0,6).str_repeat(0,(3-strlen($auto))).$auto;

        return  $auto_number;
    }

    public function id_no_aju()
    {
        $tgl=date('ymd');
        $lembur = Bc262::where('id_no_aju','LIKE',$tgl."%")->max('id_no_aju');
        $table_no=substr($lembur,6,3);
        $tgl = date('ymd');  
        $no= $tgl.$table_no;
        $auto=substr($no,6);
        $auto=intval($auto)+1;
        $auto_number=substr($no,0,6).str_repeat(0,(3-strlen($auto))).$auto;

        return  $auto_number;
    }

    public function insertFile($request,$no_kontrak,$id_no_aju)
    {
        if($request->gbr1 != null){
            $file1 = $request->file('gbr1');
            $fileName1 = 'gbr1'.'_'.time().'.'.'jpeg';
            $Image1 = Image::make($file1->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath1 = public_path() . '/matdok/subkon/' . $fileName1;
            $upload = Image::make($Image1)->save($thumbPath1);
        }
        else{
            $fileName1=null;
        }
        if($request->gbr2 != null){
            $file2 = $request->file('gbr2');
            // $fileName1 = time()."_".$file->getClientOriginalName();
            $fileName2 = 'gbr2'.'_'.time().'.'.'jpeg';
            $Image2 = Image::make($file2->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath2 = public_path() . '/matdok/subkon/' . $fileName2;
            $upload = Image::make($Image2)->save($thumbPath2);
        }
        else{
            $fileName2=null;
        }
        if($request->gbr3 != null){
            $file3 = $request->file('gbr3');
            $fileName3 = 'gbr3'.'_'.time().'.'.'jpeg';
            $Image3 = Image::make($file3->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath3 = public_path() . '/matdok/subkon/' . $fileName3;
            $upload = Image::make($Image3)->save($thumbPath3);
        }
        else{
            $fileName3=null;
        }
        if($request->gbr4 != null){
            $file4 = $request->file('gbr4');
            $fileName4 = 'gbr4'.'_'.time().'.'.'jpeg';
            $Image4 = Image::make($file4->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath4 = public_path() . '/matdok/subkon/' . $fileName4;
            $upload = Image::make($Image4)->save($thumbPath4);
        }
        else{
            $fileName4=null;
        }
        if($request->gbr5 != null){
            $file5 = $request->file('gbr5');
            $fileName5 = 'gbr5'.'_'.time().'.'.'jpeg';
            $Image5 = Image::make($file5->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath5 = public_path() . '/matdok/subkon/' . $fileName5;
            $upload = Image::make($Image5)->save($thumbPath5);
        }
        else{
            $fileName5=null;
        }
        if($request->gbr6 != null){
            $file6 = $request->file('gbr6');
            $fileName6 = 'gbr6'.'_'.time().'.'.'jpeg';
            $Image6 = Image::make($file6->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath6 = public_path() . '/matdok/subkon/' . $fileName6;
            $upload = Image::make($Image6)->save($thumbPath6);
        }
        else{
            $fileName6=null;
        }
        if($request->gbr7 != null){
            $file7 = $request->file('gbr7');
            $fileName7 = 'gbr7'.'_'.time().'.'.'jpeg';
            $Image7 = Image::make($file7->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath7 = public_path() . '/matdok/subkon/' . $fileName7;
            $upload = Image::make($Image7)->save($thumbPath7);
        }
        else{
            $fileName7=null;
        }
        if($request->gbr8 != null){
            $file8 = $request->file('gbr8');
            $fileName8 = 'gbr8'.'_'.time().'.'.'jpeg';
            $Image8 = Image::make($file8->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath8 = public_path() . '/matdok/subkon/' . $fileName8;
            $upload = Image::make($Image8)->save($thumbPath8);
        }
        else{
            $fileName8=null;
        }
        if($request->gbr9 != null){
            $file9 = $request->file('gbr9');
            $fileName9 = 'gbr9'.'_'.time().'.'.'jpeg';
            $Image9 = Image::make($file9->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath9 = public_path() . '/matdok/subkon/' . $fileName9;
            $upload = Image::make($Image9)->save($thumbPath9);
        }
        else{
            $fileName9=null;
        }
        if($request->gbr10 != null){
            $file10 = $request->file('gbr10');
            $fileName10 = 'gbr10'.'_'.time().'.'.'jpeg';
            $Image10 = Image::make($file10->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath10 = public_path() . '/matdok/subkon/' . $fileName10;
            $upload = Image::make($Image10)->save($thumbPath10);
        }
        else{
            $fileName10=null;
        }

        // ======================file FDP =====================
        if($request->pdf1 != null){
            $filePdf1 = $request->file('pdf1');
            $fileName11 = time()."_".$filePdf1->getClientOriginalName();
            $filePdf1->move(public_path('/matdok/subkon/'),$fileName11);
        }
        else{
            $fileName11=null;
        }

        if($request->pdf2 != null){
            $filePdf2 = $request->file('pdf2');
            $fileName12 = time()."_".$filePdf2->getClientOriginalName();
            $filePdf2->move(public_path('/matdok/subkon/'),$fileName12);
        }
        else{
            $fileName12=null;
        }

        if($request->pdf3 != null){
            $filePdf3 = $request->file('pdf3');
            $fileName13 = time()."_".$filePdf3->getClientOriginalName();
            $filePdf3->move(public_path('/matdok/subkon/'),$fileName13);
        }
        else{
            $fileName13=null;
        }
        if($request->pdf4 != null){
            $filePdf4 = $request->file('pdf4');
            $fileName14 = time()."_".$filePdf4->getClientOriginalName();
            $filePdf4->move(public_path('/matdok/subkon/'),$fileName14);
        }
        else{
            $fileName14=null;
        }
        if($request->pdf5 != null){
            $filePdf5 = $request->file('pdf5');
            $fileName15 = time()."_".$filePdf5->getClientOriginalName();
            $filePdf5->move(public_path('/matdok/subkon/'),$fileName15);
        }
        else{
            $fileName15=null;
        }
        if($request->pdf6 != null){
            $filePdf6 = $request->file('pdf6');
            $fileName16 = time()."_".$filePdf6->getClientOriginalName();
            $filePdf6->move(public_path('/matdok/subkon/'),$fileName16);
        }
        else{
            $fileName16=null;
        }

        $dokumen=[
            'id_no_kontrak'=> $no_kontrak,
            'id_no_aju'=> $id_no_aju,
            'no_aju'=> $request->no_aju,
            'gbr1'=>  $fileName1,
            'gbr2'=> $fileName2,
            'gbr3'=> $fileName3,
            'gbr4'=> $fileName4,
            'gbr5'=> $fileName5,
            'gbr6'=> $fileName6,
            'gbr7'=> $fileName7,
            'gbr8'=> $fileName8,
            'gbr9'=> $fileName9,
            'gbr10'=> $fileName10,
            'file1'=> $fileName11,
            'file2'=> $fileName12,
            'file3'=> $fileName13,
            'file4'=> $fileName14,
            'file5'=> $fileName15,
            'file6'=> $fileName16,
        ];
        return $dokumen;
    }
    public function sisa_262($garment,$pengeluaran_261)
    {
        // dd($pengeluaran_261);
        $records=[];
        $a=[];
        foreach ($garment as $key => $value) {
            $pengeluaran=$pengeluaran_261->where('item_number',$value['kode_barang'])->count();
            if($pengeluaran>0){
                $sisa=$pengeluaran_261->where('item_number',$value['kode_barang'])->sum('qty');
                // $a[]=[$sisa1];
            }else{
                $sisa=$value['tersisa'];
                // $a=2;
            }

            $records[]=[
                'id' => $value['id'],
                'id_no_kontrak' => $value['id_no_kontrak'],
                'kode_barang' => $value['kode_barang'],
                'nama_barang' => $value['nama_barang'],
                'satuan' => $value['satuan'],
                'qty' => $value['qty'],
                'jumlah_pengeluaran' => $value['jumlah_pengeluaran'],
                'tersisa' => $sisa,
                'placing' => $value['placing'],
                'request_release' => $value['request_release'],
                'return' => $value['return'],
                'gl_pt' => $value['gl_pt'],
                'return_261'=>$pengeluaran_261->where('item_number',$value['kode_barang'])->first()->item_number??null,
            ];
        }
        return $records;
    }
    

    // -------------------------------------- Input Partial supplier---------------------------

   
}