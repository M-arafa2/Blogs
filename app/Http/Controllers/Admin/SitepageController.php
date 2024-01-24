<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sitepage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SitepageRequest;

class SitepageController extends Controller
{
    // public function __construct()
    // {
    //     //create read update delete
    //     $this->middleware(['permission:read_sitepages'])->only('index');
    //     $this->middleware(['permission:create_sitepages'])->only('create');
    //     $this->middleware(['permission:update_sitepages'])->only('edit');
    //     $this->middleware(['permission:delete_sitepages'])->only('destroy');
    // } //end of constructor
    public function index()
    {
        $sitepages = Sitepage::query()->latest()->paginate(10);
        return view('admin.sitepage.index', compact('sitepages'));
    }
    public function create()
    {
        return view('admin.sitepage.create');
    }

    public function store(SitepageRequest $request)
    {
        Sitepage::create($request->validated());
        return redirect()->route('admin.sitepages.index')->with('success', trans('تم اضافه صفحه الموقع بنجاح'));
    }
    public function edit(Sitepage $sitepage)
    {
        return view('admin.sitepage.edit', compact('sitepage'));
    }

    public function update(SitepageRequest $request, Sitepage $Sitepage)
    {
        $Sitepage->update($request->validated());
        return redirect()->route('admin.sitepages.index')->with('success', trans('تم تعديل صفحه الموقع بنجاح'));
    }

    public function destroy(Sitepage $Sitepage)
    {
        $Sitepage->delete();
        return back()->with('success', trans('تم حذف صفحه الموقع بنجاح'));
    }
}
