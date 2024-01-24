@extends('front.layouts.front')
@section('content')
<section class="section" id="show-vendor">
    <!-- Rate Modal -->
    <div class="modal fade filter-modal" id="dateModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="dateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="title text-center mb-4 mt-2">
                        أضف الي السلة
                    </div>
                    <div class="title mb-2">
                        اضف الكمية
                    </div>
                    {{-- <div class="btns-quantity w-fit mx-auto">
                        <button @click="lessQuantity" class="less btn-card">-</button>
                            <span>@{{ quantity }}</span>
                    <button @click="addQuantity" class="add btn-card">+</button>
                </div> --}}
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
                    <button @click="quantity = 0" type="button" class="btn text-danger" id="close-modal" data-bs-dismiss="modal">
                        الغاء
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container-md">
        <div class="profile-stor-box mb-4">
            <div class="stor-cover">
                <img src="{{ $vendor->image
                        ? asset('/images/vendor/' . $vendor->image)
                        : 'https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png' }}" alt="">
            </div>
            <div class="box-data">
                <div class="title">
                    {{ $vendor->name }}
                </div>
                <p class="mb-2">
                    {{ $vendor->city?->name }} - {{ $vendor->country?->name }}
                </p>
                <p class="mb-2 d-flex align-items-center justify-content-between gap-3">
                    <span>
                        مفتوح من {{ \Carbon\Carbon::parse($vendor->from)->format('H:i A') }} - إلى
                        {{ \Carbon\Carbon::parse($vendor->to)->format('H:i A') }}<br><br>
                        {{ $vendor->desc }}


                    </span><br>
                    <span>
                        عنوان مزود الخدمة/ {{ $vendor->merchant_address ?: 'لم يتم تحديد عنوان من قبل المزود حتي الان'}}
                        {{-- {{ $vendor->desc }} --}}

                    </span>
                    <div class="d-flex justify-content-center">
                        @auth
                        @if(auth()->user()->id != $vendor->id)
                        <form action="{{ route('vendor.gotomessage') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
                            <button type="submit" class="main-btn">
                                <i class="fa-regular fa-paper-plane"></i>
                                للتواصل
                            </button>
                        </form>
                        @endif
                        @endauth
                        @guest
                        <a class="main-btn" href="{{ route('login') }}">
                            <i class="fa-regular fa-paper-plane"></i>
                            للتواصل
                        </a>
                        @endguest
                    </div>
            </div>
        </div>
        <ul class="nav nav-pills mb-3 main-tap-holder gap-lg-5 flex-nowrap w-100 justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item " role="presentation">
                <button class="main-tap active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">القائمة</button>
            </li>
            <li class="nav-item " role="presentation">
                <button class="main-tap" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">المراجعات</button>
            </li>
            <li class="nav-item " role="presentation">
                <button class="main-tap" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">حول</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <div class="d-flex flex-column mt-2">


                    @forelse($vendor->products->where('acceptance', 'accepted')->where('status', 1) as $product)
                    <div class="box-add-product d-flex align-items-center justify-content-between">
                        <a href="{{ route('product.show', $product->id) }}" class="data d-flex align-items-center gap-3 flex-fill">
                            <img src="{{ asset('images/product/' . $product->image) }}" alt="" class="img">
                            <div class="d-flex flex-column gap-1">
                                <div class="title">
                                    {{ $product->name }}
                                </div>
                                <div class="info">
                                    {{ $product->department?->name }}
                                </div>
                                <div>
                                    <i class="fa-solid fa-wallet icon me-1"></i>
                                    ${{ number_format($product->price, 2) }}
                                </div>
                            </div>
                        </a>
                        @if (auth()->user())
                        <button @click="price = {{ $product->price }};productId = {{ $product->id }}" class="main-btn" data-bs-toggle="modal" data-bs-target="#dateModal">
                            <i class='fas fa-plus'></i>
                            أضف الى السلة
                        </button>
                        @else
                        <a class="main-btn text-white" href="{{ route('login') }}">
                            <i class='fas fa-plus'></i>
                            أضف الى السلة
                        </a>
                        @endif
                    </div>
                    @empty
                    <div class="alert alert-warning">لا يوجد منتجات!</div>
                    @endforelse

                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                <div class="box-add-product d-flex align-items-center justify-content-between">
                    {{-- <a href="{{ route('product.show', $product->id) }}" class="data d-flex align-items-center gap-3 flex-fill">
                    --}}
                    <a href="#" class="data d-flex align-items-center gap-3 flex-fill">

                        <img src="#" alt="" class="img img-rate">
                        {{-- <img src="{{ asset('images/product/' . $product->image) }}" alt="" class="img img-rate"> --}}

                        <div class="d-flex flex-column gap-1">
                            <div class="title">
                                محمد المهدي
                            </div>


                            <div class="d-flex align-items-center gap-1">
                                <svg class="text-warning star-rate" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="text-warning star-rate" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="text-warning star-rate" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="text-warning star-rate" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="text-warning star-rate" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <p class="fw-bold mb-0">4.9</p>
                            </div>

                            <div class="des-rate">
                                لقد كان رائعا
                            </div>
                        </div>
                    </a>

                    <p class="date-rate">
                        مارس,2023.1,15
                    </p>

                </div>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                <h4>
                    حول :
                </h4>
                <div class="about-tape">
                    <div class="row row-cols-1">
                        <div class="col col-md-6">
                            الاسم : {{ $vendor->name }} <br>
                        </div>
                        <div class="col col-md-6">
                            الهاتف: {{ $vendor->phone }} <br>
                        </div>
                        <div class="col col-md-6">
                            المدينة: {{ $vendor->city?->name }} <br>
                        </div>
                        <div class="col col-md-6">
                            نبذة عن التاجر:{{ $vendor->desc }} <br>
                        </div>
                        <div class="col col-md-6">
                            الرقم التجاري: {{ $vendor->commercial_no }} <br>
                        </div>
                    </div>

                </div>
                <div class="product-cover text-center">
                    <p class="fs-6">موقع المزود</p>
                    {{-- <img src="{{ $vendor->image
                                    ? asset('/images/vendor/' . $vendor->image)
                                    : 'https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png' }}"
                    alt=""> --}}
                    @if ($vendor->lat && $vendor->long)

                    <div id="map" style="width: 100%; height: 400px;"></div>
                    @else
                    <p>لم يتم تحديد موقع للمزود بعد</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>



    </div>
