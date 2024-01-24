<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة تذكره جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.tickets.store') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="form-group mb-3">
                    <label for="" class="mb-1">اسم التذكره</label>
                    <input type="text" name="title" id="" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="parent_id" class="mb-1">  عنوان التذكره</label>
                    <select name="subject" class="form-control">
                        <option value="">اختر النوع</option>
                        <option value="الطلبات">الطلبات</option>
                        <option value="تفعيل العضوية">تفعيل العضوية</option>
                        <option value="اخري">آخرى</option>
                    </select>
                     @error('subject')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="parent_id" class="mb-1">  حالة التذكره</label>
                        <select name="status" class="form-control">
                            <option value="">اختر الحالة</option>
                            <option value="1">مفتوحة</option>
                            <option value="0"> مغلقة</option>
                        </select>
                         @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                    <div class="form-group mb-3">
                        <label for="" class="mb-1">وصف التذكره</label>
                        <textarea name="desc" id="" class="form-control">{{old('desc')}}</textarea>
                    </div>

                <div class="form-group ">
                    <label class="mb-1">الصوره</label>
                    <input class="form-control img" name="image"  type="file" accept="image/*" >
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
