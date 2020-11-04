<?php

namespace App\Http\Controllers\Frontend;

use App\AddToCart;
use App\Billing;
use App\Collection;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Stripe;
use PDF;

class AddToCartController extends Controller
{
    public function addToCart(Request $request)
    {
        
        
       $productdetails =Product::findOrFail($request->product_id);
       $cart =AddToCart::where('product_id',$request->product_id)->first();

        $product=[
            'name'=>$productdetails->product_name,
            'owner'=>$productdetails->owner,
            'demourl'=>$productdetails->demourl,
            'image'=>$productdetails->image,
            'reqular_price'=>$productdetails->reqular_price,
            'premium_price'=>$productdetails->premium_price,
        ];

        if($cart && !$request->extra_price){
            $cart->increment('qty');
        }else{
            AddToCart::create([
                'user_ip'=>\Request::ip(),
                'product_id'=>$request->product_id,
                'package_id'=>$request->package_id,
                'product'=>json_encode($product),
                'extra_price'=>$request->extra_price,
            ]);
        }

      

        $cartcount =AddToCart::where('user_ip',\Request::ip())->get();
        $cartcount = $cartcount->sum('qty');

        return response()->json([
            'data'=>'Product Add Successfully!',
            'count'=>$cartcount
        ]);
     }

