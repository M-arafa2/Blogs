<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConversationController extends Controller
{
    public function index()
    {
        if (auth()->user()->type == 'vendor') {
            $messages = auth()->user()->incomingMessages()->paginate(10);
        } else {
            $messages = auth()->user()->outgoingMessages()->paginate(10);
        }
        return view('front.vendor.conversations', compact('messages'));
    }
}
