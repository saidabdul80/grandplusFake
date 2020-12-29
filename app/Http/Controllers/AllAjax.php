<?php

namespace App\Http\Controllers;
use \App\tbl_applicants;
use \App\result_allowed;
use \App\tbl_applicant_results;
use Illuminate\Http\Request;
use \DB;
use \Mavinoo\Batch\BatchFacade;
use Illuminate\Support\Facades\Validator;
class AllAjax extends Controller
{
 	public function resultUpload(Request $request)
 	{
 		$exam_year = $request->get('exam_year');
 		$id = $request->get('id');
 		$exam_type = $request->get('exam_type');
 		$exam_number = $request->get('exam_number');
 		$applicant = tbl_applicants::where('id','=',$id)->first();
 		

	    //return response()->json(['success'=>$id]);                         		
	 	if ($applicant->result_type_one =='' ) {
	 			$save = tbl_applicants::find($id); 			
	 			$save->result_type_one = $exam_type;
	 			$save->result_type_one_year = $exam_year;
	 			$save->result_one_examination_number = $exam_number;
	 			$save->save();

	 			for ($i=1; $i < 10 ; $i++) { 
	 				$save2 = new tbl_applicant_results;
	 				$save2->applicant_id = $id;
	 				$save2->exam_type = $exam_type;	
	 				$save2->exam_year = $exam_year;	
	 				$save2->result_cat = 0;	
	 				$save2->save();
	 			}

	        	return response()->json(['success'=>200]);                         		
	 		}

	 		if($applicant->result_type_two == '' ){
	 			$save = tbl_applicants::find($id); 			
	 			$save->result_type_two = $exam_type;
	 			$save->result_type_two_year = $exam_year;
	 			$save->result_two_examination_number = $exam_number;
	 			$save->save();
	 			for ($i=1; $i < 10 ; $i++) { 
	 				$save2 = new tbl_applicant_results;
	 				$save2->applicant_id = $id;
	 				$save2->exam_type = $exam_type;	
	 				$save2->exam_year = $exam_year;	
	 				$save2->result_cat = 1;	
	 				$save2->save();
	 			}
	        	return response()->json(['success'=>200]);                         			 			
	 		}
 		}

 

