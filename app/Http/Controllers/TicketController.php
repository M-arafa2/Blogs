<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Models\TicketComment;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{



    public function index()
    {
        $tickets = auth()->user()->tickets;

        return view('front.tickets', compact('tickets'));
    }

    public function show($id)
    {
        $ticket = Ticket::find($id);

        return view('front.showTickets', compact('ticket'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        ContactUs::create($validated);

        return redirect()->back()->with('success', "تم الارسال بنجاح");
    }

    public function storeComment(Request $request, $id)
    {
        $validated = $request->validate([
            'comment' => 'required',
        ]);

        $ticketComment = new TicketComment();
        $ticketComment->ticket_id = $id;
        $ticketComment->user_id = auth()->user()->id;
        $ticketComment->comment = $request->comment;
        $ticketComment->save();

        return redirect()->back()->with('success', "تم الارسال بنجاح");
    }
}
