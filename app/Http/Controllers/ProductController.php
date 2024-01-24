<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Department;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::whereStatus(1)->whereNull('parent_id')->get();
        $products = Product::when($request->department, function ($q) use ($request) {
            $q->where('department_id', $request->department);
        })->latest()->paginate(10);
        $dep = Department::find($request->department);
        return view('front.products.index', compact('departments', 'products', 'dep'));
    }

    public function best_seller(Request $request)
    {
        $departments = Department::whereStatus(1)->whereNull('parent_id')->get();
        $products = Product::active()
            ->when(request()->keyword != null, function ($query) {
                $query->where('name', 'like', '%' . \request()->keyword . '%');
            })->when($request->department, function ($query) use ($request) {
            return $query->where('department_id', $request->department);
        })->whereHas('cartProducts')->withCount('cartProducts')
            ->orderBy('cart_products_count', 'desc')->paginate(10);

        return view('front.products.best_seller', compact('departments', 'products'));
    }
}
