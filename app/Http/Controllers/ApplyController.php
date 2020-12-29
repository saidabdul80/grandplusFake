<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\tbl_programmes;
use \App\tbl_applicants;
use \App\tbl_sessions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class ApplyController extends Controller
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
       $programmes = tbl_programmes::orderBy('department_id', 'ASC')->get();        
        return view('website.apply', ['programmes'=>$programmes]);
    }

    public function studentApply(Request $request)
    {
        
        //dd($request('_token'));
        $programmes = tbl_programmes::orderBy('department_id', 'ASC')->get();
        $csession = tbl_sessions::where('current','=','1')->first();

        $ctable = tbl_applicants::where('email_address', '=', $request->get('email_address'))->get();

        if(count($ctable) > 0) {
        
            return view('website.apply', ['programmes'=>$programmes, 'error_msg'=>'Email Already Exist']);            

        }else{
                $date = date('Y-m-d h:m');
                $cyear = explode('/', $csession->session)[0];                
                $save = new tbl_applicants();       
                $save->programme_id = $request->get('programme_id');
                $save->session = $csession->session;
                $save->date_time_apply = $date;
                $save->year = $cyear;
                $save->surname = $request->get('surname');
                $save->first_name = $request->get('first_name');
                $save->other_name = $request->get('other_name');
                $save->phone_number = $request->get('phone_number');
                $save->email_address = $request->get('email_address');
                $save->password = Hash::make($request->get('password'));
                $save->remember_token = $request->get( '_token' );
                $save->save();    

                if (auth()->guard('applicants')->attempt( array (
                        'email_address' => $request->get ('email_address'),
                        'password' =>$request->get('password')
                ) )) {
                    $id = tbl_applicants::where('email_address', '=', $request->get('email_address'))->first()->id;
                    session ( [ 
                            'id' => $id, 
                            'email' => $request->get ('email_address'), 
                            'surname' => $request->get ('surname'),
                            'first_name' => $request->get ('first_name') 
                    ] );
                    return redirect('/application')->with('status', 'Profile updated!');
                }else{
                    Session::flash ( 'message', "Invalid Credentials , Please login." );
                    return Redirect::back ();
                }
                // return redirect ( '/login' )->with('status', 'Profile updated!');;
        }
    }

}

     