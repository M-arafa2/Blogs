<?php

namespace App\Http\Controllers\Vendor;

use App\Models\City;
use App\Models\User;
use App\Models\Country;
use App\Models\License;
use App\Models\Commercial;
use App\Models\Occupation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\VendorMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ProfilevendorRequest;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('front.vendor.profile');
    }

    public function goToMessage(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'vendor_id' => 'required'
        ]);
        $ifExsit = VendorMessage::where('user_id', $data['user_id'])->where('vendor_id', $data['vendor_id'])->first();
        if (!$ifExsit) {
            $ifExsit = VendorMessage::create($data);
        }

        $id = Crypt::encryptString($ifExsit->id);
        return redirect()->route('vendor.conv', $id);
    }
    public function editprofile()
    {
        return view('front.vendor.editProfile');
    }
    public function update_profile(ProfilevendorRequest $request)
    {
        // dd('w');
        $vendor = auth()->user();
        // $input['type'] = 'vendor';
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
        $input['department_id'] = $request->department_id;
        $input['desc'] = $request->desc;
        $input['bank'] = $request->bank;
        $input['age'] = $request->age;
        $input['language'] = $request->language;
        $input['location'] = $request->location;
        $input['freelance_document'] = $request->freelance_document;
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
        if ($freelance_image = $request->file('freelance_image')) {
            delete_file($vendor->freelance_image);
            $input['freelance_image'] = store_file($freelance_image, 'users');
        }
        $input['type'] = 'vendor';
        $vendor->update($input);
        toast('تم تعديل الملف الشخصي', 'success');
        return back();

    }
// public function settings()
// {
//     $user = auth()->user()->load(['country', 'city','occupation']);
//     $countries = Country::all();
//     $cities = City::all();
//     $occupations = Occupation::where('type','vendor')->get();
//     return view('vendors.settings', compact('user', 'countries', 'cities','occupations'));
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
//         'occupation_id'=>'required'
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
//     return view('vendors.documents', compact('user'));
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
