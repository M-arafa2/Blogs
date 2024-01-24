<div class="modal fade" id="edit{{ $sitepage->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل صفحه الموقع</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.sitepages.update',$sitepage->id) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">العنوان</label>
                        <input type="text" name="address"
                        class="form-control @error('address') is-invalid @enderror"
                        value="{{ $sitepage->address }}">
                    @error('address')
                        <div class="text-danger text-bold">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">المحتوى</label>
                        <textarea  class="form-control summernote" name="content" rows="3" required >
                            {!! $sitepage->content !!}
                        </textarea>
                        @error('content')
                            <div class="text-danger text-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">حاله الطلب</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status',$sitepage->status) == 1 ? 'selected' : null }}>مفعل</option>
                            <option value="0" {{ old('status',$sitepage->status) == 0 ? 'selected' : null }}>غير مفعل</option>
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
