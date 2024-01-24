<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $user = User::find(request('user_id'));
        // dd($user);
        // $cart = $user->carts->with('user')->where('status', 'pending')->first();
        $cart = Cart::where('user_id', request('user_id'))
            ->where('status', 'pending')
            ->with('user', 'products')
            ->first();


        return response()->json($cart);
    }

    // public function store()
    // {

    //     $user = User::find(request('user_id'));
    //     // dd($user);
    //     $findProduct = Product::find(request('product_id'));

    //     $cart = $user->carts->where('status', 'pending')->first();
    //     if ($cart) {
    //         // if product already exists in cart then update quantity and total
    //         $product = $cart->cartProducts->where('product_id', request('product_id'))->first();
    //        // $find_product = Product::where('id', request('product_id'))->first();
    //         if ($product) {
    //             $product->quantity = $product->quantity + request('quantity');
    //             $product->total = $product->quantity * $product->price;
    //             $product->save();
    //             $cart->total += $product->quantity * $product->price;
    //         } else {
    //             $cart->cartProducts()->create([
    //                 'user_id' => $findProduct->user_id,
    //                 'product_id' => request('product_id'),
    //                 'quantity' => request('quantity'),
    //                 'price' => request('price'),
    //                 'insurance_amount' => request('insurance_amount'),
    //                 'total' => request('price') * request('quantity'),
    //             ]);
    //         }

    //         $amount = (request('price') * request('quantity')) + request('insurance_amount');
    //         $tax = setting('tax') ? $amount * setting('tax') / 100 : 0;
    //         $admin_ratio = setting('admin_ratio') ? $amount * setting('admin_ratio') / 100 : 0;

    //         $cart->admin_ratio += $admin_ratio;
    //         $cart->tax += $tax;
    //         $cart->amount += $amount;
    //         $cart->insurance_amount += request('insurance_amount');
    //         $cart->total += $amount + $tax + $admin_ratio;
    //         $cart->save();

    //         return response()->json($cart);
    //     } else {
    //         $cart = $user->carts()->create([
    //             'user_id' => request('user_id')
    //         ]);
    //         $cart->cartProducts()->create([
    //             'user_id' => $findProduct->user_id,
    //             'product_id' => request('product_id'),
    //             'quantity' => request('quantity') ? request('quantity') : 1,
    //             'price' => request('price'),
    //             'total' => request('price') * request('quantity'),
    //             'insurance_amount' => request('insurance_amount'),
    //             'commission' => setting('is_fixed_commission') ? setting('commission') : (request('price') * setting('commission') / 100) ?? 0
    //         ]);

    //         $amount = (request('price') * request('quantity')) + request('insurance_amount');
    //         $tax = setting('tax') ? $amount * setting('tax') / 100 : 0;
    //         $admin_ratio = setting('admin_ratio') ? $amount * setting('admin_ratio') / 100 : 0;

    //         $cart->admin_ratio += $admin_ratio;
    //         $cart->tax += $tax;
    //         $cart->amount += $amount;
    //         $cart->insurance_amount += request('insurance_amount');
    //         $cart->total += $amount + $tax + $admin_ratio;
    //         $cart->save();
    //         return response()->json($cart);
    //     }
    // }
    public function store()
    {
        $user = User::find(request('user_id'));
        $findProduct = Product::find(request('product_id'));
        $from = request('from');
        $to = request('to');
        $cart = $user->carts->where('status', 'pending')->first();

        if (!$cart) {
            $cart = $user->carts()->create(['user_id' => request('user_id')]);
        }

        $quantity = request('quantity') ? request('quantity') : 1;
        $price = request('price');
        $insuranceAmount = request('insurance_amount');
        $productTotal = $quantity * $price;
        $totalAmount = $productTotal + $insuranceAmount;
        $tax = setting('tax') ? $totalAmount * setting('tax') / 100 : 0;
        // $adminRatio = setting('admin_ratio') ? $totalAmount * setting('admin_ratio') / 100 : 0;

        $cartProduct = $cart->cartProducts->where('product_id', request('product_id'))->first();

        if ($cartProduct) {
            $cartProduct->quantity += $quantity;
            $cartProduct->total = $cartProduct->quantity * $cartProduct->price;
            $cartProduct->save();
        } else {
            $cart->cartProducts()->create([
                'user_id' => $findProduct->user_id,
                'product_id' => request('product_id'),
                'delivery_date1'=>$from,
                'delivery_date2'=>$to,
                'quantity' => $quantity,
                'price' => $price,
                'total' => $productTotal,
                'insurance_amount' => $insuranceAmount,
                'commission' => setting('is_fixed_commission') ? setting('commission') : ($price * setting('commission') / 100) ?? 0
            ]);
        }

        // $cart->admin_ratio += $adminRatio;
        $cart->tax += $tax;
        $cart->amount += $totalAmount;
        $cart->insurance_amount += $insuranceAmount;
        $cart->total += $totalAmount + $tax;
        $cart->save();

        return response()->json($cart);
    }

    public function destroy()
    {
        $user = User::find(request('user_id'));
        $cart = $user->carts->where('status', 'pending')->first();
        $product = $cart->cartProducts->where('product_id', request('product_id'))->first();
        $product->delete();

        $amount = ($product->price * $product->quantity) + $product->insurance_amount;
        $tax = setting('tax') ? $amount * setting('tax') / 100 : 0;
        $admin_ratio = setting('commission') ? $amount * setting('commission') / 100 : 0;

        // $cart->admin_ratio -= $admin_ratio;
        $cart->tax -= $tax;
        $cart->amount -= $amount;
        $cart->total -= $amount + $tax;

        if ($cart->cartProducts->count() <= 1) {
            $cart->delete();
        } else {
            $cart->save();
        }

        return response()->json($cart);
    }

    public function submit()
    {
        $user = User::find(request('user_id'));
        $cart = $user->carts->where('status', 'pending')->first();
        $cart->status = 'completed';
        $cart->save();
        // send notification to vendors
        foreach ($cart->cartProducts as $product) {
            $product->product->vendor->notify(new \App\Notifications\NewOrder($cart));
        }
        return response()->json($cart);
    }
}
