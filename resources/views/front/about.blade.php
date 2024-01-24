@extends('front.layouts.front')

@section('content')
    <section class=" section talks-section ">
        <div class="container-md ">
            <h1>حول التطبيق</h1>
            <p>
                {!! setting('about') !!}
            </p>
        </div>
    </section>
@endsection
