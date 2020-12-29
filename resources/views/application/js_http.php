<?php 
include('classes_application.php');
	include('session_control_application.php');

if(isset($_POST['action'])){
		switch($_POST['action']){
			case 'load_lga':
				load_lga($db);
			break;
			case 'load_add_result':
				load_add_result($db,$session_applicant_id);
			break;
			case 'add_result':
				add_result($db,$session_applicant_id);
			break;
			case 'remove_result':
				remove_result($db,$session_applicant_id);
			break;
			case 'create_result':
				create_result($db,$appObj,$session_applicant_id);
			break;
			case 'total_result_added':
				total_result_added($db,$session_applicant_id);
			break;
			case 'update_biodata':
				update_biodata($db,$session_applicant_id);
			break;
			case 'load_biodata_overview':
				load_biodata_overview($db,$appObj,$session_applicant_id);
			break;
			case 'print_status':
				print_status($db,$appObj,$session_applicant_id);
			break;
			case 'load_result_table':
				load_result_table($db,$appObj,$session_applicant_id);
			break;
			
			
			
			
			
		
		}
}

function load_result_table($db,$appObj,$session_applicant_id){
	$applicant_by_id = $appObj->applicant_by_id($session_applicant_id);
				$result_type_two = $applicant_by_id['result_type_two'];
				$result_type_one = $applicant_by_id['result_type_one'];
				$result_type_one_year = $applicant_by_id['result_type_one_year'];
				$result_type_two_year = $applicant_by_id['result_type_two_year'];
				$result_one_examination_number = $applicant_by_id['result_one_examination_number'];
				$result_two_examination_number = $applicant_by_id['result_two_examination_number'];
				
				$sn=0;
				if(!empty($result_type_one)){
					?>
						<tr>
						<td><?php echo ++$sn;?></td>
						<td><?= $result_type_one; ?></td>
						<td><?= $result_type_one_year; ?></td>
						<td><?= $result_one_examination_number; ?></td>
						<td>
							<button class='btn btn-sm btn-info'><i class='fa fa-edit'></i></button>
							<button class='btn btn-sm btn-primary' onclick="load_add_result('<?= $result_type_one; ?>','<?= $result_type_one_year;?>',1)">Add Result</i></button>
						</td>
					</tr>
				<?php	
				}
				if(!empty($result_type_two)){
					?>
						<tr>
						<td><?php echo ++$sn;?></td>
						<td><?= $result_type_two; ?></td>
						<td><?= $result_type_two_year; ?></td>
						<td><?= $result_two_examination_number; ?></td>
						<td>
							<button class='btn btn-sm btn-info'><i class='fa fa-edit'></i></button>
							<button class='btn btn-sm btn-primary' onclick="load_add_result('<?= $result_type_two; ?>','<?= $result_type_two_year;?>',2)">Add Result</i></button>
						</td>
					</tr>
				<?php
				}
}

function print_status($db,$appObj,$session_applicant_id){
	
		
			$applicant_by_id = $appObj->applicant_by_id($session_applicant_id);
				$biodata_status = $applicant_by_id['biodata_status'];
				$result_status = $applicant_by_id['result_status'];
				$passport_dd = $applicant_by_id['passport'];
				
				if($result_status == '1'  && $biodata_status=='1' && !empty($passport_dd)){
					echo '<form action="desktop.php" method="post">
						<p class="text-center"><button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Print Acknowledgement Slip</button></p>
					</form>
					';
				}else{
					echo 'No';
				}
				
				
}

function load_biodata_overview($db,$appObj,$session_applicant_id){
	error_reporting(0);
	include('classes_application.php');
	include('session_control_application.php');
	include_once('biodata_overview.php');
}

