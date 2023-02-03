<?php

namespace App\Http\Controllers\Purchasing;

use PDF;
use App\ListBuyer;
use App\Services\bulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Purchasing\PlanPuchase;
use App\Services\Purchasing\savingcost;
use App\GetData\Rework\Report\Bulanan\kodebulan;

class SavingCostController extends Controller
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
    public function dashboard()
    {
        return redirect()->route('savingCost.index',234);
    }
    public function saving_cost($id)
    {
        $page = 'dashboard';
        if ($id == 234) {
            $firstDate = date('Y-m-d', strtotime('first day of this month'));
            $lastDate = date('Y-m-d', strtotime('last day of this month'));
            $AwalBulanLalu = date('Y-m-d', strtotime('first day of last month'));
            $AkhirBulanLalu = date('Y-m-d', strtotime('last day of last month'));
        }else {
            $bulan = $id;
            $kodeBulan = (new kodebulan)->bulan($bulan);
            $firstDate = (new kodebulan)->tanggal_awal($bulan);
            $lastDate = (new kodebulan)->tanggal_akhir($bulan);

            $bulanSebelumnya = date("Y-m",strtotime("-1 month",strtotime($bulan)));
            $AwalBulanLalu = (new kodebulan)->tanggal_awal($bulanSebelumnya);
            $AkhirBulanLalu = (new kodebulan)->tanggal_akhir($bulanSebelumnya);
        }
        
        $buyer = ListBuyer::all();
        // $data = PlanPuchase::whereBetween('created_at', [$firstDate,$lastDate])->get();
        // $bulanLalu = PlanPuchase::whereBetween('created_at', [$AwalBulanLalu,$AkhirBulanLalu])->get();

        $data = PlanPuchase::whereRaw("date(valid_date) between '".$firstDate."' and '".$lastDate."'")->get();
        $bulanLalu = PlanPuchase::whereRaw("date(valid_date) between '".$AwalBulanLalu."' and '".$AkhirBulanLalu."'")->get();
        // dd($data);
        $data_index = (new savingcost)->data_index($data, $bulanLalu);
        // dd($data_index);

        // dd($presentase_bulan_lalu);
        return view('purchasing.savingCost.index', compact('page', 'data','data_index','id'));
    }

    public function search_buyer(Request $request)
    {
        // dd($request->all());
        // $address = ListBuyer::where('F0101_ALPH','LIKE', '%'.$request->buyer.'%')->get();
        $address = ListBuyer::whereRaw("F0101_ALPH LIKE '%".$request->buyer."%'");
        // log::info($address->toSql());

        $address=$address->get();


        $response = array();
        foreach($address as $buyer){
            $response[] = array(
                "id"=>$buyer->F0101_AN8,
                "text"=>$buyer->F0101_ALPH
            );
        }
        // dd($response);
        return response()->json($response); 
    }

    public function plan_store(Request $request)
    {

        // dd($request->all());
        LOG::INFO($request->all());

        $input = $request->all();
        $cek_data = PlanPuchase::where('buyer', $request->buyer)->where('item', $request->item)->where('before', $request->before)->where('valid_date', $request->valid_date)->count('id');
        if ($cek_data == 0) {
            PlanPuchase::create($input);
        }else {
            $data = PlanPuchase::where('buyer', $request->buyer)->where('item', $request->item)->where('before', $request->before)->where('valid_date', $request->valid_date)->first();
            PlanPuchase::whereId($data->id)->update($input);
        }

        return back()->with('sudah_dikirim', 'Data Berhasil Disimpan');
    }
    
    public function store_realization(Request $request)
    {
        // dd($request->all());
        if ($request->nambah_po == null) {
            // dd('hai');
            $update_biasa = (new savingcost)->update_biasa($request);
            PlanPuchase::whereId($request->id)->update($update_biasa);
        } else {
            $update_biasa = (new savingcost)->update_biasa($request);
            PlanPuchase::whereId($request->id)->update($update_biasa);

            foreach ($request->amount_before as $key => $value) {
                $create = [
                    'buyer' => $request->buyer,
                    'buyer_name' => $request->buyer_name,
                    'item' => $request->item,
                    'valid_date' => $request->valid_date,
                    'before' => $request->before,
                    'after' => $request->after,
                    'amount_before' => $request->amount_before[$key],
                    'amount_after' => $request->amount_after[$key],
                    'old_price' => $request->old_price[$key],
                    'new_price' => $request->new_price[$key],
                    'currency' => $request->currency[$key],
                    'kurs' => $request->kurs[$key],
                    'no_po' => $request->no_po[$key],
                    'qty' => $request->qty[$key],
                    'uom' => strtoupper($request->uom[$key]),
                    'amount_saving' => $request->amount_saving[$key],
                    'saving' => $request->saving[$key],
                    'remark' => $request->remark[$key],
                ];
                PlanPuchase::create($create);
            }
        }
        return redirect()->route('savingCost.dashboard')->with('realization_ok', 'Data Berhasil Disimpan');
    }

    public function delete($id)
    {
        $data = PlanPuchase::findorfail($id);
        $data->delete();

        return back()->with('berhasil_hapus', 'Data Berhasil Dihapus');
    }

    public function realization($id)
    {
        $page = 'dashboard';
        $data = PlanPuchase::findorfail($id);
        return view('purchasing.savingCost.realization', compact('page', 'data'));
    }
    
    public function analytics()
    {
        return redirect()->route('savingCost.annual_report',234);;
    }

    public function annual_report($id)
    {
        $page = 'dashboard';
        // dd($page);
        // Isian Kotak putih 
        $firstDate = date('Y-m-d', strtotime('first day of this month'));
        $lastDate = date('Y-m-d', strtotime('last day of this month'));
        $AwalBulanLalu = date('Y-m-d', strtotime('first day of last month'));
        $AkhirBulanLalu = date('Y-m-d', strtotime('last day of last month'));

        if ($id == 234) {
            $tahun = Date('Y');
            $awalTahun = date('Y-m-d', strtotime('first day of january this year'));
            $akhirTahun = date('Y-m-d', strtotime('last day of december this year'));
        }else {
            $tahun = $id;
            $januari = $tahun.'-01';
            $desember = $tahun.'-12';
            $awalTahun =  (new kodebulan)->tanggal_awal($januari);
            $akhirTahun = (new kodebulan)->tanggal_akhir($desember);
            // dd($akhirTahun);
        }
        
        // dd($akhirTahun);
        // Tanggal Awal && Tanggal Akhir Tahun 
        $listBulan = (new bulan)->list($tahun);
        $dataBulan = (new bulan)->awalakhir($listBulan);
        // dd($akhirTahun);

        $data = PlanPuchase::whereDate('valid_date', '>=', $firstDate)
                                ->whereDate('valid_date', '<=', $lastDate)
                                ->get();
        $bulanLalu = PlanPuchase::whereDate('valid_date', '>=', $AwalBulanLalu)
                                ->whereDate('valid_date', '<=', $AkhirBulanLalu)
                                ->get();
        $sitahun = PlanPuchase::whereDate('valid_date', '>=', $awalTahun)
                                ->whereDate('valid_date', '<=', $akhirTahun)
                                ->get();
        // dd($sitahun);

        $data_index = (new savingcost)->data_index($data, $bulanLalu);
        $index_buyer = (new savingcost)->index_buyer($data);
        
        // dd($index_buyer);
        $buat_tabel = (new savingcost)->buat_tabel($dataBulan, $sitahun);
        // dd($buat_tabel);

        return view('purchasing.savingCost.analytics', compact('page','data_index', 'index_buyer','dataBulan','buat_tabel', 'id'));
    }

    public function export_pdf($id)
    {
        $tanggal = date('Ymd');
        // dd($tanggal);
        if ($id == 234) {
            $bulan = date('Y-m');
            $tahun = date('Y');
            $firstDate = date('Y-m-d', strtotime('first day of this month'));
            $lastDate = date('Y-m-d', strtotime('last day of this month'));
        }else {
            $bulan = $id;
            $tahunNih = explode('-', $bulan);
            $tahun = $tahunNih[0];
            $kodeBulan = (new kodebulan)->bulan($bulan);
            $firstDate = (new kodebulan)->tanggal_awal($bulan);
            $lastDate = (new kodebulan)->tanggal_akhir($bulan);
        }

        
        $data = PlanPuchase::whereDate('valid_date', '>=', $firstDate)
                                ->whereDate('valid_date', '<=', $lastDate)
                                ->get();
        $kodeBulan = (new kodebulan)->bulan($bulan);
        $tahun = $tahun;
        // dd($kodeBulan);

        $pdf = PDF::loadview('purchasing.savingCost.export-pdf',  compact('data','kodeBulan','tahun'))->setPaper('legal', 'landscape');
        return $pdf->stream("savingCostPDF".$tanggal.".pdf");
    }

    public function manage_pdf($id)
    {
        if ($id == 234) {
            $tahun = Date('Y');
            $awalTahun = date('Y-m-d', strtotime('first day of january this year'));
            $akhirTahun = date('Y-m-d', strtotime('last day of december this year'));
        }else {
            $tahun = $id;
            $januari = $tahun.'-01';
            $desember = $tahun.'-12';
            $awalTahun =  (new kodebulan)->tanggal_awal($januari);
            $akhirTahun = (new kodebulan)->tanggal_akhir($desember);
        }
        // Tanggal Awal && Tanggal Akhir Tahun 
        $listBulan = (new bulan)->list($tahun);
        $dataBulan = (new bulan)->awalakhir($listBulan);

        $sitahun = PlanPuchase::whereDate('valid_date', '>=', $awalTahun)
                                ->whereDate('valid_date', '<=', $akhirTahun)
                                ->get();

        $buat_tabel = (new savingcost)->buat_tabel($dataBulan, $sitahun);

        $pdf = PDF::loadview('purchasing.savingCost.manage-pdf',  compact('buat_tabel','tahun', 'dataBulan'))->setPaper('legal', 'landscape');
        return $pdf->stream("savingCostAnalyticsPDF".$tahun.".pdf");
    }
}