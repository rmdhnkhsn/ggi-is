<?php

namespace App\Http\Controllers\Cutting\Product_Costing;

use Auth;
use App\User;
use App\Branch;
use App\JdeApi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Cutting\Product_Costing\FormGelar;
use App\Services\Production\ProductCosting\report;
use App\Services\Production\ProductCosting\proses_gelar;
use App\Services\Production\ProductCosting\count_report;
use App\Services\Production\ProductCosting\report_cutting;
use App\Services\Production\ProductCosting\report_bundling;
use App\Services\Production\ProductCosting\report_pressing;
use App\Services\Production\ProductCosting\report_numbering;
use App\Services\Production\ProductCosting\report_analytics;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function report_gelar()
    {
        $page ='dashboard';
        $bagian = 'gelar';
        $branch = Branch::where('kode_branch', auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)
                        ->first();
        $data_form = FormGelar::where('factory', $branch->kode_jde)->get();
        $data_pertama = (new report)->gelar_index($data_form);
        // dd($data_pertama);
        
        // // untuk hitungan di menubar 
        $menubar = (new count_report)->all($data_form);
        // // dd($bundling);

        return view('production.cutting.product_costing.report.proses_gelar', compact('menubar','bagian','page', 'data_pertama'));
    }

    public function report_cutting()
    {
        $page ='dashboard';
        $bagian = 'cutting';
        $branch = Branch::where('kode_branch', auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)
                        ->first();
        $data_form = FormGelar::where('factory', $branch->kode_jde)->get();
        $data_pertama = (new report_cutting)->cutting_index($data_form);
        // dd($data_pertama);

        // // untuk hitungan di menubar 
        $menubar = (new count_report)->all($data_form);
        // // dd($bundling);

        return view('production.cutting.product_costing.report.proses_cutting', compact('menubar','bagian','page', 'data_pertama'));
    }

    public function report_numbering()
    {
        $page ='dashboard';
        $bagian = 'numbering';
        $branch = Branch::where('kode_branch', auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)
                        ->first();
        $data_form = FormGelar::where('factory', $branch->kode_jde)->get();
        $data_pertama = (new report_numbering)->numbering_index($data_form);

       // // untuk hitungan di menubar 
       $menubar = (new count_report)->all($data_form);
       // // dd($bundling);

        return view('production.cutting.product_costing.report.proses_numbering', compact('menubar','bagian','page', 'data_pertama'));
    }

    public function report_bundling()
    {
        $page ='dashboard';
        $bagian = 'bundling';
        $branch = Branch::where('kode_branch', auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)
                        ->first();
        $data_form = FormGelar::where('factory', $branch->kode_jde)->get();
        // dd($data_form);
        $data_pertama = (new report_bundling)->bundling_index($data_form);

        // // untuk hitungan di menubar 
        $menubar = (new count_report)->all($data_form);
        // // dd($bundling);
        

        return view('production.cutting.product_costing.report.proses_bundling', compact('menubar','bagian','page', 'data_pertama'));
    }

    public function report_pressing ()
    {
        $page ='dashboard';
        $bagian = 'pressing';

        $branch = Branch::where('kode_branch', auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)
                        ->first();
        $data_form = FormGelar::where('factory', $branch->kode_jde)->get();
        $data_pertama = (new report_pressing)->pressing_index($data_form);
        // dd($data_pertama);

        // // untuk hitungan di menubar 
        $menubar = (new count_report)->all($data_form);
        // // dd($bundling);

        return view('production.cutting.product_costing.report.proses_pressing', compact('menubar','bagian','page', 'data_pertama'));
    }

    public function report_analytics()
    {
        $page ='dashboard';
        $bagian = 'analisis';
        $branch = Branch::where('kode_branch', auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)
                        ->first();
        $data_form = FormGelar::where('factory', $branch->kode_jde)->get();
        $data_gelar = (new report)->gelar_index($data_form);
        $data_cutting = (new report_cutting)->cutting_index($data_form);
        $data_numbering = (new report_numbering)->numbering_index($data_form);
        $data_pressing = (new report_pressing)->pressing_index($data_form);
        $data_bundling = (new report_bundling)->bundling_index($data_form);
        // dd($data_numbering);

        $data_pertama = (new report_analytics)->analytics_index($data_gelar, $data_cutting, $data_numbering, $data_pressing, $data_bundling);
        // dd($data_pertama);

        // // untuk hitungan di menubar 
        $menubar = (new count_report)->all($data_form);
        // // dd($bundling);
        return view('production.cutting.product_costing.report.analytics', compact('data_pertama','menubar','bagian','page'));
    }

}