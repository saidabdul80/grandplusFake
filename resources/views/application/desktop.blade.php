<?php 
	use App\tbl_applicants;		
	use App\tbl_programmes;
	use App\tbl_payment_fee;
	
	

	$applicants = tbl_applicants::where('email_address','=', session('email'))->first();

	$programme_name = tbl_programmes::find($applicants->programme_id)->first()->programme_name;
	$application_number = $applicants->application_number;

	if ($applicants->form_fee == '1' AND $applicants->result_status == '0' AND $applicants->biodata_status == '0') {
	?>
		@include('application.acknowledgment')
	<?php			
	}
	
	if($applicants->form_fee=='0'){
		$validate_error_msg='success';
		$validate_error_msg_text ='Your APPLICATION NUMBER IS '.$application_number.' and it has been sent to your phone number ('.$applicants->phone_number.')';
	}
	
?>
@extends('layouts.website')


@section('page-body')
  <div class="col-md-12" style="">
  	@include('layouts.flash_messges')
	@if($applicants->form_fee=='0')  	
		@include('application.desktop_payment_notconfirmed');
	@else
		@include('application.desktop_payment_confirmed');

	@endif		   
  </div>
@endsection


@section('scripts')
@endsection     
