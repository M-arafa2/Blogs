
    <button class="btn btn-secondary btn-sm text-nowrap">
        {{-- {{ $user->type =='user'?'عدد الطلبات: 2': 'عدد العروض: 5'}} --}}
        @if ($user->type == 'user')
        {{-- عدد الطلبات : {{ isset($user->orders) ? $user->orders->count() : 0 }} --}}
        <a href="{{ route('admin.orders.index', ['user_id' => $user->id]) }}"
            class="btn btn-secondary btn-sm text-nowrap">
            عدد الطلبات : {{ isset($user->orders) ? $user->orders->count() : 0 }}
        </a>
        @else
        {{-- عدد العروض: {{ isset($user->offers) ? $user->offers->count() : 0 }} --}}
        <a href="{{ route('admin.offers.index', ['user_id' => $user->id]) }}"
            class="btn btn-warning btn-sm text-nowrap">
            عدد العروض : {{ isset($user->offers) ? $user->offers->count() : 0 }}
        </a>
        @endif
    </button>

    <a href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-info btn-sm"> <i class="fa-solid fa-pen"></i></a>

    <a href="{{ route('admin.users.show',$user->id) }}" class="btn btn-purple btn-sm"> <i class="fa-solid fa-eye"></i></a>

    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $user->id }}">
    <i class="fa-solid fa-trash"></i>
    </button>
    {{-- delete modal --}}
    <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف عميل</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.users.destroy',$user->id) }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        {{-- <input type="hidden" name="back" value="{{ $type }}" id=""> --}}
                        هل أنت متأكد من حذف العميل؟
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">نعم</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
