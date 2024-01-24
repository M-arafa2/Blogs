@extends('admin.layouts.admin')
@section('title','اسئلة القسم ' . $dep->name)
@section('content')

@livewire('admin.department-questions',['dep' => $dep])

@endsection
@push('js')
@livewireScripts()
@endpush
@push('css')
@livewireStyles()
@endpush
