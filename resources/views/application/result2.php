<?php 
	include_once('classes_application.php');
	include_once('session_control_application.php');
	
	
	if(isset($_POST['submit-result'])){
			
            for($i=0;$i< count($_POST['subjects']); $i++){
				if(!empty($_POST['subjects'][$i])){
					//echo 'not empty <br/>';
				}
			}
		   
	}
	
	
	
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
    <div class="col-md-1"></div>
        <div class="col-md-10  card">
            <!-- main-page -->
            <div class="main-page">
				 <!-- header  -->
					<?php include_once('applicant_header.php'); ?>
					
				  <!-- header  -->
              <!-- Start Home section -->
             <table width="100%" align="center" class="white" cellpadding="0" cellspacing="0" style="margin:0;border-left:1px solid #121212; border-right: 1px solid #121212" >
                <tr>
                    <td height="" bgcolor="#ffffff">
                        <table  width="100%" cellpadding="0" cellspacing="0">
                            <tr>
							<td width="30%" bgcolor="#ffffff" style="border-top:1px solid #A7C160; border-left:1px solid #A7C160; padding: 10pt" valign="top">
                                   
                                    
												<?php 
													if($form_fee == '1'){
														include_once('applicant_nav_menus.php'); 
													}else{
														include_once('../includes/latest_updates.php'); 
													}
														
												?>
                                      <hr class="hr1">    
                                </td>
                                <td width="70%"  style="border-top:1px solid #A7C160; border-left:1px solid #A7C160;padding:20pt; padding-top:0pt; font-size: 13px" valign="top">
									<hr/>
									<div class="page-crumb" ><h4><i class="fa fa-desktop"></i>&nbsp;&nbsp;&nbsp;<a href="desktop.php">Home ></a>&nbsp;<a href="result.php">Result ></a> </h4></div>
										
										<div class="row">
											<div class="col-md-6">
													<p class="card" style="padding: 20px;border-radius: 30px;">Result One</p>
											</div>
											<div class="col-md-6">
													<p class="card"  style="padding: 20px;border-radius: 30px;">Result Two</p>
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
 <?php include_once('scripts_application.php');?>
 
 <?php 
	if(isset($_SESSION['validate_error_msg_text'])){
		unset($_SESSION['validate_error_msg_text']);
		unset($_SESSION['validate_error_msg']);
	}
?>


</body>
<html>
