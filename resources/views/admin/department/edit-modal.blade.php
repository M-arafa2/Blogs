<div class="modal fade" id="edit{{ $department->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل قسم</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.departments.update',$department->id) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">اسم القسم</label>
                        <input type="text" name="name" value="{{ old('name',$department->name) }}" id="" class="form-control">
                    </div>


                    <div class="form-group mb-3">
                        <label for="parent_id" class="mb-1"> القسم الأب</label>
                        <select name="parent_id" class="form-control">
                            <option value="">---</option>
                            @forelse(\App\Models\Department::whereNull('parent_id')->get(['id', 'name']) as $dep)
                            <option value="{{ $dep->id }}" {{ old('parent_id', $department->parent_id) == $dep->id ? 'selected' : null }}>{{ $dep->name }}</option>
                            @empty
                            @endforelse
                        </select>
                         @error('parent_id')<span class="text-danger">{{ $message }}</span>@enderror  
                        </div>




                        {{-- <div class="col-3">
                            <label for="parent_id">Parent</label>
                            <select name="parent_id" class="form-control">
                                <option value="">---</option>
                                @forelse($main_categories as $main_category)
                                    <option value="{{ $main_category->id }}" {{ old('parent_id', $productCategory->parent_id) == $main_category->id ? 'selected' : null }}>{{ $main_category->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('parent_id')<span class="text-danger">{{ $message }}</span>@enderror
                        </div> --}}



                    <div class="form-group">
                        <label for="">الحاله</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status',$department->status) == 1 ? 'selected' : null }}>مفعل</option>
                            <option value="0" {{ old('status',$department->status) == 0 ? 'selected' : null }}>غيرمفعل</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>الصوره </label>
                        <input class="form-control img" name="cover"  type="file" accept="image/*" >
                        @error('cover')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        @if($department->cover)
                            <img src="{{ asset('admin-assets/img/department/'.$department->cover) }}"
                            alt="{{ $department->name }}" class="img-thumbnail img-preview" width="200px">
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