function update_biodata($db,$session_applicant_id){
		$gender = htmlspecialchars(strip_tags($_POST['gender']));
		$marital_status = htmlspecialchars(strip_tags($_POST['marital_status']));
		$date_of_birth = htmlspecialchars(strip_tags($_POST['date_of_birth']));
		$state_id = htmlspecialchars(strip_tags($_POST['state_id']));
		$lga_id = htmlspecialchars(strip_tags($_POST['lga_id']));
		$sponsor_type = htmlspecialchars(strip_tags($_POST['sponsor_type']));
		$sponsor_name = htmlspecialchars(strip_tags($_POST['sponsor_name']));
		$address = htmlspecialchars(strip_tags($_POST['address']));
		$nok_name = htmlspecialchars(strip_tags($_POST['nok_name']));
		$nok_relationship = htmlspecialchars(strip_tags($_POST['nok_relationship']));
		$nok_phone_number = htmlspecialchars(strip_tags($_POST['nok_phone_number']));
		
	$sql = "UPDATE tbl_applicants SET sex=:gender, date_of_birth=:date_of_birth, marital_status=:marital_status, nok_relationship=:nok_relationship,
				nok_phone_number=:nok_phone_number, nok_name=:nok_name, sponsor_name=:sponsor_name, sponsor_type=:sponsor_type, address=:address,
				lga_id=:lga_id, state_id=:state_id, biodata_status='1' WHERE id=:id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam('gender',$gender);
            $stmt->bindParam('marital_status',$marital_status);
            $stmt->bindParam('date_of_birth',$date_of_birth);
            $stmt->bindParam('state_id',$state_id);
            $stmt->bindParam('lga_id',$lga_id);
            $stmt->bindParam('sponsor_type',$sponsor_type);
            $stmt->bindParam('sponsor_name',$sponsor_name);
            $stmt->bindParam('address',$address);
            $stmt->bindParam('nok_name',$nok_name);
            $stmt->bindParam('nok_relationship',$nok_relationship);
            $stmt->bindParam('nok_phone_number',$nok_phone_number);
            $stmt->bindParam('id',$session_applicant_id);
            $execute_return = $stmt->execute();
            if($execute_return){
               
				$error_message ='1';
            }else{
				
				 $error_message = '<div class="alert alert-danger">Oops! Something went wrong</div>';
			}
			
			echo $error_message;
}


function total_result_added($db,$session_applicant_id){
	$check = $db->prepare("select * from tbl_applicant_results where applicant_id='$session_applicant_id'");
	$check->execute();
	
	if($check->rowCount() >=5){
		$stmt = $db->prepare("update tbl_applicants set result_status='1' where id=:id");
	}else{
		$stmt = $db->prepare("update tbl_applicants set result_status='0'  where id=:id");			
	}
	$stmt->bindParam(':id',$session_applicant_id, PDO::PARAM_STR);
	$stmt->execute();
	echo $check->rowCount();
	
}

