@extends('admin.layouts.admin')
@section('title', 'الطلبات')
@section('content')
    <section class="">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb bg-light p-3">
                <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
                <li href="" class="breadcrumb-item" aria-current="page">
                    الطلبات
                </li>
            </ol>
        </nav>
        <div class="section_content content_view">
            <div class="up_element mb-2">

            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>عنوان الطلب</th>
                            <th>مقدم الطلب</th>
                            <th>القسم</th>
                            <th>الخدمة</th>
                            <th>الحالة</th>
                            <th class="text-nowrap">تاريخ الانشاء</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $order->title }}</td>
                                <td>{{ $order->user?->name }}</td>
                                <td>{{ $order->department?->name }}</td>
                                <td>{{ $order->service?->name }}</td>
                                <td>
                                    @if ($order->status == 'accepted')
                                        <span class="badge bg-success">مقبول</span>
                                    @elseif($order->status == 'rejected')
                                        <span class="badge bg-danger">مرفوض</span>
                                    @else
                                        <span class="badge bg-warning">قيد المراجعة</span>
                                    @endif
                                </td>
                                <td class="text-nowrap">{{ $order->created_at->format('Y-m-d') }}</td>
                                <td class="d-flex gap-1">
                                    <a class="btn btn-success btn-sm" href="{{ route('admin.orders.show', $order->id) }}"><i class="fa fa-eye"></i></a>
                                    @if ($order->status == 'pending')
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#accept{{ $order->id }}">
                                            قبول <i class="fa fa-check"></i>
                                        </button>

                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#reject{{ $order->id }}">
                                            رفض <i class="fa fa-times"></i>
                                        </button>
                                    @endif

                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $order->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    @include('admin.orders.delete-modal', ['order' => $order])
                                    @include('admin.orders.status-modal', ['order' => $order])
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $orders->links() }}
            </div>
        </div>
    </section>
@endsection
