<?php 
	include_once('../assets/classes/config.php');
	
	include_once('classes_application.php');
	
	if(isset($_GET['t'])){
		  $programme_id_base64_filter =  htmlspecialchars(strip_tags($_GET['t']));
		   $base64_decode = base64_decode($programme_id_base64_filter);
		   
		   $programme_id = 0;
		   $department_id = 0;
		   $filter_by_program = false;
		   $programme_by_id = $proObj->programme_by_id($base64_decode);
			if(count($programme_by_id) > 0){
				$department_id = $programme_by_id['department_id'];
				$programme_id = $base64_decode;
				$filter_by_program = true;
			}
	}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
     <?php include_once('head_application.php'); ?>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-1"></div>
        <div class="col-md-10  card">
            <!-- main-page -->
            <div class="main-page">
				 <!-- header  -->
					<?php include_once('header_application.php'); ?>
					
				  <!-- header  -->
              <!-- Start Home section -->
			

             <table width="100%" align="center" class="white" cellpadding="0" cellspacing="0" style="border-left:1px solid #121212; border-right: 1px solid #121212" >
                <tr>
                    <td height="470" bgcolor="#fcffff">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="100%"  style="padding:20pt; padding-top:0pt; font-size: 13px" valign="top">
										<div class="row">
											<div class="col-md-8">
														
															 <hr class="hr1">
														<p class="para3"><strong>** NEW APPLLICATION FORM!</strong></p>
															<div class="row">
																<div class="col-xs-2 col-sm-2 col-md-2"></div>
																<div class="col-xs-8 col-sm-8 col-md-8" style="border:1px dashed #f1f1f1">
																<form action="<?= PROCESS_APPLICATION;?>" method="POST">
																<?php 
																		if(isset($_SESSION['validate_error_msg_text'])){
																			$msg = $_SESSION['validate_error_msg_text'];
																			echo '<div class="alert alert-danger">'.$msg.'</div>';
																		}
																?>
																<br/>
																
																		<div class="form-group">
																			 <label for="first_name">SELECT PROGRAMME  <span class="asterik asterik_first_name">*</span> </label>
																			<p><select class="form-control" name="programme_id" required>
																				<option value="">-- Select Programme --</option>
																				<?php 
																				
																					if($filter_by_program === true){
																						$programmes_by_department_id = $proObj->programmes_by_department_id($department_id);
																							foreach($programmes_by_department_id as $key => $program){
																								$programme_id_dd = $program['id'];
																								$programme_name = $program['programme_name'];
																								
																									if($programme_id_dd == $programme_id){
																										echo '<option value="'.$programme_id.'" selected>'.$programme_name.'</option>';
																									}else{
																										echo '<option value="'.$programme_id.'">'.$programme_name.'</option>';
																									}
																							}
																					}else {
																						$application_programmes_by_school = $appObj->application_programmes_by_school(ND_SCHOOL_VALUE);
																						foreach($application_programmes_by_school as $key => $programme){
																							$programme_name = $programme['programme_name'];
																							$programme_id = $programme['id'];
																							echo '<option value="'.$programme_id.'">'.$programme_name.'</option>';
																						}
																					}
																					
																				?>
																			</select></p>
																	
																		</div>
																		<div class="form-group">
																			 <label for="first_name">SURNAME  <span class="asterik asterik_first_name">*</span> </label>
																			<p><input type="text" class="form-control" name="surname"  value="<?php if(isset($_SESSION['surname'])) echo $_SESSION['surname'];?>" id="surname"  placeholder="Surname" required></p>
																	
																		</div>
																		<div class="form-group">
																			  <label for="surname">FIRST NAME<span class="asterik asterik_other_name"></span></label>
																			<p><input type="text" class="form-control" name="first_name"  value="<?php if(isset($_SESSION['first_name'])) echo $_SESSION['first_name'];?>" id="first_name" placeholder="First Name" required></p>
																		</div>
																	<!-- column -->
																		<div class="form-group">
																			  <label for="marital_status"> OTHER NAME <span class="asterik asterik_marital_status">*</span></label>
																			<p><input type="text" class="form-control" name="other_name"  value="<?php if(isset($_SESSION['other_name'])) echo $_SESSION['other_name'];?>" id="other_name" placeholder="Other Name" ></p>
																		
																		</div>
																	<!-- column /-->
																	<!-- column -->
																			<div class="form-group">
																			 <label for="first_name">PHONE NUMBER  <span class="asterik asterik_first_name">*</span> </label>
																			<p><input type="text" class="form-control" name="phone_number" value="<?php if(isset($_SESSION['phone_number'])) echo $_SESSION['phone_number'];?>" id="phone_number" placeholder="Phone Number" required></p>
																	
																		</div>
																		<!-- column /-->
																		<!-- column -->
																			<div class="form-group">
																			 <label for="first_name">EMAIL ADDRESS  <span class="asterik asterik_first_name">*</span> </label>
																			<p><input type="text" class="form-control" name="email_address"  value="<?php if(isset($_SESSION['email_address'])) echo $_SESSION['email_address'];?>" id="email_address"  placeholder="Email Address" required></p>
																	
																		</div>
																		<div class="form-group">
																			 <label for="password">PASSWORD  <span class="asterik asterik_first_name">*</span> </label>
																			<p><input type="password" class="form-control" name="password" id="password"  placeholder="Password" required></p>
																	
																		</div>
																		<div class="form-group">
																			 <label for="confirm_password">CONFIRM PASSWORD  <span class="asterik asterik_first_name">*</span> </label>
																			<p><input type="password" class="form-control" name="confirm_password"   id="confirm_password" placeholder="Confirm Password" required></p>
																	
																		</div>
																	  <div class="form-group text-center">
																		<button class="btn btn-primary" onclick="submit_application()" name="submit_application_btn">Create Account</button>
																	  </div>
																	  
																	  <div id="submit_application_feedback"></div>
																	  </form>
																</div>
																<div class="col-xs-2 col-sm-2 col-md-2"></div>
																
															</div>
														<hr class="hr1">
														<p class="para2"><strong>** INSTRUCTIONS/GUIDLINES FOR ALL APPLICANTS!</strong></p>
														<p> All applicants must read the following instructions :</p>
														 <ol>
															<li> <strong><a href="../<? DEPARTMENTS;?>">Courses and their requirements</a></strong>. Ensure you meet all the requirement for the course you're applying for.</li>
															<li>Application form must be filled and submitted online before the closing date. Provide your email address and password </li>
															<li>Upload a Passport Photograph of yourself with a Colored background</li>
															<li>Print your payment summary slip and take the slip to bank to make payment</li>
															<li>Please note that your application will not be considered untill your payment has been verified.</li>
															<li>Log onto the portal to check if your payment has been verified. or <a href="#">Click here to begin you online registration.</a> .</li>
															
														</ol>
														<p>All enquiries, complains and suggestion should be directed to the Portal administrator or any staff of the ICT/Computer centre Or you can send a message using the contact form on the College's main website contact page</p>
															
													
														
											</div>
											<div class="col-md-4">
												<hr class="hr1">
															 <table class="other-links w-100" >
																  
																<tr>
																  <td style="border-bottom:1px dotted #C6D0AE">
																		
																		
																		<?php include_once('../includes/latest_updates.php'); ?>
																  </td>
																</tr>
															 </table>
											</div>
										
										</div>

								</td>
                            </tr>
                            <tr>
                            <td  colspan="2" valign="top" class="page-footer">
                                <?php include_once('../includes/footer.php');?>

                            </td>
                            </tr>
                        </table>
                    </td>
                  </tr>
                </table>
              <!-- End Home section -->

            </div>   <!-- main-page -->
        </div>
          <div class="col-md-1"></div>
  </div> <!-- row -->
</div>

</body>
<html>