function create_result($db,$appObj,$session_applicant_id){
	if(isset($_POST['exam_year'])){
		$exam_type = $_POST['exam_type'];
		$exam_year = $_POST['exam_year'];
		$exam_number = $_POST['exam_number'];
		
			$applicant_by_id = $appObj->applicant_by_id($session_applicant_id);
				$result_type_two = $applicant_by_id['result_type_two'];
				$result_type_one = $applicant_by_id['result_type_one'];
				$result_type_one_year = $applicant_by_id['result_type_one_year'];
				$result_type_two_year = $applicant_by_id['result_type_two_year'];
				$result_one_examination_number = $applicant_by_id['result_one_examination_number'];
				$result_two_examination_number = $applicant_by_id['result_two_examination_number'];
		
		if(!empty($result_type_one) && !empty($result_type_two)){
			echo '<div class="alert alert-danger"><strong>ERROR! </strong>Oops! You cannot add more than two results..</div>';
		}else {
			 if(empty($result_type_one)){
				 
				 if($result_type_two == $exam_type && $exam_year ==$result_type_two_year ){
					 echo 'The result cannot be same with the second result';
					 exit;
				 }else{
					$stmt = $db->prepare("update tbl_applicants set result_type_one=:exam_type , result_type_one_year=:exam_year, result_one_examination_number=:exam_number where id=:id");
					$stmt->bindParam(':exam_type',$exam_type, PDO::PARAM_STR);
					$stmt->bindParam(':exam_year',$exam_year, PDO::PARAM_STR);
					$stmt->bindParam(':id',$session_applicant_id, PDO::PARAM_STR);
					$stmt->bindParam(':exam_number',$exam_number, PDO::PARAM_STR);
					$stmt->execute();
					$result_type_one = $exam_type;
					$result_type_one_year = $exam_year; 
					echo '1';
					exit;
				 }
				
			}else if(empty($result_type_two)){
				if($result_type_one == $exam_type && $exam_year ==$result_type_one_year ){
					 echo 'The result cannot be same with the first result';
					 exit;
				 }else{
					 $stmt = $db->prepare("update tbl_applicants set result_type_two=:exam_type , result_type_two_year=:exam_year, result_two_examination_number=:exam_number where id=:id");
					$stmt->bindParam(':exam_type',$exam_type, PDO::PARAM_STR);
					$stmt->bindParam(':exam_year',$exam_year, PDO::PARAM_STR);
					$stmt->bindParam(':id',$session_applicant_id, PDO::PARAM_STR);
					$stmt->bindParam(':exam_number',$exam_number, PDO::PARAM_STR);
					$result_type_two = $exam_type;
					$result_type_two_year = $exam_year;
					$stmt->execute();
					
					echo '1';
					exit;
				 }
				
			}else{
				echo '<div class="alert alert-danger"><strong>ERROR! </strong>Oops! Something went wrong...</div>';
			}
		}
	}
}
function remove_result($db,$session_applicant_id){
	$id=$_POST['id'];
	
	$remove = $db->prepare("DELETE FROM tbl_applicant_results WHERE applicant_id='$session_applicant_id' and id='$id'");
	if($remove->execute()){
		echo '1';
	}else{
		echo 'Failed';
	}
}

function add_result($db,$session_applicant_id){
	$exam_type=$_POST['exam_type'];
   $exam_year=$_POST['exam_year'];
   $subject=$_POST['subject'];
    $grade=$_POST['grade'];
    $result_cat=$_POST['result_cat'];
	$tr ='';
	$check = $db->prepare("select * from tbl_applicant_results where applicant_id='$session_applicant_id' and subject_id='$subject'");
	$check->execute();
		if($check->rowCount() <=0){
			$stmt =$db->prepare("INSERT INTO tbl_applicant_results (applicant_id,exam_type,exam_year,subject_id,grade,result_cat) VALUES (:applicant_id,:exam_type,:exam_year,:subject_id,:grade,:result_cat)");
			$stmt->bindParam(':exam_type',$exam_type, PDO::PARAM_STR);
			$stmt->bindParam(':exam_year',$exam_year, PDO::PARAM_STR);
			$stmt->bindParam(':subject_id',$subject, PDO::PARAM_STR);
			$stmt->bindParam(':grade',$grade, PDO::PARAM_STR);
			$stmt->bindParam(':result_cat',$result_cat, PDO::PARAM_STR);
			$stmt->bindParam(':applicant_id',$session_applicant_id, PDO::PARAM_STR);
			$stmt->execute();
			$check = $db->prepare("select r.id,r.grade,r.exam_type,r.exam_year,s.subject_name from tbl_applicant_results r inner join tbl_subjects s on r.subject_id=s.id where r.applicant_id='$session_applicant_id' and r.exam_type='$exam_type' and r.exam_year='$exam_year'");
			$check->execute();
			$rows=$check->fetchAll(PDO::FETCH_ASSOC);
				foreach($rows as $key=>$result){
					$tr .='
					<tr id="tr'.$result["id"].'">
						<td>'.$result["subject_name"].'</td>
						<td class="text-center">'.$result["grade"].'</td>
						<td class="text-center">'.$exam_type.'</td>
						<td class="text-center">'.$exam_year.'</td>
						<td class="text-center"><button class="btn btn-sm btn-danger" onclick="remove_result('.$result["id"].')">Remove</button></td>
					</tr>
					';
				}
				
				echo $tr;
			
		}else{
			echo '0';
		}
	
}


