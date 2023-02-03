<?php


namespace App\GetData\Marketing\Worksheet;

use Image;

class material_sewing{
    public function sewing($master_data, $request)
    {
        // dd($request->sewing_image);
         // untuk resize image 1
         if ($request->sewing_image != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('sewing_image');
            $sewing_image = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/sewing/' . $sewing_image;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->sewing_image != null && $master_data->material_sewing_detail->sewing_image == null) {
            $file = $request->file('sewing_image');
            $sewing_image = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/sewing/' . $sewing_image;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->sewing_image != null && $master_data->material_sewing_detail->sewing_image != null) {
            $file = $request->file('sewing_image');
            $sewing_image = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/sewing/' . $sewing_image;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->sewing_image == null && $master_data->material_sewing_detail == null) {
            $sewing_image=null;
        }elseif($request->sewing_image == null && $master_data->material_sewing_detail->sewing_image != null){
            $sewing_image=$master_data->material_sewing_detail->sewing_image;
        }else {
            $sewing_image=null;
        }

        // untuk resize image 2
        if ($request->sewing_image2 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('sewing_image2');
            $sewing_image2 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/sewing/' . $sewing_image2;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->sewing_image2 != null && $master_data->material_sewing_detail->sewing_image2 == null) {
            $file = $request->file('sewing_image2');
            $sewing_image2 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/sewing/' . $sewing_image2;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->sewing_image2 != null && $master_data->material_sewing_detail->sewing_image2 != null) {
            $file = $request->file('sewing_image2');
            $sewing_image2 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/sewing/' . $sewing_image2;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->sewing_image2 == null && $master_data->material_sewing_detail == null) {
            $sewing_image2=null;
        }elseif($request->sewing_image2 == null && $master_data->material_sewing_detail->sewing_image2 != null){
            $sewing_image2=$master_data->material_sewing_detail->sewing_image2;
        }else {
            $sewing_image2=null;
        }

        // untuk resize image 3
        if ($request->sewing_image3 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('sewing_image3');
            $sewing_image3 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/sewing/' . $sewing_image3;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->sewing_image3 != null && $master_data->material_sewing_detail->sewing_image3 == null) {
            $file = $request->file('sewing_image3');
            $sewing_image3 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/sewing/' . $sewing_image3;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->sewing_image3 != null && $master_data->material_sewing_detail->sewing_image3 != null) {
            $file = $request->file('sewing_image3');
            $sewing_image3 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/sewing/' . $sewing_image3;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->sewing_image3 == null && $master_data->material_sewing_detail == null) {
            $sewing_image3=null;
        }elseif($request->sewing_image3 == null && $master_data->material_sewing_detail->sewing_image3 != null){
            $sewing_image3=$master_data->material_sewing_detail->sewing_image3;
        }else {
            $sewing_image3=null;
        }

        // untuk resize image 4
        if ($request->sewing_image4 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('sewing_image4');
            $sewing_image4 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/sewing/' . $sewing_image4;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->sewing_image4 != null && $master_data->material_sewing_detail->sewing_image4 == null) {
            $file = $request->file('sewing_image4');
            $sewing_image4 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/sewing/' . $sewing_image4;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->sewing_image4 != null && $master_data->material_sewing_detail->sewing_image4 != null) {
            $file = $request->file('sewing_image4');
            $sewing_image4 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/sewing/' . $sewing_image4;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->sewing_image4 == null && $master_data->material_sewing_detail == null) {
            $sewing_image4=null;
        }elseif($request->sewing_image4 == null && $master_data->material_sewing_detail->sewing_image4 != null){
            $sewing_image4=$master_data->material_sewing_detail->sewing_image4;
        }else {
            $sewing_image4=null;
        }

        // untuk resize image 5
        if ($request->sewing_image5 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('sewing_image5');
            $sewing_image5 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/sewing/' . $sewing_image5;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->sewing_image5 != null && $master_data->material_sewing_detail->sewing_image5 == null) {
            $file = $request->file('sewing_image5');
            $sewing_image5 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/sewing/' . $sewing_image5;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->sewing_image5 != null && $master_data->material_sewing_detail->sewing_image5 != null) {
            $file = $request->file('sewing_image5');
            $sewing_image5 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/sewing/' . $sewing_image5;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->sewing_image5 == null && $master_data->material_sewing_detail == null) {
            $sewing_image5=null;
        }elseif($request->sewing_image5 == null && $master_data->material_sewing_detail->sewing_image5 != null){
            $sewing_image5=$master_data->material_sewing_detail->sewing_image5;
        }else {
            $sewing_image5=null;
        }

        // untuk resize image 6
        if ($request->sewing_image6 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('sewing_image6');
            $sewing_image6 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/sewing/' . $sewing_image6;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->sewing_image6 != null && $master_data->material_sewing_detail->sewing_image6 == null) {
            $file = $request->file('sewing_image6');
            $sewing_image6 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/sewing/' . $sewing_image6;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->sewing_image6 != null && $master_data->material_sewing_detail->sewing_image6 != null) {
            $file = $request->file('sewing_image6');
            $sewing_image6 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/sewing/' . $sewing_image6;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->sewing_image6 == null && $master_data->material_sewing_detail == null) {
            $sewing_image6=null;
        }elseif($request->sewing_image6 == null && $master_data->material_sewing_detail->sewing_image6 != null){
            $sewing_image6=$master_data->material_sewing_detail->sewing_image6;
        }else {
            $sewing_image6=null;
        }

         // file 1
        if ($request->sewing_pdf != null && $master_data->material_sewing_detail == null) {
            $request->validate([
                'sewing_pdf' => 'required',
            ]);
            $input = $request->all();
            $file1 = $request->file('sewing_pdf');
            $input['sewing_pdf'] = $file1->getClientOriginalName();
            $file1->move(public_path('/marketing/worksheet/material_sewing/sewing/file/'),$file1->getClientOriginalName());
    
            $file1 = $file1->getClientOriginalName();
        }elseif ($request->sewing_pdf != null && $master_data->material_sewing_detail->sewing_pdf != null) {
            $request->validate([
                'sewing_pdf' => 'required',
            ]);
            $input = $request->all();
            $file1 = $request->file('sewing_pdf');
            $input['sewing_pdf'] = $file1->getClientOriginalName();
            $file1->move(public_path('/marketing/worksheet/material_sewing/sewing/file/'),$file1->getClientOriginalName());
    
            $file1 = $file1->getClientOriginalName();
        }elseif ($request->sewing_pdf == null && $master_data->material_sewing_detail == null) {
            $file1=null;
        }elseif($request->sewing_pdf == null && $master_data->material_sewing_detail->sewing_pdf != null) {
            $file1 =  $master_data->material_sewing_detail->sewing_pdf;
        }else {
            $file1 = null;
        }

        $sewing = [
            'sewing_image' => $sewing_image,
            'sewing_image2' => $sewing_image2,
            'sewing_image3' => $sewing_image3,
            'sewing_image4' => $sewing_image4,
            'sewing_image5' => $sewing_image5,
            'sewing_image6' => $sewing_image6,
            'sewing_pdf' => $file1,
        ];

        return $sewing;
    }

