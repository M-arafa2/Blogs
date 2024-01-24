<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Traits\JodaResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\TicketRequest;
use App\Models\Ticket;
use App\Models\TicketComment;
use App\Models\User;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::when(request('status'), function ($q) {
            $q->where('status', request('status'));
        })->latest()->paginate(10);
        return view('admin.tickets.index', compact('tickets'));
    }

    public function store(TicketRequest $request)
    {
    // dd( $request->all());
        $request_data = $request->except(['image']);
        if ($image = $request->file('image')) {
            $file_name = Str::slug($request->title) . "." . $image->getClientOriginalExtension();
            // $path = public_path('/admin-assets/img/tickets/' . $file_name);
            $path = public_path('/uploads/tickets/' . $file_name);

            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $request_data['image'] = $file_name;
        }
        // if (isset($request_data['image'])) {
        //     $request_data['image'] = store_file($request_data['image'], 'tickets');
        // }
        Ticket::create($request_data);
        return back()->with('success', trans('تم اضافه التذكره بنجاح'));
    }
    public function update(TicketRequest $request,  $id)
    {
        // dd($request->all());
        $department = Ticket::find($id);

        $request_data = $request->except(['cover']);
        if ($image = $request->file('cover')) {
            if ($department->cover != null && file_exists(public_path('/admin-assets/img/tickets/' . $department->cover))) {
                unlink('admin-assets/img/tickets/' . $department->cover);
            }
            $file_name = Str::slug($request->name) . "." . $image->getClientOriginalExtension();
            $path = public_path('/admin-assets/img/tickets/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $request_data['image'] = $file_name;
        }

        $department->update($request_data);
        return back()->with('success', trans('تم تعديل التذكرة بنجاح'));
    }
    public function destroy($id)
    {
        $department = Ticket::find($id);
        if ($department->image != null && file_exists(public_path('/admin-assets/img/tickets/' . $department->cover))) {
            unlink('admin-assets/img/tickets/' . $department->cover);
        }
        $department->delete();
        return back()->with('success', trans('تم حذف التذكره بنجاح'));
    }

    public function replaysTicket($id)
{
    $ticket = Ticket::find($id);
    // dd( $ticket);

    return view('admin.tickets.replaysTicket', compact('ticket')); 
}

    public function storeComment(Request $request)
    {
        //  dd( $request->all());
        $request->validate([
            'comment' => 'required',
            'ticket_id' => 'required',
            'user_id' => 'required',
            // 'filename' => 'required',
            // 'filename.*' => 'mimes:doc,pdf,docx,zip'
        ]);
        $ticket = new TicketComment();
        $ticket->ticket_id = $request->ticket_id;
        $ticket->comment = $request->comment;
        $ticket->user_id = $request->user_id;
        // if ($request->hasfile('filename')) {
        //     foreach ($request->file('filename') as $file) {
        //         $name = $file->getClientOriginalName();
        //         $file->move(public_path() . '/files/', $name);
        //         $data[] = $name;
        //     }
        // }
        // $ticket->filename = json_encode($data);
        $ticket->save();
        // $comment = TicketComment::create([
        //     'comment' => $request->comment,
        //     'ticket_id' => $request->ticket_id,
        //     'user_id' => $request->user_id,
        // ]);

        // $ticket = Ticket::findOrFail($request->ticket_id);
        // $user = User::findOrFail($ticket->user_id);
        // $link = route('tickets.show', $ticket->id);
        // $title = ' لديك تعليق جديد على التذكرة' . $ticket->title;

        // $user->notify(new DatabaseNotification($title, $link));

        return redirect()->back()->with('success', trans('تمت الاضافه بنجاح'));
    }
}
