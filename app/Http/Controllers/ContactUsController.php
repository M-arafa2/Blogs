<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{




    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $message = ContactUs::create($validated);
        return redirect()->back()->with('success', "تم الارسال بنجاح");

        // if (setting('support_mail') && $message) {
        //     try {
        //         Mail::to(setting('support_mail'))->send(new ContactUsMail($message));

        //         return redirect()->back()->with('success', "تم الارسال بنجاح");
        //     } catch (\Exception $ex) {
        //         // return $ex;
        //         return back()->with('error', 'حدث خطأ أثناء ارسال البريد الالكتروني.')->withInput();
        //     }
        // }
        //  else
        //   {
        //     return back()->with('error', 'حدث خطأ أثناء الحفظ')->withInput();
        // }
    }
}
