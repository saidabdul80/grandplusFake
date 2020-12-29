<?php 
	include_once('../assets/classes/config.php');
	
	include_once('classes_application.php');
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
                                <td width="70%"  style="padding:20pt; padding-top:0pt; font-size: 13px" valign="top">
									
									<hr class="hr1">
                                <p class="para3"><strong>** CHECK ADMISSION STATUS!</strong></p>
									<div class="row">
										<div class="col-md-2"></div>
										<div class="col-md-8" style="border:1px dashed #f1f1f1">
										<br/>
											<div class="form-group">
												<label for="application_number">Application Number</label>
												<input type="text" class="form-control" id="application_number" placeholder="Application Number">
											  </div>
											  <div class="form-group text-center">
												<button class="btn btn-primary">Check Admission Status</button>
											  </div>
										</div>
										<div class="col-md-2"></div>
										
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
                                    
							
                                </td>
                                <td width="30%" bgcolor="#fcffff" style="border-top:1px solid #A7C160; border-left:1px solid #A7C160; padding: 10pt" valign="top">
                                    <hr class="hr1">
                                     <table class="other-links w-100" >
                                          
                                        <tr>
                                          <td style="border-bottom:1px dotted #C6D0AE">
												
												
												<?php include_once('../includes/latest_updates.php'); ?>
                                          </td>
                                        </tr>
                                     </table>
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
