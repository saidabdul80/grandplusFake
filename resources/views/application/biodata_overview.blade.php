		
		<?php
			 function resortObject($parent,$childname, $childkey, $fkey){            
            $result = array();
            $c=0; $lid;
            $track;
             foreach ($parent as  $object) { 
             	if ($c == 0) {
             	 	$result[$object->$fkey] =  array();
             	 	$result[$object->$fkey][$object->$childkey] = $object->$childname;             	 	
             	 	$track = $object->$fkey;
             	 }else{
             	 	if ($track == $object->$fkey) {
             	 		$result[$object->$fkey][$object->$childkey] = $object->$childname;
             	 		$track = $object->$fkey;             	 		
             	 	}else{
             	 		$result[$object->$fkey] =  array();
	             	 	$result[$object->$fkey][$object->$childkey] = $object->$childname;             	 	
	             	 	$track = $object->$fkey;
             	 	}
             	 }
             	 $c++;
             }
             return $result;
         }


		?>
			<table class="table table-hover borderless ">
												
				<tr>
					<td colspan="2"> Application Number:<strong> {{ $application_number}} </strong> <input type="hidden" value="<?= $application_number; ?>" id="apid"></td>
				</tr>				
				<tr>
					<td ><label> Programe:</label> <input type="text" disabled value="{{$programme_name}}" class="form-control w-100"></td>
					<td ><label > Name:</label> <input type="text" id="biofname" value="<?= $name; ?>" class="form-control w-100"></td>
				</tr>
				<tr>
					<td ><lable class=""> Phone</lable> <input class="form-control w-100 " id="biophone" value="{{$phone_number}}"> </td>
					<td > <lable class="">Email Address:</lable> <input disabled="" type="text" id="bioemail" class="form-control w-100 " value=" <?= $email_address; ?>"></td> 
				</tr>
				<tr>
					<td > <lable class="text-center">Sex:</lable>
						<select id="biogender" class="form-control w-100" >
							<option></option>
							<option value="Male" @if($applicants->sex=='Male') selected @endif  >Male</option>
							<option value="Female" @if($applicants->sex=='Female') selected @endif >Female</option>
						</select>
					 </td>
					<td > <lable class="text-center">Marital Status:</lable>
							<select id="biostatus" class="form-control" >
							<option></option>
							<option value="Single" @if($applicants->marital_status=='Single') selected @endif  >Single</option>
							<option value="Married" @if($applicants->marital_status=='Married') selected @endif >Married</option>
						</select>
						
				</tr>
				<tr>
					<td ><lable class="text-center"> Date of Birth:</lable> <input value="{{$applicants->date_of_birth}}" id="my-date" type="text" class="form-control w-100"></td>
					<td > <lable class="text-center">State:</lable>
						<?php
							$statesWithLga = \DB::table('tbl_lga', 'l')->join('tbl_states', 'tbl_states.id','=','l.state_id')->selectRaw('l.id AS lid, tbl_states.id as sid, l.*, tbl_states.*')->get();
								$All_lga = resortObject($statesWithLga, 'name', 'lid', 'state_id');
							$states = \DB::table('tbl_states')->get();

						  ?>
						  <select id="setlga" class="form-control w-100">
						  	<option></option>
						  		@foreach($states as $state)
						  			<option   value="{{$state->id}}" @if($applicants->state_id==$state->id) selected @endif>{{$state->sname}}</option>
						  		@endforeach
						  </select>
					</td>
				</tr>
				
				<tr>
					<td > <lable class="text-center">LGA:</lable>
						<?php
						$lgas =''; 
							if ($applicants->state_id != '') {
								$lgas = \DB::table('tbl_lga')->where('state_id','=', $applicants->state_id)->get();						
							}
						?>
						<select id="lga-container" class="form-control w-100">
							<option></option>
							@if($lgas != '')
								@foreach($lgas as $lga)
									<option value="{{$lga->id}}" @if($lga->id == $applicants->lga_id) selected @endif >{{$lga->name}}</option>
								@endforeach
							@endif
						</select>						
					<td > <lable class="text-center">Address:</lable><input type="text" id="bioaddress" class="form-control w-100 " value="{{ $applicants->address}}"></td>
				</tr>
				
				<tr>
					<td > <lable class="text-center">Sponsor Type:</lable><input type="text" id="biosponsertype" class="form-control w-100 " value=" {{$applicants->sponsor_type}}"></td>
					<td > <lable class="text-center">Sponsor Name: </lable><input type="text" id="biosponsername" class="form-control w-100 " value="{{$applicants->sponsor_name}}"></td>
				</tr>
				
				<tr>
					<td ><lable class="text-center"> Next of Kin:</lable><input type="text" id="bionok" class="form-control w-100 " value=" {{ $applicants->nok_name}}"></td>
					<td ><lable class="text-center"> Next of Kin Relationship: </lable>
							<select id="bionokr" class="form-control w-100" name="nok_relationship" >
								<option value=""> --  Select -- </option>
								<option value="Father" <?php if($applicants->nok_relationship=='Father') echo 'selected' ?>> Father </option>
								<option value="Mother" <?php if($applicants->nok_relationship=='Mother') echo 'selected' ?>> Mother </option>
								<option value="Sister" <?php if($applicants->nok_relationship=='Sister') echo 'selected' ?>> Sister </option>
								<option value="Brother" <?php if($applicants->nok_relationship=='Brother') echo 'selected' ?>> Brother </option>
							
							</select>						
				</tr>
				
				<tr>
					<td ><lable class="text-center"> Next of Kin Phone Number:</lable><input type="text" id="bionokp" class="form-control w-100 " value="{{$applicants->nok_phone_number}}"></td>
					<td > </td>
				</tr>
				
		</table>
		@if($applicants->print_ack_slip=='0')
			<button class="btn btn-success text-white" rel="#forloader3+#loader3" id="biodataBtn" type="button"><span id="forloader3">save</span> <div style="display: none;" id="loader3"><span class="spinner-grow spinner-grow-sm" arial-hidden="true" role="status"></span>Loading...</div></button>
		@endif			
