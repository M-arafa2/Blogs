<section class="section box-section chat-order-section py-4 ">
    <div class="container-md">
        <h5 class="mb-3">{{ $offer->order->title }}</h5>
    </div>

    @if ($offer->messages->count() > 0)
        <div class=" bg-white mb-3">
            <h6 class="container-md mb-0 py-3 fw-bold">
                عن الرسالة
            </h6>
            <hr class="m-0 mb-3">
            <div class="container-md">
                <div class="d-flex align-items-center justify-content-between gap-3">
                    <div class="flex-fill ">
                        <p class="mb-3">
                            الاسم
                        </p>
                        <p class="mb-3">
                            تاريخ التواصل
                        </p>
                        <p class="mb-3">
                            الطلب
                        </p>
                        <p class="mb-3">
                            العرض
                        </p>
                    </div>
                    <div class="flex-fill ">
                        <p class="mb-3">
                            <a href="#" class="text-link">{{ $offer->user->name }}</a>
                        </p>
                        <p class="mb-3">
                            {{ $offer->messages()->first()->human_date }}
                        </p>
                        <p class="mb-3">
                            <a href="{{ route('orders.show', $offer->order->id) }}"
                                class="text-link">{{ $offer->order->title }}</a>
                        </p>
                        <p class="mb-3">
                            <a href="#" class="text-link">${{ number_format($offer->amount, 2) }} خلال
                                {{ $offer->duration }} يوم</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white mb-3">
        <h6 class="container-md mb-3 py-3 fw-semibold border-b color-222 fs-16px">
            العرض
        </h6>

        <div class="container-md">
            <div class="box-add-offer">
                <div class="header-offer d-flex align-items-center gap-2 mb-3">
                    @if ($offer->user->photo)
                        <img src="{{ display_file($offer->user->photo) }}" alt="" class="img-user">
                    @else
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLRrfGmicNOQwEeoCv7JtxJ69QOxUfJq0eyg&usqp=CAU"
                            class="img-user" alt="">
                    @endif
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <a href="" class="name d-block main-color fs-13px">
                                {{ $offer->user->name }}
                            </a>
                            <div class="satrs d-flex align-items-center">
                                <i class="star active fas fa-star"></i>
                                <i class="star active fas fa-star"></i>
                                <i class="star active fas fa-star"></i>
                                <i class="star fas fa-star"></i>
                                <i class="star fas fa-star"></i>
                            </div>
                        </div>
                        <div class="info d-flex align-items-center gap-2">
                            <div class="item d-flex align-items-center gap-1 fs-12 color-777">
                                <i class="fa fa-fw fa-briefcase fs-10px color-777"></i>
                                استشاري دراسات جدوي
                            </div>
                            <div class="item d-flex align-items-center gap-1 fs-12 color-777">
                                <i class="fas fa-clock fs-10px color-777"></i>
                                منذ 20 دقيقة
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-grey py-3 mb-3">
                    <div class="row text-center row-gap-24 justify-content-center">
                        <div class="col-6">
                            <p class="title mb-0">المبلغ</p>
                            <h5 class="content mb-0"><span>${{ number_format($offer->amount, 2) }}</span></h5>
                        </div>

                        <div class="col-6">
                            <p class="title mb-0">مدة التنفيذ</p>
                            <h5 class="content mb-0">{{ $offer->duration }} <span>يوم</span></h5>
                        </div>

                        <div class="col-6 ">
                            <p class="title mb-0">معرض الأعمال</p>
                            <h5 class="content mb-0">
                                <a href="https://mostaql.com/u/Basem_Gaber/portfolio" class="clr-gray-darker">
                                    4 أعمال
                                </a>
                            </h5>
                        </div>

                    </div>
                </div>
                <div class="description-text py-2">
                    {{ $offer->description }}
                </div>
            </div>
        </div>
    </div>



    <div class=" bg-white mb-3 py-3">

        <div class="container-md">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($offer->messages->count() > 0)

                @foreach ($offer->messages as $message)
                    <div class="box-add-offer">

                        <div class="header-offer d-flex align-items-center gap-2 mb-3">
                            @if ($message->user->photo)
                                <img src="{{ display_file($message->user->photo) }}" alt="" class="img-user">
                            @else
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLRrfGmicNOQwEeoCv7JtxJ69QOxUfJq0eyg&usqp=CAU"
                                    class="img-user" alt="">
                            @endif
                            <div>
                                <a href="" class="name d-block">
                                    {{ $message->user->name }}
                                </a>
                                <div class="info d-flex align-items-center gap-2">

                                    <div class="item d-flex align-items-center gap-1 ">
                                        <i class="fas fa-clock"></i>
                                        منذ 20 دقيقة
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fs-6">
                            {{ $message->message }}
                        </div>
                    </div>
                    <hr class="m-0 my-3">
                @endforeach
            @endif
            <textarea wire:model="message" class="form-control mt-3" id="" rows="5" placeholder="أكتب رسالتك"></textarea>

            @error('message')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="d-flex justify-content-center mt-2">
                <button wire:click="send" class="main-btn">
                    إرسال
                </button>
            </div>
        </div>
    </div>

</section>
