@props(['sliders'])
@if($sliders->count() > 0)
<div class="intro-section">
	<!-- <h4 class="title"> أفضل المنسقين</h4> -->
	{{-- <a href="{{ route('shops') }}" class="show-more">عرض الكل</a> --}}
</div>
<div class="swiper offer-swiper mb-5">
	<div class="swiper-wrapper">
		@foreach($sliders as $slider)
		<div class="swiper-slide">
			{{-- <a href="{{$slider->url}}" class="box-offer"> --}}
				<a  class="box-offer">

				<div class="header-box">
					<img src="{{ $slider->cover ?
                                    asset('admin-assets/img/slider/'.$slider->cover)  :
                                    'https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png'
                                    }}" alt="" class="img">
				</div>
				{{-- <div class="content text-center">
					<h6 class="mb-1 fw-bold">
						{{ $slider->title }}
					</h6>
				</div> --}}
			</a>
		</div>
		@endforeach
	</div>
</div>
@endif
