<?php

namespace App\Http\Controllers\Frontend;

use App\Billing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaymentController extends Controller
{

    protected function cartData($invoiceId)
    {
        
    
    }


    public function paywithpaypal($billing)
    {

        $data = [];
        
       
        
        $userid = Auth::user()->id;
        $usercartdatas = Billing::where('user_id',$userid)->where('id',$billing)->first();
        if(!$usercartdatas){
            $notification=array(
                'messege'=>' Data Not Found!.',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
        }
        $data['items'][] = [
            'name' => 'ItSolutionStuff.com',
            'price' => $usercartdatas->total,
            'desc'  => 'Durbar IT Payment',
            'qty' => $usercartdatas->qty,
        ];
        $cartid = $usercartdatas->order_id;
        $data['invoice_id'] = $usercartdatas->order_id;
        $data['invoice_description'] = $usercartdatas->order_id;
        $data['return_url'] = url('/payment/success');
        $data['cancel_url'] = url('/text');
        $data['total'] = 150;
        
        $provider = new ExpressCheckout;
  
        
        $response = $provider->setExpressCheckout($data);
  
        
        $response = $provider->setExpressCheckout($data, true);
        
  
        // return redirect($response['paypal_link']);
        return redirect('/paypal/payment/success');

    }


    public function paypalsucess()
    {
        $notification = array(
            'messege' => 'Your Order Is Completed!Check Your Invoice!',
            'alert-type' => 'error'
        ); 
        return view('frontend.payment.success')->with($notification);
    }
}
