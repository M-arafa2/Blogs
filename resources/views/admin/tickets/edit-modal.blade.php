<div class="modal fade" id="edit{{ $department->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل قسم</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.tickets.update',$department->id) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">اسم التذكره</label>
                        <input type="text" name="title" value="{{ old('title',$department->title) }}" id="" class="form-control">
                    </div>




                    <div class="form-group">
                        <label for="">عنوان التذكره</label>
                        <select name="subject" class="form-control">
                            <option value="الطلبات" {{ old('subject',$department->subject) == "الطلبات" ? 'selected' : null }}>الطلبات</option>
                            <option value="تفعيل العضوية" {{ old('subject',$department->subject) == "تفعيل العضوية" ? 'selected' : null }}>تفعيل العضوية</option>
                            <option value="اخري" {{ old('subject',$department->subject) == "اخري" ? 'selected' : null }}>اخري</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="parent_id" class="mb-1">  حالة التذكره</label>
                        <select name="status" class="form-control">
                            <option value="">اختر الحالة</option>
                            <option value="1" {{ old('status',$department->status) == "1" ? 'selected' : null }}>مفتوحة</option>
                            <option value="0" {{ old('status',$department->status) == "0" ? 'selected' : null }}> مغلقة</option>
                        </select>
                         @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                    <div class="form-group mb-3">
                        <label for="" class="mb-1">وصف التذكره</label>
                        <textarea name="desc" id="" class="form-control">{{ old('desc',$department->desc) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>الصوره </label>
                        <input class="form-control img" name="cover"  type="file" accept="image/*" >
                        @error('cover')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        @if($department->image)
                            <img src="{{ asset('admin-assets/img/tickets/'.$department->image) }}"
                            alt="{{ $department->title }}" class="img-thumbnail img-preview" width="200px">
                        @else
                            <img src="{{ asset('admin-assets/img/no-image.jpg') }}" alt="" class="img-thumbnail img-preview" width="200px">
                        @endif
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
