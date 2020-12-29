@extends('layouts.website')


@section('page-body')
  <div class="col-sm-12 col-lg-8  pt-5" style="">
		  @if(isset($error_msg))
	    <div class="alert alert-danger"> {{$error_msg}} </div>
	    @endif
	    
	<p class="para3"><strong class="text-danger1">** NEW APPLLICATION FORM!</strong></p>
		<div class="row">
			<div class="col-xs-2 col-sm-2 col-md-2"></div>
			<div class="col-xs-8 col-sm-8 col-md-8" style="border:1px dashed #f1f1f1">
			<form action="{{route('student_apply')}}" method="POST">
				{{csrf_field()}}<br>			
					<div class="form-group">
						 <label for="programme_id">SELECT PROGRAMME  <span class="asterik asterik_first_name">*</span> </label>
						<p><select class="form-control" id="programme_id" name="programme_id" required="">
						<option value="">-- Select Programme --</option>
						@foreach($programmes as $program)		
							<option class="text-primary1" value="{{$program->id}}">{{ $program->programme_name}}</option>
						@endforeach
							</select>
						</p>
					</div>
					<div class="form-group">
						 <label for="surname">SURNAME  <span class="asterik asterik_first_name">*</span> </label>
						<p><input type="text" class="form-control" name="surname" value="" id="surname" placeholder="Surname" required=""></p>
				
					</div>
					<div class="form-group">
						  <label for="surname">FIRST NAME<span class="asterik asterik_other_name"></span></label>
						<p><input type="text" class="form-control" name="first_name" value="" id="first_name" placeholder="First Name" required=""></p>
					</div>
				<!-- column -->
					<div class="form-group">
						  <label for="marital_status"> OTHER NAME <span class="asterik asterik_marital_status">*</span></label>
						<p><input type="text" class="form-control" name="other_name" value="" id="other_name" placeholder="Other Name"></p>
					
					</div>
				<!-- column /-->
				<!-- column -->
						<div class="form-group">
						 <label for="first_name">PHONE NUMBER  <span class="asterik asterik_first_name">*</span> </label>
						<p><input type="text" class="form-control" name="phone_number" value="" id="phone_number" placeholder="Phone Number" required=""></p>
				
					</div>
					<!-- column /-->
					<!-- column -->
						<div class="form-group">
						 <label for="first_name">EMAIL ADDRESS  <span class="asterik asterik_first_name">*</span> </label>
						<p><input type="text" class="form-control" name="email_address" value="" id="email_address" placeholder="Email Address" required=""></p>
				
					</div>
					<div class="form-group">
						 <label for="password">PASSWORD  <span class="asterik asterik_first_name">*</span> </label>
						<p><input type="password" class="form-control" name="password" id="password" placeholder="Password" required=""></p>
				
					</div>
					<div class="form-group">
						 <label for="confirm_password">CONFIRM PASSWORD  <span class="asterik asterik_first_name">*</span> </label>
						<p><input type="password" class="form-control" name="password_confirmation" id="confirm_password" placeholder="Confirm Password" required=""></p>
				
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
	<p class="para2"><strong class="text-danger1">** INSTRUCTIONS/GUIDLINES FOR ALL APPLICANTS!</strong></p>
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
  <div class="col-sm-12 col-lg-4" style="">
      @include('website.latest-update')
  </div>

@endsection


@section('scripts')
@endsection