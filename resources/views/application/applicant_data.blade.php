<?php 
$form_fee = $applicant_by_id['form_fee'];
				$surname = ucfirst(strtolower($applicant_by_id['surname']));
				$first_name = ucfirst(strtolower($applicant_by_id['first_name']));
				$other_name = ucfirst(strtolower($applicant_by_id['other_name']));
				$phone_number = $applicant_by_id['phone_number'];
				$email_address = $applicant_by_id['email_address'];
				$ss_email_address = $applicant_by_id['email_address'];
				$application_number = $applicant_by_id['application_number'];
				$programme_id = $applicant_by_id['programme_id'];
				$biodata_status = $applicant_by_id['biodata_status'];
				$is_cleared = $applicant_by_id['is_cleared'];
				$is_not_cleared_reason = $applicant_by_id['is_not_cleared_reason'];
				$result_status = $applicant_by_id['result_status'];
				$print_ack_slip = $applicant_by_id['print_ack_slip'];
				$passport_dd = $applicant_by_id['passport'];
				$sex_dd = $applicant_by_id['sex'];
				$marital_status = $applicant_by_id['marital_status'];
				$date_of_birth_dd = $applicant_by_id['date_of_birth'];
				$state_id = $applicant_by_id['state_id'];
				$lga_id = $applicant_by_id['lga_id'];
				$address = $applicant_by_id['address'];
				$sponsor_name = $applicant_by_id['sponsor_name'];
				$sponsor_type = $applicant_by_id['sponsor_type'];
				$nok_name = $applicant_by_id['nok_name'];
				$nok_phone_number = $applicant_by_id['nok_phone_number'];
				$nok_relationship = $applicant_by_id['nok_relationship'];
				$result_type_two = $applicant_by_id['result_type_two'];
				$result_type_one = $applicant_by_id['result_type_one'];
				$result_type_one_year = $applicant_by_id['result_type_one_year'];
				$result_type_two_year = $applicant_by_id['result_type_two_year'];
				$result_one_examination_number = $applicant_by_id['result_one_examination_number'];
				$result_two_examination_number = $applicant_by_id['result_two_examination_number'];
				$name = $surname.' '.$first_name.' '.$other_name;
				
				if(file_exists("../img/applicants/$passport_dd")==1 && !empty($passport_dd) ){
						 $applicant_image_link = "../img/applicants/$passport_dd";
				}else{
					$applicant_image_link = "../img/avatar.png";
				}
				
				$lga_dd = get_lga_by_id($db,$lga_id);
				$state_dd = get_state_by_id($db,$state_id);
				
				$programme_by_id = $proObj->programme_by_id($programme_id);
					$programme_name = $programme_by_id['programme_name'];
					$programme_requirements = $programme_by_id['requirements'];
?>