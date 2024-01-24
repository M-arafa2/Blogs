@extends('front.layouts.front')
@section('content')
<section class="section section-product">
	<button class="btn-fixed" data-bs-toggle="modal" data-bs-target="#dateModal">
		<i class='bx bx-calendar'></i>
		إختيار التاريخ
	</button>
	<!-- Rate Modal -->
	<div class="modal fade filter-modal" id="dateModal" aria-labelledby="dateModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="title text-center mb-4 mt-2">
						إختيار التاريخ
					</div>
					<div class="title mb-2">
						إختر التاريخ
					</div>
					<input type="date" name="" id="" class="form-control mb-3">
					<div class="date-selected-box mb-4">
						<div class="date">
							اليوم
							<span>12</span>
						</div>
						<div class="date">
							الشهر
							<span>أغسطس</span>
						</div>
						<div class="date">
							العام
							<span>2023</span>
						</div>
					</div>
					<div class="title mb-2">
						إختر التوقيت
					</div>
					<div class="row  g-2 mb-5">
						<div class="col-3">
							<div class="time-selected-box active">
								<div class="icon-holder">
									<i class='bx bx-time-five'></i>
								</div>
								الساعة
								<span>9:00 AM</span>
							</div>
						</div>
						<div class="col-3">
							<div class="time-selected-box">
								<div class="icon-holder">
									<i class='bx bx-time-five'></i>
								</div>
								الساعة
								<span>10:00 AM</span>
							</div>
						</div>
						<div class="col-3">
							<div class="time-selected-box">
								<div class="icon-holder">
									<i class='bx bx-time-five'></i>
								</div>
								الساعة
								<span>11:00 AM</span>
							</div>
						</div>
						<div class="col-3">
							<div class="time-selected-box">
								<div class="icon-holder">
									<i class='bx bx-time-five'></i>
								</div>
								الساعة
								<span>12:00 AM</span>
							</div>
						</div>
					</div>
					<div class="d-flex gap-1 flex-column align-items-center">
						<button class="main-btn px-5">
							تأكيد التوقيت
						</button>
						<button type="button" class="btn" data-bs-dismiss="modal">
							إلغاء
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="pb-5">
		<div class="container-md">
			<div class="row">
				<div class="col-12 px-0">
					<div class="product-holder">
						<div class="product-info">
							<div class="product-option">
								<div class="rate-holder">
									<i class="fa-solid fa-star"></i>
									<small>4.5</small>
								</div>
								<div class="cart-holder">
									<i class="fa-solid fa-cart-shopping"></i>
								</div>
								<div class="share-holder">
									<i class="fa-solid fa-share-nodes"></i>
								</div>
							</div>
							<!-- Swiper -->
							<div class="swiper product-Swiper mb-3">
								<div class="swiper-wrapper">
									<div class="swiper-slide">
										<img src="{{ asset('front-assets/img/flower-img.jpg') }}" />
									</div>
									<div class="swiper-slide">
										<img src="{{ asset('front-assets/img/decorated.webp') }}" />
									</div>
									<div class="swiper-slide">
										<img src="{{ asset('front-assets/img/login-slide2.jpg') }}" />
									</div>
									<div class="swiper-slide">
										<img src="{{ asset('front-assets/img/login-slide3.jpg') }}" />
									</div>
									<div class="swiper-slide">
										<img src="{{ asset('front-assets/img/flower-img.jpg') }}" />
									</div>
									<div class="swiper-slide">
										<img src="{{ asset('front-assets/img/decorated.webp') }}" />
									</div>
								</div>
								<div class="swiper-pagination won-pagination"></div>
							</div>
						</div>
						<div class="container-md">
							<div class="product-details mb-3">
								<h6 class="title">باقة ورد بألوان مختلفة</h6>
								<h5 class="price"><span>35</span> ريال سعودي <i class="fa-solid fa-wallet"></i></h5>
							</div>
							<div class="about-product mb-4">
								<h6 class="not">حول المنتج:</h6>
								<p class="des">لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور
									طريقه وضع النصوص
									بالتصاميم سواء
									كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...
								</p>
							</div>
						{{--	@include('front.includes.product-options', ['products' => $product->options()])  --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	let app = new Vue({
		el: ".section-product",
		data: {},
		computed: {},

		methods: {},

		mounted() {}

	});
</script>
@endsection
