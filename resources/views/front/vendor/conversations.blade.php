@extends('front.layouts.front')
@section('content')
<section class=" section talks-section ">
    <div class="container-md ">
        <div class="chatting-holder">
            @forelse($messages as $message)
            <a href="{{ route('vendor.conv',  \Illuminate\Support\Facades\Crypt::encryptString($message->id)) }}">
                <div class="box-chat">
                    <div class="head-box">
                        <div class="user">
                            {{-- @dump($message->user_id , $message->vendor_id == auth()->user()->id) --}}
                            <img src="{{ $message->vendor_id == auth()->user()->id ? ($message->user?->photo ? display_file($message->user->photo) : asset('front-assets/img/profile-picture.webp')) : ($message->vendor?->photo ? display_file($message->vendor->photo) : asset('front-assets/img/profile-picture.webp')) }}" alt="person" />
                            <p>{{ $message->vendor_id == auth()->user()->id  ? $message->user->name : $message->vendor->name  }}</p>
                            <div class="circle-badge-pink">{{ $message->messages->where('user_id','!=',auth()->user()->id)->whereNull('read_at')->count() }}</div>
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
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
