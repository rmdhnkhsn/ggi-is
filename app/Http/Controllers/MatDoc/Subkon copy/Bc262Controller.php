<?php

namespace App\Http\Controllers\MatDoc\Subkon;

use DB;
use Image;
use Auth;
use DataTables;
use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\MaterialImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Mat_Doc\Subkon\pj_kk;
use App\Models\Mat_Doc\Subkon\BarangJadi;
use App\Models\Mat_Doc\Subkon\Bc262;
use App\Models\Mat_Doc\Subkon\dokumen262;
use App\Services\MatDok\Subkon\subkon;
use App\Services\MatDok\Subkon\uploadFile;
use App\Models\Mat_Doc\Subkon\pengeluaran;
use App\Exports\UploadTpb262Export;
use App\Models\Mat_Doc\Subkon\material;



class Bc262Controller extends Controller
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

    public function create($no_kontrak) 
	{
        $data_kontrak = pj_kk::findOrFail($no_kontrak);
        $BarangJadi =pj_kk::where('no_kontrak',$no_kontrak)->with('Barang_Jadi')->get();
        $pemasukan =pj_kk::where('no_kontrak',$no_kontrak)->with('pemasukan')->get();
        $data_pemasukan=$pemasukan->flatMap->pemasukan;
        $barang_jadi=$BarangJadi->flatMap->Barang_Jadi;
        $patrial_pemasukan=(new subkon)->patrial_pemasukan($barang_jadi,$data_pemasukan);

        $page = 'dashboard';

        return view('MatDoc.subkon.partials.monitoring.create-pj262', compact('page','patrial_pemasukan','no_kontrak'));
    }
    
    public function insert(Request $request)
    {   
        $no_kontrak=$request->no_kontrak;
        if( Bc262::where('id_no_kontrak', $no_kontrak)->where('no_aju',$request->no_aju)->count()){
            return redirect()->route('subkon.monitoring',$no_kontrak)->with('error', 'No Aju Sudah Terdaftar');
        }
        else{
            $insert_262=(new subkon)-> store_bc262($request);
            $dokumen= (new  uploadFile)->insertFile($request,$no_kontrak);
    
                    dokumen262::create($dokumen);
            return redirect()->route('subkon.monitoring',$no_kontrak)->with('success', 'user is successfully saved');
        }
    }
    public function show_dokumen($no_kontrak,$no_aju)
    {
        $page = 'dashboard';
        $dok = dokumen262::where('id_no_kontrak',$no_kontrak)->where('no_aju',$no_aju)->first();
        $data_pemasukan =Bc262::where('id_no_kontrak',$no_kontrak)->where('no_aju',$no_aju)->where('qty','!=',null)->get();
        $barang_jadi =BarangJadi::where('id_no_kontrak',$no_kontrak)->get();
        $pemasukan_aju= (new  subkon)->pemasukan_aju($data_pemasukan,$barang_jadi);
        $no_aju=collect($pemasukan_aju)->first();
        
        return view('MatDoc.subkon.partials.rekapitulasi.info_partial262', compact('page','dok','pemasukan_aju','no_aju'));
    }

    public function edit($no_kontrak,$no_aju) 
	{
        $page = 'dashboard';
        $collect_aju = Bc262::where('id_no_kontrak',$no_kontrak)->where('no_aju',$no_aju)->first();
        $pemasukan_aju = Bc262::where('id_no_kontrak',$no_kontrak)->where('no_aju',$no_aju)->get();

        $BarangJadi =pj_kk::where('no_kontrak',$no_kontrak)->with('Barang_Jadi')->get();
        $barang_jadi=$BarangJadi->flatMap->Barang_Jadi;
        $pemasukan=pj_kk::where('no_kontrak',$no_kontrak)->with('pemasukan')->get();
        $data_pemasukan=$pemasukan->flatMap->pemasukan;
        $data_barangjadi= (new  subkon)->data_pemasukan($barang_jadi,$data_pemasukan);

        $record= (new  subkon)->update_partial262($data_barangjadi,$pemasukan_aju);
        $dok = dokumen262::where('id_no_kontrak',$no_kontrak)->where('no_aju',$no_aju)->first();
        
        return view('MatDoc.subkon.partials.monitoring.edit-pj262', compact('page','collect_aju','record','dok'));
    }
    public function update(Request $request)
    {   
        $no_kontrak=$request->no_kontrak;
        $qty=$request->qty;
        $id=$request->id;
        foreach ($qty as $key1 => $value1) {
            foreach ($id as $key2 => $value2) {
                    if($key1==$key2){
                    $data1=[
                        'id'=>$value2,
                        'no_aju'=>$request->no_aju,
                        'dok_aju'=>$request->dok_aju,
                        'no_daftar'=>$request->no_daftar,
                        'tanggal'=>$request->tanggal,
                        'bm'=>$request->bm,
                        'ppn'=>$request->ppn,
                        'pph'=>$request->pph,
                        'total_jaminan'=>$request->total_jaminan,
                        'qty'=>$value1,
                    ];
                    Bc262::whereid($value2)->update($data1);
                    } 
            }
        }
        $dok = dokumen262::where('id',$request->id_dok)->first();
        $record= (new  uploadFile)->updateFile($request,$dok);
            dokumen262::whereid($dok->id)->update($record);
        return redirect()->route('subkon.rekapitulasi',$no_kontrak)->with('success', 'user is successfully saved');

        }
    public function insert_return(Request $request)
    {
        $no_kontrak=$request->no_kontrak;
        $material = material::where('id_no_kontrak',$no_kontrak)->where('item_number',$request->kode_barang)->first();
        $barang_jadi=BarangJadi::where('id_no_kontrak',$no_kontrak)->first();
        $data=[
            'id_no_kontrak'=>$no_kontrak,
            'kode_barang'=>$request->kode_barang,
            'nama_barang'=>$material->deskripsi,
            'satuan'=>$request->satuan,
            'qty'=>$request->qty,
            'placing'=>$barang_jadi->placing,
            'request_release'=>$barang_jadi->request_release,
            'retur'=>"return",
        ];
        BarangJadi::create($data);
        return redirect()->route('subkon.monitoring',$no_kontrak)->with('success', 'user is successfully saved');
       
    }

    public function editBarangjadi($id)
    {
        // dd($id);
        $data=BarangJadi::findOrFail($id);
        // dd($data);
        $page = 'dashboard';
        return view('MatDoc.subkon.partials.monitoring.edit_BarangJadi', compact('page','data'));
    }

    public function updateBarangjadi(Request $request)
    {
        $no_kontrak=$request->id_no_kontrak;
        $data=[
            'nama_barang'   =>$request->nama_barang,
            'kode_barang'   =>$request->kode_barang,
            'satuan'        =>$request->satuan,
            'qty'           =>$request->qty,
        ];
        BarangJadi::whereid($request->id)->update($data);
        return redirect()->route('subkon.monitoring',$no_kontrak);
    }
    public function deleteBarangjadi($id)
    {
        $data=BarangJadi::findOrFail($id);
        $no_kontrak=$data->id_no_kontrak;
        $data_Bc262 = Bc262::where('id_no_kontrak',$data->id_no_kontrak)->where('id_barangjadi',$data->id);
        $Bc262 = Bc262::where('id_no_kontrak',$data->id_no_kontrak)->where('id_barangjadi',$data->id)->get();
        $kontrak_Bc262 = Bc262::where('id_no_kontrak',$data->id_no_kontrak)->get();

        foreach ($Bc262 as $key => $value) {
            $check=$kontrak_Bc262->where('id_no_kontrak',$value->id_no_kontrak)->where('no_aju',$value->no_aju)->count();
            if($check=='1'){
                $dok=dokumen262::where('id_no_kontrak',$value->id_no_kontrak)->where('no_aju',$value->no_aju);
                $dok->delete();
            }
        }
        $data->delete();
        $data_Bc262->delete();
        return redirect()->route('subkon.monitoring',$no_kontrak);
    }
    public function excel_tpb262(Request $request)
    {
        $no_kontrak=$request->no_kontrak;
        $no_aju=$request->no_aju;
        $page = 'dashboard';
        $dok = dokumen262::where('id_no_kontrak',$no_kontrak)->where('no_aju',$no_aju)->first();
        $data_pemasukan =Bc262::where('id_no_kontrak',$no_kontrak)->where('no_aju',$no_aju)->where('qty','!=',null)->get();
        $barang_jadi =BarangJadi::where('id_no_kontrak',$no_kontrak)->get();
        $pemasukan_aju= (new  subkon)->pemasukan_aju($data_pemasukan,$barang_jadi);
        $data_return= (new  subkon)->data_return($pemasukan_aju,$request);
        $data= (new  subkon)->tpb262($data_return,$request);

        $aju=collect($pemasukan_aju)->first();
        $tanggal=date('dmY', strtotime($aju['tanggal']));
        return Excel::download(new UploadTpb262Export($data),'BC 262 ' .$no_kontrak.' '.$tanggal.' '.$no_aju.'.xlsx');
        
    }
}
