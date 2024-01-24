<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة صفحه للموقع</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.sitepages.store') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="">العنوان</label>
                    <input type="text" name="address" class="form-control"
                            value="{{ old('address') }}" required >
                        @error('address')
                            <div class="text-danger text-bold">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="">المحتوى</label>
                    <textarea  class="form-control summernote" name="content" rows="3" required >
                        {!! old('content') !!}
                    </textarea>
                    @error('content')
                        <div class="text-danger text-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">حاله الطلب</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status') == 1 ? 'selected' : null }}>مفعل</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : null }}>غير مفعل</option>
                    </select>
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