    public function label($master_data, $request)
    {
        
         // untuk resize image 1
         if ($request->label_image != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('label_image');
            $label_image = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/label/' . $label_image;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->label_image != null && $master_data->material_sewing_detail->label_image == null) {
            $file = $request->file('label_image');
            $label_image = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/label/' . $label_image;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->label_image != null && $master_data->material_sewing_detail->label_image != null) {
            $file = $request->file('label_image');
            $label_image = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/label/' . $label_image;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->label_image == null && $master_data->material_sewing_detail == null) {
            $label_image=null;
        }elseif($request->label_image == null && $master_data->material_sewing_detail->label_image != null){
            $label_image=$master_data->material_sewing_detail->label_image;
        }else {
            $label_image=null;
        }

        // untuk resize image 2
        if ($request->label_image2 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('label_image2');
            $label_image2 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/label/' . $label_image2;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->label_image2 != null && $master_data->material_sewing_detail->label_image2 == null) {
            $file = $request->file('label_image2');
            $label_image2 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/label/' . $label_image2;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->label_image2 != null && $master_data->material_sewing_detail->label_image2 != null) {
            $file = $request->file('label_image2');
            $label_image2 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/label/' . $label_image2;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->label_image2 == null && $master_data->material_sewing_detail == null) {
            $label_image2=null;
        }elseif($request->label_image2 == null && $master_data->material_sewing_detail->label_image2 != null){
            $label_image2=$master_data->material_sewing_detail->label_image2;
        }else {
            $label_image2=null;
        }

        // untuk resize image 3
        if ($request->label_image3 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('label_image3');
            $label_image3 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/label/' . $label_image3;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->label_image3 != null && $master_data->material_sewing_detail->label_image3 == null) {
            $file = $request->file('label_image3');
            $label_image3 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/label/' . $label_image3;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->label_image3 != null && $master_data->material_sewing_detail->label_image3 != null) {
            $file = $request->file('label_image3');
            $label_image3 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/label/' . $label_image3;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->label_image3 == null && $master_data->material_sewing_detail == null) {
            $label_image3=null;
        }elseif($request->label_image3 == null && $master_data->material_sewing_detail->label_image3 != null){
            $label_image3=$master_data->material_sewing_detail->label_image3;
        }else {
            $label_image3=null;
        }

        // untuk resize image 4
        if ($request->label_image4 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('label_image4');
            $label_image4 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/label/' . $label_image4;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->label_image4 != null && $master_data->material_sewing_detail->label_image4 == null) {
            $file = $request->file('label_image4');
            $label_image4 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/label/' . $label_image4;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->label_image4 != null && $master_data->material_sewing_detail->label_image4 != null) {
            $file = $request->file('label_image4');
            $label_image4 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/label/' . $label_image4;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->label_image4 == null && $master_data->material_sewing_detail == null) {
            $label_image4=null;
        }elseif($request->label_image4 == null && $master_data->material_sewing_detail->label_image4 != null){
            $label_image4=$master_data->material_sewing_detail->label_image4;
        }else {
            $label_image4=null;
        }

        // untuk resize image 5
        if ($request->label_image5 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('label_image5');
            $label_image5 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/label/' . $label_image5;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->label_image5 != null && $master_data->material_sewing_detail->label_image5 == null) {
            $file = $request->file('label_image5');
            $label_image5 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/label/' . $label_image5;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->label_image5 != null && $master_data->material_sewing_detail->label_image5 != null) {
            $file = $request->file('label_image5');
            $label_image5 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/label/' . $label_image5;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->label_image5 == null && $master_data->material_sewing_detail == null) {
            $label_image5=null;
        }elseif($request->label_image5 == null && $master_data->material_sewing_detail->label_image5 != null){
            $label_image5=$master_data->material_sewing_detail->label_image5;
        }else {
            $label_image5=null;
        }

        // untuk resize image 6
        if ($request->label_image6 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('label_image6');
            $label_image6 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/label/' . $label_image6;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->label_image6 != null && $master_data->material_sewing_detail->label_image6 == null) {
            $file = $request->file('label_image6');
            $label_image6 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/label/' . $label_image6;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->label_image6 != null && $master_data->material_sewing_detail->label_image6 != null) {
            $file = $request->file('label_image6');
            $label_image6 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/label/' . $label_image6;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->label_image6 == null && $master_data->material_sewing_detail == null) {
            $label_image6=null;
        }elseif($request->label_image6 == null && $master_data->material_sewing_detail->label_image6 != null){
            $label_image6=$master_data->material_sewing_detail->label_image6;
        }else {
            $label_image6=null;
        }

         // file 1
         if ($request->label_pdf != null && $master_data->material_sewing_detail == null) {
            $request->validate([
                'label_pdf' => 'required',
            ]);
            $input = $request->all();
            $file1 = $request->file('label_pdf');
            $input['label_pdf'] = $file1->getClientOriginalName();
            $file1->move(public_path('/marketing/worksheet/material_sewing/label/file/'),$file1->getClientOriginalName());
    
            $file1 = $file1->getClientOriginalName();
        }elseif ($request->label_pdf != null && $master_data->material_sewing_detail->label_pdf != null) {
            $request->validate([
                'label_pdf' => 'required',
            ]);
            $input = $request->all();
            $file1 = $request->file('label_pdf');
            $input['label_pdf'] = $file1->getClientOriginalName();
            $file1->move(public_path('/marketing/worksheet/material_sewing/label/file/'),$file1->getClientOriginalName());
    
            $file1 = $file1->getClientOriginalName();
        }elseif ($request->label_pdf == null && $master_data->material_sewing_detail == null) {
            $file1=null;
        }elseif($request->label_pdf == null && $master_data->material_sewing_detail->label_pdf != null) {
            $file1 =  $master_data->material_sewing_detail->label_pdf;
        }else {
            $file1 = null;
        }

        $label = [
            'label_image' => $label_image,
            'label_image2' => $label_image2,
            'label_image3' => $label_image3,
            'label_image4' => $label_image4,
            'label_image5' => $label_image5,
            'label_image6' => $label_image6,
            'label_pdf' => $file1,
        ];

        // dd($label);
        return $label;
    }

