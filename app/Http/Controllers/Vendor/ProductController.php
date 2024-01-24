<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Product;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        // dd($products);
        return view('front.vendor.products.index', compact('products'));
    }

    public function create()
    {
        $departments = Department::whereStatus('1')->get(['id', 'name']);
        return view('front.vendor.products.create', compact('departments'));
    }

    public function store(ProductRequest $request)
    {
        // dd($request->all());
        $input['name'] = $request->name;
        $input['department_id'] = $request->department_id;
        $input['description'] = $request->description;
        $input['price'] = $request->price;
        $input['delivery_date1'] = $request->delivery_date1;
        $input['delivery_date2'] = $request->delivery_date2;
        $input['delivery_time1'] = $request->delivery_time1;
        $input['delivery_time2'] = $request->delivery_time2;
        $input['leadtime'] = $request->leadtime;

        $input['delivery'] = $request->delivery;
        $input['insurance'] = $request->insurance;
        $input['rating'] = $request->rating;
        $input['insurance_amount'] = $request->insurance_amount;
        $input['status'] = 1;
        $input['slug'] = Str::slug($request->name);
        $input['user_id'] = auth()->user()->id;
        if ($image = $request->file('image')) {
            $file_name = Str::slug($request->name) . "." . $image->getClientOriginalExtension();
            $path = public_path('/images/product/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $input['image'] = $file_name;
        }
        $product = Product::create($input);
        $this->createProductImages($request, $product);
        Alert::success('يرجى الانتظار لحين المراجعه من قبل الاداره', 'تمت اضافه المنتج بنجاح');
        return redirect()->route('vendor.products.index');
    }

    public function edit(Product $product)
    {
        $departments = Department::whereStatus('1')->get(['id', 'name']);
        if($product->user_id != auth()->user()->id){
            abort(404);
        }
        return view('front.vendor.products.edit', compact('departments', 'product'));
    }

    public function update(ProductRequest $request, Product $product)
{
    if ($product->user_id != auth()->user()->id) {
        // إذا كان المستخدم الحالي ليس صاحب المنتج
        return back()->with('error', 'غير مسموح لك بتعديل هذا المنتج');
    }

    $input['name'] = $request->name;
    $input['department_id'] = $request->department_id;
    $input['description'] = $request->description;
    $input['price'] = $request->price;
    $input['leadtime'] = $request->leadtime;
    $input['delivery_date1'] = $request->leadtime;
    $input['delivery_date2'] = $request->leadtime;
    $input['delivery_time1'] = $request->leadtime;
    $input['delivery_time2'] = $request->leadtime;
    $input['delivery'] = $request->delivery;
    $input['rating'] = $request->rating;
    $input['insurance'] = $request->insurance;
    $input['insurance_amount'] = $request->insurance_amount;
    $input['status'] = 1;
    $input['slug'] = Str::slug($request->name);
    $input['user_id'] = auth()->user()->id;

    if ($image = $request->file('image')) {
        File::delete('images/product/' . $product->image);

        $file_name = Str::slug($request->name) . "." . $image->getClientOriginalExtension();
        $path = public_path('/images/product/' . $file_name);
        Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path, 100);
        $input['image'] = $file_name;
    }

    $product->update($input);

    $product->images()->delete();
    $this->createProductImages($request, $product);

    Alert::success('تم تعديل المنتج بنجاح');

    return redirect()->route('vendor.products.index');
}


    // public function update(ProductRequest $request, Product $product)
    // {
    //     $input['name'] = $request->name;
    //     $input['department_id'] = $request->department_id;
    //     $input['description'] = $request->description;
    //     $input['price'] = $request->price;
    //     $input['leadtime'] = $request->leadtime;
    //     $input['delivery'] = $request->delivery;
    //     $input['rating'] = $request->rating;
    //     $input['insurance'] = $request->insurance;
    //     $input['insurance_amount'] = $request->insurance_amount;
    //     $input['status'] = 1;
    //     $input['slug'] = Str::slug($request->name);
    //     $input['user_id'] = auth()->user()->id;

    //     if ($image = $request->file('image')) {
    //         File::delete('images/product/' . $product->image);

    //         $file_name = Str::slug($request->name) . "." . $image->getClientOriginalExtension();
    //         $path = public_path('/images/product/' . $file_name);
    //         Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
    //             $constraint->aspectRatio();
    //         })->save($path, 100);
    //         $input['image'] = $file_name;
    //     }

    //     $product->update($input);

    //     $product->images()->delete();
    //     $this->createProductImages($request, $product);

    //     Alert::success('تم تعديل المنتج بنجاح');

    //     return redirect()->route('vendor.products.index');
    // }

    public function destroy(Product $product)
    {
        // dd( $product);
        if($product->user_id != auth()->user()->id){
            abort(404);
        }
        File::delete('images/product/' . $product->image);

        $product->delete();
        $product->images()->delete();

        Alert::success('تم حذف المنتج بنجاح');

        return redirect()->route('vendor.products.index');
    }

    public function createProductImages(ProductRequest $request, Product $product)
    {
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $file_name = Str::slug(time() . $image->getClientOriginalName()) . "." . $image->getClientOriginalExtension();
                $path = public_path('/images/product/' . $file_name);
                Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);
                $product->images()->create([
                    'image' => $file_name
                ]);
            }
        }
    }

    public function accept($id)
    {
        $product = Product::find($id);
        $product->update(['status' => 'accepted']);
        return back()->with('success', trans('تم قبول المنتج بنجاح'));
    }

    public function reject(Request $request, $id)
    {
        $product = Product::find($id);

        $request->validate(['rejected_reason' => 'required']);

        $product->update(['status' => 'rejected', 'rejected_reason' => $request->rejected_reason]);

        return back()->with('success', trans('تم رفض المنتج بنجاح'));
    }
}
