<?php

namespace App\Http\Controllers\QC\Inspection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inspection;
use App\ListBuyer;
use App\Branch;
use App\defectMenu;
use App\defectSubMenu;
use App\finalHeader;
use App\finalSubHeader;
use App\finalInspection;
class InspectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function finali(Request $request)
    {
        $page = 'finali';
       
        $inspection = Inspection::when(strlen($request->search) > 0, function ($query) {
            $query->where('F4801_DOCO', 'like', '%'.request()->search.'%');
        })
            // ->with(['ListBuyer'])
            ->limit(5)
            ->get();
        $data2 = ListBuyer::when(strlen($request->finali) > 0, function ($query) {
            $query->where('F0101_ALPH', 'like', '%'.request()->finali.'%');
        })
        ->limit(1)->get();
        
        return view('qc.final-inspection.final-inspection', compact('data2','inspection','page'));
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
        $data = $inspection->load(['finalInspection']);

        $data2 = ListBuyer::get();
        // $data2 = ListBuyer::with(['Inspection'])->get();
        // dd($data);
        //  dd(ListBuyer::with(['Inspection'])->get());
       return view('qc.final-inspection.final-sub.header-sub', compact('data2','data','page'));
    }

    public function startInspection(Request $request, Inspection $inspection)
    {
        //data  /create/save
        if ($inspection->finalInspection !== null) {
            $inspection->finalInspection->name_inspector = auth()->user()->nama;
            $inspection->finalInspection->start_inspector = now();
            // $inspection->finalInspection->finish_inspector = null;
            $inspection->push();
        } else {
            $inspection->finalInspection()->save(
                new finalInspection([
                    'name_inspector' => auth()->user()->nama,
                    'start_inspector' => now(),
                    // 'finish_inspector' => now(),
                ])
            );
        }

        return back()->with("start", 'Inspection Has Been Started !');
    }
    
    public function finishInspection(Request $request, Inspection $inspection)
    {
        //data  /create/save
        if ($inspection->finalInspection !== null) {
           
            $inspection->finalInspection->finish_inspector = now();
            $inspection->push();
        } else {
            $inspection->finalInspection()->save(
                new finalInspection([
                    'finish_inspector' => now(),
                ])
            );
        }

        return back()->with("finish", 'Inspection Has Been Finished !');
    }
   

    public function updateValidationChecklist(Request $request, Inspection $inspection)
    {
        if ($inspection->finalInspection !== null) {
            $inspection->finalInspection->pattern = $request->pattern ?? null;
            $inspection->finalInspection->size_set = $request->size_set ?? null;
            $inspection->finalInspection->pp = $request->pp ?? null;
            $inspection->finalInspection->print = $request->print ?? null;
            $inspection->finalInspection->shell = $request->shell ?? null;
            $inspection->finalInspection->lot = $request->lot ?? null;
            $inspection->finalInspection->lining = $request->lining ?? null;
            $inspection->finalInspection->interlining = $request->interlining ?? null;
            $inspection->finalInspection->thread = $request->thread ?? null;
            $inspection->finalInspection->size_label = $request->size_label ?? null;
            $inspection->finalInspection->content_label = $request->content_label ?? null;
            $inspection->finalInspection->supplier_label = $request->supplier_label ?? null;
            $inspection->finalInspection->co_label = $request->co_label ?? null;
            $inspection->finalInspection->zip = $request->zip ?? null;
            $inspection->finalInspection->shade_lot = $request->shade_lot ?? null;
            $inspection->finalInspection->col = $request->col ?? null;
            $inspection->finalInspection->whisker = $request->whisker ?? null;
            $inspection->finalInspection->tinting = $request->tinting ?? null;
            $inspection->finalInspection->hand_sand = $request->hand_sand ?? null;
            $inspection->finalInspection->grinding = $request->grinding ?? null;
            $inspection->finalInspection->hang = $request->hang ?? null;
            $inspection->finalInspection->waist_tag = $request->waist_tag ?? null;
            $inspection->finalInspection->joker = $request->joker ?? null;
            $inspection->finalInspection->poly_bag = $request->poly_bag ?? null;
            $inspection->finalInspection->ticket = $request->ticket ?? null;
            $inspection->finalInspection->belt_tag = $request->belt_tag ?? null;
            $inspection->finalInspection->spare_yarn = $request->spare_yarn ?? null;
            $inspection->finalInspection->hanger = $request->hanger ?? null;
            $inspection->finalInspection->shipping = $request->shipping ?? null;
            $inspection->finalInspection->fabric = $request->fabric ?? null;
            // $inspection->finalInspection->measurement = $request->measurement ?? null;
            // $inspection->finalInspection->remark = $request->remark ?? null;
            $inspection->push();
        } else {
            $inspection->finalInspection()->save(
                new finalInspection([
                    'pattern' => $request->pattern,
                    'size_set' => $request->size_set,
                    'pp' => $request->pp,
                    'print' => $request->print,
                    'shell' => $request->shell,
                    'lot' => $request->lot,
                    'lining' => $request->lining,
                    'interlining' => $request->interlining,
                    'thread' => $request->thread,
                    'size_label' => $request->size_label,
                    'content_label' => $request->content_label,
                    'supplier_label' => $request->supplier_label,
                    'co_label' => $request->co_label,
                    'zip' => $request->zip,
                    'shade_lot' => $request->shade_lot,
                    'col' => $request->col,
                    'whisker' => $request->whisker,
                    'tinting' => $request->tinting,
                    'hand_sand' => $request->hand_sand,
                    'grinding' => $request->grinding,
                    'hang' => $request->hang,
                    'waist_tag' => $request->waist_tag,
                    'joker' => $request->joker,
                    'poly_bag' => $request->poly_bag,
                    'ticket' => $request->ticket,
                    'belt_tag' => $request->belt_tag,
                    'spare_yarn' => $request->spare_yarn,
                    'hanger' => $request->hanger,
                    'shipping' => $request->shipping,
                    'fabric' => $request->fabric,
                    // 'measurement' => $request->measurement,
                    // 'remark' => $request->remark,
                ])
            );
        }

        return back()->with("start", 'Data Has Been Saved !');
    }

    public function updateInspectionMethod(Request $request, Inspection $inspection)
    {
        //data  /create/save
        if ($inspection->finalInspection !== null){
            $inspection->finalInspection->inspection_level = $request->inspection_level ?? null;
            $inspection->finalInspection->inspection_method =$request->inspection_method ?? null;
            $inspection->finalInspection->aql = $request->aql ?? null;
            $inspection->push();
        } else {
            $inspection->finalInspection()->save(
                new finalInspection([
                    'inspection_level' =>$request->inspection_level,
                    'inspection_method' => $request->inspection_method,
                    'aql' => $request->aql,
                ])
            );
        }

        return back()->with("start", 'Data Has Been Saved !');
    }
    
    public function updateInspectionQuantities(Request $request, Inspection $inspection)
    {
        //data  /create/save
        if ($inspection->finalInspection !== null){
            $inspection->finalInspection->inspected_qty = $request->inspected_qty ?? null;
            $inspection->finalInspection->sample =$request->sample ?? null;
            // $inspection->finalInspection->aql = $request->aql ?? null;
            $inspection->push();
        } else {
            $inspection->finalInspection()->save(
                new finalInspection([
                    'inspected_qty' =>$request->inspected_qty,
                    'sample' => $request->sample,
                    // 'aql' => $request->aql,
                ])
            );
        }

        return back()->with("start", 'Data Has Been Saved !');
    }
    public function updateQualityPlan(Request $request, Inspection $inspection)
    {
        //data  /create/save
        if ($inspection->finalInspection !== null){
            $inspection->finalInspection->measurement = $request->measurement ?? null;
            $inspection->finalInspection->remark =$request->remark ?? null;
            // $inspection->finalInspection->aql = $request->aql ?? null;
            $inspection->push();
        } else {
            $inspection->finalInspection()->save(
                new finalInspection([
                    'measurement' =>$request->measurement,
                    'remark' => $request->remark,
                    // 'aql' => $request->aql,
                ])
            );
        }

        return back()->with("start", 'Data Has Been Saved !');
    }

    public function updateQuality(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
            'foto' => ['required', 'file', 'max:10000'],
        ]);

        if ($inspection->finalInspection !== null){

            tap($validatedInput['foto'], function ($previous) use($validatedInput, $inspection) {
                $fotoFileName = $validatedInput['foto']->getClientOriginalName();
                $fotoFileName = substr($fotoFileName, strpos($fotoFileName, '.c'));
                $fotoFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$fotoFileName;

                // dd($validatedInput['foto']->storePubliclyAs('qrcode/foto', $fotoFileName, ['disk' => 'public']), $ubah);
                $inspection->finalInspection->update([
                    'foto' => $validatedInput['foto']->storePubliclyAs('inspection/foto', $fotoFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            $fotoFleName = '';
            tap($validatedInput['foto'], function ($previous) use($validatedInput, $inspection) {
                $fotoFileName = $validatedInput['foto']->getClientOriginalName();
                $fotoFileName = substr($fotoFileName, strpos($fotoFileName, '.c'));
                $fotoFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$fotoFileName;

                $fotoFileName = $validatedInput['foto']->storePubliclyAs('inspection/foto', $fotoFileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

            // $inspection->finalInspection()->save(
            //     new finalInspection([
            //         'measurement' =>$request->measurement,
            //         'remark' => $request->remark,
            //         // 'foto' => $request->foto,
            //     ])
            // );
        }

        return back()->with("start", 'Photo Has Been Saved !');
    }


    // PHOTOS-SUB
     
    public function updatePhoto(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
            'packed_carton' => ['required', 'file', 'max:10000'],
        ]);

        if ($inspection->finalInspection !== null){

            tap($validatedInput['packed_carton'], function ($previous) use($validatedInput, $inspection) {
                $packed_cartonFileName = $validatedInput['packed_carton']->getClientOriginalName();
                $packed_cartonFileName = substr($packed_cartonFileName, strpos($packed_cartonFileName, '.c'));
                $packed_cartonFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$packed_cartonFileName;

                // dd($validatedInput['packed_carton']->storePubliclyAs('qrcode/packed_carton', $packed_cartonFileName, ['disk' => 'public']), $ubah);
                $inspection->finalInspection->update([
                    'packed_carton' => $validatedInput['packed_carton']->storePubliclyAs('inspection/packed_carton', $packed_cartonFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
            
        } else {
            $packed_cartonFleName = '';
            tap($validatedInput['packed_carton'], function ($previous) use($validatedInput, $inspection) {
                $packed_cartonFileName = $validatedInput['packed_carton']->getClientOriginalName();
                $packed_cartonFileName = substr($packed_cartonFileName, strpos($packed_cartonFileName, '.c'));
                $packed_cartonFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$packed_cartonFileName;

                $packed_cartonFileName = $validatedInput['packed_carton']->storePubliclyAs('inspection/packed_carton', $packed_cartonFileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoPacakedIntoCarton(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
           
            'packed_into_carton' => ['required', 'file', 'max:10000'],   
        ]);

        if ($inspection->finalInspection !== null){

           
            tap($validatedInput['packed_into_carton'], function ($previous) use($validatedInput, $inspection) {
                $packed_into_cartonFileName = $validatedInput['packed_into_carton']->getClientOriginalName();
                $packed_into_cartonFileName = substr($packed_into_cartonFileName, strpos($packed_into_cartonFileName, '.c'));
                $packed_into_cartonFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$packed_into_cartonFileName;
                $inspection->finalInspection->update([
                    'packed_into_carton' => $validatedInput['packed_into_carton']->storePubliclyAs('inspection/packed_into_carton', $packed_into_cartonFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            
            $packed_into_cartonFleName = '';
            tap($validatedInput['packed_into_carton'], function ($previous) use($validatedInput, $inspection) {
                $packed_into_cartonFileName = $validatedInput['packed_into_carton']->getClientOriginalName();
                $packed_into_cartonFileName = substr($packed_into_cartonFileName, strpos($packed_into_cartonFileName, '.c'));
                $packed_into_cartonFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$packed_into_cartonFileName;

                $packed_into_cartonFileName = $validatedInput['packed_into_carton']->storePubliclyAs('inspection/packed_into_carton', $packed_into_cartonFileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoSamplingCarton(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
           
            'sampling_carton' => ['required', 'file', 'max:10000'],   
        ]);

        if ($inspection->finalInspection !== null){

           
            tap($validatedInput['sampling_carton'], function ($previous) use($validatedInput, $inspection) {
                $sampling_cartonFileName = $validatedInput['sampling_carton']->getClientOriginalName();
                $sampling_cartonFileName = substr($sampling_cartonFileName, strpos($sampling_cartonFileName, '.c'));
                $sampling_cartonFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$sampling_cartonFileName;
                $inspection->finalInspection->update([
                    'sampling_carton' => $validatedInput['sampling_carton']->storePubliclyAs('inspection/sampling_carton', $sampling_cartonFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            
            $sampling_cartonFleName = '';
            tap($validatedInput['sampling_carton'], function ($previous) use($validatedInput, $inspection) {
                $sampling_cartonFileName = $validatedInput['sampling_carton']->getClientOriginalName();
                $sampling_cartonFileName = substr($sampling_cartonFileName, strpos($sampling_cartonFileName, '.c'));
                $sampling_cartonFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$sampling_cartonFileName;

                $sampling_cartonFileName = $validatedInput['sampling_carton']->storePubliclyAs('inspection/sampling_carton', $sampling_cartonFileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoSlicaGel(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
           
            'silica_gel' => ['required', 'file', 'max:10000'],   
        ]);

        if ($inspection->finalInspection !== null){

           
            tap($validatedInput['silica_gel'], function ($previous) use($validatedInput, $inspection) {
                $silica_gelFileName = $validatedInput['silica_gel']->getClientOriginalName();
                $silica_gelFileName = substr($silica_gelFileName, strpos($silica_gelFileName, '.c'));
                $silica_gelFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$silica_gelFileName;
                $inspection->finalInspection->update([
                    'silica_gel' => $validatedInput['silica_gel']->storePubliclyAs('inspection/silica_gel', $silica_gelFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            
            $silica_gelFleName = '';
            tap($validatedInput['silica_gel'], function ($previous) use($validatedInput, $inspection) {
                $silica_gelFileName = $validatedInput['silica_gel']->getClientOriginalName();
                $silica_gelFileName = substr($silica_gelFileName, strpos($silica_gelFileName, '.c'));
                $silica_gelFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$silica_gelFileName;

                $silica_gelFileName = $validatedInput['silica_gel']->storePubliclyAs('inspection/silica_gel', $silica_gelFileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoPackingList(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
           
            'packing_list' => ['required', 'file', 'max:10000'],   
        ]);

        if ($inspection->finalInspection !== null){

           
            tap($validatedInput['packing_list'], function ($previous) use($validatedInput, $inspection) {
                $packing_listFileName = $validatedInput['packing_list']->getClientOriginalName();
                $packing_listFileName = substr($packing_listFileName, strpos($packing_listFileName, '.c'));
                $packing_listFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$packing_listFileName;
                $inspection->finalInspection->update([
                    'packing_list' => $validatedInput['packing_list']->storePubliclyAs('inspection/packing_list', $packing_listFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            
            $packing_listFleName = '';
            tap($validatedInput['packing_list'], function ($previous) use($validatedInput, $inspection) {
                $packing_listFileName = $validatedInput['packing_list']->getClientOriginalName();
                $packing_listFileName = substr($packing_listFileName, strpos($packing_listFileName, '.c'));
                $packing_listFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$packing_listFileName;

                $packing_listFileName = $validatedInput['packing_list']->storePubliclyAs('inspection/packing_list', $packing_listFileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoHangTag(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
           
            'hang_tag' => ['required', 'file', 'max:10000'],   
        ]);

        if ($inspection->finalInspection !== null){

           
            tap($validatedInput['hang_tag'], function ($previous) use($validatedInput, $inspection) {
                $hang_tagFileName = $validatedInput['hang_tag']->getClientOriginalName();
                $hang_tagFileName = substr($hang_tagFileName, strpos($hang_tagFileName, '.c'));
                $hang_tagFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$hang_tagFileName;
                $inspection->finalInspection->update([
                    'hang_tag' => $validatedInput['hang_tag']->storePubliclyAs('inspection/hang_tag', $hang_tagFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            
            $hang_tagFleName = '';
            tap($validatedInput['hang_tag'], function ($previous) use($validatedInput, $inspection) {
                $hang_tagFileName = $validatedInput['hang_tag']->getClientOriginalName();
                $hang_tagFileName = substr($hang_tagFileName, strpos($hang_tagFileName, '.c'));
                $hang_tagFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$hang_tagFileName;

                $hang_tagFileName = $validatedInput['hang_tag']->storePubliclyAs('inspection/hang_tag', $hang_tagFileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoShippingMark(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
           
            'shipping_mark' => ['required', 'file', 'max:10000'],   
        ]);

        if ($inspection->finalInspection !== null){

           
            tap($validatedInput['shipping_mark'], function ($previous) use($validatedInput, $inspection) {
                $shipping_markFileName = $validatedInput['shipping_mark']->getClientOriginalName();
                $shipping_markFileName = substr($shipping_markFileName, strpos($shipping_markFileName, '.c'));
                $shipping_markFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$shipping_markFileName;
                $inspection->finalInspection->update([
                    'shipping_mark' => $validatedInput['shipping_mark']->storePubliclyAs('inspection/shipping_mark', $shipping_markFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            
            $shipping_markFleName = '';
            tap($validatedInput['shipping_mark'], function ($previous) use($validatedInput, $inspection) {
                $shipping_markFileName = $validatedInput['shipping_mark']->getClientOriginalName();
                $shipping_markFileName = substr($shipping_markFileName, strpos($shipping_markFileName, '.c'));
                $shipping_markFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$shipping_markFileName;

                $shipping_markFileName = $validatedInput['shipping_mark']->storePubliclyAs('inspection/shipping_mark', $shipping_markFileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoPolybag(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
           
            'polybag_packed' => ['required', 'file', 'max:10000'],   
        ]);

        if ($inspection->finalInspection !== null){

           
            tap($validatedInput['polybag_packed'], function ($previous) use($validatedInput, $inspection) {
                $polybag_packedFileName = $validatedInput['polybag_packed']->getClientOriginalName();
                $polybag_packedFileName = substr($polybag_packedFileName, strpos($polybag_packedFileName, '.c'));
                $polybag_packedFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$polybag_packedFileName;
                $inspection->finalInspection->update([
                    'polybag_packed' => $validatedInput['polybag_packed']->storePubliclyAs('inspection/polybag_packed', $polybag_packedFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            
            $polybag_packedFleName = '';
            tap($validatedInput['polybag_packed'], function ($previous) use($validatedInput, $inspection) {
                $polybag_packedFileName = $validatedInput['polybag_packed']->getClientOriginalName();
                $polybag_packedFileName = substr($polybag_packedFileName, strpos($polybag_packedFileName, '.c'));
                $polybag_packedFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$polybag_packedFileName;

                $polybag_packedFileName = $validatedInput['polybag_packed']->storePubliclyAs('inspection/polybag_packed', $polybag_packedFileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoMainLabel(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
           
            'main_label' => ['required', 'file', 'max:10000'],   
        ]);

        if ($inspection->finalInspection !== null){

           
            tap($validatedInput['main_label'], function ($previous) use($validatedInput, $inspection) {
                $main_labelFileName = $validatedInput['main_label']->getClientOriginalName();
                $main_labelFileName = substr($main_labelFileName, strpos($main_labelFileName, '.c'));
                $main_labelFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$main_labelFileName;
                $inspection->finalInspection->update([
                    'main_label' => $validatedInput['main_label']->storePubliclyAs('inspection/main_label', $main_labelFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            
            $main_labelFleName = '';
            tap($validatedInput['main_label'], function ($previous) use($validatedInput, $inspection) {
                $main_labelFileName = $validatedInput['main_label']->getClientOriginalName();
                $main_labelFileName = substr($main_labelFileName, strpos($main_labelFileName, '.c'));
                $main_labelFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$main_labelFileName;

                $main_labelFileName = $validatedInput['main_label']->storePubliclyAs('inspection/main_label', $main_labelFileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoFrontSide(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
           
            'front_side' => ['required', 'file', 'max:10000'],   
        ]);

        if ($inspection->finalInspection !== null){

           
            tap($validatedInput['front_side'], function ($previous) use($validatedInput, $inspection) {
                $front_sideFileName = $validatedInput['front_side']->getClientOriginalName();
                $front_sideFileName = substr($front_sideFileName, strpos($front_sideFileName, '.c'));
                $front_sideFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$front_sideFileName;
                $inspection->finalInspection->update([
                    'front_side' => $validatedInput['front_side']->storePubliclyAs('inspection/front_side', $front_sideFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            
            $front_sideFleName = '';
            tap($validatedInput['front_side'], function ($previous) use($validatedInput, $inspection) {
                $front_sideFileName = $validatedInput['front_side']->getClientOriginalName();
                $front_sideFileName = substr($front_sideFileName, strpos($front_sideFileName, '.c'));
                $front_sideFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$front_sideFileName;

                $front_sideFileName = $validatedInput['front_side']->storePubliclyAs('inspection/front_side', $front_sideFileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoBackSide(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
           
            'back_side' => ['required', 'file', 'max:10000'],   
        ]);

        if ($inspection->finalInspection !== null){

           
            tap($validatedInput['back_side'], function ($previous) use($validatedInput, $inspection) {
                $back_sideFileName = $validatedInput['back_side']->getClientOriginalName();
                $back_sideFileName = substr($back_sideFileName, strpos($back_sideFileName, '.c'));
                $back_sideFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$back_sideFileName;
                $inspection->finalInspection->update([
                    'back_side' => $validatedInput['back_side']->storePubliclyAs('inspection/back_side', $back_sideFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            
            $back_sideFleName = '';
            tap($validatedInput['back_side'], function ($previous) use($validatedInput, $inspection) {
                $back_sideFileName = $validatedInput['back_side']->getClientOriginalName();
                $back_sideFileName = substr($back_sideFileName, strpos($back_sideFileName, '.c'));
                $back_sideFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$back_sideFileName;

                $back_sideFileName = $validatedInput['back_side']->storePubliclyAs('inspection/back_side', $back_sideFileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoImage1(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
           
            'image1' => ['required', 'file', 'max:10000'],   
        ]);

        if ($inspection->finalInspection !== null){

           
            tap($validatedInput['image1'], function ($previous) use($validatedInput, $inspection) {
                $image1FileName = $validatedInput['image1']->getClientOriginalName();
                $image1FileName = substr($image1FileName, strpos($image1FileName, '.c'));
                $image1FileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$image1FileName;
                $inspection->finalInspection->update([
                    'image1' => $validatedInput['image1']->storePubliclyAs('inspection/image1', $image1FileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            
            $image1FleName = '';
            tap($validatedInput['image1'], function ($previous) use($validatedInput, $inspection) {
                $image1FileName = $validatedInput['image1']->getClientOriginalName();
                $image1FileName = substr($image1FileName, strpos($image1FileName, '.c'));
                $image1FileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$image1FileName;

                $image1FileName = $validatedInput['image1']->storePubliclyAs('inspection/image1', $image1FileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoPView(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
           
            'product_view' => ['required', 'file', 'max:10000'],   
        ]);

        if ($inspection->finalInspection !== null){

           
            tap($validatedInput['product_view'], function ($previous) use($validatedInput, $inspection) {
                $product_viewFileName = $validatedInput['product_view']->getClientOriginalName();
                $product_viewFileName = substr($product_viewFileName, strpos($product_viewFileName, '.c'));
                $product_viewFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$product_viewFileName;
                $inspection->finalInspection->update([
                    'product_view' => $validatedInput['product_view']->storePubliclyAs('inspection/product_view', $product_viewFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            
            $product_viewFleName = '';
            tap($validatedInput['product_view'], function ($previous) use($validatedInput, $inspection) {
                $product_viewFileName = $validatedInput['product_view']->getClientOriginalName();
                $product_viewFileName = substr($product_viewFileName, strpos($product_viewFileName, '.c'));
                $product_viewFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$product_viewFileName;

                $product_viewFileName = $validatedInput['product_view']->storePubliclyAs('inspection/product_view', $product_viewFileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoSView(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
           
            'shading_view' => ['required', 'file', 'max:10000'],   
        ]);

        if ($inspection->finalInspection !== null){

           
            tap($validatedInput['shading_view'], function ($previous) use($validatedInput, $inspection) {
                $shading_viewFileName = $validatedInput['shading_view']->getClientOriginalName();
                $shading_viewFileName = substr($shading_viewFileName, strpos($shading_viewFileName, '.c'));
                $shading_viewFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$shading_viewFileName;
                $inspection->finalInspection->update([
                    'shading_view' => $validatedInput['shading_view']->storePubliclyAs('inspection/shading_view', $shading_viewFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            
            $shading_viewFleName = '';
            tap($validatedInput['shading_view'], function ($previous) use($validatedInput, $inspection) {
                $shading_viewFileName = $validatedInput['shading_view']->getClientOriginalName();
                $shading_viewFileName = substr($shading_viewFileName, strpos($shading_viewFileName, '.c'));
                $shading_viewFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$shading_viewFileName;

                $shading_viewFileName = $validatedInput['shading_view']->storePubliclyAs('inspection/shading_view', $shading_viewFileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoCSample(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
           
            'compare_sample' => ['required', 'file', 'max:10000'],   
        ]);

        if ($inspection->finalInspection !== null){

           
            tap($validatedInput['compare_sample'], function ($previous) use($validatedInput, $inspection) {
                $compare_sampleFileName = $validatedInput['compare_sample']->getClientOriginalName();
                $compare_sampleFileName = substr($compare_sampleFileName, strpos($compare_sampleFileName, '.c'));
                $compare_sampleFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$compare_sampleFileName;
                $inspection->finalInspection->update([
                    'compare_sample' => $validatedInput['compare_sample']->storePubliclyAs('inspection/compare_sample', $compare_sampleFileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            
            $compare_sampleFleName = '';
            tap($validatedInput['compare_sample'], function ($previous) use($validatedInput, $inspection) {
                $compare_sampleFileName = $validatedInput['compare_sample']->getClientOriginalName();
                $compare_sampleFileName = substr($compare_sampleFileName, strpos($compare_sampleFileName, '.c'));
                $compare_sampleFileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$compare_sampleFileName;

                $compare_sampleFileName = $validatedInput['compare_sample']->storePubliclyAs('inspection/compare_sample', $compare_sampleFileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoM1(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
           
            'measurement1' => ['required', 'file', 'max:10000'],   
        ]);

        if ($inspection->finalInspection !== null){

           
            tap($validatedInput['measurement1'], function ($previous) use($validatedInput, $inspection) {
                $measurement1FileName = $validatedInput['measurement1']->getClientOriginalName();
                $measurement1FileName = substr($measurement1FileName, strpos($measurement1FileName, '.c'));
                $measurement1FileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$measurement1FileName;
                $inspection->finalInspection->update([
                    'measurement1' => $validatedInput['measurement1']->storePubliclyAs('inspection/measurement1', $measurement1FileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            
            $measurement1FleName = '';
            tap($validatedInput['measurement1'], function ($previous) use($validatedInput, $inspection) {
                $measurement1FileName = $validatedInput['measurement1']->getClientOriginalName();
                $measurement1FileName = substr($measurement1FileName, strpos($measurement1FileName, '.c'));
                $measurement1FileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$measurement1FileName;

                $measurement1FileName = $validatedInput['measurement1']->storePubliclyAs('inspection/measurement1', $measurement1FileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoM2(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
           
            'measurement2' => ['required', 'file', 'max:10000'],   
        ]);

        if ($inspection->finalInspection !== null){

           
            tap($validatedInput['measurement2'], function ($previous) use($validatedInput, $inspection) {
                $measurement2FileName = $validatedInput['measurement2']->getClientOriginalName();
                $measurement2FileName = substr($measurement2FileName, strpos($measurement2FileName, '.c'));
                $measurement2FileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$measurement2FileName;
                $inspection->finalInspection->update([
                    'measurement2' => $validatedInput['measurement2']->storePubliclyAs('inspection/measurement2', $measurement2FileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            
            $measurement2FleName = '';
            tap($validatedInput['measurement2'], function ($previous) use($validatedInput, $inspection) {
                $measurement2FileName = $validatedInput['measurement2']->getClientOriginalName();
                $measurement2FileName = substr($measurement2FileName, strpos($measurement2FileName, '.c'));
                $measurement2FileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$measurement2FileName;

                $measurement2FileName = $validatedInput['measurement2']->storePubliclyAs('inspection/measurement2', $measurement2FileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoM3(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
           
            'measurement3' => ['required', 'file', 'max:10000'],   
        ]);

        if ($inspection->finalInspection !== null){

           
            tap($validatedInput['measurement3'], function ($previous) use($validatedInput, $inspection) {
                $measurement3FileName = $validatedInput['measurement3']->getClientOriginalName();
                $measurement3FileName = substr($measurement3FileName, strpos($measurement3FileName, '.c'));
                $measurement3FileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$measurement3FileName;
                $inspection->finalInspection->update([
                    'measurement3' => $validatedInput['measurement3']->storePubliclyAs('inspection/measurement3', $measurement3FileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            
            $measurement3FleName = '';
            tap($validatedInput['measurement3'], function ($previous) use($validatedInput, $inspection) {
                $measurement3FileName = $validatedInput['measurement3']->getClientOriginalName();
                $measurement3FileName = substr($measurement3FileName, strpos($measurement3FileName, '.c'));
                $measurement3FileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$measurement3FileName;

                $measurement3FileName = $validatedInput['measurement3']->storePubliclyAs('inspection/measurement3', $measurement3FileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoM4(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
           
            'measurement4' => ['required', 'file', 'max:10000'],   
        ]);

        if ($inspection->finalInspection !== null){

           
            tap($validatedInput['measurement4'], function ($previous) use($validatedInput, $inspection) {
                $measurement4FileName = $validatedInput['measurement4']->getClientOriginalName();
                $measurement4FileName = substr($measurement4FileName, strpos($measurement4FileName, '.c'));
                $measurement4FileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$measurement4FileName;
                $inspection->finalInspection->update([
                    'measurement4' => $validatedInput['measurement4']->storePubliclyAs('inspection/measurement4', $measurement4FileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            
            $measurement4FleName = '';
            tap($validatedInput['measurement4'], function ($previous) use($validatedInput, $inspection) {
                $measurement4FileName = $validatedInput['measurement4']->getClientOriginalName();
                $measurement4FileName = substr($measurement4FileName, strpos($measurement4FileName, '.c'));
                $measurement4FileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$measurement4FileName;

                $measurement4FileName = $validatedInput['measurement4']->storePubliclyAs('inspection/measurement4', $measurement4FileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    public function updatePhotoM5(Request $request, Inspection $inspection)
    {
        $validatedInput = $request->validate([
           
            'measurement5' => ['required', 'file', 'max:10000'],   
        ]);

        if ($inspection->finalInspection !== null){

           
            tap($validatedInput['measurement5'], function ($previous) use($validatedInput, $inspection) {
                $measurement5FileName = $validatedInput['measurement5']->getClientOriginalName();
                $measurement5FileName = substr($measurement5FileName, strpos($measurement5FileName, '.c'));
                $measurement5FileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$measurement5FileName;
                $inspection->finalInspection->update([
                    'measurement5' => $validatedInput['measurement5']->storePubliclyAs('inspection/measurement5', $measurement5FileName, ['disk' => 'public']),
                ]);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });
            $inspection->push();
        } else {
            
            $measurement5FleName = '';
            tap($validatedInput['measurement5'], function ($previous) use($validatedInput, $inspection) {
                $measurement5FileName = $validatedInput['measurement5']->getClientOriginalName();
                $measurement5FileName = substr($measurement5FileName, strpos($measurement5FileName, '.c'));
                $measurement5FileName = $inspection->name_inspector.'_'.date("d M Y").'_'.$measurement5FileName;

                $measurement5FileName = $validatedInput['measurement5']->storePubliclyAs('inspection/measurement5', $measurement5FileName, ['disk' => 'public']);

                if ($previous) {
                    \Storage::disk('public')->delete($previous);
                }
            });

          }

        return back()->with("start", 'Photo Has Been Saved !');
    }
    
    public function updateDefect(Request $request, Inspection $inspection)
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
            // $inspection->finalSubMenu->aql = $request->aql ?? null;
            $inspection->push();
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
                    // 'aql' => $request->aql,
                ])
            );
        }

        return back()->with("start", 'Data Has Been Saved !');
    }

    public function photos(Request $request,Inspection $inspection)
    {
        $page = 'finali';
        $data = $inspection->load(['finalInspection']);
        
        // dd($data->finalInspection->foto, $data->finalInspection->id,
        //     \Storage::get($data->finalInspection->packed_into_carton)
        // );

        return view('qc.final-inspection.final-sub.photos-sub', compact('data','page'));
    }

    public function defects(Request $request,Inspection $inspection)
    {
        $page = 'finali';
        $data = $inspection;
        $data2 = defectMenu::with(['defectSubMenu'])->get();

    //    dd(defectMenu::with(['defectSubMenu'])->get());
        return view('qc.final-inspection.final-sub.defects-sub', compact('data2','data', 'page'));
    }

    public function updateComment(
        Request $request, Inspection $inspection, 
        defectMenu $menu, defectSubMenu $subMenu
    )
    {
        $validatedInput = $request->validate([
            'message' => ['required']
        ], [
            'message.required' => 'Pesan wajib diisi'
        ]);
        $subMenu->update([
            'comment' => $validatedInput['message']
        ]);

        return back()->with("start", 'Data Has Been Saved !');
    }

    public function incrementCriticalDefect(
        Request $request, Inspection $inspection, 
        defectMenu $menu, defectSubMenu $subMenu
    )
    {
        $subMenu->timestamps = false;
        $subMenu->increment('critical');

        return response()->json([
            'status' => 'Success',
            'sub_menu' => $subMenu->only('id', 'critical'),
            'message' => 'Berhasil di increment',
        ]);
    }

    public function decrementCriticalDefect(
        Request $request, Inspection $inspection, 
        defectMenu $menu, defectSubMenu $subMenu
    )
    {
        if ($subMenu->critical > 0) {
            $subMenu->timestamps = false;
            $subMenu->decrement('critical');

            return response()->json([
                'status' => 'Success',
                'sub_menu' => $subMenu->only('id', 'critical'),
                'message' => 'Critical berhasil di decrement',
            ]);
        }

        return response()->json([
            'status' => 'Gagal',
            'sub_menu' => $subMenu->only('id', 'critical'),
            'message' => 'data critical gagal diturunkan',
        ]);
    }

    public function incrementMajorDefect(
        Request $request, Inspection $inspection, 
        defectMenu $menu, defectSubMenu $subMenu
    )
    {
        $subMenu->timestamps = false;
        $subMenu->increment('major');

        return response()->json([
            'status' => 'Success',
            'sub_menu' => $subMenu->only('id', 'major'),
            'message' => 'Major berhasil di increment',
        ]);
    }

    public function decrementMajorDefect(
        Request $request, Inspection $inspection, 
        defectMenu $menu, defectSubMenu $subMenu
    )
    {
        if ($subMenu->major > 0) {
            $subMenu->timestamps = false;
            $subMenu->decrement('major');

            return response()->json([
                'status' => 'Success',
                'sub_menu' => $subMenu->only('id', 'major'),
                'message' => 'Major berhasil di decrement',
            ]);
        }

        return response()->json([
            'status' => 'Gagal',
            'sub_menu' => $subMenu->only('id', 'major'),
            'message' => 'Major gagal diturunkan',
        ]);
    }

    public function incrementMinorDefect(
        Request $request, Inspection $inspection, 
        defectMenu $menu, defectSubMenu $subMenu
    )
    {
        $subMenu->timestamps = false;
        $subMenu->increment('minor');

        return response()->json([
            'status' => 'Success',
            'sub_menu' => $subMenu->only('id', 'minor'),
            'message' => 'Minor berhasil di increment',
        ]);
    }

    public function decrementMinorDefect(
        Request $request, Inspection $inspection, 
        defectMenu $menu, defectSubMenu $subMenu
    )
    {
        if ($subMenu->minor > 0) {
            $subMenu->timestamps = false;
            $subMenu->decrement('minor');

            return response()->json([
                'status' => 'Success',
                'sub_menu' => $subMenu->only('id', 'minor'),
                'message' => 'Minor berhasil di decrement',
            ]);
        }

        return response()->json([
            'status' => 'Gagal',
            'sub_menu' => $subMenu->only('id', 'minor'),
            'message' => 'Minor gagal diturunkan',
        ]);
    }

    public function quality(Request $request,Inspection $inspection)
    {
        $page = 'finali';
        $data = $inspection->load(['finalInspection']);
        // $data = $inspection;
        return view('qc.final-inspection.final-sub.quality-sub', compact('data','page'));
    }

    public function conclusion(Request $request,Inspection $inspection)
    {
        $page = 'finali';
        // $data = $inspection;
        $data = $inspection->load(['finalInspection']);
        $data2 = defectMenu::with(('defectSubMenu'))->get();

        // dd($inspection->load(['finalInspection']));

        return view('qc.final-inspection.final-sub.conclusion-sub', compact('data', 'data2','page'));
    }
}
