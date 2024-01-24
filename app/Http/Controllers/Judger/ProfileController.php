<?php

namespace App\Http\Controllers\Judger;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Commercial;
use App\Models\Country;
use App\Models\License;
use App\Models\Occupation;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function settings()
    {
        $user = auth()->user()->load(['country', 'city','occupation']);
        $countries = Country::all();
        $cities = City::all();
        $occupations = Occupation::where('type','judger')->get();
        return view('judgers.settings', compact('user', 'countries', 'cities','occupations'));
    }
    public function updateSettings(Request $request)
    {
        $user = User::findOrFail($request->id);
        $data = $request->validate([
            'city_id' => 'required',
            'first_name' => 'required',
            'second_name' => 'required',
            'third_name' => 'required',
            'last_name' => 'required',
            'phone' => ['required', 'unique:users,phone,' . $user->id],
            'id_number' => ['required', 'unique:users,id_number,' . $user->id],
            'email' => ['required', 'unique:users,email,' . $user->id],
            'gender' => 'required',
            'company_number' => 'nullable',
            'company_name' => 'nullable',
            'country_id' => 'required',
            'address' => 'nullable',
            'occupation_id'=>'required'
        ]);
        if ($request->image) {
            delete_file($user->photo);
            $data['photo'] = store_file($request->image, 'users');
        }
        $user->update($data);
        return back()->with('success', 'تم تعديل البيانات بنجاح');
    }

    public function documents()
    {
        $user = auth()->user()->load(['license', 'commercial']);
        return view('judgers.documents', compact('user'));
    }
    public function license(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'license' => 'required',
            'end_at' => 'required',
        ]);
        $user = User::findOrFail($request->user_id);
        $user->license()->delete();
        $data['file'] = store_file($request->license, 'licenses');
        License::create($data);
        return back()->with('success', 'تم رفع الرخصة بنجاح');
    }
    public function commercial(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'commercial' => 'required',
            'end_at' => 'required',
        ]);
        $user = User::findOrFail($request->user_id);
        $user->commercial()->delete();
        $data['file'] = store_file($request->commercial, 'commercials');
        Commercial::create($data);
        return back()->with('success', 'تم رفع السجل بنجاح');
    }

    public function companyInfo(Request $request){
        $data=$request->validate([
            'file'=>'required',
            'company_name'=>'required',
            'company_number'=>'required',
        ]);
        $data['contract']=store_file($request->file,'company-contracts');
        $user=User::findOrFail($request->user_id);
        $user->update($data);
        return back()->with('success','تم رفع العقد بنجاح');
    }
}
