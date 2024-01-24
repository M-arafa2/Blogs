@extends('front.layouts.front')
@section('content')
    <section class="section">
        @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
        <div class="py-2">
            <div class="container-md">
                <!-- Satrt Steb One -->
                <div v-show="steb == 1">
                    <!-- <div class="intro-section mb-0">
                    <h4 class="title">طلبك من:</h4>
                </div>
                <ul class="order-list mb-5">
                    <li>
                        <div class="box-add-product order-item">
                        <div class="data">
                            <div class="main-info">
                                <img src="{{ asset('front-assets') }}/img/stor-img2.png" alt="" class="img shadow-none">
                                <div class="d-flex flex-column gap-1">
                                <div class="title">
                                    إسم المنسق
                                </div>
                                <div class="about-order justify-content-start">
                                    <span class="name fs-13px">
                                        <i class="fa-solid fa-location-dot main-color fs-11px"></i>
                                        الدمام , شارع الملك فيصل في المنطقة الثالثة
                                    </span>
                                </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </li>
                </ul> -->
                    <div class="intro-section mb-3">
                        <h4 class="title">توصيل إلى: @{{ cartUser.user.name }}</h4>
                    </div>
                    <!-- <div class="inp-cus mb-5">
                        <label class="title">العنوان</label>
                        <div class="title-inp">
                            <input type="text" name="" id=""
                                value="الدمام , شارع الملك فيصل في المنطقة الثالثة">
                            <i class="fa-solid fa-check"></i>
                        </div>
                    </div> -->
                    <div class="intro-section mb-0">
                        <h4 class="title">العناصر الموجودة في الطلب:</h4>
                    </div>
                    <ul class="order-list mb-3">
                        <li v-for="(product,i) in cartUser.products" :key="i">
                            <div class="box-add-product order-item">
                                <div class="data">
                                    <div class="main-info">
                                        <img :src="'{{ asset('images/product') }}/' + product.image" alt=""
                                            class="img">
                                        <div class="d-flex flex-column gap-1">
                                            <div class="title">
                                                @{{ product.name }}
                                            </div>

                                            <div class="about-order ">
                                                <span class="name">
                                                    الكمية: <span class="main-color ">@{{ product.pivot.quantity }}</span>
                                                </span>
                                                <span class="bar"></span>
                                                <div class="price">
                                                    <span class=""><small>ر.س</small> @{{ product.pivot.total }}</span>
                                                    <i class="fa-solid fa-wallet"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="buttons-container">
                                        <button @click="deleteProduct(product.pivot.product_id)" class="btn-option"><i
                                                class='bx bx-trash'></i></button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="details-box">
                        <div class="word">
                            <p>أجرة التوصيل</p>
                            <p>ضريبة</p>
                            <p>المجموع:</p>
                        </div>
                        <div class="quantity">
                            <p>@{{ cartUser.delivery_fee }}ر.س</p>
                            <p>@{{ cartUser.tax }}ر.س</p>
                            <p class="total">@{{ cartUser.total }}ر.س</p>
                        </div>
                    </div>
                    <div class="btn-holder d-flex flex-column align-items-center gap-2 justify-content-center mt-4">
                        <form action="{{route('orders.payment')}}" method="post">
                            @csrf
                            <button type="submit" class="main-btn lg-btn" >الدفع</button>
                        </form>
                        <a href="{{ route('orders') }}" class="btn text-danger px-5">إلغاء الطلب</a>
                    </div>
                </div>
                <!-- End Steb One -->
                <!-- Satrt Steb two -->
{{--                <div v-show="steb == 2">--}}
{{--                    <div class="intro-section mb-3">--}}
{{--                        <h4 class="title">إختيار بطاقة الدفع</h4>--}}
{{--                    </div>--}}
{{--                    <div class="buttons-payment mb-4">--}}
{{--                        <button class="btn-pay"><img src="{{ asset('front-assets/img/Visa-payment.png') }}" alt="pay img"--}}
{{--                                width="38.69"></button>--}}
{{--                        <button class="btn-pay"><img src="{{ asset('front-assets/img/apple-payment.png') }}" alt="pay img"--}}
{{--                                width="45"></button>--}}
{{--                        <button class="btn-pay"><img src="{{ asset('front-assets/img/mada-payment.png') }}" alt="pay img"--}}
{{--                                width="45"></button>--}}
{{--                    </div>--}}
{{--                    <div class="intro-section mb-3">--}}
{{--                        <h4 class="title">معلومات البطاقة</h4>--}}
{{--                    </div>--}}
{{--                    <div class="row g-4 mb-5">--}}
{{--                        <div class="col-12">--}}
{{--                            <div class="inp-cus">--}}
{{--                                <label class="title">رقم بطاقة الإئتمان</label>--}}
{{--                                <div class="title-inp">--}}
{{--                                    <input type="number" name="" id="" >--}}
{{--                                    <i class="fa-solid fa-check"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-6">--}}
{{--                            <div class="inp-cus">--}}
{{--                                <label class="title">تاريخ إنتهاء الصلاحية</label>--}}
{{--                                <div class="title-inp">--}}
{{--                                    <input type="text" name="" id="" >--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-6">--}}
{{--                            <div class="inp-cus">--}}
{{--                                <label class="title">رمز الحماية</label>--}}
{{--                                <div class="title-inp">--}}
{{--                                    <input type="number" name="" id="" >--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-12">--}}
{{--                            <div class="inp-cus">--}}
{{--                                <label class="title">رمز الخصم*</label>--}}
{{--                                <div class="title-inp">--}}
{{--                                    <input type="text" name="" id="" >--}}
{{--                                    <i class="fa-solid fa-check"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="btn-holder d-flex flex-column align-items-center gap-2 justify-content-center mt-4">--}}
{{--                        --}}{{-- <button class="main-btn lg-btn"  @click="submit">إتمام الطلب</button> --}}
{{--                        <form action="{{ route('orders.payment') }}" method="post">--}}
{{--                            @csrf--}}
{{--                            <button class="main-btn lg-btn" type="submit">إتمام الطلب</button>--}}
{{--                        </form>--}}
{{--                        <button class="btn text-danger px-5" @click="steb--"> السابق</button>--}}
{{--                    </div>--}}
{{--                    <!-- Rate Modal -->--}}
{{--                    <div class="modal fade filter-modal" id="confirmationOrderModal" data-bs-backdrop="static"--}}
{{--                        data-bs-keyboard="false" aria-labelledby="confirmationOrderModalLabel" aria-hidden="true">--}}
{{--                        <div class="modal-dialog modal-dialog-centered">--}}
{{--                            <div class="modal-content">--}}
{{--                                <div class="modal-body">--}}
{{--                                    <div class="title text-center mb-3 mt-2 fw-bold">--}}
{{--                                        تمت عمليه الشراء بنجاح--}}
{{--                                    </div>--}}
{{--                                    <div class="img-holder text-center mb-3">--}}
{{--                                        <img src="{{ asset('front-assets/img/order-confirmation.png') }}"--}}
{{--                                            alt="order confirmation" width="120">--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex align-items-center justify-content-center">--}}
{{--                                        <a href="{{ route('front.home') }}" class="main-btn lg-btn">--}}
{{--                                            العودة للصفحة الرئيسية--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- End Steb two -->
            </div>
        </div>
    </section>
    <script>
        let app = new Vue({
            el: ".section",
            data: {
                steb: 1,
                cartUser: [],
                userId: "{{ auth()->user()->id }}",
            },
            computed: {},

            methods: {
                deleteProduct(idProduct) {
                    // Delete product
                    axios
                        .delete(`/api/cart?user_id=${this.userId}&product_id=${idProduct}`)
                        .then(response => {
                            axios
                                .get(`/api/cart?user_id=${this.userId}`)
                                .then(response => {
                                    this.cartUser = response.data;
                                    if (Object.keys(this.cartUser).length > 0) {
                                        document.querySelector('#num-shop').innerHTML = this.cartUser
                                            .products.length;
                                    } else {
                                        window.location.href = "{{ route('orders') }}";
                                    }
                                })
                        })
                },
                errorAdd() {
                    var alert = document.createElement('div')
                    alert.innerHTML =
                        '<div  class="alert main-alert alert-danger alert-dismissible" role="alert">  يوجد خطاء حاول مرة أخري <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                    document.querySelector('.section').append(alert)
                },
                submit() {
                    axios
                        .post(`http://127.0.0.1:8000/api/cart/submit?user_id=${this.userId}`)
                        .then(response => {
                            let myModal = new bootstrap.Modal(document.getElementById(
                            "confirmationOrderModal"));
                            myModal.show();
                        })
                        .catch(error => {
                            this.errorAdd()
                        })
                }

            },

            mounted() {
                // Get products
                axios.get(`/api/products`)
                    .then(response => (this.productsShop = JSON.parse(response.request.responseText).data))

                // Get cartUser
                axios
                    .get(`/api/cart?user_id=${this.userId}`)
                    .then(response => (this.cartUser = response.data))
            }

        });
    </script>
@endsection
