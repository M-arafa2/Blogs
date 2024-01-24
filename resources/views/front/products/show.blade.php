@extends('front.layouts.front')
@section('content')
    <section class="section section-product" id="section-product">

        @if (auth()->user())
            <button class="btn-fixed" data-bs-toggle="modal" data-bs-target="#dateModal">
                <i class='fas fa-plus'></i>
                أضف الي السلة
            </button>
        @else
            <a href="{{ route('login') }}" class="btn-fixed text-white">
                <i class='fas fa-plus'></i>
                أضف الي السلة
            </a>
        @endif

        <!-- Rate Modal -->
        <div class="modal fade filter-modal" id="dateModal" aria-labelledby="dateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="title text-center mb-4 mt-2">
                            أضف الي السلة
                        </div>
                        <div class="title mb-2">
                            اضف الكمية
                        </div>
                        <div class="btns-quantity w-fit mx-auto">
                            <button @click="lessQuantity" class="less btn-card">-</button>
                            <span>@{{ quantity }}</span>
                            <button @click="addQuantity" class="add btn-card">+</button>
                        </div>
                        <!-- <input type="number" v-model="quantity" name="" id="" class="form-control "> -->
                        <small v-if="error" class="text-danger">
                            يجب اضافة عدد
                        </small>
                        <div class="d-flex gap-1 flex-column align-items-center mt-3">
                            <button @click="postOrder()" class="main-btn px-5">
                                أضف للسلة
                            </button>
                            <button type="button" class="btn text-danger" id="close-modal" data-bs-dismiss="modal">
                                الغاء
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-3">
            <div class="container-md mb-5">
                <div class="row">
                    <div class="col-12 px-0">
                        <div class="product-holder">
                            <div class="product-info">
                                @if (auth()->user())
                                    <div class="product-option">
                                        <div class="rate-holder holder">
                                            <i class="fa-solid fa-star"></i>
                                            <!-- <small>4.5</small> -->
                                        </div>
                                        <a href="{{ route('orders') }}" class="cart-holder holder">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </a>
                                        <button @click="shareProduct()" class="share-holder holder">
                                            <i class="fa-solid fa-share-nodes"></i>
                                        </button>
                                    </div>

                                @endif
                                <!-- Swiper -->
                                <div class="swiper product-Swiper mb-3">
                                    <div class="swiper-wrapper">
                                        {{-- عرض الصورة الرئيسية إذا كانت موجودة --}}
                                        @if ($product->image)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('images/product/' . $product->image) }}"
                                                     alt="{{ $product->name }}"/>
                                            </div>
                                        @endif

                                        {{-- عرض الصور الإضافية --}}
                                        @foreach ($product->images as $image)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('images/product/' . $image->image) }}"
                                                     alt="{{ $product->name }}"/>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination won-pagination"></div>
                                </div>

                            </div>
                            <div class="container-md">
                                <div class="product-details mb-3">
                                    <h6 class="title">{{ $product->name }}</h6>
                                    <h5 class="price"><span>{{ $product->price }}
                                        </span> ريال سعودي <i class="fa-solid fa-wallet"></i></h5>
                                </div>
                                @if ($product->insurance)
                                    <div class="product-details mb-3">
                                        <h5 class="price">مبلغ التأمين <span>{{ $product->insurance_amount }}
                                            </span> ريال سعودي <i class="fa-solid fa-wallet"></i></h5>
                                        {{-- <h5 class="price"> مزود الخدمة :<span>{{ $product->vendor->name }} --}}
                                        <a href="{{ route('vendor.show', $product->vendor->id) }}" class="price">
                                            مزود الخدمة: {{ $product->vendor->name }}
                                        </a>
                                    </div>
                                @endif
                                <div class="about-product mb-4">
                                    <h6 class="not">حول المنتج:</h6>
                                    <p class="des">
                                    {{ $product->description }}
                                </div>
                                <div class="about-product mb-4">
                                    <h6 class="not"> وقت وتاريخ المناسبة :</h6>
                                    <p class="des">
                                    {{-- {{ $product->leadtime }} يوم --}}
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="form-label">من</label>
                                            <input type="datetime-local" v-model="from" required class="form-control " name="" id="">
                                            <small v-if="errorFrom" class="text-danger">
                                                الحقل مطلوب
                                            </small>
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">الي</label>
                                            <input type="datetime-local" class="form-control" required v-model="to" name="" id="">
                                            <small v-if="errorTo" class="text-danger">
                                            الحقل مطلوب
                                        </small>
                                        </div>
                                    </div>
                                </div>
                                @include('front.includes.product-options', [
                                    'products' => $product->options,
                                ])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <script>
        let sectionProduct = new Vue({
            el: "#section-product",
            data: {
                userId: "{{ auth()->user() ? auth()->user()->id : '' }}",
                productId: "{{ $product->id }}",
                price: "{{ $product->price }}",
                insurance: "{{ $product->insurance_amount }}",
                quantity: 0,
                from: 0,
                to: 0,
                errorFrom: false,
                errorTo: false,
                error: false,
                shareData: {
                    title: '{{ $product->name }}',
                    text: '{{ $product->name }} مشاركة منتج ',
                    url: document.URL,
                },
            },
            computed: {

            },

            methods: {
                doneAdd() {
                    console.log(this.insurance);
                    this.quantity = 0;
                    this.error = false;
                    this.errorFrom = false;
                    this.errorTo = false;
                    document.querySelector('#close-modal').click();
                    var alert = document.createElement('div');
                    alert.innerHTML =
                        '<div  class="alert main-alert alert-success alert-dismissible" role="alert">تمت اضافة المنتج بنجاح<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    document.querySelector('.section').append(alert);
                    axios
                        .get(`/api/cart?user_id=${this.userId}`)
                        .then(response => {
                            if (Object.keys(response.data).length > 0) {
                                document.querySelector('#num-shop').innerHTML = response.data.products.length;
                            } else {
                                document.querySelector('#num-shop').innerHTML = 0;
                            }
                        })
                },
                errorAdd() {
                    this.quantity = 0;
                    this.error = false;
                    this.errorFrom = false;
                    this.errorTo = false;
                    document.querySelector('#close-modal').click();
                    var alert = document.createElement('div')
                    alert.innerHTML =
                        '<div  class="alert main-alert alert-danger alert-dismissible" role="alert">  يوجد خطاء حاول مرة أخري <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                    document.querySelector('.section').append(alert)
                },
                postOrder() {
                    if (this.quantity <= 0) {
                        this.error = true;
                    } else if (this.from <= 0) {
                        this.errorFrom = true;
                    } else if (this.to <= 0) {
                        this.errorTo = true;
                    } else {
                        axios
                            .post(
                                `/api/cart?user_id=${this.userId}&product_id=${this.productId}&quantity=${this.quantity}&price=${this.price}&insurance_amount=${this.insurance}&from=${this.from}&to=${this.to}`
                            )
                            .then(response => this.doneAdd())
                            .catch(error => (this.errorAdd()))
                    }
                },
                async sherePoduct() {
                    try {
                        await navigator.share(this.shareData);
                    } catch (err) {
                        console.log(`Error: ${err}`)
                    }
                },
                lessQuantity() {
                    if (this.quantity >= 1) {
                        this.quantity = this.quantity - 1;
                    };
                },
                addQuantity() {
                    this.quantity = this.quantity + 1;
                }
            },

            mounted() {

            }

        });
    </script> --}}
    <script>
        let sectionProduct = new Vue({
            el: "#section-product",
            data: {
                userId: "{{ auth()->user() ? auth()->user()->id : '' }}",
                productId: "{{ $product->id }}",
                price: "{{ $product->price }}",
                insurance: "{{ $product->insurance_amount }}",
                from: "",
                to: "",
                errorFrom: false,
                errorTo: false,
                quantity: 0,
                error: false,
                shareData: {
                    title: '{{ $product->name }}',
                    text: '{{ $product->name }} مشاركة منتج ',
                    url: document.URL,
                },
            },
            computed: {},

            methods: {
                doneAdd() {
                    this.quantity = 0;
                    this.error = false;
                    this.errorFrom = false;
                    this.errorTo = false;
                    document.querySelector('#close-modal').click();
                    var alert = document.createElement('div');
                    alert.innerHTML =
                        '<div class="alert main-alert alert-success alert-dismissible" role="alert">تمت اضافة المنتج بنجاح<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    document.querySelector('.section').append(alert);
                    axios
                        .get(`/api/cart?user_id=${this.userId}`)
                        .then(response => {
                            if (Object.keys(response.data).length > 0) {
                                document.querySelector('#num-shop').innerHTML = response.data.products.length;
                            } else {
                                document.querySelector('#num-shop').innerHTML = 0;
                            }
                        });
                },
                errorAdd() {
                    this.quantity = 0;
                    this.error = true;

                    this.from = true;
                    this.errorFrom = true;

                    this.to = true;
                    this.errorTo = true;

                    document.querySelector('#close-modal').click();
                    var alert = document.createElement('div');
                    alert.innerHTML =
                        '<div class="alert main-alert alert-danger alert-dismissible" role="alert">  يوجد خطاء حاول مرة أخري <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    document.querySelector('.section').append(alert);
                },
                postOrder() {
                    if (this.quantity <= 0) {
                        this.error = true;
                    } else if (!this.from) {
                        this.error = false;
                        this.errorFrom = true;
                    } else if (!this.to) {
                        this.errorFrom = false;
                        this.errorTo = true;
                    } else {
                        axios
                            .post(
                                `/api/cart?user_id=${this.userId}&product_id=${this.productId}&quantity=${this.quantity}&price=${this.price}&insurance_amount=${this.insurance}&from=${this.from}&to=${this.to}`
                            )
                            .then(response => {
                                this.doneAdd();
                                this.error = false;
                                this.errorFrom = false;
                                this.errorTo = false;
                            })
                            .catch(error => this.errorAdd());
                    }
                },
                async shareProduct() {
                    try {
                        await navigator.share(this.shareData);
                    } catch (err) {
                        console.log(`Error: ${err}`);
                    }
                },
                lessQuantity() {
                    if (this.quantity >= 1) {
                        this.quantity = this.quantity - 1;
                    }
                },
                addQuantity() {
                    this.quantity = this.quantity + 1;
                }
            },

            mounted() {

            }
        });
    </script>
@endsection
