<?php

namespace App\Http\Controllers\MatDoc\Subkon;

use DB;
use Image;
use Auth;
use DataTables;
use App\Branch;
use App\ItemNumber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\MaterialImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Mat_Doc\Subkon\pj_kk;
use App\Models\Mat_Doc\Subkon\BarangJadi;
use App\Models\Mat_Doc\Subkon\Bc261;
use App\Models\Mat_Doc\Subkon\Bc262;
use App\Models\Mat_Doc\Subkon\dokumen262;
use App\Services\MatDok\Subkon\subkon;
use App\Services\MatDok\Subkon\uploadFile;
use App\Models\Mat_Doc\Subkon\pengeluaran;
use App\Exports\UploadTpb262Export;
use App\Models\Mat_Doc\Subkon\material;
use App\Services\MatDok\Subkon\Partial_supplier;




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
            $id_no_aju=(new Partial_supplier)->id_no_aju();
            $insert_262=(new subkon)-> store_bc262($request,$id_no_aju);
            $dokumen= (new  Partial_supplier)->insertFile($request,$no_kontrak,$id_no_aju);
            dokumen262::create($dokumen);
            return redirect()->route('subkon.monitoring',$no_kontrak)->with('success', 'user is successfully saved');
        }
    }
    public function show_dokumen($no_kontrak,$id_no_aju)
    {
        $page = 'dashboard';
        $dok = dokumen262::where('id_no_kontrak',$no_kontrak)->where('id_no_aju',$id_no_aju)->first();
        $data_pemasukan =Bc262::where('id_no_kontrak',$no_kontrak)->where('id_no_aju',$id_no_aju)->where('qty','!=',null)->get();
        $sj_groupBySj=$data_pemasukan->groupBy('id_sj');

        $barang_jadi =BarangJadi::where('id_no_kontrak',$no_kontrak)->get();
        $pemasukan_aju= (new  subkon)->pemasukan_aju($data_pemasukan,$barang_jadi);
        $pemasukan_receive=collect($pemasukan_aju)->groupby('kode_barang');
        $no_aju=collect($pemasukan_aju)->first();
        
        return view('MatDoc.subkon.partials.rekapitulasi.info_partial262', compact('page','dok','pemasukan_receive','no_aju','sj_groupBySj'));
    }

    public function edit($no_kontrak,$id_no_aju) 
	{
        $page = 'dashboard';
        $collect_aju = Bc262::where('id_no_kontrak',$no_kontrak)->where('id_no_aju',$id_no_aju)->first();
        $pemasukan_aju = Bc262::where('id_no_kontrak',$no_kontrak)->where('id_no_aju',$id_no_aju)->where('qty','!=',null)->get();
        $sj_groupBySj=$pemasukan_aju->groupBy('id_sj');

        $BarangJadi =pj_kk::where('no_kontrak',$no_kontrak)->with('Barang_Jadi')->get();
        $barang_jadi=$BarangJadi->flatMap->Barang_Jadi;
        $pemasukan=pj_kk::where('no_kontrak',$no_kontrak)->with('pemasukan')->get();
        $data_pemasukan=$pemasukan->flatMap->pemasukan;
        $data_barangjadi= (new  subkon)->data_pemasukan($barang_jadi,$data_pemasukan);

        $record= (new  subkon)->update_partial262($data_barangjadi,$pemasukan_aju);
        $dok = dokumen262::where('id_no_kontrak',$no_kontrak)->where('id_no_aju',$id_no_aju)->first();
        $receive_pemasukan=collect($record)->groupby('id_barangjadi');
        return view('MatDoc.subkon.partials.monitoring.edit-pj262', compact('page','collect_aju','receive_pemasukan','dok','id_no_aju','sj_groupBySj'));
    }
    // public function update(Request $request)
    // {   
    //     $no_kontrak=$request->no_kontrak;
    //     $qty=$request->qty;
    //     $id=$request->id;
    //     foreach ($qty as $key1 => $value1) {
    //         foreach ($id as $key2 => $value2) {
    //                 if($key1==$key2){
    //                 $data1=[
    //                     'id'=>$value2,
    //                     'no_aju'=>$request->no_aju,
    //                     'dok_aju'=>$request->dok_aju,
    //                     'no_daftar'=>$request->no_daftar,
    //                     'tanggal'=>$request->tanggal,
    //                     'bm'=>$request->bm,
    //                     'ppn'=>$request->ppn,
    //                     'pph'=>$request->pph,
    //                     'total_jaminan'=>$request->total_jaminan,
    //                     'qty'=>$value1,
    //                 ];
    //                 Bc262::whereid($value2)->update($data1);
    //                 } 
    //         }
    //     }
    //     $dok = dokumen262::where('id',$request->id_dok)->first();
    //     $record= (new  uploadFile)->updateFile($request,$dok);
    //         dokumen262::whereid($dok->id)->update($record);
    //     return redirect()->route('subkon.rekapitulasi',$no_kontrak)->with('success', 'user is successfully saved');

    // }
    public function update(Request $request)
    {   
        $no_kontrak=$request->no_kontrak;
        //update daftar ppn pph dll
        $pemasukan_receive=Bc262::where('id_no_kontrak',$no_kontrak)->where('id_no_aju',$request->id_no_aju)->get();
        foreach ($pemasukan_receive as $key => $value) {
            $data=[
                'no_aju'=>$request->no_aju,
                'dok_aju'=>$request->dok_aju,
                'no_daftar'=>$request->no_daftar,
                'tanggal'=>$request->tanggal,
                'bm'=>$request->bm,
                'ppn'=>$request->ppn,
                'pph'=>$request->pph,
                'total_jaminan'=>$request->total_jaminan,
            ];
            Bc262::whereid($value->id)->update($data);
        }
        //update file dok
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

    public function receive262(Request $request)
    {
        $get_pemasukan_sj=Bc262::where('id_no_kontrak',$request->no_kontrak)->wherein('id_sj',$request->id_sj??[])->get();
        $get_pemasukan_receive=Bc262::where('id_no_kontrak',$request->no_kontrak)->where('id_no_aju','!=',null)->get()->groupBy('kode_barang');
        $sj_groupByItem=$get_pemasukan_sj->groupBy('kode_barang');
        //no surat jalan yang akan di receive
        $sj_groupBySj=$get_pemasukan_sj->groupBy('id_sj');
        //data kontrak
        $data_kontrak = pj_kk::findOrFail($request->no_kontrak);
        // pemasukan yang akan di receive
        $pemasukan_sj=[];
        foreach ($sj_groupByItem as $key => $value) {
            $pemasukan_sj[]=[
                'item_no'=>$key,
                'id_barangjadi'=>$value->first()->id_barangjadi,
                'qty'=>$value->sum('qty'),
            ];
        }
        // pemasukan yang sudah di receive
        $pemasukan_receive=[];
        foreach ($get_pemasukan_receive as $key1 => $value1) {
            $pemasukan_receive[]=[
                'item_no'=>$key1,
                'id_barangjadi'=>$value1->first()->id_barangjadi,
                'qty'=>$value1->sum('qty'),
            ];
        }
        // item sesuai Pj
        $BarangJadi =pj_kk::where('no_kontrak',$request->no_kontrak)->with('Barang_Jadi')->get();
        $barang_jadi=$BarangJadi->flatMap->Barang_Jadi;

        // olah data yang akan di receive
        $akan_receive=[];
        foreach ($pemasukan_sj as $key => $value) {
            $receive=collect($pemasukan_receive)->where('item_no',$value['item_no'])->where('id_barangjadi',$value['id_barangjadi']);
            $pj=$barang_jadi->where('kode_barang',$value['item_no'])->where('id',$value['id_barangjadi'])->first();
            $akan_receive[]=[
                'item_no'=>$value['item_no'],
                'id_barangjadi'=>$value['id_barangjadi'],
                'deskripsi'=>$pj->nama_barang,
                'qty_receive'=>$value['qty'],
                'qty_sudah_receive'=>$receive->sum('qty'),
                'qty_kontrak'=>$pj->qty,
                'glpt'=>$pj->item_master()->first()->F4101_GLPT??'',
                'satuan'=>$pj->satuan,
                'qty_sisa'=>$pj->qty-$receive->sum('qty')-$value['qty'],

            ];
        }
        $map['sj_groupBySj']=$sj_groupBySj;
        $map['data_kontrak']=$data_kontrak;
        $map['akan_receive']=$akan_receive;
        $map['page']='dashboard';

        $rate=$this->calc_262_bm_ppn_pph($request->no_kontrak);
        $map['rate_bm']=$rate['rate_bm'];
        $map['rate_ppn']=$rate['rate_ppn'];
        $map['rate_pph']=$rate['rate_pph'];

        return view('MatDoc.subkon.partials.monitoring.create-pj262-receive', $map);

    } 
    public function insertreceive(Request $request)
    {   
        $no_kontrak=$request->no_kontrak;
        if($request->id_sj!=null){
            // auto number 
            $id_no_aju=(new Partial_supplier)->id_no_aju();
            //get pemasukan yang akan do receive sesail surat jalan yang dipilih
            $get_pemasukan_sj=Bc262::where('id_no_kontrak',$request->no_kontrak)->wherein('id_sj',$request->id_sj)->get();
            //update aju daftar dll
            foreach ($get_pemasukan_sj as $key => $value) {
                $data=[
                    'id_no_kontrak'=>$value->id_no_kontrak,
                    'id_barangjadi'=>$value->id_barangjadi,
                    'kode_barang'=>$value->kode_barang,
                    'no_aju'=>$request->no_aju,
                    'dok_aju'=>$request->dok_aju,
                    'no_daftar'=>$request->no_daftar,
                    'tanggal'=>$request->tanggal,
                    'bm'=>$request->bm,
                    'ppn'=>$request->ppn,
                    'pph'=>$request->pph,
                    'total_jaminan'=>$request->total_jaminan,
                    'id_no_aju'=>$id_no_aju,
                ];
                Bc262::whereid($value->id)->update($data);

            }
            // update file dokumen pemasukan
            $dokumen= (new  Partial_supplier)->insertFile($request,$no_kontrak,$id_no_aju);
            dokumen262::create($dokumen);
        }
        return redirect()->route('subkon.monitoring',$no_kontrak);
    }
    public function delete($no_kontrak,$id_no_aju)
    {
        $partial_aju = Bc262::where('id_no_kontrak',$no_kontrak)->where('id_no_aju',$id_no_aju)->delete();
        $dok = dokumen262::where('id_no_kontrak',$no_kontrak)->where('id_no_aju',$id_no_aju)->delete();

        return back();

    }

    public function calc_262_bm_ppn_pph($kontrak) {
        $total_garment_sisa_kontrak=$this->get_qty_barang_jadi_masuk($kontrak);

        $total_261_bm=$this->get_261_bm_ppn_pph($kontrak,'bm');
        $total_261_ppn=$this->get_261_bm_ppn_pph($kontrak,'ppn');
        $total_261_pph=$this->get_261_bm_ppn_pph($kontrak,'pph');
        $total_261_nilai=$total_261_bm+$total_261_ppn+$total_261_pph;

        $total_262_bm=$this->get_262_bm_ppn_pph($kontrak,'bm');
        $total_262_ppn=$this->get_262_bm_ppn_pph($kontrak,'ppn');
        $total_262_pph=$this->get_262_bm_ppn_pph($kontrak,'pph');
        $total_262_nilai=$total_262_bm+$total_262_ppn+$total_262_pph;

        $selisih_bm=$total_261_bm-$total_262_bm;
        $selisih_ppn=$total_261_ppn-$total_262_ppn;
        $selisih_pph=$total_261_pph-$total_262_pph;

        $map['rate_bm']=$selisih_bm/$total_garment_sisa_kontrak;
        $map['rate_ppn']=$selisih_ppn/$total_garment_sisa_kontrak;
        $map['rate_pph']=$selisih_pph/$total_garment_sisa_kontrak;

        return $map;
    }
    public function get_261_bm_ppn_pph($kontrak, $kolom) {
        $dt=Bc261::where('id_no_kontrak',$kontrak)->groupBy('no_daftar')->get();
        $bm=0;
        $ppn=0;
        $pph=0;
        foreach ($dt as $v) {
            $bm+=$v->bm;
            $ppn+=$v->ppn;
            $pph+=$v->pph;
        }
        if (strtolower($kolom)=='bm') {
            return $bm;
        }
        if (strtolower($kolom)=='ppn') {
            return $ppn;
        }
        if (strtolower($kolom)=='pph') {
            return $pph;
        }
        return 0;
    }
    public function get_262_bm_ppn_pph($kontrak, $kolom) {
        $dt=Bc262::where('id_no_kontrak',$kontrak)->groupBy('no_daftar')->get();
        $bm=0;
        $ppn=0;
        $pph=0;
        foreach ($dt as $v) {
            $bm+=$v->bm;
            $ppn+=$v->ppn;
            $pph+=$v->pph;
        }
        if (strtolower($kolom)=='bm') {
            return $bm;
        }
        if (strtolower($kolom)=='ppn') {
            return $ppn;
        }
        if (strtolower($kolom)=='pph') {
            return $pph;
        }
        return 0;
    }
    public function get_qty_barang_jadi_masuk($kontrak) {
        $dt=Bc262::where('id_no_kontrak',$kontrak)->where('qty','<>',null)->get();
        $qty=0;
        foreach ($dt as $v) {
            $cek=ItemNumber::where('F4101_ITM',$v->kode_barang)->first();
            if ($cek) {
                if (in_array($cek->F4101_GLPT,['INMK','INGA'])) {
                    $qty+=$v->qty;
                }
            }
        }
        return $qty;
    }
}
