@extends('admin.layouts.admin')
@section('title', 'الفاتورة')
@section('content')
    <section class="">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb bg-light p-3">
                <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
                <li href="{{ route('admin.orders.index') }}" class="breadcrumb-item" aria-current="page">
                    الفاتورة
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
                            <td>
                                {{ $cart_product->product->name }}
                            </td>

                            <td>
                                الكمية:
                                {{ $cart_product->quantity }}
                            </td>
                            <td>
                                السعر:
                                {{ $cart_product->price }}
                            </td>
                            <td>
                                الاجمالي:
                                {{ $cart_product->total }}
                            </td>
                            <td>
                                التأمين:
                                {{ $cart_product->insurance_amount }}
                            </td>
                        </tr>


                        <tr>
                            <th>المبلغ</th>
                            <td>{{ $cart_product->price }}</td>
                        </tr>

                        <tr>
                            <th>نسبة الادارة</th>
                            @php
                                $admin_ratio = setting('commission') ? ($cart_product->price * setting('commission')) / 100 : 0;
                            @endphp
                            <td>{{ $admin_ratio }}</td>
                        </tr>

                        <tr>
                            <th>المبلغ الكلي</th>
                            <td>{{ $cart_product->total - $admin_ratio }}</td>
                        </tr>

                        <tr>
                            <th>تاريخ الانشاء</th>
                            <td>
                                {{ $cart_product->created_at }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
