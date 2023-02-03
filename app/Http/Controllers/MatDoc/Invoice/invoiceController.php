<?php

namespace App\Http\Controllers\MatDoc\Invoice;


use PDF;
use Auth;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MatDok\invoice\invoice;
use App\Models\Mat_Doc\invoice\beneficary;
use App\Models\Mat_Doc\invoice\invoice_final;
use App\Models\Mat_Doc\invoice\invoice_detail;
use App\Models\Production\Finishing\PackingList;

class invoiceController extends Controller
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

        // untuk table invoice list 
        $packing_list_all = PackingList::where('action','EXPEDISI')->where('no_kontainer','!=',null)->where('no_seal','!=',Null)->orderByDesc('id')->get()->groupBy('no_seal');
        // dd($packing_list_all);
        $data = (new  invoice)->Data();
        $dataInvoice = (new  invoice)->DataInvoice();
        // dd($dataInvoice);
        return view('MatDoc.invoiceNew.index', compact('page','packing_list_all','dataInvoice','data'));
    }

    public function invoiceList($id)
    {
        $page = 'dashboard';
        $filter = $id;
        $data = PackingList::where('kode_ekspedisi',$filter)->first();
        $beneficary = beneficary::where('buyer_name', $data->buyer)->first();
        if ($beneficary == null) {
            $buyer = null;
        }else {
            $buyer = $beneficary->buyer;
        }
        $step = 'buyer';
        // dd($data);

        return view('MatDoc.invoiceNew.invoiceList', compact('page','filter','data', 'step','buyer'));
    }

    public function getInformation($id)
    {
        $page = 'dashboard';
        $filter = $id;
        $data = PackingList::where('kode_ekspedisi',$filter)->first();
        $cek_isi = invoice_detail::where('invoice_final_id', $id)->count();
       
        if ($cek_isi == 0) {
            $info_tambahan  = beneficary::where('buyer_name', $data->buyer)->first();
        }else {
            $info_tambahan = invoice_detail::where('invoice_final_id', $id)->first();
        }
        $buyer = $data->buyer;
        // dd($data);
        $step = 'information';

        return view('MatDoc.invoiceNew.information', compact('page','buyer','filter','data', 'step','info_tambahan'));
    }

    public function storeInvoiceHeader(Request $request)
    {
        // dd('hai');
      
        $cek_isi = invoice_detail::where('invoice_final_id', $request->invoice_final_id)->count();
        // dd($cek_isi);
        if ($cek_isi == 0) {
            $auto_number = $this->generateAutoNumber();
            $x = $request->invoice_final_id;
            // dd($x);
            $data = (new  invoice)->storeInvoiceHeader($request,$auto_number);
            // dd($data);
            invoice_detail::create($data);
    
            $asset_machine= [
                'status_invoice'=>'1',
            ];
            PackingList::where('kode_ekspedisi',$request->invoice_final_id)->update($asset_machine);
        }else {
            $data = invoice_detail::where('invoice_final_id', $request->invoice_final_id)->first();
            $update = Arr::except($request->all(), '_token');
            // dd($data);
            invoice_detail::whereId($data->id)->update($update);
        }

        // dd('hai');
        //

        return redirect()->route('invoiceList.listItem',$request->invoice_final_id)->with("save", 'Data Has Been Saved !');
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

    public function listItem($id)
    {
        $page = 'dashboard';
        $step = 'list_item';
        $filter = $id;
        $cek_data = invoice_final::where('id_detail', $id)->count();
        // dd($cek_data);
        if ($cek_data == 0) {
            $is_edit = 0;
            $data2 = (new  invoice)->DataInvoiceItemList($filter);
        }else {
            $is_edit = 1;
            $data2 = invoice_final::where('id_detail', $id)->get();
        }
        $data = PackingList::where('kode_ekspedisi',$filter)->first();
        // dd($data2);
        return view('MatDoc.invoiceNew.components.listItem', compact('page','step','is_edit','data','filter','data2','id'));
    }

    public function storeDataInvoice(Request $request){
        // dd($request->all());
        $cek_data = invoice_final::where('id_detail', $request->id_invoice_detail)->count();
        $x = $request->id_invoice_detail;
        // dd($cek_data);
        if ($cek_data == 0) {
            $data = (new  invoice)->storeInvoiceData($request,$x);
        }else {
            $data = (new  invoice)->UpdateListItem($request);
        }
      
        return redirect()->route('invoiceList.preview',$x)->with("save", 'Data Has Been Saved !');
    }

    public function invoiceListPreview($id)
    {
        $page = 'dashboard';
        $step = 'preview';
        $filter = $id;
        $data2 = invoice_final::where('id_detail',$filter)->get();
        $invoiceHeader = invoice_detail::where('invoice_final_id',$filter)->first();
        $dataInvoiceHeader = invoice_final::where('id_detail',$filter)->first();
        $data = PackingList::where('kode_ekspedisi',$filter)->first();
        return view('MatDoc.invoiceNew.components.preview', compact('page','step','filter','data','invoiceHeader','dataInvoiceHeader','data2'));
    }

    public function previewPDF($id)
    {
        // dd($id);
        $page = 'dashboard';
        $filter = $id;
        $data2 = invoice_final::where('id_detail',$filter )->get();
        $invoiceHeader = invoice_detail::where('invoice_final_id',$filter)->first();
        $data = PackingList::where('kode_ekspedisi',$filter)->first();
        $dataInvoiceHeader = invoice_final::where('id_detail',$filter)->first();

        $customPaper = array(0,0,816,1344);
        $pdf =PDF::loadview('MatDoc.invoiceNew.components.previewPDF', compact('filter','data','invoiceHeader','data2','dataInvoiceHeader'))->setPaper($customPaper,'landscape','center');
        return $pdf->stream("INVOICE $data->buyer ".".pdf");
    }
}