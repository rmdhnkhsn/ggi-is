<?php

namespace App\Http\Controllers\QC\SMQC;

use File;
use Image;
use Storage;
use Illuminate\Http\Request;
use App\Models\QC\SMQC\Shade;
use App\Models\QC\SMQC\Fabric;
use App\Models\QC\SMQC\NewFile;
use App\Http\Controllers\Controller;
use App\Models\QC\SMQC\SMQCListBuyer;
use App\Models\QC\SMQC\UserManagement;

class ShadeController extends Controller
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

    public function create($id)
    {
        $page = 'Report Kain';
        $data = Fabric::findorfail($id);
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
        $buyer = SMQCListBuyer::findorfail($data->buyer_id);

        return view('qc.smqc.kain.shade.create', compact('page','data','cek_user','buyer'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->file !=null) {
            $file21 = $request->file('file');
            $file = time()."_".$file21->getClientOriginalName();

            $Image = Image::make($file21->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath = storage_path() . '/app/public/smqc/fabric/shade/' . $file;
            $upload = Image::make($Image)->save($thumbPath);
        }else {
            $file=null;
        }
        // dd($file);

        $input = [
            '_token' => $request->_token,
            'report_id' => $request->report_id,
            'buyer' => $request->buyer,
            'no_po' => $request->no_po,
            'color' => $request->color,
            'ad' => $request->ad,
            'file' => $file,
        ];

        Shade::create($input);

        return redirect()->route('shade.detail', $request->report_id);
    }

    public function detail($id)
    {
        $page = 'Report Kain';
        $data = Fabric::with('shadel', 'newfile')->findorfail($id);
        $buyer = SMQCListBuyer::findorfail($data->buyer_id);
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
        
        return view('qc.smqc.kain.shade.detail', compact('page','data','cek_user','buyer'));
    }

    public function edit($id)
    {
        $page = 'Report Kain';
        $data = Shade::findorfail($id);
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
        $buyer = SMQCListBuyer::all();
        // dd($shade);
        return view('qc.smqc.kain.shade.edit', compact('page','data','cek_user', 'buyer'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $update = $request->all();
        Shade::whereId($request->id)->update($update);

        return redirect()->route('shade.detail', $request->report_id);
    }

    public function addnew($id)
    {
        $page = 'Report Kain';
        $data = Fabric::findorfail($id);
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

        return view('qc.smqc.kain.shade.addnew', compact('page','data','cek_user'));
    }

    public function newfile(Request $request)
    {
        if ($request->file !=null) {
            $file21 = $request->file('file');
            $file = time()."_".$file21->getClientOriginalName();

            $Image = Image::make($file21->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath = storage_path() . '/app/public/smqc/fabric/shade/' . $file;
            $upload = Image::make($Image)->save($thumbPath);
        }else {
            $file=null;
        }

        $input =  [
            'report_id' => $request->report_id,
            'file' => $file
        ];

        NewFile::create($input);

        return redirect()->route('shade.detail', $request->report_id);
    }

    public function delete($id)
    {
        $shade = Shade::where('report_id',$id)->first();
        $newfile = NewFile::where('report_id',$id)->get();

        foreach ($newfile as $key => $value) {
            File::delete(storage_path('/app/public/smqc/fabric/shade/'.$value->file));
        }
        File::delete(storage_path('/app/public/smqc/fabric/shade/'.$shade->file));

        Shade::where('report_id',$id)->delete();
        NewFile::where('report_id',$id)->delete();
       
        return redirect()->route('kain.dashboard');
    }
}
