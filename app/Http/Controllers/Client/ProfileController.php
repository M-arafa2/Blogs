<?php

namespace App\Http\Controllers\Client;

use App\Models\City;
use App\Models\User;
use App\Models\Country;
use App\Models\License;
use App\Models\Commercial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ProfileuserRequest;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('front.user.profile');
    }
    public function editprofile()
    {
        return view('front.user.editProfile');
    }
    public function update_profile(ProfileuserRequest $request)
    {
        $user = auth()->user();
        $input['type'] = 'user';
        $input['gender'] = $request->gender;
        $input['country_id'] = $request->country_id;
        $input['city_id'] = $request->city_id;
        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['age'] = $request->age;
        $input['language'] = $request->language;
        $input['location'] = $request->location;
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
        $user->update($input);
        toast('تم تعديل الملف الشخصي', 'success');
        return back();
    }


    public function deleteAccount(Request $request)
    {
        $user = auth()->user()->id;
        User::find($user)->delete();
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
// public function profile()
// {
//     return view('clients.profile');
// }
// public function settings()
// {
//     $user = auth()->user()->load(['country', 'city']);
//     $countries = Country::all();
//     $cities = City::all();
//     return view('clients.settings', compact('user', 'countries', 'cities'));
// }
// public function updateSettings(Request $request)
// {
//     $user = User::findOrFail($request->id);
//     $data = $request->validate([
//         'city_id' => 'required',
//         'first_name' => 'required',
//         'second_name' => 'required',
//         'third_name' => 'required',
//         'last_name' => 'required',
//         'phone' => ['required', 'unique:users,phone,' . $user->id],
//         'id_number' => ['required', 'unique:users,id_number,' . $user->id],
//         'email' => ['required', 'unique:users,email,' . $user->id],
//         'gender' => 'required',
//         'company_number' => 'nullable',
//         'company_name' => 'nullable',
//         'country_id' => 'required',
//         'address' => 'nullable',
//     ]);
//     if ($request->image) {
//         delete_file($user->photo);
//         $data['photo'] = store_file($request->image, 'users');
//     }
//     $user->update($data);
//     return back()->with('success', 'تم تعديل البيانات بنجاح');
// }

// public function documents()
// {
//     $user = auth()->user()->load(['license', 'commercial']);
//     return view('clients.documents', compact('user'));
// }
// public function license(Request $request)
// {
//     $data = $request->validate([
//         'user_id' => 'required',
//         'name' => 'required',
//         'license' => 'required',
//         'end_at' => 'required',
//     ]);
//     $user = User::findOrFail($request->user_id);
//     $user->license()->delete();
//     $data['file'] = store_file($request->license, 'licenses');
//     License::create($data);
//     return back()->with('success', 'تم رفع الرخصة بنجاح');
// }
// public function commercial(Request $request)
// {
//     $data = $request->validate([
//         'user_id' => 'required',
//         'name' => 'required',
//         'commercial' => 'required',
//         'end_at' => 'required',
//     ]);
//     $user = User::findOrFail($request->user_id);
//     $user->commercial()->delete();
//     $data['file'] = store_file($request->commercial, 'commercials');
//     Commercial::create($data);
//     return back()->with('success', 'تم رفع السجل بنجاح');
// }

// public function companyInfo(Request $request){
//     $data=$request->validate([
//         'file'=>'required',
//         'company_name'=>'required',
//         'company_number'=>'required',
//     ]);
//     $data['contract']=store_file($request->file,'company-contracts');
//     $user=User::findOrFail($request->user_id);
//     $user->update($data);
//     return back()->with('success','تم رفع العقد بنجاح');
// }
}
