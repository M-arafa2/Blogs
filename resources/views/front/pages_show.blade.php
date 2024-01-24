@extends('front.layouts.front')

@section('content')
    <section class="section section-privacy-policy ">
        <div class="container">
            <h2 class="lg-title text-center  mb-4">
                {{$pages?->address}} 
            </h2>
            <div class="d-flex flex-column gap-5">
                {{-- {!! setting('privacy') !!} --}}
                {{ $pages?->content }}
            </div>
        </div>
    </section>
@endsection