     public function showCart()
     {
         
        $cartcount =AddToCart::where('user_ip',\Request::ip())->simplePaginate(10);
        
        if($cartcount->count() == 0){
            $notification = array(
                'messege' => 'Please!Add Some Product😄😄',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
        
        $total = 0;
        foreach($cartcount as $row){
            if($row->package_id == 1){
                $total = $total + $row->product->reqular_price + $row->extra_price;
            }else{
                $total = $total + $row->product->premium_price + $row->extra_price;
            }
            
        }
        
        return view('frontend.shopping.shopping',compact('cartcount','total'));   
     }

     public function checkout()
     {
         if(!Auth::check()){
            $notification = array(
                'messege' => 'You need to Login first before checkout!',
                'alert-type' => 'error'
            );
            return redirect()->route('customar.login')->with($notification);
         }
        $countries = DB::table('countries')->get();
        $cartcount =AddToCart::where('user_ip',\Request::ip())->simplePaginate(10);
        if($cartcount->count() == 0){
            $notification = array(
                'messege' => 'Please!Add Some Product😄😄',
                'alert-type' => 'error'
            );
            return Redirect('/')->with($notification);
        }
        $user = auth()->user();
        $total = 0;
        foreach($cartcount as $row){
            if($row->package_id == 1){
                $total = $total + $row->product->reqular_price + $row->extra_price;
            }else{
                $total = $total + $row->product->premium_price + $row->extra_price;
            }
            
        }
        
         return view('frontend.shopping.checkout',compact('countries','cartcount','total','user'));
     }

     public function customarBilling(Request $request)
     {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company' => 'required',
            'address' => 'required',
            'country' => 'required',
            'payment_method' => 'required',
        ]);
        $cartcount =AddToCart::where('user_ip',\Request::ip())->get();
        $total = 0;
        $qty =0;
        foreach($cartcount as $row){
            if($row->package_id == 1){
                $total = $total + $row->product->reqular_price + $row->extra_price;
            }else{
                $total = $total + $row->product->premium_price + $row->extra_price;
            }
            
            $qty = $qty + $row->qty;
        }
        
        $cartproduct = array();
        foreach($cartcount as $row){
            
            $item['product_id']=$row->product_id;
            $item['name']=$row->product->name;
            $item['owner']=$row->product->owner;
            $item['demourl']=$row->product->demourl;
            $item['image']=$row->product->demourl;
            if($row->package_id == 1){
                $item['price']=$row->product->reqular_price;
            }else{
                $item['price']=$row->product->premium_price;
            }
            $item['extra_price']=$row->extra_price;
            $item['package_id']=$row->package_id;
            $item['qty']=$row->qty;

            array_push($cartproduct, $item);
            $product = Product::findOrFail($row->product_id);
            $product->increment('number_of_sale', $row->qty);
            $product->save();
        }
        

         $billing =Billing::create([
             'user_id'=>auth()->user()->id,
             'name'=>$request->name,
             'order_id'=>rand(9999,999999),
             'email'=>$request->email,
             'phone'=>$request->phone,
             'company'=>$request->company,
             'country'=>$request->country,
             'address'=>$request->address,
             'payment_method'=>$request->payment_method,
             'product'=>json_encode($cartproduct),
             'total'=>$total,
             'qty'=>$qty,
         ]);
         foreach($cartcount as $row){
             AddToCart::findOrFail($row->id)->delete();
         }


        

    

        if($request->payment_method == 1){
            return view('frontend.payment.stripe',compact('billing'));
        }elseif($request->payment_method == 2){
            // $this->sslcommerz($billing);
            $post_data = array();
        $post_data['store_id'] = env('SSLCOMMERZ_STORE_ID');
        $post_data['store_passwd'] = env('SSLCOMMERZ_STORE_PASSWORD');
        $post_data['total_amount'] = $billing->total;
        $post_data['currency'] = "BDT";
        // $post_data['tran_id'] = "SSLCZ_TEST_" . uniqid();
        $post_data['tran_id'] = $billing->order_id;
        $post_data['success_url'] = url('payment/ssl_commercez/success');
        $post_data['fail_url'] = url('payment/ssl_commercez/fail');
        $post_data['cancel_url'] = url('payment/ssl_commercez/cancel');
        # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

        # EMI INFO
        // $post_data['emi_option'] = "1";
        // $post_data['emi_max_inst_option'] = "9";
        // $post_data['emi_selected_inst'] = "9";

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = Auth::user()->username;
        $post_data['cus_email'] = Auth::user()->email ? Auth::user()->email : NULL;
        $post_data['cus_add1'] = "";
        // $post_data['cus_add2'] = "Dhaka";
        //$post_data['cus_city'] = DB::table('divisions')->where('id', $request->user_division_id)->select('name')->first()->name;
        $post_data['cus_state'] = "Dhaka";
        $post_data['cus_postcode'] = "1216";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = Auth::user()->phone ? Auth::user()->phone : NULL;
        //$post_data['cus_fax'] = "01711111111";


        # SHIPMENT INFORMATION
        # OPTIONAL PARAMETERS
        // $post_data['value_a'] = "ref001";
        // $post_data['value_b '] = "ref002";
        // $post_data['value_c'] = "ref003";
        // $post_data['value_d'] = "ref004";

        # CART PARAMETERS
        // $post_data['cart'] = json_encode(array(
        //     array("product" => "DHK TO BRS AC A1", "amount" => "200.00"),
        //     array("product" => "DHK TO BRS AC A2", "amount" => "200.00"),
        //     array("product" => "DHK TO BRS AC A3", "amount" => "200.00"),
        //     array("product" => "DHK TO BRS AC A4", "amount" => "200.00")
        // ));
        // $post_data['product_amount'] = "100";
        // $post_data['vat'] = "5";
        // $post_data['discount_amount'] = "5";
        // $post_data['convenience_fee'] = "3";

        # REQUEST SEND TO SSLCOMMERZ
        $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $direct_api_url);
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


        $content = curl_exec($handle);
        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        if ($code == 200 && !(curl_errno($handle))) {
            curl_close($handle);
            $sslcommerzResponse = $content;
            
        } else {
            curl_close($handle);
            echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
            exit;
        }

        $order = Billing::where('order_id',$billing->order_id)->first();
        $order->is_payment = 1;
        $order->save();

        # PARSE THE JSON RESPONSE
        $sslcz = json_decode($sslcommerzResponse, true);

        if (isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL'] != "") {
            # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
            # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
            echo "<meta http-equiv='refresh' content='0;url=" . $sslcz['GatewayPageURL'] . "'>";
            # header("Location: ". $sslcz['GatewayPageURL']);
            exit;
        } else {
            echo "JSON Data parsing error!";
        }
            $notification = array(
                'messege' => 'Your Order Is Completed!Check Your Invoice!',
                'alert-type' => 'error'
            ); 
            return redirect()->route('customar.dashboard')->with($notification);
        }elseif($request->payment_method == 3){
            return redirect()->route('paypal.submit');
        }
         
     }

     public function stripePayment(Request $request)
     {
         
        
        $order = Billing::findOrFail($request->billing_id);
          Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
         $charge =  Stripe\Charge::create([
             "amount" => $request->total * 100,
             "currency" => "usd",
             "source" => $request->stripeToken,
             'description' => 'Order',
             'receipt_email' => Auth::user()->email,
             'metadata' => [
                 'quantity' => $request->qty,
                 'total_payable' =>$request->total,
                 'invoice_no' => $request->order_id,
             ],
         ]);
         if ($charge->status === "succeeded") {
            
             $order->is_payment=1;
             $order->save();
             $notification = array(
                'messege' => 'Your Order Is Completed!Check Your Invoice!',
                'alert-type' => 'error'
            ); 
            return view('frontend.payment.success')->with($notification);
         }
     }

     public function sslcommerz($billing)
     {
        $post_data = array();
        $post_data['store_id'] = env('SSLCOMMERZ_STORE_ID');
        $post_data['store_passwd'] = env('SSLCOMMERZ_STORE_PASSWORD');
        $post_data['total_amount'] = $billing->total;
        $post_data['currency'] = "BDT";
        // $post_data['tran_id'] = "SSLCZ_TEST_" . uniqid();
        $post_data['tran_id'] = $billing->order_id;
        $post_data['success_url'] = url('customer/payment/ssl_commercez/success');
        $post_data['fail_url'] = url('customer/payment/ssl_commercez/fail');
        $post_data['cancel_url'] = url('customer/payment/ssl_commercez/cancel');
        # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

        # EMI INFO
        // $post_data['emi_option'] = "1";
        // $post_data['emi_max_inst_option'] = "9";
        // $post_data['emi_selected_inst'] = "9";

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = Auth::user()->username;
        $post_data['cus_email'] = Auth::user()->email ? Auth::user()->email : NULL;
        $post_data['cus_add1'] = "";
        // $post_data['cus_add2'] = "Dhaka";
        //$post_data['cus_city'] = DB::table('divisions')->where('id', $request->user_division_id)->select('name')->first()->name;
        $post_data['cus_state'] = "Dhaka";
        $post_data['cus_postcode'] = "1216";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = Auth::user()->phone ? Auth::user()->phone : NULL;
        //$post_data['cus_fax'] = "01711111111";


        # SHIPMENT INFORMATION
        # OPTIONAL PARAMETERS
        // $post_data['value_a'] = "ref001";
        // $post_data['value_b '] = "ref002";
        // $post_data['value_c'] = "ref003";
        // $post_data['value_d'] = "ref004";

        # CART PARAMETERS
        // $post_data['cart'] = json_encode(array(
        //     array("product" => "DHK TO BRS AC A1", "amount" => "200.00"),
        //     array("product" => "DHK TO BRS AC A2", "amount" => "200.00"),
        //     array("product" => "DHK TO BRS AC A3", "amount" => "200.00"),
        //     array("product" => "DHK TO BRS AC A4", "amount" => "200.00")
        // ));
        // $post_data['product_amount'] = "100";
        // $post_data['vat'] = "5";
        // $post_data['discount_amount'] = "5";
        // $post_data['convenience_fee'] = "3";

        # REQUEST SEND TO SSLCOMMERZ
        $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $direct_api_url);
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


        $content = curl_exec($handle);
        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        if ($code == 200 && !(curl_errno($handle))) {
            curl_close($handle);
            $sslcommerzResponse = $content;
            
        } else {
            curl_close($handle);
            echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
            exit;
        }

        $order = Billing::where('order_id',$billing->order_id)->first();
        $order->is_payment = 1;
        $order->save();

        # PARSE THE JSON RESPONSE
        $sslcz = json_decode($sslcommerzResponse, true);

        if (isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL'] != "") {
            # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
            # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
            echo "<meta http-equiv='refresh' content='0;url=" . $sslcz['GatewayPageURL'] . "'>";
            # header("Location: ". $sslcz['GatewayPageURL']);
            exit;
        } else {
            echo "JSON Data parsing error!";
        }
     }

     public function cartDelete(Request $request)
     {
         
         AddToCart::findOrFail($request->cart_id)->delete();
         $cartcount =AddToCart::where('user_ip',\Request::ip())->get();
         $cartcount = $cartcount->sum('qty');

         return response()->json([
             'data'=>'Product Delete From Cart!',
             'count'=>$cartcount
         ]);

     }

     public function successSSL()
     {
        $notification = array(
            'messege' => 'Your Order Is Completed!Check Your Invoice!',
            'alert-type' => 'error'
        ); 
        return view('frontend.payment.success')->with($notification);
     }


     public function invoiceDetails ($order)
     {
         $order = Billing::where('order_id',$order)->where('user_id',auth()->user()->id)->first();
         return view('frontend.shopping.invoice',compact('order'));
     }
     public function invoiceDownload ($order)
     {
       $order = Billing::where('order_id',$order)->where('user_id',auth()->user()->id)->first();

        $pdf = PDF::loadView('frontend.shopping.invoicedownload',compact('order'));
        $ordername='invoice_no_'.$order->order_id;
        return $pdf->download($ordername.'.pdf');
         
         
     }

     public function addToCollect($id)
     {
         if(!Auth::check()){
            return response()->json([
                'data'=>'Please Login First!'
            ]);
         }else{
            $cal = Collection::where('product_id',$id)->first();
            
            if($cal && $cal->product_id == $id){
                return response()->json([
                    'data'=>'You are allready add this product on collection!'
                ]);

               
            }else{
                

                $collection =new Collection;
                $collection->user_id =auth()->user()->id;
                $collection->product_id =$id;
                $collection->save();
                return response()->json([
                    'data'=>'Product add to collection successfully!Check Your Collection Now'
                ]);
            }
         }
         
         
     }

    
}
