<?php

namespace App\Http\Controllers\Admin;

use App\Models\service;
use Illuminate\Http\Request;
use App\Traits\JodaResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\serviceRequest;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::query()->latest()->paginate(10);
        return view('admin.service.index', compact('services'));
    }

    public function store(ServiceRequest $request)
    {
        $request_data = $request->except(['cover']);
        if ($image = $request->file('cover')) {
            $file_name = Str::slug($request->name).".".$image->getClientOriginalExtension();
            $path = public_path('/admin-assets/img/service/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $request_data['cover'] = $file_name;
        }
        service::create($request_data);
        return back()->with('success', trans('تم اضافه الخدمه بنجاح'));
    }
    public function update(ServiceRequest $request, Service $service)
    {
        $request_data = $request->except(['cover']);
        if ($image = $request->file('cover')) {
            if($service->cover != null && file_exists(public_path('/admin-assets/img/service/' . $service->cover))){
                unlink('admin-assets/img/service/' . $service->cover);
            }
            $file_name = Str::slug($request->name).".".$image->getClientOriginalExtension();
            $path = public_path('/admin-assets/img/service/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $request_data['cover'] = $file_name;
        }
        $service->update($request_data);
        return back()->with('success', trans('تم تعديل الخدمه بنجاح'));
    }
    public function destroy(Service $service)
    {
        if($service->cover != null && file_exists(public_path('/admin-assets/img/service/' . $service->cover))){
            unlink('admin-assets/img/service/' . $service->cover);
        }
        $service->delete();
        return back()->with('success', trans('تم حذف الخدمه بنجاح'));
    }
}
