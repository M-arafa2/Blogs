<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\JodaResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::query()->latest()->paginate(10);
        return view('admin.slider.index', compact('sliders'));
    }

    public function store(SliderRequest $request)
    {
        $request_data = $request->except(['cover']);
        if ($image = $request->file('cover')) {
            // $file_name = Str::slug($request->title).".".$image->getClientOriginalExtension();
            $file_name = now()->format('Y-m-d-H-i-s') . "." . $image->getClientOriginalExtension();

            $path = public_path('/admin-assets/img/slider/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $request_data['cover'] = $file_name;
        }
        Slider::create($request_data);
        return back()->with('success', trans('تم اضافه السلايدر بنجاح'));
    }
    public function update(SliderRequest $request, Slider $slider)
    {
        $request_data = $request->except(['cover']);
        if ($image = $request->file('cover')) {
            if ($slider->cover != null && file_exists(public_path('/admin-assets/img/slider/' . $slider->cover))) {
                unlink('admin-assets/img/slider/' . $slider->cover);
            }
            $file_name = Str::slug($request->title).".".$image->getClientOriginalExtension();
            $path = public_path('/admin-assets/img/slider/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $request_data['cover'] = $file_name;
        }
        $slider->update($request_data);
        return back()->with('success', trans('تم تعديل السلايدر بنجاح'));
    }
    public function destroy(Slider $slider)
    {
        if ($slider->cover != null && file_exists(public_path('/admin-assets/img/slider/' . $slider->cover))) {
            unlink('admin-assets/img/slider/' . $slider->cover);
        }
        $slider->delete();
        return back()->with('success', trans('تم حذف السلايدر بنجاح'));
    }
}
