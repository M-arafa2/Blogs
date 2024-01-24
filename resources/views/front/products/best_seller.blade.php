@extends('front.layouts.front')
@section('content')
    <section class="section">
        <div class="py-3">
            <div class="container-md">
                <h6 class="mb-3">
                    المنتجات الأكثر مبيعاً:
                </h6>
                <!-- Swiper -->
                <div class="swiper mySwiper filters-swiper mb-4">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="{{ route('products.best_seller') }}"
                                class="btn-filter {{ request()->department == null ? 'active' : '' }}">
                                الكل
                            </a>
                        </div>
                        @foreach ($departments as $department)
                            <div class="swiper-slide">
                                <a href="{{ route('products.best_seller', ['department' => $department->id]) }}"
                                    class="btn-filter {{ request()->department == $department->id ? 'active' : '' }}">
                                    {{ $department->name }}
                                </a>
                            </div>
                        @endforeach


                    </div>
                </div>

                <div class="d-flex flex-column gap-3">
                    @forelse ($products as $product)
                        @include('front.includes.product-card', ['product' => $product])
                    @empty
                        <div class="alert alert-warning">لا يوجد منتجات.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
