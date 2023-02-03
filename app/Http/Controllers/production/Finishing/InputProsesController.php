<?php

namespace App\Http\Controllers\production\Finishing;

use App\Branch;
use Illuminate\Http\Request;
use App\Models\GGI_IS\V_GCC_USER;
use App\Http\Controllers\Controller;
use App\Models\Finising\finising_checker;
use App\Models\Finising\finising_category;
use App\Services\Production\Finishing\finishingToEkspedisi;

class InputProsesController extends Controller
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

    public function input_proses()
    {
        $page ='dashboard';
        $dataBranch = Branch:: all();
        $dataByWo = (new  finishingToEkspedisi)->PackingList();

        $user =V_GCC_USER ::whereIn('branch',['CLN', 'MAJA', 'GK', 'CVC'])
                    ->where('nik','!=','GISCA')
                    ->where('nik','!=','google')
                    ->where('nik','!=','ITTEST1')
                    ->where('nik','!=','ITDTMANAGER')
                    ->where('nik','!=','MANAJEMEN')
                    ->where('nik','!=','SUPERADMIN')
                    ->where('nik','!=','VENDOR')
                    ->where('nik','!=','MEETING')
                    ->where('nik','!=','TAMU')
                    ->where('isaktif',1)
                    ->where('isresign',0)
                    ->get();
        $category = finising_category :: all();
        $dataCategory=collect($category)->groupBy('nama_kategori');

        $categorySub = [];
            foreach ($dataCategory as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('nama_kategori')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $categorySub[] = [
                        'nama_kategori' => $value2['nama_kategori'],
                        'sub_kategori' => $value2['sub_kategori'],
                       
                    ];
                }  
            }
        $dataByCategory=collect($categorySub); 

        return view('production.finishing.input_proses.index', compact('page','dataBranch','dataByWo','user','dataByCategory'));
    }

    public function storeChecker(Request $request)
    {
        
        // $tanggal=date('Y-m-d');

        $input=[
            'id'            =>$request->id,
            'nik'           =>$request->nik,
            'nama'          =>$request->nama,
            'wo'            =>$request->wo,
            'buyer'         =>$request->buyer,
            'style'         =>$request->style,
            'jam_mulai'     =>$request->jam_mulai,
            'jam_selesai'   =>$request->jam_selesai,
            'qty_target'    =>$request->qty_target,
            'placing'       =>$request->placing,
            'status_proses' =>$request->status_proses,
            'remark'        =>$request->remark,
            'status'        =>join(",",$request->status),
            'tanggal'       =>$request->tanggal,
            "branch"        => auth()->user()->branch,
            "branchdetail"  => auth()->user()->branchdetail,

        ];      

        $validatedInput = $request->validate([

        ]);       
            finising_checker::create($input);
        
        return redirect()->route('proses-details')->with("save", 'Data Has Been Saved !');
    }

    public function proses_detailsOther()
    {
        $page ='dashboard';
        $user = auth()->user()->branchdetail;  
        $dataOther = finising_checker:: where('status_proses','=','Other')->where('branchdetail',$user)->orderBy('tanggal','desc')->get();

        return view('production.finishing.input_proses.detailOther', compact('page','dataOther'));
    }

    public function proses_detailsFolding()
    {
        $page ='dashboard';
        $user = auth()->user()->branchdetail;  


        $dataFolding = finising_checker:: where('status_proses','=','Folding')->where('branchdetail',$user)->orderBy('tanggal','desc')->get();

        return view('production.finishing.input_proses.detailFolding', compact('page','dataFolding'));
    }

    public function proses_detailsFreeMetal()
    {
        $page ='dashboard';
        $user = auth()->user()->branchdetail;  

        $dataFreeMetal = finising_checker:: where('status_proses','=','Free Metal')->where('branchdetail',$user)->orderBy('tanggal','desc')->get();

        return view('production.finishing.input_proses.detailFreeMetal', compact('page','dataFreeMetal'));
    }
    
    public function proses_detailsNedeleDetector()
    {
        $page ='dashboard';
        $user = auth()->user()->branchdetail;  

        $dataNedeleDetector = finising_checker:: where('status_proses','=','Needle Detector')->where('branchdetail',$user)->orderBy('tanggal','desc')->get();

        return view('production.finishing.input_proses.detailNedeleDetector', compact('page','dataNedeleDetector'));
    }

    public function getuser(Request $request)
    {

        $user=V_GCC_USER::whereIn('branch',['CLN', 'MAJA', 'GK', 'CVC'])
                    ->where('nik','!=','GISCA')
                    ->where('nik','!=','google')
                    ->where('nik','!=','ITTEST1')
                    ->where('nik','!=','ITDTMANAGER')
                    ->where('nik','!=','MANAJEMEN')
                    ->where('nik','!=','SUPERADMIN')
                    ->where('nik','!=','VENDOR')
                    ->where('nik','!=','MEETING')
                    ->where('nik','!=','TAMU')
                    ->where('isaktif',1)
                    ->where('isresign',0)
                    ->where("nik",$request->ID)->first();

        return response()->json($user);
    }

    public function getCategory(Request $request){

        $category=finising_category::where("nama_kategori",$request->ID)->pluck('nama_kategori','sub_kategori');

        return response()->json($category);
    }

    public function proses_details()
    {
        $page ='dashboard';
        $user = auth()->user()->branchdetail;  

        $dataAll = finising_checker::where('branchdetail',$user)->orderBy('tanggal','desc')->get();

        return view('production.finishing.input_proses.detail', compact('page','dataAll'));
    }

    public function updateChecker(Request $request, $id)
    {
        $page = 'update';
        $data = finising_checker::findorfail($id);
        $tanggal=date('Y-m-d');

        $dataUpdate = [
            'nik'         => $request['nik'],
            'nama'        => $request['nama'],
            'wo'          => $request['wo'],
            'buyer'       => $request['buyer'],
            'style'       => $request['style'],
            'jam_mulai'   => $request['jam_mulai'],
            'jam_selesai' => $request['jam_selesai'],
            'qty_target'  => $request['qty_target'],
            'placing'     => $request['placing'],
            'remark'      => $request['remark'],
            // 'tanggal'     => $tanggal,
            'status'      => $request['status'],
            'status_proses'      => $request['status_proses'],
        ];

        $data->update($dataUpdate);

        return redirect()->route('proses-details')->with('success', ' successfully updated');
    }

    public function edit_proses(Request $request,$id)
    {
        $page ='dashboard';
        $editData= finising_checker:: FindOrFail($id);
          $dataBranch = Branch:: all();
        $dataByWo = (new  finishingToEkspedisi)->PackingList();
       
        $user = V_GCC_USER ::whereIn('branch',['CLN', 'MAJA', 'GK'])
                    ->where('nik','!=','GISCA')
                    ->where('nik','!=','google')
                    ->where('nik','!=','ITTEST1')
                    ->where('nik','!=','ITDTMANAGER')
                    ->where('nik','!=','MANAJEMEN')
                    ->where('nik','!=','SUPERADMIN')
                    ->where('nik','!=','VENDOR')
                    ->where('nik','!=','MEETING')
                    ->where('nik','!=','TAMU')
                    ->where('isaktif',1)
                    ->where('isresign',0)
                    ->get();
        $category = finising_category :: all();
        $dataCategory=collect($category)->groupBy('nama_kategori');

        $categorySub = [];
            foreach ($dataCategory as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('nama_kategori')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $categorySub[] = [
                        'nama_kategori' => $value2['nama_kategori'],
                        'sub_kategori' => $value2['sub_kategori'],
                       
                    ];
                }  
            }

            $dataByCategory=collect($categorySub); 

        return view('production.finishing.input_proses.edit', compact('page','editData','dataBranch','dataByWo','user','dataByCategory'));
    }

    public function deleteFolding($id)
    {
        $item_Lokasi = finising_checker::findOrFail($id);
        $item_Lokasi->delete();
        return back();
    }
}
