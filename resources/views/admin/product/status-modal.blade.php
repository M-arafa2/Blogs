<div class="modal fade" id="accept{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">قبول الطلب - {{ $product->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.products.accept', $product->id) }}" method="POST">
                <div class="modal-body">
                    @csrf

                    هل أنت متأكد من قبول الطلب؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary btn-sm px-3">نعم</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="reject{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">رفض الطلب - {{ $product->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.products.reject', $product->id) }}" method="POST">
                <div class="modal-body">
                    @csrf

                    <div class="form-group">
                        <label for="">سبب الرفض</label>
                        <textarea name="rejected_reason" class="form-control" rows="5">{{ old('rejected_reason') }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary btn-sm px-3">نعم</button>
                </div>
            </form>
        </div>
    </div>
</div>
