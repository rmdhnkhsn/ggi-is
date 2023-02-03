<?php

namespace App\Http\Controllers;

use App\Models\GGI_IS\GCC_User;
use App\Models\GGI_IS\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AuthController extends Controller
{
    public function login(Request $request){
        $karyawan = [
            'nik' => $request->nik,
            'password' => $request->password,
            'isaktif' => '1',
        ];
        if(auth()->attempt($karyawan)){
            $gcc=GCC_User::find($request->nik);
            if ($gcc) {
                $gcc->lastlogin=date('Y-m-d H:i:s');
                $gcc->update();
            }
            $karyawan=Karyawan::find($request->nik);
            if ($karyawan) {
                $karyawan->lastlogin=date('Y-m-d H:i:s');
                $karyawan->update();
            }
            return redirect()->intended('/home');
        }
        return back()->with(['error' => 'NIK or Password is Incorrect !']);
    }
    public function logout(){
        auth()->logout();
        return redirect('/login');
    }
}
