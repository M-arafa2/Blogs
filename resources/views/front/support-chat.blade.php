@extends('front.layouts.front')

@section('content')
@livewire('front.support-chat',['chat' => $chat])
@endsection
