<section class="section box-section coordinator-section py-4 ">
    <div class="container-md">
        <div class="text-center mb-4">
            <h4 class="lg-title">إضافة تذكرة</h4>
        </div>
        <div class="row g-3">
            <div class="col-12 col-md-4">
                <label for="">
                    عنوان التذكرة
                </label>
                <div class="main-inp">
                    <i class="icon fa-solid fa-bookmark"></i>

                    <input type="text" wire:model.defer="title" id="" class="" />
                </div>
                @error('title')
                {{ $message }}
                @enderror
            </div>
            <div class="col-12 col-md-4">
                <div class="main-inp">
                    <label for="">
                        اختر موضوع التذكرة
                    </label>
                    <select wire:model.defer="subject" id="" class="form-select">
                        <option value="">اختر النوع</option>
                        <option value="الطلبات">الطلبات</option>
                        <option value="تفعيل العضوية">تفعيل العضوية</option>
                        <option value="اخري">آخرى</option>
                    </select>
                    @error('subject')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-12 m-0">
                <hr class="m-0 border-0">
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="main-inp">
                    <label for="">الوصف</label>
                    <textarea wire:model.defer='desc' class="main-textarea won" style="height: 90px"></textarea>
                </div>
                @error('desc')
                {{ $message }}
                @enderror
            </div>
            <div class="col-12 col-md-12 m-0">
                <hr class="m-0 border-0">
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="main-inp">
                    <label for="formFileMultiple" class="mb-1">
                        المرفقات
                    </label>
                    <input class="form-control ps-2 pe-0 py-2" type="file" wire:model.defer='image' id="formFileMultiple" />
                </div>
                @error('image')
                {{ $message }}
                @enderror
            </div>

            <div class="col-12 col-md-12">
                <button type="button" wire:click='save' class="main-btn btn-yellow mx-auto mt-4 px-4 full">
                    إضافة
                </button>
            </div>
        </div>
    </div>
</section>
