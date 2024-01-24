<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Livewire\WithFileUploads;

class Conversation extends Component
{
    use WithFileUploads;
    public $conv, $comment = "", $attachment, $image;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount($conv)
    {
        $this->conv = $conv;
    }
    public function render()
    {
        $this->conv->refresh();
        $this->conv->markAsRead(auth()->user());
        $conv = $this->conv;

        return view('livewire.front.conversation', compact('conv'));
    }

    public function messageSend()
    {
        $this->validate([
            'attachment' => 'nullable|file',
            'image' => 'nullable|file',
        ]);
        $data = [
            'user_id' => auth()->user()->id,
            'message' => $this->comment
        ];
        if (isset($this->attachment)) {
            $data['attachment'] = store_file($this->attachment, 'convs');
        }
        if (isset($this->image)) {
            $data['image'] = store_file($this->image, 'convs');
        }
        // dd($data, $dat);
        $this->conv->messages()->create($data);
        $this->reset('comment', 'attachment', 'image');
        $this->emit('refreshComponent');
    }
}
