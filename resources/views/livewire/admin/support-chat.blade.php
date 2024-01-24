<div>
    @if($screen == 'index')
    <div class="section_content content_view">
        <div class="up_element mb-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                إضافة
            </button>
            <div class="modal fade" id="create" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">إضافة</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        {{-- <form action="#" method="POST"> --}}
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="">القسم</label>
                                <select wire:model.defer='department_id' id="" class="form-select">
                                    <option value="">اختر القسم</option>
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">العميل</label>
                                <select wire:model.defer='user_id' id="" class="form-select">
                                    <option value="">اختر العميل</option>
                                    @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">تاريخ الطلب</label>
                                <input type="date" wire:model.defer='order_date' id="" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-primary" wire:click='submit' data-bs-dismiss="modal">حفظ</button>
                        </div>
                        {{-- </form> --}}

                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>القسم</th>
                        <th>العميل</th>
                        <th>اول رسالة مرسلة</th>
                        <th>تاريخ الطلب</th>
                        <th>عمليات</th>
                        {{-- <th>العمليات</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chats as $chat)

                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $chat->department?->name }}</td>
                        <td>{{ $chat->user?->name }}</td>
                        <td>{{ $chat->message }}</td>
                        <td>{{ $chat->created_at->diffForHumans() }}</td>
                        <td>
                            <button type="button" class="btn btn-purple btn-sm" data-bs-toggle="modal" data-bs-target="#show{{ $chat->id }}">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <div class="modal fade" id="show{{ $chat->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">معاينة</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <th>القسم</th>
                                                            <td>{{ $chat->department?->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>العميل</th>
                                                            <td>{{ $chat->user?->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>تاريخ الطلب</th>
                                                            <td>
                                                                {{ $chat->created_at->format('Y-m-d') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>التفاصيل</th>
                                                            <td>
                                                                {{ $chat->message }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            @if(count($chat->answers))
                                            <hr />
                                            <h6>
                                                اجابات اسئلة القسم

                                            </h6>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        @foreach ($chat->answers as $answer)
                                                        <tr>
                                                            <th>{{ $answer->question }}</th>
                                                            <td>{{ $answer->answer }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-dismiss="modal">رجوع</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-info btn-sm" wire:click='show({{ $chat->id }})'>
                                مراسلة
                            </button>

                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $chats->links() }}
        </div>
    </div>
    @elseif($screen == 'show')
        <section class="chat-section pt-4">
            <div class="container">
                <div class="chat">
                    <div class="info d-flex flex-column gap-2 align-items-center">
                        @if($chat->user->image && $chat->user->type === 'user')
                            <img src="{{ asset('images/user/'.$chat->user->image) }}" alt="{{ $chat->user->name }}" class="img">
                        @elseif($chat->user->image && $chat->user->type === 'vendor')
                            <img src="{{ asset('images/vendor/'.$chat->user->image) }}" alt="{{ $chat->user->name }}" class="img">
                        @else
                            <img src="{{ asset('images/no-image.jpg') }}" alt="{{ $chat->user->name }}" class="img">
                        @endif
                        <div class="name">
                            {{ $chat->user?->name }}
                        </div>
                    </div>
                    @forelse($messages as $item)
                        @if($item->user_id == auth()->user()->id)
                            <div class="box-chat box-chat-from">
                                <div class="msg">
                                    @if($item->image)
                                    <img src="{{ display_file($item->image) }}" alt="">
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
                                <img src="{{ display_file($item->image) }}" alt="">
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
                </div>

                <div class="box-send">
                    @if($image)
                        <img style="width: 80px" src="{{ $image->temporaryUrl() }}" alt="">
                    @endif
                    @if($attachment)
                        <div>
                            <a target="_blank" class="btn btn-success bg-gray-900 btn-sm" href="{{ display_file($item->attachment) }}">معاينة المرفق</a>
                        </div>
                    @endif
                    <div class="inp-msg">
                        <div class="d-flex align-items-center">
                            <button class="btn-icon me-2">
                                <label for="UploadBtn">
                                    <input type="file" wire:model='attachment' id="UploadBtn" class="uploadBtn">
                                    <i class="fa-solid fa-paperclip icon"></i>
                                </label>
                            </button>
                            <button class="btn-icon ms-1">
                                <label for="UploadBtn2">
                                    <input type="file" accept="image/*" wire:model='image' id="UploadBtn2" class="uploadBtn">
                                    <i class="fa-solid fa-camera icon"></i>
                                </label>
                            </button>
                        </div>
                        <textarea class="inp" wire:model.defer="message" placeholder="أكتب رسالتك"></textarea>
                    </div>
                    <button class="btn-send" wire:click="messageSend"><i class="fas fa-paper-plane"></i></button>
                </div>
            </div>
        </section>
    @endif
</div>
@push('js')
{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("sendButton").addEventListener("click", function() {
            // بعد النقر على زر الإرسال، تفريغ حقل النص
            document.getElementById("messageInput").value = "";
        });
    });
</script> --}}
@livewireScripts()
@endpush
@push('css')
@livewireStyles()
@endpush
