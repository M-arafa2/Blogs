<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Cart;
use App\Models\User;
use App\Traits\JodaResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function index()
    {
        $active   = User::where('type', 'user')->where('status', 1)->count();
        $unactive = User::where('type', 'user')->where('status', 0)->count();
        $users    = User::where('type', 'user')->latest()->paginate(10);
        return view('admin.user.index', compact('users', 'active', 'unactive'));
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(UserRequest $request)
    {
        try {
            $input['type'] = 'user';
            $input['gender'] = $request->gender;
            $input['country_id'] = $request->country_id;
            $input['city_id'] = $request->city_id;
            $input['name'] = $request->name;
            $input['email'] = $request->email;
            $input['email_verified_at'] = now();
            $input['password'] = bcrypt($request->password);
            $input['phone'] = $request->phone;
            $input['freelance_document'] = $request->freelance_document;
            if ($image = $request->file('image')) {
                $file_name = Str::slug($request->name) . "." . $image->getClientOriginalExtension();
                $path = public_path('/images/user/' . $file_name);
                Image::make($image->getRealPath())->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);
                $input['image'] = $file_name;
            }
            if ($freelance_image = $request->file('freelance_image')) {
                $input['freelance_image'] = store_file($freelance_image, 'users');
            }
            User::create($input);
            Alert::success('عمليه ناجحه', 'تمت الاضافه بنجاح');
            return redirect()->route('admin.users.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }
    public function update(UserRequest $request, User $user)
    {
        $input['type'] = 'user';
        $input['gender'] = $request->gender;
        $input['country_id'] = $request->country_id;
        $input['city_id'] = $request->city_id;
        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['freelance_document'] = $request->freelance_document;

        if (trim($request->password) != '') {
            $input['password'] = bcrypt($request->password);
        }
        $input['phone'] = $request->phone;
        if ($image = $request->file('image')) {
            if ($user->image != null && file_exists(public_path('/images/user/' . $user->image))) {
                unlink('images/user/' . $user->image);
            }
            $file_name = Str::slug($request->name) . "." . $image->getClientOriginalExtension();
            $path = public_path('/images/user/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $input['image'] = $file_name;
        }
        if ($freelance_image = $request->file('freelance_image')) {
            delete_file($user->freelance_image);
            $input['freelance_image'] = store_file($freelance_image, 'users');
        }
        $user->update($input);
        Alert::success('عمليه ناجحه', 'تم التعديل بنجاح');
        return redirect()->route('admin.users.index');
    }
    public function destroy(User $user)
    {
        if ($user->image != null && file_exists(public_path('/images/user/' . $user->image))) {
            unlink('images/user/' . $user->image);
        }
        $user->delete();
        Alert::success('عمليه ناجحه', 'تم الحذف بنجاح');
        return redirect()->back();
    }
    public function change_status($id)
    {
        $userID = Crypt::decrypt($id);
        $user = User::findorfail($userID);
        ($user->status  == '1') ? $user->status  = 0 : $user->status  = 1;
        $user->update();
        return redirect()->back()->with('success', trans('تم تغيير حاله العميل بنجاح'));
    }

    
    public function showInvoice(Cart $cart)
    {
        return view('admin.user.showInvoice',compact('cart'));

    }
}
