@extends('admin.layouts.admin')
@section('title', 'شروط الطلبات')
@section('content')
    <section class="">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb bg-light p-3">
                <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
                <li href="" class="breadcrumb-item" aria-current="page">
                    شروط الطلبات
                </li>
            </ol>
        </nav>
        <div class="section_content content_view">
            <div class="up_element mb-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                    إضافة
                </button>
                @include('admin.order-term.create-modal')
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>العنوان</th>
                            <th>الترتيب</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderTerms as $term)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $term->title }}</td>
                                <td>{{ $term->sort }}</td>
                                <td class="d-flex gap-1">
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#edit{{ $term->id }}">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $term->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    @include('admin.order-term.edit-modal', ['term' => $term])
                                    @include('admin.order-term.delete-modal', ['term' => $term])
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $orderTerms->links() }}
            </div>
        </div>
    </section>
@endsection
