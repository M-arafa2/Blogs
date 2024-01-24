@extends('admin.layouts.admin')
@section('title','الخدمات')
@section('content')
<section class="">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
            <li href="" class="breadcrumb-item" aria-current="page">
                الخدمات
            </li>
        </ol>
    </nav>
    <div class="section_content content_view">
        <div class="up_element mb-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                إضافة
            </button>
            @include('admin.service.create-modal')
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>صوره</th>
                        <th>الاسم</th>
                        <th>الحاله</th>
                        <th>تاريخ الانشاء</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)

                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>
                           @if($service->cover)
                           <img src="{{ asset('admin-assets/img/service/'.$service->cover) }}" alt="{{ $service->name }}" class="img-thumbnail" width="100px">
                           @else
                           <img src="{{ asset('admin-assets/img/no-image.jpg') }}" alt="{{ $service->name }}" class="img-thumbnail" width="100px">
                           @endif
                       </td>
                       <td class="text-nowrap">{{ $service->name }}</td>
                       <td>{{ $service->status()}}</td>
                       <td class="text-nowrap">{{ $service->created_at()}}</td>
                        <td class="d-flex gap-1">
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $service->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $service->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>

                            @include('admin.service.edit-modal',['service'=>$service])
                            @include('admin.service.delete-modal',['service'=>$service])
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $services->links() }}
        </div>
    </div>
</section>
@endsection
