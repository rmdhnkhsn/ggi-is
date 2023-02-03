<?php

namespace App\Services\Production\AssetManagement;

use App\Branch;
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
use App\Models\Production\Asset\asset_user;
use App\Models\GGI_IS\V_GCC_USER;
use DB;
use Illuminate\Support\Str;



class Asset_management{
    
    public function storeExcel($data_material,$request){
        foreach ($data_material as $key => $value) {
            foreach ($value as $key2 => $row) {
                if($key2>1 && $row[0]!=null){
                    $data=[
                        'code'=>$row[1],
                        'tipe'=>$row[2],
                        'jenis'=>$row[3],
                        'merk'=>$row[4],
                        'deskripsi'=>$row[5],
                        'varian'=>$row[6],
                        'serialno'=>$row[7],
                        'coOrigin'=>$row[8],
                        'brOrigin'=>$row[9],
                        'brLokasi'=>$row[10],
                        'lokasi'=>$row[11],
                        'tipeLokasi'=>$row[12] ?? 0,
                        'supplier'=>$row[13] ?? 0,
                        'kondisi'=>$row[14] ?? 0,
                        'status'=>$row[15] ?? 0,
                        
                    ];
                    if(asset_machine::where('serialno',$row[7])->count()){
                        asset_machine::whereId('serialno',$row[7])->update($data);
                    }
                    else{
                    asset_machine::create($data);

                    }
                }
            }
        }

    }
    public function storeAssetCompany($request){
        // $customers = \DB::connection( 'mysql_asset' )->table( 'asset_company' )->orderBy( 'id' )->chunk( 1000, function ( $all ) {
        //     foreach ( $all as $kunde ) {
        //          $existing_kunde = DB::connection('mysql_asset')->table('asset_company')->where('Name', $kunde->Name)->first();
        //         if ( ! $existing_kunde ) {
        //             DB::connection( 'mysql_asset' )->table('asset_company')->create(
        //                 [ $kunde->Name,
        //                      $kunde->Address,
        //                      $kunde->Status,
        //                      $kunde->Code,
        //                 ]);
        //           }
        //     }
        // } );
    // $assignments =  new asset_company;
    // $assignments  ->Name = $request->input('Name');
    // $assignments  ->Status  = $request->input('Status');
    // $assignments  ->Address = $request->input('Address');
    // $assignments  ->Code = $request->input('Code');

// $count = asset_company::where('Name', '=' ,$assignments->Name)->
//     count();
//     // dd($count );
//     if($count) {
//         alert(405, 'Trying to assign an already assigned asset');
//     }

//     $assignments  ->save();

        // dd($userDuplicates);
        // dd($userDuplicates->toArray());

    // $old_categories = asset_company::all();
    // $new_categories = asset_company::select('Name')->get();

    // $newCatArr = [];

    // foreach($new_categories as $new_category)
    // {
    //     $newCatArr[] = $new_category->Name; 
    // }

    // foreach($old_categories as $category)
    // {
    //     if(!in_array($category->Name, $newCatArr))
    //     {
    //         asset_company::insertOrIgnore([
    //             'Name' => $category->Name,
    //             'Address' => $category->Address,
    //             'Status' => $category->Status,
    //             'Code' => $category->Code,
    //         ]);
    //     }
    // }

        // dd($request->all());

        // $r = new asset_company;
        // $slug = Str::slug($request->Name, '-');
        // dd($slug);
        // $r->Name = $request->Name;
        // if( asset_company::where('Name', $slug)->first() != null ) { // kalau ada kembar, baru ganti namanya
        //     // $r->slug = $request->Name;
        // }
        // $r->save();

        $input=[
                'Name'           =>$request->Name,
                'Address'           =>$request->Address,
                'Status'           =>$request->Status,
                'Code'           =>$request->Code,
                ];      

        $validatedInput = $request->validate([

        ]);       
            asset_company::create($input);
        return false;
    }
    public function updateAssetCompany($request,$ID){

        $data = asset_company::findorfail($ID);
         
            $dataUpdate= [
                'Code'         => $request['Code'],
                'Name'        => $request['Name'],
                'Address'          => $request['Address'],
                'Status'          => $request['Status'],
            ];
        $data->update($dataUpdate);

    }
    public function storeAssetBranch($request){

        $input=[
                'branch_code'           =>$request->branch_code,
                'company'           =>$request->company,
                'name'           =>$request->name,
                'status'           =>$request->status,
                'address'           =>$request->address,
                ];      

        $validatedInput = $request->validate([

        ]);       
            asset_branch::create($input);
            return false;
    }
    public function updateAssetBranch($request,$id){
        $data = asset_branch::findorfail($id);
         
            $dataUpdate= [
                'branch_code'         => $request['branch_code'],
                'company'        => $request['company'],
                'address'          => $request['address'],
                'name'          => $request['name'],
                'status'       => $request['status'],
            ];

            $data->update($dataUpdate);

            return false;
    }
    public function storeAssetLocation($request){
    

        $input=[
                'branch'           =>$request->branch,
                'tipe'           =>$request->tipe,
                'nama'           =>$request->nama,
                'status'           =>$request->status,
                ];      

        $validatedInput = $request->validate([

        ]);       
            asset_location::create($input);
            return false;
    }
    public function updateAssetLocation($request,$id){

        $data = asset_location::findorfail($id);
         
            $dataUpdate= [
                'branch'         => $request['branch'],
                'tipe'        => $request['tipe'],
                'nama'          => $request['nama'],
                'status'          => $request['status'],
            ];

            $data->update($dataUpdate);

            return false;
    }
    public function storeAssetMachineType($request){

        $input=[
                'company'           =>$request->company,
                'tipe'           =>$request->tipe,
                'status'           =>$request->status,
                ];      

        $validatedInput = $request->validate([

        ]);       
            asset_machine_type::create($input);
            return false;
    }
    public function updateAssetMachineType($request,$id){

        $data = asset_machine_type::findorfail($id);
         
            $dataUpdate= [
                'company'         => $request['company'],
                'tipe'        => $request['tipe'],
                'status'          => $request['status'],
            ];

            $data->update($dataUpdate);

            return false;
    }
    public function storeAssetMachineCategory($request){
    
        $input=[
                'company'        =>$request->company,
                'jenis'           =>$request->jenis,
                'status'         =>$request->status,
                ];      

        $validatedInput = $request->validate([

        ]);       
            asset_machine_category::create($input);
            return false;
    }
    public function updateAssetMachineCategory($request,$id){
        
        $data = asset_machine_category::findorfail($id);
      
            $dataUpdate= [
                'company'         => $request['company'],
                'jenis'           => $request['jenis'],
                'status'            => $request['status'],
            ];

            $data->update($dataUpdate);
            return false;
    }
    public function storeAssetBrand($request){
      
        $input=[
                'company'        =>$request->company,
                'merk'           =>$request->merk,
                'status'         =>$request->status,
                ];      

        $validatedInput = $request->validate([

        ]);       
            asset_brand::create($input);
            return false;
    }
    public function updateAssetBrand($request,$id){
        
        $data = asset_brand ::findorfail($id);
  
            $dataUpdate= [
                'company'         => $request['company'],
                'merk'           => $request['merk'],
                'status'           => $request['status'],
            ];

            $data->update($dataUpdate);
            return false;
    }
    public function storeAssetMachine($request){

        $input=[
                'code'        =>$request->code,
                'tipe'        =>$request->tipe,
                'jenis'        =>$request->jenis,
                'deskripsi'        =>$request->deskripsi,
                'date'        =>$request->date,
                'merk'        =>$request->merk,
                'varian'           =>$request->varian,
                'serialno'           =>$request->serialno,
                'qty'           =>$request->qty,
                'price'           =>$request->price,
                'coOrigin'           =>$request->coOrigin,
                'brOrigin'           =>$request->brOrigin,
                'brLokasi'           =>$request->brLokasi,
                'lokasi'           =>$request->lokasi,
                'tipeLokasi'           =>$request->tipeLokasi,
                'supplier'           =>$request->supplier,
                'kondisi'           =>$request->kondisi,
                'status'           =>$request->status,
                ];      

        $validatedInput = $request->validate([

        ]);       
            asset_machine::create($input);
            return false;
    }
    public function updateAssetMachine($request){
        $data = asset_machine ::findorfail($request->id);
            $asset_machine = [
                'code'          =>$request['code'],
                'tipe'          =>$request['tipe'],
                'jenis'         =>$request['jenis'],
                'deskripsi'     =>$request['deskripsi'],
                'date'          =>$request['date'],
                'merk'          =>$request['merk'],
                'varian'        =>$request['varian'],
                'serialno'      =>$request['serialno'],
                'qty'           =>$request['qty'],
                'price'         =>$request['price'],
                'coOrigin'      =>$request['coOrigin'],
                'brOrigin'      =>$request['brOrigin'],
                'brLokasi'      =>$request['brLokasi'],
                'lokasi'        =>$request['lokasi'],
                'tipeLokasi'    =>$request['tipeLokasi'],
                'supplier'      =>$request['supplier'],
                'kondisi'       =>$request['kondisi'],
                'status'        =>$request['status'],
            ];
// asset_machine::whereId($request->id)->update($asset_machine);
                $data->update($asset_machine);
    }
    public function storeAssetSupplier($request){

        $input=[
                'company'        =>$request->company,
                'tipe'        =>$request->tipe,
                'nama'        =>$request->nama,
                'alamat'        =>$request->alamat,
                'status'         =>$request->status,
                ];      

        $validatedInput = $request->validate([

        ]);       
            asset_supplier::create($input);
            return false;
    }
    public function updateAssetSupplier($request,$id){
        
        $data = asset_supplier ::findorfail($id);
            $dataUpdate= [
                'company'        =>$request['company'],
                'tipe'        =>$request['tipe'],
                'nama'        =>$request['nama'],
                'alamat'        =>$request['alamat'],
                'status'        =>$request['status'],
                
            ];

            $data->update($dataUpdate);
        return false;
    }
    public function storeAssetMaintenance($request){

        $input=[
                'maintenance'        =>$request->maintenance,
                
                ];      

        $validatedInput = $request->validate([

        ]);       
            asset_maintanance::create($input);
            return false;
    }
    public function updateAssetMaintenance($request,$id){
        
        $data = asset_maintanance ::findorfail($id);
            $dataUpdate= [
                'maintenance'        =>$request['maintenance'],
                
                
            ];

            $data->update($dataUpdate);
        return false;
    }
    public function storeAssetCondition($request){
        $input=[
                'condition'        =>$request->condition,
                ];      

        $validatedInput = $request->validate([

        ]);       
            asset_condition::create($input);
            return false;
    }
    public function updateAssetCondition($request){
        
        $data = asset_condition ::findorfail($request->id);
            $dataUpdate= [
                'condition'        =>$request['condition'],                
            ];

            $data->update($dataUpdate);
        return false;
    }
    public function storeUserAkses($request){
        $input=[
                'company'        =>$request->company,
                'branch'        =>$request->branch,
                'username'        =>$request->username,
                'fullname'        =>$request->fullname,
                'role'        =>$request->role,
                'nik'        =>$request->nik,
                'status'        =>$request->status,
                'created_by'        => auth()->user()->nama,
                ];      

            asset_user::create($input);
            return false;
    }
    public function updateUserAkses($request){
        
        $data = asset_user::findorfail($request->id);
            $dataUpdate= [
                'company'        =>$request['company'],                
                'branch'        =>$request['branch'],                
                'username'        =>$request['username'],                
                'fullname'        =>$request['fullname'],                
                'role'        =>$request['role'],                
                'nik'        =>$request['nik'],                
                'status'        =>$request['status'],                
            ];

            $data->update($dataUpdate);
        return false;
    }
    public function storeSetting($request){
        // dd($request->all());
        $input=[
                'setting'        =>$request->setting,
                ];      

            asset_setting::create($input);
            return false;
    }
    public function updateSetting($request){
        
        $data = asset_setting::findorfail($request->id);
            $dataUpdate= [
                'setting'        =>$request['setting'],        
            ];

            $data->update($dataUpdate);
        return false;
    }

    public function userNIk($request){
    $userAdd=V_GCC_USER::where('nik','!=','GISCA')
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
            ->get();

    return $userAdd;        

    }
    // public function userFullName($userAdd,$request){
    //     $user = asset_user::all();
    //     foreach ($user as $key => $value) {
    //         $data= collect($userAdd)->where('nik',$value['username'])->first();
    //         if ($data != null) {
    //         $dataName[]=[
    //             'id'=>$value->id,
    //             'company'=>$value->company,
    //             'branch'=>$value->branch,
    //             'username'=>$value->username,
    //             'fullname'=>$data['nama'],
    //             'role'=>$value->role,
    //             'status'=>$value['status'],
    //         ];
    //     }
    //     }
    //     $dataDoang = collect($dataName);
    // return $dataName;        

    // }



}