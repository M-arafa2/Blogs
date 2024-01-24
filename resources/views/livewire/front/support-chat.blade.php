<div>
    <section class=" section chat-section ">
        <div class="container-md " wire:poll.1000ms>
            <div class="info d-flex flex-column gap-2 align-items-center">

                {{-- <img src="{{ $chat->employee ? display_file($chat->employee->photo) : asset('/img/profile-picture.webp') }}" alt="person" /> --}}
                {{-- <img src="{{ asset('https://example.com/path/to/default-admin-image.jpg') }}" alt="person" /> --}}
                <img src="{{asset('admin-assets/img/admin-pic.jpg') }}" alt="person" class="img" />

                {{-- <img src={{ display_file($chat->employee?->photo) }}" alt="" class="img"> --}}
                <div class="name">
                    {{ $chat->employee?->name }}
                </div>
            </div>
            @forelse($messages as $item)
            @if($item->user_id == auth()->user()->id)
            <div class="box-chat box-chat-from">
                <div class="msg">
                    @if($item->image)
                    {{-- <img src="{{ display_file($item->image) }}" alt=""> --}}
                    <img src="{{ display_file($item->image) }}" alt="صورة" class="img-fluid">

                    @endif
                    <div class="mt-2 mb-2">
                        {{ $item->message }}
                    </div>
                    @if($item->attachment)
                    <div>
                        <a target="_blank" class="btn btn-success bg-gray-900 btn-sm" href="{{ display_file($item->attachment) }}">معاينة المرفق</a>

                    </div>
                    @endif
                </div>
            </div>
            @else
            <div class="box-chat">
                @if($item->image)
                {{-- <img src="{{ display_file($item->image) }}" width=50px alt=""> --}}
                {{-- <img src="{{ display_file($item->image) }}" width="20px" alt=""> --}}
                <img src="{{ display_file($item->image) }}" alt="صورة" class="img-fluid rounded">


                @endif
                <div class="mt-2 mb-2">
                    {{ $item->message }}
                </div>
                @if($item->attachment)
                <div>
                    <a target="_blank" class="btn btn-success bg-gray-900 btn-sm" href="{{ display_file($item->attachment) }}">معاينة المرفق</a>

                </div>
                @endif
                @if($item->read_at)
                <i class="fas fa-check-double main-color"></i>
                @endif
            </div>
            @endif
            @empty
            <div class="alert alert-warning">
                لا يوجد رسائل حتي الان
                أضف رسالة الان
            </div>
            @endforelse

            {{-- <div class="typing">
                <div>
                    <img src="{{ asset('front-assets') }}/img/person.png" alt="" class="img">
        </div>
        <div class="snippet">
            <div class="stage">
                <div class="dot-flashing"></div>
            </div>
        </div>
</div> --}}
{{-- <div action="" class="box-send">
    <div class="inp-msg">
        <div class="d-flex align-items-center ">
            <button class="btn-icon me-2">
                <i class="fa-solid fa-paperclip icon"></i>
            </button>
            <button class="btn-icon ms-1">
                <i class="fa-solid fa-camera icon"></i>
            </button>
        </div>
        <textarea class="inp" wire:keydown.enter='messageSend' wire:model='message' id="" placeholder="أكتب رسالتك"></textarea>
    </div>
    <!-- <button class="btn-send">
                    <i class="fa-solid fa-microphone-lines"></i>
                </button> -->
</div> --}}
<div class="box-send">
    @if($image)
    <img style="width: 80px" src="{{ $image->temporaryUrl() }}" alt="">
    @endif
    {{-- @if($attachment)
    <img style="width: 80px" src="{{ display_file($item->attachment) }}" alt="">
    @endif --}}
    @if($attachment)
    <div>
        <a target="_blank" class="btn btn-success bg-gray-900 btn-sm" href="{{ display_file($item->attachment) }}">معاينة المرفق</a>

    </div>
    @endif
    <div class="inp-msg">
        <div class="d-flex align-items-center ">
            <button class="btn-icon me-2">
                <label for="UploadBtn">
                    <input type="file" wire:model='attachment' id="UploadBtn" class="uploadBtn">
                    <i class="fa-solid fa-paperclip icon"></i>
                </label>
            </button>
            <!-- <input type="file" name="" id=""> -->
            <button class="btn-icon ms-1">
                <label for="UploadBtn2">
                    <input type="file" accept="image/*" wire:model='image' id="UploadBtn2" class="uploadBtn">
                    <i class="fa-solid fa-camera icon"></i>
                </label>
            </button>
        </div>
        <textarea class="inp" wire:keydown.enter='messageSend' wire:model='message' id="" placeholder="أكتب رسالتك"></textarea>
    </div>
    <!-- <button class="btn-send">
        <i class="fa-solid fa-microphone-lines"></i>
    </button> -->
</div>
</div>
</section>
</div>
