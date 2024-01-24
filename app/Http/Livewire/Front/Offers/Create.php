<?php

namespace App\Http\Livewire\Front\Offers;

use App\Models\Balance;
use App\Models\BalanceOrder;
use App\Models\Offer;
use App\Models\Order;
use App\Models\OrderTerm;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $order, $duration, $amount, $description, $files, $status;

    protected $listeners = ['refreshComponent' => '$refresh'];

    protected function rules()
    {
        return [
            'duration' => 'required|integer',
            'amount' => 'required|numeric',
            'description' => 'required',
            'files' => 'nullable',
            'files.*' => 'file',
        ];
    }

    public function render()
    {
        $order_terms = OrderTerm::orderBy('sort')->get();

        return view('livewire.front.offers.create', compact('order_terms'));
    }


    public function save()
    {
        $data = $this->validate();

        if (isset($this->files)) {

            foreach ($this->files as $file) {

                $files[] = store_file($file, 'offers');
            }

            $data['files'] = json_encode($files);
        }

        $data['order_id'] = $this->order->id;

        $data['user_id'] = auth()->user()->id;

        $data['status'] = 'pending';

        Offer::create($data);

        $this->resetExcept('order');

        session()->flash('success', 'تم إرسال العرض بنجاح.');

        $this->emit('refreshComponent');

        //return redirect()->route('orders');
    }

    public function accept(Offer $offer)
    {
        $offer->update(['status' => 'accepted']);

        $order = Order::find($offer->order_id);

        $order->update(['status' => 'in_progress']);

        BalanceOrder::create([
            'user_id' => $offer->user_id,
            'order_id' => $offer->order_id,
            'offer_id' => $offer->id,
            'amount' => $offer->amount,
        ]);

        $this->resetExcept('order');

        session()->flash('success', 'تم قبول العرض بنجاح.');

        return redirect()->route('orders.show', $offer->order_id);
    }

    public function endOrder(Order $order)
    {
        $order->update(['status' => 'completed']);

        $offer = $order->offers->where('status', 'accepted')->first();

        Balance::create([
            'user_id' => $offer->user_id,
            'amount' => $offer->amount,
            'status' => 'pending',
        ]);

        $user_balance = Balance::where('user_id', $order->user_id)->first();

        $user_balance->update(['amount' => $user_balance->amount - $offer->amount]);

        session()->flash('success', 'تم تسليم العرض بنجاح.');

        return redirect()->route('orders.show', $order->id);
    }
}
