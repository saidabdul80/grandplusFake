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
										
											<?php 
											
											if(isset($_POST['exam_year'])){
												$exam_type = $_POST['exam_type'];
												$exam_year = $_POST['exam_year'];
												
												if(!empty($result_type_one) && !empty($result_type_two)){
													echo 'Oops! You cannot add more than two results..';
												}else {
													if(empty($result_type_one)){
														$stmt = $db->prepare("update tbl_applicants set result_type_one=:exam_type , result_type_one_year=:exam_year where id=:id");
														$stmt->bindParam(':exam_type',$exam_type, PDO::PARAM_STR);
														$stmt->bindParam(':exam_year',$exam_year, PDO::PARAM_STR);
														$stmt->bindParam(':id',$session_applicant_id, PDO::PARAM_STR);
														$stmt->execute();
														$result_type_one = $exam_type;
														$result_type_one_year = $exam_year;
													}else if(empty($result_type_two)){
														$stmt = $db->prepare("update tbl_applicants set result_type_two=:exam_type , result_type_two_year=:exam_year where id=:id");
														$stmt->bindParam(':exam_type',$exam_type, PDO::PARAM_STR);
														$stmt->bindParam(':exam_year',$exam_year, PDO::PARAM_STR);
														$stmt->bindParam(':id',$session_applicant_id, PDO::PARAM_STR);
														$result_type_two = $exam_type;
														$result_type_two_year = $exam_year;
														$stmt->execute();
													}else{
														echo 'Oops! Something went wrong...';
													}
												}
											}
										if($result_status == '0'){
									?>
									
										<fieldset>
											
											
											
											 
											 
											 <div class="row" id="result_cat_table">
												 <div class="col-md-12">
												 <form class=""  action="result.php" method="POST" id="result_form">
												  <div class="row">
												 <div class="col-md-4">
												  <div class="form-group">
													<select class="form-control" id="exam_type" name="exam_type" required>
														<option value="">-- Select Exam Type --</option>
														<option value="WAEC">-- Waec --</option>
														<option value="NECO">-- Neco --</option>
														<option value="NABTEB">-- NABTEB --</option>
														<option value="GCE">-- GCE --</option>
													</select>
												  </div>
											  </div>
											   <div class="col-md-4">
											  <div class="form-group">
												<select class="form-control" id="exam_year" name="exam_year" required>
														<option value="">-- Select Exam Year --</option>
														<?php 
																for($i=date('Y');$i>=date('Y')-15;$i--){
																	echo '<option value="'.$i.'">'.$i.'</option>';
																}
														?>
													</select>
											  </div>
											  </div>
											  <div class="col-md-4">
											  <div class="form-group">
												<button class="btn btn-info" type="submit">Add Result</button>
											  </div>
											  </div>
											 </div>
											 </form>
											 
											 
													<table class="table table-stripped table-bordered">
														<thead>
															<th>SN</th>
															<th>EXAM TYPE</th>
															<th>YEAR OF EXAM</th>
															<th></th>
														</thead>
														<tbody>
														<?php 
														$sn=0;
															if(!empty($result_type_one)){
																?>
																	<tr>
																	<td><?php echo ++$sn;?></td>
																	<td><?= $result_type_one; ?></td>
																	<td><?= $result_type_one_year; ?></td>
																	<td>
																		<button class='btn btn-sm btn-info'><i class='fa fa-edit'></i></button>
																		<button class='btn btn-sm btn-primary' onclick="load_add_result('<?= $result_type_one; ?>','<?= $result_type_one_year;?>')">Add Result</i></button>
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
																	<td>
																		<button class='btn btn-sm btn-info'><i class='fa fa-edit'></i></button>
																		<button class='btn btn-sm btn-primary' onclick="load_add_result('<?= $result_type_two; ?>','<?= $result_type_two_year;?>')">Add Result</i></button>
																	</td>
																</tr>
															<?php
															}
														?>
													   </tbody>
													   </table>
												 </div>
											</div>
											<div id="add_result_">
											</div>
											 
											 
											
										</fieldset>
									<?php 
										}else{
										 
										}
														
									?>
									
					
									
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
