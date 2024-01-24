@extends('front.layouts.front')
@section('content')
@livewire('front.conversation',['conv' => $conv])
@endsection
