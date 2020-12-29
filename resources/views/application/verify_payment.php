<?php
include_once('classes_application.php');
include_once('session_control_application.php');
// Confirm that reference has not already gotten value
// This would have happened most times if you handle the charge.success event.
// If it has already gotten value by your records, you may call 
// perform_success()

// Get this from https://github.com/yabacon/paystack-class
require 'paystack/Paystack.php'; 
// if using https://github.com/yabacon/paystack-php
// require 'paystack/autoload.php';

$paystack = new Paystack('sk_live_dcf2f8811b0318597572d228a37ee4d24aca6763');
// the code below throws an exception if there was a problem completing the request, 
// else returns an object created from the json response
$trx = $paystack->transaction->verify(
	[
	 'reference'=>$_POST['reference']
	]
);


// status should be true if there was a successful call
if(!$trx->status){
	
    exit($trx->message);
}



	//// get data
	
	$reference = $trx->data->reference;
	$status = $trx->data->status;
	$paid_at = $trx->data->paid_at;
	$created_at = $trx->data->created_at;
	$payment_channel = $trx->data->channel;
	$ip_address = $trx->data->ip_address;
	$amount = $trx->data->amount;
	/// metadata info
	$metadata = $trx->data->metadata;
	$email_address = $metadata->email_prepared_for_paystack;
	$application_number = $metadata->applicant_id;
	$phone_number = $metadata->phone_number;


if('success' == $status){
	if(!($application_number == $_POST['applicant_id'])){
		echo json_encode(['status'=>200,'message'=>'Payment Validation Failed','error'=true]);
		exit;
	}
	
	$applicant_by_app_number = $appObj->applicant_by_app_number($application_number);
	if(is_array($applicant_by_app_number)){
		$applicant_id = $applicant_by_app_number['id'];
		$initiate_application_payment = $appObj->initiate_application_payment($applicant_id,$amount);
		
			if($initiate_application_payment==true){
				echo json_encode(['status'=>200,'message'=>$trx->message,'error'=false]);
				exit;
			}else{
				echo json_encode(['status'=>200,'message'=> 'Payment received but update failed...','error'=true]);
				exit;
			}
	}
	
	
	
}

		echo json_encode(['status'=>200,'message'=>'Payment not successful','error'=true]);
		exit;


?>