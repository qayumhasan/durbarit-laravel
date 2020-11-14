<?php

namespace App\Http\Controllers\Admin;

use App\CustomInvoice;
use App\Http\Controllers\Controller;
use App\InvoiceSetting;
use App\Product;
use App\ProjectCategory;
use App\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    
    public function create()
    {
        $users = User::select(['id','name'])->get();
        $products = Product::select('product_name','id')->get();
        $projects = ProjectCategory::select(['id','name'])->get();
        return view('admin.invoice.invoice_create',compact('users','projects','products'));
    }

    public function getProduct()
    {
        // return  response("ok");
        $products = Product::select('product_name','id')->get();
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
        $invoice->save();
        
        $notification=array(
            'messege'=>' Invoice Created Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
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
        $product = Product::findOrFail($id);
        if($product){
            $price = $product->reqular_price;
            return response()->json($price);
        }
    }

    public function invoiceView($id)
    {
        $invoice = CustomInvoice::findOrFail($id);
        return view('admin.invoice.show',compact('invoice'));
    }
}
