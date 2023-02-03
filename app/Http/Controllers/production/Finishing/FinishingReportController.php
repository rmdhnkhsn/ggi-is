<?php

namespace App\Http\Controllers\production\Finishing;

use PDF;
use App\Branch;
use Illuminate\Http\Request;
use App\Exports\FinishingExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Finising\finising_checker;
use App\Models\Finising\finising_category;
use App\Services\Production\Finishing\reportBulanan;
use App\Services\Production\Finishing\finishingToEkspedisi;

class FinishingReportController extends Controller
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

    public function bulanan(Request $request)
    {
        $page = 'report';
         $dataBranch = Branch::all();
         $dataFinishing = finising_checker::all();

        return view('production.finishing.report.bulanan', compact('dataBranch','page','dataFinishing'));
    }

    public function reportFinising (Request $request)
    {
        $page ='dashboard';
        $dataBranch = Branch::findorfail($request->branch);
        $tanggal = $request->tanggal;
        $status_proses=$request->status_proses;
        $selectWotest = $request->wo;
        $status = $request->status;
        // dd($status);

       if(
            finising_checker::where('tanggal','=', $tanggal)->where('branchdetail',$dataBranch->branchdetail)->where('status_proses',$status_proses)->count()
        ) {
             
        $data_awal = (new  reportBulanan)->daily($tanggal,$dataBranch,$status_proses);
        $dataCategory=collect($data_awal)->groupBy('wo');

        $selectWo = [];
            foreach ($dataCategory as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('wo')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $selectWo[] = [
                        'wo' => $value2['wo'],
                       
                    ];
                }  
            }
        $dataBywo=collect($selectWo); 

        $selectstyle = [];
            foreach ($dataCategory as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('style')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $selectstyle[] = [
                        'style' => $value2['style'],
                       
                    ];
                }  
            }
            $dataBystyle=collect($selectstyle); 
            $category = finising_category :: all();
        $dataCategory=collect($category)->groupBy('nama_kategori');

        $categorySub = [];
            foreach ($dataCategory as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('nama_kategori')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $categorySub[] = [
                        'nama_kategori' => $value2['nama_kategori'],
                        'sub_kategori' => $value2['sub_kategori'],
                       
                    ];
                }  
            }
        $dataByCategory=collect($categorySub);
           
        return view('production.finishing.report.index', compact('page','data_awal','dataBranch','tanggal','status_proses','dataBywo','dataBystyle','selectWotest','dataByCategory'));
      }else{
            return back()->with("NValid", 'Data Kosong !');
            }
    }

    public function reportFinisingWO(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $tanggal = $request->tanggal;
        $status_proses=$request->status_proses;
        $selectWo = $request->wo;
        $data_awal = (new  reportBulanan)->daily2($tanggal,$dataBranch,$status_proses,$selectWo);
        $summarytarget = collect($data_awal)->sum('qty_target');
         $pdf =PDF::setOptions([
         'tempDir' => public_path(),
         'chroot'  => storage_path('/app/public/databaseSmv'),
        ])->loadview('production.finishing.report.daily_pdfWo', compact('data_awal','dataBranch','status_proses','tanggal','selectWo','summarytarget'))->setPaper('legal', 'landscape','center');
         return $pdf->stream("DAILY_REPORT_FINISHING__".\Carbon\Carbon::parse($tanggal )->locale('id')->format('d-m-Y').".pdf");
    }

    public function reportFinisingCategory(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $tanggal = $request->tanggal;
        $status_proses=$request->status_proses;
        $status = $request->status;
        $dataStatus =implode(",",$status);
        $data_awal = (new  reportBulanan)->daily3($tanggal,$dataBranch,$status_proses,$dataStatus);
        $summarytarget = collect($data_awal)->sum('qty_target');
         $pdf =PDF::setOptions([
         'tempDir' => public_path(),
         'chroot'  => storage_path('/app/public/databaseSmv'),
        ])->loadview('production.finishing.report.daily_pdfCategory', compact('data_awal','dataBranch','status_proses','tanggal','status','summarytarget'))->setPaper('legal', 'landscape','center');
         return $pdf->stream("DAILY_REPORT_FINISHING__".\Carbon\Carbon::parse($tanggal )->locale('id')->format('d-m-Y').".pdf");
    }

    public function dailyPDF(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $tanggal = $request->tanggal;
        $status_proses=$request->status_proses;
        $selectWo = $request->wo;
        $data_awal = (new  reportBulanan)->daily($tanggal,$dataBranch,$status_proses,$selectWo);

        $summarytarget = collect($data_awal)->sum('qty_target');

        $customPaper = array(0,0,400,1040);
         $pdf =PDF::setOptions([
         'tempDir' => public_path(),
         'chroot'  => storage_path('/app/public/databaseSmv'),
        ])->loadview('production.finishing.report.daily_pdf', compact('data_awal','dataBranch','status_proses','tanggal','summarytarget'))->setPaper($customPaper, 'landscape','center');
         return $pdf->stream("DAILY_REPORT_FINISHING__".\Carbon\Carbon::parse($tanggal )->locale('id')->format('d-m-Y').".pdf");
    }

    public function dailyExcel(Request $request)
    {

        $dataBranch = Branch::findorfail($request->branch);
        $tanggal = $request->tanggal;
        $status_proses=$request->status_proses;
        $selectWo = $request->wo;
        $data_awal = (new  reportBulanan)->daily($tanggal,$dataBranch,$status_proses);

        return Excel::download(new FinishingExport($data_awal, $status_proses, $tanggal,$dataBranch),$tanggal.'_DAILY_REPORT_FINISHING.xlsx');
    }

    public function getuserwo(Request $request)
    {

        $user=finising_checker::where("wo",$request->ID)->first();

        return response()->json($user);
    }
}
