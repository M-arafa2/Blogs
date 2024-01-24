<?php

use App\Http\Controllers\Client\ProfileController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('orders', function () {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('clients.orders.index', compact('orders'));
    })->name('orders');
});
