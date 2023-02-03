<?php

namespace App\Http\Controllers\production\MasterSMV;

use PDF;
use App\Models\Production\MasterSmv;
use App\Models\Production\MasterSmvHeader;
use App\Services\Production\MasterSmv\databaseSmvHeader;
use App\Services\Production\MasterSmv\ExportDataSmv;
use App\Services\Production\MasterSmv\checkPermission;
use App\ItemNumber;
use App\ListBuyer;


use Auth;
use App\Branch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Exports\DatabaseSmv;
use League\Csv\Reader;
use function League\Csv\delimiter_detect;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\VarDumper\Cloner\Data;

class MasterSMVController extends Controller
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

    public function database_smv()
    {
        $map['page'] ='dashboard';
        $filter=0;
        $nama_bulan=date('Y-m');
        $a=ListBuyer::where('F0101_AN8','!=','210316')
        ->where('F0101_AN8','!=','320512')
        ->where('F0101_AN8','!=','330857')
        ->where('F0101_AN8','!=','340006')
        ->where('F0101_AN8','!=','340029')
        ->where('F0101_AN8','!=','360062')
        ->where('F0101_AN8','!=','990061')
        ->where('F0101_AN8','!=','19960130')
        ->where('F0101_AN8','!=','32086600')
        ->where('F0101_AN8','!=','32100287')
        ->where('F0101_AN8','!=','33210016')
        ->where('F0101_AN8','!=','33210023')
        ->where('F0101_AN8','!=','33210024')
        ->where('F0101_AN8','!=','33210028')
        ->where('F0101_AN8','!=','33210030')
        ->where('F0101_AN8','!=','33210039')
        ->where('F0101_AN8','!=','40000245')
        ->where('F0101_AN8','!=','40000389')
        ->where('F0101_AN8','!=','40000477')
        ->get();
        foreach ($a as $key => $value) {
            $ListBuyer[]=[
                'id'=>$value->F0101_ALPH,
                'text'=>$value->F0101_ALPH,
            ];
        }
        
        $dataSmv = MasterSmv :: all();
        $data = (new  databaseSmvHeader)->dataHitung();
        $map['ListBuyer'] =$ListBuyer;
        $map['data'] =$data;
        $map['dataSmv'] =$dataSmv;
        $map['filter'] =$filter;
        $map['nama_bulan'] =$nama_bulan;
        

        return view('production.mastersmv.database_smv', $map);
    }

    public function database_smv_filter($key)
    {
        $page ='dashboard';
        $filter=1;
        $nama_bulan=$key;
        $bulan=(new  databaseSmvHeader)->awal_akhir($key);        
        $dataget = MasterSmvHeader::where('date','>=',$bulan['awal'])->where('date','<=',$bulan['akhir'])->get();

        $a=ListBuyer::all();
        foreach ($a as $key => $value) {
            $ListBuyer[]=[
                'id'=>$value->F0101_ALPH,
                'text'=>$value->F0101_ALPH,
            ];
        }

        $data = (new  databaseSmvHeader)->dataHitung2($dataget);

        return view('production.mastersmv.database_smv', compact('page','ListBuyer','data','nama_bulan','filter'));
    }

    public function getDatabaseSMV(Request $request)
    {
        $nama_proses = $request->nama_proses;
        $data=MasterSmv::where("nama_proses",$request->nama_proses)->first();

        return response()->json($data);
    }

    public function edit_smv(Request $request,$id)
    {
        $map['page'] ='dashboard';
        $data = MasterSmvHeader::findorfail($id);
        $dataHeader=MasterSmvHeader::where('id',$id)->get();
        $masterDatabase=MasterSmv::where('smv_header_id',$id)->get();
        $dataSmvHeader = (new  databaseSmvHeader)->dataHitung();
        $dataSelect = (new  databaseSmvHeader)->dataSelect();
        $data2 = collect($dataSmvHeader)->where('id',$id)->first();
        $a=MasterSmv::all();
       $collect=collect($a)->groupBy('nama_proses');
            foreach ($collect as $key2 => $value2) {
                $maafin = collect($value2)
                    ->groupBy('style')
                    ->map(function ($item) {
                            return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($maafin as $key3 => $value3) {
                $MasterSmv[]=[
                    'smv_id'=>$value3['smv_id'],
                    'nama_proses'=>$value3['nama_proses'],
                    'style'=>$value3['style'],
                    'smv_minute'=>$value3['smv_minute'],
                    ];
                }
        }
        $map['MasterSmv'] =$MasterSmv;
        $map['dataHeader'] =$dataHeader;
        $map['masterDatabase'] =$masterDatabase;
        $map['data'] =$data;
        $map['data2'] =$data2;

        return view('production.mastersmv.edit_smv', $map);
    }
    public function smvChild(Request $request)
    {
        $map['page'] ='dashboard';
        // $dataHeader=MasterSmvHeader::where('id',$request->id_header)->get();
        $dataSmvHeader = (new  databaseSmvHeader)->dataHitung();
        $data2 = collect($dataSmvHeader)->where('id',$request->id_header)->first();
        $a=MasterSmv::all();
        $MasterSmv=[];
        // foreach ($a as $key => $value) {
        //     $MasterSmv[]=[
        //         'smv_id'=>$value->smv_id,
        //         'nama_proses'=>$value->nama_proses,
        //         'style'=>$value->style,
        //         'smv_minute'=>$value->smv_minute,
        //     ];
        // }
        $collect=collect($a)->groupBy('nama_proses');
            foreach ($collect as $key2 => $value2) {
                $maafin = collect($value2)
                    ->groupBy('style')
                    ->map(function ($item) {
                            return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($maafin as $key3 => $value3) {
                $MasterSmv[]=[
                    'smv_id'=>$value3['smv_id'],
                    'nama_proses'=>$value3['nama_proses'],
                    'style'=>$value3['style'],
                    'smv_minute'=>$value3['smv_minute'],
                    ];
                }
        }
        
        $map['MasterSmv'] =$MasterSmv;
        $map['data2'] =$data2;

        return view('production.mastersmv.smvChild', $map);
    }

    public function index()
    {
        $data = MasterSmv::get();
        $filter=0;
        $nama_bulan=date('Y-m');
        if(request()->ajax()){
            return datatables($data)
            ->addColumn('action', function($data){
                return view('production/mastersmv/btn_action', compact('data'));
            })
            ->make();
        }

        $map['isUpload'] = checkPermission::upload(auth()->id());
        $map['isDownload'] = checkPermission::download(auth()->id());
        $map['isDelete'] = checkPermission::delete(auth()->id());
        $map['filter'] =$filter;
        $map['nama_bulan'] =$nama_bulan;
        $map['page'] ='dashboard';
        return view('production/mastersmv/index', $map);
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {

            $data = json_decode($request->getContent());
            DB::connection('mysql_smv')->table('smv')->whereIn('smv_id', $data)->delete();
            DB::commit();

            return response()->json(['success'=>'Data berhasil dihapus']);

        } catch (\Exception $ex) {
            return response()->json(['danger'=> $ex->getMessage()]);
        }
    }

    public function export(){
        return ExportDataSmv::exportCsvEndUser();
    }

    public function importFile(Request $request){
        try {
            if($request->hasFile('file') && $request->file('file')->isValid()){
                $type = $request->file('file')->getClientOriginalExtension();
                if(strtolower($type)!='csv') throw new \Exception("Hanya mendukung file CSV");
                $fname = 'data_master_gsmv_' . date('Y_m_d_h_i') . '.' . $type;
                // Log::info($fname);

                $request->file('file')->storeAs('',$fname,'imported');
                return $this->import($fname);
            }
        } catch (\Exception $ex) {
            Log::info($ex->getMessage());
            dd($ex);
            return back()->with([
                'msg' => $ex->getMessage(), 'status'=>'danger'
            ]);
        }
    }

    private function import($fname)
    {
        $fillable = [
            'tanggal',
            'buyer',
            'style',
            'item', 
            'nama_proses', 
            'cycle_time', 
            'smv_minute', 
            'output_pj', 
            'mesin'                                                                                                                                                                                  
        ];

        $csv = Reader::createFromPath(storage_path('imported/' . $fname));
        $delimiter = delimiter_detect($csv, [';', ',']);

        if ($delimiter[';']) $csv->setDelimiter(';');
        elseif ($delimiter[',']) $csv->setDelimiter(',');

        $csv->setEscape('\\');
        $csv->setHeaderOffset(0);
        $records = [];
        $arrRecs = [];

        $listIntField = [
            'cycle_time',
            'smv_minute',
            'output_pj'
        ];

        $listDateField = [
            'tanggal'
        ];

        foreach ($csv as $key => $row) {
            foreach ($row as $f => $v) {
                // format date
                if(in_array($f, $listDateField)){
                    if($v!='' && $v!='0000-00-00')
                    $v = date('Y-m-d', strtotime($v));
                }

                if (!in_array($f, $listIntField)) {
                    $row[$f] = DB::getPdo()->quote($v);
                }
                
                // set null jika ga ada isinya
                if ($v == '') $row[$f] = 'NULL';
                
            }

            $validRecord = Arr::only($row, $fillable);
            // tambahkan kolom user yang melakukan upload
            $validRecord["user"] = "'".auth()->id()."'";

            array_push($arrRecs, $validRecord);
            array_push($records, "(" . implode(",", $validRecord) . ")");
        }

        $records =  implode(',', $records);
        
        // Set query on update
        $onUpdate = [];
        foreach ($csv as $key => $value) {
            unset($value[""]);
            foreach (array_keys(Arr::only($value, $fillable)) as $k => $v) {
                // if($v=='group') $v='`group`';
                array_push($onUpdate, "$v = values($v)");
            }
            break;
        }
        $onUpdate = implode(", ", $onUpdate);

        // get column name 
        $x=[];
        foreach ($fillable as $key => $value) {
            // if($value=='group') $value='`group`';
            $x[]=$value;
        }

        //tambah kolom user
        $x[]="user";
        $strField = implode(',', $x);

        try {

            // DB::beginTransaction();
            DB::connection('mysql_smv')->statement("insert into smv ($strField) values $records ON DUPLICATE KEY UPDATE $onUpdate");
            // DB::commit();

            return back()->with('success', count($arrRecs)  . ' Imported');

        } catch (\Exception $ex) {
            Log::info($ex->getMessage());
            return back()->with('error', $ex->getMessage());
        }

    }

    public function generateAutoNumber() {
        $tgl=date('ymd');
        $lembur = MasterSmvHeader::where('id','LIKE',$tgl."%")->max('id');
        $table_no=substr($lembur,6,3);
        $tgl = date('ymd');  
        $no= $tgl.$table_no;
        $auto=substr($no,6);
        $auto=intval($auto)+1;
        $auto_number=substr($no,0,6).str_repeat(0,(3-strlen($auto))).$auto;

        return $auto_number;
    }

    public function storeSmvHeader(Request $request)
    {
        if(isset($request->foto)){
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $fileName = substr($fileName, strpos($fileName, '.c'));
            $fileName = $request->style.'_'.$request->buyer.'_'.date("d M Y").$fileName;
            $tujuan_upload = 'databaseSmv/img';

            $fileName = $request->foto->storePubliclyAs(
                $tujuan_upload, $fileName, ['disk' => 'public']
            );
        }
        $auto_number = $this->generateAutoNumber();
        $tanggal=date('Y-m-d');
        try {
            DB::beginTransaction();
                $masterSmvHeader = new MasterSmvHeader;
                $masterSmvHeader->id = $auto_number;
                $masterSmvHeader->item = $request->item;
                $masterSmvHeader->style = $request->style;
                $masterSmvHeader->buyer =$request->buyer;
                $masterSmvHeader->manpower = $request->manpower;
                $masterSmvHeader->qty_order = $request->qty_order;
                $masterSmvHeader->line = $request->line;
                $masterSmvHeader->target = $request->target;
                $masterSmvHeader->allowance = $request->allowance;
                $masterSmvHeader->desc = $request->desc;
                $masterSmvHeader->date = $request->date;
                $masterSmvHeader->foto = $fileName ?? null;
                $masterSmvHeader->save();
            DB::commit();
            return redirect()->route('mastersmv.smvChild', $auto_number)->with("save", 'Data Has Been Saved !');
        
        } catch (\Exception $ex) {
            Log::info($ex->getMessage());
            return back()->with('error', $ex->getMessage());
        }

       
    }
    public function storeSmvChild(Request $request)
    {
        // dd($request->all());
        $tanggal=date('Y-m-d');
        $nama_proses=$request->nama_proses;
        for ($i=0; $i < count($request->nama_proses); $i++) { 
            if($request->nama_proses[$i] != null && $request->cycle_time[$i]!=null){
                $data=[
                    'smv_header_id'     =>$request->id_header,
                    'cycle_time'        =>$request->cycle_time[$i],
                    'smv_minute'        =>$request->smv_minute[$i],
                    'nama_proses'       =>$request->nama_proses[$i],
                    'item'              =>$request->item,
                    'buyer'             =>$request->buyer,
                    'style'             =>$request->style,
                    'targets'           =>$request->targets,
                    'tanggal'           =>$tanggal,
                    'mesin'             =>$request->mesin[$i],
                    'cat'               =>$request->cat[$i],
                    'output_pj'         =>$request->output_pj[$i],
                    'prd_on_capacity'   =>$request->prd_on_capacity[$i] ?? null,
                    'actual_mp'         =>$request->actual_mp[$i],
                    'actual_unit'       =>$request->actual_unit[$i],
                    'working_time'      =>$request->working_time[$i],
                    'manpower_need'     =>$request->manpower_need[$i],
                    'working_balance'   =>$request->working_balance[$i],
                    'user'              => auth()->user()->nik,
                ];
                MasterSmv::create($data);
            }
        }
        return redirect()->route('mastersmv.index')->with("save", 'Data Has Been Saved !');
    }

    public function updateSmvHeader(Request $request,$id)
    {
        $data = MasterSmvHeader::findorfail($id);
        $tanggal=date('Y-m-d');

        if(isset($request->foto)){
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $fileName = substr($fileName, strpos($fileName, '.c'));
            $fileName = $request->style.'_'.$request->buyer.'_'.date("d M Y").$fileName;
            $tujuan_upload = 'databaseSmv/img';

            $fileName = $request->foto->storePubliclyAs(
                $tujuan_upload, $fileName, ['disk' => 'public']
            );
        }
        $auto_number = $this->generateAutoNumber();

        $dataPackingUpdate= [
            'item'          => $request['item'],
            'style'         => $request['style'],
            'buyer'         => $request['buyer'],
            'manpower'      => $request['manpower'],
            'qty_order'     => $request['qty_order'],
            'line'          => $request['line'],
            'foto'          => $fileName ?? null,
            'target'        => $request['target'],
            'allowance'     => $request['allowance'],
            'desc'          => $request['desc'],
        ];

        $data->update($dataPackingUpdate);
        
            return redirect()->route('edit-smv',$id)->with("save", 'Data Has Been Saved !');
    }
    public function updateSmvChild(Request $request,$id)
    {
         $nama_proses=MasterSmv::where('smv_header_id',$id)->get();
            for ($i=0; $i <count($request->jumlahId) ; $i++) { 
               if($request->jumlahId[$i]!=null){
                    $data=[
                        'smv_header_id'     =>$request->id_header,
                        'cycle_time'        =>$request->cycle_time[$i],
                        'smv_minute'        =>$request->smv_minute[$i],
                        'nama_proses'       =>$request->nama_proses[$i] ?? null,
                        'item'              =>$request->item,
                        'buyer'             =>$request->buyer,
                        'style'             =>$request->style,
                        'mesin'             =>$request->mesin[$i]?? null,
                        'output_pj'         =>$request->output_pj[$i]?? null,
                        'prd_on_capacity'   =>$request->prd_on_capacity[$i]?? null,
                        'actual_mp'         =>$request->actual_mp[$i]?? null,
                        'actual_unit'       =>$request->actual_unit[$i]?? null,
                        'working_time'      =>$request->working_time[$i]?? null,
                        'manpower_need'     =>$request->manpower_need[$i]?? null,
                        'working_balance'   =>$request->working_balance[$i]?? null,
                        'user'              => auth()->user()->nik,
                    ];
                    MasterSmv::wheresmv_id($request->jumlahId[$i])->update($data);
               }
               else{
                    $tanggal=date('Y-m-d');
                    $data_create=[
                        'smv_header_id'     =>$request->id_header,
                        'cycle_time'        =>$request->cycle_time[$i],
                        'smv_minute'        =>$request->smv_minute[$i],
                        'nama_proses'       =>$request->nama_proses[$i],
                        'item'              =>$request->item,
                        'buyer'             =>$request->buyer,
                        'style'             =>$request->style,
                        'tanggal'           =>$tanggal,
                        'mesin'             =>$request->mesin[$i],
                        'output_pj'         =>$request->output_pj[$i],
                        'prd_on_capacity'   =>$request->prd_on_capacity[$i],
                        'actual_mp'         =>$request->actual_mp[$i],
                        'actual_unit'       =>$request->actual_unit[$i],
                        'working_time'      =>$request->working_time[$i] ?? null,
                        'manpower_need'     =>$request->manpower_need[$i],
                        'working_balance'   =>$request->working_balance[$i] ?? null,
                        'user'              => auth()->user()->nik,
                    ];
                    MasterSmv::create($data_create);
               }
            }
    return redirect()->route('mastersmv.index')->with("save", 'Data Has Been Saved !');

        
    }
    public function databaseSmvPdf(Request $request,$id)
    {
        $map['page'] ='dashboard';
        $data = MasterSmv :: where('smv_header_id','=',$id)->get();
        $data2 = (new  databaseSmvHeader)->dataHitung();
        $dataSMV=[];
        $dataSmvHeader=[];
        foreach ($data as $key => $value) {
            $dataSmvHeader = collect($data2)->where('id',$value->smv_header_id)->first();
            $dataSMV[]=[
                'buyer'=> $dataSmvHeader['buyer'],
                'style'=> $dataSmvHeader['style'],
                'item'=> $dataSmvHeader['item'],
                'line'=> $dataSmvHeader['line'],
                'smv'=> $dataSmvHeader['smv'],
                'targetSmv'=> $dataSmvHeader['targetSmv'],
                'dataPersen'=> $dataSmvHeader['dataPersen'],
                'dataPersen2'=> $dataSmvHeader['dataPersen2'],
                'foto'=> $dataSmvHeader['foto'],
                'cycle_time'=> $value->cycle_time,
                'smv_minute'=> $value->smv_minute,
                'mesin'=> $value->mesin,
                'cat'=> $value->cat,
                'output_pj'=> $value->output_pj,
                'actual_mp'=> $value->actual_mp,
                'manpower_need'=> $value->manpower_need,
                'working_time'=> $value->working_time,
                'working_balance'=> $value->working_balance,
                'actual_unit'=> $value->actual_unit,
                'nama_proses'=> $value['nama_proses'],
            ];
        }
        $map['dataSMV'] =$dataSMV;
        $map['dataSmvHeader'] =$dataSmvHeader;

        $customPaper = array(0,0,600,1000);
        $pdf =PDF::setOptions([
         'tempDir' => public_path(),
         'chroot'  => storage_path('/app/public/databaseSmv'),
      ])->loadview('production.mastersmv.partials.database_smv.databaseSmvPDF',$map)->setPaper($customPaper,'landscape','center');
         return $pdf->stream("ANALYSIS_PROCESS_REPORT".".pdf");

    }
    public function databaseSmvExcel(Request $request,$id)
    {

        $data = MasterSmv :: where('smv_header_id','=',$id)->get();
        $data2 = (new  databaseSmvHeader)->dataHitung();
        $dataSMV=[];
        $dataSmvHeader=[];
        foreach ($data as $key => $value) {
            $dataSmvHeader = collect($data2)->where('id',$value->smv_header_id)->first();
            $dataSMV[]=[
                'buyer'=> $dataSmvHeader['buyer'],
                'style'=> $dataSmvHeader['style'],
                'item'=> $dataSmvHeader['item'],
                'line'=> $dataSmvHeader['line'],
                'smv'=> $dataSmvHeader['smv'],
                'targetSmv'=> $dataSmvHeader['targetSmv'],
                'dataPersen'=> $dataSmvHeader['dataPersen'],
                'dataPersen2'=> $dataSmvHeader['dataPersen2'],
                'foto'=> $dataSmvHeader['foto'],
                'cycle_time'=> $value->cycle_time,
                'smv_minute'=> $value->smv_minute,
                'mesin'=> $value->mesin,
                'cat'=> $value->cat,
                'output_pj'=> $value->output_pj,
                'actual_mp'=> $value->actual_mp,
                'manpower_need'=> $value->manpower_need,
                'working_time'=> $value->working_time,
                'working_balance'=> $value->working_balance,
                'actual_unit'=> $value->actual_unit,
                'nama_proses'=> $value['nama_proses'],
            ];
        }
      
         return Excel::download(new DatabaseSmv($dataSMV,$dataSmvHeader),'_ANALYSIS_PROCESS_REPORT.xlsx');
    }

    public function deleteSmvChild($id)
    {
         MasterSmv::where("smv_id", $id)->delete();

        return back();
    }
    public function deleteall($id)
    {
         MasterSmv::where("smv_header_id", $id)->delete();
         MasterSmvHeader::where("id", $id)->delete();

        return back();
    }

    public function deleteHeader(Request $request)
    {
         $cek=$request->id;
            foreach ($cek as $key => $value) {
                if($value != null){
                    $count_x[]=[
                        'check'=>$value,
                    ];
                }
            }

            for ($i=0; $i < count($count_x) ; $i++) { 
                if($request->cek[$i]!=null){
                     $data=[
                    'id'        =>$request->id[$i],
                   
                ];
                MasterSmvHeader::whereid($request->id[$i])->delete($data);
               
                }
            }
            for ($j=0; $j < count($count_x) ; $j++) { 
                if($request->cek[$j]!=null){
                     $data2=[
                    'smv_header_id'        =>$request->id[$j],
                   
                ];
                MasterSmv::wheresmv_header_id($request->id[$j])->delete($data2);               
                }
            }
 
            return back();
    }
}
