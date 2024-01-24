<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Traits\JodaResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::query()->latest()->paginate(10);
        return view('admin.department.index', compact('departments'));
    }

    public function store(DepartmentRequest $request)
    {
        $request_data = $request->except(['cover']);
        if ($image = $request->file('cover')) {
            $file_name = Str::slug($request->name).".".$image->getClientOriginalExtension();
            $path = public_path('/admin-assets/img/department/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $request_data['cover'] = $file_name;
        }
        Department::create($request_data);
        return back()->with('success', trans('تم اضافه القسم بنجاح'));
    }
    public function update(DepartmentRequest $request, Department $department)
    {
        $request_data = $request->except(['cover']);
        if ($image = $request->file('cover')) {
            if($department->cover != null && file_exists(public_path('/admin-assets/img/department/' . $department->cover))){
                unlink('admin-assets/img/department/' . $department->cover);
            }
            $file_name = Str::slug($request->name).".".$image->getClientOriginalExtension();
            $path = public_path('/admin-assets/img/department/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $request_data['cover'] = $file_name;
        }
        $department->update($request_data);
        return back()->with('success', trans('تم تعديل القسم بنجاح'));
    }
    public function destroy(Department $department)
    {
        if($department->cover != null && file_exists(public_path('/admin-assets/img/department/' . $department->cover))){
            unlink('admin-assets/img/department/' . $department->cover);
        }
        $department->delete();
        return back()->with('success', trans('تم حذف القسم بنجاح'));
    }
}
