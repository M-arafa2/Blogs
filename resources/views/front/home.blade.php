@extends('front.layouts.front')
@section('content')
    <section class="section">
        <div class="py-4">
            <div class="container-md">
                <form action="{{ route('front.home') }}" method="get">
                    <div class="search-box">
                        <div class="inp-holder">
                            <i class='bx bx-search'></i>
                            <input type="search" name="keyword" id="search-cus" placeholder="إبحث هنا....."
                                value="{{ old('keyword', request()->input('keyword')) }}">
                        </div>
                        <button class=" main-btn">
                            بحث
                        </button>
                        <!-- <button class="btn-pop" data-bs-toggle="modal" data-bs-target="#rateModal"><i
                       class='bx bx-slider-alt'></i></button> -->
                    </div>
                </form>
                <!-- Rate Modal -->
                <!-- <div class="modal fade filter-modal" id="rateModal" aria-labelledby="rateModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                     <div class="modal-content">
                      <div class="modal-body">
                       <div class="title text-center mb-4 mt-2">
                        التصنيف
                       </div>
                       <div class="title mb-2">
                        الأنواع
                       </div>
                       <div class="swiper mySwiper categories-swiper mb-4">
                        <div class="swiper-wrapper">
                         <div class="swiper-slide">
                          <a href="#">
                           <div class="category-box active">
                            <div class="icon-holder"><i class='bx bx-detail'></i></div>
                            <p>الكل</p>
                           </div>
                          </a>
                         </div>
                         <div class="swiper-slide">
                          <a href="#">
                           <div class="category-box">
                            <div class="icon-holder"><i class='bx bx-party'></i></div>
                            <p>مناسبات</p>
                           </div>
                          </a>
                         </div>
                         <div class="swiper-slide">
                          <a href="#">
                           <div class="category-box">
                            <div class="icon-holder"><i class='bx bx-cake'></i></div>
                            <p>كيك وحلويات</p>
                           </div>
                          </a>
                         </div>
                         <div class="swiper-slide">
                          <a href="#">
                           <div class="category-box">
                            <div class="icon-holder"><i class='bx bx-gift'></i></div>
                            <p>هدايا</p>
                           </div>
                          </a>
                         </div>
                         <div class="swiper-slide">
                          <a href="#">
                           <div class="category-box">
                            <div class="icon-holder"><i class="fa-solid fa-cake-candles"></i></div>
                            <p>أعياد ميلاد</p>
                           </div>
                          </a>
                         </div>
                         <div class="swiper-slide">
                          <a href="#">
                           <div class="category-box">
                            <div class="icon-holder"><i class='bx bx-store-alt'></i></div>
                            <p>ماركة</p>
                           </div>
                          </a>
                         </div>
                        </div>
                       </div>
                       <div class="title mb-2">
                        إختر النوع
                       </div>
                       <div class="row  g-1 mb-4">
                        <div class="col-4 d-flex align-items-center gap-2">
                         <input type="radio" class="" name="" id="">
                         النوع الأول
                        </div>
                        <div class="col-4 d-flex align-items-center gap-2">
                         <input type="radio" class="" name="" id="">
                         النوع الثاني
                        </div>
                        <div class="col-4 d-flex align-items-center gap-2">
                         <input type="radio" class="" name="" id="">
                         النوع الثالت
                        </div>
                        <div class="col-4 d-flex align-items-center gap-2">
                         <input type="radio" class="" name="" id="">
                         النوع الرابع
                        </div>
                        <div class="col-4 d-flex align-items-center gap-2">
                         <input type="radio" class="" name="" id="">
                         النوع الخامس
                        </div>
                       </div>
                       <div class="title mb-2">
                        إختر النوع
                       </div>
                       <div class="row  g-1 mb-4">
                        <div class="col-4 d-flex align-items-center gap-2">
                         <input type="radio" class="" name="" id="">
                         النوع الأول
                        </div>
                        <div class="col-4 d-flex align-items-center gap-2">
                         <input type="radio" class="" name="" id="">
                         النوع الثاني
                        </div>
                        <div class="col-4 d-flex align-items-center gap-2">
                         <input type="radio" class="" name="" id="">
                         النوع الثالت
                        </div>
                        <div class="col-4 d-flex align-items-center gap-2">
                         <input type="radio" class="" name="" id="">
                         النوع الرابع
                        </div>
                        <div class="col-4 d-flex align-items-center gap-2">
                         <input type="radio" class="" name="" id="">
                         النوع الخامس
                        </div>
                       </div>
                       <div class="d-flex gap-1 flex-column align-items-center">
                        <button class="main-btn px-5">
                         تأكيد
                        </button>
                        <button type="button" class="btn" data-bs-dismiss="modal">
                         إلغاء
                        </button>

                       </div>
                      </div>
                     </div>
                    </div>
                   </div> -->
                <div class="intro-section">
                    <h4 class="title">الفئات</h4>
                    <a href="{{ route('products.index') }}" class="show-more">عرض الكل</a>
                </div>
                <!-- Swiper -->
                <div class="swiper mySwiper categories-swiper mb-4">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="{{ route('products.index') }}">
                                <div class="category-box {{ request()->department == null ? 'active' : '' }}">
                                    <div class="icon-holder"><i class='bx bx-detail'></i></div>
                                    <p>الكل</p>
                                </div>
                            </a>
                        </div>
                        @forelse(App\Models\Department::whereStatus(1)->whereNull('parent_id')->get() as $department)
                            <div class="swiper-slide">
                                <a href="{{ route('products.index', ['department' => $department->id]) }}">
                                    <div
                                        class="category-box {{ request()->department == $department->id ? 'active' : '' }}">
                                        <div class="icon-holder">
                                            <img src="{{ asset('admin-assets/img/department/' . $department->cover) }}"
                                                alt="" class="img-category">
                                        </div>
                                        <p> {{ $department->name }}</p>
                                    </div>
                                </a>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="intro-section">
                    <h4 class="title">المنتجات الأكثر مبيعاً</h4>
                    <a href="{{ route('products.best_seller') }}" class="show-more">عرض الكل</a>
                </div>
                <ul class="order-list d-flex flex-column gap-4 mb-5 ">

                    @forelse($best_sellers as $product)
                        @include('front.includes.product-card', ['product' => $product])
                    @empty
                        لا يوجد منتجات
                    @endforelse

                </ul>
                <div class="intro-section">
                    <h4 class="title">المنتجات</h4>
                    <a href="{{ route('products.index') }}" class="show-more">عرض الكل</a>
                </div>
                
                <ul class="order-list d-flex flex-column gap-4 mb-5">
                    @forelse ($products as $product)
                        @include('front.includes.product-card', ['product' => $product])
                    @empty
                        <p>لا يوجد منتجات</p>
                    @endforelse
                </ul>
                @include('front.includes.sliders', ['sliders' => $sliders])
                <!-- vendors -->
                @include('front.includes.vendors', ['vendors' => $vendors])
            </div>
        </div>
    </section>
@endsection
