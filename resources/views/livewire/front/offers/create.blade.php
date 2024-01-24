<div>
    @if (auth()->user()->type == 'vendor')
        <div class=" bg-white mb-3">

            @if (session('success'))
                <div class="container-md">
                    <div class="alert alert-success mt-3 mb-3">{{ session('success') }}</div>
                </div>
            @endif

            @if ($order->offers->where('user_id', auth()->user()->id)->count() == 0 &&
                auth()->user()->offers()->where('status', 'pending')->count() < setting('vendor_offers'))
                <h6 class="container-md mb-3 py-3 fw-semibold border-b color-222 fs-16px" id="addOffer">
                    أضف عرضك
                </h6>
                <div class="container-md pb-3">
                    <div class="row g-4">
                        <div class="col-6">
                            <label for="" class="mb-2">
                                مدة التسليم
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group mb-3">
                                <input type=" number" wire:model="duration" class="form-control">
                                <span class="input-group-text fs-12">أيام</span>
                            </div>
                            @error('duration')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="" class="mb-2">
                                قيمة العرض
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group mb-3">
                                <input type=" number" wire:model="amount" class="form-control">
                                <span class="input-group-text fs-12">$</span>
                            </div>
                            @error('amount')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <span>
                                <small class="color-222">مستحقاتك 0$</small>
                            </span>
                            <br>
                            <span><small class="color-222">بعد خصم </small> <small class="main-color">عمولة موقع
                                    فرح</small> </span>

                        </div>
                        <div class="col-12">
                            <label for="" class="mb-2">
                                وصف العرض
                                <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control" wire:model="description" rows="5"></textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <div class="btn-holder">
                                <button class="add_file btn" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample" aria-expanded="false"
                                    aria-controls="collapseExample">
                                    <i class="fa-solid fa-paperclip icon-item"></i>
                                    إرفاق ملفات
                                </button>
                            </div>
                            <!-- attached file -->
                            <div class="file_content mt-1">
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body justify-content-center align-items-center">
                                        <div
                                            class="con w-100 my-3 py-3 d-flex align-items-center justify-content-center flex-column position-relative">
                                            <input wire:model="files" id="attachment-file" class="file-inp"
                                                type="file" multiple>
                                            <div class="upload_icon mb-2">
                                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                            </div>
                                            <h6 class="text-def mb-0">اضغط او قم بالسحب و الافلات هنا</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Progress Bar -->
                            <div x-show="isUploading" class="mt-2 w-100">
                                <progress max="100" x-bind:value="progress" class="w-100"></progress>
                            </div>
                            @error('files.*')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <ul class="help-block">
                                <li class="fs-13px color-222"> لا تستخدم وسائل تواصل خارجية</li>
                                <li class="fs-13px color-222"> لا تضع روابط خارجية، قم بالاهتمام
                                    <a target="_blank" href="#" class="main-color fs-13px"> بمعرض أعمالك </a>
                                    بدلا منها
                                </li>
                                <li class="fs-13px color-222"><a target="_blank" href="#"
                                        class="fs-13px main-color">
                                        اقرا هنا كيف تضيف عرضا مميزا على أي مشروع
                                    </a></li>
                            </ul>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <div class="main-btn" wire:click="save">
                                أضف عرضك
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-white mb-3">
                    <h6 class="container-md mb-3 py-3 fw-semibold border-b color-222 fs-16px">
                        العرض
                    </h6>
                    <div class="container-md">
                        <div class="box-add-offer">
                            <div class="header-offer d-flex align-items-center gap-2 mb-3">
                                @if ($order->offers->where('user_id', auth()->user()->id)->first()->user->photo)
                                    <img src="{{ display_file($order->offers->where('user_id', auth()->user()->id)->first()->user->photo) }}"
                                        alt="" class="img-user">
                                @else
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLRrfGmicNOQwEeoCv7JtxJ69QOxUfJq0eyg&usqp=CAU"
                                        class="img-user" alt="">
                                @endif
                                <div>
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="" class="name d-block main-color fw-semibold fs-13px">
                                            {{ $order->offers->where('user_id', auth()->user()->id)->first()->user->name }}
                                        </a>
                                        <div class="satrs d-flex align-items-center">
                                            <i class="star active fas fa-star fs-10px"></i>
                                            <i class="star active fas fa-star fs-10px"></i>
                                            <i class="star active fas fa-star fs-10px"></i>
                                            <i class="star fas fa-star fs-10px"></i>
                                            <i class="star fas fa-star fs-10px"></i>
                                        </div>
                                    </div>
                                    <div class="info d-flex align-items-center gap-2">
                                        <div class="item d-flex align-items-center gap-1 fs-12 color-777">
                                        <i class="fa fa-fw fa-briefcase fs-10px color-777"></i>
                                            استشاري دراسات جدوي
                                        </div>
                                        <div class="item d-flex align-items-center gap-1 fs-12 color-777">
                                        <i class="fas fa-clock fs-10px color-777"></i>
                                            {{ $order->offers->where('user_id', auth()->user()->id)->first()->human_date }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-grey py-3 mb-3">
                                <div class="row text-center row-gap-24 justify-content-center">
                                    <div class="col-6">
                                        <p class="title mb-0">المبلغ</p>
                                        <h5 class="content mb-0"><span>
                                                $
                                                {{ number_format($order->offers->where('user_id', auth()->user()->id)->first()->amount, 2) }}</span>
                                        </h5>
                                    </div>

                                    <div class="col-6">
                                        <p class="title mb-0">مدة التنفيذ</p>
                                        <h5 class="content mb-0"> يوم <span>
                                                {{ $order->offers->where('user_id', auth()->user()->id)->first()->duration }}</span>
                                        </h5>
                                    </div>

                                    <div class="col-6 ">
                                        <p class="title mb-0">معرض الأعمال</p>
                                        <h5 class="content mb-0">
                                            <a href="https://mostaql.com/u/Basem_Gaber/portfolio"
                                                class="clr-gray-darker">
                                                4 أعمال
                                            </a>
                                        </h5>
                                    </div>

                                </div>
                            </div>
                            <div class="description-text py-2">
                                {{ $order->offers->where('user_id', auth()->user()->id)->first()->description }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endif

    <div class="bg-white">
        <h6>
            <a class="w-100 container-md mb-3 py-3 fw-semibold border-b color-222 fs-16px d-flex align-items-center justify-content-between"
                data-bs-toggle="collapse" href="#offerMenu" role="button" aria-expanded="true">
                العروض المقدمة
                <i class="fa-solid fa-angle-down"></i>
            </a>
        </h6>
        @if ($order->offers->count() > 0)
            @foreach ($order->offers as $offer)
                <div class="container-md">
                    <div class="collapse show pb-3" id="offerMenu">
                        <div class="box-add-offer">
                            <div class="header-offer d-flex align-items-center gap-2 mb-3">
                                @if ($offer->user->photo)
                                    <img src="{{ display_file($offer->user->photo) }}" alt=""
                                        class="img-user">
                                @else
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLRrfGmicNOQwEeoCv7JtxJ69QOxUfJq0eyg&usqp=CAU"
                                        class="img-user" alt="">
                                @endif
                                <div class="w-100">
                                    <div
                                        class="d-flex align-items-center mb-2 justify-content-between gap-2 flex-grow-1">
                                        <div class="d-flex align-items-center gap-2 ">
                                            <a href="" class="name d-block main-color fw-semibold fs-13px">
                                                {{ $offer->user->name }}
                                            </a>
                                            <div class="satrs d-flex align-items-center">
                                                <i class="star active fas fa-star fs-10px"></i>
                                                <i class="star active fas fa-star fs-10px"></i>
                                                <i class="star active fas fa-star fs-10px"></i>
                                                <i class="star fas fa-star fs-10px"></i>
                                                <i class="star fas fa-star fs-10px"></i>
                                            </div>
                                        </div>
                                        @if ($order->user_id == auth()->user()->id && auth()->user()->type == 'user')
                                            <a href="{{ route('offer.show', encrypt($offer->id)) }}"
                                                class="main-btn contact">مراسلة <i class="fa fa-paper-plane"></i></a>
                                        @endif
                                    </div>
                                    <div class="info d-flex align-items-center gap-2">
                                        <div class="item d-flex align-items-center gap-1 fs-12 color-777">
                                            <i class="fa fa-fw fa-briefcase fs-10px color-777"></i>
                                            استشاري دراسات جدوي
                                        </div>
                                        <div class="item d-flex align-items-center gap-1 fs-12 color-777">
                                            <i class="fas fa-clock fs-10px color-777"></i>
                                            {{ $offer->human_date }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="description-text">
                                {{ $offer->description }}
                            </div>
                            @if ($order->user_id == auth()->user()->id &&
                                auth()->user()->type == 'user' &&
                                $offer->status != 'accepted' &&
                                \App\Models\Balance::where('user_id', auth()->user()->id)->where('status', 'available')->sum('amount') >= $offer->amount)
                                <div class="mt-2">
                                    <button class="btn btn-success btn-sm" wire:click="accept({{ $offer }})">
                                        <i class="fa fa-check"></i>
                                        قبول</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="container-md">
                <div class="collapse show pb-3" id="offerMenu">
                    <div class="alert alert-warning mb-0">لا يوجد عروض مقدمة حتى الآن.</div>
                </div>
            </div>
        @endif


    </div>

</div>
