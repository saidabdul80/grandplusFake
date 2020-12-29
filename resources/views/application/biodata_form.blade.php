<div class="" style="background:#ffffff;padding: 20px">
 <p><a href="#" onclick="close_load_update_biodata()"> <i class="fa fa-arrow-left"></i> Go Back</a></p>
	<form action="biodata.php" id="update_biodata_form" method="POST">

		<fieldset>
			<legend> Personal Info. </legend>
			<input type="hidden" id="action" name="action" value="update_biodata"/>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					  <label for="occupation">GENDER <span class="asterik asterik_occupation">*</span></label>
					<p>
					<p>
						<select id="gender" class="form-control" name="gender" >
							<option value=""> --  Select -- </option>
							<option value="Male" <?php if($applicants->sex_dd=='Male') echo 'selected' ?>> Male </option>
							<option value="Female" <?php if($applicants->sex_dd=='Female') echo 'selected' ?>> Female </option>
						
						</select>
					</p>

					</p>
				</div>

			</div>
			<div class="col-md-4">
				<div class="form-group">
					  <label for="occupation">MARITAL STATUS <span class="asterik asterik_occupation">*</span></label>
					<p>
					<p>
						<select id="marital_status" class="form-control" name="marital_status" required>
							<option value=""> --  Select -- </option>
							<option value="Single" <?php if($applicants->marital_status=='Single') echo 'selected' ?>> Single </option>
							<option value="Married" <?php if($applicants->marital_status=='Married') echo 'selected' ?>> Married </option>
						
						</select>
					</p>

					</p>
				</div>

			</div>
			<div class="col-md-4">
				<div class="form-group">
					  <label for="occupation">DATE OF BIRTH <span class="asterik asterik_occupation">*</span></label>
					<p>
					<p>
						<input type="date" id="date_of_birth" class="form-control" name="date_of_birth" required>
					</p>

					</p>
				</div>

			</div>
			<div class="col-md-6">
				<div class="form-group">
					  <label for="occupation">STATE <span class="asterik asterik_occupation">*</span></label>
					<p>
					<p>
						<select id="state_id" class="form-control" name="state_id" onchange="load_lga(this.value)" required>
							<option value=""> --  Select -- </option>
						<?php 						
						/*
							$stmt = $db->prepare("SELECT * FROM tbl_states");
							$stmt->execute();
							$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);*/
							$rows = DB::table('tbl_states')->get();
								foreach($rows as $key => $state){
									$state_id = $state->id;
									$name = $state->sname;
									
									if($applicants->state_id==$state_id){
										echo '<option value="'.$state_id.'" selected>'.$name.'</option>';
									}else{
										echo '<option value="'.$state_id.'">'.$name.'</option>';
									}
									
								}
						?>
						</select>
					</p>

					</p>
				</div>

			</div>
			<div class="col-md-6">
				<div class="form-group">
					  <label for="occupation">LGA <span class="asterik asterik_occupation">*</span></label>
					<p>
					<p>
						<select id="lga_id" class="form-control" name="lga_id" >
							<option value=""> --  Select -- </option>
						
						</select>
					</p>

					</p>
				</div>

			</div>
			<div class="col-md-8">
				<div class="form-group">
					  <label for="occupation">HOME ADDRESS <span class="asterik asterik_occupation">*</span></label>
					<p>
						<input type="text" class="form-control" name="address" id="address" value=" <?= $applicants->sponsor_type;?>" placeholder="Address" required>
					</p>
				</div>

			</div>
			
			<div class="col-md-4">
				<div class="form-group">
					  <label for="occupation">Sponsor Type <span class="asterik asterik_occupation">*</span></label>
					<p>
						<select id="sponsor_type" class="form-control" name="sponsor_type" >
							<option value=""> --  Select -- </option>
							<option value="Private" <?php if($applicants->sponsor_type=='Private') echo 'selected' ?>> Private </option>
						
						</select>
					</p>
				</div>

			</div>
			
			
			<div class="col-md-8">
				<div class="form-group">
					  <label for="sponsor_name">Sponsor Name <span class="asterik asterik_occupation">*</span></label>
					<p>
					<p>
						<input type="text" placeholder="Sponsor Name" id="sponsor_name" value=" <?= $applicants->sponsor_name; ?>" name="sponsor_name" class="form-control" required>
					</p>

					</p>
				</div>

			</div>
		</div>
		</fieldset>
		
		<fieldset>
			<legend> Next of Kin Info. </legend>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						  <label for="nok_name">Next Of Kin Name <span class="asterik asterik_occupation">*</span></label>
						<p>
							<input type="text" placeholder="Next Of Kin Phone Name" value=" <?= $applicants->nok_name; ?>" id="nok_name" name="nok_name" class="form-control"  required>
						</p>
					</div>

				</div>
				<div class="col-md-6">
					<div class="form-group">
						  <label for="occupation">Next of Kin Relationship <span class="asterik asterik_occupation">*</span></label>
						<p>
							<select id="nok_relationship" class="form-control" name="nok_relationship" >
								<option value=""> --  Select -- </option>
								<option value="Father" <?php if($applicants->nok_relationship=='Father') echo 'selected' ?>> Father </option>
								<option value="Mother" <?php if($applicants->nok_relationship=='Mother') echo 'selected' ?>> Mother </option>
								<option value="Sister" <?php if($applicants->nok_relationship=='Sister') echo 'selected' ?>> Sister </option>
								<option value="Brother" <?php if($applicants->nok_relationship=='Brother') echo 'selected' ?>> Brother </option>
							
							</select>
						</p>
					</div>

				</div>
				<div class="col-md-6">
					<div class="form-group">
						  <label for="nok_phone_number">Next Of Kin Phone Number <span class="asterik asterik_occupation">*</span></label>
						<p>
							<input type="text" placeholder="Next Of Kin Phone Number" value=" <?= $applicants->nok_phone_number; ?>" id="nok_phone_number" name="nok_phone_number" class="form-control" required>
						</p>
					</div>

				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group text-center">
						<button type="submit" name="submit-biodata" class="btn btn-primary"> Update Information </button>
					</div>
				</div>
			</div>
		</fieldset>
			
	</form>	
</div>
