<?php

namespace App\Http\Controllers\IT_DT\Framework;

use DB;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrameworkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $page = 'dashboard';
        $subPage = 'button';
        return view('it_dt.framework.index', compact('page', 'subPage'));
    }
    
    public function button()
    {
        $page = 'components';
        $subPage = 'button';
        return view('it_dt.framework.components.button', compact('page', 'subPage'));
    }
    
    public function form()
    {
        $page = 'components';
        $subPage = 'form';
        return view('it_dt.framework.components.form', compact('page', 'subPage'));
    }
    
    public function select()
    {
        $page = 'components';
        $subPage = 'select';
        return view('it_dt.framework.components.select', compact('page', 'subPage'));
    }
    
    public function cardNav()
    {
        $page = 'components';
        $subPage = 'cardNav';
        return view('it_dt.framework.components.cardAndNav', compact('page', 'subPage'));
    }
    
    public function accordion()
    {
        $page = 'components';
        $subPage = 'accordion';
        return view('it_dt.framework.components.accordion', compact('page', 'subPage'));
    }
    
    public function upload()
    {
        $page = 'components';
        $subPage = 'upload';
        return view('it_dt.framework.components.upload', compact('page', 'subPage'));
    }
    
    public function modal()
    {
        $page = 'components';
        $subPage = 'modal';
        return view('it_dt.framework.components.modal', compact('page', 'subPage'));
    }
}
