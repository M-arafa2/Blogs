<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Traits\JodaResource;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    use JodaResource;
    public $route='admin.contact-us';
    public function query($query)
    {

        return $query->latest()->paginate(10);
    }


    public function show($id)
    {
        $contact = ContactUs::find($id);

        return view('admin.contact-us.show',compact('contact'));
    }
}
