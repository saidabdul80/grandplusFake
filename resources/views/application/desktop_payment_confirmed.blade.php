<?php 
	use App\tbl_applicant_results;
function checkerF($a, $b, $c = 0)
{
	$r = '';
	if ($a[$i][$c] == $b) {
		$r = $b;
		}
		return $r;
}
$result_data1 = [
		0 => ['',''],
		1 => ['',''],
		2 => ['',''],
		3 => ['',''],
		4 => ['',''],
		5 => ['',''],
		6 => ['',''],
		7 => ['',''],
		8 => ['',''],
	];
$result_data2 = [
		0 => ['',''],
		1 => ['',''],
		2 => ['',''],
		3 => ['',''],
		4 => ['',''],
		5 => ['',''],
		6 => ['',''],
		7 => ['',''],
		8 => ['',''],
	];
?>
<section>
	<style>
		.tooltip > .tooltip-inner{
			background-color: #d54;
			color: #fff;
		}
		.tooltip.top > .tooltip-arrow{
			border-top: 5px solid #d54;
		}
		.tooltip.botom > .tooltip-arrow{
			border-top: 5px solid #d54;
		}

	</style>

<br/>
<div class="row w-100">
	<div class="col-sm-12 col-md-4 ">
		<fieldset>
			<center>				
				<legend>Applicant Information</legend>
			</center>
			<table class="table table-bordered shadow-sm" border="1"  style="border-color:#2064a8">

				@if(!empty($applicants->result_type_one))
					<?php
						/*$rst1 = \DB::table('tbl_applicant_results', 'a')->join('tbl_subjects', 'tbl_subjects.id','=', 'a.subject_id')->where(['applicant_id'=> session('id'), 'result_cat'=>'0'])->get();*/
						$rst1 = tbl_applicant_results::where(['applicant_id'=> session('id'), 'result_cat'=>0])->get();				
						
						$s = 0;

						/*dd($rst1);*/
						foreach ($rst1 as $v) {							
							$result_data1[$s][0] = $v->subject_id;
							$result_data1[$s][1] = $v->grade;
							$s++;
						}
					?>
				@endif
				@if(!empty($applicants->result_type_two))
					<?php
						/*$rst2 = \DB::table('tbl_applicant_results', 'a')->join('tbl_subjects', 'tbl_subjects.id','=', 'a.subject_id')->where(['applicant_id'=> session('id'), 'result_cat'=>'1'])->get();*/
						$rst2 = tbl_applicant_results::where(['applicant_id'=> session('id'), 'result_cat'=>1])->get();
						$s = 0;
						foreach ($rst2 as $v1) {							
							$result_data2[$s][0] = $v1->subject_id;
							$result_data2[$s][1] = $v1->grade;
							$s++;
						}						
					?>
				@endif
								
			<?php
				$name = session('surname').' '.session('first_name').' '.$applicants->other_name;
				$phone_number = $applicants->phone_number;
				$email_address = $applicants->email_address;
				$applicant_id = $applicants->id;
				$csession = App\tbl_sessions::where('current','=','1')->first()->id;
			    $amoutToPay = App\tbl_payment_fee::where(['programme_id'=>$applicants->programme_id,'session_id'=>$csession, 'status'=>'1'])->first()->fee;					
				
				$passport_dd1 = "/img/applicants/".$applicants->passport;
					if($applicants->passport != ''){
				?>
					<tr><td colspan="2" class="text-center"><img src="<?= $passport_dd1;?>" width="150px" height="150px" class="img img-thumbnail"></td></tr>
				<?php
					}else{
						$passport_dd1  = '';
				?>
					<tr><td colspan="2" class="text-center"><span class="border rounded m-3 p-3 fa fa-user" style="color:#bbb; font-size: 100px;"></span></td></tr>
				<?php
					}
				?>
				
				<tr><td>Applicant Name: <strong ><?= $name; ?></strong></td></tr>
				<tr><td>Application Number: <strong><?= $application_number; ?></strong></td></tr>
				<tr><td>Pogramme:<strong><?= $programme_name; ?></strong></td></tr>
				<tr><td>Email:<strong><?= $email_address;?></strong></td></tr>
			</table>
			
			<div id="print_status">
		
			<?php 
				if($applicants->result_status == '1'  && $applicants->biodata_status=='1' && !empty($passport_dd1)){
					echo '<form action="acknowledgment.php" method="post" target="_BLANK">
						<p class="text-center"><button type="submit" class="btn btn-primary" name="acknowledgment"><i class="fa fa-print"></i> Print Acknowledgement Slip</button></p>
					</form>
					';
				}else if($applicants->result_status == '1'  && $applicants->biodata_status=='1' && empty($passport_dd1)){
					?>

					<p class="text-center" id="passport_wrap"></p>
						<p id="upload_passport_error"></p>
							
							<?php
				}
			?>
		</div>
		</fieldset>
	</div>
	
	<div class="col-sm-12 col-md-8 ">
		<div class="">

		<fieldset>
			<center>				
				<legend>Application Progress</legend>
			</center>
			<table class="table table-bordered" border="1">
			<tr><td>Form Payment: <span class="badge badge-success p-1">Payment Received..</span></td></tr>
			<tr><td>Result Upload: 
					@if($applicants->result_status == 1) 
					<span class="badge bg-success" id="result_upload_status">Result Uploaded</span>
					@else
					<span class="badge bg-danger" id="result_upload_status">not Uploaded..</span>
					@endif
				</td></tr>
			<tr><td>Admission Status: <span class="badge bg-danger">Pending..</span></td></tr>
			<tr><td>Closing  Date: <span class="text-danger">02/03/2020..</span></td></tr>
		</table>
		
		
		</fieldset>
		
		<fieldset>
			<center>				
				<legend>Application Steps</legend>
			</center>
					<div class="panel-group" id="accordion"  role="tablist" aria-multiselectable="true">
					  <div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
						  <h4 class="panel-title">
							<p style="cursor: pointer;"  onclick="slideToggleA('#collapseOne1')" href="#collapseOne1" class="my-0 py-1">
							 <i class="fa fa-file"></i> Result Upload
							</p>
						  </h4>
						</div>
						<div id="collapseOne1"  class="">
						  <div class="panel-body">
							<div class="row" id="result_cat_table">							
							<?php 							
								if($applicants->print_ack_slip=='0'){
							?>
							<div class="col-md-12 w-100">
								@if(empty($applicants->result_type_one) || empty($applicants->result_type_two))
								<form action="#" class="#"  method="POST" id="result_form1">
								  <div class="row w-100">
								   <div class="col-md-4">
								  <div class="form-group">
									<input type="text" placeholder="ExamInation Number" id="exam_number" class="form-control" data-toggle="tooltip" title="Please Enter a valid Exam Number" data-placement="bottom">
								  </div>
									  </div>
										 <div class="col-md-3">
										  <div class="form-group">
											<select class="form-control" id="exam_type" name="exam_type" data-toggle="tooltip" title="select exam Type" data-placement="bottom">
												<option value="">-- Select Exam Type --</option>
												<option value="WAEC">-- Waec --</option>
												<option value="NECO">-- Neco --</option>
												<option value="NABTEB">-- NABTEB --</option>
												<option value="WAEC GCE">-- WAEC GCE --</option>
												<option value="NECO GCE">-- NECO GCE --</option>
												<option value="NABTEB GCE">-- NABTEB GCE --</option>

											</select>
										  </div>
									  </div>
									   <div class="col-md-3">
									  <div class="form-group">
										<select class="form-control" id="exam_year" name="exam_year" data-toggle="tooltip" title="select exam year" data-placement="bottom" >
												<option value="">-- Select Exam Year --</option>
												<?php 
														for($i=date('Y');$i>=date('Y')-15;$i--){
															echo '<option value="'.$i.'">'.$i.'</option>';
														}
												?>
											</select>
									  </div>
									  </div>
									  <div class="col-md-2">
									  <div class="form-group">
										<button class="btn btn-info text-white" rel="#forloader1+#loader1" id="result_form1Btn" type="button"><span id="forloader1">Add Result</span> <div style="display: none;" id="loader1"><span class="spinner-grow spinner-grow-sm" arial-hidden="true" role="status"></span>Loading...</div></button>
									  </div>
									  </div>
									 </div>
								</form>
								@endif			
								<script>
									var isAvailabe2 = false; //result two tracker
									subjectone = {
											t1:null,t2:null,t3:null,t4:null,t5:null,t6:null,t7:null,t8:null,t9:null
										}
									gradeone = {
											g1:null,g2:null,g3:null,g4:null,g5:null,g6:null,g7:null,g8:null,g9:null
										}
									subjecttwo = {
											t1:null,t2:null,t3:null,t4:null,t5:null,t6:null,t7:null,t8:null,t9:null
										}
									gradetwo = {
											g1:null,g2:null,g3:null,g4:null,g5:null,g6:null,g7:null,g8:null,g9:null
										}
								</script>									 
									<div id="feedback"></div>	
									<div class="row w-100 mx-auto">
										<div class="col-md-6 p-1 ">
											<div class="border rounded p-3 w-100 m-0">
											<div>
												@if(!empty($applicants->result_type_one))												
												<select class="form-control" id="exam_type1" name="exam_type" data-toggle="tooltip" title="select exam Type" data-placement="bottom">
													<option value="">-- Select Exam Type --</option>
													<option @if($applicants->result_type_one=='WAEC') selected @endif value="WAEC">-- Waec --</option>
													<option @if($applicants->result_type_one=='NECO') selected @endif value="NECO">-- Neco --</option>
													<option @if($applicants->result_type_one=='NBTEB') selected @endif value="NABTEB">-- NABTEB --</option>
													<option @if($applicants->result_type_one=='WAEC GCE') selected @endif value="WAEC GCE">-- WAEC GCE--</option>
													<option @if($applicants->result_type_one=='NECO GCE') selected @endif value="NECO GCE">-- NECO GCE --</option>
													<option @if($applicants->result_type_one=='NBTEB GCE') selected @endif value="NBTEB GCE">-- NABTEB GCE --</option>
												</select>
												<input class="form-control my-1" value="{{$applicants->result_one_examination_number}}" id="exam_number1" placeholder="Examination Number" data-toggle="tooltip" title="please enter a valid Examination Number" data-placement="bottom">
												<select class="form-control" id="exam_year1" name="exam_year" data-toggle="tooltip" title="select exam year" data-placement="bottom" >
												<option value="">-- Select Exam Year --</option>
												@for($i=date('Y'); $i >=date('Y')-15;$i--)
													<option value="{{$i}}" @if($applicants->result_type_one_year== $i ) selected @endif >{{$i}}</option>
												@endfor
												</select>
											@else Result one not added @endif</div>
											<table class="table borderless">										
											<tbody id="result_category_table">
												
											<?php 
											$sn=0;
											if(!empty($applicants->result_type_one)){
												?>
												@for($i =1; $i<10; $i++)
												<tr class="result1">
													<td>{{$i}}</td>
													<td id="subjectone{{$i}}">@include('application.subjects1')</td>
													<td id="gradeone{{$i}}">@include('application.grades1')</td>
													<script>
														$('#subjectone{{$i}} select').change(function () {
															subjectone.t{{$i}} =	$(this).val();
														});
														$('#gradeone{{$i}} select').change(function () {
															gradeone.g{{$i}} =	$(this).val();
														});
													</script>
												</tr>
												@endfor		
												
											<?php	
											}
											?>
									  		</tbody>
									    	</table>
									   		</div>
										</div>
										<div class="col-md-6 p-1">
											<div class="border rounded p-3 m-0">
											<div>@if(!empty($applicants->result_type_two))
												<select class="form-control" id="exam_type2" name="exam_type" data-toggle="tooltip" title="select exam Type" data-placement="bottom">
													<option value="">-- Select Exam Type --</option>
													<option @if($applicants->result_type_two=='WAEC') selected @endif value="WAEC">-- Waec --</option>
													<option @if($applicants->result_type_two=='NECO') selected @endif value="NECO">-- Neco --</option>
													<option @if($applicants->result_type_two=='NABTEB') selected @endif value="NABTEB">-- NABTEB --</option>
													<option @if($applicants->result_type_two=='WAEC GCE') selected @endif value="WAEC GCE">-- WAEC GCE--</option>
													<option @if($applicants->result_type_two=='NECO GCE') selected @endif value="NECO GCE">-- NECO GCE --</option>
													<option @if($applicants->result_type_two=='NBTEB GCE') selected @endif value="NBTEB GCE">-- NABTEB GCE --</option>
												</select>
												<input class="form-control my-1" value="{{$applicants->result_two_examination_number}}" id="exam_number2" placeholder="Examination Number" data-toggle="tooltip" title="please enter a valid Examination Number" data-placement="bottom">
												<select class="form-control" id="exam_year2" name="exam_year" data-toggle="tooltip" title="select exam year" data-placement="bottom" >
												<option value="">-- Select Exam Year --</option>
												@for($i=date('Y'); $i >=date('Y')-15;$i--)
													<option value="{{$i}}" @if($applicants->result_type_two_year== $i ) selected @endif >{{$i}}</option>
												@endfor
												</select>
											@else Result two not added @endif</div>
											<table class="table borderless">										
											<tbody >																					
											<?php
											if(!empty($applicants->result_type_two)){
												?>
												@for($i =1; $i<10; $i++)
												<tr class="result2" >
													<td>{{$i}}</td>
													<td id="subjecttwo{{$i}}">@include('application.subjects2')</td>
													<td id="gradetwo{{$i}}">@include('application.grade2')</td>
													<script>
														isAvailabe2 = true; //seting result two to be availlable
														$('#subjecttwo{{$i}} select').change(function () {
															subjecttwo.t{{$i}} =	$(this).val();
														});
														$('#gradetwo{{$i}} select').change(function () {
															gradetwo.g{{$i}} =	$(this).val();
														});
													</script>
												</tr>
												@endfor	
											<?php
											}
											?>
									  		</tbody>
									    	</table>
									    	</div>
										</div>
									</div>										
										<center><br>
											<div class="btn btn-success" id="saveResult" rel="#forloader2+#loader2"> <span id="forloader2">save</span>  <div style="display: none;" id="loader2"><span class="spinner-grow spinner-grow-sm" arial-hidden="true" role="status"></span>Loading...</div></div>
										</center>
									</div>
							<?php
								}else{
							?>
								<table id="table_id" class="display" style="font-size:12px;background:white">
									<thead>
									<tr style="">
										<td>SUBJECT</td>
										<td class="text-center">GRADE</td>
										<td class="text-center">EXAM TYPE</td>
										<td class="text-center">YEAR OF EXAM</td>
									</tr>
									</thead>
									<tbody id="result_rows">
									<?php 
									$tr='';
										$check = \DB::table('tbl_applicant_results', 'r')->join('tbl_subjects', 'tbl_subjects.id','=','r.subject_id')->where('r.applicant_id','=','$applicants->id')->orderBy('r.result_cat', 'ASC')->get();

											foreach($check as $key=>$result){
												$tr .='
													<tr id="tr'.$result->id.'">
													<td>'.$result->subject_name.'</td>
													<td class="text-center">'.$result->grade.'</td>
													<td class="text-center">'.$result->exam_type.'</td>
													<td class="text-center">'.$result->exam_year.'</td>
													</tr>
												';
											}											
											echo $tr;
									?>
									</tbody>
						  		</table>
								<?php
								}
								?>
												
												 
												 
								</div>
								
								<div id="add_result_"></div>
						  	</div>
						</div>
					  </div>
					</div>
					  <div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTwo">
						  <h4 class="panel-title">
							<p style="cursor: pointer;" onclick="slideToggleA('#collapseTwo')" class="my-0 py-1">
							   <i class="fa fa-user"></i> Biodata
							</p>
						  </h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						  <div class="panel-body">
								<div id="biodata_overview">
									@include('application.biodata_overview')									
							  </div>							 
						  </div>
						</div>
					  </div>
					  <div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingThree">
						  <h4 class="panel-title">
							<p style="cursor: pointer;" onclick="slideToggleA('#collapseThree')" class="my-0 py-1">
							  <i class="fa fa-upload"></i> File Upload
							</p>
						  </h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						  <div class="panel-body">
								<section>
										<form action="{{route('process_result4')}}" method="POST" enctype="multipart/form-data">
											@csrf
											<div class="row">
												<div class="col-md-4"><p>Upload Passport</p></div>
												<div class="col-md-4">
													<input type="file" class="form-control w-50" id="passport_file" name="image" onchange="preview_passport()">
												</div>
												<div class="col-md-4">
													<button type="submit" class="btn btn-info" style="color:#fff;" name="upload-passport">Upload Passport</button>
												</div>
											</div>
									</form>
								</section>
						  </div>
						</div>
					  </div>
					</div>
		</fieldset>
	</div>
