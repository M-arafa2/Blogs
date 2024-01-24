@extends('front.layouts.front')

@section('content')   
    @livewire('front.messages.index', ['offer' => $offer], key($offer->id))
@endsection

@push('js')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
