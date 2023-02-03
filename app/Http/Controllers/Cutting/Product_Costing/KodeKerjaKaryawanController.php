<?php

namespace App\Http\Controllers\Cutting\Product_Costing;

use Illuminate\Http\Request;
use App\Models\GGI_IS\V_GCC_USER;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KodeKerjaKaryawanExport;
use App\Imports\KodeKerjaKaryawanImport;
use App\Models\Cutting\Product_Costing\MasterKodeKerja;
use App\Models\Cutting\Product_Costing\KodeKerjaKaryawan;
use App\Services\Production\ProductCosting\kode_kerja_karyawan;

class KodeKerjaKaryawanController extends Controller
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

    public function index(Request $request)
    {
        $page ='KodeKerjaKaryawan';
        $karyawan = V_GCC_USER::with('data_gapok')
                    ->where('branch', auth()->user()->branch)
                    ->get();
                    //dd(auth()->user()->branchdetail);
        $kode_kerja = MasterKodeKerja::where('branch', auth()->user()->branch)
                    ->where('branchdetail', auth()->user()->branchdetail)
                    ->get();
        // dd($karyawan);
        $data_kode_karyawan = (new kode_kerja_karyawan)->data_index($karyawan);
        if(request()->ajax()){
            return datatables($data_kode_karyawan)
            ->editColumn('gaji_pokok', function($row){
                  return 'Rp. '.number_format($row['gaji_pokok'], 2, ",", ".");
            })
            ->editColumn('prem_krj', function($row){
                return 'Rp. '.number_format($row['prem_krj'], 2, ",", ".");
            })
            ->editColumn('tun_tetap', function($row){
                return 'Rp. '.number_format($row['tun_tetap'], 2, ",", ".");
            })
            ->editColumn('thp', function($row){
                return 'Rp. '.number_format($row['thp'], 2, ",", ".");
            })
            ->editColumn('gp_tun', function($row){
                return 'Rp. '.number_format($row['gp_tun'], 2, ",", ".");
            })
            ->editColumn('bpjamsostek', function($row){
                return 'Rp. '.number_format($row['bpjamsostek'], 2, ",", ".");
            }) 
            ->editColumn('bpjs_ks', function($row){
                return 'Rp. '.number_format($row['bpjs_ks'], 2, ",", ".");
            })
            ->editColumn('uang_makan', function($row){
                return 'Rp. '.number_format($row['uang_makan'], 2, ",", ".");
            }) 
            ->editColumn('gaji_per_hari', function($row){
                return 'Rp. '.number_format($row['gaji_per_hari'], 2, ",", ".");
            })
            ->editColumn('gaji_per_jam', function($row){
                return 'Rp. '.number_format($row['gaji_per_jam'], 2, ",", ".");
            }) 
            ->editColumn('gaji_per_jam_lembur', function($row){
                return 'Rp. '.number_format($row['gaji_per_jam_lembur'], 2, ",", ".");
            })
            ->addColumn('action', function($row){
                $kode_kerja = MasterKodeKerja::where('branch', auth()->user()->branch)
                            ->where('branchdetail', auth()->user()->branchdetail)
                            ->get();
               return view('production.cutting.product_costing.hrd.kode_kerja_karyawan.btn_action', compact('row', 'kode_kerja'));
            })
            ->make();
         }
        // dd($data_kode_karyawan);
        return view('production.cutting.product_costing.hrd.kode_kerja_karyawan.index', compact('page', 'karyawan', 'kode_kerja','data_kode_karyawan'));
    }

    public function cari_nik($id)
    {
        $data = V_GCC_USER::findorfail($id);
        return response()->json($data);
    }

    public function kode_kerja($id)
    {
        $data = MasterKodeKerja::where('kode_kerja', $id)->first();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        // $input = $request->all();
        // dd($input);

        $input = [
            '_token' => $request->_token,
            'periode' => $request->periode,
            'hari_kerja' => $request->hari_kerja,
            'tahun' => $request->tahun,
            'nik' => $request->nik,
            'gedung' => $request->gedung,
            'group' => $request->group,
            'kategory' => $request->kategory,
            'gaji_pokok' => str_replace(',', '', $request->gaji_pokok),
            'prem_krj' => str_replace(',', '', $request->prem_krj),
            'tun_tetap' => str_replace(',', '', $request->tun_tetap),
            'thp' => str_replace(',', '', $request->thp),
            'gp_tun' => str_replace(',', '', $request->gp_tun),
            'gaji_per_hari' => str_replace(',', '', $request->gaji_per_hari),
            'gaji_per_jam' => str_replace(',', '', $request->gaji_per_jam),
            'bpjamsostek' => str_replace(',', '', $request->bpjamsostek),
            'bpjs_ks' => str_replace(',', '', $request->bpjs_ks),
            'uang_makan' => str_replace(',', '', $request->uang_makan),
            'kode_kerja' => $request->kode_kerja,
        ];
        // dd($input);

        $show = KodeKerjaKaryawan::create($input);

        return redirect()->route('kode_kerja_karyawan.index');
    }
    
    public function delete($id)
    {
        $data = KodeKerjaKaryawan::findOrFail($id);
        // dd($data);
        $data->delete();
        
        return back();
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $kode_kerja = MasterKodeKerja::where('kode_kerja', $request->kode_kerja)->first();
        $id = $request->id;
        $update = [
            '_token' => $request->_token,
            'periode' => $request->periode,
            'hari_kerja' => $request->hari_kerja,
            'tahun' => $request->tahun,
            'gedung' => $request->gedung,
            'group' => $request->group,
            'kategory' => $request->kategory,
            'gaji_pokok' => str_replace(',', '', $request->gaji_pokok),
            'prem_krj' => str_replace(',', '', $request->prem_krj),
            'tun_tetap' => str_replace(',', '', $request->tun_tetap),
            'thp' => str_replace(',', '', $request->thp),
            'gp_tun' => str_replace(',', '', $request->gp_tun),
            'gaji_per_hari' => str_replace(',', '', $request->gaji_per_hari),
            'gaji_per_jam' => str_replace(',', '', $request->gaji_per_jam),
            'bpjamsostek' => str_replace(',', '', $request->bpjamsostek),
            'bpjs_ks' => str_replace(',', '', $request->bpjs_ks),
            'uang_makan' => str_replace(',', '', $request->uang_makan),
            'kode_kerja' => $request->kode_kerja,
        ];
        // dd($update);
        KodeKerjaKaryawan::whereId($id)->update($update);
        // end perintah update

        return back();
    }

    public function export() 
    {
        $tanggal = date('dmY');
        // dd($tanggal);
        return Excel::download(new KodeKerjaKaryawanExport, 'kode_kerja_karyawan_'.$tanggal.'.xlsx');
    }

    public function import(Request $request)
    {
        $input = $request->all();
        Excel::import(new KodeKerjaKaryawanImport($input),request()->file('file'));
           
        return back();
    }

    public function search(Request $request)
    {
        // dd($request->all());
        $karyawan = V_GCC_USER::with('data_gapok')
                    ->where('branch', auth()->user()->branch)
                    ->get();
        $kode_kerja = MasterKodeKerja::where('branch', auth()->user()->branch)
                    ->where('branchdetail', auth()->user()->branchdetail)
                    ->get();

        
        $data_kode_karyawan = (new kode_kerja_karyawan)->data_search($karyawan, $request);
        // dd($data_kode_karyawan);
        $page ='KodeKerjaKaryawan';
        // $this->show($data_kode_karyawan);
        return view('production.cutting.product_costing.hrd.kode_kerja_karyawan.index', compact('data_kode_karyawan', 'page', 'karyawan', 'kode_kerja'));
        // return redirect()->route('kode_kerja_karyawan.show');
    }

    // public function show($data_kode_karyawan)
    // {
    //     dd($data_kode_karyawan);
    //     return view('production.cutting.product_costing.hrd.kode_kerja_karyawan.search', compact('data_kode_karyawan', 'page', 'karyawan', 'kode_kerja'));
    // }
}
