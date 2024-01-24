<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة خدمه جديده</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="form-group mb-3">
                    <label for="" class="mb-1">اسم القسم</label>
                    <input type="text" name="name" id="" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="" class="mb-1">الحاله</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status') == 1 ? 'selected' : null }}>مفعل</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : null }}>غيرمفعل</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="mb-1">الصوره</label>
                    <input class="form-control img" name="cover"  type="file" accept="image/*" >
                    @error('cover')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <img src="{{ asset('admin-assets/img/no-image.jpg') }}" alt="" class="img-thumbnail img-preview" width="200px">
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
