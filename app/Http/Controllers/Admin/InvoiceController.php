<?php

namespace App\Http\Controllers\Admin;

use App\CustomInvoice;
use App\Http\Controllers\Controller;
use App\InvoiceProduct;
use App\InvoiceSetting;
use App\Product;
use App\ProjectCategory;
use App\SmsModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class InvoiceController extends Controller
{
    
    public function create()
    {
        $users = User::select(['id','name'])->get();
        $products = InvoiceProduct::select('name','id')->get();
        $projects = ProjectCategory::select(['id','name'])->get();
        return view('admin.invoice.invoice_create',compact('users','projects','products'));
    }

    public function getProduct()
    {
        // return  response("ok");
        $products = InvoiceProduct::select('name','id')->get();
        // return response()->json($products->id);
        return view('admin.invoice.ajax.invoice_add_product',compact('products'));

    }
    public function store(Request $request)
    {
        
        $product_no = $request->product;
        $note = $request->note;
        $quantity = $request->quantity;
        $totalprice = $request->totalprice;

        $request->validate([
            'customer' => 'required',
            'payment_method' => 'required',
            'project' => 'required',
            'tax' => 'required',
            'currency' => 'required',
            'invoicedate' => 'required',
            'duedate' => 'required',
            'invoice_no' => 'required',
            'requrring_cycle' => 'required',
            'purchase_order' => 'required',
            'unpaid' => 'required',
            'discount' => 'required',
            'product' => 'required',
            'discount_type' => 'required',
            
        ]);

        $invoice = new CustomInvoice();
        $invoice->created_by = auth()->user()->id;
        $invoice->customer = $request->customer;
        $invoice->payment_method = $request->payment_method;
        $invoice->project = $request->project;
        $invoice->tax = $request->tax;
        $invoice->currency = $request->currency;
        $invoice->invoicedate = $request->invoicedate;
        $invoice->duedate = $request->duedate;
        $invoice->invoice_no = $request->invoice_no;
        $invoice->requrring_cycle = $request->requrring_cycle;
        $invoice->purchase_order = $request->purchase_order;
        $invoice->unpaid = $request->unpaid;
        $invoice->discount = $request->discount;
        $invoice->discount_type = $request->discount_type;
        $invoice->product_id = json_encode($product_no);
        $invoice->note = json_encode($note);
        $invoice->note = json_encode($note);
        $invoice->quantity = json_encode($quantity);
        $invoice->totalprice = json_encode($totalprice);
        $invoice->customar_note = $request->customar_note;
        $invoice->persone_name = $request->persone_name;
        $invoice->company_name = $request->company_name;
        $invoice->save();
        
        $user = User::findOrFail($request->customer);
        $this->sendSMS($user,$request->invoice_no);
        $notification=array(
            'messege'=>' Invoice Created Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }


    public function sendSMS($request,$verify_code){
        
        
        $siteUrl = URL::to("/");
        $sms_text = $request->name . " an Invoice Created By Admin and  Order ID is:" . $verify_code . ' ' . $siteUrl;
        $smsinfo =SmsModel::first();
        $smsurl =$smsinfo->sms_url;
        $smsname =$smsinfo->sms_username; #durbar2020
        $smspassword =$smsinfo->sms_password; #12345678
        
        $postData = array(
            'username'=>urlencode($smsname),
            'password'=>urlencode($smspassword),
            'sms_content'=>$sms_text,
            'number'=>urlencode($request->phone),
            'sms_type'=>1,
            
        );

        $ch = curl_init();
            curl_setopt_array($ch, array(
            CURLOPT_URL => $smsurl,
            // CURLOPT_URL => 'http://gosms.xyz/api/v1/sendSms',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_FOLLOWLOCATION => true
            ));
            
            return $output = curl_exec($ch);
            
    }


    public function invoiceList()
    {
        $invoices = CustomInvoice::all();
        return view('admin.invoice.invoice_list',compact('invoices'));

    }

    public function invoiceSetting()
    {
        $invoices = InvoiceSetting::findOrFail(1);
        return view('admin.invoice.setting.index',compact('invoices'));

    }

    public function invoiceSettingUpdate(Request $request)
    {
        
        $request->validate([
            'tax'=>'required',
            'prefix'=>'required',
        ]);
        $invoice = InvoiceSetting::findOrFail(1);
        $invoice->tax = $request->tax;
        $invoice->prefix = $request->prefix;
        $invoice->save();
        $notification=array(
            'messege'=>' Invoice Updated Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    public function getSingleProduct($id)
    {
        $product = InvoiceProduct::findOrFail($id);
        
        if($product){
            $price = $product->price;
            return response()->json($price);
        }
    }

    public function invoiceView($id)
    {
        $invoice = CustomInvoice::findOrFail($id);
        return view('admin.invoice.show',compact('invoice'));
    }

    public function invoiceDelete ($id)
    {
        $invoice = CustomInvoice::findOrFail($id);
        $notification=array(
            'messege'=>' Invoice Deleted Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }
}
