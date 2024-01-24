<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Notifications\NewOrder;
use App\Service\ClickPay;
use Illuminate\Http\Request;
use Nafezly\Payments\Classes\ClickPayPayment;

class PaymentController extends Controller
{
    public function payment()
    {
        $user = User::find(auth()->user()->id);
        $cart = $user->carts->where('status', 'pending')->first();
        $response = ClickPay::store($cart, $user);
        if (isset($response['redirect_url'])) {
            return redirect($response['redirect_url']);
        } else {
            return redirect()->back()->with('error', 'حدث خطأ أثناء الدفع.');
        }
    }

    public function callback(Request $request)
    {

        $payment = new ClickPayPayment();
        $response = $payment->verify($request);
        $user = auth()->user();
        $cart = $user->carts->where('status', 'pending')->first();

        if ($response['success']) {
            $cart = Cart::find($cart->id);
            $cart->status = 'processing';
            $cart->tran_ref = $response['payment_id'];
            $cart->save();

            foreach ($cart->cartProducts as $product) {
                $product->product->vendor->notify(new NewOrder($cart));
            }

            return redirect()->route('front.home')->with('success', 'تم الدفع بنجاح');
        } else {
            return redirect()->back()->with('error', 'حدث خطأ أثناء الدفع.');
        }
    }
}
