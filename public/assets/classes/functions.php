<?php

function resize_png_image($file,$source_properties_zero,$source_properties_one,$image_name){
	$image_resource_id = imagecreatefrompng($file);
	$target_width =150;
	$target_height =150;
	$target_layer=imagecreatetruecolor($target_width,$target_height);
	imagecopyresampled($target_layer,$image_resource_id,0,0,0,0,$target_width,$target_height, $source_properties_zero,$source_properties_one);
	imagepng($target_layer,'img_data/'.$image_name);

}


function resize_jpg_image($file,$source_properties_zero,$source_properties_one,$image_name){
	$image_resource_id = imagecreatefromjpeg($file);
	$target_width =150;
	$target_height =150;
	$target_layer=imagecreatetruecolor($target_width,$target_height);
	imagecopyresampled($target_layer,$image_resource_id,0,0,0,0,$target_width,$target_height, $source_properties_zero,$source_properties_one);
	imagejpeg($target_layer,'img_data/'.$image_name);

}


function decode_png_image($image_data,$enrolment_number){
	$image = str_replace('data:image/png;base64,', '', $image_data);
	$image = str_replace(' ', '+', $image);
	$data = base64_decode($image);
	$enrolee_image_link = 'img_data/'.strtolower($enrolment_number).'.jpg';
	$success = file_put_contents($enrolee_image_link, $data);

	return $enrolee_image_link;
}

function decode_jpg_image($image_data,$enrolment_number){
	$image = str_replace('data:image/jpg;base64,', '', $image_data);
	$image = str_replace(' ', '+', $image);
	$data = base64_decode($image);
	$enrolee_image_link = 'img_data/'.strtolower($enrolment_number).'.jpg';
	$success = file_put_contents($enrolee_image_link, $data);

	return $enrolee_image_link;
}

function getAge($date_of_birth){
				$current_date = @date('Y-m-d');
				$diff = abs(strtotime($current_date) - strtotime($date_of_birth));
				$one_minute = 60;
				$one_hour = $one_minute * 60;
				$one_day = $one_hour * 24;
				$one_year = $one_day * 365;
				$age = floor($diff / $one_year);
				return $age;
	}

	function alert($type,$title,$message){

		    if(strtolower(trim($type))=='error'){
		        $type='danger';
            }
		    return '<div class="alert alert-'.$type.' alert-dismissible  show" role="alert">
          <strong>'.$title.'!</strong> '.$message.'.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
    }


function number_applicant_result($db,$id){
	$get_lga_by_id_stmt = $db->prepare("select * from tbl_applicant_results where applicant_id=?  and status='1'");
	$get_lga_by_id_stmt->execute(array($id));
		return $get_lga_by_id_stmt->rowCount();
}


function get_state_by_id($db,$id){
	$get_lga_by_id_stmt = $db->prepare("select * from tbl_states where id=?  LIMIT 1");
	$get_lga_by_id_stmt->execute(array($id));
		if($get_lga_by_id_stmt->rowCount() > 0){
			$row = $get_lga_by_id_stmt->fetch(PDO::FETCH_ASSOC);
			return $name = $row['name'];
		}

		return 'N/A';
}


function get_lga_by_id($db,$id){
	$get_lga_by_id_stmt = $db->prepare("select * from tbl_lga where id=?  LIMIT 1");
	$get_lga_by_id_stmt->execute(array($id));
		if($get_lga_by_id_stmt->rowCount() > 0){
			$row = $get_lga_by_id_stmt->fetch(PDO::FETCH_ASSOC);
			return $name = $row['name'];
		}

		return 'N/A';
}
function get_ward_by_id($db,$id){
	$get_lga_by_id_stmt = $db->prepare("select * from ward where id=? LIMIT 1");
	$get_lga_by_id_stmt->execute(array($id));
		if($get_lga_by_id_stmt->rowCount() > 0){
			$row = $get_lga_by_id_stmt->fetch(PDO::FETCH_ASSOC);
			return $ward = $row['ward'];
		}

		return $id;
}


function subject_options($db){
	$option='<option value=""> Select Subject </option>';
	$get_lga_by_id_stmt = $db->prepare("select * from tbl_subjects where status='1' ");
	$get_lga_by_id_stmt->execute();
		if($get_lga_by_id_stmt->rowCount() > 0){
			while($row = $get_lga_by_id_stmt->fetch(PDO::FETCH_ASSOC)){
				$subject_name = $row['subject_name'];
				$id = $row['id'];
				$option .='<option value="'.$id.'">'.$subject_name.'</option>';
			}
			 
		}

		return $option;
}


function grades_option(){
	return '
		<option value=""> Select Grade </option>
		<option value="A1">A1</option>
		<option value="B2">B3</option>
		<option value="B3">B3</option>
		<option value="C4">C4</option>
		<option value="C5">C5</option>
		<option value="C6">C6</option>
		<option value="D7">D7</option>
		<option value="E8">E8</option>
		<option value="F9">F9</option>
	';
}

function all_programmes_select_options($db){
	$option='';
	$get_lga_by_id_stmt = $db->prepare("select * from tbl_programmes where status='1'");
	$get_lga_by_id_stmt->execute();
		if($get_lga_by_id_stmt->rowCount() > 0){
			$rows = $get_lga_by_id_stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach($rows as $key=> $row){
				$id = $row['id'];
				$programme_name = $row['programme_name'];
				$option .='<option value="'.$id.'">'.$programme_name.'</option>';
			}
		}
		
	return $option;
}

function current_session($db){
	$get_lga_by_id_stmt = $db->prepare("select * from tbl_sessions where current='1'  LIMIT 1");
	$get_lga_by_id_stmt->execute();
		if($get_lga_by_id_stmt->rowCount() > 0){
			$row = $get_lga_by_id_stmt->fetch(PDO::FETCH_ASSOC);
			return  $row;
		}

		return array();
}

function session_by_id($db,$id){
	$get_lga_by_id_stmt = $db->prepare("select * from tbl_sessions where id=?  LIMIT 1");
	$get_lga_by_id_stmt->execute(array($id));
		if($get_lga_by_id_stmt->rowCount() > 0){
			$row = $get_lga_by_id_stmt->fetch(PDO::FETCH_ASSOC);
			return  $row;
		}

		return array();
}

function application_by_id($db,$id){
	$get_lga_by_id_stmt = $db->prepare("select * from tbl_applications where id=?  LIMIT 1");
	$get_lga_by_id_stmt->execute(array($id));
		if($get_lga_by_id_stmt->rowCount() > 0){
			$row = $get_lga_by_id_stmt->fetch(PDO::FETCH_ASSOC);
			return  $row;
		}

		return array();
}
?>
