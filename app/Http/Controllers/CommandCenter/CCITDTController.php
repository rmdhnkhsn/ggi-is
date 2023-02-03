<?php

namespace App\Http\Controllers\CommandCenter;

use App\Branch;
use App\TiketUser;
use App\Tiket;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\tiket\perfactory;

class CCITDTController extends Controller
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
    public function index($id)
    {
        $dataBranch = Branch::findorfail($id);
        $data_tiket = (new perfactory)->data_tiket($dataBranch);
        $dataTiketw = (new perfactory)->tiket_waiting($data_tiket);
        $dataTiketpro = (new perfactory)->tiket_proses($data_tiket);
        $dataTiketp = (new perfactory)->tiket_pending($data_tiket);
        $it_support =(new perfactory)->IT_Support($dataBranch);
        $total_tiket =(new perfactory)->total_tiket($dataBranch);
        //$user = TiketUser::where('nik','=',$data_tiket->nik)->first();
        //dd($total_tiket);

        $page = 'commandCenter2';
        return view('CommandCenter.IT_DT.perfactory', compact('dataBranch', 'dataTiketw','dataTiketpro','dataTiketp','it_support','total_tiket','page'));
    }
    public function detail($id)
        {
            $data = Tiket::findOrFail($id);
            if($data->petugas != null){
                $nik = user::where('nik','=',$data->petugas)->first('nama');  
                $nama= $nik->nama;
            }
            else{
                $nama="";
            }
            $user = TiketUser::where('nik','=',$data->nik)->first();
            //dd($user);
            $page = 'commandCenter';
            return view('CommandCenter.IT_DT.tiketdetail', compact('data','id','nama','user','page'));
        }

    public function ItAll()
    {
        $dataBranch = Branch::all();
        $page = 'commandCenter';
        return view('CommandCenter.IT_DT.allfactory', compact('dataBranch','page'));
    }
}
