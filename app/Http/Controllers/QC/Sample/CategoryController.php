<?php

namespace App\Http\Controllers\QC\Sample;

use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\Sample\Category;

class CategoryController extends Controller
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
        $page = 'SDescription';
        $data = Category::where('branch', auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail);

        if ($request->ajax()) {
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return view('qc.sample.report.category.atribut.btn_action', compact('row'));
                    })
                    ->addColumn('item', function($row){
                        return view('qc.sample.report.category.atribut.btn_buyer', compact('row'));
                    })
                    ->rawColumns(['action','item'])
                    ->make(true);
        }
        // dd($data);
        return view('qc.sample.report.category.index', compact('page'));
    }

    public function create()
    {
        $page = 'SDescription';
        return view('qc.sample.report.category.add', compact('page'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $input = $request->all();
        Category::create($input);

        return redirect()->route('sample_category.index');
    }

    public function edit($id)
    {
        $data = Category::findorfail($id);
        $page = 'SDescription';
        return view('qc.sample.report.category.edit', compact('page', 'data'));
    }

    public function update(Request $request)
    {
        $update = $request->all();
        Category::whereId($request->id)->update($update);

        return redirect()->route('sample_category.index');
    }

    public function delete($id)
    {
        $data = Category::findorfail($id);
        $data->delete();

        return back();
    }
}
