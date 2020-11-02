<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Product;
use Carbon\Carbon;
use Session;
use Image;

class ProductController extends Controller
{

  public function __construct(){
    $this->middleware('auth:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::where('status',1)->where('is_deleted',0)->orderBy('id','DESC')->get();
        return view('admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::where('status',1)->get();
        return view('admin.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



      $createdate = Carbon::now()->format('d F Y');
      //return $to;
    //  return $request;
        $validatedData = $request->validate([
          'name' => 'required',
          'owner' => 'required',
          'sku' => 'required|unique:products|max:255',
          'reqular_price' => 'required',
          'reqular_price' => 'required',
          'cate_id' => 'required',
          'demourl' => 'required',
          'thumbnail_img' => 'required',
        ]);

        $data = new Product;
        $data->product_name = $request->name;
        $data->sku = $request->sku;
        $data->owner = $request->owner;
        $data->version = $request->version;
        $data->reqular_price = $request->reqular_price;
        $data->reqular_price_feture = $request->reqular_price_feture;
        $data->premium_price = $request->premium_price;
        $data->premium_price_feture = $request->premium_price_feture;
        $data->category_id = $request->cate_id;
        $data->product_details = $request->product_details;
        $data->feature = $request->feature;
        $data->release_log = $request->release_log;
        $data->compatible_browser = $request->compatible_browser;
        $data->software_version = $request->software_version;
        $data->demourl = $request->demourl;
        $data->resulation = $request->resulation;
        $data->framework = $request->framework;
        $data->meta_tag = $request->meta_tag;
        $data->meta_description = $request->meta_description;
        $data->first_create = $createdate;
        $data->created_at = Carbon::now();
        $photos = array();
       if ($request->hasFile('photos')) {
           foreach ($request->photos as $key => $photo) {
               $photoName = uniqid() . "." . $photo->getClientOriginalExtension();
               $resizedPhoto = Image::make($photo)->resize(1200, 1600)->save($photoName);
               Storage::disk('public')->put($photoName, $resizedPhoto);
               unlink($photoName);
               array_push($photos, $photoName);
           }
           $data->gallary_image = json_encode($photos);
       }
       if ($request->hasFile('thumbnail_img')) {
            $image = $request->file('thumbnail_img');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(800,600)->save('public/uploads/product/' . $ImageName);
            Image::make($image)->resize(350, 270)->save('public/uploads/product/smallthum/' . $ImageName);
            $data->image = $ImageName;
        }
        if ($data->save()){
         $notification = array(
             'messege' => 'Product Insert success',
             'alert-type' => 'success'
               );
               return Redirect()->back()->with($notification);
          }else{
               $notification = array(
                   'messege' => 'Product Insert Faild',
                   'alert-type' => 'error'
               );
               return Redirect()->back()->with($notification);
           }






    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $data=Product::where('id',$id)->first();
          $category=Category::where('status',1)->get();
          return view('admin.product.edit',compact('data','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lastdate = Carbon::now()->format('d F Y');
      $validatedData = $request->validate([
        'name' => 'required',
        'owner' => 'required',
        'sku' => 'required|max:255',
        'reqular_price' => 'required',
        'reqular_price' => 'required',
        'cate_id' => 'required',
        'demourl' => 'required',

      ]);

      $data = Product::findOrFail($id);
      $data->product_name = $request->name;
      $data->sku = $request->sku;
      $data->owner = $request->owner;
      $data->version = $request->version;
      $data->reqular_price = $request->reqular_price;
      $data->reqular_price_feture = $request->reqular_price_feture;
      $data->premium_price = $request->premium_price;
      $data->premium_price_feture = $request->premium_price_feture;
      $data->category_id = $request->cate_id;
      $data->product_details = $request->product_details;
      $data->feature = $request->feature;
      $data->release_log = $request->release_log;
      $data->compatible_browser = $request->compatible_browser;
      $data->software_version = $request->software_version;
      $data->demourl = $request->demourl;
      $data->resulation = $request->resulation;
      $data->framework = $request->framework;
      $data->meta_tag = $request->meta_tag;
      $data->meta_description = $request->meta_description;
      $data->last_update = $lastdate;
      $data->created_at = Carbon::now();

      $data->image = $request->previous_thumbnail_img;
      if ($request->hasFile('thumbnail_img')) {
            $image = $request->file('thumbnail_img');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(800,600)->save('public/uploads/product/' . $ImageName);
            Image::make($image)->resize(350, 270)->save('public/uploads/product/smallthum/' . $ImageName);
            $data->image = $ImageName;
        }

        if ($request->has('previous_photos')) {
             $photos = $request->previous_photos;
         } else {
             $photos = array();
         }

        if ($request->hasFile('photos')) {
          foreach ($request->photos as $key => $photo) {
              $photoName = uniqid() . "." . $photo->getClientOriginalExtension();
              $resizedPhoto = Image::make($photo)->resize(600, 600)->save($photoName);
              Storage::disk('public')->put($photoName, $resizedPhoto);
              unlink($photoName);
              array_push($photos, $photoName);
          }
            $data->gallary_image = json_encode($photos);
      }

      if($data->save()){
       $notification = array(
           'messege' => 'Product update success',
           'alert-type' => 'success'
             );
             return Redirect()->back()->with($notification);
        }else{
             $notification = array(
                 'messege' => 'Product update Faild',
                 'alert-type' => 'error'
             );
             return Redirect()->back()->with($notification);
         }










    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $data=Product::where('id',$id)->delete();
          if($data){
           $notification = array(
               'messege' => 'Delete success',
               'alert-type' => 'success'
                 );
                 return Redirect()->back()->with($notification);
            }else{
                 $notification = array(
                     'messege' => 'Delete Faild',
                     'alert-type' => 'error'
                 );
                 return Redirect()->back()->with($notification);
             }

    }
}
