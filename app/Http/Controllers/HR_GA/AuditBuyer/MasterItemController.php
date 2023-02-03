<?php

namespace App\Http\Controllers\HR_GA\AuditBuyer;

use DB;
use Auth;
use DataTables;
use App\Branch;
use Illuminate\Http\Request;
Use App\Models\HR_GA\AuditBuyer\Apar;
Use App\Models\HR_GA\AuditBuyer\SmokeDet;
Use App\Models\HR_GA\AuditBuyer\EmerExit;
Use App\Models\HR_GA\AuditBuyer\EmerLamp;
Use App\Models\HR_GA\AuditBuyer\AlarmBtn;
Use App\Models\HR_GA\AuditBuyer\ItemMaster;
Use App\Models\HR_GA\AuditBuyer\ItemLokasi;
use App\Services\HR_GA\AuditBuyer\AuditBuyer;
use App\Http\Controllers\Controller;

class MasterItemController extends Controller
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
        $bulan=date('Y-m');
        $page = 'audit_buyer';
        $tgl=date('d');
        // $tgl='27';
        $user_login=Auth::user("role")->role;
        // $user_login='petugas_apar';
        //Notif
            $bln_tanggal = (new  AuditBuyer)->awal_akhir($bulan);
            $item_lokasi = (new  AuditBuyer)->item_lokasi();
            $apar = (new  AuditBuyer)->apar($bln_tanggal);
            $alarm = (new  AuditBuyer)->alarm($bln_tanggal);
            $SmokeDet = (new  AuditBuyer)->SmokeDet($bln_tanggal);
            $EmerExit = (new  AuditBuyer)->EmerExit($bln_tanggal);
            $EmerLamp = (new  AuditBuyer)->EmerLamp($bln_tanggal);
            $item_lokasi= collect($item_lokasi)->groupBy('kode_lokasi')->toArray();
            $apar= collect($apar)->groupBy('kode_lokasi')->toArray(); 
            $alarm=collect($alarm)->groupBy('kode_lokasi')->toArray();
            $SmokeDet=collect($SmokeDet)->groupBy('kode_lokasi')->toArray();
            $EmerExit=collect($EmerExit)->groupBy('kode_lokasi')->toArray();
            $EmerLamp=collect($EmerLamp)->groupBy('kode_lokasi')->toArray();
            $record=array_diff_key($item_lokasi,$apar,$alarm,$SmokeDet,$EmerExit,$EmerLamp);
            $notif = (new  AuditBuyer)->notif($record,$bln_tanggal);
            $jml_notif=count($notif);
        //Damage
        if($user_login=='SYS_ADMIN' || $user_login=='ADMIN_HRD' || auth()->user()->nik == '300047' ){
            $alarm_perbaikan = (new  AuditBuyer)->alarm_perbaikan();
            $alarm_proses = (new  AuditBuyer)->alarm_proses();
            $alarm_finish = (new  AuditBuyer)->alarm_finish();
        
            $SmokeDet_perbaikan = (new  AuditBuyer)->SmokeDet_perbaikan();
            $SmokeDet_proses = (new  AuditBuyer)->SmokeDet_proses();
            $SmokeDet_finish = (new  AuditBuyer)->SmokeDet_finish();

            $apar_perbaikan = (new  AuditBuyer)->apar_perbaikan();
            $apar_proses = (new  AuditBuyer)->apar_proses();
            $apar_finish = (new  AuditBuyer)->apar_finish();

            $EmerExit_perbaikan = (new  AuditBuyer)->EmerExit_perbaikan();
            $EmerExit_proses = (new  AuditBuyer)->EmerExit_proses();
            $EmerExit_finish = (new  AuditBuyer)->EmerExit_finish();

            $EmerLamp_perbaikan = (new  AuditBuyer)->EmerLamp_perbaikan();
            $EmerLamp_proses = (new  AuditBuyer)->EmerLamp_proses();
            $EmerLamp_finish = (new  AuditBuyer)->EmerLamp_finish();

            $count_PerStatus = (new  AuditBuyer)->Repair_count_PerStatus();
        // Count Damage
            $count_PerItem = (new  AuditBuyer)->Repair_count_PerItem();
       

            return view('hr_ga/AuditBuyer/index', compact('page','notif','tgl','jml_notif','alarm_perbaikan','alarm_proses','alarm_finish',
                                'SmokeDet_perbaikan','apar_perbaikan','EmerExit_perbaikan','EmerLamp_perbaikan',
                                'SmokeDet_proses','SmokeDet_finish','EmerExit_proses','EmerExit_finish',
                                'EmerLamp_proses','EmerLamp_finish','apar_proses','apar_finish','count_PerItem',
                                'count_PerStatus','user_login'));
            }
        return view('hr_ga/AuditBuyer/index', compact('page','notif','tgl','jml_notif','user_login'));

    }
    public function see(Request $request)
    {
        $data = ItemMaster::all();
        $ItemMaster=[];
        foreach ($data as $ket => $value) {
            $jumlah_item=ItemLokasi::where('id_item',$value->id)->count();
            $ItemMaster[]=[
            'id'    =>$value->id,
            'item'  =>$value->item,
            'jumlah_item'=>$jumlah_item,
            ];
        }
        $page = 'IMaster';
        return view('hr_ga/AuditBuyer/MasterItem/seeItem', compact('ItemMaster','page'));
    }
    public function delete_master($id)
    {
        $item_Lokasi = ItemMaster::findOrFail($id);
        $item_Lokasi->delete();
        return back();
    }
    public function store_master(Request $request){
        $input = $request->all();      
                        
        ItemMaster::create($input);
        
        return redirect()->route('hr_ga.item.see')->with('success', 'successfully saved');
    
    }    
    public function add_location($id)
    {
        $item = ItemMaster::findOrFail($id);
        $dataBranch= Branch::all();
        $item_location= ItemLokasi::where('id_item',$item->id)->get();
        $page = 'IMaster';
        return view('hr_ga/AuditBuyer/MasterItem/add_location', compact('item','item_location','id','page','dataBranch'));
    }
    public function store_location(Request $request){
        $dataBranch= Branch::findOrFail($request->branch);
        if($request->id_item=='1'){
            $kode='AB-';
        }
        elseif($request->id_item=='2'){
            $kode='SD-';
        }
        elseif($request->id_item=='3'){
            $kode='AP-';
        }
        elseif($request->id_item=='4'){
            $kode='EE-';
        }
        elseif($request->id_item=='5'){
            $kode='EL-';
        }
        $item = ItemLokasi::where('kode_lokasi','LIKE',$kode."%")->max('kode_lokasi');
        $table_no=substr($item,3,4); 
        $no= $kode.$table_no;
        $auto=substr($no,3);
        $auto=intval($auto)+1;
        $auto_number=substr($no,0,3).str_repeat(0,(4-strlen($auto))).$auto;
            $input=[
                'kode_lokasi'  =>$auto_number,
                'nama_lokasi'  =>$request->nama_lokasi,
                'id_item'      =>$request->id_item,
                'item'         =>$request->item,
                'kode_branch'  =>$dataBranch->kode_branch,
                'branchdetail' =>$dataBranch->branchdetail,
                'id_report'    =>$request->id_item,
            ];      
                    //dd($input);        
            ItemLokasi::create($input);
                            
            return back(); 
                  
    }
    public function delete_location($id)
    {
        $item_Lokasi = ItemLokasi::findOrFail($id);
        $item_Lokasi->delete();
        return back();
    }    
}