function load_add_result($db,$session_applicant_id){
	$exam_type=$_POST['one'];
   $exam_year=$_POST['two'];
   $result_cat=$_POST['result_cat'];
   
   if($result_cat == 1){
	   $text = "You're adding result to Result One";
   }else{
	    $text = "You're adding result to Result Two";
   }
   
   
?>
	
	 <div class="card " style="padding:20px">
	 
	 <p><a href="#" onclick="close_load_result()"> <i class="fa fa-arrow-left"></i> Go Back</a></p>
		<div class="well well-sm alert alert-info"> 
			<?= $text; ?><br>
			Result Type: <strong><?= $exam_type; ?></strong><br>
			Result YEAR: <strong><?= $exam_year; ?></strong><br>
			<br> Select the subject and the grade obtained, then click on ADD RESULT to add result to the selected result category. Also click on remove button to 
			delete the result if required.
			
	</div>
	 <div class="row ">
			 <div class="col-md-4">
			  <div class="form-group">
				<select class="form-control" id="subject">
				
					<?php echo subject_options($db); ?>
					</select>
			  </div>
		  </div>
		   <div class="col-md-4">
		  <div class="form-group">
			<select class="form-control" id="grade">
				<?php  echo grades_option(); ?>
			</select>
		  </div>
		  </div>
		  <div class="col-md-4">
		  <div class="form-group">
			<button class="btn btn-info" type="submit" onclick="add_result('<?= $exam_type; ?>','<?= $exam_year; ?>', <?= $result_cat;?>)">Add Result</button>
		  </div>
		  </div>
		 </div>
		 <p id="feedback"></p>
		  <table id="table_id" class="display" style="font-size:12px;background:white">
				<thead>
					<tr style="">
						<td>SUBJECT</td>
						<td class="text-center">GRADE</td>
						<td class="text-center">EXAM TYPE</td>
						<td class="text-center">YEAR OF EXAM</td>
						<td></td>
					</tr>
					</thead>
					<tbody id="result_rows">
					<?php 
					$tr='';
						$check = $db->prepare("select r.id,r.grade,r.exam_type,r.exam_year,s.subject_name from tbl_applicant_results r inner join tbl_subjects s on r.subject_id=s.id where r.applicant_id='$session_applicant_id' and r.exam_type='$exam_type' and r.exam_year='$exam_year'");
						$check->execute();
						$rows=$check->fetchAll(PDO::FETCH_ASSOC);
							foreach($rows as $key=>$result){
								$tr .='
									<tr id="tr'.$result["id"].'">
									<td>'.$result["subject_name"].'</td>
									<td class="text-center">'.$result["grade"].'</td>
									
									<td class="text-center">'.$result["exam_type"].'</td>
									<td class="text-center">'.$result["exam_year"].'</td>
									<td class="text-center"><button class="btn btn-sm btn-danger" onclick="remove_result('.$result["id"].')">Remove</button></td>
									
								</tr>
								';
							}
							
							echo $tr;
					?>
					</tbody>
		  </table>
	</div>
<?php
}

function load_lga($db){
$state_id = $_POST['token'];
			$option='';
	$distinct_ward = $db->prepare("select * from tbl_lga where state_id=:state_id");
	$distinct_ward->bindParam(':state_id',$state_id);
		if($distinct_ward->execute()){
			$option .= '<option value="">Select LGA</option>';
			while($wards = $distinct_ward->fetch(PDO::FETCH_ASSOC)){
				$id = $wards['id'];
				$name = $wards['name'];
				$option .= '<option value="'.$id.'">'.$name.'</option>';
			}
		}
		echo $option;	
}

?>