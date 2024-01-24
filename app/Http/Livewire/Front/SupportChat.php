<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\SupportChat as Chat;
use Livewire\WithFileUploads;

class SupportChat extends Component
{
    use WithFileUploads;
    public $chat, $message = "", $attachment, $image ,$employee;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount(Chat $chat)
    {
        $this->chat = $chat;
    }
    public function render()
    {

        $this->chat->refresh();
        $this->chat->markAsRead(auth()->user());
        // $conv = $this->conv;
        $messages = $this->chat->messages;
        return view('livewire.front.support-chat', compact('messages'));
    }

    // public function messageSend()
    // {
    //     $this->chat->messages()->create([
    //         'user_id' => auth()->user()->id,
    //         'message' => $this->message
    //     ]);
    //     $this->reset('message');
    // }
    public function messageSend()
    {
        $this->validate([
            'attachment' => 'nullable|file',
            'image' => 'nullable|file',
        ]);
        $data = [
            'user_id' => auth()->user()->id,
            'message' => $this->message
        ];
        if (isset($this->attachment)) {
            $data['attachment'] = store_file($this->attachment, 'suuport');
        }
        if (isset($this->image)) {
            $data['image'] = store_file($this->image, 'suuport');
        }
        // dd($data, $dat);
        $this->chat->messages()->create($data);
        $this->reset('message', 'attachment', 'image');
        $this->emit('refreshComponent');
    }
}
