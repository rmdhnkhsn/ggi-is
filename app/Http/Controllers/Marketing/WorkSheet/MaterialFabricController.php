<?php

namespace App\Http\Controllers\Marketing\Worksheet;

use File;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Marketing\RekapOrder\RekapOrder;
use App\Models\Marketing\Worksheet\MaterialFabric;
use App\Models\Marketing\Worksheet\MaterialFabricAttentionCutting;

class MaterialFabricController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        //dd($input);

         // untuk update general_id di table master order 
         $update = [
            "fabric_id" => $request->master_id
        ];
        // dd($update);
        RekapOrder::whereId($request->master_id)->update($update);

        $show = MaterialFabric::create($input);

        return redirect()->back();
    }

    public function detail($id)
    {
        $show = MaterialFabric::findorfail($id);
        return response()->json($show);
    }

    public function update(Request $request)
    {
        $update = $request->all();

        MaterialFabric::whereId($request->id)->update($update);
        return redirect()->back();
    }

    public function update_images(Request $request)
    {
        // dd($request->all());
        // untuk resize image
        $master_data = RekapOrder::with('attention_cutting')->findorfail($request->master_id);
        //dd($master_data); 
        // Untuk Resize Image 
            // untuk resize image 1
                if($request->fabric_image != null && $master_data->worksheet_copy != null && $master_data->attention_cutting == null){
                    $fileName=$request->fabric_image;
                }elseif($request->fabric_image != null && $master_data->attention_cutting == null){
                    $file1 = $request->file('fabric_image');
                    $fileName = time()."_".$file1->getClientOriginalName();

                    $Image = Image::make($file1->getRealPath())->resize(600, 400);
                    $thumbPath = public_path() . '/marketing/worksheet/material_fabric/' . $fileName;
                    $upload = Image::make($Image)->save($thumbPath);
                    }
                elseif ($request->fabric_image != null && $master_data->attention_cutting->fabric_image == null) {
                    $file1 = $request->file('fabric_image');
                    $fileName = time()."_".$file1->getClientOriginalName();

                    $Image = Image::make($file1->getRealPath())->resize(600, 400);
                    $thumbPath = public_path() . '/marketing/worksheet/material_fabric/' . $fileName;
                    $upload = Image::make($Image)->save($thumbPath);
                }elseif($request->fabric_image == null && $master_data->attention_cutting == null){
                    $fileName=null;
                }elseif($request->fabric_image != null && $master_data->attention_cutting->fabric_image != null){
                    $fileName=$request->fabric_image;
                }elseif($request->fabric_image == null && $master_data->attention_cutting->fabric_image != null){
                    $fileName = $master_data->attention_cutting->fabric_image;
                }else{
                    $fileName = null;
                }
            // dd($fileName);

            // untuk resize image 2
                if($request->fabric_image2 != null && $master_data->worksheet_copy != null && $master_data->attention_cutting == null){
                    $fileName2=$request->fabric_image2;
                }elseif($request->fabric_image2 != null && $master_data->attention_cutting == null){
                    $file2 = $request->file('fabric_image2');
                    $fileName2 = time()."_".$file2->getClientOriginalName();

                    $Image2 = Image::make($file2->getRealPath())->resize(600, 400);
                    $thumbPath2 = public_path() . '/marketing/worksheet/material_fabric/' . $fileName2;
                    $upload2 = Image::make($Image2)->save($thumbPath2);
                    }
                elseif ($request->fabric_image2 != null && $master_data->attention_cutting->fabric_image2 == null) {
                    $file2 = $request->file('fabric_image2');
                    $fileName2 = time()."_".$file2->getClientOriginalName();

                    $Image2 = Image::make($file2->getRealPath())->resize(600, 400);
                    $thumbPath2 = public_path() . '/marketing/worksheet/material_fabric/' . $fileName2;
                    $upload2 = Image::make($Image2)->save($thumbPath2);
                }elseif($request->fabric_image2 == null && $master_data->attention_cutting == null){
                    $fileName2=null;
                }elseif($request->fabric_image2 != null && $master_data->attention_cutting->fabric_image2 != null){
                    $fileName2=$request->fabric_image2;
                }elseif($request->fabric_image2 == null && $master_data->attention_cutting->fabric_image2 != null){
                    $fileName2 = $master_data->attention_cutting->fabric_image2;
                }else{
                    $fileName2 = null;
                }
            // dd($fileName2);

            // untuk resize image 3
                if($request->fabric_image3 != null && $master_data->worksheet_copy != null && $master_data->attention_cutting == null){
                    $fileName3=$request->fabric_image3;
                }elseif($request->fabric_image3 != null && $master_data->attention_cutting == null){
                    $file3 = $request->file('fabric_image3');
                    $fileName3 = time()."_".$file3->getClientOriginalName();

                    $Image3 = Image::make($file3->getRealPath())->resize(600, 400);
                    $thumbPath3 = public_path() . '/marketing/worksheet/material_fabric/' . $fileName3;
                    $upload3 = Image::make($Image3)->save($thumbPath3);
                    }
                elseif ($request->fabric_image3 != null && $master_data->attention_cutting->fabric_image3 == null) {
                    $file3 = $request->file('fabric_image3');
                    $fileName3 = time()."_".$file3->getClientOriginalName();

                    $Image3 = Image::make($file3->getRealPath())->resize(600, 400);
                    $thumbPath3 = public_path() . '/marketing/worksheet/material_fabric/' . $fileName3;
                    $upload3 = Image::make($Image3)->save($thumbPath3);
                }elseif($request->fabric_image3 == null && $master_data->attention_cutting == null){
                    $fileName3=null;
                }elseif($request->fabric_image3 != null && $master_data->attention_cutting->fabric_image3 != null){
                    $fileName3=$request->fabric_image3;
                }elseif($request->fabric_image3 == null && $master_data->attention_cutting->fabric_image3 != null){
                    $fileName3 = $master_data->attention_cutting->fabric_image3;
                }else{
                    $fileName3 = null;
                }
            // dd($fileName3);

            // untuk resize image 4
                if($request->fabric_image4 != null && $master_data->worksheet_copy != null && $master_data->attention_cutting == null){
                    $fileName4=$request->fabric_image4;
                }elseif($request->fabric_image4 != null && $master_data->attention_cutting == null){
                    $file4 = $request->file('fabric_image4');
                    $fileName4 = time()."_".$file4->getClientOriginalName();

                    $Image4 = Image::make($file4->getRealPath())->resize(600, 400);
                    $thumbPath4 = public_path() . '/marketing/worksheet/material_fabric/' . $fileName4;
                    $upload4 = Image::make($Image4)->save($thumbPath4);
                    }
                elseif ($request->fabric_image4 != null && $master_data->attention_cutting->fabric_image4 == null) {
                    $file4 = $request->file('fabric_image4');
                    $fileName4 = time()."_".$file4->getClientOriginalName();

                    $Image4 = Image::make($file4->getRealPath())->resize(600, 400);
                    $thumbPath4 = public_path() . '/marketing/worksheet/material_fabric/' . $fileName4;
                    $upload4 = Image::make($Image4)->save($thumbPath4);
                }elseif($request->fabric_image4 == null && $master_data->attention_cutting == null){
                    $fileName4=null;
                }elseif($request->fabric_image4 != null && $master_data->attention_cutting->fabric_image4 != null){
                    $fileName4=$request->fabric_image4;
                }elseif($request->fabric_image4 == null && $master_data->attention_cutting->fabric_image4 != null){
                    $fileName4 = $master_data->attention_cutting->fabric_image4;
                }else{
                    $fileName4 = null;
                }
            // dd($fileName4);

            // untuk resize image 5
                if($request->fabric_image5 != null && $master_data->worksheet_copy != null && $master_data->attention_cutting == null){
                    $fileName5=$request->fabric_image5;
                }elseif($request->fabric_image5 != null && $master_data->attention_cutting == null){
                    $file5 = $request->file('fabric_image5');
                    $fileName5 = time()."_".$file5->getClientOriginalName();

                    $Image5 = Image::make($file5->getRealPath())->resize(600, 400);
                    $thumbPath5 = public_path() . '/marketing/worksheet/material_fabric/' . $fileName5;
                    $upload5 = Image::make($Image5)->save($thumbPath5);
                    }
                elseif ($request->fabric_image5 != null && $master_data->attention_cutting->fabric_image5 == null) {
                    $file5 = $request->file('fabric_image5');
                    $fileName5 = time()."_".$file5->getClientOriginalName();

                    $Image5 = Image::make($file5->getRealPath())->resize(600, 400);
                    $thumbPath5 = public_path() . '/marketing/worksheet/material_fabric/' . $fileName5;
                    $upload5 = Image::make($Image5)->save($thumbPath5);
                }elseif($request->fabric_image5 == null && $master_data->attention_cutting == null){
                    $fileName5=null;
                }elseif($request->fabric_image5 != null && $master_data->attention_cutting->fabric_image5 != null){
                    $fileName5=$request->fabric_image5;
                }elseif($request->fabric_image5 == null && $master_data->attention_cutting->fabric_image5 != null){
                    $fileName5 = $master_data->attention_cutting->fabric_image5;
                }else{
                    $fileName5 = null;
                }
            // dd($fileName5);

            // untuk resize image 6
                if($request->fabric_image6 != null && $master_data->worksheet_copy != null && $master_data->attention_cutting == null){
                    $fileName6=$request->fabric_image6;
                }elseif($request->fabric_image6 != null && $master_data->attention_cutting == null){
                    $file6 = $request->file('fabric_image6');
                    $fileName6 = time()."_".$file6->getClientOriginalName();

                    $Image6 = Image::make($file6->getRealPath())->resize(600, 400);
                    $thumbPath6 = public_path() . '/marketing/worksheet/material_fabric/' . $fileName6;
                    $upload6 = Image::make($Image6)->save($thumbPath6);
                    }
                elseif ($request->fabric_image6 != null && $master_data->attention_cutting->fabric_image6 == null) {
                    $file6 = $request->file('fabric_image6');
                    $fileName6 = time()."_".$file6->getClientOriginalName();

                    $Image6 = Image::make($file6->getRealPath())->resize(600, 400);
                    $thumbPath6 = public_path() . '/marketing/worksheet/material_fabric/' . $fileName6;
                    $upload6 = Image::make($Image6)->save($thumbPath6);
                }elseif($request->fabric_image6 == null && $master_data->attention_cutting == null){
                    $fileName6=null;
                }elseif($request->fabric_image6 != null && $master_data->attention_cutting->fabric_image6 != null){
                    $fileName6=$request->fabric_image5;
                }elseif($request->fabric_image6 == null && $master_data->attention_cutting->fabric_image6 != null){
                    $fileName6 = $master_data->attention_cutting->fabric_image6;
                }else{
                    $fileName6 = null;
                }
            // dd($fileName6);
        // End 

        $update = [
            '_token' => $request->_token,
            'master_id' => $request->master_id,
            'attention_sewing' => $request->attention_sewing,
            'sewing_guide' => $request->cutting_guide,
            'fabric_image' => $fileName,
            'fabric_image2' => $fileName2,
            'fabric_image3' => $fileName3,
            'fabric_image4' => $fileName4,
            'fabric_image5' => $fileName5,
            'fabric_image6' => $fileName6,
        ];
        // dd($request->all());
        // dd($update);
        // dd($update);
        if ($master_data->attention_cutting == null) {
            $show = MaterialFabricAttentionCutting::create($update);
        }else {
            $attention = MaterialFabricAttentionCutting::where('master_id', $request->master_id)->first();
            // dd($attention);
            MaterialFabricAttentionCutting::whereId($attention->id)->update($update);
        }
        

        return redirect()->route('worksheet.material_sewing', $request->master_id);
    }

    public function mf_delete($id)
    {
        $data = MaterialFabric::findorfail($id);
        $data->delete();

        return back();
        // dd($data);
    }
}
