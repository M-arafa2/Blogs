<?php

namespace App\Http\Livewire\Front\Messages;

use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageNotification;
use Livewire\Component;

class Index extends Component
{
    public $offer, $message;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.front.messages.index');
    }

    public function send()
    {
        $this->validate([
            'message' => 'required',
        ]);

        $message = Message::create([
            'offer_id' => $this->offer->id,
            'order_id' => $this->offer->order->id,
            'user_id' => auth()->user()->id,
            'message' => $this->message,
        ]);

        if (auth()->user()->id == $this->offer->order->user->id) {
            $user = User::find($this->offer->user->id);
        } else {
            $user = User::find($this->offer->order->user->id);
        }

        $user->notify(new MessageNotification($message));

        $this->reset('message');

        $this->emit('refreshComponent');

        //session()->flash('success', 'تم إرسال الرسالة بنجاح.');
    }
}
