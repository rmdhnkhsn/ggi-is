<?php

namespace App\Http\Controllers\MatDoc\Subkon;

use DB;
use Auth;
use DataTables;
use App\ListBuyer;
use App\Branch;
use Carbon\Carbon;
use App\ItemNumber;
Use App\Models\GGI_IS\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\MaterialImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Mat_Doc\Subkon\material;
use App\Models\Mat_Doc\Subkon\pj_kk;
use App\Models\Mat_Doc\Subkon\BarangJadi;
use App\Models\Mat_Doc\Subkon\Bc261;
use App\Models\Mat_Doc\Subkon\dokumen261;
use App\Models\Mat_Doc\Subkon\Bc262;
use App\Models\Mat_Doc\Subkon\dokumen262;
use App\Services\MatDok\Subkon\subkon;
use App\Exports\UploadTpbExport;
use App\Exports\MonitoringSubkonExport;
use App\Exports\RekapJatuhTempoExport;
use App\Models\Mat_Doc\Subkon\Aju261;




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

    public function rekapitulasi($no_kontrak)
    {
        $page = 'dashboard';
        $data_kontrak = pj_kk::findOrFail($no_kontrak);
        //bc261
        $material =pj_kk::where('no_kontrak',$no_kontrak)->with('Material')->get();
        $partial =pj_kk::where('no_kontrak',$no_kontrak)->with('partial')->get();
        $data_partial=(new subkon)->data_partial($partial);
        $data_material= (new  subkon)->data_material($material,$data_partial);
        $aju_group= (new  subkon)->partial_group($data_partial);
        $partial_aju= (new  subkon)->partial_aju($data_partial,$data_material);
        $data261=[
            'totalbm'=>$aju_group->sum('bm'),
            'totalpph'=>$aju_group->sum('pph'),
            'totalppn'=>$aju_group->sum('ppn'),
            'totaljaminan'=>$aju_group->sum('total_jaminan'),
            'nilai_jaminan'=>$data_kontrak->nilai_jaminan,
            'jaminan_tersisan'=>$data_kontrak->nilai_jaminan-$aju_group->sum('total_jaminan'),
        ];

        // Bc262
        $data1 =pj_kk::where('no_kontrak',$no_kontrak)->with('Barang_Jadi')->get();
        $data2 =pj_kk::where('no_kontrak',$no_kontrak)->with('pemasukan')->get();
        $barang_jadi=$data1->flatMap->Barang_Jadi;
        $data_pemasukan=$data2->flatMap->pemasukan->where('id_no_aju','!=',null);
        $pemasukan_group= (new  subkon)->pemasukan_group($data_pemasukan);
        $pemasukan_aju= (new  subkon)->pemasukan_aju($data_pemasukan,$barang_jadi);
        $data262=[
            'totalbm'=>$pemasukan_group->sum('bm'),
            'totalpph'=>$pemasukan_group->sum('pph'),
            'totalppn'=>$pemasukan_group->sum('ppn'),
            'totaljaminan'=>$pemasukan_group->sum('total_jaminan'),
            'nilai_jaminan'=>$data_kontrak->nilai_jaminan,
            'jaminan_tersisan'=>$data_kontrak->nilai_jaminan-$pemasukan_group->sum('total_jaminan'),
        ];
        return view('MatDoc.subkon.rekapitulasi', compact('page','data_kontrak','no_kontrak','aju_group','partial_aju','pemasukan_group','pemasukan_aju','data261','data262'));
    }

    public function all_subkon()
    {
        $page = 'dashboard';
        $tanggal=date('Y-m-d');
        $tgl_awal = Carbon::createFromFormat('Y-m-d', $tanggal)->startOfYear()->format('Y-m-d'); 
        $tgl_akhir = Carbon::createFromFormat('Y-m-d', $tanggal)->endOfYear()->format('Y-m-d'); 
        $data=pj_kk::where('jatuh_tempo','>=',$tgl_awal)->where('jatuh_tempo','<=',$tgl_akhir)->get();
        $subkon=(new subkon)->MasterSubkon($data);
        $dataBranch= Branch::all();
        $a=ListBuyer::all();
        foreach ($a as $key => $value) {
            $ListSupplier[]=[
                'id'=>$value->F0101_AN8,
                'text'=>$value->F0101_ALPH,
            ];
        }
        $date = strtotime($tanggal);
        $date = strtotime("+7 day", $date);
        $jatuh_tempo=date('Y-m-d', $date);
        $karyawan=Karyawan::all();
        return view('MatDoc.subkon.index', compact('page','subkon','tgl_awal','tgl_akhir','ListSupplier','jatuh_tempo','karyawan','dataBranch'));
    }

    public function filter_subkon(Request $request)
    {
        $page = 'dashboard';
        $tgl_awal=$request->tgl_awal;
        $tgl_akhir=$request->tgl_akhir;
        $tanggal=date('Y-m-d');
        $data=pj_kk::where('jatuh_tempo','>=',$tgl_awal)->where('jatuh_tempo','<=',$tgl_akhir)->get();
        $subkon=(new subkon)->MasterSubkon($data);
        $dataBranch= Branch::all();
        $a=ListBuyer::all();
        foreach ($a as $key => $value) {
            $ListSupplier[]=[
                'id'=>$value->F0101_ALPH,
                'text'=>$value->F0101_ALPH,
            ];
        }
        // lansung test
        $karyawan=Karyawan::all();
        $today=date('Y-m-d');
        $date = strtotime($today);
        $date = strtotime("+7 day", $date);
        $jatuh_tempo=date('Y-m-d', $date);
        return view('MatDoc.subkon.index', compact('page','subkon','tgl_awal','tgl_akhir','ListSupplier','jatuh_tempo','karyawan','dataBranch'));
    }

    public function create(Request $request) 
	{
        // dd($request->all());
        $kontrak=explode("/" , $request->no_kontrak);
        $coba = array_slice( $kontrak,0,1);
        $no_kontrak_tanpaBranch=$coba[0];
        $no_kontrak=$no_kontrak_tanpaBranch.'-'.$request->branch;
        $this->validate($request, [
            'file1' => 'required|mimes:csv,xls,xlsx',
            'file2' => 'required|mimes:csv,xls,xlsx',
        ]);
        if( pj_kk::where('no_kontrak', $no_kontrak)->count()){
            return redirect()->route('subkon.index')->with("error",'No Kontrak sudah terdaftar');
        }
        else{
            if($request->kode_branch!=null){
                $KodeBranch=Branch::findOrFail($request->kode_branch);
                $id_branch=$KodeBranch->id;
                $kode_branch=$KodeBranch->kode_branch;
                $supplier_branch=$KodeBranch->branchdetail;
            }
            else{
                $id_branch=null;
                $kode_branch=null;
                $supplier_branch=null;
            }
            // dd($kode_branch);
            $file1 = $request->file('file1');
            $file2 = $request->file('file2');
            $nama_file1 =$file1->getClientOriginalName();
            $nama_file2 =$file2->getClientOriginalName();
            $nama_Pic=Karyawan::where('nik',$request->nik)->first();

            $data=Excel::toArray([],$request->file('file1'));
            $data_material=collect($data);
            // 23 karna total jaminan berada di row 23, 0 untuk mecah data collection
            $total_jaminan=array_map(function ($value){
                return ((float)$value[23]);
            },$data[0]);
            $uang=(float)array_sum($total_jaminan);
            $total_jaminan_pembulatan= $uang;
            //kurs
            $kurs=$data[0][1][24];
            //import material 261 summary sasuai item number & validasi apalila satuan berbeda
            $import_material = (new  subkon)->import_material($data_material,$no_kontrak);
            //import  262
            $data_file2=Excel::toArray([],$request->file('file2'));
            $data_barangJadi=collect($data_file2);
            //Summary 262 sasuai item number & validasi apalila satuan berbeda
            $import_barangJadi = (new  subkon)->import_barangJadi($data_barangJadi,$no_kontrak);
            // validasi 261
            $cek_validasi_satuan=$import_material[0]['id_no_kontrak']??null;
            // validasi 262
            $cek_validasi_satuan262=$import_barangJadi[0]['id_no_kontrak']??null;
            if($cek_validasi_satuan!=null && $cek_validasi_satuan262!=null ){
                // supplier
                $supplier=ListBuyer::where('F0101_AN8',$request->supplier)->first();
                    $input=[
                        'kategori_subkon'=>$request->kategori_subkon,
                        'no_kontrak'=>$no_kontrak,
                        'sub_no_kontrak'=>$request->no_kontrak,
                        'no_skep'=>$request->no_skep,
                        'no_bpj'=>$request->no_bpj,
                        'supplier_code'=>$request->supplier,
                        'supplier'=>$supplier->F0101_ALPH,
                        'no_bound'=>$request->no_bound,
                        'tarik_cb'=>$request->tarik_cb,
                        'bc_262'=>$request->bc_262,
                        'jenis_pekerjaan'=>$request->jenis_pekerjaan,
                        'nilai_jaminan'=>$total_jaminan_pembulatan,
                        'npwp'=>$request->npwp,
                        'npwp_supplier'=>$request->npwp_supplier,
                        'no_tpb'=>$request->no_tpb,
                        'tgl_persetujuan'=>$request->tgl_persetujuan,
                        'tgl_bpj'=>$request->tgl_bpj,
                        'tgl_kontrak'=>$request->tgl_kontrak,
                        'tgl_cb'=>$request->tgl_cb,
                        'jatuh_tempo'=>$request->jatuh_tempo,
                        'premi'=>$request->premi,
                        'jde'=>$request->jde,
                        'amount'=>$request->amount,
                        'pengusaha_tpb'=>$request->pengusaha_tpb,
                        'ket'=>$request->ket,
                        'file_jaminan'=> $nama_file1,
                        'file_barang'=> $nama_file2,
                        'branch'=>$request->branch,
                        'nik'=>$request->nik,
                        'nama'=>$nama_Pic->nama,
                        'kurs'=>$kurs,
                        'izintpb'=>$request->izintpb,
                        'id_branch'=>$id_branch,
                        'kode_branch'=>$kode_branch,
                        'supplier_branch'=>$supplier_branch,

                    ];
                pj_kk::create($input);
                $store_material=(new subkon)->store_summary_material($import_material);
                $store_barangJadi=(new subkon)->store_summary_barangJadi($import_barangJadi);
               
                $data_karyawan=(new subkon)->Daftar_notif();
                $notif_team_dokumen=(new subkon)->notif_team_dokumen($data_karyawan, $request, $no_kontrak_tanpaBranch);
                return redirect()->route('subkon.index')->with("success",'Data berhasil disimpan');

            }
            else{
                // tampilkan no matterial 261 yg satuanya beda
                if($cek_validasi_satuan==null){
                    $msg=$import_material;
                    return redirect()->route('subkon.index')->withErrors($msg);
                }
                // tampilkan no matterial 262 yg satuanya beda
                else{
                    $msg=$import_barangJadi;
                    return redirect()->route('subkon.index')->withErrors($msg);
                }
               
            }

        }
	}

    public function monitor($no_kontrak)
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

        // dd($item_pjkk);

        $BarangJadi =pj_kk::where('no_kontrak',$no_kontrak)->with('Barang_Jadi')->get();
        $data_pemasukan=$pemasukan->flatMap->pemasukan->where('id_no_aju','!=',null);
        $barang_jadi=$BarangJadi->flatMap->Barang_Jadi;
        $pemasukan_group= (new  subkon)->pemasukan_group($data_pemasukan);
        $data_barangJadi= (new  subkon)->bc262($barang_jadi,$data_pemasukan);

        $a=collect($material_all);
        $b=collect($data_barangJadi);
        $total_fabric=$a->where('gl_class','INFA')->sum('jumlah_keluar');
        $TotalGarment=$b->where('retur',null)->sum('jumlah_pemasukan');
        $qty_kontrak=BarangJadi::where('id_no_kontrak',$no_kontrak)->where('retur',null)->sum('qty');
        $Balance=$qty_kontrak-$TotalGarment;
            if($TotalGarment>0 && $total_fabric>0){
                $Ratio=$total_fabric/$TotalGarment;
            }
            else{
                $Ratio='0';
            }


        $surat_jalan=$pemasukan->flatMap->pemasukan->where('id_no_aju',null)->groupBy('id_sj');
        $page = 'dashboard';
        return view('MatDoc.subkon.monitoring', compact('page','data_kontrak','data_material','hari','tanggal','data_partial','partial_group',
                    'no_kontrak','total_fabric','qty_kontrak','pemasukan_group','data_barangJadi','data_pemasukan','TotalGarment','Balance','Ratio','item_pjkk','surat_jalan'));
    }

    public function update(Request $request) 
	{
        $no_kontrak=$request->no_kontrak;
        $data_kontrak=pj_kk::findOrFail($no_kontrak);
        $documentEdit=$request->documentEdit;

        if($request->file1== null && $request->file2== null ){
            $nama_file1=$request->file_jaminan;
            $nama_file2=$request->file_barang;
        }
        else if($request->file1!= null && $request->file2== null ){
            $file1 = $request->file('file1');
            $nama_file1 =$file1->getClientOriginalName();
            $nama_file2=$request->file_barang;
        }
        else if($request->file1== null && $request->file2!= null ){
            $nama_file1=$request->file_jaminan;
            $file2 = $request->file('file2');
            $nama_file2 =$file2->getClientOriginalName();
        }
        else{
            $file1 = $request->file('file1');
            $file2 = $request->file('file2');
            $nama_file1 =$file1->getClientOriginalName();
            $nama_file2 =$file2->getClientOriginalName();
        }

        if($request->kode_branch!=null){
            $KodeBranch=Branch::findOrFail($request->kode_branch);
            $id_branch=$KodeBranch->id;
            $kode_branch=$KodeBranch->kode_branch;
            $supplier_branch=$KodeBranch->branchdetail;
        }
        else{
            $id_branch=null;
            $kode_branch=null;
            $supplier_branch=null;
        }
            // supplier
            $supplier=ListBuyer::where('F0101_AN8',$request->supplier)->first();

            $input=[
                // 'no_kontrak'=>$no_kontrak,
                'kategori_subkon'=>$request->kategori_subkon,
                'sub_no_kontrak'=>$request->sub_no_kontrak,
                'no_skep'=>$request->no_skep,
                'no_bpj'=>$request->no_bpj,
                'supplier_code'=>$request->supplier,
                'supplier'=>$supplier->F0101_ALPH,
                'no_bound'=>$request->no_bound,
                'tarik_cb'=>$request->tarik_cb,
                'bc_262'=>$request->bc_262,
                'jenis_pekerjaan'=>$request->jenis_pekerjaan,
                'nilai_jaminan'=>$request->nilai_jaminan,
                'npwp'=>$request->npwp,
                'npwp_supplier'=>$request->npwp_supplier,
                'no_tpb'=>$request->no_tpb,
                'tgl_persetujuan'=>$request->tgl_persetujuan,
                'tgl_bpj'=>$request->tgl_bpj,
                'tgl_kontrak'=>$request->tgl_kontrak,
                'tgl_cb'=>$request->tgl_cb,
                'premi'=>$request->premi,
                'jde'=>$request->jde,
                'amount'=>$request->amount,
                'pengusaha_tpb'=>$request->pengusaha_tpb,
                'ket'=>$request->ket,
                'file_jaminan'=> $nama_file1,
                'file_barang'=> $nama_file2,
                'branch'=>$request->branch,
                'status_kontrak'=>$request->status_kontrak,
                'kurs'=>$request->kurs,
                'izintpb'=>$request->izintpb,
                'id_branch'=>$id_branch,
                'kode_branch'=>$kode_branch,
                'supplier_branch'=>$supplier_branch,

            ];
            pj_kk::whereNoKontrak($no_kontrak)->update($input);
            //dok 261 & 262
        if($documentEdit=='261_262'){
            // 261
            $data=Excel::toArray([],$request->file('file1'));
            $data_material=collect($data);
            $import_material = (new  subkon)->import_material($data_material,$no_kontrak);
            $cek_validasi_satuan=$import_material[0]['id_no_kontrak']??null;
            //1. cek jika satuan  261 ada yg beda
            if($cek_validasi_satuan!=null){
                $item_material = material::where('id_no_kontrak',$no_kontrak)->get();
                // proses update material 261
                $update_item_261=(new subkon)->update_item_261($item_material,$import_material);
            }
            else{
                $msg=$import_material;
                return redirect()->route('subkon.index')->withErrors($msg);
            }
            // 262
            $data_file2=Excel::toArray([],$request->file('file2'));
            $data_barangJadi=collect($data_file2);
            $import_barangJadi = (new  subkon)->import_barangJadi($data_barangJadi,$no_kontrak);
            $cek_validasi_satuan262=$import_barangJadi[0]['id_no_kontrak']??null;
            //1. cek jika satuan  262 ada yg beda
            if( $cek_validasi_satuan262!=null){
                $barang_jadi = BarangJadi::where('id_no_kontrak',$no_kontrak)->get();
                // proses update material 26
                $update_item_261=(new subkon)->update_item_262($barang_jadi,$import_barangJadi);
            }
            else{
                $msg=$import_barangJadi;
                return redirect()->route('subkon.index')->withErrors($msg);
            }
        }
        else if($documentEdit=='261'){
            $data=Excel::toArray([],$request->file('file1'));
            $data_material=collect($data);
            $import_material = (new  subkon)->import_material($data_material,$no_kontrak);
            $cek_validasi_satuan=$import_material[0]['id_no_kontrak']??null;
            //1. cek jika satuan ada yg beda
            if($cek_validasi_satuan!=null){
                $item_material = material::where('id_no_kontrak',$no_kontrak)->get();
                // proses update material 261
                $update_item_261=(new subkon)->update_item_261($item_material,$import_material);
            }
            else{
                $msg=$import_material;
                return redirect()->route('subkon.index')->withErrors($msg);
            }
        }
        else if($documentEdit=='262'){
            $data_file2=Excel::toArray([],$request->file('file2'));
            $data_barangJadi=collect($data_file2);
            $import_barangJadi = (new  subkon)->import_barangJadi($data_barangJadi,$no_kontrak);
            $cek_validasi_satuan262=$import_barangJadi[0]['id_no_kontrak']??null;
            //1. cek jika satuan  262 ada yg beda
            if( $cek_validasi_satuan262!=null){
                $barang_jadi = BarangJadi::where('id_no_kontrak',$no_kontrak)->get();
                // proses update material 26
                $update_item_261=(new subkon)->update_item_262($barang_jadi,$import_barangJadi);
            }
            else{
                $msg=$import_barangJadi;
                return redirect()->route('subkon.index')->withErrors($msg);
            }
        }


        if($request->no_skep!=null && $request->no_bpj!=null && ($data_kontrak->no_skep==null || $data_kontrak->no_bpj==null)){
            DB::table('notification')->insert([
                'connection_name'=>"mysql_mat_doc",
                'table_name'=>"pj_kk",
                'alert_level'=>"DANGER",
                'id_int'=> $no_kontrak ,
                'nik'=>$request->nik_pic,
                'url'=>"subkon.index",
                'title'=> 'Status Kontrak '. $no_kontrak,
                'desc'=>'berubah menjadi legalitas',
                'is_read'=>"0"
            ]);
        }
        return redirect()->route('subkon.index');

        // return back();
    }
    public function Delete ($no_kontrak)
    {
        $item_material = material::where('id_no_kontrak',$no_kontrak);
        $item_material->delete();
        $barang_jadi = BarangJadi::where('id_no_kontrak',$no_kontrak);
        $barang_jadi->delete();
        $partial = Bc261::where('id_no_kontrak',$no_kontrak);
        $partial->delete();
        $pemasukan = Bc262::where('id_no_kontrak',$no_kontrak);
        $pemasukan->delete();
        $dok = dokumen261::where('id_no_kontrak',$no_kontrak);
        $dok->delete();
        $aju_261 = Aju261::where('id_no_kontrak',$no_kontrak);
        $aju_261->delete();
        $dok262 = dokumen262::where('id_no_kontrak',$no_kontrak);
        $dok262->delete();
        $kontrak = pj_kk::findOrFail($no_kontrak);
        $kontrak->delete();
        
        return redirect()->route('subkon.index');
        // return back();

    }

    public function UploadTPB($no_kontrak)
    {
        $pengeluaran261 =pj_kk::where('no_kontrak',$no_kontrak)->with('partial')->get();
        $material =pj_kk::where('no_kontrak',$no_kontrak)->with('Material')->get();
        $data_pengeluaran=$pengeluaran261->flatMap->partial;
        $data_material=$pengeluaran261->flatMap->Material;

        $pemasukan262 =pj_kk::where('no_kontrak',$no_kontrak)->with('pemasukan')->get();
        $BarangJadi =pj_kk::where('no_kontrak',$no_kontrak)->with('Barang_Jadi')->get();
        $barang_jadi=$pemasukan262->flatMap->Barang_Jadi;
        $data_pemasukan=$pemasukan262->flatMap->pemasukan;

        $pengeluaran=(new subkon)->UploadTPB_Pengeluaran($data_pengeluaran,$data_material);
        $pemasukan=(new subkon)->UploadTPB_Pemasukan($data_pemasukan,$barang_jadi);
        $data_array=array_merge($pengeluaran,$pemasukan);
        $data=[];
        foreach ($data_array as $key => $value) {
            $data[]=[
                'jenis_dok'=>$value['jenis_dok'],
                'no_dok'=>substr("000000".$value['no_dok'] ,-6),
                'tgl_dok'=>date('Y/m/d', strtotime($value['tgl_dok'])),
                'uraian_barang'=>$value['uraian_barang'],
                'jumlah_barang'=>$value['jumlah_barang'],
                'satuan'=>$value['satuan'],
                'sku'=>$value['sku'],


            ];
        }

        return Excel::download(new UploadTpbExport($data),'MASTER_UPLOAD_SIJANET '.$no_kontrak.'.xlsx');

    }

    public function monitoringExcel($no_kontrak)
    {
        // dd('a');
        $pengeluaran261 =pj_kk::where('no_kontrak',$no_kontrak)->with('partial')->get();
        $material =pj_kk::where('no_kontrak',$no_kontrak)->with('Material')->get();
        $data_pengeluaran=$pengeluaran261->flatMap->partial;
        $data_material=$pengeluaran261->flatMap->Material;

        $pemasukan262 =pj_kk::where('no_kontrak',$no_kontrak)->with('pemasukan')->get();
        $BarangJadi =pj_kk::where('no_kontrak',$no_kontrak)->with('Barang_Jadi')->get();
        $barang_jadi=$pemasukan262->flatMap->Barang_Jadi;
        $data_pemasukan=$pemasukan262->flatMap->pemasukan;

        $pengeluaran=(new subkon)->UploadTPB_Pengeluaran($data_pengeluaran,$data_material);
        $pemasukan=(new subkon)->UploadTPB_Pemasukan($data_pemasukan,$barang_jadi);
        $data=(new subkon)->monitoringExcel($pengeluaran,$pemasukan);
        $data_kontrak = pj_kk::findOrFail($no_kontrak);

        $data_partial=(new subkon)->data_partial($pengeluaran261);
        $material_all= (new  subkon)->data_material($material,$data_partial);
        $a=collect($material_all);
        $total_fabric=$a->where('gl_class','INFA')->sum('jumlah_keluar');
        $total_hanca=$a->where('hanca','HANCA')->sum('jumlah_keluar');

        $data_barangJadi= (new  subkon)->bc262($barang_jadi,$data_pemasukan);
        $b=collect($data_barangJadi);
        $TotalGarment=$b->where('retur',null)->sum('jumlah_pemasukan');
        $namaBarangJadi=$b->where('retur',null)->first();
        if($namaBarangJadi!=null){
            $deskripsi_barangjadi=$namaBarangJadi['deskripsi'];
        }else{
            $deskripsi_barangjadi=null;
        }
        if($TotalGarment>0 && $total_fabric>0){
            $y=$total_fabric/$TotalGarment;
            $jumlah=$total_fabric/$y;
        }
        else{
            $y=null;
            $jumlah=null;
        }
        $total_consumtif=[
           'total_fabric'=>$total_fabric,
           'total_garment'=>$TotalGarment,
           'total_consumtif'=>$y,
           'total_hanca'=> $total_hanca,
           'jumlah'=>$jumlah,
           'jenis_barang'=> $deskripsi_barangjadi,
        ];

        return Excel::download(new MonitoringSubkonExport($data_kontrak,$data,$total_consumtif),'Monitoring'.$no_kontrak.'.xlsx');
    }

    public function RekapJatuhTempo(Request $request)
    {
        $tgl_awal=$request->tgl_awal;
        $tgl_akhir=$request->tgl_akhir;
        $get_data=pj_kk::where('jatuh_tempo','>=',$tgl_awal)->where('jatuh_tempo','<=',$tgl_akhir)->get();
        $data=(new subkon)->MasterSubkon($get_data);


        return Excel::download(new RekapJatuhTempoExport($data),'Rekap Jatuh Tempo'.$tgl_awal.' s-d '.$tgl_akhir.'.xlsx');
       
    }

    public function getAju_261(Request $request)
    {
        $no_kontrak = $request->kontrak;
        $partial =pj_kk::where('no_kontrak',$no_kontrak)->with('partial')->get();
        $data_partial=(new subkon)->data_partial($partial);
        $aju_group= (new  subkon)->partial_group($data_partial);
        $title = strtoupper($request->title);
        $data = collect($aju_group)->filter(function ($item) use ($title) {
            return preg_match("/$title/",$item['no_aju']);
        });
        // dd($data);
        return response()->json($data);
    }

    public function getAju_262(Request $request)
    {
        // dd($request->all());
        $no_kontrak = $request->kontrak2;
        $data2 =pj_kk::where('no_kontrak',$no_kontrak)->with('pemasukan')->get();
        $data_pemasukan=$data2->flatMap->pemasukan;
        $pemasukan_group= (new  subkon)->pemasukan_group($data_pemasukan);
        $title = strtoupper($request->judul);
        $data = collect($pemasukan_group)->filter(function ($item) use ($title) {
            return preg_match("/$title/",$item['no_aju']);
        });
        
        return response()->json($data);
    }
   
    public function get_item(Request $request)
    {
        $data=ItemNumber::where('F4101_ITM',$request->ID)->first();
        return response()->json($data);
    }
    public function get_garment(Request $request)
    {
        $id=explode("-" , $request->ID);
        if(count($id)==3){
            $no_kontrak=$id[1].'-'.$id[2];
        }
        else{
            $no_kontrak=$id[1];
        }
        $data = material::where('id_no_kontrak',$no_kontrak)->where('item_number',$id[0])->first();
        // $data=ItemNumber::where('F4101_DSC1',$request->ID)->first();
        return response()->json($data);
    }

    public function rekapDetail($no_kontrak)
    {
        $pemasukan_aju=Bc262::where('id_no_kontrak',$no_kontrak)->where('qty','>',0)->get();

        $BarangJadi =pj_kk::where('no_kontrak',$no_kontrak)->with('Barang_Jadi')->get();
        $barang_jadi=$BarangJadi->flatMap->Barang_Jadi;
        $data_barangjadi= (new  subkon)->data_pemasukan($barang_jadi,$pemasukan_aju);
        $record= (new  subkon)->update_partial262($data_barangjadi,$pemasukan_aju);

        $map['rekap_detail']=$record;
        $map['no_kontrak'] = $no_kontrak;
        $map['page']='dashboard';
        return view('MatDoc.subkon.rekapDetail', $map);
    }

    public function Filter_rekapDetail(Request $request)
    {
        $a=Bc262::query();
        $a->where('id_no_kontrak',$request->no_kontrak)->where('qty','>',0);
        if($request->item_code!==null && $request->item_code!=='') {
            $a->whereRaw("kode_barang like '%".$request->item_code."%' ");
        }
        if($request->no_wo!==null && $request->no_wo!=='') {
            $a->whereRaw("no_wo like '%".$request->no_wo."%' ");
        }
        $pemasukan_aju=$a->get();
        $BarangJadi =pj_kk::where('no_kontrak',$request->no_kontrak)->with('Barang_Jadi')->get();
        $barang_jadi=$BarangJadi->flatMap->Barang_Jadi;
        $pemasukan=pj_kk::where('no_kontrak',$request->no_kontrak)->with('pemasukan')->get();
        $data_pemasukan=$pemasukan->flatMap->pemasukan;

        $data_barangjadi= (new  subkon)->data_pemasukan($barang_jadi,$data_pemasukan);
        $record= (new  subkon)->update_partial262($data_barangjadi,$pemasukan_aju);
        $map['rekap_detail']=$record;
        $map['no_kontrak'] = $request->no_kontrak;
        $map['page']='dashboard';
        return view('MatDoc.subkon.rekapDetail', $map);
    }
}
