<?php

namespace App\Http\Controllers\Marketing\TrimCard;

use File;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Marketing\TrimCard\TrimCard;
use App\Models\Marketing\TrimCard\TrimCardPDF;

class TrimCardPDFController extends Controller
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

    public function file($id)
    {
        $data = TrimCard::with('file')->findorfail($id);
        // dd($data->file);

        $page = "TrimCardIndex";
        return view('marketing.trimcard.file_index', compact('page', 'data'));
    }

    public function addfile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240',
        ]);
    
        $fileName = $request->file->getClientOriginalName();  
   
        $request->file->move(public_path('marketing/trimcard'), $fileName);

        $input  = [
            'tc_id' => $request->tc_id,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'branch' => $request->branch,
            'branchdetail' => $request->branchdetail,
            'file' => $fileName,
            'note' => $request->note,
            '_token' => $request->_token,
        ];

        $show = TrimCardPDF::create($input);

        return redirect()->back();
    }
    
    public function delete_file($id)
    {
        $data = TrimCardPDF::findorfail($id);
        File::delete('marketing/trimcard/'.$data->file);

        $data->delete();
        
        return redirect()->back();
    }

    function getFile($file){
    	$file_path = public_path('marketing/trimcard/'.$file);
        return response()->download( $file_path);
    }
}
