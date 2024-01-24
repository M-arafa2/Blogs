<?php

namespace App\Http\Livewire\Front\Balance;

use App\Models\Cart;
use App\Models\Balance;
use App\Models\Product;
use Livewire\Component;
use App\Models\CreditCard;

class Index extends Component
{
    public $amount, $card_name, $expire_date, $card_no, $save_card = true, $coupon_no, $type = 'credit', $status = 'available';
    public $start_date, $end_date;

    public function render()
    {
        if (auth()->user()->type == 'vendor') {
            $carts = Cart::whereHas('products', function ($q) {
                $q->where('products.user_id', auth()->user()->id);
            })->where('status', 'processing')
                ->where(function ($query) {
                    if ($this->start_date) {
                        $query->where('created_at', '>', $this->start_date);
                    }
                    if ($this->end_date) {
                        $query->where('created_at', '<', $this->end_date);
                    }
                })
                ->get();
        } else {
            $carts = auth()->user()->carts()->latest()->where('status', '<>', 'pending')->get();
        }

        $totals = [
            'pending' => auth()->user()->products->sum('total_processing'),
            'compeleted' => auth()->user()->products->sum('total_compeleted'),
            'total' => auth()->user()->products->sum('total_cart'),
        ];
        return view('livewire.front.balance.index', compact('carts', 'totals'));
    }

    public function save()
    {
        if ($this->type == 'credit') {
            $data = $this->validate([
                'amount' => 'required|numeric|min:1',
                'card_name' => 'required|max:191',
                'expire_date' => 'required',
                'card_no' => 'required|integer',
                'status' => 'nullable',
            ]);

            if ($this->save_card) {

                unset($data['status']);

                unset($data['amount']);

                $data['user_id'] = auth()->user()->id;

                CreditCard::create($data);
            }
        } elseif ($this->type == 'paypal') {
            $data = $this->validate([
                'amount' => 'required|numeric|min:1',
                'status' => 'nullable',
            ]);
        } else {
            $data = $this->validate([
                'coupon_no' => 'required',
                'status' => 'nullable',
            ]);
        }

        Balance::create([
            'user_id' => auth()->user()->id,
            'amount' => $this->amount,
            'status' => $this->status,
        ]);

        $this->reset();

        session()->flash('success', 'تم شحن الرصيد بنجاح.');

        return redirect()->route('balance.index');
    }
}
