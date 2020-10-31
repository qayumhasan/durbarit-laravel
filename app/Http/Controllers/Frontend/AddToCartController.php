<?php

namespace App\Http\Controllers\Frontend;

use App\AddToCart;
use App\Billing;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use DB;

class AddToCartController extends Controller
{
    public function addToCart(Request $request)
    {
        
        
       $productdetails =Product::findOrFail($request->product_id);

        $product=[
            'name'=>$productdetails->product_name,
            'owner'=>$productdetails->owner,
            'demourl'=>$productdetails->demourl,
            'image'=>$productdetails->image,
            'reqular_price'=>$productdetails->reqular_price,
            'premium_price'=>$productdetails->premium_price,
        ];

        AddToCart::create([
            'user_ip'=>\Request::ip(),
            'product_id'=>$request->product_id,
            'package_id'=>$request->package_id,
            'product'=>json_encode($product),
            'extra_price'=>$request->extra_price,
        ]);

        $cartcount =AddToCart::where('user_ip',\Request::ip())->get()->count();

        return response()->json([
            'data'=>'Product Add Successfully!',
            'count'=>$cartcount
        ]);
     }

     public function showCart()
     {
         
        $cartcount =AddToCart::where('user_ip',\Request::ip())->simplePaginate(10);
        
        return view('frontend.shopping.shopping',compact('cartcount'));   
     }

     public function checkout()
     {
        $countries = DB::table('countries')->get();
        $cartcount =AddToCart::where('user_ip',\Request::ip())->simplePaginate(10);
        $user = auth()->user();
        $total = 0;
        foreach($cartcount as $row){
            $total = $total + $row->product->reqular_price + $row->extra_price;
        }
        
         return view('frontend.shopping.checkout',compact('countries','cartcount','total','user'));
     }

     public function customarBilling(Request $request)
     {
        $cartcount =AddToCart::where('user_ip',\Request::ip())->get();
        $total = 0;
        foreach($cartcount as $row){
            $total = $total + $row->product->reqular_price + $row->extra_price;
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
            array_push($cartproduct, $item);
        }
        

         Billing::create([
             'user_id'=>auth()->user()->id,
             'name'=>$request->name,
             'email'=>$request->email,
             'company'=>$request->company,
             'country'=>$request->country,
             'city'=>$request->city,
             'state'=>$request->state,
             'postal_code'=>$request->postal_code,
             'payment_method'=>$request->payment_method,
             'product'=>json_encode($cartproduct),
             'total'=>$total,
         ]);
         foreach($cartcount as $row){
             AddToCart::findOrFail($row->id)->delete();
         }

         return 'ok';
     }

     public function cartDelete(Request $request)
     {
         AddToCart::findOrFail($request->cart_id)->delete();
         $cartcount =AddToCart::where('user_ip',\Request::ip())->get()->count();

         return response()->json([
             'data'=>'Product Delete From Cart!',
             'count'=>$cartcount
         ]);

     }

    
}
