<?php

namespace App\Http\Controllers\Warehouse;

use Auth;
use PDF;
use App\Branch;
use Illuminate\Http\Request;
use App\Exports\EkspedisiExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;
use App\Models\Warehouse\dataEkspedisi;
use Illuminate\Support\Facades\Redirect;
use App\Models\Finising\finising_checker;
use App\Models\Finising\finising_packing;
use phpDocumentor\Reflection\Types\Null_;
use App\Models\Finising\finising_packingList;
use App\Services\warehouse\packingList\ekspedisi;
use App\Models\Finising\finishing_packing_all_size;
use App\Models\Finising\finising_packing_report_size;
use App\Services\Production\Finishing\ekspedisiResume;
use App\Services\Production\Finishing\finishingToEkspedisi;

class PackingListController2 extends Controller
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
        $dataExpedisi = finising_packingList::where('action','=','EXPEDISI')
                        ->get();    
        $countFull = finising_packingList::where('action','=','EXPEDISI')->where('packing_to_expedisi','=','NEW')
                        ->count();    
        $jumlahData = finising_packingList::where('action','=','EXPEDISI')->where('packing_to_expedisi','=','DONE')->count();
        $dataByBuyer=collect($dataExpedisi)->groupBy('buyer');
        $dataData=[];
        $dataDataDone=[];
        foreach ($dataByBuyer as $key => $value) {
            foreach ($value as $key5 => $value5) {
                if ( $value5['packing_to_expedisi']== 'NEW') {
                    $dataData[]=[
                        'id' => $value5->id,
                        'buyer' => $value5->buyer,
                        'wo' => $value5->wo,
                        'po' => $value5->po,
                        'or_number' => $value5->or_number,
                        'tanggal' => $value5->tanggal,
                        'style' => $value5->style,
                        'qty' => $value5->qty,
                        'packing_to_expedisi' => $value5->packing_to_expedisi,

                    ];
                } elseif ($value5['packing_to_expedisi']== 'DONE') {
            // $jumlahDataEkspedisiSum = finising_packingList::where('action','=','EXPEDISI')->where('buyer',$key)->where('packing_to_expedisi','=','DONE')
            // ->where('id_ekspedisi',$value5['id_ekspedisi'])->count();
                     $dataDataDone[]=[
                        'id' => $value5->id,
                        'buyer' => $value5->buyer,
                        'wo' => $value5->wo,
                        'po' => $value5->po,
                        'or_number' => $value5->or_number,
                        'tanggal' => $value5->tanggal,
                        'style' => $value5->style,
                        'qty' => $value5->qty,
                        'packing_to_expedisi' => $value5->packing_to_expedisi,
                        'id_ekspedisi' => $value5->id_ekspedisi,
                        // 'jumlahDataEkspedisiSum' => $jumlahDataEkspedisiSum,
                        
                    ];
        
                }
            }
        }  

        return view('warehouse.expedition.packing_list.index', compact('page','dataDataDone','dataExpedisi','jumlahData'));
    }

    public function detail($id_ekspedisi)
    {
        $page = 'dashboard';
        $dataExpedisi = finising_packingList::where('id_ekspedisi',$id_ekspedisi)
                        ->where('action','=','EXPEDISI')
                        ->where('packing_to_expedisi','=','DONE')
                        ->get();    
        return view('warehouse.expedition2.packing_list.detail', compact('page','dataExpedisi'));
    }

    public function downloadpacking(Request $request,$kode_ekspedisi)
    {
        $page = 'dashboard';
        $datasurat = finising_packingList::where('kode_ekspedisi',$kode_ekspedisi)->get();
        $data=[];
        foreach ($datasurat as $key => $value) {
            $data[]=[
                'no_surat_jalan'=>$value['no_surat_jalan'],
                'no_surat_jalan2'=>$value['no_surat_jalan2'],
                'invoice'=>$value['invoice'],
                'buyer'=>$value['buyer'],
                'no_kontainer'=>$value['no_kontainer'],
                'no_kontainer2'=>$value['no_kontainer2'],
                'no_seal'=>$value['no_seal'],
                'no_seal2'=>$value['no_seal2'],
                'jenis_doct'=>$value['jenis_doct'],
                'no_doct'=>$value['no_doct'],
                'tanggal_surat'=>$value['tanggal_surat'],
                'kode_ekspedisi'=>$value['kode_ekspedisi'],
            ];
        }

        $data1=collect($data)->groupBy('no_surat_jalan');
        $sizeForTabel = [];
            foreach ($data1 as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('no_surat_jalan')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $sizeForTabel= [
                        'no_surat_jalan' => $value2['no_surat_jalan'],                       
                        'no_surat_jalan2' => $value2['no_surat_jalan2'],                       
                        'invoice' => $value2['invoice'],                       
                        'buyer' => $value2['buyer'],                       
                        'no_kontainer' => $value2['no_kontainer'],                       
                        'no_kontainer2' => $value2['no_kontainer2'],                       
                        'no_seal' => $value2['no_seal'],                       
                        'no_seal2' => $value2['no_seal2'],                       
                        'jenis_doct' => $value2['jenis_doct'],                       
                        'no_doct' => $value2['no_doct'],                       
                        'tanggal_surat' => $value2['tanggal_surat'],    
                        'kode_ekspedisi' => $value2['kode_ekspedisi'],    
                    ];
                }  
            }
        $collectionData= collect($sizeForTabel);
        $dataSize =finising_packing_report_size::where('kode_ekspedisi',$kode_ekspedisi)->get();
        $dataSizeJumlah =finishing_packing_all_size::where('kode_ekspedisi',$kode_ekspedisi)->where('jumlah_size','!=','0')->get();
        $dataToEkspedisi=[];
            foreach ($dataSizeJumlah as $key => $value) {
            $qty_cartonSum=collect($dataSizeJumlah)->where('nama_size',$value['nama_size'])
                            ->where('jumlah_size',$value['jumlah_size'])
                            ->where('color_code',$value['color_code'])
                            ->where('qty_carton',$value['qty_carton'])
                            ->sum('qty_carton');
                $dataToEkspedisi[]=[
                    'id'=>$value->id,
                    'id_packing'=>$value->id_packing,
                    'id_ekspedisi'=>$value->id_ekspedisi,
                    'kode_ekspedisi'=>$value->kode_ekspedisi,
                    'nama_size'=>$value->nama_size,
                    'color_code'=>$value->color_code,
                    'jumlah_size'=>$value->jumlah_size,
                    'qty_carton'=>$qty_cartonSum,
                    
                ];
            }

        $totalPCS =finishing_packing_all_size::where('kode_ekspedisi',$kode_ekspedisi)->sum('jumlah_size');
        $dataSizeJumlahOFFctn =finising_packing_report_size::where('kode_ekspedisi',$kode_ekspedisi)->sum('qty_carton');
        $dataQtyCarton=finising_packing_report_size::where('kode_ekspedisi',$kode_ekspedisi)->sum('qty_carton');
        $dataWo = finishing_packing_all_size::where('kode_ekspedisi',$kode_ekspedisi)->first();
        
            $tes = (new  ekspedisi)->data_detail($kode_ekspedisi);
            $dataByNamaSize = (new  ekspedisi)->dataByNamaSizeByID($kode_ekspedisi);
            $collectByQtyCarton= (new  ekspedisi)->dataEkspedisiPacking($kode_ekspedisi);
            $JumlahSize = (new  ekspedisi)->JumlahTotal( $collectByQtyCarton,$kode_ekspedisi );
            $JumlahTotalSize = (new  ekspedisi)->sizeJumlah($kode_ekspedisi);
            $JumlahTotalSizePerWo = (new  ekspedisi)->sizeJumlahPerwo($kode_ekspedisi);
            $dataJumlahPerSize = (new  ekspedisi)->dataJumlahPerSize($kode_ekspedisi);
            $dataJumlahPerSizeCount = (new  ekspedisi)->jumlahColspanName($kode_ekspedisi);
            $dataEkspedisiPacking=collect($collectByQtyCarton)->groupBy('wo');
            $sumCarton=collect($collectByQtyCarton)->sum('qty_carton');

                //  dd($dataEkspedisiPacking);
        return view('warehouse.expedition2.packing_list.downloadPL', compact('page','collectionData','dataByNamaSize','data','dataSize','dataSizeJumlah','dataSizeJumlahOFFctn','dataEkspedisiPacking','JumlahTotalSize','JumlahSize','dataJumlahPerSize','dataJumlahPerSizeCount','dataToEkspedisi','collectByQtyCarton','JumlahTotalSizePerWo','sumCarton','dataWo'));
    }

    public function storeData(Request $request)
    {
        $tanggal=date('Y-m-d');

        $input=[
            'id'              =>$request->id,
            'no_surat_jalan'  =>$request->no_surat_jalan,
            'no_kontainer'    =>$request->no_kontainer,
            'no_seal'         =>$request->no_seal,
            'jenis_doct'      =>$request->jenis_doct,
            'no_doct'         =>$request->no_doct,
            'tanggal_surat'   =>$request->tanggal_surat,
            "branch"          => auth()->user()->branch,
            "branchdetail"    => auth()->user()->branchdetail,

        ];      

        $validatedInput = $request->validate([

        ]);       
            dataEkspedisi::create($input);
        return redirect()->back()->with("succes",'data berhasil disimpan dong');
    }

     public function index2()
    {
        $page = 'dashboard';
        $dataBranch=Branch::all();
        $user = auth()->user()->branchdetail;
        $dataExpedisiDetail = finising_packingList::where('branchdetail', $user)
                        ->where('action','=','EXPEDISI')
                        ->where('packing_to_expedisi','=','DONE')
                        ->where('no_kontainer','=',null)
                        ->get(); 
        $dataData=[]; 
        foreach ($dataExpedisiDetail as $key => $value) {
                    $dataData[]=[
                        'id' => $value['id'],
                        'id_ekspedisi' => $value['id_ekspedisi'],
                        'tanggal' => $value['tanggal'],
                        'placement' => $value['placement'],
                    ];   
            }     
        $dataBuyerSatu=collect($dataData)->groupBy('id_ekspedisi');
        $dataExpedisiPerID = [];
            foreach ($dataBuyerSatu as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('id_ekspedisi')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $dataExpedisiPerID[] = [
                        'id' => $value2['id'],
                        'id_ekspedisi' => $value2['id_ekspedisi'],
                        'tanggal' => $value2['tanggal'],
                        'placement' => $value2['placement'],
                    ];
                }  
            }
            
        $dataExpedisiCilenyi = finising_packingList::where('action','=','EXPEDISI')
                        ->where('branchdetail', 'CLN')
                        ->where('packing_to_expedisi','=','DONE')
                        ->where('no_seal','=',Null)
                        // ->orderByDesc('tanggal')
                        ->get(); 
        $dataCilenyi=[]; 
        foreach ($dataExpedisiCilenyi as $key => $value) {
                $dataCilenyi[]=[
                    'id' => $value['id'],
                    'id_ekspedisi' => $value['id_ekspedisi'],
                    'tanggal' => $value['tanggal'],
                    'placement' => $value['placement'],
                    'buyer' => $value['buyer'],
                    'style' => $value['style'],
                    'branchdetail' => $value['branchdetail'],
                ];   
            }     
        $dataBuyerCilenyi=collect($dataCilenyi)->groupBy('id_ekspedisi');
        $dataExpedisiCilenyiAll = [];
            foreach ($dataBuyerCilenyi as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('id_ekspedisi')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $dataExpedisiCilenyiAll[] = [
                        'id' => $value2['id'],
                        'id_ekspedisi' => $value2['id_ekspedisi'],
                        'tanggal' => $value2['tanggal'],
                        'placement' => $value2['placement'],
                        'buyer' => $value2['buyer'],
                        'style' => $value2['style'],
                        'branchdetail' => $value2['branchdetail'],
                    ];
                }  
            }  
        $dataExpedisiDaily = finising_packingList::where('branchdetail', $user)->where('action','=','EXPEDISI')
                        ->where('packing_to_expedisi','=','NEW')
                        ->get();    
        $dataExpedisiCount = finising_packingList::where('branchdetail', $user)->where('action','=','EXPEDISI')
                        ->where('packing_to_expedisi','=','NEW')
                        ->count();    
        $jumlahData = finising_packingList::where('branchdetail', $user)->where('action','=','EXPEDISI')->where('packing_to_expedisi','=','DONE')->count();
        $dataByBuyer=collect($dataExpedisiDetail)->groupBy('buyer');
        $dataData=[];
        $dataDataDone=[];
        foreach ($dataByBuyer as $key => $value) {
            foreach ($value as $key5 => $value5) {
                if ( $value5['packing_to_expedisi']== 'NEW') {
                    $dataData[]=[
                        'id' => $value5->id,
                        'buyer' => $value5->buyer,
                        'wo' => $value5->wo,
                        'po' => $value5->po,
                        'or_number' => $value5->or_number,
                        'tanggal' => $value5->tanggal,
                        'style' => $value5->style,
                        'qty' => $value5->qty,
                        'packing_to_expedisi' => $value5->packing_to_expedisi,

                    ];
                } elseif ($value5['packing_to_expedisi']== 'DONE') {

                     $dataDataDone[]=[
                        'id' => $value5->id,
                        'buyer' => $value5->buyer,
                        'wo' => $value5->wo,
                        'po' => $value5->po,
                        'or_number' => $value5->or_number,
                        'tanggal' => $value5->tanggal,
                        'style' => $value5->style,
                        'qty' => $value5->qty,
                        'packing_to_expedisi' => $value5->packing_to_expedisi,
                        'id_ekspedisi' => $value5->id_ekspedisi,
                        
                    ];
        
                }
            }
        }  

        $dataDoneExpedisi = finising_packingList::where('branchdetail', $user)->where('action','=','EXPEDISI')
        ->where('no_kontainer','!=',null)
        ->get();
        $data1=collect($dataDoneExpedisi)->groupBy('no_seal');
        $sizeForTabel = [];
            foreach ($data1 as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('no_seal')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $sizeForTabel[] = [
                        'id' => $value2['id'],                       
                        'no_surat_jalan' => $value2['no_surat_jalan'],                       
                        'no_surat_jalan2' => $value2['no_surat_jalan2'],                       
                        'kode_ekspedisi' => $value2['kode_ekspedisi'],                       
                        'no_kontainer' => $value2['no_kontainer'],                       
                        'no_seal' => $value2['no_seal'],                       
                        'jenis_doct' => $value2['jenis_doct'],                       
                        'no_doct' => $value2['no_doct'],                       
                        'tanggal_surat' => $value2['tanggal_surat'],                       
                        'id_ekspedisi' => $value2['id_ekspedisi'],                       
                        'invoice' => $value2['invoice'],     
                         'placement' => $value2['placement'],                    
                    ];
                }  
            } 
        $dataDoneExpedisiCilenyi = finising_packingList::where('action','=','EXPEDISI')
        ->where('no_kontainer','!=',null)
        ->where('no_seal','!=',Null)
        ->orderByDesc('id')
        ->get();
        // dd($dataDoneExpedisiCilenyi);
        $data1=collect($dataDoneExpedisiCilenyi)->groupBy('no_seal');
        $dataSortBy = [];
            foreach ($data1 as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('no_seal')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $dataSortBy[] = [
                        'id' => $value2['id'],                       
                        'no_surat_jalan' => $value2['no_surat_jalan'],                       
                        'no_surat_jalan2' => $value2['no_surat_jalan2'],                       
                        'kode_ekspedisi' => $value2['kode_ekspedisi'],                       
                        'no_kontainer' => $value2['no_kontainer'],                       
                        'no_seal' => $value2['no_seal'],                       
                        'jenis_doct' => $value2['jenis_doct'],                       
                        'no_doct' => $value2['no_doct'],                       
                        'tanggal_surat' => $value2['tanggal_surat'],                       
                        'id_ekspedisi' => $value2['id_ekspedisi'],                       
                        'placement' => $value2['placement'],                       
                        'invoice' => $value2['invoice'],                       
                    ];
                }  
            } 
            $sizeForTabelCilenyi= collect($dataSortBy)->sortByDesc('tanggal_surat');
       
            $dataIdekspedisi = (new  ekspedisi)->expedisi_details();
            $dataIdekspedisiCilenyi = (new  ekspedisi)->expedisi_detailsCilenyi();
            $countFull =count($dataIdekspedisi);  
            $jumlahcilenyi =count($dataIdekspedisiCilenyi);  
        return view('warehouse.expedition2.packing_list.index', compact('page','dataDataDone','jumlahData','sizeForTabel','dataExpedisiCount','dataExpedisiDaily','countFull','dataIdekspedisi','dataExpedisiDetail','dataExpedisiPerID','dataBranch','dataExpedisiCilenyiAll','jumlahcilenyi','sizeForTabelCilenyi'));
    }

    public function data_details(Request $request,$id)
    {
        $page ='dashboard';
        $data = finising_packingList::findOrfail($id);

        $dataSize =finising_packing_report_size::where('id_packing',$id)->get();
        $dataSizeJumlah =finishing_packing_all_size::where('id_packing_size',$id)->get();
        $dataSizeJumlahOFFctn =finising_packing_report_size::where('id_packing',$id)->sum('qty_carton');
        $dataQtyCarton=finising_packing_report_size::where('id_packing',$id)->sum('qty_carton');
          
            $results = (new  finishingToEkspedisi)->data_detail($id);
            $data = $results["data"];
            $sizes = $results["sizes"];
            $namaSizes = $results['nama_sizes'];
            
            $dataByNamaSize = (new  finishingToEkspedisi)->dataByNamaSizeByID($id);
            // $JumlahSize = (new  finishingToEkspedisi)->JumlahTotal( $tes,$id );
            $JumlahTotalSize = (new  finishingToEkspedisi)->sizeJumlah($id);
            $dataJumlahPerSize = (new  finishingToEkspedisi)->dataJumlahPerSize($id);

        return view('warehouse.expedition2.packing_list.data_details', compact('page','dataByNamaSize','data','dataSize','dataSizeJumlah','dataSizeJumlahOFFctn','results','JumlahTotalSize','dataJumlahPerSize','sizes','namaSizes'));
    }
    
    public function edit_details(Request $request,$kode_ekspedisi)
    {
        // dd($kode_ekspedisi);
        $page ='dashboard';
        $datasurat = finising_packingList::where('kode_ekspedisi',$kode_ekspedisi)->get();
        $datawo = finising_packingList::where('action','EXPEDISI')
                    ->where('packing_to_expedisi','DONE')
                    ->where('id_ekspedisi','!=',null)
                    ->where('no_surat_jalan','=',null)
                    ->get();
        $collectionData = (new  ekspedisi)->edit_detail($kode_ekspedisi,$datasurat);

        return view('warehouse.expedition2.packing_list.partials.edit', compact('page','collectionData','datasurat','datawo'));
    }

    public function addWo( Request $request)
    {
        $data = (new  ekspedisiResume)->addWo($request);
        return back();
    }

    public function getDataWo(Request $request)
    {
        $id = $request->id;
        $data=finising_packingList::where("id",$request->id)->first();

        return response()->json($data);
    }

    public function generateAutoNumber() {
        $tgl=date('dmy-');
            //mencari no tiket terbesar sesuai tgl sekarang
            $tiket = finising_packingList::where('kode_ekspedisi','LIKE',$tgl."%")
            ->max('kode_ekspedisi');

            $table_no=substr($tiket,7,3);
            $tgl = date("dmy-"); 
            $no= $tgl.$table_no;
            $auto=substr($no,7);
            $auto=intval($auto)+1;
            $auto_number=substr($no,0,7).str_repeat(0,(3-strlen($auto))).$auto;

        return $auto_number;
    }

     public function updateEkspedisi(Request $request)
    {
         $page = 'dashboard';
            $auto_number = $this->generateAutoNumber();
            for ($i=0; $i < count($request->cek); $i++) { 
                if($request->cek[$i]==1){
                     $id_ekspedisi[]=$request->id_ekspedisi[$i];
                }
            }
            $tabel_1=finising_packingList::wherein('id_ekspedisi', $id_ekspedisi)->get();
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
                    'kode_ekspedisi'=>$auto_number,
                ];
                finising_packingList::whereid($value1->id)->update($data_1);
            }
            // dd($data_1);
            $a=finising_packing_report_size::wherein('id_ekspedisi',$id_ekspedisi)->get();
            $b=finishing_packing_all_size::wherein('id_ekspedisi',$id_ekspedisi)->get();
            foreach ($a as $key2 => $value2) {
                $y=[
                   'no_surat_jalan' =>$request->no_surat_jalan,
                   'kode_ekspedisi'=>$auto_number,
                ];
                 finising_packing_report_size::whereid_ekspedisi($value2->id_ekspedisi)->update($y);
            }
             foreach ($b as $key3 => $value3) {
                $x=[
                   'no_surat_jalan' =>$request->no_surat_jalan,
                   'kode_ekspedisi'=>$auto_number,
                ];
                 finishing_packing_all_size::whereid_ekspedisi($value3->id_ekspedisi)->update($x);
            }            
        return redirect()->back()->with('success', ' successfully updated');
    }


     public function UpdateSuratjalan(Request $request,$kode_ekspedisi)
    {
         $page = 'dashboard';
            $dataPacking=finising_packingList::where('kode_ekspedisi',$kode_ekspedisi)->get();
                $dataPackingUpdate= [
                       'placement'=>$request->placement ?? 0,
                    ];
                    // dd($dataPackingUpdate);
              finising_packingList::wherekode_ekspedisi($kode_ekspedisi)->update($dataPackingUpdate);
        return redirect()->back()->with('success', ' successfully updated');

    }
     public function UpdateInvoice(Request $request,$kode_ekspedisi)
    {

        // dd($request->all());
         $page = 'dashboard';
            $dataPacking=finising_packingList::where('kode_ekspedisi',$kode_ekspedisi)->get();
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
              finising_packingList::wherekode_ekspedisi($kode_ekspedisi)->update($dataUpdateInvoice);
        return redirect()->route('warehouse-packing2')->with('success', ' successfully updated');

    }

    public function ekspedisiPDF(Request $request, $kode_ekspedisi)
    {
        $datasurat = finising_packingList::where('kode_ekspedisi',$kode_ekspedisi)->get();
        $data=[];
        foreach ($datasurat as $key => $value) {
            $data[]=[
                'no_surat_jalan'=>$value['no_surat_jalan'],
                'invoice'=>$value['invoice'],
                'no_surat_jalan2'=>$value['no_surat_jalan2'],
                'buyer'=>$value['buyer'],
                'no_kontainer'=>$value['no_kontainer'],
                'no_kontainer2'=>$value['no_kontainer2'],
                'no_seal'=>$value['no_seal'],
                'no_seal2'=>$value['no_seal2'],
                'jenis_doct'=>$value['jenis_doct'],
                'no_doct'=>$value['no_doct'],
                'tanggal_surat'=>$value['tanggal_surat'],
            ];
        }

        $data1=collect($data)->groupBy('no_surat_jalan');
        $sizeForTabel = [];
            foreach ($data1 as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('no_surat_jalan')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $sizeForTabel= [
                        'no_surat_jalan' => $value2['no_surat_jalan'],                       
                        'invoice' => $value2['invoice'],                       
                        'no_surat_jalan2' => $value2['no_surat_jalan2'],                       
                        'buyer' => $value2['buyer'],                       
                        'no_kontainer' => $value2['no_kontainer'],                       
                        'no_kontainer2' => $value2['no_kontainer2'],                       
                        'no_seal' => $value2['no_seal'],                       
                        'no_seal2' => $value2['no_seal2'],                       
                        'jenis_doct' => $value2['jenis_doct'],                       
                        'no_doct' => $value2['no_doct'],                       
                        'tanggal_surat' => $value2['tanggal_surat'],    
                    ];
                }  
            }
        $collectionData= collect($sizeForTabel);
        $dataSize =finising_packing_report_size::where('kode_ekspedisi',$kode_ekspedisi)->get();
        $dataSizeJumlah =finishing_packing_all_size::where('kode_ekspedisi',$kode_ekspedisi)->get();
        $dataToEkspedisi=[];
            foreach ($dataSizeJumlah as $key => $value) {
            $qty_cartonSum=collect($dataSizeJumlah)->where('nama_size',$value['nama_size'])
                            ->where('jumlah_size',$value['jumlah_size'])
                            ->where('color_code',$value['color_code'])
                            ->where('qty_carton',$value['qty_carton'])
                            ->sum('qty_carton');
                $dataToEkspedisi[]=[
                    'id'=>$value->id,
                    'id_packing'=>$value->id_packing,
                    'id_ekspedisi'=>$value->id_ekspedisi,
                    'kode_ekspedisi'=>$value->kode_ekspedisi,
                    'nama_size'=>$value->nama_size,
                    'color_code'=>$value->color_code,
                    'jumlah_size'=>$value->jumlah_size,
                    'qty_carton'=>$qty_cartonSum,
                    
                ];
            }
        $totalPCS =finishing_packing_all_size::where('kode_ekspedisi',$kode_ekspedisi)->sum('jumlah_size');
        $dataSizeJumlahOFFctn =finising_packing_report_size::where('kode_ekspedisi',$kode_ekspedisi)->sum('qty_carton');
        $dataQtyCarton=finising_packing_report_size::where('kode_ekspedisi',$kode_ekspedisi)->sum('qty_carton');
        
            $tes = (new  ekspedisi)->data_detail($kode_ekspedisi);
            $dataByNamaSize = (new  ekspedisi)->dataByNamaSizeByID($kode_ekspedisi);
            $a = (new  ekspedisi)->dataEkspedisiPacking($kode_ekspedisi);
            $JumlahSize = (new  ekspedisi)->JumlahTotal( $a,$kode_ekspedisi );
            $JumlahTotalSize = (new  ekspedisi)->sizeJumlah($kode_ekspedisi);
            $dataJumlahPerSize = (new  ekspedisi)->dataJumlahPerSize($kode_ekspedisi);
            $dataJumlahPerSizeCount = (new  ekspedisi)->jumlahColspanName($kode_ekspedisi);
            $dataEkspedisiPacking=collect($a)->groupBy('wo');
            $sumCarton=collect($a)->sum('qty_carton');
        $dataWo = finishing_packing_all_size::where('kode_ekspedisi',$kode_ekspedisi)->first();

        $customPaper = array(0,0,600,1250);
        $pdf =PDF::setOptions([
         'tempDir' => public_path(),
         'chroot'  => storage_path('/app/public/databaseSmv'),
      ])->loadview('warehouse.expedition2.packing_list.ekspedisiPDF', compact('collectionData','dataByNamaSize','data','dataSize','dataSizeJumlah','dataSizeJumlahOFFctn','dataEkspedisiPacking','JumlahTotalSize','JumlahSize','dataJumlahPerSize','dataJumlahPerSizeCount','dataToEkspedisi','sumCarton','dataWo' ))->setPaper($customPaper,'landscape','center');
         return $pdf->stream("PACKINGLIST $dataWo->buyer".".pdf");
    }

    public function ekspedisiExcel(Request $request , $kode_ekspedisi)
    {

        $datasurat = finising_packingList::where('kode_ekspedisi',$kode_ekspedisi)->get();
        $data=[];
        foreach ($datasurat as $key => $value) {
            $data[]=[
                'no_surat_jalan'=>$value['no_surat_jalan'],
                'invoice'=>$value['invoice'],
                'no_surat_jalan2'=>$value['no_surat_jalan2'],
                'buyer'=>$value['buyer'],
                'no_kontainer'=>$value['no_kontainer'],
                'no_kontainer2'=>$value['no_kontainer2'],
                'no_seal'=>$value['no_seal'],
                'no_seal2'=>$value['no_seal2'],
                'jenis_doct'=>$value['jenis_doct'],
                'no_doct'=>$value['no_doct'],
                'tanggal_surat'=>$value['tanggal_surat'],
            ];
        }

        $data1=collect($data)->groupBy('no_surat_jalan');
            $sizeForTabel = [];
            foreach ($data1 as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('no_surat_jalan')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $sizeForTabel= [
                        'no_surat_jalan' => $value2['no_surat_jalan'],                       
                        'invoice' => $value2['invoice'],                       
                        'no_surat_jalan2' => $value2['no_surat_jalan2'],                       
                        'buyer' => $value2['buyer'],                       
                        'no_kontainer' => $value2['no_kontainer'],                       
                        'no_kontainer2' => $value2['no_kontainer2'],                       
                        'no_seal' => $value2['no_seal'],                       
                        'no_seal2' => $value2['no_seal2'],                       
                        'jenis_doct' => $value2['jenis_doct'],                       
                        'no_doct' => $value2['no_doct'],                       
                        'tanggal_surat' => $value2['tanggal_surat'],    
                    ];
                }  
            }
        $collectionData= collect($sizeForTabel);

        $dataSize =finising_packing_report_size::where('kode_ekspedisi',$kode_ekspedisi)->get();
        $dataSizeJumlah =finishing_packing_all_size::where('kode_ekspedisi',$kode_ekspedisi)->get();
        $dataToEkspedisi=[];
            foreach ($dataSizeJumlah as $key => $value) {
            $qty_cartonSum=collect($dataSizeJumlah)->where('nama_size',$value['nama_size'])
                            ->where('jumlah_size',$value['jumlah_size'])
                            ->where('color_code',$value['color_code'])
                            ->where('qty_carton',$value['qty_carton'])
                            ->sum('qty_carton');
                $dataToEkspedisi[]=[
                    'id'=>$value->id,
                    'id_packing'=>$value->id_packing,
                    'id_ekspedisi'=>$value->id_ekspedisi,
                    'kode_ekspedisi'=>$value->kode_ekspedisi,
                    'nama_size'=>$value->nama_size,
                    'color_code'=>$value->color_code,
                    'jumlah_size'=>$value->jumlah_size,
                    'qty_carton'=>$qty_cartonSum,
                    
                ];
            }
        $totalPCS =finishing_packing_all_size::where('kode_ekspedisi',$kode_ekspedisi)->sum('jumlah_size');
        $dataSizeJumlahOFFctn =finising_packing_report_size::where('kode_ekspedisi',$kode_ekspedisi)->sum('qty_carton');
        $dataQtyCarton=finising_packing_report_size::where('kode_ekspedisi',$kode_ekspedisi)->sum('qty_carton');
        
            $tes = (new  ekspedisi)->data_detail($kode_ekspedisi);
            $dataByNamaSize = (new  ekspedisi)->dataByNamaSizeByID($kode_ekspedisi);
            $a = (new  ekspedisi)->dataEkspedisiPacking($kode_ekspedisi);
            $JumlahSize = (new  ekspedisi)->JumlahTotal( $a,$kode_ekspedisi );
            $JumlahTotalSize = (new  ekspedisi)->sizeJumlah($kode_ekspedisi);
            $dataJumlahPerSize = (new  ekspedisi)->dataJumlahPerSize($kode_ekspedisi);
            $dataJumlahPerSizeCount = (new  ekspedisi)->jumlahColspanName($kode_ekspedisi);
            $dataEkspedisiPacking=collect($a)->groupBy('wo');
            $sumCarton=collect($a)->sum('qty_carton');
            $dataWo = finishing_packing_all_size::where('kode_ekspedisi',$kode_ekspedisi)->first();

        return Excel::download(new EkspedisiExport($a,$collectionData,$dataJumlahPerSizeCount,$dataEkspedisiPacking,$dataByNamaSize,$dataSizeJumlah,$dataSizeJumlahOFFctn,$JumlahSize,$dataToEkspedisi,$sumCarton,$dataWo ),'_DAILY_RESUME_EKSPEDISI.xlsx');
    }

}