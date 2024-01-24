<div class="modal fade" id="edit{{ $slider->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل سلايدر</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.sliders.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">العنوان</label>
                        <input type="text" name="" value="{{ old('title',$slider->title) }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">رابط السلايدر</label>
                        <input type="text" name="url" value="{{ old('url',$slider->url) }}" id="" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="status">الحاله</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status',$slider->status) == 1 ? 'selected' : null }}>مفعل</option>
                            <option value="0" {{ old('status',$slider->status) == 0 ? 'selected' : null }}>غيرمفعل</option>
                        </select>
                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="">المحتوى</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle',$slider->subtitle) }}" id="" class="form-control">
                    </div> --}}

                    <div class="form-group">
                        <label>الصوره </label>
                        <input class="form-control img" name="cover"  type="file" accept="image/*" >
                        @error('cover')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        @if($slider->cover)
                            <img src="{{ asset('admin-assets/img/slider/'.$slider->cover) }}"
                            alt="{{ $slider->name }}" class="img-thumbnail img-preview" width="200px">
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
