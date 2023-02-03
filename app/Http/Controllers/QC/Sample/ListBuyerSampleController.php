<?php

namespace App\Http\Controllers\QC\Sample;

use DataTables;
use Illuminate\Http\Request;
use App\Models\QC\Sample\Category;
use App\Http\Controllers\Controller;
use App\Models\QC\Sample\ListBuyerSample;

class ListBuyerSampleController extends Controller
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

    public function index(Request $request, $id)
    {
        $page = 'SDescription';
        $data = Category::with('buyer')->findorfail($id);
        // dd($data);

        if ($request->ajax()) {
            return Datatables::of($data->buyer)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return view('qc.sample.report.category.buyer.atribut.btn_action', compact('row'));
                    })
                    ->addColumn('item', function($row){
                        return view('qc.sample.report.category.buyer.atribut.btn_item', compact('row'));
                    })
                    ->rawColumns(['action','item'])
                    ->make(true);
        }

        return view('qc.sample.report.category.buyer.index', compact('page','data'));
    }

    public function create($id)
    {
        $page = 'SDescription';
        $data = Category::findorfail($id);

        return view('qc.sample.report.category.buyer.add', compact('page','data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $input = $request->all();
        ListBuyerSample::create($input);

        return redirect()->route('list_buyer.index', $request->category_id);
    }

    public function edit($id)
    {
        $data = ListBuyerSample::findorfail($id);
        $page = 'SDescription';
        return view('qc.sample.report.category.buyer.edit', compact('page', 'data'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $update = $request->all();
        ListBuyerSample::whereId($request->id)->update($update);

        return redirect()->route('list_buyer.index',$request->category_id);
    }

    public function delete($id)
    {
        $data = ListBuyerSample::findorfail($id);
        $data->delete();

        return back();
    }
}
