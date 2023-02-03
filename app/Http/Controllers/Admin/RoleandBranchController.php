<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Branch;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RoleandBranchController extends Controller
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
    
    // function buat role 

    public function roleindex(Request $request)
    {
        // get semua data
        $data = Role::all();
        $dataRole = [];
        foreach ($data as $key => $value) {
            $dataRole[] = [
                'id' => $value->id,
                'kode_role' => $value->kode_role,
                'nama_role' => $value->nama_role,
                'created_at' => $value->created_at,
                'updated_at' => $value->updated_at,
            ];
        }
        // dd($dataRole);
        if ($request->ajax()) {
            return Datatables::of($dataRole)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return view('sys_admin.role.atribut.btn_action', compact('row'));
                    })
                    ->editColumn('created_at', function($row){
                        return $row['created_at']->format('d-m-Y');
                    })
                    ->editColumn('updated_at', function($row){
                        return $row['updated_at']->format('d-m-Y');
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        $page = 'Role';
        return view('sys_admin/role/index', compact('page'));
    }

    public function rolecreate()
    {
        $page = 'Role';
        return view('sys_admin/role/add', compact('page'));
    
    }

    public function rolestore(Request $request)
    {
        
        if(
            Role::where('kode_role', $request->kode_role)->where('nama_role', $request->nama_role)->count()
        ) throw new \Exception('Proses simpan ditolak. Data terdaftar');
        
        $input = [
            'kode_role' => strtoupper($request->kode_role),
            'nama_role' => strtoupper($request->nama_role),
        ];

        $show = Role::create($input);
        // dd($request);
        return redirect()->route('role.index')->with('success', 'Role is successfully saved');
    }

    public function roleedit($id)
    {
        $data = Role::findOrFail($id);

        $page = 'Role';
        return view('sys_admin/role/edit', compact('data','id','page'));
 
    }

    public function roleupdate(Request $request)
    {
        $id = $request->id;

        $validatedData = [
            'kode_role' => strtoupper($request->kode_role),
            'nama_role' => strtoupper($request->nama_role),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        Role::whereId($id)->update($validatedData);

	    return redirect()->route('role.index')->with('success', 'Role is successfully updated');
    }

    // end function buat role 

    // function buat branch 
    public function branchindex(Request $request)
    {
        // get semua data
        $data = Branch::all();
        $dataBranch = [];
        foreach ($data as $key => $value) {
            $dataBranch[] = [
                'id' => $value->id,
                'kode_branch' => $value->kode_branch,
                'branchdetail' => $value->branchdetail,
                'nama_branch' => $value->nama_branch,
                'created_at' => $value->created_at,
                'updated_at' => $value->updated_at,
            ];
        }
        // dd($dataBranch);
        if ($request->ajax()) {
            return Datatables::of($dataBranch)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return view('sys_admin.branch.atribut.btn_action', compact('row'));
                    })
                    ->editColumn('created_at', function($row){
                        return $row['created_at']->format('d-m-Y');
                    })
                    ->editColumn('updated_at', function($row){
                        return $row['updated_at']->format('d-m-Y');
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        $page = 'Branch';
        return view('sys_admin/branch/index', compact('page'));
    }

    public function branchcreate()
    {
        
        $page = 'Branch';
        return view('sys_admin/branch/add', compact('page'));
    
    }

    public function branchstore(Request $request)
    {
        
        if(
            Branch::where('kode_branch', $request->kode_branch)->where('branchdetail', $request->branchdetail)->where('nama_branch', $request->nama_branch)->count()
        ) throw new \Exception('Proses simpan ditolak. Data terdaftar');
        
        $input = [
            'kode_branch' => strtoupper($request->kode_branch),
            'branchdetail' => strtoupper($request->branchdetail),
            'nama_branch' => strtoupper($request->nama_branch),
        ];

        $show = Branch::create($input);
        // dd($request);
        return redirect()->route('branch.index')->with('success', 'Branch is successfully saved');
    }

    public function branchedit($id)
    {
        $data = Branch::findOrFail($id);

        $page = 'Branch';
        return view('sys_admin/branch/edit', compact('data','id','page'));
 
    }

    public function branchupdate(Request $request)
    {
        $id = $request->id;

        $validatedData = [
            'kode_branch' => strtoupper($request->kode_branch),
            'branchdetail' => strtoupper($request->branchdetail),
            'nama_branch' => strtoupper($request->nama_branch),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        Branch::whereId($id)->update($validatedData);

	    return redirect()->route('branch.index')->with('success', 'Branch is successfully updated');
    }
    // end function buat branch 
}
