<?php

namespace App\Http\Controllers\Warehouse;

use PDF;
use App\Branch;
use Illuminate\Http\Request;
use App\Exports\EkspedisiExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\MatDok\invoice\invoice;
use App\Models\Production\Finishing\AllSize;
use App\Models\Production\Finishing\PackingList;
use App\Models\Production\Finishing\PackingSize;
use App\Models\Marketing\RekapOrder\RekapDetail;
use App\Services\warehouse\packingList\pl_ekspedisi;

class PackingListController extends Controller
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

    public function index()
    {
        $page = 'dashboard';
        $today = date('Y-m-d');
        // Data Packing List semua branch yang sudah di approve di finishing to expedisi 
        // Beda nya jika di cileunyi di isi no seal nya 
        if (auth()->user()->branch == 'CLN') {
            $packing_list = PackingList::where('action','EXPEDISI')
                                        ->where('packing_to_expedisi','DONE')
                                        ->where('branchdetail',auth()->user()->branchdetail)
                                        ->where('no_kontainer',null)
                                        ->where('no_seal',null)
                                        ->get(); 
        }else {
            $packing_list = PackingList::where('action','EXPEDISI')
                                        ->where('packing_to_expedisi','DONE')
                                        ->where('branchdetail',auth()->user()->branchdetail)
                                        ->where('no_kontainer',null)
                                        ->get(); 
        }
        $dataBranch = Branch::all();
        $data_pl_cileunyi =  collect($packing_list->groupby('id_ekspedisi'));
        $data_branch_lain = collect($packing_list)->groupby('id_ekspedisi');

        // Perhitungan 
        $count_pl_cileunyi = collect($data_pl_cileunyi)->count();       
        $count_pl_branch_lain = collect($data_branch_lain)->count();       

        // Daily Target PL (khusus cileunyi, yang belum diapprove)
        $daily_target_pl = PackingList::where('action','EXPEDISI')
                            ->where('branchdetail', auth()->user()->branchdetail)
                            ->where('packing_to_expedisi','NEW')
                            ->get();
        $target_pl_count = collect($daily_target_pl)->count();       
        // dd($packing_list);

        // untuk table invoice list 
        $data_recap = PackingList::where('action','EXPEDISI')->where('no_kontainer','!=',null)->where('no_seal','!=',Null)->orderBy('id')->get();
        $invoice_all = PackingList::where('action','EXPEDISI')->where('no_kontainer','!=',null)->orderBy('id')->get();
        

        if (auth()->user()->branch == 'CLN' || auth()->user()->branch == 'MAJA') {
            if (auth()->user()->branch == 'CLN') {
                $data_invoice = collect($data_recap)->groupBy('no_seal');
            }elseif (auth()->user()->branch == 'MAJA') {
                $data_invoice = collect($invoice_all)->where('branchdetail',auth()->user()->branchdetail)->groupBy('kode_ekspedisi');
            }
        }else {
            $data_invoice = collect($invoice_all)->where('branchdetail',auth()->user()->branchdetail)->groupBy('kode_ekspedisi');
        }
        
        // khusus untuk cileunyi /
        if (auth()->user()->branch == 'CLN')
            $recap_inv = collect($invoice_all)->where('branch','!=','CLN')->Where('no_seal',Null)->groupBy('kode_ekspedisi');
        elseif (auth()->user()->branch == 'MAJA') {
            $recap_inv = collect($invoice_all)->where('tujuan', auth()->user()->branchdetail)->groupBy('kode_ekspedisi');
        }else {
            $recap_inv = [];
        }
        return view('warehouse.expedition2.PackingList.index', compact('dataBranch','recap_inv','today','page','invoice_all','data_invoice','data_pl_cileunyi','daily_target_pl','target_pl_count','data_branch_lain','count_pl_cileunyi','count_pl_branch_lain'));
    }

    public function detail($id_ekspedisi)
    {
        $page = 'dashboard';
        $dataExpedisi = PackingList::where('id_ekspedisi',$id_ekspedisi)
                                    ->where('action','EXPEDISI')
                                    ->where('packing_to_expedisi','DONE')
                                    ->get();    
        // dd($page);
        return view('warehouse.expedition2.PackingList.detail', compact('page','dataExpedisi'));
    }
    
    public function downloadpacking($kode_ekspedisi)
    {
        // dd($kode_ekspedisi);
        $page = 'dashboard';
        $datasurat = PackingList::where('no_seal',$kode_ekspedisi)->get();
        $cekdatasurat = collect($datasurat)->count();
        if($cekdatasurat == 0){
            $datasurat = PackingList::where('kode_ekspedisi',$kode_ekspedisi)->get();
        }
        // dd($datasurat);
        $result = collect($datasurat)->groupBy('no_surat_jalan')
                            ->map(function ($item) {
                                return array_merge(...$item->toArray());
                            })->values()->toArray();
        // dd($result);
        $IsianKotakPutih = collect($result)->first();
        $resume = (new pl_ekspedisi)->resume($datasurat);
        $jenisSize = collect($resume)->groupBy('nama_size');
        // dd($jenisSize);
        
        $dataTabel = collect($resume)->groupBy('wo');
        // dd($dataTabel);
        $rekap_detail = RekapDetail::all();
        
        return view('warehouse.expedition2.PackingList.downloadPL', compact('page','rekap_detail','resume','jenisSize','dataTabel','IsianKotakPutih'));
    }

    public function ekspedisiPDF($kode_ekspedisi)
    {
        $page = 'pdf';
        $datasurat = PackingList::where('kode_ekspedisi',$kode_ekspedisi)->get();
        $result = collect($datasurat)->groupBy('no_surat_jalan')
                            ->map(function ($item) {
                                return array_merge(...$item->toArray());
                            })->values()->toArray();
        $IsianKotakPutih = collect($result)->first();
        $resume = (new pl_ekspedisi)->resume($datasurat);

        $jenisSize = collect($resume)->groupBy('nama_size');
        $dataTabel = collect($resume)->groupBy('wo');
        $rekap_detail = RekapDetail::all();

        $customPaper = array(0,0,600,1250);
        $pdf =PDF::setOptions([
         'tempDir' => public_path(),
         'chroot'  => storage_path('/app/public/databaseSmv'),
        ])->loadview('warehouse.expedition2.PackingList.ekspedisiPDF', compact('page','rekap_detail','resume','jenisSize','dataTabel','IsianKotakPutih'))->setPaper($customPaper,'landscape','center');
         return $pdf->stream("PACKINGLIST".$IsianKotakPutih['buyer'].".pdf");
    }

    public function ekspedisiExcel($kode_ekspedisi)
    {
        $datasurat = PackingList::where('kode_ekspedisi',$kode_ekspedisi)->get();
        $result = collect($datasurat)->groupBy('no_surat_jalan')
                            ->map(function ($item) {
                                return array_merge(...$item->toArray());
                            })->values()->toArray();
        $IsianKotakPutih = collect($result)->first();
        $resume = (new pl_ekspedisi)->resume($datasurat);

        $jenisSize = collect($resume)->groupBy('nama_size');
        $dataTabel = collect($resume)->groupBy('wo');
        $rekap_detail = RekapDetail::all();
        // dd($dataTabel);

        return Excel::download(new EkspedisiExport($resume,$jenisSize,$dataTabel,$IsianKotakPutih, $rekap_detail),'_DAILY_RESUME_EKSPEDISI.xlsx');
    }

    public function updateEkspedisi(Request $request)
    {
        // dd($request->all());
        $page = 'dashboard';
        $auto_number = $this->generateAutoNumber();
        for ($i=0; $i < count($request->cek); $i++) { 
            if($request->cek[$i]==1){
                    $id_ekspedisi[]=$request->id_ekspedisi[$i];
            }
        }
        $tabel_1=PackingList::wherein('id_ekspedisi', $id_ekspedisi)->get();
        // dd($tabel_1);
        $data_1=[];
        foreach ($tabel_1 as $key1 => $value1) {
            $data_1=[
                'id'=>$value1->id,
                'no_surat_jalan'=>$request->no_surat_jalan,
                'no_surat_jalan2'=>$request->no_surat_jalan2,
                'no_kontainer'=>$request->no_kontainer,
                'no_kontainer2'=>$request->no_kontainer2,
                'no_seal'=>$request->no_seal,
                'no_seal2'=>$request->no_seal2,
                'jenis_doct'=>$request->jenis_doct,
                'no_doct'=>$request->no_doct,
                'invoice'=>$request->invoice,
                'tanggal_surat'=>$request->tanggal_surat,
                'shipment_date'=>$request->shipment_date,
                'tujuan'=>$request->tujuan,
                'kode_ekspedisi'=>$auto_number,
            ];
            // dd($data_1);
            PackingList::whereid($value1->id)->update($data_1);
        }
            // dd($data_1);
        $a=PackingSize::wherein('id_ekspedisi',$id_ekspedisi)->get();
        $b=AllSize::wherein('id_ekspedisi',$id_ekspedisi)->get();
        foreach ($a as $key2 => $value2) {
            $y=[
                'no_surat_jalan' =>$request->no_surat_jalan,
                'kode_ekspedisi'=>$auto_number,
            ];
                PackingSize::whereid_ekspedisi($value2->id_ekspedisi)->update($y);
        }
            foreach ($b as $key3 => $value3) {
            $x=[
                'no_surat_jalan' =>$request->no_surat_jalan,
                'kode_ekspedisi'=>$auto_number,
            ];
                AllSize::whereid_ekspedisi($value3->id_ekspedisi)->update($x);
        }            
        return redirect()->back()->with('success', ' successfully updated');
    }

    public function generateAutoNumber() {
        $tgl=date('dmy-');
        //mencari no tiket terbesar sesuai tgl sekarang
        $tiket = PackingList::where('kode_ekspedisi','LIKE',$tgl."%")
        ->max('kode_ekspedisi');

        $table_no=substr($tiket,7,3);
        $tgl = date("dmy-"); 
        $no= $tgl.$table_no;
        $auto=substr($no,7);
        $auto=intval($auto)+1;
        $auto_number=substr($no,0,7).str_repeat(0,(3-strlen($auto))).$auto;

        return $auto_number;
    }

    public function UpdateSuratjalan(Request $request,$kode_ekspedisi)
    {
        $page = 'dashboard';
        $dataPacking=PackingList::where('kode_ekspedisi',$kode_ekspedisi)->get();
        $dataPackingUpdate= [
            'placement'=>$request->placement ?? 0,
        ];
        // dd($dataPackingUpdate);
        PackingList::wherekode_ekspedisi($kode_ekspedisi)->update($dataPackingUpdate);
        return redirect()->back()->with('success', ' successfully updated');
    }

    public function edit_details($kode_ekspedisi)
    {
        // dd($kode_ekspedisi);
        $page ='dashboard';
        $datasurat = PackingList::where('no_seal',$kode_ekspedisi)->get();

        return view('warehouse.expedition2.PackingList.partials.siedit', compact('page','datasurat'));
    }

    public function siedit($id)
    {
        // dd($kode_ekspedisi);
        $page ='dashboard';
        $kode_ekspedisi = $id;
        $datasurat = PackingList::where('kode_ekspedisi',$kode_ekspedisi)->get();
        $datawo = PackingList::where('action','EXPEDISI')
                                ->where('packing_to_expedisi','DONE')
                                ->where('id_ekspedisi','!=',null)
                                ->where('no_surat_jalan','=',null)
                                ->get();
        $collectionData = (new  pl_ekspedisi)->edit_detail($kode_ekspedisi,$datasurat);

        return view('warehouse.expedition2.PackingList.partials.edit', compact('page','collectionData','datasurat','datawo'));
    }

    public function addWo( Request $request)
    {
        $data = (new  pl_ekspedisi)->addWo($request);
        return back();
    }

    public function UpdateInvoice(Request $request,$kode_ekspedisi)
    {
        // dd($request->all());
        $page = 'dashboard';
        $dataPacking=PackingList::where('kode_ekspedisi',$kode_ekspedisi)->get();
        $dataUpdateInvoice= [
            'no_surat_jalan'=>$request->no_surat_jalan,
            'no_surat_jalan2'=>$request->no_surat_jalan2,
            'no_kontainer'=>$request->no_kontainer,
            'no_seal'=>$request->no_seal,
            'no_seal2'=>$request->no_seal2,
            'jenis_doct'=>$request->jenis_doct,
            'no_doct'=>$request->no_doct,
            'invoice'=>$request->invoice,
            'tanggal_surat'=>$request->tanggal_surat,
        ];
        PackingList::wherekode_ekspedisi($kode_ekspedisi)->update($dataUpdateInvoice);
        return redirect()->route('warehouse-packing')->with('success', ' successfully updated');
    }

    public function report_wo()
    {
        // dd('haii');
        $page = 'RekapWo';

        return view('warehouse.expedition2.PackingList.report_wo', compact('page'));
    }
}