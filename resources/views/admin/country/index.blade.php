@extends('admin.layouts.admin')
@section('title','الدول')
@section('content')
<section class="">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
            <li href="" class="breadcrumb-item" aria-current="page">
                الدول
            </li>
        </ol>
    </nav>
    <div class="section_content content_view">
        <div class="up_element mb-2">
            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#create">
                إضافة
            </button>
            @include('admin.country.create-modal')
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($countries as $country)

                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $country->name }}</td>
                        <td class="d-flex gap-1">
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $country->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $country->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>

                            @include('admin.country.edit-modal',['country'=>$country])
                            @include('admin.country.delete-modal',['country'=>$country])
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $countries->links() }}
        </div>
    </div>
</section>
@endsection
