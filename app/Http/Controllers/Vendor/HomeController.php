<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $user=auth()->user()->load(['occupation']);
        return view('vendors.home',compact('user'));
    }
}
