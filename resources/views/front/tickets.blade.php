@extends('front.layouts.front')

@section('content')
<section class=" section artical-section  py-3">
    <div class="container-md text-center">
        <h2 class="lg-title mb-4">
            التذاكر
        </h2>
        <div class="d-flex align-items-center flex-wrap gap-3 justify-content-between">
            <span class=" text-badge badge-alt">لديك {{ auth()->user()->tickets()->count() }} تذكرة </span>

            <a href="{{ route('createTickets') }}" class="main-btn">
                إنشاء تذكرة جديدة
            </a>
        </div>
        <div class="box-tickets d-flex flex-column gap-3 mt-5">
            @foreach($tickets as $ticket)
            <div class="ticket">
                <div class="header-box d-flex align-items-center justify-content-between w-100">
                    <div class="date">
                        <i class="fas fa-calendar-days"></i>
                        {{$ticket->created_at->format('Y/m/d')}}
                    </div>

                    <div class="badge bg-{{$ticket->status == "1" ?'primary':'warning' }}">{{$ticket->status == "1" ?'مفتوحة':'مغلقة' }}</div>
                </div>
                <p class="text"> {{$ticket->desc}}</p>
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('showTickets',$ticket->id) }}" class="main-btn">عرض</a>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>

@endsection
