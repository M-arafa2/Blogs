@extends('front.layouts.front')

@section('content')
    <section class="section section-privacy-policy ">
        <div class="container">
            <h2 class="lg-title text-center  mb-4">
                سياسة الخصوصية
            </h2>
            <div class="d-flex flex-column gap-5">
                {!! setting('privacy') !!}
            </div>
        </div>
    </section>
@endsection
