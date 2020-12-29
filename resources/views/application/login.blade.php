<?php 
	//include_once('classes_application.php');
	
	if(isset($_POST['login_btn'])){
		 $application_number = $_SESSION['application_number'] = htmlspecialchars(strip_tags($_POST['application_number']));
		$password = htmlspecialchars(strip_tags($_POST['password']));
		
		$appObj->set_application_number($application_number);
		$appObj->set_password(md5($password));
		$applicant_login = $appObj->applicant_login();
		
		if(is_array($applicant_login)){
			$_SESSION['SESSION_APPLICATION_NUMBER'] = $application_number;
			$_SESSION['SESSION_APPLICANT_ID'] = $appObj->get_id();
			
			unset($_SESSION['validate_error_msg_text']);
			unset($_SESSION['validate_error_msg']);
			header('Location: '.DESKTOP_PATH);
			exit;
		}else{
			$_SESSION['validate_error_msg_text'] = 'Oops! Invalid Credentials...';
			$_SESSION['validate_error_msg'] = 'error';
		}
	}
	
?>

@extends('layouts.website')


@section('page-body')
  <div class="col-sm-12 col-lg-8" style="">   
  		<div class="p-5">
  			<p class="para3"><strong>** LOGIN APPLICANTION PORTAL!</strong></p>
  			
			<div class="row">
					@if(session('errors'))
				<div class="col-md-8 p-0 m-0">
						<div class="alert alert-danger">{{session('errors')}}</div>
				</div>
					@endif
				<div class="col-md-2"></div>
				<div class="col-md-8" style="border:1px dashed #f1f1f1">
				<br/>
				<form action="{{route('login-auth')}}" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<label for="application_number">Application Number</label>
						<input type="text" class="form-control" name="application_number" value="<?php //if(isset($_SESSION['application_number'])) echo $_SESSION['application_number'];?>"  placeholder="Application Number">
					  </div>
					  <div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password">
					  </div>
					  <div class="form-group text-center">
						<button class="btn btn-primary" name="login_btn">SIGN IN</button>
					  </div>
					  <?php 
						if(isset($_SESSION['validate_error_msg_text'])){
							$msg = $_SESSION['validate_error_msg_text'];
							echo '<div class="alert alert-danger">'.$msg.'</div>';
						}
				?>
				</form>
				</div>
				<div class="col-md-2"></div>
				
			</div>
  		</div>         
  		<div>
  			<p class="para2 mt-5"><strong>** INSTRUCTIONS/GUIDLINES FOR ALL APPLICANTS!</strong></p>
            <p> All applicants must read the following instructions :</p>
			 <ol class="px-3">
				<li> <strong><a href="route('departments')">Courses and their requirements</a></strong>. Ensure you meet all the requirement for the course you're applying for.</li>
				<li>Application form must be filled and submitted online before the closing date. Provide your email address and password </li>
				<li>Upload a Passport Photograph of yourself with a Colored background</li>
				<li>Print your payment summary slip and take the slip to bank to make payment</li>
				<li>Please note that your application will not be considered untill your payment has been verified.</li>
				<li>Log onto the portal to check if your payment has been verified. or <a href="#">Click here to begin you online registration.</a> .</li>
				
			</ol>
			<p>All enquiries, complains and suggestion should be directed to the Portal administrator or any staff of the ICT/Computer centre Or you can send a message using the contact form on the College's main website contact page</p>
                
		
									
  		</div>
  </div>
  <div class="col-sm-12 col-lg-4" style="">
      @include('website.latest-update')
  </div>

@endsection


@section('scripts')
@endsection
