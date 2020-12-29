<?php 
	include_once('classes_application.php');
	include_once('session_control_application.php');
	
	

	
	
	
?>
<!DOCTYPE html>
<html lang='en'>
<head>
     <?php include_once('head_application.php'); ?>
	 
	 <style>
		#passport_wrap img{
			width:200px;
			height:200px;
		}
	 </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2"></div>
        <div class="col-md-8 card">
            <!-- main-page -->
            <div class="main-page" style="background:#fff">
				 <div width="100%">
				 		<p class="text-center"><img src="../img/logo.jpg" width="60" height="60px" style="position:absolute" /></p><br><br><br>
				 			<p class="text-center"><strong style="color:#002b80; text-shadow:1px 0px 1px #121212; padding:5pt; font-size: 15pt">Grand Plus College of Health Technology and Sciences, Ilorin</strong></p>
				 			<p class="text-center"><a href="#" style=" text-shadow:1px 0px 1px #121212;background: #002b80; padding: 5px 30px;color: #fff;font-size: 12pt">Application Form</a></p>
				 			<hr>

				 			<table class="table table-stripped table-bordered table-active table-hover">
												
													<tr>
														<td colspan="2"> Application Number: <?= $application_number; ?></td>
													</tr>
													<tr>
														<td colspan="2"> Progtrame: <?= $programme_name; ?></td>
													</tr>
													<tr>
														<td colspan="2"> Name: <?= $name; ?></td>
													</tr>
													<tr>
														<td > Phone: <?= $phone_number; ?></td>
														<td > Email Address: <?= $email_address; ?></td>
													</tr>
													
											</table>
				 		
				 		<?php 
				 				if($biodata_status==0){
				 					include_once('biodata_form.php');
				 				}else if($biodata_status==1){
				 					include_once('result_form.php');
				 				}
				 		?>
				 </div>

            </div>   <!-- main-page -->
        </div>
          <div class="col-md-2"></div>
  </div> <!-- row -->
</div>
 <?php include_once('scripts_application.php');?>
 
 <?php 
	if(isset($_SESSION['validate_error_msg_text'])){
		unset($_SESSION['validate_error_msg_text']);
		unset($_SESSION['validate_error_msg']);
	}
?>

<script>

</script>
</body>
<html>
