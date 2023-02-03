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
use App\Models\Mat_Doc\Subkon\material;
use App\Models\Mat_Doc\Subkon\pj_kk;
use App\Models\Mat_Doc\Subkon\BarangJadi;
use App\Models\Mat_Doc\Subkon\Bc261;
use App\Models\Mat_Doc\Subkon\dokumen261;
use App\Services\MatDok\Subkon\subkon;
use App\Services\MatDok\Subkon\uploadFile;
use  App\Models\Mat_Doc\Subkon\pengeluaran;
use App\Exports\UploadTpb261Export;
use App\Exports\PerhitunganJaminanExport;
use App\Exports\SubkonMonitoring261Export;
use App\Models\Mat_Doc\Subkon\Aju261;
use App\Services\IT_DT\sinkron;





class Bc261Controller extends Controller
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

    public function create(Request $request) 
	{ 
        $no_aju=$request->no_aju;
        $no_kontrak=$request->no_kontrak;
        $kontrak=explode("-" , $request->no_kontrak);
        $coba = array_slice( $kontrak,0,1);
        $no_kontrak_tanpaBranch=$coba[0];
        $tgl_taransaksi=$request->tanggal_transaksi;
        $input_bpb=explode("-" , $request->bpb);
        $bpb = array_map(function ($value) {
            return preg_replace("/[^0-9]/", "", $value);
            // return (int) $value;
        }, $input_bpb);
        
        $kontrak=pj_kk::findOrFail($no_kontrak);
        $page = 'dashboard';
        
        if(Bc261::where('id_no_kontrak', $no_kontrak)->where('no_aju',$no_aju)->count()){
            $tipe_partial='update';
            $cekBpb=Aju261::where('id_no_kontrak', $no_kontrak)->where('no_aju',$no_aju)->get()->toArray();
            $SudahPartial=array_map(function ($value){
                return ($value['bpb']);
            },$cekBpb);
            $bpbBelumPartial=[];
            $bpbBlok1=[];
            foreach ($bpb as $key => $value) {
                if(Aju261::where('id_no_kontrak', $no_kontrak)->where('no_aju',$no_aju)->where('tgl_transaksi',$tgl_taransaksi)->where('bpb',$value)->count()){
                    $bpbBlok1[]=$value;
                }
                else{
                    $bpbBelumPartial[]=$value;
                }
            }
            // dd($bpbBelumPartial);
            $cekPartial=Bc261::where('id_no_kontrak', $no_kontrak)->where('no_aju',$no_aju)->first();
            $bpbBaru=(array_merge( $SudahPartial,$bpbBelumPartial));
            $no_bpb=implode("-" , $bpbBaru);
            $bpbSudahPartial=implode("-" , $SudahPartial);
            $bpbAkanPartial=implode("-" , $bpbBelumPartial);
            $bpbBlok=implode("-" , $bpbBlok1);
           
            $pengeluaran_jde=pengeluaran::where('F564111H_DSC2',$no_kontrak_tanpaBranch)->where('F564111H_MCU','like','%'.$kontrak->branch)->where('F564111H_TRDJ',$tgl_taransaksi)->whereIn('F564111H_DOC1',$bpbBelumPartial)->get();
            // dd($pengeluaran_jde);
            
            if($pengeluaran_jde->count()>0){
                $tanggal=collect($pengeluaran_jde)->first()->F564111H_DGL;
            }
            else{
                $tanggal='';
                if($bpbBlok==""){
                    $bpbBlok='A';
                }
            }
            $data_JDE= (new  uploadFile)->Pengeluaran_JDE($pengeluaran_jde);
            $material =pj_kk::where('no_kontrak',$no_kontrak)->with('Material')->get();
            $partial =pj_kk::where('no_kontrak',$no_kontrak)->with('partial')->get();
            $data_partial=(new subkon)->data_partial($partial);
            $material_all= (new  subkon)->data_material($material,$data_partial);
            $data_material= (new  uploadFile)->create_partial($material_all,$data_JDE);
            $dok = dokumen261::where('id_no_kontrak',$no_kontrak)->where('no_aju',$no_aju)->first();
            
        }
        else{
            $bpbAkanPartial=implode("-" , $bpb);
            $bpbSudahPartial=null;
            $cekPartial=null;
            $tipe_partial='create';
            $dok=null;
            $bpbBlok=null;
            $no_bpb=implode("-" , $bpb);
            $pengeluaran_jde=pengeluaran::where('F564111H_DSC2',$no_kontrak_tanpaBranch)->where('F564111H_MCU','like','%'.$kontrak->branch)->whereIn('F564111H_DOC1',$bpb)->where('F564111H_TRDJ',$tgl_taransaksi)->get();

            if($pengeluaran_jde->count()>0){
                $tanggal=collect($pengeluaran_jde)->first()->F564111H_DGL;
            }
            else{
                $tanggal='';
                $bpbBlok='A';
            }

            $data_JDE= (new  uploadFile)->Pengeluaran_JDE($pengeluaran_jde);
            $material =pj_kk::where('no_kontrak',$no_kontrak)->with('Material')->get();
            $partial =pj_kk::where('no_kontrak',$no_kontrak)->with('partial')->get();
            $data_partial=(new subkon)->data_partial($partial);
            $material_all= (new  subkon)->data_material($material,$data_partial);
            $data_material= (new  uploadFile)->create_partial($material_all,$data_JDE);
        }
        // dd(collect($data_material)->sum('tersisa'));
        return view('MatDoc.subkon.partials.monitoring.create-pj261', compact('page','data_material','no_kontrak','data_JDE','tanggal','no_bpb','bpbBlok','dok','tipe_partial','no_aju','cekPartial','bpbSudahPartial','bpbAkanPartial'));
        
    }
    
    public function insert(Request $request)
    {   
        $no_kontrak=$request->no_kontrak;
        $id=$request->id_material;
        $gl_class=$request->gl_class??[];
        $hanca=$request->hanca??[];
        // update item master infa
        foreach ($id as $key5 => $value5) {
            $chekInfa =in_array($value5, $gl_class);
            if($chekInfa==true){
                $vgl_class='INFA';
            }else{
                $vgl_class=null;
            }
            $update=[
                'gl_class'=>$vgl_class,
            ];
            material::whereid($value5)->update($update);
        }
        // update item master hanca
        foreach ($id as $key6 => $value6) {
            $chekInfa =in_array($value6, $hanca);
            if($chekInfa==true){
                $vhanca='HANCA';
            }else{
                $vhanca=null;
            }
            $update1=[
                'hanca'=>$vhanca,
            ];
            material::whereid($value6)->update($update1);
        }
        if( $request->tipe_partial=='update'){
            $data_partial=Bc261::where('id_no_kontrak',$no_kontrak)->where('no_aju',$request->no_aju)->get();
            //update total_jaminan
            foreach($data_partial as $key =>$value3){
                $update_pertama=[
                    'no_aju'=>$request->no_aju,
                    'dok_aju'=>$request->dok_aju,
                    'no_daftar'=>$request->no_daftar,
                    'tanggal'=>$request->tanggal,
                    'bm'=>$request->bm,
                    'ppn'=>$request->ppn,
                    'pph'=>$request->pph,
                    'total_jaminan'=>$request->total_jaminan,
                    // 'bpb'=>$request->no_bpb,
                ];
                Bc261::whereid($value3->id)->update($update_pertama);
            }
            foreach ($id as $key => $value) {
                //update qty pengeluran
                if(Bc261::where('id_material',$request->id_material[$key])->where('id_no_kontrak',$no_kontrak)->where('no_aju',$request->no_aju)->count()){
                    $partial=Bc261::where('id_material',$request->id_material[$key])->where('id_no_kontrak',$no_kontrak)->where('no_aju',$request->no_aju)->first();
                    $update261=[
                        'id_no_kontrak'=>$no_kontrak,
                        'id_material'=>$request->id_material[$key],
                        'item_number'=>$request->item_number[$key],
                        'no_aju'=>$request->no_aju,
                        'dok_aju'=>$request->dok_aju,
                        'no_daftar'=>$request->no_daftar,
                        'tanggal'=>$request->tanggal,
                        'bm'=>$request->bm,
                        'ppn'=>$request->ppn,
                        'pph'=>$request->pph,
                        'total_jaminan'=>$request->total_jaminan,
                        'qty'=>$request->qty[$key]+$partial->qty,
                        'gl_class'=>$request->gl_class_jde[$key],
                    ];
                    Bc261::whereid($partial->id)->update($update261);
                }
                //input qty pengeluran
                else{
                    $input=[
                        'id_no_kontrak'=>$no_kontrak,
                        'id_material'=>$request->id_material[$key],
                        'item_number'=>$request->item_number[$key],
                        'no_aju'=>$request->no_aju,
                        'dok_aju'=>$request->dok_aju,
                        'no_daftar'=>$request->no_daftar,
                        'tanggal'=>$request->tanggal,
                        'bm'=>$request->bm,
                        'ppn'=>$request->ppn,
                        'pph'=>$request->pph,
                        'total_jaminan'=>$request->total_jaminan,
                        'qty'=>$request->qty[$key],
                        'gl_class'=>$request->gl_class_jde[$key],
                    ];
                    Bc261::create($input);
                }
            }
            $dok = dokumen261::where('id_no_kontrak',$no_kontrak)->where('no_aju',$request->no_aju)->first();
            $record= (new  uploadFile)->updateFile($request,$dok);
            dokumen261::whereid($dok->id)->update($record);
        }
        elseif( $request->tipe_partial=='create'){
            foreach ($id as $k => $v) {
                $input=[
                    'id_no_kontrak'=>$no_kontrak,
                    'id_material'=>$request->id_material[$k],
                    'item_number'=>$request->item_number[$k],
                    'no_aju'=>$request->no_aju,
                    'dok_aju'=>$request->dok_aju,
                    'no_daftar'=>$request->no_daftar,
                    'tanggal'=>$request->tanggal,
                    'bm'=>$request->bm,
                    'ppn'=>$request->ppn,
                    'pph'=>$request->pph,
                    'total_jaminan'=>$request->total_jaminan,
                    'qty'=>$request->qty[$k],
                    'gl_class'=>$request->gl_class_jde[$k],
                ];
                Bc261::create($input);
            }
            $dokumen= (new  uploadFile)->insertFile261($request,$no_kontrak);
            dokumen261::create($dokumen);
        }

        $input_bpb=explode("-" , $request->no_bpb);
        $noaju261=[];
        foreach ($input_bpb as $key => $value) {
            $noaju261=[
                'id_no_kontrak'=>$request->no_kontrak,
                'no_aju'=>$request->no_aju,
                'bpb'=>$value,
                'tgl_transaksi'=>$request->tanggal,
            ];
            Aju261::create($noaju261);
        }
        return redirect()->route('subkon.monitoring',$no_kontrak)->with('success', 'user is successfully saved');

    }
    public function show_dokumen($no_kontrak,$no_daftar)
    {
        $page = 'dashboard';
        $dok = dokumen261::where('id_no_kontrak',$no_kontrak)->where('no_daftar',$no_daftar)->first();
        $data_patrial =Bc261::where('id_no_kontrak',$no_kontrak)->where('no_daftar',$no_daftar)->where('qty','!=',null)->get();
        $data_material =material::where('id_no_kontrak',$no_kontrak)->get();
        $patrial_aju= (new  subkon)->partial_aju($data_patrial,$data_material);
        $no_aju=collect($patrial_aju)->first();
        // dd($a);

        // dd($no_aju);
        return view('MatDoc.subkon.partials.rekapitulasi.info_partial261', compact('page','dok','patrial_aju','no_aju'));
    }

    public function edit($no_kontrak,$no_daftar) 
	{
        $page = 'dashboard';

        $explode_kontrak=explode("-" , $no_kontrak);
        $coba = array_slice( $explode_kontrak,0,1);
        $no_kontrak_tanpaBranch=$coba[0];
        // dd($no_kontrak_tanpaBranch);

        $no_bpb=Aju261::where('id_no_kontrak',$no_kontrak)->where('no_daftar',$no_daftar)->get()->toArray();
        $bbp_array=array_column($no_bpb,'bpb');
        $list_bpb=implode(' ',array_unique($bbp_array));

        $kontrak=pj_kk::findOrFail($no_kontrak);
        $collect_aju = Bc261::where('id_no_kontrak',$no_kontrak)->where('no_daftar',$no_daftar)->first();
        $partial_aju = Bc261::where('id_no_kontrak',$no_kontrak)->where('no_daftar',$no_daftar)->get();
        $pengeluaran_jde=pengeluaran::where('F564111H_DSC2',$no_kontrak_tanpaBranch)->where('F564111H_MCU','like','%'.$kontrak->branch)->get();
        $data_JDE= (new  uploadFile)->Pengeluaran_JDE($pengeluaran_jde);
        $material =pj_kk::where('no_kontrak',$no_kontrak)->with('Material')->get();
        $partial =pj_kk::where('no_kontrak',$no_kontrak)->with('partial')->get();
        $data_partial=$partial->flatMap->partial;
        $data_material= (new  subkon)->data_material($material,$data_partial);
        $record= (new  subkon)->update_partial261($data_material,$partial_aju,$data_JDE);
        // dd( $record);
        $dok = dokumen261::where('id_no_kontrak',$no_kontrak)->where('no_daftar',$no_daftar)->first();
        
        return view('MatDoc.subkon.partials.monitoring.edit-pj261', compact('page','collect_aju','record','dok','list_bpb'));
    }
    public function update(Request $request)
    {   
        // if( Bc262::where('id_no_kontrak', $no_kontrak)->where('no_aju',$request->no_aju)->count()){
        //     return redirect()->route('subkon.monitoring',$no_kontrak)->with('error', 'No Aju Sudah Terdaftar');
        // }
        $no_kontrak=$request->no_kontrak;
        $id_material=$request->id_material;
        $gl_class=$request->gl_class??[];
        $hanca=$request->hanca??[];
        $id_partial=$request->id;

        // update item master infa
        foreach ($id_material as $key5 => $value5) {
            $chekInfa =in_array($value5, $gl_class);
            if($chekInfa==true){
                $vgl_class='INFA';
            }else{
                $vgl_class=null;
            }
            $update=[
                'gl_class'=>$vgl_class,
            ];
            material::whereid($value5)->update($update);
        }
        // update item master hanca
        foreach ($id_material as $key6 => $value6) {
            $chekInfa =in_array($value6, $hanca);
            if($chekInfa==true){
                $vhanca='HANCA';
            }else{
                $vhanca=null;
            }
            $update1=[
                'hanca'=>$vhanca,
            ];
            material::whereid($value6)->update($update1);
        }
        // update partial
        foreach ($id_partial as $key => $value) {
            $data1=[
                'no_aju'=>$request->no_aju,
                'dok_aju'=>$request->dok_aju,
                'no_daftar'=>$request->no_daftar,
                'tanggal'=>$request->tanggal,
                'bm'=>$request->bm,
                'ppn'=>$request->ppn,
                'pph'=>$request->pph,
                'total_jaminan'=>$request->total_jaminan,
                'qty'=>$request->qty[$key],
            ];
            Bc261::whereid($value)->update($data1);
        }
        // update dok partial
        $dok = dokumen261::where('id',$request->id_dok)->first();
        $record= (new  uploadFile)->updateFile261($request,$dok);
        dokumen261::whereid($dok->id)->update($record);
        return redirect()->route('subkon.rekapitulasi',$no_kontrak)->with('success', 'user is successfully saved');

    }
    public function delete($no_kontrak,$no_daftar)
    {
        $partial_aju = Bc261::where('id_no_kontrak',$no_kontrak)->where('no_daftar',$no_daftar)->delete();
        $dok = dokumen261::where('id_no_kontrak',$no_kontrak)->where('no_daftar',$no_daftar)->delete();
        $no_bpb=Aju261::where('id_no_kontrak',$no_kontrak)->where('no_daftar',$no_daftar)->delete();

        return back();

    }
    public function store_TambahMaterial(Request $request)
    {
        $no_kontrak=$request->no_kontrak;
        
        
            $material=[
                'id_no_kontrak'=>$no_kontrak,
                'hs_code'=>$request->hs_code,
                'item_number'=>$request->item_number,
                'deskripsi'=>$request->deskripsi,
                'kebutuhan'=>$request->kebutuhan,
                'satuan'=>$request->satuan,
                'consumption'=>$request->consumption,
                'nw'=>$request->nw,
                'gw'=>$request->gw,
                'doc_type'=>$request->doc_type,
                'bc_number'=>$request->bc_number,
                'doc_date'=>$request->doc_date,
                'pos'=>$request->pos,
                'us_price'=>$request->us_price,
                'idr_price'=>$request->idr_price,
                'us'=>$request->us,
                'idr'=>$request->idr,
                'persen'=>$request->persen,
                'bm'=>$request->bm,
                'bpt'=>$request->bpt,
                'btm'=>$request->btm,
                'ppn'=>$request->ppn,
                'pph'=>$request->pph,
                'total'=>$request->total,
                ];
                // dd($material);
                material::create($material);

            $data_kontrak=pj_kk::findOrFail($no_kontrak);
                $input=[
                    'nilai_jaminan'=>$data_kontrak->nilai_jaminan+$request->total
                ];
            pj_kk::whereNoKontrak($no_kontrak)->update($input);

        return redirect()->route('subkon.monitoring',$no_kontrak)->with('success', 'user is successfully saved');
        
    }
    public function editMaterial($id)
    {
        // dd($id);
        $data=material::findOrFail($id);
        // dd($data);
        $page = 'dashboard';
        return view('MatDoc.subkon.partials.monitoring.edit_material', compact('page','data'));
    }

    public function updateMaterial(Request $request)
    {
        $no_kontrak=$request->id_no_kontrak;
        $data=[
            'hs_code'=>$request->hs_code,
            'item_number'=>$request->item_number,
            'deskripsi'=>$request->deskripsi,
            'kebutuhan'=>$request->kebutuhan,
            'satuan'=>$request->satuan,
            'consumption'=>$request->consumption,
            'nw'=>$request->nw,
            'gw'=>$request->gw,
            'doc_type'=>$request->doc_type,
            'bc_number'=>$request->bc_number,
            'doc_date'=>$request->doc_date,
            'pos'=>$request->pos,
            'us_price'=>$request->us_price,
            'idr_price'=>$request->idr_price,
            'us'=>$request->us,
            'idr'=>$request->idr,
            'persen'=>$request->persen,
            'bm'=>$request->bm,
            'bpt'=>$request->bpt,
            'btm'=>$request->btm,
            'ppn'=>$request->ppn,
            'pph'=>$request->pph,
            'total'=>$request->total,
        ];
        material::whereid($request->id)->update($data);

        $data_kontrak=pj_kk::findOrFail($no_kontrak);
            $input=[
                'nilai_jaminan'=>$data_kontrak->nilai_jaminan+$request->total-$request->total_sebelumnya
            ];
        pj_kk::whereNoKontrak($no_kontrak)->update($input);
        return redirect()->route('subkon.monitoring',$no_kontrak);
    }
    public function deleteMaterial($id)
    {
        $data=material::findOrFail($id);
        $no_kontrak=$data->id_no_kontrak;
        $data_kontrak=pj_kk::findOrFail($no_kontrak);
        $input=[
            'nilai_jaminan'=>$data_kontrak->nilai_jaminan-$data->total
        ];
        pj_kk::whereNoKontrak($no_kontrak)->update($input);

        $data_Bc261 = Bc261::where('id_no_kontrak',$data->id_no_kontrak)->where('id_material',$data->id);
        $Bc261 = Bc261::where('id_no_kontrak',$data->id_no_kontrak)->where('id_material',$data->id)->get();
        $kontrak_Bc261 = Bc261::where('id_no_kontrak',$data->id_no_kontrak)->get();

        foreach ($Bc261 as $key => $value) {
            $check=$kontrak_Bc261->where('id_no_kontrak',$value->id_no_kontrak)->where('no_aju',$value->no_aju)->count();
            //jika material sudah di patrial & satu-satunya material di patrila aju tersebut makan dok patrial aju di hapus 
            if($check=='1'){
                $dok=dokumen261::where('id_no_kontrak',$value->id_no_kontrak)->where('no_aju',$value->no_aju);
                $dok->delete();
            }
        }
        //delete data material
        $data->delete();
        //delete data partial
        $data_Bc261->delete();
        return redirect()->route('subkon.monitoring',$no_kontrak);
    }
    public function excel_tpb261($no_kontrak,$no_daftar)
    {
        $page = 'dashboard';
        $data_patrial =Bc261::where('id_no_kontrak',$no_kontrak)->where('no_daftar',$no_daftar)->where('qty','!=',null)->get();
        $data_material =material::where('id_no_kontrak',$no_kontrak)->get();
        $patrial_aju= (new  subkon)->partial_aju($data_patrial,$data_material);
        $kontrak =pj_kk::findOrFail($no_kontrak);
        $data= (new  subkon)->tpb261($patrial_aju,$kontrak);
        $aju=collect($patrial_aju)->first();
        $tanggal=date('dmY', strtotime($aju['tanggal']));

        return Excel::download(new UploadTpb261Export($data),'BC 261 ' .$no_kontrak.' '.$tanggal.' '.$no_daftar.'.xlsx');
       
    }

    public function Perhitungan_Jaminan($no_kontrak)
    {
        $kontrak=pj_kk::findOrFail($no_kontrak);
        $jaminan= (new  subkon)->PerhitunganJaminan($kontrak);
        $total_jaminan=[
            'idr'=>collect($jaminan)->where('idr','>','0')->sum('idr'),
            'bm'=>collect($jaminan)->where('bm','>','0')->sum('bm'),
            'bpt'=>collect($jaminan)->where('bpt','>','0')->sum('bpt'),
            'btm'=>collect($jaminan)->where('btm','>','0')->sum('btm'),
            'ppn'=>collect($jaminan)->where('ppn','>','0')->sum('ppn'),
            'pph'=>collect($jaminan)->where('pph','>','0')->sum('pph'),
            'total'=>collect($jaminan)->where('total','>','0')->sum('total'),
        ];
        // $total_jaminan_pembulatan= (new  subkon)->pembulatan_uang($uang);
        // $material =pj_kk::where('no_kontrak',$no_kontrak)->with('Material')->get();
        // $data_pengeluaran=$pengeluaran261->flatMap->partial;
        // $data_material=$pengeluaran261->flatMap->Material;

        

        return Excel::download(new PerhitunganJaminanExport($kontrak,$jaminan,$total_jaminan),'PJ KK'.$no_kontrak.'.xlsx');

    }

    public function sinkron_jde(Request $request)
    {
        $kontrak_dari_form=$request->no_kontrak;
        $insertSinkron=(new  sinkron)->bc261($kontrak_dari_form);
        return back()->withInput();
    }
    public function Monitoring261Excel($no_kontrak)
    {
        $data_kontrak = pj_kk::findOrFail($no_kontrak);
        $hari=date('l');
        $tanggal=date('d F Y');
        $material =pj_kk::where('no_kontrak',$no_kontrak)->with('Material')->get();
        $partial =pj_kk::where('no_kontrak',$no_kontrak)->with('partial')->get();
        $pemasukan =pj_kk::where('no_kontrak',$no_kontrak)->with('pemasukan')->get();
        $data_partial=(new subkon)->data_partial($partial);
        $material_all= (new  subkon)->data_material($material,$data_partial);
        $data_material= (new  subkon)->pemasukan_pengeluaran($material_all,$pemasukan);
        $partial_group= (new  subkon)->partial_group($data_partial);
        $item_pjkk=$material->flatMap->material;
     
        return Excel::download(new SubkonMonitoring261Export($data_kontrak,$partial_group,$data_material,$data_partial),'Monitoring_261 '.$no_kontrak.'.xlsx');
    
    }

}