</div>
</div>
<hr/>
</section>

<script type="text/javascript">
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip({trigger:'manual'});
	})
	$('#exam_number').keyup(function() {
		if ($(this).val()<6) {
			$(this).css('border','1px solid #d54');	
			$(this).tooltip('hide');		
		}else{
			$(this).css('border','1px solid #bbb');
			$(this).tooltip('hide');		
		}
	});
	
	$('#exam_type').keyup(function() {
		$(this).css('border','1px solid #bbb');
	});
	$('#exam_year').keyup(function() {
		$(this).css('border','1px solid #bbb');
	});

	$('#result_form1Btn').click(function(){		
	var exNum = $('#exam_number').val();				
	var extype = $('#exam_type').val();				
	var exam_year = $('#exam_year').val();	

	if (exNum=='' && exNum < 6){
		var e1 = $('#exam_number');
		e1.css('border','1px solid #d54');
		e1.tooltip('show');
		setTimeout(function(){
			e1.tooltip('hide');
		}, 3000);
		return 0;
	}
	if (extype==''){
		var e2 = $('#exam_type');
		e2.css('border','1px solid #d54');
		e2.tooltip('show');		
		setTimeout(function(){
			e2.tooltip('hide');
		}, 3000);
		return 0;
	}
	if (exam_year==''){
		var e3 = $('#exam_year');
		e3.css('border','1px solid #d54');
		e3.tooltip('show');
		setTimeout(function(){
			e3.tooltip('hide');
		}, 3000);
		return 0;
	}

	var loader = $(this).attr('rel').split('+');
	$.ajax({
		    type: 'POST',
		    url:  "{{route('process_result')}}",
		    data: {exam_year:exam_year, exam_type:extype, exam_number:exNum,id:"{{session('id')}}", _token:'{{ csrf_token() }}' },
		    success: function(data){		      	
			  	$(loader[0]).show();
			  	$(loader[1]).hide();
			  	//console.log(2);
			  //	console.log(data.success);
		      	if(data.success==200){
		      	//console.log(data.success);
		           	location.reload();
		         }else{
		      	console.log(data.success);

		         }
		  	},
		  	error: function(data){
		      	console.log(data);
		  	}
		  });
		  	
		  	$(loader[0]).hide();
		  	$(loader[1]).show();
	});

	$('#saveResult').click(function() {
		var loader = $(this).attr('rel').split('+');
		var e1 = $('#exam_number1');
		var et1 = $('#exam_type1');
		var ey1 = $('#exam_year1');
		var e2 = $('#exam_number2');
		var et2 = $('#exam_type2');
		var ey2 = $('#exam_year2');
		if (e1.val()=='' && e1.val() < 6){
		e1.css('border','1px solid #d54');
		e1.tooltip('show');
		setTimeout(function(){
			e1.tooltip('hide');
		}, 3000);
		return 0;
		}
		if (et1.val()==''){
			et1.css('border','1px solid #d54');
			et1.tooltip('show');		
			setTimeout(function(){
				et1.tooltip('hide');
			}, 3000);
			return 0;
		}
		if (ey1==''){
			var ey1 = $('#exam_year');
			ey1.css('border','1px solid #d54');
			ey1.tooltip('show');
			setTimeout(function(){
				ey1.tooltip('hide');
			}, 3000);
			return 0;
		}
		if (e2.val()=='' && e2.val() < 6){
		e2.css('border','1px solid #d54');
		e2.tooltip('show');
		setTimeout(function(){
			e2.tooltip('hide');
		}, 3000);
		return 0;
		}
		if (et2.val()==''){
			et2.css('border','1px solid #d54');
			et2.tooltip('show');		
			setTimeout(function(){
				et2.tooltip('hide');
			}, 3000);
			return 0;
		}
		if (ey2==''){
			var ey2 = $('#exam_year');
			ey2.css('border','1px solid #d54');
			ey2.tooltip('show');
			setTimeout(function(){
				ey2.tooltip('hide');
			}, 3000);
			return 0;
		}
		var subjectone = [];
		var subjecttwo = [];
		var gradeone = [];
		var gradetwo = [], m;
		for (var i = 1; i < 10 ; i++) {
			m = 't'+i;
			subjectone.push($('#subjectone'+i+' select').val());
		}
		for (var i = 1; i < 10 ; i++) {
			m = 'g'+i;
			gradeone.push($('#gradeone'+i+' select').val());
		}
		/*checking if result to is available*/
		if(isAvailabe2){			
			for (var i = 1; i < 10 ; i++) {
				m = 't'+i;
				subjecttwo.push($('#subjecttwo'+i+' select').val());
			}
			for (var i = 1; i < 10 ; i++) {
				m = 'g'+i;
				gradetwo.push($('#gradetwo'+i+' select').val());
			}
		}
		/*console.log(subjectone);*/		
		$.ajax({
		    type: 'POST',
		    url:  "{{route('process_result2')}}",
		    data: {subjectone:subjectone, subjecttwo:subjecttwo, gradeone:gradeone,gradetwo:gradetwo, e1:e1.val(),e2:e2.val(), et1:et1.val(), et2:et2.val(),ey1:ey1.val(),ey2:ey2.val(), id:"{{session('id')}}", _token:'{{ csrf_token() }}' },
		    success: function(data){		      	
			  	$(loader[0]).show();
			  	$(loader[1]).hide();
		      	if(data.success==200){
		      		console.log(data.success);
		           	location.reload();
		         }else if(data.success == 407){
		         	
		         }else{
		      		console.log(data.success);
		         }
		  	},
		  	error: function(data){
		      	console.log(data);
		  	}
		  });
		$(loader[0]).hide();
		$(loader[1]).show();		
	})
	
</script>