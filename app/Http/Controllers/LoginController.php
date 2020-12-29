<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_applicants;
class LoginController extends Controller
{


    public function ApplicantLogin()
    {
        return view('application.login');
    	
    }

    public function ApplicantLoginAuth(Request $request)
    {
    	  if (auth()->guard('applicants')->attempt( array (
                        'application_number' => $request->get('application_number'),
                        'password' =>$request->get('password')
                ) )) {
    	  			$app = tbl_applicants::where('application_number','=', $request->get('application_number'))->first();
                    session ( [ 
                            'id' => $app->id, 
                            'application_number' => $app->application_number, 
                            'email' => $app->email_address, 
                            'surname' => $app->surname,
                            'first_name' => $app->first_name, 
                            'other_name' => $app->other_name 
                    ] );
                    return redirect('/application')->with('status', 'Profile updated!');
                }else{
                    //Session::flash ( 'message', "Invalid Credentials , Please login." );
                	return redirect()->route('login')->with('errors', 'Invalid Credentials');                   
                }
    }
}
