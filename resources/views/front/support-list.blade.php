@extends('front.layouts.front')
@section('content')
<section class=" section talks-section ">
    <div class="container-md ">
        <div class="chatting-holder">
            @forelse($chats as $message)
            <a href="{{ route('support.chat',  \Illuminate\Support\Facades\Crypt::encrypt($message->id)) }}">
                <div class="box-chat">
                    <div class="head-box">
                        <div class="user">
                            <img src="{{ $message->employee?->photo ? display_file($message->employee->photo) : asset('front-assets/img/profile-picture.webp') }}" alt="person" />
                            <p>{{ $message->employee?->name}}</p>
                            <div class="circle-badge-pink">{{ $message->messages->where('user_id','!=',auth()->user()->id)->whereNull('readed_at')->count() }}</div>
                        </div>
                        <div class="date">
                            <span>{{ $message->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <p class="massage">
                        {{ $message->message }}
                    </p>
                </div>
            </a>
            @empty
            <div class="text-center">
                <img src="{{ asset('front-assets') }}/img/empty.svg" alt="" class="img">
                <div class="title">
                    لا يوجد محادثات
                </div>
                {{-- <button type="submit" class="main-btn ">
                    <i class="fa-solid fa-plus"></i>
                    بدأ محادثة جديدة
                </button> --}}

                <form action="{{ route('support.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <button type="submit" class="main-btn ">
                        <i class="fa-solid fa-plus"></i>
                        بدأ محادثة جديدة
                    </button>
                </form>
{{--                @else--}}
{{--                <form action="{{ route('vendor.gotomessage') }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">--}}
{{--                    <input type="hidden" name="vendor_id" value="{{ $vendor?->id }}">--}}
{{--                    <button type="submit" class="main-btn ">--}}
{{--                        <i class="fa-solid fa-plus"></i>--}}
{{--                        بدأ محادثة جديدة--}}
{{--                    </button>--}}
{{--                </form>--}}
{{--                @endif--}}

            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
