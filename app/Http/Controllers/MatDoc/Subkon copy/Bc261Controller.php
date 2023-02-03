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
use App\Models\Mat_Doc\Subkon\Aju261;





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
        // dd($request->all());
        //             $pengeluaran_jde=pengeluaran::where('F564111H_DSC2',$no_kontrak)->where('F564111H_MCU', $kontrak->branch)->where('F564111H_TRDJ',$tgl_taransaksi)->whereIn('F564111H_DOC1',$bpb)->get();
// dd($pengeluaran_jde);
        $no_aju=$request->no_aju;
        $no_kontrak=$request->no_kontrak;
        $tgl_taransaksi=$request->tanggal_transaksi;
        // dd($tgl_taransaksi);
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
           
            $pengeluaran_jde=pengeluaran::where('F564111H_DSC2',$no_kontrak)->where('F564111H_MCU', $kontrak->branch)->where('F564111H_TRDJ',$tgl_taransaksi)->whereIn('F564111H_DOC1',$bpbBelumPartial)->get();
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
            $pengeluaran_jde=pengeluaran::where('F564111H_DSC2',$no_kontrak)->where('F564111H_MCU', $kontrak->branch)->whereIn('F564111H_DOC1',$bpb)->where('F564111H_TRDJ',$tgl_taransaksi)->get();

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
        return view('MatDoc.subkon.partials.monitoring.create-pj261', compact('page','data_material','no_kontrak','data_JDE','tanggal','no_bpb','bpbBlok','dok','tipe_partial','no_aju','cekPartial','bpbSudahPartial','bpbAkanPartial'));
        
    }
    

    // public function create(Request $request) 
	// { 
    //     $no_aju=$request->no_aju;
    //     $no_kontrak=$request->no_kontrak;
    //     $input_bpb=explode("-" , $request->bpb);
    //     $bpb = array_map(function ($value) {
    //         return preg_replace("/[^0-9]/", "", $value);
    //         // return (int) $value;
    //     }, $input_bpb);
    //     $kontrak=pj_kk::findOrFail($no_kontrak);
    //     $page = 'dashboard';
    //     if(Bc261::where('id_no_kontrak', $no_kontrak)->where('no_aju',$no_aju)->count()){
    //         $tipe_partial='update';
    //         $cekPartial=Bc261::where('id_no_kontrak', $no_kontrak)->where('no_aju',$no_aju)->first();
    //         $bpbSudahPartial=$cekPartial->bpb;
    //         $bpbPartial=explode("-" , $cekPartial->bpb);
    //         $bpbBelumPartial=array_diff($bpb,$bpbPartial);
    //         $bpbBlok1=array_intersect($bpb,$bpbPartial);
    //         $bpbBaru=(array_merge($bpbPartial,$bpbBelumPartial));
    //         $no_bpb=implode("-" , $bpbBaru);
    //         $bpbBlok=implode("-" , $bpbBlok1);
    //         $bpbAkanPartial=implode("-" , $bpbBelumPartial);
    //         // dd($bpbBelumPartial);
    //         $pengeluaran_jde=pengeluaran::where('F564111H_DSC2',$no_kontrak)->where('F564111H_MCU', $kontrak->branch)->whereIn('F564111H_DOC1',$bpbBelumPartial)->get();

    //         if($pengeluaran_jde->count()>0){
    //             $tanggal=collect($pengeluaran_jde)->first()->F564111H_DGL;
    //         }
    //         else{
    //             $tanggal='';
    //             if($bpbBlok==""){
    //                 $bpbBlok='A';
    //             }
    //         }
    //         $data_JDE= (new  uploadFile)->Pengeluaran_JDE($pengeluaran_jde);
    //         $data_kontrak = pj_kk::findOrFail($no_kontrak);
    //         $material =pj_kk::where('no_kontrak',$no_kontrak)->with('Material')->get();
    //         $partial =pj_kk::where('no_kontrak',$no_kontrak)->with('partial')->get();
    //         $data_partial=(new subkon)->data_partial($partial);
    //         $material_all= (new  subkon)->data_material($material,$data_partial);
    //         $data_material= (new  uploadFile)->create_partial($material_all,$data_JDE);
    //         $dok = dokumen261::where('id_no_kontrak',$no_kontrak)->where('no_aju',$no_aju)->first();
            
    //     }
    //     else{
    //         $bpbAkanPartial=implode("-" , $bpb);
    //         $bpbSudahPartial=null;
    //         $cekPartial=null;
    //         $tipe_partial='create';
    //         $dok=null;
    //         $bpbBlok=null;
    //         $no_bpb=implode("-" , $bpb);
    //         $pengeluaran_jde=pengeluaran::where('F564111H_DSC2',$no_kontrak)->where('F564111H_MCU', $kontrak->branch)->whereIn('F564111H_DOC1',$bpb)->get();
    //         if($pengeluaran_jde->count()>0){
    //             $tanggal=collect($pengeluaran_jde)->first()->F564111H_DGL;
    //         }
    //         else{
    //             $tanggal='';
    //             $bpbBlok='A';
    //         }

    //         $data_JDE= (new  uploadFile)->Pengeluaran_JDE($pengeluaran_jde);
    //         $data_kontrak = pj_kk::findOrFail($no_kontrak);
    //         $material =pj_kk::where('no_kontrak',$no_kontrak)->with('Material')->get();
    //         $partial =pj_kk::where('no_kontrak',$no_kontrak)->with('partial')->get();
    //         $data_partial=(new subkon)->data_partial($partial);
    //         $material_all= (new  subkon)->data_material($material,$data_partial);
    //         $data_material= (new  uploadFile)->create_partial($material_all,$data_JDE);
    //     }
    //     return view('MatDoc.subkon.partials.monitoring.create-pj261', compact('page','data_material','no_kontrak','data_JDE','tanggal','no_bpb','bpbBlok','dok','tipe_partial','no_aju','cekPartial','bpbSudahPartial','bpbAkanPartial'));
        
    // }
    

    // public function create(Request $request) 
	// { 
    //     $no_aju=$request->no_aju;
    //     $no_kontrak=$request->no_kontrak;
    //     $bpb=explode("-" , $request->bpb);
    //     $kontrak=pj_kk::findOrFail($no_kontrak);
    //     $page = 'dashboard';
    //     if(Bc261::where('id_no_kontrak', $no_kontrak)->where('no_aju',$no_aju)->count()){
    //         $tipe_partial='update';
    //         $cekPartial=Bc261::where('id_no_kontrak', $no_kontrak)->where('no_aju',$no_aju)->first();
    //         $bpbSudahPartial=$cekPartial->bpb;
    //         $bpbPartial=explode("-" , $cekPartial->bpb);
    //         $bpbBelumPartial=array_diff($bpb,$bpbPartial);
    //         $bpbBlok1=array_intersect($bpb,$bpbPartial);
    //         $bpbBaru=(array_merge($bpbPartial,$bpbBelumPartial));
    //         $no_bpb=implode("-" , $bpbBaru);
    //         $bpbBlok=implode("-" , $bpbBlok1);
    //         $bpbAkanPartial=implode("-" , $bpbBelumPartial);
    //         $pengeluaran_jde=pengeluaran::where('F564111H_DSC2',$no_kontrak)->where('F564111H_MCU', $kontrak->branch)->whereIn('F564111H_DOC1',$bpbBelumPartial)->get();

    //         if($pengeluaran_jde->count()>0){
    //             $tanggal=collect($pengeluaran_jde)->first()->F564111H_DGL;
    //         }
    //         else{
    //             $tanggal='';
    //             if($bpbBlok==""){
    //                 $bpbBlok='A';
    //             }
    //         }
    //         $data_JDE= (new  uploadFile)->Pengeluaran_JDE($pengeluaran_jde);
    //         $data_kontrak = pj_kk::findOrFail($no_kontrak);
    //         $material =pj_kk::where('no_kontrak',$no_kontrak)->with('Material')->get();
    //         $partial =pj_kk::where('no_kontrak',$no_kontrak)->with('partial')->get();
    //         $data_partial=(new subkon)->data_partial($partial);
    //         $material_all= (new  subkon)->data_material($material,$data_partial);
    //         $data_material= (new  uploadFile)->create_partial($material_all,$data_JDE);
    //         $dok = dokumen261::where('id_no_kontrak',$no_kontrak)->where('no_aju',$no_aju)->first();
            
    //     }
    //     else{
    //         $bpbAkanPartial=$request->bpb;
    //         $bpbSudahPartial=null;
    //         $cekPartial=null;
    //         $tipe_partial='create';
    //         $dok=null;
    //         $bpbBlok=null;
    //         $no_bpb=$request->bpb;
    //         $pengeluaran_jde=pengeluaran::where('F564111H_DSC2',$no_kontrak)->where('F564111H_MCU', $kontrak->branch)->whereIn('F564111H_DOC1',$bpb)->get();
    //         if($pengeluaran_jde->count()>0){
    //             $tanggal=collect($pengeluaran_jde)->first()->F564111H_DGL;
    //         }
    //         else{
    //             $tanggal='';
    //             $bpbBlok='A';
    //         }

    //         $data_JDE= (new  uploadFile)->Pengeluaran_JDE($pengeluaran_jde);
    //         $data_kontrak = pj_kk::findOrFail($no_kontrak);
    //         $material =pj_kk::where('no_kontrak',$no_kontrak)->with('Material')->get();
    //         $partial =pj_kk::where('no_kontrak',$no_kontrak)->with('partial')->get();
    //         $data_partial=(new subkon)->data_partial($partial);
    //         $material_all= (new  subkon)->data_material($material,$data_partial);
    //         $data_material= (new  uploadFile)->create_partial($material_all,$data_JDE);
    //     }
    //     return view('MatDoc.subkon.partials.monitoring.create-pj261', compact('page','data_material','no_kontrak','data_JDE','tanggal','no_bpb','bpbBlok','dok','tipe_partial','no_aju','cekPartial','bpbSudahPartial','bpbAkanPartial'));
        
    // }
    public function insert(Request $request)
    {   
// dd($request->all());
        
        $no_kontrak=$request->no_kontrak;
        $item_number=$request->item_number;
        $qty=$request->qty;
        $id=$request->id_material;
        $gl_class=$request->gl_class;
        $hanca=$request->hanca;
        if( $request->tipe_partial=='update'){
            foreach ($id as $key5 => $value5) {
                foreach ($gl_class as $key6 => $value6)
                    if($key5==$key6){
                        $update=[
                            'gl_class'=>$value6,
                        ];
                        material::whereid($value5)->update($update);
                    }
                    
            }
            foreach ($id as $key7 => $value7) {
                foreach ($hanca as $key8 => $value8)
                    if($key7==$key8){
                        $update1=[
                            'hanca'=>$value8,
                        ];
                        material::whereid($value7)->update($update1);
                    }
                    
            }
            $data_partial=Bc261::where('id_no_kontrak',$no_kontrak)->where('no_aju',$request->no_aju)->get();
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
                    'bpb'=>$request->no_bpb,
                ];
                Bc261::whereid($value3->id)->update($update_pertama);
            }
            foreach ($id as $key => $value) {
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
                        'bpb'=>$request->no_bpb,
                    ];
                    Bc261::whereid($partial->id)->update($update261);
                }
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
                        'bpb'=>$request->no_bpb,
                    ];
                    Bc261::create($input);
                }
            }
            $dok = dokumen261::where('id_no_kontrak',$no_kontrak)->where('no_aju',$request->no_aju)->first();
            $record= (new  uploadFile)->updateFile($request,$dok);
            dokumen261::whereid($dok->id)->update($record);
        }
        elseif( $request->tipe_partial=='create'){
            foreach ($id as $key5 => $value5) {
                foreach ($gl_class as $key6 => $value6)
                    if($key5==$key6){
                        $update=[
                            'gl_class'=>$value6,
                        ];
                        material::whereid($value5)->update($update);
                    }
                    
            }
            foreach ($id as $key7 => $value7) {
                foreach ($hanca as $key8 => $value8)
                    if($key7==$key8){
                        $update=[
                            'hanca'=>$value8,
                        ];
                        material::whereid($value7)->update($update);
                    }
                    
            }
            foreach ($item_number as $key => $value) {
                foreach ($qty as $key1 => $value1) {
                    foreach ($id as $key2 => $value2) {
                        if(($key==$key1)&&($key1==$key2)){
                            $input=[
                                'id_no_kontrak'=>$no_kontrak,
                                'id_material'=>$value2,
                                'item_number'=>$value,
                                'no_aju'=>$request->no_aju,
                                'dok_aju'=>$request->dok_aju,
                                'no_daftar'=>$request->no_daftar,
                                'tanggal'=>$request->tanggal,
                                'bm'=>$request->bm,
                                'ppn'=>$request->ppn,
                                'pph'=>$request->pph,
                                'total_jaminan'=>$request->total_jaminan,
                                'qty'=>$value1,
                                'bpb'=>$request->no_bpb,

                            ];
                            Bc261::create($input);
                            } 
                    }
                
                }
            }
            $dokumen= (new  uploadFile)->insertFile($request,$no_kontrak);
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
    public function show_dokumen($no_kontrak,$no_aju)
    {
        $page = 'dashboard';
        $dok = dokumen261::where('id_no_kontrak',$no_kontrak)->where('no_aju',$no_aju)->first();
        $data_patrial =Bc261::where('id_no_kontrak',$no_kontrak)->where('no_aju',$no_aju)->where('qty','!=',null)->get();
        $data_material =material::where('id_no_kontrak',$no_kontrak)->get();
        $patrial_aju= (new  subkon)->partial_aju($data_patrial,$data_material);
        $no_aju=collect($patrial_aju)->first();
        // dd($a);

        // dd($no_aju);
        return view('MatDoc.subkon.partials.rekapitulasi.info_partial261', compact('page','dok','patrial_aju','no_aju'));
    }

    public function edit($no_kontrak,$no_aju) 
	{
        $page = 'dashboard';
        $collect_aju = Bc261::where('id_no_kontrak',$no_kontrak)->where('no_aju',$no_aju)->first();
        $partial_aju = Bc261::where('id_no_kontrak',$no_kontrak)->where('no_aju',$no_aju)->get();
        $material =pj_kk::where('no_kontrak',$no_kontrak)->with('Material')->get();
        $partial =pj_kk::where('no_kontrak',$no_kontrak)->with('partial')->get();
        $data_partial=(new subkon)->data_partial($partial);
        $data_material= (new  subkon)->data_material($material,$data_partial);
        $record= (new  subkon)->update_partial261($data_material,$partial_aju);
        $dok = dokumen261::where('id_no_kontrak',$no_kontrak)->where('no_aju',$no_aju)->first();
        // dd($dok);

        
        return view('MatDoc.subkon.partials.monitoring.edit-pj261', compact('page','collect_aju','record','dok'));
    }
    public function update(Request $request)
    {   
        // dd($request->all());

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
                    Bc261::whereid($value2)->update($data1);
                    } 
            }
        }
  
        $dok = dokumen261::where('id',$request->id_dok)->first();
        $record= (new  uploadFile)->updateFile($request,$dok);
        // dd($dok->record);
            
            dokumen261::whereid($dok->id)->update($record);
        return redirect()->route('subkon.rekapitulasi',$no_kontrak)->with('success', 'user is successfully saved');

    }
    public function store_TambahMaterial(Request $request)
    {
        // dd($request->all());
        $no_kontrak=$request->no_kontrak;
        // $barang_jadi=BarangJadi::where('id_no_kontrak',$no_kontrak)->first();
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
        return redirect()->route('subkon.monitoring',$no_kontrak);
    }
    public function deleteMaterial($id)
    {
        // dd($id);
        $data=material::findOrFail($id);
        // dd($data);
        $no_kontrak=$data->id_no_kontrak;
        $data_Bc261 = Bc261::where('id_no_kontrak',$data->id_no_kontrak)->where('id_material',$data->id);

        $Bc261 = Bc261::where('id_no_kontrak',$data->id_no_kontrak)->where('id_material',$data->id)->get();
        // dd($Bc261);

        $kontrak_Bc261 = Bc261::where('id_no_kontrak',$data->id_no_kontrak)->get();
        // dd($kontrak_Bc261);

        foreach ($Bc261 as $key => $value) {
            $check=$kontrak_Bc261->where('id_no_kontrak',$value->id_no_kontrak)->where('no_aju',$value->no_aju)->count();
            if($check=='1'){
                $dok=dokumen261::where('id_no_kontrak',$value->id_no_kontrak)->where('no_aju',$value->no_aju);
                $dok->delete();
            }
        }
        $data->delete();
        $data_Bc261->delete();
        return redirect()->route('subkon.monitoring',$no_kontrak);
    }
    public function excel_tpb261($no_kontrak,$no_aju)
    {
        $page = 'dashboard';
        $data_patrial =Bc261::where('id_no_kontrak',$no_kontrak)->where('no_aju',$no_aju)->where('qty','!=',null)->get();
        $data_material =material::where('id_no_kontrak',$no_kontrak)->get();
        $patrial_aju= (new  subkon)->partial_aju($data_patrial,$data_material);
        $kontrak =pj_kk::findOrFail($no_kontrak);
        $data= (new  subkon)->tpb261($patrial_aju,$kontrak);
        $aju=collect($patrial_aju)->first();
        $tanggal=date('dmY', strtotime($aju['tanggal']));

        return Excel::download(new UploadTpb261Export($data),'BC 261 ' .$no_kontrak.' '.$tanggal.' '.$no_aju.'.xlsx');
       
    }

    public function Perhitungan_Jaminan($no_kontrak)
    {
      
        $kontrak=pj_kk::findOrFail($no_kontrak);
        $jaminan= (new  subkon)->PerhitunganJaminan($kontrak);
        $total_jaminan=[
            'idr'=>(new subkon)->pembulatan_uang((int)collect($jaminan)->sum('idr')),
            'bm'=>(new subkon)->pembulatan_uang((int)collect($jaminan)->sum('bm')),
            'bpt'=>(new subkon)->pembulatan_uang((int)collect($jaminan)->sum('bpt')),
            'btm'=>(new subkon)->pembulatan_uang((int)collect($jaminan)->sum('btm')),
            'ppn'=>(new subkon)->pembulatan_uang((int)collect($jaminan)->sum('ppn')),
            'pph'=>(new subkon)->pembulatan_uang((int)collect($jaminan)->sum('pph')),
            'total'=>(new subkon)->pembulatan_uang((int)collect($jaminan)->sum('total')),
        ];
        // $total_jaminan_pembulatan= (new  subkon)->pembulatan_uang($uang);
        // $material =pj_kk::where('no_kontrak',$no_kontrak)->with('Material')->get();
        // $data_pengeluaran=$pengeluaran261->flatMap->partial;
        // $data_material=$pengeluaran261->flatMap->Material;

        

        return Excel::download(new PerhitunganJaminanExport($kontrak,$jaminan,$total_jaminan),'MASTER_UPLOAD_SIJANET '.$no_kontrak.'.xlsx');

    }
}