 	public function addResult()
 	{
 		return view::make('application.add_result')->render();
 	}
 	public function savebio(Request $request)
 	{
		   
 		/*
 		$email = $request->get('email');
 		tbl_applicants::where('email_address','=','$email')->first();
 		if (!is_null($email)) {
 			return response()->json(['success'=>201]);
 		}else{*/
 			if(!empty($request->get('phone')) && !empty($request->get('gender')) && !empty($request->get('state')) && !empty($request->get('dob')) && !empty($request->get('addr')) && !empty($request->get('status')) ) {
 				$result_status = tbl_applicants::find(session('id'));
				$result_status->biodata_status = '1';
				$result_status->save();
 			}
 			
 			$save = tbl_applicants::find(session('id'));
 			$save->phone_number = $request->get('phone');
 			$save->sex = $request->get('gender');
 			$save->marital_status = $request->get('status');
 			$save->state_id = $request->get('state');
 			$save->lga_id = $request->get('lga');
 			/*$save->email_address = $request->get('email');*/
 			$save->address = $request->get('addr');
 			$save->sponsor_type = $request->get('sponsortype');
 			$save->sponsor_name = $request->get('sponsorname');
 			$save->nok_name = $request->get('nok');
 			$save->nok_phone_number = $request->get('nokp');
 			$save->nok_relationship = $request->get('nokr');
 			$save->date_of_birth = $request->get('dob');
 			$save->save();
	    	return response()->json(['success'=>200]);                         			 				 			

 		//}
 		
 	}
 	public function uploadImage(Request $request)
 	{

		$app = tbl_applicants::find(session('id'))->first();

 		$validate = Validator::make($request->all(), [
	        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
	    ]);

 		if ($validate->fails()) {
        	return view('application.desktop')->with('errors', 'invalid image'); 			
 		}else{ 			
	    	$imageName = 'passport_'.str_replace(' ', '', str_replace('/', '_', $app->application_number)).'.'.request()->image->getClientOriginalExtension();    
		
		    request()->image->move(public_path('/img/applicants/'), $imageName);
		 	$save = tbl_applicants::find(session('id'));
		 	$save->passport = $imageName;
		 	$save->save();
        	return view('application.desktop')->with('success', 'image uploaded success'); 			

 		} 
	}
 	public function saveResult(Request $request)
 	{
 		$exam_number1 = $request->get('e1');
 		$exam_number2 = $request->get('e2');
 		$exam_year1 = $request->get('ey1');
 		$exam_year2 = $request->get('ey2');
 		$exam_type1 = $request->get('et1');
 		$exam_type2 = $request->get('et2');

 		$subjectone = $request->get('subjectone');
 		$subjecttwo = $request->get('subjecttwo');
 		$gradeone   = $request->get('gradeone');
 		$gradetwo   = $request->get('gradetwo');
 		$id = $request->get('id');


 		$save = tbl_applicants::find($id); 
 		$save->result_type_one = $exam_type1;
		$save->result_type_one_year = $exam_year1;
		$save->result_one_examination_number = $exam_number1;		
 		$save->result_type_two = $exam_type2;
		$save->result_type_two_year = $exam_year2;
		$save->result_two_examination_number = $exam_number2;
		$save->save();

		$find1 = tbl_applicant_results::where(['applicant_id'=>$id, 'result_cat'=>'0'])->orderBy('id', 'ASC')->get();
		$find2 = tbl_applicant_results::where(['applicant_id'=>$id, 'result_cat'=>1])->get();
	  //  return response()->json(['success'=>$find2]);       
	    $result = new tbl_applicant_results;	
	    $data1 = array();$data2 = array();
	    $s = 0;		
	    if (!is_null($find1)) {
	    	foreach ($find1 as  $value) {
		    	array_push($data1, 
		    		[
		    			'id' => $value->id,
		    			'subject_id' => $subjectone[$s],
		    			'grade' => $gradeone[$s]
		    		]

		    	);
		    	$s++;
		    }
	    }
	    $s = 0;		
	    if (!is_null($find2)) {
	    	foreach ($find2 as  $value1) {
		    	array_push($data2, 
		    		[
		    			'id' => $value1->id,
		    			'subject_id' => $subjecttwo[$s],
		    			'grade' => $gradetwo[$s]
		    		]

		    	);
		    	$s++;
		    }
	    }

		$index = 'id';
		BatchFacade::update($result, $data1, $index);                  			 				 			
		if (!is_null($find2)) {
			BatchFacade::update($result, $data2, $index);                  			 				 							
		}
		$result_status = tbl_applicants::find(session('id'));
		$result_status->result_status = '1';
		$result_status->save();


		/*
		$s = 1;		
		foreach ($find1 as $value) {
			$save = tbl_applicant_results::find($value->id);
			$save->subject_id = $subjectone['t'.$s];
			$save->grade = $gradeone['g'.$s];
			$save->save();
			$s++;
	    	//return response()->json(['success'=>$subjectone]);                         			 				 			
		}

		$s = 1;
		foreach ($find2 as $value1) {
			$save1 = tbl_applicant_results::find($value1->id);
			$save1->subject_id = $subjecttwo['t'.$s];
			$save1->grade = $gradetwo['g'.$s];
			$save1->save();
			$s++;
		}*/
	    return response()->json(['success'=>200]);                         			 				 			


		/*foreach ($find1 as $value) {
			array_push($ids, $value->id);
			$s++;
		}
	    //return response()->json(['success'=>$gradeone['g1']]);                         			 				 			

		$save = DB::table('tbl_applicant_results')->whereIn('id',$ids)->update([
			'subject_id' => intval($subjectone['t1']),
			'subject_id' => $subjectone['t2'],
			'subject_id' => $subjectone['t3'],
			'subject_id' => $subjectone['t4'],
			'subject_id' => $subjectone['t5'],
			'subject_id' => $subjectone['t6'],
			'subject_id' => $subjectone['t7'],
			'subject_id' => $subjectone['t8'],
			'subject_id' => $subjectone['t9']
		]); 
		$save = DB::table('tbl_applicant_results')->whereIn('id',$ids)->update([
			'grade' => $gradeone['g1'],
			'grade' => $gradeone['g2'],
			'grade' => $gradeone['g3'],
			'grade' => $gradeone['g4'],
			'grade' => $gradeone['g5'],
			'grade' => $gradeone['g6'],
			'grade' => $gradeone['g7'],
			'grade' => $gradeone['g8'],
			'grade' => $gradeone['g9']			

		]); 

		$find2 = tbl_applicant_results::where(['applicant_id'=>$id, 'result_cat'=>'0'])->get();
		$s = 1;
		$ids =[];
		foreach ($find2 as $value) {
			array_push($ids, $value->id);
			$s++;
		}
		$save = DB::table('tbl_applicant_results')->whereIn('id',$ids)->update([
			'subject_id' => $subjecttwo['t1'],
			'subject_id' => $subjecttwo['t2'],
			'subject_id' => $subjecttwo['t3'],
			'subject_id' => $subjecttwo['t4'],
			'subject_id' => $subjecttwo['t5'],
			'subject_id' => $subjecttwo['t6'],
			'subject_id' => $subjecttwo['t7'],
			'subject_id' => $subjecttwo['t8'],
			'subject_id' => $subjecttwo['t9']
			
		]); 

		$save = DB::table('tbl_applicant_results')->whereIn('id',$ids)->update([
			'grade' => $gradetwo['g1'],
			'grade' => $gradetwo['g2'],
			'grade' => $gradetwo['g3'],
			'grade' => $gradetwo['g4'],
			'grade' => $gradetwo['g5'],
			'grade' => $gradetwo['g6'],
			'grade' => $gradetwo['g7'],
			'grade' => $gradetwo['g8'],
			'grade' => $gradetwo['g9']
			

		]);
	    return response()->json(['success'=>200]);                         			 				 			
*/
 	}

}