    public function ironing($master_data, $request)
    {
        
         // untuk resize image 1
         if ($request->ironing_image != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('ironing_image');
            $ironing_image = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/ironing/' . $ironing_image;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->ironing_image != null && $master_data->material_sewing_detail->ironing_image == null) {
            $file = $request->file('ironing_image');
            $ironing_image = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/ironing/' . $ironing_image;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->ironing_image != null && $master_data->material_sewing_detail->ironing_image != null) {
            $file = $request->file('ironing_image');
            $ironing_image = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/ironing/' . $ironing_image;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->ironing_image == null && $master_data->material_sewing_detail == null) {
            $ironing_image=null;
        }elseif($request->ironing_image == null && $master_data->material_sewing_detail->ironing_image != null){
            $ironing_image=$master_data->material_sewing_detail->ironing_image;
        }else {
            $ironing_image=null;
        }

        // untuk resize image 2
        if ($request->ironing_image2 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('ironing_image2');
            $ironing_image2 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/ironing/' . $ironing_image2;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->ironing_image2 != null && $master_data->material_sewing_detail->ironing_image2 == null) {
            $file = $request->file('ironing_image2');
            $ironing_image2 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/ironing/' . $ironing_image2;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->ironing_image2 != null && $master_data->material_sewing_detail->ironing_image2 != null) {
            $file = $request->file('ironing_image2');
            $ironing_image2 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/ironing/' . $ironing_image2;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->ironing_image2 == null && $master_data->material_sewing_detail == null) {
            $ironing_image2=null;
        }elseif($request->ironing_image2 == null && $master_data->material_sewing_detail->ironing_image2 != null){
            $ironing_image2=$master_data->material_sewing_detail->ironing_image2;
        }else {
            $ironing_image2=null;
        }

        // untuk resize image 3
        if ($request->ironing_image3 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('ironing_image3');
            $ironing_image3 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/ironing/' . $ironing_image3;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->ironing_image3 != null && $master_data->material_sewing_detail->ironing_image3 == null) {
            $file = $request->file('ironing_image3');
            $ironing_image3 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/ironing/' . $ironing_image3;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->ironing_image3 != null && $master_data->material_sewing_detail->ironing_image3 != null) {
            $file = $request->file('ironing_image3');
            $ironing_image3 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/ironing/' . $ironing_image3;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->ironing_image3 == null && $master_data->material_sewing_detail == null) {
            $ironing_image3=null;
        }elseif($request->ironing_image3 == null && $master_data->material_sewing_detail->ironing_image3 != null){
            $ironing_image3=$master_data->material_sewing_detail->ironing_image3;
        }else {
            $ironing_image3=null;
        }

        // untuk resize image 4
        if ($request->ironing_image4 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('ironing_image4');
            $ironing_image4 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/ironing/' . $ironing_image4;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->ironing_image4 != null && $master_data->material_sewing_detail->ironing_image4 == null) {
            $file = $request->file('ironing_image4');
            $ironing_image4 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/ironing/' . $ironing_image4;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->ironing_image4 != null && $master_data->material_sewing_detail->ironing_image4 != null) {
            $file = $request->file('ironing_image4');
            $ironing_image4 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/ironing/' . $ironing_image4;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->ironing_image4 == null && $master_data->material_sewing_detail == null) {
            $ironing_image4=null;
        }elseif($request->ironing_image4 == null && $master_data->material_sewing_detail->ironing_image4 != null){
            $ironing_image4=$master_data->material_sewing_detail->ironing_image4;
        }else {
            $ironing_image4=null;
        }

        // untuk resize image 5
        if ($request->ironing_image5 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('ironing_image5');
            $ironing_image5 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/ironing/' . $ironing_image5;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->ironing_image5 != null && $master_data->material_sewing_detail->ironing_image5 == null) {
            $file = $request->file('ironing_image5');
            $ironing_image5 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/ironing/' . $ironing_image5;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->ironing_image5 != null && $master_data->material_sewing_detail->ironing_image5 != null) {
            $file = $request->file('ironing_image5');
            $ironing_image5 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/ironing/' . $ironing_image5;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->ironing_image5 == null && $master_data->material_sewing_detail == null) {
            $ironing_image5=null;
        }elseif($request->ironing_image5 == null && $master_data->material_sewing_detail->ironing_image5 != null){
            $ironing_image5=$master_data->material_sewing_detail->ironing_image5;
        }else {
            $ironing_image5=null;
        }

        // untuk resize image 6
        if ($request->ironing_image6 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('ironing_image6');
            $ironing_image6 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/ironing/' . $ironing_image6;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->ironing_image6 != null && $master_data->material_sewing_detail->ironing_image6 == null) {
            $file = $request->file('ironing_image6');
            $ironing_image6 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/ironing/' . $ironing_image6;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->ironing_image6 != null && $master_data->material_sewing_detail->ironing_image6 != null) {
            $file = $request->file('ironing_image6');
            $ironing_image6 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/ironing/' . $ironing_image6;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->ironing_image6 == null && $master_data->material_sewing_detail == null) {
            $ironing_image6=null;
        }elseif($request->ironing_image6 == null && $master_data->material_sewing_detail->ironing_image6 != null){
            $ironing_image6=$master_data->material_sewing_detail->ironing_image6;
        }else {
            $ironing_image6=null;
        }

         // file 1
         if ($request->ironing_pdf != null && $master_data->material_sewing_detail == null) {
            $request->validate([
                'ironing_pdf' => 'required',
            ]);
            $input = $request->all();
            $file1 = $request->file('ironing_pdf');
            $input['ironing_pdf'] = $file1->getClientOriginalName();
            $file1->move(public_path('/marketing/worksheet/material_sewing/ironing/file/'),$file1->getClientOriginalName());
    
            $file1 = $file1->getClientOriginalName();
        }elseif ($request->ironing_pdf != null && $master_data->material_sewing_detail->ironing_pdf != null) {
            $request->validate([
                'ironing_pdf' => 'required',
            ]);
            $input = $request->all();
            $file1 = $request->file('ironing_pdf');
            $input['ironing_pdf'] = $file1->getClientOriginalName();
            $file1->move(public_path('/marketing/worksheet/material_sewing/ironing/file/'),$file1->getClientOriginalName());
    
            $file1 = $file1->getClientOriginalName();
        }elseif ($request->ironing_pdf == null && $master_data->material_sewing_detail == null) {
            $file1=null;
        }elseif($request->ironing_pdf == null && $master_data->material_sewing_detail->ironing_pdf != null) {
            $file1 =  $master_data->material_sewing_detail->ironing_pdf;
        }else {
            $file1 = null;
        }

        $ironing = [
            'ironing_image' => $ironing_image,
            'ironing_image2' => $ironing_image2,
            'ironing_image3' => $ironing_image3,
            'ironing_image4' => $ironing_image4,
            'ironing_image5' => $ironing_image5,
            'ironing_image6' => $ironing_image6,
            'ironing_pdf' => $file1,
        ];

        // dd($ironing);
        return $ironing;
    }

