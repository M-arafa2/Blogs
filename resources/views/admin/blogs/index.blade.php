@extends('admin.layouts.admin')
@section('title','العملاء')
@section('content')
<section class="">
  <nav aria-label="breadcrumb ">
    <ol class="breadcrumb bg-light p-3">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('translate.dashboard')</a></li>
      <li href="" class="breadcrumb-item" aria-current="page">@lang('translate.blogs')</li>
    </ol>
  </nav>
  <x-modals modalid="createModal"  modaltitle="Create" >
    <x-modals.input inputlabel="title" inputid="ctitle" inputname="name" />
    <x-modals.image inputlabel="image" inputid="cimage" inputname="image"/>
    <textarea id="ccontent" name="content" ></textarea>
  </x-modals>
  <button id="createModalBtn" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#createModal">New Blog</button>
  <x-modals modalid="editModal"  modaltitle="Edit" >
    <x-modals.input inputlabel="title" inputid="edittitle" inputname="name" />
    <x-modals.image inputlabel="image" inputid="editimage" inputname="image"/>
    <textarea id="editcontent" name="content" ></textarea>
  </x-modals>
  <table id="table" class="table table-bordered table-dark dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>@lang('translate.id')</th>
                <th>@lang('translate.image')</th>
                <th>@lang('translate.title')</th>
                <th>@lang('translate.content')</th>
                <th>@lang('translate.created_at')</th>
                <th>@lang('translate.action')</th>
            </tr>
        </thead>
    </table>    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>


<script>
 
  $(document).ready(function(){
    var edite =new FroalaEditor('textarea');
    var table = $('#table').DataTable({
             processing: true,
             serverSide: true,
             dom: 'Bfrtip',
             ajax: "{{ route('admin.blogs.index') }}",
             buttons: [{extend: 'excel',
                        text: 'Excel',
                        exportOptions: {
                        modifier: {
                                    page: 'current'
                                }
                        }
                    },
                    {extend: 'pdf',
                        text: 'PDF',
                        exportOptions: {
                        modifier: {
                                    page: 'current'
                                }
                        }
                    }
                    ],
             columns: [
                 { data: 'id' },
                 { data: 'image' },
                 { data: 'title' },
                 { data: 'content' },
                 { data: 'created_at' },
                 { data: 'action'},
       
             ],
       });
       $('#table').on('click','.editmodalbtn',function(){
                    modalalert('','editModalalert','editModaltxt')
                    //getting shop data from button data attributes
                    var id = $(this).data('id');
                    $('#editModalBtn').attr('data-id',id)
                    var column = $(this).data('column');
                    $('#edittitle').val(column['title'])
            

                });
                $('#editModalBtn').click(function() {
                    var id = $(this).data('id')
                    
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            url: "{{url('admin/blogs')}}"+'/'+id,
                            type: 'POST',
                            data:getData('edit',true),
                            dataType: 'JSON',
                            processData: false,
                            contentType: false,
                            success: function(response){
                                if(response.success == true){
                                    notifyPopup('success','Success',response.message)
                                    table.ajax.reload();
                                    $('#editModal').modal('toggle');
                                }
                            },
                            error:function(response){
                                modalalert(response.responseJSON.errors,'editModalalert','editModaltxt')
                            }
                        });
                    });
                    $('#opencreatemodalBtn').click(function() {
                        modalalert('','createModalalert','createModaltxt')
                    });
                    $('#createModalBtn').click(function() {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            url: "{{route('admin.blogs.store')}}",
                            type: 'POST',
                            data:getData('c'),
                            dataType: 'JSON',
                            processData: false,
                            contentType: false,
                            success: function(response){
                                if(response.success == true){
                                    notifyPopup('success','Success',response.message)
                                    table.ajax.reload();
                                    $('#createModal').modal('toggle');
                                }else{
                                    alert(response.message);            
                                }
                            },
                            error:function(response){
                                modalalert(response.responseJSON.errors,'createModalalert','createModaltxt')
                                
                                
                            }
                        });
                    });
                $('#table').on('click','.deletebtn',function(){
                    var id = $(this).data('id');
                    var fd = new FormData();
                    fd.append('_method', 'DELETE');
                    fd.append("id",id);

                    var deleteConfirm = confirm("Are you sure?");
                    if (deleteConfirm == true) {
                        // AJAX request   
                        $.ajax({
                            headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            url: "{{url('admin/blogs')}}"+'/'+id,
                            type: 'DELETE',
                            dataType: 'JSON',
                            success: function(response){
                                if(response.success == true){
                                    notifyPopup('success','Success',response.message)
                                    table.ajax.reload();
                            
                                }
                            },
                            error:function(response){
                                notifyPopup('error','Error',response.message);
                            }
                        });
                    }

                });
       $('#table').on('click','.viewmodalbtn',function(){
            //getting shop data from button data attributes
            var id = $(this).data('id');
            $('#viewModalBtn').attr('data-id',id)
            var column = $(this).data('column');
            
            });
       function modalalert(txt,errordiv,errortxtid){
                    var elm =document.getElementById(errortxtid)
                    var errorbody = document.getElementById(errordiv)
                    
                    var error='' ;
                    if(!txt==''){
                        errorbody.style.display=''
                        for (const [key, value] of Object.entries(txt)) {
                        error =error+value +'<br>'
                        }
                    }else{
                        errorbody.style.display='none'
                    }
                    elm.innerHTML= error
                }
                function notifyPopup(status,title,message){
                    new Notify({
                                    status: status,
                                    title: title,
                                    text:message,
                                    effect: 'fade',
                                    speed: 300,
                                    customClass: null,
                                    customIcon: null,
                                    showIcon: true,
                                    showCloseButton: true,
                                    autoclose: true,
                                    autotimeout: 1000,
                                    gap: 20,
                                    distance: 20,
                                    type: 1,
                                    position: 'right bottom'
                                })
                                
                }
               
                function getData(prefix,edit=false){
                    
                    var fd = new FormData();
                    if(edit ===true){
                        fd.append('_method','PATCH')
                    }
                    if($(`#${prefix}image`).get(0).files.length !== 0){
                        fd.append('image',$(`#${prefix}image`)[0].files[0]);
            
                    }
                    fd.append('title',$(`#${prefix}title`).val().trim())
                    fd.append('content',$(`#${prefix}content`).val().trim())
                    
                    return fd;
                }
        
  });
</script>
@endsection
