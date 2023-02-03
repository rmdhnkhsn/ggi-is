<?php

namespace App\Http\Controllers\production\AssetManagement;

use Illuminate\Http\Request;
use Auth;
use DataTables;
use App\Branch;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
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
use App\Models\Production\Asset\asset_transaction_data;
use App\Models\Production\Asset\asset_transaction_in;
use App\Models\Production\Asset\asset_user;

use App\Services\Production\AssetManagement\Asset_management;
use App\Services\Production\AssetManagement\Asset_transaction;

class TransactionController extends Controller
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

    public function transaction(Request $request)
    {
        $map['page']='dashboard';
        $userAdd = (new  Asset_management)->userNIk($request);
        $bagian_support=asset_user::where('nik',auth()->user()->nik)->first();
        // $dd($bagian_support) = (new  Asset_management)->userFullName($userAdd,$request);
        if ($bagian_support->role !='Sys_Admin') {
        $data =asset_machine::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('brOrigin',$bagian_support->branch)->orderByDesc('id');
        if ($request->ajax()) {
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
            $dataTransaksi =asset_transaction_data::all();
            $dataAssetBranch =asset_branch::get();
            $dataSupplier =asset_supplier::all();
            $dataType =asset_machine_type::all();
            $dataCategory =asset_machine_category::all();
            $dataBrand =asset_brand::all();
            $dataLocation =asset_location::all();

                return view('production.assetManagement.partials.transaction.atribut.btn_detail', compact('row','dataTransaksi','dataAssetBranch','dataSupplier','dataType','dataCategory','dataBrand','dataLocation'));
            })
            ->rawColumns(['action'])
            ->make(true);

        }

            $id=$request->id;
            $dataOut =asset_machine::whereIn('status', ['sale', 'rentalFinished', 'trialFinished'])->where('brOrigin',$bagian_support->branch)->orderByDesc('id')->get();
            // $dataUser =asset_user::first();
            $dataSupplier =asset_supplier::all();
            $dataCategory =asset_machine_category::all();
            $dataLocation =asset_location::all();
            $dataType =asset_machine_type::all();
            $dataBrand =asset_brand::all();
            $dataTransaksi =asset_transaction_data::all();
            $dataAssetMachine =asset_machine::where('status','=','Asset')->limit(10)->orderByDesc('id')->get();
            $dataAssetBranch =asset_branch::get();

            $map['id']= $id;
            $map['data']= $data;
            $map['dataOut']= $dataOut;
            $map['dataCategory']= $dataCategory;
            $map['dataLocation']= $dataLocation;
            $map['dataType']= $dataType;
            $map['dataBrand']= $dataBrand;
            $map['dataSupplier']= $dataSupplier;
            $map['dataTransaksi']= $dataTransaksi;
            $map['dataAssetMachine']= $dataAssetMachine;
            $map['dataAssetBranch']= $dataAssetBranch;
        }else{
            $data =asset_machine::whereIn('status', ['Asset', 'Rental', 'Trial'])->orderByDesc('id');
                if ($request->ajax()) {
                    return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                    $dataTransaksi =asset_transaction_data::all();
                    $dataAssetBranch =asset_branch::get();
                    $dataSupplier =asset_supplier::all();
                    $dataType =asset_machine_type::all();
                    $dataCategory =asset_machine_category::all();
                    $dataBrand =asset_brand::all();
                    $dataLocation =asset_location::all();

                        return view('production.assetManagement.partials.transaction.atribut.btn_detail', compact('row','dataTransaksi','dataAssetBranch','dataSupplier','dataType','dataCategory','dataBrand','dataLocation'));
                    })
                    ->rawColumns(['action'])
                    ->make(true);

                }

                    $id=$request->id;
                    $dataOut =asset_machine::whereIn('status', ['sale', 'rentalFinished', 'trialFinished'])->orderByDesc('id')->get();
                    // $dataUser =asset_user::first();
                    $dataSupplier =asset_supplier::all();
                    $dataCategory =asset_machine_category::all();
                    $dataLocation =asset_location::all();
                    $dataType =asset_machine_type::all();
                    $dataBrand =asset_brand::all();
                    $dataTransaksi =asset_transaction_data::all();
                    $dataAssetMachine =asset_machine::where('status','=','Asset')->limit(10)->orderByDesc('id')->get();
                    $dataAssetBranch =asset_branch::get();

                    $map['id']= $id;
                    $map['data']= $data;
                    $map['dataOut']= $dataOut;
                    $map['dataCategory']= $dataCategory;
                    $map['dataLocation']= $dataLocation;
                    $map['dataType']= $dataType;
                    $map['dataBrand']= $dataBrand;
                    $map['dataSupplier']= $dataSupplier;
                    $map['dataTransaksi']= $dataTransaksi;
                    $map['dataAssetMachine']= $dataAssetMachine;
                    $map['dataAssetBranch']= $dataAssetBranch;
        }

        return view('production.assetManagement.partials.transaction.index', $map);
    }

    public function getSupplier(Request $request)
    {

        $data=asset_supplier::where("nama",$request->ID)->first();

        return response()->json($data);
    }
    public function getBranch(Request $request)
    {

        $data=asset_branch::where("name",$request->ID)->first();

        return response()->json($data);
    }
    public function getMachine(Request $request)
    {
        $id = $request->id;
        $data=asset_machine::where("id",$request->id)->first();

        return response()->json($data);
    }

    public function maintenance()
    {
        $map['page']='dashboard';
        return view('production.assetManagement.partials.maintenance.index', $map);
    }

    public function purchase()
    {
        $map['page']='dashboard';

        $data =asset_supplier::where('status','Aktif')->get();
        $dataCategory =asset_machine_category::all();
        $dataLocation =asset_location::all();
        $dataType =asset_machine_type::all();
        $dataBrand =asset_brand::all();
        $dataMachine =asset_machine_category::get();
        $dataAssetBranch =asset_branch::get();
        $dataBranch =Branch::get();
        $dataKondisi =asset_condition::get();
        $time =date("H:i:s");
        $date = date("Y-m-d ");
    
        $map['date']= $date;
        $map['time']= $time;
        $map['data']= $data;
        $map['dataCategory']= $dataCategory;
        $map['dataLocation']= $dataLocation;
        $map['dataType']= $dataType;
        $map['dataBrand']= $dataBrand;
        $map['dataMachine']= $dataMachine;
        $map['dataBranch']= $dataBranch;
        $map['dataAssetBranch']= $dataAssetBranch;
        $map['dataKondisi']= $dataKondisi;
        
        
        return view('production.assetManagement.partials.transaction.purchase', $map);
    }
    public function transaksi_out()
    {
        $map['page']='dashboard';
        $bagian_support=asset_user::where('nik',auth()->user()->nik)->first();
        $data =asset_machine:: where('status','Asset')->where('brOrigin',$bagian_support->branch)->get();
        $dataSupplier =asset_branch::get();
        $time =date("H:i:s");
        $date = date("Y-m-d ");
        $map['time']= $time;
        $map['date']= $date;
        
        $map['data']= $data;
        $map['dataSupplier']= $dataSupplier;
        
        return view('production.assetManagement.partials.transaction.transaksi_out', $map);
    }

    public function storeAssetTransaction(Request $request)
    {
        $data = (new  Asset_transaction)->storeAssetTransaction($request);
        return redirect()->route('asset.transaction.index')->with("save", $data["message"]);
    }
    public function storeAssetTransactionOut(Request $request)
    {
        $data = (new  Asset_transaction)->storeAssetTransactionOut($request);

        return redirect()->route('asset.transaction.index')->with("save", 'Data Has Been Saved !');
        // return redirect()->back()->with("save", 'Data Has Been Saved !');
    }
    public function updateAssetTransaction(Request $request)
    {
        $data = (new  Asset_transaction)->updateAssetTransaction($request);
        return redirect()->back()->with("save", 'Data Has Been Saved !');
    }

    public function deleteAssetTransaction($id){
        asset_transaction_in::where("id_machine", $id)->delete();
        asset_machine::where("id", $id)->delete();
        return back();
    }

    public function rental()
    {
        $map['page']='dashboard';
        $bagian_support=asset_user::where('nik',auth()->user()->nik)->first();
        $data =asset_machine:: where('status','Rental')->where('brOrigin',$bagian_support->branch)->get();
        $dataSupplier =asset_branch::get();
        $time =date("H:i:s");
        $date = date("Y-m-d ");
        $map['date']= $date;
        $map['time']= $time;
        
        $map['data']= $data;
        $map['dataSupplier']= $dataSupplier;
        return view('production.assetManagement.partials.transaction.rental', $map);
    }

    public function trial()
    {
        $map['page']='dashboard';
        $bagian_support=asset_user::where('nik',auth()->user()->nik)->first();
        $data =asset_machine:: where('status','Trial')->where('brOrigin',$bagian_support->branch)->get();
        $dataSupplier =asset_branch::get();
        $time =date("H:i:s");
        $date = date("Y-m-d ");
        $map['time']= $time;
        $map['date']= $date;
        
        $map['data']= $data;
        $map['dataSupplier']= $dataSupplier;
        return view('production.assetManagement.partials.transaction.trial', $map);
    }
    
}
