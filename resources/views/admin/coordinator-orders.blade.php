@extends('admin.layouts.admin')
@section('title','الأقسام')
@section('content')
<section class="">
  <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-light p-3">
      <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
      <li href="" class="breadcrumb-item" aria-current="page">
        طلبات المنسقين
      </li>
    </ol>
  </nav>
  <div class="section_content content_view">
    <div class="up_element mb-2">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
        إضافة
      </button>
      <div class="modal fade" id="create" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">إضافة</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST">
              <div class="modal-body">
                <div class="form-group mb-3">
                  <label for="">القسم</label>
                  <select name="" id="" class="form-select">
                    <option value="">اختر القسم</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label for="">العميل</label>
                  <select name="" id="" class="form-select">
                    <option value="">اختر العميل</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">تاريخ الطلب</label>
                  <input type="date" name="" id="" class="form-control">
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
            <th>القسم</th>
            <th>العميل</th>
            <th>تاريخ الطلب</th>
            <th>العمليات</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>1</th>
            <td>اسم القسم</td>
            <td>اسم العميل</td>
            <td>2023/06/15</td>
            <td class="d-flex gap-1">
              <button type="button" class="btn btn-purple btn-sm" data-bs-toggle="modal" data-bs-target="#show">
                <i class="fa-solid fa-eye"></i>
              </button>
              <div class="modal fade" id="show" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">معاينة</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="table-responsive">
                        <table class="table table-hover">
                          <tbody>
                            <tr>
                              <th>القسم</th>
                              <td>اسم القسم</td>
                            </tr>
                            <tr>
                              <th>العميل</th>
                              <td>اسم العميل</td>
                            </tr>
                            <tr>
                              <th>تاريخ الطلب</th>
                              <td>
                                2023-02-06
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-dismiss="modal">رجوع</button>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
