<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Department;
use App\Models\SupportChat as Chat;
use Livewire\WithFileUploads;

class SupportChat extends Component
{
    public $chat, $messages, $message, $status,$attachment,$image, $screen = 'index';
    // public $chat, $message = "", $attachment, $image ,$employee;
    // public $chat, $message = "", $attachment, $image ,$employee;


    public $department_id, $user_id, $order_date;
    public $departments, $clients;
    use WithFileUploads;

    public function mount()
    {
        $this->departments = Department::latest()->get();
        // $this->clients = User::where('type', 'user')->latest()->get();
        $this->clients = User::latest()->get();

    }


    public function render()
    {
        $chats = Chat::latest()->paginate(10);
        $this->messages = $this->chat ? $this->chat->messages : [];
        return view('livewire.admin.support-chat', compact('chats'))->extends('admin.layouts.admin')->section('content');
    }

    public function show($id)
    {
        $this->chat = Chat::find($id);
        $this->messages = $this->chat->messages;
        if (is_null($this->chat->employee_id)) {
            $this->chat->update(['employee_id' => auth()->user()->id]);
        }
        $this->screen = 'show';
    }

    public function messageSend()
{
    $data = [
        'user_id' => auth()->user()->id,
        'message' => $this->message,
    ];

    if ($this->attachment) {
        $data['attachment'] = store_file($this->attachment, 'support');
    }

    if ($this->image) {
        $data['image'] = store_file($this->image, 'support');
    }

    $this->chat->messages()->create($data);

    $this->reset('message', 'attachment', 'image');
}

    // public function messageSend()
    // {
    //     $data = [
    //                 'user_id' => auth()->user()->id,
    //                 'message' => $this->message
    //             ];
    //     if (isset($this->attachment)) {
    //                 $data['attachment'] = store_file($this->attachment, 'suuport');
    //             }
    //             if (isset($this->image)) {
    //                 $data['image'] = store_file($this->image, 'suuport');
    //             }
    //     $this->chat->messages()->create([
    //         'user_id' => auth()->user()->id,
    //         'message' => $this->message
    //     ]);
    //     $this->reset('message');
    // }
    // public function messageSend()
    // {
    //     $this->validate([
    //         'attachment' => 'nullable|file|array',
    //         'image' => 'nullable|file',
    //     ]);
    //     $data = [
    //         'user_id' => auth()->user()->id,
    //         'message' => $this->message
    //     ];
    //     if (isset($this->attachment)) {
    //         $data['attachment'] = store_file($this->attachment, 'suuport');
    //     }
    //     if (isset($this->image)) {
    //         $data['image'] = store_file($this->image, 'suuport');
    //     }
    //     // dd($data, $dat);
    //     $this->chat->messages()->create($data);
    //     $this->reset('message', 'attachment', 'image');
    //     $this->emit('refreshComponent');
    // }
//     public function messageSend()
// {
//     $this->validate([
//         'attachment' => 'nullable|file',
//         'image' => 'nullable|file',
//         'message' => 'required|string',
//     ]);

//     $data = [
//         'user_id' => auth()->user()->id,
//         'message' => $this->message,
//     ];

//     if ($this->attachment) {
//         $data['attachment'] = store_file($this->attachment, 'support');
//     }

//     if ($this->image) {
//         $data['image'] = store_file($this->image, 'support');
//     }

//     $this->chat->messages()->create($data);
//     $this->reset(['message', 'attachment', 'image']); // تفريغ الحقول بعد الإرسال
// }


    public function submit()
    {
        $data = $this->validate([
            'department_id' => 'required',
            'user_id' => 'required',
            'order_date' => 'required'
        ]);
        $chat = Chat::create($data);
        $this->reset([
            'department_id',
            'user_id',
            'order_date'
        ]);
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'تم إضافة طلب جديد بنجاح']);
    }
}
