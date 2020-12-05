<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Image;
use App\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('admin.client.index', compact('clients'));
    }

    public function create()
    {

        return view('admin.client.create');
    }

    public function store(Request $request)
    {


        $client = new Client();
        $client->name = $request->name;
        $client->designation = $request->designation;
        $client->company = $request->company;
        $client->review = $request->review;


        if ($request->hasFile('image')) {
            $client_id = Str::random(6);
            $client_img = $request->file('image');
            $imagename = $client_id . '.' . $client_img->getClientOriginalExtension();
            Image::make($client_img)->resize(180, 180)->save(base_path('public/images/client/' . $imagename), 50);
            $client->image = $imagename;
        }
        $client->save();

        $notification = array(
            'messege' => ' Client Review Created Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.client.index')->with($notification);
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.client.edit', compact('client'));
    }

    public function update(Request $request)
    {

        $client = Client::findOrFail($request->id);
        $client->name = $request->name;
        $client->designation = $request->designation;
        $client->company = $request->company;
        $client->review = $request->review;


        if ($request->hasFile('image')) {
            if ($client->image != 'clients.jpg') {
                unlink(base_path('public/images/client/' . $client->image));
            }

            $client_id = Str::random(6);
            $client_img = $request->file('image');
            $imagename = $client_id . '.' . $client_img->getClientOriginalExtension();
            Image::make($client_img)->resize(180, 180)->save(base_path('public/images/client/' . $imagename), 50);
            $client->image = $imagename;
        }

        $client->save();

        $notification = array(
            'messege' => ' Client Review Updated Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.client.index')->with($notification);
    }

    public function status($id)
    {
        $client = Client::findOrFail($id);
        $status = $client->status;
        if ($status == 0) {
            $client->status = 1;
            $client->save();
        } else {
            $client->status = 0;
            $client->save();
        }

        $notification = array(
            'messege' => ' Client Status Changed Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function delete($id)
    {

        $client = Client::findOrFail($id);
        if ($client->image != 'clients.jpg') {
            unlink(base_path('public/images/client/' . $client->image));
        }
        $client->delete();
        $notification = array(
            'messege' => ' Client Review Deleted Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function clientReviews(Request $request)
    {

        $request->validate([

            'designation' => 'required',
            'company' => 'required',
            'review' => 'required',
        ]);

        $clientid = Client::where('user_id', auth()->user()->id)->first();

        if ($clientid) {

            $clientid->user_id = auth()->user()->id;
            $clientid->name = auth()->user()->name;
            $clientid->designation = $request->designation;
            $clientid->company = $request->company;
            $clientid->review = $request->review;
            $clientid->status = 0;
            $clientid->save();
            $notification = array(
                'messege' => ' Client Review Updated Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {

            $client = new Client();

            $client->user_id = auth()->user()->id;
            $client->name = auth()->user()->name;
            $client->designation = $request->designation;
            $client->company = $request->company;
            $client->review = $request->review;
            $client->status = 0;
            $client->image = auth()->user()->image;


            $from = base_path('public/images/user/' . auth()->user()->image);
            $to = base_path('public/images/client/' . auth()->user()->image);
            copy($from, $to);


            $client->save();

            $notification = array(
                'messege' => ' Client Review Created Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}
