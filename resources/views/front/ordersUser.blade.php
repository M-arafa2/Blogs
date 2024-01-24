@extends('front.layouts.front')
@section('content')
@php
$carts = \App\Models\Cart::where('user_id', auth()->user()->id)->get();
@endphp
<section class="section" id="orders">
    <div class="py-2">
        <div class="container-md">
            <h5 class="main-color fw-bold">
                الطلبات
            </h5>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>رقم الطلب</th>
                            <th>المنتج</th>
                            <th>البائع</th>
                            <th>السعر</th>
                            <th>الكمية </th>
                            <th>مبلغ التأمين </th>
                            <th>الاجمالي</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($carts as $cart)
                        @foreach ($cart->products as $product)
                        @php
                        $total = $product->pivot->total + $product->pivot->insurance_amount;
                        @endphp
                        <tr>
                            <td>
                                {{ $cart->id }}
                            </td>
                            <td>
                                {{ $product->name }}
                            </td>
                            <td>{{ $product->vendor?->name }}</td>
                            <td>{{ $product->pivot?->total }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>{{ number_format($product->pivot->insurance_amount, 2) }}</td>
                            <td>{{ number_format(($total + $cart->tax), 2) }}</td>
                        </tr>
                        @endforeach
                        @empty
                        <td colspan="4" class="text-center">لا يوجد طلبات</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
