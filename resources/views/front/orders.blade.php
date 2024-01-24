@extends('front.layouts.front')
@section('content')
<section class="section" id="orders">
    <div class="py-2">
        <div class="container-md">
            <div class="intro-section mb-0">
                <h4 class="title fw-semibold">العناصر الموجودة</h4>
            </div>
            <div v-cloak v-if="Object.keys(cartUser).length > 0">
                <ul class="order-list mb-3">
                    <li v-for="(product,i) in cartUser.products" :key="i">
                        <div class="box-add-product order-item">
                            <div class="data">
                                <div class="main-info">
                                    <img :src="'{{ asset('images/product') }}/' + product.image" alt="" class="img">
                                    <div class="d-flex flex-column gap-1">
                                        <div class="title">
                                            @{{product.name}}
                                        </div>

                                        <div class="about-order ">
                                            <span class="name">
                                                الكمية: <span class="main-color ">@{{product.pivot.quantity}}</span>
                                            </span>
                                            <span class="bar"></span>
                                            <div class="price">
                                                <span class=""><small>ر.س</small> @{{product.pivot.total}}</span>
                                                <i class="fa-solid fa-wallet"></i> - مبلغ التأمين : <small>ر.س</small> @{{product.pivot.insurance_amount}}
                                            </div>
                                            <div class="price">
                                                {{-- <span class=""><small>ر.س</small> @{{product.pivot.total}}</span> --}}
                                                <i class="fa-solid fa-wallet"></i> -  وقت وتاريخ المناسبة : من  @{{product.pivot.delivery_date1}} الي @{{product.pivot.delivery_date2}}<small></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons-container">
                                    {{-- <div class="btns-quantity"><button class="less btn-card">-</button> <span>5</span> <button class="add btn-card">+</button></div> --}}
                                    <button @click="deleteProduct(product.pivot.product_id)" class="btn-option"><i class='bx bx-trash'></i></button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="box-add-product order-item">
                            <div class="data">
                                <div class="main-info">
                                    <img src="{{ asset('front-assets') }}/img/order-car.png" alt="" class="img shadow-none">
                                    <div class="d-flex flex-column gap-1">
                                        <div class="title">
                                            التوصيل
                                        </div>
                                        <div class="about-order">
                                            <!-- <span class="name fs-14px">
                                دقيقة 12-25 <i class='bx bx-time-five main-color fs-11px'></i>
                            </span>
                            <span class="bar"></span> -->
                                            <div class="price">
                                                <span class=""><small>ر.س</small> @{{cartUser.delivery_fee}}</span>
                                                <i class="fa-solid fa-wallet"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="details-box">
                    <div class="word">
                        <p>أجرة التوصيل</p>
                        <p>ضريبة</p>
                        {{-- <p>التأمين</p> --}}
                        <p>المجموع:</p>
                    </div>
                    <div class="quantity">
                        <p><small>ر.س</small> @{{cartUser.delivery_fee}}</p>
                        <p><small>ر.س</small> @{{cartUser.tax}}</p>
                        {{-- <p>@{{cartUser.insurance_amount}}$</p> --}}
                        <p class="total"><small>ر.س</small> @{{cartUser.total}}</p>
                    </div>
                </div>
                <div class="btn-holder d-flex align-items-center justify-content-center mt-4">
                    <a href="{{ route('confirmationOrder') }}" class="main-btn lg-btn">إتمام الطلب</a>
                </div>
            </div>
            <h1 v-else class="text-center">
                لا يوجد طلبات
            </h1>
        </div>
    </div>


</section>
<script>
    let orders = new Vue({
        el: "#orders"
        , data: {
            userId: "{{auth()->user()->id}}"
            , cartUser: []
        , },

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
                                    document.querySelector('#num-shop').innerHTML = this.cartUser.products.length;
                                } else {
                                    document.querySelector('#num-shop').innerHTML = 0;
                                }
                            })
                    })
            }
            , errorAdd() {
                var alert = document.createElement('div')
                alert.innerHTML = '<div  class="alert main-alert alert-danger alert-dismissible" role="alert">  يوجد خطاء حاول مرة أخري <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                document.querySelector('.section').append(alert)
            }
        },

        mounted() {
            // Get cartUser
            axios
                .get(`/api/cart?user_id=${this.userId}`)
                .then(response => (this.cartUser = response.data))
        }
    });

</script>
@endsection
