<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'website_name' => 'required|string',
            'link' => 'nullable',
            'website_active' => 'required|boolean',
            'tax_number' => 'required',
            'address' => 'required',
            'phone' => 'required|string',
            'record_number' => 'required',
            'build_no' => 'required',
            'whats' => 'required|string',
            'facebook' => 'sometimes|nullable|url',
            'twitter' => 'sometimes|nullable|url',
            'instagram' => 'sometimes|nullable|url',
            'website_inactive_message' => 'required|string',
            'logo' => 'sometimes|nullable',
            'site_icon' => 'sometimes|nullable',
            'support_mail' => 'sometimes|nullable|email',
            'vendor_offers' => 'sometimes|nullable|integer',
            'coordinator_offers' => 'sometimes|nullable|integer',
            'about' => 'sometimes|nullable|string',
            'terms_of_use' => 'sometimes|nullable|string',
            'commission' => 'required|min:0|max:99',
            'tax' => 'required|min:0|max:99',
            'privacy' => 'sometimes|nullable|string',
        ]);

        $input = $request->except(['logo', 'site_icon', 'facebook', 'twitter', 'instagram']);

        if ($request->facebook) {
            $input['facebook'] = $request->facebook;
        }

        if ($request->twitter) {
            $input['twitter'] = $request->twitter;
        }
        if ($request->instagram) {
            $input['instagram'] = $request->instagram;
        }
        if ($logo = $request->file('logo')) {
            if ($setting->logo != null && file_exists(public_path('/admin-assets/img/settings/' . $setting->logo))) {
                unlink('admin-assets/img/settings/' . $setting->logo);
                // File::delete(public_path('admin-assets/img/settings/' . $setting->logo ));
            }
            $file_name = Str::slug($request->website_name) . "." . $logo->getClientOriginalExtension();
            $path = public_path('/admin-assets/img/settings/' . $file_name);

            Image::make($request->file('logo'))->save($path, 80);

            $input['logo'] = $file_name;
        }
        if ($site_icon = $request->file('site_icon')) {
            if ($setting->site_icon != null && file_exists(public_path('/admin-assets/img/settings/' . $setting->site_icon))) {
                unlink('admin-assets/img/settings/' . $setting->site_icon);
                // File::delete(public_path('admin-assets/img/settings/' . $setting->site_icon ));
            }
            $file_name = $request->site_icon->hashName();
            $path = public_path('/admin-assets/img/settings/' . $file_name);
            Image::make($site_icon->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $input['site_icon'] = $file_name;
        }
        setting($input)->save();
        return back()->with('success', trans('Saved.'));
    }
}
