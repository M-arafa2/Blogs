@extends('front.layouts.front')
@section('content')
    <section class="section">
        <div class="py-2">
            <div class="container-md">
                <h5 class="lg-title mb-3">تعديل منتج</h5>
                <form action="{{ route('vendor.products.update', $product->id) }}" method="post"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row g-4 mb-5">
                        <div class="col-12">
                            <div class="inp-cus add">
                                <label class="title">اسم المنتج</label>
                                <div class="title-inp">
                                    <input type="text" class="inp-add" placeholder="اسم المنتج" name="name"
                                        value="{{ $product->name }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="inp-cus add">
                                <label class="title">القسم </label>
                                <div class="title-inp">
                                    <select name="department_id" class="inp-add select2">
                                        <option value="" selected disabled readonly>---اختر القسم---</option>
                                        @forelse($departments as $department)
                                            <option value="{{ $department->id }}"
                                                {{ $product->department_id == $department->id ? 'selected' : null }}>
                                                {{ $department->name }}
                                            </option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('department_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-12">
						<div class="inp-cus add">
							<label class="title">القسم الفرعي</label>
							<div class="title-inp">
								<select name="" id="">
									<option value="">القسم الفرعي</option>
									<option value="">مضرب كهربائي</option>
								</select>
							</div>
						</div>
					</div> --}}
                        <div class="col-12">
                            <div class="inp-cus add">
                                <label class="title">صورة المنتج</label>
                                <div class="title-inp">
                                    <input class=" img inp-add " name="image" type="file" accept="image/*">
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @if ($product->image)
                                <img src="{{ asset('images/product/' . $product->image) }}" alt=""
                                    class="img-thumbnail mt-1 h-auto img-preview" width="100px">
                            @else
                                <img src="{{ asset('images/no-image.jpg') }}" alt=""
                                    class="img-thumbnail mt-1 h-auto img-preview" width="100px">
                            @endif

                        </div>
                        <div class="col-12">
                            <div class="inp-cus add">
                                <label class="title">صور المنتج الاضافية</label>
                                <div class="title-inp">
                                    <input class=" img inp-add " name="images[]" type="file" accept="image/*" multiple>
                                    @error('images')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @if ($product->images)
                                @foreach ($product->images as $image)
                                    <img src="{{ asset('images/product/' . $image->image) }}" alt=""
                                        class="img-thumbnail mt-1 h-auto img-preview" width="100px">
                                @endforeach
                            @else
                                <img src="{{ asset('images/no-image.jpg') }}" alt=""
                                    class="img-thumbnail mt-1 h-auto img-preview" width="100px">
                            @endif

                        </div>
                        <div class="col-12">
                            <div class="inp-cus add">
                                <label class="title">وصف للمنتج</label>
                                <div class="title-inp">
                                    <textarea name="description" id="" rows="6">  {!! $product->description !!}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="inp-cus add">
                                <label class="title">سعر المنتج</label>
                                <div class="title-inp">
                                    <input type="text" name="price" id="" class="inp-add"
                                        value="{{ $product->price }}">
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="inp-cus add">
                                <label class="title">وقت التسليم</label>
                                <div class="title-inp">
                                    <input type="number" name="leadtime" id="" class="inp-add"
                                        value="{{ $product->leadtime }}">
                                    @error('leadtime')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="inp-cus add">
                                <label class="title">توفر خدمة التوصيل</label>
                                <div class="title-inp">
                                    <select name="delivery" class="inp-add" id="">
                                        <option value="" selected readonly disabled>--اختر--</option>
                                        <option value="1" {{ $product->delivery == '1' ? 'selected' : null }}>متوفرة
                                        </option>
                                        <option value="0" {{ $product->delivery == '0' ? 'selected' : null }}>غير
                                            متوفرة
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="inp-cus add">
                                <label class="title">هل يتطلب وجود تأمين مالي للمنتج ؟</label>
                                <div class="title-inp">
                                    <select name="insurance" class="inp-add" id="">
                                        <option value="">--اختر--</option>
                                        <option value="1" {{ $product->insurance == '1' ? 'selected' : null }}>نعم
                                        </option>
                                        <option value="0" {{ $product->insurance == '0' ? 'selected' : null }}>لا
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="inp-cus add">
                                <label class="title">مبلغ التأمين</label>
                                <div class="title-inp">
                                    <input type="number" name="insurance_amount" id="" class="inp-add"
                                        value="{{ $product->insurance_amount }}">
                                    @error('insurance_amount')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-holder d-flex flex-column gap-2 ">
                        <button class="mx-auto main-btn lg-btn" type="submit">تعديل</button>
                        <a href="{{ route('vendor.products.index') }}"
                            class="btn mx-auto  main-btn  bg-transparent text-dark">رجوع</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('js')
@endpush
