<section class="section box-section coordinator-section py-4 ">
    <div class="container-md">
        <div class="text-center">
            <h2 class="lg-title mb-2">إضافة طلب</h2>
            <p class="mb-4">
                إبداء التخطيط لمناسباتك بإختيار الأقسام التي تحتاجها ضمن الأقسام
                التي تحتاج ضمن قائمة أفضل مزودي خدمات لتختار مايناسبك بكل سهولة
            </p>
        </div>
        <div class="row g-3">

            {{-- <div class="col-12 col-md-4">
                <div class="form-check form-switch">
                    <input wire:model="status" class="form-check-input" type="checkbox" role="switch"
                        id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">حالة الطلب</label>
                </div>
            </div> --}}

            <div class="col-12 col-md-4">
                <div class="main-inp">
                    <i class="icon fa-solid fa-bookmark"></i>
                    <input type="text" wire:model="title" placeholder="عنوان الطلب" />
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="main-inp">
                    <label for="">
                        اختر القسم الرئيسي
                    </label>
                    <select wire:model="department_id">
                        <option value="">اختر</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            {{--  <div class="col-12 col-md-4">
                <div class="main-inp">
                    <label for="">
                        اختيار القسم الفرعي
                    </label>
                    <select name="" id="">
                        <option value="">فرعي1</option>
                        <option value="">فرعي2</option>
                    </select>
                    @error('sub_department_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div> --}}
            <div class="col-12 col-md-4">
                <div class="main-inp">
                    <label for="">
                        اختيار الخدمات
                    </label>
                    <select wire:model="service_id">
                        <option value="">اختر</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                    @error('service_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="main-inp">
                    <label for="">الوصف</label>
                    <textarea class="main-textarea won" wire:model="description" style="height: 90px"></textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="main-inp" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <label for="formFileMultiple" class="mb-1">
                        المرفقات
                    </label>
                    <input class="form-control ps-2 pe-0 py-2" wire:model="files" type="file" id="formFileMultiple"
                        multiple />

                    <!-- Progress Bar -->
                    <div x-show="isUploading" class="mt-2 w-100">
                        <progress max="100" x-bind:value="progress" class="w-100"></progress>
                    </div>
                    @error('files.*')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-4">
                <button class="main-btn btn-yellow mx-auto mt-4" wire:click="save">
                    <i class="fa-solid fa-circle-plus"></i>
                    إضافة
                </button>
            </div>
        </div>
    </div>
</section>
