<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_applicants;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use Paystack;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return back()->withErrors(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        
         $save =  tbl_applicants::find($paymentDetails['data']['metadata']['id']);
         $save->form_fee ='1';
         $save->app_fee = $paymentDetails['data']['metadata']['amount_to_pay'];
         $save->save();
         return redirect('/application')->with('success', 'Payment Successfully');
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}