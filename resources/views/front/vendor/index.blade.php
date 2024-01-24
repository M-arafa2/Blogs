@extends('front.layouts.front')
@section('content')
    <div class="container">
        <div class="intro-section" style="margin-top:70px">
            <h4 class="title"> مقدمي الخدمات</h4>
        </div>

        <div class="d-flex flex-column gap-4">
            @foreach ($vendors as $vendor)
                @include('front.includes.vendor-card', ['vendor' => $vendor])
            @endforeach
        </div>
        {{ $vendors->links() }}
    </div>
@endsection
