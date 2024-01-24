<div class="modal fade" id="edit{{ $term->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل مدينة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.order-terms.update', $term->id) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="" class="mb-1">العنوان</label>
                        <input type="text" name="title" id="" value="{{ $term->title }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-1">الترتيب</label>
                        <input type="text" name="sort" id="" value="{{ $term->sort }}"
                            class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>
