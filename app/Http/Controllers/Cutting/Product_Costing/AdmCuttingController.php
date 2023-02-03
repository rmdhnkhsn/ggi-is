<?php

namespace App\Http\Controllers\Cutting\Product_Costing;

use Auth;
use PDF;
use App\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Services\Production\ProductCosting\data_ppic;
use App\Models\Cutting\Product_Costing\FormGelar;
use App\Models\Cutting\Product_Costing\CuttingPPIC;
use App\Models\Cutting\Product_Costing\CuttingComponentPPIC;


class AdmCuttingController extends Controller
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

    public function gelaran()
    {
        $ActiveMenu ='gelaran';
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
        return view('production.cutting.product_costing.AdminCutting.FormGelaran', compact('page', 'ActiveMenu', 'data_olahan', 'form'));
    }

    public function create_gelaran()
    {
        $page ='dashboard';
        return view('production.cutting.product_costing.AdminCutting.components.FormGelaran.create', compact('page'));
    }

    public function edit_gelaran()
    {
        $page ='dashboard';
        return view('production.cutting.product_costing.AdminCutting.components.FormGelaran.edit', compact('page'));
    }

    public function detail_gelaran()
    {
        $page ='dashboard';
        return view('production.cutting.product_costing.AdminCutting.components.FormGelaran.detail', compact('page'));
    }

    public function dalam_proses()
    {
        $ActiveMenu ='proses';
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

        $gelar = FormGelar::where('proses', 'Proses Gelar')
                        ->where('sequence', 20)
                        ->get();
        return view('production.cutting.product_costing.AdminCutting.FormProses', compact('page', 'ActiveMenu', 'data_olahan', 'gelar'));
    }

    public function edit_proses()
    {
        $page ='dashboard';
        return view('production.cutting.product_costing.AdminCutting.components.FormProses.edit', compact('page'));
    }

    public function detail_proses()
    {
        $page ='dashboard';
        return view('production.cutting.product_costing.AdminCutting.components.FormProses.detail', compact('page'));
    }

    public function print_proses()
    {
        $page ='dashboard';
        return view('production.cutting.product_costing.AdminCutting.components.FormProses.print', compact('page'));
    }

    public function print_pdf()
    {
        $page ='dashboard';
        $pdf = PDF::loadview('production.cutting.product_costing.AdminCutting.components.FormProses.printPDF')->setPaper('legal', 'landscape');
        return $pdf->stream("label-sisa-kain.pdf");
    }
    
    public function data_cutting()
    {
        $ActiveMenu ='data';
        $page ='dashboard';
        return view('production.cutting.product_costing.AdminCutting.DataCutting', compact('page', 'ActiveMenu'));
    }

    public function detail_cutting()
    {
        $ActiveMenu ='data';
        $page ='dashboard';
        return view('production.cutting.product_costing.AdminCutting.components.DataCutting.detail', compact('page', 'ActiveMenu'));
    }
}
