@extends('admin.layouts.admin')
@section('title', 'الطلبات')
@section('content')
    <section class="">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb bg-light p-3">
                <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
                <li href="{{ route('admin.orders.index') }}" class="breadcrumb-item" aria-current="page">
                    الطلبات
                </li>
                <li href="" class="breadcrumb-item" aria-current="page">
                    {{ $order->title }}
                </li>
            </ol>
        </nav>
        <div class="section_content content_view">
            <div class="up_element mb-2">

            </div>
            <div class="table-responsive">
                <table class="table table-hover">
 
                    <tbody>
                        <tr>
                            <th>عنوان الطلب</th>
                            <td>{{ $order->title }}</td>
                        </tr>
                        <tr>
                            <th>مقدم الطلب</th>
                            <td>{{ $order->user->name }}</td>
                        </tr>
                        <tr>
                            <th>القسم</th>
                            <td>{{ $order->department->name }}</td>
                        </tr>
                        <tr>
                            <th>الخدمة</th>
                            <td>{{ $order->service->name }}</td>
                        </tr>
                        <tr>
                            <th>الحالة</th>
                            <td>
                                @if ($order->status == 'accepted')
                                    <span class="badge bg-success">مقبول</span>
                                @elseif($order->status == 'rejected')
                                    <span class="badge bg-danger">مرفوض</span>
                                @else
                                    <span class="badge bg-warning">قيد المراجعة</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>وصف الطلب</th>
                            <td>
                                {{ $order->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>تاريخ الانشاء</th>
                            <td>
                                {{ $order->created_at->format('Y-m-d') }}
                            </td>
                        </tr>
                        <tr>
                            <th>المرفقات</th>
                            <td>
                                @if ($order->files)

                                    @foreach (json_decode($order->files, true) as $index => $file)
                                        <div class="mb-1"><a href="{{ display_file($file) }}"
                                                class="btn btn-sm btn-success">مرفق
                                                {{ $index + 1 }} <i class="fa fa-download"></i></a></div>
                                    @endforeach

                                @endif
                            </td>
                        </tr>

                    </tbody>
                </table>

                <div>
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

                    @include('admin.orders.status-modal', ['order' => $order])
                </div>
            </div>
        </div>
    </section>
@endsection
