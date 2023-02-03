<?php

namespace App\Http\Controllers\Marketing\RekapOrder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Marketing\RekapOrder\RekapSize;
use App\Models\Marketing\RekapOrder\RekapOrder;
use App\Models\Marketing\RekapOrder\RekapDetail;

class RekapSizeController extends Controller
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
    
    public function store(Request $request, $id)
    {
        if(
            RekapSize::where('master_order_id' , $request->report_id)->count()
        )  return redirect()->back()->with(['error' => 'Data Terdaftar !!']);

        $updateId = [
            'is_size_exist' => $id
        ];
        // dd($updateId);
        RekapOrder::whereId($id)->update($updateId);

        $input = $request->all();
        // dd($input);

        $show = RekapSize::create($input);

        return redirect()->back();
    }

    public function edit($id)
	{
		$rekapSize = RekapOrder::with('rekap_size')->where('id', $id)->first();
        return response()->json($rekapSize);
	}

    public function update(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $validatedData = [
            'size1' => $request->size1,
            'size2' => $request->size2,
            'size3' => $request->size3,
            'size4' => $request->size4,
            'size5' => $request->size5,
            'size6' => $request->size6,
            'size7' => $request->size7,
            'size8' => $request->size8,
            'size9' => $request->size9,
            'size10' => $request->size10,
            'size11' => $request->size11,
            'size12' => $request->size12,
            'size13' => $request->size13,
            'size14' => $request->size14,
            'size15' => $request->size15,
            'size16' => $request->size16,
            'size17' => $request->size17,
            'size18' => $request->size18,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        // dd($validatedData);

        RekapSize::whereId($id)->update($validatedData);

	    return redirect()->back();
    }
}
