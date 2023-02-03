<?php

namespace App\Http\Controllers\Marketing\Worksheet;

use App\Helpers\StorageUtil;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Marketing\Worksheet\Packing;
use App\Models\Marketing\RekapOrder\RekapOrder;

class PackingController extends Controller
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
        // dd($request->all());

        $packing=Packing::where('master_id',$request->master_id)->where('tipe',$request->tipe)->first();
        if ($packing==null) {
            $packing=new Packing();
        }
        if(isset($request->file1)) {
            $filename = StorageUtil::uploadFile("worksheet_packing", $request->file1);
            $packing->file1 = $filename;
        }
        if(isset($request->file2)) {
            $filename = StorageUtil::uploadFile("worksheet_packing", $request->file2);
            $packing->file2 = $filename;
        }
        if(isset($request->file3)) {
            $filename = StorageUtil::uploadFile("worksheet_packing", $request->file3);
            $packing->file3 = $filename;
        }
        if(isset($request->file4)) {
            $filename = StorageUtil::uploadFile("worksheet_packing", $request->file4);
            $packing->file4 = $filename;
        }
        if(isset($request->file5)) {
            $filename = StorageUtil::uploadFile("worksheet_packing", $request->file5);
            $packing->file5 = $filename;
        }
        if(isset($request->file6)) {
            $filename = StorageUtil::uploadFile("worksheet_packing", $request->file6);
            $packing->file6 = $filename;
        }
        if(isset($request->file7)) {
            $filename = StorageUtil::uploadFile("worksheet_packing", $request->file7);
            $packing->file7 = $filename;
        }
        if(isset($request->file8)) {
            $filename = StorageUtil::uploadFile("worksheet_packing", $request->file8);
            $packing->file8 = $filename;
        }
        if(isset($request->file9)) {
            $filename = StorageUtil::uploadFile("worksheet_packing", $request->file9);
            $packing->file9 = $filename;
        }
        if(isset($request->file10)) {
            $filename = StorageUtil::uploadFile("worksheet_packing", $request->file10);
            $packing->file10 = $filename;
        }
        if(isset($request->file11)) {
            $filename = StorageUtil::uploadFile("worksheet_packing", $request->file11);
            $packing->file11 = $filename;
        }
        if(isset($request->file12)) {
            $filename = StorageUtil::uploadFile("worksheet_packing", $request->file12);
            $packing->file12 = $filename;
        }
        if(isset($request->file_guide)) {
            $filename = StorageUtil::uploadFile("worksheet_packing", $request->file_guide);
            $packing->file_guide = $filename;
            $packing->file_guide_original = $request->file_guide->getClientOriginalName();
        }
        $packing->master_id = $request->master_id;
        $packing->tipe = $request->tipe;
        $packing->note_detail = $request->note_detail;
        $packing->note_attention = $request->note_attention;
        $packing->save();

        // $input = $request->all();
        // $show = Packing::create($input);
        // return redirect()->back();
    }

    public function detail($id)
    {
        $show = Packing::findorfail($id);
        return response()->json($show);
    }

    public function folding($id)
    {
        $show = Packing::where('master_id', $id)->where('tipe', 'FOLDING')->first();
        // dd($show);
        $file= public_path()."/upload/".$show['file_guide'];
        // dd($file);
        $headers = array(
                  'Content-Type: application/pdf/csv/xlsx',
                );
        // dd($headers);
        return response()->download($file,$show['file_guide_original'],$headers);
    }

    public function packing($id)
    {
        $show = Packing::where('master_id', $id)->where('tipe', 'PACKING')->first();
        // dd($show);
        $file= public_path()."/upload/".$show['file_guide'];
        // dd($file);
        $headers = array(
                  'Content-Type: application/pdf/csv/xlsx',
                );
        // dd($headers);
        return response()->download($file,$show['file_guide_original'],$headers);
    }

    public function info($id)
    {
        $show = Packing::where('master_id', $id)->where('tipe', 'INFO')->first();
        // dd($show);
        $file= public_path()."/upload/".$show['file_guide'];
        // dd($file);
        $headers = array(
                  'Content-Type: application/pdf/csv/xlsx',
                );
        // dd($headers);
        return response()->download($file,$show['file_guide_original'],$headers);
    }
}
