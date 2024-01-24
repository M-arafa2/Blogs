@extends('front.layouts.front')
@section('content')
    @php
        $arr = auth()->user()->products()->pluck('id')->toArray();

        $carts = \App\Models\Cart::withwhereHas('products', function ($query) use ($arr) {
            $query->whereIn('products.id', $arr);
        })->get();
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
                            <th>المنتج</th>
                            <th>اسم العميل</th>
                            <th>السعر</th>
                            <th>نسبة الادارة</th>
                            <th>الكمية</th>
                            <th>وقت وتاريخ المناسبة</th>
                            <th>مبلغ التأمين</th>
                            <th>الاجمالي</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($carts as $cart)
                            @foreach ($cart->products as $product)
                                @php
                                    $commission = $product->pivot->commission;
                                    $total = $product->pivot->total;
                                @endphp
                                <tr>
                                    <td>
                                        {{ $product->name }}
                                    </td>
                                    <td>{{ $cart->user->name }}</td>
                                    <td>{{ $product->pivot->total - $commission - $product->pivot->insurance_amount}}</td>
                                    <td>{{ $commission }}</td>
                                    <td>{{ $product->pivot->quantity }}</td>
                                    <td>
                                        من :
                                        {{ $product->pivot->delivery_date1 }}
                                        الي:
                                        {{ $product->pivot->delivery_date2 }}

                                    </td>
                                    <td>{{ number_format($product->pivot->insurance_amount, 2) }}</td>
                                    <td>{{ number_format($total, 2) }}</td>
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
