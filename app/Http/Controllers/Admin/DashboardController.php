<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subscription;
use App\Models\Tenant;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
         $orderCount = Order::count();
         $userCount = User::count();
         $vendorCount = User::where('type','vendor')->count();
         $productCount = Product::count();
         $clientCount = User::where('type','user')->count();
        return view('admin.home',compact('orderCount','userCount','vendorCount','productCount','clientCount'));
    }
}
