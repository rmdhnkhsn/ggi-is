<?php

namespace App\Http\Controllers\Ticketing;

use DB;
use Auth;
use App\User;
use App\TiketHelp;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelpController extends Controller
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
        
        $data = TiketHelp::all();
        
        $page = 'DMaster';
        return view('it_dt/Ticketing/Help/see', compact('data','page'));
    }

    public function create(Request $request)
        {  
            $page = 'DMaster';
            return view('it_dt/Ticketing/Help/add', compact('page'));
        }

    public function edit($id)
        {
            $data = TiketHelp::findOrFail($id);
            
            $page = 'DMaster';
            return view('it_dt/Ticketing/help/edit', compact('data','id','page'));
        }

    public function update(Request $request)
        {
            $id = $request->id;
            $validatedData = [
                'item' => $request->item,
            ];
    
            TiketHelp::whereId($id)->update($validatedData);
    
            return redirect()->route('thelp.index')->with('success', ' successfully updated');
        //}
    }


    
}