<script type="text/javascript">
$(document).ready(function(){
	var statesWithLga = <?php echo json_encode($All_lga);?>;
	//statesWithLga = JSON.parse();
	//console.log(statesWithLga);
	$('#setlga').change(function(){
	var lgaOption='';
		var skey = $(this).val();				
		var lgas = statesWithLga[skey];
		for (var key in lgas ) {
			lgaOption+= "<option value="+key+">"+lgas[key]+"</option>";
		}
		document.getElementById('lga-container').innerHTML = lgaOption;
		
	});

	$('#biodataBtn').click(function(){
		
		var loader = $(this).attr('rel').split('+');
		var apid = $('#apid').val();
		if (apid != '') {
			var fn = $('#biofname').val();
			var phone = $('#biophone').val();
			//var email = $('#bioemail').val();
			var gender = $('#biogender').val();
			var status = $('#biostatus').val();
			var state = $('#setlga').val();
			var lga = $('#lga-container').val();

			var addr = $('#bioaddress').val();
			var sponsortype = $('#biosponsertype').val();
			var sponsorname = $('#biosponsername').val();
			var nok = $('#bionok').val();		
			var nokr = $('#bionokr').val();
			var nokp = $('#bionokp').val();
			var dob = $('#my-date').val();
			
			$.ajax({
		    type: 'POST',
		    url:  "{{route('process_result3')}}",
		    data: {dob:dob,fn:fn, phone:phone,apid:apid,gender:gender,status:status,state:state,lga:lga,addr:addr,sponsortype:sponsortype, sponsorname:sponsorname, nok:nok,nokr:nokr,nokp:nokp, _token:'{{ csrf_token() }}' },
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

		}else{
			alert('invalid application_id: please register');
		}
	});
			});
		</script>