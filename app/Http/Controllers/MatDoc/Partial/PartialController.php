<?php

namespace App\Http\Controllers\MatDoc\Partial;

use DB;
use Auth;
use DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Mat_Doc\Subkon\pj_kk;
use App\Services\MatDok\Subkon\subkon;
use App\Services\MatDok\Subkon\Partial_supplier;
use App\Models\Mat_Doc\Subkon\Wo_kontrak;
use App\Models\Mat_Doc\Subkon\BarangJadi;
use App\Models\Mat_Doc\Subkon\Bc262;
use App\Models\Mat_Doc\Subkon\Bc261;
use App\Models\Mat_Doc\Subkon\dokumen262;

class PartialController extends Controller
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

    public function index(Request $request)
    {
        // $tanggal=date('Y-m-d');
        // $tgl_awal = Carbon::createFromFormat('Y-m-d', $tanggal)->startOfYear()->format('Y-m-d'); 
        // $tgl_akhir = Carbon::createFromFormat('Y-m-d', $tanggal)->endOfYear()->format('Y-m-d'); 
        // $data=pj_kk::where('jatuh_tempo','>=',$tgl_awal)->where('jatuh_tempo','<=',$tgl_akhir)->get();

        $year=$request->filter??date('Y');
        $data=pj_kk::whereYear('jatuh_tempo',$year)->get();

        // $data=pj_kk::all();
        $subkon=(new subkon)->MasterSubkon($data);
        $map['year']=$year;
        $map['subkon']=$subkon;
        $map['page']='dashboard';
        return view('MatDoc.Partial.index', $map);
    }

    public function inputPartial($branch,$kontrak)
    {
        $explode_kontrak=explode("-" , $kontrak);
        $coba = array_slice( $explode_kontrak,0,1);
        $no_kontrak_tanpa_branch=$coba[0];

        $wo_kontrak=Wo_kontrak::where('no_kontrak',$no_kontrak_tanpa_branch)->where('BRANCH',$branch)->where('F560021_DOC','!=',null)->get()->groupBy('F560021_DOC');
        $data_kontrak = pj_kk::findOrFail($kontrak);
        $map['hari']=date('l');
        $map['tanggal']=date('d F Y');
        $map['data_kontrak']=$data_kontrak;
        $map['wo_kontrak']=$wo_kontrak;
        $map['page']='dashboard';
        return view('MatDoc.Partial.input-partial', $map);
    }
    public function inputQtyPartial(Request $request)
    {
        if($request->ceklis==null){
            $daftar_wo=[];
        }
        else{
            $daftar_wo=$request->ceklis;
        }
        // wo jde
        $wo_kontrak=Wo_kontrak::where('no_kontrak',$request->no_kontrak)->where('BRANCH',$request->branch)->wherein('F560021_DOC',$daftar_wo)->get()->groupBy('F560021_DOC');
        //garment dan pemasukan
        $BarangJadi =pj_kk::where('no_kontrak',$request->no_kontrak)->with('Barang_Jadi')->get();
        $pemasukan =pj_kk::where('no_kontrak',$request->no_kontrak)->with('pemasukan')->get();
        $data_pemasukan=$pemasukan->flatMap->pemasukan;
        $barang_jadi=$BarangJadi->flatMap->Barang_Jadi;
        $garment=(new subkon)->patrial_pemasukan($barang_jadi,$data_pemasukan);
        $pengeluaran_261=Bc261::where('id_no_kontrak',$request->no_kontrak)->get();
        $item_262=(new Partial_supplier)->sisa_262($garment,$pengeluaran_261);
        // daftar wo yg akan dipartial
        $daftar_wo_garment=[];
        foreach ($wo_kontrak as $key => $value) {
           $item_INMK=array_column(($value->toarray()), 'ITEM_INMK');
           $daftar_wo_garment[]=[
                    'wo'=>$key,
                    'item_inmk'=> $item_INMK,
                    'item_garment'=>$item_262,
           ];
        }
        // dd($daftar_wo_garment);
        $map['daftar_wo']= $daftar_wo_garment;
        $map['branch']=$request->branch;
        $map['no_kontrak']=$request->no_kontrak;
        $map['page']='dashboard';
        return view('MatDoc.Partial.components.input-qty', $map);
    }

    public function StorePartial(Request $request)
    {
        $id_sj=(new Partial_supplier)->id_sj();
        $no_kontrak=$request->no_kontrak;
        $branch=$request->branch;

        for ($i=0; $i < count($request->id_barangjadi); $i++) { 
            $data_partial=[
                'id_no_kontrak'=> $no_kontrak,
                'id_barangjadi'=>$request->id_barangjadi[$i],
                'kode_barang'=>$request->kode_barang[$i],
                'no_wo'=>$request->no_wo[$i],
                'qty'=>$request->qty_partial[$i],
                'no_surat_jalan'=>$request->no_surat_jalan,
                'no_packing_list'=>$request->no_packing_list,
                'id_sj'=>$id_sj,
                'tanggal_sj'=>$request->tanggal,
                'bm'=>0,
                'ppn'=>0,
                'pph'=>0,
                'total_jaminan'=>0,
            ];    
            Bc262::create($data_partial);
        }
        // $dokumen= (new  Partial_supplier)->insertFile($request,$no_kontrak,$id_no_aju);
        // dokumen262::create($dokumen);
        
        return redirect()->route('input.partial.index',[$branch, $no_kontrak]);
    }
        
    public function rekapPartial($id)
    {
        $data_kontrak = pj_kk::findOrFail($id);

        $test=$data_kontrak->pemasukan->groupBy('id_sj');
        $data=[];
        foreach ($test as $key => $value) {
            $groupby=$value->groupBy('no_wo')->toArray(); 
            $wo=array_keys($groupby);
            $daftar_wo=implode(', ', $wo);
            $qty=$value->sum('qty');
            $tanggal_sj=$value->first()->tanggal_sj;
            $data[]=[
                'id_sj'=>$key,
                'tanggal_sj'=>$tanggal_sj,
                'daftar_wo'=>$daftar_wo,
                'qty'=>$qty,
                'no_surat_jalan'=>$value->first()->no_surat_jalan,
                'id_no_aju'=>$value->first()->id_no_aju
            ];
        }
        $map['data']=$data;
        $map['hari']=date('l');
        $map['tanggal']=date('d F Y');
        $map['data_kontrak']=$data_kontrak;
        $map['page']='dashboard';
        return view('MatDoc.Partial.rekap-partial', $map);
    }

    public function monitoringPartial($no_kontrak)
    {
        $data_kontrak = pj_kk::findOrFail($no_kontrak);
        $pemasukan =pj_kk::where('no_kontrak',$no_kontrak)->with('pemasukan')->get();
        $BarangJadi =pj_kk::where('no_kontrak',$no_kontrak)->with('Barang_Jadi')->get();
        $data_pemasukan=$pemasukan->flatMap->pemasukan->where('id_no_aju','!=',null);
        $barang_jadi=$BarangJadi->flatMap->Barang_Jadi;
        $pemasukan_group= (new  subkon)->pemasukan_group($data_pemasukan);
        $data_barangJadi= (new  subkon)->bc262($barang_jadi,$data_pemasukan);

        $map['hari']=date('l');
        $map['tanggal']=date('d F Y');
        $map['data_kontrak']=$data_kontrak;
        $map['data_pemasukan']=$data_pemasukan;
        $map['pemasukan_group']=$pemasukan_group;
        $map['data_barangJadi']=$data_barangJadi;
        $map['page']='dashboard';
        return view('MatDoc.Partial.monitoring-partial', $map);
    } 

    public function EditQtyPartial($id_sj, $kontrak)
    {
        $pemasukan_aju=Bc262::where('id_no_kontrak',$kontrak)->where('id_sj',$id_sj)->get();
        
        $BarangJadi =pj_kk::where('no_kontrak',$kontrak)->with('Barang_Jadi')->get();
        $barang_jadi=$BarangJadi->flatMap->Barang_Jadi;
        $pemasukan=pj_kk::where('no_kontrak',$kontrak)->with('pemasukan')->get();
        $data_pemasukan=$pemasukan->flatMap->pemasukan;

        $data_barangjadi= (new  subkon)->data_pemasukan($barang_jadi,$data_pemasukan);
        $data_kontrak = pj_kk::findOrFail($kontrak);

        $record= (new  subkon)->update_partial262($data_barangjadi,$pemasukan_aju);
        $pemasukan=collect($record)->groupBy('no_wo');
        $map['data_pemasukan']=$pemasukan_aju->first();
        $map['pemasukan']=$pemasukan;
        $map['data_kontrak']=$data_kontrak;
        $map['page']='dashboard';
        return view('MatDoc.Partial.components.edit-qty', $map);
    }

    public function UpdatePartial(Request $request)
    {
        for ($i=0; $i <count($request->id) ; $i++) { 
            $data=[
                'id'=>$request->id[$i],
                'qty'=>$request->qty_partial[$i],
                'no_surat_jalan'=>$request->no_surat_jalan,
                'no_packing_list'=>$request->no_packing_list,
                'tanggal_sj'=>$request->tanggal,
            ];
            Bc262::whereid($request->id[$i])->update($data);
        }
        return redirect()->route('rekap.partial.index',$request->no_kontrak);
    }

    public function DeletePartial($id_sj, $kontrak)
    {
        $pemasukan_aju=Bc262::where('id_no_kontrak',$kontrak)->where('id_sj',$id_sj)->delete();


        return back()->with("success",'partial berhasil dihapus');
    }
}
