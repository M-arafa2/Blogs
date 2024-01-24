@extends('front.layouts.front')

@section('content')
<section class=" section talks-section ">
	<div class="container-md ">
		<div class="d-flex flex-column gap-4">
			@forelse($talks as $talk)
			<a href="{{ route('chat', $talk->id) }}" class="d-flex justify-content-between align-items-center talk">
				<div class="d-flex align-items-center gap-3">
					<div>
						<img src="{{ asset('front-assets') }}/img/person.png" alt="" class="img">
					</div>
					<div>
						<div class="title mb-1">
							{{ $talk->user->name}}
						</div>
						<div class="content">
							{{ $talk->message }}}
						</div>
					</div>
				</div>
				<div class="time d-flex flex-column  align-items-center">
					<i class="fa-regular fa-clock mb-2"></i>
					<div class="content">
						{{ $talk->created_at->diffForHumans() }}
					</div>
				</div>
			</a>
			@empty
			<div class="text-center">
				<img src="{{ asset('front-assets') }}/img/empty.svg" alt="" class="img">
				<div class="title">
					لا يوجد محادثات
				</div>
			</div>
			@endforelse
		</div>
	</div>
</section>
@endsection
