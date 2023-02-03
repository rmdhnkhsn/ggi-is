<?php

namespace App\Http\Controllers\production\AssetManagement;

use Illuminate\Http\Request;
use Auth;
use App\Branch;
use DataTables;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Models\Production\Asset\asset_company;
use App\Models\Production\Asset\asset_branch;
use App\Models\Production\Asset\asset_brand;
use App\Models\Production\Asset\asset_condition;
use App\Models\Production\Asset\asset_location;
use App\Models\Production\Asset\asset_machine;
use App\Models\Production\Asset\asset_machine_category;
use App\Models\Production\Asset\asset_machine_type;
use App\Models\Production\Asset\asset_maintanance;
use App\Models\Production\Asset\asset_result;
use App\Models\Production\Asset\asset_setting;
use App\Models\Production\Asset\asset_supplier;
use App\Models\Production\Asset\asset_transaction_in;
use App\Models\Production\Asset\asset_user;
use App\Services\Production\AssetManagement\Asset_management;
use App\Imports\AssetManagement;
use App\Models\GGI_IS\V_GCC_USER;

use App\Exports\dataMachinExport;
use App\Services\Production\AssetManagement\Asset_data;


class MasterDataController extends Controller
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

    public function master_data()
    {
        $map['page']='dashboard';
        // $data =asset_company::all();
        // $map['data']= $data;
        return view('production.assetManagement.partials.master_data.index', $map);
    }
    public function import(Request $request)
    {
        
        $data=Excel::toArray([],$request->file('file1'));
        $data_material=collect($data);
        $data = (new  Asset_management)->storeExcel($data_material,$request);
        // $input = $request->all();
        // Excel::import(new AssetManagement($input),request()->file('file'));
           
        return back();
    }

    public function master_company()
    {
        $map['page']='dashboard';
        $data =asset_company::all();
        $map['data']= $data;
        return view('production.assetManagement.partials.master_data.components.company', $map);
    }

    public function storeAssetCompany(Request $request)
    {
        $data = (new  Asset_management)->storeAssetCompany($request);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function updateAssetCompany (Request $request,$ID){

        $data = (new  Asset_management)->updateAssetCompany($request,$ID);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function deleteAssetCompany($ID){
        asset_company::where("ID", $ID)->delete();
        return back();
    }

    public function master_branch()
    {
        $map['page']='dashboard';
        $data =asset_branch::all();
        $map['data']= $data;
        return view('production.assetManagement.partials.master_data.components.branch', $map);
    }

     public function storeAssetBranch(Request $request)
    {
        $data = (new  Asset_management)->storeAssetBranch($request);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function updateAssetBranch (Request $request,$ID){

        $data = (new  Asset_management)->updateAssetBranch($request,$ID);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function deleteAssetBranch($id){
        asset_branch::where("id", $id)->delete();
        return back();
    }


    public function master_location()
    {
        $map['page']='dashboard';
        $data =asset_location::all();
        $map['data']= $data;
        return view('production.assetManagement.partials.master_data.components.location', $map);
    }

    public function storeAssetLocation(Request $request)
    {
        $data = (new  Asset_management)->storeAssetLocation($request);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function updateAssetLocation (Request $request,$id){

        $data = (new  Asset_management)->updateAssetLocation($request,$id);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function deleteAssetLocation($id){
        asset_location::where("id", $id)->delete();
        return back();
    }


    public function master_machineType()
    {
        $map['page']='dashboard';
        $data =asset_machine_type::all();
        $map['data']= $data;
        return view('production.assetManagement.partials.master_data.components.machine_type', $map);
    }

     public function storeAssetMachineType(Request $request)
    {
        $data = (new  Asset_management)->storeAssetMachineType($request);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function updateAssetMachineType (Request $request,$id){

        $data = (new  Asset_management)->updateAssetMachineType($request,$id);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function deleteAssetMachineType($id){
        asset_machine_type::where("id", $id)->delete();
        return back();
    }

    public function master_categoryMachine()
    {
        $map['page']='dashboard';
        $data =asset_machine_category::all();
        $map['data']= $data;
        return view('production.assetManagement.partials.master_data.components.category_machine', $map);
    }

     public function storeAssetMachineCategory(Request $request)
    {
        $data = (new  Asset_management)->storeAssetMachineCategory($request);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function updateAssetMachineCategory (Request $request,$id){

        $data = (new  Asset_management)->updateAssetMachineCategory($request,$id);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function deleteAssetMachineCategory($id){
        asset_machine_category::where("id", $id)->delete();
        return back();
    }

    public function brand()
    {
        $map['page']='dashboard';
        $data =asset_brand::all();
        $map['data']= $data;
        return view('production.assetManagement.partials.master_data.components.brand', $map);
    }

     public function storeAssetBrand(Request $request)
    {
        $data = (new  Asset_management)->storeAssetBrand($request);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function updateAssetBrand (Request $request,$id){

        $data = (new  Asset_management)->updateAssetBrand($request,$id);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function deleteAssetBrand($id){
        asset_brand::where("id", $id)->delete();
        return back();
    }

    public function machine(Request $request)
    {
        $data=new Asset_data();
        $data=$data->get($request);

        $map['data']= $data;
        $map['dataBrand']=asset_brand::all();
        $map['dataCategory']=asset_machine_category::all();
        $map['dataType']=asset_machine_type::all();
        $map['dataCompany']=asset_company::all();
        $map['dataLocation']=asset_location::all();
        $map['dataSupplier']=asset_supplier::all();
        $map['dataCondition']=asset_condition::all();
        $map['dataResult']=asset_result::all();
        $map['dataBranch']=Branch::all();
        $map['dataAssetBranch']=asset_branch::all();
        $map['page']='dashboard';

        $map['search_code']=$request->code;
        $map['search_tipe']=$request->tipe; 
        $map['search_jenis']=$request->jenis;
        $map['search_deskripsi']=$request->deskripsi;
        $map['search_merk']=$request->merk; 
        $map['search_varian']=$request->varian;
        $map['search_serialno']=$request->serialno;
        $map['search_coorigin']=$request->coorigin;
        $map['search_brorigin']=$request->brorigin;
        $map['search_brlokasi']=$request->brlokasi;
        $map['search_lokasi']=$request->lokasi;
        $map['search_tipelokasi']=$request->tipelokasi;
        $map['search_supplier']=$request->supplier;
        $map['search_status']=$request->status;
        $map['search_dipinjamkan']=$request->dipinjamkan;
        $map['search_kondisi']=$request->kondisi;

        return view('production.assetManagement.partials.master_data.components.machine', $map);
    }

    public function machine_edit($id)
    {
        $data=asset_machine::find($id);
        return response()->json($data);
    }

     public function storeAssetMachine(Request $request)
    {
        $data = (new  Asset_management)->storeAssetMachine($request);
        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function updateAssetMachine (Request $request){

        $data = (new  Asset_management)->updateAssetMachine($request);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function deleteAssetMachine($id){
        asset_machine::where("id", $id)->delete();
        return back();
    }


    public function customer()
    {
        $map['page']='dashboard';
        $data =asset_supplier::all();
        $map['data']= $data;
        return view('production.assetManagement.partials.master_data.components.customer', $map);
    }

    public function storeAssetSupplier(Request $request)
    {
        $data = (new  Asset_management)->storeAssetSupplier($request);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function updateAssetSupplier (Request $request,$id){

        $data = (new  Asset_management)->updateAssetSupplier($request,$id);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function deleteAssetSupplier($id){
        asset_supplier::where("id", $id)->delete();
        return back();
    }

    public function users(Request $request)
    {
        $map['page']='dashboard';
        $dataAssetBranch =asset_branch::all();
        $userAkses = asset_user::all();
        $map['dataAssetBranch']=$dataAssetBranch;
        
        $userAdd = (new  Asset_management)->userNIk($request);
        // $user = (new  Asset_management)->userFullName($userAdd,$request);

        // $map['user']=$user;
        $map['userAkses']=$userAkses;
        $map['userAdd']=$userAdd;

        return view('production.assetManagement.partials.master_data.components.users', $map);
    }

    public function storeAssetUserAkses(Request $request)
    {
        $data = (new  Asset_management)->storeUserAkses($request);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function updateAssetUserAkses (Request $request){

        $data = (new  Asset_management)->updateUserAkses($request);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function deleteAssetUserAkses($id){
        asset_user::where("id", $id)->delete();
        return back();
    }



    public function generate()
    {
        $map['page']='dashboard';
        return view('production.assetManagement.partials.master_data.components.generate', $map);
    }

    public function pdfQRCodeID(Request $request)
    {
        $id=$request->id;
        if ($id==null) {
            return redirect()->back()->with("error", 'Select item first');
        }
        $dataMachine=asset_machine:: wherein('id',$id)->get();
        $eliminasiIDBarcode = [];
        foreach ($dataMachine as $k => $v) {
            $eliminasiIDBarcode[] = [
                'id' => $v->id,
                'serialno' => $v->serialno,
                'tipe' => $v->tipe,
                'deskripsi' => $v->deskripsi,
                'jenis' => $v->jenis,
               
            ];
        }
        $map['page']='dashboard'; 
        $map['eliminasiIDBarcode']=$eliminasiIDBarcode; 

       $customPaper = array(0,0,226,113);
        $pdf = PDF::loadview('production.assetManagement.partials.master_data.components.pdfQRCodeWarehouseID', $map)->setPaper($customPaper, 'landscape','center');

        return $pdf->stream("qrcode_asset.pdf");

    }

    public function maintenance()
    {
        $map['page']='dashboard';
        $data =asset_maintanance::all();
        $map['data']= $data;
        return view('production.assetManagement.partials.master_data.components.maintenance', $map);
    }
    public function storeAssetMaintenance(Request $request)
    {
        $data = (new  Asset_management)->storeAssetMaintenance($request);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function updateAssetMaintenance (Request $request,$id){

        $data = (new  Asset_management)->updateAssetMaintenance($request,$id);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function deleteAssetMaintenance($id){
        asset_maintanance::where("id", $id)->delete();
        return back();
    }

    public function condition()
    {
        $map['page']='dashboard';
        $data =asset_condition::all();
        $map['data']= $data;
        return view('production.assetManagement.partials.master_data.components.condition', $map);
    }

     public function storeAssetCondition(Request $request)
    {
        $data = (new  Asset_management)->storeAssetCondition($request);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function updateAssetCondition (Request $request){

        $data = (new  Asset_management)->updateAssetCondition($request);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function deleteAssetCondition($id){
        asset_condition::where("id", $id)->delete();
        return back();
    }

    public function setting()
    {
        $map['page']='dashboard';
        $data =asset_setting::all();
        $map['data']= $data;
        return view('production.assetManagement.partials.master_data.components.setting', $map);
    }

    public function storeAssetSetting(Request $request)
    {
        $data = (new  Asset_management)->storeSetting($request);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function updateAssetSetting (Request $request){

        $data = (new  Asset_management)->updateSetting($request);

        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function deleteAssetSetting($id){
        asset_setting::where("id", $id)->delete();
        return back();
    }

    public function result()
    {
        $map['page']='dashboard';
        $data =asset_result::all();
        $map['data']= $data;
        return view('production.assetManagement.partials.master_data.components.result', $map);
    }

     public function totalMachine(Request $request)
    {
        $map['page']='dashboard';
        $data =asset_machine ::where('status', 'Asset');
        if ($request->ajax()) {
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
            $dataBrand =asset_brand::all();
            $dataCategory =asset_machine_category::all();
            $dataType =asset_machine_type::all();
            $dataCompany =asset_company::all();
            $dataAssetBranch =asset_branch::all();
            $dataLocation =asset_location::all();
            $dataSupplier =asset_supplier::all();
            $dataCondition =asset_condition::all();
            $dataResult =asset_result::all();
            $dataBranch =Branch::all();

                return view('production.assetManagement.partials.master_data.components.atribut.btn_edit', compact('row','dataBrand','dataCategory','dataType','dataCompany','dataLocation','dataSupplier','dataCondition','dataResult','dataBranch','dataAssetBranch'));
            })
            ->addColumn('checkbox', function($row){})
            ->editColumn('checkbox', function($row){
              
                return view('production.assetManagement.partials.master_data.components.atribut.btn_delete', compact('row'));
            })
            ->rawColumns(['action', 'checkbox'])
            ->make(true);

        }
        $dataBrand =asset_brand::all();
        $dataCategory =asset_machine_category::all();
        $dataType =asset_machine_type::all();
        $dataCompany =asset_company::all();
        $dataLocation =asset_location::all();
        $dataSupplier =asset_supplier::all();
        $dataCondition =asset_condition::all();
        $dataResult =asset_result::all();
        $dataBranch =Branch::all();
        $dataAssetBranch =asset_branch::all();

        $map['data']= $data;
        $map['dataBrand']= $dataBrand;
        $map['dataCategory']= $dataCategory;
        $map['dataType']= $dataType;
        $map['dataCompany']= $dataCompany;
        $map['dataLocation']= $dataLocation;
        $map['dataSupplier']= $dataSupplier;
        $map['dataCondition']= $dataCondition;
        $map['dataResult']= $dataResult;
        $map['dataBranch']= $dataBranch;
        $map['dataAssetBranch']= $dataAssetBranch;

        return view('production.assetManagement.partials.master_data.detailMachine.totalMachine', $map);
    }
     public function totalMachineProduksi(Request $request)
    {
        $map['page']='dashboard';
        $data = asset_machine ::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('tipeLokasi', 'Produksi');
        if ($request->ajax()) {
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
            $dataBrand =asset_brand::all();
            $dataCategory =asset_machine_category::all();
            $dataType =asset_machine_type::all();
            $dataCompany =asset_company::all();
            $dataAssetBranch =asset_branch::all();
            $dataLocation =asset_location::all();
            $dataSupplier =asset_supplier::all();
            $dataCondition =asset_condition::all();
            $dataResult =asset_result::all();
            $dataBranch =Branch::all();

                return view('production.assetManagement.partials.master_data.components.atribut.btn_edit', compact('row','dataBrand','dataCategory','dataType','dataCompany','dataLocation','dataSupplier','dataCondition','dataResult','dataBranch','dataAssetBranch'));
            })
            ->addColumn('checkbox', function($row){})
            ->editColumn('checkbox', function($row){
              
                return view('production.assetManagement.partials.master_data.components.atribut.btn_delete', compact('row'));
            })
            ->rawColumns(['action', 'checkbox'])
            ->make(true);

        }
        $dataBrand =asset_brand::all();
        $dataCategory =asset_machine_category::all();
        $dataType =asset_machine_type::all();
        $dataCompany =asset_company::all();
        $dataLocation =asset_location::all();
        $dataSupplier =asset_supplier::all();
        $dataCondition =asset_condition::all();
        $dataResult =asset_result::all();
        $dataBranch =Branch::all();
        $dataAssetBranch =asset_branch::all();

        $map['data']= $data;
        $map['dataBrand']= $dataBrand;
        $map['dataCategory']= $dataCategory;
        $map['dataType']= $dataType;
        $map['dataCompany']= $dataCompany;
        $map['dataLocation']= $dataLocation;
        $map['dataSupplier']= $dataSupplier;
        $map['dataCondition']= $dataCondition;
        $map['dataResult']= $dataResult;
        $map['dataBranch']= $dataBranch;
        $map['dataAssetBranch']= $dataAssetBranch;

        return view('production.assetManagement.partials.master_data.detailMachine.totalMachineProduksi', $map);
    }
     public function totalMachineReadyGudang(Request $request)
    {
        $map['page']='dashboard';
        $data = asset_machine ::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('tipeLokasi', 'Gudang')->where('kondisi', 'Siap Pakai');
        if ($request->ajax()) {
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
            $dataBrand =asset_brand::all();
            $dataCategory =asset_machine_category::all();
            $dataType =asset_machine_type::all();
            $dataCompany =asset_company::all();
            $dataAssetBranch =asset_branch::all();
            $dataLocation =asset_location::all();
            $dataSupplier =asset_supplier::all();
            $dataCondition =asset_condition::all();
            $dataResult =asset_result::all();
            $dataBranch =Branch::all();

                return view('production.assetManagement.partials.master_data.components.atribut.btn_edit', compact('row','dataBrand','dataCategory','dataType','dataCompany','dataLocation','dataSupplier','dataCondition','dataResult','dataBranch','dataAssetBranch'));
            })
            ->addColumn('checkbox', function($row){})
            ->editColumn('checkbox', function($row){
              
                return view('production.assetManagement.partials.master_data.components.atribut.btn_delete', compact('row'));
            })
            ->rawColumns(['action', 'checkbox'])
            ->make(true);

        }
        $dataBrand =asset_brand::all();
        $dataCategory =asset_machine_category::all();
        $dataType =asset_machine_type::all();
        $dataCompany =asset_company::all();
        $dataLocation =asset_location::all();
        $dataSupplier =asset_supplier::all();
        $dataCondition =asset_condition::all();
        $dataResult =asset_result::all();
        $dataBranch =Branch::all();
        $dataAssetBranch =asset_branch::all();

        $map['data']= $data;
        $map['dataBrand']= $dataBrand;
        $map['dataCategory']= $dataCategory;
        $map['dataType']= $dataType;
        $map['dataCompany']= $dataCompany;
        $map['dataLocation']= $dataLocation;
        $map['dataSupplier']= $dataSupplier;
        $map['dataCondition']= $dataCondition;
        $map['dataResult']= $dataResult;
        $map['dataBranch']= $dataBranch;
        $map['dataAssetBranch']= $dataAssetBranch;

        return view('production.assetManagement.partials.master_data.detailMachine.totalMachineReadyGudang', $map);
    }

    public function getuser(Request $request)
    {

        $user=V_GCC_USER::whereIn('branch',['CLN', 'MAJA', 'GK'])
                    ->where('nik','!=','GISCA')
                    ->where('nik','!=','google')
                    ->where('nik','!=','ITTEST1')
                    ->where('nik','!=','ITDTMANAGER')
                    ->where('nik','!=','MANAJEMEN')
                    ->where('nik','!=','SUPERADMIN')
                    ->where('nik','!=','VENDOR')
                    ->where('nik','!=','MEETING')
                    ->where('nik','!=','TAMU')
                    ->where('isaktif',1)
                    ->where('isresign',0)
                    ->where("nik",$request->ID)->first();

        return response()->json($user);
    }

     public function excel(Request $request)
    {
         $bagian_support=asset_user::where('nik',auth()->user()->nik)->first();
        if ($bagian_support->role !='Sys_Admin') {
            $data =asset_machine::where('status','Asset')->where('brOrigin',$bagian_support->branch)->orderByDesc('id')->get();
        }
        else{

            $data =asset_machine::where('status','Asset')->get();
        }
       
         return Excel::download(new dataMachinExport($data),'_DATA_ALL_MACHINE.xlsx');
    } 
    
    public function dataMachinePDf(Request $request){
        $tanggal = date('Y-m-d');
        $bagian_support=asset_user::where('nik',auth()->user()->nik)->first();
        $data=[];
        if ($bagian_support->role !='Sys_Admin') {
            $data =asset_machine::where('status','Asset')->where('brOrigin',$bagian_support->branch)->first();
        }
        else{

            $data =asset_machine::where('status','Asset')->first();
        }
        $pdf =PDF::setOptions([
        'tempDir' => public_path(),
        'chroot'  => storage_path('/app/public/databaseSmv'),
    ])->loadview('production.assetManagement.partials.master_data.components.pdf', compact('data'))->setPaper('legal', 'landscape','center');
        return $pdf->stream("DATA_ALL_MACHINE".\Carbon\Carbon::parse($tanggal )->locale('id')->format('d-m-Y').".pdf");
    }

}
