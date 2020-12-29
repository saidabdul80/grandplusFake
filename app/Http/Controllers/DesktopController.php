<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesktopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:applicants');
    }
    public function index()
    {
        return view('application.desktop');
    }
    public function portal($sect)
    {
        session(['portals' => true]);      
        $sect =  $sect;
        return view('application.portals',['sect'=>$sect]);
    	
    }
}
