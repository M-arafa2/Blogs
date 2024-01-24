
    {{-- <button class="btn btn-secondary btn-sm text-nowrap">
        {{ $product->type =='product'?'عدد المواضيع:2': 'عدد العروض:5'}}
    </button> --}}

    {{-- <a href="{{ route('admin.products.edit',$product->id) }}" class="btn btn-info btn-sm"> <i class="fa-solid fa-pen"></i></a> --}}

    {{-- <div class="d-flex gap-1">
        <button type="button" class="btn btn-info btn-sm">
        <i class="fa-solid fa-pen"></i>
        </button> --}}

        <a href="{{ route('admin.products.show',$product->id) }}" class="btn btn-purple btn-sm"> <i class="fa-solid fa-eye"></i></a>

        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $product->id }}">
        <i class="fa-solid fa-trash"></i>
        </button>

    </div>
    {{-- delete modal --}}
    <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف  المنتج</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        {{-- <input type="hidden" name="back" value="{{ $type }}" id=""> --}}
                        هل أنت متأكد من حذف  المنتج؟
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">نعم</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
