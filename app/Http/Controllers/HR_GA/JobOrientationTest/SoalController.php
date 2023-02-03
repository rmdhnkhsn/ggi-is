<?php

namespace App\Http\Controllers\HR_GA\JobOrientationTest;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HR_GA\JobOrientationTest\Soal;

class SoalController extends Controller
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

    public function store(Request $request)
    {
        $input = $request->all();
        Soal::create($input);

        return back()->with('success', 'successfully saved');
    }

    public function delete($id)
    {
        $data = Soal::findorfail($id);
        // dd($data);
        $data->delete();
        
        return back();
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $jawaban = $request['answer'.$id];
        $update = [
            'question' => $request->question,
            'option1' => $request->option1,
            'option2' => $request->option2,
            'option3' => $request->option3,
            'option4' => $request->option4,
            'answer' => $jawaban
        ];

        Soal::whereId($id)->update($update);
        return back();
    }

    public function delete_all($id)
    {
        $data = Soal::where('modul_id', $id)->delete();
        
        return back();
    }
}
