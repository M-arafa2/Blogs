@extends('admin.layouts.admin')
@section('title','الوظائف')
@section('content')
<section class="">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li href="" class="breadcrumb-item" aria-current="page">
                الوظائف
            </li>
        </ol>
    </nav>
    <div class="section_content content_view">
        <div class="up_element">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                إضافة
            </button>
            @include('admin.occupation.create-modal')
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>نوع العضوية</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($occupations as $occupation)

                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $occupation->name }}</td>
                        <td>{{ __($occupation->type) }}</td>
                        <td class="d-flex gap-2">
                            <button type="button" class="btn btn-info btn-sm text-white mx-1" data-bs-toggle="modal" data-bs-target="#edit{{ $occupation->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $occupation->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>

                            @include('admin.occupation.edit-modal',['occupation'=>$occupation])
                            @include('admin.occupation.delete-modal',['occupation'=>$occupation])
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $occupations->links() }}
        </div>
    </div>
</section>
@endsection
