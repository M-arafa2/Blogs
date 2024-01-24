<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Page;
use App\Models\Sitepage;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function store_contact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'message' => 'required',
            'subject' => 'required|max:255',
            'phone' => 'required|max:20',
            'email' => 'required|email|max:255',
        ], [
            'name.required' => 'حقل الاسم مطلوب.',
            'message.required' => 'حقل المحتوى مطلوب.',
            'subject.required' => 'حقل العنوان مطلوب.',
            'phone.required' => 'حقل الهاتف مطلوب.',
            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'البريد الإلكتروني غير صالح.',
            'name.max' => 'حقل الاسم يجب ألا يتجاوز 255 حرفًا.',
            'subject.max' => 'حقل العنوان يجب ألا يتجاوز 255 حرفًا.',
            'phone.max' => 'حقل الهاتف يجب ألا يتجاوز 20 حرفًا.',
        ]);
        ContactUs::create($data);
        return back()->with('success', 'تم ارسال الرسالة بنجاح');
    }
    public function show($id)
{
    // اقتراح: استخدام findOrFail لتجنب إظهار صفحة خطأ إذا لم يتم العثور على الصفحة
    $pages = Sitepage::findOrFail($id);
    // dd( $pages);

    return view('front.pages_show', compact('pages'));
}
// public function index()
// {
//     $pages=Page::get();


//     return view('front.layouts.front', compact('pages'));
// }

public function show_pages($id)
{
    // $pages = Page::get();

    // اقتراح: استخدام findOrFail لتجنب إظهار صفحة خطأ إذا لم يتم العثور على الصفحة
    $pages = Page::findOrFail($id);
    //  dd( $page);

    return view('front.pages', compact('pages'));
}
}
