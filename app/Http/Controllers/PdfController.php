<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    //
    public function instruction()
    {
    	return view('application.payment');
    }
}
