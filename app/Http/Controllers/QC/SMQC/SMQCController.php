<?php

namespace App\Http\Controllers\QC\SMQC;

use PDF;
use File;
use App\Branch;
use DataTables;
use App\Models\QC\SMQC\FIR;
use Illuminate\Http\Request;
use App\Models\QC\SMQC\Fabric;
use App\Services\QC\SMQC\rumusan;
use App\Models\QC\SMQC\AccStandar;
use App\Models\QC\SMQC\StandarKain;
use App\Models\QC\SMQC\Accessories;
use App\Http\Controllers\Controller;
use App\Models\QC\SMQC\ListSupplier;
use App\Models\QC\SMQC\SMQCListBuyer;
use App\Models\QC\SMQC\UserManagement;

class SMQCController extends Controller
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
      $page = 'Dashboard';
      $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
      return view('qc.smqc.index', compact('page','cek_user'));
   }

   public function report_aksesoris()
   {
      $page = 'Aksesoris';
      
      $standar = AccStandar::all();
      $prc = UserManagement::where('kategori', 'Purchasing Aksesoris')->get();
      $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

      $data = Accessories::with('detail')->where("prc_app",0)
                           ->where('chief_app', 0)
                           ->where('inspector', auth()->user()->nama);
      $report_terakhir = collect($data)->last();
      if(request()->ajax()){
         return datatables($data)
         ->addColumn('action', function($value){
            $prc = UserManagement::where('kategori', 'Purchasing Aksesoris')->get();
            $standar = AccStandar::all();

            return view('qc.smqc.accessories.atribut.btn_action', compact('value', 'prc', 'standar'));
         })
         ->editColumn('status_id', function($value){
               if($value['status_id'] == '1'){
                  return 'Pass';
               }else{
                  return 'Fail';
               }
            })
         ->editColumn('po', function($value){
                  return substr($value['po'], 0, 20);
         })
         ->addColumn('detail', function($value){
            return view('qc.smqc.accessories.atribut.btn_detail', compact('value'));
         })
         ->editColumn('prc_app', function($value){
               return view('qc.smqc.accessories.atribut.btn_prc', compact('value'));
         })
         ->editColumn('chief_app', function($value){
               return view('qc.smqc.accessories.atribut.btn_chief', compact('value'));
         })
         ->make();
      }
      return view('qc.smqc.accessories.index2', compact('page','data','standar','prc','cek_user','report_terakhir'));
   }

   public function aksesoris_final()
   {
      $page = 'Aksesoris';
      $branch = Branch::all();
      $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

      return view('qc.smqc.accessories.final-report', compact('page', 'branch','cek_user'));
   }

   public function aksesoris_pdf($id)
   {
      $data = Accessories::with('detail')->findorfail($id);

      $pdf = PDF::setOptions([
         'tempDir' => public_path(),
         'chroot'  => storage_path('/app/public/smqc/accessories/')
      ])->loadview('qc.smqc.accessories.final-pdf',compact('data'));
      return $pdf->stream();
   }

   public function aksesoris_done()
   {
      $page = 'Aksesoris';
      $branch = Branch::all();
      $prc = UserManagement::where('kategori', 'Purchasing Aksesoris')->get();
      $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

      // dd($prc);
      
      return view('qc.smqc.accessories.done-report', compact('page','branch','prc','cek_user'));
   }

   public function report_check()
   {
      $page = 'Report Aksesoris';
      $branch = Branch::all();
      $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

      return view('qc.smqc.accessories.check-report', compact('page','cek_user', 'branch'));
   }

   public function md_index()
   {
      $page = 'Report Kain';
      $buyer = SMQCListBuyer::all();
      $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

      return view('qc.smqc.kain.md.index', compact('page','cek_user', 'buyer'));
   }

   public function md_search(Request $request)
   {
      $id = $request->buyer;
      return redirect()->route('md_frindex.index', $id);
   }

   public function md_frindex($id)
   {
      $page = 'Report Kain';
      $buyer = SMQCListBuyer::all();
      $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

      return view('qc.smqc.kain.md.search', compact('page','cek_user', 'buyer', 'id'));
   }

   public function md_sindex(Request $request)
   {
      $buyer = $request->ID;
      // dd($buyer);
      $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
      $data = Fabric::Where([["mrc_app", "==", 0],["notif_id", "!=", 0]])
                     ->where('buyer_id', $buyer)
                     ->with('fir', 'far', 'shadel', 'buyer');
      if(request()->ajax()){
         return Datatables::eloquent($data)
         ->editColumn('buyer_id', function($row){
               $buyer = SMQCListBuyer::findorfail($row['buyer_id']);
               return $buyer->name;
         })
         ->editColumn('far_id', function($row){
            return view('qc.smqc.kain.atribut.btn_far', compact('row')); 
         })
         ->editColumn('fir_id', function($row){
            return view('qc.smqc.kain.atribut.btn_fir', compact('row')); 
         })
         ->editColumn('shade_id', function($row){
            return view('qc.smqc.kain.atribut.btn_shade', compact('row')); 
         })
         ->editColumn('prc_app', function($row){
            return view('qc.smqc.kain.atribut.btn_status_prc', compact('row')); 
         })
         ->editColumn('mrc_app', function($row){
            return view('qc.smqc.kain.atribut.btn_approve_md', compact('row'));
         })
         ->editColumn('qm_app', function($row){
            return view('qc.smqc.kain.atribut.btn_status_qm', compact('row'));
         })
         ->editColumn('created_at', function($row){
               return $row->created_at;
         })
         ->make();
      }
      return view('qc.smqc.kain.md.search', compact('page','cek_user', 'buyer', 'id'));

   }

   public function md_approve($id)
   {
      $data = Fabric::findorfail($id);
      $update = [
         'mrc_app' => 1,
         'mrc_name' => auth()->user()->nama
      ];
      Fabric::whereId($id)->update($update);
      
      return back();
   }

   public function report_kain()
   {
      $page = 'Report Kain';
      $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
      $data = Fabric::with('fir', 'far', 'shadel')
                  ->where('mrc_app', 0)
                  ->where('branch', auth()->user()->branch)
                  ->where('branchdetail', auth()->user()->branchdetail);
      // dd($data);
   
      if(request()->ajax()){
         return datatables($data)
         ->editColumn('buyer_id', function($row){
               $buyer = SMQCListBuyer::findorfail($row['buyer_id']);
               return $buyer->name;
         })
         ->editColumn('far_id', function($row){
            return view('qc.smqc.kain.atribut.btn_far_qc', compact('row')); 
         })
         ->editColumn('fir_id', function($row){
            return view('qc.smqc.kain.atribut.btn_fir', compact('row')); 
         })
         ->editColumn('shade_id', function($row){
            return view('qc.smqc.kain.atribut.btn_shade', compact('row')); 
         })
         ->editColumn('prc_app', function($row){
            return view('qc.smqc.kain.atribut.btn_status_prc', compact('row')); 
         })
         ->editColumn('mrc_app', function($row){
            return view('qc.smqc.kain.atribut.btn_status_md', compact('row'));
         })
         ->editColumn('qm_app', function($row){
            return view('qc.smqc.kain.atribut.btn_status_qm', compact('row'));
         })
         ->editColumn('created_at', function($row){
               return $row->created_at;
         })
         ->editColumn('notif_id', function($row){
            return view('qc.smqc.kain.atribut.btn_notif', compact('row'));
         })
         ->addColumn('lab', function($row){
            return view('qc.smqc.kain.atribut.btn_lab', compact('row'));
         })
         ->addColumn('action', function($row){
            return view('qc.smqc.kain.atribut.btn_action', compact('row'));
         })
         ->make();
      }
      return view('qc.smqc.kain.index', compact('page','cek_user'));
   }

   public function final_kain()
   {
      $page = 'Report Kain';
      $buyer = SMQCListBuyer::all();
      $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

      return view('qc.smqc.kain.final', compact('page','cek_user', 'buyer'));
   }

   public function search_id(Request $request)
   {
      // dd($request->all());
      return redirect()->route('kain.index_id', $request->id);
   }

   public function index_id($id)
   {
      $page = 'Report Kain';
      $buyer = SMQCListBuyer::all();
      $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

      return view('qc.smqc.kain.final_id', compact('page','cek_user', 'buyer', 'id'));
   }

   public function data_id(Request $request)
   {
      // dd($request->ID);
      $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
      $data = Fabric::Where('id', $request->ID);


      if(request()->ajax()){
         return datatables($data)
         ->editColumn('buyer_id', function($row){
               $buyer = SMQCListBuyer::where('id', $row['buyer_id'])->get()->toArray();
               foreach ($buyer as $key => $value) {
                  return $value['name'];
               }
         })
         ->editColumn('far_id', function($row){
            $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
            return view('qc.smqc.kain.atribut.btn_far', compact('row', 'cek_user')); 
         })
         ->editColumn('fir_id', function($row){
            return view('qc.smqc.kain.atribut.btn_fir', compact('row')); 
         })
         ->editColumn('shade_id', function($row){
            return view('qc.smqc.kain.atribut.btn_shade', compact('row')); 
         })
         
         ->editColumn('created_at', function($row){
               return $row->created_at;
         })
         ->addColumn('action', function($row){
            return view('qc.smqc.kain.atribut.btn_pdf', compact('row'));
         })
         ->make();
      }
      return view('qc.smqc.kain.final_id', compact('page','cek_user', 'buyer', 'standar', 'supplier'));
   }

   public function search_buyer(Request $request)
   {
      // dd($request->all());
      return redirect()->route('kain.index_buyer', $request->buyer);
   }

   public function index_buyer($id)
   {
      // dd($id);
      $page = 'Report Kain';
      $buyer = SMQCListBuyer::all();
      $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

      return view('qc.smqc.kain.final_buyer', compact('page','cek_user', 'buyer', 'id'));
   }

   public function data_buyer(Request $request)
   {
      // dd($request->ID);
      $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
      $data = Fabric::Where('buyer_id', $request->ID)
                     ->where('notif_id', '!=', 0);
                     // ->where('branch', auth()->user()->branch)
                     // ->where('branchdetail', auth()->user()->branchdetail);
      // dd($data);

      if(request()->ajax()){
         return datatables($data)
         ->editColumn('buyer_id', function($row){
               $buyer = SMQCListBuyer::where('id', $row['buyer_id'])->get()->toArray();
               foreach ($buyer as $key => $value) {
                  return $value['name'];
               }
         })
         ->editColumn('far_id', function($row){
            $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
            return view('qc.smqc.kain.atribut.btn_far', compact('row', 'cek_user')); 
         })
         ->editColumn('fir_id', function($row){
            return view('qc.smqc.kain.atribut.btn_fir', compact('row')); 
         })
         ->editColumn('shade_id', function($row){
            return view('qc.smqc.kain.atribut.btn_shade', compact('row')); 
         })
         
         ->editColumn('created_at', function($row){
               return $row->created_at;
         })
         ->addColumn('action', function($row){
            return view('qc.smqc.kain.atribut.btn_pdf', compact('row'));
         })
         ->make();
      }
      return view('qc.smqc.kain.final_id', compact('page','cek_user', 'buyer', 'standar', 'supplier'));
   }

   public function fir_pdf($id)
   {
      $data = Fabric::with('fir', 'far', 'shadel', 'buyer')->findorfail($id);

      $request = $data->fir;
      $bagi = (new rumusan)->bagi($request);
      $rata_rata = (new rumusan)->rata_rata($request);
      // dd($rata_rata);
      if($rata_rata == 0 && $bagi == 0){
          $rata = null;
          $g_rat = null;
      }else {
          $rata = round($rata_rata / $bagi,2);
          if($rata > 0)
          {
              $rata2 = round(($rata - $data->fir->g_standar) / $data->fir->g_standar *100,2);
              $g_rat = round($rata2 *100 / 100, 2);
          }else {
              $rata2 = 0;
              $g_rat = 0;
          }
      }

      $pdf = PDF::setOptions([
         'tempDir' => public_path(),
         'chroot'  => storage_path('/app/public/smqc/fabric/qm/')
      ])->loadview('qc.smqc.kain.fir-pdf',compact('data','rata', 'g_rat'))->setPaper('legal', 'portrait');;
      return $pdf->stream();
   }

   public function far_pdf($id)
   {
      $data = Fabric::with('fir', 'far', 'shadel', 'buyer')->findorfail($id);
      if ($data->standar_id != null) {
         $standar = StandarKain::findorfail($data->standar_id);
      }else {
            $standar = ['point_roll' => 0];
      }
      $buyer = SMQCListBuyer::findorfail($data->buyer_id);
      $tot = collect($data->far)->sum('tot');
      $actual = collect($data->far)->sum('actual');
      $on_roll = collect($data->far)->sum('on_roll');
      $aw = collect($data->far)->avg('ac_beg', 'ac_mid', 'ac_end');

      if($aw > 0){
            $adj = round(($tot * 3600) / ($aw * $actual ),2);
      }else{
            $adj = 0;
      }

      $pdf = PDF::setOptions([
         'tempDir' => public_path(),
         'chroot'  => storage_path('/app/public/smqc/fabric/qm/')
      ])->loadview('qc.smqc.kain.far-pdf',compact('data','tot','actual','on_roll','aw','standar', 'buyer', 'adj'))->setPaper('legal', 'landscape');
      return $pdf->stream();
   }

   public function shade_pdf($id)
   {
      $data = Fabric::with('fir', 'far', 'shadel', 'buyer', 'newfile')->findorfail($id);
      
      $pdf = PDF::setOptions([
         'tempDir' => public_path(),
         'chroot'  => storage_path('/app/public/smqc/fabric/shade/'),
      ])->loadview('qc.smqc.kain.shade-pdf',compact('data'))->setPaper('legal', 'portrait');
      return $pdf->stream();
   }

   public function report_bulanan(Request $request)
   {
      $id = $request->min.'|'.$request->max; 
      // dd($request->all());
      return redirect()->route('kain.bulanan_index', $id);
   }
   
   public function bulanan_index($id)
   {
      $page = 'Report Kain';
      $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

      $data_input = explode("|",$id);
      $min = $data_input[0];
		$max = $data_input[1];
      $branch = auth()->user()->branch;
		$branchdetail = auth()->user()->branchdetail;
      // dd($branch);
		$data_append = [];
		$final_data = [];
		$data = Fabric::whereBetween('date', array($min, $max))
               ->where('branch',$branch)
               ->where('branchdetail',$branchdetail)
               ->with('fir', 'far')
               ->get();
		// dd($data);
      //definisi
		foreach ($data as $key => $value) {
			$data_total[$value->date][$value->supplier]['fir_total'] = 0;
			$data_total[$value->date][$value->supplier]['cek'] = 0;
			$data_total[$value->date][$value->supplier]['far_rjct'] = 0;
		}

      //mapping data sama + jumlah
		foreach ($data as $key => $value) {
			//dd($value->fir->id);
			$data_total[$value->date][$value->supplier] = [
				'id' => $value->id,
				'date' => $value->date,
				'supplier' => $value->supplier,
				'fir_data' => $value->fir->qf_tr,
				'fir_total' => $data_total[$value->date][$value->supplier]['fir_total'] + $value->fir->qf_tr,
				'cek' => $data_total[$value->date][$value->supplier]['cek'] + $value->fir->qf_no_ir,
				'cd' => str_replace("\r\n",', ',$value->fir->cd),
				'remark' => str_replace("\r\n",', ', $value->fir->remark) ,
				'fir_style' => str_replace("\r\n",', ', $value->fir->style),
				'far_rjct' => $data_total[$value->date][$value->supplier]['far_rjct'] + $value->far->sum('reject'),
			];

		}

      // dd($data_total);

		$data_array = array_values(array_values($data_total));
		
		//mapping data to view blade
		foreach ($data_array as $key => $value) {
			$data_must_append = array_values($value);
			foreach ($data_must_append as $key1 => $value1) {
				$data_append[] = [
					'id' => $value1['id'],
					'date' => $value1['date'],
					'supplier' => $value1['supplier'],
					'fir' => $value1['fir_total'],
					'cek' => $value1['cek'],
					'cd' => $value1['cd'],
					'remark' => $value1['remark'],
					'fir_style' => $value1['fir_style'],
					'far_rjct' => $value1['far_rjct'],
					'persen' => round($value1['far_rjct'] / $value1['cek'] * 100, 1)

				];
			}
		}
		//final data
		$final_data = collect($data_append);

      if(request()->ajax()){
         return datatables($final_data)->make();
      }
      return view('qc.smqc.kain.bulanan_data',compact('final_data','page','cek_user','id'));
   }

   public function kain_delete($id)
   {
      $data = Fabric::findorfail($id);
      File::delete(storage_path('/app/public/smqc/fabric/qm/'.$data->qm));
      $data->delete();

      return back();
   }

   public function kain_create()
   {
      $page = 'Report Kain';
      $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
      $buyer = SMQCListBuyer::all();
      $standar = StandarKain::all();
      $supplier = ListSupplier::all();

      return view('qc.smqc.kain.create', compact('page','cek_user', 'buyer', 'standar', 'supplier'));
   }

   public function kain_edit($id)
   {
      $page = 'Report Kain';
      $buyer = SMQCListBuyer::all();
      $standar = StandarKain::all();
      $data = Fabric::findorfail($id);
      $supplier = ListSupplier::all();  
      $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
      // dd($data);

      return view('qc.smqc.kain.edit', compact('page','data','cek_user', 'buyer', 'standar', 'supplier'));
   }
}
