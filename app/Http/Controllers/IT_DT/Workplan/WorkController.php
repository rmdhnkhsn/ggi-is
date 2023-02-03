<?php

namespace App\Http\Controllers\IT_DT\Workplan;

use DB;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\IT_DT\WorkPlan\plan;
Use App\Models\IT_DT\Work_Plan\WorkPlan;

class WorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $page = 'work_plan';
        $user_login=Auth::user("nik")->nik;
        $list_projek = (new  plan)->list_projek($user_login);
        $get_pending_project = (new  plan)->get_pending_project($user_login);
        $pending_project = (new  plan)->pending_project($get_pending_project);
        $get_done_project = (new  plan)->get_done_project($user_login);
        $project_done = (new  plan)->project_done($get_done_project);
        $proses_projek = (new  plan)->proses_projek($user_login);
        $count_task = (new  plan)->count_task($user_login);

        return view('it_dt/Workplan/index', compact('page','list_projek','pending_project','project_done','proses_projek','count_task'));
    }

    public function create()
    {
        // $a=WorkPlan::all();
        // dd($a);
        $user_login=Auth::user("nik")->nik;
        $dept = (new  plan)->dept();
        $kategori = (new  plan)->kategori();
        $proses_projek = (new  plan)->proses_projek($user_login);
        $upcomming_project = (new  plan)->upcomming_project($user_login);
        $page = 'new_project';
        return view('it_dt/Workplan/create', compact('page','proses_projek','upcomming_project','dept','kategori'));
    }
    public function store(request $request)
    { 
        $input = $request->all(); 
        // dd($input);     
        WorkPlan::create($input);
        return redirect()->route('workplan.index')->with('success', 'successfully saved');
    }
    public function edit($id)
    {             
        $data=WorkPlan::findOrFail($id);
        // dd($data);
        $user_login=Auth::user("nik")->nik;
        $page = 'new_project';
        $dept = (new  plan)->dept();
        $kategori = (new  plan)->kategori();
        $proses_projek = (new  plan)->proses_projek($user_login);
        $upcomming_project = (new  plan)->upcomming_project($user_login);
        if($data->nik_programmer==$user_login){
            return view('it_dt/Workplan/edit', compact('page','proses_projek','upcomming_project','data','dept','kategori'));
        }
        else{
            return view('it_dt/Workplan/create', compact('page','proses_projek','upcomming_project','kategori'));
        }
    }

    public function update(request $request)
    { 
        $id = $request->id;
        $validatedData = [
            'nama_projek' => $request->nama_projek,
            'dept'=>$request->dept,
            'kategori'=>$request->kategori,
            'estimasi_durasi'=>$request->estimasi_durasi,
            'benefit' => $request->benefit,    
            'id' => $request->id, 
            'remark' => $request->remark, 
        ];
        // dd( $validatedData);
        WorkPlan::whereId($id)->update($validatedData);
        return redirect()->route('workplan.index')->with('success', 'successfully saved');
    }
    
    public function start(request $request)
    { 
        $id = $request->id;
        $validatedData = [
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_mulai_pending' => $request->tgl_mulai_pending,
            'estimasi_tgl_selsai' => $request->estimasi_tgl_selsai,
            'status_work'=>$request->status_work,
        ];
        // dd( $validatedData);
        WorkPlan::whereId($id)->update($validatedData);
        return redirect()->route('workplan.index')->with('success', 'successfully saved');
    }

    public function pending(request $request)
    { 
        $id = $request->id;
        $validatedData = [
            'tgl_pending' => $request->tgl_pending,
            'status_work'=>$request->status_work,
        ];
        // dd( $validatedData);
        WorkPlan::whereId($id)->update($validatedData);
        return redirect()->route('workplan.index')->with('success', 'successfully saved');
    }

    public function done(request $request)
    { 
        $id = $request->id;
        $validatedData = [
            'aktual_tgl_selesai' => $request->aktual_tgl_selesai,
            'status_work'=>$request->status_work,
        ];
        WorkPlan::whereId($id)->update($validatedData);

        $nama=explode(" " , $request->nama_programmer);
            $coba = array_slice( $nama,0,1);
            foreach ($coba as $key2 => $value2) {
            $nama_depan=$value2;
            }
        // dd($nama_depan.'-'.substr($request->nama_projek, 0, 30) . '...');
        DB::table('notification')->insert([
            'connection_name'=>"mysql_work_plan",
            'table_name'=>"work_plan",
            'alert_level'=>"SUCCESS",
            'id_int'=> $request->id,
            'nik'=>'240026',
            'url'=>"workplan.notif",
            'title'=>"Work Plan",
            'desc'=>$nama_depan.'-'.substr($request->nama_projek, 0, 30) . '...',
            'is_read'=>"0"
        ]);
        return redirect()->route('workplan.index')->with('success', 'successfully saved');
    }
}
