<?php

	include('../config.php');
// Retrieve the request's body
$body = @file_get_contents("php://input");
$signature = (isset($_SERVER['HTTP_X_PAYSTACK_SIGNATURE']) ? $_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] : '');

/* It is a good idea to log all events received. Add code *
 * here to log the signature and body to db or file       */

if (!$signature) {
    // only a post with paystack signature header gets our attention
    exit();
}

define('PAYSTACK_SECRET_KEY','sk_live_dcf2f8811b0318597572d228a37ee4d24aca6763');
// confirm the event's signature
if( $signature !== hash_hmac('sha512', $body, PAYSTACK_SECRET_KEY) ){
  // silently forget this ever happened
  exit();
}

http_response_code(200);
// parse event (which is json string) as object
// Give value to your customer but don't give any output
// Remember that this is a call from Paystack's servers and 
// Your customer is not seeing the response here at all
$event = json_decode($body);
switch($event->event){
    // charge.success
    case 'charge.success':
        // TIP: you may still verify the transaction
    		// before giving value.
			
			$data = $event->data;
			$customer = $data->customer;
			$customer_data = $customer->metadata;
			$customer_mail = $customer_data->email_prepared_for_paystack;
			$customer_reff = $customer_data->reff;
			
			$stmt = $db->prepare("update trans set status ='1' where email=?");
			$stmt->execute(array($customer_mail));
    break;
	/*case 'subscription.create':
        break;

    // subscription.disable
    case 'subscription.disable':
        break;

    // invoice.create and invoice.update
    case 'invoice.create':
    case 'invoice.update':
        break;
		*/
}
exit();



{
  "event": "subscription.create",
  "data": {
    "domain": "test",
    "status": "active",
    "subscription_code": "SUB_vsyqdmlzble3uii",
    "amount": 50000,
    "cron_expression": "0 0 28 * *",
    "next_payment_date": "2016-05-19T07:00:00.000Z",
    "open_invoice": null,
    "createdAt": "2016-03-20T00:23:24.000Z",
    "plan": {
      "name": "Monthly retainer",
      "plan_code": "PLN_gx2wn530m0i3w3m",
      "description": null,
      "amount": 50000,
      "interval": "monthly",
      "send_invoices": true,
      "send_sms": true,
      "currency": "NGN"
    },
    "authorization": {
      "authorization_code": "AUTH_96xphygz",
      "bin": "539983",
      "last4": "7357",
      "exp_month": "10",
      "exp_year": "2017",
      "card_type": "MASTERCARD DEBIT",
      "bank": "GTBANK",
      "country_code": "NG",
      "brand": "MASTERCARD"
    },
    "customer": {
      "first_name": "BoJack",
      "last_name": "Horseman",
      "email": "bojack@horsinaround.com",
      "customer_code": "CUS_xnxdt6s1zg1f4nx",
      "phone": "",
      "metadata": {},
      "risk_action": "default"
    },
    "created_at": "2016-10-01T10:59:59.000Z"
  }
}

?>