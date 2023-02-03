<?php

namespace App\Http\Controllers\QC\Sample;

use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\Sample\ItemCategory;
use App\Models\QC\Sample\Description;

class DescriptionController extends Controller
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
        $data = ItemCategory::with('desc')->findorfail($id);
        // dd($data);

        if ($request->ajax()) {
            return Datatables::of($data->desc)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return view('qc.sample.report.category.description.atribut.btn_action', compact('row'));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('qc.sample.report.category.description.index', compact('page','data'));
    }

    public function create($id)
    {
        $page = 'SDescription';
        $data = ItemCategory::findorfail($id);

        return view('qc.sample.report.category.description.add', compact('page','data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        foreach ($request->description as $key => $value) {
            $input = [
                '_token' => $request->_token, 
                'description' => $value, 
                'item_id' => $request->item_id, 
            ]; 
            Description::create($input);
        }

        return redirect()->route('description_item.index', $request->item_id);
    }

    public function edit($id)
    {
        $data = Description::findorfail($id);
        $page = 'SDescription';
        return view('qc.sample.report.category.description.edit', compact('page', 'data'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $update = $request->all();
        Description::whereId($request->id)->update($update);

        return redirect()->route('description_item.index',$request->item_id);
    }

    public function delete($id)
    {
        $data = Description::findorfail($id);
        $data->delete();

        return back();
    }
}
