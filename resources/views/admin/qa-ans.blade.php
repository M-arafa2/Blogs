@extends('admin.layouts.admin')
@section('title','سؤال وجواب')
@section('content')
<section class="">
  <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-light p-3">
      <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
      <li href="" class="breadcrumb-item" aria-current="page">
        سؤال وجواب
      </li>
    </ol>
  </nav>
  <div class="section_content content_view">
    <div class="up_element mb-2">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-qa-ans">
        إضافة
      </button>
      <div class="modal fade" id="create-qa-ans" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">اضافة سؤال وجواب</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="">
              <div class="modal-body">
                <div class="form-group mb-3">
                  <label for="">العنوان</label>
                  <input type="text" name="address" class="form-control" value="" required>
                </div>
                <div class="form-group">
                  <label for="">المحتوى</label>
                  <textarea class="form-control" name="" rows="3" required></textarea>
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
    </div>

    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>العنوان</th>
            <th>المحتوى</th>
            <th>العمليات</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>1</th>
            <td class="text-nowrap">اااااااااااا</td>
            <td class="text-nowrap">اااااااااااا</td>
            <td class="d-flex gap-1">
              <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal">
                <i class="fa-solid fa-pen"></i>
              </button>
              <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal">
                <i class="fa-solid fa-trash"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
