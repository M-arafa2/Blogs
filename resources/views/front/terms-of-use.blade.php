@extends('front.layouts.front')

@section('content')
<section class=" section talks-section ">
    <div class="container-md ">
        <h1> سياسة الخصوصية و شروط واحكام</h1>
        <div class="content">
            @if(request()->get('mode') == 'vendor')
            {!! setting('terms_of_use_vendor') !!}
            @else
            {!! setting('terms_of_use_client') !!}
            @endif
        </div>
    </div>
</section>
@endsection
