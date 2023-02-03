<?php

namespace App\Http\Controllers\MatDoc\Invoice;


use PDF;
use Auth;
use App\Exports\InvoiceData;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Mat_Doc\invoice\notify;
use App\Services\MatDok\invoice\invoice;
use App\Models\Mat_Doc\invoice\consignee;
use App\Models\Mat_Doc\invoice\beneficary;
use App\Models\Finising\finising_packingList;
use App\Models\Mat_Doc\invoice\invoice_final;
use App\Models\Mat_Doc\invoice\invoice_detail;
use App\Models\Mat_Doc\invoice\partOfDestination;
use App\Services\MatDok\invoice\invoicePackingList;
use App\Models\Finising\finishing_packing_all_size;
use App\Models\Finising\finising_packing_report_size;

class invoiceController2 extends Controller
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
        $data = (new  invoice)->Data();
        $dataInvoice = (new  invoice)->DataInvoice();
        // dd($data);
        return view('MatDoc.invoice.index', compact('page','data','dataInvoice'));
    }

    
    
    public function invoiceList(Request $request)
    {
        $page = 'dashboard';
        $filter = $request->filter;
        $data = finising_packingList::where('kode_ekspedisi',$filter)->first();
        return view('MatDoc.invoice.invoiceList', compact('page','filter','data'));
    }

    public function invoiceListBuyer()
    {
        $page = 'dashboard';
        return view('MatDoc.invoice.components.buyer', compact('page'));
    }

    public function invoiceListInformation()
    {
        $page = 'dashboard';
        return view('MatDoc.invoice.components.information', compact('page'));
    }

    public function invoiceListItem(Request $request)
    {
        $page = 'dashboard';
        $filter = $request->filter;
        return view('MatDoc.invoice.components.listItem', compact('page','filter'));
    }

    public function invoiceListPreview(Request $request)
    {
        $page = 'dashboard';
        $filter = $request->filter;
        $data2 = invoice_final::where('id_detail',$filter )
                                    ->get();
        $invoiceHeader = invoice_detail::where('invoice_final_id',$filter)->first();
        $dataInvoiceHeader = invoice_final::where('id_detail',$filter)->first();
        $data = finising_packingList::where('kode_ekspedisi',$filter)->first();

        // dd($dataInvoiceHeader);
    return view('MatDoc.invoice.components.preview', compact('page','filter','data','invoiceHeader','dataInvoiceHeader','data2'));
    }
    public function invoiceListdetail(Request $request)
    {
        $page = 'dashboard';
        $filter = $request->filter;
        $data2 = invoice_final::where('id_detail',$filter )
                                    ->get();
                                    
        $invoiceHeader = invoice_detail::where('invoice_final_id',$filter)->first();
        $dataInvoiceHeader = invoice_final::where('id_detail',$filter)->first();
        $data = finising_packingList::where('kode_ekspedisi',$filter)->first();

    return view('MatDoc.invoice.components.detail', compact('page','filter','data','invoiceHeader','dataInvoiceHeader','data2'));
    }


    public function previewPDF(Request $request)
    {
        $page = 'dashboard';
        $filter = $request->filter;
        $data2 = invoice_final::where('id_detail',$filter )
                                    ->get();
        $invoiceHeader = invoice_detail::where('invoice_final_id',$filter)->first();
                                    // dd($invoiceHeader);
        $data = finising_packingList::where('kode_ekspedisi',$filter)->first();
        $dataInvoiceHeader = invoice_final::where('id_detail',$filter)->first();

        $customPaper = array(0,0,816,1344);
         $pdf =PDF::loadview('MatDoc.invoice.components.previewPDF', compact('filter','data','invoiceHeader','data2','dataInvoiceHeader'))->setPaper($customPaper,'landscape','center');
         return $pdf->stream("INVOICE $data->buyer ".".pdf");
    }
    public function previewExcel(Request $request)
    {
        $page = 'dashboard';
        $filter = $request->filter;
        $data2 = invoice_final::where('id_detail',$filter )
                                    ->get();
        $invoiceHeader = invoice_detail::where('invoice_final_id',$filter)->first();
                                //   dd($invoiceHeader);
        $data = finising_packingList::where('kode_ekspedisi',$filter)->first();
        $dataInvoiceHeader = invoice_final::where('id_detail',$filter)->first();
        // dd($data);

        $customPaper = array(0,0,816,1344);
         return Excel::download(new InvoiceData($filter,$data2,$data,$invoiceHeader,$dataInvoiceHeader),'INVOICE.xlsx');
    }

    public function listItem(Request $request)
    {
        $page = 'dashboard';
        $filter = $request->filter;
        
        $data2 = (new  invoice)->DataInvoiceItemList($filter);
        $data = finising_packingList::where('kode_ekspedisi',$filter)->first();

        return view('MatDoc.invoice.components.listItem', compact('page','data','filter','data2'));
    }

    public function generateAutoNumber() {
        $tgl=date('ymd');
        $lembur = invoice_detail::where('id','LIKE',$tgl."%")->max('id');
        $table_no=substr($lembur,6,3);
        $tgl = date('ymd');  
        $no= $tgl.$table_no;
        $auto=substr($no,6);
        $auto=intval($auto)+1;
        $auto_number=substr($no,0,6).str_repeat(0,(3-strlen($auto))).$auto;

        return $auto_number;
    }

    public function storeInvoiceHeader(Request $request)
    {

        $auto_number = $this->generateAutoNumber();
        $x = $request->invoice_final_id;

        $data = (new  invoice)->storeInvoiceHeader($request,$auto_number);

        return redirect()->route('invoiceList.listItem','filter='.$x)->with("save", 'Data Has Been Saved !');
    }
    public function updateInvoiceHeader(Request $request)
    {
// dd($request->all());
        $x = $request->invoice_final_id;
        $data = (new  invoice)->UpdateInvoiceHeader($request);

        return redirect()->route('invoiceList.listItemEdit','filter='.$x)->with("save", 'Data Has Been Saved !');
    }

    public function updatelistInvoiceEdit(Request $request){

        $x = $request->id_invoice_detail;
        $data = (new  invoice)->UpdateInvoiceData($request,$x);

        return redirect()->route('invoiceList.preview','filter='.$x)->with("save", 'Data Has Been Saved !');
    }

    public function storeDataInvoice(Request $request){
        // dd($request->all());
        $x = $request->id_invoice_detail;
        $data = (new  invoice)->storeInvoiceData($request,$x);
        return redirect()->route('invoiceList.preview','filter='.$x)->with("save", 'Data Has Been Saved !');
    }
    public function getBuyer(Request $request)
    {
        $buyer=beneficary::where("buyer",$request->ID)->first();
        return response()->json($buyer);
    }

    public function downloadpacking(Request $request)
    {
        $page = 'dashboard';
        $filter = $request->filter;
        $datasurat = finising_packingList::where('kode_ekspedisi',$filter)->get();
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
        $dataSize =finising_packing_report_size::where('kode_ekspedisi',$filter)->get();
        $dataSizeJumlah =finishing_packing_all_size::where('kode_ekspedisi',$filter)->where('jumlah_size','!=','0')->get();
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

        $totalPCS =finishing_packing_all_size::where('kode_ekspedisi',$filter)->sum('jumlah_size');
        $dataSizeJumlahOFFctn =finising_packing_report_size::where('kode_ekspedisi',$filter)->sum('qty_carton');
        $dataQtyCarton=finising_packing_report_size::where('kode_ekspedisi',$filter)->sum('qty_carton');
        
            // $tes = (new  ekspedisi)->data_detail($filter);
            $dataByNamaSize = (new  invoicePackingList)->dataByNamaSizeByID($filter);
            $collectByQtyCarton= (new  invoicePackingList)->dataEkspedisiPacking($filter);
            // $JumlahSize = (new  ekspedisi)->JumlahTotal( $collectByQtyCarton,$filter);
            $JumlahTotalSize = (new  invoicePackingList)->sizeJumlah($filter);
            // $JumlahTotalSizePerWo = (new  ekspedisi)->sizeJumlahPerwo($filter);
            $dataJumlahPerSize = (new  invoicePackingList)->dataJumlahPerSize($filter);
            $dataJumlahPerSizeCount = (new  invoicePackingList)->jumlahColspanName($filter);
            $dataEkspedisiPacking=collect($collectByQtyCarton)->groupBy('wo');
            $sumCarton=collect($collectByQtyCarton)->sum('qty_carton');
            $dataWo = finishing_packing_all_size::where('kode_ekspedisi',$filter)->first();

                    // dd($dataEkspedisiPacking);
        return view('MatDoc.invoice.components.detailPackingList', compact('page','collectionData','dataByNamaSize','data','dataSize','dataSizeJumlah','dataSizeJumlahOFFctn','dataEkspedisiPacking','JumlahTotalSize','dataJumlahPerSize','dataJumlahPerSizeCount','dataToEkspedisi','collectByQtyCarton','sumCarton','dataWo'));
    }

    public function invoiceEdit(Request $request){
        $page = 'dashboard';
        $filter = $request->filter;
        
        $data2 = (new  invoice)->DataInvoiceItemList($filter);
        $data = invoice_detail::where('invoice_final_id',$filter)->first();

//  dd($data);
        return view('MatDoc.invoice.invoiceListEdit', compact('page','data','filter','data2'));
    }

    public function listItemEdit(Request $request)
    {
        $page = 'dashboard';
        $filter = $request->filter;
        // $data2 = (new  invoice)->DataInvoiceItemList($filter);
        $data2 = invoice_final::where('id_detail',$filter )
                                    ->get();

        $data = invoice_detail::where('invoice_final_id',$filter)->first();
         $dataInvoiceHeader = invoice_final::where('id_detail',$filter)->first();
// dd($dataInvoiceHeader);
        return view('MatDoc.invoice.edit.listItem', compact('page','data','filter','data2','dataInvoiceHeader'));
    }
    public function detailPackinglistPdf(Request $request){
        $filter = $request->filter;
        $datasurat = finising_packingList::where('kode_ekspedisi',$filter)->get();
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
            $dataSize =finising_packing_report_size::where('kode_ekspedisi',$filter)->get();
            $dataSizeJumlah =finishing_packing_all_size::where('kode_ekspedisi',$filter)->get();
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
            $totalPCS =finishing_packing_all_size::where('kode_ekspedisi',$filter)->sum('jumlah_size');
            $dataSizeJumlahOFFctn =finising_packing_report_size::where('kode_ekspedisi',$filter)->sum('qty_carton');
            $dataQtyCarton=finising_packing_report_size::where('kode_ekspedisi',$filter)->sum('qty_carton');
            
                // $tes = (new  invoicePackingList)->data_detail($filter);
                 // $tes = (new  ekspedisi)->data_detail($filter);
            $dataByNamaSize = (new  invoicePackingList)->dataByNamaSizeByID($filter);
            $collectByQtyCarton= (new  invoicePackingList)->dataEkspedisiPacking($filter);
            // $JumlahSize = (new  ekspedisi)->JumlahTotal( $collectByQtyCarton,$filter);
            $JumlahTotalSize = (new  invoicePackingList)->sizeJumlah($filter);
            // $JumlahTotalSizePerWo = (new  ekspedisi)->sizeJumlahPerwo($filter);
            $dataJumlahPerSize = (new  invoicePackingList)->dataJumlahPerSize($filter);
            $dataJumlahPerSizeCount = (new  invoicePackingList)->jumlahColspanName($filter);
            $dataEkspedisiPacking=collect($collectByQtyCarton)->groupBy('wo');
            $sumCarton=collect($collectByQtyCarton)->sum('qty_carton');
            $dataWo = finishing_packing_all_size::where('kode_ekspedisi',$filter)->first();
// dd($dataEkspedisiPacking);
            $customPaper = array(0,0,600,1250);
            $pdf =PDF::setOptions([
            'tempDir' => public_path(),
            'chroot'  => storage_path('/app/public/databaseSmv'),
        ])->loadview('MatDoc.invoice.components.detailPackinglistPdf', compact('collectionData','dataByNamaSize','data','dataSize','dataSizeJumlah','dataSizeJumlahOFFctn','dataEkspedisiPacking','JumlahTotalSize','dataJumlahPerSize','dataJumlahPerSizeCount','dataToEkspedisi','sumCarton','dataWo' ))->setPaper($customPaper,'landscape','center');
            return $pdf->stream("PACKINGLIST $dataWo->buyer".".pdf");
    }
   
}
