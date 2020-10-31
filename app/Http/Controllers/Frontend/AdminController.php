<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        
        $user = Auth::user();
        return view('frontend.dashboard.dashboard',compact('user'));
    }
}
