<?php

namespace App\Http\Controllers\QC\Inspection;

use Illuminate\Http\Request;
use Image;
use App\Http\Controllers\Controller;
use App\Inspection;
use App\ListBuyer;
use App\Branch;
use App\defectMenu;
use App\defectSubMenu;
use App\finalHeader;
use App\finalSubHeader;
use App\finalInspection;
use App\FinalInspectionDefect;
use App\finalInspectionView; 
use App\Services\inspection\inspection1;
use App\Services\inspection\reportInspection;
use Carbon\Carbon;
use App\Services\bulan;

class InspectionController extends Controller
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


    public function finali(Request $request,  Inspection $inspection )
    {
        $page = 'finali';
        $records= (new inspection1)->Qty($inspection);
        $inspection = finalInspectionView::when(strlen($request->search) > 0, function ($query) {
            $query->where('F4801_DOCO', 'like', '%'.request()->search.'%');
        })
            ->limit(6)
            ->get();


        return view('qc.final-inspection.final-inspection', compact('records', 'inspection','page'));
    }
    
    public function search(Request $request)
    { 
        $page = 'finali';
        return view('qc.final-inspection.search', compact('page'));
    }

    public function header(Request $request, Inspection $inspection)
    {
        $page = 'finali';
        // manggil tabel relasinya

        $finalInspections = finalInspection::where('t_v4801c_doco', $inspection->F4801_DOCO)
            ->orderByDesc('created_at')
            ->orderByDesc('start_inspector')
            ->get();

        // dd($inspection->F4801_UORG);
        $records= (new inspection1)->Qty($inspection);
        //Add Menus if Inspection doesn't have any final Inspection
        if ($finalInspections->isEmpty()) {
            $finalInspectionCreated = finalInspection::create([
                't_v4801c_doco' => $inspection->F4801_DOCO,
            ]);
            $finalInspections->push($finalInspectionCreated);

            $menus = defectMenu::with('defectSubMenu')->get();
            // dd($menus);
            foreach ($menus as $key => $menu) {
                foreach ($menu->defectSubMenu as $key => $subMenu) {
                    FinalInspectionDefect::create([
                        'final_inspection_id' => $finalInspectionCreated->id,
                        'menu_final_id' => $menu->id,
                        'final_submenu_id' => $subMenu->id
                    ]);
                }
            }
        }

        $finalInspection = $finalInspections->isNotEmpty() ?
            $finalInspections->first() :
            [];
        // dd($finalInspection);

        $namaBuyer = ListBuyer::where(
            'F0101_AN8',
            $inspection->F4801_AN8 
        )->first()->F0101_ALPH;

        return view('qc.final-inspection.final-sub.header-sub', compact(
            'namaBuyer', 'finalInspection','records', 'inspection','page'
        ));
    }

    public function startInspection(Request $request, Inspection $inspection, finalInspection $finalInspection)
    {
        $finalInspection->name_inspector    = auth()->user()->nama;
        $finalInspection->start_inspector   = now();
        $finalInspection->waktu_inspector   = now();
        $finalInspection->branch            = auth()->user()->branch;
        $finalInspection->branchdetail      = auth()->user()->branchdetail;
        $finalInspection->save();

        return back()->with("start", 'Inspection Has Been Started!');
    }

    public function restartInspection(Request $request, Inspection $inspection, finalInspection $finalInspection)
    {
        //data  /create/save
        $finalInspectionCreated = finalInspection::create([
            't_v4801c_doco' => $inspection->F4801_DOCO,
            'name_inspector'    => auth()->user()->nama,
            'start_inspector'   => now(),
            'waktu_inspector'   => now(),
            'branch'            => auth()->user()->branch,
            'branchdetail'      => auth()->user()->branchdetail,
        ]);

        $menus = defectMenu::with('defectSubMenu')->get();
        foreach ($menus as $key => $menu) {
            foreach ($menu->defectSubMenu as $key => $subMenu) {
                FinalInspectionDefect::create([
                    'final_inspection_id' => $finalInspectionCreated->id,
                    'menu_final_id' => $menu->id,
                    'final_submenu_id' => $subMenu->id
                ]);
            }
        }

        return back()->with("start", 'Inspection Has Been Restarted!');
    }
    
    public function finishInspection(Request $request, Inspection $inspection, finalInspection $finalInspection)
    {
        //data  /create/save
        $finalInspection->finish_inspector = now();
        $finalInspection->save();

        // $page = 'finali';
        // return view('qc.final-inspection.final-inspection', compact('data2','inspection','page'))->with("finish", 'Inspection Has Been Finished !');
        return redirect()->route('finali.index')->with("finish", 'Inspection Has Been Finished !');
    }
   

    public function updateValidationChecklist(Request $request, Inspection $inspection, finalInspection $finalInspection)
    {
        $finalInspection->pattern = $request->pattern ?? null;
        $finalInspection->size_set = $request->size_set ?? null;
        $finalInspection->pp = $request->pp ?? null;
        $finalInspection->print = $request->print ?? null;
        $finalInspection->shell = $request->shell ?? null;
        $finalInspection->lot = $request->lot ?? null;
        $finalInspection->lining = $request->lining ?? null;
        $finalInspection->interlining = $request->interlining ?? null;
        $finalInspection->thread = $request->thread ?? null;
        $finalInspection->size_label = $request->size_label ?? null;
        $finalInspection->content_label = $request->content_label ?? null;
        $finalInspection->supplier_label = $request->supplier_label ?? null;
        $finalInspection->co_label = $request->co_label ?? null;
        $finalInspection->zip = $request->zip ?? null;
        $finalInspection->shade_lot = $request->shade_lot ?? null;
        $finalInspection->col = $request->col ?? null;
        $finalInspection->whisker = $request->whisker ?? null;
        $finalInspection->tinting = $request->tinting ?? null;
        $finalInspection->hand_sand = $request->hand_sand ?? null;
        $finalInspection->grinding = $request->grinding ?? null;
        $finalInspection->hang = $request->hang ?? null;
        $finalInspection->waist_tag = $request->waist_tag ?? null;
        $finalInspection->joker = $request->joker ?? null;
        $finalInspection->poly_bag = $request->poly_bag ?? null;
        $finalInspection->ticket = $request->ticket ?? null;
        $finalInspection->belt_tag = $request->belt_tag ?? null;
        $finalInspection->spare_yarn = $request->spare_yarn ?? null;
        $finalInspection->hanger = $request->hanger ?? null;
        $finalInspection->shipping = $request->shipping ?? null;
        $finalInspection->fabric = $request->fabric ?? null;


        if (in_array("NOT-CONFORM", array_values($request->all()))) {
            $finalInspection->hasil_validate = 'FAIL';
        }elseif(in_array("CONFORM", array_values($request->all()))) {
            $finalInspection->hasil_validate = 'PASS';
            
        }
      
        $finalInspection->save();
        
// dd( $finalInspection->hasil_validate );
        return back()->with("start", 'Data Has Been Saved !');
    }

    public function updateInspectionMethod(Request $request, Inspection $inspection, finalInspection $finalInspection)
    {
        $finalInspection->inspection_level = $request->inspection_level ?? null;
        $finalInspection->inspection_method =$request->inspection_method ?? null;
        $finalInspection->aql = $request->aql ?? null;
        $finalInspection->save();

        return back()->with("start", 'Data Has Been Saved !');
    }
    
    public function updateInspectionQuantities(
        Request $request, Inspection $inspection, 
        finalInspection $finalInspection
    )
    {
        $finalInspection->inspected_qty = $request->inspected_qty ?? null;
        $finalInspection->sample =$request->sample ?? null;
        $finalInspection->save();

        return back()->with("start", 'Data Has Been Saved!');
    }
    public function updateInspectionproduction(
        Request $request, Inspection $inspection, 
        finalInspection $finalInspection
    )
    {
        $finalInspection->fabric_validate = $request->fabric_validate ?? null;
        $finalInspection->cutting =$request->cutting ?? null;
        $finalInspection->finishing =$request->finishing ?? null;
        $finalInspection->packing =$request->packing ?? null;
        $finalInspection->save();

        return back()->with("start", 'Data Has Been Saved!');
    }
    public function updateQualityPlan(
        Request $request, Inspection $inspection,
        finalInspection $finalInspection
    )
    {
        $finalInspection->measurement = $request->measurement ?? null;
        $finalInspection->remark =$request->remark ?? null;
        $finalInspection->save();

        return back()->with("start", 'Data Has Been Saved !');
    }

    public function updateQuality(Request $request, Inspection $inspection, finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
            'foto' => ['required', 'file', 'max:10000'],
        ]);

        

            $file1=$request->foto;

        //ini juga samaa
        tap($validatedInput['foto'], function ($previous) use($validatedInput, $inspection, $finalInspection, $file1) {
            $fotoFileName = $validatedInput['foto']->getClientOriginalName();
            $fotoFileName = substr($fotoFileName, strpos($fotoFileName, '.c'));
            $fotoFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$fotoFileName;
            $fotoFileName = Image::make($file1->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            // dd($validatedInput['foto']->storePubliclyAs('qrcode/foto', $fotoFileName, ['disk' => 'public']), $ubah);
      
            $finalInspection->update([
                'foto' => $validatedInput['foto']->storePubliclyAs('inspection/foto', $fotoFileName, ['disk' => 'public']),
            ]);

            if ($previous) {
                \Storage::disk('public')->delete($previous);
            }
        });
        $finalInspection->save();

        return back()->with("start", 'Photo Has Been Saved !');
    }
     // PHOTOS-SUB
     
    public function updatePhoto(Request $request, Inspection $inspection,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
            'packed_carton' => ['required', 'file', 'max:10000'],
        ]);

        // if ($inspection->finalInspection !== null){
            
            tap($validatedInput['packed_carton'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $packed_cartonFileName = $validatedInput['packed_carton']->getClientOriginalName();
                $packed_cartonFileName = substr($packed_cartonFileName, strpos($packed_cartonFileName, '.c'));
                $packed_cartonFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$packed_cartonFileName;

                $finalInspection->update([
                    'packed_carton' => $validatedInput['packed_carton']->storePubliclyAs('inspection/packed_carton', $packed_cartonFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();
    //   dd(
    // $finalInspection->packed_carton
    //   );

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoPacakedIntoCarton(Request $request, Inspection $inspection,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
           
            'packed_into_carton' => ['required', 'file', 'max:10000'],   
        ]);

           
            tap($validatedInput['packed_into_carton'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $packed_into_cartonFileName = $validatedInput['packed_into_carton']->getClientOriginalName();
                $packed_into_cartonFileName = substr($packed_into_cartonFileName, strpos($packed_into_cartonFileName, '.c'));
                $packed_into_cartonFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$packed_into_cartonFileName;

                $finalInspection->update([
                    'packed_into_carton' => $validatedInput['packed_into_carton']->storePubliclyAs('inspection/packed_into_carton', $packed_into_cartonFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoSamplingCarton(Request $request, Inspection $inspection ,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
           
            'sampling_carton' => ['required', 'file', 'max:10000'],   
        ]);

        // if ($inspection->finalInspection !== null){

           
            tap($validatedInput['sampling_carton'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $sampling_cartonFileName = $validatedInput['sampling_carton']->getClientOriginalName();
                $sampling_cartonFileName = substr($sampling_cartonFileName, strpos($sampling_cartonFileName, '.c'));
                $sampling_cartonFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$sampling_cartonFileName;
                $finalInspection->update([
                    'sampling_carton' => $validatedInput['sampling_carton']->storePubliclyAs('inspection/sampling_carton', $sampling_cartonFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoSlicaGel(Request $request, Inspection $inspection ,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
           
            'silica_gel' => ['required', 'file', 'max:10000'],   
        ]);

        // if ($inspection->finalInspection !== null){

           
            tap($validatedInput['silica_gel'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $silica_gelFileName = $validatedInput['silica_gel']->getClientOriginalName();
                $silica_gelFileName = substr($silica_gelFileName, strpos($silica_gelFileName, '.c'));
                $silica_gelFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$silica_gelFileName;
                $finalInspection->update([
                    'silica_gel' => $validatedInput['silica_gel']->storePubliclyAs('inspection/silica_gel', $silica_gelFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();
        

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoPackingList(Request $request, Inspection $inspection ,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
           
            'packing_list' => ['required', 'file', 'max:10000'],   
        ]);

        // if ($inspection->finalInspection !== null){

           
            tap($validatedInput['packing_list'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $packing_listFileName = $validatedInput['packing_list']->getClientOriginalName();
                $packing_listFileName = substr($packing_listFileName, strpos($packing_listFileName, '.c'));
                $packing_listFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$packing_listFileName;
                $finalInspection->update([
                    'packing_list' => $validatedInput['packing_list']->storePubliclyAs('inspection/packing_list', $packing_listFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();
       
        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoHangTag(Request $request, Inspection $inspection,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
           
            'hang_tag' => ['required', 'file', 'max:10000'],   
        ]);

        // if ($inspection->finalInspection !== null){

           
            tap($validatedInput['hang_tag'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $hang_tagFileName = $validatedInput['hang_tag']->getClientOriginalName();
                $hang_tagFileName = substr($hang_tagFileName, strpos($hang_tagFileName, '.c'));
                $hang_tagFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$hang_tagFileName;
                $finalInspection->update([
                    'hang_tag' => $validatedInput['hang_tag']->storePubliclyAs('inspection/hang_tag', $hang_tagFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();
      

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoShippingMark(Request $request, Inspection $inspection ,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
           
            'shipping_mark' => ['required', 'file', 'max:10000'],   
        ]);

        // if ($inspection->finalInspection !== null){

           
            tap($validatedInput['shipping_mark'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $shipping_markFileName = $validatedInput['shipping_mark']->getClientOriginalName();
                $shipping_markFileName = substr($shipping_markFileName, strpos($shipping_markFileName, '.c'));
                $shipping_markFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$shipping_markFileName;
                $finalInspection->update([
                    'shipping_mark' => $validatedInput['shipping_mark']->storePubliclyAs('inspection/shipping_mark', $shipping_markFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();
       

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoPolybag(Request $request, Inspection $inspection ,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
           
            'polybag_packed' => ['required', 'file', 'max:10000'],   
        ]);

        // if ($inspection->finalInspection !== null){

           
            tap($validatedInput['polybag_packed'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $polybag_packedFileName = $validatedInput['polybag_packed']->getClientOriginalName();
                $polybag_packedFileName = substr($polybag_packedFileName, strpos($polybag_packedFileName, '.c'));
                $polybag_packedFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$polybag_packedFileName;
                $finalInspection->update([
                    'polybag_packed' => $validatedInput['polybag_packed']->storePubliclyAs('inspection/polybag_packed', $polybag_packedFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();
       

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoMainLabel(Request $request, Inspection $inspection ,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
           
            'main_label' => ['required', 'file', 'max:10000'],   
        ]);

        // if ($inspection->finalInspection !== null){

           
            tap($validatedInput['main_label'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $main_labelFileName = $validatedInput['main_label']->getClientOriginalName();
                $main_labelFileName = substr($main_labelFileName, strpos($main_labelFileName, '.c'));
                $main_labelFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$main_labelFileName;
                $finalInspection->update([
                    'main_label' => $validatedInput['main_label']->storePubliclyAs('inspection/main_label', $main_labelFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();
        

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoFrontSide(Request $request, Inspection $inspection ,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
           
            'front_side' => ['required', 'file', 'max:10000'],   
        ]);

        // if ($inspection->finalInspection !== null){

           
            tap($validatedInput['front_side'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $front_sideFileName = $validatedInput['front_side']->getClientOriginalName();
                $front_sideFileName = substr($front_sideFileName, strpos($front_sideFileName, '.c'));
                $front_sideFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$front_sideFileName;
                $finalInspection->update([
                    'front_side' => $validatedInput['front_side']->storePubliclyAs('inspection/front_side', $front_sideFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();
       

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoBackSide(Request $request, Inspection $inspection ,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
           
            'back_side' => ['required', 'file', 'max:10000'],   
        ]);

        // if ($inspection->finalInspection !== null){

           
            tap($validatedInput['back_side'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $back_sideFileName = $validatedInput['back_side']->getClientOriginalName();
                $back_sideFileName = substr($back_sideFileName, strpos($back_sideFileName, '.c'));
                $back_sideFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$back_sideFileName;
                $finalInspection->update([
                    'back_side' => $validatedInput['back_side']->storePubliclyAs('inspection/back_side', $back_sideFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();
       

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoImage1(Request $request, Inspection $inspection ,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
           
            'image1' => ['required', 'file', 'max:10000'],   
        ]);

        // if ($inspection->finalInspection !== null){

           
            tap($validatedInput['image1'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $image1FileName = $validatedInput['image1']->getClientOriginalName();
                $image1FileName = substr($image1FileName, strpos($image1FileName, '.c'));
                $image1FileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$image1FileName;
                $finalInspection->update([
                    'image1' => $validatedInput['image1']->storePubliclyAs('inspection/image1', $image1FileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();
      

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoPView(Request $request, Inspection $inspection ,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
           
            'product_view' => ['required', 'file', 'max:10000'],   
        ]);

        // if ($inspection->finalInspection !== null){

           
            tap($validatedInput['product_view'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $product_viewFileName = $validatedInput['product_view']->getClientOriginalName();
                $product_viewFileName = substr($product_viewFileName, strpos($product_viewFileName, '.c'));
                $product_viewFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$product_viewFileName;
                $finalInspection->update([
                    'product_view' => $validatedInput['product_view']->storePubliclyAs('inspection/product_view', $product_viewFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();
      

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoSView(Request $request, Inspection $inspection ,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
           
            'shading_view' => ['required', 'file', 'max:10000'],   
        ]);

        // if ($inspection->finalInspection !== null){

           
            tap($validatedInput['shading_view'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $shading_viewFileName = $validatedInput['shading_view']->getClientOriginalName();
                $shading_viewFileName = substr($shading_viewFileName, strpos($shading_viewFileName, '.c'));
                $shading_viewFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$shading_viewFileName;
                $finalInspection->update([
                    'shading_view' => $validatedInput['shading_view']->storePubliclyAs('inspection/shading_view', $shading_viewFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();
        

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoCSample(Request $request, Inspection $inspection ,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
           
            'compare_sample' => ['required', 'file', 'max:10000'],   
        ]);

        // if ($inspection->finalInspection !== null){

           
            tap($validatedInput['compare_sample'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $compare_sampleFileName = $validatedInput['compare_sample']->getClientOriginalName();
                $compare_sampleFileName = substr($compare_sampleFileName, strpos($compare_sampleFileName, '.c'));
                $compare_sampleFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$compare_sampleFileName;
                $finalInspection->update([
                    'compare_sample' => $validatedInput['compare_sample']->storePubliclyAs('inspection/compare_sample', $compare_sampleFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();
       

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoM1(Request $request, Inspection $inspection ,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
           
            'measurement1' => ['required', 'file', 'max:10000'],   
        ]);
           
            tap($validatedInput['measurement1'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $measurement1FileName = $validatedInput['measurement1']->getClientOriginalName();
                $measurement1FileName = substr($measurement1FileName, strpos($measurement1FileName, '.c'));
                $measurement1FileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$measurement1FileName;
                $finalInspection->update([
                    'measurement1' => $validatedInput['measurement1']->storePubliclyAs('inspection/measurement1', $measurement1FileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();
      

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoM2(Request $request, Inspection $inspection ,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
           
            'measurement2' => ['required', 'file', 'max:10000'],   
        ]);

        // if ($inspection->finalInspection !== null){

           
            tap($validatedInput['measurement2'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $measurement2FileName = $validatedInput['measurement2']->getClientOriginalName();
                $measurement2FileName = substr($measurement2FileName, strpos($measurement2FileName, '.c'));
                $measurement2FileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$measurement2FileName;
                $finalInspection->update([
                    'measurement2' => $validatedInput['measurement2']->storePubliclyAs('inspection/measurement2', $measurement2FileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();
       

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoM3(Request $request, Inspection $inspection ,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
           
            'measurement3' => ['required', 'file', 'max:10000'],   
        ]);

        // if ($inspection->finalInspection !== null){

           
            tap($validatedInput['measurement3'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $measurement3FileName = $validatedInput['measurement3']->getClientOriginalName();
                $measurement3FileName = substr($measurement3FileName, strpos($measurement3FileName, '.c'));
                $measurement3FileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$measurement3FileName;
                $finalInspection->update([
                    'measurement3' => $validatedInput['measurement3']->storePubliclyAs('inspection/measurement3', $measurement3FileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();
       

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoM4(Request $request, Inspection $inspection ,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
           
            'measurement4' => ['required', 'file', 'max:10000'],   
        ]);

        // if ($inspection->finalInspection !== null){

           
            tap($validatedInput['measurement4'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $measurement4FileName = $validatedInput['measurement4']->getClientOriginalName();
                $measurement4FileName = substr($measurement4FileName, strpos($measurement4FileName, '.c'));
                $measurement4FileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$measurement4FileName;
                $finalInspection->update([
                    'measurement4' => $validatedInput['measurement4']->storePubliclyAs('inspection/measurement4', $measurement4FileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();
       

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoM5(Request $request, Inspection $inspection ,finalInspection $finalInspection)
    {
        $validatedInput = $request->validate([
           
            'measurement5' => ['required', 'file', 'max:10000'],   
        ]);
           
            tap($validatedInput['measurement5'], function ($previous) use($validatedInput, $inspection, $finalInspection) {
                $measurement5FileName = $validatedInput['measurement5']->getClientOriginalName();
                $measurement5FileName = substr($measurement5FileName, strpos($measurement5FileName, '.c'));
                $measurement5FileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$measurement5FileName;
                $finalInspection->update([
                    'measurement5' => $validatedInput['measurement5']->storePubliclyAs('inspection/measurement5', $measurement5FileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
             $finalInspection->save();
       

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoHole(Request $request, Inspection $inspection ,finalInspection $finalInspection, FinalInspectionDefect $finalInspectionDefect)
    {
        $validatedInput = $request->validate([
            'foto_hole' => ['required', 'file', 'max:10000'],   
        ]);

        if (isset($validatedInput['foto_hole'])){
            tap($validatedInput['foto_hole'], function ($previous) use($validatedInput, $inspection, $finalInspectionDefect) {
                $foto_holeFileName = $validatedInput['foto_hole']->getClientOriginalName();
                $foto_holeFileName = substr($foto_holeFileName, strpos($foto_holeFileName, '.c'));
                $foto_holeFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$foto_holeFileName;
                $finalInspectionDefect->update([
                    'foto_hole' => $validatedInput['foto_hole']->storePubliclyAs('inspection/foto_hole', $foto_holeFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $finalInspectionDefect->save();
        }

       
        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoHoleMajor(Request $request, Inspection $inspection ,finalInspection $finalInspection, FinalInspectionDefect $finalInspectionDefect)
    {
        $validatedInput = $request->validate([
            'foto_major' => ['required', 'file', 'max:10000'],   
        ]);

        if (isset($validatedInput['foto_major'])){
            tap($validatedInput['foto_major'], function ($previous) use($validatedInput, $inspection, $finalInspectionDefect) {
                $foto_majorFileName = $validatedInput['foto_major']->getClientOriginalName();
                $foto_majorFileName = substr($foto_majorFileName, strpos($foto_majorFileName, '.c'));
                $foto_majorFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$foto_majorFileName;
                $finalInspectionDefect->update([
                    'foto_major' => $validatedInput['foto_major']->storePubliclyAs('inspection/foto_major', $foto_majorFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $finalInspectionDefect->save();
        } 
        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoHoleMinor(Request $request, Inspection $inspection ,finalInspection $finalInspection, FinalInspectionDefect $finalInspectionDefect)
    {
        $validatedInput = $request->validate([
            'foto_minor' => ['required', 'file', 'max:10000'],   
        ]);

        if (isset($validatedInput['foto_minor'])){
            tap($validatedInput['foto_minor'], function ($previous) use($validatedInput, $inspection, $finalInspectionDefect) {
                $foto_minorFileName = $validatedInput['foto_minor']->getClientOriginalName();
                $foto_minorFileName = substr($foto_minorFileName, strpos($foto_minorFileName, '.c'));
                $foto_minorFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$foto_minorFileName;
                $finalInspectionDefect->update([
                    'foto_minor' => $validatedInput['foto_minor']->storePubliclyAs('inspection/foto_minor', $foto_minorFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $finalInspectionDefect->save();
        }
    //    dd(
    //         $validatedInput,
    //         $inspection->F4801_DOCO,
    //         $finalInspection->id,
    //         $finalInspectionDefect->id
    //     );
        return back()->with("start", 'Photo Has Been Saved !');
    }
    
    public function updateDefect(Request $request, Inspection $inspection ,finalInspection $finalInspection)
    {
        //data  /create/save
        
        if ($inspection->finalSubMenu !== null) {
            $inspection->finalSubMenu->nama_submenu = $request->nama_submenu ?? null;
            $inspection->finalSubMenu->id_menu =$request->id_menu ?? null;
            $inspection->finalSubMenu->critical =$request->critical ?? null;
            $inspection->finalSubMenu->major =$request->major ?? null;
            $inspection->finalSubMenu->minor =$request->minor ?? null;
            $inspection->finalSubMenu->hasil =$request->hasil ?? null;
            $inspection->finalSubMenu->comment =$request->comment ?? null;
            // $inspection->finalSubMenu->foto_hole = $request->foto_hole ?? null;
             $finalInspection->save();
        } else {
            $inspection->finalSubMenu()->save(
                new finalSubMenu([
                    'nama_submenu' =>$request->nama_submenu,
                    'id_menu' => $request->id_menu,
                    'critical' => $request->critical,
                    'major' => $request->major,
                    'minor' => $request->minor,
                    'hasil' => $request->hasil,
                    'comment' => $request->comment,
                    // 'foto_hole' => $request->foto_hole,
                ])
            );
        }

        return back()->with("start", 'Data Has Been Saved !');
    }

    public function photos(Request $request, Inspection $inspection, finalInspection $finalInspection)
    {
        $page = 'finali';

        $finalInspections = finalInspection::where('t_v4801c_doco', $inspection->F4801_DOCO)
            ->orderByDesc('created_at')
            ->orderByDesc('start_inspector')
            ->get();

        // dd($finalInspections);
        //Add Menus if Inspection doesn't have any final Inspection
        if ($finalInspections->isEmpty()) {
            $finalInspectionCreated = finalInspection::create([
                't_v4801c_doco' => $inspection->F4801_DOCO,
            ]);
            $finalInspections->push($finalInspectionCreated);

            $menus = defectMenu::with('defectSubMenu')->get();
            foreach ($menus as $menu) {
                foreach ($menu->defectSubMenu as $subMenu) {
                    FinalInspectionDefect::create([
                        'final_inspection_id' => $finalInspectionCreated->id,
                        'menu_final_id' => $menu->id,
                        'final_submenu_id' => $subMenu->id
                    ]);
                }
            }
        }

        $finalInspection = [];
        if ($finalInspections->isNotEmpty()) {
            $finalInspection = $finalInspections->first();
            // dd($finalInspection->final_inspection_defects());
            
            $data2 = $finalInspection->final_inspection_defects;
            if ($data2->isEmpty()) {
                $menus = defectMenu::with('defectSubMenu')->get();
                foreach ($menus as $menu) {
                    foreach ($menu->defectSubMenu as $subMenu) {
                        $finalInspection->final_inspection_defects()->save(
                            new FinalInspectionDefect ([
                                'menu_final_id' => $menu->id,
                                'final_submenu_id' => $subMenu->id
                            ])
                        );
                    }
                }
            }

            $finalInspection->load([
                'final_inspection_defects' => function($query) {
                    $query->with(['menu', 'subMenu']);
                }
            ]);
        }

        return view('qc.final-inspection.final-sub.photos-sub', compact(
            'inspection', 'finalInspection', 'page'
        ));
    }

    public function defects(Request $request, Inspection $inspection, finalInspection $finalInspection)
    {
        $page = 'finali';

        $finalInspections = finalInspection::where('t_v4801c_doco', $inspection->F4801_DOCO)
            ->orderByDesc('created_at')
            ->orderByDesc('start_inspector')
            ->get();
        // dd($finalInspections);
        //Add Menus if Inspection doesn't have any final Inspection
        if ($finalInspections->isEmpty()) {
            $finalInspectionCreated = finalInspection::create([
                't_v4801c_doco' => $inspection->F4801_DOCO,
            ]);
            $finalInspections->push($finalInspectionCreated);

            $menus = defectMenu::with('defectSubMenu')->get();
            foreach ($menus as $key => $menu) {
                foreach ($menu->defectSubMenu as $key => $subMenu) {
                    FinalInspectionDefect::create([
                        'final_inspection_id' => $finalInspectionCreated->id,
                        'menu_final_id' => $menu->id,
                        'final_submenu_id' => $subMenu->id
                    ]);
                }
            }
        }

        $finalInspection = $data2 = [];

        if ($finalInspections->isNotEmpty()) {
            $finalInspection = $finalInspections->first();
            $finalInspection->load([
                'final_inspection_defects' => function($query) {
                    $query->with(['menu', 'subMenu']);
                }
            ]);
            $data2 = $finalInspection->final_inspection_defects
                ->groupBy('menu_final_id')
                ->values();

            if ($data2->isEmpty()) {
                $menus = defectMenu::with('defectSubMenu')->get();
                foreach ($menus as $key => $menu) {
                    foreach ($menu->defectSubMenu as $key => $subMenu) {
                        FinalInspectionDefect::create([
                            'final_inspection_id' => $finalInspection->id,
                            'menu_final_id' => $menu->id,
                            'final_submenu_id' => $subMenu->id
                        ]);
                    }
                }
            }
        }
        $records= (new inspection1)->Qty($inspection);
        // dd($records);
        return view('qc.final-inspection.final-sub.defects-sub', compact(
            'data2','records', 'inspection', 'finalInspection', 'page'
        ));
    }

    public function updateComment(
        Request $request, Inspection $inspection, 
        finalInspection $finalInspection,
        FinalInspectionDefect $finalInspectionDefect
    )
    {
        $validatedInput = $request->validate([
            'message' => ['required']
        ], [
            'message.required' => 'Pesan wajib diisi'
        ]);

        //data  /create/save
        // if ($inspection->final_inspection_defects->isNotEmpty()) {
            $finalInspectionDefect->update([
                'message' => $validatedInput['message']
            ]);

        
      

        return back()->with("start", 'Data Has Been Saved !');
    }

    public function incrementCriticalDefect(
        Request $request, Inspection $inspection, 
        finalInspection $finalInspection,
        FinalInspectionDefect $finalInspectionDefect
    )
    {
        $finalInspectionDefect->timestamps = false;
        $finalInspectionDefect->increment('critical');

        if ($finalInspection->hasil_defect !== "FAIL") {
            $finalInspection->hasil_defect = "FAIL";
            $finalInspection->save();
        }

        return response()->json([
            'status' => 'Success',
            'sub_menu' => $finalInspectionDefect->only('id', 'critical'),
            'message' => 'Berhasil di increment',
        ]);
    }

    public function decrementCriticalDefect(
        Request $request, Inspection $inspection, 
        finalInspection $finalInspection,
        FinalInspectionDefect $finalInspectionDefect
    )
    {
        // if ($inspection->final_inspection_defects->isNotEmpty()) {
            if ($finalInspectionDefect->critical > 0) {
                $finalInspectionDefect->timestamps = false;
                $finalInspectionDefect->decrement('critical');

             if ($finalInspection->hasil_defect !== "PASS") {
                $finalInspection->hasil_defect = "PASS";
                $finalInspection->save();
                }

                return response()->json([
                    'status' => 'Success',
                    'sub_menu' => $finalInspectionDefect->only('id', 'critical'),
                    'message' => 'Critical berhasil di decrement',
                ]);
            }
       

        return response()->json([
            'status' => 'Gagal',
            'sub_menu' => $finalInspectionDefect->only('id', 'critical'),
            'message' => 'data critical gagal diturunkan',
        ]);
    }

    public function incrementMajorDefect(
        Request $request, Inspection $inspection, 
        finalInspection $finalInspection,
        FinalInspectionDefect $finalInspectionDefect
    )
    {
        // if ($inspection->final_inspection_defects->isNotEmpty()) {
            $finalInspectionDefect->timestamps = false;
            $finalInspectionDefect->increment('major');
        // if ($finalInspection->hasil_defect !== "PASS") {
        //     $finalInspection->hasil_defect = "PASS";
        //     $finalInspection->save();
        // }
       

        return response()->json([
            'status' => 'Success',
            'sub_menu' => $finalInspectionDefect->only('id', 'major'),
            'message' => 'Major berhasil di increment',
        ]);
    }

    public function decrementMajorDefect(
        Request $request, Inspection $inspection, 
        finalInspection $finalInspection,
        FinalInspectionDefect $finalInspectionDefect
    )
    {
            if ($finalInspectionDefect->major > 0) {
                $finalInspectionDefect->timestamps = false;
                $finalInspectionDefect->decrement('major');

            if ($finalInspection->hasil_defect !== "PASS") {
                $finalInspection->hasil_defect = "PASS";
                $finalInspection->save();
            }

                return response()->json([
                    'status' => 'Success',
                    'sub_menu' => $finalInspectionDefect->only('id', 'major'),
                    'message' => 'Major berhasil di decrement',
                ]);
            }

        return response()->json([
            'status' => 'Gagal',
            'sub_menu' => $finalInspectionDefect->only('id', 'major'),
            'message' => 'Major gagal diturunkan',
        ]);
    }

    public function incrementMinorDefect(
        Request $request, Inspection $inspection, 
        finalInspection $finalInspection,
        FinalInspectionDefect $finalInspectionDefect
    )
    {
        $finalInspectionDefect->timestamps = false;
        $finalInspectionDefect->increment('minor');

        // if ($finalInspection->hasil_defect !== "PASS") {
        //     $finalInspection->hasil_defect = "PASS";
        //     $finalInspection->save();
        // }

        return response()->json([
            'status' => 'Success',
            'sub_menu' => $finalInspectionDefect->only('id', 'minor'),
            'message' => 'Minor berhasil di increment',
        ]);
    }

    public function decrementMinorDefect(
        Request $request, Inspection $inspection,
        finalInspection $finalInspection,
        FinalInspectionDefect $finalInspectionDefect
    )
    {
        if ($finalInspectionDefect->minor > 0) {
            $finalInspectionDefect->timestamps = false;
            $finalInspectionDefect->decrement('minor');

        // if ($finalInspection->hasil_defect !== "PASS") {
        //     $finalInspection->hasil_defect = "PASS";
        //     $finalInspection->save();
        // }

            return response()->json([
                'status' => 'Success',
                'sub_menu' => $finalInspectionDefect->only('id', 'minor'),
                'message' => 'Minor berhasil di decrement',
            ]);
        }

        return response()->json([
            'status' => 'Gagal',
            'sub_menu' => $finalInspectionDefect->only('id', 'minor'),
            'message' => 'Minor gagal diturunkan',
        ]);
    }

    public function quality(Request $request, Inspection $inspection, finalInspection $finalInspection)
    {
        $page = 'finali';

        $finalInspections = finalInspection::where('t_v4801c_doco', $inspection->F4801_DOCO)
            ->orderByDesc('created_at')
            ->orderByDesc('start_inspector')
            ->get();

        // dd($finalInspections);
        //Add Menus if Inspection doesn't have any final Inspection
        if ($finalInspections->isEmpty()) {
            $finalInspectionCreated = finalInspection::create([
                't_v4801c_doco' => $inspection->F4801_DOCO,
            ]);
            $finalInspections->push($finalInspectionCreated);

            $menus = defectMenu::with('defectSubMenu')->get();
            foreach ($menus as $key => $menu) {
                foreach ($menu->defectSubMenu as $key => $subMenu) {
                    FinalInspectionDefect::create([
                        'final_inspection_id' => $finalInspectionCreated->id,
                        'menu_final_id' => $menu->id,
                        'final_submenu_id' => $subMenu->id
                    ]);
                }
            }
        }


        $finalInspection = $data2 = [];

        if ($finalInspections->isNotEmpty()) {
            $finalInspection = $finalInspections->first();
            $finalInspection->load([
                'final_inspection_defects' => function($query) {
                    $query->with(['menu', 'subMenu']);
                }
            ]);
            $data2 = $finalInspection->final_inspection_defects;
            if ($data2->isEmpty()) {
                $menus = defectMenu::with('defectSubMenu')->get();
                foreach ($menus as $key => $menu) {
                    foreach ($menu->defectSubMenu as $key => $subMenu) {
                        FinalInspectionDefect::create([
                            'final_inspection_id' => $finalInspection->id,
                            'menu_final_id' => $menu->id,
                            'final_submenu_id' => $subMenu->id
                        ]);
                    }
                }
            }
        }

        // $data = $inspection;
        return view('qc.final-inspection.final-sub.quality-sub', compact(
            'inspection', 'data2', 'finalInspection', 'page'
        ));
    }

    public function conclusion(Request $request,Inspection $inspection ,finalInspection $finalInspection)
    {
        $page = 'finali';
        $finalInspections = finalInspection::where('t_v4801c_doco', $inspection->F4801_DOCO)
            ->orderByDesc('created_at')
            ->orderByDesc('start_inspector')
            ->get();
         $records= (new inspection1)->Qty($inspection);
         $final= (new inspection1)->hasil_final();
        
        //Add Menus if Inspection doesn't have any final Inspection
        if ($finalInspections->isEmpty()) {
            $finalInspectionCreated = finalInspection::create([
                't_v4801c_doco' => $inspection->F4801_DOCO,
            ]);
            $finalInspections->push($finalInspectionCreated);

            $menus = defectMenu::with('defectSubMenu')->get();
            foreach ($menus as $key => $menu) {
                foreach ($menu->defectSubMenu as $key => $subMenu) {
                    FinalInspectionDefect::create([
                        'final_inspection_id' => $finalInspectionCreated->id,
                        'menu_final_id' => $menu->id,
                        'final_submenu_id' => $subMenu->id
                    ]);
                }
            }
        }

        $finalInspection = $data2 = [];

        if ($finalInspections->isNotEmpty()) {
            $finalInspection = $finalInspections->first();
            $finalInspection->load([
                'final_inspection_defects' => function($query) {
                    $query->with(['menu', 'subMenu']);
                }
            ]);
            $data2 = $finalInspection->final_inspection_defects;
            if ($data2->isEmpty()) {
                $menus = defectMenu::with('defectSubMenu')->get();
                foreach ($menus as $key => $menu) {
                    foreach ($menu->defectSubMenu as $key => $subMenu) {
                        FinalInspectionDefect::create([
                            'final_inspection_id' => $finalInspection->id,
                            'menu_final_id' => $menu->id,
                            'final_submenu_id' => $subMenu->id
                        ]);
                    }
                }
            }
        }

        return view('qc.final-inspection.final-sub.conclusion-sub', compact(
            'inspection','records','final','data2', 'finalInspection', 'page'
        ));
    }
}
