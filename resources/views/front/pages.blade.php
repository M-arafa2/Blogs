@extends('front.layouts.front')

@section('content')
    <section class="section section-privacy-policy ">
        <div class="container">
            <h2 class="lg-title text-center  mb-4">
                {{$page?->address}} 
            </h2>
            <div class="d-flex flex-column gap-5">
                {{-- {!! setting('privacy') !!} --}}
                {{ $page?->content }}
            </div>
        </div>
    </section>
@endsection