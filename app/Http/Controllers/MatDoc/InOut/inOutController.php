<?php

namespace App\Http\Controllers\MatDoc\InOut;

use Auth;
use PDF;
use App\Branch;
use App\Exports\DummyExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Warehouse\WarehouseDelivery;
use App\Models\Warehouse\WarehouseDeliveryItem;
use App\Models\Mat_Doc\Subkon\pengeluaran;
use App\Models\Warehouse\BpbNull;
use App\Services\warehouse\WarehouseDeliveryServ;
use Illuminate\Support\Facades\Log;

class inOutController extends Controller
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
        return redirect()->route('in-out.barang');
    }

    public function in_out(Request $request)
    {
        //jadinya sinkron dari bpb 261 dan 27 keluar
        $dateFilter=date('Y-m-d',strtotime('-3 day',strtotime(date('Y-m-d'))));
        $pengeluaran=BpbNull::where('F564111H_TRDJ','>=',$dateFilter)->whereIn('F564111H_DSC1',['BC.27 Keluar','BC.261'])
                            ->whereRaw("ISNULL(ukid_delivery)")->groupBy('F564111H_MCU')->groupBy('F564111H_TRDJ')
                            ->groupBy('F564111H_DSC1')->groupBy('F564111H_DOC1');
        $pengeluaran=$pengeluaran->get();
        foreach ($pengeluaran as $k => $v) {
            $bpb_pending=BpbNull::where('F564111H_MCU',$v->F564111H_MCU)->where('F564111H_TRDJ',$v->F564111H_TRDJ)
                                ->where('F564111H_DSC1',$v->F564111H_DSC1)->where('F564111H_DOC1',$v->F564111H_DOC1)
                                ->whereRaw("ISNULL(ukid_delivery)")->get();
            $ins=new WarehouseDeliveryServ();
            $ins=$ins->insert_delivery($bpb_pending);
        }

        //cek delete kalo detail kosong, header masih ada
        $cek=WarehouseDelivery::whereNull('finish')->whereNull('hideby')->get();
        foreach ($cek as $v) {
            foreach ($v->items as $v1) {
                $cek_ukid=pengeluaran::where('F564111H_UKID',$v1->id_ukid)->first();
                if ($cek_ukid==null) {
                    $del=WarehouseDeliveryItem::find($v1->id)->delete();
                }
            }

            $cekdt=WarehouseDeliveryItem::where('warehouse_delivery_id', $v->id)->first();
            if ($cekdt==null) {
                $cekdt=WarehouseDelivery::find($v->id)->delete();
            }
        }


        $page = 'inOut';
        $branch = Branch::all();
        
        $data_warehouse=WarehouseDelivery::Query();
        $data_warehouse->whereRaw('isnull(hideby)');
        if ($request->in_hand!==null) {
            if ($request->in_hand=='UnFinish') {
                $data_warehouse->whereIn('status_barang',['Mekanik','Gudang','Ekspedisi','Dokumen']);
            } else if ($request->in_hand=='All') {

            } else {
                $data_warehouse->where('status_barang',$request->in_hand);
            }
        } else {
            if (!in_array(auth()->user()->jabatan,['KABAG','MANAGER'])) {
                if (auth()->user()->departemensubsub == 'MEKANIK') {
                    $data_warehouse->where('status_barang','Mekanik');
                }elseif (auth()->user()->departemensubsub == 'GUDANG'||auth()->user()->departemensubsub == 'WAREHOUSE') {
                    $data_warehouse->where('status_barang','Gudang');
                }elseif (auth()->user()->departemensubsub == 'EKSPEDISI'||auth()->user()->departemensubsub == 'EXPEDISI') {
                    $data_warehouse->where('status_barang','Ekspedisi');
                }elseif (auth()->user()->departemensubsub == 'EXIM') {
                    $data_warehouse->where('status_barang','Dokumen');
                }
            } else {
                $data_warehouse->whereIn('status_barang',['Mekanik','Gudang','Ekspedisi','Dokumen']);
            }
        }
        if ($request->tanggal_trans!==null) {
            $data_warehouse->where('tanggal_trans',$request->tanggal_trans);
        }
        if ($request->from_branchdetail!==null) {
            if ($request->from_branchdetail!=='All') {
                $data_warehouse->where('from_branchdetail',$request->from_branchdetail);
            }
        } else {
            if (!in_array(auth()->user()->jabatan,['KABAG','MANAGER'])) {
                $data_warehouse->where('from_branchdetail',auth()->user()->branchdetail);
            } 
        }
        if (auth()->user()->departemensubsub == 'MEKANIK') {
            $data_warehouse->orderByRaw("FIELD(status_barang,'Mekanik','Gudang','Ekspedisi','Dokumen','Finish')");
        }elseif (auth()->user()->departemensubsub == 'GUDANG'||auth()->user()->departemensubsub == 'WAREHOUSE') {
            $data_warehouse->orderByRaw("FIELD(status_barang,'Gudang','Ekspedisi','Dokumen','Finish','Mekanik')");
        }elseif (auth()->user()->departemensubsub == 'EKSPEDISI'||auth()->user()->departemensubsub == 'EXPEDISI') {
            $data_warehouse->orderByRaw("FIELD(status_barang,'Ekspedisi','Dokumen','Finish','Mekanik','Gudang')");
        }elseif (auth()->user()->departemensubsub == 'EXIM') {
            $data_warehouse->orderByRaw("FIELD(status_barang,'Dokumen','Finish','Mekanik','Gudang','Ekspedisi')");
        }else {
            $data_warehouse->orderByRaw("FIELD(status_barang,'Mekanik','Gudang','Ekspedisi','Dokumen','Finish')");
        }
        // dd($data_warehouse->toSql());
        $data_warehouse=$data_warehouse->get();

        $map['page']=$page;
        $map['data_warehouse']=$data_warehouse;
        $map['branch']=$branch;

        $map['filter_in_hand']=$request->in_hand;
        $map['filter_from_branchdetail']=$request->from_branchdetail;
        $map['filter_tanggal_trans']=$request->tanggal_trans;

        return view('MatDoc.inOut.index', $map);
    }
    
    public function monitoring(Request $request)
    {
        $branch=Branch::get();
        $data_warehouse_pending = WarehouseDelivery::Query();
        if ($request->from_branchdetail) {
            $data_warehouse_pending->where('from_branchdetail',$request->from_branchdetail);
        }
        if ($request->to_branchdetail) {
            $data_warehouse_pending->where('to_branchdetail',$request->to_branchdetail);
        }
        if ($request->bpb) {
            $data_warehouse_pending->where('bpb',$request->bpb);
        }
        $data_warehouse_pending=$data_warehouse_pending->whereRaw('isnull(hideby)')->whereRaw('isnull(finish)')->orderBy('tanggal_trans', 'DESC')->get();

        $data_warehouse_finishtoday = WarehouseDelivery::Query();
        if ($request->from_branchdetail) {
            $data_warehouse_finishtoday->where('from_branchdetail',$request->from_branchdetail);
        }
        if ($request->to_branchdetail) {
            $data_warehouse_finishtoday->where('to_branchdetail',$request->to_branchdetail);
        }
        if ($request->bpb) {
            $data_warehouse_finishtoday->where('bpb',$request->bpb);
        }
        $data_warehouse_finishtoday=$data_warehouse_finishtoday->whereRaw('isnull(hideby)')->whereRaw('date(finish)=CURDATE()')->orderBy('tanggal_trans', 'DESC')->get();
        
        $data_all=$data_warehouse_pending->merge($data_warehouse_finishtoday);
        $map['page']='monitoring';
        $map['data_all']=$data_all;
        $map['branch']=$branch;
        return view('MatDoc.inOut.monitoring',$map);
    }
    
    public function report()
    {
        $map['page']='report';
        return view('MatDoc.inOut.report', $map);
    }

    public function report_pdf()
    {
        $pdf = PDF::loadview('MatDoc.inOut.report.pdf')->setPaper('legal', 'landscape');
        return $pdf->stream("report.pdf");
    }

    public function report_excel()
    {
        return Excel::download(new DummyExport, 'report_excel.xlsx');
    } 

    public function search_date(Request $request)
    {
        $id = $request->in_hand.'|'.$request->tanggal.'|'.$request->branch;
        // dd($id);
        return redirect()->route('in-out.barang', $id);
    }

    public function update_gudang(Request $request)
    {
        // dd($request->all());
        $data = WarehouseDelivery::where('id', $request->id)->first();
        if ($data != null) {
            $update=[
                'jumlah_sj' => $request->jumlah_sj,
                'keterangan' => $request->keterangan
            ];

            WarehouseDelivery::whereId($data->id)->update($update);
        }
        
        return back()->with('edit_gudang', 'Data Berhasil Diedit');
    }

    public function void_bpb(Request $request)
    {
        $data = WarehouseDelivery::where('id', $request->id)->first();
        if ($data != null) {
            $update=[
                'hideby' => Auth::user()->nik,
                'hidetime' => date('Y-m-d h:m:s')
            ];
            WarehouseDelivery::whereId($data->id)->update($update);
        }
        
        return back()->with('edit_gudang', 'Data Berhasil Diedit');
    }

    public function next_step($id)
    {
        $data = WarehouseDelivery::where('id', $id)->first();
        // Jika Tidak ada Reverse
        $update=[];
        if ($data->status_barang == 'Mekanik' && $data->out_mekanik == null && $data->in_ekspedisi == null) {
            $update=[
                'status_barang' => 'Ekspedisi',
                'out_mekanik' => date('Y-m-d H:i:s'),
                'in_ekspedisi' => date('Y-m-d H:i:s'),
            ];
        }elseif ($data->status_barang == 'Gudang' && $data->out_gudang == null && $data->in_ekspedisi == null) {
            $update=[
                'status_barang' => 'Ekspedisi',
                'out_gudang' => date('Y-m-d H:i:s'),
                'in_ekspedisi' => date('Y-m-d H:i:s'),
            ];
        }elseif($data->status_barang == 'Dokumen' && $data->finish == null) {
            $update=[
                'status_barang' => 'Finish',
                'finish' => date('Y-m-d H:i:s'),
            ];
        }

        // Jika Pernah di reverse 
        if ($data->status_barang == 'Gudang' && $data->out_gudang != null && $data->in_ekspedisi != null && $data->reverse != null) {
            $update = [
                'status_barang' => 'Ekspedisi',
            ];
        }
        // kudu dihapus 
        elseif ($data->status_barang == 'Dokumen' && $data->reverse != null) {
            $update = [
                'status_barang' => 'Finish',
            ];
        }
        WarehouseDelivery::whereId($data->id)->update($update);

        return back()->with('sudah_dikirim', 'Data Berhasil Dikirim');
    }

    public function reverse_step($id)
    {
        $data = WarehouseDelivery::where('id', $id)->first();
        $update=[];
        if ($data->status_barang == 'Ekspedisi') {
            if ($data->in_mekanik !== null) {
                $update = [
                    'surat_jalan' => null,
                    'out_mekanik' => null,
                    'in_ekspedisi' => null,
                    'out_ekspedisi' => null,
                    'in_dokumen' => null,
                    'status_barang' => 'Mekanik',
                    'reverse' => $data->reverse+1
                ];
            } else {
                $update = [
                    'surat_jalan' => null,
                    'out_gudang' => null,
                    'in_ekspedisi' => null,
                    'out_ekspedisi' => null,
                    'in_dokumen' => null,
                    'status_barang' => 'Gudang',
                    'reverse' => $data->reverse+1
                ];
            }
        }elseif ($data->status_barang == 'Dokumen') {
            $update = [
                'out_ekspedisi' => null,
                'in_dokumen' => null,
                'status_barang' => 'Ekspedisi',
                'reverse' => $data->reverse+1
            ];
        }
        // Kudu dihapus 
        elseif ($data->status_barang == 'Finish') {
            $update = [
                'in_dokumen' => null,
                'finish' => null,
                'status_barang' => 'Ekspedisi',
                'reverse' => $data->reverse+1
            ];
        }
        WarehouseDelivery::whereId($id)->update($update);

        return back();
    }

    public function update_ekspedisi(Request $request)
    {
        $data = WarehouseDelivery::where('id', $request->id)->first();
        $update=[];
        if ($data->surat_jalan == null && $data->out_ekspedisi == null && $data->in_dokumen == null) {
            $update=[
                'surat_jalan' => $request->surat_jalan,
                'status_barang' => 'Dokumen',
                'out_ekspedisi' => date('Y-m-d H:i:s'),
                'in_dokumen' => date('Y-m-d H:i:s'),
            ];
        }elseif ($data->surat_jalan != null && $data->out_ekspedisi != null && $data->in_dokumen != null && $data->reverse != null) {
            $update=[
                'surat_jalan' => $request->surat_jalan,
                'status_barang' => 'Dokumen',
            ];
        }elseif ($request->dokumen_note != null) {
            $update=[
                'dokumen_note' => $request->dokumen_note
            ];
        }

        WarehouseDelivery::whereId($request->id)->update($update);

        return back()->with('sudah_dikirim', 'Data Berhasil Dikirim');
    }
    
    public function pengeluaran_finish($id)
    {
        $page = 'pengeluaran';
        if ($id == 219) {
            $tanggal = date('Y-m-d');
        }else {
            $tanggal =  $id;
        }
        $data_warehouse = WarehouseDelivery::where('status_barang','Finish')->whereRaw('DATE(finish) = ?', [$tanggal])->get();
        // dd($data_warehouse);
        return view('MatDoc.inOut.pengeluaran', compact('page', 'data_warehouse', 'id'));
    }

    public function finish()
    {
        return redirect()->route('in-out.pengeluaran_finish',219);
    }
}
