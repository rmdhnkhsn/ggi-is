<?php

namespace App\Http\Controllers\QC\Sample;

use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\Sample\ItemCategory;
use App\Models\QC\Sample\ListBuyerSample;

class ItemCategoryController extends Controller
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
        $data = ListBuyerSample::with('item')->findorfail($id);
        // dd($data);

        if ($request->ajax()) {
            return Datatables::of($data->item)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return view('qc.sample.report.category.item.atribut.btn_action', compact('row'));
                    })
                    ->addColumn('description', function($row){
                        return view('qc.sample.report.category.item.atribut.btn_description', compact('row'));
                    })
                    ->rawColumns(['action','description'])
                    ->make(true);
        }

        return view('qc.sample.report.category.item.index', compact('page','data'));
    }

    public function create($id)
    {
        $page = 'SDescription';
        $data = ListBuyerSample::findorfail($id);

        return view('qc.sample.report.category.item.add', compact('page','data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $input = $request->all();
        ItemCategory::create($input);

        return redirect()->route('item_category.index', $request->buyer_id);
    }

    public function edit($id)
    {
        $data = ItemCategory::findorfail($id);
        $page = 'SDescription';
        return view('qc.sample.report.category.item.edit', compact('page', 'data'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
    
        $update = $request->all();
        ItemCategory::whereId($request->id)->update($update);

        return redirect()->route('item_category.index',$request->buyer_id);
    }

    public function delete($id)
    {
        $data = ItemCategory::findorfail($id);
        $data->delete();

        return back();
    }
}
