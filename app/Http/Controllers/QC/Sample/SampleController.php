<?php

namespace App\Http\Controllers\QC\Sample;

use PDF;
use File;
use Image;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GetData\QC\Sample\datasample;
use App\Models\QC\Sample\SampleReport;
use App\Models\QC\Sample\Category;
use App\Models\QC\Sample\ListBuyerSample;

class SampleController extends Controller
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
    
    public function Index()
    {
        $page = 'Dashboard';
        return view('qc.sample.index', compact('page'));
    }

    public function report(Request $request)
    {
        $sample = SampleReport::where('branch', auth()->user()->branch)
                    ->where('branchdetail', auth()->user()->branchdetail)
                    ->where('spv_app', 0);

        if ($request->ajax()) {
        return Datatables::of($sample)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return view('qc.sample.report.atribut.btn_action', compact('row'));
                    })
                    ->addColumn('detail', function($row){
                        return view('qc.sample.report.atribut.btn_detail', compact('row'));
                    })
                    ->editColumn('spl_app', function($row){
                        return view('qc.sample.report.atribut.btn_spl', compact('row'));
                    })
                    ->editColumn('dept_app', function($row){
                        return view('qc.sample.report.atribut.btn_dept', compact('row'));
                    })
                    ->editColumn('spv_app', function($row){
                        return view('qc.sample.report.atribut.btn_spv', compact('row'));
                    })
                    ->rawColumns(['action', 'detail'])
                    ->make(true);
        }
        // dd($dataSample);
        $page = 'Qreport';
        return view('qc.sample.report.index', compact('page'));
    }

    public function add()
    {
        $page = 'Qreport';
        $category = Category::all();
        // dd($page);
        return view('qc.sample.report.add', compact('page','category'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if(SampleReport::where('buyer', $request->buyer)
                        ->where('style', $request->style)
                        ->where('date', $request->date )->count())
        return redirect()->back()->with(['error' => 'Proses simpan ditolak, Data terdaftar!']);

        $this->validate($request, [
			'file' => 'file|image|mimes:jpeg,png,jpg',
			'file2' => 'file|image|mimes:jpeg,png,jpg',
			'file3' => 'file|image|mimes:jpeg,png,jpg',
			'file4' => 'file|image|mimes:jpeg,png,jpg',
		]);

        if ($request->file != null) {
            $file = $request->file('file');
            $nama_file = time()."_".$file->getClientOriginalName();
    
            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/qc/sample/images/' . $nama_file;
            $upload = Image::make($Image)->save($thumbPath);
        }else {
            $nama_file = null;
        }

        if ($request->file2 != null) {
            $file2 = $request->file('file2');
            $nama_file2 = time()."_".$file2->getClientOriginalName();
    
            $Image = Image::make($file2->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/qc/sample/images/' . $nama_file2;
            $upload = Image::make($Image)->save($thumbPath);
        }else {
            $nama_file2 = null;
        }

        if ($request->file3 != null) {
            $file3 = $request->file('file3');
            $nama_file3 = time()."_".$file3->getClientOriginalName();
    
            $Image = Image::make($file3->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/qc/sample/images/' . $nama_file3;
            $upload = Image::make($Image)->save($thumbPath);
        }else {
            $nama_file3 = null;
        }

        if ($request->file4 != null) {
            $file4 = $request->file('file4');
            $nama_file4 = time()."_".$file4->getClientOriginalName();
    
            $Image = Image::make($file4->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/qc/sample/images/' . $nama_file4;
            $upload = Image::make($Image)->save($thumbPath);
        }else {
            $nama_file4 = null;
        }

        $input = [
            '_token' => $request->_token,
            'buyer' => strtoupper($request->buyer),
            'buyer_name' => strtoupper($request->buyer_name),
            'style' => strtoupper($request->style),
            'status' => strtoupper($request->status),
            'date' => $request->date,
            'category' => $request->category,
            'item' => $request->item,
            'size' => $request->size,
            'pack' => $request->pack,
            'file' => $nama_file,
            'file2' => $nama_file2,
            'file3' => $nama_file3,
            'file4' => $nama_file4,
            'created_by' => $request->created_by,
            'branch' => $request->branch,
            'branchdetail' => $request->branchdetail,
        ];
        
        $show = SampleReport::create($input);

        return redirect()->route('qr.index')->with('Data tersimpan');
    }
    
    public function edit($id)
    {
        $data = SampleReport::findorfail($id);

        $page = 'Qreport';
        return view('qc.sample.report.edit', compact('data','page'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $data = SampleReport::findorfail($request->id);
        // dd($data);
        // $id = $request->id;

        $this->validate($request, [
			'file' => 'file|image|mimes:jpeg,png,jpg',
			'file2' => 'file|image|mimes:jpeg,png,jpg',
			'file3' => 'file|image|mimes:jpeg,png,jpg',
			'file4' => 'file|image|mimes:jpeg,png,jpg',
		]);

        if ($request->file != null && $data->file == null) {
            $file = $request->file('file');
            $nama_file = time()."_".$file->getClientOriginalName();
    
            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/qc/sample/images/' . $nama_file;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif($request->file == null && $data->file != null){
            $nama_file = $data->file;
        }else {
            $nama_file = null;
        }

        if ($request->file2 != null && $data->file2 == null) {
            $file2 = $request->file('file2');
            $nama_file2 = time()."_".$file2->getClientOriginalName();
    
            $Image = Image::make($file2->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/qc/sample/images/' . $nama_file2;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif($request->file2 == null && $data->file2 != null){
            $nama_file2 = $data->file2;
        }else {
            $nama_file2 = null;
        }

        if ($request->file3 != null && $data->file3 == null) {
            $file3 = $request->file('file3');
            $nama_file3 = time()."_".$file3->getClientOriginalName();
    
            $Image = Image::make($file3->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/qc/sample/images/' . $nama_file3;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif($request->file3 == null && $data->file3 != null){
            $nama_file3 = $data->file3;
        }else {
            $nama_file3 = null;
        }

        if ($request->file4 != null && $data->file4 == null) {
            $file4 = $request->file('file4');
            $nama_file4 = time()."_".$file4->getClientOriginalName();
    
            $Image = Image::make($file4->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/qc/sample/images/' . $nama_file4;
            $upload = Image::make($Image)->save($thumbPath);
        }elseif($request->file4 == null && $data->file4 != null){
            $nama_file4 = $data->file4;
        }else {
            $nama_file4 = null;
        }

        $update = [
            'buyer' => strtoupper($request->buyer),
            'buyer_name' => strtoupper($request->buyer_name),
            'style' => strtoupper($request->style),
            'status' => strtoupper($request->status),
            'date' => $request->date,
            'category' => $request->category,
            'item' => $request->item,
            'size' => $request->size,
            'file' => $nama_file,
            'file2' => $nama_file2,
            'file3' => $nama_file3,
            'file4' => $nama_file4,
        ];

        SampleReport::whereId($request->id)->update($update);

        return redirect()->route('qr.index')->with('Data tersimpan');
    }

    public function delete($id)
    {
        $sample = SampleReport::findOrFail($id);
        $sample->delete();
        
        return back();
    }

    public function final(Request $request)
    {
        $dataSpl = SampleReport::has('fabric_quality')
                                ->has('color')
                                ->has('measurement')
                                ->has('workmanship')
                                ->where('spl_app', 1)
                                ->where('dept_app', 1)
                                ->where('spv_app', 1)
                                ->where('branch', auth()->user()->branch)
                                ->where('branchdetail', auth()->user()->branchdetail);
                                
        if ($request->ajax()) {
            return Datatables::of($dataSpl)
                ->addIndexColumn()
                ->addColumn('detail', function($row){
                    return view('qc.sample.app.atribut.btn_final', compact('row'));
                })
                ->rawColumns(['detail'])
                ->make(true);
        }
        // dd($dataSample);
        $page = 'report';
        return view('qc.sample.final', compact('page'));

    }

    public function pdf($id)
    {
        $date = date('Y-m-d');
        $data = SampleReport::with('fabric_quality', 'measure_standar', 'workmanship', 'measure_detail')->findorfail($id);
        // dd($data);
        $report_id = $data->id;

        // dd($data);
        $pdf = PDF::loadview('qc/sample/final_pdf', compact('data','report_id'))->setPaper('legal', 'portrait');
        return $pdf->stream("QC_Final_Report_".$data->buyer."_".$data->style."_".$date.".pdf");
        // return view('qc.sample.app.final', compact('data', 'report_id'));
    }

    public function file(Request $request, $id)
    {
        $this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg',
		]);

        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');

		$nama_file = time()."_".$file->getClientOriginalName();
       

        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'qc/sample/images';
        
		$file->move($tujuan_upload,$nama_file);
        $update = [
            'file' => $nama_file,
        ];

        SampleReport::whereId($id)->update($update);

        return redirect()->back();
    }

    public function delete_file (Request $request)
    {
        // dd($request->all());
        // hapus file
        $detail = SampleReport::where('id',$request->id)->first();
        $nama_file = $detail->file.$request->no_file;
        File::delete('qc/sample/images/'.$nama_file);

        $updateFile = [
            'file'.$request->no_file => null
        ];

        SampleReport::whereId($request->id)->update($updateFile);

        return redirect()->back();
    }

    public function cari_item(Request $request)
    {
        // dd($request->all());
        $data = ListBuyerSample::where('kode_buyer', $request->ID)->first();
        // dd($data);
        $data_item = collect($data->item)->toArray();
        // dd($data_item);
        return response()->json($data_item);
    }

    public function cari_buyer(Request $request)
    {
        // dd($request->all());
        $data = Category::where('kode_kategori', $request->ID)->first();
        // dd($data);
        $data_buyer = collect($data->buyer)->toArray();
        // dd($data_buyer);
        return response()->json($data_buyer);
    }
}
