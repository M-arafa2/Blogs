{{-- <button class="btn btn-secondary btn-sm text-nowrap">
    {{ $vendor->type =='vendor'?'عدد الطلبات: 2': 'عدد العروض: 5'}}
</button> --}}
<button class="btn btn-secondary btn-sm text-nowrap">
    {{-- @dd($vendor) --}}
    عدد الطلبات : {{ $vendor->vendorCarts->count() }}
</button>

<a class="btn btn-primary btn-sm text-nowrap" href="{{ route('admin.products.index', ['vendor' => $vendor->id]) }}">
    {{-- @dd($vendor) --}}
    عدد المنتجات : {{ $vendor->products->count() }}
</a>
<a href="{{ route('admin.vendors.edit', $vendor->id) }}" class="btn btn-info btn-sm"> <i class="fa-solid fa-pen"></i></a>

<a href="{{ route('admin.vendors.show', $vendor->id) }}" class="btn btn-purple btn-sm"> <i class="fa-solid fa-eye"></i></a>

<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $vendor->id }}">
    <i class="fa-solid fa-trash"></i>
</button>
{{-- delete modal --}}
<div class="modal fade" id="delete{{ $vendor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف مزود الخدمه</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.vendors.destroy', $vendor->id) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    {{-- <input type="hidden" name="back" value="{{ $type }}" id=""> --}}
                    هل أنت متأكد من حذف مزود الخدمه ؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">نعم</button>
                </div>
            </form>
        </div>
    </div>
</div>
