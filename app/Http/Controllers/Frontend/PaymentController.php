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
        $data = [];
        $data['items'] = [];
        // $invoiceId = uniqid();
        // $userid =  \Request::getClientIp(true);
        // $usercartdatas = Cart::session($userid)->getContent();
        
        $userid = Auth::user()->id;
        $usercartdatas = Billing::where('user_id', $userid)->orderBy('id', 'DESC')->first();
        $cartid = $usercartdatas->order_id;
        $data['invoice_id'] = $usercartdatas->order_id;
        $data['invoice_description'] = $usercartdatas->order_id;
        $data['return_url'] = url('/payment/success');
        $data['cancel_url'] = url('/text');
        $data['total'] = 150;
        return $data;
    }


    public function paywithpaypal()
    {
        $provider = new ExpressCheckout;
        $invoiceId = uniqid();
         $data = $this->cartData($invoiceId);
        //$provider->setExpressCheckout($data);
        $response = $provider->setExpressCheckout($data);
        return $response;
        return redirect($response['paypal_link']);
    }
}
