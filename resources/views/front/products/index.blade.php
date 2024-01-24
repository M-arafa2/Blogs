@extends('front.layouts.front')
@section('content')
<section class="section">
    <div class="py-3">
        <div class="container-md">
            <h6 class="mb-3">
                المنتجات المتاحة:
            </h6>
            <!-- Swiper -->
            <div class="swiper mySwiper filters-swiper mb-4">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="{{ route('products.index') }}" class="btn-filter {{ request()->department == null ? 'active' : '' }}">
                            الكل
                        </a>
                    </div>
                    @foreach ($departments as $department)
                    <div class="swiper-slide">
                        <a href="{{ route('products.index', ['department' => $department->id]) }}" class="btn-filter {{ request()->department == $department->id ? 'active' : '' }}">
                            {{ $department->name }}
                        </a>
                    </div>
                    @endforeach


                </div>
            </div>

            <div class="d-flex flex-column gap-3">
                @forelse ($products as $product)
                @include('front.includes.product-card', ['product' => $product])
                @empty
                <div class="alert alert-warning">لا يوجد منتجات.</div>
                @endforelse
            </div>
            @if($dep)
            <button type="button" class="btn-floating " data-bs-toggle="modal" data-bs-target="#support">
                <i class="fa-solid fa-robot"></i>
            </button>


            <div class="modal fade" id="support" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                    <form action="{{ route('support.store') }}" method="POST" class="modal-content" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel"> المنسق الالي</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3 accordion accordion-flush" id="accordionFlushExample">
                                <div class="row">
                                    @foreach ($dep?->questions()->get() as $item)
                                    @if($item->type == 'text')
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="input-{{ $item->id }}">{{ $item->label }}</label>
                                            <input required type="text" class="form-control" name="questions[{{ $item->id }}]" value="">
                                        </div>
                                    </div>
                                    @elseif($item->type == 'select')
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="input-{{ $item->id }}">{{ $item->label }}</label>
                                            <select required name="questions[{{ $item->id }}]" class="form-select" id="">
                                                <option value="">اختر اجابة</option>
                                                @foreach ($item->data as $answer)
                                                <option value="{{ $answer }}">{{ $answer }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">رسالتك</label>
                                <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                            <input type="hidden" name="department_id" value="{{ request()->department }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-primary">بدأ المحادثة</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif

        </div>
    </div>
</section>
@endsection
