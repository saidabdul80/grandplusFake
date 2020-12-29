<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\tbl_programmes;
 
class departmentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd('$programmes');
        $programmes = tbl_programmes::get();
        return view('website.departments',['programmes'=>$programmes]);
    }
}
