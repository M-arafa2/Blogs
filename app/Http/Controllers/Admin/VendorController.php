<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\VendorRequest;
use App\Models\CartProduct;
use App\Models\User;
use App\Traits\JodaResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class VendorController extends Controller
{

    public function index()
    {
        $active   = User::where('type', 'vendor')->where('status', 1)->count();
        $unactive = User::where('type', 'vendor')->where('status', 0)->count();
        $vendors  = User::where('type', 'vendor')->latest()->paginate(10);
        return view('admin.vendor.index', compact('vendors', 'active', 'unactive'));
    }
    public function create()
    {
        return view('admin.vendor.create');
    }
    public function store(VendorRequest $request)
    {
        // dd($request->all());
        try {
            $input['type'] = 'vendor';
            $input['gender'] = $request->gender;
            $input['country_id'] = $request->country_id;
            $input['city_id'] = $request->city_id;
            $input['name'] = $request->name;
            $input['email'] = $request->email;
            $input['email_verified_at'] = now();
            $input['password'] = bcrypt($request->password);
            $input['phone'] = $request->phone;
            $input['maarouf_link'] = $request->maarouf_link;
            $input['commercial_no'] = $request->commercial_no;
            $input['tax_id'] = $request->tax_id;
            $input['merchant_address'] = $request->merchant_address;
            $input['department_id'] = $request->department_id;
            $input['desc'] = $request->desc;
            $input['bank'] = $request->bank;
            $input['to'] = $request->to;
            $input['from'] = $request->from;
            $input['rating'] = $request->rating;

             $input['price_from'] = $request->price_from;
            $input['price_to'] = $request->price_to;
            $input['service'] = $request->service;
            if ($image = $request->file('image')) {
                $file_name = Str::slug($request->name) . "." . $image->getClientOriginalExtension();
                $path = public_path('/images/vendor/' . $file_name);
                Image::make($image->getRealPath())->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);
                $input['image'] = $file_name;
            }
            $latitude = $request->lat;
            $longitude = $request->long;
            $input['lat'] = $latitude;
            $input['long'] = $longitude;
            User::create($input);
            Alert::success('عمليه ناجحه', 'تمت الاضافه بنجاح');
            return redirect()->route('admin.vendors.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function show(User $vendor)
    {
        return view('admin.vendor.show', compact('vendor'));
    }
    public function edit(User $vendor)
    {
        return view('admin.vendor.edit', compact('vendor'));
    }
    public function update(VendorRequest $request, User $vendor)
    {
        $input['type'] = 'vendor';
        $input['gender'] = $request->gender;
        $input['country_id'] = $request->country_id;
        $input['city_id'] = $request->city_id;
        $input['name'] = $request->name;
        $input['email'] = $request->email;
        if (trim($request->password) != '') {
            $input['password'] = bcrypt($request->password);
        }
        $input['phone'] = $request->phone;
        $input['maarouf_link'] = $request->maarouf_link;
        $input['commercial_no'] = $request->commercial_no;
        $input['tax_id'] = $request->tax_id;       
        $input['department_id'] = $request->department_id;
        $input['merchant_address'] = $request->merchant_address; 
        $input['desc'] = $request->desc;
        $input['bank'] = $request->bank;
        $input['to'] = $request->to;
        $input['from'] = $request->from;
        $input['service'] = $request->service;
        if ($image = $request->file('image')) {
            if ($vendor->image != null && file_exists(public_path('/images/vendor/' . $vendor->image))) {
                unlink('images/vendor/' . $vendor->image);
            }
            $file_name = Str::slug($request->name) . "." . $image->getClientOriginalExtension();
            $path = public_path('/images/vendor/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $input['image'] = $file_name;
        }
        $latitude = $request->lat;
        $longitude = $request->long;
        $input['lat'] = $latitude;
        $input['long'] = $longitude;
        $vendor->update($input);
        Alert::success('عمليه ناجحه', 'تم التعديل بنجاح');
        return redirect()->route('admin.vendors.index');
    }
    public function destroy(User $vendor)
    {
        if ($vendor->image != null && file_exists(public_path('/images/vendor/' . $vendor->image))) {
            unlink('images/vendor/' . $vendor->image);
        }
        $vendor->delete();
        Alert::success('عمليه ناجحه', 'تم الحذف بنجاح');
        return redirect()->back();
    }
    public function change_status($id)
    {
        $vendorID = Crypt::decrypt($id);
        $vendor = User::findorfail($vendorID);
        ($vendor->status  == '1') ? $vendor->status  = 0 : $vendor->status  = 1;
        $vendor->update();
        return redirect()->back()->with('success', trans('تم تغيير حاله مزود الخدمه بنجاح'));
    }

    public function showInvoice(CartProduct $cart_product)
    {
        return view('admin.vendor.showInvoice', compact('cart_product'));
    }
}
