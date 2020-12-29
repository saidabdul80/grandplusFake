<?php 
	include_once('classes_application.php');
	
	if(isset($_POST['submit_application_btn'])){
		$programme_id = $_SESSION['programme_id'] = htmlspecialchars(strip_tags($_POST['programme_id']));
		$surname = $_SESSION['surname'] = htmlspecialchars(strip_tags($_POST['surname']));
		$first_name = $_SESSION['first_name'] = htmlspecialchars(strip_tags($_POST['first_name']));
		$other_name = $_SESSION['other_name'] = htmlspecialchars(strip_tags($_POST['other_name']));
		$phone_number = $_SESSION['phone_number'] = htmlspecialchars(strip_tags($_POST['phone_number']));
		$email_address = $_SESSION['email_address'] = htmlspecialchars(strip_tags($_POST['email_address']));
		$password = htmlspecialchars(strip_tags($_POST['password']));
		$confirm_password = htmlspecialchars(strip_tags($_POST['confirm_password']));
		
		$current_session = current_session($db);
			$session = $current_session['session'];
		if($password == $confirm_password){
			$appObj->set_programme_id($programme_id);
			$appObj->set_surname($surname);
			$appObj->set_first_name($first_name);
			$appObj->set_other_name($other_name);
			$appObj->set_phone_number($phone_number);
			$appObj->set_email_address($email_address);
			$appObj->set_session($session);
			$appObj->set_password(md5($password));
			
			
			$application_number = $appObj->generate_application_number($programme_id);
				if($appObj->application_number_exist($application_number) === false){
					$appObj->set_application_number($application_number);
					if($appObj->create_account() === true){
						$_SESSION['SESSION_APPLICATION_NUMBER'] = $application_number;
						$_SESSION['SESSION_APPLICANT_ID'] = $appObj->get_id();
						header('Location: '.DESKTOP_PATH);
						exit;
					}else{
						$_SESSION['validate_error_msg_text'] = 'Oops! something went wrong...';
						$_SESSION['validate_error_msg'] = 'error';
					}
				}else{
					$_SESSION['validate_error_msg_text'] = 'Application number generation failed...';
					$_SESSION['validate_error_msg'] = 'error';
				}
		}else{
			$_SESSION['validate_error_msg_text'] = 'Sorry, your password did not match...';
		    $_SESSION['validate_error_msg'] = 'error';
		}
	}
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
?>