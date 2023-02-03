<?php

namespace App\Http\Controllers\IT_DT\Role;

use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleManagementController extends Controller
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

    public function role()
    {   
        $map['page']='dashboard';
        return view('it_dt.RoleManagement.role', $map);
    }

    public function employee()
    {   
        $map['page']='dashboard';
        return view('it_dt.RoleManagement.employee', $map);
    }

    public function position()
    {   
        $map['page']='dashboard';
        return view('it_dt.RoleManagement.position', $map);
    }
}
