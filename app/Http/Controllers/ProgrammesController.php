<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\tbl_programmes;
use \App\tbl_departments;
use \DB;

class ProgrammesController extends Controller
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
        
        function resortObject($parent, $child, $fkey, $pname, $cname){            
            $result = array();
            $c=0; $lid;
             foreach ($parent as $key => $object) { 
                    foreach (json_decode(json_encode($object)) as $k => $value1) {                                                           
                    $result[$c][$k] = $value1;
                    }                                   
                    $i = 0;
                    $lid = $object->id;
                    foreach ($child as $value) {
                        if($lid == $value->$fkey) {
                            if ($i == 0) {
                                $result[$c][$cname] = array();  
                                //array_push($result[$c][$cname], $value);
                                $result[$c][$cname][$i] = $value;
                                $result[$c][$cname][$i] = $result[$c][$cname][$i];
                                
                                $i++;                                  
                            }else{
                                $result[$c][$cname] = array();                                  
                                $result[$c][$cname][$i] = $value;
                              //  array_push($result[$c][$cname], $value);
                                $result[$c][$cname][$i] =  $result[$c][$cname][$i];
                                $i++;                                  

                            }                            
                        }
                    }

                    
                    $c++;
                                
             }
             return $result;
         }
       $departments = tbl_departments::get();
       $programmes = tbl_programmes::get();
//       $programmes = tbl_programmes::orderBy('department_id', 'ASC')->get();

        //$programmes = DB::table('tbl_departments', 'd')->join('tbl_programmes','tbl_programmes.department_id','=','d.id')->orderBy('d.department_name', 'ASC')->get();
        //dd($programmes);
       //$result = resortObject($departments, $programmes, 'department_id', 'program', 'programmes');
        
        $a = '0';
    //dd($result);
        return view('website.programmes', ['programmes'=>$programmes, 'departments'=>$departments]);
    }
}
