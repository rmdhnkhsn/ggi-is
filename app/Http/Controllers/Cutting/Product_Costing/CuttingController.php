<?php

namespace App\Http\Controllers\Cutting\Product_Costing;

use Auth;
use DateTime;
use App\User;
use App\JdeApi;
use App\Branch;
use App\Stower;
use DataTables;
use App\Bdetail;
use App\KodeSize;
use App\ListBuyer;
use App\WOBreakDown;
use App\Services\bulan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use App\Services\tiket\Rproblem;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\GetData\Rework\Report\Bulanan\bulanan;
use App\GetData\Rework\Report\Bulanan\kodebulan;
use App\Models\Cutting\Product_Costing\FormGelar;
use App\Models\Cutting\Product_Costing\GelaranWo;
use App\Models\Cutting\Product_Costing\ProsesGelar;
use App\Models\Cutting\Product_Costing\DataBundling;
use App\Models\Cutting\Product_Costing\CuttingPPIC;
use App\Services\Production\ProductCosting\data_ppic;
use App\Models\Cutting\Product_Costing\ProsesGelarUser;
use App\Services\Production\ProductCosting\proses_gelar;
use App\Models\Cutting\Product_Costing\ProsesGelarRemark;
use App\Models\Cutting\Product_Costing\GelarQtyBreakdown;
use App\Services\Production\ProductCosting\proses_cutting;
use App\Services\Production\ProductCosting\proses_bundling;
use App\Models\Cutting\Product_Costing\ProsesBundlingUser;
use App\Models\Cutting\Product_Costing\CuttingComponentPPIC;

class CuttingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $page ='dashboard';
        return view('production.cutting.home', compact('page'));
    }

    public function ppic()
    {
        $page ='dashboard';
        $wo = JdeApi::where('F4801_SRST','<=',45)
                    ->where('F4801_SRST','!=',15)
                    ->get();
        $ppic = CuttingPPIC::all();
        $address = Branch::all();
        // dd($ppic);

        // return view('production.cutting.product_costing.ppic.index', compact('jumlah_wo','wo_selesai','page','data_table_ppic'));
        return view('production.cutting.product_costing.ppic.wo_selesai', compact('ppic','page','address'));
    }

    public function qty_breakdown($id)
    {
        $data = WOBreakDown::where('F560020_DOCO', $id)->get();
        // dd($data);
        $result = [];
        foreach ($data as $key => $value) {
            $size = KodeSize::where('F0005_KY', $value->F560020_SIZE55)->first();
            $result[] = [
                'color' => $value->F560020_SEG4,
                'size' => $size->F0005_DL01,
                'qty'=> $value->F560020_QTY
                
            ];
        }
        return response()->json($result);
    }

    public function adm_cutting()
    {
        $page ='dashboard';
        $branch = Branch::where('kode_branch', auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)
                        ->first();
		$kode_jde = str_replace(" ", "",$branch->kode_jde);
		// dd($branch->kode_jde);
		
        $cek_pertama = CuttingPPIC::where('factory', $branch->kode_jde)->count('id');
        // dd($cek_pertama);
        if ($cek_pertama != 0) {
            $data = CuttingPPIC::where('factory', $branch->kode_jde)->get();
        }else {
            $data = CuttingPPIC::where('factory', $kode_jde)->get();;
        }
        // dd($data);
        $component = CuttingComponentPPIC::all();
        // dd($component);
        $data_utama = (new data_ppic)->tabel_index($data, $component);
        // dd($data_utama);
        $data_kedua = (new data_ppic)->data_olahan($data_utama);

        $data_olahan = collect($data_kedua)->where('sisa', '!=', 0);

        $form = FormGelar::where('proses', 'Admin Cutting')
                        ->where('sequence', 10)
                        ->get();
        $gelar = FormGelar::where('proses', 'Proses Gelar')
                        ->where('sequence', 20)
                        ->get();
        // dd($form);
        return view('production.cutting.product_costing.admin_cutting.index', compact('data_olahan','page', 'form', 'gelar'));
    }

    public function adm_create()
    {
        $page ='dashboard';
        $branch = Branch::where('kode_branch', auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)
                        ->first();
        // dd($branch);
		// $kode_jde = str_replace(" ", "",$branch->kode_jde);
		// dd($kode_jde);
		
        // disable karena ppic tidak input WO lagi
        // $wo = CuttingPPIC::where('factory', $branch->kode_jde)->get();
        $wo = CuttingPPIC::get();

        // dd($wo);
        $form_terakhir = FormGelar::latest('id')->first();
        // dd($form_terakhir);
        if ($form_terakhir == null) {
            $form_id = 1;
        }else {
            $form_id =  $form_terakhir->id +1;
        }

        return view('production.cutting.product_costing.admin_cutting.create', compact('form_id','page', 'wo'));
    }

    public function gelar()
    {
       
        $page ='dashboard';
        $branch = Branch::where('kode_branch', auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)
                        ->first();
        $form = FormGelar::where('proses', 'Proses Gelar')
                        ->where('sequence', '20')
                        ->where('factory', $branch->kode_jde)
                        ->get();
        // dd($form);
        return view('production.cutting.product_costing.proses_gelar.index', compact('page', 'form'));
    }

    public function mulai_gelar($id)
    {
        $form = FormGelar::findorfail($id);
        // dd($form);
        $page ='dashboard';
        return view('production.cutting.product_costing.proses_gelar.mulai', compact('page','form'));
    }

    public function form_gelar($id)
    {
        $page ='dashboard';
        $form = FormGelar::with('proses_gelar')->findorfail($id);
        $proses_gelar = collect($form->proses_gelar)->count('id');
        $tanggal_mulai = ProsesGelarUser::where('form_id', $id)->first();
        $date =  new DateTime();
        $finish = date_format($date,'Y-m-d H:i:s');
        // dd($finish);
        $dataWO = collect($form->gelaran_wo)
        ->groupBy('no_wo');
        $color = collect($form->gelaran_wo)
        ->groupBy('color');
        $qty = (new proses_gelar)->qty($form);
        // dd($form);
        $gelar_qty = (new proses_gelar)->gelar_qty($qty, $form);
        // dd($gelar_qty);
        foreach ($gelar_qty as $key => $value) {
            // dd($value);
            if(
                GelarQtyBreakdown::where('form_id', $value['form_id'])->where('no_wo', $value['no_wo'])->where('color', $value['color'])->count()
            ){
                $dataQTY = GelarQtyBreakdown::where('form_id', $value['form_id'])->where('no_wo', $value['no_wo'])->where('color', $value['color'])->first();
                GelarQtyBreakdown::whereId($dataQTY->id)->update($value);
            }else {
                GelarQtyBreakdown::create($value);
            }
        }
        return view('production.cutting.product_costing.proses_gelar.form-gelar', compact('finish','tanggal_mulai','qty','proses_gelar','page','form', 'dataWO', 'color'));
    }

    public function hrd()
    {
        $page ='dashboard';
        return view('production.cutting.product_costing.hrd.dashboard', compact('page'));
    }

    public function proses_cutting()
    {
        $page ='dashboard';
        $data = FormGelar::where('proses', 'Proses Cutting')
                        ->where('sequence', '30')
                        ->get();
        $component = CuttingComponentPPIC::all();
        // $index_data = (new proses_cutting)->index_data($data);
        // dd($index_data);
        return view('production.cutting.product_costing.proses_cutting.index', compact('component', 'data', 'page'));
    }

    public function mulai_cutting()
    {
        $page ='dashboard';
        return view('production.cutting.product_costing.proses_cutting.mulai_cutting', compact('page'));
    }

    public function proses_numbering()
    {
        $page ='dashboard';
        $component = CuttingComponentPPIC::all();
        $branch = Branch::where('kode_branch', auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)
                        ->first();

        $numbering = FormGelar::where('proses', 'Proses Numbering')
                        ->where('sequence', '40')
                        ->where('factory', $branch->kode_jde)
                        ->get();
                        
        // dd($numbering);
        $pressing = FormGelar::where('proses', 'Proses Pressing')
                        ->where('sequence', '50')
                        ->where('factory', $branch->kode_jde)
                        ->get();
        // dd($pressing);
        $bundling = FormGelar::where('proses', 'Proses Bundling')
                        ->where('sequence', '60')
                        ->where('factory', $branch->kode_jde)
                        ->get();
        $gelar_qty_breakdown = GelarQtyBreakdown::all();
        // dd($gelar_qty_breakdown);
        return view('production.cutting.product_costing.proses_numbering.index', compact('bundling','gelar_qty_breakdown','page', 'numbering', 'pressing', 'component'));
    }

    public function mulai_numbering()
    {
        $page ='dashboard';
        return view('production.cutting.product_costing.proses_numbering.mulai_numbering', compact('page'));
    }

    public function update_proses($id)
    {
        $data = FormGelar::findorfail($id);
        $update = [
            'proses' => 'Proses Gelar',
            'sequence' => '20'
        ];

        FormGelar::whereId($data->id)->update($update);

        return back();
    }

}