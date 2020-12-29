
<?php
	$name = session('surname').' '.session('first_name').' '.$applicants->other_name;
	$phone_number = $applicants->phone_number;
	$email_address = $applicants->email_address;
	$applicant_id = $applicants->id;
	$csession = App\tbl_sessions::where('current','=','1')->first()->id;
    $amoutToPay = App\tbl_payment_fee::where(['programme_id'=>$applicants->programme_id,'session_id'=>$csession, 'status'=>'1'])->first()->fee;
//dd($amoutToPay);
?>
	<div >
		@if($errors->any())
		<div class="alert alert-danger">{{$errors->first()}}</div>
		@endif
		<div style="background:#fcffff;padding: 20px">
			<p class="text-center"><img src="/img/payment_notice.png" style="width:100px;height:100px"></p>
			<p><strong>Why are you seeing this page? </strong></p>
			<p>You are seeing this page because your application form fee has not been confirmed.. Please ensure you make payment or click on the link below to download bank payment instruction slip </p>
		</div>
		<table class="table table-stripped table-bordered table-active table-hover">			
			<tr>
				<td colspan="2"> Application Number: <strong><?= $application_number; ?></strong></td>
			</tr>
			<tr>
				<td colspan="2"> Programe Applying for: <strong><?= $programme_name; ?></strong></td>
			</tr>
			<tr>
				<td colspan="2"> Applicant Name: <strong><?= $name; ?></strong></td>
			</tr>
			<tr>
				<td > Applicant Phone: <strong><?= $phone_number; ?></strong></td>
				<td >Applicant Email Address: <strong><?= $email_address; ?></strong></td>
			</tr>			
		</table>
		
		<div class="text-center"><a href="{{route('payment_pdf')}}" target="_BLANK" class="btn btn-lg btn-success"><i class="fa fa-download"></i>  Download Payment Instruction Slip </a></div>		
		<div class="line"></div>
		<div class="text-center">OR</div>
		<div class="line"></div>
		<form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
		    <div class="row" style="margin-bottom:40px;">
		        <div class="col-md-8 col-md-offset-2">    
		            <input type="hidden" name="email" value="saidabdulsalam05@gmail.com"> {{-- required --}}
		            <input type="hidden" name="orderID" value="345">
		            <input type="hidden" name="amount" value="{{$amoutToPay.'00'}}"> {{-- required in kobo --}}
		            <input type="hidden" name="quantity" value="">
		            <input type="hidden" name="currency" value="NGN">
		            <input type="hidden" name="metadata" value="{{ json_encode($array = ['application_number' => $application_number, 'amount_to_pay'=>$amoutToPay, 'id'=>$applicant_id]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
		            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
		            {{ csrf_field() }}		         
		            <p>
		                <button class="btn btn-success btn-lg btn-block" type="submit"><i class="fa fa-plus-circle fa-lg"></i> Pay Now!
		                </button>
		            </p>
		        </div>
		    </div>
		</form>

	</div>