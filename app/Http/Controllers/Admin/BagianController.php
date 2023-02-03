<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Admin\Bagian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CommandCenter\Scheduler\AllFactory\it;

class BagianController extends Controller
{
    public function index(Request $request)
    {
        // get data semua aktif
        $all = Bagian::all();

        // mengambil data karyawan yang akan ditampilkan di views
        $dataBagian = [];
        foreach ($all as $key => $value) {
            $dataBagian[] = [
                'id' => $value->id,
                'kode_bagian' => $value->kode_bagian,
                'nama_bagian' => $value->nama_bagian,
                'nilai' => $value->nilai,
                'warna' => $value->warna,
                'issues' => $value->issues,
                'good' => $value->good,
                'poor' => $value->poor,
                'critical' => $value->critical,
            ];
        }
        if ($request->ajax()) {
            return Datatables::of($dataBagian)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            return view('sys_admin.bagian.atribut.btn_action', compact('row'));
                        //    $btn = '<a href="{{route('karyawan.editrole')}}" class="edit btn btn-primary btn-sm" title="Edit Role"><i class="fas fa-edit"></i></a>';
       
                        //     return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $page = 'division';
        return view('sys_admin/bagian/index', compact('page'));
    }

    public function create()
    {
        $page = 'division';
        return view('sys_admin/bagian/add', compact('page'));
    }

    public function store(Request $request)
    {
        if(
            Bagian::where('kode_bagian', $request->kode_bagian)->where('nama_bagian', $request->nama_bagian)->count()
        ) {
            return redirect()->back()->with(['error' => 'Data Terdaftar !!']);
        }else{
            $input =[
                'kode_bagian' => strtoupper($request->kode_bagian),
                'nama_bagian' => strtoupper($request->nama_bagian),
                'nilai' => $request->nilai,
                'warna' => $request->warna,
                'issues' => $request->issues,
                'good' => $request->good,
                'poor' => $request->poor,
                'critical' => $request->critical,
                '_token' => $request->_token
            ];

            $show = Bagian::create($input);

            return redirect()->route('bagian.index');
        }
    }

    public function edit($id)
    {
        $data = Bagian::findOrFail($id);
        //dd($data->id);

        $page = 'division';
        return view('sys_admin/bagian/edit', compact('data','id','page'));
 
    }

    public function update(Request $request)
    {
        $update =[
                'kode_bagian' => strtoupper($request->kode_bagian),
                'nama_bagian' => strtoupper($request->nama_bagian),
                'nilai' => $request->nilai,
                'warna' => $request->warna,
                'issues' => $request->issues,
                'good' => $request->good,
                'poor' => $request->poor,
                'critical' => $request->critical,
                '_token' => $request->_token
            ];

        Bagian::whereId($request->id)->update($update);

	    return redirect()->route('bagian.index');
    }

    public function delete($id)
    {
        $bagian = Bagian::findOrFail($id);
        $bagian->delete();
        
        return back();
    }
}
