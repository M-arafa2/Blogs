<div class="modal fade" id="show{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $item->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="">الاسم</label>
                    <p>{{ $item->name }}</p>
                </div>

                <div class="form-group">
                    <label for="">الهاتف</label>
                    <p>{{ $item->phone }}</p>
                </div>

                <div class="form-group">
                    <label for="">الايميل</label>
                    <p>{{ $item->email }}</p>
                </div>

                <div class="form-group">
                    <label for="">عنوان الرسالة</label>
                    <p>{{ $item->subject }}</p>
                </div>
                <div class="form-group">
                    <label for="">الوقت</label>
                    <p>{{ $item->created_at }}</p>
                </div>

                <div class="form-group">
                    <label for="">الرسالة</label>
                    <p>{{ $item->message }}</p>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
            </div>
        </div>
    </div>
</div>
