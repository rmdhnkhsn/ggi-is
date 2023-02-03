<?php

namespace App\Http\Controllers\Purchasing;

use App\User;
use App\JdeApi;
use DataTables;
use App\MasterPO;
use App\Style;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class VendorPortalController extends Controller
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

    public function dashboard(Request $request)
    {
        $page = 'dashboard';
        return view('purchasing.index', compact('page'));
    }
    
    public function utilization(Request $request)
    {

        $map['data']=DB::connection('mysql_vp')->table('v_vendor_utilization')->get();

        $sql="
        SELECT 
            (SELECT 
                COUNT(supplier_number) 
            FROM
                v_vendor_utilization 
            WHERE supplier_type = 'FABRIC' 
                AND count_delivery > 0) AS 'total_join',
        COUNT(supplier_number) AS 'total_supplier' 
        FROM
            `v_vendor_utilization` 
        WHERE supplier_type = 'FABRIC'
        ";
        $map['join_fabric']=DB::connection('mysql_vp')->select($sql);


        $sql="
        SELECT 
            (SELECT 
                COUNT(supplier_number) 
            FROM
                v_vendor_utilization 
            WHERE supplier_type = 'TRIM' 
                AND count_delivery > 0) AS 'total_join',
        COUNT(supplier_number) AS 'total_supplier' 
        FROM
            `v_vendor_utilization` 
        WHERE supplier_type = 'TRIM'
        ";
        $map['join_trim']=DB::connection('mysql_vp')->select($sql);


        $sql="
        SELECT 
            (SELECT 
                COUNT(supplier_number) 
            FROM
                v_vendor_utilization 
            WHERE supplier_type = 'FABRIC' 
                AND count_submit_inv > 0) AS 'total_submit',
        COUNT(supplier_number) AS 'total_supplier' 
        FROM
            `v_vendor_utilization` 
        WHERE supplier_type = 'FABRIC'
        ";
        $map['inv_fabric']=DB::connection('mysql_vp')->select($sql);

        $sql="
        SELECT 
            (SELECT 
                COUNT(supplier_number) 
            FROM
                v_vendor_utilization 
            WHERE supplier_type = 'TRIM' 
                AND count_submit_inv > 0) AS 'total_submit',
        COUNT(supplier_number) AS 'total_supplier' 
        FROM
            `v_vendor_utilization` 
        WHERE supplier_type = 'TRIM'
        ";
        $map['inv_trim']=DB::connection('mysql_vp')->select($sql);

        $map['page'] = 'vendorportal';


        if(request()->ajax()){
            return datatables($map['data'])
            ->make();
        }

        return view('purchasing.vendorportal.utilization', $map);
    }

    public function index(Request $request)
    {
        $page = 'vendorportal';
        return view('purchasing.vendorportal.index', compact('page'));
    }

    public function index_2(Request $request)
    {
        // get data semua aktif
        $data = MasterPO::all();


        // dd($data);


        // mengambil data yang akan ditampilkan di views
        $dataPO = [];
        foreach ($data as $key => $value) {
            //dd($value->po_number);
            $dataPO[] = [
                'po_number' => $value->po_number,
                'buyer' => $value->buyer,
                'order_date' => $value->order_date,
                'md_user' => $value->md_user,
                'foto' => $value->foto,

            ];
        }

        if ($request->ajax()) {
            return Datatables::of($data)
            ->addIndexColumn()
            
            ->addColumn('foto', function($row){

                return view('marketing.mpo.atribut.view_img', compact('row'));
                // $btn = '<img src="marketing/img/$value->foto" width="50px" alt="Foto">';
                // $btn = '<a href="" class="btn btn-info btn-sm" title="View Image"><i class="fas fa-eye"></i></a>';
                // return $btn;
                    
            })

            ->addColumn('action', function($row){

                return view('marketing.mpo.atribut.btn_action', compact('row'));
                // $btn = '<a href="' . route('masterpo.style', $row['id']) .'" class="btn btn-primary btn-sm" title="Add Style"><i class="fas fa-edit"></i></a>';
                // $btn = '<a href="' .  .'" class="edit btn btn-primary btn-sm" title="Edit"><i class="fas fa-edit"></i></a>';
                // return $btn;
                    
            })
            ->rawColumns(['foto','action'])
            ->make(true);
        
        }
        
        return view('marketing/mpo/masterpo', compact('data'));
    }

    public function create()
    {
    
        return view('marketing/mpo/add');
    
    }

    // public function fetchstore()
    // {
    //     $dt = MasterPO::all();
    //     return response()->json([
    //         'masterpo'=> $dt,
    //     ]);
    // }

    public function store(Request $request)
    {
       
        if(
            MasterPO::where('po_number', $request->po_number)->count()
        ) 
            {
                return redirect()->route('masterpo.create')->with('error', 'Tidak bisa menambahkan PO Number Yang Sama');
            }

            // $nm = $request->foto;
            // $filename = $nm->getClientOriginalName();

            //     $dt = new MasterPO;
            //     $dt->po_number   = $request->po_number;
            //     $dt->buyer       = $request->buyer;
            //     $dt->order_date  = $request->order_date;
            //     $dt->md_user     = $request->md_user;   
            //     $dt->foto        = $request->$filename; 

            //     $nm->move('marketing/img/', $filename);
            //     $dt->save();


        $dt = new MasterPO;
        $dt->po_number   = $request->input('po_number');
        $dt->buyer       = $request->input('buyer');
        $dt->order_date  = $request->input('order_date');
        $dt->md_user     = $request->input('md_user');    

        if($request->hasFile('foto'))
        {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = time('H:i:s') . '.' .$extension;
            $file->move('marketing/img/', $filename);
            $dt->foto = $filename;
        }
        $dt->save();


        // $foto = $request->file('foto');
        // $ext  = $foto->getClientOriginalExtension();
        // if ($request->file('foto')->isValid()) {
        //     $foto_name   = date('YmdHis'). ".$ext";
        //     $request->file('foto')->move('marketing/img', $foto_name);
        //     return $foto_name;
        // }
        // return false;

        // if($request->foto != null){
        //     $file = $request->file('foto');
    
        //     $fileName = time()."_".$file->getClientOriginalName();
        
        //     // isi dengan nama folder tempat kemana file diupload
        //     $tujuan_upload = 'marketing/img';
        //     $file->move($tujuan_upload,$fileName);
        // }
        // else{
        //     $fileName=null;
        // }

        // $input = [
        //     'po_number' => $request->po_number,
        //     'buyer' => $request->buyer,
        //     'order_date' => $request->order_date,
        //     'md_user' => $request->md_user,
        //     'foto' => $request->foto
        // ];


        // MasterPO::create($input);
        // dd($request->all());

        return redirect()->route('marketing.masterpo')->with('success', 'Success');
    }

    public function edit($id)
    {
        $data = MasterPO::findorfail($id);
        return view('marketing/mpo/edit-image', compact('data'));

    }

    public function update(Request $request, $id)
    {
        $ubah = MasterPO::findorfail($id);
        $awal = $ubah->foto;

        $data = [
            'po_number'  => $request['po_number'],
            'buyer'      => $request['buyer'],
            'order_date' => $request['order_date'],
            'md_user'    => $request['md_user'],
            'foto'      => $awal,
        ];
        $request->foto->move('marketing/img/', $awal);
        $ubah->update($data);
        return redirect()->route('marketing.masterpo')->with('success', 'Success');

    }

    public function style(Request $request, $id) 
    {

        // if(
        //     Style::where('style_number', $request->style_number)->count()
        // ) 
        //     {
        //         return redirect()->route('masterpo.style')->with('error', 'Tidak bisa menambahkan Style Number Yang Sama');
        //     }

        // $dt = new Style;
        // $dt->style_number   = $request->input('style_number');
        // $dt->article        = $request->input('article');
        // $dt->product_name   = $request->input('product_name');
        // $dt->total_qty      = $request->input('total_qty');
        // $dt->or_number      = $request->input('or_number');
        // $dt->ex_fact        = $request->input('ex_fact');
        // $dt->fob            = $request->input('fob');


        // dd($id);
        $data = MasterPO::findOrFail($id);
        
        $style = Style::where('id_po', $id)->get();
        // dd($style);

        return view('marketing/mpo/style', compact('data','style'));
    }

    public function astyle($id) 
    {
        $data = MasterPO::findOrFail($id);
        // dd($data);

        return view('marketing/mpo/add_style', compact('data'));
    }

    public function poststyle(Request $request)
    {
        // dd($request->all());
        $back = MasterPO::findorfail($request->po_id);

        if(
            Style::where('style_number', $request->style_number)->count()
        )   return redirect()->route('masterpo.astyle')->with('error', 'Tidak Bisa Menambah Style Number Yang Sama');


        $input = [
            'id_po'         => $request->po_id,
            'style_number'  => $request->style_number,
            'article'   	=> $request->article,
            'product_name'  => $request->product_name,
            'total_qty'     => $request->total_qty,
            'or_number'     => $request->or_number,
            'ex_fact'       => $request->ex_fact,
            'fob'           => $request->fob,
        ];
        // dd($input);
        $show = Style::create($input);


        // dd($request);
        return redirect()->route('masterpo.style', $back->id)->with('success', 'Master Line is successfully saved');
    }
    
    public function saving_cost()
    {
        $page = 'dashboard';
        return view('purchasing.savingCost.index', compact('page'));
    }
}