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
                    {{ $cart->title }}
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
                            <th>المنتجات</th>
                            @foreach ($cart->products as $product)
                        <tr>
                            <td>
                                {{ $product->name }}
                            </td>
                            <td>
                                مزود الخدمة:
                                {{ $product->vendor->name }}
                            </td>
                            <td>
                                الكمية:
                                {{ $product->pivot->quantity }}
                            </td>
                            <td>
                                السعر:
                                {{ $product->pivot->price }}
                            </td>
                            <td>
                                الاجمالي:
                                {{ $product->pivot->total }}
                            </td>
                            <td>
                                التأمين:
                                {{ $product->pivot->insurance_amount }}
                            </td>
                            <td>
                                وقت وتاريخ المناسبة
                                من:
                                {{ $product->pivot->delivery_date1 }}
                                الي:
                                {{ $product->pivot->delivery_date2 }}
                            </td>


                        </tr>
                        @endforeach
                        </tr>
                        <tr>
                            <th>اسم العميل</th>
                            <td>{{ $cart->user->name }}</td>
                        </tr>
                        <tr>
                            <th>الحالة</th>
                            <td>
                                @if ($cart->status == 'pending')
                                    <span class="badge bg-danger">قيد الانتظار</span>
                                @elseif($cart->status == 'processing')
                                    <span class="badge bg-info">قيد التنفيذ</span>
                                @elseif($cart->status == 'completed')
                                    <span class="badge bg-success">تم الانجاز</span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>المبلغ</th>
                            <td>{{ $cart->amount }}</td>
                        </tr>
                        <tr>
                            <th>الضريبة</th>
                            <td>{{ $cart->tax }}</td>
                        </tr>
                        <tr>
                            <th>نسبة الادارة</th>
                            <td>{{ $cart->admin_ratio }}</td>
                        </tr>
                        <tr>
                            <th>المبلغ الكلي</th>
                            <td>{{ $cart->total }}</td>
                        </tr>

                        <tr>
                            <th>تاريخ الانشاء</th>
                            <td>
                                {{ $cart->created_at->format('Y-m-d') }}
                            </td>
                        </tr>

                    </tbody>
                </table>

                <div>
                    {{-- @if ($cart->status == 'pending')
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#accept{{ $cart->id }}">
                            قبول <i class="fa fa-check"></i>
                        </button>

                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#reject{{ $cart->id }}">
                            رفض <i class="fa fa-times"></i>
                        </button>
                    @endif --}}

                    @include('admin.orders.status-modal', ['order' => $cart])
                </div>
            </div>
        </div>
    </section>
@endsection