</section>
{{-- <script>
    let showVendor = new Vue({
        el: "#show-vendor"
        , data: {
            userId: "{{ auth()->user() ? auth()->user()->id : '' }}"
, quantity: 0
, productId: ""
, price: ""
, error: false
, },

methods: {
doneAdd() {
this.quantity = 0;
this.error = false;
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
})
}
, errorAdd() {
this.quantity = 0;
this.error = false;
document.querySelector('#close-modal').click();
var alert = document.createElement('div')
alert.innerHTML =
'<div class="alert main-alert alert-danger alert-dismissible" role="alert"> يوجد خطاء حاول مرة أخري <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
document.querySelector('.section').append(alert)
}
, postOrder() {
if (this.quantity <= 0) { this.error=true; } else { axios .post( `/api/cart?user_id=${this.userId}&product_id=${this.productId}&quantity=${this.quantity}&price=${this.price}` ) .then(response=> this.doneAdd())
    .catch(error => (this.errorAdd()))
    }
    }
    , }
    , });

    </script> --}}
    <script>
        let showVendor = new Vue({
            el: "#show-vendor"
            , data: {
                userId: "{{ auth()->user() ? auth()->user()->id : '' }}"
                , quantity: 0
                , productId: ""
                , price: ""
                , hasError: false, // تم تغيير اسم المتغير هنا
            }
            , methods: {
                doneAdd() {
                    this.quantity = 0;
                    this.hasError = false;
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
                        });
                }
                , errorAdd() {
                    this.quantity = 0;
                    this.hasError = true; // تم تغيير القيمة هنا
                    document.querySelector('#close-modal').click();
                    var alert = document.createElement('div');
                    alert.innerHTML =
                        '<div  class="alert main-alert alert-danger alert-dismissible" role="alert">  يوجد خطاء حاول مرة أخري <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    document.querySelector('.section').append(alert);
                }
                , postOrder() {
                    if (this.quantity <= 0) {
                        this.hasError = true;
                    } else {
                        axios
                            .post(
                                `/api/cart?user_id=${this.userId}&product_id=${this.productId}&quantity=${this.quantity}&price=${this.price}`
                            )
                            .then(response => this.doneAdd())
                            .catch(error => this.errorAdd()); // تم تغيير هنا أيضًا
                    }
                }
                , lessQuantity() {
                    if (this.quantity >= 1) {
                        this.quantity = this.quantity - 1;
                    }
                }
                , addQuantity() {
                    this.quantity = this.quantity + 1;
                }
            },

            mounted() {

            }
        });

    </script>




    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxwLwv3e6VKoTTf0IpD9KDwP-9SyIZ7ds&callback=initMap" async defer></script>
    <script>
        function initMap() {
            var lat = "{!! json_encode($vendor->lat) !!}";
            var long = "{!! json_encode($vendor->long) !!}";
            var myLatLng = {
                lat: Number(lat)
                , lng: Number(long)
            };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13
                , center: myLatLng
            });



            var intlat = Number(lat);
            var intlng = Number(long);



            var marker = new google.maps.Marker({
                position: {
                    lat: intlat
                    , lng: intlng
                }
                , map: map
                , title: 'Hello World!'
            });



        }

    </script>
    @endsection
