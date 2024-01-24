@extends('admin.layouts.admin')
@section('title','صفحات الموقع')
@section('content')
<section class="">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
            <li href="" class="breadcrumb-item" aria-current="page">
                صفحات الموقع
            </li>
        </ol>
    </nav>
    <div class="section_content content_view">
        <div class="up_element mb-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                إضافة
            </button>
            @include('admin.sitepage.create-modal')
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>العنوان</th>
                        <th>المحتوى</th>
                        <th>الحاله</th>
                        <th class="text-nowrap">تاريخ الانشاء</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sitepages as $sitepage)

                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td class="text-nowrap">{{ Str::limit($sitepage->address,20) }}</td>
                        <td class="text-nowrap">{{ Str::limit($sitepage->content,20) }}</td>
                        <td>{{ $sitepage->status() }}</td>
                        <td class="text-nowrap">{{ $sitepage->created_at()}}</td>
                        <td class="d-flex gap-1">
                            <a href="{{ route('article', ['id' => $sitepage->id]) }}">
                                <i class="fas fa-eye text-primary icon-table"></i>
                            </a>
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $sitepage->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $sitepage->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>

                            @include('admin.sitepage.edit-modal',['sitepage'=>$sitepage])
                            @include('admin.sitepage.delete-modal',['sitepage'=>$sitepage])
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $sitepages->links() }}
        </div>
    </div>
</section>
@endsection
