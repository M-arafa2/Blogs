@props(['product'])
<a href="{{ route('front.products.show', $product) }}" class="box-add-product order-item">
    <div class="data">
        <div class="main-info flex-fill  justify-content-start">
            <div>
                <img src="{{ asset('images/product/' . $product->image) }}" alt="{{ $product->name }}" class="img">
            </div>
            <div class="d-flex flex-column gap-1">
                <div class="title">
                    {{ $product->name }}
                </div>
                <div class="department">
                    {{ $product->department->name }}
                </div>
                <div class="about-order justify-content-start">
                    {{-- <span class="name">
                        <i class="fa-solid fa-star icon"></i>
                        <span class="mx-1">4.5</span>
                    </span> --}}
                    {{-- <span>
                        <i class="fa-solid fa-star icon"></i>
                        {{ $product->rating? :'4.5' }}
                    </span> --}}
                    {{-- <span class="bar"></span> --}}
                    <div class="price">
                        <span class="mx-1"> {{ $product->price }} </span> ريال سعودي
                        @if ($product->insurance)
                            - مبلغ التأمين <span>{{ $product->insurance_amount }} </span> ريال سعودي
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</a>
