<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Livewire\WithFileUploads;

class AddTicket extends Component
{
    use WithFileUploads;
    public $title, $subject, $desc, $image;
    public function render()
    {
        return view('livewire.front.add-ticket');
    }

    public function save()
    {
        $data = $this->validate([
            'title' => 'required',
            'subject' => 'required',
            'desc' => 'required',
            'image' => 'nullable'
        ]);
        if (isset($data['image'])) {
            $data['image'] = store_file($data['image'], 'tickets');
        }
        auth()->user()->tickets()->create($data);
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'تم إضافة التذكرة بنجاح']);
        $this->reset(['title', 'subject', 'desc', 'image']);
        return redirect()->route('tickets');

    }
}
