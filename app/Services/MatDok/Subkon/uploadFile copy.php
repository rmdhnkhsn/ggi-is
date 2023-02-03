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
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Mat_Doc\Subkon\material;
use App\Models\Mat_Doc\Subkon\pj_kk;
use App\Models\Mat_Doc\Subkon\BarangJadi;

class uploadFile{

    public function insertFile($request,$no_kontrak)
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

    public function updateFile($request,$dok)
    {
        // ======================file gambar=====================
        if(($request->gbr1 != null) && ($dok->gbr1 == null)){
            $file1 = $request->file('gbr1');
            $fileName1 = 'gbr1'.'_'.time().'.'.'jpeg';
            $Image1 = Image::make($file1->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath1 = public_path() . '/matdok/subkon/' . $fileName1;
            $upload = Image::make($Image1)->save($thumbPath1);
        }
        elseif(($request->gbr1 != null) && ($dok->gbr1 != null)){
            $file1 = $request->file('gbr1');
            $fileName1 = 'gbr1'.'_'.time().'.'.'jpeg';
            $Image1 = Image::make($file1->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath1 = public_path() . '/matdok/subkon/' . $fileName1;
            $upload = Image::make($Image1)->save($thumbPath1);
        }elseif(($request->gbr1 == null) && ($dok->gbr1 != null)){
            $fileName1 = $dok->gbr1;
            
        }
        else{
            $fileName1=null;
        }

        if(($request->gbr2 != null) && ($dok->gbr2 == null)){
            $file2 = $request->file('gbr2');
            $fileName2 = 'gbr2'.'_'.time().'.'.'jpeg';
            $Image2 = Image::make($file2->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath2 = public_path() . '/matdok/subkon/' . $fileName2;
            $upload = Image::make($Image2)->save($thumbPath2);
        }
        elseif(($request->gbr2 != null) && ($dok->gbr2 != null)){
            $file2 = $request->file('gbr2');
            $fileName2 = 'gbr2'.'_'.time().'.'.'jpeg';
            $Image2 = Image::make($file2->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath2 = public_path() . '/matdok/subkon/' . $fileName2;
            $upload = Image::make($Image2)->save($thumbPath2);
        }elseif(($request->gbr2 == null) && ($dok->gbr2 != null)){
            $fileName2 = $dok->gbr2;
            
        }
        else{
            $fileName2=null;
        }

        if(($request->gbr3 != null) && ($dok->gbr3 == null)){
            $file3 = $request->file('gbr3');
            $fileName3 = 'gbr3'.'_'.time().'.'.'jpeg';
            $Image3 = Image::make($file3->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath3 = public_path() . '/matdok/subkon/' . $fileName3;
            $upload = Image::make($Image3)->save($thumbPath3);
        }
        elseif(($request->gbr3 != null) && ($dok->gbr3 != null)){
            $file3 = $request->file('gbr3');
            $fileName3 = 'gbr3'.'_'.time().'.'.'jpeg';
            $Image3 = Image::make($file3->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath3 = public_path() . '/matdok/subkon/' . $fileName3;
            $upload = Image::make($Image3)->save($thumbPath3);
        }elseif(($request->gbr3 == null) && ($dok->gbr3 != null)){
            $fileName3 = $dok->gbr3;
            
        }
        else{
            $fileName3=null;
        }

        if(($request->gbr4 != null) && ($dok->gbr4 == null)){
            $file4 = $request->file('gbr4');
            $fileName4 = 'gbr4'.'_'.time().'.'.'jpeg';
            $Image4 = Image::make($file4->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath4 = public_path() . '/matdok/subkon/' . $fileName4;
            $upload = Image::make($Image4)->save($thumbPath4);
        }
        elseif(($request->gbr4 != null) && ($dok->gbr4 != null)){
            $file4 = $request->file('gbr4');
            $fileName4 = 'gbr4'.'_'.time().'.'.'jpeg';
            $Image4 = Image::make($file4->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath4 = public_path() . '/matdok/subkon/' . $fileName4;
            $upload = Image::make($Image4)->save($thumbPath4);
        }elseif(($request->gbr4 == null) && ($dok->gbr4 != null)){
            $fileName4 = $dok->gbr4;
        }
        else{
            $fileName4=null;
        }

        if(($request->gbr5 != null) && ($dok->gbr5 == null)){
            $file5 = $request->file('gbr5');
            $fileName5 = 'gbr5'.'_'.time().'.'.'jpeg';
            $Image5 = Image::make($file5->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath5 = public_path() . '/matdok/subkon/' . $fileName5;
            $upload = Image::make($Image5)->save($thumbPath5);
        }
        elseif(($request->gbr5 != null) && ($dok->gbr5 != null)){
            $file5 = $request->file('gbr5');
            $fileName5 = 'gbr5'.'_'.time().'.'.'jpeg';
            $Image5 = Image::make($file5->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath5 = public_path() . '/matdok/subkon/' . $fileName5;
            $upload = Image::make($Image5)->save($thumbPath5);
        }elseif(($request->gbr5 == null) && ($dok->gbr5 != null)){
            $fileName5 = $dok->gbr5;
            
        }
        else{
            $fileName5=null;
        }

        if(($request->gbr6 != null) && ($dok->gbr6 == null)){
            $file6 = $request->file('gbr6');
            $fileName6 = 'gbr6'.'_'.time().'.'.'jpeg';
            $Image6 = Image::make($file6->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath6 = public_path() . '/matdok/subkon/' . $fileName6;
            $upload = Image::make($Image6)->save($thumbPath6);
        }
        elseif(($request->gbr6 != null) && ($dok->gbr6 != null)){
            $file6 = $request->file('gbr6');
            $fileName6 = 'gbr6'.'_'.time().'.'.'jpeg';
            $Image6 = Image::make($file6->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath6 = public_path() . '/matdok/subkon/' . $fileName6;
            $upload = Image::make($Image6)->save($thumbPath6);
        }elseif(($request->gbr6 == null) && ($dok->gbr6 != null)){
            $fileName6 = $dok->gbr6;
            
        }
        else{
            $fileName6=null;
        }

        if(($request->gbr7 != null) && ($dok->gbr7 == null)){
            $file7 = $request->file('gbr7');
            $fileName7 = 'gbr7'.'_'.time().'.'.'jpeg';
            $Image7 = Image::make($file7->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath7 = public_path() . '/matdok/subkon/' . $fileName7;
            $upload = Image::make($Image7)->save($thumbPath7);
        }
        elseif(($request->gbr7 != null) && ($dok->gbr7 != null)){
            $file7 = $request->file('gbr7');
            $fileName7 = 'gbr7'.'_'.time().'.'.'jpeg';
            $Image7 = Image::make($file7->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath7 = public_path() . '/matdok/subkon/' . $fileName7;
            $upload = Image::make($Image7)->save($thumbPath7);
        }elseif(($request->gbr7 == null) && ($dok->gbr7 != null)){
            $fileName7 = $dok->gbr7;
            
        }
        else{
            $fileName7=null;
        }

        if(($request->gbr8 != null) && ($dok->gbr8 == null)){
            $file8 = $request->file('gbr8');
            $fileName8 = 'gbr8'.'_'.time().'.'.'jpeg';
            $Image8 = Image::make($file8->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath8 = public_path() . '/matdok/subkon/' . $fileName8;
            $upload = Image::make($Image8)->save($thumbPath8);
        }
        elseif(($request->gbr8 != null) && ($dok->gbr8 != null)){
            $file8 = $request->file('gbr8');
            $fileName8 = 'gbr8'.'_'.time().'.'.'jpeg';
            $Image8 = Image::make($file8->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath8 = public_path() . '/matdok/subkon/' . $fileName8;
            $upload = Image::make($Image8)->save($thumbPath8);
        }elseif(($request->gbr8 == null) && ($dok->gbr8 != null)){
            $fileName8 = $dok->gbr8;
            
        }
        else{
            $fileName8=null;
        }

        if(($request->gbr9 != null) && ($dok->gbr9 == null)){
            $file9 = $request->file('gbr9');
            $fileName9 = 'gbr9'.'_'.time().'.'.'jpeg';
            $Image9 = Image::make($file9->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath9 = public_path() . '/matdok/subkon/' . $fileName9;
            $upload = Image::make($Image9)->save($thumbPath9);
        }
        elseif(($request->gbr9 != null) && ($dok->gbr9 != null)){
            $file9 = $request->file('gbr9');
            $fileName9 = 'gbr9'.'_'.time().'.'.'jpeg';
            $Image9 = Image::make($file9->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath9 = public_path() . '/matdok/subkon/' . $fileName9;
            $upload = Image::make($Image9)->save($thumbPath9);
        }elseif(($request->gbr9 == null) && ($dok->gbr9 != null)){
            $fileName9 = $dok->gbr9;
            
        }
        else{
            $fileName9=null;
        }

        if(($request->gbr10 != null) && ($dok->gbr10 == null)){
            $file10 = $request->file('gbr10');
            $fileName10 = 'gbr10'.'_'.time().'.'.'jpeg';
            $Image10 = Image::make($file10->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath10 = public_path() . '/matdok/subkon/' . $fileName10;
            $upload = Image::make($Image10)->save($thumbPath10);
        }
        elseif(($request->gbr10 != null) && ($dok->gbr10 != null)){
            $file10 = $request->file('gbr10');
            $fileName10 = 'gbr10'.'_'.time().'.'.'jpeg';
            $Image10 = Image::make($file10->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath10 = public_path() . '/matdok/subkon/' . $fileName10;
            $upload = Image::make($Image10)->save($thumbPath10);
        }elseif(($request->gbr10 == null) && ($dok->gbr10 != null)){
            $fileName10 = $dok->gbr10;
            
        }
        else{
            $fileName10=null;
        }
        // ======================file PDF=====================
        if(($request->pdf1 != null) && ($dok->file1 == null)){
            $filePdf1 = $request->file('pdf1');
            $fileName11 = time()."_".$filePdf1->getClientOriginalName();
            $filePdf1->move(public_path('/matdok/subkon/'),$fileName11);
        }
        elseif(($request->pdf1 != null) && ($dok->file1 != null)){
            $filePdf1 = $request->file('pdf1');
            $fileName11 = time()."_".$filePdf1->getClientOriginalName();
            $filePdf1->move(public_path('/matdok/subkon/'),$fileName11);
        }elseif(($request->pdf1 == null) && ($dok->file1 != null)){
            $fileName11 = $dok->file1;
            
        }
        else{
            $fileName11=null;
        }

        if(($request->pdf2 != null) && ($dok->file2 == null)){
            $filePdf2 = $request->file('pdf2');
            $fileName12 = time()."_".$filePdf2->getClientOriginalName();
            $filePdf2->move(public_path('/matdok/subkon/'),$fileName12);
        }
        elseif(($request->pdf2 != null) && ($dok->file2 != null)){
            $filePdf2 = $request->file('pdf2');
            $fileName12 = time()."_".$filePdf2->getClientOriginalName();
            $filePdf2->move(public_path('/matdok/subkon/'),$fileName12);
        }elseif(($request->pdf1 == null) && ($dok->file2 != null)){
            $fileName12 = $dok->file2;
            
        }
        else{
            $fileName12=null;
        }

        if(($request->pdf3 != null) && ($dok->file3 == null)){
            $filePdf3 = $request->file('pdf3');
            $fileName13 = time()."_".$filePdf3->getClientOriginalName();
            $filePdf3->move(public_path('/matdok/subkon/'),$fileName13);
        }
        elseif(($request->pdf3 != null) && ($dok->file3 != null)){
            $filePdf3 = $request->file('pdf3');
            $fileName13 = time()."_".$filePdf3->getClientOriginalName();
            $filePdf3->move(public_path('/matdok/subkon/'),$fileName13);
        }elseif(($request->pdf3 == null) && ($dok->file3 != null)){
            $fileName13 = $dok->file3;
            
        }
        else{
            $fileName13=null;
        }

        if(($request->pdf4 != null) && ($dok->file4 == null)){
            $filePdf4 = $request->file('pdf4');
            $fileName14 = time()."_".$filePdf4->getClientOriginalName();
            $filePdf4->move(public_path('/matdok/subkon/'),$fileName14);
        }
        elseif(($request->pdf4 != null) && ($dok->file4 != null)){
            $filePdf4 = $request->file('pdf4');
            $fileName14 = time()."_".$filePdf4->getClientOriginalName();
            $filePdf4->move(public_path('/matdok/subkon/'),$fileName14);
        }elseif(($request->pdf4 == null) && ($dok->file4 != null)){
            $fileName14 = $dok->file4;
            
        }
        else{
            $fileName14=null;
        }

        if(($request->pdf5 != null) && ($dok->file5 == null)){
            $filePdf5 = $request->file('pdf5');
            $fileName15 = time()."_".$filePdf5->getClientOriginalName();
            $filePdf5->move(public_path('/matdok/subkon/'),$fileName15);
        }
        elseif(($request->pdf5 != null) && ($dok->file5 != null)){
            $filePdf5 = $request->file('pdf5');
            $fileName15 = time()."_".$filePdf5->getClientOriginalName();
            $filePdf5->move(public_path('/matdok/subkon/'),$fileName15);
        }elseif(($request->pdf5 == null) && ($dok->file5 != null)){
            $fileName15 = $dok->file5;
            
        }
        else{
            $fileName15=null;
        }

        if(($request->pdf6 != null) && ($dok->file6 == null)){
            $filePdf6 = $request->file('pdf6');
            $fileName16 = time()."_".$filePdf6->getClientOriginalName();
            $filePdf6->move(public_path('/matdok/subkon/'),$fileName16);
        }
        elseif(($request->pdf6 != null) && ($dok->file6 != null)){
            $filePdf6 = $request->file('pdf6');
            $fileName16 = time()."_".$filePdf6->getClientOriginalName();
            $filePdf6->move(public_path('/matdok/subkon/'),$fileName16);
        }elseif(($request->pdf6 == null) && ($dok->file6 != null)){
            $fileName16 = $dok->file6;
            
        }
        else{
            $fileName16=null;
        }



        $dokumen=[
            // 'id'=>$request->id_dok,
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
        // dd($dokumen);

        return $dokumen;
    }


    public function create_partial($material_all,$data_JDE)
    {
        $record=[];
        foreach ($material_all as $key => $value) {
            $data=collect($data_JDE);
            $cek_data = $data->where('item_number',$value['item_number'])->count();
            if ($cek_data != 0) {
                $jumlah=$data->where('item_number',$value['item_number'])->first();
                $qty=$jumlah['qty'];
            }
            else{
                $qty=null;
            }
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
                    'tersisa'=>$value['tersisa'],
                    'tampil_sisa'=>$value['tersisa']-$qty,
                    'qty'=>$qty,

                ];
        }
        // dd($record);
        return $record;
    }

    public function Pengeluaran_JDE($pengeluaran_jde)
    {  
        $data_JDE=[];
        foreach ($pengeluaran_jde as $key => $value) {
            $qty=$pengeluaran_jde->where('F564111H_ITM',$value->F564111H_ITM)->sum('F564111H_TRQT');
            $data_JDE[]=[
                'item_number'=>$value->F564111H_ITM,
                'qty'=>$qty,
            ];
        }
        return  $data_JDE;
    }
    

}