    public function trimming($master_data, $request)
    {
        // dd($request->all());
         // untuk resize image 1
         if ($request->trimming_image != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('trimming_image');
            $trimming_image = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/trimming/' . $trimming_image;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->trimming_image != null && $master_data->material_sewing_detail->trimming_image == null) {
            $file = $request->file('trimming_image');
            $trimming_image = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/trimming/' . $trimming_image;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->trimming_image != null && $master_data->material_sewing_detail->trimming_image != null) {
            $file = $request->file('trimming_image');
            $trimming_image = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/trimming/' . $trimming_image;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->trimming_image == null && $master_data->material_sewing_detail == null) {
            $trimming_image=null;
        }elseif($request->trimming_image == null && $master_data->material_sewing_detail->trimming_image != null){
            $trimming_image=$master_data->material_sewing_detail->trimming_image;
        }else {
            $trimming_image=null;
        }

        // untuk resize image 2
        if ($request->trimming_image2 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('trimming_image2');
            $trimming_image2 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/trimming/' . $trimming_image2;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->trimming_image2 != null && $master_data->material_sewing_detail->trimming_image2 == null) {
            $file = $request->file('trimming_image2');
            $trimming_image2 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/trimming/' . $trimming_image2;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->trimming_image2 != null && $master_data->material_sewing_detail->trimming_image2 != null) {
            $file = $request->file('trimming_image2');
            $trimming_image2 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/sewing/' . $trimming_image2;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->trimming_image2 == null && $master_data->material_sewing_detail == null) {
            $trimming_image2=null;
        }elseif($request->trimming_image2 == null && $master_data->material_sewing_detail->trimming_image2 != null){
            $trimming_image2=$master_data->material_sewing_detail->trimming_image2;
        }else {
            $trimming_image2=null;
        }

        // untuk resize image 3
        if ($request->trimming_image3 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('trimming_image3');
            $trimming_image3 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/trimming/' . $trimming_image3;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->trimming_image3 != null && $master_data->material_sewing_detail->trimming_image3 == null) {
            $file = $request->file('trimming_image3');
            $trimming_image3 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/trimming/' . $trimming_image3;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->trimming_image3 != null && $master_data->material_sewing_detail->trimming_image3 != null) {
            $file = $request->file('trimming_image3');
            $trimming_image3 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/trimming/' . $trimming_image3;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->trimming_image3 == null && $master_data->material_sewing_detail == null) {
            $trimming_image3=null;
        }elseif($request->trimming_image3 == null && $master_data->material_sewing_detail->trimming_image3 != null){
            $trimming_image3=$master_data->material_sewing_detail->trimming_image3;
        }else {
            $trimming_image3=null;
        }

        // untuk resize image 4
        if ($request->trimming_image4 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('trimming_image4');
            $trimming_image4 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/trimming/' . $trimming_image4;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->trimming_image4 != null && $master_data->material_sewing_detail->trimming_image4 == null) {
            $file = $request->file('trimming_image4');
            $trimming_image4 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/trimming/' . $trimming_image4;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->trimming_image4 != null && $master_data->material_sewing_detail->trimming_image4 != null) {
            $file = $request->file('trimming_image4');
            $trimming_image4 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/trimming/' . $trimming_image4;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->trimming_image4 == null && $master_data->material_sewing_detail == null) {
            $trimming_image4=null;
        }elseif($request->trimming_image4 == null && $master_data->material_sewing_detail->trimming_image4 != null){
            $trimming_image4=$master_data->material_sewing_detail->trimming_image4;
        }else {
            $trimming_image4=null;
        }

        // untuk resize image 5
        if ($request->trimming_image5 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('trimming_image5');
            $trimming_image5 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/trimming/' . $trimming_image5;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->trimming_image5 != null && $master_data->material_sewing_detail->trimming_image5 == null) {
            $file = $request->file('trimming_image5');
            $trimming_image5 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/trimming/' . $trimming_image5;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->trimming_image5 != null && $master_data->material_sewing_detail->trimming_image5 != null) {
            $file = $request->file('trimming_image5');
            $trimming_image5 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/trimming/' . $trimming_image5;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->trimming_image5 == null && $master_data->material_sewing_detail == null) {
            $trimming_image5=null;
        }elseif($request->trimming_image5 == null && $master_data->material_sewing_detail->trimming_image5 != null){
            $trimming_image5=$master_data->material_sewing_detail->trimming_image5;
        }else {
            $trimming_image5=null;
        }

        // untuk resize image 6
        if ($request->trimming_image6 != null && $master_data->material_sewing_detail == null) {
            $file = $request->file('trimming_image6');
            $trimming_image6 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/trimming/' . $trimming_image6;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->trimming_image6 != null && $master_data->material_sewing_detail->trimming_image6 == null) {
            $file = $request->file('trimming_image6');
            $trimming_image6 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/trimming/' . $trimming_image6;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->trimming_image6 != null && $master_data->material_sewing_detail->trimming_image6 != null) {
            $file = $request->file('trimming_image6');
            $trimming_image6 = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/marketing/worksheet/material_sewing/trimming/' . $trimming_image6;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif ($request->trimming_image6 == null && $master_data->material_sewing_detail == null) {
            $trimming_image6=null;
        }elseif($request->trimming_image6 == null && $master_data->material_sewing_detail->trimming_image6 != null){
            $trimming_image6=$master_data->material_sewing_detail->trimming_image6;
        }else {
            $trimming_image6=null;
        }

         // file 1
         if ($request->trimming_pdf != null && $master_data->material_sewing_detail == null) {
            $request->validate([
                'trimming_pdf' => 'required',
            ]);
            $input = $request->all();
            $file1 = $request->file('trimming_pdf');
            $input['trimming_pdf'] = $file1->getClientOriginalName();
            $file1->move(public_path('/marketing/worksheet/material_sewing/trimming/file/'),$file1->getClientOriginalName());
    
            $file1 = $file1->getClientOriginalName();
        }elseif ($request->trimming_pdf != null && $master_data->material_sewing_detail->trimming_pdf != null) {
            $request->validate([
                'trimming_pdf' => 'required',
            ]);
            $input = $request->all();
            $file1 = $request->file('trimming_pdf');
            $input['trimming_pdf'] = $file1->getClientOriginalName();
            $file1->move(public_path('/marketing/worksheet/material_sewing/trimming/file/'),$file1->getClientOriginalName());
    
            $file1 = $file1->getClientOriginalName();
        }elseif ($request->trimming_pdf == null && $master_data->material_sewing_detail == null) {
            $file1=null;
        }elseif($request->trimming_pdf == null && $master_data->material_sewing_detail->trimming_pdf != null) {
            $file1 =  $master_data->material_sewing_detail->trimming_pdf;
        }else {
            $file1 = null;
        }

        $trimming = [
            'trimming_image' => $trimming_image,
            'trimming_image2' => $trimming_image2,
            'trimming_image3' => $trimming_image3,
            'trimming_image4' => $trimming_image4,
            'trimming_image5' => $trimming_image5,
            'trimming_image6' => $trimming_image6,
            'trimming_pdf' => $file1,
        ];

        // dd($trimming);
        return $trimming;
    }

