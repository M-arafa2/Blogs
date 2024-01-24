<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Traits\JodaResource;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{

    public function index()
    {
        $active = Product::where('status', 1)->count();
        $unactive = Product::where('status', 0)->count();
        $products = Product::latest()->where(function ($query) {
            $vendorId = request()->has('vendor') ? request()->get('vendor') : null;
            if ($vendorId) {
                $query->where('user_id', $vendorId);
            }
        })->when(request('status'), function ($q) {
            $q->where('status', request('status'));
        })->paginate(10);
        return view('admin.product.index', compact('products', 'active', 'unactive'));
    }
    // public function create()
    // {
    //    return view('admin.user.create');
    // }
    // public function store(UserRequest $request)
    // {
    //     try{
    //         $input['type'] = 'user';
    //         $input['gender'] = $request->gender;
    //         $input['country_id'] = $request->country_id;
    //         $input['city_id'] = $request->city_id;
    //         $input['name'] = $request->name;
    //         $input['email'] = $request->email;
    //         $input['email_verified_at'] = now();
    //         $input['password'] = bcrypt($request->password);
    //         $input['phone'] = $request->phone;
    //         User::create($input);
    //         Alert::success('عمليه ناجحه', 'تمت الاضافه بنجاح');
    //         return redirect()->route('admin.users.index');
    //     }
    //     catch(\Exception $e){
    //         return redirect()->back()->with('error',$e->getMessage());
    //     }
    // }
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }
    // public function edit(User $user)
    // {
    //     return view('admin.user.edit',compact('user'));
    // }
    // public function update(UserRequest $request, User $user)
    // {
    //     $input['type'] = 'user';
    //     $input['gender'] = $request->gender;
    //     $input['country_id'] = $request->country_id;
    //     $input['city_id'] = $request->city_id;
    //     $input['name'] = $request->name;
    //     $input['email'] = $request->email;
    //     if(trim($request->password) != ''){
    //         $input['password'] = bcrypt($request->password);
    //     }
    //     $input['phone'] = $request->phone;
    //     $user->update($input);
    //     Alert::success('عمليه ناجحه', 'تم التعديل بنجاح');
    //     return redirect()->route('admin.users.index');
    // }
    public function destroy(Product $product)
    {
        $product->delete();
        Alert::success('عمليه ناجحه', 'تم الحذف بنجاح');
        return redirect()->back();
    }
    public function change_status($id)
    {
        $productID = Crypt::decrypt($id);
        $product = product::findorfail($productID);
        ($product->status == '1') ? $product->status = 0 : $product->status = 1;
        $product->update();
        return redirect()->back()->with('success', trans('تم تغيير حاله المنتج بنجاح'));
    }
    public function accept($id)
    {
        $product = Product::find($id);
        $product->update(['acceptance' => 'accepted']);
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
