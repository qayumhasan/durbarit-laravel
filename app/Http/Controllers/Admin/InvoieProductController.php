<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\InvoiceProduct;
use App\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class InvoieProductController extends Controller
{
    public function index()
    {
       $products =InvoiceProduct::all();
        $category = ProjectCategory::all();
        return view('admin.invoice_product.index',compact('products','category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'price' => 'required',
            'details' => 'required',
            'categores_id' => 'required',
            'image' => 'required|image',
        ]);
        $pro = new InvoiceProduct();
        $pro->name = $request->name;
        $pro->details = $request->details;
        $pro->start_date = $request->start_date;
        $pro->end_date = $request->end_date;
        $pro->categores_id = $request->categores_id;
        $pro->price = $request->price;
        if ($request->hasFile('image')) {
            $product_id =Str::random(6);
            $product_img = $request->file('image');
            $imagename = $product_id . '.' . $product_img->getClientOriginalExtension();
            Image::make($product_img)->resize(600, 400)->save(base_path('public/images/invoice_image/' . $imagename), 50);
            $pro->image = $imagename;
        }
        $pro->save();

        $notification=array(
            'messege'=>' Invoice Product Created Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $product = InvoiceProduct::findOrFail($id);
        return response()->json($product);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'price' => 'required',
            'details' => 'required',
            'categores_id' => 'required',
            
        ]);
        $pro = InvoiceProduct::findOrFail($request->id);
        $pro->name = $request->name;
        $pro->details = $request->details;
        $pro->start_date = $request->start_date;
        $pro->end_date = $request->end_date;
        $pro->categores_id = $request->categores_id;
        $pro->price = $request->price;
        if ($request->hasFile('image')) {
            unlink(base_path('public/images/invoice_image/'.$pro->image));
            $product_id =Str::random(6);
            $product_img = $request->file('image');
            $imagename = $product_id . '.' . $product_img->getClientOriginalExtension();
            Image::make($product_img)->resize(600, 400)->save(base_path('public/images/invoice_image/' . $imagename), 50);
            $pro->image = $imagename;
        }
        $pro->save();

        $notification=array(
            'messege'=>' Invoice Product Updated Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    public function delete($id)
    {
        $product = InvoiceProduct::findOrFail($id);
        if($product){
            if($product->image != 'product.jpg'){
                unlink(base_path('public/images/invoice_image/' . $product->image));
            }
            $product->delete();
        }
        
        $notification=array(
            'messege'=>' Invoice Product deleted Successfully.',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }
}
