@extends('front.layouts.front')
@section('content')
    <section class="section">
        <div class="py-3">
            <div class="container-md">
                <a href="{{ route('vendor.products.create') }}" class="main-btn mb-2 sm-btn ms-auto">
                    أضف منتج
                    <i class="fa-solid fa-plus"></i>
                </a>
                <div class="d-flex flex-column gap-3">
                    @if ($products->count() > 0)
                        {{-- @foreach ($products as $product) --}}
                        {{-- @forelse(App\Models\Product::where('acceptance','accepted')->latest()->take(5)->get() as $product) --}}
                        @forelse(App\Models\Product::latest()->take(5)->get() as $product)

                        @if(auth()->check() && $product->user_id == auth()->user()->id)
                            <div class="box-add-product order-item">
                                <div class="data">
                                    <div class="main-info flex-fill  justify-content-start">
                                        <div>
                                            <img src="{{ asset('images/product/' . $product->image) }}" alt=""
                                                class="img">
                                        </div>
                                        <div class="d-flex flex-column gap-1">
                                            <div class="d-flex gap-3">
                                                <div class="title">
                                                    {{ $product->name }}
                                                </div>
                                                <div class="box-wait" style="">
                                                    @if ($product->acceptance === 'Pending')
                                                        بانتظار موافقة الادارة...
                                                    @else
                                                        {{-- {{ $product->acceptance }} --}}
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="description">
                                                {{ $product->description }}
                                            </div>
                                            <div class="about-order justify-content-start">
                                                {{-- <span class="name">
                                                    <i class="fa-solid fa-star icon"></i>
                                                    <span class="mx-1">{{ $product->rating? :'4.5' }}</span>
                                                </span>
                                                <span class="bar"></span> --}}
                                                <div class="price">
                                                    <span class="mx-1">
                                                        {{ number_format($product->price, 2) }}
                                                    </span> ريال سعودي
                                                    @if ($product->insurance)
                                                        - مبلغ التأمين
                                                        <span>{{ number_format($product->insurance_amount, 2) }}
                                                        </span> ريال سعودي
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="buttons-container">
                                        @if(auth()->check() && $product->user_id == auth()->user()->id)

                                        <a href="{{ route('vendor.products.edit', $product->id) }}" class="btn-option"><i
                                                class='fa fa-edit'></i></a>
                                        {{-- <button type="button"
                                            data-action="{{ route('vendor.products.destroy', $product->id) }}"
                                            data-bs-toggle="modal" class="btn-option "><i
                                                class='bx bx-trash'></i></button> --}}
                                                <button type="button" data-action="{{ route('vendor.products.destroy', $product->id) }}" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn-option">
                                                    <i class='bx bx-trash'></i>
                                                </button>
                                                @endif

                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @else
                        <div class="alert alert-warning"> لا يوجد منتجات.</div>
                    @endif

                    @include('front.vendor.products.delete-modal')

                    @push('js')
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
                        {{-- <script>
                            $(".delete").on("click", function() {
                                var action = $(this).data("action");
                                $("#delete").find('form').attr('action', action);
                                $("#delete").modal("show");
                            });
                        </script> --}}
                        <script>
                            var deleteModal = document.getElementById('deleteModal');
                            deleteModal.addEventListener('show.bs.modal', function (event) {
                                var button = event.relatedTarget;
                                var action = button.getAttribute('data-action');
                                var form = deleteModal.querySelector('#deleteForm');
                                form.action = action;
                            });
                        </script>
                    @endpush

                </div>
            </div>
        </div>
    </section>
@endsection
