<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Branch;
use App\JdeApi;
use DataTables;
use League\Csv\Reader;
use Illuminate\Http\Request;
use App\MyTrait\ExportCSVTrait;
use App\Exports\KaryawanExport;
use App\Imports\KaryawanImport;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use function League\Csv\delimiter_detect;


class KaryawanController extends Controller
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
    
    public function index(Request $request)
    {
        // get data semua aktif
        $all = User::all();
        $data = User::where('isaktif',1)->get();

        // mengambil data karyawan yang akan ditampilkan di views
        $dataKaryawan = [];
        foreach ($data as $key => $value) {
            $dataKaryawan[] = [
                'nik' => $value->nik,
                'nama' => $value->nama,
                'bagian' => $value->departemensubsub,
                'jabatan' => $value->jabatan,
                'branch' => $value->branch,
                'branchdetail' => $value->branchdetail,
                'role' => $value->role,
                'status' => $value->isaktif,
            ];
        }
        if ($request->ajax()) {
            return Datatables::of($dataKaryawan)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            return view('sys_admin.atribut.btn_action', compact('row'));
                        //    $btn = '<a href="{{route('karyawan.editrole')}}" class="edit btn btn-primary btn-sm" title="Edit Role"><i class="fas fa-edit"></i></a>';
       
                        //     return $btn;
                    })
                    ->editColumn('status', function($row){
                        if ($row['status'] == 0) {
                            $status = 'Tidak Aktif';
                        }else{
                            $status = 'Aktif';
                        }
                        return $status;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $page = 'Master_Karyawan';
        return view('sys_admin/index', compact('data','all','page'));
    }

    public function inactive(Request $request)
    {
        // get data semua aktif
        $data = User::where('isaktif',0)->get();

        // mengambil data karyawan yang akan ditampilkan di views
        $dataKaryawan = [];
        foreach ($data as $key => $value) {
            $dataKaryawan[] = [
                'nik' => $value->nik,
                'nama' => $value->nama,
                'bagian' => $value->departemensubsub,
                'jabatan' => $value->jabatan,
                'branch' => $value->branch,
                'branchdetail' => $value->branchdetail,
                'role' => $value->role,
                'status' => $value->isaktif,
            ];
        }
        if ($request->ajax()) {
            return Datatables::of($dataKaryawan)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            return view('sys_admin.atribut.btn_action', compact('row'));
                        //    $btn = '<a href="{{route('karyawan.editrole')}}" class="edit btn btn-primary btn-sm" title="Edit Role"><i class="fas fa-edit"></i></a>';
       
                        //     return $btn;
                    })
                    ->editColumn('status', function($row){
                        if ($row['status'] == 0) {
                            $status = 'Tidak Aktif';
                        }else{
                            $status = 'Aktif';
                        }
                        return $status;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        $page = 'Master_Karyawan';
        return view('sys_admin/inactive', compact('data','page'));
    }

    public function editrole($id)
    {
        $user = User::findorfail($id);
        $role = Role::all();

        return view('sys_admin/editrole', compact('user', 'role'));
    }

    public function masterwo(Request $request)
    {
        $wo = new JdeApi;
        $wo->setConnection('mysql_jdeapi');
        $arr_wo = $wo->all();
        $dataWo = [];
        foreach ($arr_wo as $key => $value) {
            $dataWo[] = [
                'no_wo' => $value->F4801_DOCO,
                'second_item' => $value->F4801_AITM,
                'item_description' => $value->F4801_DL01,
                'order_quantity' => $value->F4801_UORG,
                'quantity_shipped' => $value->F4801_SOQS,
                'no_so' => $value->F4801_RORN,
            ];
        }

        if ($request->ajax()) {
            return Datatables::of($dataWo)
                ->addColumn('detail', function($row){
                    return view('qc.rework.wo.atribut.btn_detail', compact('row'));
                })
                ->make(true);
        }
      
        $page = 'MasterWo';
        return view('sys_admin/masterwo', compact('page'));
    }

    public function manage(Request $request)
    {
        $input = $request->nik;
        // dd($input);
        $role = Role::all();
        $dataBranch = Branch::all();
        $user = User::findorfail($input);
        $comcen = User::listcomcen();
        // dd($comcen);
        $page = 'Master_Karyawan';

        return view('sys_admin/manage', compact('comcen','user','role','dataBranch', 'page'));

    }

    public function mupdate(Request $request)
    {
        // dd($request->all());
        $nik = $request->nik;
        $isaktif = $request->isaktif;
        // dd($isaktif);
        if ($isaktif == 1) {
            $input = [
                'role' => $request->role,
                'nama' => $request->nama,
                'branch' => $request->branch,
                'branchdetail' => $request->branchdetail,
                'comcen' => $request->comcen,
                'isresign' => 0,
                'isaktif' => 1
            ];
        }else{
            $input = [
                'role' => $request->role,
                'nama' => $request->nama,
                'branch' => $request->branch,
                'branchdetail' => $request->branchdetail,
                'comcen' => $request->comcen,
                'isresign' => 1,
                'isaktif' => 0
            ];
        }
        
        User::where('nik',$nik)->update($input);

        return redirect()->route('karyawan.index');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        $records = [];
        DB::table('karyawan')->orderBy('nik','asc') //->orderBy('nik','asc')->orderBy('tahun','desc')
        ->chunk(500, function($data)use(&$records){
            foreach ($data as $key => $value) {
                array_push($records, $value);
            }
        });
        
        return ExportCSVTrait::export(ExportCSVTrait::callbackSeluruhData($records), 'data_karyawan_gistex_' . date('Y_m_d'));
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
    
            if($request->hasFile('file') && $request->file('file')->isValid()){
                $type = $request->file('file')->getClientOriginalExtension();
                if(strtolower($type)!='csv') throw new \Exception("Hanya mendukung file CSV");
                $fname = 'karyawan_gistex_admin_' . date('Y_m_d_h_i') . '.' . $type;
                // dd($fname);
                $request->file('file')->storeAs('',$fname,'imported');
                return $this->importAdmin($fname);
            }else{
                return back()->with([
                    'msg' => $ex->getMessage(), 'status'=>'danger'
                ]);
            }
    }

    private function importAdmin($fname)
    {

        $fillable = ['nik', 'nama', 'jk', 'departemen', 'departemensub', 'departemensubsub', 'jabatan', 'group', 'branch', 'branchdetail', 'statuskontrak','agama','statuskawin', 'email', 'password', 'nohp', 'foto', 'sisacuti', 'lastcuti', 'lastlogin', 'isresign', 'isaktif', 'approval_code', 'role', 'updated_at', 'created_at', 'group_jabatan', 'tanggal_masuk', 'tanggal_lahir', 'tempat_lahir','pendidikan','nik_atasan','tna_group', 'tgl_trigger_cuti','branch_group','komp_gaji', 'bank', 'cabang', 'anbank', 'rekening','tanggal_mulai_kontrak1','tanggal_habis_kontrak1','tanggal_mulai_kontrak2','tanggal_habis_kontrak2','tanggungan','alamat','nik_ktp','no_kpj','no_kis','no_npwp','gmail','nama_ibu_kandung','no_tlp_keluarga_tdk_serumah','nama_suami_istri','nama_anak1','nama_anak2','nama_anak3','file'];
        // dd($fillable);
        $csv = Reader::createFromPath(storage_path('imported/' . $fname));
        // dd($csv);
        $delimiter = delimiter_detect($csv, [';', ',']);
        // dd($delimiter);

        if ($delimiter[';']) $csv->setDelimiter(';');
        elseif ($delimiter[',']) $csv->setDelimiter(',');

        $csv->setEscape('\\');
        // dd($csv);
        $csv->setHeaderOffset(0);
        // dd($csv);
        $records = [];
        // dd($records);
        $arrRecs = [];
        $listIntField = [
            'sisacuti',
            'isresign',
            'rekening',
            'isaktif',
        ];
        $listDateField = [
            'lastcuti',
            'lastlogin',
            'tanggal_masuk',
            'tanggal_lahir',
            'tgl_trigger_cuti',
            'tanggal_mulai_kontrak1',
            'tanggal_habis_kontrak1',
            'tanggal_mulai_kontrak2',
            'tanggal_habis_kontrak2',
        ];

        $listDateTime = [
            'updated_at',
            'created_at'
        ];
        // dd($listDateField);

        foreach ($csv as $key => $row) {
            foreach ($row as $f => $v) {
                // format date time
                if(in_array($f, $listDateTime)){
                    if($v!='' && $v !='0000-00-00 00:00:00')
                    $v = date('Y-m-d H:i:s');
                }if($v !='' && $v =='0000-00-00 00:00:00')
                    $v =  date('Y-m-d H:i:s');
                // format date
                if(in_array($f, $listDateField)){
                    if($v!='' && $v !='0000-00-00')
                    $v = date('Y-m-d H:i:s', strtotime($v));
                }if($v !='' && $v =='0000-00-00')
                    $v = null;
                // set quote untuk type string
                if (!in_array($f, $listIntField)) {
                    $row[$f] = DB::getPdo()->quote($v);
                }
                // dd($row[$f]);
                // set null jika ga ada isinya
                if ($v == '') $row[$f] = 'NULL';
            }
            // dd($v);
            $validRecord = Arr::only($row, $fillable);
            // dd($validRecord);
            array_push($arrRecs, $validRecord);
            array_push($records, "(" . implode(",", $validRecord) . ")");
        }
        $records =  implode(',', $records);
        // dd($records);
        // dd($records);
        
        // Set query on update
        $onUpdate = [];
        foreach ($csv as $key => $value) {
            unset($value[""]);
            foreach (array_keys(Arr::only($value, $fillable)) as $k => $v) {
                if($v=='group') $v='`group`';
                array_push($onUpdate, "$v = values($v)");
            }
            break;
        }
        $onUpdate = implode(", ", $onUpdate);

        // return $onUpdate;
        // return $records;

        // replace group jadi `group` 
        $x=[];
        foreach ($fillable as $key => $value) {
            if($value=='group') $value='`group`';
            $x[]=$value;
        }
        $strField = implode(',', $x);
        // dd($strField);

        DB::statement("insert into karyawan ($strField) values $records ON DUPLICATE KEY UPDATE $onUpdate");
        return redirect()->route('karyawan.index')->with(['success' => 'Data Karyawan Berhasil di Import']);
    }

    public function upload($id){
        $karyawan = Karyawan::findOrFail($id);

        return view('modul.karyawan.upload', compact('karyawan', 'id'));
    }

    public function viewimport()
    {
        return view('sys_admin/import');
    }

}
