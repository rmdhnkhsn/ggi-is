<?php

namespace App\Http\Controllers\MatDoc\Subkon;

use DB;
use Auth;
use DataTables;
use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\MaterialImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Mat_Doc\Subkon\material;
use App\Models\Mat_Doc\Subkon\pj_kk;
use App\Models\Mat_Doc\Subkon\test;

class SubkonController extends Controller
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

    public function monitoring()
    {
        $page = 'dashboard';
        return view('MatDoc.subkon.monitoring', compact('page'));
    }
    public function rekapitulasi()
    {
        $page = 'dashboard';
        return view('MatDoc.subkon.rekapitulasi', compact('page'));
    }

    public function all_subkon()
    {
        $page = 'dashboard';
        $subkon=pj_kk::all();
        return view('MatDoc.subkon.index', compact('page','subkon'));
    }

    public function create2()
    {
        $page = 'dashboard';
        $subkon=pj_kk::all();
        return view('MatDoc.subkon.partials.monitoring.create-pj', compact('page','subkon'));
    }

    public function create(Request $request) 
	{
        // dd('1');
        $kontrak=explode("/" , $request->no_kontrak);
        $coba = array_slice( $kontrak,0,1);
        $no_kontrak=$coba[0];
        $this->validate($request, [
            'file1' => 'required|mimes:csv,xls,xlsx',
            'file2' => 'required|mimes:csv,xls,xlsx',
        ]);

        if( pj_kk::where('no_kontrak', $no_kontrak)->count()){
            dd('data sudah ada');
        }
        else{
           
           
                $input=[
                    'no_kontrak'=>$no_kontrak,
                    'sub_no_kontrak'=>$request->no_kontrak,
                    'no_skep'=>$request->no_skep,
                    'no_bpj'=>$request->no_bpj,
                    'supplier'=>$request->supplier,
                    'no_bound'=>$request->no_bound,
                    'tarik_cb'=>$request->tarik_cb,
                    'bc_262'=>$request->bc_262,
                    'jenis_pekerjaan'=>$request->jenis_pekerjaan,
                    'nilai_jaminan'=>$request->nilai_jaminan,
                    'npwp'=>$request->npwp,
                    'no_tpb'=>$request->no_tpb,
                    'tgl_persetujuan'=>$request->tgl_persetujuan,
                    'tgl_bpj'=>$request->tgl_bpj,
                    'jatuh_tempo'=>$request->jatuh_tempo,
                    'premi'=>$request->premi,
                    'jde'=>$request->jde,
                    'amount'=>$request->amount,
                    'pengusaha_tpb'=>$request->pengusaha_tpb,
                    'ket'=>$request->ket,
                ];
                // dd($input);
            pj_kk::create($input);
    
            $data=Excel::toArray([],$request->file('file1')->getRealPath());
            $test=collect($data);
            foreach ($test as $key => $value) {
               foreach ($value as $key2 => $row) {
                   $material=[
                    'id_no_kontrak'=>$no_kontrak,
                    'hs_code'=>$row[0],
                    'item_number'=>$row[1],
                    'deskripsi'=>$row[2],
                    'kebutuhan'=>$row[3],
                    'satuan'=>$row[4],
                    'consumption'=>$row[5],
                    'nw'=>$row[6],
                    'gw'=>$row[7],
                    'doc_type'=>$row[8],
                    'bc_number'=>$row[9],
                    'doc_date'=>$row[10],
                    'us_price'=>$row[11],
                    'us'=>$row[12],
                    'idr'=>$row[13],
                    'persen'=>$row[14],
                    'bm'=>$row[15],
                    'bpt'=>$row[16],
                    'btm'=>$row[17],
                    'ppn'=>$row[18],
                    'pph'=>$row[19],
                    'total'=>$row[20],
                   ];
                   material::create($material);
               }
            }
            return back();
        }
		
	}

    public function monitor($no_kontrak)
    {
        $data = pj_kk::findOrFail($no_kontrak);
        $material =pj_kk::where('no_kontrak',$no_kontrak)->with('Material')->get();
        foreach ($material as $key => $value) {
            foreach ($value->Material as $t) {
                $record[]=[
                    'no_kontrak'=>$t->id_no_kontrak,
                    'item_no'=>$t->item_number
                ];
            }
        }
        // dd($record);
        $page = 'DMaster';
         return view('MatDoc.subkon.monitoring', compact('page'));
    }

    public function update(Request $request) 
	{
        $kontrak=explode("/" , $request->no_kontrak);
        $coba = array_slice( $kontrak,0,1);
        $no_kontrak=$coba[0];
        
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
            $input=[
                'no_kontrak'=>$no_kontrak,
                'sub_no_kontrak'=>$request->no_kontrak,
                'no_skep'=>$request->no_skep,
                'no_bpj'=>$request->no_bpj,
                'supplier'=>$request->supplier,
                'no_bound'=>$request->no_bound,
                'tarik_cb'=>$request->tarik_cb,
                'bc_262'=>$request->bc_262,
                'jenis_pekerjaan'=>$request->jenis_pekerjaan,
                'nilai_jaminan'=>$request->nilai_jaminan,
                'npwp'=>$request->npwp,
                'no_tpb'=>$request->no_tpb,
                'tgl_persetujuan'=>$request->tgl_persetujuan,
                'tgl_bpj'=>$request->tgl_bpj,
                'premi'=>$request->premi,
                'jde'=>$request->jde,
                'amount'=>$request->amount,
                'pengusaha_tpb'=>$request->pengusaha_tpb,
                'ket'=>$request->ket,
            ];
        // pj_kk::create($input);
        pj_kk::whereNoKontrak($no_kontrak)->update($input);

        $item_material = material::where('id_no_kontrak',$no_kontrak);
        $item_material->delete();

        $data=Excel::toArray([],$request->file('file')->getRealPath());
        $test=collect($data);
        foreach ($test as $key => $value) {
            foreach ($value as $key2 => $row) {
                $material=[
                'id_no_kontrak'=>$no_kontrak,
                'hs_code'=>$row[0],
                'item_number'=>$row[1],
                'deskripsi'=>$row[2],
                'kebutuhan'=>$row[3],
                'satuan'=>$row[4],
                'consumption'=>$row[5],
                'nw'=>$row[6],
                'gw'=>$row[7],
                'doc_type'=>$row[8],
                'bc_number'=>$row[9],
                'doc_date'=>$row[10],
                'us_price'=>$row[11],
                'us'=>$row[12],
                'idr'=>$row[13],
                'persen'=>$row[14],
                'bm'=>$row[15],
                'bpt'=>$row[16],
                'btm'=>$row[17],
                'ppn'=>$row[18],
                'pph'=>$row[19],
                'total'=>$row[20],
                ];
                material::create($material);
            }
        }
        return back();
    }
    public function Delet ($no_kontrak)
    {
        $item_material = material::where('id_no_kontrak',$no_kontrak);
        $item_material->delete();
        $kontrak = pj_kk::findOrFail($no_kontrak);
        $kontrak->delete();
        return back();

    }


   
}
