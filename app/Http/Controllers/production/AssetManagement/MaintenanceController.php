<?php

namespace App\Http\Controllers\production\AssetManagement;

use Illuminate\Http\Request;
use Auth;
use App\Branch;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Production\Asset\asset_branch;
use App\Models\Production\Asset\asset_location;
use App\Services\Production\AssetManagement\Asset_maintenance;
use App\Models\Production\Asset\asset_maintanance;
use App\Models\Production\Asset\asset_condition;
use App\Models\Production\Asset\asset_user;
use App\Models\Production\Asset\asset_setting;
use App\Models\Production\Asset\asset_transaction_in;
use App\Models\Production\Asset\asset_machine;






class MaintenanceController extends Controller
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
    
    public function welcome()
    {
        $map['page']='dashboard';
        return view('production.assetManagement.partials.maintenance.welcome', $map);
    }

    public function index()
    {
        $map['page']='dashboard';
        
        return view('production.assetManagement.partials.maintenance.index', $map);
    }

    public function transfer_asset()
    {
        $map['page']='dashboard';
        $data=asset_branch:: all();
        $dataLokasi=asset_location:: all();
        $time =date("H:i:s");
        $date = date("Y-m-d ");



        $map['time']=$time;
        $map['date']=$date;
        $map['data']=$data;
        $map['dataLokasi']=$dataLokasi;

        return view('production.assetManagement.partials.maintenance.transfer.transfer_asset', $map);
    }
   
    public function updateTransferAssets (Request $request){

        $data = (new  Asset_maintenance)->updateTransferAssets($request);

        return redirect()->route('asset.maintenance.index')->with("save", 'Data Has Been Saved !');

        // return redirect()->back()->with("save", 'Data Has Been Saved !');

    }
    public function editTransferAssets(Request $request){

        $data = (new  Asset_maintenance)->editTransferAssets($request);

        return redirect()->back()->with("save", 'Data Has Been Saved !');

    }
    public function editCheckingAssets(Request $request){

        $data = (new  Asset_maintenance)->editCheckingAssets($request);

        return redirect()->back()->with("save", 'Data Has Been Saved !');

    }
    public function editMaintenanceAssets(Request $request){

        $data = (new  Asset_maintenance)->editMaintenanceAssets($request);

        return redirect()->back()->with("save", 'Data Has Been Saved !');

    }
    public function editSettingAssets(Request $request){

        $data = (new  Asset_maintenance)->editSettingAssets($request);

        return redirect()->back()->with("save", 'Data Has Been Saved !');

    }
    public function updateCheckingAssets (Request $request){

        $data = (new  Asset_maintenance)->updateCheckingAssets($request);

        return redirect()->route('asset.maintenance.index')->with("save", 'Data Has Been Saved !');

        // return redirect()->back()->with("save", 'Data Has Been Saved !');

    }
    public function updateMaintenanceAssets (Request $request){

        $data = (new  Asset_maintenance)->updateMaintenanceAssets($request);

        return redirect()->route('asset.maintenance.index')->with("save", 'Data Has Been Saved !');
        // return redirect()->back()->with("save", 'Data Has Been Saved !');

    }
    public function updateSettingAssets (Request $request){

        $data = (new  Asset_maintenance)->updateSettingAssets($request);

        return redirect()->route('asset.maintenance.index')->with("save", 'Data Has Been Saved !');
        // return redirect()->back()->with("save", 'Data Has Been Saved !');

    }

    public function checking_asset()
    {
        $map['page']='dashboard';
        $data=asset_branch:: all();
        $time =date("H:i:s");
        $date = date("Y-m-d ");



        $map['time']=$time;
        $map['date']=$date;
        $map['data']=$data;

        return view('production.assetManagement.partials.maintenance.checking.checking_asset', $map);
    }

    public function getMachineById($id){
        $machine = asset_machine::find($id);
        return response()->json($machine);
    }

    public function maintenance_asset()
    {
        $map['page']='dashboard';
        $time =date("H:i:s");
        $date = date("Y-m-d ");
        $user = asset_user:: where('role','=','SPV')->where('status','=','Aktif')->get();
        $kondisi = asset_condition::get();
        $maintenance = asset_maintanance::get();
        $machine = asset_machine::get();


        $map['time']=$time;
        $map['date']=$date;
        $map['user']=$user;
        $map['machine']=$machine;
        $map['maintenance']=$maintenance;
        $map['kondisi']=$kondisi;
        return view('production.assetManagement.partials.maintenance.maintenance.maintenance_asset', $map);
    }

    public function setting_asset()
    {
        $map['page']='dashboard';
         $time =date("H:i:s");
        $date = date("Y-m-d ");
        $user = asset_user:: where('role','=','SPV')->where('status','=','Aktif')->get();
        $kondisi = asset_condition::get();
        $setting = asset_setting::get();
        $machine = asset_machine::get();


        $map['time']=$time;
        $map['date']=$date;
        $map['user']=$user;
        $map['machine']=$machine;
        $map['setting']=$setting;
        $map['kondisi']=$kondisi;
        return view('production.assetManagement.partials.maintenance.setting.setting_asset', $map);
    }
    
    public function data_transfer()
    {
        $map['page']='dashboard';
        $data=asset_transaction_in::where('status','Transfer')->get();
        $dataBranch=asset_branch:: all();
        $dataLokasi=asset_location:: all();
        $time =date("H:i:s");
        $date = date("Y-m-d ");
        $filter=0;
        $nama_bulan=date('Y-m');


        $map['time']=$time;
        $map['date']=$date;
        $map['dataBranch']=$dataBranch;
        $map['dataLokasi']=$dataLokasi;
        $map['data']=$data;
        $map['filter'] =$filter;
        $map['nama_bulan']=$nama_bulan;

        return view('production.assetManagement.partials.maintenance.transfer.data_transfer', $map);
    }
    public function data_transfer_filter($key)
    {
        $map['page']='dashboard';

        $filter=1;
        $nama_bulan=$key;
        $bulan=(new  Asset_maintenance)->awal_akhir($key);
        $data=asset_transaction_in::where('status','Transfer')->where('date','>=',$bulan['awal'])->where('date','<=',$bulan['akhir'])->get();
        $dataBranch=asset_branch:: all();
        $dataLokasi=asset_location:: all();
        $time =date("H:i:s");
        $date = date("Y-m-d ");



        $map['time']=$time;
        $map['date']=$date;
        $map['dataBranch']=$dataBranch;
        $map['dataLokasi']=$dataLokasi;
        $map['data']=$data;
        $map['nama_bulan']=$nama_bulan;
        $map['bulan']=$bulan;
        return view('production.assetManagement.partials.maintenance.transfer.data_transfer', $map);
    }

    
    public function data_checking()
    {
        $map['page']='dashboard';
        $data=asset_transaction_in::where('status','Checking')->get();
        $time =date("H:i:s");
        $date = date("Y-m-d ");
        $filter=0;
        $nama_bulan=date('Y-m');


        $map['time']=$time;
        $map['date']=$date;
        $map['data']=$data;
        $map['nama_bulan']=$nama_bulan;
        $map['filter']=$filter;

        return view('production.assetManagement.partials.maintenance.checking.data_checking', $map);
    }
    public function data_checking_filter($key)
    {
        $map['page']='dashboard';
        $time =date("H:i:s");
        $date = date("Y-m-d ");

        $filter=1;
        $nama_bulan=$key;
        $bulan=(new  Asset_maintenance)->awal_akhir($key);
        $data=asset_transaction_in::where('status','Checking')->where('date','>=',$bulan['awal'])->where('date','<=',$bulan['akhir'])->get();



        $map['time']=$time;
        $map['date']=$date;
        $map['data']=$data;
        $map['nama_bulan']=$nama_bulan;
        $map['bulan']=$bulan;
        return view('production.assetManagement.partials.maintenance.checking.data_checking', $map);
    }
    
    public function data_maintenance()
    {
        $map['page']='dashboard';
        $data=asset_transaction_in::where('status','Maintenance')->get();
        $time =date("H:i:s");
        $date = date("Y-m-d ");
         $filter=0;
        $nama_bulan=date('Y-m');
        $user = asset_user:: where('role','=','SPV')->where('status','=','Aktif')->get();
        $kondisi = asset_condition::get();
        $maintenance = asset_maintanance::get();
       
        $map['time']=$time;
        $map['date']=$date;
        $map['user']=$user;
        $map['maintenance']=$maintenance;
        $map['kondisi']=$kondisi;
        $map['data']=$data;
        $map['nama_bulan']=$nama_bulan;
        $map['filter']=$filter;

        return view('production.assetManagement.partials.maintenance.maintenance.data_maintenance', $map);
    }
    public function data_maintenance_filter($key)
    {
        $map['page']='dashboard';
        $filter=1;
        $nama_bulan=$key;
        $bulan=(new  Asset_maintenance)->awal_akhir($key);
        $data=asset_transaction_in::where('status','Maintenance')->where('date','>=',$bulan['awal'])->where('date','<=',$bulan['akhir'])->get();
        $time =date("H:i:s");
        $date = date("Y-m-d ");
       $user = asset_user:: where('role','=','SPV')->where('status','=','Aktif')->get();
        $kondisi = asset_condition::get();
        $maintenance = asset_maintanance::get();
       
        $map['time']=$time;
        $map['date']=$date;
        $map['user']=$user;
        $map['maintenance']=$maintenance;
        $map['kondisi']=$kondisi;
        $map['data']=$data;
        $map['nama_bulan']=$nama_bulan;
        $map['bulan']=$bulan;
        return view('production.assetManagement.partials.maintenance.maintenance.data_maintenance', $map);
    }
    
    public function data_setting()
    {
        $map['page']='dashboard';
        $data=asset_transaction_in::where('status','Setting')->get();
       $user = asset_user:: where('role','=','SPV')->where('status','=','Aktif')->get();
        $kondisi = asset_condition::get();
        $setting = asset_setting::get();
        $machine = asset_machine::get();
        $filter=0;
        $nama_bulan=date('Y-m');

   
        $map['user']=$user;
        $map['machine']=$machine;
        $map['setting']=$setting;
        $map['kondisi']=$kondisi;
        $map['data']=$data;
        $map['nama_bulan']=$nama_bulan;
        $map['filter']=$filter;

        return view('production.assetManagement.partials.maintenance.setting.data_setting', $map);
    }
    public function data_setting_filter($key)
    {
        $map['page']='dashboard';
        $filter=1;
        $nama_bulan=$key;
        $bulan=(new  Asset_maintenance)->awal_akhir($key);
        $data=asset_transaction_in::where('status','Setting')->where('date','>=',$bulan['awal'])->where('date','<=',$bulan['akhir'])->get();
        $user = asset_user:: where('role','=','SPV')->where('status','=','Aktif')->get();
        $kondisi = asset_condition::get();
        $setting = asset_setting::get();
        $machine = asset_machine::get();


   
        $map['user']=$user;
        $map['machine']=$machine;
        $map['setting']=$setting;
        $map['kondisi']=$kondisi;
        $map['data']=$data;
        $map['nama_bulan']=$nama_bulan;
        $map['bulan']=$bulan;
        return view('production.assetManagement.partials.maintenance.setting.data_setting', $map);
    }
    
    public function data_report()
    {
        $map['page']='dashboard';
        $user = asset_user:: where('role','=','SPV')->where('status','=','Aktif')->get();
        $userMekanik = asset_user:: where('role','=','Mekanik')->where('status','=','Aktif')->get();


        $machine = asset_transaction_in::whereIn('status', ['Transfer', 'Checking', 'Checking', 'Setting'])->orderByDesc('id')->get();
        // dd($machine);
        $map['machine']=$machine;
        $map['user']=$user;
        $map['userMekanik']=$userMekanik;
        // $map['dataAsset']=$dataAsset;


        return view('production.assetManagement.partials.maintenance.report', $map);
    }

    // public function report(Request $request)
    // {
    //     $map['page']='dashboard';
    //     $branch= $request->branch;
    //     $supplier= $request->supplier;
    //     $transaksi= $request->status;
    //     $mesin= $request->machine;
    //     $date= $request->daterange;
    //     $replace=str_replace('-','/',$date);
    //     $request=explode(" " , $replace);
    //     $tgl_satu = array_slice( $request,0,1);
    //     $tgl_dua = array_slice( $request,2,2);
    //     $tgl_awal=date('Y-m-d', strtotime($tgl_satu['0']));
    //     $tgl_akhir=date('Y-m-d', strtotime($tgl_dua['0']));
    //     $tanggal_awal = date('d-m-Y',strtotime($tgl_awal));
    //     $tanggal_akhir = date('d-m-Y',strtotime($tgl_akhir));
    //     $dataBranch =Branch::all();

    //     $dataTransaksi =asset_transaction_in::where('branch',$branch)->where('date','>=',$tgl_awal)->where('date','<=',$tgl_akhir)->where('status',$transaksi)->where('supplier',$supplier)->get();
    //     $dataSupplier =asset_supplier::all();
    //     $dataMachine =asset_machine::where('status','=','Asset')->limit(6)->get();


    //     $map['dataBranch']= $dataBranch;
    //     $map['dataTransaksi']= $dataTransaksi;
    //     $map['dataSupplier']= $dataSupplier;
    //     $map['dataMachine']= $dataMachine;
    //     $map['tanggal_awal']= $tanggal_awal;
    //     $map['tanggal_akhir']= $tanggal_akhir;
    //     $map['transaksi']= $transaksi;

    //     return view('production.assetManagement.partials.report.report', $map);
    // }

    public function getMachine(Request $request)
    {
        $id = $request->id;
        $data=asset_machine::where("id",$request->id)->first();

        return response()->json($data);
    }

    public function deleteAssetMaintenance($id){
        asset_transaction_in::where("id", $id)->delete();
        return back();
    }

    
    public function reportMiantenance(Request $request)
    {
        $map['page']='dashboard';
        $branch= $request->branch;
        $supplier= $request->supplier;
        $transaksi= $request->status;
        
        $mesin= $request->mesin;
        $user= $request->spv;
        $userMekanik= $request->created_by;
        $date= $request->daterange;
        $replace=str_replace('-','/',$date);
        $request=explode(" " , $replace);
        $tgl_satu = array_slice( $request,0,1);
        $tgl_dua = array_slice( $request,2,2);
        $tgl_awal=date('Y-m-d', strtotime($tgl_satu['0']));
        $tgl_akhir=date('Y-m-d', strtotime($tgl_dua['0']));
        $tanggal_awal = date('d-m-Y',strtotime($tgl_awal));
        $tanggal_akhir = date('d-m-Y',strtotime($tgl_akhir));
        $dataBranch =Branch::all();
        
        if ($userMekanik == null && $user == null && $transaksi == null ) {
            $dataTransaksi =asset_transaction_in::where('branch',$branch)->where('date','>=',$tgl_awal)->where('date','<=',$tgl_akhir)->whereIn('status', ['Transfer', 'Checking', 'Maintenance', 'Setting'])->get();
        }elseif($userMekanik == null && $user == null){
            $dataTransaksi =asset_transaction_in::where('branch',$branch)->where('date','>=',$tgl_awal)->where('date','<=',$tgl_akhir)->where('status',$transaksi)->get();
        }else{
            $dataTransaksi =asset_transaction_in::where('branch',$branch)->where('date','>=',$tgl_awal)->where('date','<=',$tgl_akhir)->where('status',$transaksi)->where('category',$mesin)->where('created_by',$userMekanik)->where('spv',$user)->get();
            
        }
       

        // $map['dataBranch']= $dataBranch;
        $map['dataTransaksi']= $dataTransaksi;
        // $map['dataSupplier']= $dataSupplier;
        // $map['dataMachine']= $dataMachine;
        $map['tanggal_awal']= $tanggal_awal;
        $map['tanggal_akhir']= $tanggal_akhir;
        $map['transaksi']= $transaksi;

        return view('production.assetManagement.partials.maintenance.reportmaintenance', $map);

    }
    
}
