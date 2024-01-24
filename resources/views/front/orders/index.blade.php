@extends('front.layouts.front')

@section('content')
    <section class="section box-section min-vh-100 py-4 section-bg">
        <div class="text-center mb-2">
            <h2 class="lg-title">كل الطلبات</h2>
        </div>
        <div class="mb-2 p-2 d-flex aling-items-center justify-content-center gap-3">
            <div class="inp-holder">
                <select name="" id="" class="main-select form-select w-150px">
                    <option value=""> اختيار القسم الرئيسي</option>
                </select>
            </div>
            <div class="inp-holder">
                <select name="" id="" class="main-select form-select w-150px">
                    <option value=""> اختيار القسم الفرعي</option>
                </select>
            </div>
        </div>
        <div class="container-md bg-white px-0 px-md-3">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @foreach ($orders as $order)
                    <div class="box-subject">
                        <a href="{{ route('orders.show', $order->id) }}" class="title">{{ $order->title }}</a>
                        <!-- @if ($order->status == 'accepted')
                            <span class="badge bg-primary mb-2">مفتوح</span>
                        @elseif($order->status == 'rejected')
                            <span class="badge bg-danger mb-2">مرفوض</span>
                        @elseif($order->status == 'pending')
                            <span class="badge bg-warning mb-2">قيد المراجعة</span>
                        @endif -->

                        <div class="icon-bar">
                            <div class="name">
                                <i class="fa-solid fa-user"></i>
                                <span>{{ $order->user->name }}</span>
                            </div>
                            <div class="time">
                                <i class="fa-regular fa-clock"></i>
                                <span>{{ $order->human_date }}</span>
                            </div>
                            <div class="offer">
                                <i class="fa-solid fa-ticket"></i>
                                <span>{{ $order->offers_count }} عروض</span>
                            </div>
                        </div>
                        <a href="{{ route('orders.show', $order->id) }}">
                            <div class="des">
                                {{ $order->description }}
                            </div>
                        </a>
                    </div>
            @endforeach


        </div>
    </section>
@endsection