    public function input($sewing, $label, $ironing, $trimming, $request)
    {
        $input = [
            '_token' => $request->_token,
            'master_id' => $request->master_id,
            'attention_sewing' => $request->attention_sewing,
            'sewing_guide' => $request->sewing_guide,
            'attention_label' => $request->attention_label,
            'label_guide' => $request->label_guide,
            'attention_ironing' => $request->attention_ironing,
            'ironing_guide' => $request->ironing_guide,
            'attention_trimming' => $request->attention_trimming,
            'trimming_guide' => $request->trimming_guide,
            'sewing_image' => $sewing['sewing_image'],
            'sewing_image2' => $sewing['sewing_image2'],
            'sewing_image3' => $sewing['sewing_image3'],
            'sewing_image4' => $sewing['sewing_image4'],
            'sewing_image5' => $sewing['sewing_image5'],
            'sewing_image6' => $sewing['sewing_image6'],
            'sewing_pdf' => $sewing['sewing_pdf'],
            'label_image' => $label['label_image'],
            'label_image2' => $label['label_image2'],
            'label_image3' => $label['label_image3'],
            'label_image4' => $label['label_image4'],
            'label_image5' => $label['label_image5'],
            'label_image6' => $label['label_image6'],
            'label_pdf' => $label['label_pdf'],
            'ironing_image' => $ironing['ironing_image'],
            'ironing_image2' => $ironing['ironing_image2'],
            'ironing_image3' => $ironing['ironing_image3'],
            'ironing_image4' => $ironing['ironing_image4'],
            'ironing_image5' => $ironing['ironing_image5'],
            'ironing_image6' => $ironing['ironing_image6'],
            'ironing_pdf' => $ironing['ironing_pdf'],
            'trimming_image' => $trimming['trimming_image'],
            'trimming_image2' => $trimming['trimming_image2'],
            'trimming_image3' => $trimming['trimming_image3'],
            'trimming_image4' => $trimming['trimming_image4'],
            'trimming_image5' => $trimming['trimming_image5'],
            'trimming_image6' => $trimming['trimming_image6'],
            'trimming_pdf' => $trimming['trimming_pdf']
        ]; 
        // dd($request->all());
        return $input;
    }
}