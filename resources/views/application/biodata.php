<?php 
	include_once('classes_application.php');
	include_once('session_control_application.php');
	
	
	if(isset($_POST['submit-biodata'])){
			
            $sql = "UPDATE tbl_applicants SET sex=:gender, date_of_birth=:date_of_birth, marital_status=:marital_status, nok_relationship=:nok_relationship,
				nok_phone_number=:nok_phone_number, nok_name=:nok_name, sponsor_name=:sponsor_name, sponsor_type=:sponsor_type, address=:address,
				lga_id=:lga_id, state_id=:state_id, biodata_status='1' WHERE id=:id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam('gender',htmlspecialchars(strip_tags($_POST['gender'])));
            $stmt->bindParam('marital_status',htmlspecialchars(strip_tags($_POST['marital_status'])));
            $stmt->bindParam('date_of_birth',htmlspecialchars(strip_tags($_POST['date_of_birth'])));
            $stmt->bindParam('state_id',htmlspecialchars(strip_tags($_POST['state_id'])));
            $stmt->bindParam('lga_id',htmlspecialchars(strip_tags($_POST['lga_id'])));
            $stmt->bindParam('sponsor_type',htmlspecialchars(strip_tags($_POST['sponsor_type'])));
            $stmt->bindParam('sponsor_name',htmlspecialchars(strip_tags($_POST['sponsor_name'])));
            $stmt->bindParam('address',htmlspecialchars(strip_tags($_POST['address'])));
            $stmt->bindParam('nok_name',htmlspecialchars(strip_tags($_POST['nok_name'])));
            $stmt->bindParam('nok_relationship',htmlspecialchars(strip_tags($_POST['nok_relationship'])));
            $stmt->bindParam('nok_phone_number',htmlspecialchars(strip_tags($_POST['nok_phone_number'])));
            $stmt->bindParam('id',$session_applicant_id);
            $execute_return = $stmt->execute();
            if($execute_return){
               
				$biodata_status ='1';
            }else{
				
				 $error_message = '<div class="alert alert-danger">Oops! Something went wrong</div>';
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
                        <table cellpadding="0" cellspacing="0">
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
									<?php 
										if($biodata_status == '1'){
									?>
									<div style="background:#fcffff;padding: 20px">
									
										<?php 
										$passport_dd = "../img/applicants/$passport_dd";
											if(isset($_POST['upload-passport'])){
													
													$target_dir = "../img/applicants/";
													$target_file = $target_dir . basename($_FILES["passport_file"]["name"]);
													$uploadOk = 1;
													 $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
													// Check if image file is a actual image or fake image
													
													 $passport = $session_applicant_id.'.'.$imageFileType;
														$check = getimagesize($_FILES["passport_file"]["tmp_name"]);
														if($check !== false) {
															
															$uploadOk = 1;
														} else {
															echo "<div class='alert alert-danger'>File is not an image.</div>";
															$uploadOk = 0;
														}
													
													// Check if file already exists
													if (file_exists($target_dir.$passport)==1) {
														echo "<div class='alert alert-danger'>Sorry, file already exists.</div>";
														$uploadOk = 0;
													}
													// Check file size
													
													
													if ($_FILES["passport_file"]["size"] > 1024*30) {
														echo "<div class='alert alert-danger'>Sorry, your file is too large.</div>";
														$uploadOk = 0;
													}
													// Allow certain file formats
													if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
													&& $imageFileType != "gif" ) {
														echo "<div class='alert alert-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
														$uploadOk = 0;
													}
													// Check if $uploadOk is set to 0 by an error
													if ($uploadOk == 0) {
														echo "<div class='alert alert-danger'>Sorry, your file was not uploaded.</div>";
													// if everything is ok, try to upload file
													} else {
														if (move_uploaded_file($_FILES["passport_file"]["tmp_name"], $target_dir.$passport)) {
															$stmt = $db->prepare("UPDATE tbl_applicants set passport='$passport' WHERE id='$session_applicant_id'");
															$stmt->execute();
															$passport_dd = $target_dir.$passport;
															echo "<div class='alert alert-success'>The file ". $passport. " has been uploaded.</div>";
														} else {
															echo "<div class='alert alert-danger'>Sorry, there was an error uploading your file.</div>";
														}
													}
												}
											if(!empty($passport_dd)){
												include_once('biodata_overview.php');
											}else{
												
												
												echo '
												<p class="text-center" id="passport_wrap"><img src="../img/avatar.png" id="passport"style="width:100px;height:100px"></p>
												<p id="upload_passport_error"></p>
													<form action="biodata.php" method="POST" enctype="multipart/form-data">
														<p>Upload Passport</p>
														<p><input type="file" class="form-control" id="passport_file" name="passport_file" onchange="preview_passport()"></p>
														<p class="text-center"><button type="submit" class="btn btn-info" name="upload-passport">Upload Passport</button></p>
													</form>
												';
											}
										?>
										
										 
									</div>
											
											

									<?php 
										}else{
											if(isset($error_message)){
												echo $error_message;
											}
											include_once('biodata_form.php'); 
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

<script>
function load_lga(token){
	$('#lga_id').html('');
	 $.ajax({
		url:"js_http.php",
			data:'action=load_lga&token='+token,
			method:"POST"
		}).done(function(res){

			$('#lga_id').html(res);
		});
}



 function preview_passport() {

    var filesSelected = document.getElementById("passport_file").files;
    if (filesSelected.length > 0) {
      var fileToLoad = filesSelected[0];

      var fileReader = new FileReader();

      fileReader.onload = function(fileLoadedEvent) {
        var srcData = fileLoadedEvent.target.result; // <--- data: base64

        var newImage = document.createElement('img');
        newImage.src = srcData;

        document.getElementById("passport_wrap").innerHTML = newImage.outerHTML;
       // alert("Converted Base64 version is " + document.getElementById("passport_wrap").innerHTML);
        //console.log("Converted Base64 version is " + document.getElementById("passport_wrap").innerHTML);
		document.getElementById("passport_file").value ='';
		
      }
      fileReader.readAsDataURL(fileToLoad);
    }
  }


</script>
</body>
<html>
