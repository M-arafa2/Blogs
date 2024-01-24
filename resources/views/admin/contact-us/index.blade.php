@extends('admin.layouts.admin')
@section('title','اتصل بنا')
@section('content')
<section class="">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
            <li href="" class="breadcrumb-item" aria-current="page">
                اتصل بنا
            </li>
        </ol>
    </nav>
    <div class="section_content content_view">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>الاسم الاول</th>
                        <th>الاسم الثاني</th>
                        <th>الهاتف</th>
                        <th>الايميل</th>
                        <th>الوقت</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contactuses as $item)

                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $item->first_name }}</td>
                        <td>{{ $item->last_name }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->created_at}}</td>
                        <td>
                            {{-- @can('read_contact') --}}
                            <a class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#show{{ $item->id }}">
                                <i class="fa fa-eye"></i>
                            </a>
                            @include('admin.contact-us.show-modal', ['item' => $item])
                            {{-- @endcan --}}
                            {{-- @can('delete_contact') --}}
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $item->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>

                            @include('admin.contact-us.delete-modal', [
                                'item' => $item,
                            ])
                            {{-- @endcan --}}
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $contactuses->links() }}
        </div>
    </div>
</section>
@endsection
