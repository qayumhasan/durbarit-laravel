<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffDirectoryController extends Controller
{
    public function index ()
    {
        return view('admin.human_resource.index');
    }

    public function create()
    {
        return view('admin.human_resource.create');
    }

    public function store(Request $request)
    {
        return $request;
    }
}
