<?php

namespace App\Http\Controllers\Admin;

use App\Billing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Billing::all();
        return view('admin.order.index',compact('orders'));
    }   

    public function showOrder ($id)
    {
        $order = Billing::findOrFail($id);
        return view('admin.order.show',compact('order'));

    }

    public function orderDelete ($id)
    {
        $order = Billing::findOrFail($id);
        $order->delete();
        $notification=array(
            'messege'=>' Order Deleted Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }
}
