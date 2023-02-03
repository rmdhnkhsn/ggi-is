<?php

namespace App\Http\Controllers\MatDoc\Invoice;


use PDF;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MatDok\invoice\invoice;
use App\Models\Mat_Doc\invoice\beneficary;
use App\Models\Mat_Doc\invoice\invoice_final;
use App\Models\Mat_Doc\invoice\invoice_detail;
use App\Models\Production\Finishing\PackingList;

class invoiceController3 extends Controller
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

    public function invoiceList(Request $request)
    {
        $page = 'dashboard';
        $filter = $request->filter;
        $data = PackingList::where('kode_ekspedisi',$filter)->first();
        // dd($data);

        return view('MatDoc.invoiceNew.invoiceList', compact('page','filter','data'));
    }

    public function getBuyer(Request $request)
    {
        $buyer=beneficary::where("buyer",$request->ID)->first();
        return response()->json($buyer);
    }

    public function storeInvoiceHeader(Request $request)
    {
        // dd($request->all());
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
        // dd('hai');

        return redirect()->route('invoiceList.listItem','filter='.$x)->with("save", 'Data Has Been Saved !');
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

    public function listItem(Request $request)
    {
        $page = 'dashboard';
        $filter = $request->filter;
        
        $data2 = (new  invoice)->DataInvoiceItemList($filter);
        $data = PackingList::where('kode_ekspedisi',$filter)->first();
        // dd($data2);
        return view('MatDoc.invoiceNew.components.listItem', compact('page','data','filter','data2'));
    }

    public function storeDataInvoice(Request $request){
        // dd($request->all());
        $x = $request->id_invoice_detail;
        $data = (new  invoice)->storeInvoiceData($request,$x);
        return redirect()->route('invoiceList.preview','filter='.$x)->with("save", 'Data Has Been Saved !');
    }

    public function invoiceListPreview(Request $request)
    {
        $page = 'dashboard';
        $filter = $request->filter;
        $data2 = invoice_final::where('id_detail',$filter)->get();
        $invoiceHeader = invoice_detail::where('invoice_final_id',$filter)->first();
        $dataInvoiceHeader = invoice_final::where('id_detail',$filter)->first();
        $data = PackingList::where('kode_ekspedisi',$filter)->first();

        // dd($data2);
        return view('MatDoc.invoiceNew.components.preview', compact('page','filter','data','invoiceHeader','dataInvoiceHeader','data2'));
    }

    
    public function previewPDF(Request $request)
    {
        $page = 'dashboard';
        $filter = $request->filter;
        $data2 = invoice_final::where('id_detail',$filter )
                                    ->get();
        $invoiceHeader = invoice_detail::where('invoice_final_id',$filter)->first();
                                    // dd($invoiceHeader);
        $data = PackingList::where('kode_ekspedisi',$filter)->first();
        $dataInvoiceHeader = invoice_final::where('id_detail',$filter)->first();

        $customPaper = array(0,0,816,1344);
        $pdf =PDF::loadview('MatDoc.invoiceNew.components.previewPDF', compact('filter','data','invoiceHeader','data2','dataInvoiceHeader'))->setPaper($customPaper,'landscape','center');
        return $pdf->stream("INVOICE $data->buyer ".".pdf");
    }
}