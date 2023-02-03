<?php

namespace App\Http\Controllers\Marketing\Worksheet;

use PDF;
use File;
use Image;
use DateTime;
use DataTables;
use App\ListBuyer;
use App\ItemNumber;
use App\AddressBook;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Marketing\RekapOrder\RekapOrder;
use App\Models\Marketing\RekapOrder\RekapDetail;
use App\GetData\Marketing\Worksheet\data_worksheet;
use App\Models\Marketing\Worksheet\Comment;
use App\Models\Marketing\Worksheet\WorksheetGeneral;
use App\Models\Marketing\Worksheet\Packing;
use App\Models\Marketing\Worksheet\GeneralPO;
use App\Models\Marketing\Worksheet\MaterialFabric;
use App\Models\Marketing\Worksheet\MaterialSewing;
use App\Models\Marketing\Worksheet\MaterialSewingInac;
use App\Models\Marketing\Worksheet\MaterialSewingDetail;
use App\Models\Marketing\Worksheet\WorksheetCopy;
use App\Models\Marketing\Worksheet\MaterialSewingPackaging;
use App\Services\Marketing\RekapOrder\rekap_breakdown;
use App\GetData\Rework\Report\Bulanan\kodebulan;

class WorkSheetController extends Controller
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
        $page = "WorkSheetDashboard";
        return view('marketing.worksheet.dashboard', compact('page'));
    }

    public function po_list(Request $request, $id)
    {
        if ($id == 0) {
            $id_po = 0;
            $bulan = date('Y-m');
            $kodeBulan = (new kodebulan)->bulan($bulan);
            $FirstDate = date('Y-m-01', strtotime('-1 MONTH'));
            $LastDate = (new kodebulan)->tanggal_akhir($bulan);
        }else {
            $id_po = $id;
            $bulan = $id;
            $kodeBulan = (new kodebulan)->bulan($bulan);
            $FirstDate = (new kodebulan)->tanggal_awal($bulan);
            $LastDate = (new kodebulan)->tanggal_akhir($bulan);
        }
        $data = RekapOrder::with('rekap_size', 'rekap_detail', 'rekap_breakdown', 'general_identity',
                'material_fabric', 'material_sewing', 'measurement', 'packing')
                ->whereBetween('date', [$FirstDate, $LastDate])
                ->get();

        $datatable =  (new data_worksheet)->data_index($data);
        // dd($datatable);
        $worksheet_id = 0;
        $polist_id = $id_po;
        // dd($polist_id);
        if ($request->ajax()) {
            return Datatables::of($datatable)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $copy_worksheet =  (new data_worksheet)->copy_worksheet();

                        return view('marketing.worksheet.atribut.btn_action', compact('row', 'copy_worksheet'));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        // dd($datatable);
        $page = "WorkSheetIndex";
        return view('marketing.worksheet.index', compact('page', 'polist_id', 'worksheet_id'));
    }

    public function list(Request $request, $id)
    {
        // dd($id);
        $page = "WorkSheetIndex";

        if ($id == 0) {
            $bulan = date('Y-m');
            $kodeBulan = (new kodebulan)->bulan($bulan);
            $FirstDate = (new kodebulan)->tanggal_awal($bulan);
            $LastDate = (new kodebulan)->tanggal_akhir($bulan);

            $data = RekapOrder::with('rekap_size', 'rekap_detail', 'rekap_breakdown', 'general_identity',
                                'material_fabric', 'material_sewing', 'measurement', 'packing')
                                ->whereBetween('worksheet_date', [$FirstDate, $LastDate])
                                ->get();
        }else {
            $bulan = $id;
            $kodeBulan = (new kodebulan)->bulan($bulan);
            $FirstDate = (new kodebulan)->tanggal_awal($bulan);
            $LastDate = (new kodebulan)->tanggal_akhir($bulan);
            $data = RekapOrder::with('rekap_size', 'rekap_detail', 'rekap_breakdown', 'general_identity',
                                'material_fabric', 'material_sewing', 'measurement', 'packing')
                                ->whereBetween('worksheet_date', [$FirstDate, $LastDate])
                                ->get();
        }
        // dd($data);
        $datatable =  (new data_worksheet)->data_index($data);
        $worksheet =  (new data_worksheet)->data_worksheet($data);
        $worksheet_id = $id;
        $polist_id = 0;
        // dd($worksheet);

        if ($request->ajax()) {
            return Datatables::of($worksheet)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $copy_worksheet =  (new data_worksheet)->copy_worksheet();

                        return view('marketing.worksheet.atribut.btn_worksheet', compact('row','copy_worksheet'));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        // dd($datatable);
        $page = "WorkSheetList";
        return view('marketing.worksheet.index', compact('page', 'id', 'worksheet_id', 'polist_id'));
    }


    public function general($id)
    {
        $master_data = RekapOrder::with('general_identity')->findorfail($id);
        $rekap_order = RekapOrder::all();
        // dd($master_data);
        $general = WorksheetGeneral::where('master_id',$id)->first();
        // dd($general);
        $buyer = ListBuyer::findorfail($master_data->buyer);
        $address = AddressBook::all();
        $detail = $master_data->rekap_detail->first();
        $page = "WorkSheetIndex";
        $stepbar = "General Identity";

        $item_number=RekapDetail::where('master_order_id',$master_data->id)->first();
        $this->get_bom($item_number->parent_item, $master_data->id);

        return view('marketing.worksheet.form.general', compact('rekap_order','general','detail','stepbar', 'address','page', 'buyer', 'master_data'));
    }

    public function general_store(Request $request)
    {   
        $master_data = RekapOrder::with('general_identity')->findorfail($request->master_id);
        $data_input = $request->all();
        // dd($data_input);
        // dd($master_data);
        // untuk resize image 1
            if($request->file != null && $master_data->worksheet_copy != null && $master_data->general_identity  == null){
                $fileName=$request->file;
            }elseif($request->file1 != null && $master_data->general_identity == null){
                $file1 = $request->file('file1');
                $fileName = time()."_".$file1->getClientOriginalName();
        
                $Image = Image::make($file1->getRealPath())->resize(600, 400);
                $thumbPath = public_path() . '/marketing/worksheet/general_identity/' . $fileName;
                $upload = Image::make($Image)->save($thumbPath);
                }
            elseif ($request->file1 != null && $master_data->general_identity->file == null) {
                $file1 = $request->file('file1');
                $fileName = time()."_".$file1->getClientOriginalName();
        
                $Image = Image::make($file1->getRealPath())->resize(600, 400);
                $thumbPath = public_path() . '/marketing/worksheet/general_identity/' . $fileName;
                $upload = Image::make($Image)->save($thumbPath);
            }elseif($request->file == null && $master_data->general_identity == null){
                $fileName=null;
            }elseif($request->file != null && $master_data->general_identity->file != null){
                $fileName=$request->file;
            }elseif($request->file == null && $master_data->general_identity->file != null){
                $fileName=$master_data->general_identity->file;
            }else{
                $fileName=null;
            }
            // dd($fileName);
        // dd($fileName);
        // untuk resize image 2
            if($request->file2 != null && $master_data->worksheet_copy != null && $master_data->general_identity  == null){
                $fileName2=$request->file2;
            }elseif($request->file2 != null && $master_data->general_identity == null){
                $file2 = $request->file('file2');
                $fileName2 = time()."_".$file2->getClientOriginalName();
        
                $Image2 = Image::make($file2->getRealPath())->resize(600, 400);
                $thumbPath2 = public_path() . '/marketing/worksheet/general_identity/' . $fileName2;
                $upload2 = Image::make($Image2)->save($thumbPath2);
                }
            elseif ($request->file2 != null && $master_data->general_identity->file2 == null) {
                $file2 = $request->file('file2');
                $fileName2 = time()."_".$file2->getClientOriginalName();
        
                $Image2 = Image::make($file2->getRealPath())->resize(600, 400);
                $thumbPath2 = public_path() . '/marketing/worksheet/general_identity/' . $fileName2;
                $upload2 = Image::make($Image2)->save($thumbPath2);
            }elseif($request->file2 == null && $master_data->general_identity == null){
                $fileName2=null;
            }
            elseif($request->file2 != null && $master_data->general_identity->file2 != null){
                $fileName2=$request->file2;
            }elseif($request->file2 == null && $master_data->general_identity->file2 != null){
                $fileName2=$master_data->general_identity->file2;
            }elseif($request->file2 != null && $master_data->worksheet_copy != null && $master_data->general_identity  == null){
                $fileName2=$request->file2;
            }else{
                $fileName2=null;
            }
        // dd($request->file2);
        // untuk resize image 3
            if($request->file3 != null && $master_data->worksheet_copy != null && $master_data->general_identity  == null){
                $fileName3=$request->file3;
            }elseif($request->file3 != null && $master_data->general_identity == null){
                $file3 = $request->file('file3');
                $fileName3 = time()."_".$file3->getClientOriginalName();
        
                $Image3 = Image::make($file3->getRealPath())->resize(600, 400);
                $thumbPath3 = public_path() . '/marketing/worksheet/general_identity/' . $fileName3;
                $upload3 = Image::make($Image3)->save($thumbPath3);
                }
            elseif ($request->file3 != null && $master_data->general_identity->file3 == null) {
                $file3 = $request->file('file3');
                $fileName3 = time()."_".$file3->getClientOriginalName();
        
                $Image3 = Image::make($file3->getRealPath())->resize(600, 400);
                $thumbPath3 = public_path() . '/marketing/worksheet/general_identity/' . $fileName3;
                $upload3 = Image::make($Image3)->save($thumbPath3);
            }elseif($request->file3 == null && $master_data->general_identity == null){
                $fileName3=null;
            }
            elseif($request->file3 != null && $master_data->general_identity->file3 != null){
                $fileName3=$request->file3;
            }elseif($request->file3 == null && $master_data->general_identity->file3 != null){
                $fileName3=$master_data->general_identity->file3;
            }elseif($request->file3 != null && $master_data->worksheet_copy != null && $master_data->general_identity  == null){
                $fileName3=$request->file3;
            }else{
                $fileName3=null;
            }
        //
        // untuk resize image 4
            if($request->file4 != null && $master_data->worksheet_copy != null && $master_data->general_identity  == null){
                $fileName4=$request->file4;
            }elseif($request->file4 != null && $master_data->general_identity == null){
                $file4 = $request->file('file4');
                $fileName4 = time()."_".$file4->getClientOriginalName();
        
                $Image4 = Image::make($file4->getRealPath())->resize(600, 400);
                $thumbPath4 = public_path() . '/marketing/worksheet/general_identity/' . $fileName4;
                $upload4 = Image::make($Image4)->save($thumbPath4);
                }
            elseif ($request->file4 != null && $master_data->general_identity->file4 == null) {
                $file4 = $request->file('file4');
                $fileName4 = time()."_".$file4->getClientOriginalName();
        
                $Image4 = Image::make($file4->getRealPath())->resize(600, 400);
                $thumbPath4 = public_path() . '/marketing/worksheet/general_identity/' . $fileName4;
                $upload4 = Image::make($Image4)->save($thumbPath4);
            }elseif($request->file4 == null && $master_data->general_identity == null){
                $fileName4=null;
            }
            elseif($request->file4 != null && $master_data->general_identity->file4 != null){
                $fileName4=$request->file4;
            }elseif($request->file4 == null && $master_data->general_identity->file4 != null){
                $fileName4=$master_data->general_identity->file4;
            }elseif($request->file4 != null && $master_data->worksheet_copy != null && $master_data->general_identity  == null){
                $fileName4=$request->file4;
            }else{
                $fileName4=null;
            }
        //
        // inputan ke tabel general 
        $input = (new data_worksheet)->general_input($data_input, $fileName, $fileName2, $fileName3, $fileName4);
        // dd($input);
        if ($master_data->general_identity == null) {
            $create = WorksheetGeneral::create($input);
        }else{
            $general = WorksheetGeneral::where('master_id', $request->master_id)->first();
            WorksheetGeneral::whereId($general->id)->update($input);
        }

        return redirect()->route('worksheet.breakdown', $request->master_id);
    }

    public function general_show($id)
    {
        $master_data = RekapOrder::with('general_identity')->findorfail($id);
        // dd($master_data->general_identity->ship_to);

        $buyer = ListBuyer::findorfail($master_data->buyer);
        $address = AddressBook::findorfail($master_data->general_identity->ship_to);
        // dd($address);

        $page = "WorkSheetIndex";
        $stepbar = "General Identity";

        return view('marketing.worksheet.form.general_show', compact('address','page', 'stepbar', 'master_data', 'buyer'));
    }

    public function search_or($id)
    {
        $data = RekapDetail::findorfail($id);
        return response()->json($data);
        // dd($data);
    }

    public function general_delete($id)
    {
        $update = [
            'general_id' => 0
        ];
        
        RekapOrder::whereId($id)->update($update);

        // hapus file
        $data = WorksheetGeneral::where('master_id',$id)->first();
        // dd($data);
        File::delete('marketing/worksheet/general_identity/'.$data->file);

        $data->delete();
        
        return redirect()->route('worksheet.general', $id);

    }

    public function general_edit($id)
    {
        $data = WorksheetGeneral::findorfail($id);
        return response()->json($data);
    }

    public function general_update(Request $request)
    {
        $update = $request->all();
        WorksheetGeneral::whereId($request->id)->update($update);

	    return redirect()->back();
    }

    public function breakdown($id)
    {
        $page = "WorkSheetIndex";
        $stepbar = "Breakdown";
        // dd($id);

        $master_data = RekapOrder::with('rekap_breakdown','rekap_detail','rekap_size','general_identity')->findorfail($id);
        $rekap_order= RekapOrder::all();
        $master = $master_data;
        $buyer = ListBuyer::findorfail($master_data->buyer);
        $qty = (new data_worksheet)->quantity_order($master_data);

        // untuk mengetahui berapa jumlah size yang di isi 
        $ukuran = (new rekap_breakdown)->size($master);
        $style = (new data_worksheet)->style($master_data);
        $breakdown = collect($master_data->rekap_breakdown)->groupby('detail_id');
        $address = AddressBook::all();

        // $tambahan_po = collect($master_data->general_po)->count('id');
        // if ($tambahan_po != 0) {
        //     # code...
        // }
        // dd($breakdown);
        // dd($master_data->rekap_breakdown);
        return view('marketing.worksheet.form.breakdown', compact('address','rekap_order', 'breakdown','style','ukuran','qty','buyer','master_data','stepbar','page', 'id'));
    }

    public function material_pabric($id)
    {
        $page = "WorkSheetIndex";
        $stepbar = "Material Fabric";

        $master_data = RekapOrder::with('material_fabric', 'attention_cutting')->findorfail($id);
        $rekap_order = RekapOrder::all();
        // dd($master_data->attention_cutting);
        $material = ItemNumber::where('F4101_GLPT', 'INFA')->get();
        return view('marketing.worksheet.form.material_pabric', compact('rekap_order','material','stepbar','master_data','page', 'id'));
    }

    public function material_sewing($id)
    {   
        // dd($id);
        $page = "WorkSheetIndex";
        $stepbar = "Material Sewing";
        $master_data = RekapOrder::with('material_sewing', 'material_sewing_inac', 'material_sewing_packaging','material_sewing_detail')->findorfail($id);
        $inac = ItemNumber::where('F4101_GLPT', 'INAC')
                ->where('F4101_SRTX', '!=', 'thread')
                ->get();
        $sewing = ItemNumber::where('F4101_GLPT', 'INAC')
                ->where('F4101_SRTX','thread')
                ->get();
        $packing = ItemNumber::where('F4101_GLPT', 'INPA')->get();
        //dd($packing);
        // dd($sewing);
        // Jika worksheetdicopy

        return view('marketing.worksheet.form.material_sewing', compact('packing', 'sewing','inac','page', 'id', 'stepbar', 'master_data'));
    }

    public function measurement($id)
    {
        $page = "WorkSheetIndex";
        $stepbar = "Measurement";
        $master_data = RekapOrder::findorfail($id);
        return view('marketing.worksheet.form.measurement', compact('page', 'id','stepbar', 'master_data'));
    }

    public function packaging($id)
    {
        $page = "WorkSheetIndex";
        $stepbar = "Packing";
        $master_data = RekapOrder::findorfail($id);
        $rekap_order = RekapOrder::all();
        // dd($master_data);
        $packing = RekapOrder::findorfail($id);
        return view('marketing.worksheet.form.packaging', compact('rekap_order','page', 'id', 'stepbar', 'master_data'));
    }

    public function finish($id)
    {
        $map['page']="WorkSheetIndex";
        $map['master_data'] = RekapOrder::findorfail($id);
        $master = RekapOrder::with('packing', 'measurement')->findorfail($id);
        $spec = collect($master->measurement)->where('tipe','SPEC')->count();
        // dd($spec);
        $packing = collect($master->packing)->where('tipe', 'PACKING')->count();
        $folding = collect($master->packing)->where('tipe', 'FOLDING')->count();
        $info = collect($master->packing)->where('tipe', 'INFO')->count();
        // dd($folding);
        // untuk mengetahui berapa jumlah size yang di isi 
        $ukuran = (new rekap_breakdown)->size($master);
        $style = (new data_worksheet)->style($master);
        $breakdown = collect($master->rekap_breakdown)->groupby('detail_id');
        $address = AddressBook::all();
        // dd($ukuran);
        $update_tgl_worksheet = [
            "worksheet_date" => date('Y-m-d')
        ];
        RekapOrder::whereId($id)->update($update_tgl_worksheet);
        
        return view('marketing.worksheet.form.finish', $map, compact('spec', 'packing', 'folding', 'info','ukuran','address'));
    }

    public function general_print ($id)
    {
        $map['page']="WorkSheetIndex";
        $master_data = RekapOrder::findorfail($id);
        $master = RekapOrder::with('packing')->findorfail($id);
        $buyer = ListBuyer::findorfail($master->buyer);
        $spec = collect($master->measurement)->where('tipe','SPEC')->count();
        $packing = collect($master->packing)->where('tipe', 'PACKING')->count();
        $folding = collect($master->packing)->where('tipe', 'FOLDING')->count();
        $info = collect($master->packing)->where('tipe', 'INFO')->count();
        // dd($folding);

        $pdf = PDF::loadview('marketing.worksheet.form.general_print', compact('spec','master_data', 'packing', 'folding', 'info'))->setPaper('legal', 'landscape');
        return $pdf->stream("Worksheet".$master->no_po."_".$buyer->F0101_ALPH.".pdf");
    }

    public function preview($id)
    {
        $page = "WorkSheetIndex";
        return view('marketing.worksheet.form.preview', compact('page', 'id'));
    }

    
    public function get_bom($item_number, $mid) {
        if ($item_number) {
            $client = new Client();
            $request = $client->get('http://10.8.0.108/jdeapi/public/api/bom/search=?KIT='.$item_number);
            $response = json_decode($request->getBody());
            
            foreach ($response as $d) {
                $ItemNumber=ItemNumber::find($d->F3002_ITM);
                if ($ItemNumber!==null&&$ItemNumber->F4101_GLPT=="INFA") {
                    $data = MaterialFabric::firstOrNew(array('master_id' => $mid,'line_cpnb'=>$d->F3002_CPNB));
                    $data->line_cpnb = $d->F3002_CPNB;
                    $data->approve_ftrc = $d->F3002_FTRC;
                    $data->colorway = $d->F3002_DSC1;
                    $data->color = $ItemNumber->F4101_DSC2;
                    $data->material1 = $ItemNumber->F4101_ITM;
                    $data->material2 = $ItemNumber->F4101_DSC1;
                    $data->port = $d->F3002_URCD;
                    $data->consumption = $d->F3002_QNTY;
                    // $data->description = $ItemNumber->F4101_DSC2;
                    $data->save();
                }
                if ($ItemNumber!==null&&$ItemNumber->F4101_GLPT=="INAC") {
                    if (str_contains($ItemNumber->F4101_DSC1, "THREAD")) {
                        $data = MaterialSewing::firstOrNew(array('master_id' => $mid,'line_cpnb'=>$d->F3002_CPNB));
                        $data->line_cpnb = $d->F3002_CPNB;
                        $data->approve_ftrc = $d->F3002_FTRC;
                        $data->colorway = $d->F3002_DSC1;
                        $data->color = $ItemNumber->F4101_DSC2;
                        $data->material1 = $ItemNumber->F4101_ITM;
                        $data->material2 = $ItemNumber->F4101_DSC1;
                        $data->port = $d->F3002_URCD;
                        $data->consumption = $d->F3002_QNTY;
                        // $data->description = $ItemNumber->F4101_DSC2;
                        $data->save();
                    } else {
                        $data = MaterialSewingInac::firstOrNew(array('master_id' => $mid,'line_cpnb'=>$d->F3002_CPNB));
                        $data->line_cpnb = $d->F3002_CPNB;
                        $data->approve_ftrc = $d->F3002_FTRC;
                        $data->colorway = $d->F3002_DSC1;
                        $data->color = $ItemNumber->F4101_DSC2;
                        $data->material1 = $ItemNumber->F4101_ITM;
                        $data->material2 = $ItemNumber->F4101_DSC1;
                        $data->port = $d->F3002_URCD;
                        $data->consumption = $d->F3002_QNTY;
                        // $data->description = $ItemNumber->F4101_DSC2;
                        $data->save();
                    }
                }
                if ($ItemNumber!==null&&$ItemNumber->F4101_GLPT=="INPA") {
                    $data = MaterialSewingPackaging::firstOrNew(array('master_id' => $mid,'line_cpnb'=>$d->F3002_CPNB));
                    $data->line_cpnb = $d->F3002_CPNB;
                    $data->approve_ftrc = $d->F3002_FTRC;
                    $data->item = $ItemNumber->F4101_ITM;
                    $data->detail = $ItemNumber->F4101_DSC1;
                    $data->consumption = $d->F3002_QNTY;
                    // $data->description = $ItemNumber->F4101_DSC2;
                    $data->save();
                }
            }
        }
    }

    public function count($id)
    {
        $master_data = RekapOrder::findorfail($id);
        $loop = 1 ;
        $update = [
            'note1' => $master_data->note1 + 1
        ];
        // dd($update);
        RekapOrder::whereId($id)->update($update);

        return redirect()->route('worksheet.general', $id);
    }

    public function cancel_count ($id)
    {
        $master_data = RekapOrder::findorfail($id);
        $loop = 1 ;
        $update = [
            'note1' => $master_data->note1 - 1
        ];
        // dd($update);
        RekapOrder::whereId($id)->update($update);

        return redirect()->route('worksheet.list');
    }

    public function comment_store(Request $request)
    {
        $input = $request->all();
        Comment::create($input);
        
        return back();
    }

    public function cari_po(Request $request)
    {
        // dd($request->all());
        $rekap_order = RekapOrder::where('worksheet_date', null)->where('no_po', 'LIKE', '%'.strtoupper($request->karyawan_nik).'%')->get();
        // dd($rekap_order);
        $response = array();
        foreach($rekap_order as $kar){
            $style = collect($kar->rekap_detail)->implode('style', ', ');
            $rekap_detail = collect($kar->rekap_detail)->count('id');
            $rekap_size = collect($kar->rekap_size)->count('id');
            $rekap_breakdown = collect($kar->rekap_breakdown)->count('id');
            if ($rekap_detail != 0 && $rekap_size != 0 && $rekap_breakdown != 0) {
                $response[] = array(
                    "id"=>$kar->no_po,
                    "text"=>"PO: ".$kar->no_po." * Style : ".$style,
                    'rekap_order_id' => $kar->id,
                    'rekap_order_style' => $style,
                    'rekap_order_ex_fact' => $kar->ex_fact,
                    'rekap_order_po_creation' => $kar->date

                );
            }
        }
        // dd($response);
        $hasil = [];
        foreach ($response as $key => $value) {
            $cek_no_po = GeneralPO::where('rekap_order_id', $value['rekap_order_id'])->count('id');
            if ($cek_no_po == 0) {
                $hasil[] = [
                    "id"=> $value['id'],
                    "text"=> $value['text'],
                    'rekap_order_id' => $value['rekap_order_id'],
                    'rekap_order_style' => $value['rekap_order_style'],
                    'rekap_order_ex_fact' => $value['rekap_order_ex_fact'],
                    'rekap_order_po_creation' => $value['rekap_order_po_creation']
                ];
            }
        }
        // $tambahan_po = collect($kar->general_po)->count('id');
        // if ($tambahan_po == 0) {
        //     $hasil = $response;
        // }else {
        //     $hasil = [];
        //     foreach ($variable as $key => $value) {
        //         # code...
        //     }
        // }
        // dd($hasil);
        return response()->json($hasil); 
    }

    public function tambah_po(Request $request)
    {
        // dd($request->all());
        $input = $request->all();
        $cek_data = GeneralPO::where('master_id', $request->master_id)->where('rekap_order_id', $request->rekap_order_id)->where('po_number', $request->po_number)->count('id');
        // dd($cek_data);
        if ($cek_data == 0) {
            GeneralPO::create($input);
            $item_number=RekapDetail::where('master_order_id',$request->rekap_order_id)->first();
            $this->get_bom($item_number->parent_item, $request->rekap_order_id);
        }else {
            $data = GeneralPO::where('master_id', $request->master_id)->where('po_number', $request->po_number)->first();
            GeneralPO::whereId($data->id)->update($input);
        }

        return back();
    }

    public function breakdown_store(Request $request)
    {
        // dd($request->all());
        if ($request->set_to_all == 1) {
            // dd('set_to_all');
            foreach ($request->detail_id as $key => $value) {
                $data[] = [
                    "detail_id" => $value,
                    "shipment_to" => $request->shipment_to[0]
                ];
            }
            
            foreach ($data as $key => $value) {
                $update = [
                    'shipment_to' => $value['shipment_to']
                ];
                RekapDetail::whereId($value['detail_id'])->update($update);
            }

            return redirect()->route('worksheet.material_pabric', $request->master_id);

        }else {
            // dd('satu2');
            // dd($request->all());
            $data = [];
            foreach ($request->detail_id as $key => $value) {
                // dd($value);
                $data[] = [
                    "detail_id" => $value,
                    "shipment_to" => $request->shipment_to[$key]
                ];
            }
            
            foreach ($data as $key => $value) {
                $update = [
                    'shipment_to' => $value['shipment_to']
                ];
                RekapDetail::whereId($value['detail_id'])->update($update);
            }

            return redirect()->route('worksheet.material_pabric', $request->master_id);
        }
    }

    public function sudah_beres($id)
    {
        $update_tgl_worksheet = [
            "worksheet_date" => date('Y-m-d')
        ];
        RekapOrder::whereId($id)->update($update_tgl_worksheet);

        return redirect()->route('worksheet.po_list',0);
    }

    public function copy_worksheet(Request $request)
    {
        // dd($request->all());
        $input = $request->all();
        WorksheetCopy::create($input);
        $master_data = RekapOrder::findorfail($request->master_id);
        $rekap_order_tujuan = RekapOrder::where('id', $request->rekap_order_tujuan)->first();

        // Sewing Detail 
        if ($master_data->material_sewing_detail == null && $rekap_order_tujuan->material_sewing_detail != null) {
            // dd($rekap_order_tujuan->material_sewing_detail);
            $input = [
                'master_id' => $master_data->id,
                'attention_sewing' => $rekap_order_tujuan->material_sewing_detail->attention_sewing,
                'sewing_guide' => $rekap_order_tujuan->material_sewing_detail->sewing_guide,
                'sewing_image' => $rekap_order_tujuan->material_sewing_detail->sewing_image,
                'sewing_image2' => $rekap_order_tujuan->material_sewing_detail->sewing_image2,
                'sewing_image3' => $rekap_order_tujuan->material_sewing_detail->sewing_image3,
                'sewing_image4' => $rekap_order_tujuan->material_sewing_detail->sewing_image4,
                'sewing_image5' => $rekap_order_tujuan->material_sewing_detail->sewing_image5,
                'sewing_image6' => $rekap_order_tujuan->material_sewing_detail->sewing_image6,
                'sewing_pdf' => $rekap_order_tujuan->material_sewing_detail->sewing_pdf,
                'attention_label' => $rekap_order_tujuan->material_sewing_detail->attention_label,
                'label_guide' => $rekap_order_tujuan->material_sewing_detail->label_guide,
                'label_image' => $rekap_order_tujuan->material_sewing_detail->label_image,
                'label_image2' => $rekap_order_tujuan->material_sewing_detail->label_image2,
                'label_image3' => $rekap_order_tujuan->material_sewing_detail->label_image3,
                'label_image4' => $rekap_order_tujuan->material_sewing_detail->label_image4,
                'label_image5' => $rekap_order_tujuan->material_sewing_detail->label_image5,
                'label_image6' => $rekap_order_tujuan->material_sewing_detail->label_image6,
                'label_pdf' => $rekap_order_tujuan->material_sewing_detail->label_pdf,
                'attention_ironing' => $rekap_order_tujuan->material_sewing_detail->attention_ironing,
                'ironing_guide' => $rekap_order_tujuan->material_sewing_detail->ironing_guide,
                'ironing_image' => $rekap_order_tujuan->material_sewing_detail->ironing_image,
                'ironing_image2' => $rekap_order_tujuan->material_sewing_detail->ironing_image2,
                'ironing_image3' => $rekap_order_tujuan->material_sewing_detail->ironing_image3,
                'ironing_image4' => $rekap_order_tujuan->material_sewing_detail->ironing_image4,
                'ironing_image5' => $rekap_order_tujuan->material_sewing_detail->ironing_image5,
                'ironing_image6' => $rekap_order_tujuan->material_sewing_detail->ironing_image6,
                'ironing_pdf' => $rekap_order_tujuan->material_sewing_detail->ironing_pdf,
                'attention_trimming' => $rekap_order_tujuan->material_sewing_detail->attention_trimming,
                'trimming_guide' => $rekap_order_tujuan->material_sewing_detail->trimming_guide,
                'trimming_image' => $rekap_order_tujuan->material_sewing_detail->trimming_image,
                'trimming_image2' => $rekap_order_tujuan->material_sewing_detail->trimming_image2,
                'trimming_image3' => $rekap_order_tujuan->material_sewing_detail->trimming_image3,
                'trimming_image4' => $rekap_order_tujuan->material_sewing_detail->trimming_image4,
                'trimming_image5' => $rekap_order_tujuan->material_sewing_detail->trimming_image5,
                'trimming_image6' => $rekap_order_tujuan->material_sewing_detail->trimming_image6,
                'trimming_pdf' => $rekap_order_tujuan->material_sewing_detail->trimming_pdf,
            ];

            MaterialSewingDetail::create($input);
        }

        // File Measurement 
        $update_measurement = [
            "file_measurement" => $rekap_order_tujuan->file_measurement,
            "file1" => $rekap_order_tujuan->file1,
            "file2" => $rekap_order_tujuan->file2,
            "file3" => $rekap_order_tujuan->file3,
            "file4" => $rekap_order_tujuan->file4,
            "file5" => $rekap_order_tujuan->file5,
        ];

        RekapOrder::whereId($request->master_id)->update($update_measurement);

        // Packing 
        $cek_packing = collect($master_data->packing)->count('id');
        if ($cek_packing == 0) {
            foreach ($rekap_order_tujuan->packing as $key => $value) {
                $input_packing = [
                    'master_id' => $request->master_id,
                    'tipe' => $value->tipe,
                    'note_detail' => $value->note_detail,
                    'note_attention' => $value->note_attention,
                    'file1' => $value->file1,
                    'file2' => $value->file2,
                    'file3' => $value->file3,
                    'file4' => $value->file4,
                    'file5' => $value->file5,
                    'file6' => $value->file6,
                    'file7' => $value->file7,
                    'file8' => $value->file8,
                    'file9' => $value->file9,
                    'file10' => $value->file10,
                    'file11' => $value->file11,
                    'file12' => $value->file12,
                    'file_guide' => $value->file_guide,
                    'file_guide_original' => $value->file_guide_original,
                ];
                Packing::create($input_packing);
            }
        }


        return redirect()->route('worksheet.general', $request->master_id);
    }
}
